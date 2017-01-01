<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'");
$prix=new User(); 
include('route/db.php'); 
$dbObj=new db;
$TableLanguage=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate where id='1'"));
$TableLanguage1=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate1 where id='1'"));
$TableLanguage2=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate2 where id='1'"));
$TableLanguage3=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate3 where id='1'"));
$TableLanguage4=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate4 where id='1'"));
$TableLanguage5=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate5 where id='1'"));
$TableLanguage6=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate6 where id='1'")); 
$TableLanguage7=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

 if(isset($_GET['hotel_id']))
{
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$_GET['hotel_id']));
}
$itmID=explode("-",$_GET['Id']);

if(isset($_GET['crntCrt'])){
$rec=$dbObj->getData(array("sysIP","sessoionId","price","quqntity","hotel_id"),"cartNew","cartId='".$itmID[0]."'");	
}else{	
$rec=$dbObj->getData(array("sysIP","sessoionId","price","quqntity","hotel_id"),"cartNew","itemId='".$itmID[0]."'");
}
switch($_GET['act']){
	case 'adN':
		if($rec[0]>0){
			$qty=$rec[1]['quqntity']+1;
			@$crtUP="update cartNew set quqntity='".$qty."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$_GET['hotel_id']."' AND itemId='".$itmID[0]."'";
mysql_query($crtUP) or die(mysql_error());
}else{
@$crt=array("sysIP"=>$_SERVER['REMOTE_ADDR'],"sessoionId"=>session_id(),"itemId"=>$itmID[0],"quqntity"=>1,"hotel_id"=>$_GET['hotel_id'],'price'=>$itmID[1]);

	$dbObj->dataInsert($crt,"cartNew");

		}

	break;

	case "min":

		if($rec[1]['quqntity']>1){

			$qty=$rec[1]['quqntity']-1;

			@$crtUP="update cartNew set quqntity='".$qty."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND cartId='".$itmID[0]."'";

					mysql_query($crtUP) or die(mysql_error());

		}else{

			$delQury="DELETE from cartNew where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND cartId='".$itmID[0]."'";

					mysql_query($delQury) or die(mysql_error());

		}

	break;

	case "adCt":

		 $qty=$rec[1]['quqntity']+1;

		 @$crtUP="update cartNew set quqntity='".$qty."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND cartId='".$itmID[0]."'";

					mysql_query($crtUP) or die(mysql_error());

		

	break;

	case "d":

$delQury="DELETE from cartNew where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND cartId='".$itmID[0]."'";

					mysql_query($delQury) or die(mysql_error());		

	break;


case "gpd":

$delQury="DELETE from tbl_restaurantGroupOrder where ip='".$_SERVER['REMOTE_ADDR']."' AND sessoionId_groupOrder='".session_id()."'  AND restaurant_id='".$_GET['hotel_id']."' AND id='".$_GET['groupid']."'";

					mysql_query($delQury) or die(mysql_error());		

	break;
	
case "dealDelete":

$delQury="DELETE from cartfoodDeals where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND deal_id='".$_GET['dealDeleteID']."'";

					mysql_query($delQury) or die(mysql_error());		

	break;	
	
case "DealadCt":

		 $qty=$_GET['dealQty']+1;

		 @$crtUP="update cartfoodDeals set quqntity='".$qty."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND deal_id='".$_GET['DealId']."'";

					mysql_query($crtUP) or die(mysql_error());

		

	break;		
	

case "Dealmin":
			if($_GET['dealQty']>1)
			{
		 $qty=$_GET['dealQty']-1;
		 @$crtUP="update cartfoodDeals set quqntity='".$qty."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND deal_id='".$_GET['DealId']."'";
mysql_query($crtUP) or die(mysql_error());
}
else
{
 @$crtUPDelate="delete from cartfoodDeals  where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."' AND deal_id='".$_GET['DealId']."'";
mysql_query($crtUPDelate) or die(mysql_error());
}
		

	break;			

	

}








