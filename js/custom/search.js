function search_information();
{
   var _invalid = false;
   
	var _fullname = $('#fullname').val();
 
 
if(!_invalid)
	{
		var formData = new FormData($('#list_information')[0]);
		formData.append('action', 'search_list');
		$.ajax({
			url: "ajax/ajax_search_information.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				if($.trim(result)=='success')
				{
					//window.location.href = 'list.php';
				}
			}	
		});
	}
}