function patient_appointment() 
{
	var _invalid = false;
	var _fname = $('#fname').val();
	var _lname = $('#lname').val();
	var _mobile = $('#mobile').val();
	var _email = $('#email').val();
	
	if(_fname=="")
	{
		$('#fname_error').show();
		$('#fname_error').html('Please enter first name');
		setTimeout(function(){ $('#fname_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_lname=="")
	{
		$('#lname_error').show();
		$('#lname_error').html('Please enter last name');
		setTimeout(function(){ $('#lname_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_mobile=="")
	{
		$('#mobile_error').show();
		$('#mobile_error').html('Please enter mobile');
		setTimeout(function(){ $('#mobile_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_email=="") 
	{
		$('#email_error').show();
		$('#email_error').html('Please enter email id');
		setTimeout(function(){ $('#email_error').hide(); }, 3000);
		_invalid = true;
	}
	else if(IsEmail(_email)==false)
	{
		$('#email_error').show();
		$('#email_error').html('Please enter valid Email id');
		setTimeout(function(){ $('#email_error').hide(); }, 3000);
		_invalid = true;
	}
	
	if(!_invalid)
	{
		var formData = new FormData($('#patient_conformation')[0]);
		formData.append('action','patient_confirm_information');
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
				{
					
					window.location.href = 'confirm.php';
				}
			
			}	
		});
	}
}

function IsEmail(email) 
{
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email))
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
