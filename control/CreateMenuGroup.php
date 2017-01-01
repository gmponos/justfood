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
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemdough where menuDoughName=N'".$SizeMenuName."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_POST['MenuSizeID']."' "));

if($SizeNumROws>0){

$msg="Menu Dough is already available in this menu item";

}
else
{
$query_sel_max="select MAX(doughPosition) from tbl_restaurantMainMenuItemdough  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_POST['menuSizeID']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(doughPosition)'];
 $product_id= $product_id+1;
 
$menuDoughQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemdough` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `OptionOneTitle`,`menuDoughName`, `menuDoughPrice`, `menuDoughDescription`, `doughPosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."',N'$OptionOneTitle', N'$menuDoughName', '".$menuDoughPrice."', N'".$menuDoughDescription."','$product_id')");

$msg="Menu Dough has been successfully saved ! add another Dough Name";
}
}
 ?>
 










			
<div class="row-fluid" >
  <div  class=" span12">
  <?php if($msg!=''){ ?>
 <div align="center" style="color:#000099; font-size:14px; padding:10px;"><?php echo $msg;?></div>
 
 <?php } ?> 
 
    <form id="SignupForm"  method="post" enctype="multipart/form-data">
      <table  align="center" border="0">
        <tr>
          <td><label for="OptionOneTitle">Group Size</label></td>
          <td><select  required  id="MenuSizeID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="MenuSizeID" style="width:317px;">
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
                                              	  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemSize where status='0' group by SizeMenuName");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id'];?>" <?php if($_GET['menuSizeID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['SizeMenuName']); ?></option>
                                              <?php } ?>
                                              
                                              <?php } ?>
            </select></td>
         
        </tr>
        <tr style="display:none;">
          <td><label for="OptionOneTitle">Option Title </label></td>
          <td><input  name="OptionOneTitle" onMouseOver="return clearFieldValue(this);" value="Select Dough" onClick="return clearFieldValue(this);" id="OptionOneTitle"  type="text"   style="width:300px;"/></td>
         
        </tr>
        <tr>
          <td><label for="menuDoughName">Option Name </label></td>
          <td><input  name="menuDoughName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuDoughName" value=""  type="text"   style="width:300px;"/></td>
         
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
         <td><label for="SizeMenuPrice">Option Price</label></td>
          <td><input  name="menuDoughPrice" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuDoughPrice" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr>
        
          <td colspan="2"><textarea style="width:400px; height:100px;" placeholder="Option Description" id="menuDoughDescription" name="menuDoughDescription"></textarea></td>
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
