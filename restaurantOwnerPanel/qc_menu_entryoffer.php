<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMainMenuItem","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $CuisineQueryOffer = $dbb->showtabledata("table_menuoffer","RestaurantMenuItem",$_GET['eid']);
 $CuisineDataOffer=mysql_fetch_assoc($CuisineQueryOffer);
}

if($_GET['RestaurantPizzaID']!=''){
$StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['RestaurantPizzaID']));
}
if($_GET['RestaurantCategoryID']!=''){
$CategoryMenuData = mysql_fetch_assoc($dbb->showtabledata("tbl_restMenuCategory","id",$_GET['RestaurantCategoryID']));
}
 ?>
 <?php 

extract($_POST);
$today=date('d l Y');
if(isset($_POST['PizzaMenuSubmit']))
{



$MenuofferData=mysql_fetch_assoc(mysql_query("select *  from table_menuofferTitle  where id='".$_POST['MenuofferTitle']."'"));

 $query_sel_max="select MAX(offerslotNo) from table_menuoffer  WHERE  menuofferID = '".$_POST['MenuofferTitle']."' and RestaurantPizzaID ='".$_GET['RestaurantPizzaID']."'";
$data_sel_max=mysql_query($query_sel_max);
$row_sel_max=mysql_fetch_array($data_sel_max);
 $product_id=$row_sel_max['MAX(offerslotNo)'];
 $product_id= $product_id+1;


if($_POST['RestaurantMenuItem']!=''){
$id_array = $_POST['RestaurantMenuItem']; // return array
	$id_count = count($_POST['RestaurantMenuItem']); // count array
	for($i=0; $i <$id_count; $i++) {
	$id = $id_array[$i];
$PizzaManinMenuQuery=mysql_query("update tbl_restaurantMainMenuItem set offeravailable='1' ,PriceType='".$_POST['PriceType']."' ,slotName=N'".$_POST['offerSlotTitle']."' ,menuofferID='".$_POST['MenuofferTitle']."' ,slotRestaurant='".$_GET['RestaurantPizzaID']."' , MenuSlotPrice='".$_POST['MenuSlotPrice']."', offerslotNo='$product_id' where id='$id'");
$PizzaManinMenuQueryData=mysql_fetch_assoc(mysql_query("select *  from tbl_restaurantMainMenuItem  where id='$id'"));

$PizzaManinMenuQueryOffer=mysql_query("INSERT INTO `table_menuoffer` (`id`, `RestaurantPizzaID`, `RestaurantCategoryID`,`RestaurantOfferItemName`, `RestaurantOfferItemPrice`,`menuofferID`,`MenuofferTitle`, `MenuofferPrice`, `offerSlotTitle`,`offerslotNo`,`RestaurantMenuItem`,`ResPizzaDescription`,`PriceType`,`ResPizzaImg`) VALUES (NULL, '".$_GET['RestaurantPizzaID']."', '".$_POST['RestaurantCategoryID']."',N'".$PizzaManinMenuQueryData['RestaurantPizzaItemName']."','".$PizzaManinMenuQueryData['RestaurantPizzaItemPrice']."','".$_POST['MenuofferTitle']."',N'".$MenuofferData['MenuofferTitle']."','".$_POST['MenuSlotPrice']."',N'$offerSlotTitle','$product_id','$id', N'".$MenuofferData['ResPizzaDescription']."','".$_POST['PriceType']."','".$MenuofferData['ResPizzaImg']."')");
}
}
if($_POST['RestaurantOfferItemName']!=''){
$RestaurantOfferItemName=implode(',',$_POST['RestaurantOfferItemName']);
$RestaurantOfferItemPrice=implode(',',$_POST['RestaurantOfferItemPrice']);
$SizeID='';
$rrr1=explode(",",rtrim($RestaurantOfferItemName,','));
	 $rtt1=explode(",",rtrim($RestaurantOfferItemPrice,','));
	   foreach($rrr1 as  $yy1=>$vvv1)
		{
$PizzaManinMenuQuery=mysql_query("INSERT INTO `tbl_restaurantMainMenuItem` (`id`, `RestaurantPizzaID`, `RestaurantCategoryID`, `RestaurantCategoryName`,  `RestaurantPizzaItemName`, `RestaurantPizzaItemPrice`,`ResPizzaDescription`, `ResPizzaImg`, `ResPizzaImgThumb`, `status`, `created_date`,`itemPosition`,`offeravailable`,`offeravailableinsert`,`PriceType` ,`slotName` ,`MenuSlotPrice` ,`offerslotNo` ,`menuofferID` ,`slotRestaurant`) VALUES (NULL, '".$_GET['RestaurantPizzaID']."', '".$_POST['$RestaurantCategoryID']."', N'$RestaurantCategoryName', N'$vvv1', '".$rtt1[$yy1]."',  N'".$MenuofferData['ResPizzaDescription']."', '".$MenuofferData['ResPizzaImg']."', '".$MenuofferData['ResPizzaImg']."', '0', '$today','$product_id1','1','1','".$_POST['PriceType']."',N'".$_POST['offerSlotTitle']."','".$_POST['MenuSlotPrice']."','$product_id','".$_POST['MenuofferTitle']."','".$_GET['RestaurantPizzaID']."')");
$SizeID.=mysql_insert_id().',';
}
$Size=explode(',',rtrim($SizeID,','));
foreach($Size as  $menuID)
{
$PizzaManinMenuQueryOffer=mysql_query("INSERT INTO `table_menuoffer` (`id`, `RestaurantPizzaID`, `RestaurantCategoryID`,`RestaurantOfferItemName`, `RestaurantOfferItemPrice`,`menuofferID`,`MenuofferTitle`, `MenuofferPrice`, `offerSlotTitle`,`offerslotNo`,`RestaurantMenuItem`,`ResPizzaDescription`,`PriceType`,`ResPizzaImg`) VALUES (NULL, '".$_GET['RestaurantPizzaID']."', '".$_POST['RestaurantCategoryID']."',N'".$PizzaManinMenuQueryData['RestaurantPizzaItemName']."','".$PizzaManinMenuQueryData['RestaurantPizzaItemPrice']."','".$_POST['MenuofferTitle']."',N'".$MenuofferData['MenuofferTitle']."','".$_POST['MenuSlotPrice']."',N'$offerSlotTitle','$product_id','$menuID', N'".$MenuofferData['ResPizzaDescription']."','".$_POST['PriceType']."','".$MenuofferData['ResPizzaImg']."')");




}
}
$msg=1;

}

