<?php include('route/header.php'); 
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMainMenuItemPizzaExtraitemGroup","id",$_GET['eid']);
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

if($_GET['menudoughID']!=''){
$DoughSizeData = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantMainMenuItemdough","id",$_GET['menudoughID']));
}

if($_GET['menubasedID']!=''){
$BaseSizeData = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantMainMenuItemPizzaBase","id",$_GET['menubasedID']));
}

if($_GET['menuCheesID']!=''){
$CheesSizeData = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantMainMenuItemPizzaChees","id",$_GET['menuCheesID']));
}


if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantMainMenuItemPizzaExtraitemGroup` WHERE `id` = '$id' ");
		  
		if(!$query) { 
		
		header("location:DisplayExtraMatrialItemgroup.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
		
	}
	}
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantMainMenuItemPizzaExtraitemGroup` set status='0' WHERE `id` = '$id' ");
		if(!$query) { 
			header("location:DisplayExtraMatrialItemgroup.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
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
		$query = mysql_query("update `tbl_restaurantMainMenuItemPizzaExtraitemGroup` set status='1' WHERE `id` = '$id' ");
		if(!$query) 
		{ 
	header("location:DisplayExtraMatrialItemgroup.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
		}
	}
	
	 // redirent after deleting
}


extract($_POST);
$today=date('d l Y');
if($_GET['menuSizeID']!='')
   {
   $menuSizeID1=" and menuSizeID='".$_GET['menuSizeID']."'";
   }
   if($_GET['menudoughID']!='')
   {
   $menubasedID1=" and menudoughID='".$_GET['menudoughID']."'";
   }
   if($_GET['menubasedID']!='')
   {
   $menubasedID1=" and menubasedID='".$_GET['menubasedID']."'";
   }
   if($_GET['menuCheesID']!='')
   {
   $menuCheesID1=" and menuCheesID='".$_GET['menuCheesID']."'";
   }

if(isset($_POST['ExtraPizzaMenuSubmit']))
{
$SizeNumROws=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuExtraName=N'".$menuExtraName."' and menuitemID='".$_GET['MenuID']."' $menuSizeID1  $menubasedID1 $menubasedID1  $menuCheesID1"));

if($SizeNumROws>0){

$error="Extra Materials is already available in this menu item";

}
else
{

if($_POST['menuExtrawithprice']!='')
{
$menuExtrawithprice=implode(',',$_POST['menuExtrawithprice']);
}

$query_sel_max="select MAX(extraPosition) from tbl_restaurantMainMenuItemPizzaExtraitemGroup  WHERE  SizeRestaurantPizzaID = '".$_GET['RestaurantID']."' and SizeRestaurantCategoryID ='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."'  $menuSizeID1  $menubasedID1 $menubasedID1  $menuCheesID1";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(extraPosition)'];
 $product_id= $product_id+1;
 
 
if($_POST['menuExtraName']!='' && $_POST['menuExtraPrice']!=''){
$menuExtraName=implode(',',$_POST['menuExtraName']);
$menuExtraPrice=implode(',',$_POST['menuExtraPrice']);
$menuExtradesc=implode(',',$_POST['menuExtradesc']);
$menuExtraChecked=implode(',',$_POST['menuExtraChecked']);
}

	$rrr=explode(",",rtrim($menuExtraName,','));
	 $rtt=explode(",",rtrim($menuExtraPrice,','));
	  $rtst=explode(",",rtrim($menuExtradesc,','));
	  $rtstCheck=explode(",",rtrim($menuExtraChecked,','));
	   foreach($rrr as  $yy=>$vvv)
		{

$menuExtraQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemPizzaExtraitemGroup` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `menudoughID`, `menubasedID`, `menuCheesID`, `menuExtraNameTitle`, `menuExtraName`, `menuExtraPrice`,`menuExtraQuantity`,`menuExtraChecked`,`menuExtraDescription`, `menuExtrawithprice`,`extraPosition`,`menuExtraMaxnumberCheckbox`,`GroupmenuExtraDescription`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."', '".$_POST['menudoughID']."', '".$_POST['menubasedID']."', '".$_POST['menuCheesID']."',N'$menuExtraNameTitle',  N'".mysql_real_escape_string($vvv)."', '".$rtt[$yy]."','$menuExtraQuantity','".$rtstCheck[$yy]."',N'".$rtst[$yy]."','$menuExtrawithprice','$product_id','$menuExtraMaxnumberCheckbox',N'".mysql_real_escape_string($GroupmenuExtraDescription)."')");
}

if($_POST['menuExtrawithprice']!='')
{
$id_array = $_POST['menuExtrawithprice']; // return array
	$id_count = count($_POST['menuExtrawithprice']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$ExtraItem = mysql_fetch_assoc(mysql_query("select *  FROM `tbl_menuAddON` WHERE `id` = '$id'"));


$menuExtraQuery2=mysql_query("INSERT INTO `tbl_restaurantMainMenuItemPizzaExtraitemGroup` (`id`, `SizeRestaurantPizzaID`, `SizeRestaurantCategoryID`, `menuitemID`, `menuSizeID`, `menudoughID`, `menubasedID`, `menuCheesID`, `menuExtraNameTitle`,`menuExtraName`, `menuExtraPrice`,`menuExtraDescription`, `menuExtrawithprice`,`extraPosition`,`menuExtraMaxnumberCheckbox`) VALUES (NULL, '".$_GET['RestaurantID']."', '".$_GET['CategoryMenuID']."', '".$_GET['MenuID']."', '".$_POST['MenuSizeID']."', '".$_POST['menudoughID']."', '".$_POST['menubasedID']."', '".$_POST['menuCheesID']."',N'$menuExtraNameTitle', N'".mysql_real_escape_string($ExtraItem['MenuAddOnName'])."', N'".$ExtraItem['MenuAddOnPrice']."', N'', N'$menuExtrawithprice','$product_id','$menuExtraMaxnumberCheckbox');");
}
}

$msg="Extra Materials has been successfully saved ! add another Extra Materials";
}
}

if(isset($_POST['EditCheesPizzaMenuSizeSubmit']))
{

$MenuSizeQuery=mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitemGroup set menuExtraName=N'$menuExtraName1' ,menuExtraPrice='$menuExtraPrice1',menuExtraDescription=N'$menuExtradesc1',menuExtraNameTitle=N'".mysql_real_escape_string($menuExtraNameTitle)."',MenuSizeID='".$_POST['MenuSizeID']."',menudoughID='".$_POST['menudoughID']."',menubasedID='".$_POST['menubasedID']."',menuCheesID='".$_POST['menuCheesID']."',menuExtraChecked='".$_POST['menuExtraChecked1']."',extraPosition='".$_POST['extraPosition']."',menuExtraMaxnumberCheckbox='".$_POST['menuExtraMaxnumberCheckbox']."' ,GroupmenuExtraDescription=N'".mysql_real_escape_string($_POST['GroupmenuExtraDescription'])."' where id='".$_GET['eid']."'");
//header("location:DisplayExtraMatrialItemgroup.php?MenuID=".$_GET['MenuID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&RestaurantID=".$_GET['RestaurantID']."#manage");
//$upmsg="Extra Materials Name has been successfully updated ! add another Size Name";
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
				<p style=" margin-left:8px;margin-top:15px; font-size:14px;"><a href="webindex.php">Home</a> &raquo; <a href="manage_restaurant_options.php"><?php echo ucwords($StQuery['restaurant_name']); ?></a> &raquo; <a href="menu-entry-create-categories.php?RestaurantPizzaID=<?php echo $_GET['RestaurantID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($CategoryMenuData['restaurantMenuName']); ?></a> &raquo; 
                
                <a href="qc_menu_entry.php?RestaurantPizzaID=<?php echo $_GET['RestaurantID'];?>&RestaurantCategoryID=<?php echo $_GET['CategoryMenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?></a> &raquo; 
                
                <a href="displayMenuSize.php?RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($MenuSizeData['SizeMenuName']); ?></a> 
                 
                 <?php if($_GET['menuSizeID']!=''){ ?>
                &raquo; <a href="displayMenuGroup.php?RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($DoughSizeData['menuDoughName']); ?></a> 
                <?php } ?>
                
                 <?php if($_GET['menudoughID']!=''){ ?>
                &raquo; <a href="displayMenuanotherGroup.php?RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>"><?php echo ucwords($BaseSizeData['menuBaseName']); ?></a>
                <?php } ?>
                
                
                
                <?php if($_GET['menuCheesID']!=''){ ?>
                &raquo; <a href="displayMenuanotherGroup1.php?RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menubasedID=<?php echo $_GET['menubasedID'];?>&menuCheesID=<?php echo $_GET['menuCheesID'];?>"><?php echo ucwords($CheesSizeData['menuCheesName']); ?></a>
                <?php } ?>
                
                
                
                </p>
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>  
 <?php if($_GET['eid']!=''){ ?>                                                  
Update Material Group Item for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } else {?>
Setup New Material Group Item for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
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
Update Material Group Item for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } else {?>
Setup New Material Group Item for <?php echo ucwords($MenuData['RestaurantPizzaItemName']); ?>
<?php } ?>
</a>
											</div>
										</div>
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
<script type="text/javascript">
var ct = 1;

function new_link()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;

	// link to delete extended form elements
	var delLink = '<a href="javascript:delIt('+ ct +')" align="right" class="btn btn-inverse">Delete</a>';

	div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;

	document.getElementById('newlink').appendChild(div1);

}
// function to delete the newly added set of elements
function delIt(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newlink');

	parentEle.removeChild(ele);

}


function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
{
return false;
}
return true;
}
function alpha(e) {
var k;
document.all ? k = e.keyCode : k = e.which;
return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
}
</script>		

										 <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Material Group Item has been successfully saved
		                                     </div>
											<?php } if($error==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Food Material Group Item is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($upmsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Material Group Item has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                                
										<div class="row-fluid" >
  <div  class=" span12">
 <script type="text/javascript">
 function submitURLdata(str)
{
window.location.href="DisplayExtraMatrialItemgroup.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&MenuID=<?php echo $_GET['MenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&menuSizeID="+str;
}

function submitURLdata1(str1)
{
window.location.href="DisplayExtraMatrialItemgroup.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&MenuID=<?php echo $_GET['MenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&menudoughID="+str1;
}

function submitURLdata2(str2)
{
window.location.href="DisplayExtraMatrialItemgroup.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&MenuID=<?php echo $_GET['MenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menubasedID="+str2;
}

function submitURLdata3(str2)
{
window.location.href="DisplayExtraMatrialItemgroup.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&MenuID=<?php echo $_GET['MenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menubasedID=<?php echo $_GET['menubasedID'];?>&menuCheesID="+str2;
}
 </script>
 <script type="text/javascript">
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
{
return false;
}
return true;
}
function alpha(e) {
var k;
document.all ? k = e.keyCode : k = e.which;
return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
}
</script>
 
    <form id="SignupForm"  method="post" enctype="multipart/form-data">
      <table  align="center" border="0">
      <?php $numSize =mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['MenuID']."' and status='0' order by SizeMenuName asc"));
		   if($numSize>0){ ?>
       <tr>
          <td><label for="OptionOneTitle">Food Group Size</label></td>
          <td><select    id="MenuSizeID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="MenuSizeID" onChange="submitURLdata(this.value)" style="width:317px;">
          <option value="">Select</option>
         <?php 
		   $StateQueryAAA =mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['MenuID']."' and status='0' order by SizeMenuName asc");
                                              while($StateData=mysql_fetch_assoc($StateQueryAAA)){
											  ?>
                                              <option value="<?php echo $StateData['id'];?>" <?php if($_GET['menuSizeID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['SizeMenuName']); ?></option>
                                              <?php } ?>
                                              
                                             
                                              
                                              
            </select></td>
         
        </tr>
        <?php } ?>
        <?php  if($_GET['menuSizeID']!=''){ ?>
         <tr>
          <td><label for="OptionOneTitle">Food Group Name</label></td>
          <td><select    onChange="submitURLdata1(this.value)" id="menudoughID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menudoughID" style="width:317px;">
          <option value="">Select</option>
            <?php 
			
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemdough where menuSizeID='".$_GET['menuSizeID']."' order by menuDoughName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menudoughID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuDoughName']); ?></option>
                                              <?php }
											  
											   ?>
            </select></td>
         
        </tr>
        <?php } ?>
        <?php  if($_GET['menudoughID']!=''){ ?>
          <tr>
          <td><label for="OptionOneTitle">Another Food Group Name</label></td>
          <td><select    id="menubasedID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="menubasedID" style="width:317px;" onChange="submitURLdata2(this.value)">
          <option value="">Select</option>
            <?php 
			
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuSizeID='".$_GET['menuSizeID']."' and menudoughID='".$_GET['menudoughID']."' order by menuBaseName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menubasedID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuBaseName']); ?></option>
                                              <?php }
											 
											   ?>
            </select></td>
         
        </tr>
        <?php } ?>
        <?php if($_GET['menubasedID']!=''){ ?>
         <tr>
          <td><label for="OptionOneTitle">Food Group within another</label></td>
          <td><select    id="menuCheesID" onMouseOver="return clearFieldValue(this);" onchange="submitURLdata3(this.value)" onClick="return clearFieldValue(this);" name="menuCheesID" style="width:317px;">
          <option value="">Select</option>
            <?php 
			 
											  $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuSizeID='".$_GET['menuSizeID']."' and menubasedID='".$_GET['menubasedID']."'  order by menuCheesName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['menuCheesID']==$StateData['id']){ ?> selected="selected" <?php } ?>><?php echo ucwords($StateData['menuCheesName']); ?></option>
                                              <?php }
											 
											   ?>
            </select></td>
         
        </tr>
        <?php } ?>
        <tr>
          <td><label for="menuExtraName">Food Group Topping Title Name <span style="color:#FF0000;">*</span></label></td>
          <td><input  name="menuExtraNameTitle" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraNameTitle" value="<?php echo $CuisineData['menuExtraNameTitle'];?>"  type="text"   style="width:300px;"/></td>
         
        </tr>
      <tr><td colspan="2">
      <?php if($_GET['eid']==''){ ?>
      <div id="newlink">
      <table width="100%">
        <tr>
          <td width="23%" align="center"><label for="menuExtraName">Topping Name <span style="color:#FF0000;">*</span></label></td>
           <td width="22%" align="center"><label for="menuCheesPrice">Topping Price <span style="color:#FF0000;">*</span></label></td>
            <td width="21%" align="center"><label for="menuCheesPrice">Desc</label></td>
             <td width="25%"><label for="menuCheesPrice">Checked/Unchkecked</label></td>
             </tr>
             <tr>
          <td><input  name="menuExtraName[]" required  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraName" value="<?php echo $CuisineData['menuExtraName'];?>"  type="text"   style="width:150px;"/></td>
         
          <td><input  name="menuExtraPrice[]"  reqiuired onMouseOver="return clearFieldValue(this);" onkeyup="isNumber(this)" onClick="return clearFieldValue(this);" id="menuExtraPrice" value="<?php echo $CuisineData['menuExtraPrice'];?>"  type="text"   style="width:150px;"/></td>
          
          
          <td><textarea style="width:150px; height:50px;" name="menuExtradesc[]"></textarea></td>
          
          <td> <select name="menuExtraChecked[]" required id="menuExtraChecked"  style="width:120px;" >
          <option value="">select</option>
          <option value="1">Yes</option>
          <option value="0">No</option>
          </select></td>
         <td width="9%"><a class="btn btn-primary" href="javascript:new_link()">Add More</a></td>
         </tr>
        </table>
      </div>
      
      <div id="newlinktpl" style="display:none;">
      <table width="96%">
        <tr>
       
          <td><input  name="menuExtraName[]"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraName" value=""  type="text"   style="width:150px;"/></td>
          <td><input  name="menuExtraPrice[]" onkeyup="isNumber(this)"  onMouseOver="return clearFieldValue(this);"  onClick="return clearFieldValue(this);" id="menuExtraPrice" value=""  type="text"   style="width:150px;"/></td>
          
           
          <td><textarea style="width:150px; height:50px;" name="menuExtradesc[]"></textarea></td>
          
          <td>
          <select name="menuExtraChecked[]" id="menuExtraChecked"  style="width:120px;" >
          <option value="">select</option>
          <option value="1">Yes</option>
          <option value="0">No</option>
          </select>
          </td>
         <td style="width:140px;"></td>
         </tr>
        </table>
      </div>
      <?php } else { ?>
      
      
      <table width="100%">
        <tr>
          <td><label for="menuExtraName">Topping Name </label></td>
          <td><input  name="menuExtraName1"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraName" value="<?php echo $CuisineData['menuExtraName'];?>"  type="text"   style="width:160px;"/></td>
          <td><label for="menuCheesPrice">Topping Price</label></td>
          <td><input  name="menuExtraPrice1"  onMouseOver="return clearFieldValue(this);" onkeyup="isNumber(this)" onClick="return clearFieldValue(this);" id="menuExtraPrice" value="<?php echo $CuisineData['menuExtraPrice'];?>"  type="text"   style="width:160px;"/></td>
          
           <td><label for="menuCheesPrice">Desc</label></td>
          <td><textarea style="width:170px; height:50px;" name="menuExtradesc1"><?php echo $CuisineData['menuExtraDescription'];?></textarea></td>
           <td><label for="menuCheesPrice">Checked/Unchkecked</label></td>
          <td><table width="50%" border="0">
  <tr>
    <td><input type="radio" name="menuExtraChecked1" id="menuExtraChecked" required value="1" <?php if($CuisineData['menuExtraChecked']==1){ ?> checked="checked" <?php } ?> />Yes </td>
    <td><input type="radio" name="menuExtraChecked1" id="menuExtraChecked" required value="0" <?php if($CuisineData['menuExtraChecked']==0){ ?> checked="checked" <?php } ?>  />No</td>
  </tr>
</table></td>
         
         </tr>
        </table>
     
      
      <?php } ?>
      
      </td></tr>
      
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
       
         <tr>
         <td><label for="menuExtraPrice">Material Quantity</label></td>
          <td><input  name="menuExtraQuantity" onkeypress='return isNumberKey(event);'  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="Quantity" value="<?php echo $CuisineData['menuExtraQuantity'];?>"  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
         <tr>
         <td><label for="menuExtraPrice">Description</label></td>
          <td>
          <textarea style="width:630px; height:120px;" name="GroupmenuExtraDescription"><?php echo $CuisineData['GroupmenuExtraDescription'];?></textarea>
         </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        <tr style="display:none;">
         <td><label for="menuExtraPrice">Max No. of Checkboxes Selected</label></td>
          <td><input  name="menuExtraMaxnumberCheckbox" onkeypress='return isNumberKey(event);'  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="menuExtraMaxnumberCheckbox" value="<?php echo $CuisineData['menuExtraMaxnumberCheckbox'];?>"  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
       
       
        <tr><td colspan="2"></td></tr>
        <?php if($_GET['eid']==''){ ?>
        <?php 
 $c=1;
  $ExtraploDough888=mysql_query("select * from tbl_menuAddON  order by MenuAddOnName asc");
if(mysql_num_rows($ExtraploDough888)>0){  
  ?>

         <tr><td><strong>Choose Materials</strong></td>


    <td>
    <select  id="menuExtrawithprice" name="menuExtrawithprice[]" multiple="multiple" style="width:600px; height:100px;">
    <?php  while($ExtraMainMenuOPtion1Data=mysql_fetch_assoc($ExtraploDough888)){ ?>
    <option value="<?php echo $ExtraMainMenuOPtion1Data['id'];?>"><?php echo $ExtraMainMenuOPtion1Data['MenuAddOnName'];?>-<?php 
	if($ExtraMainMenuOPtion1Data['MenuAddOnPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1Data['MenuAddOnPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></option>
	<?php } ?>
    </select>
      </td>
  </tr>
        <?php } }?>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
          <?php if($_GET['eid']==''){ ?>
  <input id="" type="submit" class="btn btn-primary " value="Create New Restaurant Group Material Item" name="ExtraPizzaMenuSubmit" style="margin-left:350px;" />
  <?php } else { ?>
  <input id="" type="submit" class="btn btn-primary " value="Edit Restaurant Group Material Item" name="EditCheesPizzaMenuSizeSubmit" style="margin-left:350px;" />
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
			                                 <img src="img/correct.png" alt="Success" />Restaurant Material Group Item has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success" style="width:100%; padding:10px;">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Material Group has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
    
    <?php 
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination&menudoughID=<?php echo $_GET['menudoughID'];
		$PagingCity="&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state'];
if($_GET['menuSizeID']!='')
   {
   $SizeID=" and menuSizeID='".$_GET['menuSizeID']."'";
   }
   if($_GET['menudoughID']!='')
   {
   $menudoughID=" and menudoughID='".$_GET['menudoughID']."'";
   }
   if($_GET['menubasedID']!='')
   {
   $menubasedID=" and menubasedID='".$_GET['menubasedID']."'";
   }
   if($_GET['menuCheesID']!='')
   {
   $menuCheesID=" and menuCheesID='".$_GET['menuCheesID']."'";
   }
		
        $statement = "tbl_restaurantMainMenuItemPizzaExtraitemGroup";
		
		$where="SizeRestaurantPizzaID='".$_GET['RestaurantID']."' and SizeRestaurantCategoryID='".$_GET['CategoryMenuID']."'  and menuitemID='".$_GET['MenuID']."'  $SizeID $menudoughID $menubasedID $menuCheesID";
		$url="DisplayExtraMatrialItemgroup.php?RestaurantID=".$_GET['RestaurantID']."&CategoryMenuID=".$_GET['CategoryMenuID']."&MenuID=".$_GET['MenuID']."&menuSizeID=".$_GET['menuSizeID']."&menudoughID=".$_GET['menudoughID']."&menubasedID=".$_GET['menubasedID']."&menuCheesID=".$_GET['menuCheesID'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where SizeRestaurantPizzaID='".$_GET['RestaurantID']."' and SizeRestaurantCategoryID='".$_GET['CategoryMenuID']."' and menuitemID='".$_GET['MenuID']."'  $SizeID $menudoughID $menubasedID $menuCheesID  order by extraPosition asc LIMIT  {$startpoint} , {$limit}";
	
		
		//echo $qur;
	$MenuITemQuery=mysql_query($qur);
 
 $numrowdata=mysql_num_rows($MenuITemQuery);
	?>
	
    <form name="frmproduct" method="post">               
		   <table width="100%" border="0" class="table table-bordered">
            <?php if($numrowdata>0){ ?>
                                              <tr  id="alldispaly" style="display:none;">
													<td colspan="7" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Food Item Option" value="Delete All" onClick="return confirm('Are you Sure to  Restaurant Food Item Option(s) to delete.');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Food Item" value="Activate All" onClick="return confirm('Are you Sure to  Restaurant Food Item Option(s) to activated.');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Food Item Option" value="Deactivate All" onClick="return confirm('Are you Sure to  Restaurant Food Item Option(s) to Deactivated.');"  type="submit"></td></tr>
                                                    <?php }  ?>
  <tr>
   <th width="3%"><input type="checkbox" id="check_all" value=""></th>
    <th width="12%"><strong style="color:#0033FF;">Item Name</strong></th>
     <th width="13%"><strong style="color:#0033FF;">Group Title</strong></th>
     <th width="17%"><strong style="color:#0033FF;">Material Name</strong></th>
    <th width="6%"><strong style="color:#0033FF;">Price</strong></th>
     <th width="8%"><strong style="color:#0033FF;">Quantity</strong></th>
    <!-- <th width="5%"><strong style="color:#0033FF;">Position</strong></th>-->
    <th width="41%"><strong style="color:#0033FF;">Action</strong></th>
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
     <td><?php
	 $ItemDat=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItem where id='".$menuData['menuitemID']."'")); 
	 echo ucwords($ItemDat['RestaurantPizzaItemName']);?></td>
     <td><?php echo ucwords($menuData['menuExtraNameTitle']);?></td>
    <td><?php echo ucwords($menuData['menuExtraName']);?></td>
    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format($menuData['menuExtraPrice'],2);?></td>
     <td><?php echo ucwords($menuData['menuExtraQuantity']);?></td>
     <!-- <td><?php //echo ucwords($menuData['extraPosition']);?></td>-->
    <td>
     
      <a href="DisplayExtraMatrialItemgroup.php?eid=<?php echo $menuData['id'];?>&menuCheesID=<?php echo $_GET['menuCheesID'];?>&menubasedID=<?php echo $_GET['menubasedID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-primary" title="Edit Restaurant Food Item Option">Edit</a>
						
                        <a href="InsertPhp.php?tag=ResMenuItemExtraGroupPizzaDelete&eid=<?php echo $menuData['id'];?>&menuCheesID=<?php echo $_GET['menuCheesID'];?>&menubasedID=<?php echo $_GET['menubasedID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" onClick="return confirm('Are you sure to do this action.');" title="Delete Restaurant Food Item Option">Delete</a>
                        
                         <?php if($menuData['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuItemExtraGroupPizzaActivate&active=1&statusid=<?php echo $menuData['id'];?>&menuCheesID=<?php echo $_GET['menuCheesID'];?>&menubasedID=<?php echo $_GET['menubasedID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item Option">Activated</a>
						<?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuItemExtraGroupPizzaActivate&active=0&statusid=<?php echo $menuData['id'];?>&menuCheesID=<?php echo $_GET['menuCheesID'];?>&menubasedID=<?php echo $_GET['menubasedID'];?>&menudoughID=<?php echo $_GET['menudoughID'];?>&menuSizeID=<?php echo $_GET['menuSizeID'];?>&CategoryMenuID=<?php echo $_GET['CategoryMenuID'];?>&RestaurantID=<?php echo $_GET['RestaurantID'];?>&MenuID=<?php echo $_GET['MenuID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item Option">
                        Deactivated</a>
                          <?php } ?>
                      
   

   </td>
   </tr>
    
     <?php
												$count++;
												 }
												 
												 } else { 
												  ?>
                                                <tr><td colspan="8" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Material Food Item is available in current Database.</strong></td></tr>
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
