// Form validation code will come here.
function validateForm() 
{
	var _invalid = false;
	var formData = new FormData($('#app-data')[0]);
	formData.append('action','add_appointment');
	var _date = $('#date').val();
	var _time = $('#time').val();
	
	if(_date=="")
	{
		$('#appointment_error').show();
		$('#appointment_error').html('Please enter appointment date');
		setTimeout(function(){ $('#appointment_error').hide(); }, 3000);
		_invalid = true;
	}

	if(!_invalid)
	{
		$.ajax({
			url: "ajax/ajax_appointment.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,			
			processData: false,			
			success: function(result){
			if($.trim(result)=='success')
				window.location.href='appointment-list.php'
			}
		});
	}
}




$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});

