<?php 
    session_start();
    $currentPage = 'Manage Properties';
    $title = 'Property Form';
    $pageTitle = 'Property Form';
    include ('stafflayouts/header.php');
    require('controller/db.php');
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
  <div class="row">
    <div class="col col-md-3">
        <div class="form-group">
          <label>Date Acquired</label>
        <input type="date" class="form-control" name="date_inquire" value="<?php echo $date ?>">
      </div>
  </div>
</div>
    <div class="row">
        <div class="col">
          <h5 class="text-center">Owner Information</h5>
        </div>
    </div>
    <hr>
  <div id="form_info">
    <div class="row">
      <div class="col col-md-5">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="owner_fname" id="owner_fname" class="form-control">
        </div>
      </div>
      <div class="col col-md-5">
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="owner_lname" id="owner_lname" class="form-control">
        </div>
      </div>
      <div class="col col-md-2">
        <div class="form-group">
          <label>Middle Name</label>
          <input type="text" name="owner_mname" id="owner_mname" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label>Current Address</label>
          <input type="text" name="owner_address" id="owner_address" class="form-control">
        </div>
      </div>
    </div>
     <div class="row">
      <div class="col col-md-6">
        <div class="form-group">
          <label>Birthdate</label>
          <input type="date" name="owner_bday" id="owner_bday" class="form-control">
        </div>
      </div>
      <div class="col col-md-6">
        <div class="form-group">
          <label>Contact</label>
          <input type="number" name="owner_contact" id="owner_contact" class="form-control">
        </div>
      </div>
    </div>
     <div class="row">
      <div class="col">
        <div class="form-group">
          <label>Gender</label>
            <select name="gender" class="form-control">
              <option value="">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
        </div>
      </div>
      <div class= "col">
        <div class="form-group">
          <label>Civil Status</label>
            <select name="civil_status" class="form-control">
              <option value="">Select Status</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Widowed">Widowed</option>
            </select>
        </div>
     </div>
    </div>
    <hr>
    <div class="row mt-2">
      <div class="col">
        <h5 class="text-center">Property Details</h5>
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
          <label>Street</label>
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
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col col-md-6">
           <div class="form-group">
            <label>Available Compositives</label>
            <select name="compositive" class="form-control">
                <option value=""></option>
                <?php
                    
                    $surveyor = "SELECT * FROM team WHERE status = 0";
                    $qry = $conn->query($surveyor);
                    while($row = mysqli_fetch_assoc($qry)){ ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['team_name'] ?></option>
                <?php }
                ?>
            </select> 
           </div>
        </div>
        <div class="col col-md-2">
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
            <input type="hidden" name="status" value="0">
           <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php include ('stafflayouts/footer.php'); ?>