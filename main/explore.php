<?php  
$d=getdatabyreg($_SESSION['login_user_verified'],$con);
?>
    <!-- Masthead -->
    <header class="masthead text-white text-center" style=" background: url('<?php echo home_base_url();?>img/res8.jpg') no-repeat center;background-size:cover">
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
		include('../includes/connect.php');
		$sel2 = mysqli_query($con,"SELECT * FROM programme_tb ORDER BY ProgName ASC");	
					if($sel2){
					while($row=mysqli_fetch_array($sel2)){;
						$id=$row['ProgID'];
						$dept_name=$row['ProgName'];
						

?>  
            <li  class="list-group-item"><a onclick="send('<?php echo $id;?>')" href="javascript:void(0)"><?php echo $dept_name;?></a><span class="badge" style="color:red;padding-left:10px;"><?php echo countbydpt($id,$con);?></span></li>
			<?php
					}
				}else{echo"error displaying pages";}
			?>
          </ul>
          <!-- ################################################################################################ --> 
		  <h6 style="color:red;text-align:center;padding:10px;">View By year</h6>
          <!-- ################################################################################################ -->
          <ul style="list-style-type:none;height:300px;overflow-y:scroll;font-family:san-serif">
		  <?php
		$sel2 = mysqli_query($con,"SELECT * FROM session_tb");	
					if($sel2){
					while($row=mysqli_fetch_array($sel2)){;
						$yrid=$row['SesID'];
						$ses_name=$row['SesName'];
						

?>  
            <li class="list-group-item"><a onclick="sendyr('<?php echo $yrid;?>')" href="javascript:void(0)"><?php echo $ses_name;?></a><span class="badge" style="color:red;padding-left:10px;"><?php echo countbyyear($yrid,$con);?></span></li>
			<?php
					}
				}else{echo"error displaying pages";}
			?>
          </ul>
		  		  <h6 style="color:red;text-align:center;padding:10px;">View By Supervisor</h6>
          <!-- ################################################################################################ -->
          <ul style="list-style-type:none;height:300px;overflow-y:scroll;font-family:san-serif">
		  <?php
		$sel2 = mysqli_query($con,"SELECT * FROM supervisors WHERE ProgId='{$d['ProgID']}'");	
					if($sel2){
					while($row=mysqli_fetch_array($sel2)){;
						$supid=$row['id'];
						$Supervisor_name=$row['Supervisor_name'];
						

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
		   <span style="margin-top:20px;margin-left:1%;font-family:san-serif" class="alert alert-success col-md-12 col-lg-12">Welcome! You are logged in as : <?php echo $d['SurName'].",".$d['FirstName']." ".$d['OtherNames']?> with Registration number <?php echo $d['RegNo']?></span>
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
    


<script type="text/javascript">
$(document).ready(function(){
	
		 $('#search').submit(function(e){
			 
			 $('#progbar').show();
			 var srch = $('#srch').val();
			 if(!(srch=="")){
				 
		//alert("yeeeea")
		 e.preventDefault();
		var regdata=$(this).serialize();
		
		//alert(regdata);
		     $.ajax({ 
                type:'POST',
				url:'../handlers/keyword_handler.php',
                data:regdata,
				success:function(data){
					$('#progbar').hide();
					$('#stage').html(data);
					
									}
				
					});  
				}else{
					$('#progbar').hide();
					$('#emtpymsg').html("<p style='color:red'>Please specify a search criteria</p>");
					return false;
				}
        });
		
		
		
		
		
    }); 

function showloader(){
		$('#progbar').show();
		return;
}

function hideloader(){
		
		$('#progbar').hide();
		return;
} 

send = function(id){
	//alert("call loader");
	$('#progbar').show();
	
	var dptid=id;
	$.ajax({ 
                type:'POST',
				url:'../handlers/getdpt.php',
                data:{Dept:dptid},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            }); 
	
	
	return;
}
/**********************************/
sendyr = function(id){
	$('#progbar').show();
	
	var yrid=id;
	$.ajax({ 
                type:'POST',
				url:'../handlers/getyear.php',
                data:{Yr:yrid},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            }); 
	
	
	return;
}
/*******************************/
sendsup = function(id){
	$('#progbar').show();
	
	var sup=id;
	$.ajax({ 
                type:'POST',
				url:'../handlers/getsupervisor.php',
                data:{sup_id:sup},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            }); 
	
	
	return;
}
/*******************************/

function paginate(page){
	$('#progbar').show();
	var p=page;
	//alert(p);
	/* var f=<?php echo $_SESSION['search_key'];?>
	alert(f); */
	//$('#srch').val();
	
	 
	$.ajax({ 
                type:'POST',
				url:'../handlers/keyword_handler.php',
                data:{currentpage:page},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            });  
	
	return;
	
}
/******************************************/
function paginatedpt(page){
	$('#progbar').show();
	var p=page;
	//alert(p);
	/* var f=<?php echo $_SESSION['search_key'];?>
	alert(f); */
	//$('#srch').val();
	
	 
	$.ajax({ 
                type:'POST',
				url:'../handlers/getdpt.php',
                data:{currentpage:page},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            });  
	
	return;
	
}
/*****************************************/
function getsup(page){
	$('#progbar').show();
	var p=page;
	//alert(p);
	/* var f=<?php echo $_SESSION['search_key'];?>
	alert(f); */
	//$('#srch').val();
	
	 
	$.ajax({ 
                type:'POST',
				url:'../handlers/getsupervisor.php',
                data:{currentpage:page},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            });  
	
	return;
	
}

/*****************************************/
function paginateyr(page){
	$('#progbar').show();
	var p=page;
	//alert(p);
	/* var f=<?php echo $_SESSION['search_key'];?>
	alert(f); */
	//$('#srch').val();
	
	 
	$.ajax({ 
                type:'POST',
				url:'../handlers/getyear.php',
                data:{currentpage:page},
				success:function(html){
					//alert(html);
					// $('#stage').hide();
					$('#progbar').hide();
					 $('#stage').html(html);
					
									}
				
            });  
	
	return;
	
}
</script>
   
