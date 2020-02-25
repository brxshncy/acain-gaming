<?php
require('db.php');

if(isset($_POST['update'])){
	$id = $_POST['property_id'];
	$prop_id = $_POST['prop_id'];
	$brgy = $_POST['brgy'];
	$e_street = $_POST['e_street'];
	$kind_prop = $_POST['kind_prop'];
	$actual_use = $_POST['actual_use'];
	$north = $_POST['north'];
	$east = $_POST['east'];
	$west = $_POST['west'];
	$south = $_POST['south'];
	$prop_measurement = $_POST['prop_measurement'];
	$e_tax_payment = $_POST['e_tax_payment'];
	$e_date_prev_payment = $_POST['e_date_prev_payment'];
	$prop_value = $_POST['prop_value'];
	$e_surevyor = $_POST['e_surevyor'];

	$update = "UPDATE property
	SET
	property_id = '$prop_id',
	property_brgy = '$brgy',
	street = '$e_street',
	city = 'Iligan City',
	kind_prop = '$kind_prop',
	actual_use = '$actual_use',
	north = '$north',
	east = '$east',
	west = '$west',
	south = '$south',
	prop_measurement = '$prop_measurement',
	prop_value = '$prop_value',
	prev_text_payment = '$e_date_prev_payment',
	payment_status = '$e_tax_payment',
	team_id = '$e_surevyor'
	WHERE id = '$id'
	";

	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

	if($qry){
		session_start();
		$_SESSION['suc'] = "Property details updated successfully";
		header("location:../manage_properties.php");
		exit();
	}
	else{
		echo "fail";
	}

}