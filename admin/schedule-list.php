<?php
// include header
include_once('class/schedule.php');
include('header.php');

$sch = new Schedule();
$schedule = $sch->getAllSchedule();
$num = count($schedule);




include('template/schedule-list.tpl.php');
?>