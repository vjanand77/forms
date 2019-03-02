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
		header("location: index2_far.php"); 		
	}
else
	{
		echo "Login Failed";
	}


/*$sql="SELECT * FROM register WHERE name='$uname'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    $row = mysql_fetch_assoc($result);
 if (md5(md5($row['salt']).md5($password)) == $row['password']){        
 		session_register("name");
        session_register("password"); 
        echo "Login Successful";
        return true;
    }
    else {
        echo "Wrong Username or Password";
        return false;
    }
}
else{
    echo "Wrong Username or Passwordsssss";
    return false;
}*/


?>
