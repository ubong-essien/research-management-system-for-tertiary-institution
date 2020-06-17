<?php
//error_reporting(0);
include('../includes/connect.php');
include('../includes/function.php');

if (!empty($_POST)){
		$status=trim(mysqli_real_escape_string($con,$_POST['status']));
		$regno=trim(mysqli_real_escape_string($con,$_POST['regno']));
		$new_regno = strtoupper($regno);
		switch($status){
			//case 1 is to fetch record and return fetching status
			case 1:
				
				
				//check if the person has already signed on the portal,if true redirect to login else create an encrytption
				$login_res=mysqli_query($con,"SELECT * FROM users WHERE Username like '$new_regno'");
							$rowuser=mysqli_num_rows($login_res);
							
				if($rowuser > 0)
				{
					echo "XXX";
					//redirect to login
				}else
				{
					//check if regno is a valid one
					$stud_arr = getdatabyreg($regno,$con);
					if(!empty($stud_arr))
					{
						echo "###";
						//response message:Registration number verification complete
					}else
					{
						echo "####";
						//response message:Registration Number verifiction is incorrect.Incorect registration No!
					}
				}
				
			break;
			case 2:
				// pick the regno,fetch details from the accesscode tb and encrypt the accesscode and save it in the users table
				//$login_result=mysqli_query($connect,"SELECT * FROM accesscode_tb WHERE JambNo='$new_regno'");
				$login_result= getAllRecord($con,"accesscode_tb","JambNo ='$new_regno'",$order=NULL,$limit=NULL);
				$accrowuser=mysqli_num_rows($login_result);

				if($accrowuser > 0){
						
					$access = mysqli_fetch_array($login_result);

					$JambNo = $access['JambNo'];
					$AccessCode = $access['AccessCode'];
					$hash_access = password_hash($AccessCode,PASSWORD_BCRYPT);

					$studname = getstudname($JambNo,$con);
					//fetch name to store in the db for users
				
					
						$fields = array(
						'user_id' => 0,
						'staff_name' => $studname,
						'Username' => $JambNo,
						'password' => $hash_access,
						'Privilege' => 1
						);
					
					$ins = Insert2DbTb($con,$fields,'users');
					if($ins == true)
					{
						echo "AA";
					}
					else
					{
						echo "***";
					}
				}
				
			// case 2 is to create an encripted password with the access code of the student
			break;
			case 3:
				// case 3 is to create an encripted password with the access code of the student
			break;
			case 4:
				//check if record exist for the registration number in all tables needed and return the user to the login page to login
			break;
			
			default:
			break;

		}
			
			
		
			
			
			}else{
				echo "please fill the form";
			}
		
  //include('../includes/footer.php');
            ?>
