<html>
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Appointment details</title>
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
  <a href="page2_ap.php" class="btn btn-primary">List of Appointments</a>
</div>
<br> <br>

 <?php
require_once('connection.php'); 
$sql = "SELECT * FROM patientdetails";
$res = mysqli_query($conn,$sql);



if($res ->num_rows > 0) {
//created a table with bootstrap style
echo "<table class='table table-hover' id='apt_details'>
<thead>
<tr>
<th>Profile Image</th>
<th>FirstName</th>
<th>LastName</th>
<th>Gender</th>
<th>Mobile no</th>
<th>Mail</th>
<th>Edit</th>
<th>Delete</th>
<th>Files</th>
</tr>
</thead>
<tbody id='dpt_body'>";
	//output data of each row
	while($row = mysqli_fetch_array($res))
	{
		// spliting the columns separately and storing on a variable
		$image   = $row['image'];
		$gender  = $row['gender'];
		
		if($image == "" && $gender == 'm')
			$image = "male.png";
		else if($image == "" && $gender == 'f')
			$image = "female.png";
		
		echo "<tr>";
		/*path of the image storage*/
		echo "<td> <img width='50' height='50' src='profile/".$image."'></td>";
		echo "<td>" . ucfirst($row['firstname']) . "</td>";
		echo "<td>" . ucfirst($row['lastname']) . "</td>";
		echo "<td>" . $row['gender'] . "</td>";
		echo "<td>" . $row['mobileno'] . "</td>";
		echo "<td>" . $row['mail'] . "</td>";
		echo "<td> <button type= 'button' id='update' data-id ='".$row['pat_id']."' class='btn-primary edit'>Edit </button> </td>";
		echo "<td> <button id='del' data-id ='".$row['pat_id']."' class='btn-danger del'>Delete </button> </td>";
		echo "<td> <a href = 'profile_ap.php?id=".$row['pat_id']."' id='upload' data-id ='".$row['pat_id']."' class='btn-secondary upload'>File upload </a> </td>";
		echo "</tr>";
	}
	echo "</tbody></table>";
} else {
	echo "NO DATA FOUND:(";
}

mysqli_close($conn);
?>
 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="formclear">
  	Add
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter" id="formclear">
  	Search
</button>

<button type="button" class="btn btn-secondary" id="reload">Reload</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Patient-Appointment</h5>
        <label id="msg"></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	 <form name="ap_form" id="ap_form" class="appoi_form">
		 	<div class="container">			 
			 	 <div class="row">
			  		<div class="col-sm-6">
					     <div class="form-group">
					     	<label>First Name</label><br>
							<input type="text" placeholder="First Name" name="f_name" id="f_name" class="form-control">
		 				 </div>
						 <div class="form-group">
						   	<label>Last Name</label><br>
							<input type="text" placeholder="Last Name" name="l_name" id="l_name" class="form-control">
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
							<input type="tel" placeholder="Mobile Number" name="m_num" id="m_num" class="form-control">
						 </div>
			    	</div>
					    <div class="col-sm-6">
						     <div class="form-group">
						     	<label>Date for Appointment</label><br>
								<input type="text" name="date" id="date" placeholder="Date" class="form-control">
			 				 </div>
							 <div class="form-group">
							   	<label>Time</label><br>
								<input type="text" name="time_apf" id="time_apf" placeholder="From" class="form-control time"><br>
								<input type="text" name="time_apt" id="time_apt" placeholder="To" class="form-control time">
							 </div>
						 </div>
			  	</div>
			</div> 
      <div class="modal-footer">
      	<input type="hidden"  name="hd_id" id="hd_id">
      	<button type="submit" class="btn btn-success" id="submit">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>  
</div> 


<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCenterLongTitle">Search details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	 <form name="search_form" id="search_form" class="searchApp_form">
		 	<div class="container">			 
			 	 <div class="row">
			  		<div class="col-sm-6">
					    <div class="form-group">
						    <div>
								<select class="form-control" id="sel_opt">
									<option value="firstname">First Name</option>
									<option value="lastname">Last Name</option>
									<option value="mobileno">Mobile Number</option>
									<option value="mail">Mail Id</option>
								</select>
							</div>
						</div>
						</div>
							<div class="col-sm-6">
							    <div class="form-group">
								    <div>
								     	<input type="text" name="find_details" id="find_details" class="form-control">
									</div>
									 <label id="er_msg" style="color: red;"></label>
								</div>
							</div>
					</div>
			  	 </div>
			</div> 
	      <div class="modal-footer">
	      	<!-- <input type="hidden"  name="hd_val" id="hd_val"> -->
	      	<button type="button" class="btn btn-success" id="search">Search</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
     	 </form>
    	</div>
 	 </div>
	</div>  
</div> 


<!-- to establish the binding add script here -->
<script src="page1js_ap.js"></script>
</body>
</html>
