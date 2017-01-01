<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['ViewId']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_resDeliveryBoy","id",$_GET['ViewId']);
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['ViewId']=='')
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
												<a class="brand" href="#"><?php  if($_GET['ViewId']=='')
										   { ?>
                            Setup New Restaurant Delivery Boy
                            <?php } else { ?>
                            Update Restaurant Delivery Boy
                            <?php } ?></a>
											</div>
										</div>
                                        
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="manage_deliveryboy.php" method="post" enctype="multipart/form-data">
												
												
                                                    <table width="100%" border="0">
                                                  
  <tr>
    <td><label for="DeliveryBoyRestaurantID">Restaurant Name</label></td>
    <td>
    <?php $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$CuisineData['DeliveryBoyRestaurantID']));
	?></td>
    <td><label for="DeliveryBoyName">Delivery Boy Name</label></td>
    <td><?php echo $CuisineData['DeliveryBoyName']; ?></td>
  </tr>
  
   <tr>
    <td><label for="DeliveryBoyCountry">Delivery Boy Country</label></td>
    <td><?php echo $CuisineData['DeliveryBoyCountry']; ?></td>
    <td><label for="DeliveryBoyState">Delivery Boy State</label></td>
    <td><?php echo $CuisineData['DeliveryBoyState']; ?></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyCity">Delivery Boy City</label></td>
    <td><?php echo $CuisineData['DeliveryBoyCity']; ?></td>
    <td><label for="DeliveryBoyArea">Delivery Boy Area</label></td>
    <td><?php echo $CuisineData['DeliveryBoyArea']; ?></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyEmailID">Delivery Boy Email ID</label></td>
    <td><?php echo $CuisineData['DeliveryBoyEmailID']; ?></td>
    <td><label for="DeliveryBoyMobileNo">Delivery Boy Mobile No</label></td>
    <td><?php echo $CuisineData['DeliveryBoyMobileNo']; ?></td>
  </tr>
   <tr>
    <td><label for="DeliveryBoyDOB">Delivery Boy DOB</label></td>
    <td><?php echo $CuisineData['DeliveryBoyDOB']; ?></td>
    <td><label for="DeliveryBoyAnniversaryDate">Delivery Boy Anniversary Date</label></td>
    <td><?php echo $CuisineData['DeliveryBoyAnniversaryDate']; ?></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_Logo">Delivery Boy Photo </label></td>
    <td><img src="DeliveryBoyPhoto/<?php echo $CuisineData['DeliveryBoyPhoto'];?>" width="200" height="150" /></td>
    <td><label for="restaurant_Market_bannerImg">Delivery Boy ID Proof</label></td>
    <td><img src="DeliveryBoyIDproof/<?php echo $CuisineData['DeliveryBoyIDProof'];?>" width="200" height="150" /></td>
  </tr>
 
   <tr>
    <td><label for="DeliveryBoyResidenceNo">Delivery Boy Residence No.</label></td>
    <td><?php echo $CuisineData['DeliveryBoyResidenceNo']; ?></td>
    <td><label for="DeliveryBoyAddress">Delivery Boy Address</label></td>
    <td> <?php echo $CuisineData['DeliveryBoyAddress']; ?></td>
  </tr>
 
   
    <tr>
   
    <td colspan="4" align="center">
  <input id="SubmitDeliveryBoy" type="button" class="btn btn-primary " name="SubmitDeliveryBoy" value="Manage Delivery Boy" />
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
