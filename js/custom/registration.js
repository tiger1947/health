function setType(_type)
{
	if(_type == '1')
	{
		$('#type').val(_type);
		$('#doc_reg').hide();
		$('#pat_reg').show();
	}	
	else
	{
		$('#type').val(_type);
		$('#doc_reg').show();
		$('#pat_reg').hide();
	}		
}

function validateForm()
{
	
	var _invalid = false;
	
	//validation check for fileds
	var _fname = $('#full_name').val();
	var _password = $('#password').val();
	var _mobile = $('#mobile').val();
	
	if(_fname=="")
	{
		$('#fname_error').show();
		$('#fname_error').html('Please enter first name');
		setTimeout(function(){ $('#fname_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_password=="") 
	{
		$('#password_error').show();
		$('#password_error').html('Please enter password');
		setTimeout(function(){ $('#password_error').hide(); }, 5000);
		_invalid = true;
	}
	else if(_password.length < 8 || _password.length > 16) 
	{
		$('#password_error').show();
		$('#password_error').html('Password length should minimum 8 and maximum 16 character');
		setTimeout(function(){ $('#password_error').hide(); }, 5000);
		_invalid = true;
	}		
	if(_mobile=="" && _mobile.length < 10 && _mobile.length > 10)
	{
		$('#mobile_error').show();
		$('#mobile_error').html('Please enter valid mobile');
		setTimeout(function(){ $('#mobile_error').hide(); }, 5000);
		_invalid = true;
	}
	
	if(!_invalid)
	{
		
		var formData = new FormData($('#registration')[0]);
		formData.append('action', 'registration');
		$.ajax({
			url: "ajax/ajax_registration.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				//alert(result);
				 var result = $.trim(result);
				if(1==1)
				{
					alert(result);
					$('#mobile_hidden').val(_mobile);
					$('#registration').hide();
					$('#verify_otp').show();					
				}
				else
				{
					$('#error_message').show().html('User with same mobile no already exists');
					setTimeout(function(){
					$('#error_message').hide();},10000)
				}
			}	
		});
	}
}




function check_otp()
{	
	var _invalid = false;
	
	//validation check for fileds
	var _mobile = $('#verify_mobile').val();
	
	if(_mobile=="")
	{
		$('#otp_error').show();
		$('#otp_error').html('Please enter otp');
		setTimeout(function(){ $('#otp_error').hide(); }, 5000);
		_invalid = true;
	}
	
	if(!_invalid)
	{	
		
		var formData = new FormData($('#verify_otp')[0]);
		formData.append('action', 'verify_otp');
		$.ajax({
			url: "ajax/ajax_registration.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				
				if($.trim(result)=='success')
				{
					alert('Registered Successfully Please Login To Your Account');
					window.location.href = 'login.php';
				}
				else
				{
					$('#otp_error_message').show().html('Please Enter correct OTP');
					setTimeout(function(){
					$('#otp_error_message').hide();},10000)
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