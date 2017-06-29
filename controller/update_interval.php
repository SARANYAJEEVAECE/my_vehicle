<?php
include_once '../model/db.php';
$due_interval = $_REQUEST['due_interval'];
$rc_interval = $_REQUEST['rc_interval'];
$fc_interval = $_REQUEST['fc_interval'];
$tax_interval = $_REQUEST['tax_interval'];
$insurance_interval = $_REQUEST['insurance_interval'];
$id = $_REQUEST['user_id'];
$con = db_connect();
$column_names = array(
	'due_remaind' => $due_interval,
	'fc_remaind' => $fc_interval,
	'rc_remaind' => $rc_interval,
	'tax_remaind' => $tax_interval,
	'insurance_remaind' => $insurance_interval
	);
$condition = "`id` = '".$id."'"; 
$result = update($column_names,"users", $condition, $con);
if ($result == 1) {
	echo "success";
}else{
	echo "error";
}