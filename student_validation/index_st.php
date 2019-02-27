<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Student validation</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>    
    
</head>
<body>
<p style="text-align: right;font-size: 20px;">
	<a href="retrieval_st.php">Show</a>
</p>
	<form name="st_reg" id="st_form">
		<table class="tb_mar" cellspacing="15">
		<tr><td colspan="2" class="txt" id="m_col">Register</td></tr>
		<tr>
		<th><label>First Name</label></th>
		<td><input type="text" name="fname" id="fname" class="txt"></td>
		</tr>
		<tr>
		<th><label>Last Name</label></th>
		<td><input type="text" name="lname" id="lname" class="txt"></td>
		</tr>
		<tr>
		<th><label>Gender</label></th>
		<td><input type="radio" name="gender" class="txt">Male</td>
		<td><input type="radio" name="gender" class="txt">Female</td>
		<!-- <td><input type="radio" name="gender" class="txt">Others</td> -->
		</tr>
		<tr>
		<th><label>Mobile number</label></th>
		<td><input type="tele" name="mob_num" id="mob_num" class="txt"></td>
		</tr>
		<tr>
		<th><label>Courses</label></th>
		<td>
			<select name="course" multiple="yes" id="course">
				<option value="1">+2</option>
				<option value="2">B.A</option>
				<option value="3">B.Sc</option>
				<option value="4">B.Com</option>
				<option value="5">M.A</option>
				<option value="6">M.Sc</option>
				<option value="7">M.Com</option>
			</select>
		</td>
		</tr>
		<tr>
		<th><label>Date of Birth</label></th>
		<td><input type="text" name="dob" id="dt_dob" class="date"></td>
		</tr>
		<tr>
		<th><label>Age</label></th>
		<td><label id="age"></label></td>
		</tr>
		<tr>
		<td></td>
		<td><button  id="submit">Submit</button></td>
		
		</tr>
	    </table>
	</form>
<script src="script_st.js" ></script>    
</body>
</html>