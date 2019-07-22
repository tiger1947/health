<?php
class Dashboard
{
	
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
		FROM (SELECT DATE_FORMAT(created_date, '%b') AS month, count(appointment_id) as total FROM appointment WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
	
		return $appointment;			
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
		
		/* $patient = $db->rawQuery("SELECT 
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
		SELECT DATE_FORMAT(app_date, '%b') AS month, count(patient_id) as total FROM appointment WHERE app_date <= DATE(NOW()) and app_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(app_date, '%m-%Y')) as sub"); */
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
		FROM (SELECT DATE_FORMAT(created_date, '%b') AS month, count(appointment_id) as total FROM appointment WHERE created_date <= DATE(NOW()) and created_date >= Date_add(DATE(Now()),interval - 12 month) GROUP BY DATE_FORMAT(created_date, '%m-%Y')) as sub");
		
		return $appointment;			
	}
	
	function noOfPat($id)
	{
		global $db;
		return $db->rawQueryOne("select count(patient_id) as count from appointment where doc_id='".$id."'");
	}
	
	function noOfApp($id)
	{
		global $db;
		return $db->rawQueryOne("select count(doc_id) as total from appointment where doc_id='".$id."'");
	}
	function noOfAppTod($id)
	{
		global $db;
		return $db->rawQueryOne("select count(app_date) as num from appointment where doc_id='".$id."' and date(app_date) = curdate()");
	}
}
?>