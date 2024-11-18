 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <h2 class="mt-4">Become Agent</h2>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              All form request to be an agent
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Agent Name</th>
                                             <th>Agent Phone</th>
                                            <th>Agent Email</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    <?php if(!empty($becomeagent)){ ?>
                                        <?php foreach($becomeagent as $agent){ ?>
                                        <tr>
                                            <td><?php echo date("l d/m/Y",strtotime($agent['created_at']));?></td>
                                            <td><?php echo $agent["name"]  ?></td>
                                            <td><?php echo $agent["phone"]  ?></td>
                                            <td><?php echo  ($agent['email'] == null ? ' Nil ' : $agent['email'] ) ?></td>
                                            
                                        </tr>
                                        <?php 
                                            } 
                                           }else{ 
                                        ?>
                                            
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
</div>