<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("table_menuofferTitle","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
}
 ?>
 <?php 
if($_GET['RestaurantPizzaID']!=''){
$StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['RestaurantPizzaID']));
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `table_menuofferTitle` WHERE `id` = '$id'");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:menuofferName.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:menuofferName.php");
		}
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `table_menuofferTitle` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:menuofferName.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:menuofferName.php");
		}
		}
	}
	
	 // redirent after deleting
}


if(isset($_POST['dactivateall'])) 
{
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `table_menuofferTitle` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:menuofferName.php?restaurantMenuID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:menuofferName.php");
		}
		}
	}
	
	 // redirent after deleting
}

 ?>	
 <?php 
 function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

extract($_POST);
$today=date('d l Y');
if(isset($_POST['PizzaMenuSubmit']))
{
$plo=mysql_query("select * from table_menuofferTitle where MenuofferTitle='".$_POST['MenuofferTitle']."' and RestaurantPizzaID='".$_POST['RestaurantPizzaID']."' ");
if(mysql_num_rows($plo)>0)
{
$error=1;
}
else
{
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

  if($_POST['restaurant_Offer_mon_selected']!=''){
  $restaurant_Offer_mon_selected = $_POST['restaurant_Offer_mon_selected'];
  $restaurant_Offer_mon_open_hr = $_POST['restaurant_Offer_mon_open_hr'];
   $restaurant_Offer_mon_open_min = $_POST['restaurant_Offer_mon_open_min'];
   $restaurant_Offer_mon_open_am = $_POST['restaurant_Offer_mon_open_am'];
    $restaurant_Offer_mon_close_hr = $_POST['restaurant_Offer_mon_close_hr'];
  $restaurant_Offer_mon_close_min = $_POST['restaurant_Offer_mon_close_min'];
   $restaurant_Offer_mon_open_pm = $_POST['restaurant_Offer_mon_open_pm'];
   }
   
   if($_POST['restaurant_Offer_tue_selected']!=''){
   $restaurant_Offer_tue_selected = $_POST['restaurant_Offer_tue_selected'];
  $restaurant_Offer_tue_open_hr = $_POST['restaurant_Offer_tue_open_hr'];
   $restaurant_Offer_tue_open_min = $_POST['restaurant_Offer_tue_open_min'];
   $restaurant_Offer_tue_open_am = $_POST['restaurant_Offer_tue_open_am'];
    $restaurant_Offer_tue_close_hr = $_POST['restaurant_Offer_tue_close_hr'];
  $restaurant_Offer_tue_close_min = $_POST['restaurant_Offer_tue_close_min'];
   $restaurant_Offer_tue_open_pm = $_POST['restaurant_Offer_tue_open_pm'];
   }
   
  if($_POST['restaurant_Offer_wed_selected']!=''){ 
    $restaurant_Offer_wed_selected = $_POST['restaurant_Offer_wed_selected'];
  $restaurant_Offer_wed_open_hr = $_POST['restaurant_Offer_wed_open_hr'];
   $restaurant_Offer_wed_open_min = $_POST['restaurant_Offer_wed_open_min'];
   $restaurant_Offer_wed_open_am = $_POST['restaurant_Offer_wed_open_am'];
    $restaurant_Offer_wed_close_hr = $_POST['restaurant_Offer_wed_close_hr'];
  $restaurant_Offer_wed_close_min = $_POST['restaurant_Offer_wed_close_min'];
   $restaurant_Offer_wed_open_pm = $_POST['restaurant_Offer_wed_open_pm'];
   }
   
   if($_POST['restaurant_Offer_thu_selected']!=''){
    $restaurant_Offer_thu_selected = $_POST['restaurant_Offer_thu_selected'];
  $restaurant_Offer_thu_open_hr = $_POST['restaurant_Offer_thu_open_hr'];
   $restaurant_Offer_thu_open_min = $_POST['restaurant_Offer_thu_open_min'];
   $restaurant_Offer_thu_open_am = $_POST['restaurant_Offer_thu_open_am'];
    $restaurant_Offer_thu_close_hr = $_POST['restaurant_Offer_thu_close_hr'];
  $restaurant_Offer_thu_close_min = $_POST['restaurant_Offer_thu_close_min'];
   $restaurant_Offer_thu_open_pm = $_POST['restaurant_Offer_thu_open_pm'];
   }
   
   if($_POST['restaurant_Offer_fri_selected']!=''){
    $restaurant_Offer_fri_selected = $_POST['restaurant_Offer_fri_selected'];
  $restaurant_Offer_fri_open_hr = $_POST['restaurant_Offer_fri_open_hr'];
   $restaurant_Offer_fri_open_min = $_POST['restaurant_Offer_fri_open_min'];
   $restaurant_Offer_fri_open_am = $_POST['restaurant_Offer_fri_open_am'];
    $restaurant_Offer_fri_close_hr = $_POST['restaurant_Offer_fri_close_hr'];
  $restaurant_Offer_fri_close_min = $_POST['restaurant_Offer_fri_close_min'];
   $restaurant_Offer_fri_open_pm = $_POST['restaurant_Offer_fri_open_pm'];
   }
   
   if($_POST['restaurant_Offer_sat_selected']!='')
   {
    $restaurant_Offer_sat_selected = $_POST['restaurant_Offer_sat_selected'];
  $restaurant_Offer_sat_open_hr = $_POST['restaurant_Offer_sat_open_hr'];
   $restaurant_Offer_sat_open_min = $_POST['restaurant_Offer_sat_open_min'];
   $restaurant_Offer_sat_open_am = $_POST['restaurant_Offer_sat_open_am'];
    $restaurant_Offer_sat_close_hr = $_POST['restaurant_Offer_sat_close_hr'];
  $restaurant_Offer_sat_close_min = $_POST['restaurant_Offer_sat_close_min'];
   $restaurant_Offer_sat_open_pm = $_POST['restaurant_Offer_sat_open_pm'];
   }
   
   if($_POST['restaurant_Offer_sun_selected']!='')
   {
    $restaurant_Offer_sun_selected = $_POST['restaurant_Offer_sun_selected'];
  $restaurant_Offer_sun_open_hr = $_POST['restaurant_Offer_sun_open_hr'];
   $restaurant_Offer_sun_open_min = $_POST['restaurant_Offer_sun_open_min'];
   $restaurant_Offer_sun_open_am = $_POST['restaurant_Offer_sun_open_am'];
    $restaurant_Offer_sun_close_hr = $_POST['restaurant_Offer_sun_close_hr'];
  $restaurant_Offer_sun_close_min = $_POST['restaurant_Offer_sun_close_min'];
   $restaurant_Offer_sun_open_pm = $_POST['restaurant_Offer_sun_open_pm'];
   } 
   


$PizzaManinMenuQueryOffer=mysql_query("INSERT INTO `table_menuofferTitle` (`id`, `RestaurantPizzaID`, `RestaurantCategoryID`, `MenuofferTitle`, `MenuofferPrice`, `ResPizzaDescription`, `ResPizzaImg`, `restaurant_Offer_mon_selected`, `restaurant_Offer_mon_open_hr`, `restaurant_Offer_mon_open_min`, `restaurant_Offer_mon_open_am`, `restaurant_Offer_mon_close_hr`, `restaurant_Offer_mon_close_min`, `restaurant_Offer_mon_open_pm`, `restaurant_Offer_tue_selected`, `restaurant_Offer_tue_open_hr`, `restaurant_Offer_tue_open_min`, `restaurant_Offer_tue_open_am`, `restaurant_Offer_tue_close_hr`, `restaurant_Offer_tue_close_min`, `restaurant_Offer_tue_open_pm`, `restaurant_Offer_wed_selected`, `restaurant_Offer_wed_open_hr`, `restaurant_Offer_wed_open_min`, `restaurant_Offer_wed_open_am`, `restaurant_Offer_wed_close_hr`, `restaurant_Offer_wed_close_min`, `restaurant_Offer_wed_open_pm`, `restaurant_Offer_thu_selected`, `restaurant_Offer_thu_open_hr`, `restaurant_Offer_thu_open_min`, `restaurant_Offer_thu_open_am`, `restaurant_Offer_thu_close_hr`, `restaurant_Offer_thu_close_min`, `restaurant_Offer_thu_open_pm`, `restaurant_Offer_fri_selected`, `restaurant_Offer_fri_open_hr`, `restaurant_Offer_fri_open_min`, `restaurant_Offer_fri_open_am`, `restaurant_Offer_fri_close_hr`, `restaurant_Offer_fri_close_min`, `restaurant_Offer_fri_open_pm`, `restaurant_Offer_sat_selected`, `restaurant_Offer_sat_open_hr`, `restaurant_Offer_sat_open_min`, `restaurant_Offer_sat_open_am`, `restaurant_Offer_sat_close_hr`, `restaurant_Offer_sat_close_min`, `restaurant_Offer_sat_open_pm`, `restaurant_Offer_sun_selected`, `restaurant_Offer_sun_open_hr`, `restaurant_Offer_sun_open_min`, `restaurant_Offer_sun_open_am`, `restaurant_Offer_sun_close_hr`, `restaurant_Offer_sun_close_min`, `restaurant_Offer_sun_open_pm`, `RestaurantOfferStartDate`, `RestaurantOfferEndDate`, `status`, `created_date`, `restaurant_state`, `restaurant_city`) VALUES (NULL, '$RestaurantPizzaID', '$RestaurantCategoryID', N'$MenuofferTitle', '', N'$ResPizzaDescription', '$ResPizzaImg', '$restaurant_Offer_mon_selected', '$restaurant_Offer_mon_open_hr', '$restaurant_Offer_mon_open_min', '$restaurant_Offer_mon_open_am', '$restaurant_Offer_mon_close_hr', '$restaurant_Offer_mon_close_min', '$restaurant_Offer_mon_open_pm', '$restaurant_Offer_tue_selected', '$restaurant_Offer_tue_open_hr', '$restaurant_Offer_tue_open_min', '$restaurant_Offer_tue_open_am', '$restaurant_Offer_tue_close_hr', '$restaurant_Offer_tue_close_min', '$restaurant_Offer_tue_open_pm', '$restaurant_Offer_wed_selected', '$restaurant_Offer_wed_open_hr', '$restaurant_Offer_wed_open_min', '$restaurant_Offer_wed_open_am', '$restaurant_Offer_wed_close_hr', '$restaurant_Offer_wed_close_min', '$restaurant_Offer_wed_open_pm', '$restaurant_Offer_thu_selected', '$restaurant_Offer_thu_open_hr', '$restaurant_Offer_thu_open_min', '$restaurant_Offer_thu_open_am', '$restaurant_Offer_thu_close_hr', '$restaurant_Offer_thu_close_min', '$restaurant_Offer_thu_open_pm', '$restaurant_Offer_fri_selected', '$restaurant_Offer_fri_open_hr', '$restaurant_Offer_fri_open_min', '$restaurant_Offer_fri_open_am', '$restaurant_Offer_fri_close_hr', '$restaurant_Offer_fri_close_min', '$restaurant_Offer_fri_open_pm', '$restaurant_Offer_sat_selected', '$restaurant_Offer_sat_open_hr', '$restaurant_Offer_sat_open_min', '$restaurant_Offer_sat_open_am', '$restaurant_Offer_sat_close_hr', '$restaurant_Offer_sat_close_min', '$restaurant_Offer_sat_open_pm', '$restaurant_Offer_sun_selected', '$restaurant_Offer_sun_open_hr', '$restaurant_Offer_sun_open_min', '$restaurant_Offer_sun_open_am', '$restaurant_Offer_sun_close_hr', '$restaurant_Offer_sun_close_min', '$restaurant_Offer_sun_open_pm', '$RestaurantOfferStartDate', '$RestaurantOfferEndDate', '0', '$today','$restaurant_state', N'$restaurant_city')");

$msg=1;
}

}

