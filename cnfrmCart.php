<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'");
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

$prix=new User(); 
include('route/db.php'); 
$dbObj=new db;
if($_SESSION['justfoodsUserID']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}
if(isset($_GET['hotel_id']))
{
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$_GET['hotel_id']));
}
$TableLanguage=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate where id='1'"));
$TableLanguage1=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate1 where id='1'"));
$TableLanguage2=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate2 where id='1'"));
$TableLanguage3=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate3 where id='1'"));
$TableLanguage4=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate4 where id='1'"));
$TableLanguage5=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate5 where id='1'"));
$TableLanguage6=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate6 where id='1'"));
$TableLanguage7=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'"));

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

	

}

?>

  
<div class="address_rest">
 
 <div class="order_sumry">
  <div class="item_name"><?php echo $TableLanguage5['ResFormFielItemDetailText'];?></div>
 <div class="unit"><?php echo $TableLanguage5['ResFormFielItemPerUnitText'];?></div>
 <div class="unit_price"><?php echo $TableLanguage5['ResFormFielItemUnitText'];?></div>
 <div class="price"><?php echo $TableLanguage5['ResFormFielItemTotalPriceText'];?></div>
 </div>
 
 <ul class="sum_row">
 <?php 
	$subTotalOffer=0;
	$DealsQuery=mysql_query("select * from cartfoodDeals where sysIP='".$_SERVER['REMOTE_ADDR']."' and sessoionId='".session_id()."' and hotel_id='".$_GET['hotel_id']."' group by deal_id");
	if(mysql_num_rows($DealsQuery)>0)
	{
	 ?>
   
   <?php 
   $plk='';
   while($dealFood=mysql_fetch_assoc($DealsQuery)){
   $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
   $plk.=$dealFood['cartId'].',';
    ?>
     <li>
          <div class="item_name">
            <p>
             <?php echo $dealFood['deal_name'];?><br />
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
            <p> 
          </div>
          <div class="unit_price">X <?php echo $dealFood['quqntity'];?></div>
          <div class="price" ><?php echo $dealFood['deal_price']?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
          <div class="price" ><?php echo $dealFood['deal_price']*$dealFood['quqntity'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
         </div>
          
          <div class="clear"></div>
        </li>
 
  <?php } ?>
   <?php } ?>

  
  <!--Cart Offer Code End Here-->
<?php 

//echo "sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'";
$total='';
$recrt=$dbObj->getData(array("cartId","sysIP","sessoionId","itemId","price","MenuSize","quqntity","doughValue","baseValue","hotel_id","cheesValue","extraItemID","extraItemID2"),"cartNew","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$_GET['hotel_id']."'");

//print_r($recrt);

if($recrt[0]>0){

	$subTotal=0;

foreach($recrt as $val){

		if(is_array($val)){

				  $itmDt=$dbObj->getData(array("*"),"tbl_restaurantMainMenuItem","id='".$val['itemId']."'");



?>
<li>
<div class="item_name">
<h2 style="font-weight:normal; font-size:17px;"><?php echo $itmDt[1]['RestaurantPizzaItemName'];?> <?php 
$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$val['MenuSize']."'"));
	if($MenuSizeData['SizeMenuName']!=''){
	echo '<br />('.$MenuSizeData['SizeMenuName'].')';
	}

	?> </h2>
<h4 style="font-weight:normal; font-size:12px;margin-top:-13px;">
<br />
    <span class="desc-small" style="font-size:12px; ">
    <?php
	$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$val['doughValue']."'"));
	if($MenuDoughData['menuDoughName']!=''){
	echo '<br>'.$MenuDoughData['menuDoughName'];
	}
	 ?>
      <?php
	$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$val['baseValue']."'"));
	if($MenuBaseData['menuBaseName']!=''){
	echo '<br>'.$MenuBaseData['menuBaseName'];
	}
	 ?>
      <?php
	$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$val['cheesValue']."'"));
	if($MenuCheesData['menuCheesName']!=''){
	echo '<br>'.$MenuCheesData['menuCheesName'];
	}
	 ?>
       <?php
	 $plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
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
	}
    
	/*$MenuExtraData1=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$val['extraItemID2']."'"));
	if($MenuExtraData1['menuExtraName']!=''){
	echo '<br>'.$MenuExtraData1['menuExtraName'].'(X2)';*/
	//}?>
     </span></h4>
