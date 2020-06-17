
    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5" style="color:white;"><img src="img/logoban.png" alt='logo' />Welcome to AKSU Research Project Management System</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
           
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-notebook m-auto text-primary"></i>
              </div>
              
              <h3>Under Graduate</h3>
              <h2>1232</h2>
              <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-graduation m-auto text-primary"></i>
              </div>
              <h3>Masters(Thesis)</h3>
              <h2>1232</h2>
              <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <h3>Doctorate(PhD thesis)</h3>
              <h2>1232</h2>
              <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Why Use AKSU Research Project Management System</h2>
             <a href="" class="btn btn-primary">Learn more</a>
          </div>
         
        </div>
      </div>
    </section>
    <!--modals for display of why choose AKSU-->
    
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true" >
    <div class="modal-dialog modal-lg" style="background-color:#006600;" >
        <div class="modal-content" style="font-family:verdana;background-color:#efefef;">
          <div class="modal-header">
          <h4 class="modal-title" id="signup" style="color:orange;">Choose the category </h4>
          </div>
            <div class="modal-body">
                <form id="signupform">
                            <div id="login-box" style="margin:10px;">
                               <div class="row">
                                  <div class=" card col-md-4">
                                  <label for="user_type" style="font-family:arial narrow;font-size:20px;text-align:center;font-weight:bolder">Undergraduate</label>
                                  <input type="radio" id="user_type" name="user_type" class="form-control" value="U" style="height:80px;width:80px;display:block;margin-left:30%">
                                  <br/>
                                  </div>
                                
                                  <div class="card col-md-4">
                                  <label for="user_type" style="font-family:arial narrow;font-size:20px;text-align:center;font-weight:bolder">Postgraduate</label>
                                  <input type="radio" id="user_type" name="user_type" class="form-control" value="P" style="height:80px;width:80px;display:block;margin-left:30%">
                                  <br/>
                                  </div>
                                  
                                  <div class="card col-md-4">
                                  <label for="user_type" style="font-family:arial narrow;font-size:20px;text-align:center;font-weight:bolder">Staff Only</label>
                                  <input type="radio" id="user_type" name="user_type" class="form-control" value="S" style="height:80px;width:80px;display:block;color:#003300;margin-left:30%">
                                  <br/>
                                  </div>
                               </div><br/>
                               <button type="submit" class="btn btn-primary " name="continue"  >Continue <li class="fa fa-forward"></li></button>
                            </div>
                </form>
                <img src="<?php echo home_base_url();?>/img/ajax-loader.gif" id="loadingimg" style="display:none;"/>
                <div id="regstage"></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div> <!-- /.modal-content -->
    </div>  <!-- /modal -->
</div>
<img src="<?php echo home_base_url();?>/img/ajax-loader.gif" id="loadingimg" style="display:none;"/>


