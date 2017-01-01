<?php include('route/header.php'); 
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMainMenuItem","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
?>
<?php 
if($_GET['RestaurantPizzaID']!=''){
$StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['RestaurantPizzaID']));
}
if($_GET['RestaurantCategoryID']!=''){
$CategoryMenuData = mysql_fetch_assoc($dbb->showtabledata("tbl_restMenuCategory","id",$_GET['RestaurantCategoryID']));
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantMainMenuItem` WHERE `id` = '$id' ");
		
		 mysql_query("delete from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='$id'");
			                 mysql_query("delete from tbl_restaurantMainMenuItemdough where menuitemID='$id'");
				             mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where menuitemID='$id'");
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where menuitemID='$id'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='$id'");
							
		
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."#manage");
		}
		else
		{
		header("location:qc_menu_entry.php?RestaurantCategoryID=".$_GET['RestaurantCategoryID']."#manage");
		}
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantMainMenuItem` set status='0' WHERE `id` = '$id' ");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."#manage");
		}
		else
		{
		header("location:qc_menu_entry.php?RestaurantCategoryID=".$_GET['RestaurantCategoryID']."#manage");
		}
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
		$query = mysql_query("update `tbl_restaurantMainMenuItem` set status='1' WHERE `id` = '$id' ");
		if(!$query) 
		{ 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."#manage");
		}
		else
		{
		header("location:qc_menu_entry.php?RestaurantCategoryID=".$_GET['RestaurantCategoryID']."#manage");
		}
		}
	}
	
	 // redirent after deleting
}


function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

