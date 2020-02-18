<?php

require('db.php');
session_start();
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	

		$chck = "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
		$qry = $conn->query($chck) or trigger_error(mysqli_error($conn)." ".$chck);
		$row = mysqli_fetch_assoc($qry);
		if(mysqli_num_rows($qry) == 1){
			$_SESSION['username'] = $row['username'];
			$_SESSION['success'] = "You are now logged in!";
			$_SESSION['fullname'] =  $row['fname']." ".$row['lname'];
			header("location:../staff_dashboard.php");
		} 
		else{
			$_SESSION['err'] = "Invalid Username or Password combination";
			header("location:../staff_login.php");
		}

	}