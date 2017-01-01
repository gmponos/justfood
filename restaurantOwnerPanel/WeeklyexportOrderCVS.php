<?php
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
$_GET['restaurant_id']=$_SESSION['restaurant_id'];
 $wdn=date("N");
			$dt2=mktime(0,0,0,date("m"),date('d'),date("Y"))-$wdn*24*3600;
			 $wKdat=date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			$dateWek=mktime(0,0,0,date('m'),date('d'),date('Y'))-(24*3600*7);
            $dateWek=date('Y-m-d',$dateWek);
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
$qry=mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_GET['restaurant_id']."'  order by order_id desc");
}
else
{
$qry=mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc");
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
header("Content-Disposition: attachment; filename=WeeklyRestaurantOrder".date('d-m-Y').".csv");
print $contents;
?>