extract($_POST);
$today=date('d l Y');
if(isset($_POST['PizzaMenuSubmit']))
{
$image =$_FILES["ResPizzaImg"]["name"];
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['ResPizzaImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['ResPizzaImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=300;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['ResPizzaImg']['name'];

$filename = "MenuItemImg/".$ResPizzaImg;
$filename1 = "MenuItemImg/MenuItemImgSmall/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}	
   


 $StateQuery = mysql_fetch_assoc(mysql_query("select * from tbl_restMenuCategory where id='".$_POST['RestaurantCategoryID']."'"));
$RestaurantCategoryName=$StateQuery['restaurantMenuName'];

  $query_sel_max="select MAX(itemPosition) from tbl_restaurantMainMenuItem  WHERE  RestaurantPizzaID ='".$_POST['RestaurantPizzaID']."' and RestaurantCategoryID ='".$_POST['RestaurantCategoryID']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(itemPosition)'];
 $product_id= $product_id+1;
 
 $plok=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItem where RestaurantPizzaID ='".$_POST['RestaurantPizzaID']."' and RestaurantCategoryID ='".$_POST['RestaurantCategoryID']."' and RestaurantPizzaItemName=N'".$_POST['RestaurantPizzaItemName']."'"));
if($plok>0){
$error=1;

}
else
{
if($_POST['RestaurantPizzaItemPrice']!='')
{
$price=$_POST['RestaurantPizzaItemPrice'];
}
else
{
$price='0.00';
}
$PizzaManinMenuQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItem` (`id`, `RestaurantPizzaID`, `RestaurantCategoryID`, `RestaurantCategoryName`, `RestaurantCuisineName`, `RestaurantMenuType`, `RestaurantMenuSpicy`, `RestaurantMenuPopular`, `RestaurantPizzaItemName`, `RestaurantPizzaItemPrice`,`sizeTitle`,`OptionOneTitle`,`OptionTwoTitle`,`OptionThreeTitle`,`MenuDoughP`,`MenuBaseP`,`MenuCheesP`, `ResPizzaDescription`, `ResPizzaImg`, `ResPizzaImgThumb`, `status`, `created_date`, `menutype`, `itemPosition`) VALUES (NULL, '$RestaurantPizzaID', '$RestaurantCategoryID', N'$RestaurantCategoryName', N'$RestaurantCuisineName', N'$RestaurantMenuType', '$RestaurantMenuSpicy', '$RestaurantMenuPopular', N'$RestaurantPizzaItemName', '$price',N'$sizeTitle',N'$OptionOneTitle',N'$OptionTwoTitle',N'$OptionThreeTitle','$MenuDoughP','$MenuBaseP','$MenuCheesP', N'$ResPizzaDescription', '$ResPizzaImg', '$ResPizzaImg', '0', '$today', '','$product_id')");
$msg=1;
}
}

extract($_POST);


if(isset($_POST['EditPizzaMenuSubmit']))
{
$image =$_FILES["ResPizzaImg"]["name"];
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['ResPizzaImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['ResPizzaImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['ResPizzaImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=300;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=120;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$ResPizzaImg=uniqid().$_FILES['ResPizzaImg']['name'];

$filename = "MenuItemImg/".$ResPizzaImg;
$filename1 = "MenuItemImg/MenuItemImgSmall/".$ResPizzaImg;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$ResPizzaImg=$_POST['ResPizzaImgold'];
}	
 
if($_POST['RestaurantPizzaItemPrice']!='')
{
$price=$_POST['RestaurantPizzaItemPrice'];
}
else
{
$price='0.00';
}   
   
$StateQuery = mysql_fetch_assoc(mysql_query("select * from tbl_restMenuCategory where id='".$_POST['RestaurantCategoryID']."'"));
$RestaurantCategoryName=$StateQuery['restaurantMenuName'];
$PizzaManinMenuQuery=mysql_query("update tbl_restaurantMainMenuItem set RestaurantPizzaID='$RestaurantPizzaID',RestaurantCategoryID='$RestaurantCategoryID',RestaurantCategoryName=N'$RestaurantCategoryName',RestaurantCuisineName=N'$RestaurantCuisineName',RestaurantMenuType='$RestaurantMenuType',RestaurantMenuSpicy='$RestaurantMenuSpicy',RestaurantMenuPopular='$RestaurantMenuPopular',RestaurantPizzaItemName=N'$RestaurantPizzaItemName',RestaurantPizzaItemPrice='$price',ResPizzaDescription=N'$ResPizzaDescription',ResPizzaImg='$ResPizzaImg',RestaurantPizzaID='$RestaurantPizzaID',RestaurantPizzaID='$RestaurantPizzaID',itemPosition='$itemPosition',sizeTitle='$sizeTitle',OptionOneTitle='$OptionOneTitle',OptionTwoTitle='$OptionTwoTitle',OptionThreeTitle='$OptionThreeTitle' where id='".$_GET['eid']."'");


header("location:qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state']);

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
	<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>

		<div id="main-content">
			<div id="inner">
				<p style=" margin-left:8px;margin-top:15px; font-size:14px;"><a href="webindex.php">Home</a> &raquo; <a href="manage_restaurant_options.php"><?php echo ucwords($StQuery['restaurant_name']); ?></a> &raquo; <a href="menu-entry-create-categories.php?RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>"><?php echo ucwords($CategoryMenuData['restaurantMenuName']); ?></a> 
                </p>
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>  
 <?php if($_GET['eid']!=''){ ?>                                                  
Update Restaurant Food Item
<?php } else {?>
Setup New Restaurant Food Item
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
Update Restaurant Food Item
<?php } else {?>
Setup New Restaurant Food Item
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
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Food Item has been successfully saved
		                                     </div>
											<?php } if($error==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Food Item is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($upmsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Item has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                                
										<div class="row-fluid" >
  <div  class=" span12">
   <script type="text/javascript">
 function redirec(srt)
 {
 window.location="qc_menu_entry.php?RestaurantCategoryID="+srt+"&restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>";
 }
 
 function redirec1(srt)
 {
 window.location="qc_menu_entry.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&RestaurantPizzaID="+srt;
 }
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
     <input type="hidden" name="ResPizzaImgold" id="ResPizzaImgold" value="<?php echo $CuisineData['ResPizzaImg'];?>" />
												
      <table  align="center" border="0">
        <tr>
          <td width="103"><label for="RestaurantPizzaID">Restaurant Name <span style="color:#FF0000;">*</span></label></td>
          <td width="350"><select class="chzn-select" data-placeholder="Select Restaurant Name..." required id="RestaurantPizzaID" onMouseOver="return clearFieldValue(this);" required onClick="return clearFieldValue(this);" name="RestaurantPizzaID" onChange="redirec1(this.value)" style="width:317px;">
              <option value="">Select</option>
            <?php 
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd where restaurantCity=N'".$_GET['restaurant_city']."' order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['RestaurantPizzaID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
            </select>
          </td>
          <td width="107"><label for="RestaurantCategoryName">Category Name <span style="color:#FF0000;">*</span></label></td>
          <td width="380"><select  onChange="redirec(this.value)" required  data-placeholder="Select Restaurant Name..." id="RestaurantCategoryID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantCategoryID" style="width:317px;">
               <?php 
											 if($_GET['RestaurantPizzaID']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_restMenuCategory","restaurantMenuID",$_GET['RestaurantPizzaID']);
											  }
											  else
											  {
											  $StateQuery = mysql_query("select * from tbl_restMenuCategory group by restaurantMenuName order by restaurantMenuName asc  ");
											  
											  }
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['RestaurantCategoryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurantMenuName']); ?></option>
                                              <?php } ?>
            </select></td>
        </tr>
        <tr style="display:none;">
          <td><label for="RestaurantCuisineName">Choice of Cuisine</label></td>
          <td><select  data-placeholder="Select Restaurant Name..." required id="RestaurantCuisineName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantCuisineName" style="width:317px;">
             <?php 
											  $StateQuery = $dbb->showtable("tbl_cuisine","RestaurantCuisineName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['RestaurantCuisineName']; ?>" <?php if($CuisineData['RestaurantCuisineName']==$StateData['RestaurantCuisineName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['RestaurantCuisineName']); ?></option>
                                              <?php } ?>
            </select></td>
          <td><label for="RestaurantMenuType">Menu Type</label></td>
          <td><select  data-placeholder="Select Restaurant Name..." id="RestaurantMenuType" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantMenuType" style="width:317px;">
        <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantType","restaurant_type_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['restaurant_type_name']; ?>" <?php if($CuisineData['RestaurantMenuType']==$StateData['restaurant_type_name']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_type_name']); ?></option>
                                              <?php } ?>
            </select></td>
        </tr>
        <tr style="display:none;">
          <td><label for="RestaurantMenuSpicy">Menu Spicy </label></td>
          <td><select  data-placeholder="Select Restaurant Name..." id="RestaurantMenuSpicy" name="RestaurantMenuSpicy" style="width:317px;">
               <option value="0" <?php if($CuisineData['RestaurantMenuSpicy']==0){ ?> selected <?php } ?>>Yes</option>
											  <option value="1" <?php if($CuisineData['RestaurantMenuSpicy']==1){ ?> selected <?php } ?>>No</option>
            </select></td>
          <td><label for="RestaurantMenuPopular">Popular Menu</label></td>
          <td><select  data-placeholder="Select Restaurant Name..." id="RestaurantMenuPopular" name="RestaurantMenuPopular" style="width:317px;">
             <option value="0" <?php if($CuisineData['RestaurantMenuPopular']==0){ ?> selected <?php } ?>>Yes</option>
											  <option value="1" <?php if($CuisineData['RestaurantMenuPopular']==1){ ?> selected <?php } ?>>No</option>
            </select></td>
        </tr>
        <tr>
          <td><label for="RestaurantPizzaItemName">Menu Item Name <span style="color:#FF0000;">*</span></label></td>
          <td><input  name="RestaurantPizzaItemName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantPizzaItemName" value="<?php echo $CuisineData['RestaurantPizzaItemName']; ?>"  type="text"   style="width:300px;"/></td>
          <td><label for="RestaurantPizzaItemPrice">Menu Item Price <span style="color:#FF0000;">*</span></label></td>
          <td><input  name="RestaurantPizzaItemPrice" required onMouseOver="return clearFieldValue(this);" onkeyup="isNumber(this)" onClick="return clearFieldValue(this);" id="RestaurantPizzaItemPrice" value="<?php echo $CuisineData['RestaurantPizzaItemPrice']; ?>"  type="text"   style="width:300px;"/></td>
        </tr>
         <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        
        <tr>
          <td><label for="sizeTitle">Size Title </label></td>
          <td><input  name="sizeTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="sizeTitle" value="<?php echo $CuisineData['sizeTitle']; ?>"  type="text"   style="width:300px;"/></td>
          <td><label for="OptionOneTitle">Dough Title</label></td>
          <td><input  name="OptionOneTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="OptionOneTitle" value="<?php echo $CuisineData['OptionOneTitle']; ?>"  type="text"   style="width:300px;"/></td>
        </tr>
        
        
          <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        
        <tr>
          <td><label for="OptionTwoTitle">Base Title </label></td>
          <td><input  name="OptionTwoTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="OptionTwoTitle" value="<?php echo $CuisineData['OptionTwoTitle']; ?>"  type="text"   style="width:300px;"/></td>
          <td><label for="OptionThreeTitle">cheese Title</label></td>
          <td><input  name="OptionThreeTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="OptionThreeTitle" value="<?php echo $CuisineData['OptionThreeTitle']; ?>"  type="text"   style="width:300px;"/></td>
        </tr>
        
         <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
         
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
       
 
  <tr><td colspan="5" align="center">
  <table width="100%" border="0" align="center">
  <tr>

    <td colspan="5" align="center"><textarea style="width:950px; height:100px;" placeholder="Menu item Description" id="ResPizzaDescription" name="ResPizzaDescription"><?php echo $CuisineData['ResPizzaDescription']; ?></textarea></td>
   
  </tr>
  
  <tr>
    <?php if($_GET['eid']!=''){ ?>
  <td>Item Position</td><td><input  name="itemPosition" onkeypress='return isNumberKey(event);' onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="itemPosition" value="<?php echo $CuisineData['itemPosition']; ?>"  type="text"   style="width:100px;"/></td>
  <?php } ?>
  <td align="center">Food Item Photo</td>
    <td colspan="2" align="center"><div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 75px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
              <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
                <input type="file" name="ResPizzaImg" id="ResPizzaImg" value="">
                </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div></td>
   
  </tr>
  <?php if($_GET['eid']!=''){ ?>
   <tr>
    <td colspan=""><label for="restaurant_website">Food Item Photo</label></td>
    <td colspan="3">
   <img src="MenuItemImg/MenuItemImgSmall/<?php echo $CuisineData['ResPizzaImg'];?>"  />
    </td>
   
  </tr>
  <?php } ?>
  <tr><td colspan="5" align="center">
  <?php if($_GET['eid']==''){ ?>
  <input id="" type="submit" class="btn btn-primary " value="Add New Restaurant Food Item" name="PizzaMenuSubmit" style="margin-left:350px;" />
  <?php } else { ?>
  <input id="" type="submit" class="btn btn-primary " value="Edit Restaurant Food Item" name="EditPizzaMenuSubmit" style="margin-left:350px;" />
  <?php } ?>
  </td></tr>
</table>

  </td></tr>
    
    
    <tr><td colspan="5">&nbsp;</td></tr>
    
    
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
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Item has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success" style="width:100%; padding:10px;">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Item has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
    
    <?php 
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="itemPosition";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		
		$PagingCity="&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state'];
	
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantMainMenuItem";
		if($_GET['RestaurantPizzaID']!='' && $_GET['RestaurantCategoryID']!='' && $_GET['statusid']!='')
		{
		
		$where="RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' and status='".$_GET['statusid']."' ";
		$url="qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&statusid=".$_GET['statusid'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' and status='".$_GET['statusid']."' $sortBy  LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['RestaurantPizzaID']!=''&& $_GET['RestaurantCategoryID']!='')
		{
		
		$where="RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and RestaurantCategoryID='".$_GET['RestaurantCategoryID']."'  ";
		
		$url="qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&RestaurantCategoryID=".$_GET['RestaurantCategoryID'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' $sortBy   LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['RestaurantPizzaID']!=''&& $_GET['statusid']!='')
		{
		
		$where="RestaurantPizzaID='".$_GET['RestaurantPizzaID']."'  and status='".$_GET['statusid']."' ";
		
		$url="qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&statusid=".$_GET['statusid'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and status='".$_GET['statusid']."' $sortBy   LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['RestaurantCategoryID']!=''&& $_GET['statusid']!='')
		{
		
		$where=" RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' and status='".$_GET['statusid']."' ";
		
		$url="qc_menu_entry.php?RestaurantCategoryID=".$_GET['RestaurantCategoryID']."&statusid=".$_GET['statusid'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' and status='".$_GET['statusid']."' $sortBy   LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['RestaurantPizzaID']!='')
		{
		
		$where="RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' ";
		
		$url="qc_menu_entry.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' $sortBy   LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['RestaurantCategoryID']!='')
		{
		
		$where=" RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' ";
		
		$url="qc_menu_entry.php?RestaurantCategoryID=".$_GET['RestaurantCategoryID'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where  RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' $sortBy   LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['statusid']!='')
		{
		
		$where="status='".$_GET['statusid']."' ";
		
		$url="qc_menu_entry.php?statusid=".$_GET['statusid'].$PagingCity."&";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy  LIMIT {$startpoint} , {$limit}";
		}
		else
		{
		
		$where="1";
		
		$url="qc_menu_entry.php?menutype=1".$PagingCity."&";;
		
		$qur="SELECT * FROM {$statement} where 1 $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
	$MenuITemQuery=mysql_query($qur);
 
 $numrowdata=mysql_num_rows($MenuITemQuery);
	?>
     <script type="text/javascript">
function submitURL(Dvalue,str,restaurantMenuID1,RestaurantCategoryID1,statusid1)
{
window.location.href="qc_menu_entry.php?restaurant_state=<?php echo $_GET['restaurant_state']?>&restaurant_city=<?php echo $_GET['restaurant_city']?>&RestaurantPizzaID="+restaurantMenuID1+"&RestaurantCategoryID="+RestaurantCategoryID1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
											 </script>
	
    <form action="qc_menu_entry.php" method="get" id="userform" name="userform" style="display:none;">
      <table width="100%" border="0">
  <tr>
  
  <td><label for="Name">Restaurant Name</label></td>
    <td>
    <select  data-placeholder="Select Restaurant Name..." id="RestaurantPizzaID" name="RestaurantPizzaID" style="width:180px;" onChange="document.userform.submit();" >
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['RestaurantPizzaID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
    		
            <td><label for="Name">Menu Category</label></td>

    <td>
    <select class="chzn-select" data-placeholder="Select Restaurant Name..." id="RestaurantCategoryID" name="RestaurantCategoryID" style="width:180px;" onChange="document.userform.submit();" >
											  <?php 
											  
											 if($_GET['RestaurantPizzaID']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_restMenuCategory","restaurantMenuID",$_GET['RestaurantPizzaID']);
											  }
											  else
											  {
											  $StateQuery = mysql_query("select * from tbl_restMenuCategory group by restaurantMenuName order by restaurantMenuName asc  ");
											  
											  }
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['RestaurantCategoryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurantMenuName']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
    		
            
            					
                 <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:150px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
              
             
   
  </tr>
</table>
    </form>
                               <form name="frmproduct" method="post">               
		   <table width="100%" border="0" class="table table-bordered">
            <?php if($numrowdata>0){ ?>
                                              <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Food Item" value="Delete All" onClick="return confirm('Are you Sure to  Restaurant Food Item(s) to delete.');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Food Item" value="Activate All" onClick="return confirm('Are you Sure to  Restaurant Food Item(s) to activated.');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Food Item" value="Deactivate All" onClick="return confirm('Are you Sure to  Restaurant Food Item(s) to Deactivated.');"  type="submit"></td></tr>
                                                    <?php }  ?>
  <tr>
   <th width="2%"><input type="checkbox" id="check_all" value=""></th>
    <th width="7%"><strong style="color:#0033FF;"><?php
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
                                                     <a onclick="submitURL('RestaurantPizzaItemName','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['RestaurantCategoryID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Name <?php echo $imgSort;?> </a></strong></th>
    <th width="6%"><strong style="color:#0033FF;">  <a onclick="submitURL('RestaurantPizzaItemPrice','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['RestaurantCategoryID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Price <?php echo $imgSort;?> </a></strong></th>
    <?php /*?> <th width="6%"><strong style="color:#0033FF;">  <a onclick="submitURL('itemPosition','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['RestaurantCategoryID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Postion <?php echo $imgSort;?> </a></strong></th><?php */?>
    <th width="62%"><strong style="color:#0033FF;"><a  style="cursor:pointer;">Action</a></strong></th>
  </tr>
  <tr><td colspan="5"></td></tr>
  <?php 
  
            //show records
            if($numrowdata>0)
			{
            $count=1;
        	 while($menuData=mysql_fetch_assoc($MenuITemQuery)){ 
  $mplo=mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantPizzaID='".$menuData['RestaurantPizzaID']."' and SizeRestaurantCategoryID='".$menuData['RestaurantCategoryID']."' and SizeRestaurantMenuItemID='".$menuData['id']."' ");
  $SizeData=mysql_fetch_assoc($mplo);
  ?>
  <tr>
  
     <td><input type="checkbox" value="<?php echo $menuData['id']; ?>" name="data[]" id="data"></td>
    <td><?php echo ucwords($menuData['RestaurantPizzaItemName']);?> 
    <?php if($menuData['offeravailable']==1){ ?>
    &nbsp;<span style="font-size:11px; color:#FF0000;">offer</span>
    <?php } ?>
    
    </td>
    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
	if($menuData['RestaurantPizzaItemPrice']!=''){
	echo number_format($menuData['RestaurantPizzaItemPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?></td>
<?php /*?>     <td><?php echo ucwords($menuData['itemPosition']);?></td>
<?php */?>    <td>
    <a href="displayMenuSize.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" >Create/View Food Size</a>
    <a href="displayMenuGroup.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" >Create/View Food Group</a>
     <a href="DisplayExtraMatrialItemgroup.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-tigadelapan" >Create/View Extra Topping</a>    
    <a href="displayMenuanotherGroup.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" style="margin-top:10px;" >Create/View Food Another Group</a>
    <a href="displayMenuanotherGroup1.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" style="margin-top:10px;" >Create/View Food Group within  Group</a>
     
    
    </td>
   
    
     <td>
    <?php if($_GET['RestaurantPizzaID']!=''){ ?>
					<a href="qc_menu_entry.php?eid=<?php echo $menuData['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&RestaurantCategoryID=<?php echo $menuData['RestaurantCategoryID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-primary" title="Edit Restaurant Food Item">Edit</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResMenuItemPizzaDelete&eid=<?php echo $menuData['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&RestaurantCategoryID=<?php echo $menuData['RestaurantCategoryID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" onClick="return confirm('Are you sure to do this action.');" class="btn btn-dualima" title="Delete Restaurant Food Item">Delete</a>
                        
                         <?php if($menuData['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuItemPizzaActivate&active=1&statusid=<?php echo $menuData['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&RestaurantCategoryID=<?php echo $_GET['RestaurantCategoryID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuItemPizzaActivate&active=0&statusid=<?php echo $menuData['id'];?>&RestaurantPizzaID=<?php echo $menuData['RestaurantPizzaID'];?>&RestaurantCategoryID=<?php echo $_GET['RestaurantCategoryID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item">
                        Deactivated</a>
                          <?php } ?>
                      
                        <?php } else { ?>
                        <a href="qc_menu_entry.php?eid=<?php echo $menuData['id'];?>&RestaurantCategoryID=<?php echo $menuData['RestaurantCategoryID'];?>" class="btn btn-primary" title="Edit Restaurant Food Item">Edit</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResMenuItemPizzaDelete&eid=<?php echo $menuData['id'];?>&RestaurantCategoryID=<?php echo $menuData['RestaurantCategoryID'];?>" class="btn btn-dualima" onClick="return confirm('Are you sure to do this action.');" title="Delete Restaurant Food Item">Delete</a>
                        
                         <?php if($menuData['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuItemPizzaActivate&active=1&statusid=<?php echo $menuData['id'];?>&RestaurantCategoryID=<?php echo $menuData['RestaurantCategoryID'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuItemPizzaActivate&active=0&statusid=<?php echo $menuData['id'];?>&RestaurantCategoryID=<?php echo $menuData['RestaurantCategoryID'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Food Item">
                        Deactivated</a>
                          <?php } ?>
                        <?php } ?>
   
   </p>
    </td>
    
  
   </td>
   </tr>
    
     <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="4" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Food Item is available in current Database.</strong></td></tr>
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
