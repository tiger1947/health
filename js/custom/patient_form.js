function patient_registration() 
{
	var _invalid = false;	
	var _email = $('#email').val();

	if(_email=="") 
	{
		$('#fullname_error').show();
		$('#fullname_error').html('Please Enter Email Address');
		setTimeout(function(){ $('#fullname_error').hide(); }, 3000);
		_invalid = true;
	}
	else if(IsEmail(_email)==false) 
	{
		$('#email_address_error').show();
		$('#email_address_error').html('Please Enter valid Email');
		setTimeout(function(){ $('#email_address_error').hide(); }, 3000);
		_invalid = true;
	}
	
	if(!_invalid)
	{
		var formData = new FormData($('#patient_information')[0]);
		formData.append('action','patient_personal_information');
		$.ajax({
			url: "ajax/ajax_patient_form.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				if($.trim(result)=='success')
					alert(result);
				{
					
					window.location.href = 'patient_view.php';
				}				
			}	
		});
	}
}

function IsEmail(email_address) 
{
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email_address))
		{
		return false;
		}
		else
		{
		return true;
		}
}


function isNumberKey(evt)
{
	 var charCode = (evt.which) ? evt.which : event.keyCode
	 if(charCode > 31 && (charCode < 48 || charCode > 57))
	 {
		 return false;
	 }
	else
	{
		return true;
	}
}
function confirmForm()
{
	
	var formData = new FormData($('#profile_data')[0]);
		formData.append('action','update_patient');
		$.ajax({
			url: "ajax/ajax_patient_form.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result)
			{
				if($.trim(result)=='success')	
				{
					window.location.href = 'patient_profile.php';
				}				
			}	
		});
}
/* $(document).ready(function() {
	$('#example').DataTable();
	$("#example_wrapper").css("width","100%");
}); */



function getData(user_id)
{
	
	$.ajax({
		url: "ajax/ajax_patient_form.php", //for data update to database"
		type: "POST",
		data: { id : user_id, action:'edit_patient'},//to pass the value on another page 
		success: function(result){
			$('#profile_data').html(result);
		}	
	});
}
