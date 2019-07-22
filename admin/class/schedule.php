<?php

// class for schedule 	
class Schedule 
{
	//constructor
	public function __construct()
	{
		//constructor 
	}		
	
	/* Member functions */
	function addSchedule($data)
	{
		global $db;				
		if($db->insert('schedule',$data))
			return 1;			
		else
			return 0;
	}
	
	function getAllSchedule()
	{
		global $db;
		return $db->rawQuery("select * from schedule where isDeleted='0'");
	}	

	/* Member functions */
	function getSchedule($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from schedule where schedule_id = '".$id."'");
		return $result; 
	}

	function deleteSchedule($id,$data)
	{
		global $db;
			$db->where('schedule_id',$id);
			if($db->update('schedule',$data))	
				return 1;
			else
				return 0;
	}
	
	function updateSchedule($id,$data)
	{
		global $db;
		$db->where('schedule_id',$id);
		if($db->update('schedule',$data))
			return 1;
		else
			return 0;
	}
	
	function getallDoctor()
	{
			global $db;
			$result = $db->rawQuery("select * from doctor");
			return $result; 
	}
}	

?>