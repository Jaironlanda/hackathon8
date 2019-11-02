<div class="container">
    <?php var_dump($personal_detail); ?>

    <div class="panel panel-default">
          <div class="panel-heading">
                <h3 class="panel-title">Profile image</h3>
          </div>
          <div class="panel-body">
          <div class="col-md-5">
                    <div class="panel panel-default">
                    <div class="panel-heading">Profile Photo</div>
                        <div class="panel-body centered">
                            <?php 
                                $userImg = $personal_detail[0]->profile_img;

                                if ($userImg == NULL) {
                                    echo '<img src="https://api.adorable.io/avatars/240/jaironlanda@adorable.io" alt="'. $personal_detail[0]->username .'" width="250" height="250" border="0" class="img-circle">';
                                    $btn_state = "disabled='disabled'";
                                } else {
                                    echo '<img src="'. base_url('uploads/profile/'. $personal_detail[0]->profile_img) .'" alt="'. $personal_detail[0]->username .'" width="250" height="250" border="0" class="img-circle">';                                           
                                    $btn_state = "active";
                                }
                                
                            ?>
                        <br>
                        {form_upload_profile_img}
                            <div class="form-group">
                                <input id="img_upload" name="img_upload" class="input-file" type="file" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url('User/removeProfileImg/'.$userImg ) ?>" <?php echo $btn_state ?>> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</a>
                            </div>
                        {form_close}
                       
                        </div>
                    </div>
                </div>
          </div>
    </div>
    
    <div class="panel panel-default">
          <div class="panel-heading">
                <h3 class="panel-title">Email Settings</h3>
          </div>
          <div class="panel-body">
               {form_email_resend_verification}
                   <div class="form-group">
                       <label for="active_email">Active email</label>
                       <input type="email" class="form-control" id="email" name="disable_active_email" value="<?php echo $personal_detail[0]->email ?>" disabled>
                       <input type="hidden" name="active_email" value="<?php echo $personal_detail[0]->email ?>">
                   </div>
                   <button type="submit" class="btn btn-primary">Re-send Verification</button>
               {form_close}
               <br>  <!-- Spacing -->
               {form_update_email}
                    
                   <div class="form-group">
                       <label for="new_email">New Email</label>
                       <input type="email" class="form-control" id="new_email" name="new_email" placeholder="Enter new email address">
                       <input type="hidden" name="token" value="<?php echo $token; ?>">
                       
                   </div>

                   <button type="submit" class="btn btn-primary">Save</button>
               {form_close}

          </div>
    </div>

    <div class="panel panel-default">
          <div class="panel-heading">
                <h3 class="panel-title">Update password</h3>
          </div>
          <div class="panel-body">
               
               {form_update_pswd}
                   <div class="form-group">
                       <label for="old_pswd">Old Password</label>
                       <input type="password" class="form-control" id="pswd" name="old_pswd" placeholder="Old Password">
                   </div>
                   <div class="form-group">
                       <label for="new_pswd">New Password</label>
                       <input type="password" class="form-control" id="pswd" name="new_pswd" placeholder="new Password">
                   </div>
                   <div class="form-group">
                       <label for="confirm_pswd">Confirm Password</label>
                       <input type="password" class="form-control" id="confirm_pswd" name="confirm_pswd" placeholder="Confirm passwprd">
                   </div>
                   <input type="hidden" name="token" value="<?php echo $token; ?>">               
                   <button type="submit" class="btn btn-primary">Save</button>
               {form_close}
               
          </div>
    </div>
    
    
    
    
    
</div>
