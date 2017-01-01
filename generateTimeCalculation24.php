<?php
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