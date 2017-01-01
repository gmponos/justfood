<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_city` where `stateID` ='$cate_id'");

?>
<form action="" method="post">
<select  data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_city" name="restaurant_city" style="width:180px;">
<option value="">Select</option> 
<?php 
if(mysql_num_rows($qry1)>0)
{
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['cityName']; ?>"><?php echo ucwords($res1['cityName']); ?> </option>                     
<?php } ?>
<?php } else {?>
<option value="">There is no city</option>
<?php }?>
</select>
</form>