<?php
require('../controller/db.php');

if(isset($_POST['prop_id'])){
	$id = $_POST['prop_id'];
	$props = "SELECT *, CONCAT(o.fname,' ',o.mname,' ',o.lname) as name FROM property p LEFT JOIN owner o ON o.id = p.owner_id WHERE p.id ='$id'";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
	$a = mysqli_fetch_assoc($qry);
	$data['north'] = $a['north'];
	$data['south'] = $a['south'];
	$data['east'] = $a['east'];
	$data['west'] = $a['west'];
	$data['prop_measurement'] = $a['prop_measurement'];
	$data['name'] = ucwords($a['name']);
	$data['address'] = ucwords($a['property_brgy']." ".$a['street']." ".$a['city']);
	$data['kind_prop'] = $a['kind_prop'];
	$data['actual_use'] = $a['actual_use'];
	$data['prop_value'] = "₱ ".number_format($a['prop_value'],-1);


	echo json_encode($data);
}