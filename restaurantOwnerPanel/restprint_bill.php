<?php 
include('route/config1.php');
date_default_timezone_set('US/Eastern');
mysql_query ("set character_set_results='utf8'"); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
$dataorder=mysql_fetch_assoc($dbb->showtabledata('resto_order','order_identifyno',$_GET['orderid']));
$data=mysql_fetch_assoc($dbb->showtabledata('tbl_restaurantAdd','id',$dataorder['restoid']));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
				                <link type="text/css" rel="stylesheet" href="css/print-bill.css"  />
<style type="text/css">

@media print {

input#btnPrint {

display: none;

}

}

</style>


<div id="main">
	<div id="container">

<?php 
						$uNmd=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$dataorder['userId']."'"));
						?>
	<table  align="center">
		<tr>
			<td align="center">
				<h2><?php echo ucwords($data['restaurant_name']);?> </h2>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;width:55%;">
				<h3><?php echo ucwords($data['restaurant_address']);?> <br/>
<?php echo ucwords($data['restaurantCity']);?>,<?php echo ucwords($data['restaurant_phone']);?></h3>
			</td>
		</tr>
		
	</table>

<table width="100%" class="tbborder">
  <tr>
    <td colspan="5" align="center" class="bill-header">
    <span >
    <img src="images/guest-bill.png" width="350px;" />
    </span>
    
    </td>
  </tr>
  
    <tr class="bill-header">

    <td><span class="tdleft">Bill No:</span></td>

    <td colspan="3"><span class="dataright"><?php echo $_GET['orderid']; ?></span></td>

  </tr>

  		

	

  <tr class="bill-header">

    <td><span class="tdleft">Customer Name:</span>	</td>

    <td colspan="3"><span class="dataright1"><?php  echo $dataorder['name_customer'];?> <?php
	 ?></span></td>

  </tr>
  
  <tr class="bill-header">

    <td><span class="tdleft">Delivery Address:</span>	</td>

    <td colspan="3"><span class="dataright1">
    <?php
	$OrderDeliveryArea=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$dataorder['delivey_address']."' and loginID='".$dataorder['userId']."'"));
	
	if($OrderDeliveryArea['GustUserAddress']!=''){
	echo $OrderDeliveryArea['GustUserAddress'].',';
	}
	
	if($OrderDeliveryArea['GustUserCityName']!=''){
	echo $OrderDeliveryArea['GustUserCityName'].',';
	}
	if($OrderDeliveryArea['GustUserCountryName']!=''){
	echo $OrderDeliveryArea['GustUserCountryName'];
	}
	echo '-'.$OrderDeliveryArea['GustUserPincode'];
	 ?>
    </span></td>

  </tr>


 <tr class="bill-header">
<td><span class="tdleft">Mobile No:</span></td>
<td colspan="3"><span class="dataright"><?php echo $OrderDeliveryArea['GustUserMobileNo']; ?></span></td>
 </tr>
 
  <tr class="bill-header">
<td><span class="tdleft">IP Address:</span></td>
<td colspan="3"><span class="dataright"><?php echo $dataorder['ip']; ?></span></td>
 </tr>
 

  

  <tr class="bill-header">

    <td><span class="tdleft">Order Date:</span></td>

    <td colspan="3"><span class="dataright"><?php echo $dataorder['user_date']; ?></span></td>


  </tr>
  
  <tr class="bill-header">

    <td><span class="tdleft">Order Type:</span></td>

    <td colspan="3"><span class="dataright"><?php echo $dataorder['type']; ?></span></td>


  </tr>

  

  <tr class="bill-header">

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

   

  </tr>



  <tr>

    <td class="tbheader" style="background:#F00000;"><center>DESCRIPTION</center></td>
    <td class="tbheader" style="background:#F00000;"><center>QTY</center>	</td>

    <td class="tbheader" style="background:#F00000;"><center>PRICE</center></td>

    <td class="tbheader" style="background:#F00000;"><center>SUB TOTAL</center></td>

  </tr>
