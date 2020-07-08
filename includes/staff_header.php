<?php
include('connect.php');
include('function.php');
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
    <link rel="stylesheet" href="<?php echo home_base_url();?>assets/css/Features-Boxed.css" />
    <link rel="stylesheet" href="<?php echo home_base_url();?>assets/css/Material-Card.css" />
    <link rel="stylesheet" href="<?php echo home_base_url();?>assets/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo home_base_url();?>assets/css/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo home_base_url();?>css/added.css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo home_base_url();?>css/landing-page.min.css" rel="stylesheet">
    <script src="<?php echo home_base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo home_base_url();?>assets/js/pagination.js"></script>
    <script src="<?php echo home_base_url();?>assets/js/app.js"></script>

<style type="text/css">

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
}


    </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-default  static-top" style="background-color:#003300;">
      <div class="container-fluid" style="background-color:#003300;">
        <a class="navbar-brand" href="<?php echo home_base_url();?>" style="color:white;"><img src="<?php echo home_base_url();?>img/logoban.png" width="" height="50px;"/>AKSU Research Library</a>
        <div class="navbar-header">
		
		
		<a  href="<?php echo home_base_url();?>staff/index.php" class="btn btn-success btn-sm"> <li class="fa fa-home"></li> Home</a>
    <?php	if(!isset($_SESSION['login_user_verified'])):
      echo" <a  href='".home_base_url()."login.php' class='btn btn-danger btn-sm'> <li class='fa fa-power-off'></li> Login</a>";
      echo "<a  data-toggle='modal'	data-target='#signup' href='#signup' title='Signup' class='btn btn-success btn-sm'> <li class='fa fa-upload'></li> Sign Up</a>";
  endif;
    ?> 
	
		<a  href="<?php echo home_base_url();?>staff/staff_explore/index.php" class="btn btn-success btn-sm"> <li class="fa fa-search"></li> Search</a>
	<?php	if(isset($_SESSION['login_user_verified'])):
      echo" <a  href='".home_base_url()."logout.php' class='btn btn-danger btn-sm'> <li class='fa fa-power-off'></li> logout</a>";
  endif;
    ?>    
      </div>
	  </div>
    </nav>
