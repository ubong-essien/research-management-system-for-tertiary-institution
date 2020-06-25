<?php  
$email = $_SESSION['login_user_verified'];
$d = getnewstaff($email,$con);
?>
    <!-- Masthead -->
    <header class="masthead text-white text-center" style=" background: url('<?php echo home_base_url();?>img/bgo.jpg') no-repeat center;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5" style="color:white;"><img src="<?php echo home_base_url();?>img/logoban.png" alt='logo' /> Research Project Management System</h1>
          </div>
         
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <div class="<?php echo $setting['layout'];?>">
	
        <div class="row">
		
        <div class="col-md-3 col-sm-3 col-xs-12" > 
		<h6 style="color:red;text-align:center;padding:30px;">View By Department</h6>
          <!-- ################################################################################################ -->
          <ul style="list-style-type:none;height:500px;overflow-y:scroll;font-family:san-serif">
		  <?php
		include('../../includes/connect.php');
		$sel2 = mysqli_query($con,"SELECT * FROM programme_tb ORDER BY ProgName ASC");	
					if($sel2){
					while($row=mysqli_fetch_array($sel2)){;
						$id=$row['ProgID'];
						$dept_name=$row['ProgName'];
						

?>  
            <li  class="list-group-item"><a onclick="staff_send('<?php echo $id;?>')" href="javascript:void(0)"><?php echo $dept_name;?></a><span class="badge" style="color:red;padding-left:10px;"><?php  $v = staffsubbydpt($id,$con); echo $v[0];?></span></li>
			<?php
					}
				}else{echo"error displaying pages";}
			?>
          </ul>
          <!-- ################################################################################################ --> 
		  
		  		  <h6 style="color:red;text-align:center;padding:10px;">View By Staff</h6>
          <!-- ################################################################################################ -->
          <ul style="list-style-type:none;height:300px;overflow-y:scroll;font-family:san-serif">
		  <?php
		$sel2 = mysqli_query($con,"SELECT * FROM staff_tb");	
					if($sel2){
					while($row=mysqli_fetch_array($sel2)){;
						$supid=$row['StaffID'];
						$Supervisor_name=$row['StaffName'];
						

?>  
            <li class="list-group-item"><a onclick="sendsup('<?php echo $supid;?>')" href="javascript:void(0)"><?php echo $Supervisor_name;?></a><span class="badge" style="color:red;padding-left:10px;"><?php echo countbysup($supid,$con);?></span></li>
			<?php
					}
				}else{echo"error displaying pages";}
			?>
          </ul>
        </div>
       
			
        <div class="col-md-9 col-sm-9 col-xs-12" style="padding:10px;" > 
		<div class="inv-proGresBar" id="progbar" style="display:none;">
		<div class="inv-proGRa" ></div>
		</div>
		<div class="row">
		   <span style="margin-top:20px;margin-left:1%;font-family:san-serif" class="alert alert-success col-md-12 col-lg-12">Welcome! You are logged in as : <?php echo $d['StaffName'];?> with Staff Number <?php echo $d['StaffSchID']?></span>
		</div>
		<div class="row" id="">
				<div class="col-md-12 col-lg-12" style="padding-top:30px;">
				
				
		<h6 style="color:red;">Search By keyword</h6>
				  <form id="search">
					  <div class="form-row">
						<div class="col-12 col-md-9 mb-2 mb-md-0">
						  <input type="text" name="s_criteria" id="srch" class="form-control form-control-md" placeholder="Type a search keyword" />
						  
						</div>
							
						<div class="col-12 col-md-3">
						  <input type="submit" name="search" value="Search" class="btn btn-block btn-md btn-primary" />
						</div>
					  </div>
					</form>
			<span id="emtpymsg"></span>
         </div>
		 <br/>
		 <br/>
		 <br/>
		 <br/>
		 <br/>
		 
			 <div class="col-md-12 col-lg-12" id="stage" style="background-color:#ffffff;border-radius:5px;">
			 
			 </div>
		 </div>
			
			</div>
			
        </div>
        
          <!-- ################################################################################################ --> 
        </div>
        
    
</div>
    



   
