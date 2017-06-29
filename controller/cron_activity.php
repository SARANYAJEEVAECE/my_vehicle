<?php 
	include_once '../model/db.php';
	$con = db_connect();
	$i = 1;
	$date = date("Y-m-d");
	$condition = "1";
	$selected_row = select("*","`vehicle_details`",$condition,$con);
	if ($selected_row == "empty") {
		echo "NO data";
	}else{
		foreach ($selected_row as $value) {
			get_due_details($value , $date , $con);
			echo "<br>";
			get_fc_details($value , $date , $con);
			echo "<br>";
			get_insurance_details($value , $date , $con);
			echo "<br>";
			get_rc_details($value , $date , $con);
			echo "<br>";
			get_tax_details($value , $date , $con);
			echo "<br>";
		}
	}

	function get_due_details($raw_data , $date , $con){
		$phone_no = get_user_number($raw_data['user_id'] , $con);
		$remind_date = get_remaind_date("due_remaind", $raw_data['user_id'], $con);
		$modified_date = date("Y-m-d", strtotime(' + '.$remind_date.' days'));
		$condition = '`due_date` BETWEEN "'.$date.'" AND "'.$modified_date.'" AND `vehicle_id` = "'.$raw_data['id'].'"';
		$result = select("*","`due_details`",$condition,$con);
		if ($result != "empty") {
			$result[0]['vehicle_no'] = $raw_data['vehicle_number'];
			$result[0]['phone_no'] = $phone_no;
			print_r($result[0]);
			insert("`sms_db`" , array('vehicle_no', 'category', 'amount', 'phone_no' , 'date') , array($result[0]['vehicle_no'], "due_details", $result[0]['due_amount'], $result[0]['phone_no'], $result[0]['due_date']) , $con);
		}
	}

	function get_fc_details($raw_data , $date , $con){
		$phone_no = get_user_number($raw_data['user_id'] , $con);
		$remind_date = get_remaind_date("fc_remaind", $raw_data['user_id'], $con);
		$modified_date = date('Y-m-d', strtotime(' + '.$remind_date.' days'));
		$condition = '`fc_date` BETWEEN "'.$date.'" AND "'.$modified_date.'" AND `vehicle_id` = "'.$raw_data['id'].'"';
		$result = select("*","`fc_details`",$condition,$con);
		if ($result != "empty") {
			$result[0]['vehicle_no'] = $raw_data['vehicle_number'];
			$result[0]['phone_no'] = $phone_no;
			print_r($result[0]);
			insert("`sms_db`" , array('vehicle_no', 'category', 'amount', 'phone_no' , 'date') , array($result[0]['vehicle_no'], "fc_details", $result[0]['fc_amount'], $result[0]['phone_no'], $result[0]['fc_date']) , $con);
		}
	}

	function get_insurance_details($raw_data , $date , $con){
		$phone_no = get_user_number($raw_data['user_id'] , $con);
		$remind_date = get_remaind_date("insurance_remaind", $raw_data['user_id'], $con);
		$modified_date = date('Y-m-d', strtotime(' + '.$remind_date.' days'));
		$condition = '`insurance_date` BETWEEN "'.$date.'" AND "'.$modified_date.'" AND `vehicle_id` = "'.$raw_data['id'].'"';
		$result = select("*","`insurance_details`",$condition,$con);
		if ($result != "empty") {
			$result[0]['vehicle_no'] = $raw_data['vehicle_number'];
			$result[0]['phone_no'] = $phone_no;
			print_r($result[0]);
			insert("`sms_db`" , array('vehicle_no', 'category', 'amount', 'phone_no' , 'date') , array($result[0]['vehicle_no'], "insurance_details", $result[0]['insurance_amount'], $result[0]['phone_no'], $result[0]['insurance_date']) , $con);
		}
	}

	function get_rc_details($raw_data , $date , $con){
		$phone_no = get_user_number($raw_data['user_id'] , $con);
		$remind_date = get_remaind_date("rc_remaind", $raw_data['user_id'], $con);
		$modified_date = date('Y-m-d', strtotime(' + '.$remind_date.' days'));
		$condition = '`rc_date` BETWEEN "'.$date.'" AND "'.$modified_date.'" AND `vehicle_id` = "'.$raw_data['id'].'"';
		$result = select("*","`rc_details`",$condition,$con);
		if ($result != "empty") {
			$result[0]['vehicle_no'] = $raw_data['vehicle_number'];
			$result[0]['phone_no'] = $phone_no;
			print_r($result[0]);
			insert("`sms_db`" , array('vehicle_no', 'category', 'amount', 'phone_no' , 'date') , array($result[0]['vehicle_no'], "rc_details", $result[0]['rc_amount'], $result[0]['phone_no'], $result[0]['rc_date']) , $con);
		}
	}
	function get_tax_details($raw_data , $date , $con){
		$phone_no = get_user_number($raw_data['user_id'] , $con);
		$remind_date = get_remaind_date("tax_remaind", $raw_data['user_id'], $con);
		$modified_date = date('Y-m-d', strtotime(' + '.$remind_date.' days'));
		$condition = '`tax_date` BETWEEN "'.$date.'" AND "'.$modified_date.'" AND `vehicle_id` = "'.$raw_data['id'].'"';
		$result = select("*","`tax_details`",$condition,$con);
		if ($result != "empty") {
			$result[0]['vehicle_no'] = $raw_data['vehicle_number'];
			$result[0]['phone_no'] = $phone_no;
			print_r($result[0]);
			insert("`sms_db`" , array('vehicle_no', 'category', 'amount', 'phone_no' , 'date') , array($result[0]['vehicle_no'], "tax_details", $result[0]['tax_amount'], $result[0]['phone_no'], $result[0]['tax_date']) , $con);
		}
	}

	function get_user_number($id , $con){
		$condition = "`id` = '".$id."'";
		$user_phone = select("`phone_number`","`users`",$condition,$con);
		return $user_phone[0]['phone_number'];
	}
	function get_remaind_date($category, $id, $con){
		$condition = "`id` = '".$id."'";
		$details = select($category,"`users`",$condition,$con);
		return $details[0][$category];
	}

