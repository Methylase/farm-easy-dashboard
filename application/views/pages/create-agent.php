 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                          <h2 class="mt-4"> Create New Agent</h2>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                             Agent
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
                            <form class="form" action="<?php echo site_url().'create-agent'; ?>"  method="POST">                 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                        <label for="agent-name" class="control-label"> Agent Name <i class="text-danger">*</i></label>
                                        <input type="text" id="agentname" name="name" class="form-control" placeholder="Enter Agent Name" value="<?php echo set_value('name'); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="location" class="control-label"> Country <i class="text-danger">*</i></label>
                                        <select type="text" id="country" name="country" class="form-control" >
                                            <option>Select Country</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="TZ">Tazania</option>
                                        </select>
                                       
                                        </div>
                                    </div>                        
                                </div>
                                <br>
                                <div class="row">                      
                                  
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                        <label for="phone-number" class="control-label"> Phone Number <i class="text-danger">*</i></label>
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Agent Phone Number" value="<?php echo set_value('phone'); ?>" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label></label>
                                        <button type="submit"  id="agent"  class="btn btn-success form-control" >Create</button>
                                        </div>
                                    </div>                                    

                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </main>
