<?php

    //class for logo
    class Logo
	{
		//constructor
		public function __construct()
		{
			//constructor 
		}
		
		/* Member functions */
		function getAllLogo()
		{
			global $db;
			return $db->rawQuery("select * from logo where isDeleted='0'");
		}	
		
		/* Member functions */
		function getLogo($id)
		{
			global $db;
			$result = $db->rawQueryOne("select * from logo where logo_id = '".$id."'");
			return $result; 
		}
		
		function deleteLogo($id,$data)
		{
			global $db;
			$db->where('logo_id',$id);
			if($db->update('logo',$data))	
				return 1;
			else
				return 0;
		}
		
		function updateLogo($id,$data)
		{
			global $db;		
			$db->where('logo_id',$id);
			if($db->update('logo',$data))
				return 1;			
			else
				return 0;
		}
		
		function addLogo($data)
		{
			global $db;
			if($db->insert('logo',$data))
				return 1;
			else
				return 0;
		}
		
	}
	
?>