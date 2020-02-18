<?php 
	$currentPage = 'Add Surveyor';
	$title = 'Add Surveyor';
	$pageTitle = 'Add Surveyor';
	include ('layouts/header.php');
 ?>
<?php include('layouts/sidebar.php'); ?>
<div class="main-content">
    <?php include('layouts/header_content.php'); ?>
    <?php include('layouts/page_title.php'); ?>
     <div class="main-content-inner">
     <div class="row justify-content-center">
        <div class="col col-md-9">
            <div class="row">
               <div class="col-12 mt-2">
                    <div class="card mt-5">
                    	<form action="controller/surveyor.php" method="POST">
                        	<div class="card-body">
	                            <h2 class="header-title text-center">Compositive Personal Details</h2>
	                            <hr>
	                               <div class="row">
		                               	 <div class="col col-md-5">
		                               	 	<div class="form-group">
		                               	 		<label>First Name</label>
		                               	 		<input type="text" class="form-control" name="fname">
		                               	 	</div>
		                               	 </div>
		                               	  <div class="col col-md-5">
		                               	 	<div class="form-group">
		                               	 		<label>Last Name</label>
		                               	 		<input type="text" class="form-control" name="lname">
		                               	 	</div>
		                               	 </div>
		                               	 <div class="col col-md-2">
		                               	 	<div class="form-group">
		                               	 		<label>Middle Name</label>
		                               	 		<input type="text" class="form-control" name="mname">
		                               	 	</div>
		                               	 </div>
		                             </div>
		                            <div class="row">
		                                	 <div class="col col-md-7">
		                               	 	<div class="form-group">
		                               	 		<label>Address</label>
		                               	 		<input type="text" class="form-control" name="address">
		                               	 	</div>
		                               	 </div>
		                               	  <div class="col col-md-5">
		                               	 	<div class="form-group">
		                               	 		<label>Birthdate</label>
		                               	 		<input type="date" class="form-control" name="bday">
		                               	 	</div>
		                               	 </div>
		                            </div>
		                             <div class="row">
		                                	 <div class="col col-md-6">
		                               	 	<div class="form-group">
		                               	 		<label>Contact</label>
		                               	 		<input type="text" class="form-control" name="contact">
		                               	 	</div>
		                               	 </div>
		                            </div>
		                            <div class="row">
		                                	 <div class="col col-md-6">
		                               	 	<div class="form-group">
		                               	 		<label>Username</label>
		                               	 		<input type="text" class="form-control" name="username">
		                               	 	</div>
		                               	 </div>
		                               	  <div class="col col-md-6">
		                               	 	<div class="form-group">
		                               	 		<label>Password</label>
		                               	 		<input type="password" class="form-control" name="password">
		                               	 	</div>
		                               	 </div>
		                            </div>	
		                             <div class="row mt-4 justify-content-center">
		                               <div class="col col-md-4">
		                               		<button type="submit" name="submit" class="btn btn-success btn-block rounded">Register</button>
		                               </div>
		                            </div>
	                        </div>
                       </form>
                    </div>
                </div>
		    </div>
		</div>
	</div>
</div>
</div>
        
<?php include ('layouts/footer.php'); ?>