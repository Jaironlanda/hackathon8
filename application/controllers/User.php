<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $resetPswdTokenID = 1;
    
    /**
     * Get user session
     * @return array
     */
    private function _getSession()
    {
        //check session
        if (!isset($this->session->userdata['logged_in'])) {
            return false;
        } else {
            $UserSession = array(
                'user_id'       => $this->session->userdata['logged_in']['user_id'],            
                'login_status'  => $this->session->userdata['logged_in']['login_status'],
                'sess_status'   => true,
            );
            return $UserSession;
            var_dump($UserSession);
        }
    }


    /**
     * User Login
     * 
     */
    public function login()
    {
        $page_title = "Login";
        $page_view  = "user/login";

        $data = array(
            'form_login' => form_open() , 
            'form_close' => form_close(),
        );
        
        
        //If session is still active/not expired will redirect user to dashboard.
        if ($this->_getSession()['sess_status'] != false) {
            $this->render_lib->_flashdata('msg_noti', 'Welcome back.'); //Msg alert
            redirect('user/dashboard');
        }

        //validate user input
        $loginValidation = $this->validation_lib->getLogin()['login_validation'];
        $this->form_validation->set_rules($loginValidation);
        
        if ($this->form_validation->run() == true) {
            $loginData = $this->validation_lib->getLogin()['login_detail'];
            $loginVerify = $this->user->verifyUserLogin($loginData);

            if ($loginVerify['login_status'] == true) {
                
                $this->session->set_userdata('logged_in', $loginVerify);
                $this->render_lib->_flashdata('msg_noti', 'Welcome back.'); //Msg alert
                redirect('user/dashboard');
        
            } else {
                $this->render_lib->_flashdata('msg_error', 'Invalid email or password, Please try again.'); //Msg alert
                redirect('login');
            }   
        } else {
            /**
             * I remove this because this flashdata will block msg_error for session check.
             */
            //$this->render_lib->_flashdata('msg_error', validation_errors()); //Msg alert 
            $this->render_lib->loginRegister_view($page_title, $page_view, $data);
        }
        
    }
    

    /**
     *  User logout
     * 
     *  @redirect login page
     */
    public function logout()
    {
        $session_data = array(
            'user_id',
            'user_lvl',
            'email',
            'username',
            'login_status',
            'sess_status'
        );
        // Erase session user data
        $this->session->unset_userdata('logged_in', $session_data);
        $this->render_lib->_flashdata('msg_noti', 'Successfuly Logout');
        redirect('login');
    }


    /**
     * User register
     * 
     */
    public function register()
    {
        
        $page_title = "Register";
        $page_view = "user/register";

        $data = array(
            'form_register' => form_open() , 
            'form_close'    => form_close(),
        );

        // validate user input
        $registerValidation = $this->validation_lib->getRegister()['reg_validation'];
        $this->form_validation->set_rules($registerValidation);
        
        if ($this->form_validation->run() == true) {
            $registerDetail     = $this->validation_lib->getRegister()['reg_detail'];
            $registerAccount    = $this->user->createUser($registerDetail);

            if ($registerAccount == true) {
                // Send email verify after done register
                // $sendEmailVerify = $this->mail_lib->userverify($registerDetail['email']);
                $this->render_lib->_flashdata('msg_noti', 'Thank you for your registration.');           
                redirect('login');
                // if ($sendEmailVerify == true) {
                //     $this->render_lib->_flashdata('msg_noti', 'A confirmation email has been sent to your email. <br>Thank you for your registration.');           
                //     redirect('login');
                // } else {
                //     // log error
                //     log_message('error','function_name: register, msg:Failed send email confirmation. Detail: ' . $registerDetail['email']);

                //     $this->render_lib->_flashdata('msg_error', 'Error send email confirmation. Please contact developer to fix this. jaironlanda@gmail.com');                
                //     redirect('login');
                // }
                
            } else {
                $this->render_lib->_flashdata('msg_error', 'Failed register, please try again later.');
            }
        } else {
            $this->render_lib->_flashdata('msg_error', validation_errors());
        }
        $this->render_lib->loginRegister_view($page_title, $page_view, $data);
    }


    /**
     *  Forgot password
     * 
     */
    public function forgot_pswd()
    {
        $page_title = "Forgot password";
        $page_view  = "user/forgot_pswd";

        $data = array(
            'form_forget_pswd'  => form_open(),
            'form_close'        => form_close(), 
        );
        
        // Validate user input
        $forgotPswdValidation = $this->validation_lib->getForgotPswd()['forgot_pswd_validation'];
        $this->form_validation->set_rules($forgotPswdValidation);
        
        if ($this->form_validation->run() == true) {
            $forgotPswdDetail = $this->validation_lib->getForgotPswd()['forgot_pswd_detail'];
            $getUserDetail = $this->user->getUserDetail(false, false, $forgotPswdDetail['email']);

            if ($getUserDetail != false) {
                
                //prepare user data for reset pswd token
                $user_id    = $getUserDetail[0]->user_id;
                $username   = $getUserDetail[0]->username;
                $email      = $getUserDetail[0]->email;
                $user_lvl   = $getUserDetail[0]->user_lvl;
                $token_type = $this->resetPswdTokenID;

                // create token
                $token = $this->hash_lib->reset_pswd_token($user_id);
                
                // store token detail to db
                $saveToken = $this->user->saveToken($token['compile_token']);

                if ($saveToken == false) {
                    
                    log_message('error','function_name: forgot_pswd:saveToken, msg:Failed save token to database. Detail: ');
                    
                }

                // store data in array
                $setResetPswdDetail = array(
                    'encrypt_token'     => $token['encrypt_token'], 
                    'username'          => $username,
                    'email'             => $email,
                    'user_lvl'          => $user_lvl,
                );

                // send email to reset password
                $sendToken = $this->mail_lib->resetPswd($setResetPswdDetail);

                if ($sendToken == true) {
                    $this->render_lib->_flashdata('msg_noti', 'Please check your email to proceed reset password.');
                    redirect('login');
                } else {
                    // log error
                    log_message('error','function_name: forgot_pswd:sendToken, msg: Failed send email to reset password. Detail: '. $email . ' username: ' . $username);
                    
                    $this->render_lib->_flashdata('msg_error', 'Internal server error. Please try again');
                }
                
            } else {
                // log error
                log_message('error','function_name: forgot_pswd, msg: Email not exist in system. Detail: ' . $forgotPswdDetail['email'] );
                
                $this->render_lib->_flashdata('msg_error', 'Email doesn\'t exist in our system. Please try again later.');
                
            }
            
        } else {
            $this->render_lib->_flashdata('msg_error', validation_errors());
        }
        $this->render_lib->global_view($page_title, $page_view, $data);
    }


    /**
     *  Reset account password
     *  @param string
     *  @return flash_data
     */
    public function reset_password(string $token_code = NULL)
    {
        $page_title = "Reset password";
        $page_view = "user/reset_pswd";

        $data = array(
            'form_reset_pswd'   => form_open('user/reset_password/'. $token_code) , 
            'form_close'        => form_close(),
        );

        //decrypt token then compare token that store in database. 
        $getToken = $this->hash_lib->decrypt_token($token_code);
        $verifyToken = $this->user->verify_token($getToken);
        
        //Expired token will redirect to login.
        if ($verifyToken['status'] == false) {
            $this->render_lib->_flashdata('msg_error', $verifyToken['msg']);
            redirect('login');
        }

        // validate user input
        $resetPswdValidation = $this->validation_lib->resetPswd()['resetPswd_validation'];
        $this->form_validation->set_rules($resetPswdValidation);

        if ($this->form_validation->run() == true) {
            $resetPswdDetail = $this->validation_lib->resetPswd($getToken['user_id'])['resetPswd_detail'];
            $reset_new_pswd = $this->user->updatePswd($resetPswdDetail, false); //2nd parameter is for matchpswdcheck, default = false.
            // var_dump($resetPswdDetail);
            // var_dump($reset_new_pswd['status']);
            // exit;
            if ($reset_new_pswd['status'] == true) {
                // update token status
                $tokenUpdate = $this->user->updateTokenStatus($getToken);
                if ($tokenUpdate == false) {
                    // log error
                    log_message('error','function_name: reset_password:tokenUpdate, msg: failed update token is_active_id. Detail: '. $getToken['secret_code'] . ' user_id: '. $getToken['user_id']);
                    
                }
                // redirect user to login page
                $this->render_lib->_flashdata('msg_noti', 'Success update new password, you may now login with new password.');
                redirect('login');
            } else {
                // log error
                log_message('error','function_name: reset_pswd:reset_new_pswd, msg: failed reset password. Detail: token '. $getToken['secret_code'] . ' user_id: '. $getToken['user_id']);
                // redirect user to login page
                $this->render->_flashdata('msg_error', 'Internal server error failed reset password. Please try again later.');
                redirect('login');
            }
            
        } else {
            // show validation error
            $this->render_lib->_flashdata('msg_error', validation_errors());
        }
        // load reset account view
        $this->render_lib->global_view($page_title, $page_view, $data);
    }


    /**
     * User Dashboard
     * @return void
     */
    public function dashboard()
    {
        
        $page_title = "Dashboard";
        $page_view = "user/dashboard";
        // for testing purpose
        $data = array(
            'dump_session'  => $this->_getSession(),
            'countNews'     => $this->post->countPost(1),
            'countEvent'    => $this->post->countPost(2),
        );
        // load dashboar view
        $this->render_lib->user_view($page_title, $page_view, $data);
    }


    /**
     * User settings
     * @return void
     */
    public function settings()
    {
        $page_title = "Setting";
        $page_view = "user/settings";
        
        //encrypt user ID to generate token
        $sessionUserID  = $this->_getSession()['user_id'];
        $token          = $this->hash_lib->doEncrypt($sessionUserID);

        $data = array(
            'personal_detail'   => $this->user->getUserDetail($this->_getSession()['user_id']),
            'token'             => $token,
            'form_email_resend_verification' =>  form_open('user/resend_verification'),
            'form_update_email' => form_open('user/update_email'),
            'form_update_pswd'  => form_open('user/update_pswd'),
            'form_upload_profile_img' => form_open_multipart('user/uploadProfileImg'),
            'form_close'        => form_close(), 
        );
        // load setting view
        $this->render_lib->user_view($page_title, $page_view, $data);
    }
    

    /**
     *  Upload profile image
     *  @return void 
     */
    public function uploadProfileImg()
    {
        $getField_name = "img_upload";
        // upload image code = 1
        $uploadImg = $this->upload_lib->doUpload('1', $getField_name);

        if($uploadImg['status'] == true){
            $uploadDetail = array(
                'profile_img'   => $uploadImg['img_name'] ,
                'user_id'       => $this->_getSession()['user_id'], 
            );
            $uploadStatus = $this->user->updateProfileImg($uploadDetail);

            if ($uploadStatus == false) {
                log_message('error','function_name: uploadProfileImg, msg: upload image to database return false. detail: user_id: ' . $uploadDetail['user_id'] . ' img_name: ' . $uploadDetail['profile_img']);
                $this->render_lib->_flashdata('msg_error', 'Please try again.');
                redirect('user/settings');
            }else {
                $this->render_lib->_flashdata('msg_noti', 'Your profile image has been successfully updated.');
                redirect('user/settings');
            }
        }else {
            $this->render_lib->_flashdata('msg_error', $uploadImg['error_msg']);
            redirect('user/settings');
        }
    }


    /**
     *  Remove profile image
     * 
     */
    public function removeProfileImg(string $imgName = NULL)
    {   
        // set full file/image path
        $imgPath = $this->config->item('upload_path', 'upload_img_settings') . $imgName;
        if (file_exists($imgPath) && $imgName != NULL) {
            $UserImg = array(
                'user_id'       => $this->_getSession()['user_id'], 
                'profile_img'   => NULL,
            );
            // update user profile image database
            $removeImg = $this->user->updateProfileImg($UserImg);
            // remove/delete image from storage
            unlink($imgPath);
            if ($removeImg == true) {
                $this->render_lib->_flashdata('msg_noti', 'Profile picture removed successfully.');                
                redirect('User/settings');
            } else {
                $this->render_lib->_flashdata('msg_noti', 'Internal server error, Failed remove profile image. Please try again later.');                
                redirect('User/settings');
            }
            
        }else {
            
            $this->render_lib->_flashdata('msg_error', 'File does\'t exist.');
            log_message('error','function_name: removeProfileImg, Detail: parameter NULL or file not exist.');
            redirect('user/settings');
        }

    }

    /**
     * Resend email verification
     * @return void
     */
    public function resend_verification()
    {
        // input validation
        $resendVerifyValidation = $this->validation_lib->getResendVerify()['resend_verify_validation'];
        $this->form_validation->set_rules($resendVerifyValidation);
        
        // run validation
        if ($this->form_validation->run() == true) {
            // return email
            $active_email = $this->validation_lib->getResendVerify()['resend_verify_detail'];
            //send email to verify
            $resendEmailVerify = $this->mail_lib->userVerify($active_email);

            if ($resendEmailVerify == true) {
                $this->render_lib->_flashdata('msg_noti', 'A confirmation email has been sent to your email follow the instructions in the message we sent you.');
                redirect('User/settings');
            } else {
                // log error
                log_message('error','function_name: resend_verification, msg: error resend email verification. user_detail: ' . $active_email);
                // redirect to settings            
                $this->render_lib->_flashdata('msg_error', 'Server error could not Re-send email verification, please try again.');
                redirect('User/settings');
            }
            
        } else {
            // redirect to settings
            $this->render_lib->_flashdata('msg_error', validation_errors());
            redirect('User/settings');
        }
        
    }


    /**
     * update user email function
     * 
     *  @return void
     */
    public function update_email()
    {
        // validation
        $updateEmailValidation = $this->validation_lib->updateEmail()['update_email_validation'];
        $this->form_validation->set_rules($updateEmailValidation);

        // run validation
        if ($this->form_validation->run() == true) {
            // return email
            $EmailDetail = $this->validation_lib->updateEmail()['update_email_detail'];
            // update email in database
            $updateEmail = $this->user->updateEmail($EmailDetail);

            if ($updateEmail == true) {
                //send email verification to new email
                $sendEmailVerify = $this->mail_lib->userVerify($EmailDetail['email']);
                
                if ($sendEmailVerify == true) {                   
                    // show msg pop up
                    $this->render_lib->_flashdata('msg_noti', 'Your email has been successfully updated, please verify your new email.');
                    // redirect
                    redirect('User/settings');
                } else {
                    // show msg pop up
                    $this->render_lib->_flashdata('msg_error', 'Failed send email verfication. Please click button Resend to request new email verification');
                    // log error
                    log_message('error','function_name: update_email, msg: Failed send email to '. $EmailDetail['new_email']);
                    // redirect to settings
                    redirect('User/settings');
                }
            } else {
                // show msg_error failed update email to databse
                $this->render_lib->_flashdata('msg_error', 'Error updating your email. Please try again later.');
                redirect('User/settings');
            }
        } else {
            // show msg_error validation error
            $this->render_lib->_flashdata('msg_error', validation_errors());
            redirect('User/settings');
        }
        
    }


    /**
     *  Update user password function
     * 
     *  @return void
     */
    public function update_pswd()
    {
        // get username & email
        $queryUser_detail = $this->user->getUserDetail($this->_getSession()['user_id']);

        // validation
        $updatePswdValidation = $this->validation_lib->updatePswd()['pswd_validation'];
        $this->form_validation->set_rules($updatePswdValidation);

        // run validation
        if ($this->form_validation->run() == true) {
            $updatePswdDetail = $this->validation_lib->updatePswd()['pswd_detail'];
            
            $updatePswd = $this->user->updatePswd($updatePswdDetail, true);
            
            //get detail from user session
            
             /**
             *  BUG
             *  after user updating email, email notification will not effect to latest updated email. send noti thourgh old email. 
             *  Cause data email is  saved from session. 
             *  Step to reproduce:
             *  1) update email
             *  2) update password
             *  expectaction: after update password, mail notification about password is change will go to updated email.
             *  Error: use old email instead.
             * 
             *  BUG IS FIXED 27/02/2019
             *  Change session to database query. 
             */
            
             $acc_detail = array(
                'username'  => $queryUser_detail[0]->username, 
                'email'     => $queryUser_detail[0]->email, 
            );

            if ($updatePswd['status'] == true) {

                //send password notification update
                $sendNoti = $this->mail_lib->chnge_pswd($acc_detail);
                
                //log error if noti not send through email
                if ($sendNoti == false) {
                    // log error
                    log_message('error','function name: update_pswd, msg: error send change password notification. User_detail: username: '. $acc_detail['username'] . ' email: ' . $acc_detail['email']);
                    
                }
                // Show notification
                $this->render_lib->_flashdata('msg_noti', 'Your password has been successfully updated');
                redirect('User/settings');
            } else {
                // Notify user if old password is not match
                $this->render_lib->_flashdata('msg_error', $updatePswd['msg']);
                redirect('User/settings');
            }
            
        } else {
            $this->render_lib->_flashdata('msg_error', validation_errors());
            redirect('User/settings');
        }
    }


    /**
     * Email confirmation
     */
    public function email_verify($sha1_str)
    {
        // verified email
        $getVerify = $this->user->getEmailVerify($sha1_str);
        // redirect user to login if session is not exist/expired
        if($this->_getSession() != false){
            $link = 'user/dashboard';
        }else{
            $link = 'login';
        }

        if ($getVerify == true) {
            $this->render_lib->_flashdata('msg_noti', 'Your email has been successfully verified.');
            redirect($link);
        } else {
            $this->render_lib->_flashdata('msg_error', 'Invalid token.');
            
            log_message('error','function name: email_verify, Error msg: Invalid token/ Email not exist in database. Hash_code: ' . $sha1_str);
            
            redirect($link);
        }
        
    }
}

/* End of file User.php */