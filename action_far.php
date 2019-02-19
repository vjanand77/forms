<?php
	
require_once('connection.php');

$uname 		= $_POST['username'];
$password   = md5($_POST['pass']);
 
$sql = "SELECT count(reg_id)as count FROM register where name= '$uname' AND password ='$password' ";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);  
mysqli_close($conn);
$count = $row['count'];
if($count == 1) 
	{
		echo "Login success";
		header("location: index2.php"); 		
	}
else
	{
		echo "Login Failed";
	}
?>
