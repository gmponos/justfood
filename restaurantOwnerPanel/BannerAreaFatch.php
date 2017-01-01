<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 

$cate_id=@$_REQUEST['c'];
$qry1=mysql_query("SELECT * FROM `tbl_PostcodeArea` where `cityName` =N'$cate_id'");
if(mysql_num_rows($qry1)>0)
{
?>
<form action="" method="post" id="userform" name="userform">
<select  name="BannerByArea" id="BannerByArea"  style="width:317px;" >
<option value="">First Select City</option> 
<?php 
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['delivery_areaName']; ?>"><?php echo ucwords($res1['delivery_areaName']); ?> </option>                     
<?php } ?>
</select>	 
<?php } else {?>
There is no Area
<?php }?>
</form>