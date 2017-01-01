<?php include('route/header.php'); 
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMainMenuItemdough","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
?>
<?php 
if($_GET['RestaurantID']!=''){
$StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['RestaurantID']));
}
if($_GET['MenuID']!=''){
$MenuData = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantMainMenuItem","id",$_GET['MenuID']));
}

if($_GET['CategoryMenuID']!=''){
$CategoryMenuData = mysql_fetch_assoc($dbb->showtabledata("tbl_restMenuCategory","id",$_GET['CategoryMenuID']));
}

if($_GET['CategoryMenuID']!=''){
$MenuSizeData = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantMainMenuItemSize","id",$_GET['menuSizeID']));
}

if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantMainMenuItemdough` WHERE `id` = '$id' ");
		
				             mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where menudoughID='$id'");
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where menudoughID='$id'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where menudoughID='$id'");
							
		
		if(!$query) { 
		
		header("location:displayMenuGroup.php?menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
		
	}
	}
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantMainMenuItemdough` set status='0' WHERE `id` = '$id' ");
		if(!$query) { 
			header("location:displayMenuGroup.php?menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
		}
	}
	
	 // redirent after deleting
}


if(isset($_POST['dactivateall'])) 
{
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantMainMenuItemdough` set status='1' WHERE `id` = '$id' ");
		if(!$query) 
		{ 
			header("location:displayMenuGroup.php?menuSizeID=".$_GET['menuSizeID']."&MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
		}
	}
	
	 // redirent after deleting
}


extract($_POST);
$today=date('d l Y');
if(isset($_POST['PizzaMenuDoughSizeSubmit']))
{
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemdough where menuDoughName=N'".mysql_real_escape_string($menuDoughName)."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' and  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' "));

if($SizeNumROws>0){

$error="Menu Dough is already available in this menu item";

}
else
{

 $query_sel_max="select MAX(doughPosition) from tbl_restaurantMainMenuItemdough  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(doughPosition)'];
  $product_id= $product_id+1;

 
$menuDoughQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemdough` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `OptionOneTitle`,`menuDoughName`, `menuDoughPrice`, `menuDoughDescription`,`doughPosition`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."',N'$OptionOneTitle', N'".mysql_real_escape_string($menuDoughName)."', '".$menuDoughPrice."', N'".mysql_real_escape_string($menuDoughDescription)."','$product_id')");


$msg="Menu Dough has been successfully saved ! add another Dough Name";
}
}
extract($_POST);
if(isset($_POST['EditDoughPizzaMenuSizeSubmitDatat']))
{
/*$doughNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemdough where doughPosition='".$doughPosition."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_POST['MenuSizeID']."' "));

if($doughNumROws>0){

$error="Menu Dough Position is already available in this menu item";

}
else
{
*/
$MenuSizeQuery=mysql_query("update tbl_restaurantMainMenuItemdough set menuDoughName=N'".mysql_real_escape_string($menuDoughName)."' ,menuDoughPrice='$menuDoughPrice',menuDoughDescription=N'".mysql_real_escape_string($menuDoughDescription)."',doughPosition='$doughPosition',menuSizeID=N'".$_POST['MenuSizeID']."' where id='".$_GET['eid']."'");
$upmsg="Menu Dough Name has been successfully updated ! add another Size Name";
//}
}
 ?>
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="../colorbox/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script> 

<script src="../colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				$(".iframe").colorbox({iframe:true, width:"550px", height:"400px"});
				$(".iframe2").colorbox({iframe:true, width:"620px", height:"600px"});
				$(".iframe3").colorbox({iframe:true, width:"620px", height:"600px"});
				$(".iframe4").colorbox({iframe:true, width:"620px", height:"600px"});
				
				$(".iframe5").colorbox({iframe:true, width:"680px", height:"700px"});
				
				 
			});
			</script>
            <script language="JavaScript" type="text/JavaScript"> 
