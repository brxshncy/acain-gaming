<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$props = "SELECT * FROM property WHERE id ='$id'";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn." ".$props));
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Property Barangay</label>
			<input type="text" class="form-control" value="<?php echo $a['brgy'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Property Address</label>
			<input type="text" class="form-control" value="<?php echo $a['address'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Kind of Property</label>
			<input type="text" class="form-control" value="<?php echo $a['kind_prop'] ?>">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Actual Use</label>
			<input type="text" class="form-control" value="<?php echo $a['actual_use'] ?>">
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col">
		<h4>Boundaries</h4>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>North</label>
			<input type="text" class="form-control" value="<?php echo $a['north'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>East</label>
			<input type="text" class="form-control" value="<?php echo $a['north'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>West</label>
			<input type="text" class="form-control" value="<?php echo $a['west'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>South</label>
			<input type="text" class="form-control" value="<?php echo $a['south'] ?>">
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col col-md-6">
		<label>Property Value</label>
		<input type="text" class="form-control" value="<?php echo $a['prop_value'] ?>">
	</div>
</div>
<div class="row">
	<div class="col">
		<label>Remarks</label>
		<textarea class="form-control" rows="3"><?php echo $a['remarks'] ?></textarea>
	</div>
</div>


<?php } ?> 