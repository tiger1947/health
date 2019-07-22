<?php
include_once('includes/application_top.php');
include_once('header.php');
// $id = $_SESSION['user_id'];
$id = 48;
global $db;
$data = $db->rawQuery("select * from notification where user_id='48'");
$i = 0;
?>

<div class="container margin_60">
	<div class="row">
		<?php include_once('sidebar_doctor.php'); ?>
			<table>				
				<?php for($i=0;$i<count($data);$i++)
					{
				?>
				<tr>
					<td>
						<?php echo $data[$i]['message'];?>						
					</td>
					<td>
						<input type="button" class="btn btn_1" value="View" onclick="view(<?php echo $data[$i]['notification_id'];?>);">
					</td>
				</tr>
				<?php } ?>
			</table>
	</div>
</div>	
<?php
include_once('footer.php');
?>
<script src="js/custom/notification.js" type="text/javascript"></script>