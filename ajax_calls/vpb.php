<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$bounds = "SELECT * from property_boundaries pb left join property p ON p.id = pb.prop_id WHERE pb.prop_id = '$id'";
	$qry = $conn->query($bounds) or trigger_error(mysqli_fetch_assoc($qry));
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col">
		<h5>Boundaries</h5>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
		<div class="form-group">
			<label>North</label>
			<input type="text" class="form-control" value="<?php echo $a['north'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>South</label>
			<input type="text" class="form-control" value="<?php echo $a['south'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>East</label>
			<input type="text" class="form-control" value="<?php echo $a['north'] ?>">
		</div>
	</div>
		<div class="col">
		<div class="form-group">
			<label>West</label>
			<input type="text" class="form-control" value="<?php echo $a['south'] ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col col-md-6">
		<div class="form-group">
			<label>Property Total Area</label>
			<input type="text" class="form-control" value="<?php echo $a['total_area']." sqm" ?>">
		</div>
	</div>
</div>
<div class="row justify-content-center">
<div class="card card-bordered mt-3" style="width:700px;">
	<div class="card-header text-center"><h5>Land sketch of property</h5></div>
		<div class="card-body bg-light">
			<div class="row">
				<div class="col ">
					<img  class="img-fluid" src="uploads/<?php echo $a['land_sketch'] ?>" alt="Image">
				</div>
			</div>
		</div>
</div>
</div>

<?php } ?>