
<!-- Main Content -->
<div class="container" style="padding-top: 50px;">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php 
        if($listPost !=false){
            foreach ($listPost as $post) {
               echo '
                <div class="post-preview">
                    <a href="'.base_url("Post/view/".$post->post_type_id."/".$post->post_id).'">
                    <h2 class="post-title">
                        '.$post->post_title.'
                    </h2>
                    </a>
                        <p class="post-meta">Posted by
                            '.$post->username.'
                        on '.date("d/m/Y",strtotime($post->post_date)).'</p>
                    </div>
                <hr>';
            }
        }else{
            echo 'nothing here';
        }
        ?>
      </div>
    </div>
  </div>