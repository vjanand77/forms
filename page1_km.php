<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>

<script>

$(document).ready(function(){   
  $("#my_form").validate({ 
    rules: {       
       fname:"required",
       lname:"required",
       password: {
        required: true,
        minlength: 8,
       } ,
      gender: {
        required: true,
      },
      m_num:{
        required: true,
        minlength: 10,
        maxlength: 10,
      }   
      
    },
  
    messages: { 
      fname: "Please enter first name",
      lname: "Please enter last name", 
      password: "Enter atleast 8 characters", 
      trms: "please click the chechbox above",
      gender: "Please select a gender",
      m_num: "Please enter valid mobile number", 
    },
   
  submitHandler: function(form) 
    {    
      form.submit();
      }
  });
$("#smt").click(function(){ 
    $("#en_fname").html( $("#f_name").val() );
    $("#en_lname").html( $("#l_name").val() );
    $("#en_mail").html( $("#email").val() );
    $("#en_address").html( $("#address").val() );
    $("#en_title").html(  $('#ttl :selected').text());
    var gender = $("input[name='gender']:checked").val();
    if(gender == 1) {
    $("#en_gen").html("male");
    }
    else {
    $("#en_gen").html("female");
    }
    $("#en_dob").html( $("#dob").val() );
    $("#en_occupation").html( $("#occup").val() );
    $("#en_mnum").html( $("#m_num").val() );
  });
// to set the timer for div element
  $("#smt").click(function(){
    setTimeout(function(){
      $("#div_fade").fadeOut();},10000);
  });

});


</script>
  <div class="h">
   <h2 style="font-size: 35px;">Personal Details</h2> 
   <!--<div style="text-align: right;">
   <a href="retrieval1.php">Verify</a>
 </div> -->
 <ol>
  <li>
   Title</li><li> <select id="ttl">
      <option>Mr.</option>
      <option>Ms.</option>
      <option>Mrs.</option>
    </select><br></li>
    <li>First Name</li><li> <input type="text" name="fname" id="f_name" placeholder="First Name"></li>
    <li>Last Name</li> <li><input type="text" name="lname" id="l_name" placeholder="Last Name"></li>
    <li>B-Day</li> <li><input type="date" name="dob" id="dob"></li>
    <li>Gender</li> <li><input type="radio" name="gender" value="1">male
      <input type="radio" name="gender" value="2">Female
      <input type="radio" name="gender" value="3">Others</li>
    <li>Occupation</li> <li><input type="text" name="occup" id="occup" placeholder="Occupation"></li>
    <li>Address</li> <li><textarea rows="5" cols="25" placeholder="Address" name="address" id="address" placeholder="Address"></textarea></li>
    <li>E-Mail</li> <li><input type="email" name="mail_id" id="email" placeholder="E-Mail"></li>
    <li>Mobile Number</li> <li><input type="tel" name="m_num" id="m_num" placeholder="mobile number"></li>
    <li><button id="smt">SUBMIT</button></li>
  </ol>
  </div>
  <style type="text/css">
.h {
  line-height: 3;
  border: 1px ##99ffff;
  background-color: #99ffff;
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}
.error {
  color: #F00;
  background-color: ##99ffff;
}
ol li {
  list-style-type: none;
  line-height: 1.5em;
}
</style>



<?php
require_once('connection.php');

$user=$_POST['user'];
$mail=$_POST['mail'];
//encryption of password
$password=md5($_POST['password']);

$sql = "INSERT INTO signup (userName, password, email)
 		VALUES ('".$user."','".$password."','".$mail."')";

mysqli_query($conn,$sql);
mysqli_close($conn);

?>

<div id="div_fade">
  <table border="2px">
  <h2>Verify the details...</h2>
  <tr>
      <th>Title</th> <td><span id="en_title"></span></td>
  </tr>
  <tr>
      <th>First Name</th> <td><span id="en_fname"></span></td>
  </tr>
  <tr>
      <th>Last Name</th> <td><span id="en_lname"></span><br></td>
  </tr>
  <tr>
      <th>D O B</th> <td><span id="en_dob"></span><br></td>
  </tr>
  <tr>
      <th>Gender</th> <td><span id="en_gen"></span><br></td>
  </tr>
  <tr>
      <th>Occupation</th> <td><span id="en_occupation"></span><br></td>
  </tr>
  <tr>
      <th>Email</th> <td><span id="en_mail"></span><br></td>
  </tr>
  <tr>
      <th>Address</th> <td><span id="en_address"></span><br></td>
  </tr>
  <tr>
      <th>Mobile Number</th> <td><span id="en_mnum"></span><br></td>
  </tr>
  </table>
</div>

  


</body>
</html>