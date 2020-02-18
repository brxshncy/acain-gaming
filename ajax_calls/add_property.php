<?php

require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$user_id  = "SELECT * FROM owner WHERE id ='$id'";
	$qry = $conn->query($user_id) or trigger_error(mysqli_error($conn)." ".$user_id);
	$a = mysqli_fetch_assoc($qry);

	$data['id'] = $a['id'];
	$data['name']= ucwords($a['fname']." ".$a['lname']);

	echo json_encode($data);
}
?>