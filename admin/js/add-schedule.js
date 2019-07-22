// Form validation code will come here.
function validateForm() 
{
	var _invalid = false;
	var _name = $('#doc_name').val();
	var _available = $('#available').val();
	var _start = $('#start').val();
	var _stop = $('#stop').val();
	var _time	= $('#time').val();
	var _visibility = $('#visibility').val();
	
	if(_name=="")
	{
		$('#doc_name_error').show();
		$('#doc_name_error').html('Please enter name');
		setTimeout(function(){ $('#doc_name_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_available=="")
	{
		$('#available_error').show();
		$('#available_error').html('Please select avilability');
		setTimeout(function(){ $('#available_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_start=="")
	{
		$('#start_error').show();
		$('#start_error').html('Please enter start time');
		setTimeout(function(){ $('#start_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_stop=="")
	{
		$('#stop_error').show();
		$('#stop_error').html('Please enter close time');
		setTimeout(function(){ $('#stop_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_time=="")
	{
		$('#time_error').show();
		$('#time_error').html('Please enter per patient time');
		setTimeout(function(){ $('#time_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_visibility=="")
	{
		$('#visibility_error').show();
		$('#visibility_error').html('Please select visibility');
		setTimeout(function(){ $('#visibility_error').hide(); }, 3000);
		_invalid = true;
	}
	
	
	if(!_invalid)
	{
		var formData = new FormData($('#schedule_data')[0]);
		formData.append('action', 'add_schedule');
		$.ajax({
			url: "ajax/ajax_schedule.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,			
			processData: false,			
			success: function(result){
			if($.trim(result)=='success')
				window.location.href='schedule-list.php'
			}
		});
	}
}


// document.getElementById("dashboard_dash").innerHTML = "Schedule";