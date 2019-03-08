<!DOCTYPE html>
<html>
<head>
	<title>Password Request</title>
	<link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
</head>
<body>
<div class="hd" id="h">
	<header>
	<h3>Request password</h3>
	</header>
</div>
<div class="container">
	<form name="passwordForm" id="passwordForm" method="POST" action="">
	<p>Please enter the mail you used to register</p>
		E-Mail : <input type="email" name="mail" id="mail" required><br>
		<input type="submit" name="reset_pass" id="reset_pass" value="Confirm">
	</form>
</div>
<div class="ft">
	<footer>
		<p>  </p>
	</footer>
</div>
</body>
</html>