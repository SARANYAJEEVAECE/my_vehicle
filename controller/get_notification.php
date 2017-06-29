<?php
	include_once '../model/db.php';
	$phonenumber = $_REQUEST['phonenumber'];
	$con=db_connect();
	$condition = "`phone_no` = '".$phonenumber."' && `paid_status` = 0";
	$selected_row = select("`id`, `vehicle_no`, `category`, `amount`, `date`","`sms_db`",$condition,$con);
	$i = 1;
	if($selected_row == 'empty'){
		echo "error";
	}else{
	foreach ($selected_row as  $value) {
		if ($i == 1) {
			$category = explode('_',$value['category']);
			$values = $value['id'].",".$value['vehicle_no'].",".$category[0].",".$value['amount'].",".$value['date'];
			$i++;
		}else{
			$category = explode('_',$value['category']);
			$values = $values.":".$value['id'].",".$value['vehicle_no'].",".$category[0].",".$value['amount'].",".$value['date'];
		}
	}
	echo $values;
	}