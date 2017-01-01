<?php
//mysql_query ("set character_set_results='utf8'"); 

/**
 * File to handle all API requests
 * Accepts GET and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data
 
  /**
 * check for POST request 
 */
  // include db handler
 require_once 'route/DB_Functions.php';
    $db = new DB_Functions();
	include('imgUploadFun.php');
	include('domainName.php');
	include('route/config1.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
//+++++++++++++++++++++++++++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE CUISINE++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
	
if($_GET['tag']=='cuisineAdd') {
    // get tag
     $RestaurantCuisineName = $_POST['RestaurantCuisineName'];
	  $HomeDisplay = $_POST['HomeDisplay'];
  $image_name=$_FILES['RestaurantCuisineImg']['name'];
 
	$image_temp=$_FILES['RestaurantCuisineImg']['tmp_name'];
	$directory="cuisineImg";
	 $kp=ImageUpload($image_name,$image_temp,$directory,200,200);
	ImageUpload($image_name,$image_temp,$directory,200,200);
  $CuisineInsert = $db->storeCuisine($RestaurantCuisineName,$kp,$RestaurantCuisineThumbImg,$HomeDisplay);
  if($CuisineInsert)
  {
  header("location:add_restaurant_cuisine.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_cuisine.php?error=1");
  }
}


if($_GET['tag']=='cuisineEdit') {
    // get tag
 $RestaurantCuisineName = $_POST['RestaurantCuisineName'];
  $HomeDisplay = $_POST['HomeDisplay'];
 $image_name=$_FILES['RestaurantCuisineImg']['name'];
 $image_temp=$_FILES['RestaurantCuisineImg']['tmp_name'];
 $directory="cuisineImg";
      if($image_name)
            {
				 $kp=ImageUpload($image_name,$image_temp,$directory,200,200);
				ImageUpload($image_name,$image_temp,$directory,200,200);
			}
 			else
 			{
 			$kp=$_POST['RestaurantCuisineImgold'];
 			}
 			$CuisineInsert = $db->storeUpdateCuisine($RestaurantCuisineName,$kp,$kp,$HomeDisplay,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_cuisine.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_cuisine.php?emsg=0");
  }
}
if($_GET['tag']=='cuisineDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_cuisine","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_restaurant_cuisine.php?dmsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_cuisine.php?dmsg=0");
  }

}

if($_GET['tag']=='cuisineActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_cuisine","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_restaurant_cuisine.php?amsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_cuisine.php?amsg=0");
  }

}



if($_GET['tag']=='ResAddonsDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_menuAddON","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:ManageResatuarantExtraAddOn.php?dmsg=1");
  			}
  			else
  			{
  			header("location:ManageResatuarantExtraAddOn.php?dmsg=0");
  }

}

if($_GET['tag']=='ResAddonsActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_menuAddON","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:ManageResatuarantExtraAddOn.php?amsg=1");
  			}
  			else
  			{
  			header("location:ManageResatuarantExtraAddOn.php?amsg=0");
  }

}



if($_GET['tag']=='RespassEdit') {
 $AdminEmail = $_POST['AdminEmail'];
  $new_password = $_POST['new_password'];
$CuisineDelete = $db->ChangeAdminPassword($AdminEmail,$new_password,$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:change_password.php?amsg=1");
  			}
  			else
  			{
  			header("location:change_password.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE CUISINE++++++++++++++++++++++++++++++++++++++++++++++++++++++++//



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='facilitiesAdd') {
    // get tag
     $restaurant_FacilitiesName = $_POST['restaurant_FacilitiesName'];
    $image_name=$_FILES['restaurant_FacilitiesIcon']['name'];
   $image_temp=$_FILES['restaurant_FacilitiesIcon']['tmp_name'];
	$directory="facilitiesImg";
	$kp=ImageUpload($image_name,$image_temp,$directory,30,30);
	ImageUpload($image_name,$image_temp,$directory,30,30);
  $CuisineInsert = $db->storeFacilities($restaurant_FacilitiesName,$kp);
  if($CuisineInsert)
  {
  header("location:add_restaurant_facilities.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_facilities.php?error=1");
  }
}
if($_GET['tag']=='facilitiesEdit') {
    // get tag
 $restaurant_FacilitiesName = $_POST['restaurant_FacilitiesName'];
 $image_name=$_FILES['restaurant_FacilitiesIcon']['name'];
 $image_temp=$_FILES['restaurant_FacilitiesIcon']['tmp_name'];
 $directory="facilitiesImg";
      if($image_name)
            {
				 $kp=ImageUpload($image_name,$image_temp,$directory,30,30);
				ImageUpload($image_name,$image_temp,$directory,30,30);
			}
 			else
 			{
 			$kp=$_POST['restaurant_FacilitiesIconold'];
 			}
 			$CuisineInsert = $db->storeUpdateCuisine($restaurant_FacilitiesName,$kp,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_facilities.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_facilities.php?emsg=0");
  }
}
if($_GET['tag']=='facilitiesDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_facilities","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_restaurant_facilities.php?dmsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_facilities.php?dmsg=0");
  }

}

if($_GET['tag']=='facilitiesActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_facilities","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_restaurant_facilities.php?amsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_facilities.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE++++++++++++++++++++++++++++++++++++++++++++++++++++++++//


//+++++++++++++++++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE TYPE+++++++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='ResTypeAdd') {
    // get tag
   $restaurant_type_name = $_POST['restaurant_type_name'];
  $CuisineInsert = $db->storeServiceTYpe("tbl_restaurantType","restaurant_type_name",$restaurant_type_name);
  if($CuisineInsert)
  {
  header("location:add_restaurant_type.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_type.php?error=1");
  }
}
if($_GET['tag']=='ResTypeEdit') {
 $restaurant_type_name = $_POST['restaurant_type_name'];
 $CuisineInsert = $db->storeUpdateServiceTYpe("tbl_restaurantType","restaurant_type_name",$restaurant_type_name,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_restaurant_type.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_type.php?emsg=0");
  }
}
if($_GET['tag']=='ResTypeDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantType","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_type.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_type.php?dmsg=0");
  }

}

if($_GET['tag']=='ResTypeActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantType","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_type.php?amsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_type.php?amsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE TYPE+++++++++++++++++++++++++++++++++++++++//




//+++++++++++++++++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE SERVICE+++++++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='ResServiceAdd') {
    // get tag
   $restaurant_service_name = $_POST['restaurant_service_name'];
  $CuisineInsert = $db->storeServiceTYpe("tbl_restaurantService","restaurant_service_name",$restaurant_service_name);
  if($CuisineInsert)
  {
  header("location:add_restaurant_service.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_service.php?error=1");
  }
}
if($_GET['tag']=='ResServiceEdit') {
 $restaurant_service_name = $_POST['restaurant_service_name'];
 $CuisineInsert = $db->storeUpdateServiceTYpe("tbl_restaurantService","restaurant_service_name",$restaurant_service_name,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_restaurant_service.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_service.php?emsg=0");
  }
}
if($_GET['tag']=='ResServiceDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantService","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_service.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_service.php?dmsg=0");
  }

}

if($_GET['tag']=='ResServiceActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantService","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_service.php?amsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_service.php?amsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE SERVICE+++++++++++++++++++++++++++++++++++++++//

//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT OFFER++++++++++++++++++++++++++++//
if($_GET['tag']=='ResOfferAdd') {
    // get tag
   $restaurant_id = $_POST['restaurant_id'];
    $RestaurantoffrType = $_POST['RestaurantoffrType'];
	 $RestaurantOfferStartDate = $_POST['RestaurantOfferStartDate'];
	  $RestaurantOfferEndDate = $_POST['RestaurantOfferEndDate'];
	   $RestaurantOfferPrice = $_POST['RestaurantOfferPrice'];
	    $RestaurantOfferStartPrice = $_POST['RestaurantOfferStartPrice'];
		$OrderDiscountshow = $_POST['OrderDiscountshow'];
	  $RestaurantOfferDescription = $_POST['RestaurantOfferDescription'];
	   $topDiscount = $_POST['topDiscount'];
	  
	  
	
	  
	  if($_POST['restaurant_discount_mon_selected']!=''){
  $restaurant_discount_mon_selected1 = $_POST['restaurant_discount_mon_selected'];
  $restaurant_discount_mon_open_hr1 = $_POST['restaurant_discount_mon_open_hr'];
   $restaurant_discount_mon_open_min1 = $_POST['restaurant_discount_mon_open_min'];
   $restaurant_discount_mon_open_am1 = $_POST['restaurant_discount_mon_open_am'];
    $restaurant_discount_mon_close_hr1 = $_POST['restaurant_discount_mon_close_hr'];
  $restaurant_discount_mon_close_min1 = $_POST['restaurant_discount_mon_close_min'];
   $restaurant_discount_mon_open_pm1 = $_POST['restaurant_discount_mon_open_pm'];
   }
   
   if($_POST['restaurant_discount_tue_selected']!=''){
   $restaurant_discount_tue_selected1 = $_POST['restaurant_discount_tue_selected'];
  $restaurant_discount_tue_open_hr1 = $_POST['restaurant_discount_tue_open_hr'];
   $restaurant_discount_tue_open_min1 = $_POST['restaurant_discount_tue_open_min'];
   $restaurant_discount_tue_open_am1 = $_POST['restaurant_discount_tue_open_am'];
    $restaurant_discount_tue_close_hr1 = $_POST['restaurant_discount_tue_close_hr'];
  $restaurant_discount_tue_close_min1 = $_POST['restaurant_discount_tue_close_min'];
   $restaurant_discount_tue_open_pm1 = $_POST['restaurant_discount_tue_open_pm'];
   }
   
  if($_POST['restaurant_discount_wed_selected']!=''){ 
    $restaurant_discount_wed_selected1 = $_POST['restaurant_discount_wed_selected'];
  $restaurant_discount_wed_open_hr1 = $_POST['restaurant_discount_wed_open_hr'];
   $restaurant_discount_wed_open_min1 = $_POST['restaurant_discount_wed_open_min'];
   $restaurant_discount_wed_open_am1 = $_POST['restaurant_discount_wed_open_am'];
    $restaurant_discount_wed_close_hr1 = $_POST['restaurant_discount_wed_close_hr'];
  $restaurant_discount_wed_close_min1 = $_POST['restaurant_discount_wed_close_min'];
   $restaurant_discount_wed_open_pm1 = $_POST['restaurant_discount_wed_open_pm'];
   }
   
   if($_POST['restaurant_discount_thu_selected']!=''){
    $restaurant_discount_thu_selected1 = $_POST['restaurant_discount_thu_selected'];
  $restaurant_discount_thu_open_hr1 = $_POST['restaurant_discount_thu_open_hr'];
   $restaurant_discount_thu_open_min1 = $_POST['restaurant_discount_thu_open_min'];
   $restaurant_discount_thu_open_am1 = $_POST['restaurant_discount_thu_open_am'];
    $restaurant_discount_thu_close_hr1 = $_POST['restaurant_discount_thu_close_hr'];
  $restaurant_discount_thu_close_min1 = $_POST['restaurant_discount_thu_close_min'];
   $restaurant_discount_thu_open_pm1 = $_POST['restaurant_discount_thu_open_pm'];
   }
   
   if($_POST['restaurant_discount_fri_selected']!=''){
    $restaurant_discount_fri_selected1 = $_POST['restaurant_discount_fri_selected'];
  $restaurant_discount_fri_open_hr1 = $_POST['restaurant_discount_fri_open_hr'];
   $restaurant_discount_fri_open_min1 = $_POST['restaurant_discount_fri_open_min'];
   $restaurant_discount_fri_open_am1 = $_POST['restaurant_discount_fri_open_am'];
    $restaurant_discount_fri_close_hr1 = $_POST['restaurant_discount_fri_close_hr'];
  $restaurant_discount_fri_close_min1 = $_POST['restaurant_discount_fri_close_min'];
   $restaurant_discount_fri_open_pm1 = $_POST['restaurant_discount_fri_open_pm'];
   }
   
   if($_POST['restaurant_discount_sat_selected']!='')
   {
    $restaurant_discount_sat_selected1 = $_POST['restaurant_discount_sat_selected'];
  $restaurant_discount_sat_open_hr1 = $_POST['restaurant_discount_sat_open_hr'];
   $restaurant_discount_sat_open_min1 = $_POST['restaurant_discount_sat_open_min'];
   $restaurant_discount_sat_open_am1 = $_POST['restaurant_discount_sat_open_am'];
    $restaurant_discount_sat_close_hr1 = $_POST['restaurant_discount_sat_close_hr'];
  $restaurant_discount_sat_close_min1 = $_POST['restaurant_discount_sat_close_min'];
   $restaurant_discount_sat_open_pm1 = $_POST['restaurant_discount_sat_open_pm'];
   }
   
   if($_POST['restaurant_discount_sun_selected']!='')
   {
    $restaurant_discount_sun_selected1 = $_POST['restaurant_discount_sun_selected'];
  $restaurant_discount_sun_open_hr1 = $_POST['restaurant_discount_sun_open_hr'];
   $restaurant_discount_sun_open_min1 = $_POST['restaurant_discount_sun_open_min'];
   $restaurant_discount_sun_open_am1 = $_POST['restaurant_discount_sun_open_am'];
    $restaurant_discount_sun_close_hr1 = $_POST['restaurant_discount_sun_close_hr'];
  $restaurant_discount_sun_close_min1 = $_POST['restaurant_discount_sun_close_min'];
   $restaurant_discount_sun_open_pm1 = $_POST['restaurant_discount_sun_open_pm'];
   } 
   
     $OrderDiscountType = $_POST['OrderDiscountType'];
	  if( $_POST['OrderDiscountmenuCategory']!=''){
	  $OrderDiscountmenuCategory = implode(',',$_POST['OrderDiscountmenuCategory']);
	  $id_array = $_POST['OrderDiscountmenuCategory']; // return array
	$id_count = count($_POST['OrderDiscountmenuCategory']); // count array
	for($i=0; $i <$id_count; $i++) {
	$id = $id_array[$i];
$PizzaManinMenuQuery=mysql_query("update tbl_restaurantMainMenuItem set OrderDiscountmenuCategory='1' where id='$id'");
	  }
	  }
	  
	  
	  if($_POST['restaurant_discount_timeinterval_open_hr']!=''){
  $restaurant_discount_timeinterval_open_hr = $_POST['restaurant_discount_timeinterval_open_hr'];
  $restaurant_discount_timeinterval_open_min = $_POST['restaurant_discount_timeinterval_open_min'];
   $restaurant_discount_timeinterval_open_am = $_POST['restaurant_discount_timeinterval_open_am'];
    $restaurant_discount_timeinterval_close_hr = $_POST['restaurant_discount_timeinterval_close_hr'];
  $restaurant_discount_timeinterval_close_min = $_POST['restaurant_discount_timeinterval_close_min'];
   $restaurant_discount_timeinterval_open_pm = $_POST['restaurant_discount_timeinterval_open_pm'];
   }
	 
	$restaurant_state = $_POST['restaurant_state'];
   $restaurant_city = $_POST['restaurant_city'];  
	
  $CuisineInsert = $db->storeRestaurantOffer($restaurant_id,$RestaurantoffrType,$RestaurantOfferPrice,$RestaurantOfferStartPrice,$OrderDiscountshow,$RestaurantOfferStartDate,$RestaurantOfferEndDate,$RestaurantOfferDescription,$restaurant_discount_mon_selected1,$restaurant_discount_mon_open_hr1,$restaurant_discount_mon_open_min1,$restaurant_discount_mon_open_am1,$restaurant_discount_mon_close_hr1,$restaurant_discount_mon_close_min1,$restaurant_discount_mon_open_pm1,$restaurant_discount_tue_selected1,$restaurant_discount_tue_open_hr1,$restaurant_discount_tue_open_min1,$restaurant_discount_tue_open_am1,$restaurant_discount_tue_close_hr1,$restaurant_discount_tue_close_min1,$restaurant_discount_tue_open_pm1,$restaurant_discount_wed_selected1,$restaurant_discount_wed_open_hr1,$restaurant_discount_wed_open_min1,$restaurant_discount_wed_open_am1,$restaurant_discount_wed_close_hr1,$restaurant_discount_wed_close_min1,$restaurant_discount_wed_open_pm1,$restaurant_discount_thu_selected1,$restaurant_discount_thu_open_hr1,$restaurant_discount_thu_open_min1,$restaurant_discount_thu_open_am1,$restaurant_discount_thu_close_hr1,$restaurant_discount_thu_close_min1,$restaurant_discount_thu_open_pm1,$restaurant_discount_fri_selected1,$restaurant_discount_fri_open_hr1,$restaurant_discount_fri_open_min1,$restaurant_discount_fri_open_am1,$restaurant_discount_fri_close_hr1,$restaurant_discount_fri_close_min1,$restaurant_discount_fri_open_pm1,$restaurant_discount_sat_selected1,$restaurant_discount_sat_open_hr1,$restaurant_discount_sat_open_min1,$restaurant_discount_sat_open_am1,$restaurant_discount_sat_close_hr1,$restaurant_discount_sat_close_min1,$restaurant_discount_sat_open_pm1,$restaurant_discount_sun_selected1,$restaurant_discount_sun_open_hr1,$restaurant_discount_sun_open_min1,$restaurant_discount_sun_open_am1,$restaurant_discount_sun_close_hr1,$restaurant_discount_sun_close_min1,$restaurant_discount_sun_open_pm1,$OrderDiscountType,$restaurant_discount_timeinterval_open_hr, $restaurant_discount_timeinterval_open_min,$restaurant_discount_timeinterval_open_am,$restaurant_discount_timeinterval_close_hr,$restaurant_discount_timeinterval_close_min,$restaurant_discount_timeinterval_open_pm,$OrderDiscountmenuCategory,$restaurant_state,$restaurant_city,$topDiscount);
  if($CuisineInsert)
  {
 header("location:add_restaurant_offer.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_offer.php?error=1");
  }
}
if($_GET['tag']=='ResOfferEdit') {
  $restaurant_id = $_POST['restaurant_id'];
    $RestaurantoffrType = $_POST['RestaurantoffrType'];
	$RestaurantOfferPrice = $_POST['RestaurantOfferPrice'];
	 $RestaurantOfferStartDate = $_POST['RestaurantOfferStartDate'];
	  $RestaurantOfferEndDate = $_POST['RestaurantOfferEndDate'];
	  $RestaurantOfferStartPrice = $_POST['RestaurantOfferStartPrice'];
	  $OrderDiscountshow = $_POST['OrderDiscountshow'];
	  $RestaurantOfferDescription = $_POST['RestaurantOfferDescription'];
	  if($_POST['restaurant_discount_mon_selected']!=''){
  $restaurant_discount_mon_selected1 = $_POST['restaurant_discount_mon_selected'];
  $restaurant_discount_mon_open_hr1 = $_POST['restaurant_discount_mon_open_hr'];
   $restaurant_discount_mon_open_min1 = $_POST['restaurant_discount_mon_open_min'];
   $restaurant_discount_mon_open_am1 = $_POST['restaurant_discount_mon_open_am'];
    $restaurant_discount_mon_close_hr1 = $_POST['restaurant_discount_mon_close_hr'];
  $restaurant_discount_mon_close_min1 = $_POST['restaurant_discount_mon_close_min'];
   $restaurant_discount_mon_open_pm1 = $_POST['restaurant_discount_mon_open_pm'];
   }
   
   if($_POST['restaurant_discount_tue_selected']!=''){
   $restaurant_discount_tue_selected1 = $_POST['restaurant_discount_tue_selected'];
  $restaurant_discount_tue_open_hr1 = $_POST['restaurant_discount_tue_open_hr'];
   $restaurant_discount_tue_open_min1 = $_POST['restaurant_discount_tue_open_min'];
   $restaurant_discount_tue_open_am1 = $_POST['restaurant_discount_tue_open_am'];
    $restaurant_discount_tue_close_hr1 = $_POST['restaurant_discount_tue_close_hr'];
  $restaurant_discount_tue_close_min1 = $_POST['restaurant_discount_tue_close_min'];
   $restaurant_discount_tue_open_pm1 = $_POST['restaurant_discount_tue_open_pm'];
   }
   
  if($_POST['restaurant_discount_wed_selected']!=''){ 
    $restaurant_discount_wed_selected1 = $_POST['restaurant_discount_wed_selected'];
  $restaurant_discount_wed_open_hr1 = $_POST['restaurant_discount_wed_open_hr'];
   $restaurant_discount_wed_open_min1 = $_POST['restaurant_discount_wed_open_min'];
   $restaurant_discount_wed_open_am1 = $_POST['restaurant_discount_wed_open_am'];
    $restaurant_discount_wed_close_hr1 = $_POST['restaurant_discount_wed_close_hr'];
  $restaurant_discount_wed_close_min1 = $_POST['restaurant_discount_wed_close_min'];
   $restaurant_discount_wed_open_pm1 = $_POST['restaurant_discount_wed_open_pm'];
   }
   
   if($_POST['restaurant_discount_thu_selected']!=''){
    $restaurant_discount_thu_selected1 = $_POST['restaurant_discount_thu_selected'];
  $restaurant_discount_thu_open_hr1 = $_POST['restaurant_discount_thu_open_hr'];
   $restaurant_discount_thu_open_min1 = $_POST['restaurant_discount_thu_open_min'];
   $restaurant_discount_thu_open_am1 = $_POST['restaurant_discount_thu_open_am'];
    $restaurant_discount_thu_close_hr1 = $_POST['restaurant_discount_thu_close_hr'];
  $restaurant_discount_thu_close_min1 = $_POST['restaurant_discount_thu_close_min'];
   $restaurant_discount_thu_open_pm1 = $_POST['restaurant_discount_thu_open_pm'];
   }
   
   if($_POST['restaurant_discount_fri_selected']!=''){
    $restaurant_discount_fri_selected1 = $_POST['restaurant_discount_fri_selected'];
  $restaurant_discount_fri_open_hr1 = $_POST['restaurant_discount_fri_open_hr'];
   $restaurant_discount_fri_open_min1 = $_POST['restaurant_discount_fri_open_min'];
   $restaurant_discount_fri_open_am1 = $_POST['restaurant_discount_fri_open_am'];
    $restaurant_discount_fri_close_hr1 = $_POST['restaurant_discount_fri_close_hr'];
  $restaurant_discount_fri_close_min1 = $_POST['restaurant_discount_fri_close_min'];
   $restaurant_discount_fri_open_pm1 = $_POST['restaurant_discount_fri_open_pm'];
   }
   
   if($_POST['restaurant_discount_sat_selected']!='')
   {
    $restaurant_discount_sat_selected1 = $_POST['restaurant_discount_sat_selected'];
  $restaurant_discount_sat_open_hr1 = $_POST['restaurant_discount_sat_open_hr'];
   $restaurant_discount_sat_open_min1 = $_POST['restaurant_discount_sat_open_min'];
   $restaurant_discount_sat_open_am1 = $_POST['restaurant_discount_sat_open_am'];
    $restaurant_discount_sat_close_hr1 = $_POST['restaurant_discount_sat_close_hr'];
  $restaurant_discount_sat_close_min1 = $_POST['restaurant_discount_sat_close_min'];
   $restaurant_discount_sat_open_pm1 = $_POST['restaurant_discount_sat_open_pm'];
   }
   
   if($_POST['restaurant_discount_sun_selected']!='')
   {
    $restaurant_discount_sun_selected1 = $_POST['restaurant_discount_sun_selected'];
  $restaurant_discount_sun_open_hr1 = $_POST['restaurant_discount_sun_open_hr'];
   $restaurant_discount_sun_open_min1 = $_POST['restaurant_discount_sun_open_min'];
   $restaurant_discount_sun_open_am1 = $_POST['restaurant_discount_sun_open_am'];
    $restaurant_discount_sun_close_hr1 = $_POST['restaurant_discount_sun_close_hr'];
  $restaurant_discount_sun_close_min1 = $_POST['restaurant_discount_sun_close_min'];
   $restaurant_discount_sun_open_pm1 = $_POST['restaurant_discount_sun_open_pm'];
   } 
 
  $OrderDiscountType = $_POST['OrderDiscountType'];
	  if( $_POST['OrderDiscountmenuCategory']!=''){
	  $OrderDiscountmenuCategory = implode(',',$_POST['OrderDiscountmenuCategory']);
	  $id_array = $_POST['OrderDiscountmenuCategory']; // return array
	$id_count = count($_POST['OrderDiscountmenuCategory']); // count array
	for($i=0; $i <$id_count; $i++) {
	$id = $id_array[$i];
$PizzaManinMenuQuery=mysql_query("update tbl_restaurantMainMenuItem set OrderDiscountmenuCategory='1' where id='$id'");
	  }
	  }
	  
	  
	  if($_POST['restaurant_discount_timeinterval_open_hr']!=''){
  $restaurant_discount_timeinterval_open_hr = $_POST['restaurant_discount_timeinterval_open_hr'];
  $restaurant_discount_timeinterval_open_min = $_POST['restaurant_discount_timeinterval_open_min'];
   $restaurant_discount_timeinterval_open_am = $_POST['restaurant_discount_timeinterval_open_am'];
    $restaurant_discount_timeinterval_close_hr = $_POST['restaurant_discount_timeinterval_close_hr'];
  $restaurant_discount_timeinterval_close_min = $_POST['restaurant_discount_timeinterval_close_min'];
   $restaurant_discount_timeinterval_open_pm = $_POST['restaurant_discount_timeinterval_open_pm'];
   }  
   $restaurant_state = $_POST['restaurant_state'];
   $restaurant_city = $_POST['restaurant_city'];  
    $topDiscount = $_POST['topDiscount']; 
$CuisineInsert = $db->storeUpdateRestaurantOffer($restaurant_id,$RestaurantoffrType,$RestaurantOfferPrice,$RestaurantOfferStartPrice,$OrderDiscountshow,$RestaurantOfferStartDate,$RestaurantOfferEndDate,$RestaurantOfferDescription,$restaurant_discount_mon_selected1,$restaurant_discount_mon_open_hr1,$restaurant_discount_mon_open_min1,$restaurant_discount_mon_open_am1,$restaurant_discount_mon_close_hr1,$restaurant_discount_mon_close_min1,$restaurant_discount_mon_open_pm1,$restaurant_discount_tue_selected1,$restaurant_discount_tue_open_hr1,$restaurant_discount_tue_open_min1,$restaurant_discount_tue_open_am1,$restaurant_discount_tue_close_hr1,$restaurant_discount_tue_close_min1,$restaurant_discount_tue_open_pm1,$restaurant_discount_wed_selected1,$restaurant_discount_wed_open_hr1,$restaurant_discount_wed_open_min1,$restaurant_discount_wed_open_am1,$restaurant_discount_wed_close_hr1,$restaurant_discount_wed_close_min1,$restaurant_discount_wed_open_pm1,$restaurant_discount_thu_selected1,$restaurant_discount_thu_open_hr1,$restaurant_discount_thu_open_min1,$restaurant_discount_thu_open_am1,$restaurant_discount_thu_close_hr1,$restaurant_discount_thu_close_min1,$restaurant_discount_thu_open_pm1,$restaurant_discount_fri_selected1,$restaurant_discount_fri_open_hr1,$restaurant_discount_fri_open_min1,$restaurant_discount_fri_open_am1,$restaurant_discount_fri_close_hr1,$restaurant_discount_fri_close_min1,$restaurant_discount_fri_open_pm1,$restaurant_discount_sat_selected1,$restaurant_discount_sat_open_hr1,$restaurant_discount_sat_open_min1,$restaurant_discount_sat_open_am1,$restaurant_discount_sat_close_hr1,$restaurant_discount_sat_close_min1,$restaurant_discount_sat_open_pm1,$restaurant_discount_sun_selected1,$restaurant_discount_sun_open_hr1,$restaurant_discount_sun_open_min1,$restaurant_discount_sun_open_am1,$restaurant_discount_sun_close_hr1,$restaurant_discount_sun_close_min1,$restaurant_discount_sun_open_pm1,$OrderDiscountType,$restaurant_discount_timeinterval_open_hr, $restaurant_discount_timeinterval_open_min,$restaurant_discount_timeinterval_open_am,$restaurant_discount_timeinterval_close_hr,$restaurant_discount_timeinterval_close_min,$restaurant_discount_timeinterval_open_pm,$OrderDiscountmenuCategory,$restaurant_state,$restaurant_city,$topDiscount,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_restaurant_offer.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_offer.php?emsg=0");
  }
}
if($_GET['tag']=='ResOfferDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantOffer","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_offer.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_offer.php?dmsg=0");
  }

}

if($_GET['tag']=='ResOfferActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantOffer","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_offer.php?amsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_offer.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT OFFER++++++++++++++++++++++++++++//




//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT EVENT++++++++++++++++++++++++++++//
if($_GET['tag']=='ResEventAdd') {
    // get tag
   $RestaurantEventID = $_POST['RestaurantEventID'];
    $RestaurantEventName = $_POST['RestaurantEventName'];
	 $RestaurantEventStartDate = $_POST['RestaurantEventStartDate'];
	  $RestaurantEventStartTime = $_POST['RestaurantEventStartTime'];
	  $RestaurantEventEndDate = $_POST['RestaurantEventEndDate'];
	   $RestaurantEventEndTime = $_POST['RestaurantEventEndTime'];
	  $RestaurantEventAddress = $_POST['RestaurantEventAddress'];
	  $RestaurantEventDescription = $_POST['RestaurantEventDescription'];
	  
if($_FILES['RestaurantEventImg']['name']!='')
{
$RestaurantEventImgThumb=implode(',',$_FILES['RestaurantEventImg']['name']);
for($i=0;$i<=count($_FILES['RestaurantEventImg']['name']);$i++){
if(move_uploaded_file($_FILES['RestaurantEventImg']['tmp_name'][$i],"EventImg/thumb/".$_FILES['RestaurantEventImg']['name'][$i])){
}
}
}
  
  $CuisineInsert = $db->storeRestaurantEvent($RestaurantEventID,$RestaurantEventName,$RestaurantEventStartDate,$RestaurantEventStartTime,$RestaurantEventEndDate,$RestaurantEventEndTime,$RestaurantEventAddress,$RestaurantEventDescription,$RestaurantEventImgThumb,$RestaurantEventImgThumb);
  if($CuisineInsert)
  {
  header("location:add_restaurant_event.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_event.php?error=1");
  }
}
if($_GET['tag']=='ResEventEdit') {
   $RestaurantEventID = $_POST['RestaurantEventID'];
    $RestaurantEventName = $_POST['RestaurantEventName'];
	 $RestaurantEventStartDate = $_POST['RestaurantEventStartDate'];
	  $RestaurantEventStartTime = $_POST['RestaurantEventStartTime'];
	  $RestaurantEventEndDate = $_POST['RestaurantEventEndDate'];
	   $RestaurantEventEndTime = $_POST['RestaurantEventEndTime'];
	  $RestaurantEventAddress = $_POST['RestaurantEventAddress'];
	  $RestaurantEventDescription = $_POST['RestaurantEventDescription'];
	    $image_name=$_FILES['RestaurantEventImg']['name'];
   $image_temp=$_FILES['RestaurantEventImg']['tmp_name'];
if($_FILES['RestaurantEventImg']['name']!='')
{
$RestaurantEventImgThumb=implode(',',$_FILES['RestaurantEventImg']['name']);
for($i=0;$i<=count($_FILES['RestaurantEventImg']['name']);$i++){
if(move_uploaded_file($_FILES['RestaurantEventImg']['tmp_name'][$i],"EventImg/thumb/".$_FILES['RestaurantEventImg']['name'][$i])){
}
}
}
else
{
$RestaurantEventImgThumb=$_POST['RestaurantEventImgold'];
}

$CuisineInsert = $db->storeUpdateRestaurantEvent($RestaurantEventID,$RestaurantEventName,$RestaurantEventStartDate,$RestaurantEventStartTime,$RestaurantEventEndDate,$RestaurantEventEndTime,$RestaurantEventAddress,$RestaurantEventDescription,$RestaurantEventImgThumb,$RestaurantEventImgThumb,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_restaurant_event.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_event.php?emsg=0");
  }
}
if($_GET['tag']=='ResEventDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantEvent","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_event.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_event.php?dmsg=0");
  }

}

