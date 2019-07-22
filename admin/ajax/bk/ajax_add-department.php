<?php 
include_once('../includes/application_top.php');

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$description = mysqli_real_escape_string($conn, $_REQUEST['desc']);



$query = "INSERT INTO ".Dept."(dept_name, description) VALUES ('".$name."','".$description."')";
if(mysqli_query($conn, $query))
{
	echo "success";
}
else
{
	echo "error";
}
?>