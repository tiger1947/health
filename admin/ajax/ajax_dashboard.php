<?php
//setting header to json
header('Content-Type: application/json');

//configration 
include_once('../includes/application_top.php');

include_once('../class/dashboard.php');


$dash = new Dashboard();
//set action
$action = $_REQUEST['action'];

if($action == 'getBarChart')
{
	if(1==1)
{
	$doctor = array();
	$patient = array();
	$appointment = array();
	
	//data for created doctors
	
	$doctorArr = $dash->getBarChartOfDoctors();	
	foreach($doctorArr as $k)
	{
		$doctor[] = $k;
	}
		
	//data for created patient

	$patientArr = $dash->getBarChartOfPatients();
	foreach($patientArr as $k)
	{
		$patient[] = $k;
	}
		
	//data for appointment

	$appointmentArr = $dash->getBarChartOfAppointments();
	foreach($appointmentArr as $k)
	{
		$appointment[] = $k;
	}
	
	$month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

	$data['month'] = $month;
	$data['total'] = $doctor;
	$data['patient'] = $patient;
	$data['appointment'] = $appointment;
	
}		
		
	
}
else if($action == 'getLineChart')
{
	$doctor = array();
	$patient = array();
	$appointment = array();
	
	
	$doctorArr = $dash->getLineChartOfDoctor();
	
	foreach($doctorArr as $k)
	{
		$doctor[] = $k;
	}

	//data for created patient
	
	$patientArr = $dash->getLineChartOfPatient();
	
	foreach($patientArr as $k)
	{
		$patient[] = $k;
	}
	
	//data for appointment	
	$appointmentArr = $dash->getLineChartOfAppointments();
	
	foreach($appointmentArr as $k)
	{
		$appointment[] = $k;
	}
	
	$month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

	$data['month'] = $month;
	$data['total'] = $doctor;
	$data['patient'] = $patient;
	$data['appointment'] = $appointment;
}	



echo json_encode($data);

?>