 <div class="modal fade bd-example-modal-lg" id="add_property">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">INSPECTION REQUEST SLIP</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
                <div class="modal-body">
             
<form action="controller/properties_sale_data.php" method="POST">
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Date Acquired:</label>
            <?php
                date_default_timezone_set("Asia/Manila");
                $date_inquire = date("F j, Y");
            ?>
            <input type="text" value="<?php  echo $date_inquire ?>" name="date_inquire" class="form-control" readonly="">
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col col-md-6">
           <h5>Onwer Details</h5>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="fname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="fname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="fname">
            </div>
        </div>
    </div>
        <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Birthday</label>
                <input type="date" class="form-control" name="fname">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Contact</label>
                <input type="text" class="form-control" name="fname">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Property Details</h5>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Property ID</label>
                <input type="text" class="form-control" name="prop_id">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Barangay</label>
                <select name="brgy" class="form-control">
                    <option value="">Select Barangay</option>
                  <?php
                        /*require('controller/db.php');
                        $brgy = "SELECT * FROM barangay";
                        $qry= $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
                        while($a = mysqli_fetch_assoc($qry)){?>
                        <option value="<?php echo $a['baranggay_name'] ?>">
                            <?php echo $a['baranggay_name'] ?> 
                            
                        </option>

                    <?php  }*/
                    ?>
                    <option value="Abuno">Abuno</option>
                </select>
            </div>
        </div>
    </div>
     <div class="row mt-2">
        <div class="col">
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mt-2">
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
                <label>Actual Use:</label>
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
                <input type="text" name="lot_size" class="form-control" value="NW">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>East</label>
                <input type="text" name="lot_size" class="form-control"  value="NE">
            </div>
        </div>
    </div>
      <div class="row mt-2">
        <div class="col">
            <div class="form-group">
                <label>West</label>
                <input type="text" name="lot_size" class="form-control"  value="SW">
            </div>
        </div>
         <div class="col">
            <div class="form-group">
                <label>South</label>
                <input type="text" name="lot_size" class="form-control"  value="SE">
            </div>
        </div>
    </div>
        <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Property Measurement</label>
                <input type="text" class="form-control" name="west">
            </div>
        </div>
    </div>
      <div class="row mt-2">
        <div class="col col-md-4">
            <div class="form-group">
                <label>Property value</label>
                <input type="number" name="prop_value" class="form-control">
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col col-md-6">
           <div class="form-group">
            <label>Surveyor</label>
            <select name="surevyor" class="form-control">
                <option value=""></option>
                <?php
                    require('controller/db.php');
                    $surveyor = "SELECT * FROM team";
                    $qry = $conn->query($surveyor);
                    while($row = mysqli_fetch_assoc($qry)){ ?>
                    <option value=""><?php echo $row['team_name'] ?></option>
                <?php }
                ?>
            </select>
           </div>
        </div>
    </div>
    <div class="modal-footer">  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save Property</button>
    </div>
</form>
              
        </div>
    </div>
  </div>
</div>