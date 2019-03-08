<?php
session_start();
if(isset($_SESSION['User_id']) && isset($_SESSION['User_name']))
{
?>

<html>
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Appointment details</title>
	  <link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	  <!-- css for datepicker -->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

	  <!-- bootstrap style sheet -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	    <!-- css for timepicker -->
	  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	  <!-- jquery bt -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	  <!-- UI for datepicker --> 
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	 <!-- js for timepicker -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<style>
	.error{color: red}

	/*to view the stylesheet hidden behind the modal.... use z-index property*/
	 .ui-timepicker-container {
      z-index: 3500 !important;
 }
</style>
</head>
<body>
<h2 style="text-align: center;" class="font-weight-light">Patient Deatils</h2>
<div style="float: right; margin: 25px;">
  <a href="logout.php" class="btn btn-primary">log out</a>
</div>
<br> <br>
 <?php
require_once('connection.php'); 
$sql = "SELECT * FROM registration_lf WHERE reg_id = '".$_SESSION['User_id']."'";
$res = mysqli_query($conn,$sql);



if($res ->num_rows > 0) {
//created a table with bootstrap style
echo "<table class='table table-hover' id='pat_details'>
<thead>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>Gender</th>
<th>Mobile no</th>
<th>Mail</th>
<th>Edit</th>
</tr>
</thead>
<tbody id='dpt_body'>";
	//output data of each row
	while($row = mysqli_fetch_array($res))
	{
		// spliting the columns separately and storing on a variable
		echo "<tr>";
		echo "<td>" . ucfirst($row['firstname']) . "</td>";
		echo "<td>" . ucfirst($row['surname']) . "</td>";
		echo "<td>" . $row['gender'] . "</td>";
		echo "<td>" . $row['phone_no'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td> <input type='button' name='update' id='update' data-id ='".$row['reg_id']."' class='btn-primary edit' value='Edit'></td>";
		echo "</tr>";
	}
	echo "</tbody></table>";
} else {
	echo "NO DATA FOUND:(";
}

$conn->close();
?>
 


<!-- Modal -->
<div id="editForm">
<form name="pat_form" id="pat_form" class="detail_form" method="POST">
<div class="container">			 
 <div class="row">
	<div class="col-sm-6">
     <div class="form-group">
       	<label>First Name</label><br>
		<input type="text" placeholder="First Name" name="fname" id="fname" class="form-control">
		 </div>
	 <div class="form-group">
	   	<label>Surname</label><br>
		<input type="text" placeholder="Surname" name="snamesname" id="sname" class="form-control">
	 </div>
	 <div class="form-group">
	   	<label>Gender</label><br>
		<input type="radio" name="gender" id="ml" value="male">Male
		</c:choose>
		<input type="radio" name="gender" id="fl" value="female">Female
	 </div>
	 <div class="form-group">
	   	<label>Mail Id</label><br>
		<input type="email" placeholder="E-Mail" name="mail_id" id="mail_id" class="form-control">
	 </div>
	 <div class="form-group">
	   	<label>Mobile No</label><br>
		<input type="tel" placeholder="Mobile Number" name="phone" id="phone" class="form-control">
	 </div>
</div>
    <div class="col-sm-6">
	     <div class="form-group">
	     	<label>Date of birth</label><br>
			<input type="text" name="dob" id="dob" placeholder="DOB" class="form-control">
			 </div>
		 <div class="form-group">
		   	<label>Address</label><br>
			<input type="textarea" name="address" id="address" placeholder="Address" class="form-control">
		 </div>
	 </div>
</div>
<input type="hidden" name="hid_id" id="hid_id">     
<button type="submit" class="btn btn-primary" id="submit">Update</button>
</div> 
</form>

</div>
   
<!-- booking appointment -->
<button type="button" id="book_app" class="btn btn-primary">Appointment</button>
<br><br>
<div id="bookAppointment">

<h3>Book appointment</h3>
<form name="ap_form" id="ap_form" class="appoi_form">
<div class="container">			 
	<div class="row">
	<div class="col-sm-6">
	 <div class="form-group">
	 	<label>Date for Appointment</label><br>
		<input type="text" name="date_ap" id="date_ap" placeholder="Date" class="form-control">
		 </div>
	 <div class="form-group">
	   	<label>Time</label><br>
		<input type="text" name="time_apf" id="time_apf" placeholder="From" class="form-control time"><br>
		<input type="text" name="time_apt" id="time_apt" placeholder="To" class="form-control time">
	 </div>
	</div>
	</div>
	
	<input type="hidden"  name="hd_id" id="hd_id" value="<?php echo "$_SESSION[User_id]"; ?>">
	<input type="submit" class="btn btn-primary" id="add_apt" value="Add Appointment">
</div> 
</form>
</div>



<!-- to establish the binding add script here -->
<script src="script/loginform_lf.js"></script>
</body>
</html>

<?php
}
else
{
	// to prevent the page1 from accessing diractly without logging in
	echo "<script> window.location.href='index.php?msg=-2';</script>"; 
}
?>