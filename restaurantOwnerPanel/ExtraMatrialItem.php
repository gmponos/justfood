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
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuExtraName=N'".$menuExtraName."' and menuitemID='".$_GET['MenuID']."' "));

if($SizeNumROws>0){

$msg="Extra Materials is already available in this menu item";

}
else
{

if($_POST['menuExtrawithprice']!='')
{
$menuExtrawithprice=implode(',',$_POST['menuExtrawithprice']);
}

$query_sel_max="select MAX(extraPosition) from tbl_restaurantMainMenuItemPizzaExtraitem  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."'  ";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(extraPosition)'];
 $product_id= $product_id+1;
 
$menuExtraQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemPizzaExtraitem` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `menudoughID`, `menubasedID`, `menuCheesID`, `menuExtraName`, `menuExtraPrice`,`menuExtraQuantity`,`menuExtraChecked`,`menuExtraDescription`, `menuExtrawithprice`,`extraPosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."', '".$_POST['menudoughID']."', '".$_POST['menubasedID']."', '$MenuCheesP', '$menuExtraName', '".$menuExtraPrice."','$menuExtraQuantity','$menuExtraChecked','$menuExtraDescription','$menuExtrawithprice','$product_id')");

if($_POST['menuExtrawithprice']!='')
{
$id_array = $_POST['menuExtrawithprice']; // return array
	$id_count = count($_POST['menuExtrawithprice']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$ExtraItem = mysql_fetch_assoc(mysql_query("select *  FROM `tbl_menuAddON` WHERE `id` = '$id'"));


$menuExtraQuery2=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemPizzaExtraitem` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `menudoughID`, `menubasedID`, `menuCheesID`, `menuExtraName`, `menuExtraPrice`,`menuExtraDescription`, `menuExtrawithprice`,`extraPosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."', '".$_POST['menudoughID']."', '".$_POST['menubasedID']."', '$MenuCheesP', N'".$ExtraItem['MenuAddOnName']."', N'".$ExtraItem['MenuAddOnPrice']."', N'$menuExtraDescription', N'$menuExtrawithprice','$product_id');");
}
}

$msg="Extra Materials has been successfully saved ! add another Extra Materials";
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
xmlhttp.open("post","DoughData2.php?q="+str,true);
xmlhttp.send();
}



function getOrgTypeListGroupName2(str){
if (str=="")
{
document.getElementById("menubasedID").innerHTML="";
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
document.getElementById("menubasedID").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cheesData.php?q="+str,true);
xmlhttp.send();
}
function getOrgTypeListGroupName3(str){
if (str=="")
{
document.getElementById("menuCheesID").innerHTML="";
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
document.getElementById("menuCheesID").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cheesData2.php?q="+str,true);
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
          <td><select    id="MenuSizeID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="MenuSizeID" onChange="getOrgTypeListGroupName(this.value)" style="width:317px;">
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
         <tr>
          <td><label for="OptionOneTitle">Group Name</label></td>
          <td><select    onChange="getOrgTypeListGroupName2(this.value)" id="menudoughID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menudoughID" style="width:317px;">
          <option value="">Select</option>
             <?php 
			 if($_GET['menuSizeID']!=''){
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemdough where menuSizeID='".$_GET['menuSizeID']."' order by menuDoughName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menuSizeID']==$StateData['menuSizeID']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuDoughName']); ?></option>
                                              <?php }
											  }
											   ?>
            </select></td>
         
        </tr>
        
          <tr>
          <td><label for="OptionOneTitle">Another Group Name</label></td>
          <td><select    id="menubasedID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menubasedID" style="width:317px;" onChange="getOrgTypeListGroupName3(this.value)">
          <option value="">Select</option>
            <?php 
			 if($_GET['menubasedID']!=''){
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuSizeID='".$_GET['menuSizeID']."' and menudoughID='".$_GET['menudoughID']."' order by menuBaseName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menudoughID']==$StateData['menudoughID']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuBaseName']); ?></option>
                                              <?php }
											  }
											   ?>
            </select></td>
         
        </tr>
        
         <tr>
          <td><label for="OptionOneTitle">Group within another</label></td>
          <td><select    id="menuCheesID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menuCheesID" style="width:317px;">
          <option value="">Select</option>
            <?php 
			 if($_GET['menuCheesID']!=''){
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuSizeID='".$_GET['menuSizeID']."' and menubasedID='".$_GET['menubasedID']."'  order by menuCheesName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menuCheesID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuCheesName']); ?></option>
                                              <?php }
											  }
											   ?>
            </select></td>
         
        </tr
      
        ><tr>
          <td><label for="menuExtraName">Material Name </label></td>
          <td><input  name="menuExtraName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraName" value=""  type="text"   style="width:300px;"/></td>
         
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
         <td><label for="menuExtraPrice">Material Price</label></td>
          <td><input  name="menuExtraPrice" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraPrice" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
         <tr>
         <td><label for="menuExtraPrice">Material Checked or Not ?</label></td>
          <td><table width="100%" border="0">
  <tr>
    <td><input type="radio" name="menuExtraChecked" id="menuExtraChecked" value="1" />Yes </td>
    <td><input type="radio" name="menuExtraChecked" id="menuExtraChecked" value="0" checked="checked" />No</td>
  </tr>
</table>
</td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr>
         <td><label for="menuExtraPrice">Material Quantity</label></td>
          <td><input  name="menuExtraQuantity" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="Quantity" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="2"><textarea style="width:400px; height:100px;" placeholder="Material Description" id="menuExtraDescription" name="menuExtraDescription"></textarea></td>
        </tr>
        
        <tr><td colspan="2"></td></tr>
        
         <tr><td colspan="2"><strong>Choose Materials</strong></td></tr>
        <tr><td colspan="2">
        <table width="100%" cellpadding="2" cellspacing="2">
  <tr>
<?php 
 $c=1;
  $ExtraploDough888=mysql_query("select * from tbl_menuAddON  order by MenuAddOnName asc");
   while($ExtraMainMenuOPtion1Data=mysql_fetch_assoc($ExtraploDough888)){
  ?>

    <td>
	<input type="checkbox" name="menuExtrawithprice[]" id="menuExtrawithprice" value="<?php echo $ExtraMainMenuOPtion1Data['id'];?>" />&nbsp;
	<?php echo $ExtraMainMenuOPtion1Data['MenuAddOnName'];?>  &nbsp;(<?php 
	if($ExtraMainMenuOPtion1Data['MenuAddOnPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1Data['MenuAddOnPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?> &euro;)
      </td>
    
  <?php if($c==3) { echo "</td></tr><tr><td></td></tr>"; $c= 0; } ?>  
 <?php $c++;}?> 
 
 
 </tr>
</table>
        
        </td></tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><input id="" type="submit" class="btn btn-primary " value="Create Material" name="PizzaMenuSubmit"  /></td>
        </tr>
       
 
 
 
 
    
    <tr><td colspan="2">&nbsp;</td></tr>
    
    
      </table>
    </form>
    
    
    

    
  </div>
</div>
