<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                         <h2 class="mt-4">Services Price List</h2>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Services Price List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatablesSimple" class="table  table-sm table-hover" >
                                        <p class="message text-success text-center text-small py-1"></p>
                                        <thead class="text-small">
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Service Type</th>
                                                <th class="price">Price/Per Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody class="text-small">
                                        <?php if(!empty($service_providers)){ ?>
                                            
                                            <?php foreach($service_providers as $service_provider){ ?>
                                                
                                            <tr class="service_provider" id="<?php echo $service_provider["id"] ?>">
                                                <td><?php echo date("l d/m/Y",strtotime($service_provider['created_at']));?></td>
                                                <td><?php echo $service_provider["name"]  ?></td>
                                                <td>
                                                    <select class="form-control service" data_id="<?php echo $service_provider["id"] ?>"> 
                                                        <?php 
                                                         $service ='';
                                                        ?>
                                                        <?php if($service_provider["id"] !=null){
                                                           
                                                            if(is_array($service_provider['service_type'])){
                                                                
                                                                for($i = 0; $i < count($service_provider['service_type']); $i++){
                                                                    if(is_array($service_provider['service_type'][$i])){

                                                                        for($j = 0; $j < count($service_provider['service_type'][$i]); $j++){

                                                                           $service .='<option value='.$service_provider['service_type'][$i][$j].'class="text-small">'.$service_provider['service_type'][$i][$j].'</option>';
                                                                         } 
                                                                    }else{
                                                                        $service .='<option value='.$service_provider['service_type'][$i].' class="text-small">'.$service_provider['service_type'][$i].'</option>';
                                                                     }        
                                                                
                                                                }     
                                                            }else{
                                                                $service .='<option value='.$service_provider['service_type'].'class="text-small">'.$service_provider['service_type'].'</option>';
                                                            }
                                                            echo $service;
                                                        }?>

                                                    </select>


                                                </td>
                                                <td class="price"><input type="text" class="form-control" id="<?php echo 'show'.$service_provider['id']; ?>"></td>
                                                <td><button  class="btn btn-warning btn-sm save" data-toggle="tooltip" data-placement="top" title="Update amount"> <i class="fa fa-refresh"></i></button></td>
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