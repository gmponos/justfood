<?php
date_default_timezone_set("US/Eastern"); 
   $CurrentTime = date('h:i A', time());
    $resttimefrom="10:00AM";
	$resttimeto="10:30PM";
   ?>

 
 
 <?PHP
/*echo $time = date("G:i:s");
echo '<br>';
if ($time > $resttimefrom and $time < $resttimeto ){
    $stat = "open";
} else {
    $stat = "close";
} 
*/

if ($CurrentTime < $resttimefrom || $CurrentTime > $resttimeto ) {
        print "Closed!";
    }

    // show the checkout button
    else {
        print "Open!";
    }
/*echo  getTimeDiff($current,"10:00");
 
function getTimeDiff($dtime,$atime){
 
 $nextDay=$dtime>$atime?1:0;
 $dep=explode(':',$dtime);
 $arr=explode(':',$atime);
 $diff=abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$arr[1],0,date('n'),date('j')+$nextDay,date('y')));
 $hours=floor($diff/(60*60));
 $mins=floor(($diff-($hours*60*60))/(60));
 $secs=floor(($diff-(($hours*60*60)+($mins*60))));
 IF(strlen($hours)<2){$hours="0".$hours;}
 IF(strlen($mins)<2){$mins="0".$mins;}
 IF(strlen($secs)<2){$secs="0".$secs;}
 return $hours.':'.$mins.':'.$secs;
}*/
$exp_date = '05/29/2014';
$todays_date = date("m/d/Y"); 
$today = strtotime($todays_date); 
$expiration_date = strtotime($exp_date); 
 if ($expiration_date >= $today) { 

        echo 'Still Active';

    } else { 

        echo 'Time Expired';

    }
 
 
?> 