// Form validation code will come here.
function validateForm() 
{

var _invalid = false;
var formData = $('#profile_data').serialize();
formData += '&action=update_department';
if(!_invalid)
{
$.ajax({
url: "ajax/ajax_department.php", //for data insertion to database"
type: "POST",
data: formData,	
success: function(result){
if($.trim(result)=='success')
window.location.href='department-list.php'
}
});
}
}

function confirmation(dept_id)
{
    var result = confirm("Are you sure to delete?");
    if(result){
$.ajax({
url: "ajax/ajax_department.php", //for data insertion to database"
type: "POST",
data: { id : dept_id ,action : 'delete_department'},//to pass the value on another page 
success: function(result){
if($.trim(result)=='success')
window.location.href='department-list.php'
}	
});
    }
}


function activeDeactive(dept_id,status)
{
//alert(dept_id);
$.ajax({
url: "ajax/ajax_department.php",
type: "POST",	
data: { id : dept_id, status: status,action : 'active_deactive_department' },//to pass the value on another page 
cache: false,	
success: function(result){
//alert(result);
if($.trim(result)=='success')
window.location.href='department-list.php'
}	
});
}


function view(dept_id){        
	$.ajax({
		url: "ajax/ajax_department.php", 
		type: "POST",
		data: { id : dept_id,action : 'view_department' },//to pass the value on another page 
		success: function(result){
			$('#profile').html(result);
		}	
	});
}


$(document).ready(function() {
	$('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});




function getData(dept_id)
{
	$.ajax({
		url: "ajax/ajax_department.php", //for data insertion to database"
		type: "POST",
		data: { id : dept_id ,action : 'edit_department'},//to pass the value on another page 
		success: function(result){
		//alert(result);
		$('#profile_data').html(result);
		}	
	});
}

