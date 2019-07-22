<?php
include('../includes/application_top.php');

$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
$name = mysqli_real_escape_string($conn , $_REQUEST['name']);
$description = mysqli_real_escape_string($conn , $_REQUEST['description']);
$status = mysqli_real_escape_string($conn, $_REQUEST['status']);

//print_r($_REQUEST);


echo $query = "UPDATE ".Dept." SET dept_name='".$name."',description='".$description."', status='".$status."' WHERE dept_id='".$id."'";

if(mysqli_query($conn, $query))
{
	echo "success";	
}
else
{
	echo "error";
}
?>