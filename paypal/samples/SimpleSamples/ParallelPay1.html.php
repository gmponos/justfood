<?php 
ob_start();
session_start();
include('../../../route/functions.php');
include('../../../config1.php');
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
$ADminPayment=$ThankyouData['convenience_fee']+$ThankyouData['ability_to_pay_tips'];
if($ADminPayment!='')
{
$TotalADminPayment=$ADminPayment;
}
else
{
$TotalADminPayment=0;
}
include('../../../domainName.php');								  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>PayPal Adaptive Payments - Pay</title>
<link rel="stylesheet" type="text/css" href="../Common/sdk.css" />
<script type="text/javascript" src="../Common/sdk_functions.js"></script>
<script type="text/javascript" src="../Common/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../Common/jquery.qtip-1.0.0-rc3.min.js"></script>
</head>

<?php	

	$serverName = $_SERVER['SERVER_NAME'];
	$serverPort = $_SERVER['SERVER_PORT'];
	$url = dirname('http://' . $serverName . ':' . $serverPort . $_SERVER['REQUEST_URI']);
	$returnUrl = $url . "/../WebflowReturnPage.php";
	$cancelUrl =  $url . "/ChainedPay.html.php";
?>

<body>
	<div id="wrapper">
	
		<!--<div id="header">
			<h3>Parallel Pay</h3>
			<div id="apidetails">The Pay API operation is used to transfer
				funds from a sender's PayPal account to one or more receivers'
				PayPal accounts. You can use the Pay API operation to make simple
				payments, chained payments, or parallel payments; these payments can
				be explicitly approved, preapproved, or implicitly approved.  
				Parallel payments are useful in cases when a buyer intends to make a single payment for items from multiple sellers. Examples include the following scenarios:

    a single payment for multiple items from different merchants, such as a combination of items in your inventory and items that partners drop ship for you.
    purchases of items related to an event, such as a trip that requires airfare, car rental, and a hotel booking.
				</div>
		</div>-->
		<div id="request_form">
			<form action="ParallelPay.php" method="post" name="myform1" id="myform1">
				
						<input name="actionType" type="hidden"  id="actionType" value="PAY" readonly="readonly"/>
					
						<input name="returnUrl" type="hidden" id="returnUrl" value="<?php echo $DomainName;?>paypal_redirect_page.php?order_identifyno=<?php echo $_GET['order_identifyno'];?>&restaurants=<?php echo $_GET['restaurants'];?>" />
					
						<input name="cancelUrl" type="hidden" id="cancelUrl" value="<?php echo $DomainName;?>" />
					
						<input name="currencyCode" type="hidden" value="USD" />
					
						<input name="memo" type="hidden" value="" />
					
				<table class="params" id="receiverTable">
					<tr>
						<th></th>
						<th style="display:none;">Email *</th>
						<th style="display:none;">Amount *</th>
						<!--<th>Primary Receiver</th>-->
						</tr>
					<tr id="receiverTable_0">
						<td align="left"><input type="checkbox" name="receiver[]" id="receiver_0" style="display:none;"  /></td>
						<td>
							<input type="text" name="receiverEmail[]" style="display:none;" id="receiveremail_0" value="<?php echo $paypalAccount;?>">
						</td>
						<td>
							<input type="text" name="receiverAmount[]" style="display:none;"  id="amount_0" value="<?php echo $_GET['Total'];?>" class="smallfield">
						</td>
										
						<td>
							<select name="primaryReceiver[]" id="primaryReceiver_0"  class="smallfield" style="display:none;">
								<option value="true"  >true</option>
								<option value="false" selected="selected">false</option>
							</select>
						</td>				
					</tr>
					<tr id="receiverTable_1">
						<td align="left"><input type="checkbox" name="receiver[]" id="receiver_1" style="display:none;"  /></td>
						<td>
							<input type="text" value="<?php echo $AdminDataLoginVal['website_ServiceTaxNo'];?>" style="display:none;"  id="receiveremail_1" name="receiverEmail[]">
						</td>
						<td>
							<input type="text" class="smallfield" value="<?php echo $_GET['adminPayment'];?>" style="display:none;"  id="amount_1" name="receiverAmount[]">
						</td>
										
						<td>
							<select class="smallfield" id="primaryReceiver_1" name="primaryReceiver[]" style="display:none;">
								<option value="true">true</option>
								<option selected="selected" value="false">false</option>
							</select>
						</td>				
					</tr>
                    
                    
				</table>
				<?php /*?><a rel="receiverControls"></a>
				<table align="center">
					<tr>
						<td><a href="#receiverControls" onClick="cloneRow('receiverTable', 8)" id="Submit"><span> Add
									Receiver  </span> </a></td>
						<td><a href="#receiverControls" onClick="deleteRow('receiverTable')" id="Submit"><span>  Delete
									Receiver</span> </a></td>
					</tr>
				</table>
				<?php */?>
							
				<div class="submit">
					<input type="submit" value="Submit" style="display:none;" />
				</div>
			</form>
            <div style="padding:60px; color:#000099; font-size:28px; margin-top:30px;">Please wait payment is being process don't refresh page or close browser !</div>
<script  type="text/javascript"> 
document.myform1.submit()
</script>
		</div>
		<?php /*?>/*<a href="../index.php">Home</a>*/?>
	</div>
</body>
</html>
