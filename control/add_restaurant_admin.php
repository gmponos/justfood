<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_login","id",$_GET['eid']);
 $AdminData=mysql_fetch_assoc($CuisineQuery);
}
 ?>	
 <script type="text/javascript">
function RestaurantAdminValidate(){
var chkStatus = true
if(document.getElementById('restaurant_AdminFirstName').value =="") {
document.getElementById("restaurant_AdminFirstName").style.background='#C10000';
document.getElementById("restaurant_AdminFirstName").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_AdminFirstName').className = "";

if(document.getElementById('restaurant_AdminLoginId').value =="") {
document.getElementById("restaurant_AdminLoginId").style.background='#C10000';
document.getElementById("restaurant_AdminLoginId").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_AdminLoginId').className = "";

if(document.getElementById('AdminEmail').value =="") {
document.getElementById("AdminEmail").style.background='#C10000';
document.getElementById("AdminEmail").focus();
chkStatus = false;
}
else
document.getElementById('AdminEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('AdminEmail').value))) {
document.getElementById("AdminEmail").style.background='#8C0000';
document.getElementById("AdminEmail").focus();
chkStatus = false;
}
else
document.getElementById('AdminEmail').style.color = "";
if(document.getElementById('restaurant_AdminLoginPassword').value =="") {
document.getElementById("restaurant_AdminLoginPassword").style.background='#C10000';
document.getElementById("restaurant_AdminLoginPassword").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_AdminLoginPassword').className = "";

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
                            Setup New Restaurant Aministrator
                            <?php } else { ?>
                            Update Restaurant Aministrator
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
                            Setup New Restaurant Aministrator
                            <?php } else { ?>
                            Update Restaurant Aministrator
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Aministrator has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Aministrator is registered with selected restaurant.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Aministrator has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResAdminEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Aministrator";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResAdminAdd";
										   $buttonValue="Add New Restaurant Aministrator";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" onsubmit="return RestaurantAdminValidate();" method="post" enctype="multipart/form-data">
												
												
                                                    <table width="100%" border="0">
                                                     
   <tr>
    <td><label for="restaurant_AdminFirstName">Aministrator First Name</label></td>
    <td><input id="restaurant_AdminFirstName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_AdminFirstName" value="<?php echo $AdminData['restaurant_AdminFirstName']; ?>" type="text"  style="width:300px;" /></td></tr>
    <tr>
    <td><label for="restaurant_AdminLastName">Aministrator Last Name</label></td>
    <td><input id="restaurant_AdminLastName"  name="restaurant_AdminLastName" value="<?php echo $AdminData['restaurant_AdminLastName']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_AdminLoginId">Aministrator ID </label></td>
    <td><input id="restaurant_AdminLoginId" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_AdminLoginId" value="<?php echo $AdminData['AdminName']; ?>" type="text"  style="width:300px;" /></td></tr>
    <tr>
    <td><label for="AdminEmail">Aministrator Email</label></td>
    <td><input id="AdminEmail"  name="AdminEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $AdminData['AdminEmail']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
    <tr>
    <td><label for="restaurant_AdminLoginPassword">Aministrator Password</label></td>
    <td><input id="restaurant_AdminLoginPassword" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_AdminLoginPassword" value="<?php echo $AdminData['AdminPassword']; ?>" type="password"  style="width:300px;" /></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_AdminDOB">Aministrator Birth Date </label></td>
    <td><input id="restaurant_AdminLoginDOB"  name="restaurant_AdminLoginDOB" value="<?php echo $AdminData['restaurant_AdminLoginDOB']; ?>" type="text"   style="width:300px;" /></td>
    </tr>
    <tr>
    <td><label for="restaurant_AdminAnniversaryDate">Aministrator Anniversary Date</label></td>
    <td><input id="restaurant_AdminAnniversaryDate"  name="restaurant_AdminAnniversaryDate" value="<?php echo $AdminData['restaurant_AdminAnniversaryDate']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td colspan="2" align="center">
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
