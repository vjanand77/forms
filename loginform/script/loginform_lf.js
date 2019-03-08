$(document).ready(function(){
	$("body").delegate("#dob","focusin",function(){
		$(this).datepicker({
			dateFormat:'dd/mm/yy',
			changeMonth: true,
			changeYear: true,
			yearRange: '-50:c+nn',
			maxDate: -1,
		});
	});
$("body").delegate("#date_ap", "focusin", function(){
    $(this).datepicker({
    	dateFormat : 'mm/dd/yy',
		changeMonth : true,
		changeYear : true,
		yearRange: ':c+nn',
		minDate: +1,
   		 });
	});

$("body").delegate(".time", "focusin", function(){  
 	$('.time').timepicker({
	    timeFormat: 'h:mm',
	    interval: 30,
	    minTime: '10',
	    maxTime: '6:00pm',
	    startTime: '10:00',
	    dynamic: false,
	    dropdown: true,
	    scrollbar: true
		});
	});

	$('#editForm').hide();
	$('#bookAppointment').hide();
})

	$('#log_submit').click(function(){
		$('#loginForm').validate(
		{
			rules: {
				username: "required",
				login_password : {
					required: true,
					minlength: 6
				}
			},
			messages: {
				username : "Please enter User Name",
				login_password : "Plaese enter a valid password"
			},
			submitHandler: function(form)
			{
				var data = {
					username: $('#username').val(),
					pass: $('#login_password').val(),
					action: 'login'
				};
				$.ajax({
					url:'process.php',
					type:'POST',
					data: data,
					dataType: "json",
					success:function(data) 
						{
				        	console.log(data);
				        	if(data.res == "success" && data.acc == 'p')
				        	{
				        		location.href='page1.php';
				        	}
				        	else if(data.res == "success" && data.acc == 'a')
				        	{
				        		location.href = 'home.php';
				        	}
				        	else
				        		alert(data.msg);
				    	}
				}); 
			}

		});
	});

	$('#register').click(function() {
		$('#newForm').validate(
		{
			rules: {
				fname: "required",
				sname: "required",
				dob: "required",
				gender: "required",
				role: "required",
				phone:{
					number: true,
					minlength: 10,
					maxlength: 10
				},
				address: "required",
				mail_id: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				},
				conf_password: {
					required: true,
					equalTo: "#password"
				}

			},
			messages: {
				fname: "Please enter first name",
				sname: "Please enter surname",
				dob: "Please select your date of birth",
				gender: "Please select a gender",
				role : "Please select the role",
				phone: "Please enter valid contact",
				address: "Please enter address",
				mail_id: "Please enter a valid mail id",
				password: "Minimum 6 characters required",
				conf_password: "Password does not match"
			},
			submitHandler: function(form)
			{
				var data = {
					fname: $('#fname').val(),
					sname: $('#sname').val(),
					dob: $('#dob').val(),
					phone: $('#phone').val(),
					gender: $("input[name='gender']:checked").val(),
					role : $("input[name='role']:checked").val(),
					address: $('#address').val(),
					mail: $('#mail_id').val(),
					pass: $('#password').val(),
					action: 'register',
				};
				$.ajax({
					url:'process.php',
					type:'POST',
					data: data,
					dataType: "json",
					success:function(result) 
						{
				        	console.log(result);
				        	location.reload();
				    	}
				});
			}
		});
	});

	$('#pat_details').delegate(".edit", "click", function() {

		var data = {
			id: $(this).attr('data-id'),
			action: 'edit'	
		};
		$.ajax({
			url: 'process.php',
			type: 'POST',
			data: data,
			dataType: "json",
			success:function(result)
			{
				$('#editForm').show();
				$('#fname')	.val(result.res.firstname);  
	            $('#sname')	.val(result.res.surname); 
	           //to select the radio button based on value from db
	            if(result.res.gender == 'm')
	            	$('#ml').prop('checked', true);
	            else 
	            	$('#fl').prop('checked', true);

	            $('#mail_id') 	.val(result.res.email);  
	            $('#phone')		.val(result.res.phone_no); 
	            $('#dob')		.val(result.res.dob);
	            $('#address')	.val(result.res.address);
	            $('#hid_id')	.val(result.res.reg_id); 
			}
		});
	});
	
	$('#book_app').click(function(){
		$('#book_app').hide();
		$('#bookAppointment').show();
	});
	
	$('#submit').click(function() {
		var data = {
			fname: $('#fname').val(),
			sname: $('#sname').val(),
			dob: $('#dob').val(),
			phone: $('#phone').val(),
			gender: $("input[name='gender']:checked").val(),
			address: $('#address').val(),
			mail: $('#mail_id').val(),
			id: $('#hid_id').val(),
			action: 'update',
		};
		$.ajax({
			url: 'process.php',
			type: 'POST',
			data: data,
			dataType: 'json',
			success:function(result)
			{
				alert(result.msg);
				//alert(result.msg);
			}
		});
	});

	$('#add_apt').click(function(){		
		$('#ap_form').validate({
			rules: {
				date_ap: "required",
				time_apf: "required",
				time_apt: "required",
			},
			messages: {
				date_ap: "Please select a date",
				time_apf: "Please select start time",
				time_apt: "Please select end time"
			},
			submitHandler:function()
			{
				var data = {
					date: $('#date_ap').val(),
					st_time: $('#time_apf').val(),
					end_time: $('#time_apt').val(),
					id: $('#hd_id').val(),
					action: 'appointment',
				};
				$.ajax({
					url: 'process.php',
					type: 'POST',
					data: data,
					dataType: 'json',
					success:function(result)
					{
						alert(result.msg);
						location.reload();
					}
				});
			}
		});
	});
	

	$('#req_password').click(function(){
		$('#reqForm').validate({
			rules: {
				mail: "required",
			},
			messages: {
				mail: "Please enter mail id",
			},
			submitHandler:function()
			{
				var data = {
					mail : $('#mail').val(),
					action: 'request',
				};
				$.ajax({
					url: 'process.php',
					type: 'POST',
					data: data,
					dataType: 'json',
					success:function(result)
					{
						alert(result.res);
						location.reload();
					}
				});
			}
		});
	});

	$('#reset_password').click(function(){
		$('#resetForm').validate({
			rules: {
				e_mail : "required",
				old_password: "required",
				n_password: {
					required: true,
					minlength: 6,
				},
				npass_conf: {
					equalTo: "#n_password",
				},
				otp: "required",
			},
			messages: {
				e_mail: "Please enter your mail id",
				old_password : "Please enter your old password",
				n_password : "Please enter the password",
				npass_conf: "Pssword does not match",
			},
			submitHandler:function()
			{
				var data = {
					mail: $('#e_mail').val(),
					opass: $('#old_password').val(),
					npass: $('#n_password').val(),
					otp: $('#otp').val(),
					action: 'reset',
				};
				$.ajax({
					url: 'process.php',
					type: 'POST',
					data: data,
					dataType: 'json',
					success:function(result)
					{
						alert(result.msg);						
					}
				});
				location.reload();
			}
		});
	});

	$('#req_otp').click(function(){
		var data = {
			mail: $('#e_mail').val(),
			action: 'otp'
		};
		$.ajax({
			url: 'process.php',
			type: 'POST',
			data: data,
			dataType: 'json',
			success:function(result)
			{
				alert(result.res);
				alert(result.msg);

			}
		});
	})




/*	$('#').click(function(){
		$('#').validate({
			rules: {

			},
			messages: {

			},
			submitHandler:function()
			{
				var data = {

				};
				$.ajax({

				});
			}
		});
	});






	$('#').click(function(){
		$('#').validate({
			rules: {

			},
			messages: {

			},
			submitHandler:function()
			{
				var data = {

				};
				$.ajax({

				});
			}
		});
	});




	$('#').click(function(){
		$('#').validate({
			rules: {

			},
			messages: {

			},
			submitHandler:function()
			{
				var data = {

				};
				$.ajax({

				});
			}
		});
	});*/
