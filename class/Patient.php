<?php


class Patient
{
	
	function updateUser($id,$data)
	{
		global $db;		
		$db->where('user_id',$id);
		if($db->update('user',$data))
			return 1;			  
		else
			return 0;
	}
		
	function getUser($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from user where user_id='".$id."'");
		return $result;
	}
	function getAllPatients()
	{
		
		global $db;
		 /* $data = $db->rawQuery("SELECT user.specialization, user.fullname, appointment.problem,appointment.app_date from appointment         INNER JOIN user ON appointment.patient_id=user.user_id");
		return $data;  */
		 $data = $db ->rawQuery("SELECT user.specialization, user.fullname, appointment.problem,appointment.app_date from appointment left join user on user.user_id = appointment.doc_id where patient_id = '53'");
		return $data; 
	}
	
	function getAllUsers()
	{
		global $db;
		return $db->rawQuery("select * from user where isDeleted='0'");
	}	
	
	
}
?>