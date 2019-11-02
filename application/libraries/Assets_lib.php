<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter 3.1.10
 *
 *
 *
 * @package     Assets Library
 * @author      Jairon Landa
 * @version     Version 2.0
 *  
 */
// ------------------------------------------------------------------------


class Assets_lib
{
    protected  $type_css = 'css';
    protected  $type_js = 'js';
    protected  $type_link = 'link';
    protected  $type_cdn = 'cdn';
    protected  $template = '';
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     *  Get js/css template to generate
     * 
     */
    public function _get_template($template_type, $source_list)
    {
        
        //Get template type
        if ($template_type == $this->type_css) 
        {
            //css template
            $this->template = "<link rel='stylesheet' href='".base_url(). $this->CI->config->item('css_location') ."{location}/{file}'>";
            
        }
        elseif ($template_type == $this->type_js) 
        {
             //js template
            $this->template = "<script src='".base_url(). $this->CI->config->item('js_location') . "{location}/{file}'></script>";
        }
        elseif ($template_type == $this->type_link) 
        {
            //google font template
            $this->template = "<link rel='stylesheet' href='{url}'>";
        }
        elseif ($template_type == $this->type_cdn){
            //cdn template
            $this->template = "<link rel='stylesheet' href='{url}' integrity='{integrity}' crossorigin='{crossorigin}'>";
        }
        else 
        {
            //error
            echo "Source not exist";
            exit;
        }
        
        return $this->gen_template($this->template, $source_list);

    }

    /**
     *  Generate css/js URL based on type
     * 
     */
    private function gen_template($template, $source_list)
    {
        $temp = '';
        foreach ($source_list as $create_list) {
            $temp .= $this->CI->parser->parse_string($template, $create_list, true);
        }
        return $temp;

    }

    
    /* 
    *    Load CSS file based on falcon_engine config
    *
    */
    public function getGlobalCSS()
    {
        $css_item  = $this->CI->config->item('css');
        return $this->_get_template($this->type_css, $css_item);
    }

    
    /*
    *   Load JS file based on falcon_engine config
    * 
    */
    public function getGlobalJS()
    {
        $js_item = $this->CI->config->item('js');
        return $this->_get_template($this->type_js, $js_item);
    }

    // ------------------------------------------------------------------------
    
    /*
    *   Load link based on falcon_engine config
    *
    */
    public function getURL()
    {
        return $this->_get_template($this->type_link, $this->CI->config->item('link'));
    }
}

?>