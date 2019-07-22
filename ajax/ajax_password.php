<?php
include_once('../includes/application_top.php');
include_once('../class/class_user_login.php');
$pass = new Login();

if($_REQUEST['action']=='change_password')
{
	$current = $_POST['password1'];
	$new = $pass->passwordEncryption($_REQUEST['password2']);
	
	$result = $pass->checkPassword($current);
	//print_r($result['_count']);
	
	if($result['_count'] == 1)
	{
		//update password 
		$data = array(
			'password' => $new
		);
		if($pass->resetPassword($data))
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		echo "wrong";
	}
	
}
?>