<?php

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
  			header("location:add_restaurant_timming_tablebooking.php?emsg=1&restaurant_id=".$_GET['restaurant_id']);
  			}
  			else
  			{
  			header("location:add_restaurant_timming_tablebooking.php?emsg=0&restaurant_id=".$_GET['restaurant_id']);
  }
}

//++++++++++++++++++++++++++++++++++++++ END Update Restaurant tablebooking Timimg+++++++++++++++++++++++++++++++++++++++//


?>