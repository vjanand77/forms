<?php

require_once('connection.php'); 

$mob = $_POST['mobile'];
$qry = "SELECT count(std_id) as count FROM student WHERE mobile = '$mob' ";
$result = mysqli_query($conn,$qry);
$row = mysqli_fetch_array($result);  
$count = $row['count']; 
if($count == 0)
{

	$name    = $_POST['name1'] . "-". $_POST['name2'];
	$course	 = $_POST['course'];
	$dob 	 =  date("Y-m-d", strtotime($_POST['dob']));
	$mob	 = $_POST['mobile'];

	foreach ($course as $co => $value){
 	$co = implode(',', $course);
 }

$sql = "INSERT INTO student (name, course, dob, mobile)
				VALUES ('".$name."', '".$co."', '".$dob."', '".$mob."')";
mysqli_query($conn,$sql);
mysqli_close($conn);
$msg ="Success";
$res = true;

}
else
{
	$msg ="Mobile Number Exists";
$res = false;
}

$resp = array(
	'res' => $res,
	'msg' => $msg
	);
echo json_encode($resp);
exit;
 

?>