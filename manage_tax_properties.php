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
					      <th scope="col" class="text-center">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					       <?php
                            require('controller/db.php');
                            $props = "SELECT *, CONCAT(o.fname,' ',o.mname,' ',o.lname) as name,p. property_id as prop_id,p.prop_value as prop_value FROM property p LEFT JOIN owner o ON o.id = p.owner_id ORDER BY p.id DESC";
                            $qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
                            $counter = 0;
                            while($a = mysqli_fetch_assoc($qry)){ $counter++;?>
                            <tr>
                                <td class="text-center"><?php echo $counter; ?></td>
                                <td class="text-center"><?php echo ucwords($a['name']); ?></td>
                                <td class="text-center"><?php echo $a['prop_id']; ?></td>
                                <td class="text-center"><?php echo $a['prop_value']; ?></td>
                                <?php
                                    $tax = "SELECT * FROM tax_percentage";
                                    $q = $conn->query($tax) or trigger_error(mysqli_error($conn)." ".$tax);
                                    $b = mysqli_fetch_assoc($q);
                                    $tax_rate = $b['tax'];
                                    $penalty_rate = $b['penalty'];
                                    $annual_tax = $a['prop_value'] * $tax_rate;
                                    $date_pay = date("Y",strtotime($a['prev_text_payment']));
                                    $curr_year = date("Y");
                                    $nopay_year = $curr_year - $date_pay;
                                    $total_penalty = $a['prop_value'] * $penalty_rate * $nopay_year * 12;
                                ?>
                                <td class="text-center"><?php echo $annual_tax; ?></td>
                                <?php
                                    $prev_payment = date("F j, Y",strtotime($a['prev_text_payment']))
                                ?>
                                <td class="text-center"><?php echo $prev_payment; ?></td>
                                <td class="text-center"><?php echo $total_penalty; ?></td>
                                <td class="text-center">
                                <?php
                                    if($a['payment_status'] == 'Paid'){
                                        echo "<span class='badge badge-warning p-2'>Paid</span>";
                                    }
                                    else if($a['payment_status'] == 'Unpaid'){
                                        echo "<span class='badge badge-warning p-2'>Unpaid</span>";
                                    }
                                ?>
                                </td>
                                <td class="text-center"><?php echo $a['prop_id']; ?></td>
                            </tr>
                            <?php }
                           ?>
					  </tbody>
					</table>
                </div>
    	</div>
    </div>		
</div>
<?php include ('treasurer/footer.php'); ?>