<?php 

require('db.php');

	if(isset($_POST['submit'])){

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$contact = $_POST['contact'];

		$insrt = "INSERT into compositive
			(
				fname,
				lname,
				mname,
				address,
				bday,
				username,
				password,
				contact
			)
		VALUES
			(
				'$fname',
				'$lname',
				'$mname',
				'$address',
				'$bday',
				'$username',
				'$password',
				'$contact'
			)
		";
		$qry = $conn->query($insrt) or trigger_error(mysqli_error($conn)." ".$insrt);

		if($qry){
			session_start();
			$_SESSION['reg'] = "Compositive Registered successfully!";
			header("location:../add_staff.php");
		}
		else{
			echo "error backend";
		}
	}