?>
<?php if($_SESSION['justfoodsUserID']!=''){ 
$url="shippinginfo.php";
} else {
$url="CartTimelogin.php";
$p="&l=1";
 }?>
 
 <link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="colorbox/popup.js"></script>
<script>
			$(document).ready(function(){
				$(".grouporder").colorbox({iframe:true, width:"550px", height:"500px"});
				
			});
			
			
		
		</script>
       
        
        

<form action="<?php echo $url;?>" method="get" onSubmit="return DeliveryOrderemailvalidation();">
<input type="hidden" name="l" value="1" />
<input type="hidden" name="restaurants" value="<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html<?php echo $p;?>" />
<div id="place_order" class="place_order111">
<h1><?php echo ucwords($TableLanguage4['ResYourOrderText']);?> </h1>

<?php
$checkCartNumber=mysql_num_rows(mysql_query("select *  from cartNew where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'  AND hotel_id='".$_GET['hotel_id']."'"));
if($checkCartNumber>0){
?>
<a  class="grouporder" href="start_group_ordering.php?restaurants=<?php echo $resdata['id'];?>-<?php echo urldecode(trim($resdata['restaurant_name']));?>.html"  style="display:inline;"><div class="submit" style="margin-left:0px;">Start Group Order</div></a>
<?php } ?>

<table width="100%">
  <tr>
    <td><h2 style="float:left;"><?php echo ucwords($TableLanguage4['ResYourAddressText']);?></h2><?php /*?><a style="float:right; margin-top:5px;" href="#"><?php echo ucwords($TableLanguage1['ChangeAddressText']);?></a><?php */?>
<br />
<br />
<p style="padding-bottom:5px; border-bottom:1px solid #ccc;"><?php echo $_SESSION['userAdress'];?></p>
<!--<p>Your order will be  delivered to above Address.</p>--></td>
  </tr>
   <tr>
    <td><!--<h3>Your Selections</h3>-->
    <?php
	$groupOrderQuery=mysql_query("select *  from tbl_restaurantGroupOrder where ip='".$_SERVER['REMOTE_ADDR']."' AND sessoionId_groupOrder='".session_id()."'  AND restaurant_id='".$_GET['hotel_id']."'");
	$checkCartGroupOrderNumber=mysql_num_rows($groupOrderQuery);
