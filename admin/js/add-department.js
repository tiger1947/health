// Form validation code will come here.
function validateForm() 
{
	var _invalid = false;
	var _name = $('#name').val();
	var _description = $('#desc').val();
	
	if(_name=="")
	{
		$('#name_error').show();
		$('#name_error').html('Please enter department name');
		setTimeout(function(){ $('#name_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_description=="")
	{
		$('#description_error').show();
		$('#description_error').html('Please enter department description');
		setTimeout(function(){ $('#description_error').hide(); }, 3000);
		_invalid = true;
	}
			
	var formData = new FormData($('#department-data')[0]);
	formData.append('action', 'add_department');	
	if(!_invalid)
	{
		$.ajax({
			url: "ajax/ajax_department.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,			
			processData: false,			
			success: function(result){
			if($.trim(result)=='success')
				window.location.href='department-list.php'
			}
		});
	}
}


$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});