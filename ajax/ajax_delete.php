<?php
include_once('../includes/application_top.php');
include_once('../class/class_delete.php');
$del = new Delete_Account();
$id = $_SESSION['user_id'];
$mobile = $_SESSION['mobile'];

if($_REQUEST['action']=='get_otp_for_delete')
{
	$otp = rand(999999,6);
	
	$data = Array(
	'mobile_otp' => $otp
	);


	if($mobile == $_REQUEST['number'])
	{	
		 if($del->setOTP($mobile, $data))
		{			
			echo $otp;
		}
		else
		{
			echo "Error";
		} 
	}
	else
	{
		echo "Error";
	}
 
}

else if($_REQUEST['action']=='delete_account')
{	
	$mobile_otp = $_REQUEST['otp'];
	$result = $del->fetchOtp($id);
	
	if($result['mobile_otp']==$mobile_otp)
	{
		$data12 = Array(
		'isDeleted' => '1'
		);
		
		if($del->deleteAccount($id, $data12))
		{
			echo "success";
		}
		else
		{
			echo "Error";
		}
	}		
	else
	{
		echo "error";
	}
	
}
?>