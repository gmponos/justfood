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
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuCheesName=N'".$menuCheesName."' and menudoughID='".$_POST['menudoughID']."' and menubasedID='".$_POST['menubasedID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_POST['menuSizeID']."' "));

if($SizeNumROws>0){

$msg="Menu Chees is already available in this menu item";

}
else
{
$query_sel_max="select MAX(cheesPosition) from tbl_restaurantMainMenuItemPizzaChees  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_POST['menuSizeID']."' and menudoughID='".$_POST['menudoughID']."' and menubasedID='".$_POST['menubasedID']."' ";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(cheesPosition)'];
 $product_id= $product_id+1;
 
$menuCheesQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemPizzaChees` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `menudoughID`, `menubasedID`, `menuCheesName`,`OptionThreeTitle`, `menuCheesPrice`, `menuCheesDescription`, `cheesPosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."', '".$_POST['menudoughID']."', '".$_POST['menubasedID']."',N'$menuCheesName',N'$menuCheesName', '".$menuCheesPrice."', N'".$menuCheesDescription."','$product_id')");



$msg="Menu Chees has been successfully saved ! add another Chees Name";
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

</script>


<link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example1/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
	

			
<div class="row-fluid" >
  <div  class=" span12">
  <?php if($msg!=''){ ?>
 <div align="center" style="color:#000099; font-size:14px; padding:10px;"><?php echo $msg;?></div>
 
 <?php }
 //echo $_GET['CategoryMenuID'];
 //echo $_GET['RestaurantID'];
  ?> 
 
    <form id="SignupForm"  method="post" enctype="multipart/form-data">
      <table  align="center" border="0">
        <tr>
          <td><label for="OptionOneTitle">Group Size</label></td>
          <td><select  required  id="MenuSizeID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="MenuSizeID" onChange="getOrgTypeListGroupName(this.value)" style="width:317px;">
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
          <td><select  required  onChange="getOrgTypeListGroupName2(this.value)" id="menudoughID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menudoughID" style="width:317px;">
          <option value="">Select</option>
            <?php 
			 if($_GET['menuSizeID']!=''){
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemdough where menuSizeID='".$_GET['menuSizeID']."' order by menuDoughName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menudoughID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuDoughName']); ?></option>
                                              <?php }
											  }
											   ?>
            </select></td>
         
        </tr>
        
          <tr>
          <td><label for="OptionOneTitle">Another Group Name</label></td>
          <td><select  required  id="menubasedID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menubasedID" style="width:317px;">
          <option value="">Select</option>
            <?php 
			 if($_GET['menubasedID']!=''){
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuSizeID='".$_GET['menuSizeID']."' and menudoughID='".$_GET['menudoughID']."' order by menuBaseName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menubasedID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuBaseName']); ?></option>
                                              <?php }
											  }
											   ?>
            </select></td>
         
        </tr>
        
        <tr style="display:none;">
          <td><label for="OptionOneTitle">Option Title </label></td>
          <td><input  name="OptionThreeTitle" onMouseOver="return clearFieldValue(this);" value="Select Chees" onClick="return clearFieldValue(this);" id="OptionOneTitle"   type="text"   style="width:300px;"/></td>
         
        </tr>
        <tr>
          <td><label for="menuDoughName">Option Name </label></td>
          <td><input  name="menuCheesName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuCheesName" value=""  type="text"   style="width:300px;"/></td>
         
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
         <td><label for="SizeMenuPrice">Option Price</label></td>
          <td><input  name="menuCheesPrice" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuCheesPrice" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="2"><textarea style="width:400px; height:100px;" placeholder="Option Description" id="menuCheesDescription" name="menuCheesDescription"></textarea></td>
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
