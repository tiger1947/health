<?php 

include_once('class/Patient.php');

        $p = new Patient();  
		$patients = $p->getAllPatients();
		$num = count($patients);
?>