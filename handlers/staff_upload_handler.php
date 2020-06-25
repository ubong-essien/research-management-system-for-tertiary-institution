 <?php
 //error_reporting(0);
 include('../includes/connect.php');
 include('../includes/function.php');
    //echo $_POST['form_data'];
    //print_r($_FILES); //$_FILES["pdffile"]["name"]	;
    
   

      //  if(!empty($_POST['submit'])){
            
            $user_id = mysqli_real_escape_string($con,(trim($_POST['staff'])));
            $pt = mysqli_real_escape_string($con,(trim($_POST['pt'])));	
            $pc = mysqli_real_escape_string($con,(trim($_POST['pc'])));	
            $rt = mysqli_real_escape_string($con,(trim($_POST['rt'])));	
            $abstract = mysqli_real_escape_string($con,(trim($_POST['abstract'])));	
            $pub_details = mysqli_real_escape_string($con,(trim($_POST['pub_details'])));	
            $topic = mysqli_real_escape_string($con,(trim($_POST['topic'])));
            $s_dept = mysqli_real_escape_string($con,(trim($_POST['s_dept'])));	
            
           /*  echo $pc;
            echo $pt;
            echo $rt;
            echo $abstract;
            echo $pub_details; */
 //die();
          $date=date('Y-m-d');
          //generate a token for appending to file name and for identification on a research work
          $token=getToken(10);
          $file_name = $user_id."_".$token;
          
          // check if the recod exist
            if(strlen($_FILES["pdffile"]["name"])>0){
          
          $target_dir = "../research_files/staff_research/";

          $x =  explode('/',$_FILES["pdffile"]["type"]);
          //echo  $x[0]."<br/>";
          $uploaded_file_type = $x[1];

          $target_file = $target_dir . basename($_FILES["pdffile"]["name"]);
          $uploadOk = 1;
         // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          $imageFileType = "pdf";
          $imagename = pathinfo($target_file,PATHINFO_FILENAME);
          $userpic = $file_name.".".$imageFileType;
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
                $staff_sucess="The file ". basename( $_FILES["pdffile"]["name"]). " has been uploaded";
                
                ///////////////////////////////////////passport update
               // $passport_path="..//".$userpic;
                
                $fields=array(
                  'topic' =>$topic,
                  'abstract' =>$abstract,
                  'reference_text' =>$rt,
                  'publication_cat' =>$pc,
                  'publication_type' =>$pt,
                  'user_id' =>$user_id,
                  'research_token' =>$token,
                  'pub_details' =>$pub_details,
                  'staff_dept' =>$s_dept,
                  'file' =>$userpic
                  
                  );
                  
                  
                  $inse=Insert2DbTb($con,$fields,"staff_submission");
                          
               
                if($inse == true){
                  
                    $updatemessage=" Sucessfully";
                    
                }else{ 
                     $updateerrormessage="and error updating passport";
                }
                
              ?>
          
               <div id="success" style="width:auto;height:30px;background-color:#dbf6e9;border-radius:5px;">
                    <strong><span id=""></span> <?php echo $staff_sucess.$updatemessage;?></strong>
              </div>
         
      <?php
          } else {$staff_error="Sorry, there was an error uploading your file.";
      ?>
          <div id="danger" style="width:auto;height:30px;background-color:#f87e3b;border-radius:5px;">
                    <strong><span id=""></span> <?php echo $staff_error.$updateerrormessage;?></strong>
              </div>
      <?php   
                  }
              }
      
          }
      // if exist ends here
      
          ?>
           
      <?php
   // }
    ?> 