<?php 
include_once('../includes/application_top.php');
include_once('../class/profile.php');

$profile = new Profile();


if($_REQUEST['action']=="general_update")
{			
	$mobile = $_REQUEST['mobile'];
	$data = Array(	
		'fullname' => $_REQUEST['full_name'],		
		'email' => $_REQUEST['email'],		
		'address' => $_REQUEST['address'],		
		'dob' => $_REQUEST['dob'],		
		'sex' => $_REQUEST['sex']
		);
	
	$general_update_result = $profile->updateGeneral($mobile, $data);	
	
	
	if($general_update_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}

else if($_REQUEST['action']=="professional_update")
{
	$user = $_REQUEST['user'];
	$data = Array(
				'department' => $_REQUEST['department'],
				'description' => $_REQUEST['description'], 
				'short_bio' => $_REQUEST['short_bio']
		);
		
	$professional_update_result = $profile->updateProfessional($user, $data);
	if($professional_update_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}

else if($_REQUEST['action']=="educational_update")
{
	$user = $_REQUEST['user'];
	$data = Array(
				'highest_degree' => $_REQUEST['qualification'],
				'college/university' => $_REQUEST['college'],
				'passout_year' => $_REQUEST['pass_year'],
				'other_certification' => $_REQUEST['extra'],
				'description' => $_REQUEST['description'],
				'date_of_certificate' => $_REQUEST['doc']
		);
		
	$education_update_result = $profile->updateEducation($user, $data);
	if($education_update_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}

}


?>