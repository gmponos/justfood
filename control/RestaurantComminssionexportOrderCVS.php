<?php
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$curdate=date("Y-m-d");
//Manually mention headings of the excel columns
$contents .= "Restaurant,";
$contents .= "Commision Rate,";
$contents .= "Sales,";
$contents .= "Commission,";
$contents .= "Paid Commission,";
$contents .= "Pending Commission";
$contents .="\n";

//Mysql query to get records from datanbase
if($_GET['RestaurantOrderDateStart']!='' && $_GET['RestaurantOrderDateEnd']!=''  && $_GET['restoid']!='')
 {
 $QueryPer=" status='4' and odr_date>='".$_GET['RestaurantOrderDateStart']."' AND odr_date<='".$_GET['RestaurantOrderDateEnd']."'  and restoid='".$_GET['restoid']."'";
 }
 elseif($_GET['RestaurantOrderDateStart']!='' && $_GET['RestaurantOrderDateEnd']!='')
 {
 $QueryPer=" status='4' and odr_date>='".$_GET['RestaurantOrderDateStart']."' AND odr_date<='".$_GET['RestaurantOrderDateEnd']."'";
 }
 elseif($_GET['RestaurantOrderDateStart']!='')
 {
 $QueryPer="status='4' and odr_date='".$_GET['RestaurantOrderDateStart']."'";
 }
 elseif($_GET['restoid']!='')
 {
 $QueryPer="status='4' and restoid='".$_GET['restoid']."'";
 }
 else
 {
 $QueryPer="status='4'";
 }
 
$sql1 = "SELECT * FROM resto_order where $QueryPer  ";
$qry=mysql_query($sql1);
$dSmOdr='';
		$totalSum='';
		$paidCommession='';
		$Commission='';
while($data = mysql_fetch_array($qry))
{

  $totalSum+=$data['ordPrice'];
	$paidCommession+=$data['paid_commission'];
   $CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
  $Commission=($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
  
  $restaurantName=$CuisineData['restaurant_name'];
 $restaurantCommission=$CuisineData['restaurant_commission'].'%';
 $pendingComm= $Commission-$data['paid_commission']; 

 if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
 
 if($pendingComm!='')
 {
 $PCpl=number_format($pendingComm,2);
 }
 else
 {
 $PCpl='0.00';
 }


    $contents.=$restaurantName.",";
    $contents.=$restaurantCommission.",";
	 $contents.=$totalSum.",";
    $contents.=$Cpl.",";
	 $contents.=$data['paid_commission'].",";
    $contents.=$PCpl."\n";
	 }

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=RestaurantCommission".date('d-m-Y').".csv");
print $contents;
?>