<?php
/*$restaurant_delivery_tue_open_hr='9';
$restaurant_delivery_tue_open_min='30';
$restaurant_delivery_tue_close_hr='10';
$restaurant_delivery_tue_close_min='30';
$dt=mktime((int)$restaurant_delivery_tue_open_hr,(int)$restaurant_delivery_tue_open_min,0,date('m'),date('d'),date('Y'));
$dtCl=mktime((int)$restaurant_delivery_tue_close_hr+12,(int)$restaurant_delivery_tue_close_min,0,date('m'),date('d'),date('Y'));
$dt1=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
if($dt>$dt1 OR $dt1>$dtCl ){
echo $resopen ="Close";
$resoptime='<div class="closed">Închis</div>';
}else {
echo $resopen = "Open";
$resoptime='<div class="open">Deschis</div>';
}*/
?>

<?php
$day['hours']='11:00 AM - 10:00 PM';
$datedivide = explode(" - ", $day['hours']); //$day['hours'] Example 11:00 AM - 10:00 PM
$from = ''.$day['days'].' '.$datedivide[0].'';
$to = ''.$day['days'].' '.$datedivide[1].'';
echo $date = date('l g:i A');
$date = is_int($date) ? $date : strtotime($date);
$from = is_int($from) ? $from : strtotime($from);
$to = is_int($to) ? $to : strtotime($to);
if (($date > $from) && ($date < $to)) {
    ?>
 Closes at <?php echo $datedivide[1]; ?>
    <?php
}
else
{
   echo "Open";
}

?>