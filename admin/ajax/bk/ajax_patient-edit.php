<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "select * from ".Pat." where patient_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0)
{
while($row = mysqli_fetch_array($result))
{
?>
	<div class="form-group">				
	<input type="hidden" id="isImageChange" name="isImageChange" value="0">
	</div>
	
	<div class="form-group">				
		<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['patient_id'];?>" required>
	</div>
	<div class="form-group">		
		<label>First Name</label>
		<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname'];?>" required>
	</div>
	<div class="form-group">
		<label>Last Name</label>
		<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lname'];?>" required>
	</div>
	<div class="form-group">
		<label>Mobile</label>
		<input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile']?>" required>
	</div>
	
	
	<div class="form-group">
		<label>Address</label>
		<input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address'];?>" required>
	</div>
	

	<div class="form-group">
		<label>Date Of Birth</label>
		<input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob'];?>" required>
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
		<label>Picture upload</label>
		<img src="<?php echo base_url_image.$row['pic_source'];?>" style="width:50px"></img>
		<input type="file" name="picture" id="picture" value="<?php echo $row['pic_source'];?>" />		
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
} 
?>
  <tr>
    <td colspan="2">
		<input type="button" onclick="validateForm();"  name="submit" class="btn btn-primary" value="save"/>
	</td>
  </tr>
<?php
 }
 ?>
 

 <script>
//for image checking update or not
$(document).ready(function(){
 $('#picture').change(function(){ 
	//alert(this.value);
	$('#isImageChange').val('1');
 })
});
</script>