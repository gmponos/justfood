<?php 
include("route/config1.php");
mysql_query ("set character_set_results='utf8'");
$TableLanguage=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate where id='1'"));
 
$cate_id=@$_REQUEST['q'];
$qry1=mysql_query("SELECT * FROM `tbl_city` where `stateID` ='$cate_id'");
if(mysql_num_rows($qry1)>0)
{
?>
<form action="" method="post" id="userform" name="userform">
<select class="chzn-select" name="cityName" id="cityName"  style="width:180px;" onChange="document.userform.submit();">
<option value=""><?php echo ucwords($TableLanguage['SelectCityText']);?></option> 
<?php 
while($res1=mysql_fetch_array($qry1))
{
?>
<option value="<?php echo $res1['cityName']; ?>"><?php echo ucwords($res1['cityName']); ?> </option>                     
<?php } ?>
</select>	 
<?php } else {?>
There is no <?php echo ucwords($TableLanguage['SelectCityText']);?>
<?php }?>
</form>