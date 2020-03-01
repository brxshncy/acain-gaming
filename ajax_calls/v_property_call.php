<?php
	
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$props = "SELECT *, t.team_name as team, p.prev_text_payment AS  prev_tax,CONCAT(o.fname,' ',o.mname,' ',o.lname) as owner_name, o.address as owner_address, o.birthday as owner_bday, o.contact as owner_contact FROM property p LEFT JOIN team t ON t.id = p.team_id LEFT JOIN owner o ON p.owner_id = o.id WHERE p.id = '$id'";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
	$d = mysqli_fetch_assoc($qry);

	$data['date_inquire'] = date("F j, Y",strtotime($d['date_inquire']));
	$data['name'] = ucwords($d['owner_name']);
	$data['owner_address'] = ucwords($d['owner_address']);
	$date = date("Y");
	$bday = date("Y",strtotime($d['owner_bday']));
	$age = $date - $bday;
	$data['age'] = $age;
	$data['owner_contact'] = $d['owner_contact'];
	$data['property_id'] = $d['property_id'];
	$data['property_brgy'] = ucwords($d['property_brgy']);
	$data['street'] = ucwords($d['street']);
	$data['city'] = ucwords($d['city']);
	$data['kind_prop'] = $d['kind_prop'];
	$data['actual_use'] = $d['actual_use'];
	$data['north'] = $d['north'];
	$data['east'] = $d['east'];
	$data['west'] = $d['west'];
	$data['south'] = $d['south'];
	$data['prop_measurement'] = $d['prop_measurement']." sqm";
	$data['prop_value'] = $d['prop_value'];
	$data['team'] = $d['team'];
	$data['prev_tax'] = date("F j, Y",strtotime($d['prev_tax']));


	echo json_encode($data);
}