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




?>
