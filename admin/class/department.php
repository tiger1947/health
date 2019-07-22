<?php

// class for department 	
class Department 
{
	//constructor
	public function __construct()
	{
		//constructor 
	}

	function addDepartment($data)
	{
		global $db;				
		if($db->insert('department',$data))
			return 1;			
		else
			return 0;
	}
	
	/* Member functions */
	function getAllDepartment()
	{
		global $db;
		return $db->rawQuery("select * from department where isDeleted='0'");
	}	

	/* Member functions */
	function getDepartment($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from department where dept_id = '".$id."'");
		return $result; 
	}

	function deleteDepartment($id,$data)
	{
		global $db;
			$db->where('dept_id',$id);
			if($db->update('department',$data))	
				return 1;
			else
				return 0;
	}
	function updateDepartment($id,$data)
	{
		global $db;
		$db->where('dept_id',$id);
		if($db->update('department',$data))
			return 1;
		else
			return 0;
	}
	function activeDeactive($id,$data)
	{
		global $db;
		$db->where('dept_id',$id);
		if($db->update('department',$data))	
			return 1;
		else
			return 0;
	}
}	

?>