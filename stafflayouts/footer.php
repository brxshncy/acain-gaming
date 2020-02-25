    </div>
    <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Iligan City Assesor's Office © Copyright 2020. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
     <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            $('table').DataTable();
            $('#add_owner').click(function(){
                $('#owner_modal').modal('show');
            })
             $('.v_owner_details').click(function(){
                let owner_id = $(this).attr('id');
                console.log(owner_id);
                $.ajax({
                    url:'ajax_calls/view_owners.php',
                    method:'post',
                    data:{id:owner_id},
                    dataType:'JSON',
                    success:function(data){
                        console.log(data);
                        $('#fname').val(data.name).attr('readonly');
                        $('#address').val(data.address);
                        $('#age').val(data.age);
                        $('#gender').val(data.gender);
                        $('#status').val(data.status);
                        $('#contact').val(data.contact);
                        $('#v_owner_modal').modal('show');
                    },  
                    error:function(err){
                        console.log(err);
                    }
                })
               
            })
              $('.e_owner_details').click(function(){
                    let e_owner_id = $(this).attr('id');
                    console.log(e_owner_id);
                    $.ajax({
                        url:'ajax_calls/edit_owner_details.php',
                        method:'post',
                        data:{id:e_owner_id},
                        dataType:'JSON',
                        success:function(data){ 
                            console.log(data);
                            $('#e_id').val(data.id);
                            $('#e_fname').val(data.fname);
                            $('#e_lname').val(data.lname);
                            $('#e_mname').val(data.mname);
                            $('#e_address').val(data.address);
                            $('#e_age').val(data.age);
                            $('#e_gender').find(":selected").text(data.gender);
                            $('#e_status').find(":selected").text(data.status);
                            $('#e_contact').val(data.contact);
                            $('#e_owner_modal').modal('show');
                        },
                        error:function(err){
                            console.log(err);
                        }
                    })
                 })
            $('#owner').change(function(){
                let owner = $(this).val();
                console.log(owner);
                $.ajax({
                    url:'ajax_calls/props_owner_info.php',
                    method:'post',
                    data:{id:owner},
                    dataType:'JSON',
                    success:function(data){ 
                        console.log(data);
                    },
                    error:function(err){
                        console.log(err);
                    }
                })
            })
            $(document).on('click','.view_props',function(){
                let prop_id = $(this).attr('id');
                console.log(prop_id);
                $.ajax({
                    url:'ajax_calls/v_property_call.php',
                    method: 'post',
                    dataType:'JSON',
                    data:{id:prop_id},
                    success:function(data){
                        console.log(data)
                        $('#date_inquired').val(data.date_inquire);
                        $('#property_id').val(data.property_id);
                        $('#owner_name').val(data.name);
                        $('#address').val(data.owner_address);
                        $('#contact').val(data.owner_contact);
                        $('#age').val(data.age);
                        $('#prop_brgy').val(data.property_brgy);
                        $('#prop_address').val(data.street);
                        $('#prop_city').val(data.city);
                        $('#kind_prop').val(data.kind_prop);
                        $('#actual_use').val(data.actual_use);
                        $('#prop_measurement').val(data.prop_measurement);
                        $('#prop_value').val(data.prop_value);
                        $('#north').val(data.north);
                        $('#east').val(data.east);
                        $('#west').val(data.west);
                        $('#prev_date_paid').val(data.prev_tax);
                        $('#south').val(data.south);
                        if(data.status == 0){
                            $('#status').val("Unsurveyed");
                        }
                        else if(data.status == 1){
                            $('#status').val("Surveyed");
                        }
                        $('#team').val(data.team);
                        $('#view_modal').modal('show');
                    },
                    error:function(err){
                        console.log(err);
                    }
                })
                
            })
            $('#property_modal').click(function(){
               $('#add_property').modal('show');
            })
