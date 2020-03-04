<?php 
	session_start();
	$currentPage = 'Manage Compositive';
	$title = 'Manage Compositive';
	$pageTitle = 'Manage Compositive';
	include ('layouts/header.php');
 ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/header_content.php'); ?>
<?php include('layouts/page_title.php'); ?>

<?php if(isset($_SESSION['reg'])): ?>
<div class="row justify-content-center mt-4">
	<div class="col col-md-7">
		<div class="alert alert-success p-4 text-center">
			<b>
				<?php
					echo $_SESSION['reg'];
					unset($_SESSION['reg']);
				?>
			</b>
		</div>
	</div>
</div>
<?php endif ?>

 <div class="main-content-inner">
     <div class="row justify-content-center">
        <div class="col col-md-12">
        	<?php
        		if(isset($_SESSION['team-added'])):?>
        			<div class="row mt-2">
        				<div class="col">
        					<div class="alert alert-success">
        						<p>
        							<?php echo $_SESSION['team-added'];
        								  unset($_SESSION['team-added']);
        							 ?>
        						</p>
        					</div>
        				</div>
        			</div>
        	<?php endif ?>
        	<div class="row mt-2">
        		<div class="col">
        			<div class="pull-right">
                        <button type="item" class="btn btn-primary" id="add_team">
                        	<i class="fa fa-building"></i>
                        </button>
                        <button type="item" class="btn btn-success" id="add_staff">
                        	<i class="fa fa-user-plus"></i>
                        </button>
                    </div>
        		</div>
        	</div>
            <div class="row">
               <div class="col-12">
                  <div class="card mt-3 p-3">
                    <table class="table table-striped table-bordered mt-2">
                    	<thead>
						    <tr>
						      <th scope="col" class="text-center">No.</th>
						      <th scope="col" class="text-center">Owner</th>
						      <th class="text-center">Property Location</th>
						      <th scope="col" class="text-center">Status</th>
						    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		require('controller/db.php');
					  		$id = $_GET['q'];
					  		$logs = "SELECT *, CONCAT(o.fname,' ',o.lname) as name FROM property p LEFT JOIN owner o ON o.id = p.owner_id WHERE p.team_id = '$id'";
					  		$qry = $conn->query($logs) or trigger_error(mysqli_error($conn)." ".$logs);
					  		$counter = 0;
					  		if(mysqli_num_rows($qry) > 0){
					  			while($a = mysqli_fetch_assoc($qry)){$counter++;?>
					  	<tr>
					  		<td class="text-center"><?php echo $counter; ?></td>
					  		<td class="text-center"><?php echo ucwords($a['name']); ?></td>
					  		<td class="text-center"><?php echo ucwords($a['property_brgy']." ".$a['street']." ".$a['city']); ?></td>
					  		<td class="text-center">
					  			<?php
					  				if($a['tm_status'] == 0 && $a['apr_status'] == 0 && $a['exm_status'] == 0){
					  					echo "<span class='badge badge-warning p-2'>Unserveyed</span>";
					  				}
					  				else{
					  					echo "<span class='badge badge-info p-2'>Surveyed</span>";
					  				}
					  			?>
					  				
					  		</td>
					  	</tr>
					  	<?php } } ?>
					  </tbody>
                    </table>
                </div>
                </div>
		    </div>
		</div>
	</div>
</div>

<?php include ('add_compositive.php'); ?>
<?php include ('team_modal.php'); ?>
<?php include ('layouts/footer.php'); ?>