</div>
 <div class="unit"><?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php echo number_format($itmDt[1]['RestaurantPizzaItemPrice'],2);?>
 <?php if($MenuSizeData['SizeMenuPrice']!=''){
	echo '<br /> '.$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuSizeData['SizeMenuPrice'],2).'';
	}
	?>
 <?php 
 if($MenuDoughData['menuDoughPrice']!=''){
	echo '<br> '.$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuDoughData['menuDoughPrice'],2);
	}
 ?>
 
  <?php 
 if($MenuBaseData['menuBasePrice']!=''){
	echo '<br>'.$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuBaseData['menuBasePrice'],2);
	}
 ?>
 
  <?php 
 if($MenuCheesData['menuCheesPrice']!=''){
	echo '<br> '.$AdminDataLoginVal['website_CurrencySymbole'].number_format($MenuCheesData['menuCheesPrice'],2);
	}
 ?>
 
  <?php
	 $plk=explode(',',$val['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br /> '.$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice'];
	}
	}
	?>
        <?php
	 $plk=explode(',',$val['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice'];
	}
	}
 
  
 //if($MenuExtraData1['menuExtraPrice']!=''){
	//echo '<br>$ '.number_format($MenuExtraData1['menuExtraPrice'],2);
	//}
 ?>
 
 
 </div>
 <div class="unit_price">X <?php echo $val['quqntity'];?></div>
 <div class="price"><?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php 
//echo $val['price']*$val['quqntity']+$extPrc;

						$ItemTota=$val['price']*$val['quqntity'];
						$ItemTota=$ItemTota+$extPrc;
						echo number_format($ItemTota,2);
						//$subTotal+=($val['price']*$val['quqntity']+$extPrc);

						$subTotal+=($ItemTota);
?></div>
 <div class="clear"></div>
</li> 
<?php 

		}

	}

}
$subTotal=$subTotalOffer+$subTotal;
?>   

 </ul>
 <?php 
						   $RestaurantOfferQuery=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where status='0' and restaurant_id='".$_GET['hotel_id']."' order by created_date desc"));
						  ?>
                          
    <?php
###### Cupon Code #########
//print_r($_GET);
if(isset($_GET['copun'])){
$copun=$_GET['copun'];
$resCupn=mysql_query("SELECT * FROM `tbl_restaurantCoupon` where RestauranCouponNo='$copun' AND RestauranCouponId='".$_GET['hotel_id']."' and status='0'") or die(mysql_error());
//echo "SELECT * FROM `tbl_restaurantCoupon` where RestauranCouponNo='$copun' AND RestauranCouponId='".$_GET['hotel_id']."' and status='0'";
	if(mysql_num_rows($resCupn)>0){
		$cupDt=mysql_fetch_array($resCupn);
		$cSignal='Y';
		$cupPrice=$cupDt['RestauranCouponPrice'];
		mysql_query("update tbl_restaurantCoupon set status='1' where RestauranCouponNo='".$_SESSION['disCupn']."'");
		$cError=0;
		$_SESSION['disCupn']=$copun;
		$_SESSION['disCupnPrice']=$cupPrice;
		$_SESSION['disCupnType']=$cupDt['RestauranCouponType'];
	}else{
		unset($_SESSION['disCupn']);
		unset($_SESSION['disCupnPrice']);
		unset($_SESSION['disCupnType']);
		$cError=1;
	}
}



###### Cupon Code #########
//unset($_SESSION['loyptamount']);
?>

<?php ###### Loyalty points #########
if(isset($_GET['loyPntsValue']))
{
if($_GET['loyPntsValue']>$resdata['loyality_limit']){?>
<script type="text/javascript">
alert(" You are only allowed to use <?php echo $resdata['loyality_limit'];?> Points");
</script>
<?php } else { 

if($_GET['loyPntsValue']<$subTotal)
{
$_SESSION['loyptamount']=$_GET['loyPntsValue'];
mysql_query("update tbl_user set usedPoint='".$_GET['loyPntsValue']."' where id='".$_SESSION['justfoodsUserID']."'");
}
else
{
unset($_SESSION['loyptamount']);
?>
<script type="text/javascript">
alert("You are only allowed to use <?php echo $resdata['loyality_limit'];?> Points");
</script>
<?php }
} 
}
?>


