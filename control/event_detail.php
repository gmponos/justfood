<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['ViewId']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantEvent","id",$_GET['ViewId']);
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>
                            Restaurant Event Detail
                           </a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant Event Detail</a>
											</div>
										</div>
                                        
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="manage_restaurant_event.php" method="post" enctype="multipart/form-data">
												
												<fieldset>
													<legend>Event information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="RestaurantEventID">Restaurant Name</label></td>
    <td>	<?php $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$CuisineData['RestaurantEventID']));
													echo ucwords($StQuery['restaurant_name']);?></td>
													
    <td><label for="RestaurantEventName">Event Name</label></td>
    <td><?php echo $CuisineData['RestaurantEventName']; ?></td>
  </tr>
  <tr>
    <td><label for="RestaurantEventStartDate">Event Start Date</label></td>
    <td><?php echo $CuisineData['RestaurantEventStartDate']; ?></td>
    <td><label for="RestaurantEventStartTime">Event Start Time</label></td>
    <td><?php echo $CuisineData['RestaurantEventStartTime']; ?></td>
  </tr>
   <tr>
    <td><label for="RestaurantEventEndDate">Event End Date</label></td>
    <td><?php echo $CuisineData['RestaurantEventEndDate']; ?></td>
    <td><label for="RestaurantEventEndTime">Event End Time</label></td>
    <td><?php echo $CuisineData['RestaurantEventEndTime']; ?></td>
  </tr>
  
   <tr>
    <td colspan=""><label for="RestaurantEventAddress">Event Address</label></td>
    <td colspan="3">
   <?php echo $CuisineData['RestaurantEventAddress']; ?>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="RestaurantEventDescription">Event Description</label></td>
    <td colspan="3">
   <?php echo $CuisineData['RestaurantEventDescription']; ?>
    </td>
   
  </tr>
  
  
</table>	</fieldset>

                                    
                                    <fieldset>
													<legend>Event Image information</legend>
                                                    
                                                    <table width="100%" border="0">
                                               
  
  
  <tr><td colspan="2">
  <?php $imh=explode(',',$CuisineData['RestaurantEventImgThumb']);
													foreach($imh as $v)
													{
													if($v!='')
													{?>
                                                    <img src="EventImg/thumb/<?php echo $v; ?>" width="250" height="100" /><br />
													<?php } }
													
													?>
  </td></tr>
 
  
</table>	</fieldset>
                                    
                                    
                                    		
												
												<input id="submitWizard" type="submit" class="btn btn-primary submitWizard" value="Go To Manage Event >>" />
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
