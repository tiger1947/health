function validateDoctorPersonalForm()
{
	var _invalid = false;
	
	//validation check for fileds
	
	var _email = $('#email').val();
	
	if(_email=="")
	{
		$('#email_error').show();
		$('#email_error').html('Please enter email id');
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

	
	if(!_invalid)
	{
		
		var formData = new FormData($('#doctor_personal')[0]);
		formData.append('action', 'doctor_personal_info');
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
					$('#doctor_personal').hide();
					$('#education').show();
				}
			}	
		});
	}
}








function validateAndSave()
{
	var _invalid = false;
	
	//validation check for fileds
	
	var _email = $('#email').val();
	
	if(_email=="")
	{
		$('#email_error').show();
		$('#email_error').html('Please enter email id');
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

	
	if(!_invalid)
	{
		
		var formData = new FormData($('#doctor_personal')[0]);
		formData.append('action', 'doctor_personal_info');
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
					alert('Profile Updated successfully');
					$('#doctor_personal').show();
				}
			}	
		});
	}
}

//validation for email id
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



function showPersonal()
{
	$('#doctor_personal').show();
	$('#education').hide();		
}




function validateDoctorEducational()
{	
		
		var formData = new FormData($('#doctor_educational')[0]);
		formData.append('action', 'doctor_educational_info');
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
					alert('updated successfully');
					$('#education').hide();
					$('#clinic').show();
				}
			}	
		});	
}



function saveEducational()
{	
		var formData = new FormData($('#doctor_educational')[0]);
		formData.append('action', 'doctor_educational_info');
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
					
					$('#education').show();
				}
			}	
		});	
}




function showEducation()
{
	$('#clinic').hide();
	$('#education').show();	
}



