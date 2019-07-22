<?php
include_once('includes/application_top.php'); 

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
global $db;
$query = $db->rawQuery("SELECT user_id, specialization FROM user WHERE (fullname LIKE '%".$searchTerm."%' OR city LIKE '%".$searchTerm."%' OR specialization LIKE '%".$searchTerm."%') AND status = '1' group by specialization ORDER BY skill ASC");

//print_r($query);
//die;

// Generate skills data array
$skillData = array();

// set values into array
foreach($query as $value) 
{
	$data['user_id'] = $value['user_id'];
	$data['value'] = $value['specialization'];
	array_push($skillData, $data);
}

// Return results as json encoded array
echo json_encode($skillData);

?>