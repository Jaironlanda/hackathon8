<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter 3.1.10
 *
 *
 *
 * @package     CodeIgniter
 * @author      Jairon Landa
 * @version     Version 2.0
 *  
 */
// ------------------------------------------------------------------------

/*
*   RenderView Library
*/
class Render_lib
{
    public function __construct()
    {
        $this->CI =& get_instance();
    }


    /*
    * Flash notification function
    * msg_error   = error message
    * msg_noti    = success message
    * msg_warning = warning message
    */
    
    /**
     *  System notification
     *  @param 
     *  @return flashdata
     */
    public function _flashdata($noti_lvl, $noti_txt)
    {
        return $this->CI->session->set_flashdata($noti_lvl, $noti_txt);
    }

    
    /**
     *  Load frontend alert
     *  @return view
     */
    private function render_alert()
    {
        //alert
        return $this->CI->load->view($this->CI->config->item('alerts_view_path'));   
    }
    
    
    /**
     *  Render html and data into one view
     *  ref: https://www.codeigniter.com/userguide3/libraries/parser.html
     */
    
    /**
     *  Global view
     * 
     *  @param string
     *  @param string
     *  @param array
     *  @return mixed
     */
    public function global_view($title, $body_view, $body_data)
    {
        // Header assets and title
        $header_data = array(
            'title'             => $title ,
            'global_css'        => $this->CI->assets_lib->getGlobalCSS(),
            'global_css_link'   => $this->CI->assets_lib->getURL(),
        );

        // Footer assets
        $footer_data = array(
            'global_js'         => $this->CI->assets_lib->getGlobalJS(), 
        );

        //header
        $this->CI->parser->parse($this->CI->config->item('header','global_view_path'), $header_data);
        
        //alert
        // $this->render_alert();
        
        //body
        $this->CI->parser->parse($body_view, $body_data);
        
        //footer
        $this->CI->parser->parse($this->CI->config->item('footer','global_view_path'), $footer_data);
    }

    /**
     * For login and register
     */
    public function loginRegister_view($title, $body_view, $body_data)
    {
        // Header assets and title
        $header_data = array(
            'title'             => $title ,
            'global_css'        => $this->CI->assets_lib->getGlobalCSS(),
            'global_css_link'   => $this->CI->assets_lib->getURL(),
        );

        // Footer assets
        $footer_data = array(
            'global_js'         => $this->CI->assets_lib->getGlobalJS(), 
        );

        //header
        $this->CI->parser->parse($this->CI->config->item('header','global_view_path'), $header_data);
        
        //alert
        $this->render_alert();
        
        //body
        $this->CI->parser->parse($body_view, $body_data);
        
        //footer
        $this->CI->parser->parse($this->CI->config->item('footer','global_view_path'), $footer_data);
    }
    

    /**
     *  User view
     * 
     *  @param string
     *  @param string
     *  @param string
     *  @return mixed
     */
    public function user_view($title, $body_view, $body_data)
    {   
        // Header assets and title
        $header_data = array(
            'title'        => $title ,
            'global_css'   => $this->CI->assets_lib->getGlobalCSS(),
        );

        // Footer assets
        $footer_data = array(
            'global_js'    => $this->CI->assets_lib->getGlobalJS(),
            // 'user_js_link'      => $this->CI->assets_lib->getUserJS(), 
        );

        //header
        $this->CI->parser->parse($this->CI->config->item('header','user_view_path'), $header_data);
        
        //alert
        $this->render_alert();
        
        //body
        $this->CI->parser->parse($body_view, $body_data);
        
        //footer
        $this->CI->parser->parse($this->CI->config->item('footer','user_view_path'), $footer_data);
    }
}

?>