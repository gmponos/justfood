<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
date_default_timezone_set('US/Eastern');
include('domainName.php');
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));

 $OwnerQuery = $prix->showtabledata("tbl_restaurantOwner","restaurant_id",$resID[0]);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
include('generateTimeCalculation.php');
include('route/db.php'); 
$dbObj=new db;


?>
 <?php  
$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$resID[0]."'"));
$takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$resID[0]."'"));

//Number of Rating Only without Comment
$RatingReviewQueryAvargewithRatingOnly=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewContent='' and RestaurantReviewRating!=''"));

$RatingReviewQueryAvargewithRatingWith=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."'  and RestaurantReviewRating!=''"));
//

//Number of Rating 
$RatingReviewTotal=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' "));
//
if($RatingReviewQueryAvargewithRatingWith!=0)
{
$AverageRatingCode=floor($RatingReviewQueryAvargewithRatingWith/$RatingReviewTotal);
}
else
{
$AverageRatingCode=0;
}


if($_SESSION['justfoodsUserID']!='')
{
$UserData=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$_GET['ServiceAddress']."' and loginID='".$_SESSION['justfoodsUserID']."'"));
$UserDataLogin=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."'"));
}
else
{
$UserData=mysql_fetch_assoc(mysql_query("select * from tbldummyuser where id='".$_GET['ServiceAddress']."'"));
}
 
function genRandomString() {
$length =5;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
} 

