<?php
include('../../includes/main_header.php');
include('../../includes/connect.php');
$d=getdatabyreg($_SESSION['login_user_verified'],$con)
?>
<div class="container" style="background-color:#;height:auto;margin-top:50px;">
    <div class="row" style="margin-top:50px;margin-top:10px;">

        <div class="col-md-4 hidden-print">
        <div class="panel panel-primary">
        <div class="panel-heading ">
        <?php echo "<p style='color:blue;font-family:verdana;font-size:14px'>Welcome !".$_SESSION['login_user_verified']."</p>"?>Fill The Form Correctly
        </div> <hr/>
		<form id="verify" action="index.php" method="post" enctype="multipart/form-data">
            <div class="panel-body">
           
                
                    <label class="input-group-addon">Topic</label>
                    <textarea type="text" class="form-control" name="topic" required></textarea>
					
					 <label  class="input-group-addon">Abstract <em style="color:red">(Paste a brief description of your project)</em></label>
                    <textarea type="text" class="form-control" name="abstract" required></textarea>
					
                    <label class="input-group-addon">Session</label>
                    <select name="ses" class="form-control" id="ses" required >
                      <option value="" >-Please select-</option>
                      <option value="" >Local Journal</option>
                      <option value="" >International Journal</option>
                      <option value="" >Book</option>
                      <option value="" >Seminar Paper</option>
				
				  </select>
              
               
                    <label class="input-group-addon">Phone Number</label>
                    <input type="text" class="form-control" name="phone" />
					
                    
                    <input type="hidden" class="form-control" value="<?php echo $_SESSION['login_user_verified'];?>" name="regno" />
                   
					
                    <label class="input-group-addon">Email Address</label>
                    <input type="email" class="form-control" name="email" required />

                  
            </div>
			<label >Select Your file* <em style="color:red">(only PDFs are allowed)</em></label><br/>
								
			<input type="file" name="pdffile" class="form-control"  required /><br/>
          <hr/>
            <div class="panel-footer">
            <input type="submit" class="btn btn-primary " name="verify" />
            </div> 
             </form>
             
            </div>
           
        </div>

        <div class="col-md-8">
		
		        <?php
		
  if(!empty($_POST['verify'])){
	  
	  $regno1=mysqli_real_escape_string($con,(trim($_POST['regno'])));
	  $record=getdatabyreg($regno1,$con);
	  
	$topic=mysqli_real_escape_string($con,(trim($_POST['topic'])));	
	$abstract=mysqli_real_escape_string($con,(trim($_POST['abstract'])));	
    $phone=mysqli_real_escape_string($con,(trim($_POST['phone'])));	
    $email=mysqli_real_escape_string($con,(trim($_POST['email'])));	
    $lecturer=mysqli_real_escape_string($con,(trim($_POST['lecturer'])));	
    $dpt=$record['ProgID'];
	// decode faculty
	$faculty=getfaculty($dpt,$con);
	
    $ses=mysqli_real_escape_string($con,(trim($_POST['ses'])));	
	
	$regno=str_replace('/','_',$regno1);
	$token=getToken(10);
	$fac=$faculty[0];
	
	$date=date('Y-m-d');
	
	$exist=if_exist($con,"RegNo",$regno1,"submissions");
	
	if($exist==FALSE):
	
	// check if the recod exist
	  if(strlen($_FILES["pdffile"]["name"])>0){
    
    $target_dir = "../research_files/";
	
    $target_file = $target_dir . basename($_FILES["pdffile"]["name"]);
    $uploadOk = 1;
   // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$imageFileType = "pdf";
	$imagename = pathinfo($target_file,PATHINFO_FILENAME);
	$userpic = $regno.".".$imageFileType;
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
  //if (file_exists($target_file)) {
    //  echo "<br>Sorry, file already exists.";
      //$uploadOk = 0;
 // }
  // Check file size
  if ($_FILES["pdffile"]["size"] > 500000000) {
      echo "<br>Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "pdf" ) {
      echo "<br>Sorry, only PDF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "<br>Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["pdffile"]["tmp_name"],$target_dir.$userpic)) {
		  $staff_sucess="The file ". basename( $_FILES["pdffile"]["name"]). " has been uploaded.";
		  
		  ///////////////////////////////////////passport update
		 // $passport_path="..//".$userpic;
          
          $fields=array(
		  
            'File' =>$userpic,
            'RegNo' =>$regno1,
            'Phone' =>$phone,
            'Email' =>$email,
            'descr' =>$abstract,
            'Submission_Title' =>$topic,
            'DeptID' =>$dpt,
            'FacID' =>$fac,
            'SupervisorId' =>$lecturer,
            'Ses' =>$ses,
            'Token' =>$token,
            'Date_Submitted' =>$date
			
			);
			
			
            $update_passport=Insert2DbTb($con,$fields,"submissions");
                    
         
		  if($update_passport){
			
			  $updatemessage="and Sucessfully Updated";
			  
		  }else{ 
			   $updateerrormessage="and error updating passport";
		  }
		  
		?>
	
		 <div id="success" style="width:auto;height:50px;background-color:#dbf6e9;border-radius:5px;">
              <strong><span id=""></span> <?php echo $staff_sucess.$updatemessage;?></strong>
        </div>
   
<?php
    } else {$staff_error="Sorry, there was an error uploading your file.";
?>
	<div id="danger" style="width:auto;height:50px;background-color:#f87e3b;border-radius:5px;">
              <strong><span id=""></span> <?php echo $staff_error.$updateerrormessage;?></strong>
        </div>
<?php   
			}
		}

	}
