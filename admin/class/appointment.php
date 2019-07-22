<?php


class Appointment
{
	public function __construct()
	{
		//constructor 
	}		
		
			
	function getAllAppointments()
		{
			global $db;
			return $db->rawQuery("select appointment.isCompleted, doctor.f_name, doctor.l_name, patient.fname,patient.lname, department.dept_name,appointment.app_id ,appointment.app_date, appointment.problem, appointment.status from doctor INNER JOIN appointment on doctor.doc_id=appointment.doc_id INNER JOIN patient ON patient.patient_id=appointment.patient_id INNER JOIN department on department.dept_id=appointment.department_id where appointment.isDeleted='0' order by app_id DESC");			
		}	

		/* Member functions */
		function getAppointment($id)
		{
			global $db;
			$result = $db->rawQueryOne("select appointment.isCompleted, doctor.f_name, doctor.l_name, patient.fname, patient.lname, department.dept_name,appointment.app_id ,appointment.app_date, appointment.problem, appointment.status from doctor INNER JOIN appointment on doctor.doc_id=appointment.doc_id INNER JOIN patient ON patient.patient_id=appointment.patient_id INNER JOIN department on department.dept_id=appointment.department_id where appointment.app_id='".$id."'");
			return $result; 
		}
		

		function deleteAppointment($id,$data)
		{
			global $db;
			$db->where('app_id',$id);
			if($db->update('appointment',$data))	
				return 1;
			else
				return 0;
		}
		
		function updateAppointment($id,$data)
		{
			global $db;		
			$db->where('app_id',$id);
			if($db->update('appointment',$data))
				return 1;			
			else
				return 0;
		}
		
		
		function addAppointment($data)
		{
			global $db;				
			if($db->insert('appointment',$data))
				return 1;			
			else
				return 0;
		}

		function getAllDoctors()
		{
			global $db;				
			$doctor = $db->rawQuery("select * from doctor");
			return $doctor;
		}
		
		function getAllPatients()
		{
			global $db;				
			$patient = $db->rawQuery("select * from patient");
			return $patient;
		}
		
		function getAllDepartments()
		{
			global $db;				
			$department = $db->rawQuery("select * from department");
			return $department;
		}
		
		function changeStatus($id,$data)
		{
			global $db;			
			$db->where('app_id',$id);
			if($db->update('appointment',$data))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
}

?>