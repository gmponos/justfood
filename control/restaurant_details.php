<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['ViewId']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['ViewId']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $OwnerQuery = $dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$_GET['ViewId']);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
 
 $BankQuery = $dbb->showtabledata("tbl_restaurantBank","restaurant_id",$_GET['ViewId']);
 $BankData=mysql_fetch_assoc($BankQuery);
 
  $SEOQuery = $dbb->showtabledata("tbl_restaurantSEO","restaurant_id",$_GET['ViewId']);
 $SEOData=mysql_fetch_assoc($SEOQuery);
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
                            Restaurant Details 
                            <?php } else { ?>
                            Restaurant Details
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1300px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['ViewId']=='')
										   { ?>
                            Restaurant Details 
                            <?php } else { ?>
                            Restaurant Details
                            <?php } ?></a>
											</div>
										</div>
                                        
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="manage_restaurant.php" method="post" enctype="multipart/form-data">
											
												<fieldset>
													<legend>Contact information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_country">Restaurant Type</label></td>
    <td><?php echo $CuisineData['restaurant_type']; ?></td>
    <td><label for="restaurant_country">Restaurant Service</label></td>
    <td><?php echo $CuisineData['restaurant_service']; ?></td>
  </tr>
  <tr>
    <td><label for="Name">Restaurant Name</label></td>
    <td><?php echo $CuisineData['restaurant_name']; ?></td>
    <td><label for="restaurant_phone">Restaurant Phone</label></td>
    <td><?php echo $CuisineData['restaurant_phone']; ?></td>
  </tr>
   <tr>
    <td><label for="restaurant_website">Restaurant Website</label></td>
    <td><?php echo $CuisineData['restaurant_website']; ?></td>
    <td><label for="restaurant_fax">Restaurant Fax</label></td>
    <td><?php echo $CuisineData['restaurant_fax']; ?></td>
  </tr>
  
  
  
  </tr>
   <tr>
    <td><label for="restaurant_cuisine">Restaurant Cuisine</label></td>
    <td>
    <?php echo $CuisineData['restaurant_cuisine']; ?>
 </td>
    <td><label for="restaurant_facilities">Restaurant Facilities</label></td>
    <td>	
    <?php echo $CuisineData['restaurant_facilities']; ?>
  </td>
  </tr>
  
    <tr>
    <td><label for="restaurant_contact_name">Contact Name</label></td>
    <td><?php echo $CuisineData['restaurant_contact_name']; ?></td>
    <td><label for="restaurant_contact_phone">Contact Phone</label></td>
    <td><?php echo $CuisineData['restaurant_contact_phone']; ?></td>
  </tr>
  
    <tr>
    <td><label for="restaurant_contact_mobile">Contact Mobile</label></td>
    <td><?php echo $CuisineData['restaurant_contact_mobile']; ?></td>
    <td><label for="restaurant_contact_email">Contact Email</label></td>
    <td><?php echo $CuisineData['restaurant_contact_email']; ?></td>
  </tr>
  
    <tr>
    <td><label for="restaurant_social_media">Social Media</label></td>
    <td>
    <?php echo $CuisineData['restaurant_social_media']; ?>
    </td>
    <td><label for="restaurant_sms_mobile">SMS Mobile No.</label></td>
    <td><?php echo $CuisineData['restaurant_sms_mobile']; ?></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_default_min_order">Min. Order</label></td>
    <td><?php echo $CuisineData['restaurant_default_min_order']; ?></td>
    <td><label for="restaurant_saleTaxNo">Sales Tax No.</label></td>
    <td><?php echo $CuisineData['restaurant_saleTaxNo']; ?></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_saleTaxDate">Sales Tax Date</label></td>
    <td><?php echo $CuisineData['restaurant_saleTaxDate']; ?></td>
    <td><label for="restaurant_saleTaxPercentage">Sales Tax %</label></td>
    <td><?php echo $CuisineData['restaurant_saleTaxPercentage']; ?></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_payment_method">Payment Method</label></td>
    <td>
    <?php echo $CuisineData['restaurant_payment_method']; ?>
   </td>
    <td><label for="restaurant_fax">Credit Card Fees</label></td>
    <td><?php echo $CuisineData['restaurant_credit_card_fess']; ?></td>
  </tr>
  
    <tr>
    <td><label for="restaurant_cloud_printer_email">Cloud Printer Email</label></td>
    <td><?php echo $CuisineData['restaurant_cloud_printer_email']; ?></td>
    <td><label for="restaurant_cloud_printer_password">Cloud Printer Password</label></td>
    <td><?php echo $CuisineData['restaurant_cloud_printer_password']; ?></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_commission">Restaurant Commission (%) </label></td>
    <td><?php echo $CuisineData['restaurant_commission']; ?></td>
    <td><label for="restaurant_invoiceTimePeriod">Invoice Time Period</label></td>
    <td>
											  <?php if($CuisineData['restaurant_invoiceTimePeriod']=="7"){?> Weekly <?php } ?>
                                              <?php if($CuisineData['restaurant_invoiceTimePeriod']=="15"){?> 15 Days <?php } ?>
                                              <?php if($CuisineData['restaurant_invoiceTimePeriod']=="30"){?> Monthly <?php } ?>
											</td>
  </tr>
  
  
  <tr>
    <td><label for="restaurant_Listing_date">Restaurant Listing Date </label></td>
    <td><?php echo $CuisineData['restaurant_Listing_date']; ?></td>
    <td><label for="restaurant_Listing_Category">Listing Category</label></td>
    <td>
     <?php if($CuisineData['restaurant_Listing_Category']=="1"){?> Diamond <?php } ?>
                                              <?php if($CuisineData['restaurant_Listing_Category']=="2"){?> Plainumt <?php } ?>
                                              <?php if($CuisineData['restaurant_Listing_Category']=="3"){?> Gold <?php } ?>
   </td>
  </tr>
  
  
