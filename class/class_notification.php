<?php
class Notification
{
	function getNotification($id)
	{
		global $db;
		return $db->rawQuery("select * from notification where user_id='".$id."'");
	}
}
?>