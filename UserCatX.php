<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'");
$prix=new User(); 
include('route/db.php'); 
$dbObj=new db;
if(isset($_GET['hotel_id']))
{
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$_GET['hotel_id']));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
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

<form  method="get" onsubmit="return DeliveryOrderemailvalidation();">
  <input type="hidden" name="l" value="1" />
  <input type="hidden" name="restaurants" value="<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html<?php echo $p;?>" />
  <div class="login_right">
    <div class="chkcont">
      <h3><?php echo $TableLanguage4['ResYourOrderText'];?></h3>
      <?php
	$groupOrderQuery=mysql_query("select *  from tbl_restaurantGroupOrder where ip='".$_SERVER['REMOTE_ADDR']."' AND sessoionId_groupOrder='".session_id()."'  AND restaurant_id='".$_GET['hotel_id']."'");
$checkCartGroupOrderNumber=mysql_num_rows($groupOrderQuery);
if($checkCartGroupOrderNumber>0){
	 ?>
      <table width="100%" border="0">
        <tr>
          <td colspan="4"><strong>Group Order List (<?php echo $checkCartGroupOrderNumber;?> user)</strong></td>
        </tr>
        <?php 
  $count=1;
  while($GroupUser=mysql_fetch_assoc($groupOrderQuery)){ 
  
  ?>
        <tr>
          <td><?php echo $count;?>. <?php echo $GroupUser['RestaurantGroupOrderName'];?> (<?php echo $GroupUser['RestaurantGroupOrderEmail'];?>) group order</td>
        </tr>
        <?php 
  $count++;
  } 
  ?>
      </table>
      <?php } ?>
      <div class="order_sumry">
        <div class="item_name">Item detail</div>
        <div class="unit_price">Units</div>
        <div class="price1" style="border:none;">Total Price</div>
        <!--<div class="unit"></div>-->
      </div>
      
      
      <ul class="sum_row">
       <!--Cart Offer Code Start Here  -->
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
          <div class="price1" style="width:25%;"><?php echo $dealFood['deal_price']*$dealFood['quqntity'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
         </div>
          <div class="unit" style="width:5%;">
          </div>
          <div class="clear"></div>
        </li>
 
  <?php } ?>
   <?php } ?>

  
  <!--Cart Offer Code End Here-->
      
        <?php 

//echo "sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."'";
$total='';
$recrt=$dbObj->getData(array("cartId","sysIP","sessoionId","itemId","price","MenuSize","quqntity","doughValue","baseValue","hotel_id","cheesValue","extraItemID","ExtraitemGroupID","extraItemID2"),"cartNew","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$_GET['hotel_id']."'");

//print_r($recrt);

if($recrt[0]>0){

	$subTotal=0;

foreach($recrt as $val){

		if(is_array($val)){

				  $itmDt=$dbObj->getData(array("*"),"tbl_restaurantMainMenuItem","id='".$val['itemId']."'");



?>
        <li>
          <div class="item_name">
            <p><?php echo $itmDt[1]['RestaurantPizzaItemName'];?>
              <?php 
$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$val['MenuSize']."'"));
	if($MenuSizeData['SizeMenuName']!=''){
	echo '('.$MenuSizeData['SizeMenuName'].')';
	}

	?>
    <br />
              <span class="desc-small" style="font-size:12px;">
              <?php
	$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$val['doughValue']."'"));
	if($MenuDoughData['menuDoughName']!=''){
	echo $MenuDoughData['menuDoughName'].'<br>';
	}
	 ?>
              <?php
	$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$val['baseValue']."'"));
	if($MenuBaseData['menuBaseName']!=''){
	echo $MenuBaseData['menuBaseName'].'<br>';
	}
	 ?>
              <?php
	$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$val['cheesValue']."'"));
	if($MenuCheesData['menuCheesName']!=''){
	echo $MenuCheesData['menuCheesName'].'<br>';
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
	'('.$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice'].')'.',';
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
	'('.$AdminDataLoginVal['website_CurrencySymbole'].$MenuExtraData['menuExtraPrice'].')'.',';
	}
	}
	?>
              </span>
            <p> 
          </div>
          <div class="unit_price">X <?php echo $val['quqntity'];?></div>
          <div class="price1" style="width:25%;">
            <?php 
						$ItemTota=$val['price']*$val['quqntity'];
						$ItemTota=$ItemTota+$extPrc;
						echo number_format($ItemTota,2);
						$subTotal+=($ItemTota);
