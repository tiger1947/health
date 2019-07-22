<?php
class Login 
{

	function loginCheck($mobilenumber, $password)
	{		
		global $db;
		$data = $db->rawQueryOne("select * from user where mobile='".$mobilenumber."' and password='".md5($password)."' and isVerified='1' and isDeleted='0'");		
		return $data;
	}
	
	function passwordEncryption($pass)
	{
		 return md5($pass);
	}
	
	function checkUserAvailable($mobile)
	{
		global $db;
		$data = $db->rawQueryOne("select count(*) count from user where mobile='".$mobile."'");		
		return $data;
	}
	
	function set_new_otp($mobile,$data)
	{
		global $db;
		$db->where('mobile',$mobile);
		if($db->update('user',$data))
		{
			return 1;			
		}
		else
		{
			return 0;
		}
	}
	
	function get_otp($mobile)
	{
		global $db;
		return $db->rawQueryOne("select mobile_otp from user where mobile='".$mobile."'");
		
	}

	function setNewPassword($mobile, $data)
	{
		global $db;
		$db->where('mobile',$mobile);
		if($db->update('user',$data))
		{
			return 1;			
		}
		else
		{
			return 0;
		}
	}
	
	function checkPassword($password)
	{
		global $db;
		return $db->rawQueryOne("select count(user_id) as _count from user where user_id='".$_SESSION['user_id']."' and password='".md5($password)."'");
		
	}
	
	function resetPassword($data)
	{
		global $db;
		$db->where('user_id',$_SESSION['user_id']);
		if($db->update('user',$data))
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