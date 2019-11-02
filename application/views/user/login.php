<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><i class="fas fa-sign-in-alt"></i> Login</div>
      <div class="card-body">
        {form_login}
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="user_email" id="email" class="form-control" required="required" placeholder="yourmail@example.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="user_pswd" id="password" class="form-control" required="required">
                <!-- <a href="forgot_pswd">Forgot password</a> | <a href="register">Register</a> -->
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                Submit</button>
                <!--<div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember_me">
                        Remember me
                    </label>
                </div> -->
            </div>
        {form_close} 
      </div>
    </div>
  </div>
  <hr class="featurette-divider">
        </div>