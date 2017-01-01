<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
include('domainName.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
if($_GET['ViewId']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantList","id",$_GET['ViewId']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>	
<?php

if(isset($_POST['SubmitMail'])) 
{
 $to=$CuisineData['restaurantEnquiryEmail'];
 $subject ="Restaurant Listing Enquiry Reply";
 $from=$RegistrationDataLoginVal['contactusemail'];
$message .=  "<html><body>";
$message .= "<table>";
$message .="<tr><td align='left'><font face=Verdana size=2><b>Hi ".$CuisineData['restaurantEnquiryFname']." ".$CuisineData['restaurantEnquirylname']." ,</b></font></td></tr>";
$message .="<tr><td align='left'><font face=Verdana size=2><b>$_POST[booking_message]</b></font></td></tr>";
$message .= "<tr><td>========================================</td></tr>";
$message .= "<tr><td align='left'>Regards,<br><font face=Verdana size=2> <b>".$AdminDataLoginVal['website_name']."</b></font></td></tr>";
$message .= "</table></body></html>";
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=windows-874\n";
$headers .= "From: $from  \r\n" .
$headers .= "X-Priority: 1\r\n"; 
$headers .= "X-MSMail-Priority: High\r\n"; 
$headers .= "X-Mailer: Just My Server"; 
if(mail($to, $subject, $message, $headers)){
$msg="Email has been Successfully Send.";
}
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
                            Restaurant Listing Enquiry Detail
                            <?php } else { ?>Restaurant Listing Enquiry Detail
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['ViewId']=='')
										   { ?>Restaurant Listing Enquiry Detail
                            <?php } else { ?>Restaurant Listing Enquiry Detail
                            <?php } ?></a>
											</div>
										</div>
                                         
                                            <?php if($msg!=''){ ?>
<div style="color:#DF0000; font-size:16px;"><?php echo $msg;?></div>
<?php } ?>
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="" method="post" enctype="multipart/form-data">
											<fieldset>
													<legend>Restaurant Listing Enquiry information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     
  <tr>
    <td><label for="RestaurantDealsStartDate">Name</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryFname']; ?> <?php echo $CuisineData['restaurantEnquirylname']; ?></td>
    <td><label for="RestaurantDealsStartTime">Email</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryEmail']; ?></td>
  </tr>
  
  <tr>
    <td><label for="RestaurantDealsStartDate">Restaurant Name</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryRname']; ?></td>
    <td><label for="RestaurantDealsStartTime">Address</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryAddress']; ?></td>
  </tr>
  
  <tr>
    <td><label for="RestaurantDealsStartDate">City</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryCity']; ?></td>
    <td><label for="RestaurantDealsStartTime">Zipcode</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryZipcode']; ?></td>
  </tr>
  
 <tr>
    <td><label for="RestaurantDealsStartDate">Country</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryCountry']; ?></td>
    <td><label for="RestaurantDealsStartTime">Mobile</label></td>
    <td><?php echo $CuisineData['restaurantEnquiryMobile']; ?></td>
  </tr>  <tr>
    <td><label for="RestaurantDealsStartDate">IP</label></td>
    <td><?php echo $CuisineData['ip']; ?></td>
    <td><label for="RestaurantDealsStartTime">Created Date</label></td>
    <td><?php echo $CuisineData['created_date']; ?></td>
  </tr>
 
  </table>
  	</fieldset>

                                    
                                    <fieldset>
													<legend>Reply Message To Restaurant Listing Enquiry Customer</legend>
                                                   
                                                    <table width="100%" border="0">
                                                
  
  
 <tr>
    <td colspan=""><label for="restaurant_description">Write Message</label></td>
    <td colspan="3">
    <textarea name="booking_message" id="booking_message" class="twys" style="width:800px; height:150px;"></textarea>
    </td>
   
  </tr> 
  
</table>	</fieldset>
                                    
                                    
                                    		
												
												<input id="submitWizard" type="submit" class="btn btn-primary submitWizard" name="SubmitMail" value="Send Message" />
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
