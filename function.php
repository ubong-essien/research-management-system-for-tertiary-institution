<?php
session_start();

function gentoken(){
	
	$ftoken= md5(rand(100,1000000));	
return $ftoken;
}


function lb(){
	return "<br/>";
}
/**
 * Suppose, you are browsing in your localhost 
 * http://localhost/myproject/index.php?id=8
 */
 //////////////////////////////////////
function getBaseUrl() 
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 
    
    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 
    
    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 
    
    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    
    // return: http://localhost/myproject/
    return $protocol.$hostName.$pathInfo['dirname']."/";
}
//////////////////////////////////
 function home_base_url(){   

// first get http protocol if http or https

$base_url = (isset($_SERVER['HTTPS']) &&

$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

// get default website root directory

$tmpURL = dirname(__FILE__);

//echo $tmpURL;
// when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

//convert value to http url use string replace, 

// replace any backslashes to slash in this case use chr value "92"

$tmpURL = str_replace(chr(92),'/',$tmpURL);
//echo $tmpURL;
// now replace any same string in $tmpURL value to null or ''

// and will return value like /localhost/my_website/ or just /my_website/

$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

// delete any slash character in first and last of value

$tmpURL = ltrim($tmpURL,'/');

$tmpURL = rtrim($tmpURL, '/');


// check again if we find any slash string in value then we can assume its local machine

    if (strpos($tmpURL,'/')){

// explode that value and take only first value

       $tmpURL = explode('/',$tmpURL);

       $tmpURL = $tmpURL[0];

      }

// now last steps

// assign protocol in first value

   if ($tmpURL !== $_SERVER['HTTP_HOST'])

// if protocol its http then like this

      $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';

    else

// else if protocol is https

      $base_url .= $tmpURL.'/';

// give return value

return $base_url; 

} 
///////////////////////////////////////////////////////////////////////////////////
/////////////function get first row
 function Select4rmdbtb($conn,$tbs,$fields = "",$cond = ""){
	  if(isset($tbs)){ 
		  $query = "SELECT ";
		  //process fileds
		  $filds = "";
		  if(is_array($fields)){// fileds are morthen 1
			  foreach($fields as $f){
				 $filds .= $f . ", "; 
			  }
			  $filds = trim($filds, ", ");
		  }elseif(is_string($fields) && $fields != ""){
			  $filds = $fields;
		  }else{
			  $filds = "*";
		  }
		  $query .= $filds . " FROM ";
		  //process tables
		  $tbstr = "";
		  if(is_array($tbs)){// fileds are morthen 1
			  foreach($tbs as $t){
				 $tbstr .= $t . ", "; 
			  }
			  $tbstr = trim($tbstr, ", ");
		  }else{
			  $tbstr = $tbs;
		  }
		  $query .= $tbstr;
		  
		  //process conditions
		  if($cond != ""){
			$query .= " WHERE " . $cond;  
		  }
		   //return $query;
	return mysqli_query($conn,$query);
	  }
  }  
  //////////////////////////////////////////end of select
function getFirstRecord($conn,$table,$where=NULL,$limit=NULL,$order=NULL){
	$sql="SELECT * FROM ".$table;
	$sql.=" WHERE ".$where;
	$res=mysqli_query($conn,$sql);
	$arr=mysqli_fetch_array($res);
	return $arr;
}
//////////////////
function getAllRecord($conn,$table,$where=NULL,$order=NULL,$limit=NULL){
	$sql="SELECT * FROM ".$table;
	if($where!="" || $where!=NULL){
	$sql.=" WHERE ".$where;
		}
	if($order!="" || $order!=NULL){
	$sql.=" ORDER BY ".$order;
		}
	if($limit!="" || $limit!=NULL){
	$sql.=" LIMIT ".$limit;
		}
	$res=mysqli_query($conn,$sql);
	return $res;
}
 /*function Insert2Db($conn,$table,$formdata){
	$sql="INSERT INTO ".$table." ";
	$fields=array_keys($formdata);
	$fieldsNames=implode(',',$fields);
	$fieldsNames="($fieldsNames)";
	$values=implode(',',$formdata);
	$sql.= $fieldsNames;
$sql.=" VALUES({$values})";
	$res=mysqli_query($conn,$sql);
	
	return $sql;
} */
/////////////////////////////////////////
 function Insert2DbTb($conn,$fields,$tb){
	  $sql = "INSERT INTO ". $tb ." SET ";
		  foreach($fields as $key => $val){
			  if(is_string($val) || empty($val)){
				  $val = "'" . $val . "'";
			  }else if(!is_numeric($val)){
				 $val = "'" . $val . "'"; 
			  }
				  $sql .= "`".$key."`" . "=" . $val . ", ";
		  }
		  $sql = trim($sql,', ');
		$insert_res = mysqli_query($conn,$sql);
		
	 /* if($insert_res==TRUE) {
		return TRUE;
	  } else {
	  return FALSE; 
	  } */ 
	  return $insert_res;
  }
   //update table records
 function Updatedbtb($conn,$tb,$fieldsVal,$cond = ""){
	 if(isset($tb) && isset($fieldsVal)){
		 $qy = "UPDATE {$tb} SET ";
		 if(is_array($fieldsVal)){
			 foreach($fieldsVal as $field => $value){
				 $sep = (is_string($value)  || empty($val) )?"'":"";
				$qy .= $field ." = ". $sep . $value . $sep . ", "; 
			 }
			 $qy = trim($qy,", ");
			 if($cond != ""){
				$qy .= " WHERE ". $cond ; 
			 }
			/*return $qy;*/
			 $rst = mysqli_query($conn,$qy);
			  
				 return $rst;
			   
		 }
		  
	 }
 }
 
 ///////////////////////////////////

/////////////////////////////////////////function to retrieve the system settings
function Loadsettings($conn){
	$getsettings=getAllRecord($conn,'screening_settings','id=1','','');
	$settingsarr=mysqli_fetch_array($getsettings);
	return 	$settingsarr;
	//return array($styleclass,$header,$searchcriteria,$backgroundimg);	
} 

/****function to get the local government from the lga table*****/

////////////////////////fetch dept ddetails

function GetProgDetails($id,$conn){
$seldept = mysqli_query($conn,"SELECT * FROM programme_tb WHERE ProgID = '$id'");//decode programme id
			$rowdept=mysqli_fetch_array($seldept);
return $rowdept['ProgName'];
}

////////////////////////////////////////////////////////////////////////
function chklogin($user,$pass,$connect){
if(isset($user)&& isset($pass))

{
		//$usr="SELECT * FROM report_privilege WHERE Username='$user'";
							$login_res=mysqli_query($connect,"SELECT * FROM users WHERE Username like '$user'");
							$rowuser=mysqli_num_rows($login_res);
							
				if($rowuser > 0){
							$user_pass=$pass;
											$usr_details=mysqli_fetch_array($login_res);
											
												
												$login_pswd=$usr_details['password'];
												//echo $login_pswd."-".$login_user_dept;
												
												$pswd_chk=password_verify($user_pass,$login_pswd);//check encrypted pswd
												
					if($pswd_chk==TRUE){
						
										$_SESSION['login_user_verified']=$usr_details['Username'];
											
										echo("<script>location.href = 'main/index.php';</script>");
														
										}
										else
										{ 
										echo "<div class=\"alert aler-danger\">Wrong Username/Password</div>";
										}
							
								}
								else
								{
											echo "<div class=\"alert aler-danger\">Password is incorrect.</div>";
								}//end of row chk.
											
}
else
{
	echo "<div class=\"alert aler-danger\">You Must provide a userName and password</div>";
	}// end of empty check(isset)
	
	return $_SESSION['login_user_verified'];
		
	}//end of function
	/////////////////////////////////////////////////////////////////////

//////////////////////////
function Exist($conn,$chkfield,$checkitem,$tblname){
	$chkresult=getAllRecord($conn,$tblname,$where="$chkfield='$checkitem'","","");
	$numrow=mysqli_num_rows($chkresult);
	$row=mysqli_fetch_array($chkresult);
	
	if($numrow > 0)
	{
		return array(TRUE,$row[0]);
	}
	else
	{
		return array(FALSE);
	}
	
}

/////////////////////////////
function word_teaser($string, $count){
  $original_string = $string;
  $words = explode(' ', $original_string);
 
  if (count($words) > $count){
   $words = array_slice($words, 0, $count);
   $string = implode(' ', $words);
  }
 
  return $string;
}
 
// sentence reveal teaser
// this function will get the remaining words
function word_teaser_end($string, $count){
 $words = explode(' ', $string);
 $words = array_slice($words, $count);
 $string = implode(' ', $words);
  return $string;
}
////////////////////
function calendaricon($month,$day){
	$calendar="<div class=' col-md-4 col-sm-4 col-xs-4 date'>
	<span class='binds'></span>
	<span class='month'>".$month."</span>
	<h1 class='day'>".$day."</h1>
</div>";
	return $calendar;
	
}
/////////////////////////
function decodemonth($month){

if(is_numeric($month)){
	switch ($month) {
    case 1:
		$month="January";
    break;
    case 2:
		$month="Febuary";
    break;
	case 3:
		$month="March";
    break;
	case 4:
		$month="April";
    break;
	case 5:
		$month="May";
    break;
	case 6:
		$month="June";
    break;
	case 7:
		$month="July";
    break;
	case 8:
		$month="August";
    break;
	case 9:
		$month="September";
    break;
	case 10:
		$month="October";
    break;
	case 11:
		$month="November";
    break;
	case 12:
		$month="December";
    break;
	
    default:
        echo"cant decode month value";
}												}
return $month;
}

/////////////////////////////////////////////
function displaymenu($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"menu","","menu_order","");
							while($menutitle=mysqli_fetch_array($menu)){
								$m_id=$menutitle['id'];
								$link=$menutitle['link'];
								$menu_name=$menutitle['menu_name'];
								$active=$menutitle['visibility'];
								if($active==1){$act="<b style='color:green'>Active</b>";}else{$act= "<b style='color:red'>Not-Active</b>";}
								
		echo "<tr><td><a href='#' data-toggle=.modal' >$menu_name</a></td><td>$act</td><td><a href='menu.php?ed=$m_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit menu item</a></td><td><a href='menu.php?del=$m_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete menu item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
/////////////////////////////////////
function displayservices($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"services","","service_order","");
							while($menutitle=mysqli_fetch_array($menu)){
								$serv_id=$menutitle['id'];
								$Link=$menutitle['Link'];
								$ServiceName=$menutitle['ServiceName'];
								$active=$menutitle['visibility'];
								if($active==1){$act="<b style='color:green'>Active</b>";}else{$act= "<b style='color:red'>Not-Active</b>";}
								
								
		echo "<tr><td><b>$ServiceName</b></td><td>$act</td><td><a href='service.php?ed=$serv_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='service.php?del=$serv_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
////////////////////////////////////////////////////
function displaynews($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"newscontent","","newsorder","");
							while($menutitle=mysqli_fetch_array($menu)){
								$news_id=$menutitle['id'];
								$title=$menutitle['title'];
								$content=$menutitle['content'];
								$active=$menutitle['visibility'];
								if($active==1){$act="<b style='color:green'>Active</b>";}else{$act= "<b style='color:red'>Not-Active</b>";}
								
								
		echo "<tr><td><b>$title</b></td><td>$act</td><td>".word_teaser($content,7)."...</td><td><a href='news.php?ed=$news_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='news.php?del=$news_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
///////////////////////////////////////////////////
function displayprog($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"services","","service_order","");
							while($menutitle=mysqli_fetch_array($menu)){
								$serv_id=$menutitle['id'];
								$Link=$menutitle['Link'];
								$ServiceName=$menutitle['ServiceName'];
								$active=$menutitle['visibility'];
								if($active==1){$act="<b style='color:green'>Active</b>";}else{$act= "<b style='color:red'>Not-Active</b>";}
								
								
		echo "<tr><td><b>$ServiceName</b></td><td>$act</td><td><a href='service.php?ed=$serv_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='service.php?del=$serv_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
////////////////////////////////////////////

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
} 


/************************************************************/
function displayslider($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"banner","","bannerorder","");
							while($menutitle=mysqli_fetch_array($menu)){
								$slider_id=$menutitle['id'];
								$desc=$menutitle['bannerdesc'];
								$ban_img=$menutitle['bannerimg'];
								$active=$menutitle['active'];
								if($active==1){$act="<b style='color:green'>Active</b>";}else{$act= "<b style='color:red'>Not-Active</b>";}
								
								
		echo "<tr><td><b>$desc</b></td><td>$act</td><td><a href='slider.php?ed=$slider_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='slider.php?del=$slider_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
////////////////////////////////////////////////////
function displayevent($conn){
	echo "<table class='table table-bordered'>";
$eventee=getAllRecord($conn,"upcoming_events","","displayorder","");
							while($upevent=mysqli_fetch_array($eventee)){
								$id=$upevent['id'];
								$date=$upevent['date'];
								$event_description=$upevent['event_description'];
								
								
		echo "<tr><td><b>$event_description</b></td><td><a href='event.php?ed=$id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='event.php?del=$id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
////////////////////////////////////////////////////
function displayqlinks($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"quicklinks","visibility=1","linkorder","");
							while($menutitle=mysqli_fetch_array($menu)){
								$link_id=$menutitle['id'];
								$linkname=$menutitle['linkname'];
								
								
								
		echo "<tr><td><b>$linkname</b></td><td><a href='qlink.php?ed=$link_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='service.php?del=$link_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
//////////////////////////////////////////////////
function displayfstaff($conn){
	echo "<table class='table table-bordered'>";
$menu=getAllRecord($conn,"featuredstaff","visibility=1","stafforder","");
							while($menutitle=mysqli_fetch_array($menu)){
								$staff_id=$menutitle['id'];
								$staffname=$menutitle['staffname'];
								$active=$menutitle['visibility'];
								if($active==1){$act="<b style='color:green'>Active</b>";}else{$act= "<b style='color:red'>Not-Active</b>";}
								
								
								
		echo "<tr><td><b>$staffname</b></td><td>$act</td><td><a href='staff.php?ed=$staff_id' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit item</a></td><td><a href='service.php?del=$staff_id' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Delete item</a></td></tr>";
	
							}
							echo "</table>";
							return;
}
////////////////////////////////
function sesdrop($conn,$sel_ses){
	
	echo "Session:<select name='ses' class='form-control' id='dept' required >
				<option value='' >-please select-</option>
				";
				
			
					$sel = mysqli_query($conn,"SELECT * FROM session_tb");	
					if($sel){
					while($row=mysqli_fetch_array($sel)){
						
						?>
						<option  value='<?php echo $row['SesID'];?>' <?php if($sel_ses==$row['SesID']){echo "selected";}?> > <?php echo $row['SesName'];?> </option>
						<?php
						}
					
				}
				else
				{echo"cant run query";
				}
			
				  echo "</select>";
	return;
}
/////////////////////////////////
function displaysettings($conn){
	echo "<table class='table table-bordered'>";
$site=getAllRecord($conn,"siteinfo","","","");
							$siteinfo=mysqli_fetch_array($site);
								$id=$siteinfo['id'];
								$name=$siteinfo['name'];
								$tagLine=$siteinfo['tagLine'];
								$facebook=$siteinfo['facebook'];
								$twitter=$siteinfo['twitter'];
								$instagram=$siteinfo['instagram'];
								$googleplus=$siteinfo['googleplus'];
								$Phone=$siteinfo['Phone'];
								$color1=$siteinfo['color1'];
								$color2=$siteinfo['color2'];
								$font=$siteinfo['font'];
								$vcimage=$siteinfo['vcimage'];
								$vcname=$siteinfo['vcname'];
								$email=$siteinfo['email'];
								$newspanels=$siteinfo['newspanels'];
								$no_of_events=$siteinfo['no_of_events'];
								$address1=$siteinfo['address1'];
								$address2=$siteinfo['address2'];
								
								
								
		echo "<tr><td><b>Site Name:</b></td><td><input type='text' class='form-control' value='$name' name='sitename'/></td></tr>";
		echo "<tr><td><b>Tag Line</b></td><td><input type='text' class='form-control' value='$tagLine' name='tagLine'/></td></tr>";
		echo "<tr><td><b>Facebook</b></td><td><input type='text' class='form-control' value='$facebook' name='facebook'/></td></tr>";
		echo "<tr><td><b>Twitter</b></td><td><input type='text' class='form-control' value='$twitter' name='twitter'/></td></tr>";
		echo "<tr><td><b>Instagram</b></td><td><input type='text' class='form-control' value='$instagram' name='instagram'/></td></tr>";
		echo "<tr><td><b>Googleplus</b></td><td><input type='text' class='form-control' value='$googleplus' name='facebook'/></td></tr>";
		echo "<tr><td><b>Phone</b></td><td><input type='text' class='form-control' value='$Phone' name='facebook'/></td></tr>";
		echo "<tr><td><b>Primary Color</b></td><td><input type='text' class='form-control' value='$color1' name='color1'/></td></tr>";
		echo "<tr><td><b>Secondary Color</b></td><td><input type='text' class='form-control' value='$color2' name='color1'/></td></tr>";
		echo "<tr><td><b>Font</b></td><td><input type='text' class='form-control' value='$font' name='font'/></td></tr>";
		echo "<tr><td><b>VC Image</b></td><td><input type='text' class='form-control' value='$vcimage' name='vcimage'/></td></tr>";
		echo "<tr><td><b>Vc Name</b></td><td><input type='text' class='form-control' value='$vcname' name='vcname'/></td></tr>";
		echo "<tr><td><b>Email</b></td><td><input type='text' class='form-control' value='$email' name='email'/></td></tr>";
		echo "<tr><td><b>News Panel No</b></td><td><input type='text' class='form-control' value='$newspanels' name='facebook'/></td></tr>";
		echo "<tr><td><b>Number Of Event</b></td><td><input type='text' class='form-control' value='$no_of_events' name='facebook'/></td></tr>";
		echo "<tr><td><b>Address 1</b></td><td><input type='text' class='form-control' value='$address1' name='facebook'/></td></tr>";
		echo "<tr><td><b>Adress 2</b></td><td><input type='text' class='form-control' value='$address2' name='facebook'/></td></tr>";
		echo "<tr><td><a href='setting.php' class='btn btn-success'>Edit Settings</a></td></tr>";
	
							
							echo "</table>";
							return;
}


//////////////////////////////////////////////
function sendmail($email){
	
/* $to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
 */

$to = $email;
$subject = "Thanks for subscribing";
$message = "Thank you very much for subscribing to our news-letter we are sure to keep you posted on different happenings within our university";
$headers = 'From: webmaster@aksu.edu.ng' . "\r\n" .
    'Reply-To: webmaster@aksu.edu.ng' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$E=mail($to,$subject,$message,$headers);
var_dump($E);
if($E==true){
	$status=1;
	$mail_response="Mail Sent";
	
}else{
	$status=0;
	$mail_response="oops! Mail Not Sent";
	}


echo "<p>".$mail_response."</p>";
 
 return $status;
 
}
/***********************************************************************/
function chksession(){
			if(!isset($_SESSION['login_user_verified'])){
				//return header('Location:login.php');
			echo("<script>location.href = '".home_base_url()."login.php';</script>");
			}
			 return;
		}

/***************************************************************************/

function processSubsc($conn,$email){
	$date=date('Y-m-d');
	$Chk=filter_var($email,FILTER_VALIDATE_EMAIL,FILTER_SANITIZE_EMAIL);
	if($Chk==""){
		echo"<span style='color:#ffffff;'>Invalid email provided,please provide a valid one</span>";
		die();
	}else{
		$subscriber=getAllRecord($conn,"subscribers","email='$email'","","");
		$subcnum=mysqli_num_rows($subscriber);
		
		if($subcnum > 0){
			
			echo "<div class='alert alert-info'>Thank you,You have already subscribed for our newsletter</div>";
		}else{
									$fields=array('email' => $email,'dateSub' => $date);
								
						
									$sqlupdate=Insert2DbTb($conn,$fields,"subscribers");
									if($sqlupdate==true){
										
										$mail_status=sendmail($email);
										
										if($mail_status !=0){$mailer="mail sent!";}else{$mailer="Mail not sent.";}
									echo"<div class=\"row\"><div class=\"alert alert-success col-lg-10 hidden-print\" style=\"margin-left:20px;\">
											  <strong><span class=\"glyphicon glyphicon-info-sign\"></span>$mailer - Thanks for subscribing !</strong>
											  
										</div></div>";

								}else{echo"<div class=\"row\"><div class=\"alert alert-danger col-lg-10\" style=\"margin-left:20px;\">
											  <strong><span class=\"glyphicon glyphicon-info-sign\"></span>Subscription error!</strong>
										</div></div>";}
		}
	}
	
	return;
}
/*******************************************************************************************/
function verifysublink($token,$contentid){
	$linkstat=getAllRecord($conn,"submenu","enc='$token' AND id='$contentid'","","");
	$linknum=mysqli_num_rows($linkstat);
}
/****************************************************/
function show404(){
	
	echo("<script>location.href = '404.php';</script>");
	die();
	return;
}
/********************************************************************/
function chkresearchlogin($user,$pass,$connect){
if(isset($user)&& isset($pass)){
		//$usr="SELECT * FROM report_privilege WHERE Username='$user'";
							$login_res=mysqli_query($connect,"SELECT * FROM accesscode_tb WHERE JambNo='$user' AND AccessCode='$pass'");
							$rowuser=mysqli_num_rows($login_res);
							
				if($rowuser==1){
											$usr_details=mysqli_fetch_array($login_res);
											
										$_SESSION['res_user']=$usr_details['JambNo'];
											
										echo("<script>location.href = 'index.php';</script>");
														
										
								}
								else
								{
											echo "<div class=\"alert aler-danger\" style='color:white;'>Wrong Username/Password</div>";
								}//end of row chk.
											
}
else
{
	echo "<div class=\"alert aler-danger\">You Must provide a userName and password</div>";
	}// end of empty check(isset)
	
	return $_SESSION['res_user'];
		
	}//end of function
/**************************************************************/
	
function getdatabyreg($regNo,$conn){
	if(isset($regNo)){
		
	$get_q=getAllRecord($conn,"studentinfo_tb","RegNo like '$regNo' OR JambNo like '$regNo'","","");
	
	$st_arr=mysqli_fetch_array($get_q);
					}
		return $st_arr;
}
function GetSes($Ses,$conn){
		if(is_numeric($Ses)){
		$sel_ses = mysqli_query($conn,"SELECT * FROM session_tb WHERE SesID = '$Ses'");//decode session id
					$rowses=mysqli_fetch_assoc($sel_ses);
}
return $rowses['SesName'];
}
////CHEK IF RECORD EXIST
function if_exist($conn,$chkfield,$checkitem,$tblname){
	$chkresult=getAllRecord($conn,$tblname,$where="$chkfield='$checkitem'","","");
	$numrow=mysqli_num_rows($chkresult);
	$row=mysqli_fetch_array($chkresult);
	
	if($numrow > 0)
	{
		die("<p class='w3-red'>Error 1212!..Duplicate entry is not allowed on the system</p>");
		return;
	}
	else
	{
		return FALSE;
	}
	
}
/****************************************************/
function getuploadbyreg($regNo,$conn){
	if(isset($regNo)){
		
	$get_q=getAllRecord($conn,"projetcs","regno like '$regNo'","","");
	
	$st_arr=mysqli_fetch_array($get_q);
					}
		return $st_arr;
}