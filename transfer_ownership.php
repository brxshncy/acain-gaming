<?php 
  if(isset($_GET['q'])){
    $id = $_GET['q'];?>
    <?php 
    session_start();
    $currentPage = 'Surveyed Properties';
    $title = 'Transfer of Ownership';
    $pageTitle = 'Transfer of Ownership';
    include ('stafflayouts/header.php');
 ?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
<?php include('layouts/header_content.php'); ?>
<?php include('stafflayouts/page_title.php'); ?>
<div class="row justify-content-center">
<div class="col col-md-9 mt-4">
<div class="card">
<form action="controller/transfer.php" method="POST">
  <div class="card-body">
  <?php
    require('controller/db.php');
    $owner = "SELECT * FROM property p LEFT JOIN owner o ON p.owner_id = o.id WHERE p.id = '$id'";
    $qry = $conn->query($owner) or trigger_error(mysqli_error($conn)." ".$owner);
    $a = mysqli_fetch_assoc($qry);
  ?>
<div class="invoice-area">
  <div class="invoice-head">
    <div class="row">
      <div class="iv-left col-6">
        <span>Transfer of Ownership</span>
        </div>
    </div>
  </div>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="invoice-address">
                <h3>Transfer of Ownership From</h3>
                <h5><?php echo ucwords($a['fname']." ".$a['mname']." ".$a['lname']); ?></h5>
                <p><?php echo ucwords($a['address']); ?></p>
                <p><?php echo ucwords($a['contact']); ?></p>
                <p><?php echo ucwords($a['status']); ?></p>
            </div>
        </div>
        <div class="col-md-6 text-md-right">
             <ul class="invoice-date">
              <?php
                $date_acquired = date("F j, Y");
              ?>
                <li>Date Acquired: <u><?php echo $date_acquired; ?></u></li>
                <input type="hidden" value="<?php echo $a['id'] ?>" name="owner_id">
                <input type="hidden" value="<?php echo $date_acquired ?>" name="date_acquired">
              </ul>
        </div>
  </div>
</div>
    <div class="row mt-4">
      <div class="col text-md-left">
        <h5>To</h5>
      </div>
    </div>
    <hr>
    <div class="row">
    </div>
<div class="row mt-4">
  <div class="col col-md-8">
  </div>
<?php
   $id = $_SESSION['id'];
   $appraiser = "SELECT * FROM office_appraiser WHERE id =$id";
   $qry = $conn->query($appraiser) or trigger_error(mysqli_error($conn)." ".$appraiser);
   $a = mysqli_fetch_assoc($qry);
   $name = ucwords($a['fname']." ".$a['lname']);
?>
  <div class="col col-md-4">
    <div class="form-group">
      <label>Appraised by:</label>
      <input type="hidden" name="appraiser" value="<?php echo $a['id']; ?>" class="form-control" readonly>
      <input type="text" value="<?php echo $name; ?>" class="form-control" readonly>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col col-md-6">
    <button type="submit" name="add" class="btn btn-success btn-block">Transfer</button>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include ('stafflayouts/footer.php'); ?>
 <?php  }
?>
