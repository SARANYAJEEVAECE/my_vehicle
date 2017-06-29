<?php
	include_once '../model/db.php';
	$phonenumber = $_REQUEST['phonenumber'];
	$con=db_connect();
	$condition = "`phone_number` = '".$phonenumber."'";
	$condition1 = "`phone_no` = '".$phonenumber."' && `paid_status` = 0";
	$selected_row = select("`id`,`name`,`city`,`phone_number`,`due_remaind`,`fc_remaind`,`rc_remaind`,`tax_remaind`,`insurance_remaind`","`users`",$condition,$con);
	$notification = select("`vehicle_no`","`sms_db`",$condition1,$con);
	if($notification != 'empty'){
	$count_notification = count($notification);
	}else{
		$count_notification = 0; 
	}
	echo $selected_row[0]['id'].','.$selected_row[0]['name'].','.$selected_row[0]['city'].','.$selected_row[0]['phone_number'].','.$selected_row[0]['due_remaind'].','.$selected_row[0]['fc_remaind'].','.$selected_row[0]['rc_remaind'].','.$selected_row[0]['tax_remaind'].','.$selected_row[0]['insurance_remaind'].','.$count_notification;

