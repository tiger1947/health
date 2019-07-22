function hideForm()
{
	$('#general_display').hide();
	$('#update_general').show();
}



function updateGeneralForm()
{
		
	var _invalid = false;
	
	//validation check for fileds
	var _full_name = $('#full_name').val();
	var _email = $('#email').val();
	var _address = $('#address').val();
	var _dob = $('#dob').val();
	var _mobile = $('#mobile').val();
	
	if(_full_name=="")
	{
		$('#full_name_error').show();
		$('#full_name_error').html('Please enter full name');
		setTimeout(function(){ $('#full_name_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_email=="") 
	{
		$('#email_error').show();
		$('#email_error').html('Please enter email');
		setTimeout(function(){ $('#email_error').hide(); }, 5000);
		_invalid = true;
	}
	else if(IsEmail(_email)==false)
	{
		$('#email_error').show();
		$('#email_error').html('Please enter valid Email id');
		setTimeout(function(){ $('#email_error').hide(); }, 3000);
		_invalid = true;
	}	
	if(_address=="")
	{
		$('#address_error').show();
		$('#address_error').html('Please enter valid address');
		setTimeout(function(){ $('#address_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_dob=="")
	{
		$('#dob_error').show();
		$('#dob_error').html('Please enter valid dob');
		setTimeout(function(){ $('#dob_error').hide(); }, 5000);
		_invalid = true;
	}
	
	if(!_invalid)
	{
		
		var formData = new FormData($('#update_general')[0]);
		formData.append('action', 'general_update');
		$.ajax({
			url: "ajax/ajax_user.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				//alert(result);
				 var result = $.trim(result);
				if($.trim(result)=='success' || 1==1)
				{
					//alert(result);	
					$('#mobile_hidden').val(_mobile);
					$('#update_general').hide();
					$('#general_display').show();					
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



function hideProfessionalForm()
{
	$('#display_professional').hide();
	$('#update_professional').show();
}




function updateProfessionalForm()
{
		
	var _invalid = false;
	
	//validation check for fileds
	var _department = $('#department').val();
	var _description = $('#description').val();
	var _short_bio = $('#short_bio').val();
	
	
	if(_department=="")
	{
		$('#department_error').show();
		$('#department_error').html('Please enter department');
		setTimeout(function(){ $('#department_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_description=="") 
	{
		$('#description_error').show();
		$('#description_error').html('Please enter description');
		setTimeout(function(){ $('#description_error').hide(); }, 5000);
		_invalid = true;
	}	
	if(_short_bio=="")
	{
		$('#short_bio_error').show();
		$('#short_bio_error').html('Please enter bio in short');
		setTimeout(function(){ $('#short_bio_error').hide(); }, 5000);
		_invalid = true;
	}

	if(!_invalid)
	{		
		var formData = new FormData($('#update_professional')[0]);
		formData.append('action', 'professional_update');
		$.ajax({
			url: "ajax/ajax_user.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				//alert(result);
				 var result = $.trim(result);
				if($.trim(result)=='success' || 1==1)
				{
					//alert(result);	
					$('#update_professional').hide();
					$('#display_professional').show();
					
				}
			}	
		});
	}
}




function hideEducationalForm()
{
	$('#display_education').hide();
	$('#update_educational').show();
}




function updateEducationForm()
{
		
	var _invalid = false;
	
	//validation check for fileds
	var _qualification = $('#qualification').val();
	var _college = $('#college').val();
	var _passs_year = $('#pass_year').val();
	
	
	if(_qualification=="")
	{
		$('#qualification_error').show();
		$('#qualification_error').html('Please enter your highest qualification');
		setTimeout(function(){ $('#qualification_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_college=="") 
	{
		$('#college_error').show();
		$('#college_error').html('Please enter college/university');
		setTimeout(function(){ $('#college_error').hide(); }, 5000);
		_invalid = true;
	}	
	if(_passs_year=="")
	{
		$('#pass_year_error').show();
		$('#pass_year_error').html('Please enter passout year');
		setTimeout(function(){ $('#pass_year_error').hide(); }, 5000);
		_invalid = true;
	}

	if(!_invalid)
	{		
		var formData = new FormData($('#update_educational')[0]);
		formData.append('action', 'educational_update');
		$.ajax({
			url: "ajax/ajax_user.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				//alert(result);
				 var result = $.trim(result);
				if($.trim(result)=='success' || 1==1)
				{
					$('#update_educational').hide();
					$('#display_education').show();					
				}
			}	
		});
	}
}