 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"> All Payments</h2>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Payments
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="datatablesSimple" class="table  table-sm table-hover" >
                                            <thead class="text-small">
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Agent Phone</th>
                                                <th>Agent Email</th>
                                                <th>Amount</th>
                                                <th>Reference</th>
                                                <th>Transaction Status</th>
                                                <th>Payment Date</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody class="text-small">
                                        <?php if(!empty($payments)){ ?>
                                            <?php foreach($payments as $payment){ ?>
                                            <tr>
                                            <?php
                                                
                                                if($payment["country"] == "NG"){
                                                    $symbol = '&#x20A6 ';
                                                }else if($payment["country"] == "TZ"){
                                                    $symbol = '&#xa5; ';
                                                }
                                            ?>
                                            
                                                <td><?php echo date("l d/m/Y",strtotime($payment['created_at']));?></td>
                                                <td><?php echo  ($payment['phone'] == null ? ' Nil ' : $payment['phone'] ) ?></td>
                                                <td><?php echo  ($payment['email'] == null ? ' Nil ' : $payment['email'] ) ?></td>
                                                <td><?php echo  $symbol.number_format($payment['amount'] ,2 ) ?></td>
                                                <td><?php echo $payment["ref"]  ?></td>
                                                <td><?php echo $payment["pay_status"]  ?></td>
                                                <td><?php echo date("l d/m/Y",strtotime($payment['pay_date']));?></td>
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
