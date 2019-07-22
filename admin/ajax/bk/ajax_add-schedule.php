<?php
include_once('../includes/application_top.php');
$name = mysqli_real_escape_string($conn, $_REQUEST['doctor']);
$days = mysqli_real_escape_string($conn, $_REQUEST['available']);
$start = mysqli_real_escape_string($conn, $_REQUEST['start']);
$stop = mysqli_real_escape_string($conn, $_REQUEST['stop']);
$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
$serial = mysqli_real_escape_string($conn, $_REQUEST['visibility']);
$date = date('Y-m-d h:i:s');



$query = "INSERT INTO ".Sch."(`doctor_name`, `available_days`, `start_time`, `close_time`, `per_patient_time`, `serial_visibility`,`created_date`) VALUES ('".$name."','".$days."','".$start."','".$stop."','".$time."','".$serial."','".$date."')";
if(mysqli_query($conn, $query))
{
	echo "success";	
}
else
{
	echo "error";
}

?>