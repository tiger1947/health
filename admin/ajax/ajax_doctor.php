<?php 
include_once('../includes/application_top.php');
include_once('../class/doctor.php');
$doc  = new Doctor();

if($_REQUEST['action']=="add_doctor")
{
	//print_r($_REQUEST);
	//print_r($_FILES);

	if (isset($_FILES['picture'])) 
	{
		$num = rand(0,99999);
		$picture = $_FILES['picture'];
		$filename = $_FILES["picture"]["name"];
		$tempname = $_FILES["picture"]["tmp_name"];
		$folder = $num.'_'.$filename;
		move_uploaded_file($tempname,$folder);
		$profile_pic = array('profile_pic_source' => $filename);
	}	
		
		
	$data = Array(	
		'f_name' =>  $_REQUEST['fname'],
		'l_name' =>  $_REQUEST['lname'],
		'email' => $_REQUEST['email'],
		'password' => $_REQUEST['password'],
		'designation' =>  $_REQUEST['designation'],
		'dept_id' => $_REQUEST['department'],
		'address' =>  $_REQUEST['address'],
		'specialist' =>  $_REQUEST['specialist'],
		'mobile' => $_REQUEST['mobile'],
		'short_bio' => $_REQUEST['short_bio'],
		'dob' => $_REQUEST['date_of_birth'],
		'blood_group' => $_REQUEST['blood_group'],
		'sex' => $_REQUEST['sex'],
		'created_date' => date('Y-m-d h:i:s')
		);
		
	if(!empty($profile_pic))
	$data = array_merge($data,$profile_pic);
	
	$doctor_insert_result = $doc->addDoctor($data);
	if($doctor_insert_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}

else if($_REQUEST['action']=="edit_doctor")
{
	$profile_pic = array();
	$id = $_REQUEST['id'];
	
	if($_POST['isImageChange']=='1') 
	{
		$picture = $_FILES['picture'];
		$filename = $_FILES["picture"]["name"];
		$tempname = $_FILES["picture"]["tmp_name"];
		$folder = "../upload/".$filename;
		move_uploaded_file($tempname, $folder);			
		$profile_pic = array('profile_pic_source' => $filename);
	}
	
	$data = Array(		
		'f_name' => $_REQUEST['fname'],
		'l_name' =>  $_REQUEST['lname'],
		'email' => $_REQUEST['email'],
		'designation' =>  $_REQUEST['designation'],
		'dept_id' => $_REQUEST['department'],
		'address' => $_REQUEST['address'],
		'specialist' => $_REQUEST['specialist'],
		'mobile' => $_REQUEST['mobile'],
		'short_bio' =>  $_REQUEST['short_bio'],	
		'dob' => $_REQUEST['dob'],
		'blood_group' => $_REQUEST['blood_group'],
		'sex' => $_REQUEST['sex'],
		'status' => $_REQUEST['status']
	);
	
	if(!empty($profile_pic))
		$data = array_merge($data,$profile_pic);
	
	$doctor_update_result = $doc->updateDoctor($id, $data);
	if($doctor_update_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}

else if($_REQUEST['action']=="delete_doctor")
{
	$id = $_POST['id'];
	$data = array('isDeleted' => '1');			
	$result = $doc->deleteDoctor($id,$data);
	if($result)
	{
		echo "success";
	}	
}	

else if($_REQUEST['action']=="view_doctor")
{		
	$id = $_POST['id'];
	$row = $doc->getDoctor($id); 	
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
				<span><?php echo $row['dept_name'];?></span>
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
	 

else if($_REQUEST['action']=="active_deactive_doctor")
{	
	
	$id = $_POST['id'];
	$row = $doc->getDoctor($id); 	
	if($row['status']=='1')
	{
	$data = array('status' => '0');
	}
	else
	{
		$data = array('status' => '1');
	}
	$result = $doc->deleteDoctor($id,$data);
	if($result)
	{
		echo "success";
	}

}

else if($_REQUEST['action']=="update_doctor")
{	
	$id = $_POST['id'];
	$row = $doc->getDoctor($id);
	
		?>
		<!--code for image update only-->
			<div class="form-group">				
			<input type="hidden" id="isImageChange" name="isImageChange" value="0">
			</div>
			<div class="form-group">				
				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['doc_id'];?>" required>
			</div>
			<div class="form-group">		
				<label>First Name</label>
				<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['f_name'];?>" required>
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['l_name'];?>" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" required>
			</div>
			<div class="form-group">
				<label>Designation</label>
				<input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['designation'];?>" required>
			</div>
			<div class="form-group">
				<label>Department</label>
				<select class="form-control" name="department" id="department" size="1">
					<?php	
					$department = $doc->getDepartment();

					if(!empty($department))
					{						
						foreach ($department as $dept_name) 
						{ 
							?>                                                
							<option value="<?php echo $dept_name['dept_id'];?>" <?php if($dept_name['dept_id']==$row['dept_id']) { ?> selected <?php } ?>><?php echo $dept_name['dept_name']; ?></option>
							<?php 
						}
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea class="form-control" id="address" name="address"  required><?php echo $row['address'];?></textarea>
			</div>
			<div class="form-group">
				<label>Mobile</label>
				<input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile'];?>" required>
			</div>
			<div class="form-group">
				<label>Picture upload</label>
				<img src="<?php echo base_url_image.$row['profile_pic_source'];?>" style="width:50px"></img>
				<input type="file" name="picture" id="picture" />
				</div>
			<div class="form-group">
				<label>Short Biography</label>
				<textarea name="short_bio" id="short_bio" class="form-control" rows="6" ><?php echo $row['short_bio'];?></textarea>
			</div>
			<div class="form-group">
				<label>Specialist</label>
				<input type="text" class="form-control" name="specialist" id="specialist" value="<?php echo $row['specialist'];?>" required>
			</div>
			<div class="form-group">
				<label>Date of Birth</label>
				<input name="dob" id="dob" class="datepicker form-control hasDatepicker" type="date" value="<?php echo $row['dob'];?>">
			</div>
			<div class="form-group">
				<label>Blood group</label>
				<select class="form-control" name="blood_group" id="blood_group">
					<option <?php if($row['blood_group']=='A+') { ?> selected <?php } ?>>A+</option>
					<option <?php if($row['blood_group']=='AB+') { ?> selected <?php } ?>>AB+</option>
					<option <?php if($row['blood_group']=='O+') { ?> selected <?php } ?> >O+</option>
					<option <?php if($row['blood_group']=='AB-') { ?> selected <?php } ?>>AB-</option>
					<option <?php if($row['blood_group']=='B+') { ?> selected <?php } ?>>B+</option>
					<option <?php if($row['blood_group']=='A-') { ?> selected <?php } ?>>A-</option>
					<option <?php if($row['blood_group']=='B-') { ?> selected <?php } ?>>B-</option>
					<option <?php if($row['blood_group']=='O-') { ?> selected <?php } ?>>O-</option>
				</select>
			</div>
			<div class="form-group">
			 <label>Sex</label><br>
			 <label class="radio-inline">
				<input type="radio" name="sex" id="sex" value="1"<?php if($row['sex']=='1') { ?> checked <?php } ?>>Male
			</label> 
			<label class="radio-inline">
				<input type="radio" name="sex" id="sex" value="0"<?php if($row['sex']=='0') { ?> checked <?php } ?>>Female
			</label>
				</div>
			 <div class="form-check">
				<label>Status</label><br>
				<label class="radio-inline">
				<input type="radio" name="status" id="status" value="1" <?php if($row['status']=='1') { ?> checked <?php } ?>>Active</label>
				<label class="radio-inline">
				  <input type="radio" name="status" id="status" value="0"<?php if($row['status']=='0') { ?> checked <?php } ?>>Inactive</label>
			</div>                                       
		<?php 
		
		?>
  <tr>
    <td colspan="2">
		<input type="button" onclick="validateForm();"  name="submit" class="btn btn-primary" value="save"/>
	</td>
  </tr>
  
 	<script>
//for image checking update or not
$(document).ready(function(){
 $('#picture').change(function(){ 
	//alert(this.value);
	$('#isImageChange').val('1');
 })
});
</script>
<?php
}
?> 
