$(document).ready(function(){
		/*to bind the function with document*/
	 $("body").delegate("#date", "focusin", function(){
        $(this).datepicker({
        	dateFormat : 'mm/dd/yy',
			changeMonth : true,
			changeYear : true,
			yearRange: '-100:+0',
			minDate: +1,
        });
    });

 	$("body").delegate("#fil_date", "focusin", function(){
    $(this).datepicker({
    	dateFormat : 'mm/dd/yy',
		changeMonth : true,
		changeYear : true,
		yearRange: ':c+nn',
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
		$('#reload').hide();

});

// to clear the modal form 
$('#formclear').click(function(){
	$('#ap_form').find("input[type=text]").val("");
})

$('#submit').click(function(){

	    $("#ap_form").validate({
			rules: {
				f_name: "required",
				l_name: "required",
				mail_id: "required",
				m_num:{
					required: true,
					minlength: 10,
					number: true
				},
				date: "required",
				gender: "required",
				time_apf: "required",
				time_apt: "required",
				find_details: "required"
			},
			messages: {
				f_name: 	"Please enter First name",
				l_name: 	"Please enter Last name",
				gender: 	"Select Gender",
				mail_id: 	"Please enter Mail id",
				m_num:  	"Please enter valid mobile number",
				date:   	"Please select a date for appointment",
				time_apf: 	"Please select a time",
				time_apt: 	"Please select a time",
				find_details:"Please enter the detail"
				
			},
			submitHandler: function(form) 
				{ 
	      				var data = {
										name1: 		$("#f_name").val(),
										name2: 		$("#l_name").val(),
										gen: 		$("input[name='gender']:checked").val(),
										mobile: 	$("#m_num").val(),
										mail: 		$("#mail_id").val(),
										date: 		$("#date").val(),
										timef: 		$("#time_apf").val(),
										timet: 		$("#time_apt").val(),
										hid_id : 	$("#hd_id").val(),
										action: 	'add',
									};
						
						$.ajax({
							url:'pagehandle_ap.php',
							type:'POST',
							data: data,
							dataType: "json",
							success:function(result) 
								{	
									if(result.message != "success")
									{
										$("#exampleModalCenter").modal({"backdrop": "static"});
									}
									else
									alert(result.message);
						        	$('#msg').html(result.message);
						        	/*$('#exampleModalCenter').modal('hide');*/							
						    	}
						});
						location.reload();
	   			}
		    });
	    	
		});
//use class to call the delete function for a num of buttond in a same sheet with |||lar type

$("#apt_details").delegate(".del", "click", function() {
	var con = confirm("Are you Sure?");
	if(con == true)
		{
			var data = {
				id:$(this).attr('data-id'),
				action: 'del_data',
				};
			$.ajax({
					url: 'pagehandle_ap.php',
					type: 'POST',
					data: data,
					dataType: "json",
					success:function(result)
						{
							alert(result.message);
							location.reload();
						}
					});
		}
		else
		{
			alert("Cancelled");
		}

		});
//the search event is done after js loaded. to catch the binding issue use delegate()
//table id . delegate . button class , event , func();
$("#apt_details").delegate(".edit", "click", function() { 
	var hid_id = $(this).attr('data-id');
	var data = {
				id:$(this).attr('data-id'),					 
				action: 'edit'
				};
	$.ajax({
		url: 'pagehandle_ap.php',
		type: 'POST',
		data: data,
		dataType: "json",
		success:function(data)
			{ 

				$('#exampleModalCenter').modal('show');
				$('#f_name')	.val(data.result.firstname);  
	            $('#l_name')	.val(data.result.lastname); 
	            //to select the radio button based on value from db
	            if(data.result.gender == 'm')
	            	$('#ml').prop('checked', true);
	            else 
	            	$('#fl').prop('checked', true);

	            $('#mail_id') 	.val(data.result.mail);  
	            $('#m_num')		.val(data.result.mobileno); 
	            $('#date')		.val(data.result.dateofapp);
	            $('#time_apf')	.val(data.result.from_time);
	            $('#time_apt')	.val(data.result.to_time);
	            $('#hd_id')		.val(data.result.pat_id); 
			}
	})
})

$('#search').click(function(){
	 if( $('#find_details').val() == '')
	 {
	 	$('#er_msg').html("Please enter a Value");
	 	return;
	 }
	var data = {
		value: $('#sel_opt option:selected').val(),
		pattern: $('#find_details').val(),
		action: 'search'
	};
	var  content = "";
	$.ajax({
		url: 'pagehandle_ap.php',
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(data)
		{	
			$('#ModalCenter').modal('hide');
			$('#reload').show();

				var content	= "";	 
				if(data.message == "failure")
					{
						content += 'No Details Found';
					}
				else
					{
						$.each(data.result, function(i) { 
						content += '<tr>';
							//to display the default image
						if(data.result[i].image == null && data.result[i].gender == 'm')
							{
								content += '<td> <img src="profile/male.png" width="50" height="50"></td>';
							}	
						else if(data.result[i].image == null && data.result[i].gender == 'f')
							{
								content += '<td> <img src="profile/female.png" width="50" height="50"></td>';
							}
						else
							{
								content += '<td> <img src="profile/'+data.result[i].image+'" width="50" height="50"></td>';
							}			
						content += '<td>'+data.result[i].firstname+'</td>';
						content += '<td>'+data.result[i].lastname+'</td>';
						content += '<td>'+data.result[i].gender+'</td>';
						content += '<td>'+data.result[i].mobileno+'</td>';					
						content += '<td>'+data.result[i].mail+'</td>';
						content += '<td> <button type= "button" id="update" data-id ='+data.result[i].pat_id+' class="btn-primary edit">Edit</button></td>';
						content += '<td> <button id="del" data-id ='+data.result[i].pat_id+' class="btn-danger del">Delete </button></td>';
						content += '<td> <a href = "profile_ap.php?id='+data.result[i].pat_id+'" id="upload" data-id ='+data.result[i].pat_id+' class="btn-secondary upload">File upload </a> </td>';
						content += '</tr>';
					});
			}		
			$("#dpt_body").html(content);
		}
	})
})

$('#reload').click(function() {
	location.reload();
});

$('#filter').click(function() {	
	if($('#fil_date').val() == "")
	{
		$('#err_msg').html("Please select a Date");
		return;
	}
			var data = {
				date: $('#fil_date').val(),					 
				action: 'filter'
				};

			$.ajax({
				url: 'pagehandle_ap.php',
				type: 'POST',
				data: data,
				dataType: 'json',
				success: function(data)
					{

						$('#filterModal').modal('hide');
						var cont = "";
							if(data.message == 'failure')
								{
									cont += 'No Appointments on this date';
								}
							else
							{
								$.each(data.result, function(i) 
								{ 
									cont += '<tr>';
									cont += '<td>'+data.result[i].pat_id+'</td>';
									cont += '<td>'+data.result[i].firstname+' '+data.result[i].lastname+'</td>';
									cont += '<td>'+data.result[i].from_time+'-'+data.result[i].to_time+'</td>';
									cont += '<td><a href = "detail_ap.php?id='+data.result[i].pat_id+'" id = "details">Details</a> </td>';
									cont += '</tr>';
								});	
							}			
						$('#flt_appointment').html(cont);
					}
				});
});

/*$('#upload').click(function(){
	var img = $(this).parent().siblings(":first").data('image');
	$("#n_img").val(img);
});*/

//variable for checking file
var is_proper_file = false;
//done during changing or choosing a new file
$('#up_profile').change(function(){
       var fileName = $(this).val();
       //to get the file extension 
       var ext = fileName.split('.').pop();
       if($.inArray(ext, ['gif','png','jpg','jpeg', 'jfif']) == -1) 
			{
		    $('#lbl_msg').html('invalid extension!');
		    $('#up_profile').val('');
			}
		else
			is_proper_file = true;
     });
//done during the submission of uploaded file
 $('#img_form').on('submit', function(e){
 	//prevenrt the default submission of form
        e.preventDefault();  
        if (is_proper_file == true) 
        {
            this.submit();
        }
        else
        {
        	$('#lbl_msg').html('Please select a file!');
        }
    });


