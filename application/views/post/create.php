
<h1>Create Quiz</h1>
<div class="card">
    <div class="card-header">
        Question
    </div>
    <div class="card-body">
            {form_create_post}
                <!-- <div class="form-group">
                    <label for="reportType">Post type</label>
                    <select name="post_type_id" class="form-control">
                        <option value="1">News</option>
                        <option value="2">Event</option>
                    </select>
                </div> -->
                <!-- <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="post_date" id="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="location">Title</label>
                    <input type="text" name="post_title" id="post_title" class="form-control" required>
                </div> -->
                <div class="form-group">
                    <label for="location">Image</label>
                    <input type="file" name="upload" id="upload" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Question</label>
                    <textarea name="question" id="summernote" class="form-control" rows="50" required></textarea>
                </div>              
                <!-- user id form session -->
                <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo $this->session->userdata['logged_in']['user_id']?>">
                
                <button type="submit" class="btn btn-primary">Submit</button>
            {form_close}
    </div>
</div>
