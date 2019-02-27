<?php
	
require_once('connection.php');

$uname 		= $_POST['user'];
$password   = md5($_POST['pass']);
 
$sql = "SELECT count(signup_id)as count FROM signup where userName= '$uname' AND password ='$password' ";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);  
mysqli_close($conn);
$count = $row['count'];
if($count == 1) 
	{
		$msg = 'Successful login';
		$data = $_POST['user']; 
		$result = true; 		
	}
else
	{
		$msg = 'User name not found. Please enter a valid user name';
		$result = false;
	}
echo json_encode (array('msg' => $msg, 'data'=> $data ,'result' => $result) );
exit;

?>
