   <nav class="sb-topnav navbar navbar-expand navbar-dark light-green ">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="">FarmEasy</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
           
             <li class="nav-item form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                   <a class="text-gray"> </a>
                </li>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-green" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                        <?php echo $this->session->userdata('email')?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Change Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo site_url(). 'usercontroller/logout';?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion  light-green" id="sidenavAccordion">

                    <!--side menu -->
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                                <div class="dropdown-divider"></div>
                            <?php if($this->session->userdata('user_type') === '1'){ ?>
                                <a class="nav-link" href="<?php echo site_url().'superadmin'; ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                           <?php }else if($this->session->userdata('user_type') === '2'){ ?>
                            <a class="nav-link" href="<?php echo site_url().'admin'; ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                          <?php
                           } 
                           ?>
                           

                             <div class="dropdown-divider"></div>

                            <div class="sb-sidenav-menu-heading">Users</div>
                             <!--Agents-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAgents" aria-expanded="false" aria-controls="collapseAgents">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Agents
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseAgents" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                     <a class="nav-link" href="<?php echo site_url().'become_agent'; ?>">Become  agent request</a>
                                    <a class="nav-link" href="<?php echo site_url().'create-agent'; ?>">Create new agent</a>
                                    <a class="nav-link" href="<?php echo site_url().'agents'; ?>">All agents</a>
                                </nav>
                            </div>
                                <!--Farmers-->

                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFarmers" aria-expanded="false" aria-controls="collapseFarmers">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Farmers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseFarmers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo site_url().'farmers'; ?>">All farmers </a>
                                </nav>
                            </div>

                             <!--Service Provider-->
                               <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSP" aria-expanded="false" aria-controls="collapseSP">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Service Providers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseSP" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo site_url().'create-service-provider'; ?>">Create service provider </a>
                                    <a class="nav-link" href="<?php echo site_url().'service-providers'; ?>">All service providers </a>

                                </nav>
                            </div>


                              <a class="nav-link" href="<?php echo site_url().'all_users'; ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                All Users
                            </a>
                          

                             <div class="dropdown-divider"></div>

                            <div class="sb-sidenav-menu-heading">Transactions</div>

                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRequest" aria-expanded="false" aria-controls="collapseRequest">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Farm Request
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseRequest" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="<?php echo site_url().'all-requests'; ?>">All request</a>
                                </nav>
                            </div>

                        
                            <a class="nav-link" href="<?php echo site_url().'all-payments'; ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                                All Payments
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseServicePrice" aria-expanded="false" aria-controls="collapseRequest">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
                                All Service Prices
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseServicePrice" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo site_url().'set-service-price'; ?>">Set service price </a>
                                      <a class="nav-link" href="<?php echo site_url().'all-service-prices';?>">Service prices</a>
                                </nav>
                            </div>                            
                           

                             <div class="dropdown-divider"></div>                             

                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFarm" aria-expanded="false" aria-controls="collapseFarm">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Farm Type
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseFarm" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo site_url().'add-farm-type'; ?>">Add new farm type </a>
                                      <a class="nav-link" href="<?php echo site_url().'farm-types'; ?>">Edit farm types</a>
                                </nav>
                            </div>


                              <div class="dropdown-divider"></div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseService" aria-expanded="false" aria-controls="collapseService">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Service Type
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="dropdown-divider"></div> 
                            <div class="collapse" id="collapseService" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo site_url().'add-service-type'; ?>">Add new service type </a>
                                      <a class="nav-link" href="<?php echo site_url().'service-types'; ?>">Edit service types</a>
                                </nav>
                            </div>

                        </div><!--end nav -->
                    </div><!--end side menu-->

                 

                    <div class="sb-sidenav-footer">
                       <a class="small" href="<?php echo site_url(). 'usercontroller/logout';?>"><i class="fas fa-power-off"></i> Logout</a>
                        <!-- text here-->
                    </div>
                </nav>
            </div>