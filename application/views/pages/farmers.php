<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"> All Farmers</h2>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               farmers
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatablesSimple" class="table table-sm table-hover">
                                        <thead class="text-small">
                                            <tr>
                                                <th>Date</th>
                                                <th>Farmer Name</th>
                                                <th>Farmer Phone</th>
                                                <th>Farm Type</th>
                                                <th>Status </th>
                                                
                                            </tr>
                                        </thead>
                                    
                                        <tbody class="text-small">
                                        <?php if(!empty($farmers)){ ?>
                                            <?php foreach($farmers as $farmer){ ?>
                                            <tr>
                                                <td><?php echo date("l d/m/Y",strtotime($farmer['created_at']));?></td>
                                                <td><?php echo $farmer["name"]  ?></td>
                                                <td><?php echo $farmer["phone"]  ?></td>
                                                <td><?php echo  ($farmer['farm_type'] == null ? ' Nil ' : implode (" , ",$farmer['farm_type']) ) ?></td>
                                                <td><?php echo  ($farmer['status'] == null ? ' Nil ' : $farmer['status'] ) ?></td>
                                                
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
                                                </tr>
                                            <?php }?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