<?php if($_SESSION['disCupnPrice']==''){ ?>
<div class="item_name"><font><font><?php echo ucwords($TableLanguage5['ResFormFielItemCouponCodeText']);?>
  </font></font><strong style="color:#DD0000; font-size:14px;"><font><font><?php if($cError){ echo " <strong style='color:#DD0000; font-size:14px;'>&nbsp;&nbsp; ".$TableLanguage5['ResFormFielCouponInvalidText']." $copun</strong>";}?></font></font></strong></div>
 <div class="unit" style="width:22%"><input name="cupon" type="text" id="cupon" class="coupon_txt"  value=""></div>
 <div class="unit_price" style="width:22%"><font><font>
  <input name="aplica" style="width: 140px;padding: 7px 10%;" type="button" class="apply" id="aplica" value="<?php echo ucwords($TableLanguage5['ResFormFielApplyButtonText']);?>"></font></font></div>

                <?php } ?>  
                
  <?php if($resdata['loyality_setting']!=0 && $UserAddressData['assign_loyalty']==0)
  { 
  
$OrdQur="select * from resto_order where userId='".$_SESSION['justfoodsUserID']."'  ORDER BY order_identifyno DESC";
$QUrOrdPer=mysql_query($OrdQur);
$TotalOrder=0;
$earnPoint=0;
$UsePoint=0;
while($OrderData=mysql_fetch_assoc($QUrOrdPer))
{
$Total=$OrderData['ordPrice']+$OrderData['deliveryChrg'];
$TotalOrder +=$Total;
}
$GRanTotalLoy=$TotalOrder+$UserAddressData['loyalty_type'];
if($GRanTotalLoy!=0)
{
if($GRanTotalLoy<$AdminDataLoginVal['loyalityPoint'])
{
$earnPoint=0;
}
else
{
$earnPoint=floor($GRanTotalLoy/$AdminDataLoginVal['loyalityPoint']);
}
}
$TotalUsePoint=$earnPoint-$UserAddressData['usedPoint'];
  ?>
  

<?php if($_SESSION['loyptamount']==''){ ?>
<div class="item_name"><font><font>Pay By loyalty <br />(You have <?php 
if($TotalUsePoint>0){
echo $TotalUsePoint;
}
else
{
echo '0';
}
?> loyalty Points )</font></font></div>
 <div class="unit" style="width:22%"><input name="loyPntsValue" required type="text" id="loyPntsValue" class="coupon_txt"  value=""> </div>
 <div class="unit_price" style="width:22%"><?php if($TotalUsePoint>1 && $TotalUsePoint<=$subTotal){ ?>
<input name="loyalityPointSubmit" type="button" class="apply" style="width: 140px;padding: 7px 10%;" id="loyalityPointSubmit" value="Pay Now">
<?php } else { ?>
<input name="loyalityPointSubmit" type="button" class="apply" style="width: 140px;padding: 7px 10%;" id="loyalitynot" value="Pay Now" onClick="return alert('You have minus loyalty Balance !');">
<?php } ?></div>





                <?php } ?>
                <?php } ?>                                      
 <table width="40%" style="float:right;">

 <tr>
 <td width="50%"><?php echo ucwords($TableLanguage5['ResFormFielSubTotalText']);?></td>
 <td width="50%">:&nbsp;&nbsp;&nbsp; <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php echo number_format($subTotal,2); ?></td>
 </tr>

<?php 
 $offerDisc='';
 $discountValue='';//$RestaurantOfferQuery['RestaurantOfferStartPrice']
 //$plo=mysql_query("select * from tbl_restaurantOffer where status='0' and restaurant_id='".$_GET['hotel_id']."'");
 
$plttop1=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='1' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop2=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='2' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop3=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='3' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop4=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='4' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));

$plttop5=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where OrderDiscountshow='5' and status='0' and restaurant_id='".$_GET['hotel_id']."' "));
include('TimeTable2.php');

$offerDisc='';
						   //while($RestaurantOfferQuery=mysql_fetch_assoc($plo)){
						   
							
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
						   
						   if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout')
					 {
					 $deliverVale=0;
					 }  
					 else
					 {
					 $deliverVale=$resdata['restaurant_avarage_deliveryCost'];
					 }
						  
						  ?>
                          
  <?php if($discountValue!=''){ ?>                  
 <tr>
 <td width="50%"> <?php echo ucwords($TableLanguage4['ResOfferDiscountText']);?> (<?php echo $offerDisc1;?> <?php echo $offerDisc2;?><?php echo $offerDisc3;?><?php echo $offerDisc4;?>)</td>
 <td width="50%">: -  <strong> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php 
 if($discountValue!=''){
 echo number_format($discountValue,2);
 }
 else
 {
 echo '0.00';
 }
  ?></strong> </td>
 </tr>
 <?php } ?>
  <?php if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout')
  { 
  }
  else
  {
  ?>
  <?php if($resdata['restaurant_avarage_deliveryCost']!='')
  {
					   $deliveryCost=$resdata['restaurant_avarage_deliveryCost'];
					    ?>
                         <tr>
 <td width="50%"><?php echo ucwords($TableLanguage4['ResMinDeliveryFee']);?></td>
 <td width="50%">:&nbsp;&nbsp;&nbsp <?php echo "+&nbsp;".$AdminDataLoginVal['website_CurrencySymbole'].number_format(ucwords($resdata['restaurant_avarage_deliveryCost']),2); ?> 
 </td>
 </tr>
 <?php }  ?>
 <?php } ?>

 
