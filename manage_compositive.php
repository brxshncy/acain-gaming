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
        <div class="col col-md-8">
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
						      <th scope="col" class="text-center">Compositives</th>
						      <th class="text-center">Status</th>
						      <th scope="col" class="text-center">Action</th>
						    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		require('controller/db.php');
					  		$team = "SELECT * FROM team ";
					  		$qry = $conn->query($team) or trigger_error(mysqli_error($conn)." ".$team);
					  		$counter = 0;
					  		while($row = mysqli_fetch_assoc($qry)){ $counter++; ?>
					  		<tr>
					  			<td class="text-center"><?php echo $counter; ?></td>
					  			<td class="text-center"><?php echo $row['team_name']; ?></td>
					  			<td class="text-center">
					  				<?php
					  					if($row['status'] == 0){
					  						echo "<span class='badge badge-warning p-2'>Standby</span>";
					  					}
					  					else if($row['status'] == 1){
					  						echo "<span class='badge badge-info p-2'>On Operation</span>";
					  					}
					  				?>
					  			</td>
					  			<td class="text-center">
					  			 <a href="members.php?q=<?php echo $row['id'] ?>" >
					  				<i class="fa fa-users text-info" title="Members" data-placement="top"></i>
					  			</a>
					  			<a href="activity_logs.php?q=<?php echo $row['id'] ?>">
					  				<i class="fa fa-tasks text-success ml-2" title="Activity Logs"></i>
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
</div>

<?php include ('add_compositive.php'); ?>
<?php include ('team_modal.php'); ?>
<?php include ('layouts/footer.php'); ?>