</table>

													
													
													
													
													
												</fieldset>
												
												<fieldset>
 						<legend>Location information</legend>
												 <table width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_state">Restaurant State</label></td>
    <td>	
    <?php echo $CuisineData['restaurantState']; ?>
    </td>
    <td><label for="restaurant_city">Restaurant City</label></td>
    <td id="restaurant_city">	
      <?php echo $CuisineData['restaurantCity']; ?>
    </td>
  </tr>
 
    <tr>
    <td colspan="4" id="zipcode"></td>
   
  </tr>

  
   <tr>
    <td colspan=""><label for="restaurant_address">Restaurant Address</label></td>
    <td colspan="3">
    <?php echo $CuisineData['restaurant_address']; ?>
    </td>
   
  </tr>
  
    <tr>
    <td colspan=""><label for="restaurant_description">Restaurant Description</label></td>
    <td colspan="3">
    <?php echo $CuisineData['restaurant_description']; ?>
    </td>
   
  </tr>
  <tr>
    <td><label for="restaurant_deliveryDistance">Delivery Distance (miles) </label></td>
    <td><?php echo $CuisineData['restaurant_deliveryDistance']; ?></td>
    <td><label for="restaurant_FaxGateway">Fax Gateway</label></td>
    <td><?php echo $CuisineData['restaurant_FaxGateway']; ?></td>
  </tr>
  
  </table>
												</fieldset>
												
												<fieldset>
													<legend>Email & Photo Setting information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_InvoiceEmail">Invoice Email </label></td>
    <td><?php echo $CuisineData['restaurant_InvoiceEmail']; ?></td>
    <td><label for="restaurant_OrderEmail">Order Email</label></td>
    <td><?php echo $CuisineData['restaurant_OrderEmail']; ?></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_BookingEmail">Booking Email </label></td>
    <td><?php echo $CuisineData['restaurant_BookingEmail']; ?></td>
    <td><label for="restaurant_FeedbackEmail">Feedback Email</label></td>
    <td><?php echo $CuisineData['restaurant_FeedbackEmail']; ?></td>
  </tr>
  
  
 
  
 
   <tr>
    <td><label for="restaurant_Logo">Restaurant Logo </label></td>
    <td><img src="restaurantlogoimg/small/<?php echo $CuisineData['restaurant_Logo'];?>" width="200" height="150" /></td>
    <td><label for="restaurant_Market_bannerImg">Market Banner Image</label></td>
    <td><img src="RestaurantMarketBannerimg/small/<?php echo $CuisineData['restaurant_Market_bannerImg'];?>" width="200" height="150" /></td>
  </tr>
 
  
    <tr>
    <td><label for="restaurant_Video">Youtube Video URL </label></td>
    <td><?php echo $CuisineData['restaurant_Video']; ?></td>
    <td><label for="restaurant_FaviconImg">Favicon Image</label></td>
    <td>
    <img src="RestaurantFaviconimg/small/<?php echo $CuisineData['restaurant_FaviconImg'];?>" width="16" height="16" />
  
    </td>
  </tr>
  
   <tr>
    <td><label for="restaurant_LatitudePoint">Latitude Point </label></td>
    <td><?php echo $CuisineData['restaurant_LatitudePoint']; ?></td>
    <td><label for="restaurant_LongitudePoint">Longitude Point</label></td>
    <td><?php echo $CuisineData['restaurant_LongitudePoint']; ?></td>
  </tr>
                                                    </table>
												</fieldset>
                                                
                                                
                                                
                                                <fieldset>
													<legend>Restaurant Owner information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_OwnerFirstName">Owner First Name</label></td>
    <td><?php echo $OwnerData['restaurant_OwnerFirstName']; ?></td>
    <td><label for="restaurant_OwnerLastName">Owner Last Name</label></td>
    <td><?php echo $OwnerData['restaurant_OwnerLastName']; ?></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_OwnerLoginId">Owner ID </label></td>
    <td><?php echo $OwnerData['restaurant_OwnerLoginId']; ?></td>
    <td><label for="restaurant_OwnerLoginPassword">Owner Password</label></td>
    <td><?php echo $OwnerData['restaurant_OwnerLoginPassword']; ?></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_OwnerDOB">Owner Birth Date </label></td>
    <td><?php echo $OwnerData['restaurant_OwnerLoginDOB']; ?></td>
    <td><label for="restaurant_OwnerAnniversaryDate">Owner Anniversary Date</label></td>
    <td><?php echo $OwnerData['restaurant_OwnerAnniversaryDate']; ?></td>
  </tr>
  
  
                                           </table>
												</fieldset>
                                                
                                                
                                                
                                                
                                                
                                                <fieldset>
													<legend>SEO Setting information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
    <td colspan=""><label for="restaurant_MetaTitle">Title Meta Tag</label></td>
    <td colspan="3">
    <?php echo $SEOData['restaurant_MetaTitle']; ?>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="restaurant_MetaKeyword">KeyWord Meta Tag</label></td>
    <td colspan="3">
    <?php echo $SEOData['restaurant_MetaKeyword']; ?>
    </td>
   
  </tr>
  
  
    <tr>
    <td colspan=""><label for="restaurant_MetaDescription">Description Meta Tag</label></td>
    <td colspan="3">
    <?php echo $SEOData['restaurant_MetaDescription']; ?>
    </td>
   
  </tr>
  
  
  </tr>
                                                    </table>
												</fieldset>
                                                
                                                
                                                <fieldset>
													<legend>Bank A/C information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_BankACName">Bank A/C Name </label></td>
    <td><?php echo $BankData['restaurant_BankACName']; ?></td>
    <td><label for="restaurant_BankACType">Bank A/C Type</label></td>
    <td>
    <?php echo $BankData['restaurant_BankACType']; ?>
  </td>
  </tr>
  
   <tr>
    <td><label for="restaurant_BankName">Bank Name </label></td>
    <td><?php echo $BankData['restaurant_BankName']; ?></td>
    <td><label for="restaurant_BankACNo">Bank A/C No.</label></td>
    <td><?php echo $BankData['restaurant_BankACNo']; ?></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_BankNEFTCode">NEFT Code </label></td>
    <td><?php echo $BankData['restaurant_BankNEFTCode']; ?></td>
    <td><label for="restaurant_BankSwiftCode">Swift Code</label></td>
    <td><?php echo $BankData['restaurant_BankSwiftCode']; ?></td>
  </tr>
  
  
     <tr>
    <td colspan=""><label for="restaurant_BankAddress">Bank Address</label></td>
    <td colspan="3">
   <?php echo $BankData['restaurant_BankAddress']; ?>
    </td>
   
  </tr>
  
   
                                                    </table>
												</fieldset>
                                                
                                                
												
												<input id="submitWizard" name="SubmitRestaurant" type="submit" class="btn btn-primary submitWizard" value="Go To Manage Restaurant" />
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
