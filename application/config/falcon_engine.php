<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
|   ASSET FOLDER LOCATION
|--------------------------------------------------------------------------
|   set default asstes folder location
|   exp: assets/css/custom
*/
$config['css_location'] = 'assets/';
$config['js_location']  = 'assets/';

/*
|--------------------------------------------------------------------------
|   CSS FILE & LOCATION
|--------------------------------------------------------------------------
|  set css file name and location
|
*/
$config['css'] = [
    [
        'file'  => 'bootstrap.min.css',
        'location' => 'bootstrap4/css',
    ],
    [
        'file'  => 'all.min.css',
        'location' => 'fontawesome5/css',
    ],
    [
        'file'  => 'custom.css',
        'location' => 'custom/css',
    ],
    [
        'file'  => 'sb-admin.min.css',
        'location' => 'custom/css',
    ],
    [
        'file'  => 'social-link-style.css',
        'location' => 'custom/css',
    ]    
];

/*
|--------------------------------------------------------------------------
|   JS FILE & LOCATION
|--------------------------------------------------------------------------
|  set js file name and location
|
*/
$config['js'] = [
    [
        'file'      => 'jquery.min.js',
        'location'  => 'jquery/js',
    ],
    [
        'file'      => 'bootstrap.bundle.min.js',
        'location'  => 'bootstrap4/js',
    ],
    [
        'file'      => 'sb-admin.min.js',
        'location'  => 'custom/js',
    ],
    [
        'file'       => 'custom.js', 
        'location'   => 'custom/js'
    ]
];

/*
|--------------------------------------------------------------------------
|   ASSET URL TYPE
|--------------------------------------------------------------------------
|  
|
*/
$config['link'] = [
    [
        'url' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'
    ]
];

/*
|--------------------------------------------------------------------------
|   ASSET CDN TYPE
|--------------------------------------------------------------------------
|  Refer: https://stackoverflow.com/questions/32039568/what-are-the-integrity-and-crossorigin-attributes
|
*/
$config['cdn'] = [
    [
        'url' => '',
        'integrity' => '',
        'crossorigin' => '',
    ],
];

/*
|--------------------------------------------------------------------------
|   EMAIL HASH ALGORITHM
|--------------------------------------------------------------------------
|   Set email hash algorithm
|   Refer: http://php.net/manual/en/function.hash.php
    default value => 'sha1'
*/
$config['email_hash'] = 'sha1';

/*
|--------------------------------------------------------------------------
|   RESET PASSWORD TOKEN HASH ALGORITHM
|--------------------------------------------------------------------------
|   Hash algorithm for reset password token.
|   Refer: http://php.net/manual/en/function.hash.php
|   default value = 'sha1';
*/
$config['reset_pswd_hash'] = 'sha1';

/*
|--------------------------------------------------------------------------
|   PHP PASSWORD HASH SETTING
|--------------------------------------------------------------------------
|  ref: http://php.net/manual/en/password.constants.php
|
*/
$config['pswd_hash_setting'] = PASSWORD_DEFAULT;

/*
|--------------------------------------------------------------------------
|   SMTP SETTINGS
|--------------------------------------------------------------------------
|   
|
*/
$config['smtp_protocol']        = 'smtp';
$config['smtp_host']            = 'smtp.mailtrap.io';
$config['smtp_port']            = '465';
$config['smtp_user']            = '5f155589d54d51';
$config['smtp_pass']            = 'b02e2e6bb20768';
$config['email_smtp_crypto']    = 'tls';


/*
|--------------------------------------------------------------------------
|   EMAIL SETTINGS
|--------------------------------------------------------------------------
|   
|
*/
$config['email_name']       = "Framework";
$config['email_sign']       = "Team Framework name";
$config['email_mailtype']   = "html";
$config['email_charset']    = "iso-8859-1";
$config['email_wordwrap']   = TRUE;
$config['email_newline']    = "\r\n";

/*
|--------------------------------------------------------------------------
|   RENDER VIEW
|--------------------------------------------------------------------------
|  
|
*/
// Alerts view
$config['alerts_view_path'] = 'global/alerts';
// Global view
$config['global_view_path'] = [
    'header' => 'global/layout/header',
    'footer' => 'global/layout/footer'
];
// User view
$config['user_view_path'] = [
    'header' => 'user/layout/header',
    'footer' => 'user/layout/footer'
];

/*
|--------------------------------------------------------------------------
|   UPLOAD FILE
|--------------------------------------------------------------------------
|  
|   Please refer Codeigniter 3 doc: https://www.codeigniter.com/userguide3/libraries/file_uploading.html#preferences
|   $config['upload_img'] for upload image configuration
|   $config['upload_file] for upload file configuration
|
*/
// Please check user/setting view if you want make change to accept file
$config['upload_img_settings'] = [
    
    'upload_path'   => "./uploads/profile/",
    'allowed_types' => 'jpg|png|jpeg',
    'max_size'      => 0,
    'overwrite'     => true,
    'remove_spaces' => true,
    'encrypt_name'  => true,

];

$config['upload_file_sttings'] = [
    
    'upload_path'   => './uploads/file/',
    'allowed_types' => 'doc|docx|pdf|txt',
    'max_size'      => 0,
];

/*
|--------------------------------------------------------------------------
|   CROP IMAGE
|--------------------------------------------------------------------------
|   Please refer to Codeigniter 3 doc: https://www.codeigniter.com/userguide3/libraries/image_lib.html
|
*/
$config['crop_img_settings'] = [

    'image_library'     => 'gd2',
    'maintain_ratio'    => false,
    'quality'           => '100%',
    'width'             => '250',
    'height'            => '250',
];

/* End of file falcon_engine.php */