<?php
$DealsQuery=mysql_query("select * from cartfoodDealsInsert where orderId='".$_GET['orderid']."' group by deal_id");
	if(mysql_num_rows($DealsQuery)>0)
	{
	while($dealFood=mysql_fetch_assoc($DealsQuery)){
   $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
 ?>
 <tr>
 <td class="tbheader1"><?php echo $dealFood['deal_name'];?>
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
 </td>
    <td class="tbheader1" align="right"><?php echo $dealFood['quqntity'];?></td>
    <td class="tbheader1" align="right"><?php echo $dealFood['deal_price']?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
    <td class="tbheader1" align="right"><?php echo $dealFood['deal_price']*$dealFood['quqntity'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
    </tr>
    <?php } }?>
   <?php

									  $g=mysql_query("SELECT * FROM  `resto_order_details` where orderId='".$_GET['orderid']."'");
                                      while($orda=mysql_fetch_assoc($g))
										{
										$ut=$orda['menuprice']*$orda['quantity'];
 									  $mg=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restaurantMainMenuItem` where id='".$orda['menuId']."'"));
									  
									   ?>

	  <tr>

    <td class="tbheader1">
    <?php echo $mg['RestaurantPizzaItemName'];?>
    <?php
	$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$orda['size']."'"));
	if($MenuSizeData['SizeMenuName']!=''){
	echo '<br />('.$MenuSizeData['SizeMenuName'].')';
	}
	 ?>
    <?php
	$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$orda['doughValue']."'"));
	if($MenuDoughData['menuDoughName']!=''){
	echo '<br>'.$MenuDoughData['menuDoughName'];
	}
	 ?>
      <?php
	$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$orda['baseValue']."'"));
	if($MenuBaseData['menuBaseName']!=''){
	echo '<br>'.$MenuBaseData['menuBaseName'];
	}
	 ?>
      <?php
	$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$orda['cheesValue']."'"));
	if($MenuCheesData['menuCheesName']!=''){
	echo '<br>'.$MenuCheesData['menuCheesName'];
	}
	 ?>
   
      <?php
	 $plk=explode(',',$orda['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	}
	?>
        <?php
	 $plk=explode(',',$orda['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	}?>
    
     
    </td>

   

    <td class="tbheader1" align="right"><?php echo $orda['quantity']; ?>  

    </td>

	

    <td class="tbheader1" align="right"> <?php echo number_format($mg['RestaurantPizzaItemPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php if($MenuSizeData['SizeMenuPrice']!=''){
	echo '<br />'.$MenuSizeData['SizeMenuPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	?>
 <?php 
 if($MenuDoughData['menuDoughPrice']!=''){
	echo '<br>'.number_format($MenuDoughData['menuDoughPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?> 
  <?php 
 if($MenuBaseData['menuBasePrice']!=''){
	echo '<br> '.number_format($MenuBaseData['menuBasePrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?>
 
  <?php 
 if($MenuCheesData['menuCheesPrice']!=''){
	echo '<br>'.number_format($MenuCheesData['menuCheesPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?>
 
  <?php
	 $plk=explode(',',$orda['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$MenuExtraData['menuExtraPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	}
	?>
        <?php
	 $plk=explode(',',$orda['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$MenuExtraData['menuExtraPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	}
 
  
 //if($MenuExtraData1['menuExtraPrice']!=''){
	//echo '<br>&euro; '.number_format($MenuExtraData1['menuExtraPrice'],2);
	//}
 ?>

    </td>

	

    <td class="tbheader1" align="right"><?php 

					//echo $val['price']*$val['quqntity']+$extPrc;

						$ItemTota=$orda['menuprice']*$orda['quantity'];
						$ItemTota=$ItemTota+$extPrc;
						echo number_format($ItemTota,2);
						//$subTotal+=($val['price']*$val['quqntity']+$extPrc);

						$subTotal+=($ItemTota);
?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>

    </td>

  </tr>

   <?php } ?>

      <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">SubTotal:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;">  <?php echo number_format($subTotal,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> </span></td>

  </tr>                                 

  <tr class="bill-header">



    <td colspan="5">&nbsp;</td>

  </tr>

  

  <?php 
 if($dataorder['type']=='Pickup' || $dataorder['type']=='Takeout'){
  if($dataorder['deliveryChrg']!=''){?>

   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Delivery Charge:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['deliveryChrg']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

  <?php } ?>

  <?php } ?>
  
   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Tip:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['ability_to_pay_tips']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>
  
  <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Convenience Fee:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['convenience_fee']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

  <?php if($dataorder['disCupnPrice']!=''){?>

   <tr class="bill-header">

    <td colspan="3"><span class="totalpc">Coupon Discount Charge <?php echo $dataorder['disCupn']; ?>:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> -  <?php 
	if($dataorder['disCupnPrice']!=''){
	echo number_format($dataorder['disCupnPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?>
     <?php  if($dataorder['couponCodeType']=='pr'){  ?>
%
 <?php } else { ?>
  <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php } ?>
     </span></td>

  </tr>

  <?php } ?>
  
  <?php if($dataorder['discountValue']!=''){?>

   <tr class="bill-header">

    <td colspan="2"><span class="totalpc">Discount Offer :</span></td>

  <td align="right" colspan="2"><span class="totalpc"   style="color:#FF0000; font-size:14px;"><?php 
 
  echo $dataorder['discountDiscription']; 
  
  ?> -  <?php 
   if($dataorder['discountValue']!=''){
  echo number_format($dataorder['discountValue'],2);
  }
  else
  {
  echo '0.00';
  }
   ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
    </span></td>

  </tr>

  <?php } ?>
  
  <?php if($dataorder['loyptamount']!=''){?>

   <tr class="bill-header">

    <td colspan="2"><span class="totalpc">Pay by Loyalty :</span></td>

  <td align="right" colspan="2"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> - <?php 
   if($dataorder['loyptamount']!=''){
  echo number_format($dataorder['loyptamount'],2);
  }
  else
  {
  echo '0.00';
  }
   ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
    </span></td>

  </tr>

  <?php } ?>

  <tr class="bill-header">
	

    <td colspan="3"><span class="totalpc">Total Amount:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> <?php 
	if($dataorder['deliveryChrg']!='')
	{
	 if($dataorder['type']!='Pickup'){
	$TotalPrice=$dataorder['ordPrice'];
	}
	else
	{
	$TotalPrice=$dataorder['ordPrice'];
	}
	}
	echo number_format($TotalPrice,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

 <tr><td colspan="4">&nbsp;</td></tr>
    <tr><td>Special Instruction</td><td colspan="3"><?php echo $dataorder['userComment'];?></td></tr>
  <tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td class="dataright2"><b>Sign:</b></td><td class="dataright2">___________________</td>
	</tr>
    <tr>
		<td><div align="left"><?php echo $dataorder['odr_date']; ?></div></td><td></td>
	</tr>
    </table>
    
    <table width="100%">
    <tr>
		<td></td>
        
        <td align="right"><div align="right">
		<input type="button" value="Print" id="btnPrint" onClick="window.print()" >
	</div>
    </td>
	</tr>
  </table>
</div>
</div>
</body>
</html>
