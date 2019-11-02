<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter 3.1.10
 *
 *
 *
 * @package     CodeIgniter
 * @author      Jairon Landa
 * @version     Version 1.0
 *  
 */
// ------------------------------------------------------------------------

/*
*   Assets Library
*/
class Validation_lib
{
    
    public  function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     *  User login validation
     *  @return array
     * 
     */
    public function getLogin()
    {
        $getLoginDetail = array(
            'email' => $this->CI->input->post('user_email') ,
            'pswd'  => $this->CI->input->post('user_pswd'), 
        );

        $getLoginValidation = array(
            array(
                'field' => 'user_email',
                'label' => 'Email',
                'rules' => 'trim|valid_email',
            ),
            array(
                'field' => 'user_pswd',
                'label' => 'pswd',
                'rules' => 'trim', 
            ),
        );

        $LoginStatus = array(
            'login_validation'  => $getLoginValidation,
            'login_detail'      => $getLoginDetail, 
        );

        return $LoginStatus;
    }

    
    /**
     *  User registeration validation
     *  @return array
     */
    public function getRegister()
    {
        //get input 
        $getRegisterDetail = array(
            'username'      => $this->CI->input->post('username'),
            'email'         => $this->CI->input->post('user_email'),
            'pswd'          => $this->CI->hash_lib->auth_hash_pswd($this->CI->input->post('user_pswd')),             
            'reg_datetime'  => date('Y-m-d H:i:s'),
        );

        //validation
        $getRegisterValidation = array(
            array(
                'field'  => 'username',
                'label'  => 'Username',
                'rules'  => 'trim|required|is_unique[user.username]',
                'errors' => array(
                        'is_unique' => 'Username <b>'.$getRegisterDetail['username'].'</b> already exists.', 
                    )
            ),
            array(
                'field'  => 'user_email',
                'label'  => 'E-mail',
                'rules'  => 'trim|required|valid_email|is_unique[user.email]', 
                'errors' => array(
                        'is_unique' => 'Email <b>'.$getRegisterDetail['email'].'</b> already exists bla bla 123.', 
                    )
            ),
            array(
                'field'  => 'user_pswd',
                'label'  => 'Password',
                'rules'  => 'trim|required',
            )
        );
        $getRegisterStatus = array(
            'reg_validation'    => $getRegisterValidation , 
            'reg_detail'        => $getRegisterDetail,
        );
        return $getRegisterStatus;
    }

    
    /**
     *  Forget password validation
     *  @return array
     * 
     */
    public function getForgotPswd()
    {
        $getForgotPswdDetail = array(
            'email' =>  $this->CI->input->post('email'),
        );

        $getForgotPswdValidation = array(
            array(
                'field'  => 'email',
                'label'  => 'Email',
                'rules'  => 'trim|valid_email|required', 
            ),
        );
        $getForgotPswdStatus = array(
            'forgot_pswd_validation'    => $getForgotPswdValidation , 
            'forgot_pswd_detail'        => $getForgotPswdDetail,
        );

        return $getForgotPswdStatus;
    }

       
    /**
     *  Resend email verification
     *  @return array
     * 
     */
    public function getResendVerify()
    {
        // $getResendVerifyDetail = array(
        //     'email' => $this->CI->input->post('active_email'), 
        // );
        $getResendVerifyDetail = $this->CI->input->post('active_email');

        $getResendVerifyValidation = array(
            array(
                'field'  => 'active_email',
                'label'  => 'Actve Email',
                'rules'  => 'trim',
            ),
        );

        $getResendVerifyStatus = array(
            'resend_verify_validation'  => $getResendVerifyValidation ,
            'resend_verify_detail'      => $getResendVerifyDetail, 
        );

        return $getResendVerifyStatus;
    }
    

