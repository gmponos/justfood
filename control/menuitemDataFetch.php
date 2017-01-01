<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_restaurantMainMenuItem` where `RestaurantCategoryID` ='$cate_id'");

?>
<form action="" method="post">
<select class="chzn-select" name="RestaurantMenuItem[]" multiple id="RestaurantMenuItem"  style="width:300px;" onChange="getrestaurantMenuItem(this.value)">
<?php 
if(mysql_num_rows($qry1)>0)
{
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['id']; ?>"><?php echo ucwords($res1['RestaurantPizzaItemName']); ?> </option>                     
<?php } ?>
 <?php } else {?>
<option value="">There is no Menu Product Item</option>
</select>
<?php 
}?>
</form>