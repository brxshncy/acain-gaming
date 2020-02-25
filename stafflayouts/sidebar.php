 <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Properties</span></a>
                                <ul class="collapse">
                                     <li class="<?php echo $currentPage === 'Manage Properties' ? 'active' : '' ?>">
                                        <a href="manage_properties.php">Property Records</a>
                                    </li>
                                    <li class="<?php echo $currentPage === 'Manage Property Owners' ? 'active' : '' ?>">
                                        <a href="manage_owners.php">Owner Records</a>
                                    </li>
                                   <!-- <li class="<?php echo $currentPage === 'Survey Property' ? 'active' : '' ?>">
                                        <a href="assign_compositive.php">Transfer of Ownership</a>
                                    </li>-->
                                     <li class="<?php echo $currentPage === 'Import Previous Property Ownership' ? 'active' : '' ?>">
                                        <a href="import_previous.php">Property Histories</a>
                                    </li>
                                      <li class="">
                                        <a href="logout.php">Log out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <div class="main-content">