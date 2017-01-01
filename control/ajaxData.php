<?php
session_start();
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
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
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMenuItem","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 $MainMenuSingleData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItem where id='".$_GET['menuID']."' and RestaurantPizzaID='".$_GET['restaurantID']."' "));
 if($_GET['size']!='')
 {
 //mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set selection='0',selection1='0' where menuitemID='".$_GET['menuID']."'");
 $ItemPrice=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$_GET['size']."'"));
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
 
  if($_GET['checkboxid']!='')
 {
if($_GET['numValue']==1){
mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set selection='".$_GET['numValue']."' where id='".$_GET['checkboxid']."' and menuitemID='".$_GET['menuID']."'");
}
if($_GET['numValue']==2){
mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set selection1='".$_GET['numValue']."' where id='".$_GET['checkboxid']."' and menuitemID='".$_GET['menuID']."'");
}
$Selct1=0;
$plk=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where selection='1'");
 while($ItemPrice5=mysql_fetch_assoc($plk)){
 $Selct1 +=$ItemPrice5['menuExtraPrice']*1;
 }
 
 $Selct2=0;
$plk2=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where selection1='2'");
 while($ItemPrice52=mysql_fetch_assoc($plk2)){
 $Selct2 +=$ItemPrice52['menuExtraPrice']*2;
 }
 }
 
// echo $_GET['checkboxid'];
 $totalValu=$ItemPrice['SizeMenuPrice']+$ItemPrice2['menuDoughPrice']+$ItemPrice3['menuBasePrice']+$ItemPrice4['menuCheesPrice']+$Selct1+$Selct2;
 
?>
<div class="cartcontent" id="myDiv">
<h2><?php echo $MainMenuSingleData['RestaurantPizzaItemName']; ?> <span id="PriceChange" style="float:right;"><?php 
if($totalValu!=''){
echo number_format($totalValu,2);
}
else
{
echo number_format($MainMenuSingleData['RestaurantPizzaItemPrice'],2);
}
 ?></span></h2>
<div class="cart_main">
<p>Select size<span>(*mandatory field)</span></p>
<form name="" action="" method="get">
<table width="100%" border="0">
  <tr>
    <td><div class="rowcontent">
  <div class="radio">   
  <?php 
  $SizeQuery=mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['menuID']."'");
  while($MainMenuSizeData=mysql_fetch_assoc($SizeQuery)){
  ?>        
<div class="third">
<div class="left"><input id="<?php echo $count;?>" type="radio" <?php if($_GET['size']==$MainMenuSizeData['id']){ ?> checked="checked" <?php } ?> name="a" onclick="loadXMLDoc('<?php echo $MainMenuSizeData['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>')" value=""><label for="<?php echo $count;?>"><?php echo $MainMenuSizeData['SizeMenuName']; ?></label>
<!--<div class="radiobox"><input type="radio" name="1" id="" /></div><div class="recipe">Chick</div>--></div>
<div class="right"><?php echo number_format($MainMenuSizeData['SizeMenuPrice'],2); ?> &euro;</div>
 </div>
<?php 
$count++;
} ?>

