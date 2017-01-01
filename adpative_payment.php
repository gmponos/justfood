<?php
//include('adaptive/samples/PPBootStrap.php');
include('adaptive/lib/services/AdaptivePayments/AdaptivePayments.php');
include('adaptive/lib/services/AdaptivePayments/AdaptivePaymentsService.php');
$payRequest = new PayRequest();
$receiver = array();
$receiver[0] = new Receiver();
$receiver[0]->amount = "4.00";
$receiver[0]->email = "platfo_1255170694_biz@gmail.com";
 		
$receiver[1] = new Receiver();
$receiver[1]->amount = "40.00";
$receiver[1]->email = "platfo_1255612361_per@gmail.com";
$receiverList = new ReceiverList($receiver);
$payRequest->receiverList = $receiverList;

$requestEnvelope = new RequestEnvelope("en_US");
$payRequest->requestEnvelope = $requestEnvelope; 
$payRequest->actionType = "PAY";
$payRequest->cancelUrl = "https://devtools-paypal.com/guide/ap_parallel_payment/php?cancel=true";
$payRequest->returnUrl = "https://devtools-paypal.com/guide/ap_parallel_payment/php?success=true";
$payRequest->currencyCode = "USD";
$payRequest->ipnNotificationUrl = "http://replaceIpnUrl.com";

$sdkConfig = array(
	"mode" => "sandbox",
	"acct1.UserName" => "jb-us-seller_api1.paypal.com",
	"acct1.Password" => "WX4WTU3S8MY44S7F",
	"acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31A7yDhhsPUU2XhtMoZXsWHFxu-RWy",
	"acct1.AppId" => "APP-80W284485P519543T"
);

$adaptivePaymentsService = new AdaptivePaymentsService($sdkConfig);
$payResponse = $adaptivePaymentsService->Pay($payRequest); 

?>