<?php 
include("config1.php");
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_restaurantDeliveryArea` where `restaurant_city` =N'$cate_id' group by restaurant_delivery_area");
?>
<form action="" method="get" id="userform" name="userform">
 <select id="RestaurantPostcode" class="txtbox" style="" name="RestaurantPostcode">
 <option value="">Select Your District</option> 
<?php 
if(mysql_num_rows($qry1)>0)
{
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['restaurant_delivery_area']; ?>" ><?php echo ucwords($res1['restaurant_postcode']); ?> (<?php echo ucwords($res1['restaurant_delivery_area']); ?>)</option>              
<?php } ?>
<?php } else {?>
<option value="">There is no District</option> 
<?php }?>
</select>
</form>