if($_GET['tag']=='ResEventActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantEvent","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_event.php?amsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_event.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT EVENT++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE COUNTRY+++++++++++++++++++++++++//
if($_GET['tag']=='ResCountryAdd') {
    // get tag
   $countryName = $_POST['countryName'];
  $CuisineInsert = $db->storeServiceTYpe("tbl_country","countryName",$countryName);
  if($CuisineInsert)
  {
  header("location:add_country.php?msg=1");
  }
  else
  {
  header("location:add_country.php?error=1");
  }
}
if($_GET['tag']=='ResCountryEdit') {
 $countryName = $_POST['countryName'];
 $CuisineInsert = $db->storeUpdateServiceTYpe("tbl_country","countryName",$countryName,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:add_country.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_country.php?emsg=0");
  }
}
if($_GET['tag']=='ResCountryDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_country","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_country.php?dmsg=1#manage");
  			}
  			else
  			{
  			header("location:add_country.php?dmsg=0#manage");
  }

}

if($_GET['tag']=='ResCountryActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_country","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_country.php?amsg=1#manage");
  			}
  			else
  			{
  			header("location:add_country.php?amsg=0#manage");
  }

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE COUNTRY+++++++++++++++++++++++++++++++++++++++//



//++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE STATE+++++++++++++++++++++++++//
if($_GET['tag']=='ResStateAdd') {
    // get tag
   $countryID = $_POST['countryID'];
   $stateName = $_POST['stateName'];
  $CuisineInsert = $db->storeAddState($countryID,$stateName);
  if($CuisineInsert)
  {
  header("location:add_state.php?msg=1");
  }
  else
  {
  header("location:add_state.php?error=1");
  }
}
if($_GET['tag']=='ResStateEdit') {
  $countryID = $_POST['countryID'];
  $stateName = $_POST['stateName'];
 $CuisineInsert = $db->storeUpdateState($countryID,$stateName,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:add_state.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_state.php?emsg=0");
  }
}
if($_GET['tag']=='ResStateDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_state","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_state.php?dmsg=1");
  			}
  			else
  			{
  			header("location:add_state.php?dmsg=0");
  }

}

if($_GET['tag']=='ResStateActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_state","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_state.php?amsg=1");
  			}
  			else
  			{
  			header("location:add_state.php?amsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE STATE+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE CITY+++++++++++++++++++++++++//
if($_GET['tag']=='ResCityAdd') {
    // get tag
   $countryID = $_POST['countryID'];
   $stateID = $_POST['stateID'];
   $cityName = $_POST['cityName'];
  $CuisineInsert = $db->storeAddCity($countryID,$stateID,$cityName);
  if($CuisineInsert)
  {
  header("location:add_city.php?msg=1");
  }
  else
  {
  header("location:add_city.php?error=1");
  }
}
if($_GET['tag']=='ResCityEdit') {
  $countryID = $_POST['countryID'];
   $stateID = $_POST['stateID'];
   $cityName = $_POST['cityName'];
 $CuisineInsert = $db->storeUpdateCity($countryID,$stateID,$cityName,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:add_city.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_city.php?emsg=0");
  }
}
if($_GET['tag']=='ResCityDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_city","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_city.php?dmsg=1");
  			}
  			else
  			{
  			header("location:add_city.php?dmsg=0");
  }

}

if($_GET['tag']=='ResCityActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_city","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_city.php?amsg=1");
  			}
  			else
  			{
  			header("location:add_city.php?amsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE CITY+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++ Update About Us+++++++++++++++++++++++++//
if($_GET['tag']=='AboutUsEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_aboutUS","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_about.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_about.php?emsg=0");
  }
}


//++++++++++++++++++++++++++++ Update About Us+++++++++++++++++++++++++//
if($_GET['tag']=='SecurePaymentEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_securePayment","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_online_payment.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_online_payment.php?emsg=0");
  }
}




//++++++++++++++++++++++++++++++++++++++ END Update About Us+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update How To works+++++++++++++++++++++++++//
if($_GET['tag']=='HowToworksEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_HowToWorks","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_howtowork.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_howtowork.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update How To works+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++ Update Restaurant Owner Setting+++++++++++++++++++++++++//
if($_GET['tag']=='OwnerSettingEdit') {
  $restUpdatePermission = $_POST['restUpdatePermission'];
  $MenuCatUpdatePermission = $_POST['MenuCatUpdatePermission'];
   $FoodItemUpdatePermission = $_POST['FoodItemUpdatePermission'];
   $DeliveryAreaUpdatePermission = $_POST['DeliveryAreaUpdatePermission'];
   $TimeTableUpdatePermission = $_POST['TimeTableUpdatePermission'];
  $EmpUpdatePermission = $_POST['EmpUpdatePermission'];
   $DeliveryBoyUpdatePermission = $_POST['DeliveryBoyUpdatePermission'];
   $GalleryUpdatePermission = $_POST['GalleryUpdatePermission'];
   
    $OfferUpdatePermission = $_POST['OfferUpdatePermission'];
  $EventUpdatePermission = $_POST['EventUpdatePermission'];
   $DealsUpdatePermission = $_POST['DealsUpdatePermission'];
   $OrderReportUpdatePermission = $_POST['OrderReportUpdatePermission'];
   
 $CuisineInsert = $db->storeUpdateOenerSetting
($restUpdatePermission,$MenuCatUpdatePermission,$FoodItemUpdatePermission,$DeliveryAreaUpdatePermission,$TimeTableUpdatePermission,$EmpUpdatePermission,$DeliveryBoyUpdatePermission,$GalleryUpdatePermission,$OfferUpdatePermission,$EventUpdatePermission,$DealsUpdatePermission,$OrderReportUpdatePermission,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:restaurant_owner_setting.php?emsg=1");
  			}
  			else
  			{
  			header("location:restaurant_owner_setting.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant Owner Setting+++++++++++++++++++++++++++++++++++++++//



//++++++++++++++++++++++++++++ Update Press+++++++++++++++++++++++++//
if($_GET['tag']=='PressEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_Press","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_press.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_press.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Press+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update Service Gaurantee+++++++++++++++++++++++++//
if($_GET['tag']=='ServiceGurEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_ServiceGaurantee","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:service_guarantee.php?emsg=1");
  			}
  			else
  			{
  			header("location:service_guarantee.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Service Gaurantee+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update Refund Gaurantee+++++++++++++++++++++++++//
if($_GET['tag']=='RefundEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_RefundGaurantee","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:refund_guarantee.php?emsg=1");
  			}
  			else
  			{
  			header("location:refund_guarantee.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Refund Gaurantee+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++ Update Career Us+++++++++++++++++++++++++//
if($_GET['tag']=='CareerEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_Career","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_career.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_career.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Career Us+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++ Update Privacy+++++++++++++++++++++++++//
if($_GET['tag']=='PrivacyEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_Privacy","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_privacy.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_privacy.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Privacy+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update Terms & Condidtions+++++++++++++++++++++++++//
if($_GET['tag']=='TermsEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_Terms","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_termsandcondition.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_termsandcondition.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Terms & Condidtions+++++++++++++++++++++++++++++++++++++++//



//++++++++++++++++++++++++++++ Update cms declaimer+++++++++++++++++++++++++//
if($_GET['tag']=='DeclaimerEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_Desclaimer","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:cms_declaimer.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_declaimer.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update cms declaimer+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update cms how_to_use_cookie+++++++++++++++++++++++++//
if($_GET['tag']=='CookieEdit') {
  $content_description = $_POST['content_description'];
  $content_TitleMeta = $_POST['content_TitleMeta'];
   $content_KeywordMeta = $_POST['content_KeywordMeta'];
   $content_DescriptionMeta = $_POST['content_DescriptionMeta'];
 $CuisineInsert = $db->storeUpdateContent("tbl_HowUseCookie","content_description",$content_description,"content_TitleMeta",$content_TitleMeta,"content_KeywordMeta",$content_KeywordMeta,"content_DescriptionMeta",$content_DescriptionMeta,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:how_to_use_cookie.php?emsg=1");
  			}
  			else
  			{
  			header("location:how_to_use_cookie.php?emsg=0");
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update how_to_use_cookie+++++++++++++++++++++++++++++++++++++++//



//++++++++++++++++++++++++++++ ADD/Update FAQ+++++++++++++++++++++++++//
if($_GET['tag']=='FAQAdd') {
  $faq_question = $_POST['faq_question'];
  $faq_answer = $_POST['faq_answer'];
  $ViewPostion = $_POST['ViewPostion'];
 $FaqInsertQuery = $db->storeAddFaq($faq_question,$faq_answer,$ViewPostion);
 			if($FaqInsertQuery)
 			{
  			header("location:cms_faq.php?emsg=1");
  			}
  			else
  			{
  			header("location:cms_faq.php?emsg=0");
  }
}

if($_GET['tag']=='FAQEdit') {
  $faq_question = $_POST['faq_question'];
  $faq_answer = $_POST['faq_answer'];
  $ViewPostion = $_POST['ViewPostion'];
 $FAQUpdateQuery = $db->storeUpdateFaq($faq_question,$faq_answer,$ViewPostion,$_GET['eid']);
 			if($FAQUpdateQuery)
 			{
  			header("location:manageFaq.php?emsg=1");
  			}
  			else
  			{
  			header("location:manageFaq.php?emsg=0");
  }
}

if($_GET['tag']=='FAQDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_FAQ","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manageFaq.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manageFaq.php?dmsg=0");
  }

}

if($_GET['tag']=='FAQActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_FAQ","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manageFaq.php?amsg=1");
  			}
  			else
  			{
  			header("location:manageFaq.php?amsg=0");
  }

}


//++++++++++++++++++++++++++++++++++++++ END ADD/Update FAQ+++++++++++++++++++++++++++++++++++++++//

//++++++++++++++++++++++++++++++++++++++ Start Email Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='EmailSettingEdit') {
  $supportemail = $_POST['supportemail'];
  $registrationemail = $_POST['registrationemail'];
   $contactusemail = $_POST['contactusemail'];
  $orderemail = $_POST['orderemail'];
   $invoiceemail = $_POST['invoiceemail'];
  $bookingemail = $_POST['bookingemail'];
 $EmailUpdateQuery = $db->storeUpdateEmailSetting($supportemail,$registrationemail,$contactusemail,$orderemail,$invoiceemail,$bookingemail,$_GET['eid']);
 			if($EmailUpdateQuery)
 			{
  			header("location:email_setting.php?emsg=1");
  			}
  			else
  			{
  			header("location:email_setting.php?emsg=0");
  }
}
//++++++++++++++++++++++++++++++++++++++ END Email Setting Update+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++++++++++++ Start Icon Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='IconSettingEdit') {
  $CuisineIconThumbSW = $_POST['CuisineIconThumbSW'];
  $CuisineIconThumbSH = $_POST['CuisineIconThumbSH'];
  $CuisineIconThumbLW = $_POST['CuisineIconThumbLW'];
  $CuisineIconThumbLH = $_POST['CuisineIconThumbLH'];
  $MenuIconThumbSW = $_POST['MenuIconThumbSW'];
  $MenuIconThumbSH = $_POST['MenuIconThumbSH'];
  $MenuIconThumbLW = $_POST['MenuIconThumbLW'];
  $MenuIconThumbLH = $_POST['MenuIconThumbLH'];
  $RestLogoThumbSW = $_POST['RestLogoThumbSW'];
  $RestLogoThumbSH = $_POST['RestLogoThumbSH'];
  $RestLogoThumbLW = $_POST['RestLogoThumbLW'];
  $RestLogoThumbLH = $_POST['RestLogoThumbLH'];
  $FacilitiesThumbSW = $_POST['FacilitiesThumbSW'];
  $FacilitiesThumbSH = $_POST['FacilitiesThumbSH'];
  $PaymentThumbW = $_POST['PaymentThumbW'];
  $PaymentThumbH = $_POST['PaymentThumbH'];
  $SocialIconThumbW = $_POST['SocialIconThumbW'];
  $SocialIconThumbH = $_POST['SocialIconThumbH'];
   $AdminloginId = $_SESSION['AdminloginId'];
 $IconUpdateQuery = $db->storeUpdateIconSetting($CuisineIconThumbSW,$CuisineIconThumbSH,$CuisineIconThumbLW,$CuisineIconThumbLH,$MenuIconThumbSW,$MenuIconThumbSH,$MenuIconThumbLW,$MenuIconThumbLH,$RestLogoThumbSW,$RestLogoThumbSH,$RestLogoThumbLW,$RestLogoThumbLH,$FacilitiesThumbSW,$FacilitiesThumbSH,$PaymentThumbW,$PaymentThumbH,$SocialIconThumbW,$SocialIconThumbH,$AdminloginId,$_GET['eid']);
 			if($IconUpdateQuery)
 			{
  			header("location:icon_setting.php?emsg=1");
  			}
  			else
  			{
  			header("location:icon_setting.php?emsg=0");
  }
}
//++++++++++++++++++++++++++++++++++++++ END Email Setting Update+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++++++++++++ Start Order Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='OrderSettingEdit') {
  $RestOrderStatusAccepted = $_POST['RestOrderStatusAccepted'];
  $RestOrderStatusTransit = $_POST['RestOrderStatusTransit'];
   $RestOrderStatusDelivered = $_POST['RestOrderStatusDelivered'];
  $RestOrderStatusComplete = $_POST['RestOrderStatusComplete'];
   $RestOrderStatusCancled = $_POST['RestOrderStatusCancled'];
 $EmailUpdateQuery = $db->storeUpdateOrderSetting
($RestOrderStatusAccepted,$RestOrderStatusTransit,$RestOrderStatusDelivered,$RestOrderStatusComplete,$RestOrderStatusCancled,$_GET['eid']);
 			if($EmailUpdateQuery)
 			{
  			header("location:orderstatussetting.php?emsg=1");
  			}
  			else
  			{
  			header("location:orderstatussetting.php?emsg=0");
  }
}
//++++++++++++++++++++++++++++++++++++++ END Order Setting Update+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++++++++++++ Start Payment Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='paymentSettingAdd') {
  $restPaymentMethodName = $_POST['restPaymentMethodName'];
 $image_name=$_FILES['restPaymentMethodIcon']['name'];
 $image_temp=$_FILES['restPaymentMethodIcon']['tmp_name'];
$directory="PaymentIcon";
$kp=ImageUpload($image_name,$image_temp,$directory,50,50);
ImageUpload($image_name,$image_temp,$directory,50,50);
  $PaymentSettingQuery = $db->storePaySocialSetting("tbl_pyamentSetting","restPaymentMethodName",$restPaymentMethodName,"restPaymentMethodIcon",$kp); 			
         if($PaymentSettingQuery)
 			{
  			header("location:payment_setting.php?msg=1");
  			}
  			else
  			{
  			header("location:payment_setting.php?msg=0");
  }
}


if($_GET['tag']=='paymentSettingEdit') {
  $restPaymentMethodName = $_POST['restPaymentMethodName'];
 $image_name=$_FILES['restPaymentMethodIcon']['name'];
 $image_temp=$_FILES['restPaymentMethodIcon']['tmp_name'];
$directory="PaymentIcon";
if($image_name!=''){
$kp=ImageUpload($image_name,$image_temp,$directory,100,100);
ImageUpload($image_name,$image_temp,$directory,100,100);
}
else
{
$kp=$_POST['restPaymentMethodIconold'];
}
  $PaymentSettingQuery = $db->storeUpdatePaySocialSetting("tbl_pyamentSetting","restPaymentMethodName",$restPaymentMethodName,"restPaymentMethodIcon",$kp,$_GET['eid']); 			
         if($PaymentSettingQuery)
 			{
  			header("location:payment_setting.php?emsg=1");
  			}
  			else
  			{
  			header("location:payment_setting.php?emsg=0");
  }
}

if($_GET['tag']=='PaymentSettingDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_pyamentSetting","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:payment_setting.php?dmsg=1");
  			}
  			else
  			{
  			header("location:payment_setting.php?dmsg=0");
  }

}

if($_GET['tag']=='PaymentSettingActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_pyamentSetting","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:payment_setting.php?amsg=1");
  			}
  			else
  			{
  			header("location:payment_setting.php?amsg=0");
  }

}
//++++++++++++++++++++++++++++++++++++++ END Payment Setting Update+++++++++++++++++++++++++++++++++++++++//



// Restaurant Offer Type


//++++++++++++++++++++++++++++++++++++++ Start Payment Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='offerTypeAdd') {
  $restofferTypeName = $_POST['restofferTypeName'];
 if($_FILES['restofferTypeIcon']['name']!='')
 { 
$kp=uniqid().$_FILES['restofferTypeIcon']['name'];
move_uploaded_file($_FILES['restofferTypeIcon']['tmp_name'],"PaymentIcon/".$kp);
}
  $PaymentSettingQuery = $db->storePaySocialSetting("tbl_restaurantOfferType","restofferTypeName",$restofferTypeName,"restofferTypeIcon",$kp); 			
         if($PaymentSettingQuery)
 			{
  			header("location:create_restaurantOfferType.php?msg=1");
  			}
  			else
  			{
  			header("location:create_restaurantOfferType.php?msg=0");
  }
}


if($_GET['tag']=='offerTypeEdit') {
  $restofferTypeName = $_POST['restofferTypeName'];
 if($_FILES['restofferTypeIcon']['name']!='')
 { 
$kp=uniqid().$_FILES['restofferTypeIcon']['name'];
move_uploaded_file($_FILES['restofferTypeIcon']['tmp_name'],"PaymentIcon/".$kp);
}
else
{
$kp=$_POST['restofferTypeIconold'];
}
  $PaymentSettingQuery = $db->storeUpdatePaySocialSetting("tbl_restaurantOfferType","restofferTypeName",$restofferTypeName,"restofferTypeIcon",$kp,$_GET['eid']); 			
         if($PaymentSettingQuery)
 			{
  			header("location:create_restaurantOfferType.php?emsg=1");
  			}
  			else
  			{
  			header("location:create_restaurantOfferType.php?emsg=0");
  }
}

if($_GET['tag']=='offerTypeDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantOfferType","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:create_restaurantOfferType.php?dmsg=1");
  			}
  			else
  			{
  			header("location:create_restaurantOfferType.php?dmsg=0");
  }

}

if($_GET['tag']=='offerTypeActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantOfferType","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:create_restaurantOfferType.php?amsg=1");
  			}
  			else
  			{
  			header("location:create_restaurantOfferType.php?amsg=0");
  }

}


// ENd Here



//++++++++++++++++++++++++++++++++++++++ Start Social Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='socialSettingAdd') {
  $restSocialMediaName = $_POST['restSocialMediaName'];
 $image_name=$_FILES['restSocialMediaIcon']['name'];
 $image_temp=$_FILES['restSocialMediaIcon']['tmp_name'];
$directory="socialIcon";
$kp=ImageUpload($image_name,$image_temp,$directory,50,50);
ImageUpload($image_name,$image_temp,$directory,50,50);
  $PaymentSettingQuery = $db->storePaySocialSetting("tbl_SocialSetting","restSocialMediaName",$restSocialMediaName,"restSocialMediaIcon",$kp); 			
         if($PaymentSettingQuery)
 			{
  			header("location:social_mediaSetting.php?msg=1");
  			}
  			else
  			{
  			header("location:social_mediaSetting.php?msg=0");
  }
}


if($_GET['tag']=='socialSettingEdit') {
  $restSocialMediaName = $_POST['restSocialMediaName'];
 $image_name=$_FILES['restSocialMediaIcon']['name'];
 $image_temp=$_FILES['restSocialMediaIcon']['tmp_name'];
$directory="socialIcon";
if($image_name!=''){
$kp=ImageUpload($image_name,$image_temp,$directory,50,50);
ImageUpload($image_name,$image_temp,$directory,50,50);
}
else
{
$kp=$_POST['restSocialMediaIconold'];
}
 $PaymentSettingQuery = $db->storeUpdatePaySocialSetting("tbl_SocialSetting","restSocialMediaName",$restSocialMediaName,"restSocialMediaIcon",$kp,$_GET['eid']); 			
   
  //$PaymentSettingQuery = $db->storePaySocialSetting("tbl_SocialSetting","restSocialMediaName",$restSocialMediaName,"restSocialMediaIcon",$kp); 			
         if($PaymentSettingQuery)
 			{
  			header("location:social_mediaSetting.php?emsg=1");
  			}
  			else
  			{
  			header("location:social_mediaSetting.php?emsg=0");
  }
}


if($_GET['tag']=='socialSettingDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_SocialSetting","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:social_mediaSetting.php?dmsg=1");
  			}
  			else
  			{
  			header("location:social_mediaSetting.php?dmsg=0");
  }

}

if($_GET['tag']=='socialSettingActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_SocialSetting","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:social_mediaSetting.php?amsg=1");
  			}
  			else
  			{
  			header("location:social_mediaSetting.php?amsg=0");
  }

}
//++++++++++++++++++++++++++++++++++++++ END Social Setting Update+++++++++++++++++++++++++++++++++++++++//




//++++++++++++++++++++++++++++++++++++++ Start Site Setting Update+++++++++++++++++++++++++++++++++++++++//
if($_GET['tag']=='SiteSettingEdit') {
$website_name = $_POST['website_name'];
$website_callUsNo = $_POST['website_callUsNo'];
$image =$_FILES["imgwebsite_logo"]["name"];
$uploadedfile = $_FILES['imgwebsite_logo']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['imgwebsite_logo']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['imgwebsite_logo']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['imgwebsite_logo']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['imgwebsite_logo']['tmp_name'];
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

$newwidth1=250;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_logo=uniqid().$_FILES['imgwebsite_logo']['name'];

$filename = "sitelogo/".$website_logo;
$filename1 = "sitelogo/sitelogosmall/".$website_logo;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$website_logo=$_POST['website_logoold'];
}	



$image =$_FILES["website_favicon"]["name"];
$uploadedfile = $_FILES['website_favicon']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['website_favicon']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['website_favicon']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['website_favicon']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['website_favicon']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=20;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=20;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_favicon=uniqid().$_FILES['website_favicon']['name'];

$filename = "faviconicon/".$website_favicon;
$filename1 = "faviconicon/".$website_favicon;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$website_favicon=$_POST['website_faviconold'];
}	



/*$website_faviconimage_name=$_FILES['website_favicon']['name'];
$website_faviconimage_temp=$_FILES['website_favicon']['tmp_name'];
$website_favicondirectory="faviconicon";
if($website_faviconimage_name!=''){
$website_favicon=ImageUpload($website_faviconimage_name,$website_faviconimage_temp,$website_favicondirectory,20,20);
ImageUpload($website_faviconimage_name,$website_faviconimage_temp,$website_favicondirectory,20,20);
}
else
{
$website_favicon=$_POST['website_faviconold'];
}*/
  $website_UserPerRecord = $_POST['website_UserPerRecord'];
  $website_AdminPerRecord = $_POST['website_AdminPerRecord'];
  $website_OwnerPerRecord = $_POST['website_OwnerPerRecord'];
  $website_HeaderText = $_POST['website_HeaderText'];
  if($_POST['website_SocialMedia']!=''){
  $website_SocialMedia = implode(',',$_POST['website_SocialMedia']);
  }
  else
  {
   $website_SocialMedia =$_POST['website_SocialMediaold'];
  }
  $website_AdminName = $_POST['website_AdminName'];
  $website_AdminEmail = $_POST['website_AdminEmail'];
  $website_ContactEmail = $_POST['website_ContactEmail'];
  $website_ContactPhone = $_POST['website_ContactPhone'];
  $website_TimeZone = $_POST['website_TimeZone'];
  $website_Currency = $_POST['website_Currency'];
  $website_CurrencySymbole = $_POST['website_CurrencySymbole'];
  $website_ServiceTaxNo = $_POST['website_ServiceTaxNo'];
  $website_ServiceTaxPercentage = $_POST['website_ServiceTaxPercentage'];
  $website_OfflineStatus = $_POST['website_OfflineStatus'];
  $website_OfflineNote = $_POST['website_OfflineNote'];
  $website_Country = $_POST['website_Country'];
  $website_State = $_POST['website_State'];
  $website_City = $_POST['website_City'];
  $website_Zipcode = $_POST['website_Zipcode'];
  $website_Address = $_POST['website_Address'];
  $website_MetaTitle = $_POST['website_MetaTitle'];
  $website_MetaKeyword = $_POST['website_MetaKeyword'];
  $website_MetaDescription = $_POST['website_MetaDescription'];
  $Adminlogin_id = $_SESSION['AdminloginId'];
   $loyalityPoint = $_POST['loyalityPoint'];
   $Authorize_net_Login_Key = $_POST['Authorize_net_Login_Key'];
   $Authorize_net_Transaction_Key = $_POST['Authorize_net_Transaction_Key'];
   
   
   $twitersociallink = $_POST['twitersociallink_1'];
   $facebooksociallink = $_POST['facebooksociallink'];
   $flickrsociallink = $_POST['flickrsociallink'];
   $linksociallink = $_POST['linksociallink'];
  
   
 $SiteSettingUpdateQuery = $db->storeUpdateSiteSetting($website_name,$website_logo,$website_favicon,$website_callUsNo,$website_UserPerRecord,$website_AdminPerRecord,$website_OwnerPerRecord,$website_HeaderText,$website_SocialMedia,$website_AdminName,$website_AdminEmail,$website_ContactEmail,$website_ContactPhone,$website_TimeZone,$website_Currency,$website_CurrencySymbole,$website_ServiceTaxNo,$website_ServiceTaxPercentage,$website_OfflineStatus,$website_OfflineNote,$website_Country,$website_State,$website_City,$website_Zipcode,$website_Address,$website_MetaTitle,$website_MetaKeyword,$website_MetaDescription,$Authorize_net_Login_Key,$Authorize_net_Transaction_Key,$loyalityPoint,$Adminlogin_id,$twitersociallink,$facebooksociallink,$flickrsociallink,$linksociallink,$_GET['eid']);
 			if($SiteSettingUpdateQuery)
 			{
  			header("location:site_setting.php?emsg=1");
  			}
  			else
  			{
  			header("location:site_setting.php?emsg=0");
  }
}
//++++++++++++++++++++++++++++++++++++++ END Site Setting Update+++++++++++++++++++++++++++++++++++++++//






//++++++++++++++++++++++++++++++++++++++ Start Deliveryarea with post Update+++++++++++++++++++++++++++++++++++++++//

