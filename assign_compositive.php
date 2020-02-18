<?php
	$currentPage = 'Survey Property';
	$pageTitle = 'Survey Property';
	$title = 'Survey Property';
	include('stafflayouts/header.php');
?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
	<?php include('layouts/header_content.php'); ?>
	<?php include('stafflayouts/page_title.php'); ?>

	 <div class="row justify-content-center">
    	<div class="col col-md-12">
    		<div class="col-12 mt-2">
    			<div class="row mt-3">
    				<div class="col">
    					<button type="button" class="btn btn-success pull-right" id="survey_props" data-toggle="modal" data-target="#owner_modal">Survey Property</button>
    				</div>
    			</div>
    			 <div class="card mt-3 p-3">
    			 	<table class="table table-striped table-bordered mt-2">
    			 		<thead>
						    <tr>
						      <th scope="col" class="text-center">No.</th>
						      <th scope="col" class="text-center">Surveyor Name</th>
						      <th class="text-center">Surveyor Status</th>
						      <th scope="col" class="text-center">Action</th>
						    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		require('controller/db.php');
					  		$compositive = "SELECT * FROM compositive";
					  		$qry = $conn->query($compositive) or trigger_error(mysqli_error($conn)." ".$compositive);
					  		$counter = 0;
					  		while($row = mysqli_fetch_assoc($qry)){ $counter++; ?>
					  		<tr>
					  			<td class="text-center"><?php echo $counter; ?></td>
					  			<td class="text-center"><?php echo $row['fname']." ".$row['lname']; ?></td>
					  				<?php
					  					if($row['status'] == 0){?>
					  					<td class="text-center"><span class="badge badge-warning p-2">Standby</span></td>
					  				<?php } else if($row['status'] == 1){?>
					  					<td class="text-center"><span class="badge badge-primary p-2">On Operation</span></td>
					  				<?php }
					  				?>
					  			<td class="text-center">
					  				<button class="btn"></button>
					  			</td>
					  		</tr>
					  	<?php	} 
					  	?>
					  </tbody>
    			 	</table>
    			 </div>
    		</div>
    	</div>
    </div>
</div>
<?php include('stafflayouts/survey_props_modal.php'); ?>
<?php include('stafflayouts/footer.php'); ?>