function doctor_clinic_info()
{
	var _invalid = false;
	
	//validation check for fileds
	
	var _name = $('#clinic_name').val();
	var _address = $('#clinic_address').val();
	var _state = $('#clinic_state').val();
	var _city = $('#clinic_city').val();
	var _locality = $('#clinic_locality').val();
	var _pincode = $('#clinic_pincode').val();

	
	if(_name=="")
	{
		$('#clinic_name_error').show();
		$('#clinic_name_error').html('Please enter clinic Name');
		setTimeout(function(){ $('#clinic_name_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_address=="")
	{
		$('#clinic_address_error').show();
		$('#clinic_address_error').html('Please enter clinic address');
		setTimeout(function(){ $('#clinic_address_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_state=="")
	{
		$('#clinic_state_error').show();
		$('#clinic_state_error').html('Please enter clinic state');
		setTimeout(function(){ $('#clinic_state_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_city=="")
	{
		$('#clinic_city_error').show();
		$('#clinic_city_error').html('Please enter clinic city');
		setTimeout(function(){ $('#clinic_city_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_locality=="")
	{
		$('#clinic_locality_error').show();
		$('#clinic_locality_error').html('Please enter clinic locality');
		setTimeout(function(){ $('#clinic_locality_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_pincode=="")
	{
		$('#clinic_pincode_error').show();
		$('#clinic_pincode_error').html('Please enter pincode');
		setTimeout(function(){ $('#clinic_pincode_error').hide(); }, 5000);
		_invalid = true;
	}
	else if(_pincode.length <= 5)
	{
		$('#clinic_pincode_error').show();
		$('#clinic_pincode_error').html('Please enter valid pincode');
		setTimeout(function(){ $('#clinic_pincode_error').hide(); }, 5000);
		_invalid = true;
	}

	if(!_invalid)
	{
		
		var formData = new FormData($('#clinic_info')[0]);
		formData.append('action', 'doctor_clinic_info');
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
					alert('Clinic information updated successfully');
					$('#clinic').show();
				}
			}	
		});
	}
}







function validateClinic()
{
	var _invalid = false;
	
	//validation check for fileds
	
	var _name = $('#clinic_name').val();
	var _address = $('#clinic_address').val();
	var _state = $('#clinic_state').val();
	var _city = $('#clinic_city').val();
	var _locality = $('#clinic_locality').val();
	var _pincode = $('#clinic_pincode').val();

	
	if(_name=="")
	{
		$('#clinic_name_error').show();
		$('#clinic_name_error').html('Please enter clinic Name');
		setTimeout(function(){ $('#clinic_name_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_address=="")
	{
		$('#clinic_address_error').show();
		$('#clinic_address_error').html('Please enter clinic address');
		setTimeout(function(){ $('#clinic_address_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_state=="")
	{
		$('#clinic_state_error').show();
		$('#clinic_state_error').html('Please enter clinic state');
		setTimeout(function(){ $('#clinic_state_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_city=="")
	{
		$('#clinic_city_error').show();
		$('#clinic_city_error').html('Please enter clinic city');
		setTimeout(function(){ $('#clinic_city_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_locality=="")
	{
		$('#clinic_locality_error').show();
		$('#clinic_locality_error').html('Please enter clinic locality');
		setTimeout(function(){ $('#clinic_locality_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_pincode=="")
	{
		$('#clinic_pincode_error').show();
		$('#clinic_pincode_error').html('Please enter pincode');
		setTimeout(function(){ $('#clinic_pincode_error').hide(); }, 5000);
		_invalid = true;
	}
	else if(_pincode.length <= 5)
	{
		$('#clinic_pincode_error').show();
		$('#clinic_pincode_error').html('Please enter valid pincode');
		setTimeout(function(){ $('#clinic_pincode_error').hide(); }, 5000);
		_invalid = true;
	}
	if(!_invalid)
	{		
		var formData = new FormData($('#clinic_info')[0]);
		formData.append('action', 'doctor_clinic_info');
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
					$('#clinic').hide();
					$('#professional').show();
				}
			}	
		});
	}
}


function showClinic()
{
	$('#professional').hide();
	$('#clinic').show();
}


function doctor_professional_info()
{
	var _invalid = false;
	
	//validation check for fileds
	
	var _number = $('#registration_number').val();
	var _council = $('#registration_council').val();
	var _year = $('#registration_year').val();
	var _gst = $('#gst').val();

	
	if(_number=="")
	{
		$('#registration_number_error').show();
		$('#registration_number_error').html('Please enter registration Number');
		setTimeout(function(){ $('#registration_number_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_council=="")
	{
		$('#registration_council_error').show();
		$('#registration_council_error').html('Please enter council');
		setTimeout(function(){ $('#registration_council_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_year=="")
	{
		$('#registration_year_error').show();
		$('#registration_year_error').html('Please enter registration year');
		setTimeout(function(){ $('#registration_year_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_gst=="")
	{
		$('#gst_error').show();
		$('#gst_error').html('Please enter GSTIN');
		setTimeout(function(){ $('#gst_error').hide(); }, 5000);
		_invalid = true;
	}

	if(!_invalid)
	{		
		var formData = new FormData($('#professional_details')[0]);
		formData.append('action', 'professional_info');
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
					alert('information updated successfully');
					$('#doctor_personal').hide();
					$('#education').hide();
					$('#clinic').hide();
					$('#professional').show();
				}
			}	
		});
	}
}




function validateProfessional()
{
	var _invalid = false;
	
	//validation check for fileds
	
	var _number = $('#registration_number').val();
	var _council = $('#registration_council').val();
	var _year = $('#registration_year').val();
	var _gst = $('#gst').val();

	
	if(_number=="")
	{
		$('#registration_number_error').show();
		$('#registration_number_error').html('Please enter registration Number');
		setTimeout(function(){ $('#registration_number_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_council=="")
	{
		$('#registration_council_error').show();
		$('#registration_council_error').html('Please enter council');
		setTimeout(function(){ $('#registration_council_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_year=="")
	{
		$('#registration_year_error').show();
		$('#registration_year_error').html('Please enter registration year');
		setTimeout(function(){ $('#registration_year_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_gst=="")
	{
		$('#gst_error').show();
		$('#gst_error').html('Please enter GSTIN');
		setTimeout(function(){ $('#gst_error').hide(); }, 5000);
		_invalid = true;
	}

	if(!_invalid)
	{		
		var formData = new FormData($('#professional_details')[0]);
		formData.append('action', 'professional_info');
		$.ajax({
			url: "ajax/ajax_profile.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			enctype: 'multipart/form-data',
			success: function(result){			
				
				if($.trim(result)=='success')
				{					
					$('#professional').hide();
					$('#verification').show();
				}
			}	
		});
	}
}




function showProfessional()
{
	$('#verification').hide();
	$('#professional').show();	
}


function verifyDocument()
{
	
	var _invalid = false;
	
	//validation check for fileds
	
	var _identity = $('#identity').val();
	var _registration = $('#registration_proof').val();
	var _clinic = $('#clinic_proof').val();	

	
	if(_identity=="")
	{
		$('#identity_error').show();
		$('#identity_error').html('Please select identity proof');
		setTimeout(function(){ $('#identity_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_registration=="")
	{
		$('#registration_proof_error').show();
		$('#registration_proof_error').html('Please select registration proof');
		setTimeout(function(){ $('#registration_proof_error').hide(); }, 5000);
		_invalid = true;
	}
	if(_clinic=="")
	{
		$('#clinic_proof_error').show();
		$('#clinic_proof_error').html('Please select clinic proof');
		setTimeout(function(){ $('#clinic_proof_error').hide(); }, 5000);
		_invalid = true;
	}
	
	if(!_invalid)
	{		

		var formData = new FormData($('#document_verification')[0]);
		formData.append('action', 'verification_of_document');
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
					
					 alert('information updated successfully');					
					window.location.href='detail-page.php' 
					
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