if($checkCartGroupOrderNumber>0){
	 ?>
    <table width="100%" border="0">
    <tr><td colspan="4"><strong>Group Order List (<?php echo $checkCartGroupOrderNumber;?> user)</strong></td></tr>
  <?php 
  $count=1;
  while($GroupUser=mysql_fetch_assoc($groupOrderQuery)){ 
  
  ?>
  <tr>
    <td><?php echo $count;?>. <?php echo $GroupUser['RestaurantGroupOrderName'];?> (<?php echo $GroupUser['RestaurantGroupOrderEmail'];?>) group order</td>
    <td><img src="trash_16x16.gif"  title="Delete Group Order User" class="remove delCtgroup" style="cursor:pointer; margin-top:2px;" alt="<?php echo $GroupUser['id'];?>"/></td>
  </tr>
  <?php 
  $count++;
  } ?>
  
  <tr><td class="2" style="border-bottom:1px dotted #D8D8D8;"></td></tr>
</table>
<?php } ?>

    
  <!--Cart Offer Code Start Here  -->
    <?php 
	$subTotalOffer=0;
	$DealsQuery=mysql_query("select * from cartfoodDeals where sysIP='".$_SERVER['REMOTE_ADDR']."' and sessoionId='".session_id()."' and hotel_id='".$_GET['hotel_id']."' group by deal_id");
	if(mysql_num_rows($DealsQuery)>0)
	{
	 ?>
   <table width="100%">
   <?php 
   $plk='';
   while($dealFood=mysql_fetch_assoc($DealsQuery)){
   $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
   $plk.=$dealFood['cartId'].',';
    ?>
    <tr>
    <td>
   
    <div class="products" style="border:none;">
       <div class="cartproductname">
   <strong style="color:#009933;"> <?php echo $dealFood['deal_name'];?> </strong>
    <br />
    
    <span class="desc-small" style="font-size:14px;">
   <strong> Deal Items: </strong>
    <br />
    <?php 
	
	$SlotItem=explode(',',$dealFood['slotItemID']);
	foreach($SlotItem as $v)
	{
	if($v!=''){
	$slotDNam=mysql_fetch_assoc(mysql_query("select * from tbl_fooddealslotitem where id='".$v."'"));
	echo $slotDNam['slot_itemName'];?><br />
    <?php } } ?>
     </span>
    </div>
    </div>
    <div class="cartproductedit"><a class="dealsiframe" href="FoodDealsPopupChange.php?restaurant_id=<?php echo stripslashes(ucwords($resdata['id']));?>&deal_id=<?php echo $dealFood['deal_id'];?>&cartID=<?php echo $dealFood['cartId'];?>&restaurants=<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html"><img style="margin:1px;" src="images/cart_edit.png" /></a></div>
     <div class="cartproductrow">
     <div class="cartquantity"><table width="80%">
  <tr>
    <td><img style="margin-top:0%;cursor:pointer;"  class="DealcrtMin" src="btn_minus.png" alt="<?php echo $dealFood['quqntity'];?>" />
 <input type="hidden" name="dealctItm" id="dealctItm" value="<?php echo $dealFood['deal_id'];?>"  />  </td>
    <td><div style="width:100%;"> <?php echo $dealFood['quqntity'];?></div></td>
    <td><img src="btn_plus.png" class="DealcrtPlus"  style="margin-top:0%; cursor:pointer;" alt="<?php echo $dealFood['quqntity'];?>" />
<input type="hidden" name="dealctItm" id="dealctItm" value="<?php echo $dealFood['deal_id'];?>" /></td>
  </tr>
</table>
</div>
     <div class="cartproductprice"><strong><?php echo $dealFood['deal_price']*$dealFood['quqntity'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></div>
     <div class="cartproductcancel"><img src="images/list-remove.png"  title="Delete Menu Item" class="remove dealDeleteM" style="cursor:pointer; margin-top:2px;" alt="<?php echo $dealFood['deal_id'];?>"/></div>
      <div class="clear"></div>
     </div>
    
	<hr />
</div>

</td>
  </tr>
  <?php } ?>
   </table>
   <?php } ?>

  
  <!--Cart Offer Code End Here-->
    
    
 
    
<?php 

//echo "sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'";
$total='';
$recrt=$dbObj->getData(array("cartId","sysIP","sessoionId","itemId","price","MenuSize","quqntity","doughValue","baseValue","hotel_id","cheesValue","extraItemID","ExtraitemGroupID","extraItemID2","GroupextraItemID","GroupextraItemValue"),"cartNew","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$_GET['hotel_id']."' and offer='0'");

//print_r($recrt);

if($recrt[0]>0){

	$subTotal=0;

foreach($recrt as $val){

		if(is_array($val)){

				  $itmDt=$dbObj->getData(array("*"),"tbl_restaurantMainMenuItem","id='".$val['itemId']."'");



?>   </td>
  </tr>
   <tr>
    <td>
    <div class="products">
   
    <div class="cartproductrow">
    <div class="cartproductname">
    <?php echo $itmDt[1]['RestaurantPizzaItemName'];?> <?php 
$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$val['MenuSize']."'"));
	if($MenuSizeData['SizeMenuName']!=''){
	echo '('.$MenuSizeData['SizeMenuName'].')';
	}

	?>
    <br />
    <span class="desc-small" style="font-size:14px;">
    <?php
	$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$val['doughValue']."'"));
	if($MenuDoughData['menuDoughName']!=''){
	echo $MenuDoughData['menuDoughName'].'<br />';
	}
	 ?>
      <?php
	$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$val['baseValue']."'"));
	if($MenuBaseData['menuBaseName']!=''){
	echo $MenuBaseData['menuBaseName'].'<br />';
	}
	 ?>
      <?php
	$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$val['cheesValue']."'"));
	if($MenuCheesData['menuCheesName']!=''){
	echo $MenuCheesData['menuCheesName'].'<br />';
	}
	 ?>
   
    <?php
	 $plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	if($MenuExtraData['menuExtraPrice']!=0){
	'('.$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice'].')';
	}
	}
	?>
       
    <?php
	 $plk=explode(',',$val['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	if($MenuExtraData['menuExtraPrice']!=0){
	'('.$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice'].')'.'';
	}
	}
	?>
    <br />
    
     </span>
    </div>
    <div class="cartproductedit"><a class="iframe5" href="changeProduct.php?restaurantID=<?php echo stripslashes(ucwords($resdata['id']));?>&menuID=<?php echo $itmDt[1]['id'];?>&size=<?php echo $val['MenuSize'];?>&dough=<?php echo $val['doughValue'];?>&base=<?php echo $val['baseValue'];?>&chees=<?php echo $val['cheesValue'];?>&checkboxid=<?php echo $val['extraItemID'];?>&checkboxid1=<?php echo $val['ExtraitemGroupID'];?>&PriceBalance=<?php echo $val['quqntity'];?>&restaurants=<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html"><img style="margin:1px;" src="images/cart_edit.png" /></a></div>
    <div class="clear"></div>
    </div>
     <div class="cartproductrow">
     <div class="cartquantity"><table width="80%">
  <tr>
    <td><img style="margin-top:0%;"  class="crtMin" src="btn_minus.png" />
 <input type="hidden" name="ctItm" id="ctItm" value="<?php echo $val['cartId'];?>" />  </td>
    <td><div style="width:100%;"> <?php echo $val['quqntity'];?></div></td>
    <td><img src="btn_plus.png" class="crtPlus"  style="margin-top:0%;" />
