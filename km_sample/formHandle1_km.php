<?php
require_once('connection.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$gen = $_POST['gender'];
$occup = $_POST['occup'];
$mail = $_POST['mail_id'];
$num = $_POST['m_num'];
$address = $_POST['address'];


$sql = "INSERT INTO personaldetails (firstName, lastName, dob, gender, occupation, address, email, mobilenum)
		VALUES ('".$fname."','".$lname."','".$dob."','".$gen."', '".$occup."','".$address."', '".$mail."','".$num."')";



mysqli_query($conn,$sql);
mysqli_close($conn);
header ("Location: page1.php");

?>		

