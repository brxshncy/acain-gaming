<?php
require('db.php');

if(isset($_POST['showdata'])){
	$id = $_POST['id'];
	$team = "SELECT p.property_id as prop_id, p.property_brgy as property_brgy, p.property_address as p_address, p.kind_prop as kind_prop, p.actual_use as actual_use, p.north as north, p.south as south, p.west as west, p.east as east, p.prop_measurement as measurement, p.prop_value as value FROM team t LEFT JOIN staff s ON t.id = s.team_id LEFT JOIN property p ON p.team_id = t.id WHERE p.status = 0 AND s.id = '$id'";
	$qry = $conn->query($team) or trigger_error(mysqli_error($conn)." ".$team);
	$data = array();
	while($a = mysqli_fetch_assoc($qry)){
		 $prop_id = $a['prop_id'];
		 $property_brgy = $a['property_brgy'];
		 $p_address = $a['p_address'];
		 $kind_prop = $a['kind_prop'];
		 $actual_use = $a['actual_use'];
		 $north = $a['north'];
		 $south = $a['south'];
		 $west = $a['west'];
		 $east = $a['east'];
		 $measurement = $a['measurement'];
		 $value = "&#8369; ".number_format($a['value'],-1);
		 

		$data[] = array(
			"prop_id" => $prop_id,
			"property_brgy" => $property_brgy,
			"p_address" => $p_address,
			"kind_prop" => $kind_prop,
			"actual_use" => $actual_use,
			"north" => $north,
			"south" => $south,
			"west" => $west,
			"east" => $east,
			"measurement" => $measurement,
			"value" => $value,

		);

	}
	echo json_encode($data);

}