<input type="hidden" name="ctItm" id="ctItm" value="<?php echo $val['cartId'];?>" /></td>
  </tr>
</table>
</div>
     <div class="cartproductprice"><strong><?php 
//echo $val['price']*$val['quqntity']+$extPrc;

						$ItemTota=$val['price']*$val['quqntity'];
						$ItemTota=$ItemTota+$extPrc;
						echo number_format($ItemTota,2);
						//$subTotal+=($val['price']*$val['quqntity']+$extPrc);

						$subTotal+=($ItemTota);
?>&nbsp;<?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></div>
     <div class="cartproductcancel"><img src="images/list-remove.png"  title="Delete Menu Item" class="remove delCt" style="cursor:pointer; margin-top:2px;" alt="<?php echo $val['cartId'].",".$itmDt[1]['RestaurantPizzaItemPrice'];?>"/></div>
      <div class="clear"></div>
     </div>
    
	
</div>
<?php 

		}

	}

}
//echo $subTotal;
$subTotal=$subTotalOffer+$subTotal;
?>   
<?php if($subTotal==''){ ?>
<img style="margin-left:45px; margin-top:10px;" src="images/empty_cart.png" />
                    <p class="note" style="color:rgb(255, 0, 0); padding:10px; margin-bottom:10px; text-align:center;"> <b><?php echo $TableLanguage7['cartemptyText'];?>                   
                    </b> </p>
           
           
                    <?php } ?>
</td>
  </tr>
  
   
  <?php 
 $offerDisc='';
 $discountValue='';//$RestaurantOfferQuery['RestaurantOfferStartPrice']
 //$plo=mysql_query("select * from tbl_restaurantOffer where status='0' and restaurant_id='".$_GET['hotel_id']."'");
 
