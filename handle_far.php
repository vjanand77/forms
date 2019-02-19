<?php

require_once('connection.php');
$name = $_POST['name'];
$num = $_POST['num'];


$sql = "INSERT INTO farmer (farmer_name, rate)
		VALUES ('".$name."','".$num."')";

mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: index.php");
?>