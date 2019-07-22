<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "select * from ".Sch." where schedule_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0)
{
while($row = mysqli_fetch_array($result))
{
?>
	<div class="form-group">				
		<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['schedule_id'];?>" required>
	</div>
	<div class="form-group">		
		<label>Doctor Name:&nbsp&nbsp&nbsp</label>
		<span id="doctor_name" name="doctor_name"><?php echo $row['doctor_name'];?></span>
	</div>
	
	<div class="form-group">
		<label>Available Days</label>
		<select class="form-control" name="available_days" id="available_days">
			<option <?php if($row['available_days']=='sunday') { ?> selected <?php } ?>>sunday</option>
			<option <?php if($row['available_days']=='monday') { ?> selected <?php } ?>>monday</option>
			<option <?php if($row['available_days']=='tuesday') { ?> selected <?php } ?> >tuesday</option>
			<option <?php if($row['available_days']=='wednesday') { ?> selected <?php } ?>>wednesday</option>
			<option <?php if($row['available_days']=='thursday') { ?> selected <?php } ?>>thursday</option>
			<option <?php if($row['available_days']=='friday') { ?> selected <?php } ?>>friday</option>
			<option <?php if($row['available_days']=='saturday') { ?> selected <?php } ?>>saturday</option>			
		</select>
	</div>
	

	<div class="form-group">
		<label>Start Time</label>
		<input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $row['start_time'];?>" required>
	</div>


	<div class="form-group">
		<label>Close Time</label>
		<input type="time" class="form-control" id="close_time" name="close_time" value="<?php echo $row['close_time'];?>" required>
	</div>

	<div class="form-group">
		<label>Per Patient Time</label>
		<input type="text" class="form-control" id="per_patient_time" name="per_patient_time" value="<?php echo $row['per_patient_time'];?>" required>
	</div>

	<div class="form-group">
		<label>Serial Visibility</label>
		<select class="form-control" id="serial_visibility" name="serial_visibility">
			<option <?php if($row['serial_visibility']=='sequential') { ?> selected <?php } ?>>sequential</option>
			<option <?php if($row['serial_visibility']=='timestamp') { ?> selected <?php } ?>>timestamp</option>
		</select>
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
 
 