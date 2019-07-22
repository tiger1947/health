function check_otp()
{
	var _invalid = false;
	var _account_mobile_number = $('#account_mobile').val(); 
	if(_account_mobile_number=="") 
	{
		$('#mobilenumber_error').show();
		$('#mobilenumber_error').html('Please enter mobile number');
		setTimeout(function(){ $('#mobilenumber_error').hide(); }, 5000);
		_invalid = true;
	}

	if(!_invalid)
	{					
		$.ajax({			
			url: "ajax/ajax_delete.php",
			type: "POST",
			data: { number : _account_mobile_number, action : 'get_otp_for_delete' },
			success: function(result)
			{								
				alert($.trim(result));
				$('#delete_account').show();
				$('#get_otp').hide();				
			}
		});						
	}
}



function confirmation()
{
	_otp_verify = $('#otp').val();
	if(_otp_verify=="")
	{
		$('otp_error').show();
		$('otp_error').html('please enter otp');
		setTimeout(function(){ $('#otp_error').hide(); }, 5000);
		_invalid = true;
	}
	if(confirm("Are you sure to delete?"))
	{	
		$.ajax({
			url: "ajax/ajax_delete.php", 
			type: "POST",
			data: { otp : _otp_verify, action:'delete_account' },//to pass the value on another page 
			success: function(result){
				if($.trim(result)=='success')
				{	
					alert('Account deleted successfully please contact your admin');
					window.location.href='logout.php'
					
				}
				else
				{
					alert('please enter valid otp');
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


