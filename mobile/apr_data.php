<?php
require('db.php');

if(isset($_POST['showdata'])){
	$id = $_POST['id'];
	$team = "SELECT p.property_id as prop_id, p.property_brgy as property_brgy, p.street as street, p.city as city, p.kind_prop as kind_prop, p.actual_use as actual_use, p.north as north, p.south as south, p.west as west, p.east as east, p.prop_measurement as measurement, p.prop_value as value,t.id as team_id,p.id as p_id, s.id as s_id FROM team t LEFT JOIN staff s ON t.id = s.team_id LEFT JOIN property p ON p.team_id = t.id WHERE p.apr_status = 0 AND s.id = '$id'";
	$qry = $conn->query($team) or trigger_error(mysqli_error($conn)." ".$team);
	$data = array();
	while($a = mysqli_fetch_assoc($qry)){
		 $prop_id = $a['prop_id'];
		 $property_brgy = $a['property_brgy'];
		 $street = $a['street'];
		 $city = $a['city'];
		 $kind_prop = $a['kind_prop'];
		 $actual_use = $a['actual_use'];
		 $north = $a['north'];
		 $south = $a['south'];
		 $west = $a['west'];
		 $east = $a['east'];
		 $measurement = $a['measurement'];
		 $team_id = $a['team_id'];
		 $value = "&#8369; ".number_format($a['value'],-1);
		 $p_id = $a['p_id'];
		 $s_id = $a['s_id'];
		 

		$data[] = array(
			"prop_id" => $prop_id,
			"property_brgy" => $property_brgy,
			"street" => $street,
			"city" => $city,
			"kind_prop" => $kind_prop,
			"actual_use" => $actual_use,
			"north" => $north,
			"south" => $south,
			"west" => $west,
			"east" => $east,
			"measurement" => $measurement,
			"value" => $value,
			'team_id' => $team_id,
			'p_id' => $p_id,
			's_id' => $s_id,

		);

	}
	echo json_encode($data);

}
