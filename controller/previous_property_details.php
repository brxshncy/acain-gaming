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
	$status = $_POST['status'];
	$gender = $_POST['gender'];
	$date_transfer = $_POST['date_transfer'];

	$insert = "INSERT INTO owner
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
	VALUES
	(
		'$p_fname',
		'$p_lname',
		'$p_mname',
		'$p_address',
		'$p_bday',
		'$status',
		'$gender',
		'$p_contact'
	)
	";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);

	$last_id = $conn->insert_id;

	echo $last_id;

	if($qry){
		$hist = "INSERT INTO history_owner_property (property_id,owner_id,date_transfer) VALUES ('$property_id','$last_id','$date_transfer')";
		$qry_1 = $conn->query($hist) or trigger_error(mysqli_error($conn)." ".$hist);
		if($qry_1){
			session_start();
			$_SESSION['suc'] = "Recorded successfully!";
			header("location:../import_previous.php");
		}
	}	
	else{
		echo "fail";
	}
}