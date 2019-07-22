<?php 
include_once('../includes/application_top.php');
$id = $_POST['id'];
$query = "select * from ".Dept." where dept_id='".$id."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count > 0){
while($row = mysqli_fetch_array($result))
{
?>
	<div class="form-group">				
		<input type="hidden"  id="id" name="id" value="<?php echo $row['dept_id'];?>"></span>
	</div>
	<div class="form-group">		
		<label>Department Name</label>
		<span   id="name" name="name"><?php echo $row['dept_name'];?></span>
	</div>
	<div class="form-group">
		<label>Description</label>
		<span   id="desc" name="desc"><?php echo $row['description'];?></span>
	</div>	 
<?php 
	} 
}
 ?>
