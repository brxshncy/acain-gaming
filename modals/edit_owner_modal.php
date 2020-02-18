<div class="modal fade bd-example-modal-lg" id="e_owner_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Owner Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="controller/edit_owner.php" method="post">
                <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="hidden" id="e_id" name="e_id">
                            <input type="text" class="form-control" name="e_fname" id="e_fname">
                        </div>
                    </div>
                     <div class="col">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="e_lname" id="e_lname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="e_mname" id="e_mname" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="e_address" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" id="e_age" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" id="e_gender" class="form-control">
                                <option value=""></option>
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
                            <select name="status" id="e_status" class="form-control">
                                <option value=""></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="number" class="form-control" name="contact" id="e_contact" >
                        </div>
                    </div>
                </div>
                 <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                </div>
        </div>
    </form>
    </div>
  </div>
</div>