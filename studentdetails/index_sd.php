<!DOCTYPE html>
<html>
<head>
	<title>Student details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
require_once('connection.php'); 
$sql = "SELECT * FROM studentdetails";
$res = mysqli_query($conn,$sql);

if($res ->num_rows > 0)
{
echo "<table class='table' id='sdt_details'>
<thead>
<tr>
<th>student id</th>
<th>Name</th>
<th>Class</th>
<th>Contact</th>
<th>Add</th>
<th>Edit</th>
<th>Details</th>
</tr>
</thead>
<tbody>";	

	while($row = mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>" . $row['st_id'] . "</td>";
		echo "<td>" . ucfirst($row['name']) . "</td>";
		echo "<td>" . $row['class'] . "</td>";
		echo "<td>" . $row['contact'] . "</td>";
		echo "<td> <button type= 'button' id='add' data-id ='".$row['st_id']."' class='btn-primary add'>Add </button> </td>";
		echo "<td> <button id='del' data-id ='".$row['st_id']."' class='btn-danger edit'>Edit </button> </td>";
		echo "<td> <a href = 'detail_sd.php?id=".$row['st_id']."' id='upload' data-id ='".$row['st_id']."' class='btn-secondary details'>Details </a> </td>";
		echo "</tr>";
	}

}
else
{
	echo "No data Found";
}
echo "</tbody></table>";

mysqli_close($conn);

?>

<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalForm" id="add_details">Add</button>

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<!-- (alter the modal size)style=" width: 360px;" -->

<!-- else use this in css
modal-dialog {
          width: 360px;
        } -->
  <div class="modal-dialog modal-dialog-centered" role="document" style=" width: 360px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student details</h5>
        <label id="msg"></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	 <form name="form1" id="form1" class="std_form">
		 	<div class="container">		 
			     <div class="form-group">
			     	<label>Name</label><br>
					<input type="text" placeholder="Name" name="name" id="name" class="form-control">
 				 </div>
				 <div class="form-group">
				   	<label>Class</label><br>
					<input type="text" placeholder="Class" name="class" id="class" class="form-control">
				 </div>
				 <div class="form-group">
				   	<label>Contact</label><br>
					<input type="tel" placeholder="Contact" name="contact" id="contact" class="form-control">
				 </div>
			</div>
		</div>
      <div class="modal-footer">
      	<!-- <input type="hidden"  name="hd_id" id="hd_id"> -->
      	<button type="submit" class="btn btn-success" id="submit">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>  
</div> 

</body>
</html>