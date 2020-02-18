
<form action="controller/properties_sale_data.php" method="POST">
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Date today:</label>
            <?php
                date_default_timezone_set("Asia/Manila");
                $date_inquire = date("F j, Y");
            ?>
            <input type="text" value="<?php  echo $date_inquire ?>" name="date_inquire" class="form-control" readonly="">
        </div>
        </div>
    </div>
     <div class="row mt-2">
        <div class="col col-md-6">
            <div class="form-group">
                <label>Barangay</label>
                <select name="brgy" class="form-control">
                    <option value="">Select Barangay</option>
                    <?php
                        require('controller/db.php');
                        $brgy = "SELECT * FROM barangay";
                        $qry= $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
                        while($a = mysqli_fetch_assoc($qry)){?>
                        <option value="<?php echo $a['baranggay_name'] ?>">
                            <?php echo $a['baranggay_name'] ?> 
                            
                        </option>
                    <?php  }
                    ?>
                </select>
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
                    <option value="Deed of Exchange">Deed of Exchange</option>
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
    <div class="row mt-2">
        <div class="col col-md-6">
           <h5>Owner Info</h5>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="o_fname">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="o_lname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-3">
            <div class="form-group">
                No. of Lots
                <input type="number" name="number_lots" class="form-control">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Representative</h5>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
           <div class="form-group">
            <label>First Name</label>
                 <input type="text" class="form-control" name="r_fname">
           </div>
        </div>
        <div class="col">
           <div class="form-group">
            <label>Last Name</label>
                 <input type="text" class="form-control" name="r_lname">
           </div>
        </div>
    </div>
     <div class="row mt-4">
        <div class="col">
           <div class="form-group">
            <label>Address</label>
                 <input type="text" class="form-control" name="r_address">
           </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-md-6">
           <div class="form-group">
            <label>Contact</label>
                 <input type="number" class="form-control" name="r_contact">
           </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
           <div class="form-group">
            <label>Remarks</label>
                <textarea name="remarks" class="form-control" rows="3"></textarea>
           </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-md-6">
           <div class="form-group">
            <label>Received By:</label>
            <?php
                require('controller/db.php');
                $username = $_SESSION['username'];
                $id = "SELECT * FROM staff WHERE username = '$username'";
                $chk = $conn->query($id) or trigger_error(mysqli_error($conn)." ".$id);
                $a = mysqli_fetch_assoc($chk);
            ?>
               <input type="hidden" class="form-control" value="<?php echo $a['id'] ?>" name="staff_recieve" readonly>
               <input type="text" class="form-control" value="<?php echo ucwords($_SESSION['name']) ?>" readonly>
           </div>
        </div>
    </div>
    <div class="modal-footer">  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save Property</button>
    </div>
</form>