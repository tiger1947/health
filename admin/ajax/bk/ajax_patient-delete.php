<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "UPDATE ".Pat." SET isDeleted='1' WHERE patient_id='".$id."'";
if(mysqli_query($conn, $query))
{
	echo "success";
}
?>