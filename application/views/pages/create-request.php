<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                           <h2 class="mt-4">Add New Request</h2>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              New Farm Request
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

                            <form class="form" action="<?php echo site_url().'create-request'; ?>"  method="POST">                 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                        <label for="farmer-name" class="control-label"> Farmer Name <i class="text-danger">*</i></label>
                                        <input type="text" id="farmername" name="name" class="form-control" placeholder="Enter Farmer Name" value="<?php echo set_value('name'); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="service type" class="control-label"> Service Type <i class="text-danger">*</i></label>
                                        <select name="service_type" class="form-control" required>
                                        <option value="">Select-Service-Type</option>
                                         <?php foreach($service_types as $service_type){?>
                                            <option value="<?php echo $service_type['service'] ?>"><?php echo $service_type['service'] ?></option>
                                         <?php } ?>
                                        </select>
                                        </div>
                                    </div>                        
                                </div>
                                <br>
                                <div class="row">                      
                                    <div class="col-md-6 col-sm-6">
                                         <div class="form-group">
                                        <label for="location" class="control-label"> Farmer's location <i class="text-danger">*</i></label>
                                            <input type="text" id="location" name="location" class="form-control" placeholder="Enter location" value="<?php echo set_value('location'); ?>" required> 
                                        </div>

                                      
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="phone-number" class="control-label"> Farmer's phone<i class="text-danger">*</i> </label>
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo set_value('phone'); ?>" required> 
                                        </div>
                                    </div>                                                       
                                </div>
                                <br>
                                  <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="phone-number" class="control-label">Tick farm type (s):  <i class="text-danger">*</i></label>
                                        <br>
                                          <p>
                                              Rice <input type="checkbox" id="farmtype" name="farm_type[]" value="rice"> </p>

                                       <p> Wheat <input type="checkbox" id="farmtype" name="farm_type[]" value="wheat"> </p>

                                         <p> Maize <input type="checkbox" id="farmtype" name="farm_type[]" value="maize"> </p>
                                          </p>
                                    </div>                                     
                                  
                                </div>  
                                 <div class="form-group">
                                            <br>
                                             <button type="submit"  id="request"  class="btn btn-success form-control" >Create</button>
                                        </div>

                            <!--     <div class="row"> 
                              <div class="form-group">
                                        <label for="email" class="control-label"> Service Provider</label>
                                        <select name="service_provider" class="form-control" required>
                                            <option value="">Select-Service-Provider</option>
                                         <?php foreach($service_providers as $service_provider){?>
                                            <option value="<?php echo $service_provider['id'] ?>"><?php echo $service_provider['name'] ?></option>
                                         <?php } ?>
                                        </select>                            
                                        </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="amount" class="control-label"> Amount</label>
                                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Enter Amount" value="<?php echo set_value('amount'); ?>" required>                     
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="measurement" class="control-label"> Measurement </label>
                                            <input type="text" id="measurement" name="measurement" class="form-control" placeholder="Enter measurement" value="<?php echo set_value('measurement'); ?>" required> 
                                        </div>
                                    </div>                                                       
                                </div> -->
                                                             
                              
                  </form>
                            </div>
                        </div>
                    </div>
                </main>