extract($_POST);


if(isset($_POST['EditPizzaMenuSubmit']))
{
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
   
  if($_POST['restaurant_Offer_mon_selected']!=''){
  $restaurant_Offer_mon_selected = $_POST['restaurant_Offer_mon_selected'];
  $restaurant_Offer_mon_open_hr = $_POST['restaurant_Offer_mon_open_hr'];
   $restaurant_Offer_mon_open_min = $_POST['restaurant_Offer_mon_open_min'];
   $restaurant_Offer_mon_open_am = $_POST['restaurant_Offer_mon_open_am'];
    $restaurant_Offer_mon_close_hr = $_POST['restaurant_Offer_mon_close_hr'];
  $restaurant_Offer_mon_close_min = $_POST['restaurant_Offer_mon_close_min'];
   $restaurant_Offer_mon_open_pm = $_POST['restaurant_Offer_mon_open_pm'];
   }
   
   if($_POST['restaurant_Offer_tue_selected']!=''){
   $restaurant_Offer_tue_selected = $_POST['restaurant_Offer_tue_selected'];
  $restaurant_Offer_tue_open_hr = $_POST['restaurant_Offer_tue_open_hr'];
   $restaurant_Offer_tue_open_min = $_POST['restaurant_Offer_tue_open_min'];
   $restaurant_Offer_tue_open_am = $_POST['restaurant_Offer_tue_open_am'];
    $restaurant_Offer_tue_close_hr = $_POST['restaurant_Offer_tue_close_hr'];
  $restaurant_Offer_tue_close_min = $_POST['restaurant_Offer_tue_close_min'];
   $restaurant_Offer_tue_open_pm = $_POST['restaurant_Offer_tue_open_pm'];
   }
   
  if($_POST['restaurant_Offer_wed_selected']!=''){ 
    $restaurant_Offer_wed_selected = $_POST['restaurant_Offer_wed_selected'];
  $restaurant_Offer_wed_open_hr = $_POST['restaurant_Offer_wed_open_hr'];
   $restaurant_Offer_wed_open_min = $_POST['restaurant_Offer_wed_open_min'];
   $restaurant_Offer_wed_open_am = $_POST['restaurant_Offer_wed_open_am'];
    $restaurant_Offer_wed_close_hr = $_POST['restaurant_Offer_wed_close_hr'];
  $restaurant_Offer_wed_close_min = $_POST['restaurant_Offer_wed_close_min'];
   $restaurant_Offer_wed_open_pm = $_POST['restaurant_Offer_wed_open_pm'];
   }
   
   if($_POST['restaurant_Offer_thu_selected']!=''){
    $restaurant_Offer_thu_selected = $_POST['restaurant_Offer_thu_selected'];
  $restaurant_Offer_thu_open_hr = $_POST['restaurant_Offer_thu_open_hr'];
   $restaurant_Offer_thu_open_min = $_POST['restaurant_Offer_thu_open_min'];
   $restaurant_Offer_thu_open_am = $_POST['restaurant_Offer_thu_open_am'];
    $restaurant_Offer_thu_close_hr = $_POST['restaurant_Offer_thu_close_hr'];
  $restaurant_Offer_thu_close_min = $_POST['restaurant_Offer_thu_close_min'];
   $restaurant_Offer_thu_open_pm = $_POST['restaurant_Offer_thu_open_pm'];
   }
   
   if($_POST['restaurant_Offer_fri_selected']!=''){
    $restaurant_Offer_fri_selected = $_POST['restaurant_Offer_fri_selected'];
  $restaurant_Offer_fri_open_hr = $_POST['restaurant_Offer_fri_open_hr'];
   $restaurant_Offer_fri_open_min = $_POST['restaurant_Offer_fri_open_min'];
   $restaurant_Offer_fri_open_am = $_POST['restaurant_Offer_fri_open_am'];
    $restaurant_Offer_fri_close_hr = $_POST['restaurant_Offer_fri_close_hr'];
  $restaurant_Offer_fri_close_min = $_POST['restaurant_Offer_fri_close_min'];
   $restaurant_Offer_fri_open_pm = $_POST['restaurant_Offer_fri_open_pm'];
   }
   
   if($_POST['restaurant_Offer_sat_selected']!='')
   {
    $restaurant_Offer_sat_selected = $_POST['restaurant_Offer_sat_selected'];
  $restaurant_Offer_sat_open_hr = $_POST['restaurant_Offer_sat_open_hr'];
   $restaurant_Offer_sat_open_min = $_POST['restaurant_Offer_sat_open_min'];
   $restaurant_Offer_sat_open_am = $_POST['restaurant_Offer_sat_open_am'];
    $restaurant_Offer_sat_close_hr = $_POST['restaurant_Offer_sat_close_hr'];
  $restaurant_Offer_sat_close_min = $_POST['restaurant_Offer_sat_close_min'];
   $restaurant_Offer_sat_open_pm = $_POST['restaurant_Offer_sat_open_pm'];
   }
   
   if($_POST['restaurant_Offer_sun_selected']!='')
   {
    $restaurant_Offer_sun_selected = $_POST['restaurant_Offer_sun_selected'];
  $restaurant_Offer_sun_open_hr = $_POST['restaurant_Offer_sun_open_hr'];
   $restaurant_Offer_sun_open_min = $_POST['restaurant_Offer_sun_open_min'];
   $restaurant_Offer_sun_open_am = $_POST['restaurant_Offer_sun_open_am'];
    $restaurant_Offer_sun_close_hr = $_POST['restaurant_Offer_sun_close_hr'];
  $restaurant_Offer_sun_close_min = $_POST['restaurant_Offer_sun_close_min'];
   $restaurant_Offer_sun_open_pm = $_POST['restaurant_Offer_sun_open_pm'];
   } 
   

  

$PizzaManinMenuQuery=mysql_query("UPDATE `table_menuofferTitle` SET `RestaurantPizzaID` = '$RestaurantPizzaID', `RestaurantCategoryID` = '$RestaurantCategoryID', `MenuofferTitle` = N'$MenuofferTitle', `ResPizzaDescription` = N'$ResPizzaDescription', `ResPizzaImg` = '$ResPizzaImg', `restaurant_Offer_mon_selected` = '$restaurant_Offer_mon_selected', `restaurant_Offer_mon_open_hr` = '$restaurant_Offer_mon_open_hr', `restaurant_Offer_mon_open_min` = '$restaurant_Offer_mon_open_min', `restaurant_Offer_mon_open_am` = '$restaurant_Offer_mon_open_am', `restaurant_Offer_mon_close_hr` = '$restaurant_Offer_mon_close_hr', `restaurant_Offer_mon_close_min` = '$restaurant_Offer_mon_close_min', `restaurant_Offer_mon_open_pm` = '$restaurant_Offer_mon_open_pm', `restaurant_Offer_tue_selected` = '$restaurant_Offer_tue_selected', `restaurant_Offer_tue_open_hr` = '$restaurant_Offer_tue_open_hr', `restaurant_Offer_tue_open_min` = '$restaurant_Offer_tue_open_min', `restaurant_Offer_tue_open_am` = '$restaurant_Offer_tue_open_am', `restaurant_Offer_tue_close_hr` = '$restaurant_Offer_tue_close_hr', `restaurant_Offer_tue_close_min` = '$restaurant_Offer_tue_close_min', `restaurant_Offer_tue_open_pm` = '$restaurant_Offer_tue_open_pm', `restaurant_Offer_wed_selected` = '$restaurant_Offer_wed_selected', `restaurant_Offer_wed_open_hr` = '$restaurant_Offer_wed_open_hr', `restaurant_Offer_wed_open_min` = '$restaurant_Offer_wed_open_min', `restaurant_Offer_wed_open_am` = '$restaurant_Offer_wed_open_am', `restaurant_Offer_wed_close_hr` = '$restaurant_Offer_wed_close_hr', `restaurant_Offer_wed_close_min` = '$restaurant_Offer_wed_close_min', `restaurant_Offer_wed_open_pm` = '$restaurant_Offer_wed_open_pm', `restaurant_Offer_thu_selected` = '$restaurant_Offer_thu_selected', `restaurant_Offer_thu_open_hr` = '$restaurant_Offer_thu_open_hr', `restaurant_Offer_thu_open_min` = '$restaurant_Offer_thu_open_min', `restaurant_Offer_thu_open_am` = '$restaurant_Offer_thu_open_am', `restaurant_Offer_thu_close_hr` = '$restaurant_Offer_thu_close_hr', `restaurant_Offer_thu_close_min` = '$restaurant_Offer_thu_close_min', `restaurant_Offer_thu_open_pm` = '$restaurant_Offer_thu_open_pm', `restaurant_Offer_fri_selected` = '$restaurant_Offer_fri_selected', `restaurant_Offer_fri_open_hr` = '$restaurant_Offer_fri_open_hr', `restaurant_Offer_fri_open_min` = '$restaurant_Offer_fri_open_min', `restaurant_Offer_fri_open_am` = '$restaurant_Offer_fri_open_am', `restaurant_Offer_fri_close_hr` = '$restaurant_Offer_fri_close_hr', `restaurant_Offer_fri_close_min` = '$restaurant_Offer_fri_close_min', `restaurant_Offer_fri_open_pm` = '$restaurant_Offer_fri_open_pm', `restaurant_Offer_sat_selected` = '$restaurant_Offer_sat_selected', `restaurant_Offer_sat_open_hr` = '$restaurant_Offer_sat_open_hr', `restaurant_Offer_sat_open_min` = '$restaurant_Offer_sat_open_min', `restaurant_Offer_sat_open_am` = '$restaurant_Offer_sat_open_am', `restaurant_Offer_sat_close_hr` = '$restaurant_Offer_sat_close_hr', `restaurant_Offer_sat_close_min` = '$restaurant_Offer_sat_close_min', `restaurant_Offer_sat_open_pm` = '$restaurant_Offer_sat_open_pm', `restaurant_Offer_sun_selected` = '$restaurant_Offer_sun_selected', `restaurant_Offer_sun_open_hr` = '$restaurant_Offer_sun_open_hr', `restaurant_Offer_sun_open_min` = '$restaurant_Offer_sun_open_min', `restaurant_Offer_sun_open_am` = '$restaurant_Offer_sun_open_am', `restaurant_Offer_sun_close_hr` = '$restaurant_Offer_sun_close_hr', `restaurant_Offer_sun_close_min` = '$restaurant_Offer_sun_close_min', `restaurant_Offer_sun_open_pm` = '$restaurant_Offer_sun_open_pm', `RestaurantOfferStartDate` = '$RestaurantOfferStartDate', `RestaurantOfferEndDate` = '$RestaurantOfferEndDate' ,`restaurant_city` = N'$restaurant_city', `restaurant_state` = '$restaurant_state' WHERE  id='".$_GET['eid']."'");


$emsg=1;

}

