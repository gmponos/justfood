<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_restMenuCategory` where `restaurantMenuID` ='$cate_id'");

?>
<form action="" method="post">
<select class="chzn-select" name="RestaurantCategoryID" id="RestaurantCategoryID"  style="width:300px;" onChange="getrestaurantMenuItem(this.value)">
<option value="">Select</option> 
<?php 
if(mysql_num_rows($qry1)>0)
{
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['id']; ?>"><?php echo ucwords($res1['restaurantMenuName']); ?> </option>                     
<?php } ?>
 <?php } else {?>
<option value="">There is no Menu Categroy</option>
</select>
<?php 
}?>
</form>