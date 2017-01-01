<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
date_default_timezone_set('US/Eastern');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if($_GET['paymentType']=='authorize.net')
{
header("location:authorize_payment.php?Total=".$_GET['Total']."&adminPayment=".$_GET['adminPayment']."&order_identifyno=".$_GET['order_identifyno']."&restaurants=".$_GET['restaurants']);
}
if($_GET['paymentType']=='Paypal')
{
header("location:paypal/samples/SimpleSamples/ParallelPay1.html.php?Total=".$_GET['Total']."&adminPayment=".$_GET['adminPayment']."&order_identifyno=".$_GET['order_identifyno']."&restaurants=".$_GET['restaurants']);

//header("location:paymentMake.php?order_identifyno=".$_GET['order_identifyno']."&restaurants=".$_GET['restaurants']);
}
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
<div style="padding:60px; color:#000099; font-size:28px; margin-top:30px;">Please wait payment is being process don't refresh page or close browser !</div>