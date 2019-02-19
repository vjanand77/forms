<?php
require_once('connection.php');

$sql = "SELECT AVG (rate) FROM farmer"; 
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$avg = $row["AVG (rate)"];
    	//updating the table
    	$upd = "UPDATE farmer SET rate = '".$avg."' WHERE rate < '".$avg."' ";
		mysqli_query($conn,$upd);
    }
} else {
    echo "0 results";
}


$qry = "SELECT * FROM farmer WHERE rate = '".$avg."' ";
$res = mysqli_query($conn,$qry);
if(mysqli_num_rows($res) > 0) {
echo "<table border='1'>
<tr>
<th>Farmer name</th>
<th>Rate</th>
</tr>";
	while($row = mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>" . $row['farmer_name'] . "</td>";
		echo "<td>" . $row['rate'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "NO DATA FOUND:(";
}

mysqli_close($conn);
?>