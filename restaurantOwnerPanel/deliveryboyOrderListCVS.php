<?php
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$curdate=date("Y-m-d");
//Manually mention headings of the excel columns
$contents .= "Restaurant,";
$contents .= "Order ID,";
$contents .= "Order Price,";
$contents .= "Customer Name,";
$contents .= "Customer Address,";
$contents .= "Customer Phone";
$contents .= "Delivery Boy";
$contents .="\n";

//Mysql query to get records from datanbase
$qry = mysql_query("SELECT * FROM tbl_orderassign  where restaurant_id='".$_GET['restaurant_id']."' and order_id='".$_GET['order_id']."' and deliveryboy_id='".$_GET['deliveryboy_id']."' ");

//get particular column data
$columns_total = mysql_num_fields($qry);

while($data = mysql_fetch_array($qry))
{

$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $CuisineOrderQuery = $dbb->showtabledata("resto_order","order_identifyno",$_GET['order_id']);
 $CuisineOrderData=mysql_fetch_assoc($CuisineOrderQuery);	
 
 
 $OrderDeliveryArea=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$CuisineOrderData['delivey_address']."' and loginID='".$CuisineOrderData['userId']."'"));
		
	if($OrderDeliveryArea['GustUserFloor']!=''){
	$pl=$OrderDeliveryArea['GustUserFloor'].',';
	}
	if($OrderDeliveryArea['GustUserStreetAddress']!=''){
	$pl1=$OrderDeliveryArea['GustUserStreetAddress'].',';
	}
	
	if($OrderDeliveryArea['GustUserAddress']!=''){
	$pl2=$OrderDeliveryArea['GustUserAddress'].',';
	}
	if($OrderDeliveryArea['GustUserLandlineAdress']!=''){
	$pl3=$OrderDeliveryArea['GustUserLandlineAdress'].',';
	}
	
	if($OrderDeliveryArea['GustUserCityName']!=''){
	$pl4=$OrderDeliveryArea['GustUserCityName'].',';
	}
	if($OrderDeliveryArea['GustUserCountryName']!=''){
	$pl5=$OrderDeliveryArea['GustUserCountryName'];
	}
	$pl6='-'.$OrderDeliveryArea['GustUserPincode'];
 $OrderDeliveryBoy=mysql_fetch_assoc(mysql_query("select * from tbl_resDeliveryBoy where id='".$_GET['deliveryboy_id']."' "));

 $addresss=$pl.$pl1.$pl2.$pl3.$pl4.$pl5.$pl6;

    $contents.=$CuisineData['restaurant_name'].",";
    $contents.=$CuisineOrderData['order_identifyno'].",";
	 $contents.=$CuisineOrderData['ordPrice'].",";
    $contents.=$CuisineOrderData['name_customer'].",";
	 $contents.=$addresss.",";
    $contents.=$CuisineOrderData['phone'].",";
    $contents.=$OrderDeliveryBoy['DeliveryBoyName']."\n";
}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=deliveryboyOrderListCVS".date('d-m-Y').".csv");
print $contents;
?>