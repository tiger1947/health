<?php
include('includes/application_top.php');

class Profile
{
	function getGeneralProfile($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from user where user_id = '".$id."'");
		return $result; 
	}



	function getProfessionalProfile($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from professional where user_id = '".$id."'");
		return $result; 
	}
	
	function getEducationalProfile($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from education where user_id = '".$id."'");
		return $result; 
	}
	
	function updateGeneral($mobile,$data)
	{
		global $db;
		$db->where ('mobile', $mobile);
		if ($db->update ('user', $data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function updateProfessional($user,$data)
	{
		global $db;
		$db->where ('user_id', $user);
		if ($db->update ('professional', $data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function updateEducation($user, $data)
	{
		global $db;
		$db->where ('user_id', $user);
		if ($db->update ('education', $data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}
?>