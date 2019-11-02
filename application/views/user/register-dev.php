<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><i class="fas fa-sign-up-alt"></i> Register</div>
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


<form action="register_fki.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	<div class="container">
	<form>
  <fieldset>
    <legend>Register Form</legend>
	
	<div class="form-group">
<form name="form" method="post" onsubmit="return validation()">
      <label>Username</label>
      <input type="name" class="form-control" id="username" name="username" placeholder="Enter username" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one uppercase and lowercase letter, and at least 6 or more characters" required>
      <small id="nameHelp" class="form-text text-muted">Make you remember your username.</small>
	 </form>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email" title="Must be a valid email" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
    <input type="password" id="psw" class ="form-control" placeholder=" Enter password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    </div>
	<button type="submit" class="btn btn-success">Submit</button> 
	
	
  </fieldset>
</form>
	</div>

  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.html">Sign in</a>.</p>
  </div>
</form>

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<script>
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message1").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message1").style.display = "none";
}
var myInput = document.getElementById("username");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
  
  myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
</script>
<script type="text/javascript">
function validation()
{
var a = document.form.name.value;
if(a=="")
{
alert("Please Enter Your Name");
document.form.name.focus();
return false;
}
}
</script>
  </body>
</html>

 