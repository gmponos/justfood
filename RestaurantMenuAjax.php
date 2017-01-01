<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurantID'])>0){
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$_GET['restaurantID']));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$_GET['restaurantID']));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
	 
        
<?php
include('config1.php');
$resdata['id']=$_GET['restaurantID'];
												 $MenuCategoryQuery1=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."' and id='".$_GET['q']."' order by restaurantMenuName asc");                       while($MenuCategoryData1=mysql_fetch_assoc($MenuCategoryQuery1)){
													$MenuItemQuery=mysql_query("select * from tbl_restaurantMainMenuItem where RestaurantCategoryID='".$MenuCategoryData1['id']."' and RestaurantPizzaID='".$resdata['id']."' order by RestaurantPizzaItemName asc");             
													
													?>
   <table width="100%">
<tbody><tr><td style="height:30px;"><h3><?php echo ucwords($MenuCategoryData1['restaurantMenuName']);?></h3></td>
</tr>
<?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
<tr><td><span style="color:#777777; font-size:12px; font-style:italic; text-align:left;"><font><font><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></font></font></span> </td></tr>
<?php } ?>
</tbody></table>
  
 <table width="100%">
 <tr>
 <?php 
  $i=1;
  $cla='class="odd"';
  while($MenuItemData=mysql_fetch_assoc($MenuItemQuery)){ 
  
   $ExtraploDough=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$MenuItemData['id']."'"));

  ?>
 <td width="50%"> 
 
 <?php if($_GET['close']==1){ ?>
 <li <?php echo $cla;?>>
 <a class="tooltips" onClick="return confirm('Restaurant is closed');">
  <div class="food_row_name"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
  <div class="food_row_price" ><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?> 
  <?php if($ExtraploDough>0){?>
  $&nbsp;+
  <?php } else { ?>
   $
  <?php } ?>
  </div>
<span>
<div class="fullspan">
<div class="span_header">
<div class="span_header_left"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
<div class="span_headr_right"><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?>  <?php if($ExtraploDough>0){?>
  $&nbsp;+
  <?php } else { ?>
   $
  <?php } ?></div>
<div style="clear:both;"></div>
</div>
<?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
<div class="span_content"><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></div>
<?php } else { ?>
<div class="span_content">No Description available</div>
<?php } ?>

</div></span>
</a>
<div style="clear:both;"></div>
 </li>
 <?php } else { ?>
 <li <?php echo $cla;?>>
 <a class="tooltips iframe1" href="popup.php?restaurantID=<?php echo $_GET['restaurantID'];?>&menuID=<?php echo $MenuItemData['id']; ?>&restaurants=<?php echo stripslashes(ucwords($resdata['id']));?>-<?php echo urlencode(trim($resdata['restaurantCity']));?>-<?php echo urlencode(trim($resdata['restaurant_name']));?>.html">
  <div class="food_row_name"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
  <div class="food_row_price" ><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?>  <?php if($ExtraploDough>0){?>
  $&nbsp;+
  <?php } else { ?>
   $
  <?php } ?> </div>
<span>
<div class="fullspan">
<div class="span_header">
<div class="span_header_left"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
<div class="span_headr_right"><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?>  <?php if($ExtraploDough>0){?>
  $&nbsp;+
  <?php } else { ?>
   $
  <?php } ?></div>
<div style="clear:both;"></div>
</div>
<?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
<div class="span_content">
<table width="100%" border="0">
  <tr>
    <td><img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MenuCategoryData1['ResPizzaImg'];?>" width="50" height="40" /></td>
    <td><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></td>
  </tr>
</table>
</div>
<?php } else { ?>
<div class="span_content">No Description available</div>
<?php } ?>

</div></span>
</a>
<div style="clear:both;"></div>
 </li>
 <?php } ?>
 </td>
   <?php if($i==2) { 
   $cla='class="even"';
   echo "</td></tr><tr><td></td></tr>"; 
 $i= 0; } ?>  
 <?php 
 $i++;
 
 } ?>
  
 
  </tr>
  </table>
  
  
  
  
  
 
  
  <?php } ?>
  
  
  </div>
  </ul>

