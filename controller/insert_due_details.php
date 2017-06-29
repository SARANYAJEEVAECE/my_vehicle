<?php 
	include_once '../model/db.php';
	$due_date = $_REQUEST['due_date'];
	$due_amount = $_REQUEST['due_amount'];
	$total_dues = $_REQUEST['total_dues'];
	$bank_name = $_REQUEST['bank_name'];
	$dues_paid = $_REQUEST['dues_paid'];
	$dues_remaining = $_REQUEST['total_dues']-$_REQUEST['dues_paid'];
	$vehicle_id = $_REQUEST['vehicle_id'];
	// print_r($rc_date);
	$con = db_connect();
	$result = insert('`due_details`',array('vehicle_id', 'due_date', 'due_amount', 'total_dues', 'due_paid','dues_remaining', 'bank_name'),array($vehicle_id, $due_date, $due_amount, $total_dues, $dues_paid , $dues_remaining, $bank_name),$con);
	if ($result == 'inserted') {
				echo "inserted";
	}else{
		echo "error";
	}