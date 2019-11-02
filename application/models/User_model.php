<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    
    /**
     *  Log user login
     * 
     *  @param int
     *  @return array()
     * 
     */
    private function _log_login(int $user_id)
    {
        $ip_address         = $this->input->ip_address();
        $browser_detail     = $this->agent->browser() . ' ' . $this->agent->version();
        $operating_system   = $this->agent->platform();

        $log_detail = array(
            'user_id'           => $user_id,     
            'os_type'           => $operating_system,
            'browser_detail'    => $browser_detail,
            'ip_address'        => $ip_address,
            'log_datetime'      => date("Y-m-d H:i:s"),      
        );
        $this->db->insert('log_login', $log_detail);

    }

    /**
     *  Verify user email and password
     * 
     *  @param array
     *  @return boolean or array()
     * 
     */
    public function verifyUserLogin(array $data)
    {
        // $this->db->select('
        //     user_id, 
        //     user_lvl, 
        //     username,
        //     email,
        //     pswd
        // ');
        $this->db->select('
            user_id,
            email,
            pswd
        ');
        
        $this->db->from('user');
        $this->db->where('email', $data['email']);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($this->hash_lib->auth_hash_verify($data['pswd'], $row->pswd)) {
                
                // return basic user data
                $userVerified = array(
                    'user_id'       => $row->user_id ,
                    'login_status'  => true,
                );
                $this->_log_login($userVerified['user_id']);
                return $userVerified;

            } 
        } else {
            //user not exist in system or password not match.
            return false;
        }
        
        
    }

    /**
     *  Retrive full user detail from database based on parameter
     *  @param mixed
     *  @return array / boolean
     */
    public function getUserDetail(int $user_id = NULL, string $username = NULL, string $email = NULL)
    {
        $this->db->select('
            user_id,
            user_lvl,
            is_active,
            username,
            profile_img,
            email,
            reg_datetime,
        ');
        $this->db->from('user');
        //end here, continue here
        // $this->db->join('gender', 'gender.gender_id = user.gender_id');
        // $this->db->join('acc_status', 'acc_status.acc_status_id = user.acc_status_id');
        // $this->db->join('email_status', 'email_status.email_status_id = user.email_status_id');
        //$this->db->join('country', 'country.country_id = user.country_id');
    
        if ($username != NULL) {
            $this->db->where('username', $username);
        }elseif($email != NULL){
            $this->db->where('email', $email);            
        }else {
            $this->db->where('user_id', $user_id);
        }
    
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) {
            //show result
            return $query->result();
        } else {
            //not exist
            return false;
        }
    }
    
    /**
     *  Register/create new user in database
     * 
     *  @param array
     *  @return boolean
     */
    public function createUser(array $data)
    {
        $this->db->insert('user', $data);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     *  Update user email
     * 
     *  @param array
     *  @return boolean
     */
    public function updateEmail(array $data)
    {
        // set email to is_verify = '0' after email is updated
        $this->db->set('is_verify', '0');
        $this->db->set('email', $data['email']);
        
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('user');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else {
            return false;
        }
        
        
    }
    

    /**
     *  Perform user password update
     *  @param mixed
     *  @return array | boolean
     */
    public function updatePswd(array $data, boolean $ReqMatchPswd = NULL)
    {
        if ($ReqMatchPswd == true) {
            $matchCheck = $this->matchPswdCheck($data);
        } else {
            //skip password check. // For reset password
            $matchCheck['status'] = true;
        }
        
        if ($matchCheck['status'] == true) {

            $this->db->set('pswd', $data['new_pswd']);
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('user');
            if ($this->db->affected_rows() > 0) {
                //return true.
                return $matchCheck; 
            } else {
                //error update
                return false; 
            }
            
        } else {
            return $matchCheck;
        }
        
    }


    /**
     *  Update profile image
     *  @param array
     *  @return boolean
     */
    public function updateProfileImg(array $data)
    {
        $this->db->set('profile_img', $data['profile_img']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('user');
        
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }

    }


    /**
     *  Check user old password match or not.
     *  @param array
     *  @return array
     */
    public function matchPswdCheck($data)
    {
        $this->db->select('user_id, pswd');
        $this->db->from('user');
        $this->db->where('user_id', $data['user_id']);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($this->hash_lib->auth_hash_verify($data['old_pswd'], $row->pswd)) {
                
                $status = array(
                    'msg'       => 'Password match!' , 
                    'status'    => true,
                );
                return $status;

            } else {

                $status = array(
                    'msg'       => 'Password not match, please try again.', 
                    'status'    => false,
                );
                return $status;
            }
            
        } else {
            echo 'Invalid user. <a href="'.base_url().'">Home page</a>';
            log_message('error','User with user_id '. $data['user_id'] . 'not found and failed update password.');
            exit;            
        }   
    }


    /**
     *  Request verify new email
     *  @param string
     *  @return boolean
     */
    public function getEmailVerify(string $data_hash)
    {
        
        $this->db->where('sha1(email)', $data_hash);
        $this->db->from('user');
        $this->db->limit(1);
        
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $this->db->set('is_verify', '1');
            $this->db->where('sha1(email)', $data_hash);
            $this->db->update('user');
            return true;
        } else {
            return false;
        }
        
    }


    /**
     * Save generated token in database
     *  @param string
     *  @return boolean
     */
    public function saveToken(string $data)
    {
        $this->db->insert('token', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }    
    }

    
    /**
     *  Verify password token valid or expired
     *  
     *  @param array
     *  @return array
     */
    public function verify_token($data)
    {
        // get system date
        $date_now = date('Y-m-d');

        $this->db->select('
            user_id,
            token_type_id,
            token_code,
            is_active_id,
            datetime_created,
        ');

        $this->db->from('token');
        $this->db->where('token_code', $data['secret_code']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            // Check token is valid or not in database
            if ($row->datetime_created == $date_now && $row->is_active_id == '1') {
                // token is valid
                $status = array(
                    'msg'       => 'Reset password token is valid!', 
                    'status'    => true,
                );
                return $status;
            } else {
                // token is not valid
                $status = array(
                    'msg'       => 'Reset password token is expired!', 
                    'status'    => false,
                );
                return $status;
            }
            
        } else {
            // return false if token is not exist in database
            $status = array(
                'msg'       => 'Reset password token is not exist!', 
                'status'    => false,
            );
            return $status;
        }    
    }


    /**
     *  Update token if already used
     *  
     *  @param array
     *  @return boolean
     */
    public function updateTokenStatus($data)
    {
        // set token into '2' (expired)
        $this->db->set('is_active_id', '2');
        $this->db->where('token_code', $data['secret_code']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('token');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else {
            return false;
        }
        
        
    }
}

/* End of file User_model.php */
