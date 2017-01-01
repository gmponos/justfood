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
$ip=$_SERVER['REMOTE_ADDR'];
$odr_date=date("Y-m-d");
$user_date=date('m/d/Y');	
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
$message .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Tip:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> +  ".$AdminDataLoginVal['website_CurrencySymbole'].$_SESSION['tipamountVale']." </td>   
                                        </tr>";
										

$message .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Convenience Fee:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> +  ".$AdminDataLoginVal['website_CurrencySymbole'].$resdata['convenience_fee']." </td>   
                                        </tr>";

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
header("location:thankyou.php?order_identifyno=".$pizza89orderid."&restaurants=".urlencode(trim($_GET['restaurants'])));

}
}				
//}
?>