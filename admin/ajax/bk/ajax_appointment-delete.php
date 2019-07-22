<?php 
include_once('../includes/application_top.php');

$id = $_POST['id'];


$query = "UPDATE ".App." SET isDeleted='1' WHERE app_id='".$id."'";

if(mysqli_query($conn, $query)){
	echo "success";
}
else
{echo "error";}
?>