<?php
include('header.php');
include_once('class/patient.php');



$pat = new Patient();
$patients = $pat->getAllPatients();
$num = count($patients);


include('template/patient-list.tpl.php');
?>

