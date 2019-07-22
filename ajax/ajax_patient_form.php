<?php
include_once('../includes/application_top.php');
include_once('../class/Patient.php');

$patient = new Patient();

$id= $_SESSION['user_id'];

if($_REQUEST['action']=='patient_personal_information')
{

	if($_POST['isImageChange']=='0') 
	{
		$picture = $_FILES['picture'];
		$filename = $_FILES["picture"]["name"];
		$tempname = $_FILES["picture"]["tmp_name"];
		$folder = "../upload/".$filename;
		
		move_uploaded_file($tempname, $folder);
		
			 $pic = Array('pic_source'=>$filename);
	
	}
	
	
	$data = Array(			
		'fullname' => $_REQUEST['fullname'],
		'email' => $_REQUEST['email'],
		'dob' => $_REQUEST['dob'],
		'blood_group' => $_REQUEST['blood_group'],
		'sex' => $_REQUEST['sex'],
		'mobile' => $_REQUEST['mobile'],
		'address_line_one' => $_REQUEST['address_line_one'],
		'city' => $_REQUEST['city'],
		'locality' => $_REQUEST['locality'],
		'state' => $_REQUEST['state'],
		'pincode' => $_REQUEST['pincode']
		);		
			if(!empty($pic))
			$data = array_merge($data,$pic);
		
		$patient_update_result = $patient->updateUser($id,$data);

			if($patient_update_result)
			{
				echo "success";
			}
			else
			{
				echo "error occured";
			}
}
else if($_REQUEST['action']=="update_patient")
{	 
	
	if($_POST['isImageChange']=='0') 
	{		
		$picture = $_FILES['picture'];
		$filename = $_FILES["picture"]["name"];
		$tempname = $_FILES["picture"]["tmp_name"];
		$folder = "../upload/".$filename;		
		move_uploaded_file($tempname, $folder);		
			 $pic = Array('profile_pic_source'=>$filename);
	}
	
		
	$data = Array(			
		'fullname' => $_REQUEST['fullname'],
		'email' => $_REQUEST['email'],
		'dob' => $_REQUEST['dob'],
		'blood_group' => $_REQUEST['blood_group'],
		'sex' => $_REQUEST['sex'],
		'mobile' => $_REQUEST['mobile'],
		'address_line_one' => $_REQUEST['address_line_one'],
		'city' => $_REQUEST['city'],
		'locality' => $_REQUEST['locality'],
		'state' => $_REQUEST['state'],
		'pincode' => $_REQUEST['pincode']
		);
		
			if(!empty($pic))
			$data = array_merge($data,$pic);
		
		$patient_update_result = $patient->updateUser($id,$data);
	
			if($patient_update_result)
			{
				echo "success";
			}
			else
			{
				echo "error occured";
			}
}

else if($_REQUEST['action']=="edit_patient")
{	
	$id = $_REQUEST['id'];
	$user = $patient->getUser($id);
	
?>
			<div class="form-group">
				<input type="hidden" id="isImageChange" name="isImageChange" value="0">
			</div>
			<div class="form-group">
				<label>Picture Upload</label>
				<img src="<?php echo 'upload/'.$user['pic_source'];?>" style="width:50px;height:50px"></img>
				<input type="file" name="picture" id="picture" />
			</div>
			<div class="form-group">		
				<label>Full Name</label>
				<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $user['fullname'];?>" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'];?>" required>
			</div>

			<div class="form-group">
				<label>Mobile</label>
				<input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $user['mobile'];?>" required>
			</div>

			<div class="form-group">
				<label>Date of Birth</label>
				<input name="dob" id="dob" class="datepicker form-control hasDatepicker" type="date" value="<?php echo $user['dob'];?>">
			</div>
			<div class="form-group">
				<label>Blood group</label>
				<select class="form-control" name="blood_group" id="blood_group">
					<option <?php if($user['blood_group']=='A+') { ?> selected <?php } ?>>A+</option>
					<option <?php if($user['blood_group']=='AB+') { ?> selected <?php } ?>>AB+</option>
					<option <?php if($user['blood_group']=='O+') { ?> selected <?php } ?> >O+</option>
					<option <?php if($user['blood_group']=='AB-') { ?> selected <?php } ?>>AB-</option>
					<option <?php if($user['blood_group']=='B+') { ?> selected <?php } ?>>B+</option>
					<option <?php if($user['blood_group']=='A-') { ?> selected <?php } ?>>A-</option>
					<option <?php if($user['blood_group']=='B-') { ?> selected <?php } ?>>B-</option>
					<option <?php if($user['blood_group']=='O-') { ?> selected <?php } ?>>O-</option>
				</select>
			</div>
			<div class="form-group">
				<label>Sex</label><br>
					<label class="radio-inline">
						<input type="radio" name="sex" id="sex" value="1"<?php if($user['sex']=='1') { ?> checked <?php } ?>>Male
					</label> 
					<label class="radio-inline">
						<input type="radio" name="sex" id="sex" value="0"<?php if($user['sex']=='0') { ?> checked <?php } ?>>Female
					</label>
			</div>
			<div class="form-group">
				<label>Address Line One</label>
				<input type="text" class="form-control" name="address_line_one" id="address_line_one" value="<?php echo $user['address_line_one'];?>">
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control"  name="city" id="city" value="<?php echo $user['city'];?>">
			</div>
			<div class="form-group">
				<label>Locality</label>
				<input type="text" class="form-control" name="locality" id="locality" value="<?php echo $user['locality'];?>">
			</div>
			<div class="form-group">
				<label>State</label>
				<input type="text" class="form-control" name="state" id="state" value="<?php echo $user['state'];?>">
			</div>
			<div class="form-group">
				<label>Pincode</label>
				<input type="text" input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $user['pincode'];?>">
			</div>
  <tr>
    <td colspan="2">
		<input type="button" onclick="confirmForm();"  name="submit" class="btn btn-primary" value="save"/>
	</td>
  </tr>
<?php
}
?>


 <script>

$(document).ready(function(){
 $('#picture').change(function(){ 
	$('#isImageChange').val('1');
 })
});
</script>