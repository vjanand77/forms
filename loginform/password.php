<!DOCTYPE html>
<html>
<head>
	<title>Password request</title>
	<link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
<div class="hd" id="h">
	<header>
	<h3>Request password</h3>
	</header>
</div>
<div class="container">
	<form name="reqForm" id="reqForm">
	<p><strong>Enter the mail id used for registration.</strong></p>
		<p>E-mail: <input type="email" name="mail" id="mail" class="form-control"></p>
		<input type="submit" name="req_password" id="req_password" class="btn btn-primary" value="Request">
		<a href="index.php" class="btn btn-primary">GoTo login!!</a>
	</form>
</div>
<div class="ft">
	<footer>
		<p> </p>
	</footer>
</div>

<script src="script/loginform_lf.js" ></script>
</body>
</html>