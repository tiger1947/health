<?php
// include header
include_once('header.php');
include_once('class/class_doctor_list.php');




$doc = new Doctor();
$doctors = $doc->getAllDoctors();
$num = count($doctors);

//echo "<pre/>";
//print_r($doctors);
//die;


// include tpl
include('template/doctor-list.tpl.php');
?> 