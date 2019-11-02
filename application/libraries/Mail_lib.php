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
*   Email Library
*/
class Mail_lib 
{
    
    /**
     *  EMAIL CONFIG
     */
    private $mail_config   = array();

    function __construct()
    {
        $this->CI =& get_instance();

        //configure email settings
        $this->mail_config = array(
            'protocol'      => $this->CI->config->item('smtp_protocol'),
            'smtp_host'     => $this->CI->config->item('smtp_host'),
            'smtp_port'     => $this->CI->config->item('smtp_port'),
            'smtp_user'     => $this->CI->config->item('smtp_user'),
            'smtp_pass'     => $this->CI->config->item('smtp_pass'),
            'mailtype'      => $this->CI->config->item('email_mailtype'),
            'charset'       => $this->CI->config->item('email_charset'),
            'wordwrap'      => $this->CI->config->item('email_wordwrap'),
            'newline'       => $this->CI->config->item('email_newline'),
            'smtp_crypto'   => $this->CI->config->item('email_smtp_crypto'),
        );
        
    }


    /**
     *  Compile email
     *  @param array
     *  @return boolean
     */
    public function compileMail($data)
    {
        //initialize email settings
        $this->CI->email->initialize($this->mail_config);
        //send mail
        $this->CI->email->from($this->CI->config->item('smtp_user'), $this->CI->config->item('email_name'));
  		$this->CI->email->to($data['email']);
  		$this->CI->email->subject($data['subject']);
  		$this->CI->email->message($data['message']);

        if ($this->CI->email->send())
        {
            return true;
        }
        else {
            return false;
        }
        
    }

    /**
     *  User email verification
     * 
     *  @param string email
     *  @return boolean
     */
    public function userVerify(string $email = NULL)
    {
        //email subject
        $subject = "Verify your Email";

        //link for user click
        $verify_url = base_url() . 'User/email_verify/'. $this->CI->hash_lib->hash_email($email);
        //compile msg with user verify url
        $message = "Hi, <br> Click or copy and paste link  below to verify your account <br><br>".$verify_url;
        
        $email_content = array(
            'email'     => $email,
            'subject'   => $subject, 
            'message'   => $message,
        );

        return $this->compileMail($email_content);
    }

    /**
     *  User reset password email
     *  
     *  @param array
     *  @return boolean
     */
    public function resetPswd($user_data)
    {
        $subject = "Reset Password";
        $addon_url = $user_data['encrypt_token'];
        $define_lvl = "user";
        
        
        $intro = "Hi,<br><br>";
        $content_1 = "We received a request to reset your password. 
                      You may click the button/link to choose your new password. 
                      if you did not make this request, you can safely ignore this email.";
        $link = base_url().$define_lvl.'/reset_password/'.$addon_url;
        $message = $intro . $content_1 . $link;

        $email_content = array(
            'email'     => $user_data['email'],
            'message'   => $message,
            'subject'   => $subject
        );
        return $this->compileMail($email_content); 

    }

    /**
     *  User update profile email notification
     *  
     *  @param int 
     *  @return boolean
     */
    public function updateprofile($user_id)
    {
        # code...
    }

    /**
     *  User login account email notification
     *  
     *  @param int
     */
    public function login_information($user_id)
    {
        # code...
    }

    /**
     *  Change password email notification
     * 
     *  @param array
     *  @return boolean
     */
    public function chnge_pswd($user_data)
    {
        $subject = "Change Password Info";

        $ip             = $this->CI->input->ip_address(); //user get user ip_address
        $browser        = $this->CI->agent->browser();  //get browser name
        $browser_ver    = $this->CI->agent->version(); //get version browser
        $platform       = $this->CI->agent->platform(); //get OS platform
        $date_update    = date("F j, Y, g:i a"); //date update


        $intro = "Hi ". $user_data['username'].", <br><br>";
        $content_1 = "Your account ".$user_data['email']." was just update password in from ".$browser. " on ".$platform." .<br><br>";
        $content_2 = "Operating System: ".$platform."<br> Browser: ".$browser ." Version: ".$browser_ver."<br> IP address: ".$ip." <br> Date and time: ".$date_update;
        $note = "<br><br>Why are we sending this? We take security very seriously and we want to keep you in the loop on important actions in your account.<br><br>";
        $sign = "<br><br><br>". $this->CI->config->item('email_sign') ."<br>".base_url();
        
        //compile all message
        $message   = $intro . $content_1 . $content_2 . $note . $sign;

        $email_content = array(
            'email'  => $user_data['email'],
            'message'       => $message,
            'subject'       => $subject
        );
        return $this->compileMail($email_content); 
    }


}
