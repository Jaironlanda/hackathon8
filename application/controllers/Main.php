<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Main page
     */
    public function index()
    {
        $page_title = "Zoo Zoo";
        $page_view ="main_index_zoo";
        $data = array(
            // 'listNews'  => $this->post->index(1) ,
            // 'listEvents' => $this->post->index(2)
        );
        $this->render_lib->global_view($page_title, $page_view, $data);
    }

    /**
     * Quiz
     * @param int
     */
    public function quiz(int $id)
    {
        $page_title = "Quiz " . $id;
        $page_view = "quizzz";

        //get next page
        $sumNext = $id + 1;
        
        if($sumNext == '10'){
            redirect('main/result');
        }

        $data = array(
            'form_submitQuiz' => form_open(),
            'form_close'      => form_close(),
            'question'        => $this->quiz->getQuiz($id),
            'nextBtn'         => $sumNext,
        );


        $this->render_lib->global_view($page_title, $page_view, $data);
    }

    /**
     * Result
     */
    public function result()
    {
        $page_title = "Result";
        $page_view = "result";

        //fucking random number
        $score = rand(80, 100);

        //my prediction about your inner rhino
        $myRhino = array(
            "Delilah",
            "Harapan",
            "Andatu",
            "Ratu",
            "Bina",
            "Rosa", 
        );

        $rhinoInfo = array(
            "Delilah" => "Adventurous",
            "Harapan" => "Adventurous",
            "Andatu" => "Independent/ Strong willed",
            "Ratu" => "Independent/ Strong willed",
            "Bina" => "Gentle & Kind",
            "Rosa" => "Gentle & Kind", 
        );
        $rand_rhino = array_rand($myRhino, 2);

        $data = array(
            'count' => $score,
            'myRhino' => $myRhino[$rand_rhino[0]],
            'rhinoInfo' => $rhinoInfo[$myRhino[$rand_rhino[0]]],
        );
        $this->render_lib->global_view($page_title, $page_view, $data);
    }

    /**
     * Frontpage index 
     */
    public function listPost(int $postTypeID)
    {
        $page_title = "List";
        $page_view ="listPost";

        $data = array(
            'listPost'  => $this->post->index($postTypeID)
        );

        $this->render_lib->global_view($page_title, $page_view, $data);

    }

    /**
     * Search forntpage
     */
    public function search()
    {
        $page_title = "Search ";
        $page_view = "searchPost";

        
        // validation
        $SearchValidation = $this->validation_lib->getSearchPost()['search_post_validation'];
        $this->form_validation->set_rules($SearchValidation);
        
        if ($this->form_validation->run() == true){
            $input = $this->validation_lib->getSearchPost()['search_post_detail'];
            
            $data = array(
                'listFound' => $this->post->searchPost($input), 
            );
            $this->render_lib->global_view($page_title, $page_view, $data);
        } else {
            //
        }
        // $this->render_lib->global_view($page_title, $page_view, $data);

    }

}

/* End of file Main.php */