<?php /*?> <tr>
  <td width="50%">Tip</td>
  <td width="50%">:&nbsp;&nbsp;&nbsp  <?php
	if($_GET['tipamountAmount']!=''){
	 echo "+&nbsp;".$AdminDataLoginVal['website_CurrencySymbole'].number_format(ucwords($_GET['tipamountAmount']),2);
	 }
	 else
	 {
	 echo "+&nbsp;".$AdminDataLoginVal['website_CurrencySymbole'].'0.00';
	 }
	  ?> </td>
  </tr>  <?php */?>
  <?php /*?><tr>
  <td width="50%">Convenience Fee</td>
  <td width="50%">:&nbsp;&nbsp;&nbsp  <?php
	if($resdata['convenience_fee']!=''){
	 echo "+&nbsp;".$AdminDataLoginVal['website_CurrencySymbole'].number_format(ucwords($resdata['convenience_fee']),2);
	 }
	 else
	 {
	 echo "+&nbsp;".$AdminDataLoginVal['website_CurrencySymbole'].'0.00';
	 }
	  ?> </td>
  
                    </tr>  <?php */?>
                     
   <?php
                                         	$_SESSION['subTotalT']=$subTotal;
											if($_SESSION['disCupnPrice']!=''){
	                                        if($_SESSION['disCupnPrice']<=$subTotal)
                                             {
											  if($_SESSION['disCupnType']=='p'){ 
	                                          $total=$subTotal-$_SESSION['disCupnPrice']+$deliverVale+$resdata['convenience_fee']+$_GET['tipamountAmount']-$_SESSION['loyptamount'];
											  }
											  
											  if($_SESSION['disCupnType']=='pr'){ 
	                                        $Coupontotal=$subTotal*$_SESSION['disCupnPrice']/100;
						                     $total=$subTotal-$Coupontotal+$deliverVale+$resdata['convenience_fee']+$_GET['tipamountAmount']-$_SESSION['loyptamount']; 
											
											  }
											  
	                                          }
											 
											  }
											   else
											  {
											  $total=$subTotal+$deliverVale+$resdata['convenience_fee']+$_GET['tipamountAmount']-$_SESSION['loyptamount'];
											  }
											 $total= $total-$discountValue;

											?>
                                           
  
   <?php if($_SESSION['disCupnPrice']!=''){ ?>
 <tr><td width="50%"><span><?php echo $TableLanguage5['ResFormFielItemCouponCodeText'];?> (<?php echo $_SESSION['disCupn'];?>) :</span></td>
 <td width="50%"><?php echo "&nbsp;:&nbsp;&nbsp; - &nbsp;".number_format($_SESSION['disCupnPrice'],2);?> 
 <?php  if($_SESSION['disCupnType']=='pr'){  ?>
%
 <?php } else { ?>
 <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php } ?>
 </td></tr>
 <?php } ?>
 
  <?php if($_SESSION['loyptamount']!=''){ ?>
 <tr><td width="50%"><span>Loyalty Amount  :</span></td>
 <td width="50%"><?php echo "&nbsp;:&nbsp;&nbsp; - &nbsp;".number_format( $_SESSION['loyptamount'],2);?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
 </td></tr>
 <?php } ?>
  <tr>
 <td width="50%"><strong style="color:#D80E0F; font-size:20px;"><?php echo $TableLanguage7['OrderText'];?></strong></td>
 <td width="50%"><strong style="color:#D80E0F; font-size:20px;">:&nbsp;&nbsp;&nbsp;<?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php echo number_format($total,2); ?></strong></td>
 </tr>
 </table>
   <?php
	$groupOrderQuery=mysql_query("select *  from tbl_restaurantGroupOrder where ip='".$_SERVER['REMOTE_ADDR']."' AND sessoionId_groupOrder='".session_id()."'  AND restaurant_id='".$_GET['hotel_id']."'");
	$checkCartGroupOrderNumber=mysql_num_rows($groupOrderQuery);
