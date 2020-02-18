<?php
require('db.php');


if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$team = $_POST['team'];

		echo $role."<br>".$team;
		$insert = "INSERT INTO 
		staff 
		(
			fname,
			lname,
			address,
			bday,
			username,
			password,
			contact,
			role,
			team_id
		) 
		VALUES 
		(
			'$fname',
			'$lname',
			'$address',
			'$bday',
			'$username',
			'$password',
			'$contact',
			'$role',
			'$team'
		)";
		
		$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);

		if($qry){
			session_start();
			$_SESSION['reg'] = "Staff Registered successfully!";
			header("location:../manage_compositive.php");
		}
		else{
			echo "error backend";
		}
}




