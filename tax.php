<?php 
	session_start();
	$currentPage = 'Tax';
	$title = 'Tax';
	$pageTitle = 'Tax';
	include ('layouts/header.php');
 ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/header_content.php'); ?>
<?php include('layouts/page_title.php'); ?>
<?php
	if(isset($_SESSION['suc'])):?>
		<div class="row justify-content-center mt-2">
			<div class="col col-md-8">
				<div class="alert alert-info">
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
 <div class="main-content-inner">	
     <div class="row justify-content-center">
        <div class="col col-md-8">
            <div class="row">
               <div class="col-12">
                  <div class="card mt-3 p-3">
                  	<div class="card-body">
                  		<div class="row">
                  			<?php
                  				require('controller/db.php');
                  				$rates = "SELECT * FROM tax_percentage";
                  				$qry = $conn->query($rates) or trigger_error(mysqli_error($conn)." ".$rates);
                  				$a = mysqli_fetch_assoc($qry);
                  				$tax = $a['tax'] * 100;
                  				$penalty = $a['penalty'] * 100;
                  			?>
                  			<div class="col">
                  				<div class="form-group">
                  					<label>Current Tax Rate</label>
                  					<input type="text" class="form-control" value="<?php echo $tax."%  anually" ?>" readonly>
                  				</div>
                  			</div>
                  			<div class="col">
                  				<div class="form-group">
                  					<label>Current Penalty Rate</label>
                  					<input type="text" class="form-control" value="<?php echo $penalty."%  per month"?>" readonly>
                  				</div>
                  			</div>
                  		</div>
                  		<div class="row mt-2">
                  			<div class="col col-md-4">
                  				<button class="btn btn-info btn-block" type="button" id="update_tax">Update</button>
                  			</div>
                  		</div>
                  	</div>
               	 </div>
                </div>
		    </div>
		</div>
	</div>
</div>
<?php include('modals/tax_modal.php'); ?>
<?php include ('add_appraiser.php'); ?>
<?php include ('layouts/footer.php'); ?>