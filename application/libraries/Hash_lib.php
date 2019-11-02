<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter 3.1.10
 *
 *
 *
 * @package     Hash Library
 * @author      Jairon Landa
 * @version     Version 1.0
 *  
 */
// ------------------------------------------------------------------------

class Hash_lib
{
    private $resetPswdToken = '1';
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    
    /**
     * Hash email 
     */
    public function hash_email(string $email = NULL)
    {
        //ref: http://php.net/manual/en/function.hash.php
        $algo = $this->CI->config->item('email_hash');
        return hash($algo, $email);
    }

    // ------------------------------------------------------------------------


    /**
     *  Generate token for reset password
     *  @param int
     *  @return array();
     */
    public function reset_pswd_token(int $user_id)
    {
        $algo = $this->CI->config->item('reset_pswd_hash');
        //so secret, very secure.
        $secret_code = substr($algo(rand()), 0, 30);
        //generate date
        $date = date('Y-m-d');
        
        $compile_token = array(
            'user_id'           => $user_id,
            'token_type_id'     => $this->resetPswdToken,
            'token_code'        => $secret_code,
            'datetime_created'  => $date 
        );

        //concat secret_code and user_id
        $concat = $secret_code . $user_id;
        
        //encrypt $concat
        $encrypt_token = $this->base64url_encode($concat);
        
        $get_token = array(
            //store to database user_tokens table
            'compile_token' => $compile_token,
            //set as email url
            'encrypt_token' => $encrypt_token
        );
        
        return $get_token;  
    }

    // ------------------------------------------------------------------------

    /**
     *  Decrypt token
     *  @param string
     *  @return array()
     */
    public function decrypt_token(string $encrypt_token = NULL)
    {
        $decrypt = $this->base64url_decode($encrypt_token);
        $get_secret_code = substr($decrypt, 0, 30);
        $get_user_id = substr($decrypt, 30);
        
        $extract_code = array(
            'secret_code' => $get_secret_code, 
            'user_id'     => $get_user_id
        );
        return $extract_code;
    }

    // ------------------------------------------------------------------------

    /**
     *  Codeigniter encryption library
     *  ref: https://codeigniter.com/user_guide/libraries/encryption.html#CI_Encryption::encrypt
     *  @param string
     *  @return string
     */
    public function doEncrypt(string $data = NULL)
    {
        return $this->CI->encryption->encrypt($data);
    }

    
    /**
     *  Codeigniter decryption library
     *  ref: https://codeigniter.com/user_guide/libraries/encryption.html#CI_Encryption::decrypt
     *  @param string
     *  @return string
     */
    public function doDecrypt(string $data = NULL)
    {
        return $this->CI->encryption->decrypt($data);
    }

    // ------------------------------------------------------------------------
    

    /**
     *  PHP base64 decoded
     *  ref : http://php.net/manual/en/function.base64-decode.php#71583
     *  @param string
     *  @return string
     */
    private function base64url(string $data_url = NULL)
    {
        $base64 = strtr($data_url, '-_', '+/');
        return $base64;
    }

    // ------------------------------------------------------------------------
    

    /**
     *  PHP base64 decoded
     *  ref : http://php.net/manual/en/function.base64-encode.php
     *  @param string
     *  @return string
     */
    public function base64_Encrypt(string $data = NULL)
    {
        return base64_encode($data);
    }

    // ------------------------------------------------------------------------


    /**
     *  PHP base64 decoded
     *  ref : http://php.net/manual/en/function.base64-decode.php
     *  @param string
     *  @return string
     */
    public function base64_Decrypt(sting $data = NULL)
    {
        return base64_decode($data);
    }

    // ------------------------------------------------------------------------


    /**
     *  PHP base64 encode
     *  ref : http://php.net/manual/en/function.base64-encode.php#103849
     *  @param string
     *  @return string
     */
    private function base64url_encode(string $data = NULL)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function base64url_decode(string $data = NULL) 
    { 
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }

    // ------------------------------------------------------------------------
    

    /**
     *  PHP password_hash function
     *  ref: http://php.net/manual/en/faq.passwords.php
     *  @param string
     *  @return mixed
     */
    public function auth_hash_pswd(string $pswd = NULL)
    {
        return password_hash($pswd, $this->CI->config->item('pswd_hash_setting'));
    }

    /**
     *  PHP password_verify function
     *  ref: http://php.net/manual/en/function.password-verify.php
     *  @param string
     *  @return mixed
     */
    public function auth_hash_verify(string $string = NULL, string $hash = NULL)
    {
        return password_verify($string, $hash);
    }

}
/*End*/