?>
            <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> </div>
          <div class="unit" style="width:5%;">
            <?php /*?><img alt="548,3.50" style="cursor:pointer; margin-top:2px;" class="remove delCt" title="Delete Menu Item" src="images/list-remove.png"><?php */?>
          </div>
          <div class="clear"></div>
        </li>
        <?php 

		}

	}

}
$subTotal=$subTotalOffer+$subTotal;
?>
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
						   
						   
							
						 /*  if($subTotal<$plttop1['RestaurantOfferStartPrice'])
						   {
						   $offerDisc=$plttop1['RestaurantOfferDescription'];
						   if($RestaurantOfferQuery['RestaurantoffrType']=='p')
						   {
						   $discountValue=$RestaurantOfferQuery['RestaurantOfferPrice'];
						   }
						   if($RestaurantOfferQuery['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$RestaurantOfferQuery['RestaurantOfferPrice']/100;
						   }
						   }
						   if($subTotal>$plttop1['RestaurantOfferStartPrice'] && $subTotal<$plttop2['RestaurantOfferStartPrice'])
						   {
						    $offerDisc=$plttop2['RestaurantOfferDescription'];
						   if($RestaurantOfferQuery['RestaurantoffrType']=='p')
						   {
						   $discountValue=$RestaurantOfferQuery['RestaurantOfferPrice'];
						   }
						   if($RestaurantOfferQuery['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$RestaurantOfferQuery['RestaurantOfferPrice']/100;
						   }
						   }
						   
						   if($subTotal>$plttop2['RestaurantOfferStartPrice'])
						   {
						    $offerDisc=$plttop3['RestaurantOfferDescription'];
						   if($RestaurantOfferQuery['RestaurantoffrType']=='p')
						   {
						   $discountValue=$RestaurantOfferQuery['RestaurantOfferPrice'];
						   }
						   if($RestaurantOfferQuery['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$RestaurantOfferQuery['RestaurantOfferPrice']/100;
						   }
						   }
						   
						     if($Discountclose==0 && $subTotal>$plttop3['RestaurantOfferStartPrice'])
						   {
						    $offerDisc=$plttop5['RestaurantOfferDescription'];
						   if($RestaurantOfferQuery['RestaurantoffrType']=='p')
						   {
						   $discountValue=$RestaurantOfferQuery['RestaurantOfferPrice'];
						   }
						   if($RestaurantOfferQuery['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$RestaurantOfferQuery['RestaurantOfferPrice']/100;
						   }
						   }
						   
						   if($plttop4['RestaurantOfferStartPrice']!='')
						   {
						    $offerDisc=$plttop4['RestaurantOfferDescription'];
						   if($RestaurantOfferQuery['RestaurantoffrType']=='p')
						   {
						   $discountValue=$RestaurantOfferQuery['RestaurantOfferPrice'];
						   }
						   if($RestaurantOfferQuery['RestaurantoffrType']=='pr')
						   {
						   $discountValue=$subTotal*$RestaurantOfferQuery['RestaurantOfferPrice']/100;
						   }
						   }*/
						   
						   
						  
						   
						   
						  // }// While Loop End Here
						   
						  
						  ?>
        <?php
		
		//echo $deliverVale;
					 if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout')
					 {
					 $deliverVale=0;
					 }  
					 else
					 {
					 $deliverVale=$resdata['restaurant_avarage_deliveryCost'];
					 }
					if($subTotal){
					$grandTotal=$subTotal-$discountValue+$deliverVale+$resdata['convenience_fee']+$_GET['tipamountAmount']; 
					}
					else
					{
					$grandTotal=$subTotal+$deliverVale+$resdata['convenience_fee']+$_GET['tipamountAmount']; 
					}
					?>
        <?php if($discountValue!=0){ ?>
        <li>
          <div class="item_name">
            <h3><?php echo ucwords($TableLanguage4['ResOfferDiscountText']);?> : </h3>
            <?php echo $offerDisc1;?> <?php echo $offerDisc2;?><?php echo $offerDisc3;?><?php echo $offerDisc4;?> </div>
          <div class="unit_price"></div>
          <div class="price1" style="width:28%;"><?php echo number_format($discountValue,2); ?></strong> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
          <div class="clear"></div>
        </li>
        <?php } ?>
        <?php  if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout'){ ?>
        <?php } else { ?>
        <?php 
					   $DeliveryValue=$resdata['restaurant_avarage_deliveryCost'];
					    ?>
        <li>
          <div class="item_name">
            <h3><?php echo ucwords($TableLanguage4['ResMinDeliveryFee']);?>: </h3>
          </div>
          <div class="unit_price"></div>
          <div class="price1" style="width:28%;">
            <?php 
					
					if($_GET['RestaurantService']!='Pickup' || $_GET['RestaurantService']!='Takeout'){
					echo number_format(ucwords($resdata['restaurant_avarage_deliveryCost']),2);
					}
					else
					{
					echo '0.00';
					}
					 ?>
            <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
          <div class="clear"></div>
        </li>
        <?php } ?>
        
        <?php /*?> <li>
          <div class="item_name">
            <h3>Tip : </h3>
          </div>
          <div class="unit_price"></div>
          <div class="price1" style="width:28%;">
            <?php
	if($_GET['tipamountAmount']!=''){
	 echo number_format(ucwords($_GET['tipamountAmount']),2);
	 }
	 else
	 {
	 echo '0.00';
	 }
	  ?>
            <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
          <div class="clear"></div>
        </li><?php */?>
       <?php /*?> <li>
          <div class="item_name">
            <h3>Convenience Fee: </h3>
          </div>
          <div class="unit_price"></div>
          <div class="price1" style="width:28%;">
            <?php
	if($resdata['convenience_fee']!=''){
	 echo number_format(ucwords($resdata['convenience_fee']),2);
	 }
	 else
	 {
	 echo '0.00';
	 }
	  ?>
            <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
          <div class="clear"></div>
        </li><?php */?>
        <li>
          <div class="item_name">
            <h3><?php echo $TableLanguage7['OrderText'];?> </h3>
          </div>
          <div class="unit_price"></div>
          <div class="price1" style="width:28%;"><?php echo number_format($grandTotal,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
          <div class="clear"></div>
        </li>
      </ul>
     
    </div>
    <div class="chkcont nbdr">
     <p> <a  class="submit" style="margin-top:20px; width:85%; padding:8px; margin-left: 46px;" href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html">Add aditional items to your order</a></p>
     
    </div>
  </div>
</form>
<script language="javascript" type="text/javascript">

//alert("hiii");

   $(document).ready(function() {

	   

    $(".crtMin").click(function(){

	

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

	$("input:radio").click(function(){

		//alert($(this).attr("checked"));

				if($(this).val()=='Pickup'){

						//alert("Pick");

						$("#cartx").load("cartX.php?snd=P&hotel_id=<?php echo $_GET['hotel_id'];?>&Id=0");

						//$("#delivery").css("display","none");

					

					}else{

						//alert("Delef");

							$("#cartx").load("cartX.php?snd=D&hotel_id=<?php echo $_GET['hotel_id'];?>&Id=0&Dar=N");

							//$("#delivery").css("display","block");

						}	

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

   });

	



</script>
