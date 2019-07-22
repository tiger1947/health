<?
include_once('../includes/application_top.php');

$email = mysqli_real_escape_string($conn, $_REQUEST['username']);
$query = "SELECT * FROM ".Admin." WHERE username = '$email'";
$result = mysqli_query($conn, $query);
$count = mysqli_fetch_row($result);

if($count['status'] != 1)
{
	echo "account is deactivated";
}
else
{
	
    //for random generate password
	$password = rand(1, 999999);
	$password_hash = md5($password);
	$query1 = "UPDATE admin SET password='".md5($password_hash)."' WHERE username='".$email."'";
	$result1 = mysqli_query($connection, $query1);
	if($result1)
	{
	//send email here
	}

	/*
	//send password through mail
	$to = $r['email'];
	$subject = "Your Recovered Password";
	$message = "Please use this password to login " . $password;
	$headers = "From : vivek@codingcyber.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}
		else
		{
			echo "Failed to Recover your password, try again";
		}
}


		$r = mysqli_fetch_assoc($res);
		$email = $r['username'];
*/
		
?>