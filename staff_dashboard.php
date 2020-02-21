<?php 
	session_start();
	$currentPage = 'Staff Dashboard';
	$title = 'Staff Dashboard';
	$pageTitle = 'Add staff';
	include ('stafflayouts/header.php');
 ?>
<?php 
if(isset($_SESSION['id'])){
        $session_id = $_SESSION['id'];
    		require('controller/db.php');
    		$staff = $conn->query("SELECT *, CONCAT(staff.fname,' ',staff.lname) as name FROM staff WHERE id = '$session_id'");
    		$a = mysqli_fetch_assoc($staff);
    	}
include('stafflayouts/sidebar.php'); 
?>
   <div class="main-content">

    	 <?php include('layouts/header_content.php'); ?>

    
    
   </div>
        
<?php include ('layouts/footer.php'); ?>