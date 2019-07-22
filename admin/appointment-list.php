<?php
// include header
include_once('header.php');
include_once('class/appointment.php');


$app = new Appointment();

// include tpl
include('template/appointment-list.tpl.php');
?> 