<?php
include('../includes/admin_header.php');
?>
<div class="features-boxed" style="margin-top:-1px;background-color:#808080">
        <div class="container">
            <div class="intro"></div>
            <div class="row features" style="margin-top:0px;">
			<?php 
			$r=getAllRecord($con,"dashboard_menu","Link_row=1 AND active=1","link_order",4);
			while($row=mysqli_fetch_assoc($r)):
			?>
                <div class="col-md-3 col-sm-6 item">
                    <div class="box" style="border-radius:10px;background-color:#ffffff">
                        <i style="color:orange;" class="fa fa-<?php echo $row['Icon']?> fa-5x"></i>
						
                        <h2><strong><a href="<?= home_base_url()."users/".$row['Link']?>" style="color:black;display:block;text-decoration:none"><?= $row['Link_Name']?></a></strong> </h2></div>
                </div>
                <?php
				endwhile;
				?>
                
            </div>
		<div class="row features" style="margin-top:-50px;">
		<?php
			$r=getAllRecord($con,"dashboard_menu","Link_row=2 AND active=1","link_order",4);
			while($row=mysqli_fetch_assoc($r)):
			?>
                <div class="col-md-3 col-sm-6 item">
                    <div class="box" style="border-radius:10px;background-color:#ffffff">
                        <i style="color:orange;"class="fa fa-<?php echo $row['Icon'];?> fa-5x"></i>
						
                        <h2><strong><a href="<?= home_base_url()."users/".$row['Link']?>" style="color:black;display:block;text-decoration:none"><?= $row['Link_Name']?></a></strong> </h2></div>
                </div>
                 <?php
				endwhile;
				?>
                
           </div>
        </div>
    </div>