<?php
require_once('../includes/function.php');
require_once('../includes/connect.php');
	$getPLtFNAME = $_GET['link'];
    $source = $_GET['source'];
    //source is 1 for student and 3 for staff 
    //echo $getPLtFNAME;
     $dir="";
    $file="";

	if(isset($getPLtFNAME)){

    $var_1 = $getPLtFNAME;//file name of the downloaded file

    if($source == 1){
        $dir = "../research_files/"; // trailing slash is important
        $file = $dir . $var_1;
      //  echo $file;
        count_download($var_1,$con);

    }else if($source == 3){
        $dir = "../research_files/staff_research/"; // trailing slash is important
        $file = $dir . $var_1;
       // echo $file;
        staff_count_download($var_1,$con);
    }
//die();
if (file_exists($file))
    {
        //header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . urlencode($file)); 
    header('Content-Type: application/octet-stream');
    header("Content-Type: application/download");
    header('Content-Description: File Transfer');
    header('Content-Length: ' . filesize($file));
    flush();
    $fp = fopen($file, "r");
    while (!feof($fp))
    {
        echo fread($fp, 65536);
        flush(); // this is essential for large downloads
		
    } 
    fclose($fp);
   // header('Content-Disposition: attachment; filename='.basename($file));
   // header('Expires: 0');
   // header('Cache-Control: must-revalidate');
    //header('Pragma: public');
 //count_download($file,$con);
    //ob_clean();
   // readfile($file);
    //exit;
    }
}
	
?>