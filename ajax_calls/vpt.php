<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$s = "SELECT * FROM property_title pt LEFT JOIN property p on p.id = pt.prop_id WHERE pt.prop_id = '$id'";
	$qry = $conn->query($s) or trigger_error(mysqli_error($conn)." ".$s);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col col-md-6">
		<div class="form-group">
			<label>Date Surveyed</label>
			<input type="date" class="form-control" value="<?php $a['date_surveyed'] ?>">
		</div>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
		<div class="form-group">
			<label>Serial Number</label>
			<input type="text" class="form-control" value="<?php echo $a['serial_number'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>Judicial Form No.</label>
			<input type="text" class="form-control" value="<?php echo $a['jf_no'] ?>">
		</div>
	</div>
</div>
<div class="row mt-2">
	<div class="col">
		<div class="form-group">
			<label>Case No.</label>
			<input type="text" class="form-control" value="<?php echo $a['case_no'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>Original Registration Date</label>
			<input type="date" class="form-control" value="<?php echo $a['reg_date'] ?>">
		</div>
	</div>
</div>
<div class="row mt-2">
	<div class="col">
		<div class="form-group">
			<label>Volume No.</label>
			<input type="text" class="form-control" value="<?php echo $a['vol_no'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>Record No.</label>
			<input type="text" class="form-control" value="<?php echo $a['record_no'] ?>">
		</div>
	</div>
</div>
<div class="row mt-2">
	<div class="col">
		<div class="form-group">
			<label>Decree No.</label>
			<input type="text" class="form-control" value="<?php echo $a['dec_no'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>Oct No.</label>
			<input type="text" class="form-control" value="<?php echo $a['oct_no'] ?>">
		</div>
	</div>
			<div class="col">
		<div class="form-group">
			<label>Page  No.</label>
			<input type="text" class="form-control" value="<?php echo $a['page_no'] ?>">
		</div>
	</div>
</div>
<div class="row justify-content-center">
<div class="card card-bordered mt-3" style="width:700px;">
	<div class="card-header text-center"><h5>Property Title Image</h5></div>
		<div class="card-body bg-light">
			<div class="row">
				<div class="col ">
					<img  class="img-fluid" src="uploads/<?php echo $a['title_pic'] ?>" alt="Image">
				</div>
			</div>
		</div>
</div>
</div>
<?php } ?>