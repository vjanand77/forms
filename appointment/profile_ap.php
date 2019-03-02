<!DOCTYPE html>
<html>
<head>
	<title>Uploads</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<?php
require_once('connection.php');
$id = $_GET['id'];

$sql = "SELECT image, gender 
		FROM patientdetails 
		WHERE pat_id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

	$image   = $row['image'];
	$gender  = $row['gender'];
		
		if($image == "" && $gender == 'm')
			$image = "male.png";
		else if($image == "" && $gender == 'f')
			$image = "female.png";
		echo "<img width='75' height='75' src='profile/".$image."'>";

	
mysqli_close($conn);

?> 
<div>

	<form name="profileForm" id="img_form" method="POST" action="imageup_ap.php" enctype="multipart/form-data">
	<br>
		<input type="file" name="up_profile" id="up_profile"><br><br>
		<!-- assigning the query passed through link in to hidden variable -->
		<input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $_GET['id'];?>">
		<button type="submit" id="pro_img" class="btn btn-primary">Upload</button>
		 <input type="button" value="Go back!" class="btn btn-secondary" onclick="history.back()">
		 <label id="lbl_msg" style="color:red"></label>
	</form>
</div>
<script src="page1js_ap.js"></script>
<?php
//error msg for invalid file updation
if(isset($_GET['img']) && $_GET['img'] == 0)
{
?>
<script>
	$('#lbl_msg').html('invalid extension!');
</script>
<?php
}
?>
</body>
</html>