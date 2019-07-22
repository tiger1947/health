<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "select * from ".Pat." where patient_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0){
?>

<?php 
while($row = mysqli_fetch_array($result))
{
?>
	<div class="form-group">				
		<input type="hidden"  id="id" name="id" <?php echo $row['patient_id'];?>
	</div>
	<div class="form-group">		
		<label>First Name:</label>
		<span  id="fname" name="fname"><?php echo $row['fname'];?></span>
	</div>
	<div class="form-group">
		<label>Last Name:</label>
		<span  id="lname" name="lname"> <?php echo $row['lname'];?></span>
	</div>
	<div class="form-group">
		<label>Mobile:</label>
		<span   id="mobile" name="mobile" ><?php echo $row['mobile'];?></span>
	</div>
	<div class="form-group">
		<label>Designation:</label>
		<span   id="designation" name="designation" ><?php echo $row['dob'];?></span>
	</div>
	<div class="form-group">
		<label>Blood group:</label>
		<span name="dob" id="dob" ><?php echo $row['blood_group'];?></span>
	</div>
	<div class="form-group">
		<label>Address:</label>
		<span  id="address" name="address"><?php echo $row['address'];?></span>
	</div>
	
	<div class="form-group">
		<label>Picture upload</label>
		<img src="<?php echo base_url_image.$row['pic_source'];?>" style="width:50px"></img>
	</div>
	<div class="form-group">
	 <label>Sex:</label>
	 	<span  name="sex" id="sex" >
		<?php 
			if($row['sex']=='1')
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
