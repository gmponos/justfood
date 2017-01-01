<?php
$CurrentTime = date('h:i A', time());
if($resdata['restaurant_service']=='Pickup' || $resdata['restaurant_service']=='Takeout'){											// Pickup Restaurant Only
if(date("l")=='Monday' && $takeawayTime['restaurant_takeaway_mon_selected']!=''){
$monStart=$takeawayTime['restaurant_takeaway_mon_open_hr'].':'.$takeawayTime['restaurant_takeaway_mon_open_min'].''.$takeawayTime['restaurant_takeaway_mon_open_am'];
$monClose=$takeawayTime['restaurant_takeaway_mon_close_hr'].':'.$takeawayTime['restaurant_takeaway_mon_close_min'].''.$takeawayTime['restaurant_takeaway_mon_open_pm'];
$monDateValue=$monStart.'-'.$monClose;
}
else
{
$monDateValue='closed';
}
if(date("l")=='Tuesday' && $takeawayTime['restaurant_takeaway_tue_selected']!=''){
$tueStart=$takeawayTime['restaurant_takeaway_tue_open_hr'].':'.$takeawayTime['restaurant_takeaway_tue_open_min'].''.$takeawayTime['restaurant_takeaway_tue_open_am'];
$tueClose=$takeawayTime['restaurant_takeaway_tue_close_hr'].':'.$takeawayTime['restaurant_takeaway_tue_close_min'].''.$takeawayTime['restaurant_takeaway_tue_open_pm'];
 $tueDateValue=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue='closed';
}


if(date("l")=='Wednesday' && $takeawayTime['restaurant_takeaway_wed_selected']!=''){
$wedStart=$takeawayTime['restaurant_takeaway_wed_open_hr'].':'.$takeawayTime['restaurant_takeaway_wed_open_min'].''.$takeawayTime['restaurant_takeaway_wed_open_am'];
$wedClose=$takeawayTime['restaurant_takeaway_wed_close_hr'].':'.$takeawayTime['restaurant_takeaway_wed_close_min'].''.$takeawayTime['restaurant_takeaway_wed_open_pm'];
$wedDateValue=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue='closed';
}


if(date("l")=='Thursday' && $takeawayTime['restaurant_takeaway_thu_selected']!=''){
$thuStart=$takeawayTime['restaurant_takeaway_thu_open_hr'].':'.$takeawayTime['restaurant_takeaway_thu_open_min'].''.$takeawayTime['restaurant_takeaway_thu_open_am'];
$thuClose=$takeawayTime['restaurant_takeaway_thu_close_hr'].':'.$takeawayTime['restaurant_takeaway_thu_close_min'].''.$takeawayTime['restaurant_takeaway_thu_open_pm'];
 $thuDateValue=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue='closed';
}


if(date("l")=='Friday' && $takeawayTime['restaurant_takeaway_fri_selected']!=''){
$friStart=$takeawayTime['restaurant_takeaway_fri_open_hr'].':'.$takeawayTime['restaurant_takeaway_fri_open_min'].''.$takeawayTime['restaurant_takeaway_fri_open_am'];
$friClose=$takeawayTime['restaurant_takeaway_fri_close_hr'].':'.$takeawayTime['restaurant_takeaway_fri_close_min'].''.$takeawayTime['restaurant_takeaway_fri_open_pm'];
 $friDateValue=$friStart.'-'.$friClose;
}
else
{
$friDateValue='closed';
}


if(date("l")=='Saturday' && $takeawayTime['restaurant_takeaway_sat_selected']!=''){
$satStart=$takeawayTime['restaurant_takeaway_sat_open_hr'].':'.$takeawayTime['restaurant_takeaway_sat_open_min'].''.$takeawayTime['restaurant_takeaway_sat_open_am'];
$satClose=$takeawayTime['restaurant_takeaway_sat_close_hr'].':'.$takeawayTime['restaurant_takeaway_sat_close_min'].''.$takeawayTime['restaurant_takeaway_sat_open_pm'];
 $satDateValue=$satStart.'-'.$satClose;
}
else
{
$satDateValue='closed';
}


if(date("l")=='Sunday' && $takeawayTime['restaurant_takeaway_sun_selected']!=''){
$sunStart=$takeawayTime['restaurant_takeaway_sun_open_hr'].':'.$takeawayTime['restaurant_takeaway_sun_open_min'].''.$takeawayTime['restaurant_takeaway_sun_open_am'];
$sunClose=$takeawayTime['restaurant_takeaway_sun_close_hr'].':'.$takeawayTime['restaurant_takeaway_sun_close_min'].''.$takeawayTime['restaurant_takeaway_sun_open_pm'];
 $sunDateValue=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue='closed';
}
}else {															// Home Delivery + Pickup or Only Home Delivery

if(date("l")=='Monday' && $DeliveryTime['restaurant_delivery_mon_selected']!=''){
$monStart=$DeliveryTime['restaurant_delivery_mon_open_hr'].':'.$DeliveryTime['restaurant_delivery_mon_open_min'].''.$DeliveryTime['restaurant_delivery_mon_open_am'];
$monClose=$DeliveryTime['restaurant_delivery_mon_close_hr'].':'.$DeliveryTime['restaurant_delivery_mon_close_min'].''.$DeliveryTime['restaurant_delivery_mon_open_pm'];
$monDateValue=$monStart.'-'.$monClose;
}
else
{
$monDateValue='closed';
}
if(date("l")=='Tuesday' && $DeliveryTime['restaurant_delivery_tue_selected']!=''){
$tueStart=$DeliveryTime['restaurant_delivery_tue_open_hr'].':'.$DeliveryTime['restaurant_delivery_tue_open_min'].''.$DeliveryTime['restaurant_delivery_tue_open_am'];
$tueClose=$DeliveryTime['restaurant_delivery_tue_close_hr'].':'.$DeliveryTime['restaurant_delivery_tue_close_min'].''.$DeliveryTime['restaurant_delivery_tue_open_pm'];
 $tueDateValue=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue='closed';
}


if(date("l")=='Wednesday' && $DeliveryTime['restaurant_delivery_wed_selected']!=''){
$wedStart=$DeliveryTime['restaurant_delivery_wed_open_hr'].':'.$DeliveryTime['restaurant_delivery_wed_open_min'].''.$DeliveryTime['restaurant_delivery_wed_open_am'];
$wedClose=$DeliveryTime['restaurant_delivery_wed_close_hr'].':'.$DeliveryTime['restaurant_delivery_wed_close_min'].''.$DeliveryTime['restaurant_delivery_wed_open_pm'];
$wedDateValue=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue='closed';
}


if(date("l")=='Thursday' && $DeliveryTime['restaurant_delivery_thu_selected']!=''){
$thuStart=$DeliveryTime['restaurant_delivery_thu_open_hr'].':'.$DeliveryTime['restaurant_delivery_thu_open_min'].''.$DeliveryTime['restaurant_delivery_thu_open_am'];
$thuClose=$DeliveryTime['restaurant_delivery_thu_close_hr'].':'.$DeliveryTime['restaurant_delivery_thu_close_min'].''.$DeliveryTime['restaurant_delivery_thu_open_pm'];
 $thuDateValue=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue='closed';
}


if(date("l")=='Friday' && $DeliveryTime['restaurant_delivery_fri_selected']!=''){
$friStart=$DeliveryTime['restaurant_delivery_fri_open_hr'].':'.$DeliveryTime['restaurant_delivery_fri_open_min'].''.$DeliveryTime['restaurant_delivery_fri_open_am'];
$friClose=$DeliveryTime['restaurant_delivery_fri_close_hr'].':'.$DeliveryTime['restaurant_delivery_fri_close_min'].''.$DeliveryTime['restaurant_delivery_fri_open_pm'];
 $friDateValue=$friStart.'-'.$friClose;
}
else
{
$friDateValue='closed';
}


if(date("l")=='Saturday' && $DeliveryTime['restaurant_delivery_sat_selected']!=''){
$satStart=$DeliveryTime['restaurant_delivery_sat_open_hr'].':'.$DeliveryTime['restaurant_delivery_sat_open_min'].''.$DeliveryTime['restaurant_delivery_sat_open_am'];
$satClose=$DeliveryTime['restaurant_delivery_sat_close_hr'].':'.$DeliveryTime['restaurant_delivery_sat_close_min'].''.$DeliveryTime['restaurant_delivery_sat_open_pm'];
 $satDateValue=$satStart.'-'.$satClose;
}
else
{
$satDateValue='closed';
}


if(date("l")=='Sunday' && $DeliveryTime['restaurant_delivery_sun_selected']!=''){
$sunStart=$DeliveryTime['restaurant_delivery_sun_open_hr'].':'.$DeliveryTime['restaurant_delivery_sun_open_min'].''.$DeliveryTime['restaurant_delivery_sun_open_am'];
$sunClose=$DeliveryTime['restaurant_delivery_sun_close_hr'].':'.$DeliveryTime['restaurant_delivery_sun_close_min'].''.$DeliveryTime['restaurant_delivery_sun_open_pm'];
 $sunDateValue=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue='closed';
}
}	

