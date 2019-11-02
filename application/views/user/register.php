<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><i class="fas fa-sign-in-alt"></i> Register</div>
      <div class="card-body">
        {form_register}
            <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="user_email" id="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="user_pswd" id="password" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Submit</button>
                </div>
        {form_close}
      </div>
    </div>
  </div>
  <hr class="featurette-divider">
    </div>