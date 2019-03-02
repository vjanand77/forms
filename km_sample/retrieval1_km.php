
<?php
require_once('connection.php'); 

$sql = "SELECT * FROM personaldetails";
$res = mysqli_query($conn,$sql);
if($res -> num_rows > 0) {
echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>D_O_B</th>
<th>Gender</th>
<th>Occupation</th>
<th>Address</th>
<th>Mail_ID</th>
<th>Mobile_no</th>
</tr>";
  //output data of each row
  while($row = mysqli_fetch_array($res))
  {
    echo "<tr>";
    echo "<td>" . $row['firstName'] . "</td>";
    echo "<td>" . $row['lastName'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['occupation'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['mobilenum'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "NO DATA FOUND:(";
}

mysqli_close($conn);
?>

