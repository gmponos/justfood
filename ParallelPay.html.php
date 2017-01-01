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
			<form action="ParallelPay.php" method="post">
				
						<input name="actionType" type="hidden"  id="actionType" value="PAY" readonly="readonly"/>
					
						<input name="returnUrl" type="hidden" id="returnUrl" value="<?php echo $returnUrl;?>" />
					
						<input name="cancelUrl" type="hidden" id="cancelUrl" value="<?php echo $cancelUrl;?>" />
					
						<input name="currencyCode" type="hidden" value="USD" />
					
						<input name="memo" type="hidden" value="" />
					
				<table class="params" id="receiverTable">
					<tr>
						<th></th>
						<th>Email *</th>
						<th>Amount *</th>
						<!--<th>Primary Receiver</th>-->
						</tr>
					<tr id="receiverTable_0">
						<td align="left"><input type="checkbox" name="receiver[]" id="receiver_0" style="display:none;"  /></td>
						<td>
							<input type="text" name="receiverEmail[]" id="receiveremail_0" value="platfo_1255612361_per@gmail.com">
						</td>
						<td>
							<input type="text" name="receiverAmount[]" id="amount_0" value="1.0" class="smallfield">
						</td>
										
						<td>
							<select name="primaryReceiver[]" id="primaryReceiver_0" class="smallfield" style="display:none;">
								<option value="true"  >true</option>
								<option value="false" selected="selected">false</option>
							</select>
						</td>				
					</tr>
					<tr id="receiverTable_1">
						<td align="left"><input type="checkbox" name="receiver[]" id="receiver_1" style="display:none;"  /></td>
						<td>
							<input type="text" value="platfo_1255077030_biz@gmail.com" id="receiveremail_1" name="receiverEmail[]">
						</td>
						<td>
							<input type="text" class="smallfield" value="1.0" id="amount_1" name="receiverAmount[]">
						</td>
										
						<td>
							<select class="smallfield" id="primaryReceiver_1" name="primaryReceiver[]" style="display:none;">
								<option value="true">true</option>
								<option selected="selected" value="false">false</option>
							</select>
						</td>				
					</tr>
                    
                    <tr id="receiverTable_2">
						<td align="left"><input type="checkbox" name="receiver[]" id="receiver_2" style="display:none;"  /></td>
						<td>
							<input type="text" value="platfo_125507_biz@gmail.com" id="receiveremail_2" name="receiverEmail[]">
						</td>
						<td>
							<input type="text" class="smallfield" value="4.0" id="amount_2" name="receiverAmount[]">
						</td>
										
						<td>
							<select class="smallfield" id="primaryReceiver_2" name="primaryReceiver[]" style="display:none;">
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
					<input type="submit" value="Submit" />
				</div>
			</form>
		</div>
		<?php /*?>/*<a href="../index.php">Home</a>*/?>
	</div>
</body>
</html>