    /**
     *  User update email validation
     *  @return array
     * 
     */
    public function updateEmail()
    {
        // decrypt user_id()
        $encrypted_user_id  = $this->CI->input->post('token');
        $user_id            = $this->CI->hash_lib->doDecrypt($encrypted_user_id);
        
        $getUpdateEmailDetail = array(
            'user_id' => $user_id, 
            'email'   => $this->CI->input->post('new_email'),
        );

        $getUpdateEmailValidation = array(
            array(
                'field'  => 'token',
                'label'  => 'token',
                'rules'  => 'trim',
            ),
            array(
                'field'  => 'new_email',
                'label'  => 'E-mail',
                'rules'  => 'trim|required|valid_email|is_unique[user.email]', 
                'errors' => array(
                        'is_unique' => 'Email <b>'.$getUpdateEmailDetail['email'].'</b> already exists.', 
                    )
            ),
        );
        $getUpdateEmailStatus = array(
            'update_email_validation'   => $getUpdateEmailValidation,
            'update_email_detail'       => $getUpdateEmailDetail, 
        );

        return $getUpdateEmailStatus;
    }


    /**
     *  Update password validation
     *  @return array 
     */
    public function updatePswd()
    {
        // decrypt user_id()
        $encrypted_user_id  = $this->CI->input->post('token');
        $user_id            = $this->CI->hash_lib->doDecrypt($encrypted_user_id);
        
        // get pswd
        $unencrypted_pswd   = $this->CI->input->post('new_pswd');

        $getUpdatePswdDetail = array(
            'user_id'   => $user_id, 
            'old_pswd'  => $this->CI->input->post('old_pswd'),
            'new_pswd'  => $this->CI->hash_lib->auth_hash_pswd($unencrypted_pswd),
        );

        $getPswdValidation = array(
            array(
                'field'  => 'token',
                'label'  => 'token',
                'rules'  => 'trim',
            ),
            array(
                'field'  => 'old_pswd',
                'label'  => 'old_pswd',
                'rules'  => 'trim|required',
            ),
            array(
                'field'  => 'new_pswd',
                'label'  => 'new_pswd',
                'rules'  => 'trim|required',
            ),
        );

        $pswdStatus = array(
            'pswd_validation'   => $getPswdValidation, 
            'pswd_detail'       => $getUpdatePswdDetail,
        );

        return $pswdStatus;
    }


    /**
     *  Reset user password
     *  @param string
     *  @return array
     * 
     */
    public function resetPswd(string $user_id = NULL)
    {
        $new_pswd = $this->CI->input->post('new_pswd');

        $getResetPswdDetail = array(
            'user_id'   => $user_id ,
            'new_pswd'  => $this->CI->hash_lib->auth_hash_pswd($new_pswd),
        );

        $getResetPswdValidation = array(
            array(
                'field'  => 'new_pswd',
                'label'  => 'New Password',
                'rules'  => 'trim|required',
            ),
        );

        $getResetPswdStatus = array(
            'resetPswd_validation'  => $getResetPswdValidation,
            'resetPswd_detail'      => $getResetPswdDetail, 
        );
        return $getResetPswdStatus;
    }

    // ------------------------------------------------------------------------

    public function getCreatePost()
    {
               
        
        $getCreatePostDetail = array(
            'question'      => $this->CI->input->post('question'), 
        );

        $getCreatePostValidation = array(

            array(
                'field'  => 'question',
                'label'  => 'question',
                'rules'  => 'trim|required',
            ),
        );

        $CreatePostStatus = array(
            'create_post_validation'   => $getCreatePostValidation, 
            'create_post_detail'       => $getCreatePostDetail,
        );

        return $CreatePostStatus;
    }

    public function getUpdatePost()
    {
               
        
        $getUpdatePostDetail = array( 
            'post_date'         => $this->CI->input->post('post_date'), 
            'post_title'        => $this->CI->input->post('post_title'), 
            'post_content'      => $this->CI->input->post('post_content'), 
        );

        $getUpdatePostValidation = array(
            array(
                'field'  => 'post_date',
                'label'  => 'post_date',
                'rules'  => 'trim|required',
            ),
            array(
                'field'  => 'post_title',
                'label'  => 'post_title',
                'rules'  => 'trim|required',
            ),
            array(
                'field'  => 'post_content',
                'label'  => 'post_content',
                'rules'  => 'trim|required',
            ),
        );

        $UpdatePostStatus = array(
            'update_post_validation'   => $getUpdatePostValidation, 
            'update_post_detail'       => $getUpdatePostDetail,
        );

        return $UpdatePostStatus;
    }

}

?>