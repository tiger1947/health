<?php
//include_once('includes/application_top.php');

include_once('includes/MysqliDb.php');

$mysqli = new mysqli ('localhost', 'root', '', 'health');

$db = new MysqliDb ($mysqli);

$test = Array(
			'fname' => $db->escape('name')
);
print_r($test);

die;
$data = Array (
			'f_name' => 'apsara',
			'l_name' => 'ali',
			'email' => 'apsara@gmail.com',	
			'password' => md5('test'),
			//'designation' => ''
			'created_date' => $db->now(),
			// createdAt = NOW()

);

$id = $db->insert ('doctor', $data);
if($id)
    echo 'doctor created. Id=' . $id;
die;


?>

