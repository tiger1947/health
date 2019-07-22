<?php 
include_once('../includes/application_top.php');

$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['date_of_birth']);
$blood_group = mysqli_real_escape_string($conn, $_REQUEST['blood_group']);
$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);
$date = date('Y-m-d h:i:s');

//print_r($_REQUEST);
//print_r($_FILES);

if (isset($_FILES['picture'])) 
{
	$num = rand(1,999999);
	$picture = $_FILES['picture'];
	$filename = $_FILES["picture"]["name"];
	$tempname = $_FILES["picture"]["tmp_name"];
	$folder = "../upload/".$num.'_'.$filename;
	move_uploaded_file($tempname, $folder);
	$sql = "INSERT INTO ".Pat."(fname, lname, mobile, pic_source, dob, blood_group, sex, address,created_date) VALUES ('".$fname."','".$lname."','".$mobile."','".$folder."','".$dob."','".$blood_group."','".$sex."','".$address."','".$date."')";

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
{
	echo "error occured";
}
?>
