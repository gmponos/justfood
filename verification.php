<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$TableLanguage7=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryCode;
        $result['city'] = $ip_data->geoplugin_city;
    }
    return $result;
}
$pl=getLocationInfoByIp();
$Phonecode=mysql_fetch_assoc(mysql_query("select * from countryPhoneCode where iso='".$pl['country']."'"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
if(isset($_POST['VerfiyDataSubmitCode']))
{
$VerifyNumber=mysql_num_rows(mysql_query("select * from resto_order_details where orderId='".$_POST['VerificationCode']."'"));
if($VerifyNumber>0)
{
 $ThankyouData=mysql_fetch_assoc(mysql_query("select * from resto_order where order_identifyno='".$_POST['VerificationCode']."'"));
$murl='https://www.textmagic.com/app/api?username=eatinoneclick&password=computer1&cmd=send&text=Hi,Your Order Reference ID -'.$ThankyouData['order_identifyno'].'&phone='.$Phonecode['phonecode'].$ThankyouData['phone'].'&unicode=0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $murl);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$response = curl_exec($ch);
$msg='Thankyou for Verifying your mobile number';
}
else
{
$error='Sorry ! Mobile Number is not Verified Try again';
}
} 

if(isset($_POST['VerfiyDataSubmitAgain']))
{

$ThankyouData=mysql_fetch_assoc(mysql_query("select * from resto_order where phone='".$_GET['mobileGet']."'"));
$murl='https://www.textmagic.com/app/api?username=eatinoneclick&password=computer1&cmd=send&text='.$ThankyouData['order_identifyno'].'&phone=91'.$ThankyouData['phone'].'&unicode=0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $murl);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$response = curl_exec($ch);
$msg='Your Secret Number has been send successfully';
} 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Verification</title>
<link href="js/popup/popup.css" rel="stylesheet" type="text/css" />
<style>
body{margin:0px; padding:0px; color:#636363; font-size:12px; font-family:Arial, Helvetica, sans-serif; background:#fff;}
</style>
</head>

<body>
 <form action="" method="post">
	<div class="w500px " id="form-div">
   <?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?> <a href="thankyou1.php?order_identifyno=<?php echo $_GET['order_identifyno'];?>&r=<?php echo urldecode($_GET['r']);?>" target="_parent" class="dib red f16px ts white b bdr0px p5px10px br5px ml20px ">Close Now</a></div>
    <?php } ?>
    <?php if($error!=''){ ?>
    <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
    <?php } ?>
    	<p class="f26px b light-Black pb5px bdrBottomGray" style="color:#DB1010"><?php echo $TableLanguage7['MobileCodeVerification'];?></p>
        <p class="mt10px gray-col f14px b"><?php echo $TableLanguage7['MobileCodeVerificationMessage'];?></p>
        <div class="mt20px">
        	<p class="w150px f14px b fl pt10px"><?php echo $TableLanguage7['verificationcodeText'];?></p>
            <p class="fl w300px"><input type="text" class="w90 br5px" value="" name="VerificationCode"  style="height:25px;" /></p>
        	<p class="clear"></p>
            <p class="w150px fl mt15px">&nbsp;</p>
            <p class="fl w300px mt15px">
            <input type="submit" class="dib red f16px ts white b bdr0px p5px10px br5px " value="<?php echo $TableLanguage7['verifyButtonText'];?>" name="VerfiyDataSubmitCode" style="cursor:pointer;">
             <input type="submit" class="dib red f16px ts white b bdr0px p5px10px br5px ml20px " value="<?php echo $TableLanguage7['sendagaincodeText'];?>" name="VerfiyDataSubmitAgain" style="cursor:pointer;">
              
            </p>
            <p class="clear"></p>
        </div>
    </div>
    </form>
</body>
</html>
