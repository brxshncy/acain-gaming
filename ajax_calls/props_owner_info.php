<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$owners = "SELECT * FROM owner WHERE id ='$id'";
	$qry = $conn->query($owners) or trigger_error(mysqli_error($conn)." ".$owners);
	$a = mysqli_fetch_assoc($qry);

	$data['name'] = ucwords($a['fname']." ".$a['mname']." ".$a['lname']);
	$data['address'] = $a['address'];
	$currYear = date("Y");
	$birthYear = date("Y",strtotime($a['birthday']));
	$age = $currYear - $birthYear;
	$data['age'] = $age;
	$data['status'] = $a['status'];
	$data['gender'] = $a['gender'];
	$data['contact'] = $a['contact'];

	echo json_encode($data);
}