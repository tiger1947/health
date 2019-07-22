<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "UPDATE ".Sch." SET isDeleted='1' WHERE schedule_id='".$id."'";
if(mysqli_query($conn, $query))
{
	echo "success";
}
?>