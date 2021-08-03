<?php


header("Content-Type: application/octet-stream");
  
$file_name = $_GET["file"];
  
header("Content-Disposition: attachment; filename=" . urlencode($file_name));   
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file_name));
  
flush(); // This doesn't really matter.
  
$fp = fopen($file_name, "r");
while (!feof($fp)) {
    echo fread($fp, 65536);
    flush(); // This is essential for large downloads
} 
  
fclose($fp); 



/*header("Content-Description: File Transfer"); 
header("Content-Type: application/download");
//header("Content-Type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=\"".urlencode($file_name)."\""); 

readfile ($file_name);
exit(); 
*/








 /*$file_name = "files/";
 if(isset($_GET['file'])){
     $file_name .= $_GET['file'];
 } 
 if(file_exists($file_name)){
     $mime_type = mime_content_type($file_name);
     header("content-type:".$mime_type);
     header('Content-disposition:attachment; filename="'.$file_name.'"');
     readfile($file_name);
 }
 else{
     echo "file not found";
 }*/
?>