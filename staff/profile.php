<?php
// this index page will have some menu for 1=upload,2=view all ,3=logout,4 = explore all research works
include('../includes/staff_header.php');
chksession();
$email = $_SESSION['login_user_verified'];

$user = mysqli_real_escape_string($con,$_GET['user']);
$rec_staff = mysqli_query($con,"SELECT * FROM staff_tb WHERE StaffID = '$user'");
$login_staff = mysqli_fetch_array($rec_staff);
?>
<div class="features-boxed" >
        <div class="container" style="margin-top:0px;background-color:">
            <div class="intro"></div>
         
     
            
		<div class="row features" style="margin-top:0px;">
	
                <div class="col-md-12 col-sm-12 item">
                    <div class="box" style="border-radius:10px;background-color:#ffffff">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                            
                                <div class=" col-md-12" style="background-color:#ffffff;cursor:pointer;padding-bottom:10px;">
                                    <img src="<?= home_base_url();?>staffpassport/<?= $login_staff['Passport'];?>" alt="" class="img-responsive" width="85%" height="85%;"/>
                                 </div>  
                                 <div class="col-md-12" >
                                 
                                 <table class="table table-bordered table-responsive" style="font-size:13px;width:100%!impportant">
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
                                                <td>Company Staff No</td>
                                                <td><?= $login_staff['StaffSchID'];?></td>
                                            </tr>
                                        </table>
                                      
                                    </div>
                                    
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12" style="font-family:arial narrow">
                            <p class="alert alert-primary">Edit the form below</p>
                            <form  id="form_edit_profile">
                                 <div class="row">
                                    <div class="col-md-6">

                                        <div class="row" style="padding-left:15px;">
                                        <label class="input-group-">Full Name <em style="color:red;font-size:12px;">*</em></label>
                                    <input type="text" class="form-control" name="name" value="<?= $login_staff['StaffName'];?>"  />

                                   
                                        <label class="input-group">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" value="<?= $login_staff['Phone'] ?>" />
                            
                                    <label class="input-group-">Email Address</label>
                                    <input type="email" class="form-control" name="email" required value="<?= $login_staff['Email'] ?>"/>
                                    <input type="hidden" name="staff_id" value="<?= $login_staff['StaffID'] ?>"/>
                                   <br/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="row" style="padding-left:15px;">
                                    
                                    
                                    <label class="input-group-addon">Staff Number</label>
                                    <input type="text" class="form-control" name="staff_num" required value="<?= $login_staff['StaffSchID'];?>"  placeholder="AKSU/EST/.../..." />
                                    <label class="input-group-addon">Rank</label>
                                    <select name="rank" class="form-control" id="rank" required >
                                      
                                        <option value="none" >-please select-</option>
                                        <?php
                                        $sel = mysqli_query($con,"SELECT * FROM rank_tb");	
                                        if($sel){
                                        while($row=mysqli_fetch_array($sel)){
                                            //$pid=$row['id'];
                                            //$p_name=$row['rank_name'];
                                            ?>
                                            <option <?php if($row['rank_name'] == $login_staff['Rank']){echo "selected";}?> value='<?php echo $row['rank_name'];?>'> <?php echo $row['rank_name'];?> </option>
                                            <?php
                                            }
                                        }
                                        else
                                        {echo"cant run query";
                                        }
                                    ?>
                                    </select>
                                    <label class="input-group-addon">Department</label>
                                    <select name="dept" class="form-control" id="dept" required >
                                        <option value="" >-please select-</option>
                                        <?php
                                        $sel = mysqli_query($con,"SELECT * FROM programme_tb");	
                                        if($sel){
                                        while($row=mysqli_fetch_array($sel)){
                                            $pid=$row['ProgID'];
                                            $p_name=$row['ProgName'];
                                            ?>
                                            <option <?php if($row['ProgID'] == $login_staff['DeptIDs']){echo "selected";}?> value='<?php echo $row['ProgID'];?>'> <?php echo $row['ProgName'];?> </option>
                                            <?php
                                            }
                                        }
                                        else
                                        {echo"cant run query";
                                        }
                                    ?>
                                    </select>
                                </div>
                               
                                </div>
                                <div class="container panel-footer">
                                    <br/>
                                    <button type="submit" class="btn btn-primary " name="verify" >Submit <li class="fa fa-save" id="edit_submit"></li></button>
                                 </div> 
                                 <br/><br/><br/>
                                 <span class="col-md-12" id="edit_response_stage"></span>
                            </div>
                        </div>
						</form>
                        
                </div>
            
           </div>
        </div>
        </div>
    </div>
    <?php
include('../includes/footer.php');
?>