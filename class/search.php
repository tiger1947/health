<?php

	function search_information($fullname)
	{
		global $db;
		$query = $db->rawQuery("SELECT * FROM user WHERE fullname LIKE '%".$searchq."%'  AND status = '1' ORDER BY skill ASC");
		return data;		
	}
?>