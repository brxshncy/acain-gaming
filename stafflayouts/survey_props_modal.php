 <div class="modal fade bd-example-modal-lg" id="survey_modal">
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
            <div class="form-group">
                <label>Property ID</label>
                <select name="property" id="property" class="form-control">
                    <option value="">-- Unsurveyed properties --</option>
                    <?php
                        $props = "SELECT * FROM property WHERE status = 0";
                        $qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
                        while($row = mysqli_fetch_assoc($qry)):?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['prop_u_id'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div id="prop_s_details">
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Available Compositives</h5>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
        <?php
            $compositive = "SELECT * FROM compositive WHERE status = 0";
            $qry_1  = $conn->query($compositive) or trigger_error(mysqli_error($conn." ".$qry_1));
            if(mysqli_num_rows($qry_1) > 0){
            while($a = mysqli_fetch_assoc($qry_1)) { ?>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo $a['id'] ?>">
                  <label class="form-check-label" for="inlineRadio1"><?php echo $a['fname']." ".$a['lname']; ?></label>
                </div>
        <?php } } else {
            echo "<b>No compositive available</b>";
            }
        ?>
        </div>
    </div>
    <hr>
    <div class="modal-footer">  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save Property</button>
    </div>
</form>
              
        </div>
    </div>
  </div>
</div>