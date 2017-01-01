<?php
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMenuItem","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 $MainMenuSingleData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItem "));
 
?>
<form name="" action="" method="post">
 <tr id="option2">
    <td ><p><?php echo $MainMenuSingleData['OptionTwoTitle']; ?> <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
  $i=11;
 // echo "select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['m']."' and menuSizeID='".$_GET['q']."' and menudoughID ='".$_GET['d']."' ";
    $ploBase1=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['m']."' and menuSizeID='".$_GET['q']."' and menudoughID ='".$_GET['d']."' ");
  
   while($MainMenuOPtion2DataAjax=mysql_fetch_assoc($ploBase1)){
  ?>


<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio"  name="Option2" value="" ><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion2DataAjax['menuBaseName']; ?></label></div>
<div class="right"><?php echo number_format($MainMenuOPtion2DataAjax['menuBasePrice'],2); ?> &euro;</div></div>
<?php 
$i++;

}
 ?>
 
 <?php 
  $i=13;
  if($_GET['d']!=''){
 $pl="and menudoughID !='".$_GET['d']."'";
 }
    $NotajaxploBase1=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID !='".$_GET['m']."' and menuSizeID !='".$_GET['q']."' $pl ");
  
   while($MainMenuOPtion2NotDataAjax=mysql_fetch_assoc($NotajaxploBase1)){
  ?>


<div class="third">
<div class="left"><input id="<?php echo $i;?>" disabled="disabled" type="radio" name="Option2" value="" ><label for="<?php echo $i;?>" style="color:#CCCCCC;"><?php echo $MainMenuOPtion2NotDataAjax['menuBaseName']; ?></label></div>
<div class="right" style="color:#CCCCCC;"><?php echo number_format($MainMenuOPtion2NotDataAjax['menuBasePrice'],2); ?> &euro;</div></div>
<?php 
$i++;

}
 ?>

</div>
</div></td>
  </tr>
  
 