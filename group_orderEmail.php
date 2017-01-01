<?php 
if($GroupEmail!=''){
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
$GroupEmailTo=rtrim($GroupEmail,',');
$to1=$GroupEmailTo;
$subject1 ='Thank you for Group Ordering with '.$AdminDataLoginVal['website_name'].'';
$from1=$RegistrationDataLoginVal['orderemail'];
$message1 .=  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'	'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
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
                       <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:18px'>Dear Friend,</td>
                             
                   </tr>
				   
				   <tr>
                       <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;'>". $_POST['GustUserName']." has been shared group ordering with you from ".$resdata['restaurant_name']."</td>
                             
                   </tr>
				   
				  
                   <tr>
                          <td style='font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#c1272d;font-weight:bold;padding-left:28px;padding-top:18px'> Thanks for your group ordering <br><span style='color:#666'>Your order confirmation message  will be sent to your email address</span></td>
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
	 $plk='';
   while($dealFood=mysql_fetch_assoc($DealsQuery)){
   $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
   $plk.=$dealFood['cartId'].',';
   
$message1 .=" <tr><td width='268' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$dealFood['deal_name']."<br />
              <span class='desc-small' style='font-size:14px;'>
   <strong> Deal Items: </strong>
    <br />";
	$SlotItem=explode(',',$dealFood['slotItemID']);
	foreach($SlotItem as $v)
	{
	if($v!=''){
	$slotDNam=mysql_fetch_assoc(mysql_query("select * from tbl_fooddealslotitem where id='".$v."'"));
	$message1 .="".$slotDNam['slot_itemName']."<br />";	
	}
	}
$message1 .= "</td><td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$AdminDataLoginVal['website_CurrencySymbole'].$dealFood['deal_price']."</td><td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$dealFood['quqntity']."</td>

          <td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'> ";	
	 
	$DealsItemTota=$dealFood['deal_price']*$dealFood['quqntity'];
$message1 .= "".$AdminDataLoginVal['website_CurrencySymbole'].number_format($DealsItemTota,2)."</td></tr>";	
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

$message1 .=" <tr><td width='268' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$itmDt[1]['RestaurantPizzaItemName'].'('.$MenuSizeData['SizeMenuName'].")";
if($MenuDoughData['menuDoughName']!=''){					
$message1 .="<br>".$MenuDoughData['menuDoughName']."";	
}
if($MenuBaseData['menuBaseName']!=''){					
$message1 .="<br>".$MenuBaseData['menuBaseName']."";	
}
if($MenuCheesData['menuCheesName']!=''){					
$message1 .="<br>".$MenuCheesData['menuCheesName']."";	
}
$plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){					
$message1 .="<br>".$MenuExtraData['menuExtraName']."";	
}
}

 $plk=explode(',',$val['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){				
$message1 .="<br>".$MenuExtraData['menuExtraName']."";	
}
}

$message1 .= "</td><td width='268' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>$ ".number_format($itmDt[1]['RestaurantPizzaItemPrice'],2)."";
	 
	 $message1 .= " <span class='desc-small' style='font-size:12px; '>";
if($MenuDoughData['menuDoughPrice']!=''){					
$message1 .="<br>".$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuDoughData['menuDoughPrice'],2)."";	
}
if($MenuBaseData['menuBasePrice']!=''){					
$message1 .="<br> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuBaseData['menuBasePrice'],2)."";	
}
if($MenuCheesData['menuCheesPrice']!=''){					
$message1 .="<br> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuCheesData['menuCheesPrice'],2)."";	
}
 $plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	$message1 .=" <br /> ".$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice']."";
	}
	}
	
	 $plk=explode(',',$val['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	$message1 .=" <br /> ".$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice']."";
	}
	}

	
	 
	 $message1 .= "</td>
                 
                   <td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'>".$val['quqntity']."</td>
                   
                   <td width='70' height='24' style='border-bottom:1px solid #c7c7c7;border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:26px'> ";	
	 
	$ItemTota=$val['price']*$val['quqntity'];
	$ItemTota=$ItemTota+$extPrc;
	$subTotal+=($ItemTota);
$message1 .= "".$AdminDataLoginVal['website_CurrencySymbole'].number_format($ItemTota,2)."</td></tr>";	
}
}
}
$subTotal=$subTotalOffer+$subTotal;
$message1 .= "<tr><td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Sub total:</td>
                                    <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($subTotal,2)." </td>   
                                </tr>    ";

$offerDisc='';
 $discountValue='';//$RestaurantOfferQuery['RestaurantOfferStartPrice']
// $plo=mysql_query("select * from tbl_restaurantOffer where status='0' and restaurant_id='".$resID[0]."'");
 
$plttop1=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='1' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop2=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='2' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop3=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='3' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop4=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='4' and status='0' and restaurant_id='".$resID[0]."' "));

$plttop5=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='5' and status='0' and restaurant_id='".$resID[0]."' "));
include('tableTime3.php');
$offerDisc='';

						   //while($RestaurantOfferQuery=mysql_fetch_assoc($plo)){
						   
						 if($subTotal>$plttop1['RestaurantOfferStartPrice'])
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
						   
						  
						   
						   
						   //}// While Loop End Here
						   
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


$message1 .= "<tr><td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Sub total:</td>
                                    <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($subTotal,2)." </td>   
                                </tr>    ";

if($discountValue!=''){

$message1 .= "   <tr>  
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
$message1 .= "  <tr>  
                                        <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Discount Coupon (".$_SESSION['disCupn']."):</td>
                                        <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> - ".number_format($_SESSION['disCupnPrice'],2)." ".$DisType."</td>   
                                    </tr>  ";

}

if($_POST['loyptamount']!=''){
$message1 .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Pay by loyalty:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> -  ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($_POST['loyptamount'],2)." </td>   
                                        </tr>";
										}
if($deliverVale!=''){
$message1 .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Delivery Charge:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> +  ".$AdminDataLoginVal['website_CurrencySymbole'].number_format($deliverVale,2)." </td>   
                                        </tr>";
										}
										
										$message1 .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Tip:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> +  ".$AdminDataLoginVal['website_CurrencySymbole'].$_SESSION['tipamountVale']." </td>   
                                        </tr>";

$message1 .= " <tr>  
                                            <td colspan='3' height='24' align='right' style='padding-top:8px;padding-right:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px;font-weight:bold'>Convenience Fee:</td>
                                            <td height='24' style='padding-left:12px;padding-top:8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#464646;line-height:18px'> +  ".$AdminDataLoginVal['website_CurrencySymbole'].$resdata['convenience_fee']." </td>   
                                        </tr>";

$message1 .= "  <tr>  
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
$message1 .= "</body></html>";
	$headers1 = "MIME-Version: 1.0\n";
	$headers1 .= "Content-type: text/html;charset=UTF-8\n"; 							
	$headers1 .= "From: $from  \r\n" .
	$headers1 .= "X-Priority: 1\r\n"; 
	$headers1 .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers1 .= "X-MSMail-Priority: High\r\n"; 
	$headers1 .= "X-Mailer: Just My Server"; 
if(mail($to1, $subject1, $message1, $headers1)){
}
}
 ?>