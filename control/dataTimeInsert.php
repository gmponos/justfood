<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
$Redh=mysql_query("select * from  tbl_restaurantAdd");
while($data=mysql_fetch_assoc($Redh)){

mysql_query("insert tbl_restDeliveryTime24 (restaurantID) value ('".$data['id']."')");
mysql_query("insert tbl_restalcoholTime24 (restaurantID) value ('".$data['id']."')");
mysql_query("insert tbl_resttablebookingTime24 (restaurantID) value ('".$data['id']."')");
mysql_query("insert tbl_restbuffetTime24 (restaurantID) value ('".$data['id']."')");
mysql_query("insert tbl_restTakeawayTime24 (restaurantID) value ('".$data['id']."')");
}
?>	