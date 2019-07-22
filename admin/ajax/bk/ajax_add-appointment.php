<?php
include_once('../includes/application_top.php');
$doc_id = mysqli_real_escape_string($conn, $_REQUEST['doctor']);
$patient_id = mysqli_real_escape_string($conn, $_REQUEST['patient']);
$dept_id = mysqli_real_escape_string($conn, $_REQUEST['department']);
$app_date = mysqli_real_escape_string($conn, $_REQUEST['date']);
$problem = mysqli_real_escape_string($conn, $_REQUEST['problem']);
$created_date = date('Y-m-d h:i:s');


//print_r($_REQUEST);

$query = "INSERT INTO ".App."(doc_id, patient_id, department_id, app_date, problem,created_date) VALUES ('".$doc_id."','".$patient_id."','".$dept_id."','".$app_date."','".$problem."','".$created_date."')";

if(mysqli_query($conn, $query))
{
	echo "success";
}
else
{
	echo "error";
}
?>