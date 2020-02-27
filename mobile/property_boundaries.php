<?php
$response = array(
	'status' => 0,
	'message' => 'Submission failed, please try again.'
);
$uploadFile = '';
$uploadStatus = 1;
if(isset($_FILES["land_sketch"]["type"]) != ''){
	$uploadDir = "../uploads/";
	$allowed = array("jpg","jpeg","png","JPEG");
	$fileName = basename($_FILES['land_sketch']['name']);
	$targetFilePath = $uploadDir.$fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	$allowExtension = array("JPEG","jpg","png","jpeg");
	if(in_array($fileType,$allowExtension)){
		if(move_uploaded_file($_FILES['land_sketch']['tmp_name'], $targetFilePath)){
			$uploadFile = $fileName;
		}
		else{
			$uploadStatus = 0 ;
			$response['message'] = "Sorry, the was an error uploading your file.";
		}
	}
	else{
		$uploadStatus = 0 ;
		$response['message'] = "Invalid file name extension only jpg, png, jpeg, JPEG files are allowed";
	}
}
if($uploadStatus == 1){
	require('db.php');
	$north = $_POST['north'];
	$south = $_POST['south'];
	$east = $_POST['east'];
	$west = $_POST['west'];
	$prop_id = $_POST['prop_id'];
	$staff_id = $_POST['staff_id'];
	$total_area = $_POST['total_area'];
	$remarks = $_POST['remarks'];

	$insert = "INSERT INTO property_boundaries (
		north,
		south,
		east,
		west,
		land_sketch,
		prop_id,
		staff_id,
		total_area,
		remarks
	) 
	VALUES (
		'$north',
		'$south',
		'$east',
		'$west',
		'$uploadFile',
		'$prop_id',
		'$staff_id',
		'$total_area',
		'$remarks'
	)";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
	if($qry){
		$update = "UPDATE property SET tm_status = 1 WHERE id ='$prop_id'";
		$qryy = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
		if($qryy){
			$response['status'] = 1;
			$response['message'] = "Details submitted successfully!";
		}
	}
	else{
		$response['status'] = 0;
		$response['message'] = "Something is wrong in the backend";
	}
}
else{
	$response['message'] = "Idiot";
}
echo json_encode($response);