<?php
	// class for doctor
	class Doctor 
	{
		//constructor
		public function __construct()
		{
			//constructor 
		}		
		
		/* Member functions */
		function getAllDoctors()
		{
			global $db;
			return $db->rawQuery("select * from doctor where isDeleted='0'");
		}	

		/* Member functions */
		function getDoctor($id)
		{
			global $db;
			$result = $db->rawQueryOne("select doc.*, dept.dept_name from doctor as doc left join department as dept on dept.dept_id = doc.dept_id where doc_id = '".$id."'");
			return $result; 
		}
		
		

		function deleteDoctor($id,$data)
		{
			global $db;
			$db->where('doc_id',$id);
			if($db->update('doctor',$data))	
				return 1;
			else
				return 0;
		}

		function activeDeactive($id,$data)
		{
			global $db;
			$db->where('doc_id',$id);
			if($db->update('doctor',$data))	
				return 1;
			else
				return 0;
		}
		
		
		function updateDoctor($id,$data)
		{
			global $db;		
			$db->where('doc_id',$id);
			if($db->update('doctor',$data))
				return 1;			
			else
				return 0;
		}
		
		
		function addDoctor($data)
		{
			global $db;				
			if($db->insert('doctor',$data))
				return 1;			
			else
				return 0;
		}

		function getDepartment()
		{
			global $db;	
			$cols = array ("dept_id,dept_name");
			$department = $db->get("department", null, $cols);
			return $department;
		}			
	}	
?>