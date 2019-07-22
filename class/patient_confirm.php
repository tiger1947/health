<?php


	class Patient_Confirmation
	{
		function addPatient($data)
		{
			global $db;				
			if($db->insert('patient',$data))
				return 1;			
			else
				return 0;
		}
		
		function getPatient($id)
		{
		global $db;
		$result = $db->rawQueryOne("select * from patient where patient_id ='".$id."'");
		return $result;
		}
	}
?>