<?php
function ImageUpload($image_name,$image_temp,$directory)
{
if($image_name) 
{
$filename = stripslashes($image_name);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
//Image Name Here
 $size=filesize($image_name);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
// Image Temp File Name
$uploadedfile = $image_temp;
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
// Image Temp File Name
$uploadedfile = $image_temp;
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=200;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=150;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
// Image Name Here 
$f=uniqid().$image_name;

$filename = "$directory/".$f;
$filename1 = "$directory/".$f;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
return $f;
}

// Multiple Images Uploading

function multipleImgUpload($image_name,$image_temp,$directory)
{
if($image_name!='')
{
$ggphoto=implode(',',$image_name);
for($i=0;$i<=count($image_name);$i++){
if(move_uploaded_file($image_temp[$i],"$directory/".$image_name[$i])){
}
}
}
return $ggphoto;
}


?>