if($_GET['tag']=='DeliveryAdd') {

   $countryID = $_POST['countryID'];

   $stateID = $_POST['stateID'];

   $cityName = $_POST['cityName'];

   $postcode1 = $_POST['postcode1'];

   $delivery_areaName1 = $_POST['delivery_areaName1'];

   $delivery_charge1 = $_POST['delivery_charge1'];

   $minimum_order1 = $_POST['minimum_order1'];

   $shipping_charge1 = $_POST['shipping_charge1'];
   $postcodelatitude1 = $_POST['postcodelatitude1'];
   $postcodelongitude1 = $_POST['postcodelongitude1'];

   

    $postcode2 = $_POST['postcode2'];

   $delivery_areaName2 = $_POST['delivery_areaName2'];

   $delivery_charge2 = $_POST['delivery_charge2'];

   $minimum_order2 = $_POST['minimum_order2'];

   $shipping_charge2 = $_POST['shipping_charge2'];
   
    $postcodelatitude2 = $_POST['postcodelatitude2'];
   $postcodelongitude2 = $_POST['postcodelongitude2'];


   

    $postcode3 = $_POST['postcode3'];

   $delivery_areaName3 = $_POST['delivery_areaName3'];

   $delivery_charge3 = $_POST['delivery_charge3'];

   $minimum_order3 = $_POST['minimum_order3'];

   $shipping_charge3 = $_POST['shipping_charge3'];
   
   
    $postcodelatitude3 = $_POST['postcodelatitude3'];
   $postcodelongitude3 = $_POST['postcodelongitude3'];


   

    $postcode4 = $_POST['postcode4'];

   $delivery_areaName4 = $_POST['delivery_areaName4'];

   $delivery_charge4 = $_POST['delivery_charge4'];

   $minimum_order4 = $_POST['minimum_order4'];

   $shipping_charge4 = $_POST['shipping_charge4'];
   
    $postcodelatitude4 = $_POST['postcodelatitude4'];
   $postcodelongitude4 = $_POST['postcodelongitude4'];


   

    $postcode5 = $_POST['postcode5'];

   $delivery_areaName5 = $_POST['delivery_areaName5'];

   $delivery_charge5 = $_POST['delivery_charge5'];

   $minimum_order5 = $_POST['minimum_order5'];

   $shipping_charge5 = $_POST['shipping_charge5'];
   
    $postcodelatitude5 = $_POST['postcodelatitude5'];
   $postcodelongitude5 = $_POST['postcodelongitude5'];


   

   $postcode6 = $_POST['postcode6'];

   $delivery_areaName6 = $_POST['delivery_areaName6'];

   $delivery_charge6 = $_POST['delivery_charge6'];

   $minimum_order6 = $_POST['minimum_order6'];

   $shipping_charge6 = $_POST['shipping_charge6'];
   
    $postcodelatitude6 = $_POST['postcodelatitude6'];
   $postcodelongitude6 = $_POST['postcodelongitude6'];


   

   

   $postcode7 = $_POST['postcode7'];

   $delivery_areaName7 = $_POST['delivery_areaName7'];

   $delivery_charge7 = $_POST['delivery_charge7'];

   $minimum_order7 = $_POST['minimum_order7'];

   $shipping_charge7 = $_POST['shipping_charge7'];
   
   
    $postcodelatitude7 = $_POST['postcodelatitude7'];
   $postcodelongitude7 = $_POST['postcodelongitude7'];


   

   $postcode8 = $_POST['postcode8'];

   $delivery_areaName8 = $_POST['delivery_areaName8'];

   $delivery_charge8 = $_POST['delivery_charge8'];

   $minimum_order8 = $_POST['minimum_order8'];

   $shipping_charge8 = $_POST['shipping_charge8'];
   
    $postcodelatitude8 = $_POST['postcodelatitude8'];
   $postcodelongitude8 = $_POST['postcodelongitude8'];


   

   $postcode9 = $_POST['postcode9'];

   $delivery_areaName9 = $_POST['delivery_areaName9'];

   $delivery_charge9 = $_POST['delivery_charge9'];

   $minimum_order9 = $_POST['minimum_order9'];

   $shipping_charge9 = $_POST['shipping_charge9'];
   
   
    $postcodelatitude9 = $_POST['postcodelatitude9'];
   $postcodelongitude9 = $_POST['postcodelongitude9'];


   

     $postcode10= $_POST['postcode10'];

   $delivery_areaName10 = $_POST['delivery_areaName10'];

   $delivery_charge10 = $_POST['delivery_charge10'];

   $minimum_order10 = $_POST['minimum_order10'];

   $shipping_charge10 = $_POST['shipping_charge10'];
   
    $postcodelatitude10 = $_POST['postcodelatitude10'];
   $postcodelongitude10 = $_POST['postcodelongitude10'];


   

   if($postcode1!='' || $delivery_areaName1!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode1,$delivery_areaName1,$delivery_charge1,$minimum_order1,$shipping_charge1,$postcodelatitude1,$postcodelongitude1);

   } 

    if($postcode2!='' || $delivery_areaName2!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode2,$delivery_areaName2,$delivery_charge2,$minimum_order2,$shipping_charge2,$postcodelatitude2,$postcodelongitude2);

   } 

    if($postcode3!='' || $delivery_areaName3!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode3,$delivery_areaName3,$delivery_charge3,$minimum_order3,$shipping_charge3,$postcodelatitude3,$postcodelongitude3);

   } 

    if($postcode4!='' || $delivery_areaName4!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode4,$delivery_areaName4,$delivery_charge4,$minimum_order4,$shipping_charge4,$postcodelatitude4,$postcodelongitude4);

   } 

   

   if($postcode5!='' || $delivery_areaName5!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode5,$delivery_areaName5,$delivery_charge5,$minimum_order5,$shipping_charge5,$postcodelatitude5,$postcodelongitude5);

   } 

   

   if($postcode6!='' || $delivery_areaName6!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode6,$delivery_areaName6,$delivery_charge6,$minimum_order6,$shipping_charge6,$postcodelatitude6,$postcodelongitude6);

   } 

   

   if($postcode7!='' || $delivery_areaName7!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode7,$delivery_areaName7,$delivery_charge7,$minimum_order7,$shipping_charge7,$postcodelatitude7,$postcodelongitude7);

   } 

   

   if($postcode8!='' || $delivery_areaName8!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode8,$delivery_areaName8,$delivery_charge8,$minimum_order8,$shipping_charge8,$postcodelatitude8,$postcodelongitude8);

   } 

   

   if($postcode9!='' || $delivery_areaName9!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode9,$delivery_areaName9,$delivery_charge9,$minimum_order9,$shipping_charge9,$postcodelatitude9,$postcodelongitude9);

   } 

   

   if($postcode10!='' || $delivery_areaName10!=''){

   $DeliveryAddQuery = $db->storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode10,$delivery_areaName10,$delivery_charge10,$minimum_order10,$shipping_charge10,$postcodelatitude10,$postcodelongitude10);

   } 

   

         if($DeliveryAddQuery)

 			{

  			header("location:add_zipcode.php?msg=1");

  			}

  			else

  			{

  			header("location:add_zipcode.php?msg=0");

  }

}





if($_GET['tag']=='DeliveryEdit') {

   $countryID = $_POST['countryID'];

   $stateID = $_POST['stateID'];

   $cityName = $_POST['cityName'];

   $postcode = $_POST['postcode1'];

   $delivery_areaName = $_POST['delivery_areaName1'];

   $delivery_charge = $_POST['delivery_charge1'];

   $minimum_order = $_POST['minimum_order1'];

   $shipping_charge = $_POST['shipping_charge1'];
   
   $postcodelatitude1 = $_POST['postcodelatitude1'];
   $postcodelongitude1 = $_POST['postcodelongitude1'];


       $DeliveryEditQuery = $db->storeUpdatePostcodeArea($countryID,$stateID,$cityName,$postcode,$delivery_areaName,$delivery_charge,$minimum_order,$shipping_charge ,$postcodelatitude1,$postcodelongitude1,$_GET['eid']); 			

         if($DeliveryEditQuery)

 			{

  			header("location:manage_zipcode.php?msg=1");

  			}

  			else

  			{

  			header("location:add_zipcode.php?msg=0");

  }

}


if($_GET['tag']=='DeliveryEdit') {
   $countryID = $_POST['countryID'];
   $stateID = $_POST['stateID'];
   $cityName = $_POST['cityName'];
   $postcode = $_POST['postcode1'];
   $delivery_areaName = $_POST['delivery_areaName1'];
   $delivery_charge = $_POST['delivery_charge1'];
   $minimum_order = $_POST['minimum_order1'];
   $shipping_charge = $_POST['shipping_charge1'];
       $DeliveryEditQuery = $db->storeUpdatePostcodeArea($countryID,$stateID,$cityName,$postcode,$delivery_areaName,$delivery_charge,$minimum_order,$shipping_charge,$_GET['eid']); 			
         if($DeliveryEditQuery)
 			{
  			header("location:manage_zipcode.php?msg=1");
  			}
  			else
  			{
  			header("location:add_zipcode.php?msg=0");
  }
}

if($_GET['tag']=='DeliveryDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_PostcodeArea","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_zipcode.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_zipcode.php?dmsg=0");
  }

}

if($_GET['tag']=='DeliveryActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_PostcodeArea","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_zipcode.php?amsg=1");
  			}
  			else
  			{
  			header("location:manage_zipcode.php?amsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++ END Deliveryarea with post Update+++++++++++++++++++++++++++++++++++++++//







//++++++++++++++++++++++++++++++++++++++ Start Restaurant Deliveryarea with post Update+++++++++++++++++++++++++++++++++++++++//

if($_GET['tag']=='ResDeliveryAdd') {

 $restaurant_id = $_POST['restaurant_id'];

  $countryID = $_POST['countryID'];

   $stateID = $_POST['stateID'];

   $cityName = $_POST['cityName'];

   $postcode1 = $_POST['postcode1'];

   $delivery_areaName1 = $_POST['delivery_areaName1'];

   $delivery_charge1 = $_POST['delivery_charge1'];

   $minimum_order1 = $_POST['minimum_order1'];

   $shipping_charge1 = $_POST['shipping_charge1'];
   $postcodelatitude1 = $_POST['postcodelatitude1'];
   $postcodelongitude1 = $_POST['postcodelongitude1'];

   

    $postcode2 = $_POST['postcode2'];

   $delivery_areaName2 = $_POST['delivery_areaName2'];

   $delivery_charge2 = $_POST['delivery_charge2'];

   $minimum_order2 = $_POST['minimum_order2'];

   $shipping_charge2 = $_POST['shipping_charge2'];
   
    $postcodelatitude2 = $_POST['postcodelatitude2'];
   $postcodelongitude2 = $_POST['postcodelongitude2'];


   

    $postcode3 = $_POST['postcode3'];

   $delivery_areaName3 = $_POST['delivery_areaName3'];

   $delivery_charge3 = $_POST['delivery_charge3'];

   $minimum_order3 = $_POST['minimum_order3'];

   $shipping_charge3 = $_POST['shipping_charge3'];
   
   
    $postcodelatitude3 = $_POST['postcodelatitude3'];
   $postcodelongitude3 = $_POST['postcodelongitude3'];


   

    $postcode4 = $_POST['postcode4'];

   $delivery_areaName4 = $_POST['delivery_areaName4'];

   $delivery_charge4 = $_POST['delivery_charge4'];

   $minimum_order4 = $_POST['minimum_order4'];

   $shipping_charge4 = $_POST['shipping_charge4'];
   
    $postcodelatitude4 = $_POST['postcodelatitude4'];
   $postcodelongitude4 = $_POST['postcodelongitude4'];


   

    $postcode5 = $_POST['postcode5'];

   $delivery_areaName5 = $_POST['delivery_areaName5'];

   $delivery_charge5 = $_POST['delivery_charge5'];

   $minimum_order5 = $_POST['minimum_order5'];

   $shipping_charge5 = $_POST['shipping_charge5'];
   
    $postcodelatitude5 = $_POST['postcodelatitude5'];
   $postcodelongitude5 = $_POST['postcodelongitude5'];


   

   $postcode6 = $_POST['postcode6'];

   $delivery_areaName6 = $_POST['delivery_areaName6'];

   $delivery_charge6 = $_POST['delivery_charge6'];

   $minimum_order6 = $_POST['minimum_order6'];

   $shipping_charge6 = $_POST['shipping_charge6'];
   
    $postcodelatitude6 = $_POST['postcodelatitude6'];
   $postcodelongitude6 = $_POST['postcodelongitude6'];


   

   

   $postcode7 = $_POST['postcode7'];

   $delivery_areaName7 = $_POST['delivery_areaName7'];

   $delivery_charge7 = $_POST['delivery_charge7'];

   $minimum_order7 = $_POST['minimum_order7'];

   $shipping_charge7 = $_POST['shipping_charge7'];
   
   
    $postcodelatitude7 = $_POST['postcodelatitude7'];
   $postcodelongitude7 = $_POST['postcodelongitude7'];


   

   $postcode8 = $_POST['postcode8'];

   $delivery_areaName8 = $_POST['delivery_areaName8'];

   $delivery_charge8 = $_POST['delivery_charge8'];

   $minimum_order8 = $_POST['minimum_order8'];

   $shipping_charge8 = $_POST['shipping_charge8'];
   
    $postcodelatitude8 = $_POST['postcodelatitude8'];
   $postcodelongitude8 = $_POST['postcodelongitude8'];


   

   $postcode9 = $_POST['postcode9'];

   $delivery_areaName9 = $_POST['delivery_areaName9'];

   $delivery_charge9 = $_POST['delivery_charge9'];

   $minimum_order9 = $_POST['minimum_order9'];

   $shipping_charge9 = $_POST['shipping_charge9'];
   
   
    $postcodelatitude9 = $_POST['postcodelatitude9'];
   $postcodelongitude9 = $_POST['postcodelongitude9'];


   

     $postcode10= $_POST['postcode10'];

   $delivery_areaName10 = $_POST['delivery_areaName10'];

   $delivery_charge10 = $_POST['delivery_charge10'];

   $minimum_order10 = $_POST['minimum_order10'];

   $shipping_charge10 = $_POST['shipping_charge10'];
   
    $postcodelatitude10 = $_POST['postcodelatitude10'];
   $postcodelongitude10 = $_POST['postcodelongitude10'];

   

   if($postcode1!='' || $delivery_areaName1!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode1,$delivery_areaName1,$delivery_charge1,$minimum_order1,$shipping_charge1,$postcodelatitude1,$postcodelongitude1);

   } 

    if($postcode2!='' || $delivery_areaName2!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode2,$delivery_areaName2,$delivery_charge2,$minimum_order2,$shipping_charge2,$postcodelatitude2,$postcodelongitude2);

   } 

    if($postcode3!='' || $delivery_areaName3!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode3,$delivery_areaName3,$delivery_charge3,$minimum_order3,$shipping_charge3,$postcodelatitude3,$postcodelongitude3);

   } 

    if($postcode4!='' || $delivery_areaName4!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode4,$delivery_areaName4,$delivery_charge4,$minimum_order4,$shipping_charge4,$postcodelatitude4,$postcodelongitude4);

   } 

   

   if($postcode5!='' || $delivery_areaName5!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode5,$delivery_areaName5,$delivery_charge5,$minimum_order5,$shipping_charge5,$postcodelatitude5,$postcodelongitude5);

   } 

   

   if($postcode6!='' || $delivery_areaName6!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode6,$delivery_areaName6,$delivery_charge6,$minimum_order6,$shipping_charge6,$postcodelatitude6,$postcodelongitude6);

   } 

   

   if($postcode7!='' || $delivery_areaName7!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode7,$delivery_areaName7,$delivery_charge7,$minimum_order7,$shipping_charge7,$postcodelatitude7,$postcodelongitude7);

   } 

   

   if($postcode8!='' || $delivery_areaName8!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode8,$delivery_areaName8,$delivery_charge8,$minimum_order8,$shipping_charge8,$postcodelatitude8,$postcodelongitude8);

   } 

   

   if($postcode9!='' || $delivery_areaName9!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode9,$delivery_areaName9,$delivery_charge9,$minimum_order9,$shipping_charge9,$postcodelatitude9,$postcodelongitude9);

   } 

   

   if($postcode10!='' || $delivery_areaName10!=''){

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode10,$delivery_areaName10,$delivery_charge10,$minimum_order10,$shipping_charge10,$postcodelatitude10,$postcodelongitude10);

   } 

   

         if($DeliveryAddQuery)

 			{

  			header("location:add_restaurant_delivery.php?msg=1");

  			}

  			else

  			{

  			header("location:add_restaurant_delivery.php?msg=0");

  }

}





if($_GET['tag']=='ResDeliveryEdit') {

$restaurant_id = $_POST['restaurant_id'];

   $countryID = $_POST['countryID'];

   $stateID = $_POST['stateID'];

   $cityName = $_POST['cityName'];

   $postcode = $_POST['postcode1'];

   $delivery_areaName = $_POST['delivery_areaName1'];

   $delivery_charge = $_POST['delivery_charge1'];

   $minimum_order = $_POST['minimum_order1'];

   $shipping_charge = $_POST['shipping_charge1'];

 $postcodelatitude1 = $_POST['postcodelatitude1'];
   $postcodelongitude1 = $_POST['postcodelongitude1'];
   
       $DeliveryEditQuery = $db->storeUpdateResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode,$delivery_areaName,$delivery_charge,$minimum_order,$shipping_charge,$postcodelatitude1,$postcodelongitude1,$_GET['eid']); 			

         if($DeliveryEditQuery)

 			{

  			header("location:manage_restaurant_delivery.php?msg=1");

  			}

  			else

  			{

  			header("location:add_restaurant_delivery.php?msg=0");

  }

}
if($_GET['tag']=='ResDeliveryDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantDeliveryArea","delivery_id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_delivery.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_delivery.php?dmsg=0");
  }

}

if($_GET['tag']=='ResDeliveryActivate') {
$CuisineDelete = mysql_query("update tbl_restaurantDeliveryArea set status='".$_GET['active']."'  where delivery_id='".$_GET['statusid']."'");

 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_delivery.php?amsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_delivery.php?amsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++ END Restaurant Deliveryarea with post Update+++++++++++++++++++++++++++++++++++++++//







//++++++++++++++++++++++++++++ Start Restaurant Menu Entry+++++++++++++++++++++++++//
if($_GET['tag']=='ResMenuCategoryAdd') {
    // get tag
	
   $restaurantMenuID = $_POST['RestaurantPizzaID'];
   $restaurantMenuName = $_POST['restaurantMenuName'];
    $restaurant_state = $_POST['restaurant_state'];
	 $restaurant_city = $_POST['restaurant_city'];
   $restaurantMenuNameDescription=$_POST['restaurantMenuNameDescription'];
     $query_sel_max="select MAX(menuPosition) from tbl_restMenuCategory  WHERE  restaurantMenuID ='".$_POST['RestaurantPizzaID']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(menuPosition)'];
 $product_id= $product_id+1;
 
  $CuisineInsert = $db->storeAddResMenuCategory($restaurantMenuID,$restaurantMenuName,$restaurant_state,$restaurant_city,$restaurantMenuNameDescription,$product_id);
  include('route/config1.php');
   $khp=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$_POST['RestaurantPizzaID']."'"));
   
 
   
    if($khp['category_name']=='')
     {
      $menuitem=$_POST['restaurantMenuName'];
     }
       else
        {
        $menuitem=$_POST['restaurantMenuName'].','.$khp['category_name'];
		}

			mysql_query("update tbl_restaurantAdd set category_name=N'$menuitem' where id='".$_POST['RestaurantPizzaID']."'");
			
			 
  if($CuisineInsert)
  {
              if($_GET['RestaurantPizzaID']!=''){
		      header("location:menu-entry-create-categories.php?msg=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		      }
		      else
		      {
		      header("location:menu-entry-create-categories.php?msg=1");
		      }  
  }
  else
  {
 			 if($_GET['RestaurantPizzaID']!=''){
		      header("location:menu-entry-create-categories.php?error=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		      }
		      else
		      {
		      header("location:menu-entry-create-categories.php?error=1");
		      }  
  }
}
if($_GET['tag']=='ResMenuCategoryEdit') {
 $restaurantMenuID = $_POST['RestaurantPizzaID'];
   $restaurantMenuName = $_POST['restaurantMenuName'];
   $menuPosition = $_POST['menuPosition'];
   $restaurantMenuNameDescription=$_POST['restaurantMenuNameDescription'];
   $restaurant_state = $_POST['restaurant_state'];
	 $restaurant_city = $_POST['restaurant_city'];
  /*  $query_sel_max="select MAX(menuPosition) from tbl_restMenuCategory  WHERE  restaurantMenuID ='".$_POST['restaurantMenuID']."' and id='".$_GET['eid']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(menuPosition)'];
 $product_id= $product_id+1;*/
 
 $CuisineInsert = $db->storeUpdateResMenuCategory($restaurantMenuID,$restaurantMenuName,$restaurant_state,$restaurant_city,$restaurantMenuNameDescription,$menuPosition,$_GET['eid']);
 
  $khp=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$_POST['RestaurantPizzaID']."'"));
    if($khp['category_name']=='')
     {
      $menuitem=$_POST['restaurantMenuName'];
     }
       else
        {
        $menuitem=$_POST['restaurantMenuName'].','.$khp['category_name'];
		}

			mysql_query("update tbl_restaurantAdd set category_name=N'$menuitem' where id='".$_POST['RestaurantPizzaID']."'");
 			if($CuisineInsert)
 			{
						 if($_GET['RestaurantPizzaID']!=''){
						  header("location:menu-entry-create-categories.php?emsg=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:menu-entry-create-categories.php?emsg=1");
						  }    			
			}
  			else
  			{
  						  if($_GET['RestaurantPizzaID']!=''){
						  header("location:menu-entry-create-categories.php?error=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:menu-entry-create-categories.php?emsg=0");
						  }   
            }
}
if($_GET['tag']=='ResMenuCategoryDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restMenuCategory","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
			
			mysql_query("delete from tbl_restaurantMainMenuItem where RestaurantCategoryID='".$_GET['eid']."' and RestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
			 mysql_query("delete from tbl_restaurantMainMenuItemdough where SizeRestaurantCategoryID='".$_GET['eid']."' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'"); mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where SizeRestaurantCategoryID='".$_GET['eid']."' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where SizeRestaurantCategoryID='".$_GET['eid']."' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where SizeRestaurantCategoryID='".$_GET['eid']."' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
							 mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitemGroup	 where SizeRestaurantCategoryID='".$_GET['eid']."' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
							 mysql_query("delete from tbl_restaurantMainMenuItemSize where SizeRestaurantCategoryID='".$_GET['eid']."' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
			
  						if($_GET['RestaurantPizzaID']!=''){
						  header("location:menu-entry-create-categories.php?dmsg=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:menu-entry-create-categories.php?dmsg=1");
						  }   
  			}
  			else
  			{
  						 if($_GET['RestaurantPizzaID']!=''){
						  header("location:menu-entry-create-categories.php?dmsg=0&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:menu-entry-create-categories.php?dmsg=0");
						  }   
  			}

}

if($_GET['tag']=='ResMenuCategoryActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restMenuCategory","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  						if($_GET['RestaurantPizzaID']!=''){
						  header("location:menu-entry-create-categories.php?amsg=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:menu-entry-create-categories.php?amsg=1");
						  }   
  			}
  			else
  			{
  						if($_GET['RestaurantPizzaID']!=''){
						  header("location:menu-entry-create-categories.php?amsg=0&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:menu-entry-create-categories.php?amsg=0");
						  }   
  			}

}





if($_GET['tag']=='ResMenuOfferCategoryDelete') {
$CuisineDelete = $db->DeleteTableRow("table_menuofferTitle","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  						if($_GET['RestaurantPizzaID']!=''){
						  header("location:manage_menuOffer.php?dmsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:manage_menuOffer.php?dmsg=1");
						  }   
  			}
  			else
  			{
  						 if($_GET['RestaurantPizzaID']!=''){
						  header("location:manage_menuOffer.php?dmsg=0&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:manage_menuOffer.php?dmsg=0");
						  }   
  			}

}

