<?php
include_once('../includes/application_top.php');
include_once('../class/book_appointment.php');

$book_app = new Bookappointment();

if($_REQUEST['action']=='appointment_request')
{
	// print_r($_REQUEST);
	// die();	
	
	$data = Array(
			'app_date' => $_REQUEST['date']
		);
			
		$appointment_update_result = $book_app->addAppointment($data);
		if($appointment_update_result)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
}

else if($_REQUEST['action']=="active_deactive_appointment")
{	
	
	$id = $_POST['id'];
	$status_change = $book_app->getAppointmentStatus($id); 	
	
	if($status_change['status']=='0')
	{
		$data = array('status' => '1');
	}
	else
	{
		$data = array('status' => '0');
	}
	
	$result = $book_app->changeStatus($id,$data);
	if($result)
	{
		echo "success";
	}

}

else if($_REQUEST['action']=="view_patient")
{	
	
	$id = $_POST['id'];
	$patient = $book_app->getPatient($id);
	// print_r($patient);
	?>
	<div>		
		<label>Profile Pic:</label>
		<img src="<?php echo $patient['profile_pic_source'];?>" style="width:50px;height:50px">
	</div>
	<div>		
		<label>Full Name:</label>
		<span id="fname" name="fname"><?php echo $patient['fullname'];?></span>
	</div>
	<div>		
		<label>Mobile:</label>
		<Label><?php echo $patient['mobile'];?></label>
	</div>
	

<?php	
}

?>