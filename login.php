<?php
include('includes/login_header.php');
?>
<div class="container" style="background-image:url('<?php echo home_base_url();?>img/bg.jpg');margin-top:5%;opacity:0.95;border-radius:10px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-2" style="margin-left:25%;margin-top:5%;">
			<h4 class="" id="login" style="color:orange;text-align:centre">
			Enter Your Username and Password
			</h4>

					 <div class="">
						
									<div id="login-box" style="margin-left:25%;">
									<form id="loginform">
										<label style="color:#003300;">Username</label>  
										<input type="text" class="form-control" name="username" style="width:250px;margin-left" >
										<label style="color:#003300;">Password</label>  
										<input type="Password" class="form-control" name="pass" style="width:250px;" ><br/>
										<button  class="btn btn-primary" name="submit"  style="width:250px;" > Sign In <li class="fa fa-sign-in" id="submit"></li></button><br>
										<a href="#"><li class="fa fa-key"></li> Forgot Password</a><br/><br/><br/><br/>
										</form>
									</div>
						
						<div id="regstage"></div>
						</div>
				</div>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	
	
	<?php
	//include('includes/footer.php');
?>
	<script type="text/javascript">
	

$(document).ready(function(){
	$('#loginform').submit(function(e){
		 $('#submit').removeClass('fa-sign-in');
		 $('#submit').addClass('fa-cog fa-spin');
		//alert("yeeeea");
		 e.preventDefault();
		var regdata=$(this).serialize();
		
		 // alert(regdata);
		     $.ajax({ 
                type:'POST',
				url:'handlers/login_handler.php',
                data:regdata,
				success:function(html){
					$('#submit').removeClass('fa-cog fa-spin');
					//$('#submit').addClass('fa-sign-in');
					
					$('#regstage').html(html);
					
				
											
									}
				
            });  
		});
 }); 		
</script>
