<?php
require('../controller/db.php');

if(isset($_POST['m'])){
	$m = $_POST['m'];
	$counter = 0;
	$month = "SELECT CONCAT(o.fname,' ',o.mname,' ',o.lname) as name,p.tm_status as tm_status,p.apr_status as apr_status,p.exm_status as exm_status,p.date_inquire as date_inquire, p.prop_measurement as measurement, p.prop_value as value,p.property_id as property_id,p.property_brgy as property_brgy, p.street as street, p.city as city, p.id as p_id FROM property p LEFT JOIN team t ON p.team_id = t.id LEFT JOIN owner o ON o.id = p.owner_id WHERE MONTH(p.date_inquire) = '$m' ORDER BY p.id DESC";
	$qry = $conn->query($month) or trigger_error(mysqli_error($conn)." ".$month);
if(mysqli_num_rows($qry)> 0){
	while($a = mysqli_fetch_assoc($qry)){ $counter++; ?>
     <tr>
                            <td class="text-center"><?php echo $counter; ?></td>
                            <?php
                                 $date_inquire = date("F j, Y",strtotime($a['date_inquire']));
                            ?>
                            <td class="text-center"><?php echo $date_inquire; ?></td>
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
                                    if($a['tm_status'] == 0 && $a['tm_status'] == 0 && $a['tm_status'] == 0){
                                        echo "<span class='badge badge-warning'>Unsurveyed</span>";
                                    }
                                    else if($a['tm_status'] == 1 && $a['tm_status'] == 1 && $a['tm_status'] == 1){
                                        echo "<span class='badge badge-success'>Surveyed</span>";
                                    }
                                ?>
                            </td>
                            <!--<td class="text-center">
                                <a href="javascript:void(0)" title="View Property Details" class="view_props" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-success"></i>
                                </a>
                                 <a href="javascript:void(0)" title="Edit Property Details" class="edit_props" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-edit text-info ml-2"></i>
                                </a>
                            </td>-->
                        </tr>

<?php } } else{
	echo "<tr> <td colspan='9' class='text-center'> No data in this month</td> </tr>";
} }
if(isset($_POST['y'])){
	$y = $_POST['y'];
	$counter = 0;
	$month = "SELECT CONCAT(o.fname,' ',o.mname,' ',o.lname) as name,p.tm_status as tm_status,p.apr_status as apr_status,p.exm_status as exm_status,p.date_inquire as date_inquire, p.prop_measurement as measurement, p.prop_value as value,p.property_id as property_id,p.property_brgy as property_brgy, p.street as street, p.city as city, p.id as p_id FROM property p LEFT JOIN team t ON p.team_id = t.id LEFT JOIN owner o ON o.id = p.owner_id WHERE YEAR(p.date_inquire) = '$y' ORDER BY p.id DESC";
	$qry = $conn->query($month) or trigger_error(mysqli_error($conn)." ".$month);
if(mysqli_num_rows($qry)> 0){
	while($a = mysqli_fetch_assoc($qry)){ $counter++; ?>
     <tr>
                            <td class="text-center"><?php echo $counter; ?></td>
                            <?php
                                 $date_inquire = date("F j, Y",strtotime($a['date_inquire']));
                            ?>
                            <td class="text-center"><?php echo $date_inquire; ?></td>
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
                                    if($a['tm_status'] == 0 && $a['tm_status'] == 0 && $a['tm_status'] == 0){
                                        echo "<span class='badge badge-warning'>Unsurveyed</span>";
                                    }
                                    else if($a['tm_status'] == 1 && $a['tm_status'] == 1 && $a['tm_status'] == 1){
                                        echo "<span class='badge badge-success'>Surveyed</span>";
                                    }
                                ?>
                            </td>

                            <!--<td class="text-center">
                                <a href="javascript:void(0)" title="View Property Details" class="view_props" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-folder-open text-success"></i>
                                </a>
                                 <a href="javascript:void(0)" title="Edit Property Details" class="edit_props" id="<?php echo $a['p_id'] ?>">
                                    <i  class="fa fa-edit text-info ml-2"></i>
                                </a>
                            </td>-->
                        </tr>

<?php } } else{
	echo "<tr> <td colspan='9' class='text-center'> No data in year ".$y."</td></tr>";
} }


