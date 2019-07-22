function view(id)
{
	alert(1);
	$.ajax({
		url: "ajax/ajax_notification.php", //for data insertion to database"
		type: "POST",
		data: {id : id},		
		success: function(result){
		if($.trim(result)=='success')
			{
				alert(2);
				// window.location.href = 'booking-page.php';
			}
		
		}	
	});
}