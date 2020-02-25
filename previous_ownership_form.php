<?php 
    session_start();
    $currentPage = 'Import Previous Property Ownership';
    $title = 'Previous Owner Form';
    $pageTitle = 'Previous Owner Form';
    include ('stafflayouts/header.php');
 ?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
<?php include('layouts/header_content.php'); ?>
<?php include('stafflayouts/page_title.php'); ?>
<div class="row justify-content-center">
<div class="col col-md-9 mt-4">
<div class="card">
<form action="controller/previous_property_details.php" method="POST">
<div class="card-body">
  <?php
    if(isset($_GET['q'])){
      $id = $_GET['q'];
    }
  ?>
  <div class="row">
    <div class="col">
      <input type="hidden" value="<?php echo $id ?>" name="property_id">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h5 class="text-center">Previous Owner Details</h5>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col col-md-5">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" name="p_fname" class="form-control">
      </div>
    </div>
    <div class="col col-md-5">
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="p_lname" class="form-control">
      </div>
    </div>
     <div class="col">
      <div class="form-group">
        <label>Middle Name/Initial</label>
        <input type="text" name="p_mname" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label>Address</label>
        <input type="text" name="p_address" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col col-md-6">
      <div class="form-group">
        <label>Contact</label>
        <input type="text" name="p_contact" class="form-control">
      </div>
    </div>
    <div class="col col-md-6">
      <div class="form-group">
        <label>Birthday</label>
        <input type="date" name="p_bday" class="form-control">
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col">
      <h5 class="text-center">Previous Property Details</h5>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label>Kind of Property</label>
         <select name="p_kind_property" class="form-control form-control-lg">
                    <option value="">Select Kind of Property</option>
                    <option value="Deed of Sale">Deed of Sale</option>
                    <option value="Deed of Donation">Deed of Donation</option>
                    <option value="Deed of Assignment">Deed of Assignment</option>
                </select>
      </div>
    </div>
     <div class="col">
      <div class="form-group">
        <label>Actual Use</label>
         <select name="p_actual_use" class="form-control form-control-lg">
              <option value="">Select</option>
              <option value="Commercial">Commercial</option>
              <option value="Residential">Residential</option>
              <option value="Industrial">Industrial</option>
          </select>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <h5>Boundaries</h5>
    </div>
  </div>
    <div class="row mt-3">
      <div class="col">
        <div class="form-group">
          <label>North</label>
          <input type="text" name="p_north" class="form-control" >
        </div>
      </div>
       <div class="col">
        <div class="form-group">
          <label>East</label>
          <input type="text" name="p_east" class="form-control">
        </div>
      </div>
  </div>
   <div class="row mt-3">
      <div class="col">
        <div class="form-group">
          <label>West</label>
          <input type="text" name="p_west" class="form-control" >
        </div>
      </div>
       <div class="col">
        <div class="form-group">
          <label>South</label>
          <input type="text" name="p_south" class="form-control">
        </div>
      </div>
  </div>
   <div class="row mt-3">
      <div class="col">
        <div class="form-group">
          <label>Property Measurement</label>
          <input type="text" name="p_measurement" class="form-control">
        </div>
      </div>
        <div class="col">
        <div class="form-group">
          <label>Property Value</label>
          <input type="text" name="p_value" class="form-control">
        </div>
      </div>
  </div>
  <div class="row mt-3">
      <div class="col col-md-6">
        <div class="form-group">
          <label>Date of Transfer</label>
          <input type="date" name="date_transfer" class="form-control">
        </div>
      </div>
      <div class="col col-md-1">
      </div>
      <div class="col col-md-4 pt-4">
           <button type="submit" name="submit" class="btn btn-success btn-block">Save</button>
        </div>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include ('stafflayouts/footer.php'); ?>