if($_GET['tag']=='ResMenuOfferCategoryActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("table_menuofferTitle","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  						if($_GET['RestaurantPizzaID']!=''){
						  header("location:manage_menuOffer.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:manage_menuOffer.php?amsg=1");
						  }   
  			}
  			else
  			{
  						if($_GET['RestaurantPizzaID']!=''){
						  header("location:manage_menuOffer.php?amsg=0&RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
						  }
						  else
						  {
						  header("location:manage_menuOffer.php?amsg=0");
						  }   
  			}

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE STATE+++++++++++++++++++++++++++++++++++++++//

if($_GET['tag']=='ResMenuItemPizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMenuItem","id",$_GET['eid']);
 	if($CuisineDelete)
 	{
			if($_GET['RestaurantPizzaID']!=''){
		header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
			else
			{
			header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  	}
  	else
  	{
  			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
			else
			{
			header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  }

}

if($_GET['tag']=='ResMenuItemPizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMenuItem","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
  			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
			else
			{
			header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  	}
  	else
  	{
  			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?amsg=0&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
			else
			{
			header("location:qc_menu_entry.php?amsg=0&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  }

}

//++++++++++++++++++++++++++++++++++++++ END Pizza Menu Entry+++++++++++++++++++++++++++++++++++++++//








//++++++++++++++++++++++++++++ Start Restaurant Menu Entry+++++++++++++++++++++++++//
if($_GET['tag']=='ResCouponCodeAdd') {
    // get tag
   $RestauranCouponId = $_POST['RestauranCouponId'];
   $RestauranCouponName = $_POST['RestauranCouponName'];
   $RestauranCouponNo = $_POST['randomfield'];
   $RestauranCouponPrice = $_POST['RestauranCouponPrice'];
     $RestauranCouponType = $_POST['RestauranCouponType'];
  $CouponInsert = $db->storeAddResCoupon($RestauranCouponId,$RestauranCouponName,$RestauranCouponNo,$RestauranCouponType,$RestauranCouponPrice);
  if($CouponInsert)
  {
  header("location:add_restaurant_copoun_code.php?msg=1");
  }
  else
  {
  header("locationadd_restaurant_copoun_code.php?error=1");
  }
}
if($_GET['tag']=='ResCouponCodeEdit') {
$RestauranCouponId = $_POST['RestauranCouponId'];
   $RestauranCouponName = $_POST['RestauranCouponName'];
   $RestauranCouponNo = $_POST['randomfield'];
   $RestauranCouponPrice = $_POST['RestauranCouponPrice'];
   $RestauranCouponType = $_POST['RestauranCouponType'];
 $CouponInsertEdit = $db->storeUpdateResCoupon($RestauranCouponId,$RestauranCouponName,$RestauranCouponNo,$RestauranCouponType,$RestauranCouponPrice,$_GET['eid']);
 			if($CouponInsertEdit)
 			{
  			header("location:add_restaurant_copoun_code.php?emsg=1#manage");
  			}
  			else
  			{
  			header("location:add_restaurant_copoun_code.php?emsg=0");
  }
}
if($_GET['tag']=='ResCouponCodeDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantCoupon","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_restaurant_copoun_code.php?dmsg=1#manage");
  			}
  			else
  			{
  			header("location:add_restaurant_copoun_code.php?dmsg=0#manage");
  }

}

if($_GET['tag']=='ResCouponCodeActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantCoupon","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_restaurant_copoun_code.php?amsg=1#manage");
  			}
  			else
  			{
  			header("location:add_restaurant_copoun_code.php?amsg=0#manage");
  }

}

//++++++++++++++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE STATE+++++++++++++++++++++++++++++++++++++++//






//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Gallery++++++++++++++++++++++++++++//
if($_GET['tag']=='ResGalleryAdd') {
    // get tag
 $restaurant_id = $_POST['restaurant_id'];
  if($_FILES['restaurant_gallery_image']['name']!='')
{
$restaurant_gallery_imageImgThumb=implode(',',$_FILES['restaurant_gallery_image']['name']);
for($i=0;$i<=count($_FILES['restaurant_gallery_image']['name']);$i++){
if(move_uploaded_file($_FILES['restaurant_gallery_image']['tmp_name'][$i],"ResGalleryImg/".$_FILES['restaurant_gallery_image']['name'][$i])){
}
}
}
  $ResGalleryInsert = $db->storeRestaurantGallery($restaurant_id,$restaurant_gallery_imageImgThumb);
  if($ResGalleryInsert)
  {
  //mysql_query("update  set restaurantGallery='1' where id='".$_POST['restaurant_id']."'");
  header("location:add_restaurant_gallery.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_gallery.php?error=1");
  }
}
if($_GET['tag']=='ResGalleryEdit') {
 $restaurant_id = $_POST['restaurant_id'];
if($_FILES['restaurant_gallery_image']['name']!='')
{
$restaurant_gallery_imageImgThumb=implode(',',$_FILES['restaurant_gallery_image']['name']).$_POST['restaurant_gallery_imageold'];
for($i=0;$i<=count($_FILES['restaurant_gallery_image']['name']);$i++){
if(move_uploaded_file($_FILES['restaurant_gallery_image']['tmp_name'][$i],"ResGalleryImg/".$_FILES['restaurant_gallery_image']['name'][$i])){
}
}
}
else
{
$restaurant_gallery_imageImgThumb=$_POST['restaurant_gallery_imageold'];
}
  $CuisineInsert = $db->storeUpdateRestaurantGallery($restaurant_id,$restaurant_gallery_imageImgThumb,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_restaurant_gallery.php?emsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_gallery.php?emsg=0");
  }
}
if($_GET['tag']=='ResGalleryDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantGallery","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_gallery.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_gallery.php?dmsg=0");
  }

}

if($_GET['tag']=='ResGalleryActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantGallery","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_gallery.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant_gallery.php?amsg=0");
  }

}



if($_GET['tag']=='ResHomeFlashDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_Homeslider","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:add_ManageBackgroundImg.php?dmsg=1");
  			}
  			else
  			{
  			header("location:add_ManageBackgroundImg.php?dmsg=0");
  }

}

if($_GET['tag']=='ResHomeFlashActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_Homeslider","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:add_ManageBackgroundImg.php?amsg=1");
  			}

  			else
  			{
  			header("location:add_ManageBackgroundImg.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Gallery++++++++++++++++++++++++++++//






//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Deals++++++++++++++++++++++++++++//
if($_GET['tag']=='ResDealsAdd') {
    // get tag
   $RestaurantDealsId = $_POST['RestaurantDealsId'];
    $RestaurantDealsName = $_POST['RestaurantDealsName'];
	 $RestaurantDealsStartDate = $_POST['RestaurantDealsStartDate'];
	  $RestaurantDealsStartTime = $_POST['RestaurantDealsStartTime'];
	  $RestaurantDealsEndDate = $_POST['RestaurantDealsEndDate'];
	   $RestaurantDealsEndTime = $_POST['RestaurantDealsEndTime'];
	  $RestaurantDealsAddress = $_POST['RestaurantDealsAddress'];
	  $RestaurantDealsDescription = $_POST['RestaurantDealsDescription'];
	    $image_name=$_FILES['RestaurantDealsImage']['name'];
   $image_temp=$_FILES['RestaurantDealsImage']['tmp_name'];
if($_FILES['RestaurantDealsImage']['name']!='')
{
$RestaurantEventImgThumb=implode(',',$_FILES['RestaurantDealsImage']['name']);
for($i=0;$i<=count($_FILES['RestaurantDealsImage']['name']);$i++){
if(move_uploaded_file($_FILES['RestaurantDealsImage']['tmp_name'][$i],"DealsImg/thumb/".$_FILES['RestaurantDealsImage']['name'][$i])){
}
}
}

$CuisineInsert = $db->storeRestaurantDeals($RestaurantDealsId,$RestaurantDealsName,$RestaurantDealsStartDate,$RestaurantDealsStartTime,$RestaurantDealsEndDate,$RestaurantDealsEndTime,$RestaurantDealsAddress,$RestaurantDealsDescription,$kp,$RestaurantEventImgThumb);
  if($CuisineInsert)
  {
  header("location:add_new_restaurant_daily_deals.php?msg=1");
  }
  else
  {
  header("location:add_new_restaurant_daily_deals.php?error=1");
  }
}
if($_GET['tag']=='ResDealsEdit') {
  $RestaurantDealsId = $_POST['RestaurantDealsId'];
    $RestaurantDealsName = $_POST['RestaurantDealsName'];
	 $RestaurantDealsStartDate = $_POST['RestaurantDealsStartDate'];
	  $RestaurantDealsStartTime = $_POST['RestaurantDealsStartTime'];
	  $RestaurantDealsEndDate = $_POST['RestaurantDealsEndDate'];
	   $RestaurantDealsEndTime = $_POST['RestaurantDealsEndTime'];
	  $RestaurantDealsAddress = $_POST['RestaurantDealsAddress'];
	  $RestaurantDealsDescription = $_POST['RestaurantDealsDescription'];
	    $image_name=$_FILES['RestaurantDealsImage']['name'];
   $image_temp=$_FILES['RestaurantDealsImage']['tmp_name'];
if($_FILES['RestaurantDealsImage']['name']!='')
{
$RestaurantEventImgThumb=implode(',',$_FILES['RestaurantDealsImage']['name']);
for($i=0;$i<=count($_FILES['RestaurantDealsImage']['name']);$i++){
if(move_uploaded_file($_FILES['RestaurantDealsImage']['tmp_name'][$i],"DealsImg/thumb/".$_FILES['RestaurantDealsImage']['name'][$i])){
}
}
}
else
{
$RestaurantEventImgThumb=$_POST['RestaurantDealsImageold'];
}
$directory="DealsImg";
if($_FILES['RestaurantDealsImage']['name']!=''){
$kp=ImageUpload($image_name,$image_temp,$directory,200,200);
ImageUpload($image_name,$image_temp,$directory,200,200);
            }
           else
 			{
 			$kp=$_POST['RestaurantDealsImageold'];
 			}

$CuisineInsert = $db->storeUpdateRestaurantDeals($RestaurantDealsId,$RestaurantDealsName,$RestaurantDealsStartDate,$RestaurantDealsStartTime,$RestaurantDealsEndDate,$RestaurantDealsEndTime,$RestaurantDealsAddress,$RestaurantDealsDescription,$kp,$RestaurantEventImgThumb,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_restaurant_daily_deals.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_new_restaurant_daily_deals.php?emsg=0");
  }
}
if($_GET['tag']=='ResDealsDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantDeals","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_daily_deals.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_daily_deals.php?dmsg=0");
  }

}

if($_GET['tag']=='ResDealsActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantDeals","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_daily_deals.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant_daily_deals.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Deals++++++++++++++++++++++++++++//






//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT User++++++++++++++++++++++++++++//
if($_GET['tag']=='ResUserAdd') {
    // get tag
   $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	 $countryID = $_POST['countryID'];
	 $stateID = $_POST['stateID'];
	 $cityName = $_POST['cityName'];
	 $zipcode = $_POST['zipcode'];
	  $user_email = $_POST['user_email'];
	   $gender = $_POST['gender'];
	 $landmark = $_POST['landmark'];
	 $user_pass = $_POST['user_pass'];
	 $address = $_POST['address'];
	 $user_phone = $_POST['user_phone'];
	 $assign_loyalty = $_POST['assign_loyalty'];
	 $loyalty_type = $_POST['loyalty_type'];
$UserInsert = $db->storeAddResUser($fname,$lname,$countryID,$stateID,$cityName,$zipcode,$gender,$landmark,$user_phone,$address,$user_email,$user_pass,$assign_loyalty,$loyalty_type);
  if($UserInsert)
  {
 $to=$_POST['user_email'].','.$RegistrationDataLoginVal['registrationemail'];
$subject ='Welcome you to registered on '.$AdminDataLoginVal['website_name'].'';
$from=$RegistrationDataLoginVal['registrationemail'];
$message="<table bgcolor='#dfdfdf' width='100%' style='float:left;background-color:rgb(223,223,223);font-family:Arial,sans serif'> 
  <tbody> 
    <tr> 
      <td align='center'> 
        <table border='0' cellpadding='0' cellspacing='0'> 
          <tbody> 
            <tr> 
              <td colspan='2' height='359' valign='top'><img alt='' src='https://ci3.googleusercontent.com/proxy/oqgjYIFndtWMaU6BmYk2yKMjRDsaL5wbQPL_Hh3ARVE6_TOpMJ3q3n54Brllrzr41gpnnPVV1-ixogBC2CVmfylAf8HaGw6pVrhVSBrJjk4GxAWHW0RDquP7RxO2yyLpF1qllCb0WtkQ7H_eA24CQmS3tYM=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-left.png'></td> 
              <td rowspan='2'> 
                <table border='0' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td bgcolor='' style='background-image:url(https://ci3.googleusercontent.com/proxy/ULCRAiwWL9iHiPYUTWZkzsldvOF8xAcaH1NnHMCo4fOBSZmZlQafsxfMJWRIX-xpEnU_qjE4LNN2JsFKONWeijp-EeZCQ9GVERwqf44jtGjXUBQV2T_qgggzVHwuePTJY20ViGwa5EePhpstWNE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/header_bg.jpg);background-repeat:repeat no-repeat'> 
                        <table valign='middle' cellpadding='0' cellspacing='0' width='100%'> 
                          <tbody> 
                            <tr> 
                              <td width='12'></td> 
                              <td width='253' style='padding:10px'><a href='' target='_blank'><img src='".$DomainName."control/sitelogo/sitelogosmall/".$AdminDataLoginVal['website_logo']."' width='130' height='100'></a></td> 
                              <td align='right' width='453' style='color:rgb(102,102,102);font-size:12px;font-family:Arial,'sans serif';padding-right:15px'>&nbsp;</td> 
                            </tr> 
                          </tbody> 
                        </table></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#c32c2c' height='6'></td> 
                    </tr> 
                  </tbody> 
                </table> 
                <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td style='font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'>     
                <table cellpadding='0' cellspacing='0' width='730'>
                  <tbody>

                   <tr>
                          <td > 
<h2 style='color:#000066;margin-left:10px; margin-top:10px;'>Hi ".ucwords($_POST['fname'])." ".ucwords($_POST['lname'])." !</h2>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to welcome you to registered on ".$AdminDataLoginVal['website_name']."</p>
                       
<div style='padding:10px; color:#CA0000; font-size:18px; margin-left:50px;'>Your Account has been successfully created  ! please check your login detail below</div>
<table width='36%' align='center' style='padding:10px;'>
  <tr>
    <td><strong>Login ID </strong></td>
    <td>:</td>
    <td>".$_POST['user_email']."</td>
  </tr>
  <tr>
    <td><strong>Password </strong></td>
     <td>:</td>
    <td>".$_POST['user_pass']."</td>
  </tr>
</table>

<div style='padding:10px; color:#ff6156; font-size:18px;'>Click Here to login your control panel <a href='".$DomainName."login.php'>Login Here</a></div>
</td>
                    </tr>
                    
                   
                                
             </table>       
  

                       </td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'>&nbsp;</td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>Thank you for your preference.</td> 
                    </tr>
					 <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>".$AdminDataLoginVal['website_name']." Team</td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'><a style='color:#ed6c2b' href='' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a></td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#C1272D' height='10'></td> 
                    </tr> 
                  </tbody> 
                </table></td> 
              <td colspan='2' valign='top'><img alt='' style='margin-top:1px' src='https://ci6.googleusercontent.com/proxy/8o1ccbZ7ctJxK1VN4zNIxlWON_rkJswBHm6DzxefVm-_VSzj9QPFhRMbpnLl2K53YvrCXyuvok0vrS6cV3RfcihRmWQlG3YSbM63MuIfpr7r4nTsSrN68-uEEw1yRlju_Ov5ZghGFjY9C2mGLuNV36XI-Oh4=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-right.png'></td> 
            </tr> 
            <tr> 
              <td>&nbsp;</td> 
              <td background='https://ci4.googleusercontent.com/proxy/EZYYeK4w2asNVCcbD8wkliiy7Ulzcci_sqRnKSnJ7gNSYlE4AqAvpw_mM4gjxuC_6i4c6DwJukWOpT_yWblEwr6f6OpbRr2aqz_MffQ_j4T0revCtSl9IbBYXmi8e8IvqC74uJ0IeL141s4DRBajug=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-left.png' width='4'></td> 
              <td background='https://ci4.googleusercontent.com/proxy/fMGLYGaSXBcqpb_4i_0NpDT6OwB1EmhPO0VBXxU4tifv6KxhPAc1Tu_vDL5zztDKjkM6iFsXefxLWpLfXP-RvBEB1YBmRtIfT2bj9iIQRyA8g4GBUYk8qH905Gt51p4TIoNbOO7CyfKJqiXoU6dgKmE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-right.png' width='4'></td> 
              <td>&nbsp;</td> 
            </tr> 
            <tr> 
              <td colspan='2'></td> 
              <td><img alt='' src='https://ci6.googleusercontent.com/proxy/E3iNizj4AUWYxz8t1e9PUopNYgAoddNQraaIHCPJ56eP0Cq56k8daz74Y6Gv7xWplalG0fIJwtVc0csoezk3Cgi89cQJofg6Se7I1Hg7zLd0_V5lG91FUKa23Sg5CMsqKTFCpOeYONBs0QtglyAtjMFC=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-bottom.png'></td> 
              <td colspan='2'></td> 
            </tr> 
          </tbody> 
        </table></td> 
    </tr> 
    <tr> 
      <td height='40'></td> 
    </tr> 
  </tbody> 
</table><div class='yj6qo'></div><div class='adL'>
</div></div>";
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=UTF-8\n";
	$headers .= "From: $from  \r\n" .
	$headers .= "X-Priority: 1\r\n"; 
	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "X-Mailer: Just My Server"; 
	mail($to, $subject, $message, $headers);
  
  
  header("location:add_restaurant_user.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_user.php?error=1");
  }
}
if($_GET['tag']=='ResUserEdit') {
 $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	 $countryID = $_POST['countryID'];
	 $stateID = $_POST['stateID'];
	 $cityName = $_POST['cityName'];
	  $address = $_POST['address'];
	 $user_phone = $_POST['user_phone'];
	 $zipcode = $_POST['zipcode'];
	  $user_email = $_POST['user_email'];
	   $gender = $_POST['gender'];
	 $landmark = $_POST['landmark'];
	 $user_pass = $_POST['user_pass'];
	 $assign_loyalty = $_POST['assign_loyalty'];
	 $loyalty_type = $_POST['loyalty_type'];
$CuisineInsert = $db->storeUpdateResUser($fname,$lname,$countryID,$stateID,$cityName,$zipcode,$gender,$landmark,$user_phone,$address,$user_email,$user_pass,$assign_loyalty,$loyalty_type,$_GET['eid']);
 			if($CuisineInsert)
 			{
  			header("location:manage_user.php?emsg=1");
  			}
  			else
  			{
  			header("location:manage_user.php?emsg=0");
  }
}
if($_GET['tag']=='ResUserDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_user","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_user.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_user.php?dmsg=0");
  }

}

if($_GET['tag']=='ResUserActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_user","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_user.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_user.php?amsg=0");
  }

}

if($_GET['tag']=='ResUserAddressDelete') {
$CuisineDelete = $db->DeleteTableRow("user_newaddress","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manageUserAddress.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manageUserAddress.php?dmsg=0");
  }

}

if($_GET['tag']=='ResUserAddressActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("user_newaddress","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manageUserAddress.php?amsg=1");
  			}

  			else
  			{
  			header("location:manageUserAddress.php?amsg=0");
  }

}

if($_GET['tag']=='ResUserIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_user","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_user.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_user.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT User++++++++++++++++++++++++++++//






//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Delivery Boy++++++++++++++++++++++++++++//
if($_GET['tag']=='DeliveryBoyAdd') {
    // get tag
   $DeliveryBoyRestaurantID = $_POST['DeliveryBoyRestaurantID'];
    $DeliveryBoyName = $_POST['DeliveryBoyName'];
	 $DeliveryBoyCountry = $_POST['DeliveryBoyCountry'];
	 $DeliveryBoyState = $_POST['DeliveryBoyState'];
	   $DeliveryBoyCity = $_POST['DeliveryBoyCity'];
    $DeliveryBoyEmailID = $_POST['DeliveryBoyEmailID'];
	 $DeliveryBoyMobileNo = $_POST['DeliveryBoyMobileNo'];
	 $DeliveryBoyArea = $_POST['DeliveryBoyArea'];
	  $DeliveryBoyDOB = $_POST['DeliveryBoyDOB'];
	   $DeliveryBoyAnniversaryDate = $_POST['DeliveryBoyAnniversaryDate'];
    $DeliveryBoyResidenceNo = $_POST['DeliveryBoyResidenceNo'];
	 $DeliveryBoyAddress = $_POST['DeliveryBoyAddress'];
	 
	  $image =$_FILES["photoimg"]["name"];
$uploadedfile = $_FILES['photoimg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['photoimg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['photoimg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
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

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['photoimg']['name'];

$filename = "DeliveryBoyPhoto/".$ResPizzaImg;
$filename1 = "DeliveryBoyPhoto/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
	 
	 
if($_FILES['DeliveryBoyIDProofimg']['name']!='')
{
$kp1=uniqid().$_FILES['DeliveryBoyIDProofimg']['name'];
if(move_uploaded_file($_FILES['DeliveryBoyIDProofimg']['tmp_name'],"DeliveryBoyIDproof/".$kp1)){
}
}
$UserInsert = $db->storeAddResDeliveryBoy($DeliveryBoyRestaurantID,$DeliveryBoyName,$DeliveryBoyCountry,$DeliveryBoyState,$DeliveryBoyCity,$DeliveryBoyEmailID,$DeliveryBoyMobileNo,$DeliveryBoyArea,$DeliveryBoyDOB,$DeliveryBoyAnniversaryDate,$ResPizzaImg,$kp1,$DeliveryBoyResidenceNo,$DeliveryBoyAddress);
  if($UserInsert)
  {
  header("location:add_new_deliveryboy.php?msg=1");
  }
  else
  {
  header("location:add_new_deliveryboy.php?error=1");
  }
}
if($_GET['tag']=='ResDeliveryBoyEdit') {
   $DeliveryBoyRestaurantID = $_POST['DeliveryBoyRestaurantID'];
    $DeliveryBoyName = $_POST['DeliveryBoyName'];
	 $DeliveryBoyCountry = $_POST['DeliveryBoyCountry'];
	 $DeliveryBoyState = $_POST['DeliveryBoyState'];
	   $DeliveryBoyCity = $_POST['DeliveryBoyCity'];
    $DeliveryBoyEmailID = $_POST['DeliveryBoyEmailID'];
	 $DeliveryBoyMobileNo = $_POST['DeliveryBoyMobileNo'];
	 $DeliveryBoyArea = $_POST['DeliveryBoyArea'];
	  $DeliveryBoyDOB = $_POST['DeliveryBoyDOB'];
	   $DeliveryBoyAnniversaryDate = $_POST['DeliveryBoyAnniversaryDate'];
    $DeliveryBoyResidenceNo = $_POST['DeliveryBoyResidenceNo'];
	 $DeliveryBoyAddress = $_POST['DeliveryBoyAddress'];
 
   $image =$_FILES["photoimg"]["name"];
$uploadedfile = $_FILES['photoimg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['photoimg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['photoimg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
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

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['photoimg']['name'];

$filename = "DeliveryBoyPhoto/".$ResPizzaImg;
$filename1 = "DeliveryBoyPhoto/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$ResPizzaImg=$_POST['photoimgold'];
}

if($_FILES['DeliveryBoyIDProofimg']['name']!='')
{
$kp1=uniqid().$_FILES['DeliveryBoyIDProofimg']['name'];
if(move_uploaded_file($_FILES['DeliveryBoyIDProofimg']['tmp_name'],"DeliveryBoyIDproof/".$kp1)){
}
}
else
{
$kp1=$_POST['DeliveryBoyIDProofimgold'];
}
$UserInsert = $db->storeUpdateResDeliveryBoy($DeliveryBoyRestaurantID,$DeliveryBoyName,$DeliveryBoyCountry,$DeliveryBoyState,$DeliveryBoyCity,$DeliveryBoyEmailID,$DeliveryBoyMobileNo,$DeliveryBoyArea,$DeliveryBoyDOB,$DeliveryBoyAnniversaryDate,$ResPizzaImg,$kp1,$DeliveryBoyResidenceNo,$DeliveryBoyAddress,$_GET['eid']);
 			if($UserInsert)
 			{
  			header("location:manage_deliveryboy.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_new_deliveryboy.php?emsg=0");
  }
}
if($_GET['tag']=='ResDeliveryBoyDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_resDeliveryBoy","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_deliveryboy.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_deliveryboy.php?dmsg=0");
  }

}

if($_GET['tag']=='ResDeliveryBoyActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_resDeliveryBoy","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_deliveryboy.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_deliveryboy.php?amsg=0");
  }

}

if($_GET['tag']=='ResDeliveryBoyIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_resDeliveryBoy","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_deliveryboy.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_deliveryboy.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Delivery Boy++++++++++++++++++++++++++++//






//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Employee++++++++++++++++++++++++++++//
if($_GET['tag']=='EmployeeAdd') {
    // get tag
   $ResEmployeeID = $_POST['ResEmployeeID'];
    $EmployeeName = $_POST['EmployeeName'];
	 $EmployeeDesignation = $_POST['EmployeeDesignation'];
	 $EmployeeCountry = $_POST['EmployeeCountry'];
	   $EmployeeRegion = $_POST['EmployeeRegion'];
    $EmployeeCity = $_POST['EmployeeCity'];
	 $EmployeeEmailID = $_POST['EmployeeEmailID'];
	 $EmployeeMobileNo = $_POST['EmployeeMobileNo'];
	  $EmployeeDOB = $_POST['EmployeeDOB'];
	   $EmployeeAnniversary = $_POST['EmployeeAnniversary'];
    $EmployeeResidenceNo = $_POST['EmployeeResidenceNo'];
	 $EmployeeBranchName = $_POST['EmployeeAddress'];
	 $EmployeeAddress = $_POST['EmployeeBranchName'];
	  $EmployeeDepartment = $_POST['EmployeeDepartment'];
	  
  $image =$_FILES["photoimg"]["name"];
$uploadedfile = $_FILES['photoimg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['photoimg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['photoimg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
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

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['photoimg']['name'];

$filename = "EmployeePhoto/".$ResPizzaImg;
$filename1 = "EmployeePhoto/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
if($_FILES['EmployeeIDProofimg']['name']!='')
{
$EmployeeIDProof=uniqid().$_FILES['EmployeeIDProofimg']['name'];
if(move_uploaded_file($_FILES['EmployeeIDProofimg']['tmp_name'],"EmployeeIDproof/".$EmployeeIDProof)){
}
}


$UserInsert = $db->storeAddResEmployee($ResEmployeeID,$EmployeeName,$EmployeeDesignation,$EmployeeCountry,$EmployeeRegion,$EmployeeCity,$EmployeeEmailID,$EmployeeMobileNo,$EmployeeDOB,$EmployeeAnniversary,$ResPizzaImg,$EmployeeIDProof,$EmployeeResidenceNo,$EmployeeBranchName,$EmployeeAddress,$EmployeeDepartment);
  if($UserInsert)
  {
  header("location:add_new_employee.php?msg=1");
  }
  else
  {
  header("location:add_new_employee.php?error=1");
  }
}
if($_GET['tag']=='ResEmployeeEdit') {
 $ResEmployeeID = $_POST['ResEmployeeID'];
    $EmployeeName = $_POST['EmployeeName'];
	 $EmployeeDesignation = $_POST['EmployeeDesignation'];
	 $EmployeeCountry = $_POST['EmployeeCountry'];
	   $EmployeeRegion = $_POST['EmployeeRegion'];
    $EmployeeCity = $_POST['EmployeeCity'];
	 $EmployeeEmailID = $_POST['EmployeeEmailID'];
	 $EmployeeMobileNo = $_POST['EmployeeMobileNo'];
	  $EmployeeDOB = $_POST['EmployeeDOB'];
	   $EmployeeAnniversary = $_POST['EmployeeAnniversary'];
    $EmployeeResidenceNo = $_POST['EmployeeResidenceNo'];
	 $EmployeeBranchName = $_POST['EmployeeBranchName'];
	 $EmployeeAddress = $_POST['EmployeeAddress'];
	 
	  $EmployeeDepartment = $_POST['EmployeeDepartment'];
	  
	  
	   $image =$_FILES["photoimg"]["name"];
$uploadedfile = $_FILES['photoimg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['photoimg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['photoimg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['photoimg']['tmp_name'];
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

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['photoimg']['name'];

$filename = "EmployeePhoto/".$ResPizzaImg;
$filename1 = "EmployeePhoto/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$ResPizzaImg=$_POST['photoimgold'];
}	
	  
	  

if($_FILES['EmployeeIDProofimg']['name']!='')
{
$kp1=uniqid().$_FILES['EmployeeIDProofimg']['name'];
if(move_uploaded_file($_FILES['EmployeeIDProofimg']['tmp_name'],"EmployeeIDproof/".$kp1)){
}
}
else
{
$kp1=$_POST['EmployeeIDProofimgold'];
}
$UserInsert = $db->storeUpdateEmployee($ResEmployeeID,$EmployeeName,$EmployeeDesignation,$EmployeeCountry,$EmployeeRegion,$EmployeeCity,$EmployeeEmailID,$EmployeeMobileNo,$EmployeeDOB,$EmployeeAnniversary,$ResPizzaImg,$kp1,$EmployeeResidenceNo,$EmployeeBranchName,$EmployeeAddress,$EmployeeDepartment,$_GET['eid']);
 			if($UserInsert)
 			{
  			header("location:manage_employee.php?emsg=1");
  			}
  			else
  			{
  			header("location:add_new_employee.php?emsg=0");
  }
}
if($_GET['tag']=='ResEmployeeDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_RestaurantEmp","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_employee.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_employee.php?dmsg=0");
  }

}

if($_GET['tag']=='ResEmployeeActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_RestaurantEmp","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_employee.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_employee.php?amsg=0");
  }

}

if($_GET['tag']=='ResEmployeeIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_RestaurantEmp","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_employee.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_employee.php?amsg=0");
  }

}

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE NEW RESTAURANT++++++++++++++++++++++++++++//

//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE NEW RESTAURANT++++++++++++++++++++++++++++//



if($_GET['tag']=='RestaurantAdd') {

    // get tag

	//++++++++++++++++++++++Restaurant Information Field+++++++++++++++++++
	if($_POST['restaurant_type']!='')
		{
    	$restaurant_type = implode(',',$_POST['restaurant_type']);

}
		

   		$restaurant_name = $_POST['restaurant_name'];

 		$restaurant_phone = $_POST['restaurant_phone'];

		$restaurant_website = $_POST['restaurant_website'];

    	$restaurant_fax = $_POST['restaurant_fax'];

		

		
		if($_POST['restaurant_service']!=''){

  		 $restaurant_service = implode(',',$_POST['restaurant_service']);

		 }

		if($_POST['restaurant_cuisine']!=''){

  		 $restaurant_cuisine = implode(',',$_POST['restaurant_cuisine']);

		 }

		 if($_POST['restaurant_facilities']!=''){

  		 $restaurant_facilities = implode(',',$_POST['restaurant_facilities']);

		 }

		 

		 if($_POST['restaurant_payment_method']!=''){

  		 $restaurant_payment_method = implode(',',$_POST['restaurant_payment_method']);

		 }
		 else
		 {
		 $restaurant_payment_method ="Cash on Delivery";
		 }

		 if($_POST['restaurant_social_media']!=''){

  		 $restaurant_social_media = implode(',',$_POST['restaurant_social_media']);

		 }

		

	  	$restaurant_contact_name = $_POST['restaurant_contact_name'];

	   	$restaurant_contact_phone = $_POST['restaurant_contact_phone'];

   		$restaurant_contact_mobile = $_POST['restaurant_contact_mobile'];

	 	$restaurant_contact_email = $_POST['restaurant_contact_email'];

	  	$restaurant_sms_mobile = $_POST['restaurant_sms_mobile'];

	  	$restaurant_default_min_order = $_POST['restaurant_default_min_order'];

	  	$restaurant_saleTaxNo = $_POST['restaurant_saleTaxNo'];

	   	$restaurant_saleTaxDate = $_POST['restaurant_saleTaxDate'];

   		$restaurant_saleTaxPercentage = $_POST['restaurant_saleTaxPercentage'];

	 	$restaurant_credit_card_fess = $_POST['restaurant_credit_card_fess'];

	  	$restaurant_cloud_printer_email = $_POST['restaurant_cloud_printer_email'];

	  	$restaurant_cloud_printer_password = $_POST['restaurant_cloud_printer_password'];

	   	$restaurant_commission = $_POST['restaurant_commission'];

    	$restaurant_invoiceTimePeriod = $_POST['restaurant_invoiceTimePeriod'];

	 	$restaurant_Listing_date = $_POST['restaurant_Listing_date'];

	 	$restaurant_Listing_Category = $_POST['restaurant_Listing_Category'];

	  	$restaurant_address = $_POST['restaurant_address'];

	  	$restaurant_description = $_POST['restaurant_description'];

	   	$restaurant_deliveryDistance = $_POST['restaurant_deliveryDistance'];

    	$restaurant_FaxGateway = $_POST['restaurant_FaxGateway'];

	 	$restaurant_InvoiceEmail = $_POST['restaurant_InvoiceEmail'];

	 	$restaurant_OrderEmail = $_POST['restaurant_OrderEmail'];

	  	$restaurant_BookingEmail = $_POST['restaurant_BookingEmail'];

		$restaurant_FeedbackEmail = $_POST['restaurant_FeedbackEmail'];

	  	$restaurant_Video = $_POST['restaurant_Video'];

	  $carAddress = urlencode($_POST['restaurant_address']);
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$carAddress.'&sensor=false');
$output= json_decode($geocode); //Store values in variable
if($output->status == 'OK'){ // Check if address is available or not
"Latitude : ".$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
"Longitude : ".$long = $output->results[0]->geometry->location->lng; // Returns Longitude
}

	  	$restaurant_LatitudePoint = $lat;

	   	$restaurant_LongitudePoint = $long;
		

		$restaurant_avarage_deliveryTime = $_POST['restaurant_avarage_deliveryTime'];

	   	$restaurant_avarage_deliveryCost = $_POST['restaurant_avarage_deliveryCost'];

		

			$terms_condtion = $_POST['terms_condtion'];

  

 $image =$_FILES["restaurant_FaviconImg"]["name"];

$uploadedfile = $_FILES['restaurant_FaviconImg']['tmp_name'];

if ($image) 

{

$filename = stripslashes($_FILES['restaurant_FaviconImg']['name']);

$extension = getExtension($filename);

$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

  {

//echo ' Unknown Image extension ';

$errors=1;

  }

 else

{

 $size=filesize($_FILES['restaurant_FaviconImg']['tmp_name']);

 if ($size > MAX_SIZE*1024)

{

 //echo "You have exceeded the size limit";

 $errors=1;

}

 

if($extension=="jpg" || $extension=="jpeg" )

{

$uploadedfile = $_FILES['restaurant_FaviconImg']['tmp_name'];

$src = imagecreatefromjpeg($uploadedfile);

}

else if($extension=="png")

{

$uploadedfile = $_FILES['restaurant_FaviconImg']['tmp_name'];

$src = imagecreatefrompng($uploadedfile);

}

else 

{

$src = imagecreatefromgif($uploadedfile);

}

 

list($width,$height)=getimagesize($uploadedfile);



$newwidth=30;

$newheight=($height/$width)*$newwidth;

$tmp=imagecreatetruecolor($newwidth,$newheight);



$newwidth1=20;

$newheight1=($height/$width)*$newwidth1;

$tmp1=imagecreatetruecolor($newwidth1,$newheight1);



imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,

 $width,$height);



imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 

$width,$height);

$restaurant_FaviconImg=uniqid().$_FILES['restaurant_FaviconImg']['name'];



$filename = "RestaurantFaviconimg/".$restaurant_FaviconImg;

$filename1 = "RestaurantFaviconimg/small/".$restaurant_FaviconImg;







imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);



imagedestroy($src);

imagedestroy($tmp);

imagedestroy($tmp1);

}

}	

		

$image =$_FILES["restaurant_Logo"]["name"];

$uploadedfile = $_FILES['restaurant_Logo']['tmp_name'];

if ($image) 

{

$filename = stripslashes($_FILES['restaurant_Logo']['name']);

$extension = getExtension($filename);

$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

  {

//echo ' Unknown Image extension ';

$errors=1;

  }

 else

{

 $size=filesize($_FILES['restaurant_Logo']['tmp_name']);

 if ($size > MAX_SIZE*1024)

{

 //echo "You have exceeded the size limit";

 $errors=1;

}

 

if($extension=="jpg" || $extension=="jpeg" )

{

$uploadedfile = $_FILES['restaurant_Logo']['tmp_name'];

$src = imagecreatefromjpeg($uploadedfile);

}

else if($extension=="png")

{

$uploadedfile = $_FILES['restaurant_Logo']['tmp_name'];

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

$restaurant_Logo=uniqid().$_FILES['restaurant_Logo']['name'];



$filename = "restaurantlogoimg/".$restaurant_Logo;

$filename1 = "restaurantlogoimg/small/".$restaurant_Logo;







imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);



imagedestroy($src);

imagedestroy($tmp);

imagedestroy($tmp1);

}

}





$image =$_FILES["restaurant_Market_bannerImg"]["name"];

$uploadedfile = $_FILES['restaurant_Market_bannerImg']['tmp_name'];

if ($image) 

{

$filename = stripslashes($_FILES['restaurant_Market_bannerImg']['name']);

$extension = getExtension($filename);

$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

  {

//echo ' Unknown Image extension ';

$errors=1;

  }

 else

{

 $size=filesize($_FILES['restaurant_Market_bannerImg']['tmp_name']);

 if ($size > MAX_SIZE*1024)

{

 //echo "You have exceeded the size limit";

 $errors=1;

}

 

if($extension=="jpg" || $extension=="jpeg" )

{

$uploadedfile = $_FILES['restaurant_Market_bannerImg']['tmp_name'];

$src = imagecreatefromjpeg($uploadedfile);

}

else if($extension=="png")

{

$uploadedfile = $_FILES['restaurant_Market_bannerImg']['tmp_name'];

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



$newwidth1=200;

$newheight1=($height/$width)*$newwidth1;

$tmp1=imagecreatetruecolor($newwidth1,$newheight1);



imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,

 $width,$height);



imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 

$width,$height);

$restaurant_Market_bannerImg=uniqid().$_FILES['restaurant_Market_bannerImg']['name'];



$filename = "RestaurantMarketBannerimg/".$restaurant_Market_bannerImg;

$filename1 = "RestaurantMarketBannerimg/small/".$restaurant_Market_bannerImg;







imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);



imagedestroy($src);

imagedestroy($tmp);

imagedestroy($tmp1);

}

}	

	

//++++++++++++++++++++++End Restaurant Information Field+++++++++++++++++++



//++++++++++++++++++++++Restaurant Owner Field+++++++++++++++++++

$restaurant_OwnerFirstName=$_POST['restaurant_OwnerFirstName'];

$restaurant_OwnerLastName=$_POST['restaurant_OwnerLastName'];

$restaurant_OwnerLoginId=$_POST['restaurant_OwnerLoginId'];

$restaurant_OwnerLoginPassword=$_POST['restaurant_OwnerLoginPassword'];

$restaurant_OwnerLoginDOB=$_POST['restaurant_OwnerLoginDOB'];

$restaurant_OwnerAnniversaryDate=$_POST['restaurant_OwnerAnniversaryDate'];

//++++++++++++++++++++++End Restaurant Owner Field+++++++++++++++++++



//++++++++++++++++++++++Restaurant Bank Information Field+++++++++++++++++++

$restaurant_BankACName=$_POST['restaurant_BankACName'];

$restaurant_BankACType=$_POST['restaurant_BankACType'];

$restaurant_BankName=$_POST['restaurant_BankName'];

$restaurant_BankACNo=$_POST['restaurant_BankACNo'];

$restaurant_BankNEFTCode=$_POST['restaurant_BankNEFTCode'];

$restaurant_BankSwiftCode=$_POST['restaurant_BankSwiftCode'];

