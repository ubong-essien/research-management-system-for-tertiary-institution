<?php
include('../includes/admin_header.php');
//include('../includes/connect.php');


?>
<div class="container" style="background-color:;height:auto;">
    <div class="row" style="margin-top:70px;">

        <div class="col-md-4 hidden-print">
        <div class="panel panel-primary">
        <div class="panel-heading ">
      Enter the verification Code
        </div><hr>
            <div class="panel-body">
            <form id="verify" action="verify.php" method="post">
                
                    <label class="input-group-addon">Token</label>
                    <input type="text" class="form-control" name="token" required/>
               
               
                
            </div><br/>
            <div class="panel-footer">
            <input type="submit" class="btn btn-primary " name="verify" max="10"/>
            </div> <hr/>
             </form>
             <h4 style="text-align:center">Note</h4>
                <ul>
                <li style="color:blue">Please Enter a Verification code to verify if reseach work has been uploaded</li>
              
                
                </ul>
            </div>
           
        </div>
        <?php
  if(!empty($_POST['verify'])){
    $tkn=mysqli_real_escape_string($con,(trim($_POST['token'])));	
	$q=getbytoken($tkn,$con);
	$r=getdatabyreg($q['RegNo'],$con);
	$passport=$r['Passport'];
    ?>
        <div class="col-md-8">
        <div class="panel panel-default">
  <div class="panel-body" id="bioupdtstage" style="height:auto;">

  <div class="row">
	<div class="col-md-12 col-xs-12 " style="margin-top:-20px">
	<h3 style="font-family:san-serif;text-align:center;">AKWA IBOM STATE UNIVERSITY</h3>
	</div>
  </div>
  <p style="font-family:times new romans"><?php //echo "Receipt Printed:".$printed;?></p>
<hr>
  <div class="row" style="height:auto;">
        <div class="col-md-4 col-xs-4 " style="height:260px;">
            <div class="card" >
                <div class="card-content"><img src="<?php echo "../assets/img/ph.jpg"; ?>" alt="<?php echo $passport;?>"  style="height:240px;border:2px black;" class="img-responsive"></div>
           
			</div>
			</div>
			<div class="col-md-8 col-xs-8">
				<div class="card" style="height:">
					<div class="card-content">
                    <table class="table table-hover table-bordered " style="font-family:verdana;background-image:url('');">
					<tr><th colspan="2" style="text-align:center;background-color:#c0c0c0;font-family:verdana;">Basic Details</th></tr>
					
					<tr><td >Reg No</td><td><?php echo $q['RegNo'];?></td></tr>
					<tr><td >Department</td><td><?php echo GetProgDetails($q['DeptID'],$con)?></td></tr>
					<tr><td >Level</td><td><?php echo $q['Date_Submitted'];?></td></tr>
					<tr><td >Status</td><td><?php echo "<b style='color:green;'>Research Uploaded &#10004</b>"?></td></tr>
					
					
                    </table>
					
					</div>
			   
				</div>
			</div>
			
			</div>
			
			
			
  </div>
</div>
      
        </div>
	 <?php
	 
    }
    ?> 	
		
		
    </div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<?php
include('../includes/footer.php');