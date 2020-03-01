<?php
require('db.php');
if(isset($_POST['tm_id'])){
	$id = $_POST['tm_id'];
	$props_tm = "SELECT * FROM property p WHERE id ='$id'";
	$qry = $conn->query($props_tm) or trigger_error(mysqli_error($conn)." ".$props_tm);
	$a = mysqli_fetch_assoc($qry);

	echo json_encode("BULLSHIT GAWAS NA BA!!!!");
}
else{
	echo json_enocde("no data recieve");
}