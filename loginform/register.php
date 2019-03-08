<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="hd" id="h">
	<header>
	<h2>Register</h2>
	</header>
</div>
<div class="container">
	<form name="newForm" id="newForm">
	<a href="index.php" class="btn btn-info" style="float: right;">Goto login!</a>
	<h3>Enter your details:</h3>
		<ol>
			<li>First Name</li>
			<li><input type="text" name="fname" id="fname" class="form-control"></li>
			<li>Surname</li>
			<li><input type="text" name="sname" id="sname" class="form-control"></li>
			<li>D O B</li>
			<li><input type="text" name="dob" id="dob" class="form-control date"></li>
			<li>Gender</li>
			<li><input type="radio" name="gender" id="ml" value="m">Male
				<input type="radio" name="gender" id="fl" value="f">Female
			</li>
			<li>Role</li>
			<li><input type="radio" name="role" id="pat" value="p">Patient
				<input type="radio" name="role" id="admin" value="a">Admin
			</li>
			<li>Phone number</li>
			<li><input type="tel" name="phone" id="phone" class="form-control"></li>
			<li>Address</li>
			<li><textarea rows="4" cols="20" name="address" id="address" class="form-control"></textarea></li>
			<li>E-Mail</li>
			<li><input type="email" name="mail_id" id="mail_id" class="form-control"></li>
			<li>Password</li>
			<li><input type="password" name="password" id="password" class="form-control"></li>
			<li>Confirm password</li>
			<li><input type="password" name="conf_password" id="conf_password" class="form-control"></li>
			<li><input type="submit" name="register" id="register" value="Register" class="btn btn-primary"></li>
		</ol> 
		
	</form>
</div>
<div class="ft">
	<footer>
		<p>  </p>
	</footer>
</div>

<script src="script/loginform_lf.js" ></script>
</body>
</html>