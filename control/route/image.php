 $image =$_FILES["ResPizzaImg"]["name"];
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['ResPizzaImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['ResPizzaImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=300;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['ResPizzaImg']['name'];

$filename = "MenuItemImg/".$ResPizzaImg;
$filename1 = "MenuItemImg/MenuItemImgSmall/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$ResPizzaImg=$_POST['ResPizzaImgold'];
}	