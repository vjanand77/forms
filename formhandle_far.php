<?php
require_once('connection.php');

$mail = $_POST['mail'];
$name = $_POST['nm'];
$password = md5($_POST['password']);

$sql = "INSERT INTO register (email, name, password)
		VALUES ('".$mail."', '".$name."', '".$password."')";

mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: index.php");

?>