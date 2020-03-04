<?php
require('../controller/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$history = "SELECT * FROM owner o left join history_owner_property h on h.owner_id = o.id where h.id = '$id'";
	$qry = $conn->query($history) or trigger_error(mysqli_error($conn)." ".$history);
	$a = mysqli_fetch_assoc($qry); 

	$data['name'] = ucwords($a['fname']." ".$a['mname']." ".$a['lname']);
	$data['address'] = ucwords($a['address']);
	$data['age'] = date("Y") - date("Y",strtotime($a['birthday']));
	$data['status'] = $a['status'];
	$data['gender'] = $a['gender'];
	$data['contact'] = $a['contact'];
	$data['date_transfer'] = date("F j, Y",strtotime($a['date_transfer']));

	echo json_encode($data);
 } 
 ?>