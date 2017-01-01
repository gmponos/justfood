<?php
$CurrentTime = date('h:i A', time());
if($resdata['restaurant_service']=='Pickup'){											// Pickup Restaurant Only
if($takeawayTime['restaurant_takeaway_mon_selected']!=''){
$monStart=$takeawayTime['MondayBusinessHoursOpenTime'];
$monClose=$takeawayTime['MondayBusinessHoursCloseTime'];
$monDateValue1=$monStart.'-'.$monClose;
}
else
{
$monDateValue1='closed';
}
if($takeawayTime['restaurant_takeaway_tue_selected']!=''){
$tueStart=$takeawayTime['TuesdayBusinessHoursOpenTime'];
$tueClose=$takeawayTime['TuesdayBusinessHoursCloseTime'];
$tueDateValue1=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_wed_selected']!=''){
$wedStart=$takeawayTime['WednesdayBusinessHoursOpenTime'];
$wedClose=$takeawayTime['WednesdayBusinessHoursCloseTime'];
$wedDateValue1=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_thu_selected']!=''){
$thuStart=$takeawayTime['ThursdayBusinessHoursOpenTime'];
$thuClose=$takeawayTime['ThursdayBusinessHoursCloseTime'];
 $thuDateValue1=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_fri_selected']!=''){
$friStart=$takeawayTime['FridayBusinessHoursOpenTime'];
$friClose=$takeawayTime['FridayBusinessHoursCloseTime'];
 $friDateValue1=$friStart.'-'.$friClose;
}
else
{
$friDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_sat_selected']!=''){
$satStart=$takeawayTime['SaturdayBusinessHoursOpenTime'];
$satClose=$takeawayTime['SaturdayBusinessHoursCloseTime'];
 $satDateValue1=$satStart.'-'.$satClose;
}
else
{
$satDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_sun_selected']!=''){
$sunStart=$takeawayTime['SundayBusinessHoursOpenTime'];
$sunClose=$takeawayTime['SundayBusinessHoursCloseTime'];
 $sunDateValue1=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue1='closed';
}
}




else {	
// Home Delivery + Pickup or Only Home Delivery
if($DeliveryTime['restaurant_takeaway_mon_selected']!=''){
$monStart=$DeliveryTime['MondayBusinessHoursOpenTime'];
$monClose=$DeliveryTime['MondayBusinessHoursCloseTime'];
$monDateValue1=$monStart.'-'.$monClose;
}
else
{
$monDateValue1='closed';
}
if($DeliveryTime['restaurant_takeaway_tue_selected']!=''){
$tueStart=$DeliveryTime['TuesdayBusinessHoursOpenTime'];
$tueClose=$DeliveryTime['TuesdayBusinessHoursCloseTime'];
$tueDateValue1=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue1='closed';
}


if($DeliveryTime['restaurant_takeaway_wed_selected']!=''){
$wedStart=$DeliveryTime['WednesdayBusinessHoursOpenTime'];
$wedClose=$DeliveryTime['WednesdayBusinessHoursCloseTime'];
$wedDateValue1=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue1='closed';
}


if($DeliveryTime['restaurant_takeaway_thu_selected']!=''){
$thuStart=$DeliveryTime['ThursdayBusinessHoursOpenTime'];
$thuClose=$DeliveryTime['ThursdayBusinessHoursCloseTime'];
 $thuDateValue1=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue1='closed';
}


if($DeliveryTime['restaurant_takeaway_fri_selected']!=''){
$friStart=$DeliveryTime['FridayBusinessHoursOpenTime'];
$friClose=$DeliveryTime['FridayBusinessHoursCloseTime'];
 $friDateValue1=$friStart.'-'.$friClose;
}
else
{
$friDateValue1='closed';
}


if($DeliveryTime['restaurant_takeaway_sat_selected']!=''){
$satStart=$DeliveryTime['SaturdayBusinessHoursOpenTime'];
$satClose=$DeliveryTime['SaturdayBusinessHoursCloseTime'];
 $satDateValue1=$satStart.'-'.$satClose;
}
else
{
$satDateValue1='closed';
}


if($DeliveryTime['restaurant_takeaway_sun_selected']!=''){
$sunStart=$DeliveryTime['SundayBusinessHoursOpenTime'];
$sunClose=$DeliveryTime['SundayBusinessHoursCloseTime'];
 $sunDateValue1=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue1='closed';
}
}	

$times = array(
    'mon' => $monDateValue1,
    'tue' => $tueDateValue1,
    'wed' => $wedDateValue1,
    'thu' => $thuDateValue1,
    'fri' => $friDateValue1,
    'sat' => $satDateValue1,
    'sun' => $sunDateValue1
);

$now = strtotime($CurrentTime);
$open = isOpen($now, $times);
if ($open == 0) {
$TimingStatus=$TableLanguage1['CloseOrderButtonText'];
$OrderButton=$TableLanguage1['PreOrderButtonText'];
$close=1;
//mysql_query("update tbl_restaurantAdd set open_status='0' where id='".$data['id']."'");
   // echo "Is closed";
} else {
$TimingStatus='Open';
$close=0;
$OrderButton=$TableLanguage1['OrderButtonText'];
//mysql_query("update tbl_restaurantAdd set open_status='1' where id='".$data['id']."'");
   // echo "Is open. Will close in ".ceil($open/60)." minutes";
}

?>
