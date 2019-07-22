function validateForm()
{		
	var _invalid = false;
	var _mobilenumber = $('#mobilenumber').val(); 
	var _password = $('#password').val();

	if(_mobilenumber=="") 
	{
		$('#mobilenumber_error').show();
		$('#mobilenumber_error').html('Please enter mobile number');
		setTimeout(function(){ $('#mobilenumber_error').hide(); }, 5000);
		_invalid = true;
	}
	
	if(_password=="") 
	{
		$('#password_error').show();
		$('#password_error').html('Please enter password');
		setTimeout(function(){ $('#password_error').hide(); }, 5000);
		_invalid = true;
	}	

	if(!_invalid)
	{	
		var formData = new FormData($('#loginForm')[0]);
		
		$.ajax({
			
			url: "ajax/ajax_user_login.php",
			type: "POST",
			data: { mobilenumber : _mobilenumber, password : _password },
			success: function(result)
			{	
				alert(result);
				if($.trim(result)=='doctor')
				{
					// alert('in doctor');
					window.location.href='dashboard.php'
				}
				else if($.trim(result)=='patient')
				{
					// alert('in patient');
					window.location.href='patient_profile.php'
				}
				else if($.trim(result)=='new_doctor')
				{
					// alert('in patient');
					window.location.href='form.php'
				}
				else if($.trim(result)=='new_patient')
				{
					// alert('in patient');
					window.location.href='patient_profile.php'
				}
				else
				{
					$('#error_message').show().html('Invalid mobile or password');
					setTimeout(function(){
					$('#error_message').hide();},5000)
				}
			}
		});						
	}
}







//code for forgot password


function validateotp()
{
	var _invalid = false;
	var _mobile_check = $('#input_mobile').val();
	
	if(_mobile_check=="")
	{
		$('#otp_error').show();
		$('#otp_error').html('please enter mobile');
		setTimeout(function(){ $('#otp_error').hide(); }, 5000);
		_invalid = true;
	}
	else if(_mobile_check.length < 10)
	{
		$('#otp_error').show();
		$('#otp_error').html('please enter valid mobile');
		setTimeout(function(){ $('#otp_error').hide(); }, 5000);
		_invalid = true;
	}
	if(!_invalid)
	{	
		
		$.ajax({
			url: "ajax/ajax_forget_password.php", //for data insertion to database"
			type: "POST",
			data: {mobile_number : _mobile_check, action : "check_mobile"},			
			success: function(result){			
				if($.trim(result) == 'error') 
				{						
					$('#otp_error').show().html('Invalid mobile number.');	
					return false;					
				}
				else //if($.trim(result) == 'success') 
				{
					alert($.trim(result));
					$('#otp_error').hide();
					$('#mobile_hidden').val(_mobile_check);					
					$('#send_otp').hide();
					$('#verify_otp').show();
				}					
			}	
		});
	}
}



function verifyotp()
{
	
	var _invalid = false;
	var _otp_check = $('#try_otp').val();
	var _mobile_check = $('#mobile_hidden').val();
		
	if(_otp_check=="")
	{
		$('otp_error').show();
		$('otp_error').html('please enter otp');
		setTimeout(function(){ $('#otp_error').hide(); }, 5000);
		_invalid = true;
	}
	if(!_invalid)
	{		
		
		$.ajax({
			url: "ajax/ajax_forget_password.php", //for data insertion to database"
			type: "POST",
			data: {mobile :_mobile_check, otp : _otp_check, action : "verify"},
			
			success: function(result){			
				if($.trim(result)=='success')
				{
					$('#mobile_hide').val(_mobile_check);
					$('#verify_otp').hide();
					$('#new_password').show();					
				}
			}	
		});
	}
}


function update_password()
{
	var _invalid = false;
	var _new_password = $('#password1').val();
	var _confirm_password = $('#confirm_password').val();
	var mobile_id = $('#mobile_hide').val();
	
	if(_new_password=="")
	{
		$('newpassword_error').show();
		$('newpassword_error').html('please enter newpassword');
		setTimeout(function(){ $('#newpassword_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_confirm_password=="")
	{
		$('newpassword_error').show();
		$('newpassword_error').html('please enter confirm password');
		setTimeout(function(){ $('#newpassword_error').hide(); }, 5000);
		_invalid = true;
	}
	else if(_confirm_password!=_new_password)
	{
		$('newpassword_error').show();
		$('newpassword_error').html('passwords does not match');
		setTimeout(function(){ $('#newpassword_error').hide(); }, 5000);
		_invalid = true;
	}
	if(!_invalid)
	{
		
		$.ajax({
			url: "ajax/ajax_forget_password.php", //for data insertion to database"
			type: "POST",
			data: {mobile : mobile_id, pass : _new_password, action : "set_password"},
			success: function(result)
			{	
				
				if($.trim(result)=='success')
				{					
					window.location.href='login.php'
				}
			}
		});
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





function reset_password()
{	
		console.log("hi")
	var _invalid = false;
	var _old = $('#old_password').val(); 
	var _new = $('#new_password').val(); 
	var _confirm = $('#confirm_password').val(); 
	

	if(_old=="") 
	{
		$('#old_password_error').show();
		$('#old_password_error').html('Please enter current password');
		setTimeout(function(){ $('#old_password_error').hide(); }, 5000);
		_invalid = true;
	}
	
	if(_new=="") 
	{
		$('#new_password_error').show();
		$('#new_password_error').html('Please enter new password');
		setTimeout(function(){ $('#new_password_error').hide(); }, 5000);
		_invalid = true;
	}	

	if(_confirm=="") 
	{
		$('#confirm_password_error').show();
		$('#confirm_password_error').html('Please enter confirm password');
		setTimeout(function(){ $('#confirm_password_error').hide(); }, 5000);
		_invalid = true;
	} else if(_confirm != _new) 
	{
		$('#confirm_password_error').show();
		$('#confirm_password_error').html('Confirm password does not match');
		setTimeout(function(){ $('#confirm_password_error').hide(); }, 5000);
		_invalid = true;
	}	

	if(!_invalid)
	{	
		$.ajax({			
			url: "ajax/ajax_password.php",
			type: "POST",
			data: { password1 : $.trim(_old), password2 : $.trim(_new) ,action : "change_password" },
			success: function(result)
			{	
				 // alert(result);
				 if($.trim(result)=='success')
				{
					alert('password updated successfully');
					window.location.href='detail-page.php'
				}
				else if($.trim(result)=='wrong')
				{
					alert('enter valid current password');
					/* $('#error_message').show().html('Please Enter valid current password');
					setTimeout(function(){
					$('#error_message').hide();},5000) */
				} 
			}
		});						
	}
}

