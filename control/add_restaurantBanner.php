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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']==''){ ?>
                            Setup New Restaurant Banner
                            <?php } else { ?>
                            Update Restaurant Banner
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
                            Setup New Restaurant Banner
                            <?php } else { ?>
                            Update Restaurant Banner
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Banner has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Banner is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Banner has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResBannerEdit&RestaurantBy=1&pageGet=1&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Banner";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResBannerAdd&RestaurantBy=1&pageGet=1";
										   $buttonValue="Add New Restaurant Banner";
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
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" name="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantBannerValidate();">
												<input type="hidden" name="BannerImgold" value="<?php echo $CuisineData['BannerImg']; ?>" />
												
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_id">Restaurant Name</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant..." onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="ResBannerNameID" name="ResBannerNameID" style="width:317px;" >
    <option value="0">Select Restaurant</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['ResBannerNameID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											
											</select></td>
    <td><label for="bannerType">Banner Type</label></td>
    <td><select name="bannerType" id="bannerType" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" onchange="toggleOther(this.value);">
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
    <td><label for="bannerLimit">Banner Limit</label></td>
    <td><select name="BannerTimeLimit" id="BannerTimeLimit" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" >
    <option value="">Select Limit</option>
    <?php for($i=1;$i<=365;$i++){ ?>
    <option value="<?php echo $i;?>"  <?php if($CuisineData['BannerTimeLimit']==$i){ ?> selected <?php } ?>><?php echo $i; ?> Days</option>
    <?php } ?>
    </select></td>
  </tr>

  <tr  <?php if($_GET['eid']!='' && $CuisineData['bannerType']!="BannerImg" && $CuisineData['bannerType']=="Bannercode"){ ?> style="display:none;" <?php } ?> id="imageInsert">
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
  
   <tr  <?php if($_GET['eid']!='' && $CuisineData['bannerType']!="BannerImg" && $CuisineData['bannerType']=="Bannercode"){ ?> style="display:none;" <?php } ?> id="imageInsert1">
    <td><label for="BannerWidth">Banner Width</label></td>
    <td><input id="BannerWidth" name="BannerWidth" value="<?php echo $CuisineData['BannerWidth']; ?>" type="text"   style="width:300px;"/></td>
    <td><label for="BannerHeight">Banner Height</label></td>
    <td><input id="BannerHeight" name="BannerHeight" value="<?php echo $CuisineData['BannerHeight']; ?>" type="text"   style="width:300px;"/></td>
  </tr>
 
    <tr  <?php if($_GET['eid']!='' && $CuisineData['bannerType']=="BannerImg" && $CuisineData['bannerType']!="Bannercode"){ ?> style="display:none;" <?php } ?> id="codeInsert">
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
