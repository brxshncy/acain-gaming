<div class="modal fade bd-example-modal-lg" id="e_history_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">Owner Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="prop_details">
                <form action="controller/edit_property_history.php" method="POST">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label>Date Inquired</label>
                                <input type="hidden" class="form-control" id="e_h_id" name="h_id">
                                <input type="hidden" class="form-control" id="e_property_id" name="p_id">
                                <input type="date" class="form-control" id="e_date_inquired" name="e_date_inquired">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h5>Owner Info</h5>
                        </div>
                    </div>
                     <div class="row mt-4">
                        <div class="col col-md-5">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="e_owner_fname" name="e_owner_fname">
                            </div>
                        </div>
                         <div class="col col-md-5">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="e_owner_lname" name="e_owner_lname">
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" id="e_owner_mname" name="e_owner_mname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="e_address" name="e_address">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" id="e_contact" name="e_contact">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="date" class="form-control" id="e_age" name="e_age">
                            </div>
                        </div>
                    </div>
                    <hr>
                     <div class="row mt-2">
                        <div class="col col-md-6">
                           <h5>Property Info</h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col col-md-6">
                            <label>Kind of Property</label>
                            <input type="text" class="form-control" id="e_kind_prop" name="e_kind_prop">
                        </div>
                         <div class="col col-md-6">
                            <label>Actual Use</label>
                            <input type="text" class="form-control" id="e_actual_use" name="e_actual_use">
                        </div>
                    </div>
                     <div class="row mt-4">
                        <div class="col col-md-6">
                            <label>Property Measurement</label>
                            <input type="text" class="form-control" id="e_prop_measurement" name="e_prop_measurement">
                        </div>
                          <div class="col col-md-6">
                            <label>Property Value</label>
                            <input type="text" class="form-control" id="e_prop_value" name="e_prop_value">
                        </div>
                    </div>
                   
                     <hr>
                    <div class="row mt-2">
                        <div class="col col-md-6">
                           <h5>Boundaries</h5>
                        </div>
                    </div>
                    <div class="row mt-">
                        <div class="col col-md-6">
                            <label>North</label>
                            <input type="text" class="form-control" id="e_north" name="e_north">
                        </div>
                          <div class="col col-md-6">
                            <label>East</label>
                            <input type="text" class="form-control" id="e_east" name="e_east">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-md-6">
                            <label>West</label>
                            <input type="text" class="form-control" id="e_west" name="e_west">
                        </div>
                         <div class="col col">
                            <label>South</label>
                            <input type="text" class="form-control" id="e_south" name="e_south">
                        </div>
                    </div>
                     <div class="modal-footer">  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>