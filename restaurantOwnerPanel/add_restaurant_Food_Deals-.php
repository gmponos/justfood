<?php include('route/header.php');
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
 $_GET['restaurant_id']=$_SESSION['restaurant_id'];
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_foodDeals","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_foodDeals` WHERE `id` = '$id'");
		mysql_query("delete from tbl_fooddealsSlot where fooddeals_id='$id'");
         mysql_query("delete from tbl_fooddealslotitem where deals_id='$id'");

		if(!$query) { 
		header("location:add_restaurant_Food_Deals.php?restaurant_id=".$_GET['restaurant_id']);
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_foodDeals` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_restaurant_Food_Deals.php?restaurant_id=".$_GET['restaurant_id']);
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
		$query = mysql_query("update `tbl_foodDeals` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_restaurant_Food_Deals.php?restaurant_id=".$_GET['restaurant_id']);
		}
	}
	
	 // redirent after deleting
}
include('imgUploadFun.php');
extract($_POST);
$today=date('d l Y');
if(isset($_POST['foodDealsSubmit']))
{
if($_POST['deals_slot']!='')
{
$deals_slot1=implode(',',$_POST['deals_slot']);
}
$DealsCheckAvailable=mysql_query("select * from tbl_foodDeals where restaurant_id='".$_GET['restaurant_id']."' and foodDeals_name=N'$foodDeals_name'");
if(mysql_num_rows($DealsCheckAvailable)>0)
{
$error=1;
}
else
{
$image =$_FILES["foodDeals_image"]["name"];
$uploadedfile = $_FILES['foodDeals_image']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['foodDeals_image']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['foodDeals_image']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['foodDeals_image']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['foodDeals_image']['tmp_name'];
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

$newwidth1=220;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_favicon=uniqid().$_FILES['foodDeals_image']['name'];

$filename = "../control/MenuItemImg/MenuItemImgSmall/".$website_favicon;
$filename1 = "../control/MenuItemImg/MenuItemImgSmall/".$website_favicon;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}



if($_POST['restaurant_buffet_sun_selected']!='')
{
$SundayBusinessHoursOpenTime=$_POST['SundayBusinessHoursOpenTime'];
$SundayBusinessHoursCloseTime=$_POST['SundayBusinessHoursCloseTime'];
$restaurant_buffet_sun_selected=$_POST['restaurant_buffet_sun_selected'];
}
else
{
$SundayBusinessHoursOpenTime='';
$SundayBusinessHoursCloseTime='';

}
if($_POST['restaurant_buffet_mon_selected']!='')
{
$MondayBusinessHoursOpenTime=$_POST['MondayBusinessHoursOpenTime'];
$MondayBusinessHoursCloseTime=$_POST['MondayBusinessHoursCloseTime'];
$restaurant_buffet_mon_selected=$_POST['restaurant_buffet_mon_selected'];
}
else
{
$MondayBusinessHoursOpenTime='';
$MondayBusinessHoursCloseTime='';
}
if($_POST['restaurant_buffet_tue_selected']!='')
{
$TuesdayBusinessHoursOpenTime=$_POST['TuesdayBusinessHoursOpenTime'];
$TuesdayBusinessHoursCloseTime=$_POST['TuesdayBusinessHoursCloseTime'];
$restaurant_buffet_tue_selected=$_POST['restaurant_buffet_tue_selected'];
}
else
{
$TuesdayBusinessHoursOpenTime='';
$TuesdayBusinessHoursCloseTime='';
}


if($_POST['restaurant_buffet_wed_selected']!='')
{
$WednesdayBusinessHoursOpenTime=$_POST['WednesdayBusinessHoursOpenTime'];
$WednesdayBusinessHoursCloseTime=$_POST['WednesdayBusinessHoursCloseTime'];
$restaurant_buffet_wed_selected=$_POST['restaurant_buffet_wed_selected'];
}
else
{
$WednesdayBusinessHoursOpenTime='';
$WednesdayBusinessHoursCloseTime='';
}

if($_POST['restaurant_buffet_thu_selected']!='')
{
$ThursdayBusinessHoursOpenTime=$_POST['ThursdayBusinessHoursOpenTime'];
$ThursdayBusinessHoursCloseTime=$_POST['ThursdayBusinessHoursCloseTime'];
$restaurant_buffet_thu_selected=$_POST['restaurant_buffet_thu_selected'];
}
else
{
$ThursdayBusinessHoursOpenTime='';
$ThursdayBusinessHoursCloseTime='';
}

if($_POST['restaurant_buffet_fri_selected']!='')
{
$FridayBusinessHoursOpenTime=$_POST['FridayBusinessHoursOpenTime'];
$FridayBusinessHoursCloseTime=$_POST['FridayBusinessHoursCloseTime'];
$restaurant_buffet_fri_selected=$_POST['restaurant_buffet_fri_selected'];
}
else
{
$FridayBusinessHoursOpenTime='';
$FridayBusinessHoursCloseTime='';
}
if($_POST['restaurant_buffet_sat_selected']!='')
{
$SaturdayBusinessHoursOpenTime=$_POST['SaturdayBusinessHoursOpenTime'];
$SaturdayBusinessHoursCloseTime=$_POST['SaturdayBusinessHoursCloseTime'];
$restaurant_buffet_sat_selected=$_POST['restaurant_buffet_sat_selected'];
}
else
{
$SaturdayBusinessHoursOpenTime='';
$SaturdayBusinessHoursCloseTime='';
}


$DealsQueryInsert="INSERT INTO `tbl_foodDeals` (`id`, `restaurant_id`, `foodDeals_type`, `foodDeals_name`, `foodDeals_price`,`foodDeals_serving_person`, `foodDeals_image`, `foodDeals_description`, `foodDeals_day`, `restaurant_foodeals_mon_selected`, `restaurant_foodeals_mon_open_hr`, `restaurant_foodeals_mon_open_min`, `restaurant_foodeals_mon_open_am`, `restaurant_foodeals_mon_close_hr`, `restaurant_foodeals_mon_close_min`, `restaurant_foodeals_mon_open_pm`, `restaurant_foodeals_tue_selected`, `restaurant_foodeals_tue_open_hr`, `restaurant_foodeals_tue_open_min`, `restaurant_foodeals_tue_open_am`, `restaurant_foodeals_tue_close_hr`, `restaurant_foodeals_tue_close_min`, `restaurant_foodeals_tue_open_pm`, `restaurant_foodeals_wed_selected`, `restaurant_foodeals_wed_open_hr`, `restaurant_foodeals_wed_open_min`, `restaurant_foodeals_wed_open_am`, `restaurant_foodeals_wed_close_hr`, `restaurant_foodeals_wed_close_min`, `restaurant_foodeals_wed_open_pm`, `restaurant_foodeals_thu_selected`, `restaurant_foodeals_thu_open_hr`, `restaurant_foodeals_thu_open_min`, `restaurant_foodeals_thu_open_am`, `restaurant_foodeals_thu_close_hr`, `restaurant_foodeals_thu_close_min`, `restaurant_foodeals_thu_open_pm`, `restaurant_foodeals_fri_selected`, `restaurant_foodeals_fri_open_hr`, `restaurant_foodeals_fri_open_min`, `restaurant_foodeals_fri_open_am`, `restaurant_foodeals_fri_close_hr`, `restaurant_foodeals_fri_close_min`, `restaurant_foodeals_fri_open_pm`, `restaurant_foodeals_sat_selected`, `restaurant_foodeals_sat_open_hr`, `restaurant_foodeals_sat_open_min`, `restaurant_foodeals_sat_open_am`, `restaurant_foodeals_sat_close_hr`, `restaurant_foodeals_sat_close_min`, `restaurant_foodeals_sat_open_pm`, `restaurant_foodeals_sun_selected`, `restaurant_foodeals_sun_open_hr`, `restaurant_foodeals_sun_open_min`, `restaurant_foodeals_sun_open_am`, `restaurant_foodeals_sun_close_hr`, `restaurant_foodeals_sun_close_min`, `restaurant_foodeals_sun_open_pm`, `foodDeals_datestart`, `foodDeals_dateend`, `status`, `created_date`, `deals_slot`, `SundayBusinessHoursOpenTime`, `SundayBusinessHoursCloseTime`, `MondayBusinessHoursOpenTime`, `MondayBusinessHoursCloseTime`, `TuesdayBusinessHoursOpenTime`, `TuesdayBusinessHoursCloseTime`, `WednesdayBusinessHoursOpenTime`, `WednesdayBusinessHoursOpenTime`, `ThursdayBusinessHoursOpenTime`, `ThursdayBusinessHoursCloseTime`, `FridayBusinessHoursOpenTime`, `FridayBusinessHoursCloseTime`, `SaturdayBusinessHoursOpenTime`, `SaturdayBusinessHoursCloseTime`, `restaurant_buffet_sun_selected`, `restaurant_buffet_mon_selected`, `restaurant_buffet_tue_selected`, `restaurant_buffet_wed_selected`, `restaurant_buffet_thu_selected`, `restaurant_buffet_fri_selected`, `restaurant_buffet_sat_selected`) VALUES (NULL, '".$_GET['restaurant_id']."', '$foodDeals_type', N'$foodDeals_name', '$foodDeals_price', '$foodDeals_serving_person','$website_favicon', N'$foodDeals_description', '$foodDeals_day', '$restaurant_foodeals_mon_selected', '$restaurant_foodeals_mon_open_hr', '$restaurant_foodeals_mon_open_min', '$restaurant_foodeals_mon_open_am', '$restaurant_foodeals_mon_close_hr', '$restaurant_foodeals_mon_close_min', '$restaurant_foodeals_mon_open_pm', '$restaurant_foodeals_tue_selected', '$restaurant_foodeals_tue_open_hr', '$restaurant_foodeals_tue_open_min', '$restaurant_foodeals_tue_open_am', '$restaurant_foodeals_tue_close_hr', '$restaurant_foodeals_tue_close_min', '$restaurant_foodeals_tue_open_pm','$restaurant_foodeals_wed_selected', '$restaurant_foodeals_wed_open_hr', '$restaurant_foodeals_wed_open_min', '$restaurant_foodeals_wed_open_am', '$restaurant_foodeals_wed_close_hr', '$restaurant_foodeals_wed_close_min', '$restaurant_foodeals_wed_open_pm','$restaurant_foodeals_thu_selected', '$restaurant_foodeals_thu_open_hr', '$restaurant_foodeals_thu_open_min', '$restaurant_foodeals_thu_open_am', '$restaurant_foodeals_thu_close_hr', '$restaurant_foodeals_thu_close_min', '$restaurant_foodeals_thu_open_pm',
'$restaurant_foodeals_fri_selected', '$restaurant_foodeals_fri_open_hr', '$restaurant_foodeals_fri_open_min', '$restaurant_foodeals_fri_open_am', '$restaurant_foodeals_fri_close_hr', '$restaurant_foodeals_fri_close_min', '$restaurant_foodeals_fri_open_pm',
'$restaurant_foodeals_sat_selected', '$restaurant_foodeals_sat_open_hr', '$restaurant_foodeals_sat_open_min', '$restaurant_foodeals_sat_open_am', '$restaurant_foodeals_sat_close_hr', '$restaurant_foodeals_sat_close_min', '$restaurant_foodeals_sat_open_pm','$restaurant_foodeals_sun_selected', '$restaurant_foodeals_sun_open_hr', '$restaurant_foodeals_sun_open_min', '$restaurant_foodeals_sun_open_am', '$restaurant_foodeals_sun_close_hr', '$restaurant_foodeals_sun_close_min', '$restaurant_foodeals_sun_open_pm','$foodDeals_datestart', '$foodDeals_dateend', '0', '$today', '$deals_slot1', '$SundayBusinessHoursOpenTime', '$SundayBusinessHoursCloseTime', '$MondayBusinessHoursOpenTime', '$MondayBusinessHoursCloseTime', '$TuesdayBusinessHoursOpenTime', '$TuesdayBusinessHoursCloseTime', '$WednesdayBusinessHoursOpenTime', '$WednesdayBusinessHoursCloseTime', '$ThursdayBusinessHoursOpenTime', '$ThursdayBusinessHoursCloseTime', '$FridayBusinessHoursOpenTime', '$FridayBusinessHoursCloseTime', '$SaturdayBusinessHoursOpenTime', '$SaturdayBusinessHoursCloseTime', '$restaurant_buffet_sun_selected', '$restaurant_buffet_mon_selected', '$restaurant_buffet_tue_selected', '$restaurant_buffet_wed_selected', '$restaurant_buffet_thu_selected', '$restaurant_buffet_fri_selected', '$restaurant_buffet_sat_selected')";
if(mysql_query($DealsQueryInsert))
{
$DealsID=mysql_insert_id();
if($_POST['deals_slot']!=''){
$Restaurantdeals_slot=implode(',',$_POST['deals_slot']);
}
$rrr=explode(",",rtrim($Restaurantdeals_slot,','));
foreach($rrr as  $yy=>$vvv)
{
$pl=mysql_query("insert tbl_fooddealsSlot(restaurant_id,fooddeals_id,fooddeals_slotName,created_date)values('".$_GET['restaurant_id']."','".$DealsID."',N'".$vvv."','$today')");
}
$msg=1;
}
}
}