?>
 <link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script  type="text/javascript"  language="javascript">
function getMenuMainCatgeory(str){
//alert(str);
if (str=="")
{
document.getElementById("RestaurantCategoryID").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
//alert(xmlhttp.responseText);
document.getElementById("RestaurantCategoryID").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("post","menuCategoryFetch.php?q="+str,true);
xmlhttp.send();
}
</script>	 	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Menu Offer
                            <?php } else { ?>
                            Update Restaurant Menu Offer
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="min-height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Menu Offer
                            <?php } else { ?>
                            Update Restaurant Menu Offer
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Menu Offer has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Menu Offer is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Offer has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <script type="text/javascript">
											  function getOrgTypeListRestCityOffer1(str){
//alert(str);
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","cityFatchOffer1111.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer1(str){
//alert(str);
if (str=="")
{
document.getElementById("RestaurantPizzaID").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("RestaurantPizzaID").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","ResFatchOfferMenuFilter1.php?q="+str,true);
xmlhttp.send();
}

											 </script> 
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm"  method="post" enctype="multipart/form-data">
                                                 <input type="hidden" name="ResPizzaImgold" id="ResPizzaImgold" value="<?php echo $CuisineData['ResPizzaImg'];?>" />
     										
      <table  width="100%" border="0">
        <tr>
          <td><label for="restaurant_id">Select State</label></td>
    <td>	<select data-placeholder="Select Restaurant..."  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer1(this.value)" style="width:300px;" >
    <option value="">Select</option>
											  <?php 
											  $StateQuery = mysql_query("select *  from tbl_state  order by stateName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                            </tr><tr>
                                           
    <td><label for="restaurant_id">Select City</label></td>
    <td>	<select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer1(this.value)"  id="restaurant_city" name="restaurant_city" style="width:300px;" >
    <option value="">Select</option>
											  <?php 
											
											  $StateQuery =mysql_query("select *  from tbl_city where stateID='".$CuisineData['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                            </tr>
                                            <tr>
                                           
    <td><label for="restaurantMenuID">Select Restaurant </label></td>
    <td>	<select  data-placeholder="Select Restaurant..."  id="RestaurantPizzaID" name="RestaurantPizzaID" style="width:300px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											   //if($_GET['restaurant_city']!=''){
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd  order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['RestaurantPizzaID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }   ?>
											</select></td>
          </tr>
          
          
   
        <tr>
          <td><label for="offerSlotTitle">Menu Offer Title </label></td>
          <td><input  name="MenuofferTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="MenuofferTitle" value="<?php echo $CuisineData['MenuofferTitle']; ?>"  type="text"  required  style="width:300px;"/></td>
        
        </tr>
        
         <tr ><td colspan="2"><hr></td></tr>
  
  <tr><td colspan="2" align="center" > <table width="100%" border="0" >
  <tr >
    <td width="10%"><strong style="padding:5px;">Offer Days</strong></td>
    <td width="39%"><strong style="padding:5px;">Offer Hours Start Timing</strong></td>
    <td width="51%"><strong style="padding:5px;">Offer Hours End Timing</strong></td>
  </tr>
  <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_mon_selected" id="restaurant_Offer_mon_selected" <?php if($CuisineData['restaurant_Offer_mon_selected']!=''){ ?> checked="checked" <?php } ?>  value="Monday" />
    &nbsp;&nbsp;Monday</td>
    <td >	<input type="text" name="restaurant_Offer_mon_open_hr" id="restaurant_Offer_mon_open_hr" value="<?php echo $CuisineData['restaurant_Offer_mon_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_mon_open_min" id="restaurant_Offer_mon_open_min" value="<?php echo $CuisineData['restaurant_Offer_mon_open_min']; ?>" style="width:100px;" />
			  
               
               <select name="restaurant_Offer_mon_open_am" placeholder='AM OR PM' id="restaurant_Offer_mon_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_mon_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_mon_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
             
               </select>
               
               </td>
    <td><input type="text" name="restaurant_Offer_mon_close_hr" id="restaurant_Offer_mon_close_hr" value="<?php echo $CuisineData['restaurant_Offer_mon_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_mon_close_min" id="restaurant_Offer_mon_close_min" value="<?php echo $CuisineData['restaurant_Offer_mon_close_min']; ?>" style="width:100px;" />
			  
                <select name="restaurant_Offer_mon_open_pm" placeholder='AM OR PM' id="restaurant_Offer_mon_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_mon_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_mon_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             </select>
              </td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_tue_selected" value="Tuesday" id="restaurant_Offer_tue_selected" <?php if($CuisineData['restaurant_Offer_tue_selected']!=''){ ?> checked="checked" <?php } ?>   />
    &nbsp;&nbsp;Tuesday</td>
    <td >	<input type="text" name="restaurant_Offer_tue_open_hr" id="restaurant_Offer_tue_open_hr" value="<?php echo $CuisineData['restaurant_Offer_tue_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_tue_open_min" id="restaurant_Offer_tue_open_min" value="<?php echo $CuisineData['restaurant_Offer_tue_open_min']; ?>" style="width:100px;" />
               <select name="restaurant_Offer_tue_open_am" placeholder='AM OR PM' id="restaurant_Offer_tue_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_tue_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_tue_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_Offer_tue_close_hr" id="restaurant_Offer_tue_close_hr" value="<?php echo $CuisineData['restaurant_Offer_tue_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_tue_close_min" id="restaurant_Offer_tue_close_min" value="<?php echo $CuisineData['restaurant_Offer_tue_close_min']; ?>" style="width:100px;" />
              <select name="restaurant_Offer_tue_open_pm" placeholder='AM OR PM' id="restaurant_Offer_tue_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_tue_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_tue_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
			 </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_wed_selected" id="restaurant_Offer_wed_selected" value="Wednesday" <?php if($CuisineData['restaurant_Offer_wed_selected']!=''){ ?> checked="checked" <?php } ?> />&nbsp;&nbsp;Wednesday</td>
    <td >	<input type="text" name="restaurant_Offer_wed_open_hr" id="restaurant_Offer_wed_open_hr" value="<?php echo $CuisineData['restaurant_Offer_wed_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_wed_open_min" id="restaurant_Offer_wed_open_min" value="<?php echo $CuisineData['restaurant_Offer_wed_open_min']; ?>" style="width:100px;" />
             
              <select name="restaurant_Offer_wed_open_am" placeholder='AM OR PM' id="restaurant_Offer_wed_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_wed_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_wed_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
             
			  </td>
    <td><input type="text" name="restaurant_Offer_wed_close_hr" id="restaurant_Offer_wed_close_hr" value="<?php echo $CuisineData['restaurant_Offer_wed_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_wed_close_min" id="restaurant_Offer_wed_close_min" value="<?php echo $CuisineData['restaurant_Offer_wed_close_min']; ?>" style="width:100px;" />
              <select name="restaurant_Offer_wed_open_pm" placeholder='AM OR PM' id="restaurant_Offer_wed_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_wed_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_wed_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
			  </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_thu_selected" id="restaurant_Offer_thu_selected" value="Thursday" <?php if($CuisineData['restaurant_Offer_thu_selected']!=''){ ?> checked="checked" <?php } ?>    />&nbsp;&nbsp;Thursday</td>
    <td >	<input type="text" name="restaurant_Offer_thu_open_hr" id="restaurant_Offer_thu_open_hr" value="<?php echo $CuisineData['restaurant_Offer_thu_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_thu_open_min" id="restaurant_Offer_thu_open_min" value="<?php echo $CuisineData['restaurant_Offer_thu_open_min']; ?>" style="width:100px;" />
               <select name="restaurant_Offer_thu_open_am" placeholder='AM OR PM' id="restaurant_Offer_thu_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_thu_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_thu_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_Offer_thu_close_hr" id="restaurant_Offer_thu_close_hr" value="<?php echo $CuisineData['restaurant_Offer_thu_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_thu_close_min" id="restaurant_Offer_thu_close_min" value="<?php echo $CuisineData['restaurant_Offer_thu_close_min']; ?>" style="width:100px;" />
             
             <select name="restaurant_Offer_thu_open_pm" placeholder='AM OR PM' id="restaurant_Offer_thu_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_thu_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_thu_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
             </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_fri_selected" id="restaurant_Offer_fri_selected" value="Friday" <?php if($CuisineData['restaurant_Offer_fri_selected']!=''){ ?> checked="checked" <?php } ?>  />&nbsp;&nbsp;Friday</td>
    <td >	<input type="text" name="restaurant_Offer_fri_open_hr" id="restaurant_Offer_fri_open_hr" value="<?php echo $CuisineData['restaurant_Offer_fri_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_fri_open_min" id="restaurant_Offer_fri_open_min" value="<?php echo $CuisineData['restaurant_Offer_fri_open_min']; ?>" style="width:100px;" />
              <select name="restaurant_Offer_fri_open_am" placeholder='AM OR PM' id="restaurant_Offer_fri_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_fri_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_fri_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			</td>
    <td><input type="text" name="restaurant_Offer_fri_close_hr" id="restaurant_Offer_fri_close_hr" value="<?php echo $CuisineData['restaurant_Offer_fri_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_fri_close_min" id="restaurant_Offer_fri_close_min" value="<?php echo $CuisineData['restaurant_Offer_fri_close_min']; ?>" style="width:100px;" />
			   <select name="restaurant_Offer_fri_open_pm" placeholder='AM OR PM' id="restaurant_Offer_fri_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_fri_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_fri_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select></td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_sat_selected" id="restaurant_Offer_sat_selected" value="Saturday" <?php if($CuisineData['restaurant_Offer_sat_selected']!=''){ ?> checked="checked" <?php } ?>    />&nbsp;&nbsp;Saturday</td>
    <td >	<input type="text" name="restaurant_Offer_sat_open_hr" id="restaurant_Offer_sat_open_hr" value="<?php echo $CuisineData['restaurant_Offer_sat_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_sat_open_min" id="restaurant_Offer_sat_open_min" value="<?php echo $CuisineData['restaurant_Offer_sat_open_min']; ?>" style="width:100px;" />
              <select name="restaurant_Offer_sat_open_am" placeholder='AM OR PM' id="restaurant_Offer_sat_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_sat_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_sat_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_Offer_sat_close_hr" id="restaurant_Offer_sat_close_hr" value="<?php echo $CuisineData['restaurant_Offer_sat_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_sat_close_min" id="restaurant_Offer_sat_close_min" value="<?php echo $CuisineData['restaurant_Offer_sat_close_min']; ?>" style="width:100px;" />
			   
                 <select name="restaurant_Offer_sat_open_pm" placeholder='AM OR PM' id="restaurant_Offer_sat_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_sat_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_sat_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select>
               
             </td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_Offer_sun_selected" id="restaurant_Offer_sun_selected" value="Sunday" <?php if($CuisineData['restaurant_Offer_sun_selected']!=''){ ?> checked="checked" <?php } ?>  />&nbsp;&nbsp;Sunday</td>
    <td >	<input type="text" name="restaurant_Offer_sun_open_hr" id="restaurant_Offer_sun_open_hr" value="<?php echo $CuisineData['restaurant_Offer_sun_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_sun_open_min" id="restaurant_Offer_sun_open_min" value="<?php echo $CuisineData['restaurant_Offer_sun_open_min']; ?>" style="width:100px;" />
             <select name="restaurant_Offer_sun_open_am" placeholder='AM OR PM' id="restaurant_Offer_sun_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_Offer_sun_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_Offer_sun_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_Offer_sun_close_hr" id="restaurant_Offer_sun_close_hr" value="<?php echo $CuisineData['restaurant_Offer_sun_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_Offer_sun_close_min" id="restaurant_Offer_sun_close_min" value="<?php echo $CuisineData['restaurant_Offer_sun_close_min']; ?>" style="width:100px;" />
                <select name="restaurant_Offer_sun_open_pm" placeholder='AM OR PM' id="restaurant_Offer_sun_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_Offer_sun_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_Offer_sun_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select>
			  </td>
  </tr></table></td></tr>       
  <tr>
    <td><label for="RestaurantOfferStartDate">Offer Start Date</label></td>
    <td><input id="RestaurantOfferStartDate" required name="RestaurantOfferStartDate"  value="<?php echo $CuisineData['RestaurantOfferStartDate']; ?>" data-date-format="mm/dd/yyyy" type="text" class="datePicker"   style="width:300px;"/></td>
    </tr>
    <tr>
    <td><label for="RestaurantOfferEndDate">Offer End Date</label></td>
    <td><input value="<?php echo $CuisineData['RestaurantOfferEndDate']; ?>" required data-date-format="mm/dd/yyyy" type="text" name="RestaurantOfferEndDate" id="RestaurantOfferEndDate"  class="datePicker"   style="width:300px;" onblur="return RestaurantDateCheck();" /></td>
  </tr>
        
          <tr style="display:none;">
          <td><label for="offerSlotTitle">Menu Offer Price </label></td>
          <td><input  name="MenuofferPrice" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="MenuofferPrice" value="<?php echo $CuisineData['MenuofferPrice']; ?>"  type="text"   style="width:300px;"/></td>
        
        </tr>
          <tr>
<td><label for="OptionOneTitle">Description</label></td>
    <td ><textarea style="width:350px; height:70px;" placeholder="Offer item Description" id="ResPizzaDescription" name="ResPizzaDescription"><?php echo $CuisineData['ResPizzaDescription']; ?></textarea></td>
   
  </tr>
    <?php /*?> <?php if($_GET['eid']!=''){ ?>
  <tr>
 
  <td>Item Position</td><td><input  name="itemPosition" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="itemPosition" value="<?php echo $CuisineData['itemPosition']; ?>"  type="text"   style="width:100px;"/></td>
 
  </tr>
   <?php } ?><?php */?>
   <tr>
  <td align="center">Offer Menu Photo</td>
    <td align="center"><div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 75px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
              <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
                <input type="file" name="ResPizzaImg" id="ResPizzaImg" value="">
                </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div></td>
   
  </tr>
  <?php if($_GET['eid']!=''){ ?>
   <tr>
    <td colspan=""><label for="restaurant_website">Offer Menu Photo</label></td>
    <td >
   <img src="MenuItemImg/MenuItemImgSmall/<?php echo $CuisineData['ResPizzaImg'];?>"  />
    </td>
   
  </tr>
  <?php } ?>
  <tr><td colspan="2" >
  <?php if($_GET['eid']==''){ ?>
  <input id="" type="submit" class="btn btn-primary " value="Add New Restaurant Pizza Food Item Offer" name="PizzaMenuSubmit" style="margin-left:350px;" />
  <?php } else { ?>
  <input id="" type="submit" class="btn btn-primary " value="Edit Restaurant Pizza Food Item Offer" name="EditPizzaMenuSubmit" style="margin-left:350px;" />
  <?php } ?>
  </td></tr>
</table>

  </td></tr>
    
    
 
    
      </table>
    </form>
											</div>
										</div>
                                        
                                        
                                        
                                        
                                        
									</div>
								
									
									
									
								
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include('route/footer.php'); ?>

	<!-- required js files -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	

	<!-- charts plugin -->
	<script src="app/plugins/jquery.peity.min.js"></script>
	<script src="app/plugins/jquery.knob.js"></script>
	<script src="app/plugins/jqplot/jquery.jqplot.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.highlighter.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.cursor.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.dateAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pieRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.donutRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.barRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pointLabels.min.js"></script>
	
	<!-- form plugins -->
	<script src="app/plugins/jquery.elastic.js"></script>
	<script src="app/plugins/jquery.uniform.js"></script>
	<script src="app/plugins/bootstrap-datepicker.js"></script>
	<script src="app/plugins/jquery.timePicker.min.js"></script>
	<script src="app/plugins/jquery.simple-color-picker.js"></script>
	<script src="app/plugins/chosen.jquery.min.js"></script>
	<script src="app/plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
	<script src="app/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="app/plugins/jquery.limit-1.2.js"></script>
	<script src="app/plugins/formToWizard.js"></script>
	<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
	<!-- other plugins -->
	<script src="app/plugins/jquery-ui-custom/jquery-ui-1.8.22.custom.min.js"></script>
	<script src="app/plugins/DataTables/media/js/jquery.dataTables.js"></script>	
	<script src="app/plugins/jscrollpane/jquery.mousewheel.js"></script>
	<script src="app/plugins/jscrollpane/jquery.jscrollpane.min.js"></script>	
	<script src="app/plugins/fullcalendar.min.js"></script>

	<script src="assets/js/google-code-prettify/prettify.js"></script>
	
	<script src="app/plugins/jPages.min.js"></script>
	<script src="app/plugins/jquery.masonry.min.js"></script>

	<!-- js for templates -->
	<script src="app/js/custom.js"></script>
</body>
</html>
