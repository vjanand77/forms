<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
<div class="hd" id="h">
	<header>
	<h3>User Login</h3>
	</header>
</div>
<div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-4">
                <div class="card base">
                    <div class="card-body">
                        <form name="loginForm" id="loginForm" autocomplete="off">
                            <div class="form-group">
                            <label>User name/Email</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Password</label>
                               <input type="password" name="login_password" id="login_password" class="form-control">
                            </div>
                            <input type="submit" name="log_submit" id="log_submit" value="Sign In" class="btn btn-primary" style="float: right">       
                        </form>
                    </div>
                       <p>New User <a href="register.php">Sign Up?</a></p>
					   <p><a href="password.php">Forgot Password!!</a></p>
					   <p><a href="resetpassword.php">Reset password</a></p>
                </div>
            </div>
        </div>
    </div>

<div class="ft">
	<footer>
		<p> </p>
	</footer>
</div>

<script src="script/loginform_lf.js" ></script>
</body>
</html>