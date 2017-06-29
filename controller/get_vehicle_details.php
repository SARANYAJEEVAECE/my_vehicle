<?php 	
	include_once '../model/db.php';
	$vehicle_id = $_REQUEST['id'];
	$con = db_connect();
	$condition = "`vehicle_id` = '".$vehicle_id."'";
	$selected_row = select("`due_date`, `due_amount`, `total_dues`, `due_paid`, `dues_remaining`, `bank_name`","`due_details`",$condition,$con);
	$selected_row1 = select("`fc_no`, `fc_date`, `fc_amount`","`fc_details`",$condition,$con);
	$selected_row2 = select("`insurance_no`, `insurance_date`, `insurance_amount`","`insurance_details`",$condition,$con);
	$selected_row3 = select("`rc_no`, `rc_date`, `rc_amount`","`rc_details`",$condition,$con);
	$selected_row4 = select(" `tax_no`, `tax_amount`, `tax_date`","`tax_details`",$condition,$con);
	if($selected_row != 'empty'){
		$data = "due";
		$due = $data.','.$selected_row[0]['due_date'].','.$selected_row[0]['due_amount'].','.$selected_row[0]['total_dues'].','.$selected_row[0]['due_paid'].','.$selected_row[0]['dues_remaining'].','.$selected_row[0]['bank_name'];
	}else{
		$due = "";
	}
	if($selected_row1 != 'empty'){
		$data = "fc";
		$fc = $data.','.$selected_row1[0]['fc_no'].','.$selected_row1[0]['fc_date'].','.$selected_row1[0]['fc_amount'];
	}else{
		$fc = "";
	}
	if($selected_row2 != 'empty'){
		$data = "insurance";
		$insurance =  $data.','.$selected_row2[0]['insurance_no'].','.$selected_row2[0]['insurance_date'].','.$selected_row2[0]['insurance_amount'];
	}else{
		$insurance = "";
	}
	if($selected_row3 != 'empty'){
		$data = "rc";
		$rc =  $data.','.$selected_row3[0]['rc_no'].','.$selected_row3[0]['rc_date'].','.$selected_row3[0]['rc_amount'];
	}else{
		$rc = "";
	}
	if($selected_row4 != 'empty'){
		$data = "tax";
		$tax =  $data.','.$selected_row4[0]['tax_no'].','.$selected_row4[0]['tax_amount'].','.$selected_row4[0]['tax_date'];
	}else{
		$tax = "";
	}	
	if(($due == "")&&($fc == "")&&($insurance == "")&&($rc == "")&&($tax == "")){
		echo "empty";
	}else{
		$data = $due.':'.$insurance.':'.$fc.':'.$rc.':'.$tax;
		echo $data;

	}
