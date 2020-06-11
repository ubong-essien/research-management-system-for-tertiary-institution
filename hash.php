<?php
include('includes/connect.php');

$chkrec2=mysqli_query($con,"SELECT * FROM accesscode_tb");//query student info based on the info you derived

	while($fetchrow=mysqli_fetch_array($chkrec2)){//fetch record like id ready for update
	$accessID=$fetchrow['ID'];
	$plain_access=$fetchrow['AccessCode'];
	echo $plain_access;
	/* $options=array(
		'cost'=>12
	);
	$hash_pswd=password_hash($plain_access,PASSWORD_BCRYPT,$options);
	
	$updt=mysqli_query($con,"UPDATE accesscode_tb SET hash_accescode='$hash_pswd' WHERE ID = $accessID");
	if (!$updt){
		$status= "error";
	
}else{$status= "yea";}
echo $plain_access."--".$hash_pswd."<br/>";
echo $status; */
	}
?>