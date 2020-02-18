<?php

require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$props = "SELECT * FROM property WHERE owner_id = '$id' ";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
if(mysqli_num_rows($qry) > 0){
	while($a = mysqli_fetch_assoc($qry)) { ?>

<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Property ID</label>
			<input type="text" class="form-control" value="<?php echo $a['prop_u_id']; ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Property Status</label>
			<input type="text" class="form-control" value="<?php echo (($a['status'] == 0) ? 'Not yet verified' : 'Verified') ?>" readonly>
		</div>
	</div>
</div>
<hr>
<?php } } else {

echo "
	<div class='row'>
		<div class='col'>
		<h5>No property record</h5>
		</div>
	</div>
	<hr>
";

}} ?>