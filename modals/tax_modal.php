<div class="modal fade bd-example-modal-lg" id="tax_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Owner Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="controller/tax_db.php" method="post">
                <div class="modal-body">
                    <?php
                        require('controller/db.php');
                        $tax = "SELECT * FROM tax_percentage";
                        $qry = $conn->query($tax) or trigger_error(mysqli_error($conn)." ".$tax);
                        $a = mysqli_fetch_assoc($qry);
                    ?>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Current Tax Rate per Year</label>
                            <input type="text" class="form-control" name="tax_rate" value="<?php echo $a['tax'] * 100 ?>">
                        </div>
                    </div>
                     <div class="col">
                        <div class="form-group">
                            <label>Current Penalty Rate per Month</label>
                            <input type="text" class="form-control" name="penalty" value="<?php echo $a['penalty'] * 100 ?>">
                        </div>
                    </div>
                </div>
                 <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
        </div>
    </form>
    </div>
  </div>
</div>