<?php
require_once('connection.php');


$id = $_POST['hdn_id'];


$sql = "SELECT image 
		FROM patientdetails 
		WHERE pat_id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$image   = $row['image'];
$file ='profile/'.$image;


if (!file_exists('profile')) 
{
    mkdir('profile', 0777, true);
}

$target_dir 	= "profile/";
//mention the exten as an array 
$allowed 		=  array('jpeg','png' ,'jpg' , 'jfif');
$file_name 		= date('dmYHis').$_FILES["up_profile"]["name"];
$target_file 	= $target_dir .$file_name;
$tmp_name 		= $_FILES["up_profile"]["tmp_name"]; 
// getg the ext alone from name with fileType func
$arr_extension 	= explode('/', $_FILES["up_profile"]["type"]); 
$file_type  	= $arr_extension[1]; 
//check for file type and redirect it
if(!in_array($file_type,$allowed) ) 
{
   header('Location: profile_ap.php?id='.$id.'&&img=0');exit;
}
else
{	
	$sql = "UPDATE patientdetails 
		SET image = '$file_name'
		WHERE pat_id = '$id'";
	move_uploaded_file($tmp_name, "$target_file");

}
	
mysqli_query($conn,$sql);


//unlink the image with the help of id passed
if(file_exists($file))
	{
	    unlink($file);
	}
else
	{
	    echo 'file not found';
	}


mysqli_close($conn);
header("location:page1_ap.php");
?>