$pizza89orderid='GM'.$resID[0].genRandomString();
if(isset($_POST['cnfrmOrderSubmitDataCartData']))
{
if($_POST['method']=='Paypal')
{
$option='unpaid';
}
else 
{
$option='by cash';
}
$ip=$_SERVER['REMOTE_ADDR'];
$odr_date=date("Y-m-d");
$user_date=date('m/d/Y');	
if($_POST['method']=='Cash On Delivery')
{
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Insert with Restaurant Order Table (resto_order)+++++++++++++++++++++++++++++++++++++++++++++
$QueryRes_Order="INSERT INTO `resto_order` (`order_id`, `order_identifyno`, `userId`, `name_customer`, `restoid`, `odr_date`, `deliverydate`, `requestTime`, `deliveryChrg`, `loyltPnts`, `loyptamount`, `disCupn`, `disCupnPrice`,`couponCodeType`, `ordPrice`, `payMode`, `type`, `status`, `address`, `street`, `houseno`, `floor_no`, `zipcode`, `phone`, `email`, `password`, `instruction`, `country`, `state`, `city`,`discountValue`, `discountDiscription`,`discountOfferType`, `ip`, `order_no`, `email_status`, `order_type`, `userComment`, `payoption`, `delivey_address`,`delivey_area`,`nameOfBell`,`nameofLandmark`, `user_date`, `convenience_fee`, `ability_to_pay_tips`) VALUES (NULL, '$pizza89orderid', '".$_SESSION['justfoodsUserID']."', N'".$_POST['GustUserName']."', '".$resID[0]."', '$odr_date', '".$_POST['deliveryDate']."', '".$_POST['deliveryTime']."', '".$_POST['restaurant_avarage_deliveryCost']."', '0', '".$_POST['loyptamount']."', '".$_POST['CouponCode']."', '".$_POST['CouponCodePrice']."','".$_POST['couponCodeType']."', '".$_POST['Total']."', '".$_POST['method']."', '".$_POST['order_type']."', '1', N'".$_POST['GustUserAddress']."', N'".$_POST['GustUserStreetAddress']."','','".$_POST['GustUserFloor']."',  N'".$_POST['GustUserPincode']."', '".$_POST['GustUserMobileNo']."', '".$_POST['customerEmail']."', '', '".$_POST['SpecialInstruction']."', 'UK', '".$_POST['customerState']."', N'".$_POST['GustUserCityName']."','".$_POST['discountValue']."',N'".$_POST['discountDiscription']."',N'".$_POST['discountOfferType']."', '$ip', '$pizza89orderid', '0', '".$_POST['order_type']."', N'".$_POST['SpecialInstruction']."', '$payoption', N'".$_POST['customerDeliveryID']."',N'".$_POST['contactarea']."',N'".$_POST['GustUserBellName']."',N'".$_POST['GustUserLandlineAdress']."', '$user_date','".$resdata['convenience_fee']."','".$_SESSION['tipamountVale']."')";	


	
mysql_query($QueryRes_Order);
$recrt1=$dbObj->getData(array("RestaurantGroupOrderName","RestaurantGroupOrderEmail","RestaurantGroupOrderMessage","ip","restaurant_id","sessoionId_groupOrder","restaurant_name"),"tbl_restaurantGroupOrder","ip='".$_SERVER['REMOTE_ADDR']."' AND sessoionId_groupOrder='".session_id()."' AND restaurant_id='".$resID[0]."'");
				array_shift($recrt1);
				$GroupEmail='';
########################################################################				
				foreach($recrt1 as $crtDls1){
				mysql_query("INSERT INTO `tbl_restaurantGroupOrderSubmit` (`id`, `restaurant_id`, `restaurant_name`, `RestaurantGroupOrderName`, `RestaurantGroupOrderEmail`, `RestaurantGroupOrderMessage`, `ip`, `sessoionId_groupOrder`, `order_identifyno`, `ordPrice`, `groupinvitedName`, `groupinvitedEmail`, `grouporderDate`, `created_date`) VALUES (NULL, '".$crtDls1["restaurant_id"]."',  N'".$crtDls1["restaurant_name"]."',  N'".$crtDls1["RestaurantGroupOrderName"]."',  '".$crtDls1["RestaurantGroupOrderEmail"]."',  N'".$crtDls1["RestaurantGroupOrderMessage"]."',  '".$crtDls1["ip"]."', '', '$pizza89orderid', '".$_POST['Total']."', N'".$_POST['GustUserName']."', '".$_POST['customerEmail']."', '$odr_date', '$user_date')");
				
				$GroupEmail .=$crtDls1["RestaurantGroupOrderEmail"].',';
				
				}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ End Here (Raj Php Expert Group)++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ++++++++++++++++++++++++++++++++++++++++ Cart Menu Entry into  resto_order_details Table  and Email+++++++++++++++++++++++++++++++++++++++++++++++++++++++

$recrt=$dbObj->getData(array("cartId","sysIP","sessoionId","itemId","price","MenuSize","quqntity","doughValue","baseValue","hotel_id","cheesValue","extraItemID","ExtraitemGroupID","extraItemID2"),"cartNew","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."'");
				array_shift($recrt);
########################################################################				
				foreach($recrt as $crtDls){
					$crtInt=array("orderId"=>$pizza89orderid,"hotel_id"=>$crtDls["hotel_id"],"menuId"=>$crtDls["itemId"],"size"=>$crtDls['MenuSize'],"menuprice"=>$crtDls["price"],"quantity"=>$crtDls["quqntity"],"doughValue"=>$crtDls["doughValue"],"baseValue"=>$crtDls["baseValue"],"cheesValue"=>$crtDls["cheesValue"],"extraItemID"=>$crtDls["extraItemID"],"ExtraitemGroupID"=>$crtDls["ExtraitemGroupID"],"extraItemID2"=>$crtDls["extraItemID2"]);
						$chkInst=$dbObj->dataInsert($crtInt,"resto_order_details");						
					}	
				//if($chkInst)
						//{
					
$tq="select * from resto_order where order_identifyno='".$pizza89orderid."' and restoid='".$resID[0]."'";
$msh=mysql_fetch_assoc(mysql_query($tq));			
if($msh['email_status']==0)
{

// Group Ordering Email Content Here
include('group_orderEmail.php');
// End Here Group Ordering

//$GroupEmailTo=rtrim($GroupEmail,',');
$to=$_POST['customerEmail'].','.$resdata['restaurant_OrderEmail'].','.$RegistrationDataLoginVal['orderemail'].','.$OwnerData['restaurant_OwnerLoginEmail'];
if($resdata['subject']!='')
{
$subject =$resdata['subject'];
}
else
{
$subject ='Thank you for Order with '.$AdminDataLoginVal['website_name'].'';
}
$from=$RegistrationDataLoginVal['orderemail'];
$message .=  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'	'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
<html lang='de'>
<head>
<title>".$AdminDataLoginVal['website_name']." Online Food Ordering website</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta http-equiv='content-style-type' content='text/css' />
<meta http-equiv='content-script-type' content='text/javascript' />
<meta http-equiv='pragma' content='no-cache' />
<meta http-equiv='cache-control' content='no-cache' />
<meta http-equiv='expires' content='0' /><body><table bgcolor='#dfdfdf' width='100%' style='float:left;background-color:rgb(223,223,223);font-family:Arial'> 
  <tbody> 
    <tr> 
      <td align='center'> 
        <table border='0' cellpadding='0' cellspacing='0'> 
          <tbody> 
            <tr> 
              <td colspan='2' height='359' valign='top'><img alt='' src='https://ci3.googleusercontent.com/proxy/oqgjYIFndtWMaU6BmYk2yKMjRDsaL5wbQPL_Hh3ARVE6_TOpMJ3q3n54Brllrzr41gpnnPVV1-ixogBC2CVmfylAf8HaGw6pVrhVSBrJjk4GxAWHW0RDquP7RxO2yyLpF1qllCb0WtkQ7H_eA24CQmS3tYM=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-left.png'></td> 
              <td rowspan='2'> 
                <table border='0' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td bgcolor='' style='background-image:url(https://ci3.googleusercontent.com/proxy/ULCRAiwWL9iHiPYUTWZkzsldvOF8xAcaH1NnHMCo4fOBSZmZlQafsxfMJWRIX-xpEnU_qjE4LNN2JsFKONWeijp-EeZCQ9GVERwqf44jtGjXUBQV2T_qgggzVHwuePTJY20ViGwa5EePhpstWNE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/header_bg.jpg);background-repeat:repeat no-repeat'> 
                        <table valign='middle' cellpadding='0' cellspacing='0' width='100%'> 
                          <tbody> 
                            <tr> 
                              <td width='12'></td> 
                              <td width='253' style='padding:10px'><a href='' target='_blank'><img src='".$DomainName."control/sitelogo/sitelogosmall/".$AdminDataLoginVal['website_logo']."' width='130' height='100'></a></td> 
                              <td align='right' width='453' style='color:rgb(102,102,102);font-size:12px;font-family:Arial;padding-right:15px'>&nbsp;</td> 
                            </tr> 
                          </tbody> 
                        </table></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#c32c2c' height='6'></td> 
                    </tr> 
                  </tbody> 
                </table> 
                <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'>     
                <table cellpadding='0' cellspacing='0' width='730'>
                  <tbody>
<tr>
                       <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:18px'>Dear ".$_POST['GustUserName'].",</td>
                             
                   </tr>
                   <tr>
                          <td style='font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#c1272d;font-weight:bold;padding-left:28px;padding-top:18px'> Thanks for your order <br><span style='color:#666'>Your order confirmation message  will be sent to your email address</span></td>
                    </tr>
                    
                   
                                
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-top:20px;padding-left:28px;padding-top:18px'>Please find verify the information of your order below:</td>
                </tr>    
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#c1272d;padding-top:0px;font-weight:bold;padding-left:28px'>Store: ".$resdata['restaurant_name']."<br>Order Number: ".$pizza89orderid."</td>
                 
                   </tr>    
                    
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:18px'>Time of delivery requested: ".$user_date."  ".$_POST['deliveryTime']."</td>
                </tr> 
                
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:18px'>Order Type: ".$_POST['order_type']."</td>
                </tr>   
                 
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:0px'>Order Date: ".$user_date."  ".$_POST['deliveryTime']."<br>Payment: ".$_POST['method']." ( Not Paid )</td>
                </tr>  <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#c1272d;padding-left:28px;padding-top:18px;font-weight:bold'>Collection Address:</td>
                </tr>           
                 <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;padding-left:28px;padding-top:0px;color:#666;padding-top:0px'>".$resdata['restaurant_name']." Cuisine<br>".$resdata['restaurant_name'].", ".$resdata['restaurant_address'].", ".$resdata['restaurantCity']."  phone: <a href='tel:01443401818' value='+911443401818' target='_blank'>".$resdata['restaurant_phone']."</a><br> </td>
                </tr>   
				
				
				<tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#c1272d;padding-left:28px;padding-top:18px;font-weight:bold'>Delivery Address:</td>
                </tr>           
                 <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;padding-left:28px;padding-top:0px;color:#666;padding-top:0px'>".$UserData['GustUserName']." <br>
".$UserData['GustUserAddress']."<br>
".$UserData['GustUserPincode']." <br>
".$UserData['GustUserCityName']." <br>
".$UserData['GustUserMobileNo']."</td>
                </tr>
                
				
				
				</tbody></table>        <br><table border='0' cellspacing='0' cellpadding='0' style='overflow:hidden;border:2px solid #e7e7e7;border-radius:5px;margin-top:10px;margin-left:25px;width:93%;padding-bottom:16px'>
                    
					
                   <thead bgcolor='#e7e7e7'>
                           
                        <tr>
                            <td width='268' height='34' bgcolor='#e7e7e7' valign='middle' style='border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold'>Product Name
                            </td>
                            <td width='70' height='34' bgcolor='#e7e7e7' valign='middle' style='border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold'>Price
                            </td>
                            <td width='70' height='34' bgcolor='#e7e7e7' valign='middle' style='border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold'>Quantity
                            </td>
                            <td width='70' height='34' bgcolor='#e7e7e7' valign='middle' style='padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold'>Sub Total
                            </td>
                        </tr>
                            
                   </thead>
                   <tbody>";
$subTotalOffer=0;
	$DealsQuery=mysql_query("select * from cartfoodDeals where sysIP='".$_SERVER['REMOTE_ADDR']."' and sessoionId='".session_id()."' and hotel_id='".$resID[0]."' group by deal_id");
	if(mysql_num_rows($DealsQuery)>0)
	{
   while($dealFood=mysql_fetch_assoc($DealsQuery)){
   mysql_query("insert into cartfoodDealsInsert(quqntity,deal_price,hotel_id,deal_name,deal_id,slot_id,slotItem_id,slotItemID,orderId) values('".$dealFood['quqntity']."','".$dealFood['deal_price']."','".$dealFood['hotel_id']."',N'".$dealFood['deal_name']."','".$dealFood['deal_id']."','".$dealFood['slot_id']."','".$dealFood['slotItem_id']."','".$dealFood['slotItemID']."','".$pizza89orderid."')");
   
      $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
   
$message .=" <tr><td width='268' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$dealFood['deal_name']."<br />
              <span class='desc-small' style='font-size:14px;'>
   <strong> Deal Items: </strong>
    <br />";
	$SlotItem=explode(',',$dealFood['slotItemID']);
	foreach($SlotItem as $v)
	{
	if($v!='')
	{
	$slotDNam=mysql_fetch_assoc(mysql_query("select * from tbl_fooddealslotitem where id='".$v."'"));
	$message .="".$slotDNam['slot_itemName']."<br />";	
	}
	}
$message .= "</td><td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$AdminDataLoginVal['website_CurrencySymbole'].$dealFood['deal_price']."</td><td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$dealFood['quqntity']."</td>
          <td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'> ";	
	 
	$DealsItemTota=$dealFood['deal_price']*$dealFood['quqntity'];
$message .= "".$AdminDataLoginVal['website_CurrencySymbole'].number_format($DealsItemTota,2)."</td></tr>";	
}
}
				   
$recrt=$dbObj->getData(array("cartId","sysIP","sessoionId","itemId","price","MenuSize","quqntity","doughValue","baseValue","hotel_id","cheesValue","extraItemID","extraItemID2"),"cartNew","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."'");
if($recrt[0]>0){
$subTotal=0;
foreach($recrt as $val){
if(is_array($val)){
$itmDt=$dbObj->getData(array("*"),"tbl_restaurantMainMenuItem","id='".$val['itemId']."'");             
$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$val['MenuSize']."'"));
$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$val['doughValue']."'"));
$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$val['baseValue']."'"));
$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$val['cheesValue']."'"));
//$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$val['extraItemID']."'"));
//$MenuExtraData1=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$val['extraItemID2']."'"));

