<?php 
include_once('../includes/application_top_no_login.php');
include_once('../class/profile.php');

$profile = new Profile();
$user_id = $_SESSION['user_id'];


if($_REQUEST['action']=="doctor_personal_info")
{	
	
	$personal = Array(
				'fullname' => $_REQUEST['fullname'], 
				'email' => $_REQUEST['email'], 
				'mobile' => $_REQUEST['mobile'],
				'dob' => $_REQUEST['dob'], 
				'sex' => $_REQUEST['gender'], 
				'blood_group' => $_REQUEST['blood_group'], 
				'address_line_one' => $_REQUEST['address'], 
				'state' => $_REQUEST['state'], 
				'city' => $_REQUEST['city'], 
				'locality' => $_REQUEST['locality'], 
				'pincode' => $_REQUEST['pincode']
			);	
	
	if($profile->updateDoctorInfo($user_id, $personal))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}

else if($_REQUEST['action']=="doctor_educational_info")
{
	$educational = Array(
				'qualification' => $_REQUEST['qualification'], 
				'college' => $_REQUEST['college'], 
				'passout_year' => $_REQUEST['passout'], 
				'year_of_experience' => $_REQUEST['year_of_experience'],
				'specialization' => $_REQUEST['specialization']
				);

	if($profile->updateDoctorInfo($user_id,$educational))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}

else if($_REQUEST['action']=="doctor_clinic_info")
{
	$clinic = Array(
				'clinic_name' => $_REQUEST['clinic_name'], 
				'clinic_address_line_one' => $_REQUEST['clinic_address'], 
				'clinic_state' => $_REQUEST['clinic_city'],  
				'clinic_city' => $_REQUEST['clinic_state'], 
				'clinic_locality' => $_REQUEST['clinic_locality'],
				'clinic_pincode' => $_REQUEST['clinic_pincode']
				);

	if($profile->updateDoctorInfo($user_id,$clinic))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}


else if($_REQUEST['action']=="professional_info")
{
	$registration = Array(
				'registration_no' => $_REQUEST['registration_number'], 
				'registration_council' => $_REQUEST['registration_council'], 
				'registration_year' => $_REQUEST['registration_year'], 
				'gstin_no' => $_REQUEST['gst']
				);

	if($profile->updateDoctorInfo($user_id,$registration))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}
else if($_REQUEST['action']=="verification_of_document")
{
	
	//create folder with name of user_id
	if (!file_exists('../upload'))
	{
		mkdir('../upload', 0777, true);
		mkdir('../upload/'.$user_id, 0777, true);
	}
	else if(!file_exists('../upload/'.$user_id))
	{
		mkdir('../upload/'.$user_id, 0777, true);
	}
	


	if (isset($_FILES['identity'])) 
	{
		$picture = $_FILES['identity'];
		$filename = $_FILES["identity"]["name"];
		$tempname = $_FILES["identity"]["tmp_name"];
		$folder = '../upload/'.$user_id.'/identity_'.$filename;
		move_uploaded_file($tempname,$folder);
		$identity_proof = array('doctor_identity_proof' => 'identity_'.$filename);
	}

	if (isset($_FILES['registration_proof'])) 
	{
		$picture = $_FILES['registration_proof'];
		$filename = $_FILES["registration_proof"]["name"];
		$tempname = $_FILES["registration_proof"]["tmp_name"];
		$folder = '../upload/'.$user_id.'/registration_'.$filename;
		move_uploaded_file($tempname,$folder);
		$registration = array('registration_proof' => 'registration_'.$filename);
	}

	if (isset($_FILES['clinic_proof'])) 
	{
		$picture = $_FILES['clinic_proof'];
		$filename = $_FILES["clinic_proof"]["name"];
		$tempname = $_FILES["clinic_proof"]["tmp_name"];
		$folder = '../upload/'.$user_id.'/clinic_proof_'.$filename;
		move_uploaded_file($tempname,$folder);
		$clinic = array('clinic_registration_proof' => 'clinic_proof_'.$filename);
	}

	$data = Array();
	$data = array_merge($data,$identity_proof);
	$data = array_merge($data,$registration);
	$data = array_merge($data,$clinic);
	
	if($profile->updateDoctorInfo($user_id,$data))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}


?>