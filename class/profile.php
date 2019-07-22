<?php
//include('includes/application_top.php');

class Profile
{

	function updateDoctorInfo($id, $data)
	{
		global $db;
		$db->where ('user_id', $id);
		if ($db->update ('user', $data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function getDetail($specialization)
	{
		global $db;
		$sql = "select * from user where specialization like '%".$specialization."%'";
		return $db->rawQuery($sql);		
	}
	
	function getInformation($id)
	{
		global $db;
		$output = $db->rawQuery("select * from user where user_id='".$id."'");
		return $output;
	}

	function getData($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from user where user_id='".$id."'");
		return $result;
	}
	function getTodayAppointment($id)
	{
		global $db;
		$appointment = $db->rawQuery("SELECT u.fullname,u.user_id,a.isCompleted,a.status, a.app_date FROM `appointment` as a left join user as u on u.user_id = a.`patient_id` where `doc_id` = '".$id."' AND DATE(a.app_date) = CURDATE()");
		return $appointment;
	}
	
	function getCompletedAppointment($id)
	{
		global $db;
		$appointment = $db->rawQuery("SELECT u.fullname,u.user_id,a.isCompleted,a.status, a.app_date FROM `appointment` as a left join user as u on u.user_id = a.`patient_id` where `doc_id` = '".$id."' AND DATE(a.app_date) < date(CURDATE())");
		return $appointment;
	}
	
	function getPendingAppointment($id)
	{
		global $db;
		$appointment = $db->rawQuery("SELECT u.fullname,u.user_id,a.isCompleted,a.status, a.app_date FROM `appointment` as a left join user as u on u.user_id = a.`patient_id` where `doc_id` = '".$id."' AND DATE(a.app_date) > date(CURDATE())");
		return $appointment;
	}
}
?>