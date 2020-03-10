<?php
require('db.php');

	if(isset($_POST['submit'])) {
		$date_inquire = $_POST['date_inquire'];
		$owner_fname = $_POST['owner_fname'];
		$owner_lname = $_POST['owner_lname'];
		$owner_mname = $_POST['owner_mname'];
		$owner_address = $_POST['owner_address'];
		$owner_bday = $_POST['owner_bday'];
		$owner_contact = $_POST['owner_contact'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$property_id = $_POST['prop_id'];
		$property_brgy = $_POST['property_brgy'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$property_address = $_POST['property_address'];
		$kind_prop = $_POST['kind_prop'];
		$actual_use = $_POST['actual_use'];
		$north = $_POST['north'];
		$east = $_POST['east'];
		$west = $_POST['west'];
		$south = $_POST['south'];
		$prop_measurement = $_POST['prop_measurement'];
		$prev_text_payment = $_POST['prev_text_payment'];
		$prop_value = $_POST['prop_value'];
		$payment_status = "";
		$team_id = $_POST['compositive'];
		$status = $_POST['status'];
		$appraiser = $_POST['appraiser'];

		$owner_insert = "INSERT INTO owner 
		(
			fname,
			lname,
			mname,
			address,
			birthday,
			status,
			gender,
			contact
		)
		VALUES
		(
			'$owner_fname',
			'$owner_lname',
			'$owner_mname',
			'$owner_address',
			'$owner_bday',
			'$civil_status',
			'$gender',
			'$owner_contact'
		)
		";
		$owner_query = $conn->query($owner_insert) or trigger_error(mysqli_error($conn)." ".$owner_insert);
		if($owner_query){
			$owner_id = $conn->insert_id;
			echo $owner_id;
			$property_insert = "INSERT INTO property
			(
				date_inquire,
				owner_id,
				property_id,
				property_brgy,
				street,
				city,
				kind_prop,
				actual_use,
				north,
				east,
				west,
				south,
				prop_measurement,
				prop_value,
				prev_text_payment,
				payment_status,
				team_id,
				tm_status,
				apr_status,
				exm_status,
				office_appraiser_id
			)
			VALUES
			(
				'$date_inquire',
				'$owner_id',
				'$property_id',
				'$property_brgy',
				'$property_address',
				'$kind_prop',
				'$actual_use',
				'$north',
				'$east',
				'$west',
				'$south',
				'$prop_measurement',
				'$prop_value',
				'$prev_text_payment',
				'$payment_status',
				'$team_id',
				0,
				0,
				0,
				'$appraiser'
			)
			";
			$property_query = $conn->query($property_insert) or trigger_error(mysqli_error($conn)." ".$property_insert);
			if($property_insert){

				$update_status = "UPDATE team SET status = 1 WHERE id ='$team_id'";
				$queque = $conn->query($update_status) or trigger_error(mysqli_error($conn)." ".$update_status);

				if($queque){
					session_start();
					$_SESSION['daaa'] = "Property details saved successfully";
					header("location:../manage_properties.php");
				}
				else{
					echo "fail";
				}
			}
			else{
				echo "fail".mysqli_error($conn);
			}
		}
		
	
}
else if(isset($_POST['add'])){
	$date_acquired = date("Y-m-d",strtotime($_POST['date_acquired']));
	$owner_id = $_POST['owner_id'];
	$prop_id = $_POST['prop_id'];
	$property_brgy = $_POST['property_brgy'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$kind_prop = $_POST['kind_prop'];
	$actual_use = $_POST['actual_use'];
	$north = $_POST['north'];
	$east = $_POST['east'];
	$west = $_POST['west'];
	$south = $_POST['south'];
	$prop_measurement = $_POST['prop_measurement'];
	$prop_value = $_POST['prop_value'];
	$prev_text_payment = $_POST['prev_text_payment'];
	$compositive = $_POST['compositive'];
	$status = $_POST['status'];
	$appraiser = $_POST['appraiser'];


		$property_insert = "INSERT INTO property
			(
				date_inquire,
				owner_id,
				property_id,
				property_brgy,
				street,
				city,
				kind_prop,
				actual_use,
				north,
				east,
				west,
				south,
				prop_measurement,
				prop_value,
				prev_text_payment,
				team_id,
				tm_status,
				apr_status,
				exm_status,
				office_appraiser_id
			)
			VALUES
			(
				'$date_acquired',
				'$owner_id',
				'$prop_id',
				'$property_brgy',
				'$street',
				'$city',
				'$kind_prop',
				'$actual_use',
				'$north',
				'$east',
				'$west',
				'$south',
				'$prop_measurement',
				'$prop_value',
				'$prev_text_payment',
				'$compositive',
				0,
				0,
				0,
				'$appraiser'
			)
			";
			$qry = $conn->query($property_insert) or trigger_error(mysqli_error($conn)." ".$property_insert);

			if($qry){

				$update = "UPDATE team SET status = 1 WHERE id = '$compositive'";
				$runit = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
				if($runit){
					session_start();
					$_SESSION['suc'] = "Record saved successfully";
					header("location:../manage_owners.php");
				}
				else{
					echo "error";
				}
			}
			else{
				echo "error";
			}
}


