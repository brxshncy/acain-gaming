<?php
	require('../controller/db.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$props = "SELECT * FROM property WHERE  id = '$id'";
		$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
		$a = mysqli_fetch_assoc($qry);?>
	<div class="row">
		<div class="col">
			<h3>Property Details</h3>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col">
			<div class="form-group">
				<label>Date Acquire</label>
				<input type="text" value="<?php echo $a['id'] ?>" class="form-control" hidden>
				<?php
					date_default_timezone_set("Asia/Manila");
					$date_inquire = date("F j, Y", strtotime($a['date_inquire']));
				?>
				<input type="text" value="<?php  echo $date_inquire ?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Barangay</label>
				<input type="text" value="<?php  echo $a['brgy'] ?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Address</label>
				
				<input type="text" value="<?php  echo $a['address'] ?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Kind of Property</label>
				
				<input type="text" value="<?php  echo $a['kind_prop'] ?>" class="form-control" readonly>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Actual Use</label>
				
				<input type="text" value="<?php  echo $a['actual_use']  ?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>North</label>
				
				<input type="text" value="<?php  echo $a['north'] ?>" class="form-control" readonly>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>East</label>
				<input type="text" value="<?php  echo $a['east']?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>West</label>
				<input type="text" value="<?php  echo $a['west'] ?>" class="form-control" readonly>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>South</label>
				<input type="text" value="<?php  echo $a['south'] ?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Property Value</label>
				<input type="text" value="<?php  echo $a['prop_value'] ?>" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Remarks</label>
				<textarea class="form-control" readonly rows="3"><?php echo $a['remarks'] ?></textarea>
			</div>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col">
			<h3>Transfer Property to</h3>
		</div>
	</div>
	

<?php } ?>