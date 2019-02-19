<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
	<script>  

	$(document).ready(function(){   
 	$("#my_form").validate({

    rules: {       
       user:"required",
       password: {
        required: true,
        minlength: 8
       }, 
       conf_password: {
       	minlength: 8,
       	equalTo: "#password"
       }
      },
    messages: { 
      user: "Please enter User name",
      password: "Please enter valid password",
      conf_password: "Password doesnot match",
    },
   
  submitHandler: function(form) 
    {    
      form.submit();
      }
  }); 
})
</script>


<h1 style="text-align: center;">Kmmedical</h1>
<table style="border-spacing: 15px">	
	<tr>
		
		<td width="50%">
			<p>KM Medical Software is a healthcare industry leader in Health Informatics Solutions. All our solutions are cloud based and have access from the browser, Smart phone and tablets. Our product portfolio includes Electronic Medical Record solutions for Surgeons, Physicians, Physiotherapists and many other specialties.</p>
		</td>
			<td width="50%"  rowspan="2">
				<ol>
				<form name="my_form" method="POST" action="page1.php" style="line-height: 2" class="form" id="my_form">
				<li><label>USER NAME</label></li><li> <input type="text" name="user" id="user_name" placeholder="User name"><br></li>
				<li>MAIL  ID</li> <li><input type="email" name="mail" id="mail" placeholder="E-Mail"><br></li>
				<li>PASSWORD</li>  <li><input type="password" name="password" id="password" placeholder="Password"><br></li>
	   			<li>CONFIRM PASSWORD</li> <li><input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password"><br></li>
				<li><input type="submit" value="Register"></li>
				</ol>
				</form>
			</td>
		</tr>
	<tr>
		<td width="50%">
			<p>In addition to clinic based software KM Medical Software supply world class clinical outcome software that is used all over the world in specialties like orthopedics and gynecology, neurology, oncology to name just a few. Our enterprise solutions for clinical outcomes and case management have been used in major international and pan-European clinical studies.</p>
		</td>
	</tr>
</table>
<marquee width="50%"><h3>Healthcare Informatics Integrated</h3></marquee>

<style>
	.form {
		background-color: #3366ff;
		text-align: center;
		line-height: 2;
	}
	ol li{
  		list-style-type: none;
	}
	.error {
  color: #F00;
  background-color: ##3366ff;
</style>
</body>
</html>