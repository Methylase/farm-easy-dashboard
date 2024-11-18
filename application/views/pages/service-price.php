<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"></h2>
            <br><br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                <?php
                    
                    if($price["country"] == "NG"){
                        $symbol = '&#x20A6 ';
                    }else if($price["country"] == "TZ"){
                        $symbol = '&#xa5; ';
                    }
                ?>
                                          
                    Edit <?php echo    $symbol.number_format($price['price'] ,2 ) ?>  Of Service Type <?php echo $price['service'] ?>
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

                <form class="form" action="<?php echo site_url().'update-price'; ?>"  method="POST">                                                
                    <div class="row">
                        <input type="hidden" value="<?php echo $price['id'] ?>" name="id">

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                            <label for="service-type" class="control-label"> Service Type Name </label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter farm type " value="<?php echo $price['service'] ?>" readonly> 
                            </div>
                        </div> 


                          <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                            <label for="price" class="control-label"> Price </label>
                                <input type="text" id="price" name="price" class="form-control" placeholder="Enter farm type " value="<?php echo $price['price'] ?>" required> 
                            </div>
                        </div> 


                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <br>
                                    <button type="submit"  id="serviceprice"  class="btn btn-success form-control" >Update</button>
                            </div>
                        </div>
                    </div>  
                </form>
                <br>
                </div>
            </div>
        </div>
    </main>