$times = array(
    'mon' => $monDateValue,
    'tue' => $tueDateValue,
    'wed' => $wedDateValue,
    'thu' => $thuDateValue,
    'fri' => $friDateValue,
    'sat' => $satDateValue,
    'sun' => $sunDateValue
);
/*$times = array(
    'mon' => $monDateValue,
    'tue' => $ueDateValue,
    'wed' => '9:00 AM - 12:00 AM',
    'thu' => '9:00 AM - 12:00 AM',
    'fri' => '9:00 AM - 1:00 AM',
    'sat' => '9:00 AM - 1:00 PM, 2:00 PM - 1:00 AM',
    'sun' => 'closed'
);*/


$now = strtotime($CurrentTime);
$open = isOpen($now, $times);

if ($open == 0) {
$TimingStatus=$TableLanguage1['CloseOrderButtonText'];
$OrderButton=$TableLanguage1['PreOrderButtonText'];
$close=1;
mysql_query("update tbl_restaurantAdd set open_status='0' where id='".$data['id']."'");
   // echo "Is closed";
} else {
$TimingStatus='Open';
$close=0;
$OrderButton=$TableLanguage1['OrderButtonText'];
mysql_query("update tbl_restaurantAdd set open_status='1' where id='".$data['id']."'");
   // echo "Is open. Will close in ".ceil($open/60)." minutes";
}

?>
