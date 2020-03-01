<?php
$response = array(
	'status' => 0,
	'message' => 'Submission failed, please try again.'
);
$uploadFile = '';
$uploadStatus = 1;
if(isset($_FILES["prop_title"]["type"]) != ''){
	$uploadDir = "../uploads/";
	$allowed = array("jpg","jpeg","png","JPEG");
	$fileName = basename($_FILES['prop_title']['name']);
	$targetFilePath = $uploadDir.$fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	$allowExtension = array("JPEG","jpg","png","jpeg");
	if(in_array($fileType,$allowExtension)){
		if(move_uploaded_file($_FILES['prop_title']['tmp_name'], $targetFilePath)){
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
	$serial_number = $_POST['serial_number'];
	$jf_no = $_POST['jf_no'];
	$case_no = $_POST['case_no'];
	$reg_date = $_POST['reg_date'];
	$vol_no = $_POST['vol_no'];
	$record_no = $_POST['record_no'];
	$dec_no = $_POST['dec_no'];
	$oct_no = $_POST['oct_no'];
	$page_no = $_POST['page_no'];
	$oct_no = $_POST['oct_no'];
	$remarks = $_POST['remarks'];
	$staff_id = $_POST['staff_id'];
	$prop_id = $_POST['prop_id'];
	$date_surveyed =  date("Y-m-d");

	$insert = "INSERT INTO property_title (
		serial_number,
		jf_no,
		case_no,
		reg_date,
		vol_no,
		record_no,
		dec_no,
		page_no,
		oct_no,
		title_pic,
		remarks,
		staff_id,
		prop_id,
		date_surveyed
	) 
	VALUES (
		'$serial_number',
		'$jf_no',
		'$case_no',
		'$reg_date',
		'$vol_no',
		'$record_no',
		'$dec_no',
		'$page_no',
		'$oct_no',
		'$uploadFile',
		'$remarks',
		'$staff_id',
		'$prop_id',
		'$date_surveyed'
	)";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
	if($qry){
		$update = "UPDATE property SET exm_status = 1 WHERE id ='$prop_id'";
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