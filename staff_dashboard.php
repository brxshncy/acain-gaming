<?php 
	session_start();
	$currentPage = 'Staff Dashboard';
	$title = 'Staff Dashboard';
	$pageTitle = 'Add staff';
	include ('stafflayouts/header.php');
 ?>
<?php 
if(isset($_SESSION['username'])){
    		require('controller/db.php');
    		$username = $_SESSION['username'];
    		$staff = $conn->query("SELECT *, CONCAT(staff.fname,' ',staff.lname) as name FROM staff WHERE username = '$username'");
    		$a = mysqli_fetch_assoc($staff);
    		$_SESSION['name'] = $a['name'];
    	}
include('stafflayouts/sidebar.php'); 
?>
   <div class="main-content">

    	 <?php include('layouts/header_content.php'); ?>

    
    
   </div>
        
<?php include ('layouts/footer.php'); ?>