<?php 
	include_once '../model/db.php';
	$vehicle_number = $_REQUEST['vehicle_number'];
	$user_id = $_REQUEST['user_id'];
	$con = db_connect();
	get_user_vehicle_count($vehicle_number, $user_id , $con);


	function get_user_vehicle_count($vehicle_number, $user_id , $con){
		$condition = "`id`='".$user_id."'";
		$vehicle_count = select('`vehicle_count`, `max_count`','users',$condition,$con);
		if($vehicle_count[0]['vehicle_count'] <= $vehicle_count[0]['max_count']){
			$updated_count = array('vehicle_count' => $vehicle_count[0]['vehicle_count']+1 );
			insert_vehicle_detail($updated_count,  $vehicle_number,$user_id , $con);
		}elseif ($vehicle_count[0]['vehicle_count'] > $vehicle_count[0]['max_count']) {
			echo "limit_reached";
		}
	}

	function insert_vehicle_detail($updated_count, $vehicle_number,$user_id , $con){
		$result = insert('`vehicle_details`',array('user_id','vehicle_number'),array($user_id , $vehicle_number),$con);
		if ($result == 'inserted'){
			$condition = "`id`='".$user_id."'";
			update($updated_count, 'users', $condition, $con);
			$condition = "`vehicle_number` = '".$vehicle_number."'";
			$selected_row = select('`id`','`vehicle_details`',$condition,$con);
			if ($selected_row != 'empty') {
				echo $selected_row[0]['id'];
			}else{
				echo "error";
			}
		}else{
			echo "error";
		}
	}