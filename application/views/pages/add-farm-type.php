<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br><br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add New Farm Type
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

                <form class="form" action="<?php echo site_url().'add-farm-type'; ?>"  method="POST">                                                
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                            <label for="farm-type" class="control-label"> Farm Type Name </label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter farm type " value="<?php echo set_value('name'); ?>" required> 
                            </div> 
                        </div>       

                            <div class="col-md-4 col-sm-4">
                        
                            <label for="farm-type" class="control-label"> Status </label>
                            <div class="form-group">
                                <input type="radio" id="status" name="status" value="pending" > Pending

                                <input type="radio" id="status" name="status" value="approve" > Approve

                        </div>
                        </div>
                                                            
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <br>
                                    <button type="submit"  id="farmtype"  class="btn btn-success form-control" >Create</button>
                            </div>
                        </div>



                    </div>  
                </form>
                <br>
                </div>
            </div>
        </div>
    </main>
