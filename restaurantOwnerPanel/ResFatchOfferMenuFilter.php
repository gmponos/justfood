<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_restaurantAdd` where `restaurantCity` =N'$cate_id' order by restaurant_name asc");

?>
<form action="" method="post">
<select onChange="document.userform.submit();"  id="RestaurantPizzaID" name="RestaurantPizzaID" onchange="submitMenuCategory(this.value);" style="width:180px;">
<option value="">Select</option> 
<?php 
if(mysql_num_rows($qry1)>0)
{
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['id']; ?>"><?php echo ucwords($res1['restaurant_name']); ?> </option>                     
<?php } ?>
<?php } else {?>
<option value="">There is no restaurant</option>
<?php }?>
</select>
</form>