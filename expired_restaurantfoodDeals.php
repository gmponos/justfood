<?php 
include('config1.php');
date_default_timezone_set("Asia/Kolkata"); 
$todays_date = date("m/d/Y"); 
$today = strtotime($todays_date); 
$OfferExpire=mysql_query("select * from tbl_foodDeals order by id desc");
while($expireDat=mysql_fetch_assoc($OfferExpire))
{
$exp_date = $expireDat['foodDeals_dateend'];
$expiration_date = strtotime($exp_date); 
 if ($expiration_date >= $today) { 
     //   mysql_query("update tbl_restaurantOffer set status='0' where id='".$expireDat['id']."'");

    } else { 

       mysql_query("update tbl_foodDeals set status='1' where id='".$expireDat['id']."'");
    }
 

}


?>