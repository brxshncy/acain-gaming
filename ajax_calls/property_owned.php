<div class="row">
<div class="col">
<hr>
<div class="list-group">
<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$props = "SELECT * FROM property p WHERE p.owner_id = '$id'";
	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
	$counter = 0;
	while($row = mysqli_fetch_assoc($qry)){ $counter++; ?>
 <a href="javascript:void(0)" class="list-group-item list-group-item-action flex-column align-items-start">
	<div class="row">
		<div class="col">
		      		<b class="mr-1">Property ID:</b> <?php echo $row['property_id'] ?>
		      		<br>
		      		<b class="mr-1">Property Address:</b> <?php echo ucwords($row['property_address']) ?>
		      		<br>
		      		<b class="mr-1">Barangay:</b> <?php echo ucwords($row['property_brgy']) ?>
		      		<br>
		      		<b class="mr-1">Kind of Property:</b> <?php echo $row['kind_prop'] ?>
		      		<br>
		      		<b class="mr-1">Actual Use:</b> <?php echo $row['actual_use'] ?>
		      		<br>
		      		<b class="mr-1">North:</b> <?php echo $row['north'] ?>
		      		<br>
		      		<b class="mr-1">East:</b> <?php echo $row['east'] ?>
		      		<br>
		      		<b class="mr-1">West:</b> <?php echo $row['west'] ?>
		      		<br>
		      		<b class="mr-1">South:</b> <?php echo $row['south'] ?>
		      		<br>
		      		<b class="mr-1">Area:</b> <?php echo $row['prop_measurement']." SQM" ?>
		      		<br>
		      		<b class="mr-1">Value:</b> <?php echo $row['prop_value'] ?>
		</div>
	</div>
</a>
<?php }
}?>

</div>
</div>
</div>
