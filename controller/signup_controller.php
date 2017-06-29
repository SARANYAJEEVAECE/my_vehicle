<?php
	include_once '../model/db.php';
	$name = $_REQUEST['name'];
	$phonenumber = $_REQUEST['phonenumber'];
	$city = $_REQUEST['city'];
	$con=db_connect();
	$result = insert('users',array('name', 'city', 'phone_number', 'max_count', 'due_remaind', 'fc_remaind', 'rc_remaind', 'tax_remaind', 'insurance_remaind'),array($name,$city,$phonenumber,"5","7","30","30","15","30"),$con);
	if($result == "error"){
		echo "error";
	}else{
		echo "inserted";
	}

