<div class="modal fade bd-example-modal-lg" id="appraiser_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Appraiser Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="controller/staff.php" method="POST">
                            <div class="card-body">
                                   <div class="row">
                                         <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" required>
                                            </div>
                                         </div>
                                          <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" required>
                                            </div>
                                         </div>
                                     </div>
                                      <div class="row">
                                         <div class="col">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" required>
                                            </div>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="text" class="form-control" name="contact" required>
                                            </div>
                                         </div>
                                         <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input type="date" class="form-control" name="bday" required>
                                            </div>
                                         </div>
                                     </div>
                                      <div class="row">
                                         <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                               <select name="gender" class="form-control">
                                                   <option value=""></option>
                                                   <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                               </select>
                                            </div>
                                         </div>
                                     </div>
                                    <div class="row">
                                             <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
                                         </div>
                                          <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" required>
                                            </div>
                                         </div>
                                    </div>
                                     <div class="row mt-4 justify-content-center">
                                       <div class="col col-md-4">
                                            <button type="submit" name="register" class="btn btn-success btn-block rounded">Register</button>
                                       </div>
                                    </div>
                            </div>
                       </form>
    </div>
  </div>
</div>