<?php
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

extract($_POST);
function genRandomString() {
$length =5;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
} 
 $StData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$_GET['restaurantID']."'"));
 $MainMenuSingleData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItem where id='".$_GET['menuID']."' and RestaurantPizzaID='".$_GET['restaurantID']."' "));
 
 $menuDoughTitle=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."' and SizeRestaurantPizzaID='".$_GET['restaurantID']."' "));
$menuBaseTitle=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and SizeRestaurantPizzaID='".$_GET['restaurantID']."' "));

$menuCheesTitle=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."' and SizeRestaurantPizzaID='".$_GET['restaurantID']."' "));
 
 if($_GET['size']!='')
 {
 $ItemPrice=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$_GET['size']."'"));
 mysql_query("update tbl_restaurantMainMenuItemdough set disable='1' where menuitemID='".$_GET['menuID']."' and menuSizeID!='".$_GET['size']."'");
 }
 
 if($_GET['dough']!='')
 {
 $ItemPrice2=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$_GET['dough']."'"));
 }
 
 if($_GET['base']!='')
 {
 $ItemPrice3=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$_GET['base']."'"));
 }
 
 if($_GET['chees']!='')
 {
 $ItemPrice4=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$_GET['chees']."'"));
 }
 
 
 // Already Checked 
 if($_GET['size']!='')
 {
 $SizeQuery=" and menuSizeID='".$_GET['size']."'";
 }
 if($_GET['dough']!='')
 {
 $menudoughIDQuery=" and menudoughID='".$_GET['dough']."'";
 }
 if($_GET['base']!='')
 {
 $menubasedIDQuery=" and menubasedID='".$_GET['base']."'";
 }
 if($_GET['chees']!='')
 {
 $menuCheesIDQuery=" and menuCheesID='".$_GET['chees']."'";
 }
  /*$plwwkAlready=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuExtraChecked ='1' and menuitemID='".$_GET['menuID']."' $SizeQuery $menudoughIDQuery  $menubasedIDQuery $menuCheesIDQuery");
 $AlreadySelct22='';
 $ExtraitemID='';
 while($ItemPrice51=mysql_fetch_assoc($plwwkAlready))
 {
  $ExtraitemID.=$ItemPrice51['id'].',';
  $AlreadySelct22+=$ItemPrice51['menuExtraPrice']*$ItemPrice51['menuExtraQuantity'];
 }*/
 
 
 $plwwkAlready22=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuExtraChecked ='1' and menuitemID='".$_GET['menuID']."' $SizeQuery $menudoughIDQuery  $menubasedIDQuery $menuCheesIDQuery");
 $AlreadySelct232='';
 $ExtraitemGroupID='';
 while($ItemPrice52=mysql_fetch_assoc($plwwkAlready22))
 {
  $ExtraitemGroupID.=$ItemPrice52['id'].',';
  $AlreadySelct232+=$ItemPrice52['menuExtraPrice']*$ItemPrice52['menuExtraQuantity'];
 }
 
 
 
 //
 
 
 /*if($_GET['checkboxid']!='')
 {
 $pl=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem  where id='".$_GET['checkboxid']."' and menuExtraCheckedSelection !='0' ");
 if(mysql_num_rows($pl)>0)
 {
  mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set menuExtraCheckedSelection='0' where id='".$_GET['checkboxid']."' ");
  }
  else
  {
   mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set menuExtraCheckedSelection='".$_GET['numValue']."' where id='".$_GET['checkboxid']."' ");
  }
   $plwwk=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuExtraCheckedSelection !='0' and menuitemID='".$_GET['menuID']."' $SizeQuery $menudoughIDQuery  $menubasedIDQuery $menuCheesIDQuery");
 $Selct2='';
 $ExtraitemID='';
 while($ItemPrice5=mysql_fetch_assoc($plwwk))
 {
  $ExtraitemID.=$ItemPrice5['id'].',';
  $Selct2+=$ItemPrice5['menuExtraPrice']*$ItemPrice5['menuExtraCheckedSelection'];
 }

 }*/
 

  if($_GET['checkboxid1']!=''){
  $pl=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup  where id='".$_GET['checkboxid1']."' and menuExtraCheckedSelection !='0' ");
 if(mysql_num_rows($pl)>0)
 {
  mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitemGroup set menuExtraCheckedSelection='0' where id='".$_GET['checkboxid1']."' ");
  }
  else
  {
   mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitemGroup set menuExtraCheckedSelection='".$_GET['selectiona']."' where id='".$_GET['checkboxid1']."' ");
  }
  
  
  $ItemPriceSelecy=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$_GET['checkboxid1']."'"));
