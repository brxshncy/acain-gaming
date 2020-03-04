<?php
require('db.php');

if(isset($_POST['transfer'])){
	$fname = $_POST['fname'];
	$p_id = $_POST['p_id'];
	$o_id = $_POST['o_id'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$address = $_POST['address'];
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	$transfer_type = $_POST['transfer_type'];

	$owner = "INSERT INTO owner 
	(
		fname,
		lname,
		mname,
		address,
		birthday,
		status,
		gender,
		contact
	) 
	VALUES (
		'$fname',
		'$lname',
		'$mname',
		'$address',
		'$bday',
		'$status',
		'$gender',
		'$contact'
	)";
	$qry = $conn->query($owner) or trigger_error(mysqli_error($conn)." ".$owner);
	$owner_id = $conn->insert_id;
	if($qry){
		
		$history = "INSERT INTO history_owner_property
		(
			property_id,
			owner_id,
			date_transfer,
			kind_transfer
		)
		VALUES
		(
			'$p_id',
			'$o_id',
			CURRENT_DATE(),
			'$transfer_type'
		)
		";
		$qry_1 = $conn->query($history) or trigger_error(mysqli_error($conn)." ".$history);
		if($qry_1){
			$update = "UPDATE property SET owner_id = '$owner_id' WHERE id = '$p_id'";
			$qry_2 = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
			if($qry_2){
				session_start();
				$_SESSION['daaa'] = "Property Transfered successfully!";
				header("location:../surveyed_properties.php");
			}
		}
	}
}