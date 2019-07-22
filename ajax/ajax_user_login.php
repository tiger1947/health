<?php
include_once('../includes/application_top.php');
include_once('../class/class_user_login.php');

$log = new Login();



$mobilenumber = $_POST['mobilenumber'];
$password = $_POST['password'];


$result = $log->loginCheck($mobilenumber, $password);
// print_r($result);

if($result['type'] == '1' && $result['email'] == "")
{
	//he is doctor
	//setting the session value for user
	$_SESSION['user_id'] = $result['user_id'];
	$_SESSION['mobile'] = $result['mobile'];
	$_SESSION['name'] = $result['fullname'];

	echo "new_doctor";
}
else if($result['type'] == '1')
{
	//he is doctor
	//setting the session value for user
	$_SESSION['user_id'] = $result['user_id'];
	$_SESSION['mobile'] = $result['mobile'];
	$_SESSION['name'] = $result['fullname'];

	echo "doctor";
}
else if($result['type'] == '0' && $result['email'] == "")
{
	//he is doctor
	//setting the session value for user
	$_SESSION['user_id'] = $result['user_id'];
	$_SESSION['mobile'] = $result['mobile'];
	$_SESSION['name'] = $result['fullname'];

	echo "new_patient";
}
else if($result['type'] == '0')
{
	//he is doctor
	//setting the session value for user
	$_SESSION['user_id'] = $result['user_id'];
	$_SESSION['mobile'] = $result['mobile'];
	$_SESSION['name'] = $result['fullname'];

	echo "patient";
}
else
{
	echo "Error";
}
?>