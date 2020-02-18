<?php
require('db.php');

if(isset($_POST['submit'])){
	$e_h_id = $_POST['h_id'];
	$p_id = $_POST['p_id'];
	$e_date_inquired = $_POST['e_date_inquired'];
	$e_owner_fname = $_POST['e_owner_fname'];
	$e_owner_lname = $_POST['e_owner_lname'];
	$e_owner_mname = $_POST['e_owner_mname'];
	$e_address = $_POST['e_address'];
	$e_contact = $_POST['e_contact'];
	$e_age = $_POST['e_age'];
	$e_kind_prop = $_POST['e_kind_prop'];
	$e_actual_use = $_POST['e_actual_use'];
	$e_prop_measurement = $_POST['e_prop_measurement'];
	$e_prop_value = $_POST['e_prop_value'];
	$e_north = $_POST['e_north'];
	$e_east = $_POST['e_east'];
	$e_west = $_POST['e_west'];
	$e_south = $_POST['e_south'];

	$update = "UPDATE history_owner_property
	SET
		property_id = '$p_id',
		p_fname = '$e_owner_fname',
		p_lname = '$e_owner_lname',
		p_mname = '$e_owner_mname',
		p_address = '$e_address',
		p_contact  = '$e_contact',
		p_bday = '$e_age',
		p_kind_property = '$e_h_id',
		p_actual_use = '$e_h_id',
		p_north = '$e_h_id',
		p_east = '$e_h_id',
		p_west = '$e_h_id',
		p_south = '$e_h_id',
		p_measurement = '$e_h_id',
		p_value = '$e_h_id',
		date_transfer = '$e_h_id'
	WHERE 
		id = '$e_h_id'
	";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
	if($qry){
		session_start();
		$_SESSION['suc'] = "Details updated successfuly";
		header("location:../history_property.php")
	}
	else{
		echo "fail";
	}
}