$message .=" <tr><td width='268' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$itmDt[1]['RestaurantPizzaItemName'].'('.$MenuSizeData['SizeMenuName'].")";
if($MenuDoughData['menuDoughName']!=''){					
$message .="<br>".$MenuDoughData['menuDoughName']."";	
}
if($MenuBaseData['menuBaseName']!=''){					
$message .="<br>".$MenuBaseData['menuBaseName']."";	
}
if($MenuCheesData['menuCheesName']!=''){					
$message .="<br>".$MenuCheesData['menuCheesName']."";	
}
$plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){					
$message .="<br>".$MenuExtraData['menuExtraName']."";	
}
}

 $plk=explode(',',$val['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){				
$message .="<br>".$MenuExtraData['menuExtraName']."";	
}
}

$message .= "</td><td width='268' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>$ ".number_format($itmDt[1]['RestaurantPizzaItemPrice'],2)."";
	 
	 $message .= " <span class='desc-small' style='font-size:12px; '>";
if($MenuDoughData['menuDoughPrice']!=''){					
$message .="<br>".$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuDoughData['menuDoughPrice'],2)."";	
}
if($MenuBaseData['menuBasePrice']!=''){					
$message .="<br> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuBaseData['menuBasePrice'],2)."";	
}
if($MenuCheesData['menuCheesPrice']!=''){					
$message .="<br> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuCheesData['menuCheesPrice'],2)."";	
}
 $plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	$message .=" <br /> ".$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice']."";
	}
	}
	
	 $plk=explode(',',$val['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	$message .=" <br /> ".$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice']."";
	}
	}

	
	 
	 $message .= "</td>
                 
                   <td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$val['quqntity']."</td>
                   
                   <td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'> ";	
	 
	$ItemTota=$val['price']*$val['quqntity'];
	$ItemTota=$ItemTota+$extPrc;
	$subTotal+=($ItemTota);
