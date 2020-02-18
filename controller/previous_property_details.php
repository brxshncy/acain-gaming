<?php
require('db.php');

if(isset($_POST['submit'])){
	$property_id = $_POST['property_id'];
	$p_fname = $_POST['p_fname'];
	$p_lname = $_POST['p_lname'];
	$p_mname = $_POST['p_mname'];
	$p_address = $_POST['p_address'];
	$p_contact = $_POST['p_contact'];
	$p_bday = $_POST['p_bday'];
	$p_kind_property = $_POST['p_kind_property'];
	$p_actual_use = $_POST['p_actual_use'];
	$p_north = $_POST['p_north'];
	$p_east = $_POST['p_east'];
	$p_west = $_POST['p_west'];
	$p_south = $_POST['p_south'];
	$p_measurement = $_POST['p_measurement'];
	$p_value = $_POST['p_value'];
	$date_transfer = $_POST['date_transfer'];

	$insert = "INSERT INTO history_owner_property
	(
		property_id,
		p_fname,
		p_lname,
		p_mname,
		p_address,
		p_contact,
		p_bday,
		p_kind_property,
		p_actual_use,
		p_north,
		p_east,
		p_west,
		p_south,
		p_measurement,
		p_value,
		date_transfer
	)
	VALUES
	(
		'$property_id',
		'$p_fname',
		'$p_lname',
		'$p_mname',
		'$p_address',
		'$p_contact',
		'$p_bday',
		'$p_kind_property',
		'$p_actual_use',
		'$p_north',
		'$p_east',
		'$p_west',
		'$p_south',
		'$p_measurement',
		'$p_value',
		'$date_transfer'
	)
	";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);

	if($qry){
		session_start();
		$_SESSION['suc'] = "Previous Owner Data imported successfully";
		header("location:../import_previous.php");
		exit();
	}	
	else{
		echo "fail";
	}
}