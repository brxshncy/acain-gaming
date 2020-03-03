<?php 
	session_start();
	$currentPage = 'Surveyed Properties';
	$title = 'Surveyed Properties';
	$pageTitle = 'Surveyed Properties';
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
                          <th class="text-center">Compositive</th>
					      <th class="text-center">Tax Mapper</th>
                          <th class="text-center">Examiner</th>
                          <th class="text-center">Appraiser</th>
					      <th scope="col" class="text-center">Records</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php
					    require('controller/db.php');
					    $props = "SELECT CONCAT(o.fname,' ',o.mname,' ',o.lname) as name,pb.total_area as total_area,pi.total_value as total_value,p.tm_status as tm_status,pb.remarks as pb_remarks,pi.remarks as pi_remarks,pt.remarks as pt_remarks, p.apr_status as apr_status,p.exm_status as exm_status,p.prop_measurement as measurement, p.prop_value as value,p.property_id as property_id,p.property_brgy as property_brgy, p.street as street,pi.staff_id as appraiser,pt.staff_id as examiner,pb.staff_id as tax_mapper, p.city as city, p.id as p_id, t.team_name as team FROM property p  LEFT JOIN team t ON p.team_id = t.id LEFT JOIN owner o ON o.id = p.owner_id LEFT JOIN property_boundaries pb ON pb.prop_id = p.id LEFT JOIN property_inspection pi ON pi.prop_id = p.id LEFT JOIN property_title pt ON pt.prop_id = p.id LEFT JOIN staff s ON s.id = pb.staff_id WHERE p.tm_status = 1 AND p.apr_status = 1 AND p.exm_status = 1 ORDER BY p.id DESC";
					    	$qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
					    	$counter = 0;

					    	while($a = mysqli_fetch_assoc($qry)){ $counter++; ?>
                        <?php
                            $appraise = $a['appraiser'];
                            $tm = $a['tax_mapper'];
                            $exm = $a['examiner'];


                            $appraiser = "SELECT CONCAT(s.fname,' ',s.lname) as appraiser,pi.date_surveyed as date_surveyed FROM staff s LEFT JOIN property_inspection pi ON pi.staff_id = s.id WHERE pi.staff_id = '$appraise'";

                            $qry_1 = $conn->query($appraiser) or trigger_error(mysqli_error($conn)." ".$appraiser);
                            $z = mysqli_fetch_assoc($qry_1);
                            $tax_mapper = "SELECT CONCAT(s.fname,' ',s.lname) as mapper,pb.date_surveyed as date_surveyed FROM staff s LEFT JOIN property_boundaries pb ON pb.staff_id = s.id WHERE pb.staff_id ='$tm'";
                            $qry_2 = $conn->query($tax_mapper) or trigger_error(mysqli_error($conn)." ".$tax_mapper);
                            $c = mysqli_fetch_assoc($qry_2);
                            echo $c['mapper'];
                            $examiner = "SELECT CONCAT(s.fname,' ',s.lname) as exm, pt.date_surveyed as date_surveyed FROM staff s LEFT JOIN property_title pt ON pt.staff_id = s.id WHERE pt.staff_id = '$exm'";
                            $qry_3 = $conn->query($examiner) or trigger_error(mysqli_error($conn)." ".$examiner);
                            $d = mysqli_fetch_assoc($qry_3);
                            echo $d['exm'];

                        ?>
					    <tr>
					    	<td class="text-center"><?php echo $counter; ?></td>
					    	<td class="text-center"><?php echo ucwords($a['name']); ?></td>
                            <td class="text-center"><?php echo ucwords($a['property_id']); ?></td>
                            <td class="text-center"><?php echo ucwords($a['property_brgy']." ".$a['street']." ".$a['city']); ?></td>
                            <td class="text-center"><?php echo number_format($a['total_area'],-1)." sqm"; ?></td>
                            <td class="text-center">&#8369; <?php  echo number_format($a['total_value']) ?></td>
                            <?php
                                $tax = "SELECT * FROM tax_percentage";
                                $qry_1 =$conn->query($tax) or trigger_error(mysqli_error($conn)." ".$tax);
                                $b = mysqli_fetch_assoc($qry_1);
                                $tax =  $a['total_value'] * $b['tax'];
                            ?>  
                            <td class="text-center">
                               &#8369; <?php echo number_format($tax) ?>
                            </td>
                            <td class="text-center">
                                <?php
                                    echo $a['team'];
                                ?>
                            </td>
                            <td class="text-center">
                              <a tabindex="0" role="button" data-html="true"  data-toggle="popover" data-trigger="focus" title="<p>Surveyed by:</p>" 
                              data-content="Name: <?php echo ucwords($c['mapper'])?> <br> Date Surveyed: <?php echo date('D F j, Y',strtotime($c['date_surveyed'])) ?>"
                                >
                                <?php
                                    if($a['pb_remarks'] == "Approved"){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                    else if($a['pb_remarks'] == 1){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                ?>
                            </td>
                             <td class="text-center">
                                <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" title="<p>Surveyed by:</p>" 
                                    data-content="Name: <?php echo ucwords($d['exm']) ?> <br> Date Surveyed: <?php echo date('D F j, Y', strtotime($d['date_surveyed']))  ?>">
                                <?php
                                    if($a['pt_remarks'] == "Approve"){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                    else if($a['pt_remarks'] == 1){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                ?>
                            </td>
                             <td class="text-center">
                                <a tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" title="Surveyed by:" 
                                data-content="Name: <?php echo ucwords($z['appraiser']); ?> <br> Date Surveyed: <?php echo date('D F j, Y',strtotime($d['date_surveyed'])) ?>">
                                <?php
                                    if($a['pi_remarks'] == "Approved"){
                                       echo "<i class='fa fa-check text-success'></i>";
                                    }
                                    else if($a['pi_remarks'] == 1){
                                        echo "<i class='fa fa-check text-success'></i>";
                                    }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                    if($a['pb_remarks'] == "Approved" && $a['pi_remarks'] == "Approved" && $a['pt_remarks'] == "Approve"){ ?>
                                <a href="javascript:void(0)" title="View Property Boundaries" class="mr-1 vpb" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-success"></i>
                                </a>
                                 <a href="javascript:void(0)" title="View Property Title" class="vpt mr-1" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-primary"></i>
                                </a>
                                 <a href="javascript:void(0)" title="View Property Inspection" class="vpi" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-black"></i>
                                </a>
                                 <a href="transfer_ownership.php?q=<?php echo $a['p_id'] ?>" title="Transfer of Ownership">
                                    <i  class="fa fa-paste text-danger"></i>
                                </a>

                                <?php  } else { ?>
                                <a href="javascript:void(0)" title="View Property Boundaries" class="mr-1 vpb" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-success"></i>
                                </a>
                                 <a href="javascript:void(0)" title="View Property Title" class="vpt mr-1" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-primary"></i>
                                </a>
                                 <a href="javascript:void(0)" title="View Property Inspection" class="vpi" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-black"></i>
                                </a>
                                <?php } ?>

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
<?php include('modals/pbm.php'); ?>
<?php include ('stafflayouts/footer.php'); ?>