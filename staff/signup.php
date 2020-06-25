<?php
include('../includes/staff_header.php');
include('../includes/connect.php');
chksession();
$errors = array();
?>
<div class="container" style="background-color:#;height:auto;margin-top:50px;font-family:arial narrow;font-size:18px;">
    <div class="row" style="margin-top:50px;margin-top:10px;">

        <div class="col-md-4 hidden-print">
          <div class="panel panel-primary">
            <div class="panel-heading ">
           Fill the form correctly to create an account
            </div> <hr/>
           
            <span></span>
	        	<form id="verify" action="" method="post" enctype="multipart/form-data">
                  <div class="panel-body">
                      <label class="input-group-addon">Full Name <em style="color:red;font-size:12px;">(Surname First)</em></label>
                          <input type="text" class="form-control" name="name" />
                        
                          <label class="input-group-addon">Phone Number</label>
                          <input type="text" class="form-control" name="phone" />
                
                          <label class="input-group-addon">Email Address</label>
                          <input type="email" class="form-control" name="email" required />

                          <label class="input-group-addon">Staff Number</label>
                          <input type="text" class="form-control" name="staff_num" required  placeholder="AKSU/EST/.../..." />

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
                                <option  value='<?php echo $row['ProgID'];?>'> <?php echo $row['ProgName'];?> </option>
                                <?php
                                }
                            }
                            else
                            {echo"cant run query";
                            }
                          ?>
                          </select>
                          <label class="input-group-addon">Rank</label>
                          <select name="rank" class="form-control" id="rank" required >
                            <option value="" >-please select-</option>
                            <option value="Professor" >Professor</option>
                            <option value="Associate Prof" >Associate Prof</option>
                            <option value="Senior Lecturer" >Senior Lecturer</option>
                            <option value="Lecturer I" >Lecturer I</option>
                            <option value="Lecturer II" >Lecturer II</option>
                            <option value="Assistant Lecturer" >Assistant Lecturer</option>
                            
                          </select>
                  </div>
                  <label class="input-group-addon">Password <em style="color:red;font-size:12px;">(Must be 6 characters and above)</em></label>
                      <input type="password" class="form-control" name="pass" required   />

                   <label class="input-group-addon">Confirm Password</label>
                      <input type="password" class="form-control" name="con_pass" required  />

                  <label >Select Your Passport file* <em style="color:red;font-size:12px;">(only Jpg,Jpeg, gif are allowed)</em></label><br/>
                  <input type="file" name="staff_pass" class="form-control"  required /><br/>
                  <hr/>
                  <div class="panel-footer">
                  <input type="submit" class="btn btn-primary " name="verify" />
                  </div> 
             </form>
             
            </div>
           
        </div>

<div class="col-md-8">
		
