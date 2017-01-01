<?php
date_default_timezone_set("Asia/Kolkata"); 
$times = array(
    'mon' => '10:00 AM - 7:30 PM',
    'tue' => '9:00 AM - 12:00 AM',
    'wed' => '9:00 AM - 12:00 AM',
    'thu' => '9:00 AM - 12:00 AM',
    'fri' => '9:00 AM - 1:00 AM',
    'sat' => '9:00 AM - 1:00 PM, 2:00 PM - 1:00 AM',
    'sun' => 'closed'
);

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
echo $CurrentTime = date('h:i A', time());
 $now = strtotime($CurrentTime);
$open = isOpen($now, $times);

if ($open == 0) {
    echo "Is closed";
} else {
    echo "Is open. Will close in ".ceil($open/60)." minutes";
}

?>