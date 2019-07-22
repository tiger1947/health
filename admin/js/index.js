function validateForm() 
{	
	var _invalid = false;
	var _username = $('#username').val(); 
	var _password = $('#password').val();

	if(_username=="") 
	{
		$('#email_error').show();
		$('#email_error').html('Please enter email id');
		setTimeout(function(){ $('#email_error').hide(); }, 3000);
		_invalid = true;
	}
	else if(IsEmail(_username)==false)
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


	if(!_invalid)
	{		
		$.ajax({
			url: "ajax/ajax_login.php", //for data insertion to database"//"login.php",//
			type: "POST",
			data: { username : _username, password : _password },			
			success: function(result)
			{
				if($.trim(result)=='success')
				{
					window.location.href='dashboard.php'
				}
				else
					{
						$('#error_message').show().html('Invalid username and password');
						setTimeout(function(){
						$('#error_message').hide();},3000)
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


function viewProfile() 
{	
	var formData = new FormData($('#profile')[0]);
	$.ajax({
		url: "ajax/ajax_profile.php", //for data insertion to database"
		type: "POST",
		data: formData,
		cache: false,
		contentType: false,
		enctype: 'multipart/form-data',
		processData: false,
		success: function(result){			
			if($.trim(result)=='success')
			{
					window.location.href = 'profile.php';
			}
		}	
	});							
}
