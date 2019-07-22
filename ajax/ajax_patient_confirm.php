<?php
include_once('../includes/application_top.php');
include_once('../class/patient_confirm.php');

$pat_confirm = new Patient_Confirmation();

if($_REQUEST['action']=='patient_confirm_information')
{
	$data = Array(			
		'fname' => $_REQUEST['fname'],
		'lname' => $_REQUEST['lname'],
		'mobile' => $_REQUEST['mobile'],
		'email' => $_REQUEST['email']
		);
		
		$patient_update_result = $pat_confirm->addPatient($data);
		if($patient_update_result)
		{		
			echo "success";
		}
		else
		{
			echo "error occured";
		}	
}
?>