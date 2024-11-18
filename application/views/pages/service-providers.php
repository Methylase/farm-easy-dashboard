<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">  All Service Providers</h2>
            <br>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>               
            </div>
            <div class="card-body">         
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-sm table-hover">
                        <thead class="text-small">
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Service Type</th>
                                <th>Status </th>
                                <th>Privilege</th>
                            </tr>
                        </thead>
                        <tbody class="text-small">
                            <?php if(!empty($service_providers)){ ?>
                                <?php foreach($service_providers as $service_provider){ ?>
                                  <tr>

                                      <td><?php echo date("l d/m/Y",strtotime($service_provider['created_at']));?></td>
                                      <td><?php echo $service_provider["name"]  ?></td>
                                      <td><?php echo $service_provider["phone"]  ?></td>
                                  <?php if(is_array($service_provider['service_type'])){?>
                                          <td><?php $service ='';

                                            for($i = 0; $i < count($service_provider['service_type']); $i++){
                                                if(is_array($service_provider['service_type'][$i])){
                                                    for($j = 0; $j < count($service_provider['service_type'][$i]); $j++){
                                                        $service .= $service_provider['service_type'][$i][$j].' ';
                                                    }
                                                }else{
                                                    $service .= $service_provider['service_type'][$i].' ';
                                                }
                                                
                                            }
                                            echo $service;
                                            ?></td>
                                           
                                      <?php }else {?>
                                          <td><?php echo  ($service_provider['service_type'] == null ? ' Nil ' : $service_provider['service_type'] ) ?></td>
                                      <?php }?>
                                      <td><?php echo  ($service_provider['status'] == null ? ' Nil ' : $service_provider['status'] ) ?></td>
                                      <td>
                                          <select class="bg-success text-white btn btn-sm set-privilege"  id="<?php echo $service_provider['user_id']; ?>"  name="privilege">
                                              <option value="">Select Privilege</option>
                                              <option value="unapprove"  <?php echo $service_provider['privilege'] == 'unapprove'? 'selected' : '';  ?> >Unapprove</option>
                                              <option value="approved"  <?php echo $service_provider['privilege'] == 'approved'?  'selected' : '';  ?> >Approved</option>
                                              
                                          </select>
                                      </td>
                                      
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
                                </tr>
                              <?php }?> 
                          </tbody>                        
                    </table>   
                </div>
            </div>
                            
        </div>        
    </main>
</div> 


                    

                             