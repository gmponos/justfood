<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
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
							  ?>
                              
<?php
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
require_once 'anet_php_sdk/AuthorizeNet.php'; // Include the SDK you downloaded in Step 2
if($RestaurantData['restaurant_paypal_url']!='')
{
$api_login_id = $RestaurantData['restaurant_Authorizednet_login_key'];
$transaction_key=$RestaurantData['restaurant_Authorizednet_transid_key'];
$transaction_url=$RestaurantData['restaurant_Authorizednet_url'];
}
else
{
$api_login_id = $AdminDataLoginVal['website_Currency'];
$transaction_key = $AdminDataLoginVal['website_CurrencySymbole'];
$transaction_url='https://test.authorize.net/gateway/transact.dll';
}
$amount = $ThankyouData['ordPrice'];
$fp_timestamp = time();
$fp_sequence = $_GET['order_identifyno']; // Enter an invoice or other unique number.
$fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id,
  $transaction_key, $amount, $fp_sequence, $fp_timestamp)
?>

<form method='post' name="myform" id="myform" action="<?php echo $transaction_url;?>">
<input type='hidden' name="x_login" value="<?php echo $api_login_id?>" />
<input type='hidden' name="x_fp_hash" value="<?php echo $fingerprint?>" />
<input type='hidden' name="x_amount" value="<?php echo $amount?>" />
<input type='hidden' name="x_fp_timestamp" value="<?php echo $fp_timestamp?>" />
<input type='hidden' name="x_fp_sequence" value="<?php echo $fp_sequence?>" />
<input type='hidden' name="x_version" value="3.1">
<input type='hidden' name="x_show_form" value="payment_form">
<input type='hidden' name="x_test_request" value="false" />
<input type='hidden' name="x_method" value="cc">
<input type='submit' value="Click here for the secure payment form">
</form>
<div style="padding:60px; color:#000099; font-size:28px; margin-top:30px;">Please wait payment is being process don't refresh page or close browser !</div>
<script  type="text/javascript"> 
document.myform.submit()
</script>
