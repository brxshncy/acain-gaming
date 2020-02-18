<?php
require('db.php');

if(isset($_POST['submit'])){
	$tax_rate = $_POST['tax_rate'] / 100;
	$penalty = $_POST['penalty'] / 100;


	$update = "UPDATE tax_percentage SET tax = '$tax_rate', penalty = '$penalty'";
	$qry = $conn->query($update) or trigger_error(mysqli_error($update)." ".$update);

	if($qry){
		session_start();
		$_SESSION['suc'] = "Tax and Penalty rate updated successfully";
		header("location:../tax.php");
	}
}