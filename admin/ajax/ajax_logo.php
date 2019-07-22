<?php
include_once('../includes/application_top.php');
include_once('../class/logo.php');
$log = new Logo();


if($_REQUEST['action']=="add_logo")
{
	
	//print_r($_REQUEST);
	//print_r($_FILES);
	if (isset($_FILES['picture'])) 
	{
		$num = rand(0, 99999);
		$picture = $_FILES['picture'];
		$filename = $_FILES["picture"]["name"];
		$tempname = $_FILES["picture"]["tmp_name"];
		$folder = $num.'_'.$filename;
		move_uploaded_file($tempname,"../logo/".$folder);
		$profile_pic = array('logo_path' => $filename);
	}
	
	$data = Array(
		'description' => $_REQUEST['description'],
		
		'created_date' => date('Y-m-d h:i:s')
	);

		if(!empty($profile_pic))
		$data = array_merge($data,$profile_pic);
		
		$logo_insert_result = $log->addLogo($data);
		if($logo_insert_result)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
}
else if($_REQUEST['action']=="edit_logo")
{
	$id = $_POST['id'];
	$row = $log->getLogo($id);

	?>
<!--code for image update only-->
	<div class="form-group">				
	<input type="hidden" id="isImageChange" name="isImageChange" value="0">
	</div>

	<div class="form-group">				
		<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['logo_id'];?>" required>
	</div>
	<div class="form-group">		
		<label>Description</label>
		<input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description'];?>" required>
	</div>
	<div class="form-group">
		<label>Picture upload</label>
		<img src="<?php echo 'logo/'.$row['logo_path'];?>" style="width:50px"></img>
		<input type="file" name="picture" id="picture" />
		<div id="image-holder">
		</div>
	</div>
	 <div class="form-check">
		<label>Status</label><br>
		<label class="radio-inline">
		<input type="radio" name="status" id="status" value="1" <?php if($row['status']=='1') { ?> checked <?php } ?>>Default</label>
		<label class="radio-inline">
		  <input type="radio" name="status" id="status" value="0"<?php if($row['status']=='0') { ?> checked <?php } ?>>Non Default</label>
	</div>    
	                                     
<?php 

?>
  <tr>
    <td colspan="2">
		<input type="button" onclick="validateForm();"  name="submit" class="btn btn-primary" value="save"/>
	</td>
  </tr>
<?php

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
<?php
}

else if($_REQUEST['action']=="delete_logo")
{
	$id = $_POST['id'];
	$data = array('isDeleted' =>'1');
	$result = $log->deleteLogo($id,$data);
	if($result)
	{
		echo"success";
	}
}

else if($_REQUEST['action']=="view_logo")
{
	$id = $_POST['id'];
	$row = $log->getLogo($id);
?>
	<div class="form-group">				
		<input type="hidden"  id="id" name="id" <?php echo $row['logo_id'];?>>
	</div>
	<div class="form-group">		
		<label>Description:</label>
		<span id="description" name="description"><?php echo $row['description'];?></span>
	</div>
	
	<div class="form-group">
		<label>Picture upload</label>
		 <img src="<?php echo 'logo/'.$row['logo_path'];?>" style="width:50px;height:50px">
	</div>
	                       
<?php 
}

else if($_REQUEST['action']=="update_logo")
{
	$profile_pic = array();
	$id = $_REQUEST['id'];
	
	if($_POST['isImageChange']=='1') 
	{
		$picture = $_FILES['picture'];
		$filename = $_FILES["picture"]["name"];
		$tempname = $_FILES["picture"]["tmp_name"];
		$folder = "../logo/".$filename;
		move_uploaded_file($tempname, $folder);
		$profile_pic = array('logo_path' => $filename);
	}
	
	$data = Array(
		'description' =>  $_REQUEST['description'],
		'status' => $_REQUEST['status']
	);

	if(!empty($profile_pic))
		$data = array_merge($data,$profile_pic);
	
	$logo_update_result = $log->updateLogo($id, $data);
	if($logo_update_result)
	{
		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
		
}
?>