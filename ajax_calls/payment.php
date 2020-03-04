<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$u = "UPDATE property SET payment_status = 1 WHERE id = '$id'";
	$qry = $conn->query($u) or trigger_error(mysqli_error($conn)." ".$u);
}