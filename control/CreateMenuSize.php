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
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeMenuName=N'".$SizeMenuName."' and SizeRestaurantMenuItemID='".$_GET['MenuID']."' "));

if($SizeNumROws>0){

$msg="Size Name is already available in this menu item";

}
else
{
$query_sel_max="select MAX(sizePosition) from tbl_restaurantMainMenuItemSize  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and SizeRestaurantMenuItemID='".$_GET['MenuID']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(sizePosition)'];
 $product_id= $product_id+1;
 
$MenuSizeQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemSize` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `SizeRestaurantMenuItemID`, `SizeMenuName`, `SizeMenuPrice`, `SizeMenuDescription`,`sizePosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', N'$SizeMenuName', '".$SizeMenuPrice."', N'".$SizeMenuDescription."','$product_id')");

$msg="Size Name has been successfully saved ! add another Size Name";
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
          <td><label for="SizeMenuName">Size Name </label></td>
          <td><input  name="SizeMenuName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="SizeMenuName" value=""  type="text"   style="width:300px;"/></td>
         
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
         <td><label for="SizeMenuPrice">Size Price</label></td>
          <td><input  name="SizeMenuPrice" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="SizeMenuPrice" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="2"><textarea style="width:400px; height:100px;" placeholder="Menu item Description" id="SizeMenuDescription" name="SizeMenuDescription"></textarea></td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><input id="" type="submit" class="btn btn-primary " value="Create Size Name" name="PizzaMenuSubmit"  /></td>
        </tr>
       
 
 
 
 
    
    <tr><td colspan="2">&nbsp;</td></tr>
    
    
      </table>
    </form>
    
    
    

    
  </div>
</div>