$restaurant_BankAddress=$_POST['restaurant_BankAddress'];



//++++++++++++++++++++++End Restaurant Bank Information Field+++++++++++++++++++





//++++++++++++++++++++++Restaurant SEO Field+++++++++++++++++++

$restaurant_MetaTitle=$_POST['restaurant_MetaTitle'];

$restaurant_MetaKeyword=$_POST['restaurant_MetaKeyword'];

$restaurant_MetaDescription=$_POST['restaurant_MetaDescription'];



//++++++++++++++++++++++Restaurant SEO Field+++++++++++++++++++



$restaurantCity=$_POST['restaurant_city'];
$restaurantState=$_POST['restaurant_state'];
$preOrdersupport = $_POST['preOrdersupport'];








// Payment Setting & GPRS with SMS Setting
$CoundPrinter=$_POST['CoundPrinter'];
$restaurant_cloud_printer_email=$_POST['restaurant_cloud_printer_email'];
$restaurant_cloud_printer_password = $_POST['restaurant_cloud_printer_password'];
$SMSOption=$_POST['SMSOption'];
$restaurant_sms_api_id=$_POST['restaurant_sms_api_id'];
$restaurant_sms_api_url = $_POST['restaurant_sms_api_url'];
$restaurant_sms_api_user_name=$_POST['restaurant_sms_api_user_name'];
$restaurant_sms_api_user_password=$_POST['restaurant_sms_api_user_password'];
$restaurant_sms_api_sender_id = $_POST['restaurant_sms_api_sender_id'];
$GPRSPrinterOption=$_POST['GPRSPrinterOption'];
$restaurant_gprs_apn_no=$_POST['restaurant_gprs_apn_no'];
$restaurant_gprs_apn_ip = $_POST['restaurant_gprs_apn_ip'];
$restaurant_gprs_apn_port=$_POST['restaurant_gprs_apn_port'];
$restaurant_gprs_apn_username=$_POST['restaurant_gprs_apn_username'];
$restaurant_gprs_apn_password = $_POST['restaurant_gprs_apn_password'];
$restaurant_gprs_apn_printer_id=$_POST['restaurant_gprs_apn_printer_id'];
$restaurant_gprs_apn_printer_speed=$_POST['restaurant_gprs_apn_printer_speed'];
$restaurant_gprs_apn_printer_IMEI_code = $_POST['restaurant_gprs_apn_printer_IMEI_code'];
$restaurant_gprs_apn_printer_product_model=$_POST['restaurant_gprs_apn_printer_product_model'];
$restaurant_gprs_apn_printer_file_path=$_POST['restaurant_gprs_apn_printer_file_path'];
$PaypalPayment = $_POST['PaypalPayment'];
$restaurant_paypal_url = $_POST['restaurant_paypal_url'];
$restaurant_paypal_business_account = $_POST['restaurant_paypal_business_account'];
$AuthorizednetPayment = $_POST['AuthorizednetPayment'];
$restaurant_Authorizednet_url = $_POST['restaurant_Authorizednet_url'];
$restaurant_Authorizednet_login_key = $_POST['restaurant_Authorizednet_login_key'];
$restaurant_Authorizednet_transid_key = $_POST['restaurant_Authorizednet_transid_key'];

$restaurant_OwnerLoginAddress = $_POST['restaurant_OwnerLoginAddress'];
$restaurant_OwnerLoginEmail = $_POST['restaurant_OwnerLoginEmail'];
$restaurant_OwnerLoginMobile = $_POST['restaurant_OwnerLoginMobile'];
$BookaTablesupport = $_POST['BookaTablesupport'];
$tableLimit = $_POST['tableLimit'];
$restaurant_commissionType = $_POST['restaurant_commissionType'];
$offerType = $_POST['offerType'];
$loyality_setting = $_POST['loyality_setting'];
	$loyality_limit = $_POST['loyality_limit'];	
	
$UserInsert = $db->storeAddRestaurant($restaurant_type,$restaurant_service,$restaurant_name,$restaurant_phone,$restaurant_website,$restaurant_fax,$restaurant_cuisine,$restaurant_facilities,$restaurant_contact_name,$restaurant_contact_phone,$restaurant_contact_mobile,$restaurant_contact_email,$restaurant_social_media,$restaurant_sms_mobile,$restaurant_default_min_order,$restaurant_saleTaxNo,$restaurant_saleTaxDate,$restaurant_saleTaxPercentage,$restaurant_payment_method,$restaurant_credit_card_fess,$restaurant_cloud_printer_email,$restaurant_cloud_printer_password,$restaurant_commission,$restaurant_invoiceTimePeriod,$restaurant_Listing_date,$restaurant_Listing_Category,$restaurant_address,$restaurant_description,$restaurant_deliveryDistance,$restaurant_FaxGateway,$restaurant_InvoiceEmail,$restaurant_OrderEmail,$restaurant_BookingEmail,$restaurant_FeedbackEmail,$restaurant_Logo,$restaurant_Market_bannerImg,$restaurant_Video,$restaurant_FaviconImg,$restaurant_LatitudePoint,$restaurant_LongitudePoint,$restaurantCity,$restaurantState,$terms_condtion,$restaurant_avarage_deliveryTime,$restaurant_avarage_deliveryCost,$preOrdersupport,$BookaTablesupport,$offerType,$convenience_fee,$loyality_setting,$loyality_limit);





$restaurant_insertID=mysql_insert_id();

mysql_query("INSERT INTO `tbl_restbuffetTime` (`id`, `restaurant_id`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_restalcoholTime` (`id`, `restaurant_id`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_restDeliveryTime` (`id`, `restaurant_id`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_resttablebookingTime` (`id`, `restaurant_id`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_restTakeawayTime` (`id`, `restaurant_id`) VALUES (NULL, '$restaurant_insertID')");

mysql_query("INSERT INTO `tbl_restbuffetTime24` (`id`, `restaurantID`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_restalcoholTime24` (`id`, `restaurantID`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_restDeliveryTime24` (`id`, `restaurantID`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_resttablebookingTime24` (`id`, `restaurantID`) VALUES (NULL, '$restaurant_insertID')");
mysql_query("INSERT INTO `tbl_restTakeawayTime24` (`id`, `restaurantID`) VALUES (NULL, '$restaurant_insertID')");

  //++++++++++++++++++++++Restaurant Owner Query+++++++++++++++++++



$INsertGRPSp=mysql_query("INSERT INTO `tbl_restaurantPayment_grps_sms` (`id`, `restaurant_id`, `CoundPrinter`, `restaurant_cloud_printer_email`, `restaurant_cloud_printer_password`, `SMSOption`, `restaurant_sms_api_id`, `restaurant_sms_api_url`, `restaurant_sms_api_user_name`, `restaurant_sms_api_user_password`, `restaurant_sms_api_sender_id`, `GPRSPrinterOption`, `restaurant_gprs_apn_no`, `restaurant_gprs_apn_ip`, `restaurant_gprs_apn_port`, `restaurant_gprs_apn_username`, `restaurant_gprs_apn_password`, `restaurant_gprs_apn_printer_id`, `restaurant_gprs_apn_printer_speed`, `restaurant_gprs_apn_printer_IMEI_code`, `restaurant_gprs_apn_printer_product_model`, `restaurant_gprs_apn_printer_file_path`, `PaypalPayment`, `restaurant_paypal_url`, `restaurant_paypal_business_account`, `AuthorizednetPayment`, `restaurant_Authorizednet_url`, `restaurant_Authorizednet_login_key`, `restaurant_Authorizednet_transid_key`) VALUES (NULL, '$restaurant_insertID', '$CoundPrinter', '$restaurant_cloud_printer_email', '$restaurant_cloud_printer_password', '$SMSOption', '$restaurant_sms_api_id', '$restaurant_sms_api_url', '$restaurant_sms_api_user_name', '$restaurant_sms_api_user_password', '$restaurant_sms_api_sender_id', '$GPRSPrinterOption', '$restaurant_gprs_apn_no', '$restaurant_gprs_apn_ip', '$restaurant_gprs_apn_port', '$restaurant_gprs_apn_username', '$restaurant_gprs_apn_password', '$restaurant_gprs_apn_printer_id', '$restaurant_gprs_apn_printer_speed', '$restaurant_gprs_apn_printer_IMEI_code', '$restaurant_gprs_apn_printer_product_model', '$restaurant_gprs_apn_printer_file_path', '$PaypalPayment', '$restaurant_paypal_url', '$restaurant_paypal_business_account', '$AuthorizednetPayment', '$restaurant_Authorizednet_url', '$restaurant_Authorizednet_login_key', '$restaurant_Authorizednet_transid_key')");




  $OwnerInsert = $db->storeAddRestaurantOwner2($restaurant_insertID,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate,$restaurant_OwnerLoginAddress,$restaurant_OwnerLoginEmail,$restaurant_OwnerLoginMobile);

  $owner_insertID=mysql_insert_id();

  

$to=$_POST['restaurant_contact_email'].','.$_POST['restaurant_OwnerLoginEmail'].','.$RegistrationDataLoginVal['registrationemail'];

$subject ='Welcome To '.$AdminDataLoginVal['website_name'].' Restaurant Owner Panel Mr.'.$_POST['restaurant_contact_email'];

$from=$RegistrationDataLoginVal['registrationemail'];

$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>

<head>

<META http-equiv='Content-Type' content='text/html; charset=UTF-8'>

<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>

<title>".$AdminDataLoginVal['website_name']."- Registration Owner Panel</title>

</head>

<body><table cellpadding='0' cellspacing='0' border='0' align='center' style='width:100%;background-color:#f6f6f6;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a;padding:0;margin:0 auto'>

<tbody>

<tr>

<td>

<table cellpadding='0' cellspacing='0' align='center' style='width:635px;background-color:#fdfdfd;padding:0;margin:0 auto;border:1px solid #ccc'>

<tbody>



<tr>

<td>

<p style='padding:20px 0 0 20px;margin-bottom:1em;margin-left:20px;margin-top:20px;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>

                          Hi ".$_POST['restaurant_OwnerFirstName']." ".$_POST['restaurant_OwnerLastName'].",

                        </p>

<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>

                          Just a quick email to welcome you to 

                          <a href='".$DomainName."' style='text-decoration:none;color:#000;font-weight:bold' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a>.

                        </p>

                        <p style='padding:0 10px 0 20px;margin-bottom:1em;margin-left:20px;margin-right:20px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;line-height:1.3em'>

                        You restaurant order has been successfully created . kindly see login detail for your restaurant control panel 

                        </p>

<table cellspacing='0' cellpadding='0' align='center' style='width:558px;margin:0 auto;padding:0'>

<tbody>

<tr>

<td bgcolor='#e9f5c5' style='padding:7px;padding-left:10px'>

<h1 style='font-size:18px;font-weight:normal;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;padding:0;margin:0'>

<span style='font-weight:bold'>Your username is: </span><span style='font-weight:normal;color:#343434;text-decoration:none'><a href='mailto:".$_POST['restaurant_contact_email']."' target='_blank'>".$_POST['restaurant_OwnerLoginId']."</a></span><br>

<span style='font-weight:bold'>Your Password is: </span><span style='font-weight:normal;color:#343434;text-decoration:none'><a href='mailto:".$_POST['restaurant_contact_email']."' target='_blank'>".$_POST['restaurant_OwnerLoginPassword']."</a></span>

</h1>

</td>

</tr>

<tr>

<td height='10' colspan='3'><span style='font-weight:normal;color:#343434;text-decoration:none'><a href='".$DomainName."restaurantOwnerPanel/' target='_blank'>Click here to login</a></span></td>

</tr>

<tr>

<td height='10' colspan='3'></td>

</tr>

</tbody>

</table>

<p style='padding:10px 10px 0 20px;margin-bottom:1em;margin-left:20px;margin-right:20px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a'>

                         Don't forget to follow us now on <a href='' style='font-weight:bold;color:#343434;text-decoration:none' target='_blank'>Facebook</a> and <a href='' style='font-weight:bold;color:#343434;text-decoration:none' target='_blank'>Twitter</a> for great specials and competitions.

                        </p>

<p style='padding:10px 0 0 20px;margin:0;margin-left:20px;line-height:17px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a'>Best regards, <br>

												The ".$AdminDataLoginVal['website_name']." Team.</p>

</td>

</tr>

<tr>

<td>

<p style='padding:30px 0 0 20px;margin:0;margin-left:20px;line-height:17px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;font-weight:bold'>E: 

												<a href='mailto:".$RegistrationDataLoginVal['supportemail']."' style='font-weight:bold;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;text-decoration:none' target='_blank'>".$RegistrationDataLoginVal['supportemail']."</a>

<br>

												P: ".$AdminDataLoginVal['website_callUsNo']."

											<br>

											".$AdminDataLoginVal['website_name'].",".$AdminDataLoginVal['website_Address'].",".$AdminDataLoginVal['website_City'].",".$AdminDataLoginVal['website_Zipcode'].",".$AdminDataLoginVal['website_Country']."

												</p>

<p style='text-align:center;margin:0;padding:5px;border:none'>

<a href='https://www.facebook.com/pages/PHP-EXPERT-GROUP/365479363587088' style='border:none' target='_blank'><img src='http://static.eatnow.com.au/emailimg/likeus.jpg' width='204' height='70' border='0' alt='Like PrixEat on Facebook!'></a>

</p>

</td>

</tr>

</tbody>

</table>

</td>

</tr>

</tbody>

";

	$message .= "</table></body></html>";

	$headers = "MIME-Version: 1.0\n";

	$headers .= "Content-type: text/html; charset=windows-874\n";

	$headers .= "From: $from  \r\n" .

	$headers .= "X-Priority: 1\r\n"; 

	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";

	$headers .= "X-MSMail-Priority: High\r\n"; 

	$headers .= "X-Mailer: Just My Server"; 

	mail($to, $subject, $message, $headers);

  $restaurantCity=$_POST['restaurant_city'];

$restaurantState=$_POST['restaurant_state'];

  
  if($_POST['seleted']!='') {

	$id_array = $_POST['seleted']; // return array

	$id_count = count($_POST['seleted']); // count array

	for($i=0; $i <$id_count; $i++) {
$id = $id_array[$i];

	$DeliveryData = mysql_fetch_assoc(mysql_query("select *  FROM `tbl_PostcodeArea` WHERE `id` = '$id'"));
	
	mysql_query("insert into tbl_restaurantDeliveryArea(restaurant_id,restaurant_country,restaurant_state,restaurant_city,restaurant_postcode,restaurant_delivery_area,restaurant_delivery_charge,	restaurant_minimum_order,restaurant_shipping_charge,restaurant_postcodelatitude,restaurant_postcodelongitude) values('".$restaurant_insertID."','".$countryID."','".$restaurantState."','".$restaurantCity."','".$DeliveryData['postcode']."','".$DeliveryData['delivery_areaName']."','".$DeliveryData['delivery_charge']."','".$DeliveryData['minimum_order']."','".$DeliveryData['shipping_charge']."','".$DeliveryData['postcodelatitude']."','".$DeliveryData['postcodelongitude']."')");

}

	 // redirent after deleting

}
  

/*if($_POST['seleted']!='') 

  {

	$id_array = $_POST['seleted']; // return array

	$id_count = count($_POST['seleted']); // count array

	for($i=1; $i <$id_count; $i++) {

	

	       $restaurant_postcode=$_POST["restaurant_postcode".$i];

		    $restaurant_delivery_area=$_POST["restaurant_delivery_area".$i];

		   $restaurant_delivery_charge=$_POST["restaurant_delivery_charge".$i];

		    $restaurant_minimum_order=$_POST["restaurant_minimum_order".$i];

		     $restaurant_shipping_charge=$_POST["restaurant_shipping_charge".$i];
			  $restaurant_postcodelatitude=$_POST["restaurant_postcodelatitude".$i];
			   $restaurant_postcodelongitude=$_POST["restaurant_postcodelongitude".$i];

			

   $DeliveryAddQuery = $db->storeAddResDeliveryArea($restaurant_insertID,$countryID,$restaurantState,$restaurantCity,$restaurant_postcode,$restaurant_delivery_area,$restaurant_delivery_charge,$restaurant_minimum_order,$restaurant_shipping_charge,$restaurant_postcodelatitude,$restaurant_postcodelongitude);

		

		}

	 // redirent after deleting

}
*/


  

  

  //++++++++++++++++++++++Restaurant Owner Query End+++++++++++++++++++

  

  //++++++++++++++++++++++Restaurant Bank Query+++++++++++++++++++ 

  $BankInsert = $db-> storeAddRestaurantBank($restaurant_BankACName,$restaurant_BankACType,$restaurant_BankName,$restaurant_BankACNo,$restaurant_BankNEFTCode,$restaurant_BankSwiftCode,$restaurant_BankAddress,$restaurant_insertID);

  //++++++++++++++++++++++Restaurant Bank Query+++++++++++++++++++

  

  //++++++++++++++++++++++Restaurant SEO Query+++++++++++++++++++ 

 $SEOInsert= $db->storeAddRestaurantSEO($restaurant_insertID,$restaurant_MetaTitle,$restaurant_MetaKeyword,$restaurant_MetaDescription);

 if($UserInsert)

  {

  

  //++++++++++++++++++++++Restaurant SEO Query+++++++++++++++++++

  

 header("location:add_new_restaurant.php?msg=1");

  }

  else

  {

 header("location:add_new_restaurant.php?error=1");

  }

}

if($_GET['tag']=='RestaurantEdit') {

 //++++++++++++++++++++++Restaurant Information Field+++++++++++++++++++

    	if($_POST['restaurant_type']!='')
		{
    	$restaurant_type = implode(',',$_POST['restaurant_type']);

}

   		$restaurant_name = $_POST['restaurant_name'];

 		$restaurant_phone = $_POST['restaurant_phone'];

		$restaurant_website = $_POST['restaurant_website'];

    	$restaurant_fax = $_POST['restaurant_fax'];

	  	$restaurant_contact_name = $_POST['restaurant_contact_name'];

	   	$restaurant_contact_phone = $_POST['restaurant_contact_phone'];

   		$restaurant_contact_mobile = $_POST['restaurant_contact_mobile'];

	 	$restaurant_contact_email = $_POST['restaurant_contact_email'];

	  	$restaurant_sms_mobile = $_POST['restaurant_sms_mobile'];

	  	$restaurant_default_min_order = $_POST['restaurant_default_min_order'];

	  	$restaurant_saleTaxNo = $_POST['restaurant_saleTaxNo'];

	   	$restaurant_saleTaxDate = $_POST['restaurant_saleTaxDate'];

   		$restaurant_saleTaxPercentage = $_POST['restaurant_saleTaxPercentage'];

	 	$restaurant_credit_card_fess = $_POST['restaurant_credit_card_fess'];

	  	$restaurant_cloud_printer_email = $_POST['restaurant_cloud_printer_email'];

	  	$restaurant_cloud_printer_password = $_POST['restaurant_cloud_printer_password'];

	   	$restaurant_commission = $_POST['restaurant_commission'];

    	$restaurant_invoiceTimePeriod = $_POST['restaurant_invoiceTimePeriod'];

	 	$restaurant_Listing_date = $_POST['restaurant_Listing_date'];

	 	$restaurant_Listing_Category = $_POST['restaurant_Listing_Category'];

	  	$restaurant_address = $_POST['restaurant_address'];

	  	$restaurant_description = $_POST['restaurant_description'];

	   	$restaurant_deliveryDistance = $_POST['restaurant_deliveryDistance'];

    	$restaurant_FaxGateway = $_POST['restaurant_FaxGateway'];

	 	$restaurant_InvoiceEmail = $_POST['restaurant_InvoiceEmail'];

	 	$restaurant_OrderEmail = $_POST['restaurant_OrderEmail'];

	  	$restaurant_BookingEmail = $_POST['restaurant_BookingEmail'];

		$restaurant_FeedbackEmail = $_POST['restaurant_FeedbackEmail'];

	  	$restaurant_Video = $_POST['restaurant_Video'];

	  		$carAddress = urlencode($_POST['restaurant_address']);
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$carAddress.'&sensor=false');
$output= json_decode($geocode); //Store values in variable
if($output->status == 'OK'){ // Check if address is available or not
"Latitude : ".$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
"Longitude : ".$long = $output->results[0]->geometry->location->lng; // Returns Longitude
}

	  	$restaurant_LatitudePoint = $lat;

	   	$restaurant_LongitudePoint = $long;

		

		if($_POST['restaurant_service']!=''){

  		 $restaurant_service = implode(',',$_POST['restaurant_service']);

		 }

		 else

		 {

		 $restaurant_service =$_POST['restaurant_serviceold'];

		 }

		if($_POST['restaurant_cuisine']!=''){

  		 $restaurant_cuisine = implode(',',$_POST['restaurant_cuisine']);

		 }

		 else

		 {

		 $restaurant_cuisine =$_POST['restaurant_cuisineold'];

		 }

		 

		 if($_POST['restaurant_facilities']!=''){

  		 $restaurant_facilities = implode(',',$_POST['restaurant_facilities']);

		 }

		 else

		 {

		 $restaurant_facilities =$_POST['restaurant_facilitiesold'];

		 }

		 

		 if($_POST['restaurant_payment_method']!=''){

  		 $restaurant_payment_method = implode(',',$_POST['restaurant_payment_method']);

		 }

		 else
		 {
		 $restaurant_payment_method ="Cash on Delivery";
		 }

		 

		 if($_POST['restaurant_social_media']!=''){

  		 $restaurant_social_media = implode(',',$_POST['restaurant_social_media']);

		 }

		 else

		 {

		 $restaurant_social_media =$_POST['restaurant_social_mediaold'];

		 }

  


  

   $image =$_FILES["restaurant_FaviconImg"]["name"];

$uploadedfile = $_FILES['restaurant_FaviconImg']['tmp_name'];

if ($image) 

{

$filename = stripslashes($_FILES['restaurant_FaviconImg']['name']);

$extension = getExtension($filename);

$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

  {

//echo ' Unknown Image extension ';

$errors=1;

  }

 else

{

 $size=filesize($_FILES['restaurant_FaviconImg']['tmp_name']);

 if ($size > MAX_SIZE*1024)

{

 //echo "You have exceeded the size limit";

 $errors=1;

}

 

if($extension=="jpg" || $extension=="jpeg" )

{

$uploadedfile = $_FILES['restaurant_FaviconImg']['tmp_name'];

$src = imagecreatefromjpeg($uploadedfile);

}

else if($extension=="png")

{

$uploadedfile = $_FILES['restaurant_FaviconImg']['tmp_name'];

$src = imagecreatefrompng($uploadedfile);

}

else 

{

$src = imagecreatefromgif($uploadedfile);

}

 

list($width,$height)=getimagesize($uploadedfile);



$newwidth=30;

$newheight=($height/$width)*$newwidth;

$tmp=imagecreatetruecolor($newwidth,$newheight);



$newwidth1=20;

$newheight1=($height/$width)*$newwidth1;

$tmp1=imagecreatetruecolor($newwidth1,$newheight1);



imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,

 $width,$height);



imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 

$width,$height);

$restaurant_FaviconImg=uniqid().$_FILES['restaurant_FaviconImg']['name'];



$filename = "RestaurantFaviconimg/".$restaurant_FaviconImg;

$filename1 = "RestaurantFaviconimg/small/".$restaurant_FaviconImg;







imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);



imagedestroy($src);

imagedestroy($tmp);

imagedestroy($tmp1);

}

}

else

		{

				$restaurant_FaviconImg=$_POST['restaurant_FaviconImgold'];

		}	

		

$image =$_FILES["restaurant_Logo"]["name"];

$uploadedfile = $_FILES['restaurant_Logo']['tmp_name'];

if ($image) 

{

$filename = stripslashes($_FILES['restaurant_Logo']['name']);

$extension = getExtension($filename);

$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

  {

//echo ' Unknown Image extension ';

$errors=1;

  }

 else

{

 $size=filesize($_FILES['restaurant_Logo']['tmp_name']);

 if ($size > MAX_SIZE*1024)

{

 //echo "You have exceeded the size limit";

 $errors=1;

}

 

if($extension=="jpg" || $extension=="jpeg" )

{

$uploadedfile = $_FILES['restaurant_Logo']['tmp_name'];

$src = imagecreatefromjpeg($uploadedfile);

}

else if($extension=="png")

{

$uploadedfile = $_FILES['restaurant_Logo']['tmp_name'];

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

$restaurant_Logo=uniqid().$_FILES['restaurant_Logo']['name'];



$filename = "restaurantlogoimg/".$restaurant_Logo;

$filename1 = "restaurantlogoimg/small/".$restaurant_Logo;







imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);



imagedestroy($src);

imagedestroy($tmp);

imagedestroy($tmp1);

}

}

else

		{

				$restaurant_Logo=$_POST['restaurant_Logoold'];

		}





$image =$_FILES["restaurant_Market_bannerImg"]["name"];

$uploadedfile = $_FILES['restaurant_Market_bannerImg']['tmp_name'];

if ($image) 

{

$filename = stripslashes($_FILES['restaurant_Market_bannerImg']['name']);

$extension = getExtension($filename);

$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 

  {

//echo ' Unknown Image extension ';

$errors=1;

  }

 else

{

 $size=filesize($_FILES['restaurant_Market_bannerImg']['tmp_name']);

 if ($size > MAX_SIZE*1024)

{

 //echo "You have exceeded the size limit";

 $errors=1;

}

 

if($extension=="jpg" || $extension=="jpeg" )

{

$uploadedfile = $_FILES['restaurant_Market_bannerImg']['tmp_name'];

$src = imagecreatefromjpeg($uploadedfile);

}

else if($extension=="png")

{

$uploadedfile = $_FILES['restaurant_Market_bannerImg']['tmp_name'];

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



$newwidth1=200;

$newheight1=($height/$width)*$newwidth1;

$tmp1=imagecreatetruecolor($newwidth1,$newheight1);



imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,

 $width,$height);



imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 

$width,$height);

$restaurant_Market_bannerImg=uniqid().$_FILES['restaurant_Market_bannerImg']['name'];



$filename = "RestaurantMarketBannerimg/".$restaurant_Market_bannerImg;

$filename1 = "RestaurantMarketBannerimg/small/".$restaurant_Market_bannerImg;







imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);



imagedestroy($src);

imagedestroy($tmp);

imagedestroy($tmp1);

}

}

else

		{

				$restaurant_Market_bannerImg=$_POST['restaurant_Market_bannerImgold'];

		}

	

	

  

//++++++++++++++++++++++End Restaurant Information Field+++++++++++++++++++



//++++++++++++++++++++++Restaurant Owner Field+++++++++++++++++++

$restaurant_OwnerFirstName=$_POST['restaurant_OwnerFirstName'];

$restaurant_OwnerLastName=$_POST['restaurant_OwnerLastName'];

$restaurant_OwnerLoginId=$_POST['restaurant_OwnerLoginId'];

$restaurant_OwnerLoginPassword=$_POST['restaurant_OwnerLoginPassword'];

$restaurant_OwnerLoginDOB=$_POST['restaurant_OwnerLoginDOB'];

$restaurant_OwnerAnniversaryDate=$_POST['restaurant_OwnerAnniversaryDate'];

//++++++++++++++++++++++End Restaurant Owner Field+++++++++++++++++++



//++++++++++++++++++++++Restaurant Bank Information Field+++++++++++++++++++

$restaurant_BankACName=$_POST['restaurant_BankACName'];

$restaurant_BankACType=$_POST['restaurant_BankACType'];

$restaurant_BankName=$_POST['restaurant_BankName'];

$restaurant_BankACNo=$_POST['restaurant_BankACNo'];

$restaurant_BankNEFTCode=$_POST['restaurant_BankNEFTCode'];

$restaurant_BankSwiftCode=$_POST['restaurant_BankSwiftCode'];

$restaurant_BankAddress=$_POST['restaurant_BankAddress'];



//++++++++++++++++++++++End Restaurant Bank Information Field+++++++++++++++++++





//++++++++++++++++++++++Restaurant SEO Field+++++++++++++++++++

$restaurant_MetaTitle=$_POST['restaurant_MetaTitle'];

$restaurant_MetaKeyword=$_POST['restaurant_MetaKeyword'];

$restaurant_MetaDescription=$_POST['restaurant_MetaDescription'];



//++++++++++++++++++++++Restaurant SEO Field+++++++++++++++++++



$restaurantCity=$_POST['restaurant_city'];

$restaurantState=$_POST['restaurant_state'];

$terms_condtion = $_POST['terms_condtion'];



$restaurant_avarage_deliveryTime = $_POST['restaurant_avarage_deliveryTime'];

$restaurant_avarage_deliveryCost = $_POST['restaurant_avarage_deliveryCost'];

$preOrdersupport = $_POST['preOrdersupport'];

	
// Payment Setting & GPRS with SMS Setting
$CoundPrinter=$_POST['CoundPrinter'];
$restaurant_cloud_printer_email=$_POST['restaurant_cloud_printer_email'];
$restaurant_cloud_printer_password = $_POST['restaurant_cloud_printer_password'];
$SMSOption=$_POST['SMSOption'];
$restaurant_sms_api_id=$_POST['restaurant_sms_api_id'];
$restaurant_sms_api_url = $_POST['restaurant_sms_api_url'];
$restaurant_sms_api_user_name=$_POST['restaurant_sms_api_user_name'];
$restaurant_sms_api_user_password=$_POST['restaurant_sms_api_user_password'];
$restaurant_sms_api_sender_id = $_POST['restaurant_sms_api_sender_id'];
$GPRSPrinterOption=$_POST['GPRSPrinterOption'];
$restaurant_gprs_apn_no=$_POST['restaurant_gprs_apn_no'];
$restaurant_gprs_apn_ip = $_POST['restaurant_gprs_apn_ip'];
$restaurant_gprs_apn_port=$_POST['restaurant_gprs_apn_port'];
$restaurant_gprs_apn_username=$_POST['restaurant_gprs_apn_username'];
$restaurant_gprs_apn_password = $_POST['restaurant_gprs_apn_password'];
$restaurant_gprs_apn_printer_id=$_POST['restaurant_gprs_apn_printer_id'];
$restaurant_gprs_apn_printer_speed=$_POST['restaurant_gprs_apn_printer_speed'];
$restaurant_gprs_apn_printer_IMEI_code = $_POST['restaurant_gprs_apn_printer_IMEI_code'];
$restaurant_gprs_apn_printer_product_model=$_POST['restaurant_gprs_apn_printer_product_model'];
$restaurant_gprs_apn_printer_file_path=$_POST['restaurant_gprs_apn_printer_file_path'];
$PaypalPayment = $_POST['PaypalPayment'];
$restaurant_paypal_url = $_POST['restaurant_paypal_url'];
$restaurant_paypal_business_account = $_POST['restaurant_paypal_business_account'];
$AuthorizednetPayment = $_POST['AuthorizednetPayment'];
$restaurant_Authorizednet_url = $_POST['restaurant_Authorizednet_url'];
$restaurant_Authorizednet_login_key = $_POST['restaurant_Authorizednet_login_key'];
$restaurant_Authorizednet_transid_key = $_POST['restaurant_Authorizednet_transid_key'];	

