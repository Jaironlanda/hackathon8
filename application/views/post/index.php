<div class="card">
    <div class="card-header">
        Index {indexName}
    </div>
    <div class="card-body">
        <table class="table table bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date Publish</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if($listPost != false){
                        foreach ($listPost as $post) {
                            echo '<tr>';
                                echo '<td>'.$no++.'</td>';
                                echo '<td>'.$post->post_title.'</td>';
                                echo '<td>'.date("d/m/Y", strtotime($post->post_date)).'</td>';
                                echo '<td><a class="btn btn-primary" href="'.base_url('Post/edit/'.$post->post_id).'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Edit</a> <a class="btn btn-danger " href="'.base_url('Post/deletePost/'.$post->post_type_id."/".$post->post_id).'" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td>';
                            echo '</tr>';
                        }
                        
                    }else{
                        echo 'No data';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>