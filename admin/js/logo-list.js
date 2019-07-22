function validateForm() 
{
		var formData = new FormData($('#profile_data')[0]);	
		formData.append('action', 'update_logo');

		//alert(2);
		$.ajax({
			url: "ajax/ajax_logo.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,	
			success: function(result)
			{
				if($.trim(result)=='success')
				window.location.href='logo-list.php'
			}
		});
	
}
$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});


function view(logo_id)
{        
	$.ajax({
		url: "ajax/ajax_logo.php", 
		type: "POST",
		data: { id : logo_id ,action : 'view_logo'},//to pass the value on another page 
		success: function(result)
		{
		//alert(1);
		//window.location.href='logo-list.php'
		$('#profile').html(result);
		}	
	});
}

function getData(logo_id)
{
	$.ajax({
		url: "ajax/ajax_logo.php", //for data update to database"
		type: "POST",
		data: { id : logo_id,action : 'edit_logo' },//to pass the value on another page 
		success: function(result)
		{
		//alert(result);
		$('#profile_data').html(result);
		}	
	});
}


function confirmation(logo_id)
	{
	//alert(1);
	var result = confirm("Are you sure to delete?");
	if(result){
	$.ajax({
	url: "ajax/ajax_logo.php", //for data insertion to database"
	type: "POST",
	data: { id : logo_id,action : 'delete_logo' },//to pass the value on another page 
	success: function(result)
	{
	//alert(result);
	if($.trim(result)=='success')
	{
	window.location.href='logo-list.php'
	}


	}	
	});
	}
}
//document.getElementById("dashboard_dash").innerHTML = "Logo";