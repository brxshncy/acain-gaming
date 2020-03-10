<?php 
	session_start();
	$currentPage = 'Manage Properties';
	$title = 'Manage Properties';
	$pageTitle = 'Manage Properties';
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
                		<a href="property_form.php">
                			<button type="button" class="btn btn-success pull-right">Add Property</button>
                		</a>
                	</div>
                </div>
                <?php
    			if(isset($_SESSION['daaa'])):?>
    				<div class="row mt-2 justify-content-center">
    					<div class="col col-md-10">
    						<div class="alert alert-success">
    							<p class="text-center">
    								<?php 
    									  echo $_SESSION['daaa']; 
    									  unset($_SESSION['daaa']);
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
					      <th scope="col" class="text-center">Owner</th>
                          <th scope="col" class="text-center">Property ID</th>
                          <th scope="col" class="text-center">Location</th>
                          <th scope="col" class="text-center">Property Area</th>
                          <th scope="col" class="text-center">Property Value</th>
                          <th scope="col" class="text-center">Tax Value</th>
					      <th class="text-center">Tax Mapper</th>
                          <th class="text-center">Examiner</th>
                          <th class="text-center">Appraiser</th>
					      <th scope="col" class="text-center">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php
					    	require('controller/db.php');
					    	$props = "SELECT CONCAT(o.fname,' ',o.mname,' ',o.lname) as name,p.tm_status as tm_status,p.apr_status as apr_status,p.exm_status as exm_status,p.prop_measurement as measurement, p.prop_value as value,p.property_id as property_id,p.property_brgy as property_brgy, p.street as street, p.city as city, p.id as p_id,t.id as t_id FROM property p LEFT JOIN team t ON p.team_id = t.id LEFT JOIN owner o ON o.id = p.owner_id WHERE p.tm_status =0 AND p.apr_status = 0 AND p.exm_status = 0   ORDER BY p.id DESC";
					    	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
					    	$counter = 0;
					    	while($a = mysqli_fetch_assoc($qry)){ $counter++; ?>
					    <tr>
					    	<td class="text-center"><?php echo $counter; ?></td>
					    	<td class="text-center"><?php echo ucwords($a['name']); ?></td>
                            <td class="text-center"><?php echo ucwords($a['property_id']); ?></td>
                            <td class="text-center"><?php echo ucwords($a['property_brgy']." ".$a['street']." ".$a['city']); ?></td>
                            <td class="text-center"><?php echo number_format($a['measurement'],-1)." sqm"; ?></td>
                            <td class="text-center">&#8369; <?php  echo number_format($a['value']) ?></td>
                            <?php
                                $tax = "SELECT * FROM tax_percentage";
                                $qry_1 =$conn->query($tax) or trigger_error(mysqli_error($conn)." ".$tax);
                                $b = mysqli_fetch_assoc($qry_1);
                                $tax =  $a['value'] * $b['tax'];
                            ?>  
                            <td class="text-center">
                               &#8369; <?php echo number_format($tax) ?>
                            </td>
                            <td class="text-center">
                                <?php 
                                    if($a['tm_status'] == 1 && $a['exm_status'] == 1 && $a['apr_status'] == 1){
                                        $team_id = $a['t_id'];
                                        $update = "UPDATE team SET status = 0 WHERE id =' $team_id'";
                                        $qry_2 = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
                                        if($qry_2){
                                            echo "";
                                        }
                                    }
                                ?>
                                <?php
                                    if($a['tm_status'] == 0){
                                        echo "<i class='fa fa-close text-danger'></i>";
                                    }
                                    else if($a['tm_status'] == 1){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                ?>
                            </td>
                             <td class="text-center">
                                <?php
                                    if($a['exm_status'] == 0){
                                        echo "<i class='fa fa-close text-danger'></i>";
                                    }
                                    else if($a['exm_status'] == 1){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                ?>
                            </td>
                             <td class="text-center">
                                <?php
                                    if($a['apr_status'] == 0){
                                       echo "<i class='fa fa-close text-danger'></i>";
                                    }
                                    else if($a['apr_status'] == 1){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" title="View Property Details" class="view_props" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-success"></i>
                                </a>
                                 <a href="javascript:void(0)" title="Edit Property Details" class="edit_props" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-edit text-info ml-2"></i>
                                </a>
                            </td>
					    </tr>
					    <?php }
					    ?>
					  </tbody>
					</table>
                </div>
    	</div>
    </div>		
</div>
<?php include('stafflayouts/add_property_modal.php'); ?>
<?php include('stafflayouts/view_property_modal.php'); ?>
<?php include('modals/edit_property_modal.php'); ?>
<?php include('stafflayouts/property_status_modal.php'); ?>
<?php include ('stafflayouts/footer.php'); ?>