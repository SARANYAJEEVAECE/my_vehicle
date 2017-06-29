<?php 	
	include_once '../model/db.php';
	$user_id = $_REQUEST['user_id'];
	$con = db_connect();
	$i = 1;
	$condition = "`user_id` = '".$user_id."'";
	$selected_row = select("`vehicle_number`","`vehicle_details`",$condition,$con);
	if ($selected_row == 'empty') {
		echo "empty";
	}else{
		foreach ($selected_row as  $value) {
			if($i==1){
				$content = $value['vehicle_number'];
				$i++;
			}else{
				$content = $content.",".$value['vehicle_number'];
			}
		}
		echo $content;
	}