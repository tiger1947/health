<?php
include_once('../includes/application_top.php');

$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
$blood_group = mysqli_real_escape_string($conn, $_REQUEST['blood_group']);
$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);

//print_r($_REQUEST);
//print_r($_FILES);


if($_POST'isImageChange'=='1') 
{
	$picture = $_FILES'picture';
	$filename = $_FILES"picture""name";
	$tempname = $_FILES"picture""tmp_name";
	$folder = "upload/".$filename;
	move_uploaded_file($tempname, $folder);

	$query = "UPDATE ".Doc." SET f_name='".$fname."',l_name='".$lname."',email='".$email."',designation='".$designation."',department='".$department."',address='".$address."',specialist='".$specialist."',mobile= '".$mobile."',profile_pic_source='".$folder."' ,short_bio='".$short_bio."' ,dob='".$dob."' ,blood_group='".$blood_group."' ,sex='".$sex."' WHERE doc_id='".$id."'";

	
		if(mysqli_query($conn, $query))
		{
			
			echo "success";
		}

		else
		{
			echo "error occured";
		}
		
}

	$query = "UPDATE patient SET fname='".$fname."',lname='".$lname."',mobile='".$mobile."',dob='".$dob."',blood_group='".$blood_group."',sex='".$sex."',status='".$status."',address='".$address."' WHERE patient_id='".$id."'";

		if(mysqli_query($conn, $query))
		{
			
			echo "success";
		}

		else
		{
			echo "error occured";
		}

		
?>