<?php
// this index page will have some menu for 1=upload,2=view all ,3=logout,4 = explore all research works
include('../includes/staff_header.php');
chksession();
$email = $_SESSION['login_user_verified'];
$login_staff = getnewstaff($email,$con);

?>
<div class="features-boxed" >
        <div class="container" style="margin-top:15px;background-color:">
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
     
            
		<div class="row features" style="margin-top:-80px;">
	
                <div class="col-md-12 col-sm-12 item">
                    <div class="box" style="border-radius:10px;background-color:#ffffff">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-6">
                            
                                <div class=" col-md-12" style="background-color:#ffffff;cursor:pointer;padding-bottom:10px;">
                                    <img src="<?= home_base_url();?>staffpassport/<?= $login_staff['Passport'];?>" alt="" class="img-responsive" width="270px" height="270px;"/>
                                 </div>  
                                 <div class=" col-md-12 pix-detail" style="">
                                        <table class="table table-bordered" style="font-size:13px">
                                            <tr>
                                                <td>Name</td>
                                                <td><b><?= strtoupper($login_staff['StaffName']);?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Position</td>
                                                <td><?= $login_staff['Rank'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= $login_staff['Email'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Company Staff Number</td>
                                                <td><?= $login_staff['StaffSchID'];?></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <a class="btn btn-success" href="<?= home_base_url();?>staff/profile.php?user=<?=$login_staff['StaffID'];?>"><li class="fa fa-edit"></li> Edit Basic Profile</a>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                            <p class="alert alert-primary">This shows a breakdown of research works by you</p>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                        
                                          <?php
                                            $sel = mysqli_query($con,"SELECT * FROM publication_type ORDER BY link_order ASC");	
                                            //var_dump($sel);
                                           // die();
                                        if($sel){
                                        while($rowss = mysqli_fetch_array($sel)){
                                            $pid=$rowss['id'];
                                            $p_type=$rowss['pub_type'];

                                            $data = array('x' => $pid
                                                        );
                                                            
                                               // echo http_build_query($data);
                                            ?>
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <div class="box" style="border-radius:10px;background-color:#c0c0c0;height:;">
                                                    <h2 style="text-align:center;font-family:arial black;padding:0px;" ><?php $no = get_staff_subm_by_type($pid,$login_staff['StaffID'],$con); echo $no['1'] ?></h2>
                                                    <h4><strong><a href="<?= home_base_url().'staff/staff_view.php?'. http_build_query($data);?>" style="color:#006600;display:block;text-decoration:none;font-family:arial narrow;padding:-10px;"><?= $p_type;?></a></strong> </h4>
                                                    
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }    
                                      
                                   ?>
                                     <div class="col-md-4 col-sm-6 col-xs-6 ">
                                                    <div class="box" style="border-radius:10px;background-color:#c0c0c0;height:;">
                                                    <h2 style="text-align:center;font-family:arial black;padding:0px;" ><?php $no = get_total_subm($login_staff['StaffID'],$con); echo $no['1'] ?></h2>
                                                    <h4><strong><a href="<?= home_base_url().'staff/all_view.php';?>" style="color:#006600;display:block;text-decoration:none;font-family:arial narrow">Total Publications</a></strong> </h4>
                                                    
                                                    </div>
                                       </div>       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        
                </div>
            
           </div>
        </div>
        </div>
    </div>
    <?php
include('../includes/footer.php');
?>