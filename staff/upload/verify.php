<?php
include('../includes/function.php');
chksession();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Journal System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo home_base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo home_base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo home_base_url();?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?php echo home_base_url();?>css/landing-page.min.css" rel="stylesheet">
    <link href="<?php echo home_base_url();?>css/simplePagination.css" rel="stylesheet">
    <link href="<?php echo home_base_url();?>css/w3css.css" rel="stylesheet">
	 <script src="<?php echo home_base_url();?>vendor/jquery/jquery.min.js"></script>
<style type="text/css">
			.adjust-preview{
				margin-left:20%;
			}
			
.inv-proGresBar{width:900px!important;height:5px;}
.inv-proGRa{animation: progbar 0.6s infinite;width:150px;height: 5px;background-color: rgb(255, 136, 0);}
/* Safari 4.0 - 8.0 */ 
@-webkit-keyframes progbar {
    0%   {margin-left:0px; top:1px;}
    100%  {margin-left:100%; top:1px;}
}

/* Standard syntax */
@keyframes progbar {
    0%   {margin-left:0px; top:1px;}
    100%  {margin-left:100%; top:1px;}
}
			</style>

  </head>

  <body style="background-color:#707070;">

    <!-- Navigation -->
    <nav class="navbar navbar-default  static-top" style="background-color:#003300;">
      <div class="container-fluid" style="background-color:#003300;">
        <a class="navbar-brand" href="<?php echo home_base_url();?>" style="color:white;"><img src="<?php echo home_base_url();?>img/logoban.png" width="" height="50px;"/>AKSU Research Library</a>
        <div class="navbar-header">
		  <?php
						  
						  $url_var=array(
								'logged_user'=>$_SESSION['login_user_verified'],
								'action'=>'reprint'
						  );
								$url=http_build_query($url_var);
								
						  ?>
		
		<a  href="<?php echo home_base_url();?>main/index.php" class="btn btn-success btn-sm"> <li class="fa fa-home"></li> Home</a>
		<a  href="<?php echo home_base_url();?>upload/index.php" class="btn btn-success btn-sm"> <li class="fa fa-upload"></li> Upload</a>
		<a href="<?php echo home_base_url();?>upload/verify.php?<?php echo $url;?>" class="btn btn-primary btn-sm"> <li class="fa fa-print"></li> Reprint slip</a>
       
		<a  href="<?php echo home_base_url();?>logout.php" class="btn btn-danger btn-sm"> <li class="fa fa-power-off"></li> logout</a>
        
      </div>
	  </div>
    </nav>
<?php

include('../includes/connect.php');
	$REG=mysqli_real_escape_string($con,(trim($_GET['logged_user'])));	
$date=date('d-m-Y');

?>
<div class="wrapper" >
	<div class="container" style="background-color:#ffffff;">

		<div class="panel panel-default" style="margin-top:20px">
	  <div class="panel-body" id="bioupdtstage" style="height:;">

	  <div class="row">
	  <?php
	  $infoarr=getuploadbyreg($REG,$con);
	  if(!empty($infoarr)):
	  ?>
		<div class="col-md-12 col-lg-12 col-xs-4 col-md-offset-5 col-xs-offset-5 col-lg-offset-5" style="margin-top:20px" >
		<img src="<?php echo home_base_url();?>assets/img/logoban.png" class="img-responsive" style="align:center;margin-left:43%"/>
		<button class="hidden-print btn btn-default" onclick="window.print();" style="margin-left:80%"><li class="fa fa-print"></li> Print Slip</button>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-12 col-xs-12 " style="margin-top:20px">
		<h3 style="font-family:san-serif;text-align:center;">AKWA IBOM STATE UNIVERSITY</h3>
		</div>
		<div class="col-md-12 col-xs-12 " style="margin-top:-20px">
		<h4 style="font-family:san-serif;text-align:center;font-weight:bolder;"><u>Research Notification Slip</u></h4>
		</div>
	  </div>
	  <p style="font-family:times new romans"><?php echo "Receipt Printed:".$date;?></p>
	<hr>
	  <div class="row" style="height:auto;">
	  
		
	  
	  
	  	<div class="col-md-4 col-xs-4 " style="height:100%;">
				<img src="<?php echo "../assets/img/ph.jpg"; ?>" alt="<?php echo $passport;?>"  style="height:100%;border:2px black;" class="img-responsive">
				</div>
			   
				
				<div class="col-md-8 col-xs-8">
				<?php
				
				
				$record=getdatabyreg($REG,$con);
				?>
					
						<table class="table table-hover table-bordered " style="font-family:arial;background-image:url('');">
						<tr><th colspan="2" style="text-align:center;background-color:#c0c0c0;font-family:arial;">Basic Details</th></tr>
						<tr><td >Name</td><td><?php echo  $record['SurName'].",".$record['FirstName']." ".$record['OtherNames'];?></td></tr>
						<tr><td >Reg No</td><td><?php echo $infoarr['RegNo'];?></td></tr>
						<tr><td >Department</td><td><?php echo GetProgDetails($record['ProgID'],$con)?></td></tr>
						<tr><td >Faculty</td><td><?php $f=getfaculty($infoarr['FacID'],$con); echo $f[1];?></td></tr>
						<tr><td >Phone</td><td><?php echo $infoarr['Phone'];?></td></tr>
						<tr><td >Email</td><td><?php echo $infoarr['Email'];?></td></tr>
						
						
						</table>
						
						
				</div>
				
				</div>
				
				<!----------payment detAILS---------->
				
					<div class="row">
				<div class="col-md-12 col-xs-12" style="height:auto;">
						<table class="table table-bordered table-hover " style="font-family:arial;">
						<tr><th colspan="2" style="text-align:center;background-color:#c0c0c0;font-family:verdana;">Reseach Details</th></tr>
						<tr><td >Topic</td><td><b><?php echo $infoarr['Submission_Title'];?></b></td></tr>
						<tr><td >Supervisor</td><td><?php echo getsupervisor($infoarr['SupervisorId'],$con);?></td></tr>
						<tr><td >Date Submitted</td><td><?php echo $infoarr['Date_Submitted'];?></td></tr>
						<tr><td >Verification token</td><td><?php echo $infoarr['Token'];?></td></tr>
						<tr><td >Session</td><td><?php echo GetSes($infoarr['Ses'],$con);?></td></tr>
						
						<p style='position:absolute; color: #808080;font-size: 120px;-webkit-transform: rotate(-45deg);-moz-transform: rotate(-45deg);right:center;opacity:0.09;z-index:2;font-weight:bold;font-family:times new romans;'>APPROVED</p>
				
						</table>
				</div>		
				
				
			</div>
			<?php
			else:
		
		echo "<span class='alert alert-danger' style='margin-left:10%;margin-top:5%'>No record to display for the user!</span>";
			endif;
			?>			
				
				
		</div>
	</div>
		  
	 </div>
	 </div>
        