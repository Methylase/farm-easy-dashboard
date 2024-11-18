 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"> All Farm Types</h2>
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
                                                <th>Farm Type Name</th>
                                                <th>Farm Type Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody class="text-small">
                                        <?php if(!empty($farm_types)){ ?>
                                            <?php foreach($farm_types as $farm_type){ ?>
                                            <tr>
                                                <td><?php echo date("l d/m/Y",strtotime($farm_type['created_at']));?></td>
                                                <td><?php echo $farm_type["farm"]  ?></td>
                                                <td><?php echo  ($farm_type['status'] == null ? ' Nil ' : $farm_type['status'] ) ?></td>
                                                <td><a href="<?php echo site_url().'farm-type/'.$farm_type["id"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a></td>
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
