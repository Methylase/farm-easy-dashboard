 <div id="layoutAuthentication" class="light-green">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                      <div class="divider" >
                      </div>
                      <!-- logo-->
                    <div class="row">
                      <div class="col-lg-12 text-center">
                        <img src="assets/img/farmeasy-logo.png" height="95" width="95">
                      </div>
                    </div>
                    <!--content-->
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                      <h3 class="text-center font-weight-light my-4">Admin</h3>
                                    </div>
                                    <div class="card-body">
                                          <form method="POST" action="<?php echo site_url().'Usercontroller/auth'; ?>">
                                          
                                            <?php if(!empty($this->session->userdata('msg'))){ ?>
                                                <div class="form-floating mb-3 text-danger">
                                                    <?php echo $this->session->userdata('msg'); ?>
                                                </div>     
                                            <?php
                                                } 
                                            ?>
                                           
                                           <?php if(!empty($this->session->userdata('verify'))){ ?>
                                                <div class="form-floating mb-3 text-danger">
                                                    <?php echo $this->session->userdata('verify'); ?>
                                                </div>     
                                            <?php
                                                } 
                                            ?>                                           
                                          
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" value="<?php echo set_value('email'); ?>"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="">Forgot Password?</a>
                                                <button type="submit" class="btn btn-success btn-md btn-block">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="divider" >
                      </div>
                        <div class="divider" >
                      </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo date('Y') ?> FarmEASY</div>
                            <div>
                              <!--right text-->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    

