<?php
	session_start();
	$currentPage = 'Import Previous Property Ownership';
	$pageTitle = 'Property History';
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
    			<?php
					if(isset($_SESSION['suc'])): ?>
					  <div class="row mt-2">
					    <div class="col">
					      <div class="alert alert-success">
					        <p class="text-center">
					          <?php
					            echo $_SESSION['suc'];
					            unset($_SESSION['suc']);
					          ?>
					        </p>
					    </div>
					  </div>
					</div>
				<?php endif ?>
    			 <div class="card mt-3 p-3">
    			 	<table class="table table-striped table-bordered mt-2">
    			 		<thead>
						    <tr>
						      <th scope="col" class="text-center">No.</th>
						      <th scope="col" class="text-center">Current Owner</th>
						      <th scope="col" class="text-center">Property ID</th>
						      <th class="text-center">Property Address</th>
						      <th class="text-center">Property Boundaries</th>
						      <th scope="col" class="text-center">Action</th>
						    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		require('controller/db.php');
					  		$props = "SELECT *, CONCAT(o.fname,' ',o.mname,' ',o.lname) as name FROM property p LEFT JOIN owner o ON o.id = p.owner_id";
					  		$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
					  		$counter = 0;
					  		while($row = mysqli_fetch_assoc($qry)){ 
					  			$counter++;
					  		?>
					  		<tr>
					  			<td class="text-center"><?php echo $counter; ?></td>
					  			<td class="text-center"><?php echo ucwords($row['name']); ?></td>
					  			<td class="text-center">
					  				<a href="javascript:void()">
					  					<?php echo $row['property_id'] ?>
					  				</a>
					  			</td>
					  			<td class="text-center"><?php echo $row['property_address']; ?></td>
					  			<td class="text-center"><?php echo "North: ".$row['north'].", East: ".$row['east'].",  West: ".$row['west'].", South: ".$row['south']; ?></td>
					  			<td class="text-center">
					  				<a href="previous_ownership_form.php?q=<?php echo $row['id'] ?>" title="Import Previous Ownership">
                                    	<i class="fa fa-eject ml-2 text-success"></i>
                                	<a href="history_property.php?q=<?php echo $row['id'] ?>" title="View Property History">                           
                                    	<i  class="fa fa-history ml-2"></i>
                                    </a>
					  			</td>
					  		</tr>
					  	<?php } ?>
					  </tbody>
    			 	</table>
    			 </div>
    		</div>
    	</div>
    </div>
</div>
<?php include('stafflayouts/footer.php'); ?>