if(isset($_POST['EditfoodDealsSubmitSave']))
{

$image =$_FILES["foodDeals_image"]["name"];
$uploadedfile = $_FILES['foodDeals_image']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['foodDeals_image']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['foodDeals_image']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['foodDeals_image']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['foodDeals_image']['tmp_name'];
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

$newwidth1=220;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_favicon=uniqid().$_FILES['foodDeals_image']['name'];

$filename = "../control/MenuItemImg/MenuItemImgSmall/".$website_favicon;
$filename1 = "../control/MenuItemImg/MenuItemImgSmall/".$website_favicon;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$website_favicon=$_POST['foodDeals_imageold'];
}
if($_POST['deals_slot']!='')
{
$deals_slot1=implode(',',$_POST['deals_slot']);
}
else
{
$deals_slot1=$_POST['deals_slotold'];
}
if($_POST['restaurant_buffet_sun_selected']!='')
{
$SundayBusinessHoursOpenTime=$_POST['SundayBusinessHoursOpenTime'];
$SundayBusinessHoursCloseTime=$_POST['SundayBusinessHoursCloseTime'];
$restaurant_buffet_sun_selected=$_POST['restaurant_buffet_sun_selected'];
}
else
{
$SundayBusinessHoursOpenTime='';
$SundayBusinessHoursCloseTime='';

}
if($_POST['restaurant_buffet_mon_selected']!='')
{
$MondayBusinessHoursOpenTime=$_POST['MondayBusinessHoursOpenTime'];
$MondayBusinessHoursCloseTime=$_POST['MondayBusinessHoursCloseTime'];
$restaurant_buffet_mon_selected=$_POST['restaurant_buffet_mon_selected'];
}
else
{
$MondayBusinessHoursOpenTime='';
$MondayBusinessHoursCloseTime='';
}
if($_POST['restaurant_buffet_tue_selected']!='')
{
$TuesdayBusinessHoursOpenTime=$_POST['TuesdayBusinessHoursOpenTime'];
$TuesdayBusinessHoursCloseTime=$_POST['TuesdayBusinessHoursCloseTime'];
$restaurant_buffet_tue_selected=$_POST['restaurant_buffet_tue_selected'];
}
else
{
$TuesdayBusinessHoursOpenTime='';
$TuesdayBusinessHoursCloseTime='';
}


