<?php

require('db.php');

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	if($role == 'assessor_admin'){
		$admin = "SELECT * FROM assessor_admin WHERE username = '$username' AND password = '$password'";
		$qry = $conn->query($admin) or trigger_error(mysqli_error($conn)." ".$admin);

		if(mysqli_num_rows($qry) == 1){
			header("location:../dashboard.php");
		}
		else{
			session_start();
			$_SESSION['err'] = "Wrong Username or Password";
			header("location:../index.php");
		}
	}
	if($role == 'office_appraiser'){
		$office_appraiser = "SELECT * FROM office_appraiser WHERE username = '$username' AND password = '$password'";
		$qry_1 = $conn->query($office_appraiser) or trigger_error(mysqli_error($conn)." ".$office_appraiser);
		$a = mysqli_fetch_assoc($qry_1);
		if(mysqli_num_rows($qry_1) == 1){
			session_start();
			$_SESSION['id'] = $a['id'];
			header("location:../staff_dashboard.php");
		}
		else{
			session_start();
			$_SESSION['err'] = "Wrong Username or Password";
			header("location:../index.php");
		}
	}
	if($role == 'treasurer'){
		$treasurer = "SELECT * FROM treasurer WHERE username = '$username' AND password = '$password'";
		$qry_2 = $conn->query($treasurer) or trigger_error(mysqli_error($conn)." ".$treasurer);

		if(mysqli_num_rows($qry_2) > 0){
			header("location:../treasurer_dashboard.php");
		}
		else{
			session_start();
			$_SESSION['err'] = "Wrong Username or Password";
			header("location:../index.php");
		}
	}
}
	/*$chck_post = "SELECT * FROM assessor_admin WHERE username = '$username' AND password = '$password'";
	$qry = $conn->query($chck_post) or trigger_error(mysqli_error($conn)." ".$chck_post);

	if(mysqli_num_rows($qry) > 0){
		header("location:../dashboard.php");
	}
	else{
		$_SESSION['err'] = "Wrong Username or Password";
		header("location:../admin_login.php");
	}
}

if(isset($_POST['appraiser'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$chck_post = "SELECT * FROM office_appraiser WHERE username = '$username' AND password = '$password'";
	$qry = $conn->query($chck_post) or trigger_error(mysqli_error($conn)." ".$chck_post);

	if(mysqli_num_rows($qry) > 0){
		header("location:../staff_dashboard.php");
	}
	else{
		$_SESSION['err'] = "Wrong Username or Password";
		header("location:../office_appraiser_login.php");
	}*/
