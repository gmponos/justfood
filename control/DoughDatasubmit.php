<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_restaurantMainMenuItemdough` where `menuSizeID` ='$cate_id'");

?>
<form action="" method="post">
<select  name="menudoughID" id="menudoughID"  style="width:300px;" onchange="submitURLdata(this.value,'<?php echo $_GET['menudoughID']?>','<?php echo $_GET['CategoryMenuID']?>','<?php echo $_GET['RestaurantID']?>','<?php echo $_GET['MenuID']?>');" >
<option value="">Select</option> 
<?php
if(mysql_num_rows($qry1)>0)
{ 
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['id']; ?>"><?php echo ucwords($res1['menuDoughName']); ?> </option>                     
<?php } ?>
<?php } else {?>
<option value="">There is no group</option>
<?php }?>
</select>
</form>