<?php 
    session_start();
    $currentPage = 'Property Reports';
    $title = 'Property Reports';
    $pageTitle = 'Property Reports';
    include ('layouts/header.php');
 ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/header_content.php'); ?>
<?php include('layouts/page_title.php'); ?>

<?php if(isset($_SESSION['reg'])): ?>
<div class="row justify-content-center mt-4">
    <div class="col col-md-7">
        <div class="alert alert-success p-4 text-center">
            <b>
                <?php
                    echo $_SESSION['reg'];
                    unset($_SESSION['reg']);
                ?>
            </b>
        </div>
    </div>
</div>
<?php endif ?>

 <div class="main-content-inner">
     <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="row mt-2">
                <div class="col col-md-3">
                    <select id="monthly" class="form-control form-control-lg">
                        <option value="">-- Select Month --</option>
                        <?php
                            $months = array("Select Month","January","February","March","April","May","June","July","August","September","October","November","December");
                            for($x = 1; $x <= 12 ; $x ++){
                                echo "<option value=".$x.">".$months[$x]."</option>";
                            }
                        ?>
                      
                    </select>
                </div>
                  <div class="col col-md-3">
                    <select id="year" class="form-control form-control-lg">
                        <option value="">-- Select Year --</option>
                        <?php
                            date_default_timezone_set("Asia/Manila");
                            $date = date("Y");
                            for($y = $date; $y >= 1910; $y--){
                                echo "<option value=".$y.">".$y."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
               <div class="col-12">
                  <div class="card  p-3">
                              <table class="table table-striped table-bordered mt-2">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">No.</th>
                          <th scope="col" class="text-center">Date Inquire</th>
                          <th scope="col" class="text-center">Owner</th>
                          <th scope="col" class="text-center">Property ID</th>
                          <th scope="col" class="text-center">Location</th>
                          <th scope="col" class="text-center">Property Area</th>
                           <th scope="col" class="text-center">Property Value</th>
                           <th scope="col" class="text-center">Tax Value</th>
                          <th class="text-center">Status</th>
                          <!--<th scope="col" class="text-center">Action</th>-->
                        </tr>
                      </thead>
                      <tbody id="prop_reports">
                        <?php
                            require('controller/db.php');
                            $props = "SELECT CONCAT(o.fname,' ',o.mname,' ',o.lname) as name, p.tm_status as tm_status,p.apr_status as apr_status,p.exm_status as exm_status,p.prop_measurement as measurement, p.date_inquire as date_inquire, p.prop_value as value,p.property_id as property_id,p.property_brgy as property_brgy, p.street as street, p.city as city,pb.total_area as area, p.id as p_id,pi.total_value as total_value FROM property p left join property_inspection pi on pi.prop_id = p.id left join property_boundaries pb on pb.prop_id = p.id LEFT JOIN team t ON p.team_id = t.id LEFT JOIN owner o ON o.id = p.owner_id ORDER BY p.id DESC";
                            $qry = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
                            $counter = 0;
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
                            <td class="text-center"><?php echo $a['area'] == 0 ?  'No official data yet' : number_format($a['area'],-1)." sqm"; ?></td>
                            <td class="text-center"><?php echo $a['total_value'] == 0 ? 'No official data yet':"&#8369; ".number_format($a['total_value']) ?></td>
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
                        <?php }
                        ?>
                      </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('add_appraiser.php'); ?>
<?php include ('layouts/footer.php'); ?>