</div>
</div></td>
  </tr>
  
  <tr>
    <td><p>Select Dough <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 $i=13;
  $AjaxploDough=mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."'");
   while($AjaxMainMenuOPtion1Data=mysql_fetch_assoc($AjaxploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio" name="dough"  <?php if($_GET['dough']==$AjaxMainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?>  value=""  onclick="getdoughValueAjax('<?php echo $AjaxMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $AjaxMainMenuOPtion1Data['menuSizeID'];?>')"  ><label for="<?php echo $i;?>"><?php echo $AjaxMainMenuOPtion1Data['menuDoughName']; ?></label></div>
<div class="right"><?php echo number_format($AjaxMainMenuOPtion1Data['menuDoughPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>


<?php 
  $i=13;
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third"  style="color:#CCCCCC;">
<div class="left"><input id="<?php echo $i;?>" type="radio"  disabled="disabled" name="dough" value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuDoughName']; ?></label></div>
<div class="right"  style="color:#CCCCCC;"><?php echo number_format($MainMenuOPtion1Data['menuDoughPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>

</div>
</div>
</td>
  </tr>
  
  
  
  <tr id="option2data">
    <td><p>Select Base <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."' and menudoughID='".$_GET['dough']."' ");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio" <?php if($_GET['base']==$MainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?> onclick="getBaseValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>')"   name="base"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?></label></div>
<div class="right"><?php echo number_format($MainMenuOPtion1Data['menuBasePrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>
 
 
 <?php 
 if($_GET['dough']!=''){
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third" style="color:#CCCCCC;">
<div class="left"><input id="<?php echo $i;?>"  disabled="disabled" type="radio" name="base"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?></label></div>
<div class="right" style="color:#CCCCCC;"><?php echo number_format($MainMenuOPtion1Data['menuBasePrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
}
else
{
$ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third" >
<div class="left"><input id="<?php echo $i;?>"  <?php if($_GET['base']==$MainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?> onclick="getBaseValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>')"   type="radio" name="base"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?></label></div>
<div class="right" ><?php echo number_format($MainMenuOPtion1Data['menuBasePrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
}
 ?>

</div>
</div>
</td>
  </tr>
  
  
  <tr>
    <td><p>Select Chees <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."' and menudoughID='".$_GET['dough']."' and menubasedID='".$_GET['base']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio" name="chees" <?php if($_GET['chees']==$MainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?>  onclick="getCheesValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>')" value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuCheesName']; ?></label></div>
<div class="right"><?php echo number_format($MainMenuOPtion1Data['menuCheesPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>



<?php 
 if($_GET['base']!=''){
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third" style="color:#CCCCCC;">
<div class="left"><input id="<?php echo $i;?>"  disabled="disabled" type="radio" name="chess"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuCheesName']; ?></label></div>
<div class="right" style="color:#CCCCCC;"><?php echo number_format($MainMenuOPtion1Data['menuCheesPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
}
else
{
$ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third" >
<div class="left"><input id="<?php echo $i;?>"  type="radio"  <?php if($_GET['chees']==$MainMenuOPtion1Data['id']){ ?> checked="checked" <?php } ?>  onclick="getCheesValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>')"  name="chees"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuCheesName']; ?></label></div>
<div class="right" ><?php echo number_format($MainMenuOPtion1Data['menuCheesPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
}
 ?>


</div>
</div>
</td>
  </tr>
  <tr><td colspan="2">
  <table width="100%" style="height:300px; overflow:scroll;">
   <tr>
    <td><p>Select Materials <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<table width="100%" cellpadding="2" cellspacing="2" style="height:300px; overflow:scroll;">
  <tr>
<?php 
 $c=1;
  $AjaxExtraploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['menuID']."'");
   while($AjaxExtraMainMenuOPtion1Data=mysql_fetch_assoc($AjaxExtraploDough)){
  
   $dunmData=mysql_fetch_assoc(mysql_query("select * from dummy_checkbox"));
   
 
  
  ?>

    <td><div style="float:left;">
        <div style="width:30px; height:30px; float:left;">
        <div style="width:30px; height:10px; margin-bottom:5px; font-size:11px;">1X</div>
        <div style="width:30px; height:15px;font-size:11px;">
          <input type="checkbox" <?php if($AjaxExtraMainMenuOPtion1Data['selection']==1){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1')" />
        </div>
      </div>
      <div style="width:30px; height:30px; float:left;">
        <div style="width:30px; height:10px; margin-bottom:5px;font-size:11px;">2X</div>
        <div style="width:30px; height:15px;font-size:11px;">
          <input type="checkbox" <?php if($AjaxExtraMainMenuOPtion1Data['selection1']==2){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','2')" />
        </div>
      </div>
    <div style="margin-top:10px; float:left;"><?php echo $AjaxExtraMainMenuOPtion1Data['menuExtraName'];?>  &nbsp;(<?php echo number_format($AjaxExtraMainMenuOPtion1Data['menuExtraPrice'],2)?> &euro;)</div>
      </div>
      
    
      
      </td>
      <td></td>
 
  <?php if($c==3) { echo "</td></tr><tr><td></td></tr>"; $c= 0; } ?>  
 <?php $c++;}?> 
 
 
 </tr>
</table>
 

</div>
</div>
</td>
  </tr>
  </table>
  
  </td></tr>
  <tr><td colspan="2"><input type="text" name="Quanities" value="1" /></td></tr>
   <tr><td colspan="2">&nbsp;</td></tr>
   <tr><td colspan="2"><textarea style="width:600px; height:80px;" name="SpecialInstruction"></textarea></td></tr>
     <tr><td colspan="2">&nbsp;</td></tr>
</table>
<input type="submit" name="" value="Add to Cart" class="submit" />


</form>
</div>

