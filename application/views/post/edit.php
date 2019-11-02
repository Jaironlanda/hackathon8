
<h1>Edit Post</h1>
<div class="card">
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">
            {form_edit_post}
                <div class="form-group">
                    <label for="date">Author</label>
                    <input type="author" name="author" id="author" class="form-control" value="<?php echo $getPost[0]->username?>" disabled>
                </div>
                <div class="form-group">
                    <label for="date">Post Type</label>
                    <input type="text" name="post_type_id" id="post_type_id" class="form-control" value="<?php echo $getPost[0]->post_name?>" disabled>
                </div>
                
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="post_date" id="date" class="form-control" value="<?php echo $getPost[0]->post_date?>">
                </div>
                <div class="form-group">
                    <label for="location">Title</label>
                    <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $getPost[0]->post_title?>">
                </div>
                <div class="form-group">
                    <label for="description">Content</label>
                    <textarea name="post_content" id="summernote"><?php echo $getPost[0]->post_content?></textarea>
                    
                </div>                
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="<?php echo base_url();?>Post/index/<?php echo $getPost[0]->post_type_id; ?>">Back to Event Index</a>
            {form_close}
    </div>
</div>
