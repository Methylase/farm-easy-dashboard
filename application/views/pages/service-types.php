 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                          <h2 class="mt-4"> All Service Types</h2>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatablesSimple" class="table  table-sm table-hover" >
                                        <thead class="text-small">
                                            <tr>
                                                <th>Date</th>
                                                <th>Service Type Name</th>
                                                <th>Service Type Status</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody class="text-small">
                                        <?php if(!empty($service_types)){ ?>
                                            <?php foreach($service_types as $service_type){ ?>
                                            <tr>
                                                <td><?php echo date("l d/m/Y",strtotime($service_type['created_at']));?></td>
                                                <td><?php echo $service_type["service"]  ?></td>
                                            
                                                <td><a href="<?php echo site_url().'service-type/'.$service_type["id"]; ?>"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a></td>
                                                
                                            </tr>
                                            <?php 
                                                } 
                                            }else{ 
                                            ?>
                                            <tr>    
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
