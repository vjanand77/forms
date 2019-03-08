<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

<input type="button" value="Home"  class="btn btn-primary" onclick="history.go(-1)" style="margin: 25px; float: right;">


<?php
require_once('connection.php');


$id = $_GET['id'];

	$sql = "SELECT dateofapp, startTime, endTime, reg_id 
			FROM appointment_lf 
			WHERE reg_id = '$id' 
			ORDER BY dateofapp 
			DESC ";
	$res = mysqli_query($conn,$sql);
	echo "<table class='table table table-striped'>
	<thead>
	<tr>
	<th>Patient Id</th>
	<th>Date</th>
	<th>Time Slot</th>
	</tr>
	</thead>
	<tbody>";
	//output data of each row
	while($row = mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>" . $row['reg_id'] . "</td>";
		echo "<td>" . $row['dateofapp']. "</td>";
		echo "<td>" . $row['startTime'].'-'.$row['endTime']. "</td>";
		echo "</tr>";
	}
	echo "</tbody></table>";

mysqli_close($conn);
?>
 

</body>
</html>






