<?php

require_once('connection.php'); 

$action = $_POST['action'];
/*$h_id	= $_POST['h_id'];*/

if($action == 'add')
{
$fname 	= $_POST['name1'];
$lname 	= $_POST['name2'];
$gender = $_POST['gen'];
$mob 	= $_POST['mobile'];
$mail	= $_POST['mail'];
$date	= date("Y-m-d", strtotime($_POST['date']));
$timef 	= $_POST['timef'];	
$timet 	= $_POST['timet'];
$hid_id = $_POST['hid_id'];

	if($hid_id == "")
	{
		/*to check the timeslot available btw the time entered*/
		$tme = "SELECT count(pat_id) as count FROM appointment 
				WHERE (from_time >= '$timef' OR to_time > '$timef')
				AND (from_time < '$timet' OR to_time < '$timet')  
				AND dateofapp = '$date' ";
		$resu = mysqli_query($conn,$tme);
		$row = mysqli_fetch_array($resu); 
		$total = $row['count']; 
		if($total == 0)
			{
					$qry = "SELECT count(pat_id) as count, pat_id 
							FROM patientdetails 
							WHERE firstname = '$fname' 
							AND lastname = '$lname' ";
					$res = mysqli_query($conn,$qry);
					$row = mysqli_fetch_array($res);  
					$count = $row['count'];

					if($count == 0)//new pat
						{
								$sql = "INSERT INTO patientdetails (firstname, lastname, gender, mobileno, mail)
										VALUES ('".$fname."', '".$lname."', '".$gender."', '".$mob."', '".$mail."')";
								 mysqli_query($conn,$sql); 
								 $sid = mysqli_insert_id($conn);
								//echo $sid = "SELECT pat_id FROM patientdetails WHERE mobileno = '$mob' ";


								$srl = "INSERT INTO appointment (dateofapp, from_time, to_time, pat_id)
										VALUES ('".$date."', '".$timef."', '".$timet."', '".$sid."')";
								mysqli_query($conn,$srl);
								$data = "success";
								$msg = "Details saved and appointment booked";
						}
					else 
						{
							$srl = "INSERT INTO appointment (dateofapp, from_time, to_time, pat_id)
									VALUES ('".$date."', '".$timef."', '".$timet."','".$row['pat_id']."')";
							mysqli_query($conn,$srl);
							mysqli_close($conn);
							$data = "success";
							$msg = "Appointment booked successfully";
						}
				
			}
		else
			{
				$data = "Failed";
				$msg = "Please change the time";
			}
	}

	else
	{
		$updp = "UPDATE patientdetails 
				SET firstname = '$fname', lastname = '$lname', gender = '$gender', mail = '$mail', mobileno = '$mob' 
				WHERE pat_id = '$hid_id'";
		mysqli_query($conn,$updp);

		echo $upda = "UPDATE appointment 
				SET dateofapp = '$date', from_time = '$timef', to_time = '$timet'
				WHERE pat_id = '$hid_id'";

		mysqli_query($conn,$upda);

		$data = "success";
		$msg = "Updation success";
	}
	
	$response = array(
	'result' 	=> $data,
	'message' 	=> $msg	
	);
	echo json_encode($response);
	exit;
}

		

 if ($action == 'del_data')
	{
			$id  	= $_POST['id'];
			$sql = "DELETE 
					FROM patientdetails 
					WHERE pat_id = '$id' ";
			mysqli_query($conn,$sql);
			$data = "success";
			$msg = "Deleted successfully";
	}

if ($action == 'edit') 
{
	$id  	= $_POST['id'];
	$sql 	= "SELECT patientdetails.*,appointment.dateofapp, appointment.from_time, appointment.to_time 
				FROM patientdetails LEFT JOIN appointment ON patientdetails.pat_id = appointment.pat_id
				WHERE patientdetails.pat_id = '$id'";
	$result = mysqli_query($conn, $sql);  
	$data = mysqli_fetch_array($result);  	
	$msg = 'updated successfully';
}

if ($action == 'search') 
{
	$value 	 	= $_POST['value'];
	$pattern 	= $_POST['pattern'];

	$sql = "SELECT * 
			FROM patientdetails 
			WHERE $value 
			LIKE '$pattern%'";
	$result 	= 	mysqli_query($conn,$sql);
	if($result ->num_rows > 0)
	{
		while( $row = mysqli_fetch_assoc($result) )
			{
				$data[] = $row;
			}
			$msg = "success";
	}
	else
	{
		$msg = "failure";
	}
}

if($action == 'filter')
{
	$date = date("Y-m-d", strtotime($_POST['date']));
	$sql = "SELECT patientdetails.firstname, patientdetails.lastname, appointment.pat_id, 
			appointment.from_time, appointment.to_time 
			FROM patientdetails 
			LEFT JOIN appointment 
			ON patientdetails.pat_id = appointment.pat_id 
			WHERE appointment.dateofapp = '$date'";
	$res = mysqli_query($conn,$sql);

	if($res ->num_rows > 0){
		while( $row = mysqli_fetch_assoc($res) )
			{
				$data[] = $row;
			}
			$msg = "success";
	}
	else
	{
		$msg = "failure";
	}
	
}


mysqli_close($conn);

$response = array(
	'result' 	=> $data,
	'message' 	=> $msg	
	);
echo json_encode($response);
exit;

?>
