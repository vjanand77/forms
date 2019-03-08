<?php
session_start();

if(isset($_SESSION['User_id']) && isset($_SESSION['User_name']))
{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/loginform_lf.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
<br>
<h2 style="text-align: center;" class="font-weight-light">User Deatils</h2>
<div id="lin" style="float: right; margin: 25px;">
	<a href="logout.php" class="btn btn-primary">LogOut</a>
</div>
<?php
require_once('connection.php');

$sql = "SELECT * FROM registration_lf";
$result = mysqli_query($conn,$sql);
echo "<div class= 'container'>";
if($result ->num_rows > 0)
{
echo "<table class= 'table table-dark'>
<thead>
<th>FirstName</th>
<th>LastName</th>
<th>DOB</th>
<th>Gender</th>
<th>Address</th>
<th>Mobile no</th>
<th>Mail</th>
<th>Details</th>
</thead>
<tbody>";

	while($row = mysqli_fetch_array($result) )
	{
		echo "<tr>";
		echo "<td>".ucfirst($row['firstname'])."</td>";
		echo "<td>".ucfirst($row['surname'])."</td>";
		echo "<td>".date("d-m-Y",strtotime($row['dob']))."</td>";
		echo "<td>".$row['gender']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td><a href='detail.php?id=".$row['reg_id']."  '>Details</a></td>";
		echo "</tr>";
	}

"</tbody>
</table>";
echo "</div>";
}
?>


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