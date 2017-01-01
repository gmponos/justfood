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
 $CuisineQuery = $dbb->showtabledata("table_booking","id",$_GET['ViewId']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if($_GET['restaurant_id']!='')
{
$CuisineQuery1 = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']);
 $CuisineData1=mysql_fetch_assoc($CuisineQuery1);
 }
if(isset($_POST['BookingEmailSubmit']))
{
$to=$CuisineData['booking_email'].','.$RegistrationDataLoginVal['bookingemail'];
$subject ='Welcome To '.$CuisineData['booking_name'].' With Booking Status Mr.'.$CuisineData['booking_email'];
$from=$RegistrationDataLoginVal['bookingemail'];
$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<META http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
<title>".$DomainName."- Restaurant Booking Detail</title>
</head>
<body><table cellpadding='0' cellspacing='0' border='0' align='center' style='width:100%;background-color:#f6f6f6;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a;padding:0;margin:0 auto'>
<tbody>
<tr>
<td>
<table cellpadding='0' cellspacing='0' align='center' style='width:635px;background-color:#fdfdfd;padding:0;margin:0 auto;border:1px solid #ccc'>
<tbody>

<tr>
<td>
<p style='padding:20px 0 0 20px;margin-bottom:1em;margin-left:20px;margin-top:20px;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Hi ".$CuisineData['booking_name']." ,
              </p>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to welcome you to 
                          <a href='http://phpexpertgroup.com/justfoodgr/restaurantOwnerPanel/' style='text-decoration:none;color:#000;font-weight:bold' target='_blank'>".$CuisineData1['restaurant_name']."</a>.
              </p>
                        <p style='padding:0 10px 0 20px;margin-bottom:1em;margin-left:20px;margin-right:20px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;line-height:1.3em'>
                        You restaurant booking has been successfully created . kindly see your booking detail with Booking No 
						<strong>".$CuisineData['booking_id']."</strong>
						
                        </p>
<table width='100%' align='center' cellpadding='0' cellspacing='0' style='width:558px;margin:0 auto;padding:0'>
<tbody>
<tr>
<td bgcolor='#e9f5c5' width='100%' style='padding:7px;padding-left:10px'>
".$_POST['booking_message']."
</td>
</tr>

<tr>
<td height='10' colspan='3'></td>
</tr>
</tbody>
</table>
<p style='padding:10px 10px 0 20px;margin-bottom:1em;margin-left:20px;margin-right:20px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a'>
                         Don't forget to follow us now on <a href='' style='font-weight:bold;color:#343434;text-decoration:none' target='_blank'>Facebook</a> and <a href='' style='font-weight:bold;color:#343434;text-decoration:none' target='_blank'>Twitter</a> for great specials and competitions.
              </p>
<p style='padding:10px 0 0 20px;margin:0;margin-left:20px;line-height:17px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a'>Best regards, <br>
												The ".$CuisineData1['restaurant_name']." team.</p>
</td>
</tr>
<tr>
<td>
<p style='padding:30px 0 0 20px;margin:0;margin-left:20px;line-height:17px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;font-weight:bold'>E: 
												<a href='mailto:".$RegistrationDataLoginVal['supportemail']."' style='font-weight:bold;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;text-decoration:none' target='_blank'>".$RegistrationDataLoginVal['supportemail']."</a>
<br>
												P: ".$AdminDataLoginVal['website_callUsNo']."
											<br>
											".$AdminDataLoginVal['website_name'].",".$AdminDataLoginVal['website_Address'].",".$AdminDataLoginVal['website_City'].",".$AdminDataLoginVal['website_Zipcode'].",".$AdminDataLoginVal['website_Country']."
												</p>
<p style='text-align:center;margin:0;padding:5px;border:none'>
<a href='https://www.facebook.com/pages/PHP-EXPERT-GROUP/365479363587088' style='border:none' target='_blank'><img src='http://static.eatnow.com.au/emailimg/likeus.jpg' width='204' height='70' border='0' alt='Like PrixEat on Facebook!'></a>
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>";
	$message .= "</table></body></html>";
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=windows-874\n";
	$headers .= "From: $from  \r\n" .
	$headers .= "X-Priority: 1\r\n"; 
	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "X-Mailer: Just My Server"; 
	mail($to, $subject, $message, $headers);



$msg="Hi,".$CuisineData['booking_name']." your Booking is successfully send";
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
                             Restaurant Booking Details
                            <?php } else { ?>
                            Update Restaurant Booking Details
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['ViewId']=='')
										   { ?>
                            Restaurant Booking Details Details
                            <?php } else { ?>
                            Update Restaurant Booking Details
                            <?php } ?></a>
											</div>
										</div>
                                         
                                             <table width="100%" border="0" align="center">
  <tr>
    <td> <?php if($msg!=''){ ?> <strong style="font-size:16px; color:#00009B;"><?php echo $msg; ?></strong><?php } ?>
										
                                            </td></tr></table>
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="" method="post" enctype="multipart/form-data">
											<fieldset>
													<legend>Restaurant Booking information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="RestaurantEventID">Restaurant Name</label></td>
    <td>	<?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$CuisineData['restaurant_id']));
													echo ucwords($StQuery['restaurant_name']);?></td>
    <td><label for="RestaurantDealsName">Booking ID</label></td>
    <td><?php echo $CuisineData['booking_id']; ?></td>
  </tr>
  <tr>
    <td><label for="RestaurantDealsStartDate">No Of Guests</label></td>
    <td><?php echo $CuisineData['noofgusts']; ?></td>
    <td><label for="RestaurantDealsStartTime">Customer Name</label></td>
    <td><?php echo $CuisineData['booking_name']; ?></td>
  </tr>
   <tr>
    <td><label for="RestaurantDealsEndDate">Customer Email</label></td>
    <td><?php echo $CuisineData['booking_email']; ?></td>
    <td><label for="RestaurantDealsEndTime">Customer Mobile</label></td>
    <td><?php echo $CuisineData['booking_mobile']; ?></td>
  </tr>
  
  <tr>
    <td><label for="RestaurantDealsEndDate">Booking Date</label></td>
    <td><?php echo $CuisineData['booking_date']; ?></td>
    <td><label for="RestaurantDealsEndTime">Booking Time</label></td>
    <td><?php echo $CuisineData['booking_time']; ?></td>
  </tr>
  
  <tr>
    <td><label for="RestaurantDealsEndDate">Eat Type</label></td>
    <td><?php echo $CuisineData['eattype']; ?></td>
    <td><label for="RestaurantDealsEndTime">Booking Type</label></td>
    <td><?php echo $CuisineData['booking_type']; ?></td>
  </tr>
  
   <tr>
    <td colspan=""><label for="RestaurantDealsAddress">Booking Address Address</label></td>
    <td colspan="3">
 <?php echo $CuisineData['booking_address']; ?>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="RestaurantDealsDescription">Booking Instruction</label></td>
    <td colspan="3">
    <?php echo $CuisineData['booking_instruction']; ?>
    </td>
   
  </tr>
  
  
</table>	</fieldset>

                                    
                                    <fieldset>
													<legend>Send Booking Status To Customer</legend>
                                                    
                                                    <table width="100%" border="0">
                                                
  
  
 <tr>
    <td colspan=""><label for="restaurant_description">Write Message</label></td>
    <td colspan="3">
    <textarea name="booking_message" id="booking_message" class="twys" style="width:800px; height:150px;"></textarea>
    </td>
   
  </tr> 
  
</table>	</fieldset>
                                    
                                    
                                    		
												
												<input id="submitWizard" name="BookingEmailSubmit" type="submit" class="btn btn-primary submitWizard" value="Send Message" />
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
