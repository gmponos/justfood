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
function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

extract($_POST);
function genRandomString() {
$length =5;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
} 

$today=date('d l Y');

$SizeID='';
$DoughID='';

if(isset($_POST['PizzaMenuSubmit']))
{
$MenuSizeP='Size'.genRandomString();
$MenuDoughP='Dough'.genRandomString();
$MenuBaseP='Base'.genRandomString();
$MenuCheesP='Chees'.genRandomString();

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

$PizzaManinMenuQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItem` (`id`, `RestaurantPizzaID`, `RestaurantCategoryID`, `RestaurantCategoryName`, `RestaurantCuisineName`, `RestaurantMenuType`, `RestaurantMenuSpicy`, `RestaurantMenuPopular`, `RestaurantPizzaItemName`, `RestaurantPizzaItemPrice`,`OptionOneTitle`,`OptionTwoTitle`,`OptionThreeTitle`,`MenuDoughP`,`MenuBaseP`,`MenuCheesP`, `ResPizzaDescription`, `ResPizzaImg`, `ResPizzaImgThumb`, `status`, `created_date`, `menutype`) VALUES (NULL, '$RestaurantPizzaID', '$RestaurantCategoryID', N'$RestaurantCategoryName', N'$RestaurantCuisineName', N'$RestaurantMenuType', '$RestaurantMenuSpicy', '$RestaurantMenuPopular', N'$RestaurantPizzaItemName', '$RestaurantPizzaItemPrice',N'$OptionOneTitle',N'$OptionTwoTitle',N'$OptionThreeTitle','$MenuDoughP','$MenuBaseP','$MenuCheesP', N'$ResPizzaDescription', '$ResPizzaImg', '$ResPizzaImg', '0', '$today', '')");

}
 ?>
 

 <link rel="stylesheet" href="../colorbox/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../colorbox/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				
				$(".iframe").colorbox({iframe:true, width:"550px", height:"400px"});
				$(".iframe2").colorbox({iframe:true, width:"620px", height:"600px"});
				$(".iframe3").colorbox({iframe:true, width:"620px", height:"600px"});
				$(".iframe4").colorbox({iframe:true, width:"620px", height:"600px"});
				
				$(".iframe5").colorbox({iframe:true, width:"680px", height:"700px"});
				
				 
			});
			</script>












			
<div class="row-fluid" >
  <div  class=" span12">
    <form id="SignupForm"  method="post" enctype="multipart/form-data">
      <input type="hidden" name="ResPizzaImgold" id="ResPizzaImgold" value="" />
      <table  align="center" border="0">
        <tr>
          <td width="103"><label for="RestaurantPizzaID">Restaurant Name</label></td>
          <td width="350"><select class="chzn-select" data-placeholder="Select Restaurant Name..." id="RestaurantPizzaID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantPizzaID" onChange="test(this.value)" style="width:317px;">
              <option value="">Select</option>
           <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($restaurantMenuIDsele==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
            </select>
          </td>
          <td width="107"><label for="RestaurantCategoryName">Category Name</label></td>
          <td width="380"><select  data-placeholder="Select Restaurant Name..." id="RestaurantCategoryID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantCategoryID" style="width:317px;">
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
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($RestaurantCategoryIDsele==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurantMenuName']); ?></option>
                                              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><label for="RestaurantCuisineName">Choice of Cuisine</label></td>
          <td><select  data-placeholder="Select Restaurant Name..." id="RestaurantCuisineName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantCuisineName" style="width:317px;">
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
        <tr>
          <td><label for="RestaurantMenuSpicy">Menu Spicy </label></td>
          <td><select  data-placeholder="Select Restaurant Name..." id="RestaurantMenuSpicy" name="RestaurantMenuSpicy" style="width:317px;">
              <option value="0"  selected >Yes</option>
              <option value="1" >No</option>
            </select></td>
          <td><label for="RestaurantMenuPopular">Popular Menu</label></td>
          <td><select  data-placeholder="Select Restaurant Name..." id="RestaurantMenuPopular" name="RestaurantMenuPopular" style="width:317px;">
              <option value="0"  selected >Yes</option>
              <option value="1" >No</option>
            </select></td>
        </tr>
        <tr>
          <td><label for="RestaurantPizzaItemName">Menu Item Name </label></td>
          <td><input  name="RestaurantPizzaItemName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantPizzaItemName" value=""  type="text"   style="width:300px;"/></td>
          <td><label for="RestaurantPizzaItemPrice">Menu Item Price</label></td>
          <td><input  name="RestaurantPizzaItemPrice" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantPizzaItemPrice" value=""  type="text"   style="width:300px;"/></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
       
 
  <tr><td colspan="5" align="center">
  <table width="100%" border="0" align="center">
  <tr>
    <td colspan="5" align="center"><textarea style="width:950px; height:100px;" placeholder="Menu item Description" id="ResPizzaDescription" name="ResPizzaDescription"></textarea></td>
   
  </tr>
  
  <tr>
  <td align="center">Pizza Menu Photo</td>
    <td colspan="4" align="center"><div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 75px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
              <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
                <input type="file" name="ResPizzaImg" id="ResPizzaImg" value="">
                </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
            </div></td>
   
  </tr>
  <tr><td colspan="5" align="center"><input id="" type="submit" class="btn btn-primary " value="Add New Restaurant Pizza Food Item" name="PizzaMenuSubmit" style="margin-left:350px;" /></td></tr>
</table>

  </td></tr>
    
    
    <tr><td colspan="5">&nbsp;</td></tr>
    
    
      </table>
    </form>
    
    
    <table width="100%" border="0">
  <tr>
    <td><strong style="color:#0033FF;">Restaurant Name</strong></td>
    <td><strong style="color:#0033FF;">Category Name</strong></td>
    <td><strong style="color:#0033FF;">Item Name</strong></td>
    <td><strong style="color:#0033FF;">Item Price</strong></td>
    <td><strong style="color:#0033FF;">Action</strong></td>
  </tr>
  <tr><td colspan="5"></td></tr>
  <?php 
  $MenuITemQuery=mysql_query("select * from tbl_restaurantMainMenuItem order by id desc");
  while($menuData=mysql_fetch_assoc($MenuITemQuery)){ 
  $mplo=mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantPizzaID='".$menuData['RestaurantPizzaID']."' and SizeRestaurantCategoryID='".$menuData['RestaurantCategoryID']."' and SizeRestaurantMenuItemID='".$menuData['id']."' ");
  $SizeData=mysql_fetch_assoc($mplo);
  ?>
  <tr>
    <td>
    <?php $RestaurantData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$menuData['RestaurantPizzaID']."'")); 
	echo ucwords($RestaurantData['restaurant_name']);
	?>
    </td>
    <td><?php echo ucwords($menuData['RestaurantCategoryName']);?></td>
    <td><?php echo ucwords($menuData['RestaurantPizzaItemName']);?></td>
    <td>&euro; <?php echo number_format($menuData['RestaurantPizzaItemPrice'],2);?></td>
    <td><a href="CreateMenuSize.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>" class="iframe">Create Size</a>&nbsp; 
    <?php if(mysql_num_rows($mplo)>0){ ?>
    <a href="CreateMenuGroup.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>" class="iframe2" style="color:#000000; font-weight:bold;">Create Group </a>&nbsp;
    
        <a href="CreateMenuanotherGroup.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>" class="iframe3" style="color:#ff0000; font-weight:bold;">Create Another Group </a>&nbsp;
    <?php } ?>
    
    <?php
	 $DoughbSize=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemdough where SizeRestaurantPizzaID='".$menuData['RestaurantPizzaID']."' and SizeRestaurantCategoryID='".$menuData['RestaurantCategoryID']."' and menuitemID='".$menuData['id']."' "));
	 ?>
    
 <?php if($DoughbSize>0){ ?>
     
      <a href="CreateMenuanotherGroup1.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>" class="iframe4" style="color:#006600; font-weight:bold;">Create Group within  Group</a>&nbsp;
      <?php } ?>
      
       <a href="ExtraMatrialItem.php?MenuID=<?php echo $menuData['id'];?>&CategoryMenuID=<?php echo $menuData['RestaurantCategoryID'];?>&RestaurantID=<?php echo $menuData['RestaurantPizzaID'];?>" class="iframe5" style="color:#0000CC; font-weight:bold;">Add Materials</a>&nbsp;&nbsp;
     <a href="">Edit</a>&nbsp; <a href="">Delete</a>&nbsp;</td>
  </tr>
  <?php } ?>
  
  
</table>

    
  </div>
</div>
