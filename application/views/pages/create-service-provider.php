<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                          <h2 class="mt-4"> Create Service Provider</h2>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                             Create Service Provider
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
                            <form class="form" action="<?php echo site_url().'create-service-provider'; ?>"  method="POST">                 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                        <label for="provider-name" class="control-label">Name <i class="text-danger">*</i></label>
                                        <input type="text" id="providername" name="name" class="form-control" placeholder="Enter Service Provider Name" value="<?php echo set_value('name'); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="provider-phone-number" class="control-label"> Phone Number <i class="text-danger">*</i></label>
                                            <input type="text" id="provider-phone" name="phone" class="form-control" placeholder="Enter Service Provider Phone Number" value="<?php echo set_value('phone'); ?>" required> 
                                        </div>
                                    </div>                       
                                </div>
                                <br>
                                <div class="row">                      
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="provider-service-type" class="control-label"> Service Type<i class="text-danger">*</i></label>
                                        <input type="text" id="provider-service-type" name="servicetype" class="form-control"  value="Harvester" required readonly> 
                                        </div>
                                    </div>                                   

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="provider-password" class="control-label"> Password <i class="text-danger">*</i></label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Service Provider Password" value="<?php echo set_value('password'); ?>" required>      
                                            <?php if(!empty($this->session->userdata('password'))){ ?>
                                                <p class="text-danger">
                                                    <?php echo $this->session->userdata('password'); ?>
                                                 </p>                                     
                                            <?php
                                                } 
                                             ?>                                                                    
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="provider-password-confirm" class="control-label">Confirm Password <i class="text-danger">*</i></label>
                                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Enter Service Provider Confirm Password" value="<?php echo set_value('password'); ?>" required>                             
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 col-sm-6">
                                    <label for="" class="control-label" ></label>
                                        <div class="form-group">
                                        <button type="submit"  id="agent"  class="form-control btn btn-success form-control" >Create</button>
                                        </div>
                                    </div>
                                </div>  
                  </form>
                            </div>
                        </div>
                    </div>
                </main>
