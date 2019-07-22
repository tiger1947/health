<?php 
include_once('../includes/application_top.php');

if($_REQUEST['action']=="add_doctor")
{
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
}
else if($_REQUEST['action']=="edit_doctor")
{
		
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
	
}

else if($_REQUEST['action']=="delete_doctor")
{
	$id = $_POST['id'];
	$query = "UPDATE ".Doc." SET isDeleted='1' WHERE doc_id='".$id."'";
	if(mysqli_query($conn, $query))
	{
		echo "success";
	}
	
}	

else if($_REQUEST['action']=="view_doctor")
{		
	$id = $_POST['id'];
	$query = "select * from ".Doc." where doc_id='".$id."'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count > 0)
	{
	while($row = mysqli_fetch_array($result))
	{
	?>
		<div class="form-group">				
			<input type="hidden"  id="id" name="id" <?php echo $row['doc_id'];?>>
		</div>
		<div class="form-group">		
			<label>First Name:</label>
			<span id="fname" name="fname"><?php echo $row['f_name'];?></span>
		</div>
		<div class="form-group">
			<label>Last Name:</label>
			<span id="lname" name="lname"> <?php echo $row['l_name'];?></span>
		</div>
		<div class="form-group">
			<label>Email:</label>
			<span   id="email" name="email" ><?php echo $row['email'];?></span>
		</div>
		<div class="form-group">
			<label>Designation</label>
			<span   id="designation" name="designation" ><?php echo $row['designation'];?></span>
		</div>
		<div class="form-group">
			<label>Department</label>
				<span  id="designation" name="designation"><?php echo $row['department'];?></span>			
		</div>
		<div class="form-group">
			<label>Address</label>
			<span  id="address" name="address"  required><?php echo $row['address'];?></span>
		</div>
		<div class="form-group">
			<label>Mobile</label>
			<span   id="mobile" name="mobile" ><?php echo $row['mobile'];?></span>
		</div>
		<div class="form-group">
			<label>Picture upload</label>
			 <img src="<?php echo base_url_image.$row['profile_pic_source'];?>" style="width:50px;height:50px">
		</div>
		<div class="form-group">
			<label>Short Biography</label>
			<span name="short_bio" id="short_bio" ><?php echo $row['short_bio'];?></span>
		</div>
		<div class="form-group">
			<label>Specialist</label>
			<span   name="specialist" id="specialist" ><?php echo $row['specialist'];?></span>
		</div>
		<div class="form-group">
			<label>Date of Birth</label>
			<span name="dob" id="dob"  ><?php echo $row['dob'];?></span>
		</div>
		<div class="form-group">
			<label>Blood group</label>
			<span name="dob" id="dob"  ><?php echo $row['blood_group'];?></span>
		</div>
		<div class="form-group">
		 <label>Sex</label>	
			<span  name="sex" id="sex"  >
			<?php 
				if($row['sex']=='m')
				{
					echo "Male";
				}
				else
				{
					echo "Female";
				}	
			?>
			</span>
			</div>                                       
	<?php 
		} 
	 }
	
}


else if($_REQUEST['action']=="active_deactive_doctor")
{	

	$id = mysqli_real_escape_string($conn,$_REQUEST['id']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
	//echo $status;

	if($status=='1')
		$status = '0';
	else
		$status = '1';

	$query = "UPDATE doctor SET status='".$status."' where doc_id='".$id."'";
	if(mysqli_query($conn, $query))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
	
}
?>