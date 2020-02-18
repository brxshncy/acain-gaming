<?php
require('db.php');

	if(isset($_POST['submit'])){
		$team = $_POST['team'];

		$qry = $conn->query("INSERT INTO team (team_name) VALUES ('$team')") or trigger_error(mysqli_error($conn)." ".$qry);

		if($qry){
			session_start();
			$_SESSION['team-added'] = "Team added";
			header("location:../manage_compositive.php");
		}
	}