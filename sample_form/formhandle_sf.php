<?php	
require_once('connection.php'); 

//creating a new directory
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if($_FILES["up_file"]["name"] != "") 
	{ 
		//uploading a file in the directory
		$target_dir 	= "uploads/";
		$file_name 		= date('dmYHis').$_FILES["up_file"]["name"];
		$target_file 	= $target_dir .$file_name;
		$tmp_name 		= $_FILES["up_file"]["tmp_name"]; 		
		move_uploaded_file($tmp_name, "$target_file");
		//check whether the var is present or not with a value
		if( isset($_POST["n_img"]) && $_POST["n_img"] != "" )
			unlink('uploads/'.$_POST["n_img"]);
	}
else
	{
		$file_name  	= $_POST['n_img'];	
	}
$id  = $_POST['n_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gen = $_POST['gender'];
$mail = $_POST['mail_id'];
$num = $_POST['m_num'];
$address = $_POST['address'];

if($id  == "" )
	{
	$sql = "INSERT INTO registration (First_Name, Last_Name, Gender, Address, email, mob_num, image)
		VALUES ('".$fname."','".$lname."','".$gen."', '".$address."', '".$mail."','".$num."','".$file_name."')";
	}
else 
	{
	$sql = "UPDATE registration SET First_Name = '$fname', Last_Name= '$lname', Gender = '$gen', email = '$mail', mob_num = '$num',
     	Address = '$address', image= '$file_name'  WHERE ID ={$id}"; 		
	}

	mysqli_query($conn,$sql);
	mysqli_close($conn);
	header ("Location: index_sf.php");
	
/*if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/
	
?>