// $Selct3=

$plk=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuExtraCheckedSelection !='0' and menuitemID='".$_GET['menuID']."' $SizeQuery $menudoughIDQuery  $menubasedIDQuery $menuCheesIDQuery");
 $kmop1=mysql_num_rows($plk);
 $slTotal='';
 $ExtraitemGroupID ='';
 while($ItemPrice6=mysql_fetch_assoc($plk))
 {
 $ExtraitemGroupID.=$ItemPrice6['id'].',';
 $slTotal+=$ItemPrice6['menuExtraPrice']*$ItemPrice6['menuExtraCheckedSelection'];
 }
 
 }
 
 
 
 
 
 if($ItemPrice['SizeMenuPrice']=='')
 {
 $todtamenu=$MainMenuSingleData['RestaurantPizzaItemPrice'];
 }
 else
 {
 //$todtamenu=0;
 }
 
 $totalValu=$todtamenu+$ItemPrice['SizeMenuPrice']+$ItemPrice2['menuDoughPrice']+$ItemPrice3['menuBasePrice']+$ItemPrice4['menuCheesPrice']+$Selct1+$Selct2+$slTotal+$AlreadySelct22+$AlreadySelct232;
if($_GET['PriceBalance']!='')
{
$QuanlityValue=$_GET['PriceBalance'];
}
else
{
$QuanlityValue=1;
}
// echo $_GET['PriceBalance'];
?>
<script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});

</script>
<div class="cartcontent" id="myDiv">
<h2><?php echo $MainMenuSingleData['RestaurantPizzaItemName']; ?>

 <span id="PriceChange" style="float:right;"><?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php 
if($totalValu!=''){
$TotalPrice=$totalValu;
$PriceTotalDisplay=$totalValu*$QuanlityValue;
echo number_format($PriceTotalDisplay,2);
}

 ?></span></h2>
 <div style="width:100%; min-height:30px;">
 <?php if($MainMenuSingleData['ResPizzaImg']!=''){ ?>
<img style="float:left;" src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MainMenuSingleData['ResPizzaImg'];?>" width="50" height="40" />
<div style="margin-left:10px; min-height:40px; float:left;"><?php echo $MainMenuSingleData['ResPizzaDescription'];?></div>
<?php } else {?>
<div style="width:100%; min-height:30px; float:left;"><?php echo $MainMenuSingleData['ResPizzaDescription'];?></div>
   <?php } ?>
   <div style="clear:both;" ></div>
   </div>
<div class="cart_main">


<!---------------------------Menu Size Start Here---------------------------------------->

<?php 
$Sizenumrows=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['menuID']."'"));
if($Sizenumrows>0){
?>
<?php if($MainMenuSingleData['sizeTitle']!=''){ ?>
<p><?php echo ucwords($MainMenuSingleData['sizeTitle']); ?><span>(*mandatory field)</span></p>
<?php } else { ?>
<p>Select size<span>(*mandatory field)</span></p>
<?php } ?>
<?php } ?>

