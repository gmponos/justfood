<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('Asia/Calcutta');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='35'"));
 $takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='35'"));
?>
<?php
$CurrentTime = date('h:i A', time());
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

$now = strtotime($CurrentTime);
$open = isOpen($now, $times);

if ($open == 0) {
    echo "Is closed";
} else {
    echo "Is open. Will close in ".ceil($open/60)." minutes";
}

?>