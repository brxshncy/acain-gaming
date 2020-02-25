
<?php 
    session_start();
    $currentPage = 'Manage Property Owners';
    $title = 'Owned Properties';
    $pageTitle = 'Owned Properties';
    include ('stafflayouts/header.php');
 ?>
<?php include('stafflayouts/sidebar.php'); ?>
<div class="main-content-inner">
<?php include('layouts/header_content.php'); ?>
<?php include('stafflayouts/page_title.php'); ?>
<?php if(isset($_GET['q'])):
    require("controller/db.php");
    $id = $_GET['q'];
    $props = "SELECT * FROM property p LEFT JOIN owner o ON p.owner_id = o.id WHERE o.id = '$id'";
    $qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
    while($a = mysqli_fetch_assoc($qry)):?>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>Property Details</span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h5>Owner:</h5>
                                                <input type="text" class="form-control" value="<?php echo ucwords($a['fname']." ".$a['mname']." ".$a['lname']); ?>" style="border-width: 0 0 2px; border-color: black">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h5>Property ID:</h5>
                                                <input type="text" class="form-control" value="<?php echo $a['property_id'] ?>" style="border-width: 0 0 2px; border-color: black">
                                            </div>
                                        </div>
                                    </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-md-9">
                                <div class="invoice-address">
                                    <h5>Owner Address:</h5>
                                    <input type="text" class="form-control" value="<?php echo ucwords($a['address']); ?>" style="border-width: 0 0 2px; border-color: black">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-address">
                                    <h5>Owner Contact:</h5>
                                    <input type="text" class="form-control" value="<?php echo $a['contact'] ?>" style="border-width: 0 0 2px; border-color: black">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-md-3">
                                <div class="invoice-address">
                                    <h5>Location of Property:</h5>
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control text-center" value="<?php echo ucwords($a['property_brgy']); ?>" style="border-width: 0 0 2px; border-color: black">
                                         <p class="text-center">Barangay</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group mt-4"> 
                                    <input type="text" class="form-control text-center" value="<?php echo ucwords($a['street']); ?>" style="border-width: 0 0 2px; border-color: black">
                                    <p class="text-center">Street</p>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group mt-4"> 
                                    <input type="text" class="form-control text-center" value="<?php echo ucwords($a['city']); ?>" style="border-width: 0 0 2px; border-color: black">
                                    <p class="text-center">City</p>
                                    </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col">
                                <h5>Boundaries:</h5>
                            </div>
                        </div>
                         <div class="row align-items-center mt-3">
                            <div class="col col-md-3">
                                <div class="form-group mt-2">
                                        <input type="text" class="form-control text-center" value="<?php echo $a['north']; ?>" style="border-width: 0 0 2px; border-color: black">
                                         <p class="text-center">North</p>
                                    </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group mt-2">
                                        <input type="text" class="form-control text-center" value="<?php echo $a['east']; ?>" style="border-width: 0 0 2px; border-color: black">
                                         <p class="text-center">East</p>
                                    </div>
                            </div>
                              <div class="col col-md-3">
                                <div class="form-group mt-2">
                                        <input type="text" class="form-control text-center" value="<?php echo $a['west']; ?>" style="border-width: 0 0 2px; border-color: black">
                                         <p class="text-center">South</p>
                                    </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group mt-2">
                                        <input type="text" class="form-control text-center" value="<?php echo $a['south']; ?>" style="border-width: 0 0 2px; border-color: black">
                                         <p class="text-center">West</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

           
<?php endwhile ?>
<?php endif ?>  
</div>
<?php include('modals/add_owner_modal.php'); ?>
<?php include('modals/view_owner_modal.php'); ?>
<?php include('modals/edit_owner_modal.php'); ?>
<?php include('modals/owned_properties.php'); ?>
<?php include ('stafflayouts/footer.php'); ?>