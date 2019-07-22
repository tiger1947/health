<?php
include_once('../includes/application_top.php');

$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
$department = mysqli_real_escape_string($conn, $_REQUEST['department']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);
$mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
$short_bio = mysqli_real_escape_string($conn, $_REQUEST['short_bio']);
$specialist = mysqli_real_escape_string($conn, $_REQUEST['specialist']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
$blood_group = mysqli_real_escape_string($conn, $_REQUEST['blood_group']);
$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
$status = mysqli_real_escape_string($conn, $_REQUEST['status']);



//print_r($_REQUEST);




if($_POST['isImageChange']=='1') 
{
	$picture = $_FILES['picture'];
	$filename = $_FILES["picture"]["name"];
	$tempname = $_FILES["picture"]["tmp_name"];
	$folder = "../upload/".$filename;
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

else{

	$query = "UPDATE ".Doc." SET f_name='".$fname."',l_name='".$lname."',email='".$email."',designation='".$designation."',department='".$department."',address='".$address."',specialist='".$specialist."',mobile= '".$mobile."',short_bio='".$short_bio."' ,dob='".$dob."' ,blood_group='".$blood_group."' ,sex='".$sex."', status='".$status."' WHERE doc_id='".$id."'";


		if(mysqli_query($conn, $query))
		{
			
			echo "success";
		}

		else
		{
			echo "error occured";
		}
}
?>