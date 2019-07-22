<?php

class Login 
{
	//constructor
	public function __construct()
	{
		//constructor 
	}
	
	function loginCheck($username, $password)
	{
		global $db;
		$data = $db->rawQuery("select * from admin where email='".$username."' and password='".md5($password)."'");
		return $data;
	}
}	
?>