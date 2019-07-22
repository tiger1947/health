<?php 
include_once('../includes/application_top.php');

$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
$date = date('Y-m-d h:i:s');

//print_r($_REQUEST);
//print_r($_FILES);




if(isset($_FILES['picture'])) 
{
	$num = rand(0,99999);
	$picture = $_FILES['picture'];
	$filename = $_FILES["picture"]["name"];
	$tempname = $_FILES["picture"]["tmp_name"];
	$folder = $num.'_'.$filename;
	if(move_uploaded_file($tempname, "../logo/".$folder))
	{
	if($type == '1')
	{
     $sql = "UPDATE `logo` SET `status`='0'";
	}
		
		$query = "INSERT INTO `logo`(`logo_path`, `description`, `created_date`,`status`) VALUES ('".$folder."','".$description."','".$date."','1')";
		if(mysqli_query($conn, $query))
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
		echo "error while uploading file";
	}
}
else
	{
		echo "no file selected";
	}
?>