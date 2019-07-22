<?php
include_once('../includes/application_top.php');



$id = mysqli_real_escape_string($conn,$_REQUEST['id']);
$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
//echo $status;

if($status=='1')
	$status = '0';
else
	$status = '1';

$query = "UPDATE doctor SET status='".$status."' where doc_id='".$id."'";
if(mysqli_query($conn, $query))
{
	echo "success";
}
else
{
	echo "error";
}
?>