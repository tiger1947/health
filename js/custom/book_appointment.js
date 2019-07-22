// Form validation code will come here.
function appointment() 
{
	var formData = new FormData($('#book_appointment')[0]);
	formData.append('action','appointment_request');
	$.ajax({
		url: "ajax/ajax_book_appointment.php", //for data insertion to database"
		type: "POST",
		data: formData,
		cache: false,
		contentType: false,
		enctype: 'multipart/form-data',
		processData: false,
		success: function(result){
		if($.trim(result)=='success')
			{
				
				window.location.href = 'booking-page.php';
			}
		
		}	
	});	
}


function completed_appointment()
{
	$('#todays').hide();
	$('#completed').show();
	$('#pending').hide();
}

function todays_appointment()
{
	$('#todays').show();
	$('#completed').hide();
	$('#pending').hide();
}

function pending_appointment()
{
	$('#pending').show();
	$('#completed').hide();
	$('#todays').hide();
}


function activeDeactive(user_id,status)
{
	//alert(doc_id);

	$.ajax({
		url: "ajax/ajax_book_appointment.php",
		type: "POST",
		data: { id : user_id, status: status, action:'active_deactive_appointment' },//to pass the value on another page 		
		cache: false,		
		success: function(result){
			//alert(result);
			if($.trim(result)=='success')
			window.location.href='detail-page.php';
		}	
	});
}

function viewPatient(user_id)
{
	$.ajax({
		url: "ajax/ajax_book_appointment.php", 
		type: "POST",
		data: { id : user_id, action:'view_patient'},//to pass the value on another page 
		success: function(result){
			// alert(result);
			// window.location.href='doctor-list.php'
			$('#patient_profile').html(result);
			
		}	
	});
}