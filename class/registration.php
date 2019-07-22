<?php
class Registration
{
	//constructor
		public function __construct()
		{
			//constructor 
		}
		
		function passwordEncryption($pass)
		{
			 return md5($pass);
		}

		function checkDuplicationOfUser($mobile)
		{
			global $db;				
			$check = $db->rawQuery("select user_id from user where mobile='".$mobile."'");
			
			if(count($check) > 0)
			{
				return 1;			
			}
			else
			{
				return 0;	
			}			
		}
		
		function addUser($data)
		{
			global $db;				
			if($db->insert('user',$data))
				return 1;			
			else
				return 0;
		}
		
		function verifyOtp($mobile)
		{
			global $db;
			$result  = $db->rawQueryOne("select mobile_otp from user where mobile='".$mobile."'");			
			return $result;
		}
		
		function verifyMobile($mobile,$data)
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

}
?>