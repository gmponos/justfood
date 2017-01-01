<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_comercialBanner","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 ?>	
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
                            Setup New Commercial Banner
                            <?php } else { ?>
                            Update Commercial Banner
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
                            Setup New Commercial Banner
                            <?php } else { ?>
                            Update Commercial Banner
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Commercial Banner has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Commercial Banner is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Commercial Banner has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResBannerEdit&CategoryBy=1&pageGet=3&eid=".$_GET['eid'];
											$buttonValue="Edit Commercial Banner";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResBannerAdd&CategoryBy=1&pageGet=3";
										   $buttonValue="Add New Commercial Banner";
										   }
										   
										   ?>
                                           
                                           <script>
function toggleOther(chosen){
if (chosen == 'BannerImg') {
document.getElementById('imageInsert').style.display='table-row';
document.getElementById('imageInsert1').style.display='table-row';
document.getElementById('codeInsert').style.display='none';
} 
if(chosen == 'Bannercode') {
  document.getElementById('imageInsert').style.display='none';
  document.getElementById('imageInsert1').style.display='none';
document.getElementById('codeInsert').style.display='table-row';
}

}
</script>

 <script type="text/javascript">
function RestaurantBannerValidate(){
var chkStatus = true
if(document.getElementById('ResBannerNameID').value =="") {
document.getElementById("ResBannerNameID").style.background='#C10000';
document.getElementById("ResBannerNameID").focus();
chkStatus = false;
}


else
document.getElementById('ResBannerNameID').className = "";

if(document.getElementById('bannerType').value =="") {
document.getElementById("bannerType").style.background='#C10000';
document.getElementById("bannerType").focus();
chkStatus = false;
}
else
document.getElementById('bannerType').className = "";
return chkStatus;
}
function clearFieldValue(register){	
document.getElementById(register.id).style.background="#FFFFFF";
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

<script  type="text/javascript"  language="javascript">
function getOrgTypeListRest(str){
if (str=="")
{
document.getElementById("BannerByState").innerHTML="";
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
document.getElementById("BannerByState").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","BannerStateFatch.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestCity(str){
if (str=="")
{
document.getElementById("BannerByCity").innerHTML="";
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
document.getElementById("BannerByCity").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","BannerCityFatch.php?q="+str,true);
xmlhttp.send();
}

function getzipcodeListRest(str)
{
if (str=="")
{
  document.getElementById("BannerByArea").innerHTML="";
  return;
  } 
if(window.XMLHttpRequest)
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
    document.getElementById("BannerByArea").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("post","BannerAreaFatch.php?c="+str,true);
xmlhttp.send();
}
</script> 
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" name="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onSubmit="return RestaurantBannerValidate();">
												<input type="hidden" name="BannerImgold" value="<?php echo $CuisineData['BannerImg']; ?>" />
												
                                                    <table width="100%" border="0">
                                                    
                                                      <tr>
   <td height="32"><label for="PanterCategorybyBanner">Restaurant Category Type </label></td>
    <td >  <select  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" data-placeholder="Select State..." id="BannerByCategory" name="BannerByCategory" style="width:317px;"  >
    <option value="">Select</option> <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantType","restaurant_type_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['restaurant_type_name']; ?>" <?php if($CuisineData['BannerByCategory']==$StateData['restaurant_type_name']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_type_name']); ?></option>
                                              <?php } ?>
											</select></td>
    <td><label for="PanterServicebyBanner">Restaurant Service</label></td>
    <td><select name="BannerByService" id="BannerByService" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" >
    <option value="">Select </option>
 	<?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantService","restaurant_service_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                               <option value="<?php echo $StateData['restaurant_service_name']; ?>" <?php if($CuisineData['BannerByService']==$StateData['restaurant_service_name']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_service_name']); ?></option>
                                              <?php } ?>
    </select></td>
  
  </tr>
                                                    
                                                    
                                                       <tr>
   <td height="34"><label for="Name">Country Name</label></td>
    <td>
    <select class="chzn-select" data-placeholder="Select Country..." id="BannerByCountry" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="BannerByCountry" style="width:317px;" onChange="getOrgTypeListRest(this.value)">
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['BannerByCountry']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
											
							  </select>
    </td>
   <td><label for="Name">State Name</label></td>
    <td id="BannerByState">
    <select class="chzn-select" data-placeholder="Select State..." id="BannerByState" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="BannerByState" style="width:317px;"  onChange="getOrgTypeListRestCity(this.value)" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$CuisineData['BannerByCountry']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['BannerByState']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
											
							  </select>
    </td></tr>
                                                    
                                                     <tr>
   <td height="32"><label for="Name">City Name</label></td>
    <td id="BannerByCity">  <select class="chzn-select" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" data-placeholder="Select State..." id="BannerByCity" name="BannerByCity" style="width:317px;" onchange="getzipcodeListRest(this.value);" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$CuisineData['BannerByState']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['BannerByCity']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
											
											</select></td>
    <td><label for="bannerType">Select Area</label></td>
    <td id="BannerByArea"><select name="BannerByArea" id="BannerByArea" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" >
    <option value="">Select</option>
    <?php 
											  if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_PostcodeArea","cityName",$CuisineData['BannerByCity']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['delivery_areaName']; ?>" <?php if($CuisineData['BannerByArea']==$StateData['delivery_areaName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['delivery_areaName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
    </select></td>
  
  </tr>
  
   <tr>
    <td><label for="BannerTimeLimit">Banner Limit</label></td>
    <td><select name="BannerTimeLimit" id="BannerTimeLimit" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" >
    <option value="">Select Limit</option>
    <?php for($i=1;$i<=366;$i++){ ?>
    <option value="<?php echo $i; ?>" <?php if($CuisineData['BannerTimeLimit']==$i){ ?> selected <?php } ?>><?php echo $i; ?> Days</option>
    <?php } ?>
    </select></td>
   <td><label for="bannerType">Banner Type</label></td>
    <td><select name="bannerType" id="bannerType" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" onChange="toggleOther(this.value);">
    <option value="">Select Type</option>
     <option value="BannerImg" <?php if($CuisineData['bannerType']=="BannerImg"){ ?> selected <?php } ?>>Image</option>
   <option value="Bannercode" <?php if($CuisineData['bannerType']=="Bannercode"){ ?> selected <?php } ?>>Google Code</option>
    </select></td>
    </tr>
   <tr>
    <td><label for="HomeDisplay">Home Display</label></td>
    <td>
   <table> <tr>
    <td><input type="radio" name="HomeDisplay" class="ofrty" id="HomeDisplay" value="1" <?php if($CuisineData['HomeDisplay']=='1'){ ?> checked="checked" <?php } ?> onClick="displaytd();"/> Yes</td>
    <td><input type="radio" name="HomeDisplay" class="HomeDisplay" id="HomeDisplay" <?php if($CuisineData['HomeDisplay']=='0'){ ?> checked="checked" <?php } ?> value="0" onClick="displaytd();"/> No</td>
  </tr></table>
    </td>
    
   <td><label for="BannerPosition">Banner Position</label></td>
    <td><select name="BannerPosition" id="BannerPosition" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;">
    <option value="">Select Position</option>
    <option value="Top" <?php if($CuisineData['BannerPosition']=="Top"){ ?> selected <?php } ?>>Top</option>
   <option value="Bottom" <?php if($CuisineData['BannerPosition']=="Bottom"){ ?> selected <?php } ?>>Bottom</option>
    <option value="Left" <?php if($CuisineData['BannerPosition']=="Left"){ ?> selected <?php } ?>>Left</option>
     <option value="Right" <?php if($CuisineData['BannerPosition']=="Right"){ ?> selected <?php } ?>>Right</option>
    </select></td>
   
  </tr>

  <tr <?php if($_GET['eid']!='' && $CuisineData['bannerType']!="BannerImg" && $CuisineData['bannerType']=="Bannercode"){ ?> style="display:none;" <?php } ?> id="imageInsert">
    <td><label for="BannerImg">Banner Image</label></td>
    <td><input id="BannerImg" name="BannerImg" value="" type="file"   style="width:300px;"/></td>
    <td><label for="BannerUrl">Banner Url</label></td>
    <td><input id="BannerUrl" name="BannerUrl" value="<?php echo $CuisineData['BannerUrl']; ?>" type="text"   style="width:300px;"/></td>
  </tr>
   <?php if($_GET['eid']!=''){ ?>
  <tr><td colspan="2">
 
                                                    <img src="BannerImage/small/<?php echo $CuisineData['BannerImg'];?>"  />
													
  </td></tr>
  <?php } ?>
  
   <tr <?php if($_GET['eid']!='' && $CuisineData['bannerType']!="BannerImg" && $CuisineData['bannerType']=="Bannercode"){ ?> style="display:none;" <?php } ?> id="imageInsert1">
    <td><label for="BannerWidth">Banner Width</label></td>
    <td><input id="BannerWidth" name="BannerWidth" value="<?php echo $CuisineData['BannerWidth']; ?>" type="text"   style="width:300px;"/></td>
    <td><label for="BannerHeight">Banner Height</label></td>
    <td><input id="BannerHeight" name="BannerHeight" value="<?php echo $CuisineData['BannerHeight']; ?>" type="text"   style="width:300px;"/></td>
  </tr>
 
    <tr <?php if($_GET['eid']!='' && $CuisineData['bannerType']=="BannerImg" && $CuisineData['bannerType']!="Bannercode"){ ?> style="display:none;" <?php } ?> id="codeInsert">
    <td colspan=""><label for="BannerCode">Google Code</label></td>
    <td colspan="3">
    <textarea name="BannerCode" id="BannerCode" style="width:500px; height:80px;"><?php echo $CuisineData['BannerCode']; ?></textarea>
    </td>
   
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
