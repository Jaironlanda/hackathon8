<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    /**
     * Index all news and event based post type id
     */
    public function index(int $postTypeID)
    {
        $this->db->select('
            user.user_id, 
            user.username, 
            user.email,
            post.post_id,
            post.post_type_id,
            post.post_title,
            post.post_date,
            post.post_content
        ');
        
        $this->db->where('post.post_type_id', $postTypeID);
        $this->db->from('post');
        $this->db->join('user', 'user.user_id = post.user_id');
        
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else {
            return false;
        }
    }

    /**
     * count rows post
     */
    public function countPost(int $postTypeID)
    {
        $this->db->where('post_type_id', $postTypeID);
        $this->db->from('post');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * insert data in database
     */
    public function createPost($data)
    {
        $this->db->insert('question', $data);
    }

    /**
     * Update data in database
     */
    public function updatePost($data)
    {
        $this->db->update('question', $data);
        
    }

    /**
     * view Post
     */
    public function viewPost(int $postID)
    {
        $this->db->select('
            user.user_id,
            user.username, 
            user.email,
            post.post_id,
            post.post_date, 
            post.post_title,
            post.post_content,
            post.post_type_id,
            post_type.post_name
        ');
        
        $this->db->where('post_id', $postID);
        $this->db->from('post');
        $this->db->join('user', 'user.user_id = post.user_id');
        $this->db->join('post_type', 'post_type.post_type_id = post.post_type_id');
        
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }else {
            return false;
        }
    }

    /**
     * Delete single data in database
     */
    public function deletePost(int $postID)
    {
        $this->db->where('ques_id', $postID);
        $this->db->delete('question');
        if($this->db->affected_rows() > 0){
            return true;
        }else {
            return false;
        }
    }


}

/* End of file Post_model.php */

?>