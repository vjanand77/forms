<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
<script>
	
	$(document).ready(function(){     
  	submitHandler: function(form) 
    {    
      form.submit();
      }
  });

</script>
<h2>Amounters</h2>
<form name="my_form" id="my_form">
	<div class="form">	
		<table class="tb_mar" cellspacing="15">
		<tr>
		<th><label>Farmer Name</label></th>
		<td><input type="name" name="name" id="name" class="txt" required></td>
		</tr>
		<tr>
		<th><label>Amount</label></th>
		<td><input type="number" name="num" id="num" class="txt" required></td>
		</tr>
		<tr>
		<td><a href="avg_farmer.php" style="font-size: 20px">Update</a></td>
		<td style="text-align: center;"><button type="submit" id="submit">Insert</button></td>
		</tr>
	    </table>
	</div>
</form>


<?php
require_once('connection.php');

$sql = "SELECT AVG (rate) FROM farmer"; 
$result = mysqli_query($conn,$sql);
//check condition to identify wheather datas are present in the table

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	//storing the avg value in a variable
    	$avg = $row["AVG (rate)"];
    	$updt = "SELECT * FROM farmer";
		$resu = mysqli_query($conn,$updt);
			if(mysqli_num_rows($resu) > 0) {
			echo ("Updated Table");
			echo "<table border='1'>
			<tr>
			<th>Farmer name</th>
			<th>Rate</th>
			</tr>";
				while($row = mysqli_fetch_array($resu))
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
			    }
			} else {
			    echo "0 results";
			}

echo ("Average:". round($avg))."<br>";
$avgs = $avg+5;
$qry = "SELECT * FROM farmer WHERE rate > '".$avgs."' ";
$res = mysqli_query($conn,$qry);
if(mysqli_num_rows($res) > 0) {
	echo ("Farmer's amount greater than average");
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


<style>
.tb_mar {
	width: 200px;
	margin: auto;
	background-color: #c842f4;
	border-radius: 15px;
}
.txt {
	height: 30px;
	width: 200px;
}
#submit {
	width: 100px;
	height: 50px;
	border-radius: 25px;
	background-color: blue;
	font-size: 20px;
}
#m_col {
	text-align: center;
	font-size: 25px;
}
</style>
</body>
</html>