// if exist ends here
endif;
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
	<div class="col-md-12 col-xs-12 " style="margin-top:-20px">
	<h4 style="font-family:san-serif;text-align:center;font-weight:bolder;"><u>Research Notification Slip</u></h4>
	</div>
  </div>
  <p style="font-family:times new romans"><?php echo "Receipt Printed:".$date;?></p>
<hr>
  <div class="row" style="height:auto;">
        <div class="col-md-4 col-xs-4 " style="height:220px;">
            <img src="<?php echo "../assets/img/ph.jpg"; ?>" alt="<?php echo $passport;?>"  style="height:200px;border:2px black;" class="img-responsive">
			</div>
           
			
			<div class="col-md-8 col-xs-8">
			<?php
			$infoarr=getuploadbyreg($regno1,$con)
			?>
				
                    <table class="table table-hover table-bordered " style="font-family:verdana;background-image:url('');">
					<tr><th colspan="2" style="text-align:center;background-color:#c0c0c0;font-family:verdana;">Basic Details</th></tr>
					<tr><td >Name</td><td><?php echo  $record['SurName'].",".$record['FirstName']." ".$record['OtherNames'];?></td></tr>
					<tr><td >Reg No</td><td><?php echo $infoarr['RegNo'];?></td></tr>
					<tr><td >Department</td><td><?php echo GetProgDetails($record['ProgID'],$con)?></td></tr>
					<tr><td >Faculty</td><td><?php echo "faculty"?></td></tr>
					<tr><td >Phone</td><td><?php echo $infoarr['Phone'];?></td></tr>
					<tr><td >Email</td><td><?php echo $infoarr['Email'];?></td></tr>
					
					
                    </table>
					
					
			</div>
			
			</div>
			
			<!----------payment detAILS---------->
			
				<div class="row">
			<div class="col-md-12 col-xs-12" style="height:auto;">
					<table class="table table-bordered table-hover " style="font-family:monospace;">
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
					
			
			
  </div>
</div>
      
        </div>
	 <?php
    }
    ?> 	
		
		
    </div>

</div><br/>
</div><br/>
<br/>
<?php
include('../../includes/footer.php');
?>
