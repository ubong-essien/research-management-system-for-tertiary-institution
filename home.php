
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
    
<div class="modal fade" id="login" tabindex="-1" role="dialog"
 aria-labelledby="login" aria-hidden="true" >

 <div class="modal-dialog modal-md" style="background-color:#006600;" >
 <div class="modal-content" style="font-family:verdana;background-color:#efefef;">
 <div class="modal-header">

 <h4 class="modal-title" id="login" style="color:orange;">
Enter Your Username and Password
</h4>
 </div>
 <div class="modal-body">
    <form id="loginform">
                <div id="login-box" style="margin-left:100px;">
                    <label style="color:#003300;">Username</label>  
                    <input type="text" class="form-control" name="username" style="width:250px;margin-left" >
                    <label style="color:#003300;">Password</label>  
                    <input type="Password" class="form-control" name="pass" style="width:250px;" ><br/>
                    <button class="btn btn-primary"  style="width:250px;">Login</button><br/>
                    <a href="#">Forgot Password</a>
                </div>
    </form>
    <div id="regstage"></div>
</div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default"
    data-dismiss="modal">Cancel
    </button>
    </div>
 </div> <!-- /.modal-content -->
</div>  <!-- /modal -->
</div>
<img src="<?php echo home_base_url();?>/img/ajax-loader.gif" id="loadingimg" style="display:none;"/>

<script type="text/javascript">
$(document).ready(function(){
	
	 $('#loginform').submit(function(e){
		 $('#loadingimg').css('display:block;');
		// alert("yeeeea")
		 e.preventDefault();
		var regdata=$(this).serialize();
		
		  //alert(regdata);
		    $.ajax({ 
                type:'POST',
				url:'handlers/login_handler.php',
                data:regdata,
				success:function(html){
					$('#loadingimg').css('display:none;');
					$('#regstage').html(html);
					
				
											
									}
				
            });  
		});
 }); 		
</script>