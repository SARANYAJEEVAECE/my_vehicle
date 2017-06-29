<?php 
	include_once '../model/db.php';
	$con = db_connect();
	$date = date("Y-m-d");
	$condition = "1";
	$selected_row = select("*","`sms_db`",$condition,$con);
	if ($selected_row  != 'empty') {
		echo "<pre>";
		foreach ($selected_row as $value) {
			if ($date >= $value['date'] || $value['paid_status'] == 1 ) {
				print_r($value);
				$vehicle_id = get_vehicle_id($value['vehicle_no'] , $con);
				process_vehicle_details($vehicle_id , $value['category'] , $value['id'] , $value['date'] , $con);
			}
		}
	}
	function get_curl(){
		$serv = "10.0.50.23/test.php?name=arun";
		$curl = curl_init($serv);
		$curl_response = curl_exec($curl);
	}

	function get_vehicle_id($vehicle_no , $conn){
		$condition = "`vehicle_number` = '".$vehicle_no."'";
		$selected_row = select("`id`","`vehicle_details`",$condition,$conn);
		return  $selected_row[0]['id'];
	}

	function process_vehicle_details($vehicle_id , $table_name , $row_id, $current_date , $conn){
		if ($table_name == 'due_details') {
			$updated_date =  date('Y-m-d', strtotime(' +1 month'));
			$column_names = "`due_date`='".$updated_date."',`due_paid` = `due_paid` + 1 ,`dues_remaining`= `dues_remaining` - 1";
			$condition = "`vehicle_id` = '".$vehicle_id."'"; 
			update($column_names, $table_name, $condition, $conn);
			delete_db("sms_db", "`id` = '".$row_id."'" , $conn);
		}
		if ($table_name == 'fc_details') {
			$updated_date =  date('Y-m-d', strtotime(' +12 month'));
			$column_names = "`fc_date`='".$updated_date."'";
			$condition = "`vehicle_id` = '".$vehicle_id."'"; 
			update($column_names, $table_name, $condition, $conn);
			delete_db("sms_db", "`id` = '".$row_id."'" , $conn);
		}
		if ($table_name == 'insurance_details') {
			$updated_date =  date('Y-m-d', strtotime(' +12 month'));
			$column_names = "`insurance_date`='".$updated_date."'";
			$condition = "`vehicle_id` = '".$vehicle_id."'"; 
			update($column_names, $table_name, $condition, $conn);
			delete_db("sms_db", "`id` = '".$row_id."'" , $conn);
		}
		if ($table_name == 'rc_details') {
			$updated_date =  date('Y-m-d', strtotime(' +12 month'));
			$column_names = "`rc_date`='".$updated_date."'";
			$condition = "`vehicle_id` = '".$vehicle_id."'"; 
			update($column_names, $table_name, $condition, $conn);
			delete_db("sms_db", "`id` = '".$row_id."'" , $conn);
		}
		if ($table_name == 'tax_details') {
			$updated_date =  date('Y-m-d', strtotime(' +3 month'));
			$column_names = "`tax_date`='".$updated_date."'";
			$condition = "`vehicle_id` = '".$vehicle_id."'"; 
			update($column_names, $table_name, $condition, $conn);
			delete_db("sms_db", "`id` = '".$row_id."'" , $conn);
		}	
	}