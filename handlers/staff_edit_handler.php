<?php
include('../includes/connect.php');
include('../includes/function.php');
if(!empty($_POST)){
	  
        $dept = mysqli_real_escape_string($con,(trim($_POST['dept'])));
        $name = mysqli_real_escape_string($con,(trim($_POST['name'])));	
        $email = mysqli_real_escape_string($con,(trim($_POST['email'])));	
        $staff_num = mysqli_real_escape_string($con,(trim($_POST['staff_num'])));	
        $id = mysqli_real_escape_string($con,(trim($_POST['staff_id'])));	
        $phone = mysqli_real_escape_string($con,(trim($_POST['phone'])));	
        $rank = mysqli_real_escape_string($con,(trim($_POST['rank'])));	

	//$date = date('Y-m-d');
	
    //$exist=if_user_exist($con,"StaffID",$id,"staff_tb");
    $exist = TRUE;
	//check if data exist already
	if($exist == TRUE){
	
          //   if(($dataOk == 1) && ($uploadOK == 1)){

                               $fields=array(
                                          'StaffName' =>$name,
                                          'Phone' =>$phone,
                                          'Email' =>$email,
                                          'Rank' =>$rank,
                                          'StaffSchID' =>$staff_num,
                                          'DeptIDs' =>$dept
                                            );
                                  
                                         // $update_rec=Insert2DbTb($con,$fields,"staff_tb");
                                          $update_rec = Updatedbtb($con,"staff_tb",$fields,$cond = "StaffID='$id'");
                                      
                                    if($update_rec){
                                     echo "<p class='alert alert-success'>Sucessfully Updated</p>";
                                      
                                    }else{ 
                                      echo "<p class='alert alert-danger'>Error Updating Record,Please contact admin</p> ";
                                    }

          //   }
          
                               
              }
              


            } 
    ?>