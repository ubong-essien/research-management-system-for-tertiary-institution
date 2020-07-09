
    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5" style="color:white;font-family:arial black;"><img src="img/logoban.png" alt='logo' />Welcome to XYZ Research Project Management System</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <?php
            if(isset($_SESSION['login_user_verified']) && ($_SESSION['login_user_prev'] == 1)){
                  echo" <a href='".home_base_url()."main/index.php' class='btn btn-primary btn-lg' >Explore</a>";
            }else if(isset($_SESSION['login_user_verified']) && ($_SESSION['login_user_prev'] == 3)) {
              echo" <a href='".home_base_url()."staff/staff_explore/index.php' class='btn btn-primary btn-lg' >Explore</a>";
            }else if(isset($_SESSION['login_user_verified']) && ($_SESSION['login_user_prev'] == 2)){
              echo" <a href='".home_base_url()."pg/pg_explore/index.php' class='btn btn-primary btn-lg' >Explore</a>";
            }else{
              echo" <a href='".home_base_url()."login.php' class='btn btn-primary btn-lg' >Explore</a>";
            }
           ?>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
      <p class="alert alert-info">Students Work</p>
        <div class="row" style="font-family:arial narrow;">
         
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 20% ;">
               <img src="img/under.png" alt="" width="120px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">Under Graduate</h3>
              <h2>1232</h2>
             
            </div>
          </div>
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 0 ;">
              <img src="img/msc3.png" alt="" width="120px" height="100px;">
              </div>
              <h3  style="font-family:arial narrow">Masters </h3>
              <h2>1232</h2>
             
            </div>
          </div>
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 0 ;">
              <img src="img/phd.png" alt="" width="120px" height="100px;" >
              </div>
              <h3 style="font-family:arial narrow">PhD thesis</h3>
              <h2>1232</h2>
             
            </div>
          </div> 
        </div>
        <p class="alert alert-info">Staff Work</p>
        <div class="row" style="font-family:arial narrow;">
        
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 0 ;">
              <img src="img/mono1.png" alt="" width="120px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">Monograph</h3>
              <h2>1232</h2>
             
            </div>
          </div>
         
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 10% ;">
              <img src="img/journal.png" alt="" width="120px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">Refeered Journal</h3>
              <h2>1232</h2>
             
            </div>
          </div>
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 0 ;">
              <img src="img/textbook.png" alt="" width="120px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">TextBooks</h3>
              <h2>1232</h2>
             
            </div>
          </div>
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 35% ;">
              <img src="img/proceed.png" alt="" width="100px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">Conference Proceedings</h3>
              <h2>1232</h2>
             
            </div>
          </div>
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 0 ;">
              <img src="img/bookchapter.png" alt="" width="120px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">Book Chapter</h3>
              <h2>1232</h2>
             
            </div>
          </div>
          <div class="card col-lg-3 item" style="font-family:arial narrow;background:#ccc;margin:38px">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="padding:5px 0 0 20% ;">
              <img src="img/under.png" alt="" width="120px" height="100px;">
              </div>
              <h3 style="font-family:arial narrow">Total Publications</h3>
              <h2>1232</h2>
             
            </div>
          </div>
        </div>
      </div>
    </section>

  
    
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


