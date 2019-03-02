<?php
$servername = "localhost";
$dbname 	= "db_intern_test";
$username 	= "kmmuser";
$password 	= "medical";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>