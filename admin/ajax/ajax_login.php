<?php

include_once('../includes/application_top_no_login.php');
include_once('../class/login.php');

$log = new Login();
$username = $_POST['username'];
$password = $_POST['password'];
$result = $log->loginCheck($username, $password);
$num = count($result);
if($num > 0)
{
	$_SESSION['admin_id'] = $result[0]['admin_id'];
	$_SESSION['email'] = $result[0]['email'];
	$_SESSION['name'] = $result[0]['first_name']." ".$result[0]['first_name'];
	echo "success";
}
else
{
	echo "error";
}	
?>