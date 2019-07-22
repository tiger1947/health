<?php
class Dashboard
{
	//constructor
	public function __construct()
	{
		//constructor 
	}

	function noOfDoctorsRegistered()
	{
		global $db;	
		$doctor  = $db->rawQuery("select count(*) as count from doctor");		
		return $doctor;
	}
	
	function noOfPatientsRegistered()
	{
		global $db;
		$patient = $db->rawQuery("select count(*) as count from patient");		
		return $patient;
	}
	
		function getTotalAppointment()
	{
		global $db;
		$appointment = $db->rawQuery("select count(*) as count from appointment");
		return $appointment;
	}
	function getTotalDepartment()
	{
		global $db;
		$department = $db->rawQuery("select count(*) as count from department");
		return $department;		
	}
	
	function getBarChartOfDoctors()
	{
		global $db;
		$barchart = $db->rawQueryOne("SELECT 
		SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
		SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
		SUM(IF(month = 'Mar', total, 0)) AS 'Mar',
		SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
		SUM(IF(month = 'May', total, 0)) AS 'May',
		SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
		SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
		SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
		SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
		SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
		SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
		SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
		FROM (
		SELECT DATE_FORMAT(created_date, '%b') AS month, count(doc_id) as total
		FROM doctor 
		WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month)
		GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
		return $barchart;			
	}
	
	function getBarChartOfPatients()
	{
		global $db;
		$patient = $db->rawQueryOne("SELECT 
		SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
		SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
		SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
		SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
		SUM(IF(month = 'May', total, 0)) AS 'May',
		SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
		SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
		SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
		SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
		SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
		SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
		SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
		FROM (
		SELECT DATE_FORMAT(created_date, '%b') AS month, count(patient_id) as total FROM patient WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
		return $patient;			
	}
	
	function getBarChartOfAppointments()
	{
		global $db;
		$appointment = $db->rawQueryOne("SELECT 
		SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
		SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
		SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
		SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
		SUM(IF(month = 'May', total, 0)) AS 'May',
		SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
		SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
		SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
		SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
		SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
		SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
		SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
		FROM (SELECT DATE_FORMAT(created_date, '%b') AS month, count(app_id) as total FROM appointment WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
	
		return $appointment;			
	}
	
	function getLineChartOfDoctor()
	{
		global $db;
		
		$doctor = $db->rawQueryOne("SELECT 
		SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
		SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
		SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
		SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
		SUM(IF(month = 'May', total, 0)) AS 'May',
		SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
		SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
		SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
		SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
		SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
		SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
		SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
		FROM (SELECT DATE_FORMAT(created_date, '%b') AS month, count(doc_id) as total FROM doctor WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
		
		return $doctor;			
	}
	
	function getLineChartOfPatient()
	{
		global $db;
		
		$patient = $db->rawQueryOne("SELECT 
		SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
		SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
		SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
		SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
		SUM(IF(month = 'May', total, 0)) AS 'May',
		SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
		SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
		SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
		SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
		SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
		SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
		SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
		FROM (SELECT DATE_FORMAT(created_date, '%b') AS month, count(patient_id) as total FROM patient WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
		
		return $patient;			
	}
	
	function getLineChartOfAppointments()
	{
		global $db;
		
		$appointment = $db->rawQueryOne("SELECT 
		SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
		SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
		SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
		SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
		SUM(IF(month = 'May', total, 0)) AS 'May',
		SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
		SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
		SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
		SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
		SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
		SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
		SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
		FROM (SELECT DATE_FORMAT(created_date, '%b') AS month, count(app_id) as total FROM appointment WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
		
		return $appointment;			
	}
}


?>