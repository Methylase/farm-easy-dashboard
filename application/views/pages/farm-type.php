<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"></h2>
            <br><br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit <?php echo $farm_type['farm'] ?> Farm Type
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

                <form class="form" action="<?php echo site_url().'update-farm-type'; ?>"  method="POST">                                                
                    <div class="row">
                        <input type="hidden" value="<?php echo $farm_type['id'] ?>" name="id">

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                            <label for="farm-type" class="control-label"> Farm Type Name </label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter farm type " value="<?php echo $farm_type['farm'] ?>" required> 
                            </div>
                        </div> 


                          <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                            <label for="farm-type" class="control-label"> Status </label>
                                <input type="text" id="status" name="status" class="form-control" placeholder="Enter farm type " value="<?php echo $farm_type['status'] ?>" required> 
                            </div>
                        </div> 


                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <br>
                                    <button type="submit"  id="farmtype"  class="btn btn-success form-control" >Update</button>
                            </div>
                        </div>
                    </div>  
                </form>
                <br>
                </div>
            </div>
        </div>
    </main>

