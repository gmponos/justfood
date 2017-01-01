<?php
date_default_timezone_set('US/Eastern');
include('generateTimeCalculation.php');
$CurrentTime = date('h:i A', time());
if(date("l")=='Monday' && $plttop5['restaurant_discount_mon_selected']!=''){
$monStart=$plttop5['restaurant_discount_mon_open_hr'].':'.$plttop5['restaurant_discount_mon_open_min'].''.$plttop5['restaurant_discount_mon_open_am'];
$monClose=$plttop5['restaurant_discount_mon_close_hr'].':'.$plttop5['restaurant_discount_mon_close_min'].''.$plttop5['restaurant_discount_mon_open_pm'];
$monDateValue=$monStart.'-'.$monClose;
}
else
{
$monDateValue='closed';
}
if(date("l")=='Tuesday' && $plttop5['restaurant_discount_tue_selected']!=''){
$tueStart=$plttop5['restaurant_discount_tue_open_hr'].':'.$plttop5['restaurant_discount_tue_open_min'].''.$plttop5['restaurant_discount_tue_open_am'];
$tueClose=$plttop5['restaurant_discount_tue_close_hr'].':'.$plttop5['restaurant_discount_tue_close_min'].''.$plttop5['restaurant_discount_tue_open_pm'];
 $tueDateValue=$tueStart.'-'.$tueClose;
}
else
{
$tueDateValue='closed';
}


if(date("l")=='Wednesday' && $plttop5['restaurant_discount_wed_selected']!=''){
$wedStart=$plttop5['restaurant_discount_wed_open_hr'].':'.$plttop5['restaurant_discount_wed_open_min'].''.$plttop5['restaurant_discount_wed_open_am'];
$wedClose=$plttop5['restaurant_discount_wed_close_hr'].':'.$plttop5['restaurant_discount_wed_close_min'].''.$plttop5['restaurant_discount_wed_open_pm'];
$wedDateValue=$wedStart.'-'.$wedClose;
}
else
{
$wedDateValue='closed';
}


if(date("l")=='Thursday' && $plttop5['restaurant_discount_thu_selected']!=''){
$thuStart=$plttop5['restaurant_discount_thu_open_hr'].':'.$plttop5['restaurant_discount_thu_open_min'].''.$plttop5['restaurant_discount_thu_open_am'];
$thuClose=$plttop5['restaurant_discount_thu_close_hr'].':'.$plttop5['restaurant_discount_thu_close_min'].''.$plttop5['restaurant_discount_thu_open_pm'];
 $thuDateValue=$thuStart.'-'.$thuClose;
}
else
{
$thuDateValue='closed';
}


if(date("l")=='Friday' && $plttop5['restaurant_discount_fri_selected']!=''){
$friStart=$plttop5['restaurant_discount_fri_open_hr'].':'.$plttop5['restaurant_discount_fri_open_min'].''.$plttop5['restaurant_discount_fri_open_am'];
$friClose=$plttop5['restaurant_discount_fri_close_hr'].':'.$plttop5['restaurant_discount_fri_close_min'].''.$plttop5['restaurant_discount_fri_open_pm'];
 $friDateValue=$friStart.'-'.$friClose;
}
else
{
$friDateValue='closed';
}


if(date("l")=='Saturday' && $plttop5['restaurant_discount_sat_selected']!=''){
$satStart=$plttop5['restaurant_discount_sat_open_hr'].':'.$plttop5['restaurant_discount_sat_open_min'].''.$plttop5['restaurant_discount_sat_open_am'];
$satClose=$plttop5['restaurant_discount_sat_close_hr'].':'.$plttop5['restaurant_discount_sat_close_min'].''.$plttop5['restaurant_discount_sat_open_pm'];
 $satDateValue=$satStart.'-'.$satClose;
}
else
{
$satDateValue='closed';
}


if(date("l")=='Sunday' && $plttop5['restaurant_discount_sun_selected']!=''){
$sunStart=$plttop5['restaurant_discount_sun_open_hr'].':'.$plttop5['restaurant_discount_sun_open_min'].''.$plttop5['restaurant_discount_sun_open_am'];
$sunClose=$plttop5['restaurant_discount_sun_close_hr'].':'.$plttop5['restaurant_discount_sun_close_min'].''.$plttop5['restaurant_discount_sun_open_pm'];
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

$now = strtotime($CurrentTime);
$open = isOpen($now, $times);

if ($open == 0) {
$Discountclose=1;
   // echo "Is closed";
} else {
$Discountclose=0;
   // echo "Is open. Will close in ".ceil($open/60)." minutes";
}

?>
