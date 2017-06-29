<?php 	
	include_once '../model/db.php';
	$vehicle_no = $_REQUEST['id'];
	$con = db_connect();
	$condition = "`vehicle_number` = '".$vehicle_no."'";
	$selected_row = select("`id`","`vehicle_details`",$condition,$con);
	if ($selected_row == 'empty') {
		echo "error";
	}else{
	echo  $selected_row[0]['id'];
	}