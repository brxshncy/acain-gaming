<?php

require('db.php');

	if(isset($_POST['submit'])){

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
		$status = $_POST['status'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$insrt = "
		INSERT INTO owner
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
			'$fname',
			'$lname',
			'$mname',
			'$address',
			'$bday',
			'$status',
			'$gender',
			'$contact'
		)
		";
		$qry = $conn->query($insrt) or trigger_error(mysqli_error($conn)." ".$insrt);

		if($qry){
			session_start();
			$_SESSION['suc'] = "Owner details saved";
			header("location:../manage_owners.php");
		}
		else{
			echo "error";
		}
	
}


