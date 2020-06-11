<?php
//$q=array();
//$noq=20;
/* 
while(count($q) != $noq){

shuffle(

} 
$w=array_unique($q);

print_r($w);
 echo "<br/>";
//print_r($q);

 echo "<br/>".count($w);

*/
 
//for($i=1;$i<=20;$i++){
//	$q[]=$i;
//	echo $i."<br/>";
//}
//$e=shuffle($q);
//print_r($q);
//print_r(getquiznumber(20));

/* function getquiznumber($noq){
	$numbers = range(1, $noq);
	srand((float)microtime() * 1000000);
	shuffle($numbers);
	foreach ($numbers as $number) {
		$q[]=$number;
	//	echo "$number ";
	}
return $q;
} */
http://www.aksu.edu.ng/faculty/nas/files/2018/10/logo.png

$passport = "UserImages/Student/AK11_NAS_CSC_001.jpeg?452378929082";

$passport1 = "../epconfig/UserImages/Student/ak15_agr_ans_016.jpg";
$passport3 = "../epconfig/UserImages/PUTME/75096589AI.jpg";

				if(strpos($passport, '?') !== false){
				$f = explode("?",$passport);
				$path = $f[0];
				$path2 = $f[1];
				$new_pass = "epconfig/".$path;
			
			}else{
		
				$f = explode("../",$passport);
				$path = $f[0];
				$path2 = $f[1];
				$new_pass = $path2;
				
			}
		echo ".".$_SERVER['HTTP_HOST']."/".$new_pass;

?>