function isNumber(field) { 
        var re = /^[0-9-'.'-',']*$/; 
        if (!re.test(field.value)) { 
            alert('Value must be all numberic charcters, including "." non numerics will be removed from field!'); 
            field.value = field.value.replace(/[^0-9-'.'-',']/g,""); 
        } 
    } 
</script> 
	<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>

		<div id="main-content">
			<div id="inner">
				<p style=" margin-left:8px;margin-top:15px; font-size:14px;"><a href="webindex.php">Home</a> &raquo; <a href="manage_restaurant_options.php"><?php echo ucwords($StQuery['restaurant_name']); ?></a> &raquo; <a href="menu-entry-create-categories.php?RestaurantPizzaID=<?php echo $_GET['RestaurantID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($CategoryMenuData['restaurantMenuName']); ?></a> &raquo; <a href="qc_menu_entry.php?RestaurantPizzaID=<?php echo $_GET['RestaurantID'];?>&RestaurantCategoryID=<?php echo $_GET['CategoryMenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?></a> &raquo; <a href="displayMenuSize.php?RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($MenuSizeData['SizeMenuName']); ?></a></p>
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>  
 <?php if($_GET['eid']!=''){ ?>                                                  
Update Option Name for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } else {?>
Setup New Option Name for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } ?>
</li>
						</ul>
                        
                        
			

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">
<?php if($_GET['eid']!=''){ ?>                                                  
Update Option Name for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } else {?>
Setup New Option Name for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } ?>
</a>
											</div>
										</div>
										 <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Food Item Option has been successfully saved
		                                     </div>
											<?php } if($error!=''){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Food Item Option is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($upmsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Item Option has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                                
										<div class="row-fluid" >
  <div  class=" span12">
 <script type="text/javascript">
 function redirec(srt)
 {
 window.location="displayMenuGroup.php?menuSizeID="+srt+"&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID']; ?>&MenuID=<?php echo $_GET['MenuID']; ?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>";
 }
 </script>
 
    <form id="SignupForm"  method="post" enctype="multipart/form-data">
      <table  align="center" border="0">
        <tr>
          <td><label for="OptionOneTitle">Food Group Size</label></td>
          <td><select  required  id="MenuSizeID" onchange="redirec(this.value)" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="MenuSizeID" style="width:317px;">
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
          <td><label for="menuDoughName">Food Option Name </label></td>
          <td><input  name="menuDoughName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuDoughName" value="<?php echo $CuisineData['menuDoughName'];?>"  type="text"   style="width:300px;"/></td>
         
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
         <td><label for="menuDoughPrice">Food Option Price</label></td>
          <td><input  name="menuDoughPrice" required onkeyup="isNumber(this)" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuDoughPrice" value="<?php echo $CuisineData['menuDoughPrice'];?>"  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <?php if($_GET['eid']!=''){ ?>
        <tr>
         <td><label for="doughPosition">Food Option Position</label></td>
          <td><input  name="doughPosition" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="doughPosition" value="<?php echo $CuisineData['doughPosition'];?>"  type="text"   style="width:300px;"/></td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <?php } ?>
        <tr>
        <td><label for="menuDoughPrice">Option Description</label></td>
          <td ><textarea style="width:400px; height:100px;" placeholder="Option item Description" id="menuDoughDescription" name="menuDoughDescription"><?php echo $CuisineData['menuDoughDescription'];?></textarea></td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
          <?php if($_GET['eid']!=''){ ?>
   <input id="" type="submit" class="btn btn-primary " value="Edit Restaurant Food Item Option" name="EditDoughPizzaMenuSizeSubmitDatat" style="margin-left:350px;" />

  <?php } else { ?>
    <input id="" type="submit" class="btn btn-primary " value="Add New Restaurant Food Item Option" name="PizzaMenuDoughSizeSubmit" style="margin-left:350px;" />

  <?php } ?> 
         </td>
        </tr>
       
 
 
 
 
    
    <tr><td colspan="2">&nbsp;</td></tr>
    
    
      </table>
    </form>
    
    
    

    
  </div>
</div>
                                        
                                        
                                        
                                        <div class="row-fluid" id="manage">
    <div class="span12">
       <div>  
										
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success" style="width:100%; padding:10px;">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Item Option has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success" style="width:100%; padding:10px;">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Item Option has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
    
    <?php 
	if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="doughPosition";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantMainMenuItemdough";
		$PagingCity="&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state'];
		if($_GET['RestaurantID']!='' && $_GET['CategoryMenuID']!='' && $_GET['MenuID']!='' && $_GET['menuSizeID']!='')
		{
		
		$where="SizeRestaurantPizzaID='".$_GET['RestaurantID']."' and SizeRestaurantCategoryID='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."'";
		
		$url="displayMenuGroup.php?RestaurantID=".$_GET['RestaurantID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&MenuID=".$_GET['MenuID']."&menuSizeID=".$_GET['menuSizeID'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where SizeRestaurantPizzaID='".$_GET['RestaurantID']."' and SizeRestaurantCategoryID='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' and menuSizeID='".$_GET['menuSizeID']."' $sortBy LIMIT  {$startpoint} , {$limit}";
		}
		else
		{
		$where="SizeRestaurantPizzaID='".$_GET['RestaurantID']."' and SizeRestaurantCategoryID='".$_GET['CategoryMenuID']."'  and menuitemID='".$_GET['MenuID']."'";
		$url="displayMenuGroup.php?RestaurantID=".$_GET['RestaurantID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&MenuID=".$_GET['MenuID'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where SizeRestaurantPizzaID='".$_GET['RestaurantID']."' and SizeRestaurantCategoryID='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."' $sortBy LIMIT  {$startpoint} , {$limit}";
		}
		
		//echo $qur;
	$MenuITemQuery=mysql_query($qur);
 
 $numrowdata=mysql_num_rows($MenuITemQuery);
	?>
       <script type="text/javascript">
function submitURL(Dvalue,str,restaurantMenuID1,RestaurantCategoryID1,statusid1,menuSizeID1)
{
window.location.href="displayMenuGroup.php?restaurant_state=<?php echo $_GET['restaurant_state']?>&restaurant_city=<?php echo $_GET['restaurant_city']?>&RestaurantID="+restaurantMenuID1+"&CategoryMenuID="+RestaurantCategoryID1+"&MenuID="+statusid1+"&menuSizeID="+menuSizeID1+"&sort="+str+"&f="+Dvalue
}
											 </script>
	
    <form name="frmproduct" method="post">               
		   <table width="100%" border="0" class="table table-bordered">
            <?php if($numrowdata>0){ ?>
                                              <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Food Item Option" value="Delete All" onClick="return confirm('Are you Sure to  Restaurant Food Item Option(s) to delete.');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Food Item" value="Activate All" onClick="return confirm('Are you Sure to  Restaurant Food Item Option(s) to activated.');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Food Item Option" value="Deactivate All" onClick="return confirm('Are you Sure to  Restaurant Food Item Option(s) to Deactivated.');"  type="submit"></td></tr>
                                                    <?php }  ?>
  <tr>
   <th width="5%"><input type="checkbox" id="check_all" value=""></th>
<!--    <th width="10%"><strong style="color:#0033FF;">Item Name</strong></th>
-->     <th width="7%"> <?php
													if($_GET['sort']=='asc'){
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													elseif($_GET['sort']=='desc'){
													$pl='asc';
													$imgSort='<img src="sortdesc.png" style="float:right;" />';
													}
													else
													{
													$pl='asc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
  <a onclick="submitURL('menuDoughName','<?php echo $pl;?>','<?php echo $_GET['RestaurantID'];?>','<?php echo $_GET['CategoryMenuID'];?>','<?php echo $_GET['MenuID'];?>','<?php echo $_GET['menuSizeID'];?>');" style="cursor:pointer;">Name <?php echo $imgSort;?> </a></strong></th>
    <th width="6%"><strong style="color:#0033FF;">  <a onclick="submitURL('menuDoughPrice','<?php echo $pl;?>','<?php echo $_GET['RestaurantID'];?>','<?php echo $_GET['CategoryMenuID'];?>','<?php echo $_GET['MenuID'];?>','<?php echo $_GET['menuSizeID'];?>');" style="cursor:pointer;">Price <?php echo $imgSort;?> </a></strong></th>
     <th width="6%"><strong style="color:#0033FF;">  <a onclick="submitURL('doughPosition','<?php echo $pl;?>','<?php echo $_GET['RestaurantID'];?>','<?php echo $_GET['CategoryMenuID'];?>','<?php echo $_GET['MenuID'];?>','<?php echo $_GET['menuSizeID'];?>');" style="cursor:pointer;">Postion <?php echo $imgSort;?> </a></strong></th>
    <th width="62%" colspan="2"><strong style="color:#0033FF;"><a  style="cursor:pointer;">Action</a></strong></th>
  </tr>
  <tr><td colspan="5"></td></tr>
  <?php 
  
            //show records
            if($numrowdata>0)
			{
            $count=1;
        	 while($menuData=mysql_fetch_assoc($MenuITemQuery)){ 
 
  ?>
  <tr>
  
     <td><input type="checkbox" value="<?php echo $menuData['id']; ?>" name="data[]" id="data"></td>
    <?php /*?> <td><?php echo ucwords($menuData['SizeRestaurantMenuItemID']);?></td><?php */?>
    <td><?php echo ucwords($menuData['menuDoughName']);?></td>
    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
	if($menuData['menuDoughPrice']!=''){
	echo number_format($menuData['menuDoughPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?></td>
    <td><?php echo ucwords($menuData['doughPosition']);?></td>
    
    <td>
<a href="displayMenuanotherGroup.php?menudoughID=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" >Create/View Food Another Group</a>
 </p>
     
     <a href="displayMenuanotherGroup1.php?menudoughID=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" >Create/View Food Group within  Group</a>
  
            <a href="DisplayExtraMatrialItemgroup.php?menudoughID=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-tigadelapan" style="margin-top:10px;" >Create/View Extra Topping</a>           
   

   </td>
   <td>  <a href="displayMenuGroup.php?eid=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-primary" title="Edit Restaurant Food Item Option">Edit</a>
						
                        <a href="InsertPhp.php?tag=ResMenuItemDoughPizzaDelete&eid=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" onClick="return confirm('Are you sure to do this action.');" title="Delete Restaurant Food Item Option">Delete</a>
                        
                         <?php if($menuData['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuItemDoughPizzaActivate&active=1&statusid=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item Option">Activated</a>
						<?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuItemDoughPizzaActivate&active=0&statusid=<?php echo $menuData['id'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item Option">
                        Deactivated</a>
                          <?php } ?></td>
   </tr>
    
     <?php
												$count++;
												 }
												 
												 } else { 
												  ?>
                                                <tr><td colspan="6" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Food Item Group Option is available in current Database.</strong></td></tr>
                                                <?php } ?>
</table>
                                      
		</form>
          <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php echo pagination($statement,$where,$limit,$page,$url);?></td></tr>
                                        </table>
	</div>
</div>
                                        
                                        
                                        
                                        
                                        
                                        
									</div>
								
									
									
									
								
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include('route/footer.php'); ?>

	<!-- required js files -->
	<script src="assets/js/bootstrap.min.js"></script>	

	
	<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
	<!-- form plugins -->
	<script src="app/plugins/jquery.elastic.js"></script>
	<script src="app/plugins/jquery.uniform.js"></script>
	<script src="app/plugins/bootstrap-datepicker.js"></script>
	<script src="app/plugins/jquery.timePicker.min.js"></script>
	<script src="app/plugins/jquery.simple-color-picker.js"></script>
	<script src="app/plugins/chosen.jquery.min.js"></script>
	<script src="app/plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
	<script src="app/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="app/plugins/formToWizard.js"></script>
	
	<!-- other plugins -->
	<script src="app/plugins/DataTables/media/js/jquery.dataTables.js"></script>	
	

	<!-- js for templates -->
	<script src="app/js/custom.js"></script>
</body>
</html>
