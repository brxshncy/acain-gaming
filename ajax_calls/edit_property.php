<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$props = "SELECT *, p.id as p_id, t.team_name as team_name FROM property p LEFT JOIN team t ON t.id = p.team_id WHERE p.id ='$id'";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
	$a = mysqli_fetch_assoc($qry);

	$data['id'] = $a['p_id'];
	$data['property_id'] = $a['property_id'];
	$data['property_brgy'] = $a['property_brgy'];
	$data['street'] = ucwords($a['street']);
	$data['kind_prop'] = $a['kind_prop'];
	$data['actual_use'] = $a['actual_use'];
	$data['north'] = $a['north'];
	$data['east'] = $a['east'];
	$data['west'] = $a['west'];
	$data['south'] = $a['south'];
	$data['prop_measurement'] = $a['prop_measurement'];
	$data['prop_value'] = $a['prop_value'];
	$data['prev_text_payment'] = $a['prev_text_payment'];
	$data['payment_status'] = $a['payment_status'];
	$data['status'] = $a['status'];
	$data['team_name'] = $a['team_name'];

	echo json_encode($data);
}