if($_POST['restaurant_buffet_wed_selected']!='')
{
$WednesdayBusinessHoursOpenTime=$_POST['WednesdayBusinessHoursOpenTime'];
$WednesdayBusinessHoursCloseTime=$_POST['WednesdayBusinessHoursCloseTime'];
$restaurant_buffet_wed_selected=$_POST['restaurant_buffet_wed_selected'];
}
else
{
$WednesdayBusinessHoursOpenTime='';
$WednesdayBusinessHoursCloseTime='';
}

if($_POST['restaurant_buffet_thu_selected']!='')
{
$ThursdayBusinessHoursOpenTime=$_POST['ThursdayBusinessHoursOpenTime'];
$ThursdayBusinessHoursCloseTime=$_POST['ThursdayBusinessHoursCloseTime'];
$restaurant_buffet_thu_selected=$_POST['restaurant_buffet_thu_selected'];
}
else
{
$ThursdayBusinessHoursOpenTime='';
$ThursdayBusinessHoursCloseTime='';
}

if($_POST['restaurant_buffet_fri_selected']!='')
{
$FridayBusinessHoursOpenTime=$_POST['FridayBusinessHoursOpenTime'];
$FridayBusinessHoursCloseTime=$_POST['FridayBusinessHoursCloseTime'];
$restaurant_buffet_fri_selected=$_POST['restaurant_buffet_fri_selected'];
}
else
{
$FridayBusinessHoursOpenTime='';
$FridayBusinessHoursCloseTime='';
}
if($_POST['restaurant_buffet_sat_selected']!='')
{
$SaturdayBusinessHoursOpenTime=$_POST['SaturdayBusinessHoursOpenTime'];
$SaturdayBusinessHoursCloseTime=$_POST['SaturdayBusinessHoursCloseTime'];
$restaurant_buffet_sat_selected=$_POST['restaurant_buffet_sat_selected'];
}
else
{
$SaturdayBusinessHoursOpenTime='';
$SaturdayBusinessHoursCloseTime='';
}
$FoodDealsQueryUpdate="UPDATE `tbl_foodDeals` SET `restaurant_id` ='".$_GET['restaurant_id']."',`foodDeals_type` ='$foodDeals_type', `foodDeals_name` = N'$foodDeals_name', `foodDeals_price` = '$foodDeals_price',`foodDeals_serving_person` = N'$foodDeals_serving_person', `foodDeals_image` = '$website_favicon', `foodDeals_description` = N'$foodDeals_description', `foodDeals_day` = N'$foodDeals_day', `restaurant_foodeals_mon_selected` = '$restaurant_foodeals_mon_selected', `restaurant_foodeals_mon_open_hr` = '$restaurant_foodeals_mon_open_hr', `restaurant_foodeals_mon_open_min` = '$restaurant_foodeals_mon_open_min', `restaurant_foodeals_mon_open_am` = '$restaurant_foodeals_mon_open_am', `restaurant_foodeals_mon_close_hr` = '$restaurant_foodeals_mon_close_hr', `restaurant_foodeals_mon_close_min` = '$restaurant_foodeals_mon_close_min', `restaurant_foodeals_mon_open_pm` = '$restaurant_foodeals_mon_open_pm', `restaurant_foodeals_tue_selected` = '$restaurant_foodeals_tue_selected', `restaurant_foodeals_tue_open_hr` = '$restaurant_foodeals_tue_open_hr', `restaurant_foodeals_tue_open_min` = '$restaurant_foodeals_tue_open_min', `restaurant_foodeals_tue_open_am` = '$restaurant_foodeals_tue_open_am', `restaurant_foodeals_tue_close_hr` = '$restaurant_foodeals_tue_close_hr', `restaurant_foodeals_tue_close_min` = '$restaurant_foodeals_tue_close_min', `restaurant_foodeals_tue_open_pm` = '$restaurant_foodeals_tue_open_pm', `restaurant_foodeals_wed_selected` = '$restaurant_foodeals_wed_selected', `restaurant_foodeals_wed_open_hr` = '$restaurant_foodeals_wed_open_hr', `restaurant_foodeals_wed_open_min` = '$restaurant_foodeals_wed_open_min', `restaurant_foodeals_wed_open_am` = '$restaurant_foodeals_wed_open_am', `restaurant_foodeals_wed_close_hr` = '$restaurant_foodeals_wed_close_hr', `restaurant_foodeals_wed_close_min` = '$restaurant_foodeals_wed_close_min', `restaurant_foodeals_wed_open_pm` = '$restaurant_foodeals_wed_open_pm', `restaurant_foodeals_thu_selected` = '$restaurant_foodeals_thu_selected', `restaurant_foodeals_thu_open_hr` = '$restaurant_foodeals_thu_open_hr', `restaurant_foodeals_thu_open_min` = '$restaurant_foodeals_thu_open_min', `restaurant_foodeals_thu_open_am` = '$restaurant_foodeals_thu_open_am', `restaurant_foodeals_thu_close_hr` = '$restaurant_foodeals_thu_close_hr', `restaurant_foodeals_thu_close_min` = '$restaurant_foodeals_thu_close_min', `restaurant_foodeals_thu_open_pm` = '$restaurant_foodeals_thu_open_pm', `restaurant_foodeals_fri_selected` = '$restaurant_foodeals_fri_selected', `restaurant_foodeals_fri_open_hr` = '$restaurant_foodeals_fri_open_hr', `restaurant_foodeals_fri_open_min` = '$restaurant_foodeals_fri_open_min', `restaurant_foodeals_fri_open_am` = '$restaurant_foodeals_fri_open_am', `restaurant_foodeals_fri_close_hr` = '$restaurant_foodeals_fri_close_hr', `restaurant_foodeals_fri_close_min` = '$restaurant_foodeals_fri_close_min', `restaurant_foodeals_fri_open_pm` = '$restaurant_foodeals_fri_open_pm', `restaurant_foodeals_sat_selected` = '$restaurant_foodeals_sat_selected', `restaurant_foodeals_sat_open_hr` = '$restaurant_foodeals_sat_open_hr', `restaurant_foodeals_sat_open_min` = '$restaurant_foodeals_sat_open_min', `restaurant_foodeals_sat_open_am` = '$restaurant_foodeals_sat_open_am', `restaurant_foodeals_sat_close_hr` = '$restaurant_foodeals_sat_close_hr', `restaurant_foodeals_sat_close_min` = '$restaurant_foodeals_sat_close_min', `restaurant_foodeals_sat_open_pm` = '$restaurant_foodeals_sat_open_pm', `restaurant_foodeals_sun_selected` = '$restaurant_foodeals_sun_selected', `restaurant_foodeals_sun_open_hr` = '$restaurant_foodeals_sun_open_hr', `restaurant_foodeals_sun_open_min` = '$restaurant_foodeals_sun_open_min', `restaurant_foodeals_sun_open_am` = '$restaurant_foodeals_sun_open_am', `restaurant_foodeals_sun_close_hr` = '$restaurant_foodeals_sun_close_hr', `restaurant_foodeals_sun_close_min` = '$restaurant_foodeals_sun_close_min', `restaurant_foodeals_sun_open_pm` = '$restaurant_foodeals_sun_open_pm', `foodDeals_datestart` = '$foodDeals_datestart', `foodDeals_dateend` = '$foodDeals_dateend', `created_date` = '$today', `deals_slot` = '$deals_slot' ,`SundayBusinessHoursOpenTime` = '$SundayBusinessHoursOpenTime',`SundayBusinessHoursCloseTime` = '$SundayBusinessHoursCloseTime',`MondayBusinessHoursOpenTime` = '$MondayBusinessHoursOpenTime',`MondayBusinessHoursCloseTime` = '$MondayBusinessHoursCloseTime',`TuesdayBusinessHoursOpenTime` = '$TuesdayBusinessHoursOpenTime',`TuesdayBusinessHoursCloseTime` = '$TuesdayBusinessHoursCloseTime',`WednesdayBusinessHoursOpenTime` = '$WednesdayBusinessHoursOpenTime',`WednesdayBusinessHoursCloseTime` = '$WednesdayBusinessHoursCloseTime',`ThursdayBusinessHoursOpenTime` = '$ThursdayBusinessHoursOpenTime',`ThursdayBusinessHoursCloseTime` = '$ThursdayBusinessHoursCloseTime',`FridayBusinessHoursOpenTime` = '$FridayBusinessHoursOpenTime',`FridayBusinessHoursCloseTime` = '$FridayBusinessHoursCloseTime',`SaturdayBusinessHoursOpenTime` = '$SaturdayBusinessHoursOpenTime',`SaturdayBusinessHoursCloseTime` = '$SaturdayBusinessHoursCloseTime',`restaurant_buffet_sun_selected` = '$restaurant_buffet_sun_selected',`restaurant_buffet_mon_selected` = '$restaurant_buffet_mon_selected',`restaurant_buffet_tue_selected` = '$restaurant_buffet_tue_selected',`restaurant_buffet_wed_selected` = '$restaurant_buffet_wed_selected',`restaurant_buffet_thu_selected` = '$restaurant_buffet_thu_selected',`restaurant_buffet_fri_selected` = '$restaurant_buffet_fri_selected',`restaurant_buffet_sat_selected` = '$restaurant_buffet_sat_selected' WHERE `id` ='".$_GET['eid']."'";
if(mysql_query($FoodDealsQueryUpdate))
{
if($_POST['deals_slot1']!=''){
$Restaurantdeals_slot1=implode(',',$_POST['deals_slot1']);
$deals_slotid1=implode(',',$_POST['deals_slotid1']);
}
$rrr1=explode(",",$Restaurantdeals_slot1);
$rrr2=explode(",",$deals_slotid1);
foreach($rrr1 as  $yy1=>$vvv1)
{
if($vvv1!=''){
mysql_query("update tbl_fooddealsSlot set fooddeals_slotName=N'".$vvv1."',restaurant_id='".$_GET['restaurant_id']."',fooddeals_id='".$_GET['eid']."' where id='".$rrr2[$yy1]."'");
}
}
if($_POST['deals_slot']!=''){
$Restaurantdeals_slot=implode(',',$_POST['deals_slot']);
}
$rrr=explode(",",rtrim($Restaurantdeals_slot,','));
foreach($rrr as  $yy=>$vvv)
{
if($vvv!=''){
$pl=mysql_query("insert tbl_fooddealsSlot(restaurant_id,fooddeals_id,fooddeals_slotName,created_date)values('".$_GET['restaurant_id']."','".$_GET['eid']."',N'".$vvv."','$today')");
}
}
$emsg=1;
}
}
?>	
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 
<script type="text/javascript">
											
	  function toggleTables(which)
        {

    if(which == "1" ) {
        document.getElementById('displayDayData').style.display='table-row';
		document.getElementById('displayTimeData').style.display = "none";
		document.getElementById('displayDateData').style.display = "none";
       }
	   else if(which == "2" ) {
        document.getElementById('displayDayData').style.display='none';
		document.getElementById('displayTimeData').style.display = "none";
		document.getElementById('displayDateData').style.display = "block";
       }
	    else if(which == "3" ) {
        document.getElementById('displayDayData').style.display='none';
		document.getElementById('displayTimeData').style.display = "block";
		document.getElementById('displayDateData').style.display = "none";
       }
        else
		{
		 document.getElementById('displayDayData').style.display='none';
		document.getElementById('displayTimeData').style.display = "none";
		document.getElementById('displayDateData').style.display = "none";
		}
}
										
											</script>
                                            <script type="text/javascript">
