function validateForm() 
{
	var _invalid = false;
	var formData = $('#profile_data').serialize();	
	formData += '&action=update_schedule';
	if(!_invalid)
	{
		$.ajax({
			url: "ajax/ajax_schedule.php", //for data insertion to database"
			type: "POST",
			data: formData,
			success: function(result){
				if($.trim(result)=='success')
					window.location.href='schedule-list.php'
			}
		});
	}
}



function confirmation(schedule_id){
    if(confirm("Are you sure to delete?")){
	$.ajax({
		
		url: "ajax/ajax_schedule.php", 
		type: "POST",
		data: { id : schedule_id ,action : 'delete_schedule'},//to pass the value on another page 
		success: function(result){
			//alert(result);
			if($.trim(result)=='success')
			window.location.href='schedule-list.php'
		}	
	});
    }
}




function view(schedule_id){        
	$.ajax({
		url: "ajax/ajax_schedule.php", 
		type: "POST",
		data: { id : schedule_id,action : 'view_schedule' },//to pass the value on another page 
		success: function(result){
			//alert(1);
			//window.location.href='schedule-list.php'
			$('#profile').html(result);
		}	
	});
}


$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});


function getData(schedule_id)
{
	$.ajax({
		url: "ajax/ajax_schedule.php", //for data update to database"
		type: "POST",
		data: { id : schedule_id ,action : 'edit_schedule'},//to pass the value on another page 
		success: function(result){
			//alert(result);
			//window.location.href='shedule-list.php'
			$('#profile_data').html(result);
		}	
	});
}


// document.getElementById("dashboard_dash").innerHTML = "Schedule";