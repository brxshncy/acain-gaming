<?php
require('db.php');

if(isset($_POST['update'])){
	$id = $_POST['e_id'];
	$e_fname = $_POST['e_fname'];
	$e_lname = $_POST['e_lname'];
	$e_mname = $_POST['e_mname'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	$contact = $_POST['contact'];

	$update = "UPDATE owner SET
		fname = '$e_fname',
		lname = '$e_lname',
		mname = '$e_mname',
		address = '$address',
		gender = '$gender',
		status = '$status',
		contact = '$contact'
		WHERE
		id = '$id'
	";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

	if($qry){
		session_start();
		$_SESSION['update'] = "Updated successfully";
		header("location:../manage_owners.php");
	}
	else{
		echo "error";
	}

}