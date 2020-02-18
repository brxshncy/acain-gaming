
 <div class="modal fade bd-example-modal-lg" id="compositive_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Staff Details</h5>
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
                                         <div class="col col-md-5">
                                            <div class="form-group">
                                                <label>Birthdate</label>
                                                <input type="date" class="form-control" name="bday" required>
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
                                    <div class="row">
                                            <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="Appraiser">Appraiser</option>
                                                    <option value="Examiner">Examiner</option>
                                                    <option value="Tax Mapper">Tax Mapper</option>
                                                </select>
                                            </div>
                                         </div>
                                         <div class="col col-md-6">
                                                <div class="form-group">
                                                    <label>Team</label>
                                                    <select name="team" class="form-control" required>
                                                        <option value="">Select Team</option>
                                                        <?php
                                                            $team = "SELECT * FROM team";
                                                            $qry = $conn->query($team) or trigger_error("Error", $team);
                                                            while($row = mysqli_fetch_assoc($qry)){ ?>
                                                            <option value="<?php echo $row['id'] ?>"> <?php echo $row['team_name'] ?> </option>
                                                         <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                         </div>
                                    </div>
                                     <div class="row mt-4 justify-content-center">
                                       <div class="col col-md-4">
                                            <button type="submit" name="submit" class="btn btn-success btn-block rounded">Register</button>
                                       </div>
                                    </div>
                            </div>
                       </form>
    </div>
  </div>
</div>