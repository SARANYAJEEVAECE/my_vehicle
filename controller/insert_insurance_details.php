<?php 
	include_once '../model/db.php';
	$insurance_number = $_REQUEST['insurance_number'];
	$insurance_amount = $_REQUEST['insurance_amount'];
	$insurance_date = $_REQUEST['insurance_date'];
	$vehicle_id = $_REQUEST['vehicle_id'];
	// print_r($rc_date);
	$con = db_connect();
	$result = insert('`insurance_details`',array('vehicle_id','insurance_no','insurance_date','insurance_amount'),array($vehicle_id,$insurance_number,$insurance_date,$insurance_amount),$con);
	if ($result == 'inserted') {
				echo "inserted";
	}else{
		echo "error";
	}