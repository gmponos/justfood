<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_restaurantMainMenuItemPizzaBase` where `menudoughID` ='$cate_id'");

?>
<form action="" method="post">
<select  name="menubasedID" id="menubasedID"  style="width:300px;" onChange="getOrgTypeListGroupName3(this.value)">
<option value="">Select</option> 
<?php
if(mysql_num_rows($qry1)>0)
{ 
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['id']; ?>"><?php echo ucwords($res1['menuBaseName']); ?> </option>                     
<?php } ?>
<?php } else {?>
<option value="">There is no group</option>
<?php }?>
</select>
</form>