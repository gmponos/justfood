<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantOwner","id",$_GET['eid']);
 $OwnerData=mysql_fetch_assoc($CuisineQuery);
}
 ?>	
 
 <script type="text/javascript">
function RestauranOwnerValidate(){
var chkStatus = true
if(document.getElementById('restaurant_id').value =="") {
document.getElementById("restaurant_id").style.background='#C10000';
document.getElementById("restaurant_id").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_id').className = "";

if(document.getElementById('restaurant_OwnerFirstName').value =="") {
document.getElementById("restaurant_OwnerFirstName").style.background='#C10000';
document.getElementById("restaurant_OwnerFirstName").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerFirstName').className = "";

if(document.getElementById('restaurant_OwnerLoginId').value =="") {
document.getElementById("restaurant_OwnerLoginId").style.background='#C10000';
document.getElementById("restaurant_OwnerLoginId").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerLoginId').className = "";

if(document.getElementById('restaurant_OwnerLoginPassword').value =="") {
document.getElementById("restaurant_OwnerLoginPassword").style.background='#C10000';
document.getElementById("restaurant_OwnerLoginPassword").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerLoginPassword').className = "";
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
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Owner
                            <?php } else { ?>
                            Update Restaurant Owner
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well" style="min-height:900px;">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Owner
                            <?php } else { ?>
                            Update Restaurant Owner
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Owner has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Owner is registered with selected restaurant.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Owner has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResOwnerEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Owner";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResOwnerAdd";
										   $buttonValue="Add New Restaurant Owner";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestauranOwnerValidate();">
												
												
                                                    <table width="100%" border="0">
                                                     <tr>
    <td colspan="2"><label for="restaurant_id">Restaurant Name</label></td>
    <td colspan="2">	<select class="chzn-select" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" data-placeholder="Select Restaurant..." id="restaurant_id" name="restaurant_id" style="width:350px;" >
    <option value="0">Select Restaurant</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($OwnerData['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											
											</select></td>
  
  </tr>
   <tr>
    <td><label for="restaurant_OwnerFirstName">Owner First Name</label></td>
    <td><input id="restaurant_OwnerFirstName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_OwnerFirstName" value="<?php echo $OwnerData['restaurant_OwnerFirstName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLastName">Owner Last Name</label></td>
    <td><input id="restaurant_OwnerLastName"  name="restaurant_OwnerLastName" value="<?php echo $OwnerData['restaurant_OwnerLastName']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_OwnerLoginId">Owner ID </label></td>
    <td><input id="restaurant_OwnerLoginId" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_OwnerLoginId" value="<?php echo $OwnerData['restaurant_OwnerLoginId']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLoginPassword">Owner Password</label></td>
    <td><input id="restaurant_OwnerLoginPassword" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_OwnerLoginPassword" value="<?php echo $OwnerData['restaurant_OwnerLoginPassword']; ?>" type="password"  style="width:300px;" /></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_OwnerDOB">Owner Birth Date </label></td>
    <td><input id="restaurant_OwnerDOB"  name="restaurant_OwnerLoginDOB" value="<?php echo $OwnerData['restaurant_OwnerLoginDOB']; ?>" type="text"   style="width:300px;" /></td>
    <td><label for="restaurant_OwnerAnniversaryDate">Owner Anniversary Date</label></td>
    <td><input id="restaurant_OwnerAnniversaryDate"  name="restaurant_OwnerAnniversaryDate" value="<?php echo $OwnerData['restaurant_OwnerAnniversaryDate']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
   
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
