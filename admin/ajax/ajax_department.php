<?php 
include_once('../includes/application_top.php');
include_once('../class/department.php');
$dept = new Department();


if($_REQUEST['action']=="add_department")
{

	$data = Array(
		'dept_name' =>  $_REQUEST['name'],
		'description' => $_REQUEST['desc']
	);

	$result = $dept->addDepartment($data);

	if($result)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}




else if($_REQUEST['action']=="edit_department")
{	
	$id = $_POST['id'];
	$row = $dept->getDepartment($id); 

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
	 
	?>
  <tr>
    <td colspan="2">
		<input type="button" onclick="validateForm();"  name="submit" class="btn btn-primary" value="save"/>
	</td>
  </tr>
<?php
 
	
}
else if($_REQUEST['action']=="delete_department")
{
	$id = $_POST['id'];
	$data = array('isDeleted' => '1');
	$result = $dept->deleteDepartment($id,$data);
	if($result)
	{
		echo "success";
	}	
	
}	
else if($_REQUEST['action']=="view_department")
{
    $id = $_POST['id'];
	$row = $dept->getDepartment($id); 

	?>
		<div class="form-group">				
		<input type="hidden"  id="id" name="id" value="<?php echo $row['dept_id'];?>"></span>
		</div>
		<div class="form-group">		
		<label>Department Name</label>
		<span id="name" name="name"><?php echo $row['dept_name'];?></span>
		</div>
		<div class="form-group">
		<label>Description</label>
		<span   id="desc" name="desc"><?php echo $row['description'];?></span>
		</div>			
		<?php 
} 
	


else if($_REQUEST['action']=="active_deactive_department")
{
	$id = $_REQUEST['id'];
	$row = $dept->getDepartment($id); 
	if($row['status']=='0')
	{
	$data = Array('status'=>'1');
	}
	else
	{
		$data = Array('status'=>'0');
	}
	$result = $dept->activeDeactive($id,$data);
	if($result)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}	
}

else if($_REQUEST['action']=="update_department")
{
	$id = $_REQUEST['id'];
	$data = Array(	
	'dept_name' => $_REQUEST['name'],
	'description' => $_REQUEST['description'],
	'status' => $_REQUEST['status']
	);


	//print_r($data);
	//die;

	$department_update_result = $dept->updateDepartment($id, $data);

	if($department_update_result)
		{
			echo "success";	
		}
	else
		{
			echo "error";
		}
}
?>