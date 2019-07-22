<?php

	class Patient 
	{
		//constructor
		public function __construct()
		{
			//constructor 
		}		
		
		function addPatient($data)
		{
			global $db;				
			if($db->insert('patient',$data))
				return 1;			
			else
				return 0;
		}
	

		/* Member functions */
		function getAllPatients()
		{
			global $db;
			return $db->rawQuery("select * from patient where isDeleted='0'");
			
		}	
		
		function getPatient($id)
		{
			global $db;
			$result = $db->rawQueryOne("select * from patient where patient_id = '".$id."'");			
			return $result;
		}	
		

		function deletePatient($id,$data)
		{
			global $db;
			$db->where('patient_id',$id);
			if($db->update('patient',$data))	
				return 1;
			else
				return 0;
		}
		
		function updatePatient($id,$data)
		{
			global $db;		
			$db->where('patient_id',$id);
			if($db->update('patient',$data))
				return 1;			
			else
				return 0;
		}


		function activeDeactive($id,$data)
		{
			global $db;
			$db->where('patient_id',$id);
			if($db->update('patient',$data))	
				return 1;
			else
				return 0;
		}
	}	
	
?>
