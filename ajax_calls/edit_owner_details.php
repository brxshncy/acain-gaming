<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$qry = "SELECT * FROM owner WHERE id ='$id'";
	$run = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".$qry);
	$a = mysqli_fetch_assoc($run);

	$data['id'] = $a['id'];
	$data['fname'] = $a['fname'];
	$data['lname'] = $a['lname'];
	$data['mname'] = $a['mname'];
	$data['address'] = $a['address'];
	$birthYear = date("Y",strtotime($a['birthday']));
	$currYear = date("Y");
	$age = $currYear - $birthYear;
	$data['age'] = $age;
	$data['status'] = $a['status'];
	$data['gender'] = $a['gender'];
	$data['contact'] = $a['contact'];
	echo json_encode($data);
}