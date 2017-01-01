<?php include('route/config1.php');?>
<tr id="option2data">
    <td><p>Select Base <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."' and menudoughID='".$_GET['dough']."' ");
  echo "select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and menuSizeID='".$_GET['size']."' and menudoughID='".$_GET['dough']."' ";
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio" name="base"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?></label></div>
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
<div class="left"><input id="<?php echo $i;?>"  type="radio" name="base"  value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?></label></div>
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