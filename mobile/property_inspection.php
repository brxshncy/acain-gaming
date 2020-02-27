<?php
require('../controller/db.php');
$response = array(
	'status' => 0,
	'message' => 'Submission failed, please try again.'
);
$uploadFile = '';
$uploadStatus = 1;
if(isset($_FILES['floor_plan']['type']) != ''){
	$uploadDir = "../uploads/";
	$allowed = array("jpeg","jpg","png","JPEG");
	$fileName = basename($_FILES['floor_plan']['name']);
	$targetFilePath = $uploadDir.$fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	if(in_array($fileType,$allowed)){
		if(move_uploaded_file($_FILES['floor_plan']['tmp_name'], $targetFilePath)){
			$uploadFile = $fileName;
		}
		else{
			$uploadStatus = 0;
			$response['message'] = "Sorry, the was an error uploading your file.";
		}
	}
	else{
		$uploadStatus = 0;
		$response['message'] = "Invalid file name extension only jpg, png, jpeg, JPEG files are allowed";
	}
}
if($uploadStatus == 1){
	require('db.php');
	$building_permit = $_POST['building_permit'];
	$prop_idd = $_POST['prop_idd'];
	$staff_id = $_POST['staff_id'];
	$date_issued = $_POST['date_issued'];
	$date_constructed = $_POST['date_constructed'];
	$date_occupied = $_POST['date_occupied'];
	$building_age = $_POST['building_age'];
	$no_storeys = $_POST['no_storeys'];
	$first = $_POST['first'];
	$sec = $_POST['sec'];
	$third = $_POST['third'];
	$fourth = $_POST['fourth'];
	$total_area = $_POST['total_area'];
	$total_value = $_POST['total_value'];
	$remarks = $_POST['remarks'];


	$insert = "INSERT INTO property_inspection (
		prop_id,
		staff_id,
		building_permit,
		date_issued,
		date_constructed,
		date_occupied,
		building_age,
		no_storeys,
		first,
		sec,
		third,
		fourth,
		total_area,
		total_value,
		remarks
	) 
	VALUES (
		'$prop_idd',
		'$staff_id',
		'$building_permit',
		'$date_issued',
		'$date_constructed',
		'$date_occupied',
		'$building_age',
		'$no_storeys',
		'$first',
		'$sec',
		'$third',
		'$fourth',
		'$total_area',
		'$total_value',
		'$remarks'
	)";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
	if($qry){
		$update = "UPDATE property SET apr_status = 1 WHERE id ='$prop_idd'";
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