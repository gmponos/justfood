<?php
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMenuItem","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}

extract($_POST);
$today=date('d l Y');
if(isset($_POST['PizzaMenuSubmit']))
{
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuBaseName=N'".$menuBaseName."' and menudoughID='".$_POST['menudoughID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_POST['menuSizeID']."' "));

if($SizeNumROws>0){

$msg="Menu Base is already available in this menu item";

}
else
{
$query_sel_max="select MAX(basePosition) from tbl_restaurantMainMenuItemPizzaBase  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' ";


$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(basePosition)'];
 $product_id= $product_id+1;

 
$menuBaseQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemPizzaBase` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `menudoughID`, `menuBaseName`, `menuBasePrice`, `menuBaseDescription`, `basePosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_GET['MenuSizeID']."', '".$_GET['menudoughID']."', N'$menuBaseName', '".$menuBasePrice."', N'".$menuBaseDescription."','$product_id')");

$msg="Menu Base has been successfully saved ! add another Base Name";
}
}
 ?>
 





<script  type="text/javascript"  language="javascript">
function getOrgTypeListGroupName(str){
if (str=="")
{
document.getElementById("menudoughID").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("menudoughID").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","DoughData.php?q="+str,true);
xmlhttp.send();
}

</script>




			
<div class="row-fluid" >
  <div  class=" span12">
  <?php if($msg!=''){ ?>
 <div align="center" style="color:#000099; font-size:14px; padding:10px;"><?php echo $msg;?></div>
 
 <?php } ?> 
 
    <form id="SignupForm"  method="post" enctype="multipart/form-data">
      <table  align="center" border="0">
        <tr>
          <td><label for="OptionOneTitle">Group Size</label></td>
          <td><select  required  id="MenuSizeID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menuSizeID" onChange="getOrgTypeListGroupName(this.value)" style="width:317px;">
          <option value="">Select</option>
           <?php 
		   $numSize =mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['MenuID']."' and status='0' order by SizeMenuName asc"));
		   if($numSize>0){
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['MenuID']."' and status='0' order by SizeMenuName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id'];?>" <?php if($_GET['menuSizeID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['SizeMenuName']); ?></option>
                                              <?php } ?>
                                              
                                              <?php } else { 
                                              	  $StateQuery22 =mysql_query("select * from tbl_restaurantMainMenuItemSize where status='0' group by SizeMenuName");
                                              while($StateData22=mysql_fetch_assoc($StateQuery22)){
											  ?>
                                              <option value="<?php echo $StateData22['id'];?>" <?php if($_GET['menuSizeID']==$StateData22['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['SizeMenuName']); ?></option>
                                              <?php } ?>
                                              
                                              <?php } ?>
            </select></td>
         
        </tr>
         <tr>
          <td><label for="OptionOneTitle">Group Name</label></td>
          <td><select  required  id="menudoughID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menudoughID" style="width:317px;">
          <option value="">Select</option>
             <?php 
			 if($_GET['menuSizeID']!=''){
											  $StateQuery111 =mysql_query("select * from tbl_restaurantMainMenuItemdough where menuSizeID='".$_GET['menuSizeID']."' order by menuDoughName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery111)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menudoughID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuDoughName']); ?></option>
                                              <?php }
											  }
											   ?>
            </select></td>
         
        </tr>
        
        <tr style="display:none;">
          <td><label for="OptionOneTitle">Option Title </label></td>
          <td><input  name="OptionOneTitle" onMouseOver="return clearFieldValue(this);" value="Select Base" onClick="return clearFieldValue(this);" id="OptionOneTitle"   type="text"   style="width:300px;"/></td>
         
        </tr>
        <tr>
          <td><label for="menuDoughName">Option Name </label></td>
          <td><input  name="menuBaseName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuBaseName" value=""  type="text"   style="width:300px;"/></td>
         
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
         <td><label for="SizeMenuPrice">Option Price</label></td>
          <td><input  name="menuBasePrice" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuBasePrice" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="2"><textarea style="width:400px; height:100px;" placeholder="Option Description" id="menuBaseDescription" name="menuBaseDescription"></textarea></td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><input id="" type="submit" class="btn btn-primary " value="Create Group Option" name="PizzaMenuSubmit"  /></td>
        </tr>
       
 
 
 
 
    
    <tr><td colspan="2">&nbsp;</td></tr>
    
    
      </table>
    </form>
    
    
    

    
  </div>
</div>
