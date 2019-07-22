<?php

include_once('../includes/application_top_no_login.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "select * from ".Admin." where email='".$username."' and password='".md5($password)."'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_array($result);
	$_SESSION['admin_id'] = $row['admin_id'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['name'] = $row['first_name'].' '.$row['last_name'];
	echo "success";
}
else
{
	echo "error";
}	
?>