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
                                <ul class="collapse">
                                    <li class="<?php echo $currentPage === 'Property Reports' ? 'active' : '' ?>">
                                        <a href="property_reports.php">Dashboard</a>
                                    </li>
                                    <li class="<?php echo $currentPage === 'Manage Appraiser' ? 'active' : '' ?>">
                                        <a href="manage_employee.php">Manage Appraiser</a>
                                    </li>
                                    <li class="<?php echo $currentPage === 'Manage Compositive' ? 'active' : '' ?>">
                                        <a href="manage_compositive.php">Manage Compositive</a>
                                    </li>

                                     <li class="<?php echo $currentPage === 'Tax' ? 'active' : '' ?>">
                                        <a href="tax.php">Tax Formula</a>
                                    </li>
                                     <li class="">
                                        <a href="logout.php">Log Out</a>
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