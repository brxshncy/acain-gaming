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
        <div class="col col-md-10">
            <div class="row">
               <div class="col-12">
                  <div class="card mt-3 p-3">
                    <div class="row mt-2">
                      <div class="col col-md-6">
                          <?php
                            if(isset($_GET['q'])){
                              $id = $_GET['q'];
                              require('controller/db.php');
                              $team = "SELECT * FROM team WHERE id = '$id'";
                              $run = $conn->query($team) or trigger_error(mysqli_error($team), E_USER_ERROR);
                              $t = mysqli_fetch_assoc($run);
                              
                              echo "<h3 class='ml-3'>".$t['team_name']."</h3>";
                          ?>
                      </div>
                    </div>
                    <hr>
                  	<div class="row">
                   <?php
                   			$members = "SELECT *, CONCAT(s.fname,' ',s.lname) as name, s.role as role, t.team_name as team FROM staff s LEFT JOIN team t ON t.id = s.team_id WHERE s.team_id = '$id'";
                   			$qry = $conn->query($members) or trigger_error(mysqli_error($conn)." ".$members);
                        if(mysqli_num_rows($qry) > 0){
                            while($a = mysqli_fetch_assoc($qry)){
                            $GLOBALS['team'] = $a['team'];
                         ?>
                        <div class="col-lg-4 col-md-6 mt-3">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php
                                            $currYear= date("Y");
                                            $birthYear = date("Y",strtotime($a['bday']));
                                            $age = $currYear - $birthYear;
                                        ?>
                                      <b class="mr-1">Member Name:</b> <?php echo ucwords($a['name']); ?>
                                       <br>
                                      <b class="mr-1">Age:</b> <?php echo $age; ?>
                                        <br>
                                      <b class="mr-1">Role:</b> <?php echo $a['role'] ?>
                                      <br>
                                      <b class="mr-1">Address:</b> <?php echo ucwords($a['address']) ?>
                                      <br>
                                      <b class="mr-1">Contact:</b> <?php echo $a['contact'] ?>
                                       <br>
                                      <b class="mr-1">Username:</b> <?php echo $a['username'] ?>
                                       <br>
                                      <b class="mr-1">Password:</b> <?php echo $a['password'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                   	<?php } } else{
                        echo "
                        <div class='col-lg-4 mt-4'>
                                <div class='card-body'>
                                  <h3>No members added yet</h3>
                                </div>
                        </div>
                        ";
                    } }?>
               		 </div>
               		</div>
                </div>
		    </div>
		</div>
	</div>
</div>


<?php include ('layouts/footer.php'); ?>