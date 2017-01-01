<?php
$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$resID[0]."'"));
$takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$resID[0]."'"));
 $CurrentTime = date("G:i:s");
if($takeawayTime['restaurant_takeaway_mon_selected']!=''){
$monStart=$takeawayTime['MondayBusinessHoursOpenTime'];
$monClose=$takeawayTime['MondayBusinessHoursCloseTime'];
$pmonDateValue1=$monStart.'-'.$monClose;
}
else
{
$pmonDateValue1='closed';
}
if($takeawayTime['restaurant_takeaway_tue_selected']!=''){
$tueStart=$takeawayTime['TuesdayBusinessHoursOpenTime'];
$tueClose=$takeawayTime['TuesdayBusinessHoursCloseTime'];
$ptueDateValue1=$tueStart.'-'.$tueClose;
}
else
{
$ptueDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_wed_selected']!=''){
$wedStart=$takeawayTime['WednesdayBusinessHoursOpenTime'];
$wedClose=$takeawayTime['WednesdayBusinessHoursCloseTime'];
$pwedDateValue1=$wedStart.'-'.$wedClose;
}
else
{
$pwedDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_thu_selected']!=''){
$thuStart=$takeawayTime['ThursdayBusinessHoursOpenTime'];
$thuClose=$takeawayTime['ThursdayBusinessHoursCloseTime'];
 $pthuDateValue1=$thuStart.'-'.$thuClose;
}
else
{
$pthuDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_fri_selected']!=''){
$friStart=$takeawayTime['FridayBusinessHoursOpenTime'];
$friClose=$takeawayTime['FridayBusinessHoursCloseTime'];
 $pfriDateValue1=$friStart.'-'.$friClose;
}
else
{
$pfriDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_sat_selected']!=''){
$satStart=$takeawayTime['SaturdayBusinessHoursOpenTime'];
$satClose=$takeawayTime['SaturdayBusinessHoursCloseTime'];
 $psatDateValue1=$satStart.'-'.$satClose;
}
else
{
$psatDateValue1='closed';
}


if($takeawayTime['restaurant_takeaway_sun_selected']!=''){
$sunStart=$takeawayTime['SundayBusinessHoursOpenTime'];
$sunClose=$takeawayTime['SundayBusinessHoursCloseTime'];
 $psunDateValue1=$sunStart.'-'.$sunClose;
}
else
{
$psunDateValue1='closed';
}
// Home Delivery + Pickup or Only Home Delivery
if($DeliveryTime['restaurant_delivery_mon_selected']!=''){
$monStart=$DeliveryTime['MondayBusinessHoursOpenTime'];
$monClose=$DeliveryTime['MondayBusinessHoursCloseTime'];
$monDateValue1=$monStart.'-'.$monClose;
}
else
{
$monDateValue1='closed';
}
if($DeliveryTime['restaurant_delivery_tue_selected']!=''){
$tueStart=$DeliveryTime['TuesdayBusinessHoursOpenTime'];
$tueClose=$DeliveryTime['TuesdayBusinessHoursCloseTime'];
$tueDateValue1=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue1='closed';
}


if($DeliveryTime['restaurant_delivery_wed_selected']!=''){
$wedStart=$DeliveryTime['WednesdayBusinessHoursOpenTime'];
$wedClose=$DeliveryTime['WednesdayBusinessHoursCloseTime'];
$wedDateValue1=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue1='closed';
}


if($DeliveryTime['restaurant_delivery_thu_selected']!=''){
$thuStart=$DeliveryTime['ThursdayBusinessHoursOpenTime'];
$thuClose=$DeliveryTime['ThursdayBusinessHoursCloseTime'];
 $thuDateValue1=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue1='closed';
}


if($DeliveryTime['restaurant_delivery_fri_selected']!=''){
$friStart=$DeliveryTime['FridayBusinessHoursOpenTime'];
$friClose=$DeliveryTime['FridayBusinessHoursCloseTime'];
 $friDateValue1=$friStart.'-'.$friClose;
}
else
{
$friDateValue1='closed';
}


if($DeliveryTime['restaurant_delivery_sat_selected']!=''){
$satStart=$DeliveryTime['SaturdayBusinessHoursOpenTime'];
$satClose=$DeliveryTime['SaturdayBusinessHoursCloseTime'];
 $satDateValue1=$satStart.'-'.$satClose;
}
else
{
$satDateValue1='closed';
}


if($DeliveryTime['restaurant_delivery_sun_selected']!=''){
$sunStart=$DeliveryTime['SundayBusinessHoursOpenTime'];
$sunClose=$DeliveryTime['SundayBusinessHoursCloseTime'];
 $sunDateValue1=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue1='closed';
}

?>
