<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "select * from ".Dept." where dept_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0)
{
while($row = mysqli_fetch_array($result))
{
?>
	<div class="form-group">				
		<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['dept_id'];?>" required>
	</div>
	<div class="form-group">		
		<label>Department Name</label>
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['dept_name'];?>" required>
	</div>
	<div class="form-group">
		<label>Description</label>
		<input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description'];?>" required>
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
