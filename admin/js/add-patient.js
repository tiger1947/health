// Form validation code will come here.
function validateForm() 
{
	
	var _invalid = false;
	var _fname = $('#fname').val();
	var _lname = $('#lname').val();
	var _address = $('#address').val();
	var _mobile = $('#mobile').val();
	var _date_of_birth = $('#date_of_birth').val();
	var _blood_group = $('#blood_group').val();
	var _picture = $('#picture').val();
	
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
	if(_address=="")
	{
		$('#address_error').show();
		$('#address_error').html('Please enter address');
		setTimeout(function(){ $('#address_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_mobile=="")
	{
		$('#mobile_error').show();
		$('#mobile_error').html('Please enter mobile');
		setTimeout(function(){ $('#mobile_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_blood_group=="")
	{
		$('#blood_group_error').show();
		$('#blood_group_error').html('Please enter blood_group');
		setTimeout(function(){ $('#blood_group_error').hide(); }, 3000);
		_invalid = true;
	}	
	if(_picture=="")
	{
		$('#picture_error').show();
		$('#picture_error').html('Please select file');
		setTimeout(function(){ $('#picture_error').hide(); }, 3000);
		_invalid = true;
	}
	
	
	
	
	if(!_invalid)
	{
		var formData = new FormData($('#registration')[0]);
		formData.append('action','add_patient');
		$.ajax({
			url: "ajax/ajax_patient.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
			if($.trim(result)=='success')
			{
				
				window.location.href = 'patient-list.php';
			}
			else
			{

			}
			}	
		});
	}
}