<?php
// core files
include_once('config.php');
include_once('MysqliDb.php');
// specify your own database credentials
$host = hostname;
$dbname = dbname;
$username = username;
$password = password;
// mysql wrapper
$mysqli = new mysqli ($host, $username, $password, $dbname);
$db = new MysqliDb ($mysqli);
?>