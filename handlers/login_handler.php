<?php
error_reporting(0);
include('../includes/connect.php');
include('../includes/function.php');
if($_POST){
        if(!empty(trim(mysqli_real_escape_string($con,$_POST['username']))) && !empty(trim(mysqli_real_escape_string($con,$_POST['pass'])))){//this id is the progid
            $user=trim(mysqli_real_escape_string($con,$_POST['username']));
            $pass=trim(mysqli_real_escape_string($con,$_POST['pass']));
            $login_user=chklogin($user,$pass,$con);
            
        }
}
?>