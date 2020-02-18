<div class="modal fade bd-example-modal-lg" id="team_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Team Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="controller/team.php" method="POST">
                <div class="card-body">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label>Team Name</label>
                                    <input type="text" name="team" class="form-control">
                                </div>
                             </div>
                              <div class="col col-md-6">
                                <label>&nbsp;</label>
                                <button type="submit" name="submit" class="btn btn-success btn-block rounded">Add</button>
                            </div>
                        </div>
                </div>
            </form>
    </div>
  </div>
</div>