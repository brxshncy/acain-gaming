<?php 
  if(isset($_GET['q'])){
    $id = $_GET['q'];?>
    <?php 
    session_start();
    $currentPage = 'Manage Property Owners';
    $title = 'Property Form';
    $pageTitle = 'Property Form';
    include ('stafflayouts/header.php');
 ?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
<?php include('layouts/header_content.php'); ?>
<?php include('stafflayouts/page_title.php'); ?>
<div class="row justify-content-center">
<div class="col col-md-9 mt-4">
<div class="card">
<form action="controller/manage_properties_db.php" method="POST">
  <div class="card-body">
  <?php
    require('controller/db.php');
    $owner = "SELECT * FROM owner WHERE id = '$id'";
    $qry = $conn->query($owner) or trigger_error(mysqli_error($conn)." ".$owner);
    $a = mysqli_fetch_assoc($qry);
  ?>
<div class="invoice-area">
  <div class="invoice-head">
    <div class="row">
      <div class="iv-left col-6">
        <span>Add Property</span>
        </div>
    </div>
  </div>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="invoice-address">
                <h3>Add property to</h3>
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
        <h5>Property Details</h5>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col col-md-4">
        <div class="form-group">
          <label>Property ID</label>
          <input type="text" class="form-control" name="prop_id">
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col col-md-3">
        <div class="form-group">
          <label>Barangay</label>
          <select name="property_brgy" class="form-control form-control-lg">
            <option value=""></option>
            <?php
              $brgy = "SELECT * FROM barangay";
              $brgy_q = $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
              while($a = mysqli_fetch_assoc($brgy_q)){ ?>
              <option value="<?php echo $a['baranggay_name'] ?>"><?php echo $a['baranggay_name']; ?></option>
            <?php }
            ?>
          </select>
        </div>
      </div>
       <div class="col col-md-6">
        <div class="form-group">
          <label>Address</label>
           <input type="text" name="street" class="form-control">
        </div>
      </div>
       <div class="col col-md-3">
        <div class="form-group">
          <label>City</label>
           <input type="text" name="city" class="form-control" value="Iligan City" readonly>
        </div>
      </div>
    </div>
       <div class="row">
        <div class="col col-md-6">
          <div class="form-group">
            <label>Kind of Property</label>
             <select name="kind_prop" class="form-control form-control-lg">
                    <option value="">Select Kind of Property</option>
                    <option value="Deed of Sale">Deed of Sale</option>
                    <option value="Deed of Donation">Deed of Donation</option>
                    <option value="Deed of Assignment">Deed of Assignment</option>
                </select>
          </div>
        </div>
        <div class="col col-md-6">
          <div class="form-group">
            <label>Actual Use</label>
            <select name="actual_use" class="form-control form-control-lg">
                    <option value="">Select</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Residential">Residential</option>
                     <option value="Industrial">Industrial</option>
                </select>
          </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Boundaries</h5>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="form-group">
                <label>North</label>
                <input type="text" name="north" class="form-control">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>East</label>
                <input type="text" name="east" class="form-control">
            </div>
        </div>
    </div>
      <div class="row mt-2">
        <div class="col">
            <div class="form-group">
                <label>West</label>
                <input type="text" name="west" class="form-control">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>South</label>
                <input type="text" name="south" class="form-control">
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Property value</label>
                <input type="number" name="prop_value" class="form-control">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Date Previous Tax Payment</label>
                <input type="date" class="form-control" name="prev_text_payment">
            </div>
        </div>
    </div>
      <div class="row mt-2">
         <div class="col col-md-6">
            <div class="form-group">
                <label>Property Measurement (square meter)</label>
                <input type="number" class="form-control" name="prop_measurement">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Tax Payment Status</label>
                <select name="payment_status" class="form-control">
                  <option value=""></option>
                  <option value="Paid">Paid</option>
                  <option value="Unpaid">Unpaid</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <div class="row mt-4">
        <div class="col col-md-6">
           <div class="form-group">
            <label>Available Compositives</label>
            <select name="compositive" class="form-control">
                <option value=""></option>
                <?php
                    require('controller/db.php');
                    $surveyor = "SELECT * FROM team WHERE status = 0";
                    $qry = $conn->query($surveyor);
                    while($row = mysqli_fetch_assoc($qry)){ ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['team_name'] ?></option>
                <?php }
                ?>
            </select> 
           </div>
        </div>
        <div class="col md-1">
          <input type="hidden" name="status" value="0">
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
           <button type="submit" name="add" class="btn btn-success btn-block">Add</button>
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
