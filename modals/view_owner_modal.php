<div class="modal fade bd-example-modal-lg" id="v_owner_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Owner Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="controller/owner.php" method="post">
                <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="address" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" id="age" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Gender</label>
                             <input type="text" class="form-control" name="gender" id="gender" readonly>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Civil Status</label>
                           <input type="text" class="form-control" name="status" id="status" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="number" class="form-control" name="contact" id="contact" readonly>
                        </div>
                    </div>
                </div>
        </div>
    </form>
    </div>
  </div>
</div>