<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_resDeliveryBoy","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 ?>	
 
 <script type="text/javascript">
function RestaurantDeliveryValidate(){
var chkStatus = true
if(document.getElementById('DeliveryBoyRestaurantID').value =="") {
document.getElementById("DeliveryBoyRestaurantID").style.background='#C10000';
document.getElementById("DeliveryBoyRestaurantID").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyRestaurantID').className = "";

if(document.getElementById('DeliveryBoyName').value =="") {
document.getElementById("DeliveryBoyName").style.background='#C10000';
document.getElementById("DeliveryBoyName").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyName').className = "";

if(document.getElementById('DeliveryBoyCountry').value =="") {
document.getElementById("DeliveryBoyCountry").style.background='#C10000';
document.getElementById("DeliveryBoyCountry").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyCountry').className = "";

if(document.getElementById('DeliveryBoyState').value =="") {
document.getElementById("DeliveryBoyState").style.background='#C10000';
document.getElementById("DeliveryBoyState").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyState').className = "";

if(document.getElementById('DeliveryBoyCity').value =="") {
document.getElementById("DeliveryBoyCity").style.background='#C10000';
document.getElementById("DeliveryBoyCity").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyCity').className = "";

if(document.getElementById('DeliveryBoyArea').value =="") {
document.getElementById("DeliveryBoyArea").style.background='#C10000';
document.getElementById("DeliveryBoyArea").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyArea').className = "";
if(document.getElementById('DeliveryBoyEmailID').value =="") {
document.getElementById("DeliveryBoyEmailID").style.background='#C10000';
document.getElementById("DeliveryBoyEmailID").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyEmailID').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('DeliveryBoyEmailID').value))) {
document.getElementById("DeliveryBoyEmailID").style.background='#8C0000';
document.getElementById("DeliveryBoyEmailID").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyEmailID').style.color = "";
if(document.getElementById('DeliveryBoyMobileNo').value =="") {
document.getElementById("DeliveryBoyMobileNo").style.background='#C10000';
document.getElementById("DeliveryBoyMobileNo").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyMobileNo').className = "";

<?php if($_GET['eid']==''){ ?>
if(document.getElementById('photoimg').value =="") {
document.getElementById("photoimg").style.background='#C10000';
document.getElementById("photoimg").focus();
chkStatus = false;
}
else
document.getElementById('photoimg').className = "";
if(document.getElementById('DeliveryBoyIDProofimg').value =="") {
document.getElementById("DeliveryBoyIDProofimg").style.background='#C10000';
document.getElementById("DeliveryBoyIDProofimg").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyIDProofimg').className = "";
<?php } ?>
if(document.getElementById('DeliveryBoyAddress').value =="") {
document.getElementById("DeliveryBoyAddress").style.background='#C10000';
document.getElementById("DeliveryBoyAddress").focus();
chkStatus = false;
}
else
document.getElementById('DeliveryBoyAddress').className = "";
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
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
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
                            Setup New Restaurant Delivery Boy
                            <?php } else { ?>
                            Update Restaurant Delivery Boy
                            <?php } ?> </a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Delivery Boy
                            <?php } else { ?>
                            Update Restaurant Delivery Boy
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Delivery Boy has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Delivery Boy is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Delivery Boy has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResDeliveryBoyEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Delivery Boy";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=DeliveryBoyAdd";
										   $buttonValue="Add New Delivery Boy";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantDeliveryValidate();">
												<input type="hidden" name="photoimgold" value="<?php echo $CuisineData['DeliveryBoyPhoto']; ?>" />
                                                <input type="hidden" name="DeliveryBoyIDProofimgold" value="<?php echo $CuisineData['DeliveryBoyIDProof']; ?>" />
												
                                                    <table width="100%" border="0">
                                                  
  <tr>
    <td><label for="DeliveryBoyRestaurantID">Restaurant Name</label></td>
    <td><select class="chzn-select" data-placeholder="Select Restaurant Type..." onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="DeliveryBoyRestaurantID" name="DeliveryBoyRestaurantID" style="width:317px;">
											 <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['DeliveryBoyRestaurantID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											</select></td>
    <td><label for="DeliveryBoyName">Delivery Boy Name</label></td>
    <td><input value="<?php echo $CuisineData['DeliveryBoyName']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="DeliveryBoyName" id="DeliveryBoyName"  type="text"   style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="DeliveryBoyCountry">Delivery Boy Country</label></td>
    <td><input  name="DeliveryBoyCountry" id="DeliveryBoyCountry" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['DeliveryBoyCountry']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="DeliveryBoyState">Delivery Boy State</label></td>
    <td><input name="DeliveryBoyState" id="DeliveryBoyState" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['DeliveryBoyState']; ?>"  type="text"   style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyCity">Delivery Boy City</label></td>
    <td><input  name="DeliveryBoyCity" id="DeliveryBoyCity" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['DeliveryBoyCity']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="DeliveryBoyArea">Delivery Boy Area</label></td>
    <td><input value="<?php echo $CuisineData['DeliveryBoyArea']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   type="text" id="DeliveryBoyArea" name="DeliveryBoyArea"   style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyEmailID">Delivery Boy Email ID</label></td>
    <td><input  name="DeliveryBoyEmailID" id="DeliveryBoyEmailID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['DeliveryBoyEmailID']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="DeliveryBoyMobileNo">Delivery Boy Mobile No</label></td>
    <td><input value="<?php echo $CuisineData['DeliveryBoyMobileNo']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   type="text" id="DeliveryBoyMobileNo" name="DeliveryBoyMobileNo"   style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyDOB">Delivery Boy DOB</label></td>
    <td><input  name="DeliveryBoyDOB" id="DeliveryBoyDOB" value="<?php echo $CuisineData['DeliveryBoyDOB']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="DeliveryBoyAnniversaryDate">Delivery Boy Anniversary Date</label></td>
    <td><input value="<?php echo $CuisineData['DeliveryBoyAnniversaryDate']; ?>" id="DeliveryBoyAnniversaryDate" name="DeliveryBoyAnniversaryDate"  type="text"   style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyPhoto">Delivery Boy Photo</label></td>
    <td>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                        <input  name="photoimg" id="photoimg" value=""  type="file" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"    style="width:300px;"/>
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
   </td>
    <td><label for="DeliveryBoyIDProof">Delivery Boy ID Proof</label></td>
    <td>
    
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input value=""  type="file" id="DeliveryBoyIDProofimg" name="DeliveryBoyIDProofimg" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"    style="width:300px;" />
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
   </td>
  </tr>
   
  <?php if($_GET['eid']!=''){ ?>
   <tr>
    <td><label for="restaurant_Logo">Restaurant Logo </label></td>
    <td><img src="DeliveryBoyPhoto/<?php echo $CuisineData['DeliveryBoyPhoto'];?>" width="200" height="150" /></td>
    <td><label for="restaurant_Market_bannerImg">Market Banner Image</label></td>
    <td><img src="DeliveryBoyIDproof/<?php echo $CuisineData['DeliveryBoyIDProof'];?>" width="200" height="150" /></td>
  </tr>
  <?php } ?>
  
   <tr>
    <td><label for="DeliveryBoyResidenceNo">Delivery Boy Residence No.</label></td>
    <td><input  name="DeliveryBoyResidenceNo" id="DeliveryBoyResidenceNo" value="<?php echo $CuisineData['DeliveryBoyResidenceNo']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="DeliveryBoyAddress">Delivery Boy Address</label></td>
    <td> <textarea name="DeliveryBoyAddress" id="DeliveryBoyAddress" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   style="width:300px; height:60px;"><?php echo $CuisineData['DeliveryBoyAddress']; ?></textarea></td>
  </tr>
 
   
    <tr>
   
    <td colspan="4" align="center">
  <input id="SubmitDeliveryBoy" type="submit" class="btn btn-primary " name="SubmitDeliveryBoy" value="<?php echo $buttonValue; ?>" />
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
 <script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
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
