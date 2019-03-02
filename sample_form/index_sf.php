<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>

<script>
$(document).ready(function(){   

  $("#my_form").validate({ 
    // Specify validation rules
    rules: {       
       fname:"required",
       lname:"required",
       password: {
        required: true,
        minlength: 8,
       } ,
         conf_password: {
        minlength: 8,
        equalTo: "#password"
       },
       trms: {
        required: true,
      },
      gender: {
        required: true,
      },
      m_num:{
        required: true,
        minlength: 10,
        maxlength: 10,
      }
      /* date_appmnt:"required",
       start_time:"required", 
       end_time:"required", 
       pat_fname:"required",
       pat_sname:"required",    */
      /* ref_email: {
        required: true,       
        email: true
        }, 
     ref_contact_mob:{
        required: true,       
        number: true
      }, 
      ref_contact_work:{
        required: true,       
        number: true
      }, 
      ref_contact_sec:{
        required: true,       
        number: true
      }, 
      ref_fax:{
        required: true       
      },      
      pat_email: {
        required: true,       
        email: true
        },   
      pat_phone:{
        required: true,       
        number: true
      },
     
      nok_fname:"required",
      nok_sname:"required",
      nok_relation:"required",
      ins_number:"required",
      ins_company:"required",
      ins_plan:"required",*/     
      
    },
    // Specify validation error messages
    messages: { 
      fname: "Please enter first name",
      lname: "Please enter last name", 
      password: "Enter atleast 8 characters", 
      conf_password: "Password doesnot match",
      trms: "please click the chechbox above",
      gender: "Please select a gender",
      m_num: "Please enter valid mobile number", 
    },
   
  submitHandler: function(form) 
    {    
      form.submit();
      }
  }); 
})


//helps to change the color in txt box
$(document).ready(function() {
	$("input").focus(function() {
		$(this).css("border-color","#446daf");
	});
	$("input").blur(function() {
	$(this).css("border-color", "#ffffff");
	});
});


</script>
  <div class="it">
  <form name="myForm" method="post" action="formhandle_sf.php" id="my_form" class="h" enctype="multipart/form-data">
   <h2 style="font-size: 35px;">Register</h2>
  <p style="text-shadow: 23">Create a free account now!!!!</p>
  <div style="text-align:right">
  <a href="retrieval_sf.php">VIEW</a>
  </div>  
    <select>
      <option>Mr.</option>
      <option>Ms.</option>
      <option>Mrs.</option>
    </select><br>
    <input type="text" name="fname" id="f_name" placeholder="First Name"><br>
    <input type="text" name="lname" id="l_name" placeholder="Last Name"><br>
    <div id="gender">
      <input type="radio" name="gender" value="male">male
      <input type="radio" name="gender" value="Female">Female
      <input type="radio" name="gender" value="others">Others<br>
    </div>
    <textarea rows="5" cols="25" placeholder="Address" name="address">Enter your permanent address here with country code</textarea><br>
    <input type="email" name="mail_id" id="email" placeholder="E-Mail"><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password"><br>
    <input type="tel" name="m_num" id="m_num" placeholder="mobile number"><br>
	  <input type="file" name="up_file" id="up_file"><br>
    <input type="checkbox" name="trms" value="1" id="trms"> I agree the <a href="https://www.kmmedical.net/news-page/">terms and conditions</a> <br>
    <input type="submit" value="Register" onClick="myFunc()"> 
  </form>
  </div>
  <style type="text/css">
    .it {
  text-align: center;
  line-height: 40px;
}
.h {
    border: 1px #D546DF;
    background-color: #D546DF;
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}
.error {
  color: #F00;
  background-color: #D546DF;
}
</style>

</body>
</html>