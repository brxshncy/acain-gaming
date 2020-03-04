<?php
	$currentPage = 'Import Previous Property Ownership';
	$pageTitle = 'Import Previous Property Ownership';
	$title = 'Import Previous Property Ownership';
	include('stafflayouts/header.php');
?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
	<?php include('layouts/header_content.php'); ?>
	<?php include('stafflayouts/page_title.php'); ?>

	 <div class="row justify-content-center">
    	<div class="col col-md-12">
    		<div class="col-12 mt-2">
    			 <div class="card mt-3 p-3">
    			 	<div class="row">
    			 		<div class="col">
    			 			<h4 class="ml-2">Property Owner History</h4>
    			 		</div>
    			 	</div>
    			 	<hr>
    			 	<table class="table table-striped table-bordered mt-2">
    			 		<thead>
						    <tr>
						      <th scope="col" class="text-center">No.</th>
						      <th scope="col" class="text-center">Previous Owner</th>
						      <th class="text-center">Transference</th>
						      <th class="text-center">Date Acquired</th>
						      <th scope="col" class="text-center">Action</th>
						    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		if(isset($_GET['q'])){
					  			$id = $_GET['q'];
					  			require('controller/db.php');
						  		$history = "SELECT *, CONCAT(o.fname,' ',o.lname) as name,h.id as h_id, h.date_transfer as date_transfer FROM history_owner_property h LEFT JOIN owner o ON h.owner_id = o.id WHERE h.property_id = '$id'";
						  		$qry = $conn->query($history) or trigger_error(mysqli_error($conn)." ".$history);
						  		$counter = 0;
						  		if(mysqli_num_rows($qry) > 0){
						  			while($a = mysqli_fetch_assoc($qry)){ $counter++; ?>
						  				<tr>
					  			<td class="text-center"><?php echo $counter; ?> </td>
					  			<td class="text-center"><?php echo ucwords($a['name']); ?> </td>
					  			<td class="text-center"><?php echo $a['kind_transfer']; ?> </td>
					  			<?php
					  				$date_transfer = date("F j, Y",strtotime($a['date_transfer']));
					  			?>
					  			<td class="text-center"><?php echo $date_transfer; ?> </td>
					  			<td class="text-center">
					  				<a href="javascript:void(0)" class="v_history_details" id="<?php echo $a['h_id'] ?>" title="View Full Details">
					  						<i class="fa fa-eye text-success"></i>
					  				</a>
					  			</td>
					  		</tr>
					  		<?php } } } ?>
					  </tbody>
    			 	</table>
    			 </div>
    		</div>
    	</div>
    </div>
</div>
<?php include('stafflayouts/history_modal_view.php'); ?>
<?php include('stafflayouts/edit_history_modal_view.php'); ?>
<?php include('stafflayouts/footer.php'); ?>