$(document).ready(function(){    

$(".date").datepicker({
	dateFormat : 'mm/dd/yy',
	changeMonth : true,
	changeYear : true,
	yearRange: '-70y:c+nn',
	maxDate: '-1d',
	});

});


$('#submit').click(function(){  

	    $("#st_form").validate({
			rules: {
				fname: "required",
				lname: "required",
				gender: "required",
				mob_num:{
					required: true,
					minlength: 10,
					number: true
				},
				dob: "required",
				courses: "required"
			},
			messages: {
				fname: "Please enter First name",
				lname: "Please enter Last name",
				gender: "Please select gender",
				mob_num: "Please enter valid mobile number",
				courses: "Please select the courses",
			},
			submitHandler: function(form) 
				{ 
	      				var data = {
										name1: $("#fname").val(),
										name2: $("#lname").val(),
										mobile: $("#mob_num").val(),
										dob: $("#dt_dob").val(),
										course: $("#course").val(),
									};
						$.ajax({
							url:'handle_st.php',
							type:'POST',
							data: data,
							dataType: "json",
							success:function(result) 
								{
						        	alert(result.msg);
						    	}
						}); 
	   			}
	    });
	    	
});
	

$('.date').change(function(){ 
    	var dob= new Date(this.value);
		var tdy = new Date();
		var age = tdy.getFullYear() - dob.getFullYear();
		$("#age").text(age);
});

