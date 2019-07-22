function validateForm() 
{
	//alert(111111);
	var _invalid = false;
	var formData = new FormData($('#profile_data')[0]);
	formData.append('action', 'edit_doctor');
	if(!_invalid)
	{
		$.ajax({
			url: "ajax/ajax_doctor.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,					
			success: function(result){
				if($.trim(result)=='success')
					window.location.href='doctor-list.php'
			}
		});
	}
}


function getData(doc_id)
{
	$.ajax({
		url: "ajax/ajax_doctor.php", //for data update to database"
		type: "POST",
		data: { id : doc_id, action:'update_doctor'},//to pass the value on another page 
		success: function(result){
			//alert(result);
			$('#profile_data').html(result);
		}	
	});
}






function confirmation(doc_id)
{
	if(confirm("Are you sure to delete?"))
	{	
		$.ajax({
			url: "ajax/ajax_doctor.php", 
			type: "POST",
			data: { id : doc_id, action:'delete_doctor' },//to pass the value on another page 
			success: function(result){
				if($.trim(result)=='success')			
					window.location.href='doctor-list.php'			
			}	
		});
    }
}




function view(doc_id){        
	$.ajax({
		url: "ajax/ajax_doctor.php", 
		type: "POST",
		data: { id : doc_id, action:'view_doctor'},//to pass the value on another page 
		success: function(result){
			//alert(1);
			//window.location.href='doctor-list.php'
			$('#profile').html(result);
		}	
	});
}



$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});







function activeDeactive(doc_id,status)
{
	//alert(doc_id);

	$.ajax({
		url: "ajax/ajax_doctor.php",
		type: "POST",
		data: { id : doc_id, status: status, action:'active_deactive_doctor' },//to pass the value on another page 		
		cache: false,		
		success: function(result){
			//alert(result);
			if($.trim(result)=='success')
			window.location.href='doctor-list.php';
		}	
	});
}