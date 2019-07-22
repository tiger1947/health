<?php
// set GMT time zone
date_default_timezone_set('UTC');
// set GMT/UTC date time
$_TODAY = date('Y-m-d H:i:s');
$_DATE = date('Y-m-d');
$_TIME = date('H:i:s');
// Turn off all error reporting
error_reporting(E_ALL); // E_ALL
ini_set('display_errors', 1); // set 1 to on
// database connection for local
define('hostname','localhost');
define('username','root');
define('password','');
define('dbname','health');
//password key
//define('password_key','admin@123');
?>	