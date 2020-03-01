<?php
require('../controller/db.php');

if(isset($_POST['prop_id'])){
	$id = $_POST['prop_id'];

	$props = "SELECT CONCAT(o.fname,' ',o.lname) as name, CONCAT(p.street,', ',p.property_brgy,', ',p.city) as address, pb.north as north, pb.east as east, pb.south as south, p.west as west,p.property_id as prop_id  FROM property p LEFT JOIN owner o on o.id = p.owner_id LEFT JOIN property_boundaries pb on pb.prop_id = p.id WHERE p.id = '$id'";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
	$a = mysqli_fetch_assoc($qry);

	$data['name'] = ucwords($a['name']);
	$data['address'] = ucwords($a['address']);
	$data['prop_id'] = $a['prop_id'];
	$data['north'] = $a['north'];
	$data['east'] = $a['east'];
	$data['south'] = $a['south'];
	$data['west'] = $a['west'];

	echo json_encode($data);
}