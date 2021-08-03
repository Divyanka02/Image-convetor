



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image-convetor</title>
</head>
<body>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit">
   
        <?php
if(isset($_POST['submit'])){
    $file = $_FILES['file']['tmp_name'];
    list($width,$height)=getimagesize($file);
    $nwidth=$width/4;
    $nheight=$height/4;
    $newimage = imagecreatetruecolor($nwidth,$nheight);
    if($_FILES['file']['type']=='image/jpeg'){
     $source=imagecreatefromjpeg($file);
     imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
     $file_name=time().'.jpg';
     imagejpeg($newimage,'uploade/'.$file_name);
 }elseif($_FILES['file']['type']=='image/png'){
     $source=imagecreatefrompng($file);
     imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
     $file_name=time().'.png';
     imagepng($newimage,'uploade/'.$file_name);
 }elseif($_FILES['file']['type']=='image/gif'){
     $source=imagecreatefromgif($file);
     imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
     $file_name=time().'.gif';
     imagegif($newimage,'uploade/'.$file_name);
 }else{
     echo "Please select only jpg, png and gif image";
 }
 echo '<p><a href="download.php?file=' . urlencode($file_name) . '">Download</a></p>';
     


}
       
?>      
    </form>
   

</body>
</html>
