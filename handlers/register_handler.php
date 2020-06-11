<?php
//error_reporting(0);
include('../includes/connect.php');
include('../function.php');

			if (!empty($_POST)){
				
				//prepare research information
				$phone=trim(mysqli_real_escape_string($con,$_POST['phone']));
				$supervisor=trim(mysqli_real_escape_string($con,$_POST['supervisor']));
				$title=trim(mysqli_real_escape_string($con,$_POST['title']));
				$session=trim(mysqli_real_escape_string($con,$_POST['session']));
				$regno=trim(mysqli_real_escape_string($con,$_POST['regno']));
				$dept=trim(mysqli_real_escape_string($con,$_POST['dept']));
				$author=trim(mysqli_real_escape_string($con,$_POST['author']));
				
				$rand_name=rand(0,10000000);
				
				//assign session token
				$date_submitted=date('Y-m-d');
		
			 if(strlen($_FILES["project_file"]["name"])>0){
				
				$target_dir = "../research_files/";
				
				$target_file = $target_dir . basename($_FILES["project_file"]["name"]);
				$uploadOk = 1;
			   // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageFileType = "pdf";
				$imagename = pathinfo($target_file,PATHINFO_FILENAME);
				$userfile = $regno."_".$rand_name.".".$imageFileType;
				echo $userfile;
				
				
				 //Check if image file is a actual image or fake image
				
				/* 	$check = getimagesize($_FILES["project_file"]["tmp_name"]);
					if($check !== false) {
					   // echo "<br>File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "<br>File is not a pdf.";
						$uploadOk = 0;
						
					}                                               
				

			  // Check if file already exists
			  if (file_exists($target_file)) {
				  echo "<br>Sorry, file already exists.";
				  $uploadOk = 0;
			  }
			  // Check file size
			  if ($_FILES["project_file"]["size"] > 10000000) {
				  //make provision to upload two files
				  echo "<br>Sorry, your file is too large, kindly break your document into two part.";
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
				  if (move_uploaded_file($_FILES["project_file"]["tmp_name"],$target_dir.$userfile)) {
					  $file_success="The file ". basename( $_FILES["project_file"]["name"]). " has been uploaded.";
					  
					  ///////////////////////////////////////passport update
					 
					  $fields=array(
						'author_name'   => $author,
						'project_title' => $title,
						'supervisor_id' => $supervisor,
						'upload_date'   => $date_submitted,
						'dept'   		=> $dept,
						'regno'  		=> $regno,
						'ses'  			=> $session,
						'file'   		=> $userfile
						 );
					  
					 $insert_q=Insert2DbTb($con,$fields,"projects");
					 if($insert_q){
						  echo "ok";
						  $updatemessage="and Sucessfully Updated";
						  
					  }else{ echo "no";
						   $updateerrormessage="and error updating passport";
					  }
					?>
				
					 <div id="success" style="width:auto;height:50px;background-color:#dbf6e9;border-radius:5px;">
						  <strong><span id=""></span> <?php echo $file_success.$updatemessage;?></strong>
					</div>
			   
			<?php
				} else {$file_error="Sorry, there was an error uploading your file.";
			?>
				<div id="danger" style="width:auto;height:50px;background-color:#f87e3b;border-radius:5px;">
						  <strong><span id=""></span> <?php echo $file_error.$updateerrormessage;?></strong>
					</div>
			<?php   
						}
					} */

				} 
			
			}else{
				echo "please fill the form";
			}
		

?>
