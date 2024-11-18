<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h2 class="mt-4">All Request</h2>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Farm Service Request
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
                            <?php if(isset($requests) && !empty($requests)){ ?>
                                <?php foreach($requests as $request){ ?>
                                <tr>

                                <?php if($request['country']== 'NG') { 
                                    $symbol = '&#x20A6 ';
                                }elseif($request['country']== 'TZ'){
                                    $symbol = '&#xa5; ';
                                }else{
                                    $symbol = '';
                                }?>   
                                                
                                    <td><?php echo date("l d/m/Y",strtotime($request['created_at']));?></td>
                                    <td><?php echo $request["name"]  ?></td>
                                    <td><?php echo $request["phone"]  ?></td>
                                    <td> 
                                        <?php  
                                        if(isset($agents) && !empty($agents)){
                                        
                                            foreach($agents as $agent){ 
                                                if($agent['user_id']== $request['agent_id']) { 
                                                        echo  $agent['name'];
                                                }
                                                else{
                                                    echo '';
                                                }
                                            }                                                    
                                        }else{
                                            echo '';
                                        }?> 
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
                                            echo '';
                                        }?> 
                                    </td>
                                    <td><?php echo  ($request['hectare_rate'] == null ? ' Nil ' : $symbol.number_format($request['hectare_rate'] ,2 )) ?></td>
                                    <td><?php echo  ($request['location'] == null ? ' Nil ' : $request['location'] ) ?></td>
                                    <td><?php echo  ($request['service_type'] == null ? ' Nil ' : $request['service_type'] ) ?></td>
                                    <td><?php echo  ($request['farm_size'] == null ? ' Nil ' : $request['farm_size'] ) ?></td>
                                    <td><?php echo  ($request['amount'] == null ? ' Nil ' : $symbol.number_format($request['amount'] ,2 )) ?></td>
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
