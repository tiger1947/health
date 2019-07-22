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
				$sql = "INSERT INTO doctor(f_name, l_name, email, password, designation, department, address, specialist, mobile, short_bio, dob, blood_group, sex) VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."')";	
					   
				$result = mysqli_query($conn, $sql);
				if(isset($result))
				{
				  header('Location:doctor-list.php');    
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