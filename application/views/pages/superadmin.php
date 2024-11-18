<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">SuperAdmin Dashboard</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary mb-4">
                                    <div class="card-body">

                                    <div class="row">
                                      <div class=" col-sm-8 text-xs  text-white "> 
                                        <i class="fas fa-users fa-2x"></i> Farmers</div>
                                    
                                      <div class="col-sm-4 text-gray" style="text-align: right;">
                                    <?php echo  $farmers !='' ? count($farmers) : "0";?>
                                        </div>
                                    </div>
                  
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo site_url().'farmers'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">

                                    <div class="row">
                                      <div class=" col-sm-8 text-xs  text-white "> 
                                        <i class="fas fa-users fa-2x"></i> Agents</div>
                                    
                                      <div class="col-sm-4" style="text-align: right;">
                                      <?php echo $agents !='' ? count($agents) : "0";?>
                                        </div>
                                    </div>
                  
                                    </div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo site_url().'agents'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">

                                    <div class="row">
                                      <div class=" col-sm-8 text-xs  text-white "> 
                                        <i class="fas fa-users fa-2x"></i> SP</div>
                                    
                                      <div class="col-sm-4 text-gray" style="text-align: right;">
                                      <?php echo $service_providers !='' ? count($service_providers) : "0";?>
                                        </div>
                                    </div>
                  
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo site_url().'service-providers'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                     <div class="card-body">

                                    <div class="row">
                                      <div class=" col-sm-8 text-xs  text-white "> 
                                        <i class="fas fa-shopping-cart fa-2x"></i> Request</div>
                                    
                                      <div class="col-sm-4 text-gray" style="text-align: right;">
                                     
                                      <?php echo $requests !='' ? count($requests) : "0";?>

                                        </div>
                                    </div>
                  
                                    </div>
                               
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo site_url().'all-requests'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               All Request
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table  table-sm table-hover" >
                                    <thead class="text-small">
                                        <tr>
                                            <th>Date</th>
                                            <th>Farmer Name</th>
                                             <th>Farmer Phone</th>
                                            <th>Agent</th>
                                            <th>Service Providers</th>
                                            <th>Rate</th>
                                            <th>Location</th>
                                            <th>Service Type</th>
                                            <th>Size/Qty</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                           
                                        </tr>
                                    </thead>
                                 
                                    <tbody class="text-small">
                                    <?php if(!empty($requests)){ ?>
                                        <?php foreach($requests as $request){ ?>
                                        <tr>
                                        <?php
                                            
                                            if($request["country"] == "NG"){
                                                $symbol = '&#x20A6 ';
                                            }else if($request["country"] == "TZ"){
                                                $symbol = '&#xa5; ';
                                            }
                                        ?>
                                            <td><?php echo date("l d/m/Y",strtotime($request['created_at']));?></td>
                                            <td><?php echo $request["name"]  ?></td>
                                            <td><?php echo $request["phone"]  ?></td>
                                            <td>
                                                <?php 
                                                    foreach($agents as $agent){ 
                                                        if($agent['id']== $request['agent_id'] && $request['agent_id'] !=NULL) { 
                                                            echo  $agent['name'];
                                                        }else{
                                                            echo '';
                                                        }
                                                    }
                                                ?> 
                                            </td>
                                            <td>
                                                <?php  
                                                    if(isset($service_providers) && !empty($service_providers)){
                                                        foreach($service_providers as $sp){ 
                                                        if($sp['user_id']== $request['sp_id']) { 
                                                            echo  $sp['name'];
                                                            }
                                                            else{
                                                                echo '';
                                                            }
                                                        }                                                    
                                                    }else{

                                                    }
                                                ?> 
                                            </td>
                                            <td><?php echo  ($request['hectare_rate'] == null ? ' Nil ' : $symbol.number_format($request['hectare_rate'] ,2 ))  ?></td>
                                            <td><?php echo  ($request['location'] == null ? ' Nil ' : $request['location'] ) ?></td>
                                            <td><?php echo  ($request['service_type'] == null ? ' Nil ' : $request['service_type'] ) ?></td>
                                            <td><?php echo  ($request['farm_size'] == null ? ' Nil ' : $request['farm_size'] ) ?></td>
                                            <td><?php echo  ($request['amount'] == null ? ' Nil ' : $symbol.number_format($request['amount'] ,2 ))  ?></td>
                                            <td><?php echo  ($request['status'] == null ? ' Nil ' : $request['status'] ) ?></td>
                                            <td><?php echo  ($request['pay_status'] == null ? ' Nil ' : $request['pay_status'] ) ?></td>
                                            
                                        </tr>
                                        <?php 
                                            } 
                                           }else{ 
                                        ?>
                                        <tr>  
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
