<?php

	// Create connection
	$db = new mysqli('localhost', 'root', '', 'health');
	
	class Doctor 
	{
		//constructor
		public function __construct()
		{
			//constructor 
		}		
		
		/* Member functions */
		function getAllDoctor()
		{
			global $db;
			$result = $db->query('select * from doctor');
			while($row = $result->fetch_assoc())
			{
				$data[] = $row;	
			}
			return $data; 
		}	

		/* Member functions */
		function getDoctor($id)
		{
			global $db;
			$result = $db->query("select * from doctor where doc_id = '".$id."'");
			$row = $result->fetch_assoc();
			$data[] = $row;	
			return $data; 
		}		
	}	
	
	$doc = new Doctor();
	
	
	$users = $doc->getAllUser();
	echo "<pre/>";
	print_r($users);
	

	
/*	
	$user = $doc->doctor('74');
	echo "<pre/>";
	print_r($user);
*/

?>

