<?php

include('includes/application_top.php');

if(isset($_POST["Import"]))
{
	$filename=$_FILES["file"]["tmp_name"];    
	if($_FILES["file"]["size"] > 0)
	{
		$file = fopen($filename, "r");
		while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				$sql = "INSERT INTO patient( fname, lname, mobile, dob, blood_group, sex, address) VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."')";
				
				$result = mysqli_query($conn, $sql);
				if(isset($result))
				{
				  header('Location:patient-list.php');    
				}
				else 
				{
					echo "error";
				}
		   }
		fclose($file);  
	}
}   
 ?>