if($checkCartGroupOrderNumber>0){
	 ?>
    <table width="100%" border="0">
    <tr><td colspan="4"><strong>Group Order List (<?php echo $checkCartGroupOrderNumber;?> user)</strong></td></tr>
  <?php 
  $count1=1;
  while($GroupUser=mysql_fetch_assoc($groupOrderQuery)){ 
  
  ?>
  <tr>
    <td><?php echo $count1;?>. <?php echo $GroupUser['RestaurantGroupOrderName'];?> (<?php echo $GroupUser['RestaurantGroupOrderEmail'];?>) group order</td> </tr>
  <?php 
  $count1++;
  } ?>
  </table>
  <?php } ?>
 <input  type="hidden" name="discountValue" value="<?php echo $discountValue;?>"  />
 <input  type="hidden" name="discountDiscription" value="<?php echo $offerDisc1.$offerDisc2.$offerDisc3.$offerDisc4;?>"  />
                    <input type="hidden" id="Total" name="Total" value="<?php echo $total;?>" />
                    <input type="hidden" id="loyptamount" name="loyptamount" value="<?php echo $_SESSION['loyptamount'];?>" />
                       <input type="hidden" id="CouponCodePrice" name="CouponCodePrice" value="<?php echo $_SESSION['disCupnPrice'];?>" />
                        <input type="hidden" id="couponCodeType" name="couponCodeType" value="<?php echo $_SESSION['disCupnType'];?>" />
                         <input type="hidden" id="discountOfferType" name="discountOfferType" value="<?php echo $resdata['RestaurantoffrType'];?>" />
                       <input type="hidden" id="CouponCode" name="CouponCode" value="<?php echo $_SESSION['disCupn'];?>" />
                         <input type="hidden" id="restaurant_avarage_deliveryCost" name="restaurant_avarage_deliveryCost" value="<?php echo $resdata['restaurant_avarage_deliveryCost'];?>" />
                         <input type="hidden" id="RestaurantOfferPrice" name="RestaurantOfferPrice" value="<?php echo $resdata['RestaurantOfferPrice'];?>" />
                          <input type="hidden" id="RestaurantoffrType" name="RestaurantoffrType" value="<?php echo $resdata['RestaurantoffrType'];?>" />
                          
                          <input type="hidden" id="hotel_id" name="hotel_id" value="<?php echo $_GET['hotel_id'];?>" />
 <div class="clear"></div>
<br />
      <h3>Leave a note for the restaurant</h3>
      <p>If you've got any allergies or dietary requirements - put them here. You can also include special offers or delivery instructions. </p>
      <textarea cols="41" rows="8" style="width:950px;" id="SpecialInstruction" name="SpecialInstruction"></textarea>
 </div>
 </div>
    <script type="text/javascript" language="javascript">
$(document).ready(function() {
	//alert("hiii");
	//$("input:radio").click(function(){
		//alert($(this).attr("checked"));
				//if($(this).val()=='Pickup'){
						//alert("cnfrmCart.php?snd=P&hotel_id=<?php //echo $_GET['hotel_id'];?>&Id=0");
						//$("#cartout").load("cnfrmCart.php?snd=P&hotel_id=<?php //echo $_GET['hotel_id'];?>&Id=0");
						//$("#delivery").css("display","none");
					
					//}else{
						//alert("Delef");
						//	$("#cartout").load("cnfrmCart.php?snd=D&hotel_id=<?php //echo $_GET['hotel_id'];?>&Id=0&Dar=N");
							//$("#delivery").css("display","block");
						//}	
		//});	
	 $(".delCt").click(function(){
		//alert("hiiD");
		var itIdD=$(this).attr("alt");
		//alert(itIdD);
		$("#cartout").load("cnfrmCart.php?act=d&Id="+itIdD+"&hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1");
		});	
	 $("#aplica").click(function(){
			var cDtl=$("#cupon").val();
			
		$("#cartout").load("cnfrmCart.php?hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1&copun="+cDtl+"&adressId=<?php echo $_GET['adressId'];?>");
		//location.reload();
	 	});
	$("#loyalityPointSubmit").click(function(){
		var loyPntsValue = $("#loyPntsValue").val();
		//alert(loyPntsValue);
		$("#cartout").load("cnfrmCart.php?hotel_id=<?php echo $_GET['hotel_id'];?>&crntCrt=1&loyPntsValue="+loyPntsValue+"&adressId=<?php echo $_GET['adressId'];?>");
	});		
});	
	</script>	