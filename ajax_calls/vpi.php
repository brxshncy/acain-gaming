<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$bounds = "SELECT * from property_inspection pi left join property p ON p.id = pi.prop_id WHERE pi.prop_id = '$id'";
	$qry = $conn->query($bounds) or trigger_error(mysqli_fetch_assoc($qry));
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col">
		<h5>Property Inspection</h5>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
		<div class="form-group">
			<label>Date Surveyed</label>
			<input type="date" class="form-control" value="<?php echo $a['date_surveyed'] ?>">
		</div>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
		<div class="form-group">
			<label>Building Permit</label>
			<input type="text" class="form-control" value="<?php echo $a['building_permit'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>Date Issued</label>
			<input type="date" class="form-control" value="<?php echo $a['date_issued'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Date Constructed</label>
			<input type="date" class="form-control" value="<?php echo $a['date_constructed'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>Date Occupied</label>
			<input type="date" class="form-control" value="<?php echo $a['date_occupied'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col col-md-6">
		<div class="form-group">
			<?php
				date_default_timezone_set("Asia/Manila");
				$age = date("Y") - date("Y",strtotime($a['date_constructed']));
			?>
			<label>Building Age</label>
			<input type="text" class="form-control" value="<?php echo $age." years" ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col col-md-6">
		<div class="form-group">
			<label>Number of Storeys</label>
			<input type="text" class="form-control" value="<?php echo $a['no_storeys']?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>First Floor Area</label>
			<input type="text" class="form-control" value="<?php echo $a['first']." sqm" ?>">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Second Floor Area</label>
			<input type="text" class="form-control" value="<?php echo $a['sec']." sqm" ?>">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Third Floor Area</label>
			<input type="text" class="form-control" value="<?php echo $a['third']." sqm" ?>">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Fourh Floor Area</label>
			<input type="text" class="form-control" value="<?php echo $a['fourth']." sqm" ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Total Area</label>
			<input type="text" class="form-control" value="<?php echo $a['total_area']." sqm" ?>">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Total Value</label>
			<input type="text" class="form-control" value="<?php echo $a['total_value'] ?>">
		</div>
	</div>
</div>

<?php } ?>