<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantOffer","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 ?>
 
 
 <script type="text/javascript">
											
	  function toggleTables(which)
        {

    if(which == "5" ) {
        document.getElementById('displayTimeData').style.display='block';
		document.getElementById('displayTimeDataInteverval').style.display = "none";
       }
	   else if(which == "6" ) {
        document.getElementById('displayTimeDataInteverval').style.display='block';
		document.getElementById('displayTimeData').style.display = "none";
       }
        else
		{
		document.getElementById('displayTimeData').style.display = "none";
		document.getElementById('displayTimeDataInteverval').style.display = "none";
		}
}
										
											</script>
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Top Discount/Offer
                            <?php } else { ?>
                            Update Restaurant Top Discount/Offer
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
                            Setup New Restaurant Top Discount/Offer
                            <?php } else { ?>
                            Update Restaurant Top Discount/Offer
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Top Discount/Offer has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Top Discount/Offer is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Top Discount/Offer has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    //$url="InsertPhp.php?tag=ResOfferEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Discount";
										   }
										   else
										   {
										  // $url="InsertPhp.php?tag=ResOfferAdd";
										   $buttonValue="Add New Restaurant Discount";
										   }
										   
										   ?>
                                           <script  type="text/javascript"  language="javascript">
function getOrgTypeListRestCityOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="";
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
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","cityFatchOffer.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
if (str=="")
{
document.getElementById("restaurant_id").innerHTML="";
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
document.getElementById("restaurant_id").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","resOfferwithMenu.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOfferMenu(str){
//alert(str);
if (str=="")
{
document.getElementById("OrderDiscountmenuCategory").innerHTML="";
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
document.getElementById("OrderDiscountmenuCategory").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","ResFatchMenuCategory.php?q="+str,true);
xmlhttp.send();
}


</script>

										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onSubmit="return RestaurantOfferValidate()">
												
												
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_id">Restaurant State</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant..." required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_state" name="restaurant_state" onChange="getOrgTypeListRestCityOffer(this.value)" style="width:317px;" >
    <option value="0">Select</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                            </tr>
                                            
                                           <tr>
    <td><label for="restaurant_id">Restaurant City</label></td>
    <td>	<select data-placeholder="Select Restaurant..." onChange="getOrgTypeListRestOffer(this.value)" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_city" name="restaurant_city" style="width:317px;" >
    <option value="0">Select</option>
											  <?php 
											  if($_GET['eid']!=''){
											  $StateQuery =mysql_query("select * from tbl_city where stateID='".$CuisineData['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                            </tr>  
                                                     <tr>
    <td><label for="restaurant_id">Restaurant Name</label></td>
    <td>	<select  data-placeholder="Select Restaurant..." required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_id" name="restaurant_id" style="width:317px;" onChange="getOrgTypeListRestOfferMenu(this.value)" >
    <option value="0">Select Restaurant</option>
											  <?php 
											   if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } } ?>
											
											</select></td>
                                            </tr>
                                            
                                            
                                                         
   
  <tr>
    <td colspan=""><label for="restaurant_website">Name</label></td>
    <td colspan="3">
    <input type="text" name="RestaurantOfferStartPrice" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="RestaurantOfferStartPrice" style="width:300px;" required value="<?php echo $CuisineData['RestaurantOfferStartPrice']; ?>" placeholder="Name of the offer/ name of the discount"  />
    </td>
   
  </tr> 
                                            <tr>
    <td><label for="restaurant_country">Type</label></td>
    <td><table width="40%"> <tr>
    <td><input type="radio" name="RestaurantoffrType" required  class="ofrty" id="offrP" value="p" <?php if($CuisineData['RestaurantoffrType']=='p'){ ?> checked="checked" <?php } ?> onClick="displaytd();"/>Discount</td>
    <td><input type="radio" name="RestaurantoffrType" required class="ofrty" id="offrP" <?php if($CuisineData['RestaurantoffrType']=='pr'){ ?> checked="checked" <?php } ?> value="pr" onClick="displaytd();"/> Offer
    </td>
  </tr></table></td>
  </tr>
   <tr>
    <td colspan=""><label for="restaurant_website">Price</label></td>
    <td colspan="3">
    <input type="text" name="RestaurantOfferPrice" required onMouseOver="return clearFieldValue(this);" style="width:300px;" onClick="return clearFieldValue(this);"  id="RestaurantOfferPrice" value="<?php echo $CuisineData['RestaurantOfferPrice']; ?>"  />
    </td>
   
  </tr>
  <tr>
    <td><label for="RestaurantOfferStartDate"> Start Date</label></td>
    <td><input id="RestaurantOfferStartDate" required name="RestaurantOfferStartDate"  value="<?php echo $CuisineData['RestaurantOfferStartDate']; ?>" data-date-format="mm/dd/yyyy" type="text" class="datePicker"   style="width:300px;"/></td>
    </tr>
    <tr>
    <td><label for="RestaurantOfferEndDate">End Date</label></td>
    <td><input value="<?php echo $CuisineData['RestaurantOfferEndDate']; ?>" required data-date-format="mm/dd/yyyy" type="text" name="RestaurantOfferEndDate" id="RestaurantOfferEndDate"  class="datePicker"   style="width:300px;" onBlur="return RestaurantDateCheck();" /></td>
  </tr>
 
   
    <tr>
   
    <td colspan="4" align="center">
  <input  type="submit" class="btn btn-primary " name="RestaurantOfferSubmit" id="RestaurantOfferSubmit" value="<?php echo $buttonValue; ?>" />
    </td>
   
  </tr>
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