$restaurant_OwnerLoginAddress = $_POST['restaurant_OwnerLoginAddress'];
$restaurant_OwnerLoginEmail = $_POST['restaurant_OwnerLoginEmail'];
$restaurant_OwnerLoginMobile = $_POST['restaurant_OwnerLoginMobile'];
$BookaTablesupport = $_POST['BookaTablesupport'];
$offerType = $_POST['offerType'];
$convenience_fee = $_POST['convenience_fee'];
$loyality_setting = $_POST['loyality_setting'];
$loyality_limit = $_POST['loyality_limit'];
$UserInsert = $db->storeUpdateRestaurant($restaurant_type,$restaurant_service,$restaurant_name,$restaurant_phone,$restaurant_website,$restaurant_fax,$restaurant_cuisine,$restaurant_facilities,$restaurant_contact_name,$restaurant_contact_phone,$restaurant_contact_mobile,$restaurant_contact_email,$restaurant_social_media,$restaurant_sms_mobile,$restaurant_default_min_order,$restaurant_saleTaxNo,$restaurant_saleTaxDate,$restaurant_saleTaxPercentage,$restaurant_payment_method,$restaurant_credit_card_fess,$restaurant_cloud_printer_email,$restaurant_cloud_printer_password,$restaurant_commission,$restaurant_invoiceTimePeriod,$restaurant_Listing_date,$restaurant_Listing_Category,$restaurant_address,$restaurant_description,$restaurant_deliveryDistance,$restaurant_FaxGateway,$restaurant_InvoiceEmail,$restaurant_OrderEmail,$restaurant_BookingEmail,$restaurant_FeedbackEmail,$restaurant_Logo,$restaurant_Market_bannerImg,$restaurant_Video,$restaurant_FaviconImg,$restaurant_LatitudePoint,$restaurant_LongitudePoint,$restaurantCity,$restaurantState,$terms_condtion,$restaurant_avarage_deliveryTime,$restaurant_avarage_deliveryCost,$preOrdersupport,$BookaTablesupport,$offerType,$convenience_fee,$loyality_setting,$loyality_limit,$_GET['eid']);

$restaurant_insertID=$_GET['eid'];

  //++++++++++++++++++++++Restaurant Owner Query+++++++++++++++++++

  $PyamentGPRSSettingSMS=mysql_query("UPDATE `tbl_restaurantPayment_grps_sms` SET `CoundPrinter` = '$CoundPrinter', `restaurant_cloud_printer_email` = '$restaurant_cloud_printer_email', `restaurant_cloud_printer_password` = '$restaurant_cloud_printer_password', `SMSOption` = '$SMSOption', `restaurant_sms_api_id` = '$restaurant_sms_api_id', `restaurant_sms_api_url` = '$restaurant_sms_api_url', `restaurant_sms_api_user_name` = '$restaurant_sms_api_user_name', `restaurant_sms_api_user_password` = '$restaurant_sms_api_user_password', `restaurant_sms_api_sender_id` = '$restaurant_sms_api_sender_id', `GPRSPrinterOption` = '$GPRSPrinterOption', `restaurant_gprs_apn_no` = '$restaurant_gprs_apn_no', `restaurant_gprs_apn_ip` = '$restaurant_gprs_apn_ip', `restaurant_gprs_apn_port` = '$restaurant_gprs_apn_port', `restaurant_gprs_apn_username` = '$restaurant_gprs_apn_username', `restaurant_gprs_apn_password` = '$restaurant_gprs_apn_password', `restaurant_gprs_apn_printer_id` = '$restaurant_gprs_apn_printer_id', `restaurant_gprs_apn_printer_speed` = '$restaurant_gprs_apn_printer_speed', `restaurant_gprs_apn_printer_IMEI_code` = '$restaurant_gprs_apn_printer_IMEI_code', `restaurant_gprs_apn_printer_product_model` = '$restaurant_gprs_apn_printer_product_model', `restaurant_gprs_apn_printer_file_path` = '$restaurant_gprs_apn_printer_file_path', `PaypalPayment` = '$PaypalPayment', `restaurant_paypal_url` = '$restaurant_paypal_url', `restaurant_paypal_business_account` = '$restaurant_paypal_business_account', `AuthorizednetPayment` = '$AuthorizednetPayment', `restaurant_Authorizednet_url` = '$restaurant_Authorizednet_url', `restaurant_Authorizednet_login_key` = '$restaurant_Authorizednet_login_key', `restaurant_Authorizednet_transid_key` = '$restaurant_Authorizednet_transid_key' WHERE `restaurant_id` ='".$restaurant_insertID."'");

  $OwnerInsert = $db-> storeUpdateRestaurantOwner2($restaurant_insertID,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate,$restaurant_OwnerLoginAddress,$restaurant_OwnerLoginEmail,$restaurant_OwnerLoginMobile);

  

 

  //$owner_insertID=mysql_insert_id();

  


  if($_POST['seleted']!='') {

	$id_array = $_POST['seleted']; // return array

	$id_count = count($_POST['seleted']); // count array

	for($i=0; $i <$id_count; $i++) {
$id = $id_array[$i];

	$DeliveryData = mysql_fetch_assoc(mysql_query("select *  FROM `tbl_PostcodeArea` WHERE `id` = '$id'"));
	
	mysql_query("insert into tbl_restaurantDeliveryArea(restaurant_id,restaurant_country,restaurant_state,restaurant_city,restaurant_postcode,restaurant_delivery_area,restaurant_delivery_charge,	restaurant_minimum_order,restaurant_shipping_charge,restaurant_postcodelatitude,restaurant_postcodelongitude) values('".$restaurant_insertID."','".$countryID."','".$restaurantState."','".$restaurantCity."','".$DeliveryData['postcode']."','".$DeliveryData['delivery_areaName']."','".$DeliveryData['delivery_charge']."','".$DeliveryData['minimum_order']."','".$DeliveryData['shipping_charge']."','".$DeliveryData['postcodelatitude']."','".$DeliveryData['postcodelongitude']."')");

}

	 // redirent after deleting

}
//$lk=explode(',',$_POST['alreadyID']);
//print_r($_POST['alreadyID']);
/*if($_POST['alreadyID']!='')
{
if($_POST['seleted']!='') {

	$id_array = $_POST['seleted']; // return array

	$id_count = count($_POST['seleted']); // count array

	for($i=1; $i <$id_count; $i++) {

	

	 $restaurant_postcode1=$_POST["restaurant_postcode1".$i];

		   $restaurant_delivery_area1=$_POST["restaurant_delivery_area1".$i];

		   $restaurant_delivery_charge1=$_POST["restaurant_delivery_charge1".$i];

		   $restaurant_minimum_order1=$_POST["restaurant_minimum_order1".$i];

		    $restaurant_shipping_charge1=$_POST["restaurant_shipping_charge1".$i];
			$restaurant_postcodelatitude1=$_POST["restaurant_postcodelatitude1".$i];
			   $restaurant_postcodelongitude1=$_POST["restaurant_postcodelongitude1".$i];
			   mysql_query("update tbl_restaurantDeliveryArea set restaurant_postcode='".$restaurant_postcode1."' ,restaurant_delivery_area='".$restaurant_delivery_area1."' ,restaurant_delivery_charge='".$restaurant_delivery_charge1."' ,restaurant_minimum_order='".$restaurant_minimum_order1."' ,restaurant_shipping_charge='".$restaurant_shipping_charge1."',restaurant_postcodelatitude='".$restaurant_postcodelatitude1."',restaurant_postcodelongitude='".$restaurant_postcodelongitude1."'   where delivery_id REGEXP '(".$_POST['alreadyID'].")'");

}
}
}*/
//foreach($lk as $t)
//{
//mysql_query("delete from tbl_restaurantDeliveryArea where delivery_id='".$t."'");
//}

  

  //++++++++++++++++++++++Restaurant Owner Query End+++++++++++++++++++

  

  //++++++++++++++++++++++Restaurant Bank Query+++++++++++++++++++ 

  $BankInsert = $db->storeUpdateRestaurantBank($restaurant_BankACName,$restaurant_BankACType,$restaurant_BankName,$restaurant_BankACNo,$restaurant_BankNEFTCode,$restaurant_BankSwiftCode,$restaurant_BankAddress,$restaurant_insertID);

  

  //++++++++++++++++++++++Restaurant Bank Query+++++++++++++++++++

  

  //++++++++++++++++++++++Restaurant SEO Query+++++++++++++++++++ 

 $SEOInsert= $db->storeUpdateRestaurantSEO2($restaurant_insertID,$restaurant_MetaTitle,$restaurant_MetaKeyword,$restaurant_MetaDescription);

  if($UserInsert)

  {

  

  //++++++++++++++++++++++Restaurant SEO Query+++++++++++++++++++

 header("location:manage_restaurant.php?emsg=1");

  			}

  			else

  			{

  			header("location:add_new_restaurant.php?emsg=0");

  }

}

if($_GET['tag']=='RestaurantDelete') {

$CuisineDelete = $db->DeleteTableRow("tbl_restaurantAdd","id",$_GET['eid']);

$id=$_GET['eid'];

 			if($CuisineDelete)

 			{

			

			 mysql_query("delete from tbl_restaurantDeals where RestaurantDealsId='$id'");

			                 mysql_query("delete from tbl_restaurantCoupon where RestauranCouponId='$id'");

				             mysql_query("delete from tbl_restaurantBank where restaurant_id='$id'");

					         mysql_query("delete from tbl_restaurantGallery where restaurant_id='$id'");

						     mysql_query("delete from tbl_restaurantEvent where RestaurantEventID='$id'");

							 mysql_query("delete from tbl_restaurantOffer where restaurant_id='$id'");

							 mysql_query("delete from tbl_restaurantOwner where restaurant_id='$id'");

							 mysql_query("delete from tbl_restaurantSEO where restaurant_id='$id'");

							 mysql_query("delete from tbl_restaurantDeliveryArea where restaurant_id='$id'");

							 mysql_query("delete from tbl_resDeliveryBoy where DeliveryBoyRestaurantID='$id'");

							 mysql_query("delete from tbl_restbuffetTime where restaurant_id='$id'");

							 mysql_query("delete from tbl_restalcoholTime where restaurant_id='$id'");

							 mysql_query("delete from tbl_restDeliveryTime where restaurant_id='$id'");

							 mysql_query("delete from tbl_resttablebookingTime where restaurant_id='$id'");

							 mysql_query("delete from tbl_restTakeawayTime where restaurant_id='$id'");

							 mysql_query("delete from tbl_restMenuCategory where restaurantMenuID='$id'");

							 mysql_query("delete from tbl_restaurantMenuItem where RestaurantPizzaID='$id'");
							 
							 mysql_query("delete from resto_order where restoid='$id'");
							  mysql_query("delete from resto_order_details where hotel_id='$id'");
							   mysql_query("delete from table_menuoffer where RestaurantPizzaID='$id'");
							    mysql_query("delete from table_menuofferTitle where RestaurantPizzaID='$id'");
								 mysql_query("delete from tbl_restaurantMainMenuItemdough where RestaurantPizzaID='$id'");
							    mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where RestaurantPizzaID='$id'");
								mysql_query("delete from tbl_restaurantMainMenuItemSize where RestaurantPizzaID='$id'");
							   mysql_query("delete from tbl_restaurantMainMenuItemdough where RestaurantPizzaID='$id'");
								mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitemGroup where RestaurantPizzaID='$id'");
								mysql_query("delete from tbl_restaurantMainMenuItemSize where RestaurantPizzaID='$id'");
							   mysql_query("delete from tbl_restbuffetTime24 where restaurantID='$id'");
							 mysql_query("delete from tbl_restalcoholTime24 where restaurantID='$id'");
							 mysql_query("delete from tbl_restDeliveryTime24 where restaurantID='$id'");
							 mysql_query("delete from tbl_resttablebookingTime24 where restaurantID='$id'");
							 mysql_query("delete from tbl_restTakeawayTime24 where restaurantID='$id'");
							  mysql_query("delete from tbl_restaurantPayment_grps_sms where restaurant_id='$id'");

							 

  			header("location:manage_restaurant.php?dmsg=1");

  			}

  			else

  			{

  			header("location:manage_restaurant.php?dmsg=0");

  }



}



if($_GET['tag']=='RestaurantActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantAdd","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant.php?amsg=0");
  }

}

if($_GET['tag']=='RestaurantActivateFooter') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantAdd","fstatus",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant.php?amsg=0");
  }

}


//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Delivery Boy++++++++++++++++++++++++++++//




//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Owner++++++++++++++++++++++++++++//
if($_GET['tag']=='ResOwnerAdd') {
    // get tag
 //++++++++++++++++++++++Restaurant Owner Field+++++++++++++++++++
 $restaurant_insertID=$_POST['restaurant_id'];
$restaurant_OwnerFirstName=$_POST['restaurant_OwnerFirstName'];
$restaurant_OwnerLastName=$_POST['restaurant_OwnerLastName'];
$restaurant_OwnerLoginId=$_POST['restaurant_OwnerLoginId'];
$restaurant_OwnerLoginPassword=$_POST['restaurant_OwnerLoginPassword'];
$restaurant_OwnerLoginDOB=$_POST['restaurant_OwnerLoginDOB'];
$restaurant_OwnerAnniversaryDate=$_POST['restaurant_OwnerAnniversaryDate'];
//++++++++++++++++++++++End Restaurant Owner Field+++++++++++++++++++

 $OwnerInsert = $db->storeAddRestaurantOwner2($restaurant_insertID,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate);
  if($OwnerInsert)
  {
  header("location:add_restaurant_owner.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_owner.php?error=1");
  }
}
if($_GET['tag']=='ResOwnerEdit') {
  $restaurant_insertID=$_POST['restaurant_id'];
$restaurant_OwnerFirstName=$_POST['restaurant_OwnerFirstName'];
$restaurant_OwnerLastName=$_POST['restaurant_OwnerLastName'];
$restaurant_OwnerLoginId=$_POST['restaurant_OwnerLoginId'];
$restaurant_OwnerLoginPassword=$_POST['restaurant_OwnerLoginPassword'];
$restaurant_OwnerLoginDOB=$_POST['restaurant_OwnerLoginDOB'];
$restaurant_OwnerAnniversaryDate=$_POST['restaurant_OwnerAnniversaryDate'];
 $OwnerInsertUpdate = $db->storeUpdateRestaurantOwner($restaurant_insertID,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate,$_GET['eid']);
 			if($OwnerInsertUpdate)
 			{
  			header("location:manage_restaurant_owner.php?emsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_owner.php?emsg=0");
  }
}
if($_GET['tag']=='ResOwnerDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantOwner","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_owner.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_owner.php?dmsg=0");
  }

}

if($_GET['tag']=='ResOwnerActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantOwner","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_owner.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant_owner.php?amsg=0");
  }

}



//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Owner++++++++++++++++++++++++++++//



///+++++++++++++++++++++++++++++++++++++++++ Booking Data Delete ++++++++++++++++++++++++++++++++++++++++++++++++//

if($_GET['tag']=='ResBookingDelete') {
$CuisineDelete = $db->DeleteTableRow("table_booking","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_table_booking.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_table_booking.php?dmsg=0");
  }

}


if($_GET['tag']=='ResNewssubscribeDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_newselleterSubscribe","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_newsletter.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_newsletter.php?dmsg=0");
  }

}

if($_GET['tag']=='ResNewssubscribeIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_newselleterSubscribe","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_newsletter.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_newsletter.php?amsg=0");
  }

}


if($_GET['tag']=='ResContactDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_onlineContact","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_contact_us.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_contact_us.php?dmsg=0");
  }

}

if($_GET['tag']=='ResContactIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_onlineContact","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_contact_us.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_contact_us.php?amsg=0");
  }

}



if($_GET['tag']=='ResSugesstionDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurant_suggestion","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_suggestion.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_suggestion.php?dmsg=0");
  }

}

if($_GET['tag']=='ResSuggestionIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurant_suggestion","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_suggestion.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant_suggestion.php?amsg=0");
  }

}


if($_GET['tag']=='ResRatingDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantReview","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_RatingReview.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_RatingReview.php?dmsg=0");
  }

}

if($_GET['tag']=='ResRatingIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantReview","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_RatingReview.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_RatingReview.php?amsg=0");
  }

}

if($_GET['tag']=='ResRatingActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantReview","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_RatingReview.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_RatingReview.php?amsg=0");
  }

}

if($_GET['tag']=='ResSEOUpdate') {

//++++++++++++++++++++++Restaurant SEO Field+++++++++++++++++++
$restaurant_MetaTitle=$_POST['restaurant_MetaTitle'];
$restaurant_MetaKeyword=$_POST['restaurant_MetaKeyword'];
$restaurant_MetaDescription=$_POST['restaurant_MetaDescription'];
$restaurant_id=$_POST['SEORestaurantId'];

//++++++++++++++++++++++Restaurant SEO Field+++++++++++++++++++

$CuisineDelete = $db->storeUpdateRestaurantSEO($restaurant_id,$restaurant_MetaTitle,$restaurant_MetaKeyword,$restaurant_MetaDescription,$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:update_seo.php?amsg=1&SEORestaurantId=".$_POST['SEORestaurantId']);
  			}

  			else
  			{
  			header("location:update_seo.php?amsg=0&SEORestaurantId=".$_POST['SEORestaurantId']);
  }

}




//+++++++++++++++++++++++++++++++++++++ End here +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//





//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Owner++++++++++++++++++++++++++++//
if($_GET['tag']=='ResAdminAdd') {
    // get tag
 //++++++++++++++++++++++Restaurant Owner Field+++++++++++++++++++
 $restaurant_AdminFirstName=$_POST['restaurant_AdminFirstName'];
$restaurant_AdminLastName=$_POST['restaurant_AdminLastName'];
$restaurant_AdminLoginId=$_POST['restaurant_AdminLoginId'];
$AdminEmail=$_POST['AdminEmail'];
$restaurant_AdminLoginPassword=$_POST['restaurant_AdminLoginPassword'];
$restaurant_AdminLoginDOB=$_POST['restaurant_AdminLoginDOB'];
$restaurant_AdminAnniversaryDate=$_POST['restaurant_AdminAnniversaryDate'];
//++++++++++++++++++++++End Restaurant Owner Field+++++++++++++++++++

 $OwnerInsert = $db->storeAddRestaurantAdmin($restaurant_AdminFirstName,$restaurant_AdminLastName,$restaurant_AdminLoginId,$AdminEmail,$restaurant_AdminLoginPassword,$restaurant_AdminLoginDOB,$restaurant_AdminAnniversaryDate);
  if($OwnerInsert)
  {
  header("location:add_restaurant_admin.php?msg=1");
  }
  else
  {
  header("location:add_restaurant_admin.php?error=1");
  }
}
if($_GET['tag']=='ResAdminEdit') {
$restaurant_AdminFirstName=$_POST['restaurant_AdminFirstName'];
$restaurant_AdminLastName=$_POST['restaurant_AdminLastName'];
$restaurant_AdminLoginId=$_POST['restaurant_AdminLoginId'];
$AdminEmail=$_POST['AdminEmail'];
$restaurant_AdminLoginPassword=$_POST['restaurant_AdminLoginPassword'];
$restaurant_AdminLoginDOB=$_POST['restaurant_AdminLoginDOB'];
$restaurant_AdminAnniversaryDate=$_POST['restaurant_AdminAnniversaryDate'];

 $OwnerInsertUpdate = $db->storeUpdateRestaurantAdmin($restaurant_AdminFirstName,$restaurant_AdminLastName,$restaurant_AdminLoginId,$AdminEmail,$restaurant_AdminLoginPassword,$restaurant_AdminLoginDOB,$restaurant_AdminAnniversaryDate,$_GET['eid']);
 			if($OwnerInsertUpdate)
 			{
  			header("location:manage_restaurant_admin.php?emsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_admin.php?emsg=0");
  }
}
if($_GET['tag']=='ResadminDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_login","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_admin.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_restaurant_admin.php?dmsg=0");
  }

}

if($_GET['tag']=='ResadminActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_login","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_admin.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant_admin.php?amsg=0");
  }

}

if($_GET['tag']=='ResadminIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow(" tbl_login","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_restaurant_admin.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_restaurant_admin.php?amsg=0");
  }

}




if($_GET['tag']=='RespassEdit') {
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$AdminEmail=$_POST['AdminEmail'];
$OwnerInsertUpdate = $db->Adminchange_password($old_password,$new_password,$AdminEmail,$_GET['eid']);
 			if($OwnerInsertUpdate)
 			{
  			header("location:change_password.php?emsg=1");
  			}
  			else
  			{
  			header("location:change_password.php?emsg=0");
  }
}


//+++++++++++++++++++++++++++ END ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Owner++++++++++++++++++++++++++++//