$(document).on('click','.v_history_details',function(){
let h_id = $(this).attr('id');
console.log(h_id);
$('#history_modal').modal('show');
$.ajax({
    url:'ajax_calls/history_props.php',
    smethod:'post',
    sdata:{id:h_id},
    sdataType:'JSON',
    success:function(data){ 
    console.log(data);
    $('#date_inquired').val(data.date_transfer);
    $('#property_id').val(data.p_id);
    $('#owner_name').val(data.name);
    $('#address').val(data.owner_address);
    $('#contact').val(data.p_contact);
    $('#age').val(data.age);
    $('#kind_prop').val(data.p_kind_property);
    $('#actual_use').val(data.p_actual_use);
    $('#prop_measurement').val(data.p_measurement);
    $('#prop_value').val(data.p_value);
     $('#north').val(data.p_north);
    $('#east').val(data.p_east);
    $('#west').val(data.p_west);
    $('#south').val(data.p_south);
    $('#history_modal').modal('show');
    },
    error:function(err){
    console.log(err);
    }
})
})
          $(document).on('click','.e_history_details',function(){
                let e_id = $(this).attr('id');
                console.log(e_id);
                $.ajax({
                    url:'ajax_calls/edit_history_props.php',
                    method:'post',
                    data:{id:e_id},
                    dataType:'JSON',
                    success:function(data){
                        $('#e_date_inquired').val(data.date_transfer);
                        $('#e_h_id').val(data.h_id);
                        $('#e_property_id').val(data.p_id);
                        $('#e_owner_fname').val(data.f_name);
                        $('#e_owner_lname').val(data.l_name);
                        $('#e_owner_mname').val(data.m_name);
                        $('#e_address').val(data.owner_address);
                        $('#e_contact').val(data.p_contact);
                        $('#e_age').val(data.age);
                        $('#e_kind_prop').val(data.p_kind_property);
                        $('#e_actual_use').val(data.p_actual_use);
                        $('#e_prop_measurement').val(data.p_measurement);
                        $('#e_prop_value').val(data.p_value);
                        $('#e_north').val(data.p_north);
                        $('#e_east').val(data.p_east);
                        $('#e_west').val(data.p_west);
                        $('#e_south').val(data.p_south);
                        $('#e_history_modal').modal('show');
                        console.log(data);
                    },
                    error:function(err){    
                        console.log(err);
                    }
                })
          })
          $(document).on('click','.property_owned',function(){
                let owner_id = $(this).attr('id');
                console.log(owner_id);
                $.ajax({
                    url:'ajax_calls/property_owned.php',
                    method:'post',
                    data:{id:owner_id},
                    success:function(data){
                        console.log(data);
                        $('#properties_owned_details').html(data);
                        $('#properties_owned').modal('show')
                    },
                    error:function(err){
                        console.log(err);
                    }
                })
          })
          $(document).on('click','.edit_props',function(){
            let prop_id = $(this).attr('id');
            console.log(prop_id);
            $.ajax({
                url:'ajax_calls/edit_property.php',
                method:'post',
                dataType:'JSON',
                data:{id:prop_id},
                success:function(data){
                    console.log(data);
                    $('#property_idd').val(data.id);
                    $('#prop_id').val(data.property_id);
                    $('#e_brgy').val(data.property_brgy);
                    $('#e_street').val(data.street);
                    $('#e_kind_prop').find(":selected").text(data.kind_prop);
                    $('#e_actual_use').find(":selected").text(data.actual_use);
                    $('#e_north').val(data.north);
                    $('#e_east').val(data.east);
                    $('#e_west').val(data.west);
                    $('#e_south').val(data.south);
                    $('#e_prop_measurement').val(data.prop_measurement);
                    $('#e_date_prev_payment').val(data.prev_text_payment);
                    $('#e_tax_payment').val(data.payment_status);
                    $('#e_prop_value').val(data.prop_value);
                    $('#e_surevyor').find(":selected").text(data.team_name);
                    if(data.status == 0){
                        $('#e_status').val("Unsurveyed");
                    }
                    else if(data.status == 1){
                        $('#e_status').val("Surveyed");
                    }
                    $('#edit_property_modal').modal('show');
                },
                error:function(err){    
                    console.log(err);
                }
            })
          })
            $('.transfer_owner').click(function(){
                let trans_id = $(this).attr('id');
                console.log(trans_id);

                $.ajax({
                    url:'ajax_calls/transfer_property.php',
                    method:'post',
                    data:{id:trans_id},
                    success:function(data){
                        $('#transfer_details').html(data);
                        $('#transfer_modal').modal('show');
                    },
                    error:function(data){
                        console.log(data);
                    }
                })
            })
            $('.view_status').click(function(){
                let status_id = $(this).attr('id');
                console.log(status_id);
                $.ajax({
                    url:'ajax_calls/status_property.php',
                    method:'post',
                    data:{id:status_id},
                    success:function(data){
                        $('#status_details').html(data);
                        $('#status_modal').modal('show');
                    },
                    error:function(err){
                        console.log(err);


                    }
                })
            })
            $('.transfer_owner').click(function(){
                let trans_id = $(this).attr('id');
                console.log(trans_id);

                $.ajax({
                    url:'ajax_calls/transfer_property.php',
                    method:'post',
                    data:{id:trans_id},
                    success:function(data){
                        $('#transfer_details').html(data);
                        $('#transfer_modal').modal('show');
                    },
                    error:function(data){
                        console.log(data);
                    }
                })
            })
            $('#props_id').change(function(){
                let property_id = $(this).val();
                console.log(property_id);
            })
            $('#survey_props').click(function(){
                $('#survey_modal').modal('show');
            })

            $('#property').change(function(){
                let prop_id = $(this).val();
                console.log(prop_id);
                $.ajax({
                    url:'ajax_calls/prop_survey_details.php',
                    method:'post',
                    data:{id:prop_id},
                    success:function(data){
                      $('#prop_s_details').html(data);
                    },
                    error:function(err){
                        console.log(err);
                    }
                })
            })

        })
    </script>
</body>

</html>
