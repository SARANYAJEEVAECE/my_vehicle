<?php 
	include_once '../model/db.php';
	$tax_number = $_REQUEST['tax_number'];
	$tax_amount = $_REQUEST['tax_amount'];
	$tax_date = $_REQUEST['tax_date'];
	$vehicle_id = $_REQUEST['vehicle_id'];
	// print_r($rc_date);
	$con = db_connect();
	$result = insert('`tax_details`',array('vehicle_id','tax_no','tax_date','tax_amount'),array($vehicle_id,$tax_number,$tax_date,$tax_amount),$con);
	if ($result == 'inserted') {
				echo "inserted";
	}else{
		echo "error";
	}