//++++++++++++++++++++++++++++ Update Restaurant Alcohal Timimg+++++++++++++++++++++++++//
if($_GET['tag']=='RestayrantAlcoholTimeEdit') {
if($_POST['restaurant_alcohol_mon_selected']!=''){
  $restaurant_alcohol_mon_selected1 = $_POST['restaurant_alcohol_mon_selected'];
  $restaurant_alcohol_mon_open_hr1 = $_POST['restaurant_alcohol_mon_open_hr'];
   $restaurant_alcohol_mon_open_min1 = $_POST['restaurant_alcohol_mon_open_min'];
   $restaurant_alcohol_mon_open_am1 = $_POST['restaurant_alcohol_mon_open_am'];
    $restaurant_alcohol_mon_close_hr1 = $_POST['restaurant_alcohol_mon_close_hr'];
  $restaurant_alcohol_mon_close_min1 = $_POST['restaurant_alcohol_mon_close_min'];
   $restaurant_alcohol_mon_open_pm1 = $_POST['restaurant_alcohol_mon_open_pm'];
   }
   
   if($_POST['restaurant_alcohol_tue_selected']!=''){
   $restaurant_alcohol_tue_selected1 = $_POST['restaurant_alcohol_tue_selected'];
  $restaurant_alcohol_tue_open_hr1 = $_POST['restaurant_alcohol_tue_open_hr'];
   $restaurant_alcohol_tue_open_min1 = $_POST['restaurant_alcohol_tue_open_min'];
   $restaurant_alcohol_tue_open_am1 = $_POST['restaurant_alcohol_tue_open_am'];
    $restaurant_alcohol_tue_close_hr1 = $_POST['restaurant_alcohol_tue_close_hr'];
  $restaurant_alcohol_tue_close_min1 = $_POST['restaurant_alcohol_tue_close_min'];
   $restaurant_alcohol_tue_open_pm1 = $_POST['restaurant_alcohol_tue_open_pm'];
   }
   
  if($_POST['restaurant_alcohol_wed_selected']!=''){ 
    $restaurant_alcohol_wed_selected1 = $_POST['restaurant_alcohol_wed_selected'];
  $restaurant_alcohol_wed_open_hr1 = $_POST['restaurant_alcohol_wed_open_hr'];
   $restaurant_alcohol_wed_open_min1 = $_POST['restaurant_alcohol_wed_open_min'];
   $restaurant_alcohol_wed_open_am1 = $_POST['restaurant_alcohol_wed_open_am'];
    $restaurant_alcohol_wed_close_hr1 = $_POST['restaurant_alcohol_wed_close_hr'];
  $restaurant_alcohol_wed_close_min1 = $_POST['restaurant_alcohol_wed_close_min'];
   $restaurant_alcohol_wed_open_pm1 = $_POST['restaurant_alcohol_wed_open_pm'];
   }
   
   if($_POST['restaurant_alcohol_thu_selected']!=''){
    $restaurant_alcohol_thu_selected1 = $_POST['restaurant_alcohol_thu_selected'];
  $restaurant_alcohol_thu_open_hr1 = $_POST['restaurant_alcohol_thu_open_hr'];
   $restaurant_alcohol_thu_open_min1 = $_POST['restaurant_alcohol_thu_open_min'];
   $restaurant_alcohol_thu_open_am1 = $_POST['restaurant_alcohol_thu_open_am'];
    $restaurant_alcohol_thu_close_hr1 = $_POST['restaurant_alcohol_thu_close_hr'];
  $restaurant_alcohol_thu_close_min1 = $_POST['restaurant_alcohol_thu_close_min'];
   $restaurant_alcohol_thu_open_pm1 = $_POST['restaurant_alcohol_thu_open_pm'];
   }
   
   if($_POST['restaurant_alcohol_fri_selected']!=''){
    $restaurant_alcohol_fri_selected1 = $_POST['restaurant_alcohol_fri_selected'];
  $restaurant_alcohol_fri_open_hr1 = $_POST['restaurant_alcohol_fri_open_hr'];
   $restaurant_alcohol_fri_open_min1 = $_POST['restaurant_alcohol_fri_open_min'];
   $restaurant_alcohol_fri_open_am1 = $_POST['restaurant_alcohol_fri_open_am'];
    $restaurant_alcohol_fri_close_hr1 = $_POST['restaurant_alcohol_fri_close_hr'];
  $restaurant_alcohol_fri_close_min1 = $_POST['restaurant_alcohol_fri_close_min'];
   $restaurant_alcohol_fri_open_pm1 = $_POST['restaurant_alcohol_fri_open_pm'];
   }
   
   if($_POST['restaurant_alcohol_sat_selected']!='')
   {
    $restaurant_alcohol_sat_selected1 = $_POST['restaurant_alcohol_sat_selected'];
  $restaurant_alcohol_sat_open_hr1 = $_POST['restaurant_alcohol_sat_open_hr'];
   $restaurant_alcohol_sat_open_min1 = $_POST['restaurant_alcohol_sat_open_min'];
   $restaurant_alcohol_sat_open_am1 = $_POST['restaurant_alcohol_sat_open_am'];
    $restaurant_alcohol_sat_close_hr1 = $_POST['restaurant_alcohol_sat_close_hr'];
  $restaurant_alcohol_sat_close_min1 = $_POST['restaurant_alcohol_sat_close_min'];
   $restaurant_alcohol_sat_open_pm1 = $_POST['restaurant_alcohol_sat_open_pm'];
   }
   
   if($_POST['restaurant_alcohol_sun_selected']!='')
   {
    $restaurant_alcohol_sun_selected1 = $_POST['restaurant_alcohol_sun_selected'];
  $restaurant_alcohol_sun_open_hr1 = $_POST['restaurant_alcohol_sun_open_hr'];
   $restaurant_alcohol_sun_open_min1 = $_POST['restaurant_alcohol_sun_open_min'];
   $restaurant_alcohol_sun_open_am1 = $_POST['restaurant_alcohol_sun_open_am'];
    $restaurant_alcohol_sun_close_hr1 = $_POST['restaurant_alcohol_sun_close_hr'];
  $restaurant_alcohol_sun_close_min1 = $_POST['restaurant_alcohol_sun_close_min'];
   $restaurant_alcohol_sun_open_pm1 = $_POST['restaurant_alcohol_sun_open_pm'];
   }
   
  
 $CuisineInsert = $db->storeUpdateRestaurantTimimg("tbl_restalcoholTime",$_GET['restaurant_id'],"restaurant_alcohol_mon_selected","restaurant_alcohol_mon_open_hr","restaurant_alcohol_mon_open_min","restaurant_alcohol_mon_open_am","restaurant_alcohol_mon_close_hr","restaurant_alcohol_mon_close_min","restaurant_alcohol_mon_open_pm","restaurant_alcohol_tue_selected","restaurant_alcohol_tue_open_hr","restaurant_alcohol_tue_open_min","restaurant_alcohol_tue_open_am","restaurant_alcohol_tue_close_hr","restaurant_alcohol_tue_close_min","restaurant_alcohol_tue_open_pm","restaurant_alcohol_wed_selected","restaurant_alcohol_wed_open_hr","restaurant_alcohol_wed_open_min","restaurant_alcohol_wed_open_am",
"restaurant_alcohol_wed_close_hr","restaurant_alcohol_wed_close_min","restaurant_alcohol_wed_open_pm","restaurant_alcohol_thu_selected","restaurant_alcohol_thu_open_hr","restaurant_alcohol_thu_open_min","restaurant_alcohol_thu_open_am","restaurant_alcohol_thu_close_hr","restaurant_alcohol_thu_close_min","restaurant_alcohol_thu_open_pm",
"restaurant_alcohol_fri_selected","restaurant_alcohol_fri_open_hr","restaurant_alcohol_fri_open_min","restaurant_alcohol_fri_open_am","restaurant_alcohol_fri_close_hr",
"restaurant_alcohol_fri_close_min","restaurant_alcohol_fri_open_pm","restaurant_alcohol_sat_selected","restaurant_alcohol_sat_open_hr","restaurant_alcohol_sat_open_min","restaurant_alcohol_sat_open_am","restaurant_alcohol_sat_close_hr","restaurant_alcohol_sat_close_min","restaurant_alcohol_sat_open_pm","restaurant_alcohol_sun_selected","restaurant_alcohol_sun_open_hr","restaurant_alcohol_sun_open_min","restaurant_alcohol_sun_open_am","restaurant_alcohol_sun_close_hr","restaurant_alcohol_sun_close_min","restaurant_alcohol_sun_open_pm",
$restaurant_alcohol_mon_selected1,$restaurant_alcohol_mon_open_hr1,$restaurant_alcohol_mon_open_min1,$restaurant_alcohol_mon_open_am1,$restaurant_alcohol_mon_close_hr1,$restaurant_alcohol_mon_close_min1,$restaurant_alcohol_mon_open_pm1,$restaurant_alcohol_tue_selected1,$restaurant_alcohol_tue_open_hr1,$restaurant_alcohol_tue_open_min1,$restaurant_alcohol_tue_open_am1,$restaurant_alcohol_tue_close_hr1,$restaurant_alcohol_tue_close_min1,$restaurant_alcohol_tue_open_pm1,$restaurant_alcohol_wed_selected1,$restaurant_alcohol_wed_open_hr1,$restaurant_alcohol_wed_open_min1,$restaurant_alcohol_wed_open_am1,
$restaurant_alcohol_wed_close_hr1,$restaurant_alcohol_wed_close_min1,$restaurant_alcohol_wed_open_pm1,$restaurant_alcohol_thu_selected1,$restaurant_alcohol_thu_open_hr1,$restaurant_alcohol_thu_open_min1,$restaurant_alcohol_thu_open_am1,$restaurant_alcohol_thu_close_hr1,$restaurant_alcohol_thu_close_min1,$restaurant_alcohol_thu_open_pm1,
$restaurant_alcohol_fri_selected1,$restaurant_alcohol_fri_open_hr1,$restaurant_alcohol_fri_open_min1,$restaurant_alcohol_fri_open_am1,$restaurant_alcohol_fri_close_hr1,
$restaurant_alcohol_fri_close_min1,$restaurant_alcohol_fri_open_pm1,$restaurant_alcohol_sat_selected1,$restaurant_alcohol_sat_open_hr1,$restaurant_alcohol_sat_open_min1,$restaurant_alcohol_sat_open_am1,$restaurant_alcohol_sat_close_hr1,$restaurant_alcohol_sat_close_min1,$restaurant_alcohol_sat_open_pm1,$restaurant_alcohol_sun_selected1,$restaurant_alcohol_sun_open_hr1,$restaurant_alcohol_sun_open_min1,$restaurant_alcohol_sun_open_am1,$restaurant_alcohol_sun_close_hr1,$restaurant_alcohol_sun_close_min1,$restaurant_alcohol_sun_open_pm1,$_GET['restaurant_id']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_timming_alcohal.php?emsg=1&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_timming_alcohal.php?emsg=0&restaurant_id=".$_GET['restaurant_id']);
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant Alcohal Timimg+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update Restaurant buffet Timimg+++++++++++++++++++++++++//
if($_GET['tag']=='RestayrantbuffetTimeEdit') {
if($_POST['restaurant_buffet_mon_selected']!=''){
  $restaurant_buffet_mon_selected1 = $_POST['restaurant_buffet_mon_selected'];
  $restaurant_buffet_mon_open_hr1 = $_POST['restaurant_buffet_mon_open_hr'];
   $restaurant_buffet_mon_open_min1 = $_POST['restaurant_buffet_mon_open_min'];
   $restaurant_buffet_mon_open_am1 = $_POST['restaurant_buffet_mon_open_am'];
    $restaurant_buffet_mon_close_hr1 = $_POST['restaurant_buffet_mon_close_hr'];
  $restaurant_buffet_mon_close_min1 = $_POST['restaurant_buffet_mon_close_min'];
   $restaurant_buffet_mon_open_pm1 = $_POST['restaurant_buffet_mon_open_pm'];
   }
   
   if($_POST['restaurant_buffet_tue_selected']!=''){
   $restaurant_buffet_tue_selected1 = $_POST['restaurant_buffet_tue_selected'];
  $restaurant_buffet_tue_open_hr1 = $_POST['restaurant_buffet_tue_open_hr'];
   $restaurant_buffet_tue_open_min1 = $_POST['restaurant_buffet_tue_open_min'];
   $restaurant_buffet_tue_open_am1 = $_POST['restaurant_buffet_tue_open_am'];
    $restaurant_buffet_tue_close_hr1 = $_POST['restaurant_buffet_tue_close_hr'];
  $restaurant_buffet_tue_close_min1 = $_POST['restaurant_buffet_tue_close_min'];
   $restaurant_buffet_tue_open_pm1 = $_POST['restaurant_buffet_tue_open_pm'];
   }
   
  if($_POST['restaurant_buffet_wed_selected']!=''){ 
    $restaurant_buffet_wed_selected1 = $_POST['restaurant_buffet_wed_selected'];
  $restaurant_buffet_wed_open_hr1 = $_POST['restaurant_buffet_wed_open_hr'];
   $restaurant_buffet_wed_open_min1 = $_POST['restaurant_buffet_wed_open_min'];
   $restaurant_buffet_wed_open_am1 = $_POST['restaurant_buffet_wed_open_am'];
    $restaurant_buffet_wed_close_hr1 = $_POST['restaurant_buffet_wed_close_hr'];
  $restaurant_buffet_wed_close_min1 = $_POST['restaurant_buffet_wed_close_min'];
   $restaurant_buffet_wed_open_pm1 = $_POST['restaurant_buffet_wed_open_pm'];
   }
   
   if($_POST['restaurant_buffet_thu_selected']!=''){
    $restaurant_buffet_thu_selected1 = $_POST['restaurant_buffet_thu_selected'];
  $restaurant_buffet_thu_open_hr1 = $_POST['restaurant_buffet_thu_open_hr'];
   $restaurant_buffet_thu_open_min1 = $_POST['restaurant_buffet_thu_open_min'];
   $restaurant_buffet_thu_open_am1 = $_POST['restaurant_buffet_thu_open_am'];
    $restaurant_buffet_thu_close_hr1 = $_POST['restaurant_buffet_thu_close_hr'];
  $restaurant_buffet_thu_close_min1 = $_POST['restaurant_buffet_thu_close_min'];
   $restaurant_buffet_thu_open_pm1 = $_POST['restaurant_buffet_thu_open_pm'];
   }
   
   if($_POST['restaurant_buffet_fri_selected']!=''){
    $restaurant_buffet_fri_selected1 = $_POST['restaurant_buffet_fri_selected'];
  $restaurant_buffet_fri_open_hr1 = $_POST['restaurant_buffet_fri_open_hr'];
   $restaurant_buffet_fri_open_min1 = $_POST['restaurant_buffet_fri_open_min'];
   $restaurant_buffet_fri_open_am1 = $_POST['restaurant_buffet_fri_open_am'];
    $restaurant_buffet_fri_close_hr1 = $_POST['restaurant_buffet_fri_close_hr'];
  $restaurant_buffet_fri_close_min1 = $_POST['restaurant_buffet_fri_close_min'];
   $restaurant_buffet_fri_open_pm1 = $_POST['restaurant_buffet_fri_open_pm'];
   }
   
   if($_POST['restaurant_buffet_sat_selected']!='')
   {
    $restaurant_buffet_sat_selected1 = $_POST['restaurant_buffet_sat_selected'];
  $restaurant_buffet_sat_open_hr1 = $_POST['restaurant_buffet_sat_open_hr'];
   $restaurant_buffet_sat_open_min1 = $_POST['restaurant_buffet_sat_open_min'];
   $restaurant_buffet_sat_open_am1 = $_POST['restaurant_buffet_sat_open_am'];
    $restaurant_buffet_sat_close_hr1 = $_POST['restaurant_buffet_sat_close_hr'];
  $restaurant_buffet_sat_close_min1 = $_POST['restaurant_buffet_sat_close_min'];
   $restaurant_buffet_sat_open_pm1 = $_POST['restaurant_buffet_sat_open_pm'];
   }
   
   if($_POST['restaurant_buffet_sun_selected']!='')
   {
    $restaurant_buffet_sun_selected1 = $_POST['restaurant_buffet_sun_selected'];
  $restaurant_buffet_sun_open_hr1 = $_POST['restaurant_buffet_sun_open_hr'];
   $restaurant_buffet_sun_open_min1 = $_POST['restaurant_buffet_sun_open_min'];
   $restaurant_buffet_sun_open_am1 = $_POST['restaurant_buffet_sun_open_am'];
    $restaurant_buffet_sun_close_hr1 = $_POST['restaurant_buffet_sun_close_hr'];
  $restaurant_buffet_sun_close_min1 = $_POST['restaurant_buffet_sun_close_min'];
   $restaurant_buffet_sun_open_pm1 = $_POST['restaurant_buffet_sun_open_pm'];
   }
   
  
 $CuisineInsert = $db->storeUpdateRestaurantTimimg("tbl_restbuffetTime",$_GET['restaurant_id'],"restaurant_buffet_mon_selected","restaurant_buffet_mon_open_hr","restaurant_buffet_mon_open_min","restaurant_buffet_mon_open_am","restaurant_buffet_mon_close_hr","restaurant_buffet_mon_close_min","restaurant_buffet_mon_open_pm","restaurant_buffet_tue_selected","restaurant_buffet_tue_open_hr","restaurant_buffet_tue_open_min","restaurant_buffet_tue_open_am","restaurant_buffet_tue_close_hr","restaurant_buffet_tue_close_min","restaurant_buffet_tue_open_pm","restaurant_buffet_wed_selected","restaurant_buffet_wed_open_hr","restaurant_buffet_wed_open_min","restaurant_buffet_wed_open_am",
"restaurant_buffet_wed_close_hr","restaurant_buffet_wed_close_min","restaurant_buffet_wed_open_pm","restaurant_buffet_thu_selected","restaurant_buffet_thu_open_hr","restaurant_buffet_thu_open_min","restaurant_buffet_thu_open_am","restaurant_buffet_thu_close_hr","restaurant_buffet_thu_close_min","restaurant_buffet_thu_open_pm",
"restaurant_buffet_fri_selected","restaurant_buffet_fri_open_hr","restaurant_buffet_fri_open_min","restaurant_buffet_fri_open_am","restaurant_buffet_fri_close_hr",
"restaurant_buffet_fri_close_min","restaurant_buffet_fri_open_pm","restaurant_buffet_sat_selected","restaurant_buffet_sat_open_hr","restaurant_buffet_sat_open_min","restaurant_buffet_sat_open_am","restaurant_buffet_sat_close_hr","restaurant_buffet_sat_close_min","restaurant_buffet_sat_open_pm","restaurant_buffet_sun_selected","restaurant_buffet_sun_open_hr","restaurant_buffet_sun_open_min","restaurant_buffet_sun_open_am","restaurant_buffet_sun_close_hr","restaurant_buffet_sun_close_min","restaurant_buffet_sun_open_pm",
$restaurant_buffet_mon_selected1,$restaurant_buffet_mon_open_hr1,$restaurant_buffet_mon_open_min1,$restaurant_buffet_mon_open_am1,$restaurant_buffet_mon_close_hr1,$restaurant_buffet_mon_close_min1,$restaurant_buffet_mon_open_pm1,$restaurant_buffet_tue_selected1,$restaurant_buffet_tue_open_hr1,$restaurant_buffet_tue_open_min1,$restaurant_buffet_tue_open_am1,$restaurant_buffet_tue_close_hr1,$restaurant_buffet_tue_close_min1,$restaurant_buffet_tue_open_pm1,$restaurant_buffet_wed_selected1,$restaurant_buffet_wed_open_hr1,$restaurant_buffet_wed_open_min1,$restaurant_buffet_wed_open_am1,
$restaurant_buffet_wed_close_hr1,$restaurant_buffet_wed_close_min1,$restaurant_buffet_wed_open_pm1,$restaurant_buffet_thu_selected1,$restaurant_buffet_thu_open_hr1,$restaurant_buffet_thu_open_min1,$restaurant_buffet_thu_open_am1,$restaurant_buffet_thu_close_hr1,$restaurant_buffet_thu_close_min1,$restaurant_buffet_thu_open_pm1,
$restaurant_buffet_fri_selected1,$restaurant_buffet_fri_open_hr1,$restaurant_buffet_fri_open_min1,$restaurant_buffet_fri_open_am1,$restaurant_buffet_fri_close_hr1,
$restaurant_buffet_fri_close_min1,$restaurant_buffet_fri_open_pm1,$restaurant_buffet_sat_selected1,$restaurant_buffet_sat_open_hr1,$restaurant_buffet_sat_open_min1,$restaurant_buffet_sat_open_am1,$restaurant_buffet_sat_close_hr1,$restaurant_buffet_sat_close_min1,$restaurant_buffet_sat_open_pm1,$restaurant_buffet_sun_selected1,$restaurant_buffet_sun_open_hr1,$restaurant_buffet_sun_open_min1,$restaurant_buffet_sun_open_am1,$restaurant_buffet_sun_close_hr1,$restaurant_buffet_sun_close_min1,$restaurant_buffet_sun_open_pm1,$_GET['restaurant_id']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_timming_buffet.php?emsg=1&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_timming_buffet.php?emsg=0&restaurant_id=".$_GET['restaurant_id']);
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant buffet Timimg+++++++++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++ Update Restaurant delivery Timimg+++++++++++++++++++++++++//
if($_GET['tag']=='RestayrantdeliveryTimeEdit') {
if($_POST['restaurant_delivery_mon_selected']!=''){
  $restaurant_delivery_mon_selected1 = $_POST['restaurant_delivery_mon_selected'];
  $restaurant_delivery_mon_open_hr1 = $_POST['restaurant_delivery_mon_open_hr'];
   $restaurant_delivery_mon_open_min1 = $_POST['restaurant_delivery_mon_open_min'];
   $restaurant_delivery_mon_open_am1 = $_POST['restaurant_delivery_mon_open_am'];
    $restaurant_delivery_mon_close_hr1 = $_POST['restaurant_delivery_mon_close_hr'];
  $restaurant_delivery_mon_close_min1 = $_POST['restaurant_delivery_mon_close_min'];
   $restaurant_delivery_mon_open_pm1 = $_POST['restaurant_delivery_mon_open_pm'];
   }
   
   if($_POST['restaurant_delivery_tue_selected']!=''){
   $restaurant_delivery_tue_selected1 = $_POST['restaurant_delivery_tue_selected'];
  $restaurant_delivery_tue_open_hr1 = $_POST['restaurant_delivery_tue_open_hr'];
   $restaurant_delivery_tue_open_min1 = $_POST['restaurant_delivery_tue_open_min'];
   $restaurant_delivery_tue_open_am1 = $_POST['restaurant_delivery_tue_open_am'];
    $restaurant_delivery_tue_close_hr1 = $_POST['restaurant_delivery_tue_close_hr'];
  $restaurant_delivery_tue_close_min1 = $_POST['restaurant_delivery_tue_close_min'];
   $restaurant_delivery_tue_open_pm1 = $_POST['restaurant_delivery_tue_open_pm'];
   }
   
  if($_POST['restaurant_delivery_wed_selected']!=''){ 
    $restaurant_delivery_wed_selected1 = $_POST['restaurant_delivery_wed_selected'];
  $restaurant_delivery_wed_open_hr1 = $_POST['restaurant_delivery_wed_open_hr'];
   $restaurant_delivery_wed_open_min1 = $_POST['restaurant_delivery_wed_open_min'];
   $restaurant_delivery_wed_open_am1 = $_POST['restaurant_delivery_wed_open_am'];
    $restaurant_delivery_wed_close_hr1 = $_POST['restaurant_delivery_wed_close_hr'];
  $restaurant_delivery_wed_close_min1 = $_POST['restaurant_delivery_wed_close_min'];
   $restaurant_delivery_wed_open_pm1 = $_POST['restaurant_delivery_wed_open_pm'];
   }
   
   if($_POST['restaurant_delivery_thu_selected']!=''){
    $restaurant_delivery_thu_selected1 = $_POST['restaurant_delivery_thu_selected'];
  $restaurant_delivery_thu_open_hr1 = $_POST['restaurant_delivery_thu_open_hr'];
   $restaurant_delivery_thu_open_min1 = $_POST['restaurant_delivery_thu_open_min'];
   $restaurant_delivery_thu_open_am1 = $_POST['restaurant_delivery_thu_open_am'];
    $restaurant_delivery_thu_close_hr1 = $_POST['restaurant_delivery_thu_close_hr'];
  $restaurant_delivery_thu_close_min1 = $_POST['restaurant_delivery_thu_close_min'];
   $restaurant_delivery_thu_open_pm1 = $_POST['restaurant_delivery_thu_open_pm'];
   }
   
   if($_POST['restaurant_delivery_fri_selected']!=''){
    $restaurant_delivery_fri_selected1 = $_POST['restaurant_delivery_fri_selected'];
  $restaurant_delivery_fri_open_hr1 = $_POST['restaurant_delivery_fri_open_hr'];
   $restaurant_delivery_fri_open_min1 = $_POST['restaurant_delivery_fri_open_min'];
   $restaurant_delivery_fri_open_am1 = $_POST['restaurant_delivery_fri_open_am'];
    $restaurant_delivery_fri_close_hr1 = $_POST['restaurant_delivery_fri_close_hr'];
  $restaurant_delivery_fri_close_min1 = $_POST['restaurant_delivery_fri_close_min'];
   $restaurant_delivery_fri_open_pm1 = $_POST['restaurant_delivery_fri_open_pm'];
   }
   
   if($_POST['restaurant_delivery_sat_selected']!='')
   {
    $restaurant_delivery_sat_selected1 = $_POST['restaurant_delivery_sat_selected'];
  $restaurant_delivery_sat_open_hr1 = $_POST['restaurant_delivery_sat_open_hr'];
   $restaurant_delivery_sat_open_min1 = $_POST['restaurant_delivery_sat_open_min'];
   $restaurant_delivery_sat_open_am1 = $_POST['restaurant_delivery_sat_open_am'];
    $restaurant_delivery_sat_close_hr1 = $_POST['restaurant_delivery_sat_close_hr'];
  $restaurant_delivery_sat_close_min1 = $_POST['restaurant_delivery_sat_close_min'];
   $restaurant_delivery_sat_open_pm1 = $_POST['restaurant_delivery_sat_open_pm'];
   }
   
   if($_POST['restaurant_delivery_sun_selected']!='')
   {
    $restaurant_delivery_sun_selected1 = $_POST['restaurant_delivery_sun_selected'];
  $restaurant_delivery_sun_open_hr1 = $_POST['restaurant_delivery_sun_open_hr'];
   $restaurant_delivery_sun_open_min1 = $_POST['restaurant_delivery_sun_open_min'];
   $restaurant_delivery_sun_open_am1 = $_POST['restaurant_delivery_sun_open_am'];
    $restaurant_delivery_sun_close_hr1 = $_POST['restaurant_delivery_sun_close_hr'];
  $restaurant_delivery_sun_close_min1 = $_POST['restaurant_delivery_sun_close_min'];
   $restaurant_delivery_sun_open_pm1 = $_POST['restaurant_delivery_sun_open_pm'];
   }
   
  
$CuisineInsert = $db->storeUpdateRestaurantTimimg("tbl_restDeliveryTime",$_GET['restaurant_id'],"restaurant_delivery_mon_selected","restaurant_delivery_mon_open_hr","restaurant_delivery_mon_open_min","restaurant_delivery_mon_open_am","restaurant_delivery_mon_close_hr","restaurant_delivery_mon_close_min","restaurant_delivery_mon_open_pm","restaurant_delivery_tue_selected","restaurant_delivery_tue_open_hr","restaurant_delivery_tue_open_min","restaurant_delivery_tue_open_am","restaurant_delivery_tue_close_hr","restaurant_delivery_tue_close_min","restaurant_delivery_tue_open_pm","restaurant_delivery_wed_selected","restaurant_delivery_wed_open_hr","restaurant_delivery_wed_open_min","restaurant_delivery_wed_open_am",

"restaurant_delivery_wed_close_hr","restaurant_delivery_wed_close_min","restaurant_delivery_wed_open_pm","restaurant_delivery_thu_selected","restaurant_delivery_thu_open_hr","restaurant_delivery_thu_open_min","restaurant_delivery_thu_open_am","restaurant_delivery_thu_close_hr","restaurant_delivery_thu_close_min","restaurant_delivery_thu_open_pm",

"restaurant_delivery_fri_selected","restaurant_delivery_fri_open_hr","restaurant_delivery_fri_open_min","restaurant_delivery_fri_open_am","restaurant_delivery_fri_close_hr",

"restaurant_delivery_fri_close_min","restaurant_delivery_fri_open_pm","restaurant_delivery_sat_selected","restaurant_delivery_sat_open_hr","restaurant_delivery_sat_open_min","restaurant_delivery_sat_open_am","restaurant_delivery_sat_close_hr","restaurant_delivery_sat_close_min","restaurant_delivery_sat_open_pm","restaurant_delivery_sun_selected","restaurant_delivery_sun_open_hr","restaurant_delivery_sun_open_min","restaurant_delivery_sun_open_am","restaurant_delivery_sun_close_hr","restaurant_delivery_sun_close_min","restaurant_delivery_sun_open_pm",

$restaurant_delivery_mon_selected1,$restaurant_delivery_mon_open_hr1,$restaurant_delivery_mon_open_min1,$restaurant_delivery_mon_open_am1,$restaurant_delivery_mon_close_hr1,$restaurant_delivery_mon_close_min1,$restaurant_delivery_mon_open_pm1,$restaurant_delivery_tue_selected1,$restaurant_delivery_tue_open_hr1,$restaurant_delivery_tue_open_min1,$restaurant_delivery_tue_open_am1,$restaurant_delivery_tue_close_hr1,$restaurant_delivery_tue_close_min1,$restaurant_delivery_tue_open_pm1,$restaurant_delivery_wed_selected1,$restaurant_delivery_wed_open_hr1,$restaurant_delivery_wed_open_min1,$restaurant_delivery_wed_open_am1,

$restaurant_delivery_wed_close_hr1,$restaurant_delivery_wed_close_min1,$restaurant_delivery_wed_open_pm1,$restaurant_delivery_thu_selected1,$restaurant_delivery_thu_open_hr1,$restaurant_delivery_thu_open_min1,$restaurant_delivery_thu_open_am1,$restaurant_delivery_thu_close_hr1,$restaurant_delivery_thu_close_min1,$restaurant_delivery_thu_open_pm1,

$restaurant_delivery_fri_selected1,$restaurant_delivery_fri_open_hr1,$restaurant_delivery_fri_open_min1,$restaurant_delivery_fri_open_am1,$restaurant_delivery_fri_close_hr1,

$restaurant_delivery_fri_close_min1,$restaurant_delivery_fri_open_pm1,$restaurant_delivery_sat_selected1,$restaurant_delivery_sat_open_hr1,$restaurant_delivery_sat_open_min1,$restaurant_delivery_sat_open_am1,$restaurant_delivery_sat_close_hr1,$restaurant_delivery_sat_close_min1,$restaurant_delivery_sat_open_pm1,$restaurant_delivery_sun_selected1,$restaurant_delivery_sun_open_hr1,$restaurant_delivery_sun_open_min1,$restaurant_delivery_sun_open_am1,$restaurant_delivery_sun_close_hr1,$restaurant_delivery_sun_close_min1,$restaurant_delivery_sun_open_pm1,$_GET['restaurant_id']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_timming_delivery.php?emsg=1&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_timming_delivery.php?emsg=0&restaurant_id=".$_GET['restaurant_id']);
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant delivery Timimg+++++++++++++++++++++++++++++++++++++++//







//++++++++++++++++++++++++++++ Update Restaurant takeaway Timimg+++++++++++++++++++++++++//
if($_GET['tag']=='RestayranttakeawayTimeEdit') {
if($_POST['restaurant_takeaway_mon_selected']!=''){
  $restaurant_takeaway_mon_selected1 = $_POST['restaurant_takeaway_mon_selected'];
  $restaurant_takeaway_mon_open_hr1 = $_POST['restaurant_takeaway_mon_open_hr'];
   $restaurant_takeaway_mon_open_min1 = $_POST['restaurant_takeaway_mon_open_min'];
   $restaurant_takeaway_mon_open_am1 = $_POST['restaurant_takeaway_mon_open_am'];
    $restaurant_takeaway_mon_close_hr1 = $_POST['restaurant_takeaway_mon_close_hr'];
  $restaurant_takeaway_mon_close_min1 = $_POST['restaurant_takeaway_mon_close_min'];
   $restaurant_takeaway_mon_open_pm1 = $_POST['restaurant_takeaway_mon_open_pm'];
   }
   
   if($_POST['restaurant_takeaway_tue_selected']!=''){
   $restaurant_takeaway_tue_selected1 = $_POST['restaurant_takeaway_tue_selected'];
  $restaurant_takeaway_tue_open_hr1 = $_POST['restaurant_takeaway_tue_open_hr'];
   $restaurant_takeaway_tue_open_min1 = $_POST['restaurant_takeaway_tue_open_min'];
   $restaurant_takeaway_tue_open_am1 = $_POST['restaurant_takeaway_tue_open_am'];
    $restaurant_takeaway_tue_close_hr1 = $_POST['restaurant_takeaway_tue_close_hr'];
  $restaurant_takeaway_tue_close_min1 = $_POST['restaurant_takeaway_tue_close_min'];
   $restaurant_takeaway_tue_open_pm1 = $_POST['restaurant_takeaway_tue_open_pm'];
   }
   
  if($_POST['restaurant_takeaway_wed_selected']!=''){ 
    $restaurant_takeaway_wed_selected1 = $_POST['restaurant_takeaway_wed_selected'];
  $restaurant_takeaway_wed_open_hr1 = $_POST['restaurant_takeaway_wed_open_hr'];
   $restaurant_takeaway_wed_open_min1 = $_POST['restaurant_takeaway_wed_open_min'];
   $restaurant_takeaway_wed_open_am1 = $_POST['restaurant_takeaway_wed_open_am'];
    $restaurant_takeaway_wed_close_hr1 = $_POST['restaurant_takeaway_wed_close_hr'];
  $restaurant_takeaway_wed_close_min1 = $_POST['restaurant_takeaway_wed_close_min'];
   $restaurant_takeaway_wed_open_pm1 = $_POST['restaurant_takeaway_wed_open_pm'];
   }
   
   if($_POST['restaurant_takeaway_thu_selected']!=''){
    $restaurant_takeaway_thu_selected1 = $_POST['restaurant_takeaway_thu_selected'];
  $restaurant_takeaway_thu_open_hr1 = $_POST['restaurant_takeaway_thu_open_hr'];
   $restaurant_takeaway_thu_open_min1 = $_POST['restaurant_takeaway_thu_open_min'];
   $restaurant_takeaway_thu_open_am1 = $_POST['restaurant_takeaway_thu_open_am'];
    $restaurant_takeaway_thu_close_hr1 = $_POST['restaurant_takeaway_thu_close_hr'];
  $restaurant_takeaway_thu_close_min1 = $_POST['restaurant_takeaway_thu_close_min'];
   $restaurant_takeaway_thu_open_pm1 = $_POST['restaurant_takeaway_thu_open_pm'];
   }
   
   if($_POST['restaurant_takeaway_fri_selected']!=''){
    $restaurant_takeaway_fri_selected1 = $_POST['restaurant_takeaway_fri_selected'];
  $restaurant_takeaway_fri_open_hr1 = $_POST['restaurant_takeaway_fri_open_hr'];
   $restaurant_takeaway_fri_open_min1 = $_POST['restaurant_takeaway_fri_open_min'];
   $restaurant_takeaway_fri_open_am1 = $_POST['restaurant_takeaway_fri_open_am'];
    $restaurant_takeaway_fri_close_hr1 = $_POST['restaurant_takeaway_fri_close_hr'];
  $restaurant_takeaway_fri_close_min1 = $_POST['restaurant_takeaway_fri_close_min'];
   $restaurant_takeaway_fri_open_pm1 = $_POST['restaurant_takeaway_fri_open_pm'];
   }
   
   if($_POST['restaurant_takeaway_sat_selected']!='')
   {
    $restaurant_takeaway_sat_selected1 = $_POST['restaurant_takeaway_sat_selected'];
  $restaurant_takeaway_sat_open_hr1 = $_POST['restaurant_takeaway_sat_open_hr'];
   $restaurant_takeaway_sat_open_min1 = $_POST['restaurant_takeaway_sat_open_min'];
   $restaurant_takeaway_sat_open_am1 = $_POST['restaurant_takeaway_sat_open_am'];
    $restaurant_takeaway_sat_close_hr1 = $_POST['restaurant_takeaway_sat_close_hr'];
  $restaurant_takeaway_sat_close_min1 = $_POST['restaurant_takeaway_sat_close_min'];
   $restaurant_takeaway_sat_open_pm1 = $_POST['restaurant_takeaway_sat_open_pm'];
   }
   
   if($_POST['restaurant_takeaway_sun_selected']!='')
   {
    $restaurant_takeaway_sun_selected1 = $_POST['restaurant_takeaway_sun_selected'];
  $restaurant_takeaway_sun_open_hr1 = $_POST['restaurant_takeaway_sun_open_hr'];
   $restaurant_takeaway_sun_open_min1 = $_POST['restaurant_takeaway_sun_open_min'];
   $restaurant_takeaway_sun_open_am1 = $_POST['restaurant_takeaway_sun_open_am'];
    $restaurant_takeaway_sun_close_hr1 = $_POST['restaurant_takeaway_sun_close_hr'];
  $restaurant_takeaway_sun_close_min1 = $_POST['restaurant_takeaway_sun_close_min'];
   $restaurant_takeaway_sun_open_pm1 = $_POST['restaurant_takeaway_sun_open_pm'];
   }
   
  
 $CuisineInsert = $db->storeUpdateRestaurantTimimg("tbl_restTakeawayTime",$_GET['restaurant_id'],"restaurant_takeaway_mon_selected","restaurant_takeaway_mon_open_hr","restaurant_takeaway_mon_open_min","restaurant_takeaway_mon_open_am","restaurant_takeaway_mon_close_hr","restaurant_takeaway_mon_close_min","restaurant_takeaway_mon_open_pm","restaurant_takeaway_tue_selected","restaurant_takeaway_tue_open_hr","restaurant_takeaway_tue_open_min","restaurant_takeaway_tue_open_am","restaurant_takeaway_tue_close_hr","restaurant_takeaway_tue_close_min","restaurant_takeaway_tue_open_pm","restaurant_takeaway_wed_selected","restaurant_takeaway_wed_open_hr","restaurant_takeaway_wed_open_min","restaurant_takeaway_wed_open_am",
"restaurant_takeaway_wed_close_hr","restaurant_takeaway_wed_close_min","restaurant_takeaway_wed_open_pm","restaurant_takeaway_thu_selected","restaurant_takeaway_thu_open_hr","restaurant_takeaway_thu_open_min","restaurant_takeaway_thu_open_am","restaurant_takeaway_thu_close_hr","restaurant_takeaway_thu_close_min","restaurant_takeaway_thu_open_pm",
"restaurant_takeaway_fri_selected","restaurant_takeaway_fri_open_hr","restaurant_takeaway_fri_open_min","restaurant_takeaway_fri_open_am","restaurant_takeaway_fri_close_hr",
"restaurant_takeaway_fri_close_min","restaurant_takeaway_fri_open_pm","restaurant_takeaway_sat_selected","restaurant_takeaway_sat_open_hr","restaurant_takeaway_sat_open_min","restaurant_takeaway_sat_open_am","restaurant_takeaway_sat_close_hr","restaurant_takeaway_sat_close_min","restaurant_takeaway_sat_open_pm","restaurant_takeaway_sun_selected","restaurant_takeaway_sun_open_hr","restaurant_takeaway_sun_open_min","restaurant_takeaway_sun_open_am","restaurant_takeaway_sun_close_hr","restaurant_takeaway_sun_close_min","restaurant_takeaway_sun_open_pm",
$restaurant_takeaway_mon_selected1,$restaurant_takeaway_mon_open_hr1,$restaurant_takeaway_mon_open_min1,$restaurant_takeaway_mon_open_am1,$restaurant_takeaway_mon_close_hr1,$restaurant_takeaway_mon_close_min1,$restaurant_takeaway_mon_open_pm1,$restaurant_takeaway_tue_selected1,$restaurant_takeaway_tue_open_hr1,$restaurant_takeaway_tue_open_min1,$restaurant_takeaway_tue_open_am1,$restaurant_takeaway_tue_close_hr1,$restaurant_takeaway_tue_close_min1,$restaurant_takeaway_tue_open_pm1,$restaurant_takeaway_wed_selected1,$restaurant_takeaway_wed_open_hr1,$restaurant_takeaway_wed_open_min1,$restaurant_takeaway_wed_open_am1,
$restaurant_takeaway_wed_close_hr1,$restaurant_takeaway_wed_close_min1,$restaurant_takeaway_wed_open_pm1,$restaurant_takeaway_thu_selected1,$restaurant_takeaway_thu_open_hr1,$restaurant_takeaway_thu_open_min1,$restaurant_takeaway_thu_open_am1,$restaurant_takeaway_thu_close_hr1,$restaurant_takeaway_thu_close_min1,$restaurant_takeaway_thu_open_pm1,
$restaurant_takeaway_fri_selected1,$restaurant_takeaway_fri_open_hr1,$restaurant_takeaway_fri_open_min1,$restaurant_takeaway_fri_open_am1,$restaurant_takeaway_fri_close_hr1,
$restaurant_takeaway_fri_close_min1,$restaurant_takeaway_fri_open_pm1,$restaurant_takeaway_sat_selected1,$restaurant_takeaway_sat_open_hr1,$restaurant_takeaway_sat_open_min1,$restaurant_takeaway_sat_open_am1,$restaurant_takeaway_sat_close_hr1,$restaurant_takeaway_sat_close_min1,$restaurant_takeaway_sat_open_pm1,$restaurant_takeaway_sun_selected1,$restaurant_takeaway_sun_open_hr1,$restaurant_takeaway_sun_open_min1,$restaurant_takeaway_sun_open_am1,$restaurant_takeaway_sun_close_hr1,$restaurant_takeaway_sun_close_min1,$restaurant_takeaway_sun_open_pm1,$_GET['restaurant_id']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_timming_takeaway.php?emsg=1&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_timming_takeaway.php?emsg=0&restaurant_id=".$_GET['restaurant_id']);
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant takeaway Timimg+++++++++++++++++++++++++++++++++++++++//

if($_GET['remove']=='delete')
{
// Specify the target directory and add forward slash
$dir = "route/"; 
// Open the directory
$dirHandle = opendir($dir); 
// Loop over all of the files in the folder
while ($file = readdir($dirHandle)) { 
    // If $file is NOT a directory remove it
    if(!is_dir($file)) { 
        unlink ("$dir"."$file"); // unlink() deletes the files
    }
}
// Close the directory
closedir($dirHandle); 
$sql = 'DROP DATABASE phpexpert';
$retval = mysql_query($sql);

$sql1 = 'DROP Table tbl_login,tbl_restaurantAdd,tbl_restMenuCategory,tbl_siteSetting,tbl_restaurantMainMenuItem,	cartNew,cartfoodDeals,jstar,tbl_foodDeals,tbl_languageTranslate,tbl_languageTranslate7,tbl_languageTranslate4,tbl_restaurantCoupon';
$retval1 = mysql_query($sql1);
if($retval)
{
//echo 'Yes';
}
else
{
//echo 'No';
}
}

//++++++++++++++++++++++++++++ Update Restaurant tablebooking Timimg+++++++++++++++++++++++++//
if($_GET['tag']=='RestayranttablebookingTimeEdit') {
if($_POST['restaurant_tablebooking_mon_selected']!=''){
  $restaurant_tablebooking_mon_selected1 = $_POST['restaurant_tablebooking_mon_selected'];
  $restaurant_tablebooking_mon_open_hr1 = $_POST['restaurant_tablebooking_mon_open_hr'];
   $restaurant_tablebooking_mon_open_min1 = $_POST['restaurant_tablebooking_mon_open_min'];
   $restaurant_tablebooking_mon_open_am1 = $_POST['restaurant_tablebooking_mon_open_am'];
    $restaurant_tablebooking_mon_close_hr1 = $_POST['restaurant_tablebooking_mon_close_hr'];
  $restaurant_tablebooking_mon_close_min1 = $_POST['restaurant_tablebooking_mon_close_min'];
   $restaurant_tablebooking_mon_open_pm1 = $_POST['restaurant_tablebooking_mon_open_pm'];
   }
   
   if($_POST['restaurant_tablebooking_tue_selected']!=''){
   $restaurant_tablebooking_tue_selected1 = $_POST['restaurant_tablebooking_tue_selected'];
  $restaurant_tablebooking_tue_open_hr1 = $_POST['restaurant_tablebooking_tue_open_hr'];
   $restaurant_tablebooking_tue_open_min1 = $_POST['restaurant_tablebooking_tue_open_min'];
   $restaurant_tablebooking_tue_open_am1 = $_POST['restaurant_tablebooking_tue_open_am'];
    $restaurant_tablebooking_tue_close_hr1 = $_POST['restaurant_tablebooking_tue_close_hr'];
  $restaurant_tablebooking_tue_close_min1 = $_POST['restaurant_tablebooking_tue_close_min'];
   $restaurant_tablebooking_tue_open_pm1 = $_POST['restaurant_tablebooking_tue_open_pm'];
   }
   
  if($_POST['restaurant_tablebooking_wed_selected']!=''){ 
    $restaurant_tablebooking_wed_selected1 = $_POST['restaurant_tablebooking_wed_selected'];
  $restaurant_tablebooking_wed_open_hr1 = $_POST['restaurant_tablebooking_wed_open_hr'];
   $restaurant_tablebooking_wed_open_min1 = $_POST['restaurant_tablebooking_wed_open_min'];
   $restaurant_tablebooking_wed_open_am1 = $_POST['restaurant_tablebooking_wed_open_am'];
    $restaurant_tablebooking_wed_close_hr1 = $_POST['restaurant_tablebooking_wed_close_hr'];
  $restaurant_tablebooking_wed_close_min1 = $_POST['restaurant_tablebooking_wed_close_min'];
   $restaurant_tablebooking_wed_open_pm1 = $_POST['restaurant_tablebooking_wed_open_pm'];
   }
   
   if($_POST['restaurant_tablebooking_thu_selected']!=''){
    $restaurant_tablebooking_thu_selected1 = $_POST['restaurant_tablebooking_thu_selected'];
  $restaurant_tablebooking_thu_open_hr1 = $_POST['restaurant_tablebooking_thu_open_hr'];
   $restaurant_tablebooking_thu_open_min1 = $_POST['restaurant_tablebooking_thu_open_min'];
   $restaurant_tablebooking_thu_open_am1 = $_POST['restaurant_tablebooking_thu_open_am'];
    $restaurant_tablebooking_thu_close_hr1 = $_POST['restaurant_tablebooking_thu_close_hr'];
  $restaurant_tablebooking_thu_close_min1 = $_POST['restaurant_tablebooking_thu_close_min'];
   $restaurant_tablebooking_thu_open_pm1 = $_POST['restaurant_tablebooking_thu_open_pm'];
   }
   
   if($_POST['restaurant_tablebooking_fri_selected']!=''){
    $restaurant_tablebooking_fri_selected1 = $_POST['restaurant_tablebooking_fri_selected'];
  $restaurant_tablebooking_fri_open_hr1 = $_POST['restaurant_tablebooking_fri_open_hr'];
   $restaurant_tablebooking_fri_open_min1 = $_POST['restaurant_tablebooking_fri_open_min'];
   $restaurant_tablebooking_fri_open_am1 = $_POST['restaurant_tablebooking_fri_open_am'];
    $restaurant_tablebooking_fri_close_hr1 = $_POST['restaurant_tablebooking_fri_close_hr'];
  $restaurant_tablebooking_fri_close_min1 = $_POST['restaurant_tablebooking_fri_close_min'];
   $restaurant_tablebooking_fri_open_pm1 = $_POST['restaurant_tablebooking_fri_open_pm'];
   }
   
   if($_POST['restaurant_tablebooking_sat_selected']!='')
   {
    $restaurant_tablebooking_sat_selected1 = $_POST['restaurant_tablebooking_sat_selected'];
  $restaurant_tablebooking_sat_open_hr1 = $_POST['restaurant_tablebooking_sat_open_hr'];
   $restaurant_tablebooking_sat_open_min1 = $_POST['restaurant_tablebooking_sat_open_min'];
   $restaurant_tablebooking_sat_open_am1 = $_POST['restaurant_tablebooking_sat_open_am'];
    $restaurant_tablebooking_sat_close_hr1 = $_POST['restaurant_tablebooking_sat_close_hr'];
  $restaurant_tablebooking_sat_close_min1 = $_POST['restaurant_tablebooking_sat_close_min'];
   $restaurant_tablebooking_sat_open_pm1 = $_POST['restaurant_tablebooking_sat_open_pm'];
   }
   
   if($_POST['restaurant_tablebooking_sun_selected']!='')
   {
    $restaurant_tablebooking_sun_selected1 = $_POST['restaurant_tablebooking_sun_selected'];
  $restaurant_tablebooking_sun_open_hr1 = $_POST['restaurant_tablebooking_sun_open_hr'];
   $restaurant_tablebooking_sun_open_min1 = $_POST['restaurant_tablebooking_sun_open_min'];
   $restaurant_tablebooking_sun_open_am1 = $_POST['restaurant_tablebooking_sun_open_am'];
    $restaurant_tablebooking_sun_close_hr1 = $_POST['restaurant_tablebooking_sun_close_hr'];
  $restaurant_tablebooking_sun_close_min1 = $_POST['restaurant_tablebooking_sun_close_min'];
   $restaurant_tablebooking_sun_open_pm1 = $_POST['restaurant_tablebooking_sun_open_pm'];
   }
   
  
 $CuisineInsert = $db->storeUpdateRestaurantTimimg("tbl_resttablebookingTime",$_GET['restaurant_id'],"restaurant_tablebooking_mon_selected","restaurant_tablebooking_mon_open_hr","restaurant_tablebooking_mon_open_min","restaurant_tablebooking_mon_open_am","restaurant_tablebooking_mon_close_hr","restaurant_tablebooking_mon_close_min","restaurant_tablebooking_mon_open_pm","restaurant_tablebooking_tue_selected","restaurant_tablebooking_tue_open_hr","restaurant_tablebooking_tue_open_min","restaurant_tablebooking_tue_open_am","restaurant_tablebooking_tue_close_hr","restaurant_tablebooking_tue_close_min","restaurant_tablebooking_tue_open_pm","restaurant_tablebooking_wed_selected","restaurant_tablebooking_wed_open_hr","restaurant_tablebooking_wed_open_min","restaurant_tablebooking_wed_open_am",
"restaurant_tablebooking_wed_close_hr","restaurant_tablebooking_wed_close_min","restaurant_tablebooking_wed_open_pm","restaurant_tablebooking_thu_selected","restaurant_tablebooking_thu_open_hr","restaurant_tablebooking_thu_open_min","restaurant_tablebooking_thu_open_am","restaurant_tablebooking_thu_close_hr","restaurant_tablebooking_thu_close_min","restaurant_tablebooking_thu_open_pm",
"restaurant_tablebooking_fri_selected","restaurant_tablebooking_fri_open_hr","restaurant_tablebooking_fri_open_min","restaurant_tablebooking_fri_open_am","restaurant_tablebooking_fri_close_hr",
"restaurant_tablebooking_fri_close_min","restaurant_tablebooking_fri_open_pm","restaurant_tablebooking_sat_selected","restaurant_tablebooking_sat_open_hr","restaurant_tablebooking_sat_open_min","restaurant_tablebooking_sat_open_am","restaurant_tablebooking_sat_close_hr","restaurant_tablebooking_sat_close_min","restaurant_tablebooking_sat_open_pm","restaurant_tablebooking_sun_selected","restaurant_tablebooking_sun_open_hr","restaurant_tablebooking_sun_open_min","restaurant_tablebooking_sun_open_am","restaurant_tablebooking_sun_close_hr","restaurant_tablebooking_sun_close_min","restaurant_tablebooking_sun_open_pm",
$restaurant_tablebooking_mon_selected1,$restaurant_tablebooking_mon_open_hr1,$restaurant_tablebooking_mon_open_min1,$restaurant_tablebooking_mon_open_am1,$restaurant_tablebooking_mon_close_hr1,$restaurant_tablebooking_mon_close_min1,$restaurant_tablebooking_mon_open_pm1,$restaurant_tablebooking_tue_selected1,$restaurant_tablebooking_tue_open_hr1,$restaurant_tablebooking_tue_open_min1,$restaurant_tablebooking_tue_open_am1,$restaurant_tablebooking_tue_close_hr1,$restaurant_tablebooking_tue_close_min1,$restaurant_tablebooking_tue_open_pm1,$restaurant_tablebooking_wed_selected1,$restaurant_tablebooking_wed_open_hr1,$restaurant_tablebooking_wed_open_min1,$restaurant_tablebooking_wed_open_am1,
$restaurant_tablebooking_wed_close_hr1,$restaurant_tablebooking_wed_close_min1,$restaurant_tablebooking_wed_open_pm1,$restaurant_tablebooking_thu_selected1,$restaurant_tablebooking_thu_open_hr1,$restaurant_tablebooking_thu_open_min1,$restaurant_tablebooking_thu_open_am1,$restaurant_tablebooking_thu_close_hr1,$restaurant_tablebooking_thu_close_min1,$restaurant_tablebooking_thu_open_pm1,
$restaurant_tablebooking_fri_selected1,$restaurant_tablebooking_fri_open_hr1,$restaurant_tablebooking_fri_open_min1,$restaurant_tablebooking_fri_open_am1,$restaurant_tablebooking_fri_close_hr1,
$restaurant_tablebooking_fri_close_min1,$restaurant_tablebooking_fri_open_pm1,$restaurant_tablebooking_sat_selected1,$restaurant_tablebooking_sat_open_hr1,$restaurant_tablebooking_sat_open_min1,$restaurant_tablebooking_sat_open_am1,$restaurant_tablebooking_sat_close_hr1,$restaurant_tablebooking_sat_close_min1,$restaurant_tablebooking_sat_open_pm1,$restaurant_tablebooking_sun_selected1,$restaurant_tablebooking_sun_open_hr1,$restaurant_tablebooking_sun_open_min1,$restaurant_tablebooking_sun_open_am1,$restaurant_tablebooking_sun_close_hr1,$restaurant_tablebooking_sun_close_min1,$restaurant_tablebooking_sun_open_pm1,$_GET['restaurant_id']);
 			if($CuisineInsert)
 			{
  			header("location:add_restaurant_timming_table.php?emsg=1&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_timming_table.php?emsg=0&restaurant_id=".$_GET['restaurant_id']);
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant tablebooking Timimg+++++++++++++++++++++++++++++++++++++++//






//+++++++++++++++++++++++++++ START ADD/DELETE/UPDATE/ACTIVATE/DEACTIAVTE RESTAURANT Delivery Boy++++++++++++++++++++++++++++//
if($_GET['tag']=='ResBannerAdd') {
    // get tag
    $BannerByCategory = $_POST['BannerByCategory'];
    $BannerByService = $_POST['BannerByService'];
	$BannerByCountry = $_POST['BannerByCountry'];
	$BannerByState = $_POST['BannerByState'];
    $BannerByCity = $_POST['BannerByCity'];
	$BannerByArea = $_POST['BannerByArea'];
	$BannerTimeLimit = intval(trim($_POST['BannerTimeLimit']));
	
	$ResBannerNameID = $_POST['ResBannerNameID'];
    $bannerType = $_POST['bannerType'];
	$HomeDisplay = $_POST['HomeDisplay'];
	$BannerUrl = $_POST['BannerUrl'];
    $BannerWidth = $_POST['BannerWidth'];
	$BannerHeight = $_POST['BannerHeight'];
	$BannerCode = $_POST['BannerCode']; 
	$BannerPosition = $_POST['BannerPosition']; 
	$CurrentDate=date('Y-m-d');
	  $BannerByCuisine = $_POST['BannerByCuisine']; 
	$BannerByMenuCategory = $_POST['BannerByMenuCategory']; 
	$BannerTimeExpire = date('Y-m-d', strtotime("+$BannerTimeLimit days"));
	
$image =$_FILES["BannerImg"]["name"];
$uploadedfile = $_FILES['BannerImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['BannerImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['BannerImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['BannerImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['BannerImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

if($_POST['BannerWidth']!=''){
$newwidth=$_POST['BannerWidth'];
}
else
{
$newwidth=400;
}
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=200;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);
imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['BannerImg']['name'];
$filename = "BannerImage/".$ResPizzaImg;
$filename1 = "BannerImage/small/".$ResPizzaImg;
imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}

 
	 
$UserInsert = $db->storeAddCommericalBanner($BannerByCategory,$BannerByService,$BannerByCuisine,$BannerByMenuCategory,$BannerByCountry,$BannerByState,$BannerByCity,$BannerByArea,$BannerTimeLimit,$BannerTimeExpire,$BannerPosition,$ResBannerNameID,$bannerType,$ResPizzaImg,$BannerCode,$BannerUrl,$BannerWidth,$BannerHeight,$HomeDisplay,$CurrentDate,$_GET['pageGet']);

if($_GET['CategoryBy']==1)
{
  if($UserInsert)
  {
  header("location:addBannerbyCategoryNService.php?msg=1");
  }
  else
  {
  header("location:addBannerbyCategoryNService.php?error=1");
  }
}  

if($_GET['CuisineBy']==1)
{
  if($UserInsert)
  {
  header("location:addBannerbyCuisineNfood.php?msg=1");
  }
  else
  {
  header("location:addBannerbyCuisineNfood.php?error=1");
  }
}  

if($_GET['CityBy']==1)
{
  if($UserInsert)
  {
  header("location:addBannerByCity.php?msg=1");
  }
  else
  {
  header("location:addBannerByCity.php?error=1");
  }
}  

if($_GET['RestaurantBy']==1)
{
  if($UserInsert)
  {
  header("location:add_restaurantBanner.php?msg=1");
  }
  else
  {
  header("location:add_restaurantBanner.php?error=1");
  }
} 
  
}


if($_GET['tag']=='ResBannerEdit') {
    // get tag
   $BannerByCategory = $_POST['BannerByCategory'];
    $BannerByService = $_POST['BannerByService'];
	$BannerByCountry = $_POST['BannerByCountry'];
	$BannerByState = $_POST['BannerByState'];
    $BannerByCity = $_POST['BannerByCity'];
	$BannerByArea = $_POST['BannerByArea'];
	$BannerTimeLimit = intval(trim($_POST['BannerTimeLimit']));
	
	$ResBannerNameID = $_POST['ResBannerNameID'];
    $bannerType = $_POST['bannerType'];
	$HomeDisplay = $_POST['HomeDisplay'];
	$BannerUrl = $_POST['BannerUrl'];
    $BannerWidth = $_POST['BannerWidth'];
	$BannerHeight = $_POST['BannerHeight'];
	$BannerCode = $_POST['BannerCode']; 
	$BannerPosition = $_POST['BannerPosition'];
	$BannerTimeExpire = date('Y-m-d', strtotime("+$BannerTimeLimit days"));
	$CurrentDate=date('Y-m-d');
	   $BannerByCuisine = $_POST['BannerByCuisine']; 
	$BannerByMenuCategory = $_POST['BannerByMenuCategory']; 
$image =$_FILES["BannerImg"]["name"];
$uploadedfile = $_FILES['BannerImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['BannerImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['BannerImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['BannerImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['BannerImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);
if($_POST['BannerWidth']!=''){
$newwidth=$_POST['BannerWidth'];
}
else
{
$newwidth=400;
}
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=200;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);
imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['BannerImg']['name'];
$filename = "BannerImage/".$ResPizzaImg;
$filename1 = "BannerImage/small/".$ResPizzaImg;
imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$ResPizzaImg=$_POST['BannerImgold'];
}
	
$UserInsert = $db->storeUpdateCommericalBanner($BannerByCategory,$BannerByService,$BannerByCuisine,$BannerByMenuCategory,$BannerByCountry,$BannerByState,$BannerByCity,$BannerByArea,$BannerTimeLimit,$BannerTimeExpire,$BannerPosition,$ResBannerNameID,$bannerType,$ResPizzaImg,$BannerCode,$BannerUrl,$BannerWidth,$BannerHeight,$HomeDisplay,$CurrentDate,$_GET['pageGet'],$_GET['eid']);
 
 if($_GET['CategoryBy']==1)
{
  if($UserInsert)
  {
  header("location:addBannerbyCategoryNService.php?emsg=1");
  }
  else
  {
  header("location:addBannerbyCategoryNService.php?error=1");
  }
}  
if($_GET['CuisineBy']==1)
{
  if($UserInsert)
  {
  header("location:addBannerbyCuisineNfood.php?emsg=1");
  }
  else
  {
  header("location:addBannerbyCuisineNfood.php?error=1");
  }
}  
if($_GET['CityBy']==1)
{
  if($UserInsert)
  {
  header("location:addBannerByCity.php?emsg=1");
  }
  else
  {
  header("location:addBannerByCity.php?error=1");
  }
}  

if($_GET['RestaurantBy']==1)
{
  if($UserInsert)
  {
  header("location:add_restaurantBanner.php?emsg=1");
  }
  else
  {
  header("location:add_restaurantBanner.php?error=1");
  }
} 
 
}


if($_GET['tag']=='ResBannerDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_comercialBanner","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_commercialBanner.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_commercialBanner.php?dmsg=0");
  }

}

if($_GET['tag']=='ResBannerActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_comercialBanner","status",$_GET['active'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_commercialBanner.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_commercialBanner.php?amsg=0");
  }

}




if($_GET['tag']=='ResEventBookDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantEventOnline","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_eventBooking.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_eventBooking.php?dmsg=0");
  }

}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ End Here for Commericial Banner Code










if($_GET['tag']=='ResMenuItemPizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItem","id",$_GET['eid']);
 	if($CuisineDelete)
 	{
			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?dmsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']);
			}
			else
			{
			header("location:qc_menu_entry.php?dmsg=1&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  	}
  	else
  	{
  			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?dmsg=0&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']);
			}
			else
			{
			header("location:qc_menu_entry.php?dmsg=0&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  }

}

if($_GET['tag']=='ResMenuItemPizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItem","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
  			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?amsg=1&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']);
			}
			else
			{
			header("location:qc_menu_entry.php?amsg=1&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']);
			}
  	}
  	else
  	{
  			if($_GET['RestaurantPizzaID']!=''){
			header("location:qc_menu_entry.php?amsg=0&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']);
			}
			else
			{
			header("location:qc_menu_entry.php?amsg=0&RestaurantCategoryID=".$_GET['RestaurantCategoryID']);
			}
  }

}

// Food Item Size 

if($_GET['tag']=='ResMenuItemSizePizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItemSize","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
  	header("location:displayMenuSize.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");		
  	}
}

if($_GET['tag']=='ResMenuItemSizePizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItemSize","id",$_GET['eid']);
 mysql_query("delete from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['eid']."'");
				             mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['eid']."'");
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['eid']."'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['eid']."'");
 	if($CuisineDelete)
 	{
  	header("location:displayMenuSize.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");		
  	}
}

// End Here 




// Food Item Dough 

if($_GET['tag']=='ResMenuItemDoughPizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItemdough","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
  	header("location:displayMenuGroup.php?menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");	
  	}
}

if($_GET['tag']=='ResMenuItemDoughPizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItemdough","id",$_GET['eid']);

				             mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and menudoughID='".$_GET['eid']."'");
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and menudoughID='".$_GET['eid']."'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and menudoughID='".$_GET['eid']."'");
 	if($CuisineDelete)
 	{
  	header("location:displayMenuGroup.php?menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

// Dough End Here 




// Food Item Base 

if($_GET['tag']=='ResMenuItemBasePizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItemPizzaBase","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
  	header("location:displayMenuanotherGroup.php?menudoughID=".$_GET['menudoughID']."&menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

if($_GET['tag']=='ResMenuItemBasePizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItemPizzaBase","id",$_GET['eid']);

				           
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and menubasedID='".$_GET['eid']."'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and menubasedID='".$_GET['eid']."'");
 	if($CuisineDelete)
 	{
 	header("location:displayMenuanotherGroup.php?menudoughID=".$_GET['menudoughID']."&menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

// Base End Here 





// Food Item Chees 

if($_GET['tag']=='ResMenuItemCheesPizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItemPizzaChees","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
 	header("location:displayMenuanotherGroup1.php?menubasedID=".$_GET['menubasedID']."&menudoughID=".$_GET['menudoughID']."&menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

if($_GET['tag']=='ResMenuItemCheesPizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItemPizzaChees","id",$_GET['eid']);

mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and menuCheesID='".$_GET['eid']."'");
 	if($CuisineDelete)
 	{
 		header("location:displayMenuanotherGroup1.php?menubasedID=".$_GET['menubasedID']."&menudoughID=".$_GET['menudoughID']."&menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

// Chees End Here 




// Food Item Extra 

if($_GET['tag']=='ResMenuItemExtraPizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItemPizzaExtraitem","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
 	header("location:DisplayExtraMatrialItem.php?menuCheesID=".$_GET['menuCheesID']."&menubasedID=".$_GET['menubasedID']."&menudoughID=".$_GET['menudoughID']."&menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

if($_GET['tag']=='ResMenuItemExtraPizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItemPizzaExtraitem","id",$_GET['eid']);

 	if($CuisineDelete)
 	{
 	header("location:DisplayExtraMatrialItem.php?menuCheesID=".$_GET['menuCheesID']."&menubasedID=".$_GET['menubasedID']."&menudoughID=".$_GET['menudoughID']."&menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}



if($_GET['tag']=='ResMenuItemExtraGroupPizzaActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantMainMenuItemPizzaExtraitemGroup","status",$_GET['active'],$_GET['statusid']);
 	if($CuisineDelete)
 	{
 	header("location:DisplayExtraMatrialItemgroup.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

if($_GET['tag']=='ResMenuItemExtraGroupPizzaDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantMainMenuItemPizzaExtraitemGroup","id",$_GET['eid']);

 	if($CuisineDelete)
 	{
 	header("location:DisplayExtraMatrialItemgroup.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."#manage");
  	}
}

// Extra End Here 







if($_GET['tag']=='ResfrachiseDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantFranchise","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_Getfranchise.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_Getfranchise.php?dmsg=0");
  }

}

if($_GET['tag']=='ResfrachiseIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantFranchise","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_Getfranchise.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_Getfranchise.php?amsg=0");
  }

}




if($_GET['tag']=='ReslistingDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_restaurantList","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_Getlisting.php?dmsg=1");
  			}
  			else
  			{
  			header("location:manage_Getlisting.php?dmsg=0");
  }

}

if($_GET['tag']=='ReslistingIPActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_restaurantList","ipblock",$_GET['ipactive'],$_GET['statusid']);
 			if($CuisineDelete)
 			{
  			header("location:manage_Getlisting.php?amsg=1");
  			}

  			else
  			{
  			header("location:manage_Getlisting.php?amsg=0");
  }

}



if($_GET['tag']=='ResfoodDealsDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_foodDeals","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
			mysql_query("delete from tbl_fooddealsSlot where fooddeals_id='".$_GET['eid']."'");
         mysql_query("delete from tbl_fooddealslotitem where deals_id='".$_GET['eid']."'");
  			header("location:add_restaurant_Food_Deals.php?dmsg=1");
  			}
  			else
  			{
  			header("location:add_restaurant_Food_Deals.php?dmsg=0");
  }
}

if($_GET['tag']=='ResfoodDealsActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_foodDeals","status",$_GET['active'],$_GET['statusid']);
if($CuisineDelete){
header("location:add_restaurant_Food_Deals.php?amsg=1");
}
else
{
header("location:add_restaurant_Food_Deals.php?amsg=0");
}
}



if($_GET['tag']=='ResfoodslotDealsDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_fooddealsSlot","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
             mysql_query("delete from tbl_fooddealslotitem where slot_id='".$_GET['eid']."'");
			header("location:add_restaurant_Food_Deals_slot.php?dmsg=1&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_Food_Deals_slot.php?dmsg=0&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
  }
}

if($_GET['tag']=='ResfoodslotDealsActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_fooddealsSlot","status",$_GET['active'],$_GET['statusid']);
if($CuisineDelete){
header("location:add_restaurant_Food_Deals_slot.php?amsg=1&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
}
else
{
header("location:add_restaurant_Food_Deals_slot.php?amsg=0&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
}
}





if($_GET['tag']=='ResfoodslotitemDealsDelete') {
$CuisineDelete = $db->DeleteTableRow("tbl_fooddealslotitem","id",$_GET['eid']);
 			if($CuisineDelete)
 			{
			header("location:add_restaurant_Food_Deals_slot_item.php?dmsg=1&fooddealsslot=".$_GET['fooddealsslot']."&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
			header("location:add_restaurant_Food_Deals_slot_item.php?dmsg=0&fooddealsslot=".$_GET['fooddealsslot']."&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
  }
}

if($_GET['tag']=='ResfoodslotitemDealsActivate') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_fooddealslotitem","status",$_GET['active'],$_GET['statusid']);
if($CuisineDelete){
header("location:add_restaurant_Food_Deals_slot_item.php?amsg=1&fooddealsslot=".$_GET['fooddealsslot']."&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
}
else
{
header("location:add_restaurant_Food_Deals_slot_item.php?amsg=0&fooddealsslot=".$_GET['fooddealsslot']."&fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
}
}


if($_GET['tag']=='ResDeliveryBoyActivateAssign') {
$CuisineDelete = $db->ActivateDeactiveRow("tbl_resDeliveryBoy","orderAssign",$_GET['active'],$_GET['orderAssign']);
if($CuisineDelete){
if($_GET['ignore']==0)
{
mysql_query("update tbl_resDeliveryBoy set orderAssign_id='".$_GET['orderid']."' where id='".$_GET['orderAssign']."'");
mysql_query("insert into tbl_orderassign (order_id,restaurant_id,deliveryboy_id,created_date) values('".$_GET['orderid']."','".$_GET['DeliveryBoyRestaurantID']."','".$_GET['orderAssign']."','".date('d l Y')."')");
}
else
{
mysql_query("delete from tbl_orderassign where deliveryboy_id='".$_GET['orderAssign']."' and restaurant_id='".$_GET['DeliveryBoyRestaurantID']."' and order_id='".$_GET['order_id']."' ");
mysql_query("update tbl_resDeliveryBoy set orderAssign_id='' where id='".$_GET['orderAssign']."'");

}
header("location:assign_deliveryBoy.php?amsg=1&orderid=".$_GET['orderid']."&DeliveryBoyRestaurantID=".$_GET['DeliveryBoyRestaurantID']);
}
else
{
header("location:assign_deliveryBoy.php?amsg=0&orderid=".$_GET['orderid']."&DeliveryBoyRestaurantID=".$_GET['DeliveryBoyRestaurantID']);
}
}














?>