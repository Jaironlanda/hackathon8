
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 panel-style">
            <div class=" panel panel-default">
                <div class="panel-heading">Reset password</div>
                    <div class="panel-body">
                    {form_reset_pswd}
                        <div class="form-group">
                            <label for="new_pswd" class="control-label">New password</label>
                            <input type="password" class="form-control" id="new_pswd" name="new_pswd" placeholder="New password"  data-minlength="6" required="1">
                            <div class="help-block">Minimum of 6 characters</div>
                        </div>
                        <div class="form-group">
                            <label for="con_pswd" class="control-label">Confirm new password</label>
                            <input type="password" class="form-control" id="con_pswd" name="con_pswd" placeholder="Confirm new password" data-match="#new_pswd" data-match-error="oppss, password not match." required="1">
                            <div class="help-block with-errors"></div>
                        </div>
                            <p><button type="submit"  class="btn btn-block btn-primary">Submit</button></p>
                            <!-- <p class="text-center"> <a href="<?php //echo base_url('login') ?>"> Login</a></p>--> 
                    {form_close}
                    </div>
                </div>
        </div>
    </div>
</div>