<form class="addtc" name="myform" action="restaurant.php?restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>.html" target="_parent"  method="post">
<input type="hidden" name="item_id" value="<?php echo $_GET['menuID'];?>"  />
<input type="hidden" name="MenuSize" value="<?php echo $_GET['size'];?>"  />
<input type="hidden" name="doughValue" value="<?php echo $_GET['dough'];?>"  />
<input type="hidden" name="cheesValue" value="<?php echo $_GET['chees'];?>"  />
<input type="hidden" name="baseValue" value="<?php echo $_GET['base'];?>"  />
<input type="hidden" name="price" value="<?php echo $TotalPrice;?>"  />
<input type="hidden" name="SelectionOneID" value="<?php echo $_GET['checkboxid'];?>"  />
<input type="hidden" name="SelectionOneID2" value="<?php echo $_GET['numValue'];?>"  />
<input type="hidden" name="offer" value="<?php echo $_SESSION['offer'];?>"  />
<input type="hidden" name="ChangeProdcut" value="1"  />
<input type="hidden" name="ExtraitemID" value="<?php echo rtrim($ExtraitemID,',');?>"  />
<input type="hidden" name="ExtraitemGroupID" value="<?php echo rtrim($ExtraitemGroupID,',');?>"  />
<table width="100%" border="0">
<?php $SizeQuery=mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['menuID']."' and status='0' order by sizePosition asc"); ?>
<?php if(mysql_num_rows($SizeQuery)>0){ ?>
  <tr>
    <td><div class="rowcontent" style="background:#f7f9f9;">
    
  <?php 
  
  while($MainMenuSizeData=mysql_fetch_assoc($SizeQuery)){
  ?>        
<div class="third">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $count;?>" required type="radio" <?php if($_GET['size']==$MainMenuSizeData['id']){ ?> checked="checked" <?php } ?> name="MenuSize" onclick="loadXMLDoc('<?php echo $MainMenuSizeData['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['PriceBalance'];?>')" value="<?php echo $MainMenuSizeData['id']?>"></td>
    <td width="90%"><div class="left"><label for="<?php echo $count;?>"><?php echo $MainMenuSizeData['SizeMenuName']; ?>
<span style="font-size:13px; padding:8px;"><?php echo $MainMenuSizeData['SizeMenuDescription']; ?></span>
</label>
</div>
<div class="right"><?php 
if($MainMenuSizeData['SizeMenuPrice']!=''){
echo number_format($MainMenuSizeData['SizeMenuPrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
</table>
 </div>
<?php 
$count++;
} ?>
<div style="clear:both;"></div>
</div></td>
  </tr>
  <?php } ?>
<!---------------------------Menu Size End Here---------------------------------------->  
  
  
  
 <!---------------------------Select Dough Start Here----------------------------------------> 
  
  <?php 
  $AjaxploDough=mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."'  and status='0' group by menuDoughName order by doughPosition asc ");
  if(mysql_num_rows($AjaxploDough)>0){
  ?>
  <tr>
    <td> <?php if($MainMenuSingleData['OptionOneTitle']!=''){ ?>
    <p><?php echo ucwords($MainMenuSingleData['OptionOneTitle']);?> <span>(*mandatory field)</span></p>
    <?php } else { ?>
     <p>Select Dough <span>(*mandatory field)</span></p>
     <?php } ?>
<div class="rowcontent" style="background:#f7f9f9;">

<?php 
 $i=13;
  
  
  $SubQuery="";
  
   while($AjaxMainMenuOPtion1Data=mysql_fetch_assoc($AjaxploDough)){
   $SubQuery .=" and menuDoughName !=N'".mysql_real_escape_string($AjaxMainMenuOPtion1Data['menuDoughName'])."'";
 //echo $AjaxMainMenuOPtion1Data['menuSizeID'];
  ?>
<div class="third">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $i;?>" type="radio" required name="doughValue"     <?php if($_GET['dough']==$AjaxMainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?>  value="<?php echo $AjaxMainMenuOPtion1Data['id'];?>"  onclick="getdoughValueAjax('<?php echo $AjaxMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $AjaxMainMenuOPtion1Data['menuSizeID'];?>','<?php echo $_GET['PriceBalance'];?>')"  ></td>
    <td width="90%"><div class="left">
<label for="<?php echo $i;?>"><?php echo $AjaxMainMenuOPtion1Data['menuDoughName']; ?>
<span style="font-size:13px; padding:8px;"><?php echo $AjaxMainMenuOPtion1Data['menuDoughDescription']; ?></span>
</label></div>
<div class="right"><?php 
if($AjaxMainMenuOPtion1Data['menuDoughPrice']!=''){
echo number_format($AjaxMainMenuOPtion1Data['menuDoughPrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
</table>
</div>
<?php 
}
 ?>


<?php 
$ploDough44=mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."' $SubQuery  group by menuDoughName  order by doughPosition asc ");
while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough44)){
  ?>
<div class="third"  style="color:#CCCCCC;">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $i;?>" type="radio"  disabled="disabled" name="doughValue1" value=""></td>
    <td width="90%"><div class="left"><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuDoughName']; ?>
<span style="font-size:13px; padding:8px;color:#CCCCCC;"><?php echo $MainMenuOPtion1Data['menuDoughDescription']; ?></span>
</label></div>
<div class="right"  style="color:#CCCCCC;"><?php 
if($MainMenuOPtion1Data['menuDoughPrice']!=''){
echo number_format($MainMenuOPtion1Data['menuDoughPrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
</table>
</div>
<?php 
$i++;
}
 ?>

<div style="clear:both;"></div>
</div>
</td>
  </tr>
  <?php } ?>
  <!---------------------------Select Dough end Here----------------------------------------> 
  
  <!---------------------------Select Base Start Here----------------------------------------> 
  <?php
  if($_GET['dough']!='')
  {
  $DougnhQueryName="and menudoughID='".$_GET['dough']."'";
  }
   $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."' $DougnhQueryName and status='0'  group by menuBaseName order by basePosition asc");
  if(mysql_num_rows($ploDough)>0){
 ?>
  <tr id="option2data">
    <td>
    
   <?php if($MainMenuSingleData['OptionTwoTitle']!=''){ ?>
    <p><?php echo ucwords($MainMenuSingleData['OptionTwoTitle']);?> <span>(*mandatory field)</span></p>
    <?php } else { ?>
     <p>Select Base <span>(*mandatory field)</span></p>
     <?php } ?>
    
<div class="rowcontent" style="background:#f7f9f9;">

<?php 
$baseName ='';
  while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
   $baseName .=" and menuBaseName !=N'".mysql_real_escape_string($MainMenuOPtion1Data['menuBaseName'])."'";
  ?>
<div class="third">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $i;?>" required type="radio" <?php if($_GET['base']==$MainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?> onclick="getBaseValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['PriceBalance'];?>')"   name="baseValue"  value="<?php echo $MainMenuOPtion1Data['id']?>"></td>
    <td width="90%"><div class="left"><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?>
<span style="font-size:13px; padding:8px; "><?php echo $MainMenuOPtion1Data['menuBaseDescription']; ?></span>
</label></div>
<div class="right"><?php 
if($MainMenuOPtion1Data['menuBasePrice']!=''){
echo number_format($MainMenuOPtion1Data['menuBasePrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
</table>


</div>
<?php 
$i++;
}
 ?>
 
 
<?php 
$i=7;
$BaseDisableQuery=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."' $baseName  $DougnhQueryName and status='0'  group by menuBaseName order by basePosition asc ");
while($BaseDisableData=mysql_fetch_assoc($BaseDisableQuery)){?>
<div class="third" style="color:#CCCCCC;">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $i;?>" type="radio"  disabled="disabled" onclick="getBaseValueAjax('<?php echo $BaseDisableData['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['PriceBalance'];?>')"   name="baseValue1"  value="<?php echo $MainMenuOPtion1Data['id']?>"></td>
    <td width="90%"><div class="left" style="color:#CCCCCC;"><label for="<?php echo $i;?>"><?php echo $BaseDisableData['menuBaseName']; ?>
<span style="font-size:13px; padding:8px;color:#CCCCCC; "><?php echo $BaseDisableData['menuBaseDescription']; ?></span>
</label></div>
<div class="right" style="color:#CCCCCC;"><?php 
if($BaseDisableData['menuBasePrice']!=''){
echo number_format($BaseDisableData['menuBasePrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
</table>
</div>
<?php 
$i++;
}
 ?> 

<div style="clear:both;"></div>
</div>
</td>
  </tr>
 <?php } ?>

<!---------------------------Select end Start Here---------------------------------------->   
 
 
 <!---------------------------Select CHees Start Here---------------------------------------->  
 
 <?php
 if($_GET['base']!='')
 {
 $BaseQuery=" and menubasedID='".$_GET['base']."'";
 }
  $ploChees=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."'  $Dougnh  $BaseQuery  and status='0'  group by menuCheesName order by cheesPosition asc");
   
  $cheesName='';
 if(mysql_num_rows($ploChees)>0){
  ?>
  <tr>
    <td><?php if($MainMenuSingleData['OptionThreeTitle']!=''){ ?>
    <p><?php echo ucwords($MainMenuSingleData['OptionThreeTitle']);?> <span>(*mandatory field)</span></p>
    <?php } else { ?>
     <p>Select Cheese <span>(*mandatory field)</span></p>
     <?php } ?>
<div class="rowcontent" style="background:#f7f9f9;">
<?php 
while($MainMenuOPtion1Data=mysql_fetch_assoc($ploChees)){
$cheesName .=" and menuCheesName !=N'".mysql_real_escape_string($MainMenuOPtion1Data['menuCheesName'])."'";
  ?>
<div class="third">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $i;?>" type="radio" required name="cheesValue" <?php if($_GET['chees']==$MainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?>  onclick="getCheesValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['PriceBalance'];?>')" value="<?php echo $MainMenuOPtion1Data['id']?>"></td>
    <td width="90%"><div class="left"><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuCheesName']; ?>
<span style="font-size:13px; padding:8px; "><?php echo $MainMenuOPtion1Data['menuCheesDescription']; ?></span>
</label></div>
<div class="right"><?php 
if($MainMenuOPtion1Data['menuCheesPrice']!=''){
echo number_format($MainMenuOPtion1Data['menuCheesPrice'],2);
}
else
{
echo '0.00';
}
 ?> $</div>
</td>
  </tr>
</table>
</div>
<?php 
$i++;
}
 ?>
 
 
 <?php 
 $ploCheesDisable=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."'  $DougnhQueryName  $BaseQuery  $cheesName and status='0'  group by menuCheesName order by cheesPosition asc");
while($DisableCheesData=mysql_fetch_assoc($ploCheesDisable)){
  ?>
<div class="third" style="color:#CCCCCC;">
<table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $i;?>" type="radio" name="cheesValue1"  disabled="disabled"  onclick="getCheesValueAjax('<?php echo $DisableCheesData['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['PriceBalance'];?>')" value="<?php echo $DisableCheesData['id']?>"></td>
    <td width="90%"><div class="left" style="color:#CCCCCC;"><label for="<?php echo $i;?>"><?php echo $DisableCheesData['menuCheesName']; ?>
<span style="font-size:13px; padding:8px; color:#CCCCCC;"><?php echo $DisableCheesData['menuCheesDescription']; ?></span>
</label></div>
<div class="right" style="color:#CCCCCC;"><?php 
if($DisableCheesData['menuCheesPrice']!=''){
echo number_format($DisableCheesData['menuCheesPrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
</table>


</div>
<?php 
$i++;
}
 ?>



<div style="clear:both;"></div>
</div>
</td>
  </tr>
  <?php } ?>
  <!---------------------------Select end Chess Here---------------------------------------->  
  
  
   <?php 
     if($_GET['size']!='')
   {
   $SizeID=" and menuSizeID='".$_GET['size']."'";
   }
   if($_GET['dough']!='')
   {
   $menudoughID=" and menudoughID='".$_GET['dough']."'";
   }
   if($_GET['base']!='')
   {
   $menubasedID=" and menubasedID='".$_GET['base']."'";
   }
   if($_GET['chees']!='')
   {
   $menuCheesID=" and menuCheesID='".$_GET['chees']."'";
   }
  $ExtraploGroup=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuitemID='".$_GET['menuID']."' $SizeID $menudoughID $menubasedID $menuCheesID and status='0' group by menuExtraNameTitle");
  
    if(mysql_num_rows($ExtraploGroup)>0){
  ?>
   <?php 
 $c=1;
 
  
   while($ExtraMainMenuOPtion1DataGroupTitle=mysql_fetch_assoc($ExtraploGroup)){
  ?>
  <tr><td colspan="2">
 
  <table width="100%" >
  
   <tr>
    <td><p><?php echo $ExtraMainMenuOPtion1DataGroupTitle['menuExtraNameTitle'];?></p>
<div class="rowcontent" style="width:100%; overflow-y:auto; background:#f7f9f9;">
<div class="radio">

   <?php 
 
   
   
   
    $ExtraploGroupData=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuitemID='".$_GET['menuID']."' $SizeID $menudoughID $menubasedID $menuCheesID and menuExtraNameTitle=N'".$ExtraMainMenuOPtion1DataGroupTitle['menuExtraNameTitle']."' and status='0' ");
	 $c=1;
  
   while($ExtraMainMenuOPtion1DataGroup=mysql_fetch_assoc($ExtraploGroupData)){
   
  ?>
 <div class="third">
 <div style="float:left; width:100%; min-height:20px; padding-bottom:2px;">
       <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraQuantity']==1 || $ExtraMainMenuOPtion1DataGroup['menuExtraQuantity']=='' ){?>
         <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px; font-size:11px;">1X</div>
        <div style="width:100%; min-height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input style="width:10px; height:10px;" type="checkbox"   checked="checked" disabled="disabled" />
          <?php } else { ?>
           <input style="width:10px; height:10px;" type="checkbox" <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraCheckedSelection']==1){ ?>  checked="checked" <?php }?>  onclick="getExtarValueAjax1('<?php echo $ExtraMainMenuOPtion1DataGroup['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1','1','<?php echo $_GET['PriceBalance'];?>')"  />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:15px; float:left; width:89%; min-height:15px;">
       <table width="100%" style="margin-top:-3px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraName'];?>  
    <span style="font-size:13px; padding:5px;"><?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraDescription']; ?></span>
     </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php 
	if($ExtraMainMenuOPtion1DataGroup['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1DataGroup['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></td>
    </tr>
    </table>
    </div>
      <?php } ?>
      
        <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraQuantity']==2){?>
        <div style="width:11%; min-height:30px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:5px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input type="checkbox"  checked="checked"  disabled="disabled" />
          <?php } else { ?>
          
            <input type="checkbox" <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraCheckedSelection']==1){ ?> checked="checked" <?php }?>  onclick="getExtarValueAjax1('<?php echo $ExtraMainMenuOPtion1DataGroup['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1','1','<?php echo $_GET['PriceBalance'];?>')"  />
          
          <?php } ?>
        </div>
      </div>
      
      <div style="width:11%; min-height:30px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:5px;font-size:11px;">2X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input type="checkbox"  checked="checked"  disabled="disabled" />
          <?php } else { ?>
          <input type="checkbox" <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraCheckedSelection']==2){ ?> checked="checked" <?php }?>  onclick="getExtarValueAjax1('<?php echo $ExtraMainMenuOPtion1DataGroup['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','2','2','<?php echo $_GET['PriceBalance'];?>')"  />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:15px; float:left; width:78%; min-height:15px;">
      <table width="100%" style="margin-top:-3px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraName'];?>  
    <span style="font-size:13px; padding:5px;"><?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraDescription']; ?></span>
     </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php 
	if($ExtraMainMenuOPtion1DataGroup['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1DataGroup['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></td>
    </tr>
    </table>
    </div>
      <?php } ?>
      
      
    <?php /*?><div style="margin-top:15px; float:left; width:78%; min-height:30px;">
	<?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraName'];?>  &nbsp;(<?php 
	if($ExtraMainMenuOPtion1DataGroup['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1DataGroup['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	
	?> $)
    <span style="font-size:9px; padding:5px;"><?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraDescription']; ?></span>
    </div><?php */?>
    <div style="clear:both;"></div>
      </div>
      </div>
    
      
      
 
 <?php /*?> <?php if($c==3) { echo "</td></tr><tr><td></td></tr>"; $c= 0; } ?> <?php */?> 
 <?php $c++;}?> 
 
 

</div>
<div style="clear:both;"></div>
</div>
</td>
  </tr>
 
 </table></td></tr>
  <?php }  }?>
  
 
  <?php
  
   $AjaxExtraploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['menuID']."' $SizeID $menudoughID $menubasedID $menuCheesID and status='0' order by extraPosition asc");
 
   
  if(mysql_num_rows($AjaxExtraploDough)>0){
   ?>
  <tr><td colspan="2">
  <table width="100%" >
   <tr>
    <td><p>Choose Materials <span>(*mandatory field)</span></p>
<div class="rowcontent" style="width:100%; overflow-y:auto; background:#f7f9f9;">
<div class="radio">

<?php 
 $c=1;
 
   while($AjaxExtraMainMenuOPtion1Data=mysql_fetch_assoc($AjaxExtraploDough)){
  
   $dunmData=mysql_fetch_assoc(mysql_query("select * from dummy_checkbox"));
   
 
  
  ?>

    <div class="third">
    <div style="float:left; width:100%; min-height:20px; padding-bottom:2px;">
    <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraQuantity']==1 || $AjaxExtraMainMenuOPtion1Data['menuExtraQuantity']=='' ){?>
         <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input type="checkbox"  checked="checked" disabled="disabled"  />
          <?php } else { ?>
             <input type="checkbox"  <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraCheckedSelection']==1){ ?> checked="checked" <?php } ?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1','<?php echo $_GET['PriceBalance'];?>')" />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:15px; float:left; width:89%; min-height:30px;">
	 <table width="100%" style="margin-top:-3px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $AjaxExtraMainMenuOPtion1Data['menuExtraName'];?>  
     <span style="font-size:13px; padding:5px;"><?php echo $AjaxExtraMainMenuOPtion1Data['menuExtraDescription']; ?></span>
     </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php 
	if($AjaxExtraMainMenuOPtion1Data['menuExtraPrice']!=''){
	echo number_format($AjaxExtraMainMenuOPtion1Data['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>
     </td>
   
    </tr>
    </table>
    </div>
      <?php } ?>
      
        <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraQuantity']==2 ){?>
         <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:5px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input type="checkbox"  checked="checked" disabled="disabled"  />
          <?php } else { ?>
          <input type="checkbox" <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraCheckedSelection']==1){ ?> checked="checked" <?php } ?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1','<?php echo $_GET['PriceBalance'];?>')" />
          <?php } ?>
        </div>
      </div>
      
      <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:5px; font-size:11px;">2X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input type="checkbox"  checked="checked" disabled="disabled"  />
          <?php } else { ?>
          <input type="checkbox" <?php if($AjaxExtraMainMenuOPtion1Data['menuExtraCheckedSelection']==2){ ?> checked="checked" <?php } ?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','2','<?php echo $_GET['PriceBalance'];?>')" />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:15px; float:left; width:78%; min-height:10px;">
	 <table width="100%" style="margin-top:-3px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $AjaxExtraMainMenuOPtion1Data['menuExtraName'];?>  
     <span style="font-size:13px; padding:5px;"><?php echo $AjaxExtraMainMenuOPtion1Data['menuExtraDescription']; ?></span>
     </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php 
	if($AjaxExtraMainMenuOPtion1Data['menuExtraPrice']!=''){
	echo number_format($AjaxExtraMainMenuOPtion1Data['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>
     </td>
   
    </tr>
    </table>
    </div>
      <?php } ?>
      
    
      </div>
      
    
      
     
 </div>
 <?php /*?> <?php if($c==3) { echo "</td></tr><tr><td></td></tr>"; $c= 0; } ?>  <?php */?>
 <?php $c++;}?> 
 
 

 

</div>
<div style="clear:both;"></div>
</div>
</td>
  </tr>
  <?php } ?>
  </table>
  
  </td></tr>
  </table>
  <table width="100%">
 <tr><td>Quantity</td><td>
 <!--<input type='button' value='-' class='qtyminus' field='quantity' />-->
    <input type='text' name='quantity' id="quantity" value='<?php echo $QuanlityValue;?>' class='qty' onchange="getExtarValueAjaxPrcie(this.value,'<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','<?php echo $_GET['checkboxid'];?>','<?php echo $_GET['checkboxid1'];?>')" />
    <!--<input type='button' value='+' class='qtyplus' field='quantity' />-->
 </td></tr>
   <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><textarea style="width:550px; height:70px;" name="SpecialInstruction" placeholder="Special Instructions"></textarea></td></tr>
     
      <tr><td colspan="2" align="center"><input type="submit" name="" value="Submit Now" class="submit" />
</td></tr>
</table>


</form>
</div>

