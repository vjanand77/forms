<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<script>
$(document).ready(function(){
	 $("#div_delete").hide();
	
$(".delete").click(function(){

	var id = $(this).data('id');
	$("#hd_id").val(id);
	$("#div_delete").show();
	//transversing in JQUERY(to find the selected element)
	var name = $(this).parent().siblings(":first").text();
	$("#fi_name").val(name);
});
$("#div_edit").hide();

$(".edit").click(function(){
	var e_id = $(this).data('id');  
	$("#nhd_id").val(e_id);
	$("#div_edit").show();
	
	//to get values of the nearest sibiling or the values of columns in database
	var n_fname = $(this).closest('tr').find('td:eq(0)').text();
	$("#f_name").val(n_fname);
	var n_lname = $(this).closest('tr').find('td:eq(1)').text();
	$("#l_name").val(n_lname);
	var n_gender = $(this).closest('tr').find('td:eq(2)').text();
	$("#n_gen").val(n_gender);
	var n_adder = $(this).closest('tr').find('td:eq(3)').text();
	$("#n_address").val(n_adder);
	var n_mail = $(this).closest('tr').find('td:eq(4)').text();
	$("#mail_id").val(n_mail);
	var n_num = $(this).closest('tr').find('td:eq(5)').text();
	$("#m_num").val(n_num); 
	var n_img = $(this).closest('tr').find('td:eq(6)').data('image');  
	//assigned the value to hidden field
	$("#n_img").val(n_img);
})	

});
</script>
<body>

<?php
require_once('connection.php'); 
$sql = "SELECT * FROM registration";
$res = mysqli_query($conn,$sql);

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
<th>Image</th>
<th>Delete</th>
<th>Edit</th>
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
		//to show the image in table(viewing db images in web)
		echo "<td data-image = '".$row['image']."'> <img src='uploads/".$row['image']."' height='50' width='50'> </td>";
		echo "<td> <a href='#' class='delete' data-id='".$row['ID']."'>Delete</a> </td>";
		echo "<td> <a href='#' class='edit' data-id='".$row['ID']."'>EDIT</a> </td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "NO DATA FOUND:(";
}

$conn->close();
?>

<br><br><br>

<div id="div_delete">
	<label>Are you sure to delete this?</label>
<form name="myForm" method="POST" action="handler_sf.php" id="n_form">
<input type="text" name="fi_name" placeholder="Name" id="fi_name" required>
<input type="hidden" id="hd_id" name ="hd_id">
<input type="submit" name="submit" value="Delete">
</form>
</div>

<div id="div_edit">
<label>Verify all the Details....</label>
<form name="editForm" id="e_form" method="POST" action="formhandle_sf.php" enctype="multipart/form-data">
	<input type="text" placeholder="First Name" name="fname" id="f_name"><br>
	<input type="text" placeholder="Last Name" name="lname" id="l_name"><br>
	  <input type="radio" name="gender" value="male">male
      <input type="radio" name="gender" value="Female">Female
      <input type="radio" name="gender" value="others">Others<br>
<!--<input type="text" placeholder="Gender" name="gender" id="n_gen">-->
	<textarea name="address" id="n_address"></textarea><br>
	<input type="email" placeholder="E-Mail" name="mail_id" id="mail_id"><br>
	<input type="tel" placeholder="Mobile Number" name="m_num" id="m_num"><br>
	<input type="file" name="up_file" id="n_file"><br>
	<input type="hidden" name="n_img" id="n_img">
	<input type="hidden" id="nhd_id" name ="n_id">
	<input type="submit" name="edit" value="Edit">   

</form>
</div>

</body>
</html>


