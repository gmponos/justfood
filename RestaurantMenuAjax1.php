<?php
include('config1.php');
$resdata['id']=$_GET['restaurantID'];
												 $MenuCategoryQuery1=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."'  order by restaurantMenuName asc");                       while($MenuCategoryData1=mysql_fetch_assoc($MenuCategoryQuery1)){
													$MenuItemQuery=mysql_query("select * from tbl_restaurantMenuItem where RestaurantCategoryID='".$MenuCategoryData1['id']."' and RestaurantPizzaID='".$resdata['id']."' and RestaurantPizzaItemName like '%$_GET[q]%' order by RestaurantPizzaItemName asc");             
													
													?>
  <table width="100%">
<tbody><tr><td style="height:30px;"><h4><?php echo ucwords($MenuCategoryData1['restaurantMenuName']);?></h4></td>
</tr>
<?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
<tr><td><span style="color:#777777; font-size:12px; font-style:italic; text-align:left;"><font><font><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></font></font></span> </td></tr>
<?php } ?>
</tbody></table>
  
 <table width="100%">
 <tr>
 <?php 
  $i=1;
  while($MenuItemData=mysql_fetch_assoc($MenuItemQuery)){ 
 if($i%2==0){
 $cla='class="even"';
 }
 else
 {
 $cla='class="odd"';
 }
  ?>
 <td> <li <?php echo $cla;?>><a class="various fancybox.ajax" dataancyb-fox-type="ajax" href="2.html"> </a><a class="tooltips" href="#">
  <div class="food_row_name"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
  <div class="food_row_price" ><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?> &euro; </div>
<span>
<div class="fullspan">
<div class="span_header">
<div class="span_header_left"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
<div class="span_headr_right"><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?> &euro;</div>
</div>
<div class="span_content">From Original price 15 &euro;</div>
</div></span>
</a>
 </li></td>
   <?php if($i==2) { echo "</td></tr><tr><td></td></tr>"; $i= 0; } ?>  
 <?php 
 $i++;
 } ?>
  
 
  </tr>
  </table>
  
  
  
  
  
 
  
  <?php } ?>
  
  </div>
  </ul>

