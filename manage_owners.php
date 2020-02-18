<?php 
    session_start();
    $currentPage = 'Manage Property Owners';
    $title = 'Manage Property Owners';
    $pageTitle = 'Manage Property Owners';
    include ('stafflayouts/header.php');
 ?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
<?php include('layouts/header_content.php'); ?>
<?php include('stafflayouts/page_title.php'); ?>

    <div class="row justify-content-center">
        <div class="col col-md-12">
            
                <div class="row mt-3 mb-3">
                    <div class="col">
                            <button type="button" class="btn btn-success pull-right" id="add_owner">Add Owners</button>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['suc'])):?>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="alert alert-success">
                                <p class="text-center">
                                    <?php 
                                          echo $_SESSION['suc']; 
                                          unset($_SESSION['suc']);
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php
                if(isset($_SESSION['update'])):?>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="alert alert-info">
                                <p class="text-center">
                                    <?php 
                                          echo $_SESSION['update']; 
                                          unset($_SESSION['update']);
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="card p-3">
                    <table class="table table-striped table-bordered mt-2">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">No.</th>
                          <th scope="col" class="text-center">Owner Name</th>
                          <th class="text-center">Address</th>
                          <th class="text-center">Contact</th>
                          <th class="text-center">Property Owned</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            require('controller/db.php');
                            $owners = "SELECT *, (SELECT COUNT(pp.owner_id) FROM owner oo LEFT JOIN property pp ON oo.id = pp.owner_id WHERE pp.owner_id = o.id) as number_properties, o.id as o_id FROM owner o  ORDER BY o.id DESC";
                            $qry = $conn->query($owners) or trigger_error(mysqli_error($conn)." ".$owners);
                            $counter = 0;
                            if(mysqli_num_rows($qry) > 0){
                                while($row = mysqli_fetch_assoc($qry)){ $counter++; ?>
                                <tr>
                                    <td class="text-center"><?php echo $counter; ?></td>
                                    <td class="text-center"><?php echo ucwords($row['fname']." ".$row['mname']." ".$row['lname']); ?></td>
                                    <td class="text-center"><?php echo ucwords($row['address']); ?></td>
                                    <td class="text-center"><?php echo $row['contact']; ?></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="property_owned" id="<?php echo $row['o_id'] ?>" title="View Properties">
                                            <?php echo $row['number_properties']; ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="add_property.php?q=<?php echo $row['o_id'] ?>" class="mr-2" id="<?php echo $row['o_id'] ?>" title="Add Properties">
                                            <i class="fa fa-building"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="v_owner_details" id="<?php echo $row['o_id'] ?>" title="View Full Details">
                                            <i class="fa fa-eye text-success"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="e_owner_details" id="<?php echo $row['o_id'] ?>" title="Edit">
                                            <i class="fa fa-edit text-info ml-2"></i>
                                         </a>
                                    </td>
                                </tr>
                        <?php  
                            }   }
                        ?>
                      </tbody>
                    </table>
                </div>
        </div>
    </div>      
</div>
<?php include('modals/add_owner_modal.php'); ?>
<?php include('modals/view_owner_modal.php'); ?>
<?php include('modals/edit_owner_modal.php'); ?>
<?php include('modals/owned_properties.php'); ?>
<?php include ('stafflayouts/footer.php'); ?>