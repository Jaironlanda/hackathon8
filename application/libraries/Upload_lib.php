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
*   Upload Library
*/
class Upload_lib
{
    public function __construct()
    {
        $this->CI =& get_instance();
    }
    

    /**
    *   Image upload configuration
    *   @return array()
    *
    */
    private function uploadImg()
    {
        return  $this->CI->upload->initialize($this->CI->config->item('upload_img_settings'));         
    }

    
    

    /**
     *  File upload configuration
     *  @return array()
     * 
     */
    private function uploadFile()
    {
        return $this->CI->upload->initialize($this->CI->config->item('upload_img_settings'));
    }


    /**
     *  Get file type and setup configuration
     *  @param string
     *  @return array
     */
    private function getConfig(string $type)
    {
        if ($type == '1') {
            // Image upload config
            return $this->uploadImg();

        }elseif ($type == '2') {
            // File upload config
            return $this->uploadFile();
        }else {
            // Die in peace
        }
        
    }

    /**
     *  How upload and manipulate image work?
     *  1) set upload config overwrite to true
     *  2) once image uploaded successfuly image will crop in same path folder (uploads/profile) 
     *  3) After image is successfuly crop it will saved in uploads/profile path
     */

    /**
     *  Process upload data
     *  @param string, string
     *  @return array
     */
    public function doUpload($type, $item)
    {
        // Load configuration based on type
        $this->getConfig($type);

        if (!$this->CI->upload->do_upload($item)) {
            $uploadError = array(
                'status'    => false , 
                'error_msg' => $this->CI->upload->display_errors()
            );
            
            log_message('error','upload image failed, Detail: ' . $uploadError['error_msg']);
            return $uploadError;
        } 
        else {
            $uploadData = $this->CI->upload->data();
            // save to databse
            $imgData = array(
                'status'    => true,
                'img_name'  => $uploadData['file_name'], 
            );
            // perform image manipulation/crop
            $this->cropImg($uploadData['file_name']);
            return $imgData;
        }
    }


    /**
     *  Crop image
     *   @return boolean
     */
    private function cropImg(string $filename)
    {
        // set full path of image
        $filepath = $this->CI->config->item('upload_path','upload_img_settings');
        $sourceImg = array(
            'source_image'  => $filepath . $filename, 
        );
        $cropConfig = array_merge($this->CI->config->item('crop_img_settings'), $sourceImg);
        $this->CI->image_lib->initialize($cropConfig);

        // log error if failed operation
        if (!$this->CI->image_lib->resize()) {
            $cropError = array(
                'status'    => false , 
                'error_msg' => $this->CI->image_lib->display_errors()
            );
            log_message('error','Failed resize image. Detail: ' . $cropError['error_msg']);
        }
        
    }

    // ------------------------------------------------------------------------
}
?>