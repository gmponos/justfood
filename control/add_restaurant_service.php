<?php include('route/header.php'); 
 include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantService","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
?>	
<script type="text/javascript">
function RestauranserviceValidate(){
var chkStatus = true
if(document.getElementById('restaurant_service_name').value =="") {
document.getElementById("restaurant_service_name").style.background='#C10000';
document.getElementById("restaurant_service_name").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_service_name').className = "";
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
                            Setup New Restaurant Service
                            <?php } else { ?>
                            Update Restaurant Service
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href=""><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Service
                            <?php } else { ?>
                            Update Restaurant Service
                            <?php } ?></a>
											</div>
										</div>
                                        <table width="100%" border="0" align="center">
  <tr>
    <td>                                   <?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Service has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Service is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                            <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Service has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Service has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Service has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?>
                                            
                                            </td>
  </tr>
</table>
 <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResServiceEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Service";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResServiceAdd";
										   $buttonValue="Add New Restaurant Service";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" onsubmit="return RestauranserviceValidate();">
												
												
                                                    <table  align="center" border="0">
                                                     <tr>
   <td><label for="Name">Restaurant Service Name</label></td>
    <td><input  name="restaurant_service_name" id="restaurant_service_name" value="<?php echo $CuisineData['restaurant_service_name']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  type="text"   style="width:250px;"/></td></tr>
  
    <tr>
   
    <td align="center">
  <input id="restaurantTypeSubmit" name="restaurantTypeSubmit" type="submit" class="btn btn-primary " value="<?php echo $buttonValue; ?>" />
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
