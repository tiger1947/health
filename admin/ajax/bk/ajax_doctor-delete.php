<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "UPDATE ".Doc." SET isDeleted='1' WHERE doc_id='".$id."'";
if(mysqli_query($conn, $query))
{
	echo "success";
}
?>