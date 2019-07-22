<?php 
include_once('../includes/application_top.php');

$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
$designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
$department = mysqli_real_escape_string($conn, $_REQUEST['department']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);
$specialist = mysqli_real_escape_string($conn, $_REQUEST['specialist']);
$mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
$bio = mysqli_real_escape_string($conn, $_REQUEST['short_bio']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['date_of_birth']);
$blood_group = mysqli_real_escape_string($conn, $_REQUEST['blood_group']);
$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
$date = date('Y-m-d h:i:s');

//print_r($_REQUEST);
//print_r($_FILES);

if (isset($_FILES['picture'])) 
{
	$num = rand(0,99999);
	$picture = $_FILES['picture'];
	$filename = $_FILES["picture"]["name"];
	$tempname = $_FILES["picture"]["tmp_name"];
	$folder = $num.'_'.$filename;
	if(move_uploaded_file($tempname, "../upload/".$folder))
	{

	$sql = "INSERT INTO `doctor`( `f_name`, `l_name`, `email`, `password`, `designation`, `department`, `address`, `specialist`, `mobile`, `profile_pic_source`, `short_bio`, `dob`, `blood_group`, `sex`, `created_date`) VALUES ('".$fname."','".$lname."','".$email."','".md5($password)."','".$designation."','".$department."','".$address."','".$specialist."','".$mobile."','".$folder."','".$bio."','".$dob."','".$blood_group."','".$sex."','".$date."')";

		if(mysqli_query($conn, $sql))
		{
			echo "success";
		}
		else
		{
			echo "error occured";
		}
	}
	else
		echo "error occured";
}
else
{
	echo "error occured";
}
?>
