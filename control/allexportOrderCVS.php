<?php
include('route/DB_Functions.php');
$dbb = new DB_Functions();
date_default_timezone_set('US/Eastern');
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$curdate=date("Y-m-d");
$myArr=array("Restaurant","Order ID","Order Date","Order Price","Commision Rate","Order Type","Payment Method","Owner Name","Customer Name","Customer Email","Customer Address","Customer Phone");
//Manually mention headings of the excel columns
$contents .= "Restaurant,";
$contents .= "Order ID,";
$contents .= "Order Date,";
$contents .= "Order Price,";
$contents .= "Commision Rate,";
$contents .= "Payment Method,";
$contents .= "Customer Name,";
$contents .= "Customer Email,";
$contents .= "Customer Address,";
$contents .= "Customer Phone";
$contents .="\n";

//Mysql query to get records from datanbase
if($_GET['restaurant_id']!=''){
$qry=mysql_query("SELECT * FROM resto_order where  restoid='".$_GET['restaurant_id']."'  order by order_id desc");
}
else
{
$qry=mysql_query("SELECT * FROM resto_order  order by order_id desc");
}

//get particular column data
$columns_total = mysql_num_fields($qry);

while($data = mysql_fetch_array($qry))
{

$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $UserCuisineQuery = $dbb->showtabledata("tbl_user","id",$data['userId']);
 $UserData=mysql_fetch_assoc($UserCuisineQuery);
 $fullName =$UserData['fname'].''.$UserData['lname'];
 
 $OwnerQuery = $dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$data['restoid']);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
 $Commission= ($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
 if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
 $restaurantName=$CuisineData['restaurant_name'];
 $restaurantCommission=$CuisineData['restaurant_commission'].'%='.$Cpl;
 $OwnerName=$OwnerData['restaurant_OwnerFirstName'].''.$OwnerData['restaurant_OwnerLastName'];
	

    $contents.=$restaurantName.",";
    $contents.=$data['order_identifyno'].",";
	 $contents.=$data['user_date'].",";
    $contents.=$data['ordPrice'].",";
	 $contents.=$restaurantCommission.",";
    $contents.=$data['order_type'].",";
	 $contents.=$data['payMode'].",";
    $contents.=$OwnerName.",";
	 $contents.=$fullName.",";
    $contents.=$UserData['user_email'].",";
	$contents.=$UserData['address'].",";
    $contents.=$UserData['user_phone']."\n";
}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=AllRestaurantOrder".date('d-m-Y').".csv");
print $contents;
?>