extract($_POST);


if(isset($_POST['EditPizzaMenuSubmit']))
{
$StateQuery = mysql_fetch_assoc(mysql_query("select * from tbl_restMenuCategory where id='".$_POST['RestaurantCategoryID']."'"));
$RestaurantCategoryName=$StateQuery['restaurantMenuName'];

$StateQuery = mysql_fetch_assoc(mysql_query("select * from tbl_restMenuCategory where id='".$_POST['RestaurantCategoryID']."'"));
$RestaurantCategoryName=$StateQuery['restaurantMenuName'];
$PizzaManinMenuQuery=mysql_query("update tbl_restaurantMainMenuItem set RestaurantPizzaID='$RestaurantPizzaID',RestaurantCategoryID='$RestaurantCategoryID',RestaurantCategoryName=N'$RestaurantCategoryName',RestaurantCuisineName=N'$RestaurantCuisineName',RestaurantMenuType='$RestaurantMenuType',RestaurantMenuSpicy='$RestaurantMenuSpicy',RestaurantMenuPopular='$RestaurantMenuPopular',RestaurantPizzaItemName=N'$RestaurantPizzaItemName1',RestaurantPizzaItemPrice='$RestaurantPizzaItemPrice1',ResPizzaDescription=N'$ResPizzaDescription',ResPizzaImg='$ResPizzaImg',RestaurantPizzaID='$RestaurantPizzaID',RestaurantPizzaID='$RestaurantPizzaID',itemPosition='$itemPosition',sizeTitle='$sizeTitle',OptionOneTitle='$OptionOneTitle',OptionTwoTitle='$OptionTwoTitle',OptionThreeTitle='$OptionThreeTitle' where id='".$_GET['eid']."'");


$upmsg=1;

}
?>
 <link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script  type="text/javascript"  language="javascript">
