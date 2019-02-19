<!DOCTYPE html>
<html>
<head> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
    	$(document).ready(function() {
    		$("#submit").click(function() {
    			$("#my_form").validate({
    				rules: {
    					mail: "required",
    					nm: "required",
    					password: {
    						required: true,
    						minlength: 8,
    					},
    					conf_pass: {
    						required: true,
    						equalTo: "#password",
    					}
    				},
    				messages: {
    					mail: "Enter Mail Id",
    					nm: "Enter the Name",
    					password: "Enter valid password",
    					conf_pass: "Password mismatched",
    				},

    				submitHandler: function(from)
    				{
    					form.submit();
    				}
    			});
    		});
    	})


    </script>
</head>
<body>
<form name="my_form" id="my_form" method="POST" action="formhandle.php">
	<div class="form">	
		<table class="tb_mar" cellspacing="15">
		<tr><td colspan="2" class="txt" id="m_col">Register</td></tr>
		<tr>
		<th><label>E-Mail</label></th>
		<td><input type="email" name="mail" id="mail" class="txt"></td>
		</tr>
		<tr>
		<th><label>Name</label></th>
		<td><input type="text" name="nm" id="nm" class="txt"></td>
		</tr>
		<tr>
		<th><label>Password</label></th>
		<td><input type="Password" name="password" id="password" class="txt"></td>
		</tr>
		<tr>
		<th><label>Confirm Password</label></th>
		<td><input type="password" name="conf_pass" id="conf_pass" class="txt"></td>
		</tr>
		<tr>
		<td><button type="submit" id="submit">Register</button></td>
		<td><button><a href="login2_far.php" style="text-underline: none;">Log in</a></button></td>
		</tr>
	    </table>
	</div>
</form>

<style>
body{
	background-image: url("images.jfif");
	background-repeat: no-repeat;
	background-position: right top;
	background-size: 500px 300px;
	background-attachment: fixed;
}
.tb_mar {
	width: 200px;
	margin: auto;
	background-color: #c842f4;
	border-radius: 15px;
}
.txt {
	height: 30px;
	width: 200px;
}
#submit {
	width: 100px;
	height: 50px;
	border-radius: 25px;
	background-color: blue;
	font-size: 20px;
}
#m_col {
	text-align: center;
	font-size: 25px;
}
</style>
</body>
</html>