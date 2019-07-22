<?php

class Bookappointment
{
	
	function addAppointment($data)
	{
		global $db;				
		if($db->insert('appointment',$data))
			return 1;			
		else
			return 0;
	}

	function getProfile($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from user where user_id='".$id."'");
		return $result;
	}
	
	function getAppointmentStatus($id)
	{
		global $db;
		return $db->rawQueryOne("select status from appointment where patient_id='".$id."'");		
	}
	function changeStatus($id,$data)
	{
		global $db;
		$db->where('patient_id',$id);
		if($db->update('appointment',$data))
			return 1;			  
		else
			return 0;
	}
	
	function getPatient($id)
	{
		global $db;
		return $db->rawQueryOne("select fullname,mobile,profile_pic_source from user where user_id='".$id."'");
	}
}
?>