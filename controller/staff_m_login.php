<?php

require('db.php');
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$check = "SELECT * FROM surveyor WHERE username = '$username' AND password = '$password' ";
		$qry = $conn->query($check) or trigger_error(mysqli_error($conn)." ".$check);

		$a = mysqli_fetch_assoc($qry);

		$html = " ";

		if(mysqli_num_rows($qry) > 0){

			$html = $a['id'];

		}

		else{

			$html = "Invalid user name and password combination";
		}

		echo $html;
	}