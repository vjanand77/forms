<?php

require_once('connection.php');

$sql = "SELECT * FROM student";
$res = mysqli_query($conn,$sql); 
$arr_courses = array(
					0 => '+2',
					1 => 'B.A',
					2 => 'B.Sc',
					3 => 'B.Com',
					4 => 'M.A',
					5 => 'M.Sc',
					6 => 'M.Com',
				 ); 


if($res ->num_rows > 0) {

echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>B Day</th>
<th>mobile_no</th>
<th>Courses</th>
</tr>";
	while($row = mysqli_fetch_assoc($res))
	{	
		$arr_names = explode('-', $row['name']); 
		$courses = explode (',', $row['course']);  
		$course_name = "";
		foreach ($courses as $id )
				{
					$course_name = $course_name.$arr_courses[$id].' , ';
				}
		echo "<tr>";
		echo "<td>" . ucwords($arr_names[0])  ."</td>";
		echo "<td>" . $arr_names[1] ."</td>";
		$date =  date("d-F-Y",strtotime($row['dob']));
		echo "<td>" . $date . "</td>";
		echo "<td>" . $row['mobile'] . "</td>";
		echo "<td>" . $course_name. "</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "NO DATA FOUND:(";
}

mysqli_close($conn);


?>