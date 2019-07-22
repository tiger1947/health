<?php 
include_once('../includes/application_top.php');
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
 ?>
