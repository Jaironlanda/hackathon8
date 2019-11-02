
<div class="container">
    <div class="col-md-4 col-md-offset-4 panel-style">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                    Forgot Password
                </strong></h3>
                </div>
                <div class="panel-body">
                    {form_forget_pswd}
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Info</strong><br> Enter your valid email before procced to password reset.
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"  required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                Submit</button>
                            <a href="login">Login</a>  | <a href="register">Register</a> | <a href="#">Homepage</a>
                        </div>
                    {form_close}
                    
                </div>
        </div>
    </div>
</div>
