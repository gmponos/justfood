<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$ThankyouData=mysql_fetch_assoc(mysql_query("select * from resto_order where order_identifyno='".$_GET['order_identifyno']."'"));
 $g=mysql_query("SELECT * FROM  `resto_order_details` where orderId='".$_GET['order_identifyno']."'");
 $MenuName='';
while($orda=mysql_fetch_assoc($g)){
$mg=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restaurantMainMenuItem` where id='".$orda['menuId']."'"));
$MenuName .=$mg['RestaurantPizzaItemName'].',';
}
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$RestaurantData	=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantPayment_grps_sms where restaurant_id='".$resID[0]."'"));
if($RestaurantData['restaurant_paypal_url']!='')
{
$paypalUrl=$RestaurantData['restaurant_paypal_url'];
$paypalAccount=$RestaurantData['restaurant_paypal_business_account'];
}
else
{
$paypalUrl="https://www.paypal.com/cgi-bin/webscr";
$paypalAccount=$AdminDataLoginVal['website_ServiceTaxNo'];
}								  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>


  
</head>

<body>
<form name="myform" id="myform" action="<?php echo $paypalUrl;?>" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="<?php echo $paypalAccount;?>">  
    <input type="hidden" name="item_name" value="<?php echo $MenuName;?>">
    <input type="hidden" name="item_number" value="<?php echo $_GET['order_identifyno'];?>">
    <input type="hidden" name="amount" value="<?php echo $ThankyouData['ordPrice'];?>">
    <!--<input type="hidden" name="tax" value="1">-->
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="no_note" value="<?php echo $ThankyouData['instruction'];?>">
    <input type="hidden" name="currency_code" value="USD">
    <!-- Enable override of payer's stored PayPal address -->
    <input type="hidden" name="address_override" value="<?php echo $ThankyouData['address'];?>">

    <input type="hidden" name="return" value="<?php echo $DomainName;?>thankyou.php?order_identifyno=<?php echo $_GET['order_identifyno'];?>">
    <input type="hidden" name="cancel_return" value="<?php echo $DomainName;?>">

    <input type="image" style="display:none;" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
</form>
<div style="padding:60px; color:#000099; font-size:28px; margin-top:30px;">Please wait payment is being process don't refresh page or close browser !</div>
<script  type="text/javascript"> 
document.myform.submit()
</script>
</body></html>