/*
This script is identical to the above JavaScript function.
*/
var ct = 1;

function new_link3()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;

	// link to delete extended form elements
	var delLink = '<div align="center" style="margin-top: -36px;margin-bottom: 9px;" ><a href="javascript:delIt3('+ ct +')"  class="btn btn-danger">Delete</a></div>';

	div1.innerHTML = document.getElementById('newlinktpl3').innerHTML + delLink;

	document.getElementById('newlink3').appendChild(div1);

}
// function to delete the newly added set of elements
function delIt3(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newlink3');

	parentEle.removeChild(ele);

}

function RestaurantDateCheck(){
var startdate=document.getElementById('foodDeals_datestart').value;
var enddate=document.getElementById('foodDeals_dateend').value;
if (startdate > enddate) {
alert("Start Date is greater than End Date!");
 document.getElementById("foodDeals_dateend").value = "";
 //document.getElementById("foodDealsSubmit").disabled=true;
}
else
{
//document.getElementById("foodDealsSubmit").disabled=false;
}
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
							<li class="active" ><a href="#mainFormElements"  data-toggle="tab" style="cursor:pointer; color:#FFFFFF;"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Food Deals
                            <?php } else { ?>
                            Update Restaurant Food Deals
                            <?php } ?>
                            
                            </a></li>
						</ul>

		 

						<div class="tab-content"   style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Food Deals
                            <?php } else { ?>
                            Update Restaurant Food Deals
                            <?php } ?></a>
											</div>
										</div>
                                        <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Food Deals has been successfully saved
		                                     </div>
											<?php } if($error==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Food Deals is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                            <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Deals has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Deals has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Deals has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?>
                                            
                                            </td>
  </tr>
</table>
										<div class="row-fluid" >
											<div  class=" span12">
												 <?php 
										   if($_GET['eid']!='')
										   {
										    $buttonName="EditfoodDealsSubmitSave";
											$buttonValue="Edit Restaurant Food Deals";
										   }
										   else
										   {
										   $buttonName="foodDealsSubmit";
										   $buttonValue="Add New Restaurant Food Deals";
										   }
										   
										   ?>
											 <script type="text/javascript">
											 function DataSubmit(str)
											 {
											 window.location.href='add_restaurant_Food_Deals.php?restaurant_id='+str;
											 }
											 </script>
												<form id="SignupForm" action="" name="SignupForm"  method="post" enctype="multipart/form-data">
												<input type="hidden" name="deals_slotold" value="<?php echo $CuisineData['deals_slot'];?>">
                                                <input type="hidden" name="foodDeals_imageold" value="<?php echo $CuisineData['foodDeals_image'];?>">
												<input type="hidden" name="restaurant_id" value="<?php echo $_SESSION['restaurant_id'];?>" />
                                                    <table  align="center" border="0">
                                                    
                                            <tr>
    <td><label for="foodDeals_name">Food Deals Title</label></td>
    <td><input id="foodDeals_name" name="foodDeals_name" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" value="<?php echo $CuisineData['foodDeals_name']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
 
  <tr>
    <td><label for="foodDeals_price">Food Deals Price</label></td>
    <td><input name="foodDeals_price" id="foodDeals_price" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" placeholder="" type="text" value="<?php echo $CuisineData['foodDeals_price']; ?>"   style="width:300px;"/> </td>
    </tr>
    <tr>
    <td><label for="foodDeals_serving_person">No of Serving Person </label></td>
    <td><input name="foodDeals_serving_person" id="foodDeals_serving_person" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" placeholder="" type="text" value="<?php echo $CuisineData['foodDeals_serving_person']; ?>"   style="width:300px;"/> </td>
    </tr>
    <tr>
    <td colspan=""><label for="restaurant_website">Food Deals Type</label></td>
    <td colspan="">
  <select  data-placeholder="Select Restaurant..." required  onchange="toggleTables(this.value)"  id="foodDeals_type" name="foodDeals_type" style="width:317px;" >
    <option value="">Select</option>
      <option value="1" <?php if($CuisineData['foodDeals_type']==1){ ?> selected <?php } ?>>Every Day wise</option>
       <option value="2" <?php if($CuisineData['foodDeals_type']==2){ ?> selected <?php } ?>>Date Interval</option>
        <option value="3" <?php if($CuisineData['foodDeals_type']==3){ ?> selected <?php } ?>>Time Interval</option>
          </select>
    </td>
   
  </tr> 
  
  <tr <?php if($CuisineData['foodDeals_type']==1){ ?> style="display:table-row;" <?php } else {?> style="display:none;" <?php } ?> id="displayDayData">
    <td colspan=""><label for="foodDeals_day">Food Deals Day</label></td>
    <td colspan="">
  <select  data-placeholder="Select Restaurant..."   id="foodDeals_day" name="foodDeals_day" style="width:317px;" >
    <option value="">Select</option>
      <option value="Monday" <?php if($CuisineData['foodDeals_day']=='Monday'){ ?> selected <?php } ?>>Every Monday</option>
       <option value="Tuesday" <?php if($CuisineData['foodDeals_day']=='Tuesday'){ ?> selected <?php } ?>>Every Tuesday</option>
        <option value="Wednesday" <?php if($CuisineData['foodDeals_day']=='Wednesday'){ ?> selected <?php } ?>>Every Wednesday</option>
         <option value="Thursday" <?php if($CuisineData['foodDeals_day']=='Thursday'){ ?> selected <?php } ?>>Every Thursday</option>
       <option value="Friday" <?php if($CuisineData['foodDeals_day']=='Friday'){ ?> selected <?php } ?>>Every Friday</option>
        <option value="Saturday" <?php if($CuisineData['foodDeals_day']=='Saturday'){ ?> selected <?php } ?>>Every Saturday</option>
        <option value="Sunday" <?php if($CuisineData['foodDeals_day']=='Sunday'){ ?> selected <?php } ?>>Every Sunday</option>
          </select>
    </td>
   
  </tr> 
   <tr><td colspan="2" align="center" > <table width="98%" border="0" id="displayDateData" <?php if($CuisineData['foodDeals_type']==2){ ?> style="display:block" <?php } else {?> style="display:none;" <?php } ?> >
 <tr>
    <td><label for="foodDeals_datestart">Food Deals Start Date</label></td>
    <td><input id="foodDeals_datestart"  name="foodDeals_datestart"  value="<?php echo $CuisineData['foodDeals_datestart']; ?>" data-date-format="mm/dd/yyyy" type="text" class="datePicker"   style="width:300px;"/></td>
    </tr>
    <tr>
    <td><label for="foodDeals_dateend">Food Deals End Date</label></td>
    <td><input value="<?php echo $CuisineData['foodDeals_dateend']; ?>" data-date-format="mm/dd/yyyy" type="text" name="foodDeals_dateend" id="foodDeals_dateend"  class="datePicker"   style="width:300px;" onblur="return RestaurantDateCheck();" /></td>
  </tr>
  </table></td></tr>
  
  
  
  <tr><td colspan="2" align="center" > <table width="98%" border="0" id="displayTimeData" <?php if($CuisineData['foodDeals_type']==3){ ?> style="display:block" <?php } else {?> style="display:none;" <?php } ?> >
 
  <tr>
    <td height="35"><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_sun_selected" id="restaurant_buffet_sun_selected"  <?php if($CuisineData['restaurant_buffet_sun_selected']!=''){ ?> checked="checked" <?php } ?>  value="Sunday" />Sunday</label></td>
    <td> 
    <select  id="SundayBusinessHours" name="SundayBusinessHoursOpenTime"  style="width:170px;" > 
    <option value="">Select Open Time</option>
    
    <option value="10:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['SundayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
    
   
                
                
    </select>&nbsp;  <select  id="SundayBusinessHours1" name="SundayBusinessHoursCloseTime"  style="width:170px;" > 
    <option value="">Select Close Time</option>
    
    <option value="10:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['SundayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
                
    </select>
    <!--<input  value="" type="text" name="SundayBusinessHours" placeholder="Sunday Business Hours" style="width:330px;" required>--></td>
     <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_mon_selected" id="restaurant_buffet_mon_selected"  <?php if($CuisineData['restaurant_buffet_mon_selected']!=''){ ?> checked="checked" <?php } ?>  value="Monday" />Monday</label></td>
    <td> 
	  <select  id="MondayBusinessHours" name="MondayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
   <option value="10:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['MondayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
    </select>&nbsp;
    
    
      <select  id="MondayBusinessHours1" name="MondayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
     <option value="10:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['MondayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
                
    </select>&nbsp;
    
	</td>
   
  </tr>
  
  
  <tr>
    <td height="33"><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_tue_selected" id="restaurant_buffet_tue_selected"  <?php if($CuisineData['restaurant_buffet_tue_selected']!=''){ ?> checked="checked" <?php } ?>  value="Tuesday" />Tuesday</label></td>
    <td> 
	  <select  id="TuesdayBusinessHours" name="TuesdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
  <option value="10:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['TuesdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
                
    </select>&nbsp;
    <select  id="TuesdayBusinessHours1" name="TuesdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
     <option value="10:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['TuesdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
    </select>&nbsp;
	</td>
     <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_wed_selected" id="restaurant_buffet_wed_selected"  <?php if($CuisineData['restaurant_buffet_wed_selected']!=''){ ?> checked="checked" <?php } ?>  value="Wednesday" />Wednesday</label></td>
    <td> 
	  <select  id="WednesdayBusinessHours" name="WednesdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
    <option value="10:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['WednesdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
                
    </select>&nbsp;
    
    
    <select  id="WednesdayBusinessHours1" name="WednesdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
    <option value="10:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['WednesdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
    </select>&nbsp;
    
	</td>
   
  </tr>
  
  
   <tr>
    <td height="30"><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_thu_selected" id="restaurant_buffet_thu_selected"  <?php if($CuisineData['restaurant_buffet_thu_selected']!=''){ ?> checked="checked" <?php } ?>  value="Thursday" />Thursday</label></td>
    <td> 
	  <select  id="ThursdayBusinessHours" name="ThursdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
   <option value="10:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['ThursdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
    </select>&nbsp;
    
    
    
      <select  id="ThursdayBusinessHours1" name="ThursdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
   <option value="10:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['ThursdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
    </select>&nbsp;
    
	</td>
     <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_fri_selected" id="restaurant_buffet_fri_selected"  <?php if($CuisineData['restaurant_buffet_fri_selected']!=''){ ?> checked="checked" <?php } ?>  value="Friday" />Friday</label></td>
    <td> 
	  <select  id="FridayBusinessHours" name="FridayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
    <option value="10:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['FridayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
                
    </select>&nbsp;
    
    
    
    
     <select  id="FridayBusinessHours1" name="FridayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
   <option value="10:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['FridayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
    </select>&nbsp;
    
	</td>
   
  </tr>
  
  
  
    <tr>
    <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_buffet_sat_selected" id="restaurant_buffet_sat_selected"  <?php if($CuisineData['restaurant_buffet_sat_selected']!=''){ ?> checked="checked" <?php } ?>  value="Saturday" /> Saturday</label></td>
    <td> 
	  <select  id="SaturdayBusinessHours" name="SaturdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
    <option value="10:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['SaturdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
                
    </select>&nbsp;
    
    
     <select  id="SaturdayBusinessHours1" name="SaturdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
   <option value="10:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($CuisineData['SaturdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>0:00:00</option>
                
    </select>&nbsp;
    
	</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  </table></td></tr>
   
  <tr><td><label for="deals_slot">Food Deals Slot</label></td><td> <div id="newlink3" style="margin-bottom:15px;" >
  <table width="70%">
  <tr><td><input id="deals_slot" name="deals_slot[]"  value="" type="text" class="form-control" placeholder="" style="width:300px;"   /></td>
  <td><a href="javascript:new_link3()" class="btn btn-blue2" style="margin-left:20px;">Add More Food Deals Slot</a></td>
  </tr>
  </table>
  </div>
  
  <div id="newlinktpl3" style="display:none; margin-top:10px;">
  <table width="70%">
 
   <tr><td><input id="deals_slot" name="deals_slot[]"  value="" type="text" class="form-control" placeholder="" style="width:300px;"   /></td>  
  </tr>
  </table>
  </div>

  </td></tr>
 <?php if($_GET['eid']!=''){ ?>
   <?php 
     $slot_itemNameStateQuery = mysql_query("select * from tbl_fooddealsSlot where restaurant_id='".$_GET['restaurant_id']."' and fooddeals_id='".$_GET['eid']."'   order by fooddeals_slotName asc"); 
	 $count=1;
	 while($slot_iteStateData=mysql_fetch_assoc($slot_itemNameStateQuery)){?>
    <input id="deals_slotid1" name="deals_slotid1[]"  value="<?php echo $slot_iteStateData['id'];?>" type="hidden" class="form-control" placeholder="" style="width:300px;"   />
   <tr><td><label for="deals_slot">Food Deals Slot <?php echo $count;?></label></td><td><input id="deals_slot" name="deals_slot1[]"  value="<?php echo $slot_iteStateData['fooddeals_slotName'];?>" type="text" class="form-control" placeholder="" style="width:300px;"   /></td>  
  <?php 
  $count++;
  } ?>
  
  <?php } ?>
  
  
    <tr>
    <td><label for="foodDeals_description">Food Deals Description</label></td>
    <td>
    <textarea name="foodDeals_description" id="foodDeals_description" style="width:800px; height:80px;"><?php echo $CuisineData['foodDeals_description']; ?></textarea>
    </td>
   
  </tr>
  
   <tr>
    <td ><label for="restaurant_website">Food Deals Image</label></td>
    <td>
    <input type="file" name="foodDeals_image" id="foodDeals_image" value="">
    </td>
   
  </tr>
  
  <?php if($_GET['eid']!=''){ ?>
   <tr>
    <td><label for="restaurant_website">Food Deals Photo</label></td>
    <td>
   <img src="../control/MenuItemImg/MenuItemImgSmall/<?php echo $CuisineData['foodDeals_image'];?>" width="150" height="100" />
    </td>
   
  </tr>
  <?php } ?>
  <tr><td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="center" colspan="2">
  <input type="submit" class="btn btn-primary " name="<?php echo $buttonName;?>" id="foodDealsSubmit" value="<?php echo $buttonValue; ?>" />
    </td>
   
  </tr>
</table>	
												</form>
                                                
                                                
                                                
                                                
                                                
											</div>
										</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
									</div>
								
									<div class="well" id="manage">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display Restaurant Food Deals</a>
											</div>
										</div>
                                         <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="id";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  desc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_foodDeals";
		if($_GET['restaurant_id']!='' && $_GET['statusid']!='' )
		{
		$url="add_restaurant_Food_Deals.php?restaurant_id=".$_GET['restaurant_id']."&statusid=".$_GET['statusid']."&";
		$where="restaurant_id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where restaurant_id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['restaurant_id']!='')
		{
		$url="add_restaurant_Food_Deals.php?restaurant_id=".$_GET['restaurant_id']."&";
		$where="restaurant_id='".$_GET['restaurant_id']."'";
		
		$qur="SELECT * FROM {$statement} where restaurant_id='".$_GET['restaurant_id']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="add_restaurant_Food_Deals.php?statusid=".$_GET['statusid']."&";
		$where=" status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$url="add_restaurant_Food_Deals.php?fooddeals=1&";
		$where="1";
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             <script type="text/javascript">
											 function submitURL(Dvalue,str,restaurantCity1,statusid1)
{
window.location.href="add_restaurant_Food_Deals.php?restaurant_id="+restaurantCity1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
											 </script>
                                              
                                       
                                        <form action="add_restaurant_Food_Deals.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
  
  
    <td><label for="restaurant_id">By Restaurant </label></td>
    <td>	<select  data-placeholder="Select Restaurant..." onChange="document.userform.submit();"  id="restaurant_id" name="restaurant_id" style="width:180px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											  
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd  order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php  } ?>
											</select></td>
      <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:150px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
  </tr>
</table>
    </form>
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Food Deals" value="Delete All" onClick="return confirm('Are you sure to delete selected Restaurant Food Deals');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Food Deals" value="Activate All" onClick="return confirm('Are you sure to activate selected Restaurant Food Deals');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Food Deals" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Restaurant Food Deals');"  type="submit"></td></tr>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th><?php
													if($_GET['sort']=='asc'){
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													elseif($_GET['sort']=='desc'){
													$pl='asc';
													$imgSort='<img src="sortdesc.png" style="float:right;" />';
													}
													else
													{
													$pl='asc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
                                                     <a  style="cursor:pointer;">Restaurant Name </a></th>
                                                    <th> <a  style="cursor:pointer;">Food Deals Name </a></th>
                                                    <th> <a  style="cursor:pointer;">Food Deals Price </a></th>
                                                    <th> <a  style="cursor:pointer;">Serving Person</a></th>
													<th> <a  style="cursor:pointer;">Add/View Slot </a></th>
                                                    <th> <a  style="cursor:pointer;">Created Date</a></th>
													<th><a  style="cursor:pointer;">Action</a></th>
												</tr>
											</thead>
											<tbody>
                                            <?php
		
		if($numrowdata>0){
		$count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
                                                     <td><?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$row['restaurant_id']));
													echo ucwords($StQuery['restaurant_name']);?></td>
													<td><?php echo ucwords($row['foodDeals_name']);?></td>
												<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo ucwords($row['foodDeals_price']);?></td>
                                                <td><?php echo ucwords($row['foodDeals_serving_person']);?></td>
                                                
                                                <td><a href="add_restaurant_Food_Deals_slot.php?fooddeals=<?php echo $row['id'];?>&restaurant_id=<?php echo $row['restaurant_id'];?>" class="btn btn-primary" title="Edit Food Deals">Add/View Food Deals Slot</a></td>
                                                 <td><?php echo ucwords($row['created_date']);?></td>
													<td>	<a href="add_restaurant_Food_Deals.php?eid=<?php echo $row['id'];?>&restaurant_id=<?php echo $row['restaurant_id'];?>" class="btn btn-primary" title="Edit Food Deals">Edit</a>
						<a href="InsertPhp.php?tag=ResfoodDealsDelete&eid=<?php echo $row['id'];?>&restaurant_id=<?php echo $row['restaurant_id'];?>" class="btn btn-dualima" title="Delete Food Deals" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResfoodDealsActivate&active=1&statusid=<?php echo $row['id'];?>&restaurant_id=<?php echo $row['restaurant_id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Food Deals">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResfoodDealsActivate&active=0&statusid=<?php echo $row['id'];?>&restaurant_id=<?php echo $row['restaurant_id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Food Deals">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 } } else {  ?>
                                                  <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Food Deals is available in current Database.</strong></td></tr>
                                                <?php } ?>
												
											</tbody>
										</table>
                                       
                                        </form>
                                        <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php echo pagination($statement,$where,$limit,$page,$url);?></td></tr>
                                        </table>
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
