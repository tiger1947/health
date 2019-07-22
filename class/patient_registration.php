<?php


class patient_registration
{
	
	
function addUser($data)
		{
			global $db;				
			if($db->insert('user',$data))
				return 1;			
			else
				return 0;
		}
function updateUser($id,$data)
		{
			global $db;		
			$db->where('user_id',$id);
			if($db->update('user',$data))
				return 1;			
			else
				return 0;
		}
}
?>