$message .= "".$AdminDataLoginVal['website_CurrencySymbole'].number_format($ItemTota,2)."</td></tr>";	
}
}
}
$subTotal=$subTotalOffer+$subTotal;
$message .= "<tr><td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Sub total:</td>
                                    <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($subTotal,2)." </td>   
                                </tr>    ";

$offerDisc='';
 $discountValue='';//$RestaurantOfferQuery['RestaurantOfferStartPrice']
 //$plo=mysql_query("select * from tbl_restaurantOffer where status='0' and restaurant_id='".$resID[0]."'");
 
$plttop1=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='1' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop2=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='2' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop3=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='3' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop4=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='4' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop5=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='5' and status='0' and restaurant_id='".$resID[0]."' "));
include('tableTime3.php');
$offerDisc='';

						  // while($RestaurantOfferQuery=mysql_fetch_assoc($plo)){
						   
							
						   if($subTotal<$plttop1['RestaurantOfferStartPrice'])
						   {
						    $offerDisc1=$plttop1['RestaurantOfferDescription'];
						   if($plttop1['RestaurantoffrType']=='p')
						   {
						   $discountValue=$plttop1['RestaurantOfferPrice'];
						   }
						   if($plttop1['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$plttop1['RestaurantOfferPrice']/100;
						   }
						   }
						   
						  
						   if($subTotal>$plttop2['RestaurantOfferStartPrice'] && $subTotal<$plttop1['RestaurantOfferStartPrice'])
						   {
						    $offerDisc2=$plttop2['RestaurantOfferDescription'];
						   if($plttop2['RestaurantoffrType']=='p')
						   {
						   $discountValue=$plttop2['RestaurantOfferPrice'];
						   }
						   if($plttop2['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$plttop2['RestaurantOfferPrice']/100;
						   }
						   }
						   
						    if($subTotal>$plttop3['RestaurantOfferStartPrice'] && $subTotal<$plttop2['RestaurantOfferStartPrice'])
						   {
						    $offerDisc3=$plttop3['RestaurantOfferDescription'];
						   if($plttop3['RestaurantoffrType']=='p')
						   {
						   $discountValue=$plttop3['RestaurantOfferPrice'];
						   }
						   if($plttop3['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$plttop3['RestaurantOfferPrice']/100;
						   }
						   }
						   
						    if($subTotal>$plttop4['RestaurantOfferStartPrice'] && $subTotal<$plttop3['RestaurantOfferStartPrice'])
						   {
						    $offerDisc4=$plttop4['RestaurantOfferDescription'];
						   if($plttop4['RestaurantoffrType']=='p')
						   {
						   $discountValue=$plttop4['RestaurantOfferPrice'];
						   }
						   if($plttop4['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$plttop4['RestaurantOfferPrice']/100;
						   }
						   }
						  
						   
						   
						  // }// While Loop End Here
						   
				if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout')
					 {
					 $deliverVale=0;
					 }  
					 else
					 {
					 $deliverVale=$resdata['restaurant_avarage_deliveryCost'];
					 }
						   
							$_SESSION['subTotalT']=$subTotal;
											if($_SESSION['disCupnPrice']!=''){
	                                        if($_SESSION['disCupnPrice']<=$subTotal)
                                             {
											  if($_SESSION['disCupnType']=='p'){ 
	                                          $total=$subTotal-$_SESSION['disCupnPrice']+$deliverVale+$resdata['convenience_fee']+$_SESSION['tipamountVale']-$_POST['loyptamount'];
											  }
											  
											  if($_SESSION['disCupnType']=='pr'){ 
	                                        $Coupontotal=$subTotal*$_SESSION['disCupnPrice']/100;
						                     $total=$subTotal-$Coupontotal+$deliverVale+$resdata['convenience_fee']+$_SESSION['tipamountVale']-$_POST['loyptamount']; 
											
											  }
											  
	                                          }
											 
											  }
											   else
											  {
											  $total=$subTotal+$deliverVale+$resdata['convenience_fee']+$_SESSION['tipamountVale']-$_POST['loyptamount'];
											  }
											 $total= $total-$discountValue;


$message .= "<tr><td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Sub total:</td>
                                    <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($subTotal,2)." </td>   
                                </tr>    ";

if($discountValue!=''){

$message .= "   <tr>  
                                        <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Discount Offer:</td>
                                        <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'>".$offerDisc1.$offerDisc2.$offerDisc3.$offerDisc4." -  <strong>".$AdminDataLoginVal['website_CurrencySymbole']."".number_format($discountValue,2)."</td>   
                                    </tr> ";
									
}									
if($_SESSION['disCupnType']=='pr'){  
$DisType="%";
} else {
  $DisType=$AdminDataLoginVal['website_CurrencySymbole'];
 } 
if($_SESSION['disCupnPrice']!=''){
$message .= "  <tr>  
                                        <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Discount Coupon (".$_SESSION['disCupn']."):</td>
                                        <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> - ".number_format($_SESSION['disCupnPrice'],2)." ".$DisType."</td>   
                                    </tr>  ";

}


if($_POST['loyptamount']!=''){
$message .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Pay by loyalty:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> -  ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($_POST['loyptamount'],2)." </td>   
                                        </tr>";
										}

if($deliverVale!=''){
$message .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Delivery Charge:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> +  ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($deliverVale,2)." </td>   
                                        </tr>";
										}



$message .= "  <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Grand Total:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($total,2)."  </td>   
                                        </tr>    
                                                   
                          
                        <tr>
                            <td colspan='4'><div style='margin-top:8px'><img src='https://ci5.googleusercontent.com/proxy/5cDRss47XuQ1K8Ka-bOPuAD66zmFblgGHULFozCKYQAIvn9Hn3U6ptsai5BXrJEbWboUjRZbDC44nVe77Fmbc_77cZL30ZI1qtbfsm9PU3DhlTl6nrBbTPCXyjAoqgZ37Au9ETnhRv8J=s0-d-e1-ft#https://www.etakeout.co.uk/etakeout_service/webservice_v1/newsletter_images/bar.png' width='484' height='2'></div>
                            </td>
                        </tr>
                         <tr>
                            <td colspan='3' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Total:
                            </td>
                           
                            <td style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($total,2)." 
                            </td>
                        </tr>
						
					  <tr>
                           
                            <td colspan='4' > ".$_POST['SpecialInstruction']." 
                            </td>
                        </tr>	
                    </tbody>
                    
                                    
                  </table>
  

                       </td> 
                    </tr> 
                  
                       </td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'>&nbsp;</td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>Thank you for your preference.</td> 
                    </tr>
					 <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>".$AdminDataLoginVal['website_name']." Team</td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'><a style='color:#ed6c2b' href='' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a></td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#C1272D' height='10'></td> 
                    </tr> 
                  </tbody> 
                </table></td> 
              <td colspan='2' valign='top'><img alt='' style='margin-top:1px' src='https://ci6.googleusercontent.com/proxy/8o1ccbZ7ctJxK1VN4zNIxlWON_rkJswBHm6DzxefVm-_VSzj9QPFhRMbpnLl2K53YvrCXyuvok0vrS6cV3RfcihRmWQlG3YSbM63MuIfpr7r4nTsSrN68-uEEw1yRlju_Ov5ZghGFjY9C2mGLuNV36XI-Oh4=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-right.png'></td> 
            </tr> 
            <tr> 
              <td>&nbsp;</td> 
              <td background='https://ci4.googleusercontent.com/proxy/EZYYeK4w2asNVCcbD8wkliiy7Ulzcci_sqRnKSnJ7gNSYlE4AqAvpw_mM4gjxuC_6i4c6DwJukWOpT_yWblEwr6f6OpbRr2aqz_MffQ_j4T0revCtSl9IbBYXmi8e8IvqC74uJ0IeL141s4DRBajug=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-left.png' width='4'></td> 
              <td background='https://ci4.googleusercontent.com/proxy/fMGLYGaSXBcqpb_4i_0NpDT6OwB1EmhPO0VBXxU4tifv6KxhPAc1Tu_vDL5zztDKjkM6iFsXefxLWpLfXP-RvBEB1YBmRtIfT2bj9iIQRyA8g4GBUYk8qH905Gt51p4TIoNbOO7CyfKJqiXoU6dgKmE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-right.png' width='4'></td> 
              <td>&nbsp;</td> 
            </tr> 
            <tr> 
              <td colspan='2'></td> 
              <td><img alt='' src='https://ci6.googleusercontent.com/proxy/E3iNizj4AUWYxz8t1e9PUopNYgAoddNQraaIHCPJ56eP0Cq56k8daz74Y6Gv7xWplalG0fIJwtVc0csoezk3Cgi89cQJofg6Se7I1Hg7zLd0_V5lG91FUKa23Sg5CMsqKTFCpOeYONBs0QtglyAtjMFC=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-bottom.png'></td> 
              <td colspan='2'></td> 
            </tr> 
          </tbody> 
        </table></td> 
    </tr> 
    <tr> 
      <td height='40'></td> 
    </tr> 
  </tbody> 
</table><div class='yj6qo'></div><div class='adL'>
</div></div>";	 
$message .= "</body></html>";
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html;charset=UTF-8\n"; 							
	$headers .= "From: $from  \r\n" .
	$headers .= "X-Priority: 1\r\n"; 
	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "X-Mailer: Just My Server"; 
if(mail($to, $subject, $message, $headers)){
mysql_query("update resto_order set email_status='1' where order_identifyno='".$pizza89orderid."'");
mysql_query("delete from cartNew  where sysIP='".$_SERVER['REMOTE_ADDR']."'");
mysql_query("delete from cartNewOffer  where sysIP='".$_SERVER['REMOTE_ADDR']."'");
mysql_query("delete from tbl_restaurantGroupOrder  where ip='".$_SERVER['REMOTE_ADDR']."'");
mysql_query("delete from cartfoodDeals  where sysIP='".$_SERVER['REMOTE_ADDR']."'");

}
}				
header("location:thankyou.php?paymentType=".$_POST['method']."&order_identifyno=".$pizza89orderid."&restaurants=".urlencode(trim($_GET['restaurants'])));
//}
}
else
{
$ToslAdmin=$resdata['convenience_fee']+$_SESSION['tipamountVale'];
header("location:payment_redirect.php?Total=".$_POST['Total']."&adminPayment=".$ToslAdmin."&paymentType=".$_POST['method']."&order_identifyno=".$pizza89orderid."&restaurants=".urlencode(trim($_GET['restaurants'])));
}
}		
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?> | <?php echo stripslashes(ucwords($resSEO['restaurant_MetaTitle'])); ?> </title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaDescription'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaKeyword'])); ?>"
/>
<style type="text/css">
ul.addr { margin:8px 0px 0px 30px; }
ul.addr li { list-style:none; margin-bottom:7px; }
.item_name { width:55%; min-height:30px; border-right:1px solid #fff; float:left;padding-top:3px; padding-left:10px; }
.unit { width:15%; min-height:30px; border-right:1px solid #fff; float:left; text-align:center; padding-top:3px;}
.unit_price { width:15%; min-height:30px; border-right:1px solid #fff; float:left; text-align:center; padding-top:3px;}
.price { width:15%; min-height:30px; float:left; text-align:center; padding-top:3px; }
.clear { clear:both; }
ul.sum_row{ width:100%; margin:0;}
ul.sum_row li { margin:3px 0px 4px 0px; list-style:none;border-bottom:1px solid #ccc; padding-bottom:5px;min-height:30px; }
.continue_btn{width:20%; height:35px; border-radius:5px; background:#008000; text-align:center; border:1px solid #008000; color:#FFFFFF; float:right; margin-right:50px; font-size:18px; margin-top:20px;}
.continue_btn:hover{background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #FA3800), color-stop(1, #f0c911) ); cursor:pointer;
	background:-moz-linear-gradient( center top, #FA3800 5%, #f0c911 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FA3800', endColorstr='#f0c911');
	background-color:#FA3800;color:#FFFFFF;}
.address_rest { width:100%; min-height:70px; margin:auto; margin-top:22px; box-shadow:1px 1px 1px 2px #ccc; padding:1%; padding-bottom:10px; }
ul#payments{ margin:0; padding:0; }
ul#payments li { width:23%; min-height:100px; float:left; margin-left:5%; margin-right:5%; list-style:none; margin-top:20px; }
#cash { background:url(images/cash.png) no-repeat;padding-left:60px;padding-top:30px; }
#paypal { background:url(images/paypal.png) no-repeat;background-size:64px 54px;background-position:1px 10px;padding-left:70px;padding-top:30px; }
#credit { background:url(images/credit.png) no-repeat; background-position:1px 5px; padding-left:65px;padding-top:30px; }
.address_rest{width:100%; min-height:70px; margin:auto; margin-top:22px; box-shadow:1px 1px 1px 2px #ccc; padding:1%; padding-bottom:20px;}
.order_sumry{width:100%; height:30px; border:1px solid #000; background:#515151;color:#FFFFFF;}
.your_address{width:47%; min-height:200px; padding:10px; float:left; margin-left:2%}
.checkout_full{width:100%; min-height:500px; border:1px solid #ccc; background:#fff; padding:2%;}
.check_heading{width:100%; height:40px; border:1px solid #f25804; border-radius:5px; background:#f25804; color:#FFFFFF; padding:7px 5px 5px 10px;}
 .coupon{width:100%; height:50px;}
 .coupon_left{width:55%; height:50px; float:left; padding-left:10px; padding-top:5px;}
 .coupon_right{width:45%; min-height:50px; float:right;}
 .coupon_aaply{width:50%; min-height:30px; float:right; padding-left:10%}
 .coupon_txt{ width:50%; height:30px; border:1px solid #ccc; border-radius: 4px; padding-left:5px;margin-left:30%;  }
 .coupon_txt:focus { border-color:#f8a71e;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6);
box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6) }
.apply{padding:7px 15% ;background:#D80E0F;color:#FFFFFF;border-radius:5px;border:1px solid #D80E0F;margin-top:5px;font-weight:bold;margin-left:17%;}
.apply:hover{background:#FF091E;border:1px solid #FF091E;color:#FFFFFF;cursor:pointer;}
 </style>
 
<title>Checkout</title>


  
</head>

<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
  <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>
<!--wrapper Ends-->



<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:30px;">
  <!--content container starts-->
  <div class="container" style="min-height:600px; padding-bottom:30px;">
 <!-- mid search  starts-->
  <div class="midserach">
  <div class="steps">
   <ul>
                 <li> <a href="./"> <span>1</span> <?php echo $TableLanguage['SetpSearchText'];?> </a> </li>
                <li> <a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>"> <span >2</span> <?php echo $TableLanguage['SetpSelectRestaurantText'];?> </a> </li>
                <li> <a href="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants']));?>" > <span>3</span> <?php echo $TableLanguage['SetpPlaceOrderText'];?> </a> </li>
                <li> <a href="#" style="color:#FF091E" > <span class="selected">4</span> <?php echo $TableLanguage['SetpCheckoutText'];?> </a> </li>
              </ul>
  </div>
  </div>
  <!-- mid search  ends-->
 <!--<div class="midcontainer">
 
 </div>-->
  <?php 
include('TimeTableRestaurant.php');
 include('TimeTableDisplay.php');
 include('MiddleRestaurant.php'); ?>
  <form action="" method="post">
  <?php if($_SESSION['justfoodsUserID']!=''){?>
  <input type="hidden" value="<?php echo $_SESSION['justfoodsUserName']; ?>" name="GustUserName" />
  <?php } else { ?>
  <input type="hidden" value="<?php echo $UserData['GustUserName']; ?>" name="GustUserName" />
  <?php } ?>
<?php if($_GET['ServiceAddress']!=''){ ?>
<input type="hidden" value="<?php echo $UserData['GustUserAddress']; ?>" name="GustUserAddress" />
<input type="hidden" value="<?php echo $UserData['GustUserCityName']; ?>" name="GustUserCityName" />
<input type="hidden" value="<?php echo $UserData['GustUserPincode']; ?>" name="GustUserPincode" />
<?php } else { ?>
<input type="hidden" value="<?php echo $UserDataLogin['address']; ?>" name="GustUserAddress" />
<input type="hidden" value="<?php echo $UserDataLogin['city_name']; ?>" name="GustUserCityName" />
<input type="hidden" value="<?php echo $UserDataLogin['zipcode']; ?>" name="GustUserPincode" />
<?php } ?>

<?php if($_GET['ServiceAddress']!=''){ ?>
<input type="hidden" value="<?php echo $UserData['GustUserMobileNo']; ?>" name="GustUserMobileNo" />
<?php } else { ?>
<input type="hidden" value="<?php echo $UserDataLogin['user_phone']; ?>" name="GustUserMobileNo" />
<?php } ?>

 <form action="" method="post">
  <?php if($_SESSION['justfoodsUserID']!=''){?>
  <input type="hidden" value="<?php echo $_SESSION['justfoodsUserName']; ?>" name="customerName" />
  <?php } else { ?>
  <input type="hidden" value="<?php echo $UserData['GustUserName']; ?>" name="customerName" />
  <?php } ?>
<?php if($UserDataLogin['user_email']!=''){ ?>
<input type="hidden" value="<?php echo $UserDataLogin['user_email']; ?>" name="customerEmail" />
<input type="hidden" value="<?php echo $UserDataLogin['state_name']; ?>" name="customerState" />
<?php } else { ?>
<input type="hidden" value="<?php echo $UserData['GustUserEmail']; ?>" name="customerEmail" />
<?php } ?>
<input type="hidden" value="<?php echo $UserData['id']; ?>" name="customerDeliveryID" />
 <div class="checkout_full">
 <!--<h2 style="font-weight:normal;">Please confirm the following details :</h2>-->
 <div class="check_heading">
 <h2 style="font-weight:normal;"><?php echo ucwords($TableLanguage5['ResFormFieldCheckoutText']);?></h2></div>
 
 <div class="address_rest">
 <div class="your_address">
 <h3 style="float:left;"><?php echo ucwords($TableLanguage5['ResFormFieldShippingAddText']);?> :</h3>

 <?php if($_GET['ServiceAddress']!=''){ ?>
  <a style="margin-left:120px;" href="shippinginfo.php?eid=<?php echo $UserData['id'];?>&restaurants=<?php echo $_GET['restaurants'];?>&deliveryTime=<?php echo $_GET['deliveryTime'];?>&RestaurantService=<?php echo $_GET['RestaurantService'];?>"><?php echo $TableLanguage1['ChangeAddressText'];?></a>
  <?php } else { ?>
   <br />
  <?php } ?>
  
  
 <ul class="addr">
 <li><strong><?php echo $TableLanguage5['ResFormFieldNameText'];?> :</strong> 
 <?php if($_SESSION['justfoodsUserID']!='')
 {?>
 <?php echo $_SESSION['justfoodsUserName']; ?>
 <?php } else { ?>
 <?php echo $UserData['GustUserName']; ?>
 <?php } ?>
 </li>
  <?php if($_GET['ServiceAddress']!=''){ ?>
  <li><strong><?php echo $TableLanguage5['ResFormFieldAddressText'];?> :</strong><?php echo $UserData['GustUserAddress']; ?> ,<?php echo $UserData['GustUserCityName']; ?> - <?php echo $UserData['GustUserPincode']; ?></li>
  <?php } else { ?>
   <li><strong><?php echo $TableLanguage5['ResFormFieldAddressText'];?> :</strong><?php echo $UserDataLogin['address']; ?> ,<?php echo $UserDataLogin['city_name']; ?> -<?php echo $UserDataLogin['zipcode']; ?> </li>
  <?php } ?>
  
  
   <?php /*?> <li><strong><?php echo $TableLanguage4['ResAddressText'];?>  :</strong> <?php echo $UserData['GustUserCityName']; ?> <?php $StateQuery = mysql_fetch_assoc(mysql_query("select * from tbl_state where id='".$UserData['stateID']."' order by stateName asc"));
	echo $StateQuery['stateName'];?> 
	<?php $CountryQuery = mysql_fetch_assoc(mysql_query("select * from tbl_country where id='".$UserData['countryID']."' order by countryName asc"));
	echo $CountryQuery['countryName'];?>- <?php echo $UserData['GustUserPincode']; ?></li> <?php */?>
    <?php if($_GET['ServiceAddress']!=''){ ?>
    <li><strong><?php echo $TableLanguage5['ResFormFieldContactText'];?> :</strong> <?php echo $UserData['GustUserMobileNo']; ?></li>
    <?php } else { ?>
    <li><strong><?php echo $TableLanguage5['ResFormFieldContactText'];?> :</strong> <?php echo $UserDataLogin['user_phone']; ?></li>
    <?php } ?>
   
 </ul>
 <div style="clear:both;"></div>
 </div>

 <div class="your_address">
 <h3><?php echo ucwords($TableLanguage5['ResFormFieldRestaurantAddText']);?> :</h3>
 <ul class="addr">
  <li><strong> <?php echo $TableLanguage5['ResFormFieldNameText'];?> :</strong> <?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></li>
   <li><strong><?php echo $TableLanguage4['ResAddressText'];?> :</strong> <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?></li>
    <li><strong><?php echo $TableLanguage2['CityFilterText'];?> :</strong><?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?></li> 
       <li><strong><?php echo $TableLanguage5['ResFormFieldContactText'];?> :</strong><?php echo stripslashes(ucwords($resdata['restaurant_phone'])); ?></li>
   
 </ul>
 <div class="clear"></div>
 </div>
  <div class="clear"></div>
 </div>
 <div id="cartout"></div>
 <div class="address_rest">
 <table width="100%">
 <?php if($_SESSION['preorder']!='' && $_GET['deliveryTime']=='' && $_GET['deliveryDate']==''){ ?>
               <tr><td width="15%">Delivery/Pickup Time</td><td width="40%">
                <select id="deliveryTime" class="textbox" required name="deliveryTime" style="width:300px;height:35px;border:1px solid #979797;padding-left: 8px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25) inset;">
                      <option value="" selected="selected">Select</option>
                      <?php if($_GET['deliveryTime']!=''){ ?>
                       <option value="<?php echo $_GET['deliveryTime'];?>" selected="selected"><?php echo $_GET['deliveryTime'];?></option>
                       <?php } else {?>
                        <option value="<?php echo date('h:i a', time());?>" selected="selected"><?php echo date('h:i a', time());?></option>
                       <?php } ?>
                       <option value="12:00 am">12:00 am</option>
  <option value="1:00 am">1:00 am</option>
  <option value="2:00 am">2:00 am</option>
  <option value="3:00 am">3:00 am</option>
  <option value="4:00 am">4:00 am</option>
  <option value="5:00 am">5:00 am</option>
  <option value="6:00 am">6:00 am</option>
  <option value="7:00 am">7:00 am</option>
  <option value="8:00 am">8:00 am</option>
  <option value="9:00 am">9:00 am</option>
  <option value="10:00 am">10:00 am</option>
  <option value="11:00 am">11:00 am</option>
  <option value="12:00 am">12:00 pm</option>
  <option value="1:00 pm">1:00 pm</option>
  <option value="2:00 pm">2:00 pm</option>
  <option value="3:00 pm">3:00 pm</option>
  <option value="4:00 pm">4:00 pm</option>
  <option value="5:00 pm">5:00 pm</option>
  <option value="6:00 pm">6:00 pm</option>
  <option value="7:00 pm">7:00 pm</option>
  <option value="8:00 pm">8:00 pm</option>
  <option value="9:00 pm">9:00 pm</option>
  <option value="10:00 pm">10:00 pm</option>
  <option value="11:00 pm">11:00 pm</option>
                    </select></td></tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
               <tr><td width="15%">Delivery/Pickup Date</td><td width="40%"><select style="width:300px;height:35px;border:1px solid #979797;padding-left: 8px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25) inset;" class="textbox" required name="deliveryDate" id="deliveryDate">
    <?php 

 $cTm=mktime(0,0,0,date('m'),date('d'),date('Y'));
 $lTm=mktime(0,0,0,06,date('d'),2020);
for($iD=$cTm;$iD<=$lTm;$iD=$iD+(24*3600)){
?>	
<option value="<?php echo date('Y-m-d',$iD);?>" <?php if($_GET['deliveryDate']==date('Y-m-d',$iD)){ ?> selected="selected" <?php } ?>><?php echo date('D M d S Y',$iD);?></option>
<?php
	}
?>
    </select></td></tr>
               
                <?php } else 
				{ 
				 
				 ?>
                 <input  name="deliveryDate"  type="hidden" value="<?php echo $_GET['deliveryDate'];?>" />
                 <input  name="deliveryTime"  type="hidden" value="<?php echo $_GET['deliveryTime'];?>" />
                <tr><td><strong>Delivery/Pickup Date</strong></td> <td><?php echo $_GET['deliveryDate'];?></td></tr>
                 <tr><td><strong>Delivery/Pickup Time</strong></td> <td><?php echo $_GET['deliveryTime'];?></td></tr>
               
                <?php } ?>
</table>
 </div>
 
 <div class="address_rest">
 <input type="hidden" name="order_type" value="<?php echo $_GET['RestaurantService']; ?>" />
  <strong style="margin-right:10px;"><?php echo ucwords($TableLanguage5['ResFormFielOrderTypeText']);?> :</strong><?php echo $_GET['RestaurantService']; ?>
 <h2 style="font-weight:normal; color:#D80E0F; margin-top:25px;"><?php echo $TableLanguage5['ResFormFielPaymentMethodConfirmText'];?> </h2>
 
 <ul id="payments">
  <?php 
  $paymenG=explode(',',$resdata['restaurant_payment_method']);
  foreach($paymenG as $v)
  {
  $PaymentData=mysql_fetch_assoc(mysql_query("select * from tbl_pyamentSetting where id ='".$v."'"));
  if($PaymentData['restPaymentMethodName']=='Cash On Delivery')
  {
   ?>
 <li class="mode" id="cash"><input type="radio" required name="method"  id="method" value="Cash On Delivery"/><?php echo ucwords($TableLanguage5['ResFormFielCashOnDeliText']);?></li>
 <?php } if($PaymentData['restPaymentMethodName']=='Paypal')
  { ?>
 <li class="mode" id="paypal"><input type="radio" name="method" required id="method" value="Paypal" /><?php echo $TableLanguage5['ResFormFielPayaplText'];?></li>
 <?php }  if($PaymentData['restPaymentMethodName']=='Credit Card'){ ?>
 <li class="mode" id="credit"><input type="radio" name="method" id="method" value="authorize.net" /><?php echo ucwords($TableLanguage5['ResFormFielCreditCardText']);?></li>
 <?php } ?>
 <?php } ?>
 </ul>
 
 
 <input type="submit" name="cnfrmOrderSubmitDataCartData" id="cnfrmOrderSubmitDataCartData" value="<?php echo $TableLanguage5['ResFormFielContinueText'];?> &raquo;" class="continue_btn" />
 
  <div class="clear"></div>
 </div>
 </div>
 </form>
 <div class="clear"></div>
 </div>
 <!--mid container ends-->
  
  
  
  
   </div>
  <!--content container ends-->
</div>
<!--contentwrapper Ends-->

<?php 
//if($_GET['RestaurantService']=="Home Delivery"){
//$_GET['RestaurantService']='HomeDelivery';
//}
 ?>
<a href="#" class="go-top" style="color:#ffffff;"><?php echo $TableLanguage1['BackToTopText'];?></a>

	<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>



<!--footer wrapper starts-->
<?php include('route/Footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
	$("#cartout").load("cnfrmCart.php?hotel_id=<?php echo $resID[0];?>&Id=0&Dar=N&adressId=<?php echo $_GET['ServiceAddress'];?>&RestaurantService=<?php echo $_GET['RestaurantService'];?>&tipamountAmount=<?php echo $_SESSION['tipamountVale'];?>");
	
	</script>	
<!--footer wrapper ends-->

<script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<!--<script src="js/search/app.js"></script>-->
<script src="js/search/app.js" type="text/javascript"></script>
<script src="js/search/jquery.lockfixed.js"></script>
</body>
</html>
