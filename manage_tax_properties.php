<?php 
	session_start();
	$currentPage = 'Manage Tax Properties';
	$title = 'Manage Tax Properties';
	$pageTitle = 'Manage Tax Properties';
	include ('treasurer/header.php');
 ?>
<?php include('treasurer/sidebar.php'); ?>
<div class="main-content-inner">
<?php include('treasurer/header_content.php'); ?>
<?php include('treasurer/page_title.php'); ?>

    <div class="row justify-content-center">
    	<div class="col col-md-12">
    		
    			<div class="row mt-3 mb-3">
                	<div class="col">

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
                <div class="card p-3">
                    <table class="table table-striped table-bordered mt-2">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">No.</th>
					      <th scope="col" class="text-center">Owner</th>
                          <th scope="col" class="text-center">Property ID</th>
                          <th scope="col" class="text-center">Property Value</th>
                          <th scope="col" class="text-center">Annual Tax Value</th>
                          <th scope="col" class="text-center">Date Previous Tax Payment</th>
                          <th scope="col" class="text-center">Penalty</th>
					      <th class="text-center">Status</th>
					    </tr>
					  </thead>
					  <tbody>
					       <?php
                            require('controller/db.php');
                            $props = "SELECT *, CONCAT(o.fname,' ',o.mname,' ',o.lname) as name, p.id as p_id,p. property_id as prop_id,pi.total_value as prop_value FROM property p LEFT JOIN owner o ON o.id = p.owner_id LEFT JOIN property_inspection pi ON pi.prop_id = p.id ORDER BY p.id DESC";
                            $qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
                            $counter = 0;
                            while($a = mysqli_fetch_assoc($qry)){ $counter++;?>
                            <tr>
                                <td class="text-center"><?php echo $counter; ?></td>
                                <td class="text-center"><?php echo ucwords($a['name']); ?></td>
                                <td class="text-center"><?php echo $a['prop_id']; ?></td>
                                <td class="text-center">

                                    <?php 
                                    if($a['prop_value'] == 0){
                                        echo "Not yet surveyed";
                                    }
                                    else{
                                        echo "&#8369; ".number_format($a['prop_value'],-1); 
                                    }
                                    ?>
                                        
                                </td>
                                <?php
                                    $tax = "SELECT * FROM tax_percentage";
                                    $q = $conn->query($tax) or trigger_error(mysqli_error($conn)." ".$tax);
                                    $b = mysqli_fetch_assoc($q);
                                    $tax_rate = $b['tax'];
                                    $penalty_rate = $b['penalty'];
                                    $annual_tax = $a['prop_value'] * $tax_rate;
                                ?>
                                <td class="text-center"><?php echo "&#8369; ".$annual_tax; ?></td>
                                <?php
                                    $prev_payment = date("F j, Y",strtotime($a['prev_text_payment']))
                                ?>
                                <td class="text-center">
                                    <?php echo $prev_payment; ?>
                                </td>
                                <td class="text-center">
                                  <?php
                                    if($a['prop_value'] == 0){
                                        echo "N/A";
                                    }
                                    else{
                                            if($a['payment_status'] == 0){
                                        if(date("Y") == date("Y",strtotime($a['prev_text_payment']))){
                                            $penalty = $a['prop_value'] * $penalty_rate * date("m") - date("m",strtotime($a['prev_text_payment']));
                                            echo "&#8369; ".number_format($penalty,-1);
                                        }
                                        else{
                                               $year_gap = date("Y") - date("Y",strtotime($a['prev_text_payment']));
                                               $month_gap = $year_gap * 12;
                                               $gap = $month_gap  = date("m",strtotime($a['prev_text_payment']));
                                               $y = "&#8369; ".number_format($a['prop_value'] * $penalty_rate * $gap,-1);
                                              echo  "&#8369; ".number_format($a['prop_value'] * $penalty_rate * $gap,-1);
                                        }
                                    }
                                    else{
                                        echo "<p class='text-success'>Paid</p>";
                                    }

                                    }
                                
                                  ?>       
                                </td>
                                <td class="text-center">
                                <?php
                                    if($a['payment_status'] == ''){?>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#<?php echo $a['p_id'];  ?>">
                                        <span class='badge badge-warning p-2'>Unpaid</span>
                                    </a>
                                    <?php }
                                    else if($a['payment_status'] == 1){?>

                                        <span class='badge badge-success p-2'>Paid</span>
                                   <?php } ?>
                                </td>
<div class="modal fade" id="<?php echo $a['p_id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Payment Status?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           Please confirm your action
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="<?php echo $a['p_id']; ?>"  class="btn btn-primary confirm">Confirm</button>
      </div>
    </div>
  </div>
</div>
                            </tr>
                            <?php }
                           ?>
					  </tbody>
					</table>
                </div>
    	</div>
    </div>	

</div>
<!-- Modal -->

<?php include ('treasurer/footer.php'); ?>