 <div class="modal fade bd-example-modal-lg" id="edit_property_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Property Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
                <div class="modal-body">
             
<form action="controller/edit_property.php" method="POST">
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Property ID</label>
                <input type="hidden" name="property_id" id="property_idd">
                <input type="text" class="form-control" name="prop_id" id="prop_id">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Barangay</label>
                <select name="brgy" id="e_brgy" class="form-control">
                    <option value="">Select Barangay</option>
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
    </div>
     <div class="row mt-2">
        <div class="col">
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" id="e_address"  class="form-control">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Kind of Property</label>
                <select name="kind_prop" id="e_kind_prop"  class="form-control form-control-lg" required="">
                    <option value="">Select Kind of Property</option>
                    <option value="Deed of Sale">Deed of Sale</option>
                    <option value="Deed of Donation">Deed of Donation</option>
                    <option value="Deed of Assignment">Deed of Assignment</option>
                </select>
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Actual Use:</label>
                 <select name="actual_use" id="e_actual_use"  class="form-control form-control-lg" required>
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
                <input type="text" name="north" id="e_north"  class="form-control">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>East</label>
                <input type="text" name="east" id="e_east"  class="form-control">
            </div>
        </div>
    </div>
      <div class="row mt-2">
        <div class="col">
            <div class="form-group">
                <label>West</label>
                <input type="text" name="west" id="e_west"  class="form-control">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>South</label>
                <input type="text" name="south" id="e_south"  class="form-control">
            </div>
        </div>
    </div>
        <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Property Measurement</label>
                <input type="text" class="form-control" id="e_prop_measurement"  name="prop_measurement">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>Date Previous Tax Payment</label>
                <input type="date" class="form-control" id="e_date_prev_payment"  name="e_date_prev_payment">
            </div>
        </div>
    </div>
      <div class="row mt-2">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Property value</label>
                <input type="number" name="prop_value"  id="e_prop_value" class="form-control">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Tax Payment Status</label>
                <select name="e_tax_payment" id="e_tax_payment"  class="form-control form-control-lg">
                    <option value="">Select</option>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col col-md-6">
           <div class="form-group">
            <label>Assigned Compositives:</label>
            <select name="e_surevyor" id="e_surevyor" class="form-control">
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
         <div class="col col-md-6">
           <div class="form-group">
            <label>Status</label>
            <input type="text" id="e_status" class="form-control" readonly="">
           </div>
        </div>
    </div>
    <div class="modal-footer">  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </div>
</form>
              
        </div>
    </div>
  </div>
</div>