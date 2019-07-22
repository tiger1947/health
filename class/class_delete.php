<?php
class Delete_Account
{
	function setOTP($mobile, $data)
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

	function fetchOtp($id)
	{
		global $db;
		return $db->rawQueryOne("select mobile_otp from user where user_id='".$id."'");
	}
	
	function deleteAccount($id, $data)
	{
		global $db;
		$db->where ('user_id', $id);
		if ($db->update ('user', $data))
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