<?php 
include_once('../includes/application_top.php');


if($_REQUEST['action']=="add_department")
{
	$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['desc']);

	$query = "INSERT INTO ".Dept."(dept_name, description) VALUES ('".$name."','".$description."')";
	if(mysqli_query($conn, $query))
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

	$id = mysqli_real_escape_string($conn, $_REQUEST['id'] );
	$name = mysqli_real_escape_string($conn , $_REQUEST['name']);
	$description = mysqli_real_escape_string($conn , $_REQUEST['description']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);

	//print_r($_REQUEST);

	//echo $query = "UPDATE ".Dept." SET dept_name='".$name."',description='".$description."', status='".$status."' WHERE dept_id='".$id."'";
	$query = "UPDATE ".Dept." SET dept_name='".$name."',description='".$description."', status='".$status."' WHERE dept_id='".$id."'";

	if(mysqli_query($conn, $query))
	{
		echo "success";	
	}
	else
	{
		echo "error";
	}
}
else if($_REQUEST['action']=="delete_department")
{
	$id = $_POST['id'];
	$query = "UPDATE ".Doc." SET isDeleted='1' WHERE doc_id='".$id."'";
	if(mysqli_query($conn, $query))
	{
		echo "success";
	}
	
}	
else if($_REQUEST['action']=="view_department")
{

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
	
}
else if($_REQUEST['action']=="active_deactive_department")
{
	
		$id = mysqli_real_escape_string($conn,$_REQUEST['id']);
		$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
		//echo $status;

		if($status=='1')
		{
			$status = '0';
		}
		else
		{	
			$status = '1';
		}
		$query = "UPDATE department SET status='".$status."' where dept_id='".$id."'";
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