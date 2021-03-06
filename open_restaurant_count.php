<?php
date_default_timezone_set("Asia/Kolkata"); 
function compileHours($times, $timestamp) {
    $times = $times[strtolower(date('D',$timestamp))];
    if(!strpos($times, '-')) return array();
    $hours = explode(",", $times);
    $hours = array_map('explode', array_pad(array(),count($hours),'-'), $hours);
    $hours = array_map('array_map', array_pad(array(),count($hours),'strtotime'), $hours, array_pad(array(),count($hours),array_pad(array(),2,$timestamp)));
    end($hours);
    if ($hours[key($hours)][0] > $hours[key($hours)][1]) $hours[key($hours)][1] = strtotime('+1 day', $hours[key($hours)][1]);
    return $hours;
}

function isOpen($now, $times) {
    $open = 0; // time until closing in seconds or 0 if closed
    // merge opening hours of today and the day before
    $hours = array_merge(compileHours($times, strtotime('yesterday',$now)),compileHours($times, $now)); 

    foreach ($hours as $h) {
        if ($now >= $h[0] and $now < $h[1]) {
            $open = $h[1] - $now;
            return $open;
        } 
    }
    return $open;
}


?>
<?php
$dataResQuery=mysql_query("select * from tbl_restaurantAdd order by id desc");
while($data=mysql_fetch_assoc($dataResQuery)){
$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime24` where restaurantID='".$data['id']."'"));
   $takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime24` where restaurantID='".$data['id']."'"));


if($data['restaurant_service']=='Pickup'){											// Pickup Restaurant Only
if(date("l")=='Monday' && $takeawayTime['restaurant_takeaway_mon_selected']!=''){
$monStart=$takeawayTime['MondayBusinessHoursOpenTime'];
$monClose=$takeawayTime['MondayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['MondayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['MondayBusinessHoursCloseTime'];
$monDateValue1=$monStart.'-'.$monClose;
}
else
{
$monDateValue1='closed';
}
if(date("l")=='Tuesday' && $takeawayTime['restaurant_takeaway_tue_selected']!=''){
$tueStart=$takeawayTime['TuesdayBusinessHoursOpenTime'];
$tueClose=$takeawayTime['TuesdayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['TuesdayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['TuesdayBusinessHoursCloseTime'];

$tueDateValue1=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue1='closed';
}


if(date("l")=='Wednesday' &&  $takeawayTime['restaurant_takeaway_wed_selected']!=''){
$wedStart=$takeawayTime['WednesdayBusinessHoursOpenTime'];
$wedClose=$takeawayTime['WednesdayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['WednesdayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['WednesdayBusinessHoursCloseTime'];

$wedDateValue1=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue1='closed';
}


if(date("l")=='Thursday' &&  $takeawayTime['restaurant_takeaway_thu_selected']!=''){
$thuStart=$takeawayTime['ThursdayBusinessHoursOpenTime'];
$thuClose=$takeawayTime['ThursdayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['ThursdayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['ThursdayBusinessHoursCloseTime'];

 $thuDateValue1=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue1='closed';
}


if(date("l")=='Friday' &&  $takeawayTime['restaurant_takeaway_fri_selected']!=''){
$friStart=$takeawayTime['FridayBusinessHoursOpenTime'];
$friClose=$takeawayTime['FridayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['FridayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['FridayBusinessHoursCloseTime'];

 $friDateValue1=$friStart.'-'.$friClose;
}
else
{
$friDateValue1='closed';
}


if(date("l")=='Saturday' &&  $takeawayTime['restaurant_takeaway_sat_selected']!=''){
$satStart=$takeawayTime['SaturdayBusinessHoursOpenTime'];
$satClose=$takeawayTime['SaturdayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['SaturdayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['SaturdayBusinessHoursCloseTime'];

 $satDateValue1=$satStart.'-'.$satClose;
}
else
{
$satDateValue1='closed';
}


if(date("l")=='Sunday' &&  $takeawayTime['restaurant_takeaway_sun_selected']!=''){
$sunStart=$takeawayTime['SundayBusinessHoursOpenTime'];
$sunClose=$takeawayTime['SundayBusinessHoursCloseTime'];

$resttimefrom=$takeawayTime['SundayBusinessHoursOpenTime'];
$resttimeto=$takeawayTime['SundayBusinessHoursCloseTime'];

 $sunDateValue1=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue1='closed';
}
}




else {	
// Home Delivery + Pickup or Only Home Delivery
if(date("l")=='Monday' &&  $DeliveryTime['restaurant_delivery_mon_selected']!=''){
$monStart=$DeliveryTime['MondayBusinessHoursOpenTime'];
$monClose=$DeliveryTime['MondayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['MondayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['MondayBusinessHoursCloseTime'];

$monDateValue1=$monStart.'-'.$monClose;
}
else
{
$monDateValue1='closed';
}
if(date("l")=='Tuesday' &&  $DeliveryTime['restaurant_delivery_tue_selected']!=''){
$tueStart=$DeliveryTime['TuesdayBusinessHoursOpenTime'];
$tueClose=$DeliveryTime['TuesdayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['TuesdayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['TuesdayBusinessHoursCloseTime'];

$tueDateValue1=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue1='closed';
}


if(date("l")=='Wednesday' &&  $DeliveryTime['restaurant_delivery_wed_selected']!=''){
$wedStart=$DeliveryTime['WednesdayBusinessHoursOpenTime'];
$wedClose=$DeliveryTime['WednesdayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['WednesdayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['WednesdayBusinessHoursCloseTime'];

$wedDateValue1=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue1='closed';
}


if(date("l")=='Thursday' &&  $DeliveryTime['restaurant_delivery_thu_selected']!=''){
$thuStart=$DeliveryTime['ThursdayBusinessHoursOpenTime'];
$thuClose=$DeliveryTime['ThursdayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['ThursdayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['ThursdayBusinessHoursCloseTime'];

 $thuDateValue1=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue1='closed';
}


if(date("l")=='Friday' &&  $DeliveryTime['restaurant_delivery_fri_selected']!=''){
$friStart=$DeliveryTime['FridayBusinessHoursOpenTime'];
$friClose=$DeliveryTime['FridayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['FridayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['FridayBusinessHoursCloseTime'];

 $friDateValue1=$friStart.'-'.$friClose;
}
else
{
$friDateValue1='closed';
}


if(date("l")=='Saturday' &&  $DeliveryTime['restaurant_delivery_sat_selected']!=''){
$satStart=$DeliveryTime['SaturdayBusinessHoursOpenTime'];
$satClose=$DeliveryTime['SaturdayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['SaturdayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['SaturdayBusinessHoursCloseTime'];

 $satDateValue1=$satStart.'-'.$satClose;
}
else
{
$satDateValue1='closed';
}


if(date("l")=='Sunday' && $DeliveryTime['restaurant_delivery_sun_selected']!=''){
$sunStart=$DeliveryTime['SundayBusinessHoursOpenTime'];
$sunClose=$DeliveryTime['SundayBusinessHoursCloseTime'];

$resttimefrom=$DeliveryTime['SundayBusinessHoursOpenTime'];
$resttimeto=$DeliveryTime['SundayBusinessHoursCloseTime'];

 $sunDateValue1=$sunStart.'-'.$sunClose;
}
else
{
$sunDateValue1='closed';
}
}

/*
$times = array(
    'mon' => $monDateValue,
    'tue' => $tueDateValue,
    'wed' => $wedDateValue,
    'thu' => $thuDateValue,
    'fri' => $friDateValue,
    'sat' => $satDateValue,
    'sun' => $sunDateValue
);*/
/*$times = array(
    'mon' => $monDateValue,
    'tue' => $ueDateValue,
    'wed' => '9:00 AM - 12:00 AM',
    'thu' => '9:00 AM - 12:00 AM',
    'fri' => '9:00 AM - 1:00 AM',
    'sat' => '9:00 AM - 1:00 PM, 2:00 PM - 1:00 AM',
    'sun' => 'closed'
);*/



if (date("G:i:s") < $resttimefrom || date("G:i:s") > $resttimeto ) {
$OrderButton=$TableLanguage1['PreOrderButtonText'];
$close=1;
mysql_query("update tbl_restaurantAdd set open_status='0' where id='".$data['id']."'");
        //print "Closed!";
    }

    // show the checkout button
    else {
       // print "Open!";
	   
	   $TimingStatus='Open';
$close=0;
if($_GET['BookaTableOrdersupport']!='')
{
$OrderButton="Reserve Now";
}
else
{
$OrderButton=$TableLanguage1['OrderButtonText'];
}
mysql_query("update tbl_restaurantAdd set open_status='1' where id='".$data['id']."'");
	   
    }




/*$now = strtotime($CurrentTime);
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
}*/
}

?>
