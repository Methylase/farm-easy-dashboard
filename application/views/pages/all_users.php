<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                         <h2 class="mt-4">All Users</h2>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                </div>
                                <div class="table-responsive">
                                    <table id="datatablesSimple" class="table  table-sm table-hover" >
                                        <thead class="text-small">
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Otp</th>
                                                <th>Country</th>
                                                <th>Farm/Service Type</th>

                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-small">
                                        <?php if(!empty($users)){ ?>
                                            <?php foreach($users as $data){ ?>
                                            <tr>
                                                <td><?php echo date("l d/m/Y",strtotime($data['created_at']));?></td>
                                                <td><?php echo $data["name"]  ?></td>
                                                <td><?php echo $data["phone"]  ?></td>
                                                <td><?php echo $data["reg_code"]  ?></td>

                                                <td>
                                                    <?php if($data['country']== 'NG') { 
                                                            echo  'Nigeria';
                                                        }
                                                        elseif($data['country']== 'TZ'){
                                                            echo 'Tazania' ;
                                                        }?>   
                                                            
                                                </td>
                                                <td> <?php  
                                                    if($data['farm_type']== null) { 
                                                            echo  '';
                                                        }
                                                        else{
                                                            echo implode(",",$data['farm_type']);
                                                        }?> 

                                                        <?php  
                                                    if($data['service_type']== null) { 
                                                            echo  '';
                                                        }
                                                        else{
                                                            echo implode(",",$data['service_type']);
                                                        }?> 
                                                </td>

                                                <td><?php echo $data["status"]  ?></td>
                                                <td><a href="<?php echo site_url().'user/'.$data["id"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
                                            
                                                
                                                
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
                                            </tr>    

                                            <?php }?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
