<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
 $CuisineQuery = $dbb->showtabledata("tbl_ownerSetting","id",1);
 $cdata=mysql_fetch_assoc($CuisineQuery);
 ?><div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                           Restaurant Owner Permission Setting
                            <?php } else { ?>
                           Restaurant Owner Permission Setting
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
                           Restaurant Owner Permission Setting
                            <?php } else { ?>
                           Restaurant Owner Permission Setting
                            <?php } ?></a>
											</div>
										</div>
                                      <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> Restaurant Owner Permission Setting has been successfully saved
                        </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />Restaurant Owner Permission Setting is already exit.
                        </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Owner Permission Setting has been successfully updated.
                        </div>
											<?php }?>
                      </td></tr></table>
                                            
										<div class="row-fluid" >
											<div  class=" span12">
											  <form id="SignupForm" action="InsertPhp.php?tag=OwnerSettingEdit&eid=1" method="post" enctype="multipart/form-data">
												
												
<table width="100%" border="0" >
                                                     <tr>
    <td width="44%" height="28"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Restaurant</strong> </label></td>
    <td width="56%"><input type="radio" name="restUpdatePermission" value="0" id="radio1" <?php if($cdata['restUpdatePermission']==0){ ?> checked <?php } ?> class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="restUpdatePermission" value="1" <?php if($cdata['restUpdatePermission']==1){ ?> checked <?php } ?> id="radio2" class="css-checkbox" />
      No</strong></td>
    </tr>
    
      <tr>
    <td height="30"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Menu Category</strong> </label></td>
    <td><input type="radio" name="MenuCatUpdatePermission" value="0" <?php if($cdata['MenuCatUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="MenuCatUpdatePermission" value="1" <?php if($cdata['MenuCatUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>
     <tr>
    <td height="28"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Food Items</strong> </label></td>
    <td><input type="radio" name="FoodItemUpdatePermission" value="0" <?php if($cdata['FoodItemUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="FoodItemUpdatePermission" value="1" <?php if($cdata['FoodItemUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>
     <tr>
    <td height="30"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Delivery Area</strong> </label></td>
    <td><input type="radio" name="DeliveryAreaUpdatePermission" value="0" <?php if($cdata['DeliveryAreaUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="DeliveryAreaUpdatePermission" value="1" <?php if($cdata['DeliveryAreaUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>
    
     <tr>
    <td height="28"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Time Table</strong> </label></td>
    <td><input type="radio" name="TimeTableUpdatePermission" value="0" <?php if($cdata['TimeTableUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="TimeTableUpdatePermission" value="1" <?php if($cdata['TimeTableUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>
           
          <tr>
    <td height="31"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Employee</strong> </label></td>
    <td><input type="radio" name="EmpUpdatePermission" value="0" <?php if($cdata['EmpUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="EmpUpdatePermission" value="1" <?php if($cdata['EmpUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>                                            
   
   
       <tr>
    <td height="30"><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Delivery Boy</strong> </label></td>
    <td><input type="radio" name="DeliveryBoyUpdatePermission" value="0" <?php if($cdata['DeliveryBoyUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="DeliveryBoyUpdatePermission" value="1"  <?php if($cdata['DeliveryBoyUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>                                            
   
   
       <tr>
    <td><label for="restaurant_OwnerFirstName"><strong>Update/Delete/Activate/Deactive Gallery</strong> </label></td>
    <td><input type="radio" name="GalleryUpdatePermission" value="0" <?php if($cdata['GalleryUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="GalleryUpdatePermission" value="1" <?php if($cdata['GalleryUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>                                            
   
     <tr>
    <td><label for="OfferUpdatePermission"><strong>Update/Delete/Activate/Deactive Restaurant Offer</strong> </label></td>
    <td><input type="radio" name="OfferUpdatePermission" value="0" <?php if($cdata['OfferUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="OfferUpdatePermission" value="1" <?php if($cdata['OfferUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>  
   
    <tr>
    <td><label for="EventUpdatePermission"><strong>Update/Delete/Activate/Deactive Restaurant Event</strong> </label></td>
    <td><input type="radio" name="EventUpdatePermission" value="0" <?php if($cdata['EventUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="EventUpdatePermission" value="1" <?php if($cdata['EventUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>  
    
    
   <?php /*?> <tr>
    <td><label for="DealsUpdatePermission"><strong>Update/Delete/Activate/Deactive Restaurant Deals</strong> </label></td>
    <td><input type="radio" name="DealsUpdatePermission" value="0" <?php if($cdata['DealsUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="DealsUpdatePermission" value="1" <?php if($cdata['EventUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr> <?php */?> 
   
     
     <tr>
    <td><label for="restaurant_OwnerFirstName"><strong>Export/Generate PDF/ Print Order Report</strong> </label></td>
    <td><input type="radio" name="OrderReportUpdatePermission" value="0" <?php if($cdata['OrderReportUpdatePermission']==0){ ?> checked <?php } ?> id="radio3" class="css-checkbox" />
      <strong>Yes &nbsp;
      <input type="radio" name="OrderReportUpdatePermission" value="1" <?php if($cdata['OrderReportUpdatePermission']==1){ ?> checked <?php } ?> id="radio4" class="css-checkbox" />
      No</strong></td>
    </tr>                                            
   
  
  
<tr><td  colspan="2">&nbsp;</td></tr>
   
    <td colspan="4" align="center">
  <input  type="submit" class="btn btn-primary " name="RestaurantOfferSubmit" id="RestaurantOfferSubmit" value="Restaurant Owner Setting" />
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
