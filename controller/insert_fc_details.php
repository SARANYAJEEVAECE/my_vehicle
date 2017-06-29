<?php 
	include_once '../model/db.php';
	$fc_no = $_REQUEST['fc_number'];
	$fc_amount = $_REQUEST['fc_amount'];
	$fc_date = $_REQUEST['fc_date'];
	$vehicle_id = $_REQUEST['vehicle_id'];
	// print_r($rc_date);
	$con = db_connect();
	$result = insert('`fc_details`',array('vehicle_id','fc_no','fc_date','fc_amount'),array($vehicle_id,$fc_no,$fc_date,$fc_amount),$con);
	if ($result == 'inserted') {
				echo "inserted";
	}else{
		echo "error";
	}