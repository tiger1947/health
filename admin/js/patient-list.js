function validateForm() 
{	
	//alert(1);
	var _invalid = false;
	var formData = new FormData($('#profile_data')[0]);	
	formData.append('action','edit_patient');
	if(!_invalid)
	{
		//alert(2);
		$.ajax({
			url: "ajax/ajax_patient.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,					
			success: function(result){
				//alert(3);
				if($.trim(result)=='success')
				window.location.href='patient-list.php'
			}
		});
	}
}

function confirmation(patient_id){
    var result = confirm("Are you sure to delete?");
    if(result){	
	$.ajax({
		url: "ajax/ajax_patient.php", 
		type: "POST",
		data: { id : patient_id,action:'delete_patient'},//to pass the value on another page 
		success: function(result)
		{			
			if($.trim(result)=='success')
			{
				window.location.href='patient-list.php'
			}
		}
	});
    }
}



function view(patient_id){        
	$.ajax({
		url: "ajax/ajax_patient.php", 
		type: "POST",
		data: { id : patient_id,action:'view_patient' },//to pass the value on another page 
		success: function(result){
			$('#profile').html(result);
		}	
	});
}




$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});



function getData(patient_id)
{
	$.ajax({
		url: "ajax/ajax_patient.php", //for data update to database"
		type: "POST",
		data: { id : patient_id, action:'update_patient' },//to pass the value on another page 
		success: function(result){			
			$('#profile_data').html(result);
		}	
	});
}



function activeDeactive(patient_id,status)
{
	//alert(doc_id);

	$.ajax({
		url: "ajax/ajax_patient.php",
		type: "POST",
		data: { id : patient_id, status: status, action: 'active_deactive_patient' },//to pass the value on another page 		
		cache: false,		
		success: function(result){
			//alert(result);
			if($.trim(result)=='success')
			window.location.href='patient-list.php';
		}	
	});
}