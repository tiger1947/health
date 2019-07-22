<?php
include_once('../includes/application_top.php');

$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
$available_days = mysqli_real_escape_string($conn, $_REQUEST['available_days']);
$start_time = mysqli_real_escape_string($conn, $_REQUEST['start_time']);
$close_time = mysqli_real_escape_string($conn, $_REQUEST['close_time']);
$per_patient_time = mysqli_real_escape_string($conn, $_REQUEST['per_patient_time']);
$serial_visibility = mysqli_real_escape_string($conn, $_REQUEST['serial_visibility']);
$status = mysqli_real_escape_string($conn, $_REQUEST['status']);




echo $query = "UPDATE `schedule` SET `available_days`='".$available_days."',`start_time`='".$start_time."',`close_time`='".$close_time."',`per_patient_time`='".$per_patient_time."',`serial_visibility`='".$serial_visibility."',`status`='".$status."' WHERE `schedule_id`='".$id."'";

		if(mysqli_query($conn, $query))
		{
			
			echo "success";
		}

		else
		{
			echo "error occured";
		}
?>