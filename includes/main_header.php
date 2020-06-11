<?php
include('connect.php');
include('function.php');
chksession();
$setting=load_settings($con);
$setting['layout'];
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



	@keyframes bounce {
	0%, 20%, 60%, 100% {
		-webkit-transform: translateY(0);
		transform: translateY(0);
	}

	40% {
		-webkit-transform: translateY(-20px);
		transform: translateY(-20px);
	}

	80% {
		-webkit-transform: translateY(-10px);
		transform: translateY(-10px);
	}
}

.item:hover {
	animation: bounce 1s;
	background-color: #060606;
	
}
  
			</style>

  </head>

  <body style="background: url('<?php echo home_base_url();?>img/bg.jpg')">

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
		
		<a  href="<?php echo home_base_url();?>index.php" class="btn btn-success btn-sm"> <li class="fa fa-home"></li> Home</a>
		<a  href="<?php echo home_base_url();?>main/index.php" class="btn btn-success btn-sm"> <li class="fa fa-home"></li> Search</a>
		<a  href="<?php echo home_base_url();?>upload/index.php" class="btn btn-success btn-sm"> <li class="fa fa-upload"></li> Upload</a>
		<a href="<?php echo home_base_url();?>upload/verify.php?<?php echo $url;?>" class="btn btn-primary btn-sm"> <li class="fa fa-print"></li> Reprint slip</a>
       
		<a  href="<?php echo home_base_url();?>logout.php" class="btn btn-danger btn-sm"> <li class="fa fa-power-off"></li> logout</a>
        
      </div>
	  </div>
    </nav>
