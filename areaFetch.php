<?php 
include("config1.php");
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_PostcodeArea` where `cityName` ='$cate_id'");

?>
<form action="" method="get" id="userform" name="userform">
<select class="dpdn select_box" id="RestaurantPostcode" name="RestaurantPostcode" >
<option value="">Select</option> 
<?php 
if(mysql_num_rows($qry1)>0)
{
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['delivery_areaName']; ?>"><?php echo ucwords($res1['delivery_areaName']); ?> </option>                     
<?php } ?>
<?php } else {?>
<option value="">There is no area</option> 
<?php }?>
</select>
</form>