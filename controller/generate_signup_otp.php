<?php
	include_once '../model/db.php';
	$phone_number=$_REQUEST['phonenumber'];
	$con=db_connect();
	$condition=" `phone_number` = '".$phone_number."'";
	$selected_row = select('phone_number', 'users',$condition, $con);
	if ($selected_row == "empty") {
		$string = '0123456789';
		$string_shuffled = str_shuffle($string);
		$otp_code = substr($string_shuffled, 1, 4);
		// send_message($phone_number,$otp_code)
		// echo $otp_code;?
		echo "test";
	}else{
		echo "error";
	}