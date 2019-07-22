function validateForm() 
{
	
	var _invalid = false;
	
	//validation check for fileds
	var _fname = $('#fname').val();
	var _lname = $('#lname').val();
	var _email = $('#email').val();
	var _password = $('#password').val();
	var _designation = $('#designation').val();
	var _department = $('#department').val();
	var _address = $('#address').val();
	var _specialist = $('#specialist').val();
	var _mobile = $('#mobile').val();
	var _picture = $('#picture').val();
	var _short_bio = $('#short_bio').val();
	var _date_of_birth = $('#date_of_birth').val();
	var _blood_group = $('#blood_group').val();
	
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
	if(_password=="") 
	{
		$('#password_error').show();
		$('#password_error').html('Please enter password');
		setTimeout(function(){ $('#password_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_designation=="")
	{
		$('#designation_error').show();
		$('#designation_error').html('Please enter designation');
		setTimeout(function(){ $('#designation_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_department=="")
	{
		$('#department_error').show();
		$('#department_error').html('Please enter department');
		setTimeout(function(){ $('#department_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_address=="")
	{
		$('#address_error').show();
		$('#address_error').html('Please enter address');
		setTimeout(function(){ $('#address_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_specialist=="")
	{
		$('#specialist_error').show();
		$('#specialist_error').html('Please enter specialist');
		setTimeout(function(){ $('#specialist_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_mobile=="" && _mobile.length < 10 && _mobile.length > 10)
	{
		$('#mobile_error').show();
		$('#mobile_error').html('Please enter valid mobile');
		setTimeout(function(){ $('#mobile_error').hide(); }, 3000);
		_invalid = true;
	}	
	if(_short_bio=="")
	{
		$('#short_bio_error').show();
		$('#short_bio_error').html('Please enter biography in short');
		setTimeout(function(){ $('#short_bio_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_date_of_birth=="")
	{
		$('#date_of_birth_error').show();
		$('#date_of_birth_error').html('Please enter date of birth');
		setTimeout(function(){ $('#date_of_birth_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_blood_group=="")
	{
		$('#blood_group_error').show();
		$('#blood_group_error').html('Please enter blood_group');
		setTimeout(function(){ $('#blood_group_error').hide(); }, 3000);
		_invalid = true;
	}
	
	if(!_invalid)
	{
		var formData = new FormData($('#registration')[0]);
		formData.append('action', 'add_doctor');
		$.ajax({
			url: "ajax/ajax_doctor.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				if($.trim(result)=='success')
				{
					window.location.href = 'doctor-list.php';
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


$( function() {
    $( "#date_of_birth" ).datepicker();
  } );