function getMenuMainCatgeory(str){
//alert(str);
if (str=="")
{
document.getElementById("RestaurantCategoryID").innerHTML="";
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
//alert(xmlhttp.responseText);
document.getElementById("RestaurantCategoryID").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("post","menuCategoryFetch.php?q="+str,true);
xmlhttp.send();
}
function getrestaurantMenuItem(str){
if (str=="")
{
document.getElementById("RestaurantMenuItem").innerHTML="";
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
document.getElementById("RestaurantMenuItem").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","menuitemDataFetch.php?q="+str,true);
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
</script>		 	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				<p style=" margin-left:8px;margin-top:15px; font-size:14px;"><a href="webindex.php">Home</a> &raquo; <a href="menuofferName.php?RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>"><?php echo ucwords($StQuery['restaurant_name']); ?></a> &raquo; 
                
                <a href="menuofferName.php?RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>"><?php echo ucwords($CategoryMenuData['restaurantMenuName']); ?></a> </p>
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Menu Offer Slot
                            <?php } else { ?>
                            Update Restaurant Menu Offer Slot
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Menu Offer Slot
                            <?php } else { ?>
                            Update Restaurant Menu Offer Slot
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Menu Offer Slot has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Menu Offer Slot is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Offer Slot has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                            
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm"  method="post" enctype="multipart/form-data">
    
												
      <table  align="center" border="0">
      <tr>
          <td width="107"><label for="RestaurantCategoryName">Category Name</label></td>
          <td width="380"><select    data-placeholder="Select Restaurant Name..." id="RestaurantCategoryID" required name="RestaurantCategoryID" onChange="getrestaurantMenuItem(this.value)" style="width:317px;">
          <option value="">Select Menu Category</option>
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
       <tr><td colspan="2"></td></tr>
       <tr>
          <td><label for="offerSlotTitle">Menu Offer Title </label></td>
          <td>
          <select     data-placeholder="Select Restaurant Name..." id="MenuofferTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="MenuofferTitle" style="width:317px;">
           
              <?php 
											 
											  $StateQuery1 =mysql_query("select * from table_menuofferTitle where  RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' ");
											  
											 
                                              while($row=mysql_fetch_assoc($StateQuery1)){
											  ?>
                                              <option value="<?php echo $row['id']; ?>" ><?php echo ucwords($row['MenuofferTitle']);?> </option>
                                              <?php } ?>
            </select>
         </td>
        
        </tr>
        <script type="text/javascript">
		function toggleTables(which)
        {

    if(which == "2" || which == "3") {
        document.getElementById('slotprice').style.display = "table-row";
       
        }
    
		else
		{
		document.getElementById('slotprice').style.display = "none";
		}
}
		
		</script>
        <tr><td colspan="2"></td></tr>
         <tr><td>Price Type</td><td> <table width="60%" border="0">
  <tr>
    <td><input type="radio" value="1" name="PriceType" id="PriceType" onclick="toggleTables(1);" required /> Price of the product</td>
   <td><input type="radio" value="2" name="PriceType" id="PriceType" onclick="toggleTables(2);" required />  Fixed Price</td>
    <td><input type="radio" value="3" name="PriceType" id="PriceType" onclick="toggleTables(3);" required />% Price of the product</td>
  </tr>
</table>
</td></tr>
 <tr><td colspan="2"></td></tr>
         <tr><td colspan="2"></td></tr>
          <tr>
          <td><label for="offerSlotTitle">Slot Name </label></td>
          <td><input  name="offerSlotTitle" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="offerSlotTitle" value="<?php echo $CuisineDataOffer['offerSlotTitle']; ?>"  type="text"  required  style="width:300px;"/></td>
        
        </tr>
          <tr><td colspan="2"></td></tr>
         <tr  id="slotprice" style="display:none;">
          <td><label for="offerSlotTitle">Slot Price </label></td>
          <td><input  name="MenuSlotPrice" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="MenuSlotPrice" value="<?php echo $CuisineDataOffer['MenuSlotPrice']; ?>"  type="text"   style="width:300px;"/></td>
        
        </tr>
        <tr><td colspan="2"></td></tr>
         <tr>
          <td width="107"><label for="RestaurantCategoryName">Slot Menu Item</label></td>
          <td width="380"><select multiple    data-placeholder="Select Restaurant Name..." id="RestaurantMenuItem" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantMenuItem[]" style="width:317px; height:100px;">
           
            <?php /*?>  <?php 
											
											   $StateQuery =mysql_query("select * from tbl_restaurantMainMenuItem where RestaurantCategoryID='".$_GET['RestaurantCategoryID']."' ");
											 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" ><?php echo ucwords($StateData['RestaurantPizzaItemName']); ?></option>
                                              <?php } ?><?php */?>
            </select></td>
        </tr>
         
         <tr><td colspan="2">
         <?php if($_GET['eid']==''){ ?>
         <div id="newlink">
         <table width="100%">
          <td><label for="RestaurantCategoryName">New Product Name</label></td>
          <td><input  name="RestaurantOfferItemName[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantOfferItemName" value=""  type="text"    style="width:200px;"/></td>
          
          <td><label for="RestaurantCategoryName">New Product Price</label></td>
          <td><input  name="RestaurantOfferItemPrice[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantOfferItemPrice" value=""  type="text"    style="width:200px;"/></td>
          <td><a class="btn btn-primary" href="javascript:new_link()">Add More</a></td>
         </table>
         </div>
         
          <div id="newlinktpl" style="display:none;">
         <table width="100%">
          <td><label for="RestaurantCategoryName">New Product Name</label></td>
          <td><input  name="RestaurantOfferItemName[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantOfferItemName" value=""  type="text"    style="width:200px;"/></td>
          
          <td><label for="RestaurantCategoryName">New Product Price</label></td>
          <td><input  name="RestaurantOfferItemPrice[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantOfferItemPrice" value=""  type="text"    style="width:200px;"/></td>
          <td></td>
         </table>
         </div>
         <?php } else { ?>
         
         
         
         <table width="100%">
          <td><label for="RestaurantCategoryName">New Product Name</label></td>
          <td><input  name="RestaurantOfferItemName1" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantOfferItemName" value="<?php echo $CuisineData['RestaurantPizzaItemName']; ?>"  type="text"    style="width:200px;"/></td>
          
          <td><label for="RestaurantCategoryName">New Product Price</label></td>
          <td><input  name="RestaurantOfferItemPrice1" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantOfferItemPrice" value="<?php echo $CuisineData['RestaurantPizzaItemPrice']; ?>"  type="text"    style="width:200px;"/></td>
          <td></td>
         </table>
        
         
         
         <?php } ?>
         </td></tr>
      
        
      
      
   
 
  <tr><td colspan="2" >
  <?php if($_GET['eid']==''){ ?>
  <input id="" type="submit" class="btn btn-primary " value="Add New Restaurant Pizza Food Item Offer" name="PizzaMenuSubmit" style="margin-left:350px;" />
  <?php } else { ?>
  <input id="" type="submit" class="btn btn-primary " value="Edit Restaurant Pizza Food Item Offer" name="EditPizzaMenuSubmit" style="margin-left:350px;" />
  <?php } ?>
  </td></tr>
</table>

  </td></tr>
    
    
 
    
      </table>
    </form>
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
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	

	<!-- charts plugin -->
	<script src="app/plugins/jquery.peity.min.js"></script>
	<script src="app/plugins/jquery.knob.js"></script>
	<script src="app/plugins/jqplot/jquery.jqplot.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.highlighter.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.cursor.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.dateAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pieRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.donutRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.barRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pointLabels.min.js"></script>
	
	<!-- form plugins -->
	<script src="app/plugins/jquery.elastic.js"></script>
	<script src="app/plugins/jquery.uniform.js"></script>
	<script src="app/plugins/bootstrap-datepicker.js"></script>
	<script src="app/plugins/jquery.timePicker.min.js"></script>
	<script src="app/plugins/jquery.simple-color-picker.js"></script>
	<script src="app/plugins/chosen.jquery.min.js"></script>
	<script src="app/plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
	<script src="app/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="app/plugins/jquery.limit-1.2.js"></script>
	<script src="app/plugins/formToWizard.js"></script>
	<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
	<!-- other plugins -->
	<script src="app/plugins/jquery-ui-custom/jquery-ui-1.8.22.custom.min.js"></script>
	<script src="app/plugins/DataTables/media/js/jquery.dataTables.js"></script>	
	<script src="app/plugins/jscrollpane/jquery.mousewheel.js"></script>
	<script src="app/plugins/jscrollpane/jquery.jscrollpane.min.js"></script>	
	<script src="app/plugins/fullcalendar.min.js"></script>

	<script src="assets/js/google-code-prettify/prettify.js"></script>
	
	<script src="app/plugins/jPages.min.js"></script>
	<script src="app/plugins/jquery.masonry.min.js"></script>

	<!-- js for templates -->
	<script src="app/js/custom.js"></script>
</body>
</html>