<?php
  $uploadOK = 0;
  $dataOk = 0;
  
  if(!empty($_POST['verify'])){
	  
	  $dept = mysqli_real_escape_string($con,(trim($_POST['dept'])));
	  $name = mysqli_real_escape_string($con,(trim($_POST['name'])));	
    $email = mysqli_real_escape_string($con,(trim($_POST['email'])));	
    $staff_num = mysqli_real_escape_string($con,(trim($_POST['staff_num'])));	
    $pass = mysqli_real_escape_string($con,(trim($_POST['pass'])));	
    $confirm = mysqli_real_escape_string($con,(trim($_POST['con_pass'])));	
    $phone = mysqli_real_escape_string($con,(trim($_POST['phone'])));	
    $rank = mysqli_real_escape_string($con,(trim($_POST['rank'])));	
   
	// decode faculty
	if( $pass !=   $confirm){
    echo "<br>Your password does not match the confirm password";
    $uploadOK = 0;
  }else{
    $dataOk = 1;
  }
	$passport_label = str_replace('/','_',$staff_num);
	//$token=getToken(10);
	
	$date = date('Y-m-d');
	
	$exist=if_user_exist($con,"Email",$email,"staff_tb");
	//check if data exist already
	if($exist == FALSE){
	
            // check if the recod exist
              if(strlen($_FILES["staff_pass"]["name"])>0){
              
              $target_dir = "../staffpassport/";
            
              $target_file = $target_dir . basename($_FILES["staff_pass"]["name"]);
             // echo $target_file;
             //echo  $_FILES["staff_pass"]["type"]."<br/>";
            $x =  explode('/',$_FILES["staff_pass"]["type"]);
           //echo  $x[0]."<br/>";
           $uploaded_file_type = $x[1];
              $uploadOk = 1;
            // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              $allowedTypes = array("jpg","JPG","jpeg","JPEG","GIF");
              $imageFileType = "jpg";

              $imagename = pathinfo($target_file,PATHINFO_FILENAME);
             // echo $imagename;
              $userpic = $passport_label.".".$imageFileType;
              //Check if image file is a actual image or fake image
            // if(isset($_POST["psubmit"])) {
                /*  $check = getimagesize($_FILES["pdffile"]["tmp_name"]);
                  if($check !== false) {
                    // echo "<br>File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      echo "<br>File is not an image.";
                      $uploadOk = 0;
                  }     */                                           
            // }

            // Check if file already exists
            if (file_exists($target_file)) {
              echo "<br>Sorry, file already exists.";
                $uploadOk = 0;
          }
            // Check file size
            if ($_FILES["staff_pass"]["size"] > 500000000) {
                echo "<br>Sorry, your file is too large.";
               // $error = array_push($error);
                $uploadOk = 0;
            }
            // Allow certain file formats
            if(!in_array($uploaded_file_type,$allowedTypes)) {
                echo "<br>Sorry, only jpg files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<br>Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["staff_pass"]["tmp_name"],$target_dir.$userpic)) {
                $staff_sucess="The file ". basename( $_FILES["staff_pass"]["name"]). " has been uploaded.";
                $uploadOK = 1;
                ///////////////////////////////////////passport update
              // $passport_path="..//".$userpic;
             if(($dataOk == 1) && ($uploadOK == 1)){

                               $fields=array(
                                          'StaffName' =>$name,
                                          'Phone' =>$phone,
                                          'Email' =>$email,
                                          'Passport' =>$userpic,
                                          'Rank' =>$rank,
                                          'StaffSchID' =>$staff_num,
                                          'DeptIDs' =>$dept
                                          
                                            );
                                  
                                          $update_passport=Insert2DbTb($con,$fields,"staff_tb");
                                         $user_id =  mysqli_insert_id($con);

                                         $login_fields=array(
                                          'user_id' =>$user_id,
                                          'staff_name' =>$name,
                                          'Username' =>$email,
                                          'password' =>password_hash($pass,PASSWORD_BCRYPT),
                                          'Privilege' =>3
                                         
                                        
                                    );
                                          $update_passport=Insert2DbTb($con,$login_fields,"users");
                                      
                                    if($update_passport){
                                      $updatemessage="and Sucessfully Updated";
                                      
                                    }else{ 
                                      $updateerrormessage="and error updating passport";
                                    }

             }
                    
                
              ?>
                   <div id="success" style="width:auto;height:50px;background-color:#dbf6e9;border-radius:5px;">
                        <strong><span id=""></span> <?php echo $staff_sucess.$updatemessage;?></strong>
                  </div>
            
          <?php
              }else{$staff_error="Sorry, there was an error uploading your file.";
          ?>
                 <div id="danger" style="width:auto;height:50px;background-color:#f87e3b;border-radius:5px;">
                        <strong><span id=""></span> <?php echo $staff_error.$updateerrormessage;?></strong>
                  </div>
          <?php   
                }
              }

            } 
         
          
          $infoarr=getnewstaff($email,$con);
          
?>
                    <div class="panel panel-default">
                            <div class="panel-body" id="bioupdtstage" style="height:auto;">

                            <div class="row">
                            <div class="col-md-4 col-xs-4 col-md-offset-5 col-xs-offset-5" >
                            <img src="<?php echo home_base_url();?>assets/img/logoban.png" class="img-responsive" style="align:center;"/>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12 col-xs-12 " style="margin-top:-20px">
                            <h3 style="font-family:san-serif;text-align:center;">AKWA IBOM STATE UNIVERSITY</h3>
                            </div>

                            </div>
                            <p style="font-family:times new romans"><?php echo "Receipt Printed:".$date;?></p>
                          <hr>
                        
                                  <div class="row" style="height:auto;">
                                        <div class="col-md-4 col-xs-4 " style="height:220px;">
                                            <img src="<?= home_base_url()."/staffpassport/".$infoarr['Passport'];?>" alt="<?= home_base_url()."/staffpassport/".$infoarr['Passport'];?>"  style="height:200px;border:2px black;" class="img-responsive">
                                      </div>
                                          
                                      
                                        <div class="col-md-8 col-xs-8">
                                        
                                          
                                                      <table class="table table-hover table-bordered " style="font-family:verdana;background-image:url('');">
                                                        <tr><th colspan="2" style="text-align:center;background-color:#c0c0c0;font-family:verdana;">Basic Details</th></tr>
                                                        <tr><td >Name</td><td><?php echo  $infoarr['StaffName'];?></td></tr>
                                                        <tr><td >Rank</td><td><?php echo $infoarr['Rank'];?></td></tr>
                                                        <tr><td >Phone</td><td><?php echo $infoarr['Phone'];?></td></tr>
                                                        <tr><td >Email</td><td><?php echo $infoarr['Email'];?></td></tr>
                                            
                                                      </table>
                                            
                                        </div>
                                
                                </div>
                                
                            </div>
                    </div>
<?php


          }else if($exist == TRUE){
           
            $infoarr=getnewstaff($email,$con);
                 
?>
                <div class="panel panel-default">
                      <div class="panel-body" id="bioupdtstage" style="height:auto;">

                            <div class="row">
                              <div class="col-md-4 col-xs-4 col-md-offset-5 col-xs-offset-5" >
                              <img src="<?php echo home_base_url();?>assets/img/logoban.png" class="img-responsive" style="align:center;"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12 col-xs-12 " style="margin-top:-20px">
                              <h3 style="font-family:san-serif;text-align:center;">AKWA IBOM STATE UNIVERSITY</h3>
                              </div>

                            </div>
                            <p style="font-family:times new romans"><?php echo "Receipt Registered:". $infoarr['date_added'];?></p>
                          <hr>
                        
                                  <div class="row" style="height:auto;">
                                        <div class="col-md-4 col-xs-4 " style="height:220px;">
                                            <img src="<?= home_base_url()."/staffpassport/".$infoarr['Passport'];?>" alt="<?= home_base_url()."/staffpassport/".$infoarr['Passport'];?>"  style="height:200px;border:2px black;" class="img-responsive">
                                      </div>
                                        
                                        <div class="col-md-8 col-xs-8">
                                        
                                                      <table class="table table-hover table-bordered " style="font-family:verdana;background-image:url('');">
                                                        <tr><th colspan="2" style="text-align:center;background-color:#c0c0c0;font-family:verdana;">Basic Details</th></tr>
                                                        <tr><td >Name</td><td><?php echo  $infoarr['StaffName'];?></td></tr>
                                                        <tr><td >Rank</td><td><?php echo $infoarr['Rank'];?></td></tr>
                                                        <tr><td >Phone</td><td><?php echo $infoarr['Phone'];?></td></tr>
                                                        <tr><td >Email</td><td><?php echo $infoarr['Email'];?></td></tr>
                                            
                                                      </table>
                                            
                                          </div>
                                
                                        </div>

                        </div>
               </div>
<?php

             }
/*********************************************************************************** */

    /******************************************************************************** */
    ?>
		
  
      
        </div>
	 <?php
    }
    ?> 	
		
		
    </div>

</div><br/>
</div><br/>
<br/>
<?php
include('../includes/footer.php');
?>
