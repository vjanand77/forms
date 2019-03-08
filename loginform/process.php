<?php
session_start();
require_once('connection.php');

$action = $_POST['action'];


if($action == 'register')
{
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$dob   = date("Y-m-d",strtotime($_POST['dob']));
	$gen   = $_POST['gender'];
	$role  = $_POST['role'];
	$num   = $_POST['phone'];
	$add   = $_POST['address'];
	$mail  = $_POST['mail'];
	$pass  = md5($_POST['pass']);
	
	$sql   = "INSERT INTO registration_lf (firstname, surname, dob, gender, role, phone_no, address, email, password) 
			    VALUES ('".$fname."', '".$sname."', '".$dob."', '".$gen."', '".$role."', '".$num."', '".$add."', '".$mail."', '".$pass."')";
	mysqli_query($conn,$sql);
	$result = "success";
	$message = "Registered successfully";

}

if($action == 'update')
{
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$dob   = date("Y-m-d",strtotime($_POST['dob']));
	$gen   = $_POST['gender'];	
	$num   = $_POST['phone'];
	$add   = $_POST['address'];
	$mail  = $_POST['mail'];	
	$hid_id = $_POST['id'];
	$updp = "UPDATE registration_lf 
				  SET firstname = '$fname', surname = '$sname', gender = '$gen', email = '$mail', phone_no = '$num', dob = '$dob', address = '$add' 
				  WHERE reg_id = '$hid_id'";
	mysqli_query($conn,$updp);
	$result = "success";
	$message = "Updated successsfully";
}

/*if($_POST['log_submit'] == 'Sign In')*/
if($action == 'login')
{
	$user = $_POST['username'];
	$pass = md5($_POST['pass']);

	$sql = "SELECT * FROM registration_lf
			WHERE email = '$user' AND password = '$pass'";
	$res = mysqli_query($conn,$sql);
	$rs = mysqli_fetch_array($res);

	
	if($res ->num_rows > 0)
	{
		 //print_r($rs); exit;
		$result = "success";
		$message = "Login successful";
		$_SESSION['User_id']=$rs['reg_id'];
		$_SESSION['User_name']=$rs['email'];
		$role = $rs['role'];
		//echo "<script> window.location.href='home.php';</script>"; 
		//header("Location:loggedin_lf.php");
	}
	else
	{
		$result = "failure";
		$message = "Please check your details";
	}
}


if ($action == 'edit') 
{
	$id  	= $_POST['id'];
	$sql 	= "SELECT * FROM registration_lf WHERE reg_id = '$id'";
	$res = mysqli_query($conn, $sql);  
	$result = mysqli_fetch_assoc($res); 

	//$msg = 'updated successfully';
}

if($action == 'appointment')
{
	$id  	= $_POST['id'];
	$date  	= date("Y-m-d",strtotime($_POST['date']));
	$st  	= $_POST['st_time'];
	$et  	= $_POST['end_time'];

	$time = "SELECT count(apt_id) as count FROM appointment_lf 
				WHERE (startTime >= '$st' OR endTime > '$st')
				AND (startTime < '$et' OR endTime < '$et')  
				AND dateofapp = '$date' ";
	$resu = mysqli_query($conn,$time);
	$row = mysqli_fetch_array($resu); 
	$total = $row['count']; 
	if($total < '1')
	{
		$sql = "INSERT INTO appointment_lf (reg_id, dateofapp, startTime, endTime)
		VALUES ('".$id."', '".$date."', '".$st."', '".$et."')";
		mysqli_query($conn,$sql);
		$result = "success";
		$message = "Appointment booked";
	}
	else
	{
		$result = "failure";
		$message = "Time slot unavailable";
	}

}

if($action == 'request')
{
	$mail = $_POST['mail'];
	$otp = rand();
	$npass = md5($otp);
	$from = "From:info@resetpass.ac.in";
	$to = $mail;
	$sub = "New Password";
	$pass = "The new password is ".$otp;

	$sql = "UPDATE registration_lf
			SET password = '$npass' 
			WHERE email = '$mail' "; 
	mysqli_query($conn,$sql);
	mail($from,$to,$sub,$pass);
	$result = $pass;
	$message = "New password has been sent to your mail id";
}

if($action == 'otp')
{
	$mail = $_POST['mail'];
	$from = "From:info@resetpass.ac.in";
	$to = $mail;
	$otp = rand(1000,9999);
	$sub = "One time password";
	$sql = "UPDATE registration_lf
			SET otp = '$otp' 
			WHERE email = '$mail' "; 
	mysqli_query($conn,$sql);
	mail($from,$to,$sub,$otp);
	$result = $otp;
	$message = "OTP has been send to your mail";
}

if($action == 'reset')
{
	$mail = $_POST['mail'];
	$opass = md5($_POST['opass']);
	$npass = $_POST['npass'];
	$otp = $_POST['otp'];

	$sql = "SELECT password, otp 
			FROM registration_lf
			WHERE email = '$mail'"; 
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$pass = $row['password'];
	$sotp = $row['otp'];
	if($opass == $pass && $sotp == $otp)
	{
		$sql = "UPDATE registration_lf
				SET password = '$npass' 
				WHERE email = '$mail' ";
		mysqli_query($conn,$sql); 

		$result = "success";
		$message = "Password changed successfully";
	}
	else
	{
		$result = "failure";
		$message = "Please check your credentials";
	}
}


mysqli_close($conn);

$data = array (
	'res' => $result,
	'msg' => $message,
	'acc' => $role
	);

echo json_encode($data);

?>