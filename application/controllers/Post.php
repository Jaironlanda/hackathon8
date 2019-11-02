<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    /**
     * Index News and event based on post type id
     * 
     */
    public function index(int $postTypeID)
    {

        $page_title = "Index " . $this->postTypeName($postTypeID);
        $page_view = "post/index";

        $data = array(
            'listPost'  => $this->post->index($postTypeID) ,
            'indexName' => $this->postTypeName($postTypeID)
        );

        //render view
        $this->render_lib->user_view($page_title, $page_view, $data);
    }
    
    public function create()
    {
        $page_title = "Create Post";
        $page_view = "post/create";

        $data = array(
            'form_create_post' => form_open() ,
            'form_close' => form_close(), 
        );

        // validation
        $createPostValidation = $this->validation_lib->getCreatePost()['create_post_validation'];
        $this->form_validation->set_rules($createPostValidation);
        
        if($this->form_validation->run() == true){
            $savePost = $this->validation_lib->getCreatePost()['create_post_detail'];
            $this->post->createPost($savePost);
            $this->render_lib->_flashdata('msg_noti', 'Success create post');           
            redirect('Post/create');
 
        }else{
            // redirect to settings
            $this->render_lib->_flashdata('msg_error', validation_errors());
            // redirect('Post/create');
        }
        

       //render view
       $this->render_lib->user_view($page_title, $page_view, $data);
    }

    public function edit(int $postID)
    {
        $page_title = "Edit Post";
        $page_view = "post/edit";

        $data = array(
            'form_edit_post' => form_open() ,
            'form_close' => form_close(),
            'getPost' => $this->post->viewPost($postID) 
        );

        //validation
        $updatePostValidation = $this->validation_lib->getUpdatePost()['update_post_validation'];
        $this->form_validation->set_rules($updatePostValidation);
        
        if($this->form_validation->run() == true){
            $updatePost = $this->validation_lib->getUpdatePost()['update_post_detail'];
            $this->post->updatePost($updatePost);
            $this->render_lib->_flashdata('msg_noti', 'Success update post');           
            redirect('Post/edit/'.$postID);
 
        }else{
            // redirect to settings
            $this->render_lib->_flashdata('msg_error', validation_errors());
            // redirect('Post/create');
        }
        $this->render_lib->user_view($page_title, $page_view, $data);
    }
    
    public function view(int $postTypeID,int $postID)
    {
        $page_title = $this->postTypeName($postTypeID);
        $page_view = "post/view";
        
        $data = array(
            'postContent' => $this->post->viewPost($postID) , 
        );
        //render view
        $this->render_lib->global_view($page_title, $page_view, $data);
    }

    public function deletePost(int $postTypeID, int $postID)
    {
        $deleteItem = $this->post->deletePost($postID);
        if($deleteItem == true){
            $this->render_lib->_flashdata('msg_noti', 'Success delete post.');
            redirect('Post/index/'.$postTypeID);
        }else {
            $this->render_lib->_flashdata('msg_error', 'Failed delete post, not exist.');
            redirect('Post/index/'.$postTypeID);
        }
    }

    /**
     * Get post type ID name
     * @return string
     */
    private function postTypeName(int $postTypeID)
    {
        if($postTypeID == 1){
            $nameType = "News";
        }else{
            $nameType = "Event";
        }
        return $nameType;
    }

}

/* End of file Post.php */

?>