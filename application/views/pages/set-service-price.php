<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                          <h2 class="mt-4"> Set Service Type Price</h2>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Set Service Type Price
                            </div>
                            <div class="card-body">
                            <?php if(!empty($this->session->userdata('msg_success'))){ ?>
                                <div class=" offset-md-1 col-md-10 offset-sm-1 col-sm-10 alert
                                alert-success alert-dismissable text-center">
                                    
                                    <strong>
                                    Success
                                    </strong>
                                    <?php echo $this->session->userdata('msg_success'); ?>
                                    <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
                                </div>                                     
                            <?php
                                } 
                            ?>
                            <?php if(!empty($this->session->userdata('msg_danger'))){ ?>
                                <div class="offset-md-1 col-md-10 offset-sm-1 col-sm-10 alert
                                alert-danger alert-dismissable text-center">
                                    <strong>
                                    Danger
                                    </strong>
                                    <?php echo $this->session->userdata('msg_danger'); ?>
                                    <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
                                </div>                                     
                            <?php
                                } 
                            ?>                            
                            <br>
                            <form class="form" action="<?php echo site_url().'set-service-price'; ?>"  method="POST"> 
                            <?php  if($this->session->userdata('user_type') == '1'){ ?>
                                <input type="hidden" name="country" value="<?php echo $this->session->userdata('country') ?>">                 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="location" class="control-label"> Country <i class="text-danger">*</i></label>
                                        <select type="text" id="country" name="country" class="form-control" required>
                                            <option value="">Select Country</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="TZ">Tazania</option>
                                        </select>
                                       
                                        </div>
                                    </div>                                      
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="service-type" class="control-label"> Service Type <i class="text-danger">*</i></label>
                                        <select type="text" id="servicetype" name="service_type_id" class="form-control" required>
                                            <option value="">Select Service Type</option>
                                            <?php foreach($service_types as $service_type){?>
                                            <option value="<?php echo $service_type['id'] ?>"><?php echo $service_type['service'] ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                        </div>
                                    </div> 
                                    
                       
                                </div>
                                <br>
                                <div class="row">                      
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="service-provider" class="control-label"> Service Provider <i class="text-danger">*</i></label>
                                        <select type="text" id="serviceprovider" name="sp_id" class="form-control" required>
                                            <option value="">Select Service Provider</option>
                                            <?php foreach($service_providers as $service_provider){?>
                                            <option value="<?php echo $service_provider['id'] ?>"><?php echo $service_provider['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                        </div>
                                    </div>                                   
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="price" class="control-label"> Price <i class="text-danger">*</i></label>
                                            <input type="text" id="price" name="price" class="form-control" placeholder="Enter Service Type Price" value="<?php echo set_value('phone'); ?>" required> 
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 offset-sm-6 col-sm-6">
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-success form-control" >Create</button>
                                        </div>
                                    </div>
                                </div>                                

                            <?php }else if($this->session->userdata('user_type') == '2'){?>

                                <input type="hidden" name="country" value="<?php echo $this->session->userdata('country') ?>">                 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="service-type" class="control-label"> Service Type <i class="text-danger">*</i></label>
                                        <select type="text" id="servicetype" name="service_type_id" class="form-control" required>
                                            <option value="">Select Service Type</option>
                                            <?php foreach($service_types as $service_type){?>
                                            <option value="<?php echo $service_type['id'] ?>"><?php echo $service_type['service'] ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="service-provider" class="control-label"> Service Provider <i class="text-danger">*</i></label>
                                        <select type="text" id="serviceprovider" name="sp_id" class="form-control" required>
                                            <option value="">Select Service Provider</option>
                                            <?php foreach($service_providers as $service_provider){?>
                                            <option value="<?php echo $service_provider['id'] ?>"><?php echo $service_provider['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                        </div>
                                    </div>                        
                                </div>
                                <br>
                                <div class="row">                      
                                  
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="price" class="control-label"> Price/Per Unit <i class="text-danger">*</i></label>
                                            <input type="text" id="price" name="price" class="form-control" placeholder="Enter Service Type Price" value="<?php echo set_value('phone'); ?>" required> 
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <button type="submit"  class="btn btn-success form-control" >Create</button>
                                        </div>
                                    </div>

                                </div>
                                <?php }?>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
