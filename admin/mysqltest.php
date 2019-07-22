<?php

// https://github.com/ThingEngineer/PHP-MySQLi-Database-Class

include_once('includes/MysqliDb.php');

$mysqli = new mysqli ('localhost', 'root', '', 'health');
$db = new MysqliDb ($mysqli);

$logins = $db->rawQueryValue('select dept_name from department');

foreach ($logins as $dept_name)
    echo $dept_name."<br/>";

//echo "<pre/>";
//print_r($db);

?>