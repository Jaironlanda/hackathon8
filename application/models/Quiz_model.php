<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    /**
     * Get single question
     */
    public function getQuiz(int $id)
    {
        // $this->db->from('question');
        $this->db->select('
            question.ques_id, 
            question.ques_image, 
            question.question,
            answer.ans_id, 
            answer.ques_id,
            answer.answer, 
            answer.personality_lvl, 

        ');
        $this->db->from('question');
        $this->db->where('question.ques_id', $id);
        $this->db->join('answer', 'answer.ques_id = question.ques_id');
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }

    /**
     * Add quiz
     * @return boolean
     */
    public function addQuiz(array $data)
    {
        $this->db->insert('question', $data);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Delete quiz
     * @return boolean
     */
    public function deleteQuiz(int $id)
    {
        $this->db->delete('question');
        $this->db->where('ques_id', $id);
        $query = $this->db->get();
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Edit quiz
     * @return boolean
     */
    public function editQuiz(array $data)
    {
        $this->db->set('question', $data['question']);
        $this->db->where('ques_id', $data['ques_id']);
        $this->db->update('question');

        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    /**
     * Index quiz
     * @return array
     */
    public function indexQUiz()
    {
        $this->db->from('question');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }
}

?>