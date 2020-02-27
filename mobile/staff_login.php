<?php
	require('db.php');
	session_start();
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$login = "SELECT * FROM staff WHERE username = '$username' AND password = '$password' AND role = '$role'";
		$qry = $conn->query($login) or trigger_error(mysqli_error($conn)." ".$login);
		$row = mysqli_fetch_assoc($qry);

		session_regenerate_id();
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['id'] = $row['id'];
		session_write_close();

		if(mysqli_num_rows($qry) == 1 && $_SESSION['role']  == 'Appraiser'){
				$data['role'] = $_SESSION['role'];
				$data['id'] = $_SESSION['id'];
				echo json_encode($data);
		}
		else if(mysqli_num_rows($qry) == 1 && $_SESSION['role'] == 'Examiner'){
			$data['role'] = $_SESSION['role'];
				$data['id'] = $_SESSION['id'];
				echo json_encode($data);
		}
		else if(mysqli_num_rows($qry) == 1 && $_SESSION['role'] == 'Tax Mapper'){
				$data['role'] = $_SESSION['role'];
				$data['id'] = $_SESSION['id'];
				echo json_encode($data);
		}
		else{
			echo json_encode("invalid");
		}
		
	}
	else if(isset($_POST['logout'])){
		$_SESSION = array();

		session_destroy();
		echo json_encode("logout");
	}
?>