$plttop1=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='1' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop2=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='2' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop3=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='3'  and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop4=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='4' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop5=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='5' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));
include('TimeTable2.php');


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
						   
						   
						  
						   
						   
						   //}// While Loop End Here
						   
						 // echo $discountValue;
						  ?>
                      <?php  
					if($subTotal){
					$grandTotal=$subTotal-$discountValue+$_GET['OrdertTypeValue']+$resdata['convenience_fee']; 

					}
					else
					{
					$grandTotal=$subTotal+$_GET['OrdertTypeValue']+$resdata['convenience_fee']; 
					}
					$minOrderMin=$resdata['restaurant_default_min_order']-$grandTotal;
					?>
  <?php if($grandTotal<$resdata['restaurant_default_min_order'] && $subTotal!=''){ ?>
   <tr>
    <td>
    <p class="min-charge"><font><font class=""><?php echo $TableLanguage7['remainingText'];?> </font></font><strong><font><font class=""><?php 
	if($minOrderMin!=''){
	echo number_format(ucwords($minOrderMin),2);
	}
	else
	{
	echo '0.00';
	}
	 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></font></font></strong><font><font class=""> <?php echo $TableLanguage7['minimumorderamountfillText'];?> </font></font><strong><font><font class=""><?php echo number_format(ucwords($resdata['restaurant_default_min_order']),2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></font></font></strong></p>
	
    </td>
  </tr>
  <?php } ?>
  <?php if($subTotal!=''){ ?>
  <tr><!--class="pickup_delivery"-->
    <td><div  style="padding:10px;">
    <table width="100%" border="0">
  <tr>
  <?php
   $count=1;
  $ServIQuery=mysql_query("select * from tbl_restaurantService order by restaurant_service_name asc");
		while($SrvData=mysql_fetch_assoc($ServIQuery)){
		if(strstr($resdata['restaurant_service'],$SrvData['restaurant_service_name'])){
   ?>
    <td> 
     <input  type="radio" name="RestaurantService" <?php if($_GET['type']==$SrvData['restaurant_service_name']){ ?> checked="checked" <?php }?>  required id="RestaurantService<?php echo $SrvData['restaurant_service_name'];?>" class="RestaurantService<?php echo $count;?>"   value="<?php echo $SrvData['restaurant_service_name'];?>"  >

			 <label for="RestaurantService<?php echo $SrvData['restaurant_service_name'];?>"><?php echo $SrvData['restaurant_service_name'];?></label></td>

             <?php 

			 $count++;

			  ?>
    </td>
             <?php } } ?>
  </tr>
</table>
 <?php /*?> <?php if($resdata['restaurant_service']=="Pickup"){ ?>
 			<table width="100%" border="0">
  <tr>
    <td> <input  type="radio" name="RestaurantService" checked="checked" id="RestaurantServiceP" class="RestaurantService1"   value="Pickup"  >
			 <label for="RestaurantServiceP">Pickup</label></td>
    <td><input type="radio" name="RestaurantService" id="RestaurantServiceH" class="RestaurantService2"  value="Home Delivery" disabled="disabled"  >
			 <label for="RestaurantServiceH">Delivery</label></td>
  </tr>
</table>
<?php } else if($resdata['restaurant_service']=="Home Delivery" || $resdata['restaurant_service']=="Delivery"){?>

<table width="100%" border="0">
  <tr>
    <td> <input  type="radio" name="RestaurantService" id="RestaurantServiceP" class="RestaurantService1"  disabled="disabled" value="Pickup" >
			<label for="RestaurantServiceP">Pickup</label></td>
    <td><input type="radio" name="RestaurantService" checked="checked" class="RestaurantService2"  id="RestaurantServiceH"  value="Home Delivery"  >
			 <label for="RestaurantServiceH">Delivery</label></td>
  </tr>
</table>

<?php } else { ?>

<table width="100%" border="0">
  <tr>
    <td> <input  type="radio" name="RestaurantService" class="RestaurantService1"  required id="RestaurantServiceP" value="Pickup"  >
			<label for="RestaurantServiceP">Pickup</label></td>
    <td><input type="radio" name="RestaurantService" class="RestaurantService2" required id="RestaurantServiceH" value="Home Delivery"  >
			 <label for="RestaurantServiceH">Delivery</label></td>
  </tr>
</table>
<?php }?>   <?php */?>  
</div></td>
  </tr>
   <tr>
    <td><?php if($discountValue!=0){ ?>
    <div class="cartproductrow">
    <div class="cartdiscountfee">
    <h2 style="width:100%;"><?php echo $TableLanguage4['ResOfferDiscountText'];?> :</h2>
	<?php echo $offerDisc;?></div>
    <div class="cartdiscountprice"><strong><?php echo number_format($discountValue,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></div>
    <div class="clear"></div>
    </div>
<?php } ?></td>
  </tr>
  <tr>
  <td>
  <?php 
  if($resdata['restaurant_service']!="Takeout"){
  if($resdata['restaurant_avarage_deliveryCost']!=''){
					   $DeliveryValue=$resdata['restaurant_avarage_deliveryCost'];
					    ?>
     <div class="cartproductrow" id="displayDevelivery">
     <?php if($_GET['pickupData']==''){ ?>
    <div class="cartdiscountfee"><h2><?php echo $TableLanguage4['ResMinDeliveryFee'];?>:</h2></div>
    <div class="cartdiscountprice"> <h5 style="font-size:15px; margin-top:0px;"> <?php echo number_format(ucwords($resdata['restaurant_avarage_deliveryCost']),2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></h5></div>
     <div class="clear"></div>
     <?php } ?>
    </div>
    
                    <?php } }?>
                    </td>
                    </tr>
                    
                    
     <?php /*?> <tr>
  <td>
 
     <div class="cartproductrow">
    <div class="cartdiscountfee"><h2>Convenience Fee:</h2></div>
    <div class="cartdiscountprice"> <h5 style="font-size:15px; margin-top:0px;"> <?php
	if($resdata['convenience_fee']!=''){
	 echo number_format(ucwords($resdata['convenience_fee']),2);
	 }
	 else
	 {
	 echo '0.00';
	 }
	  ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></h5></div>
     <div class="clear"></div>
    </div>
    
                  
                    </td>
                    </tr>    
                    <?php */?>
                   <?php /*?> <tr>
  <td>
 <table width="100%" border="0">
  <tr>
    <td><h2>Tip :</h2></td>
    <td align="right"><input type="text" name="tipamount" value="<?php echo $_SESSION['tipamountVale'];?>" placeholder='0.00' style="height:25px;
border: 1px solid #FF9900;
padding: 5px 5px 5px 15px;
border-radius: 7px; width:70px;" /> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> </td>
  </tr>
</table>

     
    
                  
                    </td>
                    </tr> <?php */?>              
   <tr>
    <td>
    <div class="cartproductrow">
    <div class="cartdiscountfee total"><h4 style="font-size:20px;"><?php echo $TableLanguage7['OrderText'];?> :</h4></div>
    <div class="cartdiscountprice total"><h5 style="font-size:20px;">  <?php echo number_format($grandTotal,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></h5>
    </div>
    <div class="clear"></div>
    </div>
     </td>
  </tr>
   <?php } ?>
   <tr>
    <td><?php $_SESSION['Total']=$grandTotal; ?>
                   <!-- <input type="hidden" id="Total" name="Total" value="<?php //echo $total;?>" />-->
<?php if($grandTotal>=$resdata['restaurant_default_min_order'] && $subTotal!=''){ ?>
<input type="submit" class="submit" value="Order" />
<?php } else { ?>
 <script>
var message = '<strong><?php echo $TableLanguage4['ResCartminMessageText'];?></strong>';

$('.minimumOrder').click(function(e) {
	e.preventDefault();
  $.modal.alert(message, function(val){
    if(val == true) 
	{
	
	}
});
});

</script>
<?php if($subTotal!=''){ ?>
<input type="button" class="submit minimumOrder" value="<?php echo ucwords($TableLanguage4['ResCartOrderButtonText']);?>" />
<?php } ?>
<?php /*?><input type="button" onClick="javascript:return confirm('Sorry ! Order is less than minimum order')"  class="submit" value="Minimum Order is $ <?php echo number_format(ucwords($resdata['restaurant_default_min_order']),2); ?>" /><?php */?>
<?php } ?></td>
<tr><td>&nbsp;</td></tr>
  </tr>
 <?php /*?> <tr><td><a style="margin-left:23%;" href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html">&laquo; <?php echo $TableLanguage4['ResBackTorestaurantText'];?></a></td></tr>
 <?php */?>
</table>


</div>
</form>
<link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="colorbox/popup.js"></script>
<script>
			$(document).ready(function(){
								$(".iframe5").colorbox({innerWidth:650, innerHeight:700, iframe:true, escKey:false, overlayClose:false,onLoad: function() {
    $('#cboxClose').remove();
}});

	$(".dealsiframe").colorbox({innerWidth:650, innerHeight:700, iframe:true, escKey:false, overlayClose:false,onLoad: function() {
    $('#cboxClose').remove();
}});

			});
			
			
		
		</script>
 <script language="javascript" type="application/javascript">

//alert("hiii");

   $(document).ready(function() {

	   

    $(".crtMin").click(function(){

		//alert("hiiM");

		var itIdm=$(this).siblings("input:hidden").val();

		$("#cartx").load("cartX.php?act=min&Id="+itIdm+"&hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1");

		});

    $(".crtPlus").click(function(){

		//alert("hiiP");

		var itIda=$(this).siblings("input:hidden").val();

		//alert(itIda);

		$("#cartx").load("cartX.php?act=adCt&Id="+itIda+"&hotel_id=<?php  echo $_GET['hotel_id'];?>&crntCrt=1");

		});

    $(".delCt").click(function(){

		//alert("hiiD");

		var itIdD=$(this).attr("alt");

		//alert(itIdD);

		$("#cartx").load("cartX.php?act=d&Id="+itIdD+"&hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1");

		});
		
	$(".delCtgroup").click(function(){

		var itIdD=$(this).attr("alt");

		$("#cartx").load("cartX.php?act=gpd&groupid="+itIdD+"&hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1");

		});
		$(".dealDeleteM").click(function(){

		var itIdD=$(this).attr("alt");

		$("#cartx").load("cartX.php?act=dealDelete&dealDeleteID="+itIdD+"&hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1");

		});
		
		$(".DealcrtMin").click(function(){
		var itIdm=$(this).siblings("input:hidden").val();
		var itIdDQual=$(this).attr("alt");
		$("#cartx").load("cartX.php?act=Dealmin&DealId="+itIdm+"&dealQty="+itIdDQual+"&hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1");
		});

    $(".DealcrtPlus").click(function(){
		var itIda=$(this).siblings("input:hidden").val();
		var itIdDQual=$(this).attr("alt");
		$("#cartx").load("cartX.php?act=DealadCt&DealId="+itIda+"&dealQty="+itIdDQual+"&hotel_id=<?php  echo $_GET['hotel_id'];?>&crntCrt=1");
		});
		
		$(".RestaurantService1").click(function(){

		var RestaurantService=$(".RestaurantService1").val();
var orderValue1=5;
		if(RestaurantService=="Home Delivery" || RestaurantService=="Delivery")

		{
		$("#displayDevelivery").show();
		
		}
		$(".RestaurantService1").attr('checked', true);
var url="act=delivery&type="+RestaurantService+"&OrdertTypeValue=<?php echo $DeliveryValue;?>&hotel_id=<?php echo $_GET['hotel_id'];?>";
		$("#cartx").load("cartX.php?"+url);		



		});

		

		$(".RestaurantService2").click(function(){

		var RestaurantService222=$(".RestaurantService2").val();
		if(RestaurantService222=="Pickup" || RestaurantService222=="Takeout")
		{
		$("#displayDevelivery").hide();

		}
		
		$(".RestaurantService2").attr('checked', true);
var url1="act=delivery&type="+RestaurantService222+"&OrdertTypeValue=0&pickupData=0&hotel_id=<?php echo $_GET['hotel_id'];?>";
	$("#cartx").load("cartX.php?"+url1);
	


		});

	

	$("#deliveryareaA").change(function(){

						var zip=$(this).val();

						//alert(zip);

						$("#cartx").load("cartX.php?snd=D&hotel_id=<?php echo $_GET['hotel_id'];?>&Id=0&Dar=N&zip="+zip);

		});	

	if($("#deliveryareaA").val()==0){

		$("#orderNw").attr("href","");

			$("#orderNw").text("Te rugam selecteaza zona de livrare");

		}

	/*if($("input:radio").attr("checked")==false){

			$("#orderNw").attr("href","");

			$("#orderNw").text("Please Select The Option YOUR ORDER FOR");

		}

	*/		

   });

	



</script>	