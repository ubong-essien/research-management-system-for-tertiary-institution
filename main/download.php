<?php
require_once('../includes/function.php');
require_once('../includes/connect.php');
	$getPLtFNAME = $_GET['link'];
	//echo $getPLtFNAME;
	if(isset($getPLtFNAME)){

    $var_1 = $getPLtFNAME;
//    $file = $var_1;

$dir = "../research_files/"; // trailing slash is important
$file = $dir . $var_1;
 count_download($var_1,$con);
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