<?php 
	include_once '../model/db.php';
	$rc_number = $_REQUEST['rc_number'];
	$rc_amount = $_REQUEST['rc_amount'];
	$rc_date = $_REQUEST['rc_date'];
	$vehicle_id = $_REQUEST['vehicle_id'];
	print_r($rc_date);
	$con = db_connect();
	$result = insert('`rc_details`',array('vehicle_id','rc_no','rc_date','rc_amount'),array($vehicle_id,$rc_number,$rc_date,$rc_amount),$con);
	if ($result == 'inserted') {
				echo "inserted";
	}else{
		echo "error";
	}