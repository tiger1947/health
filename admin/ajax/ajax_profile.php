<?php
include_once('../includes/application_top.php');
$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);

	if($_POST['isImageChange']=='0') 
	{
		$num = rand(0,99999);
		$picture = $_FILES['profile'];
		$filename = $_FILES["profile"]["name"];
		$tempname = $_FILES["profile"]["tmp_name"];
		$folder = '../upload/'.$num.'_'.$filename;
		if(move_uploaded_file($tempname, $folder))
		{
		$query = "UPDATE `admin` SET `first_name`='".$fname."',`last_name`='".$lname."',`mobile`='".$mobile."',`profile`='".$folder."'";
				
			if(mysqli_query($conn, $query))
			{				
				echo "success";
			}

			else
			{
				echo "error occured";
			}
		}
	}

	else{
		
		$query = "UPDATE `admin` SET `first_name`='".$fname."',`last_name`='".$lname."',`mobile`='".$mobile."'";


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