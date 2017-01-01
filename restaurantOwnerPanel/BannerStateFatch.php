<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 

$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_state` where `countryID` ='$cate_id'");
if(mysql_num_rows($qry1)>0)
{
?>
<form action="" method="post">
<select class="chzn-select" name="BannerByState" id="BannerByState"  style="width:300px;" onChange="getOrgTypeListRestCity(this.value)">
<option value="">First Select Country</option> 
<?php 
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['id']; ?>"><?php echo ucwords($res1['stateName']); ?> </option>                     
<?php } ?>
</select>	 
<?php } else {?>
There is no state/province
<?php }?>
</form>