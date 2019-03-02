<?php
require_once('connection.php'); 

echo $id  = $_POST['hd_id'];
echo $sql = "DELETE FROM registration WHERE ID = {$id}"; exit;
mysqli_query($conn,$sql);
mysqli_close($conn);
header ("Location: retrieval_sf.php");

?>

<!--
if($res -> num_rows > 0) {
//created a table view for retrieved data
echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>Gender</th>
<th>Address</th>
<th>Mail_ID</th>
<th>Mobile_no</th>
</tr>";
	//output data of each row
	while($row = mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>" . $row['First_Name'] . "</td>";
		echo "<td>" . $row['Last_Name'] . "</td>";
		echo "<td>" . $row['Gender'] . "</td>";
		echo "<td>" . $row['Address'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['mob_num'] . "</td>";
		echo "</tr>";
	}
	
	echo "</table>";
} else {
	echo "NO DATA FOUND:(";
}-->


