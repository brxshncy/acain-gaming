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
    $owner = "SELECT *,pb.total_area as total_area,o.id as owner_id,p.id as p_id,pb.north as north,pb.south as south,pb.east as east,pb.west as west FROM property p LEFT JOIN owner o ON p.owner_id = o.id left join property_boundaries pb on p.id = pb.prop_id left join property_title pt on pt.prop_id = p.id left join property_inspection pi on pi.prop_id = p.id WHERE p.id = '$id'";
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
                <h5>Address: <?php echo ucwords($a['property_brgy']." ".$a['street']." ".$a['city']); ?></h5>
                <h5>Property ID: <u><?php echo ucwords($a['property_id']); ?></u></h5>
                <h5>Boundaries: <u><?php echo "North: ".$a['north'].", South: ".$a['south'].", East: ".$a['east'].", West: ".$a['west'] ?></u></h5>
            </div>
        </div>
        <div class="col-md-6 text-md-right">
             <div class="invoice-address">
                <?php 
                    date_default_timezone_set("Asia/Manila");
                  echo "<h5>Date of Issuance: ".date("D F j, Y")."</h5>";
                ?>
                <h5>Property Serial Number: <u><?php echo $a['serial_number'] ?></u></h5>
                <h5>Building Permit: <u><?php echo $a['building_permit'] ?></u></h5>
                <h5>Lot size: <?php echo $a['total_area']." sqm"; ?></h5>
             </div>
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
      <div class="col col-md-5">
       <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" name="fname">
          <input type="hidden" name="p_id" value="<?php echo $a['p_id'] ?>">
          <input type="hidden" name="o_id" value="<?php echo $a['owner_id'] ?>">
      </div> 
    </div>
     <div class="col col col-md-5">
       <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="lname">
      </div>
    </div>
         <div class="col col col-md-2">
       <div class="form-group">
          <label>Middle Initial</label>
          <input type="text" class="form-control" name="mname">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address">
      </div>
    </div>
  </div>
<div class="row">
    <div class="col">
      <div class="form-group">
        <label>Birthday</label>
        <input type="date" class="form-control" name="bday">
      </div>
    </div>
     <div class="col">
      <div class="form-group">
        <label>Gender</label>
         <select name="gender" class="form-control">
          <option value=""></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
    </div>
</div>
<div class="row">
    <div class="col">
      <div class="form-group">
        <label>Contact</label>
        <input type="number" class="form-control" name="contact">
      </div>
    </div>
     <div class="col">
      <div class="form-group">
        <label>Civil Status</label>
        <select name="status" class="form-control">
          <option value=""></option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Widowed">Widowed</option>
        </select>
      </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-6">
      <div class="form-group">
        <label>Transference</label>
        <select name="transfer_type" class="form-control">
          <option value=""></option>
          <option value="Inheritance">Inheritance</option>
          <option value="Business">Business</option>
          <option value="Trade/Exchange">Trade/Exchange</option>
        </select>
      </div>
    </div>
</div>
<hr>
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
    <button type="submit" name="transfer" class="btn btn-success btn-block">Transfer</button>
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
