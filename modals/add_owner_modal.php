<div class="modal fade bd-example-modal-lg" id="owner_modal">
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
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname">
                        </div>
                    </div>
                     <div class="col">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label>Middle Name</label>
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
                            <select name="status" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Civil Status</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="number" class="form-control" name="contact">
                        </div>
                    </div>
                </div>
                 <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
        </div>
    </form>
    </div>
  </div>
</div>