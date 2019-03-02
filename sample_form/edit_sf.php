<html>
<head>
</head>
<body>

<?php
require_once('connection.php'); 

$id  = $_POST['n_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gen = $_POST['gender'];
$mail = $_POST['mail'];
$num = $_POST['mob_num'];
$address = $_POST['address'];
$image = $_POST['up_file'];

$sql = "UPDATE registration SET First_Name = '$fname', Last_Name= '$lname', Gender = '$gen', email = '$mail', mob_num = '$num',
      Address = '$address', image= '$image'  WHERE ID ={$id}"; 
mysqli_query($conn,$sql);
mysqli_close($conn);
header ("Location: retrieval_sf.php");

?>




</body>
</html>