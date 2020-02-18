<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];



	$hist = "SELECT *, h.property_id as p_id, h.id as h_id FROM history_owner_property h LEFT JOIN property p ON p.id = h.property_id WHERE h.id = '$id'";
	$qry = $conn->query($hist) or trigger_error(mysqli_error($conn)." ".$hist);
	$a = mysqli_fetch_assoc($qry);

	 $data['f_name'] = ucwords($a['p_fname']);
	 $data['l_name'] = ucwords($a['p_lname']);
	 $data['m_name'] = ucwords($a['p_mname']);
	 $data['p_id'] = $a['p_id'];
	 $data['h_id'] = $a['h_id'];
	 $data['owner_address'] = ucwords($a['p_address']);
	 $currYear = date("Y");
	 $bithYear = date("Y",strtotime($a['p_bday']));
	 $age = $a['p_bday'];
	 $data['age'] = $age;
	 $data['p_contact'] = $a['p_contact'];
	 $data['p_kind_property'] = $a['p_kind_property'];
	 $data['p_actual_use'] = $a['p_actual_use'];
	 $data['p_north'] = $a['p_north'];;
	 $data['p_east'] = $a['p_east'];
	 $data['p_west'] = $a['p_west'];
	 $data['p_south'] = $a['p_south'];
	 $data['p_measurement'] = $a['p_measurement'];
	 $data['p_value'] = $a['p_value'];
	 $date_transfer = $a['date_transfer'];
	 $data['date_transfer'] = $date_transfer;

	 echo json_encode($data);
}
