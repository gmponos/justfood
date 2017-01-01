<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_RestaurantEmp","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}

 ?>	
 
 <script type="text/javascript">
function RestaurantEmployeeValidate(){
var chkStatus = true
if(document.getElementById('EmployeeName').value =="") {
document.getElementById("EmployeeName").style.background='#C10000';
document.getElementById("EmployeeName").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeName').className = "";

if(document.getElementById('EmployeeDesignation').value =="") {
document.getElementById("EmployeeDesignation").style.background='#C10000';
document.getElementById("EmployeeDesignation").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeDesignation').className = "";

if(document.getElementById('EmployeeDepartment').value =="") {
document.getElementById("EmployeeDepartment").style.background='#C10000';
document.getElementById("EmployeeDepartment").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeDepartment').className = "";

if(document.getElementById('EmployeeCountry').value =="") {
document.getElementById("EmployeeCountry").style.background='#C10000';
document.getElementById("EmployeeCountry").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeCountry').className = "";

if(document.getElementById('EmployeeRegion').value =="") {
document.getElementById("EmployeeRegion").style.background='#C10000';
document.getElementById("EmployeeRegion").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeRegion').className = "";

if(document.getElementById('EmployeeCity').value =="") {
document.getElementById("EmployeeCity").style.background='#C10000';
document.getElementById("EmployeeCity").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeCity').className = "";
if(document.getElementById('EmployeeEmailID').value =="") {
document.getElementById("EmployeeEmailID").style.background='#C10000';
document.getElementById("EmployeeEmailID").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeEmailID').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('EmployeeEmailID').value))) {
document.getElementById("EmployeeEmailID").style.background='#8C0000';
document.getElementById("EmployeeEmailID").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeEmailID').style.color = "";
if(document.getElementById('EmployeeMobileNo').value =="") {
document.getElementById("EmployeeMobileNo").style.background='#C10000';
document.getElementById("EmployeeMobileNo").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeMobileNo').className = "";

<?php if($_GET['eid']==''){ ?>
if(document.getElementById('photoimg').value =="") {
document.getElementById("photoimg").style.background='#C10000';
document.getElementById("photoimg").focus();
chkStatus = false;
}
else
document.getElementById('photoimg').className = "";
if(document.getElementById('EmployeeIDProofimg').value =="") {
document.getElementById("EmployeeIDProofimg").style.background='#C10000';
document.getElementById("EmployeeIDProofimg").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeIDProofimg').className = "";
<?php } ?>
if(document.getElementById('EmployeeAddress').value =="") {
document.getElementById("EmployeeAddress").style.background='#C10000';
document.getElementById("EmployeeAddress").focus();
chkStatus = false;
}
else
document.getElementById('EmployeeAddress').className = "";
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
<div id="page-wrap">
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		
        

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
							{ ?>
                            Setup New Employeer
                            <?php } else { ?>
                            Update Employeer
                            <?php } ?>  </a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
							{ ?>
                            Setup New Employeer
                            <?php } else { ?>
                            Update Employeer
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Employeer has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Employeer is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Employeer  has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResEmployeeEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Employer";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=EmployeeAdd";
										   $buttonValue="Add New Employer";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantEmployeeValidate();">
												<input type="hidden" name="photoimgold" value="<?php echo $CuisineData['EmployeePhoto']; ?>" />
                                                <input type="hidden" name="EmployeeIDProofimgold" value="<?php echo $CuisineData['EmployeeIDProof']; ?>" />
												
                                                    <table width="100%" border="0">
                                                  
  <tr>
    <td><label for="EmployeeName">Employee Name</label></td>
    <td><input  name="EmployeeName" value="<?php echo $CuisineData['EmployeeName']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="EmployeeName"  type="text"   style="width:300px;"/></td>
    <td><label for="EmployeeDesignation">Employee Designation</label></td>
    <td><input value="<?php echo $CuisineData['EmployeeDesignation']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="EmployeeDesignation"  name="EmployeeDesignation" type="text"   style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="EmployeeDepartment">Employee Department</label></td>
    <td><input  name="EmployeeDepartment" value="<?php echo $CuisineData['EmployeeDepartment']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="EmployeeDepartment"  type="text"   style="width:300px;"/></td>
    <td><label for="EmployeeCountry">Employee Country</label></td>
    <td><input value="<?php echo $CuisineData['EmployeeCountry']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  type="text" id="EmployeeCountry" name="EmployeeCountry"   style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="Name">Employee Region</label></td>
    <td><input  name="EmployeeRegion" id="EmployeeRegion" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" value="<?php echo $CuisineData['EmployeeRegion']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="EmployeeCity">Employee City</label></td>
    <td><input value="<?php echo $CuisineData['EmployeeCity']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="EmployeeCity" name="EmployeeCity"   type="text"   style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="EmployeeEmailID">Employee Email ID</label></td>
    <td><input  name="EmployeeEmailID" value="<?php echo $CuisineData['EmployeeEmailID']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="EmployeeEmailID"  type="text"   style="width:300px;"/></td>
    <td><label for="EmployeeMobileNo">Employee Mobile No</label></td>
    <td><input value="<?php echo $CuisineData['EmployeeMobileNo']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  type="text"  id="EmployeeMobileNo" name="EmployeeMobileNo"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="EmployeeDOB">Employee DOB</label></td>
    <td><input  name="EmployeeDOB" id="EmployeeDOB" value="<?php echo $CuisineData['EmployeeDOB']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="EmployeeAnniversary">Employee Anniversary Date</label></td>
    <td><input value="<?php echo $CuisineData['EmployeeAnniversary']; ?>"  type="text" id="EmployeeAnniversary"  name="EmployeeAnniversary"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="EmployeePhoto">Employee Photo</label></td>
    <td>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                   <input  name="photoimg" id="photoimg" value=""  type="file" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   style="width:300px;"/>
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
    
    </td>
    <td><label for="EmployeeIDProof">Employee ID Proof</label></td>
    <td>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                      <input value=""  type="file" id="EmployeeIDProofimg" name="EmployeeIDProofimg" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   style="width:300px;" />
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
   </td>
  </tr>
   <?php if($_GET['eid']!=''){ ?>
   <tr>
    <td><label for="restaurant_Logo">Employee Photo </label></td>
    <td><img src="EmployeePhoto/<?php echo $CuisineData['EmployeePhoto'];?>" width="200" height="150" /></td>
    <td><label for="restaurant_Market_bannerImg">Employee ID Proof</label></td>
    <td><img src="EmployeeIDproof/<?php echo $CuisineData['EmployeeIDProof'];?>" width="200" height="150" /></td>
  </tr>
  <?php } ?>
   <tr>
    <td><label for="EmployeeResidenceNo">Employee Residence No.</label></td>
    <td><input  name="EmployeeResidenceNo" id="EmployeeResidenceNo" value="<?php echo $CuisineData['EmployeeResidenceNo']; ?>"  type="text"   style="width:300px;"/></td>
    <td><label for="EmployeeBranchName">Employee Branch</label></td>
    <td> <input  name="EmployeeBranchName" id="EmployeeBranchName" value="<?php echo $CuisineData['EmployeeBranchName']; ?>"  type="text"   style="width:300px;"/></td>
  </tr>
  <tr>
    <td colspan=""><label for="EmployeeAddress">Employee Address</label></td>
    <td colspan="3">
    <textarea name="EmployeeAddress" id="EmployeeAddress" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:800px; height:80px;"><?php echo $CuisineData['EmployeeAddress']; ?></textarea>
    </td>
   
  </tr>
   
    <tr>
   
    <td colspan="4" align="center">
  <input id="" type="submit" class="btn btn-primary " name="EmployeeSubmit" value="<?php echo $buttonValue; ?>" />
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
