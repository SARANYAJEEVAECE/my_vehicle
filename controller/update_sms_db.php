<?php
include_once '../model/db.php';
$id = $_REQUEST['id'];
$con = db_connect();
$column_names = "`paid_status` = 1 ";
$condition = "`id` = '".$id."'"; 
$result = update($column_names,"sms_db", $condition, $con);
if ($result == 1) {
	echo "success";
}else{
	echo "error";
}