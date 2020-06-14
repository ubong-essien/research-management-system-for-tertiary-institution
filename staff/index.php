<?php
// this index page will have some menu for 1=upload,2=view all ,3=logout,4 = explore all research works
include('../includes/admin_header.php');
?>
<div class="features-boxed" >
        <div class="container" style="margin-top:15px;background-color:#808080">
            <div class="intro"></div>
            <div class="row features" style="">
			<?php 
			$r=getAllRecord($con,"staff_dashboard_menu","Link_row=1 AND active=1","link_order",4);
			while($row=mysqli_fetch_assoc($r)):
			?>
                <div class="col-md-3 col-sm-6 item">
                        <div class="box" style="border-radius:10px;background-color:#ffffff;height:70%;">
                            <i style="color:#006600;" class="fa fa-<?php echo $row['Icon']?> fa-3x"></i>
                            <h4><strong><a href="<?= home_base_url()."staff/".$row['Link']?>" style="color:black;display:block;text-decoration:none;font-family:arial narrow"><?= $row['Link_Name']?></a></strong> </h4>
                        </div>
                </div>
                <?php
				endwhile;
				?>
              
            </div>
            
		<div class="row features" style="margin-top:-60px;">
	
                <div class="col-md-12 col-sm-12 item">
                    <div class="box" style="border-radius:10px;background-color:#ffffff">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                               <!--  <table class="table table-bordered table-hover">
                                <tr>
                                <td>Name: </td>
                                <td>Ubong Essien</td>
                                </tr>
                                <tr>
                                <td>Position: </td>
                                <td>lecturer 1</td>
                                </tr>
                                <tr>
                                <td>Email: </td>
                                <td>email@e-mail.com:</td>
                                </tr>
                                <tr>
                                <td>Email: </td>
                                <td>email@e-mail.com:</td>
                                </tr>
                                </table> -->
                                <div class=" pix" style="background-color:#ffffff;height:100%;cursor:pointer;position:relative;">
                                    <img src="<?= home_base_url()?>img/testimonials-1.jpg" alt="" class="img-responsive" style="z-index:0.5;width:60%;height:100%;"/>
                                    <div class="pix-details" style="position:absolute;top:0%;width:100%;">
                                        <table class="table table-bordered" style="margin:20px 20px 20px 20px !important;padding:20px 20px 20px 20px !important;width:85%;">
                                            <tr>
                                                <td>Name</td>
                                                <td>John Doe</td>
                                            </tr>
                                            <tr>
                                                <td>Position</td>
                                                <td>Lecturer II</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>email@email.com</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xs-12">
                            <p class="alert alert-primary">This shows a breakdown of research works by you</p>
                            <div class="row">

                                    <div class="col-md-3 col-sm-6 ">
                                        <div class="box" style="border-radius:10px;background-color:#c0c0c0;height:;">
                                        <h4><strong><a href="<?= home_base_url()."users/".$row['Link']?>" style="color:#006600;display:block;text-decoration:none;font-family:arial narrow">Local Journal</a></strong> </h4>
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 ">
                                        <div class="box" style="border-radius:10px;background-color:#c0c0c0;height:;">
                                        <h4><strong><a href="<?= home_base_url()."users/".$row['Link']?>" style="color:#006600;display:block;text-decoration:none;font-family:arial narrow">Int'l Journal</a></strong> </h4>
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 ">
                                        <div class="box" style="border-radius:10px;background-color:#c0c0c0;height:;">
                                        <h4><strong><a href="<?= home_base_url()."users/".$row['Link']?>" style="color:#006600;display:block;text-decoration:none;font-family:arial narrow">My e-Books</a></strong> </h4>
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 ">
                                        <div class="box" style="border-radius:10px;background-color:#c0c0c0;height:;">
                                        <h4><strong><a href="<?= home_base_url()."users/".$row['Link']?>" style="color:#006600;display:block;text-decoration:none;font-family:arial narrow">Seminar paper</a></strong> </h4>
                                    
                                        </div>
                                    </div>
                                
                            </div>
                            </div>
                        </div>
						
                        
                </div>
            
           </div>
        </div>
    </div>