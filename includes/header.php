<?php
include('connect.php');
include('function.php');
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
    <link rel="stylesheet" href="<?php echo home_base_url();?>assets/css/Material-Card.css" />
    <link rel="stylesheet" href="<?php echo home_base_url();?>assets/css/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo home_base_url();?>/css/added.css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo home_base_url();?>css/landing-page.min.css" rel="stylesheet">
    <script src="<?php echo home_base_url();?>vendor/jquery/jquery.min.js"></script>
   
   <script src="<?php echo home_base_url();?>assets/js/app.js"></script>

    <style type="text/css">
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

  <body style="background: url('<?php echo home_base_url();?>img/bgh.jpg');no-repeat">

    <!-- Navigation -->
    <nav class="navbar navbar-default  static-top" style="background-color:#003300;">
      <div class="container-fluid" style="background-color:#003300;">
        <a class="navbar-brand" href="<?php echo home_base_url();?>" style="color:white;"><img src="<?php echo home_base_url();?>img/logoban.png" width="" height="50px;"/>AKSU Research Library</a>
        <div class="navbar-header">
		
		
		<a  href="<?php echo home_base_url();?>index.php" class="btn btn-success btn-sm"> <li class="fa fa-home"></li> Home</a>
		<a  href="<?php echo home_base_url();?>login.php" class="btn btn-primary btn-sm"> <li class="fa fa-key"></li> login</a>
		<a  data-toggle="modal"	data-target="#signup" href="#signup" title="Signup" class="btn btn-success btn-sm"> <li class="fa fa-upload"></li> Sign Up</a>
		<a  href="<?php echo home_base_url();?>main/index.php" class="btn btn-success btn-sm"> <li class="fa fa-search"></li> Search</a>
    <?php
    if(isset($_SESSION['login_user_verified'])){
    echo "<a  href='<?php echo home_base_url();?>logout.php' class='btn btn-danger btn-sm'> <li class='fa fa-power-off'></li> logout</a>";

    }
    ?>
		   
      </div>
	  </div>
    </nav>
