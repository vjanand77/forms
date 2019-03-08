<!DOCTYPE html>
<html>
<head>
	<title>Reset password</title>
	<link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
<div class="'container">
<div class="hd" id="h">
	<header>
	<h3>Reset password</h3>
	</header>
</div>



<div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-4">
               <div class="card-body">
                    <form name="resetForm" id="resetForm">
						<p><strong>Enter the mail id used for registration:</strong></p>
							<ol>
								<li>E-Mail</li>
								<li><input type="email" name="e_mail" id="e_mail" placeholder="E-Mail" class="form-control"></li>
								<li>Password</li>
								<li><input type="password" name="old_password" id="old_password" placeholder="Password" class="form-control"></li>
								<li>New Password</li>
								<li><input type="password" name="n_password" id="n_password" placeholder="Password" class="form-control"></li>
								<li>Confirm Password</li>
								<li><input type="password" name="npass_conf" id="npass_conf" placeholder="Password" class="form-control"></li>
								<li>Enter OTP</li>
								<li><input type="text" name="otp" id="otp" placeholder="OTP" class="form-control"></li>
								<li><input type="submit" name="reset_password" id="reset_password" class="btn btn-primary">
								<input type="button" name="req_otp" id="req_otp" value="Get OTP" class="btn btn-primary"></li>
							</ol>	
					</form>                        
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