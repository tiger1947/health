<?php 
include_once('../includes/application_top_no_login.php');
include_once('../class/registration.php');

$registration = new Registration();


if($_REQUEST['action']=="registration")
{		
	$otp = rand(999999,6);
	
	$password = $registration->passwordEncryption($_REQUEST['password']);
	
	$mobile = $_REQUEST['mobile'];
	
	$duplicate = $registration->checkDuplicationOfUser($mobile);
	
	if($duplicate != 1)
	{
		$data = Array(	
			'fullname' =>  $_REQUEST['full_name'],		
			'password' => $password,
			'mobile_otp' => $otp,		
			'mobile' => $_REQUEST['mobile'],	
			'type' => $_REQUEST['type'],
			'created_date' => date('Y-m-d h:i:s')
			);
		
		$user_insert_result = $registration->addUser($data);	
		
		if($user_insert_result)
		{		
			
			echo $otp;
		}
		else
		{
			echo "error occured";
		}
	}

}

else if($_REQUEST['action']=="verify_otp")
{
	$mobile = $_REQUEST['mobile_hidden'];
	$otp = $_REQUEST['verify_mobile'];
	
	$result = $registration->verifyOtp($mobile);
		
	if($result['mobile_otp']==$otp)
	{
		$data1 = Array(
				'isVerified' => '1'
			);
		if($registration->verifyMobile($mobile,$data1))
		{
		echo "success";
		}
	}
	else
	{
		echo "Enter valid otp";
	}
	
}
?>