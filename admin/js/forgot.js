
function forgotpassword() 
{	
	var _invalid = false;
	var _username = $('#username').val(); 
	
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


	if(!_invalid)
	{		
		$.ajax({
			url: "ajax/ajax_forgot_password.php", //for data insertion to database"//"login.php",//
			type: "POST",
			data: { username : _username},			
			success: function(result){
				alert($.trim(result));
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