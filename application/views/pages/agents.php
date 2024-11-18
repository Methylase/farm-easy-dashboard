 <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h2 class="mt-4">All Agents</h2>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Agents created
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-sm table-hover" >
                            <thead class="text-small">
                                <tr>
                                    <th>Date</th>
                                    <th>Agent Name</th>
                                    <th>Agent Phone</th>
                                    <th>Agent Email</th>
                                    <th>Agent Code</th>
                                    <th>Location</th>
                                    <th>Bank Name</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                </tr>
                            </thead>
                        
                            <tbody class="text-small">
                            <?php if(!empty($agents)){ ?>
                                <?php foreach($agents as $agent){ ?>
                                    <tr>
                                
                                        <td><?php echo date("l d/m/Y",strtotime($agent['created_at']));?></td>
                                        <td><?php echo $agent["name"]  ?></td>
                                        <td><?php echo $agent["phone"]  ?></td>
                                        <td><?php echo  ($agent["email"] == null ? ' Nil ' : $agent["email"] ) ?></td>
                                        <td><?php echo  ($agent["reg_code"] == null ? ' Nil ' : $agent["reg_code"] ) ?></td>
                                        <td><?php echo  ($agent["location"] == null ? ' Nil ' : $agent["location"] ) ?></td>
                                        <td><?php echo  ($agent["bank_name"] == null ? ' Nil ' : $agent["bank_name"] ) ?></td>
                                        <td><?php echo  ($agent["account_name"] == null ? ' Nil ' : $agent["account_name"] ) ?></td>
                                        <td><?php echo  ($agent["account_number"] == null ? ' Nil ' : $agent["account_number"] ) ?></td>
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
                                </tr> 
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>