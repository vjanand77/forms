<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
</head>
<body>


<?php
require_once('connection.php');

$date = date("Y-m-d");
$sql = "SELECT patientdetails.firstname, patientdetails.lastname, appointment.from_time, appointment.to_time, appointment.pat_id FROM patientdetails LEFT JOIN appointment ON patientdetails.pat_id = appointment.pat_id WHERE dateofapp = '$date' ";
$res = mysqli_query($conn,$sql);

echo "Date: ". date("d-m-Y");

echo "<table class='table table-hover table-sm' id='apt_details'>
<thead>
<tr>
<th>Patient Id</th>
<th>Name</th>
<th>TIme</th>
<th>Details</th>
</tr>
</thead>
<tbody id = 'flt_appointment'>";

if($res ->num_rows > 0)
{
	while($row = mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>" . $row['pat_id'] . "</td>";
		echo "<td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>"; 
		echo "<td>" . $row['from_time'] . '-' . $row['to_time'] . "</td>";
		echo "<td> <a href = 'detail_ap.php?id=".$row['pat_id']." 'id = 'details'>Details</a> </td>";
		echo "</tr>";
	}
	
}
else
{
	echo "<td>No Appointments</td> ";
	
}
echo "</tbody></table>";
mysqli_close($conn);
?>


<button type="button" class="btn btn-info" data-toggle="modal" data-target="#filterModal" id="dateFilter">
Filter
</button> 
<input type="button" value="Go back!" class="btn btn-secondary" onclick="history.back()">

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLongTitle">Fiter by date</h5>
        <label id="message"></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	 <form name="ap_filter" id="ap_filter" class="appoi_filter">
		 	<div class="container">			 
			 	 <div class="row">
			  		<div class="col-sm-6">
					    <div class="form-group">
						    <div>
								<label>Enter the date</label>
							</div>
						</div>
						</div>
							<div class="col-sm-6">
							    <div class="form-group">
								    <div>
								     	<input type="text" name="fil_date" id="fil_date" class="form-control">
									</div>
									<label id="err_msg" style="color: red;"></label>
								</div>
							</div>
					</div>
			  	 </div>
			</div> 
		      <div class="modal-footer">
			      	<button type="button" class="btn btn-info" id="filter">Search</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>
      </form>
  	</div>
  </div>  
</div>


<script src="page1js_ap.js"></script>
</body>
</html>