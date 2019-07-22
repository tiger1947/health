<?php
include_once('../includes/application_top_no_login.php');
include_once('../class/class_user_login.php');

$log = new Login();

if($_REQUEST['action']=="check_mobile")
{
	
	$mobile = $_REQUEST['mobile_number'];
	$check_user = $log->checkUserAvailable($mobile);
	if($check_user['count'] > 0)
	{
		$otp = rand(999999,6);

		$data = Array(
				'mobile_otp' => $otp
		);

		$new_otp = $log->set_new_otp($mobile, $data);

		if($new_otp)
		{
			echo $otp;
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		echo "error";
	}
}

else if($_REQUEST['action']=="verify")
{
	$mb = $_REQUEST['mobile'];
	$op = $_REQUEST['otp'];

	$check_otp = $log->get_otp($mb);
	if($check_otp['mobile_otp']==$op)
	{
		echo "success";
	}
	else
	{
		echo "wrong otp";
	}

}
else if($_REQUEST['action']=="set_password")
{
	$id = $_REQUEST['mobile'];
	$passwo = $_REQUEST['pass'];
	$password = $log->passwordEncryption($passwo);
	
	$data = Array(
		'password' => $password
		);

	if($log->setNewPassword($id,$data))
	{
		echo "success";
	}
	else
	{
		echo "password wrong";
	}
}

?>