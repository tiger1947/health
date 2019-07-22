<?php
include('../includes/application_top.php');

$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
$problem = mysqli_real_escape_string($conn , $_REQUEST['problem']);

//print_r($_REQUEST);


$query = "UPDATE ".App." SET app_date='".$date."',problem='".$problem."' WHERE app_id='".$id."'";

if(mysqli_query($conn, $query))
{
	echo "success";	
}
else
{
	echo "error";
}
?>