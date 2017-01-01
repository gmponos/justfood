<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $OwnerQuery = $dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$_GET['eid']);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
 
 $BankQuery = $dbb->showtabledata("tbl_restaurantBank","restaurant_id",$_GET['eid']);
 $BankData=mysql_fetch_assoc($BankQuery);
 
  $SEOQuery = $dbb->showtabledata("tbl_restaurantSEO","restaurant_id",$_GET['eid']);
 $SEOData=mysql_fetch_assoc($SEOQuery);
 
 $CuisineQuery1 = $dbb->showtabledata("tbl_restaurantPayment_grps_sms","restaurant_id",$_GET['eid']);
 $CuisineData1=mysql_fetch_assoc($CuisineQuery1);
}
?>	

 <script type="text/javascript">
function RestaurantValidate(){
var chkStatus = true
if(document.getElementById('restaurant_service').value =="") {
document.getElementById("restaurant_service").style.background='#C10000';
alert("please select restaurant service");
document.getElementById("restaurant_service").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_service').className = "";
if(document.getElementById('restaurant_name').value =="") {
alert("please enter restaurant name");
document.getElementById("restaurant_name").style.background='#C10000';
document.getElementById("restaurant_name").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_name').className = "";
if(document.getElementById('restaurant_phone').value =="") {
alert("please enter restaurant name");
document.getElementById("restaurant_phone").style.background='#C10000';
document.getElementById("restaurant_phone").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_phone').className = "";
if(document.getElementById('restaurant_cuisine').value =="") {
alert("please select restaurant cuisine");
document.getElementById("restaurant_cuisine").style.background='#C10000';
document.getElementById("restaurant_cuisine").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_cuisine').className = "";
if(document.getElementById('restaurant_contact_name').value =="") {
alert("please enter restaurant contact name");
document.getElementById("restaurant_contact_name").style.background='#C10000';
document.getElementById("restaurant_contact_name").focus();
chkStatus = false;
}
else 
document.getElementById('restaurant_contact_name').className = "";
if(document.getElementById('restaurant_contact_phone').value =="") {
alert("please enter restaurant contact phone");
document.getElementById("restaurant_contact_phone").style.background='#C10000';
document.getElementById("restaurant_contact_phone").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_phone').className = "";
if(document.getElementById('restaurant_contact_mobile').value =="") {
alert("please enter restaurant contact mobile no");
document.getElementById("restaurant_contact_mobile").style.background='#C10000';
document.getElementById("restaurant_contact_mobile").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_mobile').className = "";
if(document.getElementById('restaurant_contact_email').value =="") {
alert("please enter restaurant email address");
document.getElementById("restaurant_contact_email").style.background='#C10000';
document.getElementById("restaurant_contact_email").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_email').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_contact_email').value))) {
alert("please enter restaurant valid email address");
document.getElementById("restaurant_contact_email").style.background='#8C0000';
document.getElementById("restaurant_contact_email").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_email').style.color = "";
if(document.getElementById('restaurant_sms_mobile').value =="") {
alert("please enter restaurant Order SMS Mobile No.");
document.getElementById("restaurant_sms_mobile").style.background='#C10000';
document.getElementById("restaurant_sms_mobile").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_sms_mobile').className = "";
if(document.getElementById('restaurant_default_min_order').value =="") {
alert("please enter restaurant default minimum order");
document.getElementById("restaurant_default_min_order").style.background='#C10000';
document.getElementById("restaurant_default_min_order").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_default_min_order').className = "";
if(document.getElementById('restaurant_state').value =="") {
alert("please select restaurant state");
document.getElementById("restaurant_state").style.background='#C10000';
document.getElementById("restaurant_state").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_state').className = "";
if(document.getElementById('restaurant_city').value =="") {
alert("please select restaurant city ");
document.getElementById("restaurant_city").style.background='#C10000';
document.getElementById("restaurant_city").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_city').className = "";
if(document.getElementById('restaurant_address').value =="") {
alert("please enter restaurant address");
document.getElementById("restaurant_address").style.background='#C10000';
document.getElementById("restaurant_address").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_address').className = "";
if(document.getElementById('restaurant_description').value =="") {
alert("please enter restaurant description");
document.getElementById("restaurant_description").style.background='#C10000';
document.getElementById("restaurant_description").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_description').className = "";
if(document.getElementById('restaurant_InvoiceEmail').value =="") {
alert("please enter restaurant invoice email address");
document.getElementById("restaurant_InvoiceEmail").style.background='#C10000';
document.getElementById("restaurant_InvoiceEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_InvoiceEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_InvoiceEmail').value))) {
alert("please enter restaurant valid invoice email address");
document.getElementById("restaurant_InvoiceEmail").style.background='#8C0000';
document.getElementById("restaurant_InvoiceEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_InvoiceEmail').style.color = "";
if(document.getElementById('restaurant_OrderEmail').value =="") {
alert("please enter restaurant order email address");
document.getElementById("restaurant_OrderEmail").style.background='#C10000';
document.getElementById("restaurant_OrderEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OrderEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_OrderEmail').value))) {
alert("please enter restaurant valid order email address");
document.getElementById("restaurant_OrderEmail").style.background='#8C0000';
document.getElementById("restaurant_OrderEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OrderEmail').style.color = "";
if(document.getElementById('restaurant_BookingEmail').value =="") {
alert("please enter restaurant booking email address");
document.getElementById("restaurant_BookingEmail").style.background='#C10000';
document.getElementById("restaurant_BookingEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_BookingEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_BookingEmail').value))) {
alert("please enter restaurant valid booking email address");
document.getElementById("restaurant_BookingEmail").style.background='#8C0000';
document.getElementById("restaurant_BookingEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_BookingEmail').style.color = "";
if(document.getElementById('restaurant_FeedbackEmail').value =="") {
alert("please enter restaurant feedback email address");
document.getElementById("restaurant_FeedbackEmail").style.background='#C10000';
document.getElementById("restaurant_FeedbackEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_FeedbackEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_FeedbackEmail').value))) {
alert("please enter restaurant valid feedback email address");
document.getElementById("restaurant_FeedbackEmail").style.background='#8C0000';
document.getElementById("restaurant_FeedbackEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_FeedbackEmail').style.color = "";
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('restaurant_Logo').value =="") {
alert("please upload restaurant logo image");
document.getElementById("restaurant_Logo").style.background='#C10000';
document.getElementById("restaurant_Logo").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_Logo').className = "";
<?php } ?>
if(document.getElementById('restaurant_LatitudePoint').value =="") {
alert("please enter restaurant latitude point of map");
document.getElementById("restaurant_LatitudePoint").style.background='#C10000';
document.getElementById("restaurant_LatitudePoint").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_LatitudePoint').className = "";
if(document.getElementById('restaurant_LongitudePoint').value =="") {
alert("please enter restaurant longitude point of map");
document.getElementById("restaurant_LongitudePoint").style.background='#C10000';
document.getElementById("restaurant_LongitudePoint").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_LongitudePoint').className = "";
if(document.getElementById('restaurant_OwnerFirstName').value =="") {
alert("please enter restaurant Owner First Name");
document.getElementById("restaurant_OwnerFirstName").style.background='#C10000';
document.getElementById("restaurant_OwnerFirstName").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerFirstName').className = "";
if(document.getElementById('restaurant_OwnerLoginId').value =="") {
alert("please enter restaurant Owner Login ID");
document.getElementById("restaurant_OwnerLoginId").style.background='#C10000';
document.getElementById("restaurant_OwnerLoginId").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerLoginId').className = "";
if(document.getElementById('restaurant_OwnerLoginPassword').value =="") {
alert("please enter restaurant Owner Login Password");
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



function changeStatus(){
if(document.getElementById("CoundPrinter").value ==1){
document.getElementById("clouddisplay").style.display= 'block';
} 
else
{
alert("display none");
document.getElementById("clouddisplay").style.display= 'none';
}
}
</script> 

<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
                 $(document).ready(function () {
                    $('#CoundPrinter').click(function () {
                       $('#clouddisplay').show();
                });
                $('#CoundPrinter1').click(function () {
                      $('#clouddisplay').hide();
                 });
				 
				   $('#SMSOption').click(function () {
                       $('#SMSOptiondisplay').show();
                });
                $('#SMSOption1').click(function () {
                      $('#SMSOptiondisplay').hide();
                 });
				 
				  $('#GPRSPrinterOption').click(function () {
                       $('#GPRSPrinterOptiondisplay').show();
                });
                $('#GPRSPrinterOption1').click(function () {
                      $('#GPRSPrinterOptiondisplay').hide();
                 });
				 
				  $('#PaypalPayment').click(function () {
                       $('#PaypalPaymentdisplay').show();
                });
                $('#PaypalPayment1').click(function () {
                      $('#PaypalPaymentdisplay').hide();
                 });
				 
				  $('#AuthorizednetPayment').click(function () {
                       $('#AuthorizednetPaymentdisplay').show();
                });
                $('#AuthorizednetPayment1').click(function () {
                      $('#AuthorizednetPaymentdisplay').hide();
                 });
               });
</script>

<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />

	
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#mainFormElements"  data-toggle="tab" style="color:#FFFFFF;"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant 
                            <?php } else { ?>
                            Update Restaurant 
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"   style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant 
                            <?php } else { ?>
                            Update Restaurant 
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=RestaurantEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=RestaurantAdd";
										   $buttonValue="Add New Restaurant";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantValidate();">
												<input id="restaurant_Market_bannerImg" name="restaurant_Market_bannerImg" value="<?php echo $CuisineData['restaurant_Market_bannerImgold']; ?>" type="hidden"  style="width:300px;"/>
                                                <input id="restaurant_Logoold" name="restaurant_Logoold" value="<?php echo $CuisineData['restaurant_Logo']; ?>" type="hidden"  style="width:300px;"/>
                                                <input id="restaurant_FaviconImgold" name="restaurant_FaviconImgold" value="<?php echo $CuisineData['restaurant_FaviconImg']; ?>" type="hidden"  style="width:300px;"/>
                                                
                                                <input id="restaurant_serviceold" name="restaurant_serviceold" value="<?php echo $CuisineData['restaurant_service']; ?>" type="hidden"  style="width:300px;"/>
                                                
                                                <input id="restaurant_cuisineold" name="restaurant_cuisineold" value="<?php echo $CuisineData['restaurant_cuisine']; ?>" type="hidden"  style="width:300px;"/>
                                                <input id="restaurant_facilitiesold" name="restaurant_facilitiesold" value="<?php echo $CuisineData['restaurant_facilities']; ?>" type="hidden"  style="width:300px;"/>
                                                <input id="rerestaurant_payment_methodold" name="rerestaurant_payment_methodold" value="<?php echo $CuisineData['rerestaurant_payment_method']; ?>" type="hidden"  style="width:300px;"/>
                                                 <input id="restaurant_social_mediaold" name="restaurant_social_mediaold" value="<?php echo $CuisineData['restaurant_social_media']; ?>" type="hidden"  style="width:300px;"/>
												<fieldset>
													<legend>Contact information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_country">Restaurant Type</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant Type..." id="restaurant_type" name="restaurant_type" style="width:317px;">
											 <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantType","restaurant_type_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['restaurant_type_name']; ?>" <?php if($CuisineData['restaurant_type']==$StateData['restaurant_type_name']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_type_name']); ?></option>
                                              <?php } ?>
											</select>
                                            <br />
                                            <strong style="font-size:14px; color:#009100;">Multiple Selection with Ctrl + Mouse Click</strong>
                                            </td>
    <td><label for="restaurant_country">Restaurant Service</label></td>
    <td>	<select  data-placeholder="Select Restaurant Service..." onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_service" multiple="multiple" name="restaurant_service[]" style="width:317px;">
											<?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantService","restaurant_service_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['restaurant_service_name']; ?>" <?php if(strstr($CuisineData['restaurant_service'],$StateData['restaurant_service_name'])){?> selected="selected" <?php } ?> ><?php echo ucwords($StateData['restaurant_service_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
  </tr>
  <tr>
    <td><label for="Name">Restaurant Name</label></td>
    <td><input id="restaurant_name" name="restaurant_name" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_name']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="restaurant_phone">Restaurant Phone</label></td>
    <td><input id="restaurant_phone" type="text" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_phone" value="<?php echo $CuisineData['restaurant_phone']; ?>" style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="restaurant_website">Restaurant Website</label></td>
    <td><input id="restaurant_website" name="restaurant_website" value="<?php echo $CuisineData['restaurant_website']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_fax">Restaurant Fax</label></td>
    <td><input id="restaurant_fax"  name="restaurant_fax" value="<?php echo $CuisineData['restaurant_fax']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
  
  </tr>
   <tr>
    <td><label for="restaurant_cuisine">Restaurant Cuisine</label></td>
    <td><select  data-placeholder="Select Restaurant Service..." onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   multiple="multiple" id="restaurant_cuisine" name="restaurant_cuisine[]" style="width:317px;">
											 <?php 
											  $StateQuery = $dbb->showtable("tbl_cuisine","RestaurantCuisineName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['RestaurantCuisineName']; ?>" <?php if(strstr($CuisineData['restaurant_cuisine'],$StateData['RestaurantCuisineName'])){?> selected="selected" <?php } ?> ><?php echo ucwords($StateData['RestaurantCuisineName']); ?></option>
                                              <?php } ?>
											 
											</select>
                                             <br />
                                            <strong style="font-size:14px; color:#009100;">Multiple Selection with Ctrl + Mouse Click</strong>
                                            </td>
    <td><label for="restaurant_facilities">Restaurant Facilities</label></td>
    <td>	<select class="form-elang" placeholder="Select Restaurant Country..." multiple="multiple" id="restaurant_facilities" name="restaurant_facilities[]" style="width:317px;">
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_facilities","restaurant_FacilitiesName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if(strstr($CuisineData['restaurant_facilities'],$StateData['id'])){?> selected="selected" <?php } ?> ><?php echo ucwords($StateData['restaurant_FacilitiesName']); ?></option>
                                              <?php } ?>
											</select>
                                             <br />
                                            <strong style="font-size:14px; color:#009100;">Multiple Selection with Ctrl + Mouse Click</strong>
                                            </td>
  </tr>
  
    <tr>
    <td><label for="restaurant_contact_name">Contact Name</label></td>
    <td><input id="restaurant_contact_name" name="restaurant_contact_name" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   value="<?php echo $CuisineData['restaurant_contact_name']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_contact_phone">Contact Phone</label></td>
    <td><input id="restaurant_contact_phone"  name="restaurant_contact_phone" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_contact_phone']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="restaurant_contact_mobile">Contact Mobile</label></td>
    <td><input id="restaurant_contact_mobile" name="restaurant_contact_mobile" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_contact_mobile']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_contact_email">Contact Email</label></td>
    <td><input id="restaurant_contact_email"  name="restaurant_contact_email" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_contact_email']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="restaurant_social_media">Social Media</label></td>
    <td><select style="width:317px;" name="restaurant_social_media[]" id="restaurant_social_media" multiple="multiple">
											 <?php 
											  $StateQuery = $dbb->showtable("tbl_SocialSetting","restSocialMediaName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if(strstr($CuisineData['restaurant_social_media'],$StateData['id'])){?> selected="selected" <?php } ?>><?php echo ucwords($StateData['restSocialMediaName']); ?></option>
                                              <?php } ?>
											
											</select>
                                             <br />
                                            <strong style="font-size:14px; color:#009100;">Multiple Selection with Ctrl + Mouse Click</strong>
                                            </td>
    <td><label for="restaurant_sms_mobile">SMS Mobile No.</label></td>
    <td><input id="restaurant_sms_mobile"  name="restaurant_sms_mobile" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_sms_mobile']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_default_min_order">Min. Order</label></td>
    <td><input id="restaurant_default_min_order" name="restaurant_default_min_order" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_default_min_order']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_payment_method">Payment Method</label></td>
    <td><select style="width:317px;" id="restaurant_payment_method" multiple="multiple" name="restaurant_payment_method[]">
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_pyamentSetting","restPaymentMethodName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if(strstr($CuisineData['restaurant_payment_method'],$StateData['id'])){?> selected="selected" <?php } ?>><?php echo ucwords($StateData['restPaymentMethodName']); ?></option>
                                              <?php } ?>
											
											</select>
                                             <br />
                                            <strong style="font-size:14px; color:#009100;">Multiple Selection with Ctrl + Mouse Click</strong>
                                            </td>
    <?php /*?><td style="display: none;"><label for="restaurant_saleTaxNo">Sales Tax No.</label></td>
    <td style="display: none;"><input id="restaurant_saleTaxNo"  name="restaurant_saleTaxNo" value="<?php echo $CuisineData['restaurant_saleTaxNo']; ?>" type="text"  style="width:300px;" /></td><?php */?>
  </tr>
  
   <tr>
    <td style="display: none;"><label for="restaurant_saleTaxDate">Sales Tax Date</label></td>
    <td style="display: none;"><input id="restaurant_saleTaxDate" name="restaurant_saleTaxDate" value="<?php echo $CuisineData['restaurant_saleTaxDate']; ?>" type="text"  style="width:300px;" /></td>
    <td style="display: none;"><label for="restaurant_saleTaxPercentage">Sales Tax %</label></td>
    <td style="display: none;"><input id="restaurant_saleTaxPercentage"  name="restaurant_saleTaxPercentage" value="<?php echo $CuisineData['restaurant_saleTaxPercentage']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
   <?php /*?><tr>
    <td><label for="restaurant_payment_method">Payment Method</label></td>
    <td><select style="width:317px;" id="restaurant_payment_method" multiple="multiple" name="restaurant_payment_method[]">
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_pyamentSetting","restPaymentMethodName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if(strstr($CuisineData['restaurant_payment_method'],$StateData['id'])){?> selected="selected" <?php } ?>><?php echo ucwords($StateData['restPaymentMethodName']); ?></option>
                                              <?php } ?>
											
											</select>
                                             <br />
                                            <strong style="font-size:14px; color:#009100;">Multiple Selection with Ctrl + Mouse Click</strong>
                                            </td>
    <td style="display: none;"><label for="restaurant_fax">Credit Card Fees</label></td>
    <td style="display: none;"><input id="restaurant_credit_card_fess"  name="restaurant_credit_card_fess" value="<?php echo $CuisineData['restaurant_credit_card_fess']; ?>" type="text"  style="width:300px;" /></td>
  </tr><?php */?>
  
 
  
   <tr>
    <td><label for="restaurant_commission1">Restaurant Commission (%) </label></td>
    <td><input id="restaurant_commission1"  name="restaurant_commission1" disabled="disabled" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_commission']; ?>" type="text"  style="width:300px;" />
    
    <input id="restaurant_commission"  name="restaurant_commission" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_commission']; ?>" type="hidden"  style="width:300px;" />
    </td>
    <td><label for="restaurant_invoiceTimePeriod">Invoice Time Period</label></td>
    <td><select style="width:317px;" id="restaurant_invoiceTimePeriod" name="restaurant_invoiceTimePeriod">
											  <option value="7" <?php if($CuisineData['restaurant_invoiceTimePeriod']=="7"){?> selected="selected" <?php } ?>>Weekly</option>
											  <option value="15" <?php if($CuisineData['restaurant_invoiceTimePeriod']=="15"){?> selected="selected" <?php } ?>>15 Days</option>
											  <option value="30" <?php if($CuisineData['restaurant_invoiceTimePeriod']=="30"){?> selected="selected" <?php } ?>>Monthly</option>
											
											</select></td>
  </tr>
  
  
  <tr style="display: none;">
    <td ><label for="restaurant_Listing_date">Restaurant Listing Date </label></td>
    <td><input id="restaurant_Listing_date"  name="restaurant_Listing_date" value="<?php echo $CuisineData['restaurant_Listing_date']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_Listing_Category">Listing Category</label></td>
    <td><select style="width:317px;" name="restaurant_Listing_Category" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_Listing_Category">
											  <option value="1" <?php if($CuisineData['restaurant_Listing_Category']=="1"){?> selected="selected" <?php } ?>>Diamond</option>
											  <option value="2" <?php if($CuisineData['restaurant_Listing_Category']=="2"){?> selected="selected" <?php } ?>>Plainumt</option>
											  <option value="3" <?php if($CuisineData['restaurant_Listing_Category']=="3"){?> selected="selected" <?php } ?>>Gold</option>
											
											</select></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_Listing_date">Pre Order Support</label></td>
    
    <td><select style="width:317px;" name="preOrdersupport" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="preOrdersupport">
    <option value="" selected="selected">Pre Order Support</option>
											  <option value="1" <?php if($CuisineData['preOrdersupport']==1){?> selected="selected" <?php } ?>>Yes</option>
											  <option value="0" <?php if($CuisineData['preOrdersupport']==0){?> selected="selected" <?php } ?>>No</option>
											
											</select></td>
                                            
                                            
                                            <td><label for="restaurant_Listing_date">Book A Table Support</label></td>
    
    <td><select style="width:317px;" name="BookaTablesupport" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="BookaTablesupport">
    <option value="" selected="selected">Book A Table Support</option>
											  <option value="1" <?php if($CuisineData['BookaTableOrdersupport']==1){?> selected="selected" <?php } ?>>Yes</option>
											  <option value="0" <?php if($CuisineData['BookaTableOrdersupport']==0){?> selected="selected" <?php } ?>>No</option>
											
											</select></td>
  </tr>
   <tr>
    <td><label for="restaurant_Listing_date">Offer Type</label></td>
    
    <td colspan="3"><select style="width:317px;" name="offerType" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="offerType">
    <option value="" selected="selected">Select</option>
    <?php $QyeryDat=mysql_query("select * from tbl_restaurantOfferType where status='0' order by restofferTypeName asc");
	while($offerTypeData=mysql_fetch_assoc($QyeryDat)){
	 ?>
											  <option value="<?php echo $offerTypeData['id'];?>" <?php if($CuisineData['offerType']==$offerTypeData['id']){?> selected="selected" <?php } ?>><?php echo $offerTypeData['restofferTypeName']; ?></option>
											<?php } ?>
											</select></td></tr>
  
  
  <tr>
    <td><label for="restaurant_avarage_deliveryTime">Average Delivery Time</label></td>
    <td><input id="restaurant_avarage_deliveryTime" name="restaurant_avarage_deliveryTime"  value="<?php echo $CuisineData['restaurant_avarage_deliveryTime']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_avarage_deliveryCost">Average Delivery Cost</label></td>
    <td><input id="restaurant_avarage_deliveryCost"  name="restaurant_avarage_deliveryCost" value="<?php echo $CuisineData['restaurant_avarage_deliveryCost']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="convenience_fee">Convenience Fee</label></td>
    <td><input id="convenience_fee1" disabled="disabled" name="convenience_fee1" value="<?php echo $CuisineData['convenience_fee']; ?>" type="text"  style="width:300px;" />
    <input id="convenience_fee" name="convenience_fee" value="<?php echo $CuisineData['convenience_fee']; ?>" type="hidden"  style="width:300px;" />
    </td>
    <td><label for="loyality_setting">Loyalty Point</label></td>
    <td><select style="width:317px;" name="loyality_setting" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="loyality_setting">
    <option value="" selected="selected">Loyalty Point</option>
											  <option value="1" <?php if($CuisineData['loyality_setting']==1){?> selected="selected" <?php } ?>>Yes</option>
											  <option value="0" <?php if($CuisineData['loyality_setting']==0){?> selected="selected" <?php } ?>>No</option>
											
											</select></td>

    </tr>
     <tr>
    <td><label for="loyality_limit">Loyalty Point Limit</label></td>
    <td><input id="loyality_limit" name="loyality_limit"  value="<?php echo $CuisineData['loyality_limit']; ?>" type="text"  style="width:300px;" /></td>
    </tr>
  
</table>

													
													
													
													
													
												</fieldset>
												
												<fieldset>
 <script  type="text/javascript"  language="javascript">
function getzipcodeListRest(str)
{
//alert(str);
if (str=="")
{
  document.getElementById("zipcode").innerHTML="";
  return;
  } 
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("zipcode").innerHTML=xmlhttp.responseText;
	//alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("post","deliveryarea.php?c="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestCity(str){
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cityFatechRes.php?q="+str,true);
xmlhttp.send();
}

</script>
													<legend>Location information</legend>
												 <table width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_state">Restaurant State</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select State..."  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="restaurant_state" name="restaurant_state" style="width:317px;"  onChange="getOrgTypeListRestCity(this.value)" >
    <option value="">Select</option>
	
	 
	<?php 
											  
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurantState']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
                                             
											
										
											</select></td>
    <td><label for="restaurant_city">Restaurant City</label></td>
    <td id="restaurant_city">	<select onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   data-placeholder="Select Restaurant City..." id="restaurant_city" onchange="getzipcodeListRest(this.value);" name="restaurant_city" style="width:317px;">
     <option value="">Select First State</option>
											 <?php 
											  if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$CuisineData['restaurantState']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['restaurantCity']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
											
											</select></td>
  </tr>
 
  <?php if($_GET['eid']!=''){ ?>
  <tr>
  <td colspan="4">
  <table width="100%" border="0" >


 <?php 
$qry1=mysql_query("SELECT * FROM `tbl_restaurantDeliveryArea` where `restaurant_id` ='".$_GET['eid']."'");
  $c=1;
  $ipd='';
while($resData1=mysql_fetch_array($qry1))
{
$ipd .=$resData1['delivery_id'].'|';
?>
<input type="hidden" name="alreadyID" value="<?php echo rtrim($ipd,'|');?>" />
<tr>
 <td><input type="checkbox" name="seleted1[]" value="<?php echo $c; ?>" checked="checked"  style="width:20px;"></td>
<td><input type="text" name="restaurant_postcode1<?php echo $c; ?>" id="restaurant_postcode" value="<?php echo $resData1['restaurant_postcode'];?>" style="width:80px; " /></td>
<td><input type="text" name="restaurant_delivery_area1<?php echo $c; ?>" id="restaurant_delivery_area" value="<?php echo $resData1['restaurant_delivery_area'];?>" style="width:150px; " /></td>
<td><input type="text" name="restaurant_delivery_charge1<?php echo $c; ?>" id="restaurant_delivery_charge" value="<?php echo $resData1['restaurant_delivery_charge'];?>" style="width:80px; " /> </td>
<td><input type="text" name="restaurant_minimum_order1<?php echo $c; ?>" id="restaurant_minimum_order" value="<?php echo $resData1['restaurant_minimum_order'];?>" style="width:80px; " /></td>
<td><input type="text" name="restaurant_shipping_charge1<?php echo $c; ?>" id="restaurant_shipping_charge" value="<?php echo $resData1['restaurant_shipping_charge'];?>" style="width:100px; " /></td>
<td><input type="text" name="restaurant_postcodelatitude1<?php echo $c; ?>" id="restaurant_postcodelatitude" value="<?php echo $resData1['restaurant_postcodelatitude'];?>" style="width:100px; " /></td>
<td><input type="text" name="restaurant_postcodelongitude1<?php echo $c; ?>" id="restaurant_postcodelongitude" value="<?php echo $resData1['restaurant_postcodelatitude'];?>" style="width:100px; " /></td></tr>
<?php 
$c++;} ?>
</td>
  </tr>
  </table>
 </td></tr>
  <?php } ?>
    <tr>
    <td colspan="4" id="zipcode"></td>
   
  </tr>
 

  
   <tr>
    <td colspan=""><label for="restaurant_address">Restaurant Address</label></td>
    <td colspan="3">
    <textarea name="restaurant_address" id="restaurant_address" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  style="width:800px; height:80px;"><?php echo $CuisineData['restaurant_address']; ?></textarea>
    </td>
   
  </tr>
    
    <tr>
    <td colspan=""><label for="restaurant_description">Restaurant Description</label></td>
    <td colspan="3">
    <textarea name="restaurant_description" id="restaurant_description" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  class="twys" style="width:800px; height:80px;"><?php echo $CuisineData['restaurant_description']; ?></textarea>
    </td>
   
  </tr>
  
   <tr>
    <td><label for="restaurant_LatitudePoint">Latitude Point </label></td>
    <td><input id="restaurant_LatitudePoint"  name="restaurant_LatitudePoint" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_LatitudePoint']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_LongitudePoint">Longitude Point</label></td>
    <td><input id="restaurant_LongitudePoint"  name="restaurant_LongitudePoint" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_LongitudePoint']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
            
  <tr style="display: none;">
    <td><label for="restaurant_deliveryDistance">Delivery Distance (miles) </label></td>
    <td><input id="restaurant_deliveryDistance"  name="restaurant_deliveryDistance" value="<?php echo $CuisineData['restaurant_deliveryDistance']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_FaxGateway">Fax Gateway</label></td>
    <td><input id="restaurant_FaxGateway"  name="restaurant_FaxGateway" value="<?php echo $CuisineData['restaurant_FaxGateway']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  </table>
												</fieldset>
												
												<fieldset>
													<legend>Order Info & Photo Setting information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_InvoiceEmail">Invoice Email </label></td>
    <td><input id="restaurant_InvoiceEmail"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_InvoiceEmail" value="<?php echo $CuisineData['restaurant_InvoiceEmail']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OrderEmail">Order Email</label></td>
    <td><input id="restaurant_OrderEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_OrderEmail" value="<?php echo $CuisineData['restaurant_OrderEmail']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_BookingEmail">Booking Email </label></td>
    <td><input id="restaurant_BookingEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_BookingEmail" value="<?php echo $CuisineData['restaurant_BookingEmail']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_FeedbackEmail">Feedback Email</label></td>
    <td><input id="restaurant_FeedbackEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_FeedbackEmail" value="<?php echo $CuisineData['restaurant_FeedbackEmail']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_Logo">Restaurant Logo </label></td>
    <td>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                        <input id="restaurant_Logo" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_Logo" value="" type="file" class="input-large"  style="width:300px;" />
                                        <br />
                                       
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                         <?php if($_GET['eid']!=''){ ?>
                                        <img src="../control/restaurantlogoimg/small/<?php echo $CuisineData['restaurant_Logo'];?>" width="90" height="70" style="margin-bottom:10px;" />
                                        <?php } ?>
  </td>
  <td><label for="restaurant_FaviconImg">Favicon Image</label></td>
    <td>
    
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                        <input id="restaurant_FaviconImg"  name="restaurant_FaviconImg" value="<?php echo $CuisineData['restaurant_FaviconImg']; ?>" type="file" class="input-large" style="width:300px;" />
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
 
    <?php if($_GET['eid']!=''){ ?>
    <br />
    <img src="../control/RestaurantFaviconimg/small/<?php echo $CuisineData['restaurant_FaviconImg'];?>" width="16" height="16" />
    <?php } ?>
    </td>
    
  </tr>
  
  
  
  
    <tr style="display: none;">
    <td><label for="restaurant_Video">Youtube Video URL </label></td>
    <td><input id="restaurant_Video"  name="restaurant_Video" value="<?php echo $CuisineData['restaurant_Video']; ?>" type="text"  style="width:300px; height:50px;" /></td>
    <td style="display: none;"><label for="restaurant_Market_bannerImg">Market Banner Image</label></td>
    <td style="display: none;">
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input id="restaurant_Market_bannerImg"  name="restaurant_Market_bannerImg" value="" type="file" class="input-large" style="width:300px;" />
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
    
    </td>
  </tr>
  
  <tr style="display:none;"><td><label for="restaurant_cloud_printer_email">Google Cloud Printer</label></td><td colspan="3"><input type="radio" <?php if($CuisineData1['CoundPrinter']==1){?> checked="checked" <?php } ?>  name="CoundPrinter" id="CoundPrinter" value="1"  />Yes &nbsp;<input type="radio" name="CoundPrinter"  id="CoundPrinter1" checked="checked"  value="0" <?php if($CuisineData1['CoundPrinter']==0){?> checked="checked" <?php } ?>  />No</td></tr>
     <tr style="display:none;"><td colspan="4" id="clouddisplay1" style="display:none;"> 
     <table width="100%" border="0" style="margin-top:10px; <?php if($CuisineData1['CoundPrinter']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="clouddisplay">
  <tr>
    <td><label for="restaurant_cloud_printer_email">Google Cloud Printer Email</label></td>
    <td><input id="restaurant_cloud_printer_email" name="restaurant_cloud_printer_email"  value="<?php echo $CuisineData1['restaurant_cloud_printer_email']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_cloud_printer_password">Google Cloud Printer Password</label></td>
    <td><input id="restaurant_cloud_printer_password"  name="restaurant_cloud_printer_password" value="<?php echo $CuisineData1['restaurant_cloud_printer_password']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
</table>

     </td></tr>
     
     
     <tr><td colspan="4">&nbsp;</td></tr>
     
     <tr><td><label for="restaurant_cloud_printer_email">SMS Option</label></td><td colspan="3"><input type="radio" <?php if($CuisineData1['SMSOption']==1){?> checked="checked" <?php } ?> name="SMSOption" id="SMSOption" value="1" />Yes &nbsp;<input type="radio" name="SMSOption" <?php if($CuisineData1['SMSOption']==0){?> checked="checked" <?php } ?> id="SMSOption1" value="0" checked="checked" />No</td></tr>
     <tr><td colspan="4"> 
     <table width="100%" border="0" style="margin-top:10px;margin-left: 55px; <?php if($CuisineData1['SMSOption']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="SMSOptiondisplay">
  <tr>
    <td><label for="restaurant_sms_api_id">SMS API ID</label></td>
    <td><input id="restaurant_sms_api_id" name="restaurant_sms_api_id"  value="<?php echo $CuisineData1['restaurant_sms_api_id']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_sms_api_url">SMS API URL</label></td>
    <td><input id="restaurant_sms_api_url" placeholder="https://www.textmagic.com/app/api?"  name="restaurant_sms_api_url" value="<?php echo $CuisineData1['restaurant_sms_api_url']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="restaurant_sms_api_id">SMS Username</label></td>
    <td><input id="restaurant_sms_api_user_name" placeholder="phpexpert" name="restaurant_sms_api_user_name"  value="<?php echo $CuisineData1['restaurant_sms_api_user_name']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_sms_api_user_password">SMS Password</label></td>
    <td><input id="restaurant_sms_api_user_password" placeholder='*****'  name="restaurant_sms_api_user_password" value="<?php echo $CuisineData1['restaurant_sms_api_user_password']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_sms_api_sender_id">SMS Sender ID</label></td>
    <td><input id="restaurant_sms_api_sender_id" placeholder='phpexpert123' name="restaurant_sms_api_sender_id"  value="<?php echo $CuisineData1['restaurant_sms_api_sender_id']; ?>" type="text"  style="width:300px;" /></td>
   
  </tr>
</table>

     </td></tr>
     
     
 <tr><td colspan="4">&nbsp;</td></tr>
     
     <tr ><td><label for="restaurant_cloud_printer_email">GPRS Printer Option</label></td><td colspan="3"><input type="radio" <?php if($CuisineData1['GPRSPrinterOption']==1){?> checked="checked" <?php } ?> name="GPRSPrinterOption" id="GPRSPrinterOption" value="1" />Yes &nbsp;<input type="radio" name="GPRSPrinterOption" id="GPRSPrinterOption1" value="0" <?php if($CuisineData1['GPRSPrinterOption']==0){?> checked="checked" <?php } ?> />No</td></tr>
     <tr><td colspan="4"> 
     <table width="100%" border="0" style="margin-top:10px;margin-left: 21px; <?php if($CuisineData1['GPRSPrinterOption']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="GPRSPrinterOptiondisplay">
  <tr>
    <td><label for="restaurant_gprs_apn_no">GPRS APN </label></td>
    <td><input id="restaurant_gprs_apn_no" name="restaurant_gprs_apn_no"  value="<?php echo $CuisineData1['restaurant_gprs_apn_no']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_gprs_apn_ip">GPRS IP</label></td>
    <td><input id="restaurant_gprs_apn_ip"  name="restaurant_gprs_apn_ip" value="<?php echo $CuisineData1['restaurant_gprs_apn_ip']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="restaurant_gprs_apn_port">GPRS Port</label></td>
    <td><input id="restaurant_gprs_apn_port" name="restaurant_gprs_apn_port"  value="<?php echo $CuisineData1['restaurant_gprs_apn_port']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_gprs_apn_username">GPRS User Name</label></td>
    <td><input id="restaurant_gprs_apn_username"  name="restaurant_gprs_apn_username" value="<?php echo $CuisineData1['restaurant_gprs_apn_username']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_gprs_apn_password">GPRS Password</label></td>
    <td><input id="restaurant_gprs_apn_password" name="restaurant_gprs_apn_password"  value="<?php echo $CuisineData1['restaurant_gprs_apn_password']; ?>" type="text"  style="width:300px;" /></td>
   <td><label for="restaurant_gprs_apn_printer_id">GPRS Printer ID</label></td>
    <td><input id="restaurant_gprs_apn_printer_id"  name="restaurant_gprs_apn_printer_id" value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_id']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="restaurant_gprs_apn_printer_speed">GPRS Print Speed</label></td>
    <td><input id="restaurant_gprs_apn_printer_speed" name="restaurant_gprs_apn_printer_speed"  value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_speed']; ?>" type="text"  style="width:300px;" /></td>
   <td><label for="restaurant_gprs_apn_printer_IMEI_code">GPRS IMEI Code</label></td>
    <td><input id="restaurant_gprs_apn_printer_IMEI_code"  name="restaurant_gprs_apn_printer_IMEI_code" value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_IMEI_code']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
  <tr>
    <td><label for="restaurant_gprs_apn_printer_product_model">GPRS Product Model</label></td>
    <td><input id="restaurant_gprs_apn_printer_product_model" name="restaurant_gprs_apn_printer_product_model"  value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_product_model']; ?>" type="text"  style="width:300px;" /></td>
   <td><label for="restaurant_gprs_apn_printer_file_path">GPRS File Path</label></td>
    <td><input id="restaurant_gprs_apn_printer_file_path"  name="restaurant_gprs_apn_printer_file_path" value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_file_path']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
</table>

     </td></tr>    
      <tr><td colspan="4">&nbsp;</td></tr>
     <tr><td colspan="4"><h3>Payment Setting for Restaurant</h3></td></tr>
  <tr><td colspan="4">&nbsp;</td></tr>
  <tr><td><label for="PaypalPayment">Paypal</label></td><td colspan="3"><input type="radio"  name="PaypalPayment" id="PaypalPayment" <?php if($CuisineData1['PaypalPayment']==1){?> checked="checked" <?php } ?> value="1" />Yes &nbsp;<input type="radio" name="PaypalPayment" id="PaypalPayment1" <?php if($CuisineData1['PaypalPayment']==0){?> checked="checked" <?php } ?> value="0"  />No</td></tr>
     <tr><td colspan="4"> 
     <table width="100%" border="0" style="margin-top:10px;margin-left:94px; <?php if($CuisineData1['PaypalPayment']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="PaypalPaymentdisplay">
  <tr>
    <td><label for="restaurant_paypal_url">Paypal URL</label></td>
    <td><input id="restaurant_paypal_url" name="restaurant_paypal_url" placeholder="https://www.paypal.com/cgi-bin/webscr"  value="<?php echo $CuisineData1['restaurant_paypal_url']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_paypal_business_account">Business Account</label></td>
    <td><input id="restaurant_paypal_business_account" placeholder="dherm9454214684@gmail.com"  name="restaurant_paypal_business_account" value="<?php echo $CuisineData1['restaurant_paypal_business_account']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
</table>

     </td></tr>   
     <tr><td colspan="4">&nbsp;</td></tr>
  
  <tr><td><label for="PaypalPayment">Authorize.net Payment</label></td><td colspan="3"><input type="radio" <?php if($CuisineData1['AuthorizednetPayment']==1){?> checked="checked" <?php } ?>  name="AuthorizednetPayment" id="AuthorizednetPayment" value="1" />Yes &nbsp;<input type="radio" <?php if($CuisineData1['AuthorizednetPayment']==1){?> checked="checked" <?php } ?> name="AuthorizednetPayment" id="AuthorizednetPayment1" value="0" checked="checked" />No</td></tr>
     <tr><td colspan="4"> 
     <table width="100%" border="0" style="margin-top:10px;margin-left:18px; <?php if($CuisineData1['AuthorizednetPayment']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="AuthorizednetPaymentdisplay">
  <tr>
    <td><label for="restaurant_Authorizednet_url">Authorize.net URL</label></td>
    <td><input id="restaurant_Authorizednet_url" placeholder='https://test.authorize.net/gateway/transact.dll' name="restaurant_Authorizednet_url"  value="<?php echo $CuisineData1['restaurant_Authorizednet_url']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_Authorizednet_login_key">Authorize.net Login Key</label></td>
    <td><input id="restaurant_Authorizednet_login_key" placeholder='*********'   name="restaurant_Authorizednet_login_key" value="<?php echo $CuisineData1['restaurant_Authorizednet_login_key']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="restaurant_Authorizednet_transid_key">Authorize.net Transaction Key</label></td>
    <td><input id="restaurant_Authorizednet_transid_key" placeholder='*********' name="restaurant_Authorizednet_transid_key"  value="<?php echo $CuisineData1['restaurant_Authorizednet_transid_key']; ?>" type="text"  style="width:300px;" /></td>
    
  </tr>
  
  
</table>

     </td></tr>    
  
  
  
  
  
  
  
  
  
                                        </table>
												</fieldset>
                                                
                                                
                                                
                                                <fieldset>
													<legend>Restaurant Owner information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_OwnerFirstName">Owner First Name</label></td>
    <td><input id="restaurant_OwnerFirstName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_OwnerFirstName" value="<?php echo $OwnerData['restaurant_OwnerFirstName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLastName">Owner Last Name</label></td>
    <td><input id="restaurant_OwnerLastName"  name="restaurant_OwnerLastName" value="<?php echo $OwnerData['restaurant_OwnerLastName']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_OwnerLoginId">Owner ID </label></td>
    <td><input id="restaurant_OwnerLoginId"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_OwnerLoginId" value="<?php echo $OwnerData['restaurant_OwnerLoginId']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLoginPassword">Owner Password</label></td>
    <td><input id="restaurant_OwnerLoginPassword" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_OwnerLoginPassword" value="<?php echo $OwnerData['restaurant_OwnerLoginPassword']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td colspan=""><label for="restaurant_OwnerLoginAddress">Address</label></td>
    <td colspan="3">
    <textarea name="restaurant_OwnerLoginAddress" id="restaurant_OwnerLoginAddress" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  class="twys" style="width:800px; height:80px;"><?php echo $OwnerData['restaurant_OwnerLoginAddress']; ?></textarea>
    </td>
   
  </tr>
  
   <tr>
    <td><label for="restaurant_OwnerLoginEmail">Owner Email Address </label></td>
    <td><input id="restaurant_OwnerLoginEmail"  name="restaurant_OwnerLoginEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $OwnerData['restaurant_OwnerLoginEmail']; ?>" type="email"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLoginMobile">Owner Mobile</label></td>
    <td><input id="restaurant_OwnerLoginMobile"  name="restaurant_OwnerLoginMobile" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $OwnerData['restaurant_OwnerLoginMobile']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_OwnerDOB">Owner Birth Date </label></td>
    <td><input id="restaurant_OwnerDOB"  name="restaurant_OwnerLoginDOB" value="<?php echo $OwnerData['restaurant_OwnerLoginDOB']; ?>" type="text"   style="width:300px;" /></td>
    <td><label for="restaurant_OwnerAnniversaryDate">Owner Anniversary Date</label></td>
    <td><input id="restaurant_OwnerAnniversaryDate"  name="restaurant_OwnerAnniversaryDate" value="<?php echo $OwnerData['restaurant_OwnerAnniversaryDate']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
                                           </table>
												</fieldset>
                                                
                                                
                                                
                                                
                                                
                                                <fieldset>
													<legend>SEO Setting information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
    <td colspan=""><label for="restaurant_MetaTitle">Title Meta Tag</label></td>
    <td colspan="3">
    <textarea name="restaurant_MetaTitle" id="restaurant_MetaTitle" style="width:800px; height:80px;"><?php echo $SEOData['restaurant_MetaTitle']; ?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="restaurant_MetaKeyword">KeyWord Meta Tag</label></td>
    <td colspan="3">
    <textarea name="restaurant_MetaKeyword" id="restaurant_MetaKeyword" style="width:800px; height:80px;"><?php echo $SEOData['restaurant_MetaKeyword']; ?></textarea>
    </td>
   
  </tr>
  
  
    <tr>
    <td colspan=""><label for="restaurant_MetaDescription">Description Meta Tag</label></td>
    <td colspan="3">
    <textarea name="restaurant_MetaDescription" id="restaurant_MetaDescription" style="width:800px; height:80px;"><?php echo $SEOData['restaurant_MetaDescription']; ?></textarea>
    </td>
   
  </tr>
  
  
  </tr>
                                                    </table>
												</fieldset>
                                                
                                                
                                               <?php /*?> <fieldset>
													<legend>Bank A/C information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_BankACName">Bank A/C Name </label></td>
    <td><input id="restaurant_BankACName"  name="restaurant_BankACName" value="<?php echo $BankData['restaurant_BankACName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_BankACType">Bank A/C Type</label></td>
    <td><select  data-placeholder="Select Bank A/C Type..." id="restaurant_BankACType" name="restaurant_BankACType" style="width:317px;">
											  <option value="">select</option>
											  <option value="Saving" <?php if($BankData['restaurant_BankACType']=='Saving'){ ?> selected="selected" <?php } ?>>Saving</option>
											  <option value="Current" <?php if($BankData['restaurant_BankACType']=='Current'){ ?> selected="selected" <?php } ?>>Current</option>
											 
											</select></td>
  </tr>
  
   <tr>
    <td height="27"><label for="restaurant_BankName">Bank Name </label></td>
    <td><input id="restaurant_BankName"  name="restaurant_BankName" value="<?php echo $BankData['restaurant_BankName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_BankACNo">Bank A/C No.</label></td>
    <td><input id="restaurant_BankACNo"  name="restaurant_BankACNo" value="<?php echo $BankData['restaurant_BankACNo']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_BankNEFTCode">NEFT Code </label></td>
    <td><input id="restaurant_BankNEFTCode"  name="restaurant_BankNEFTCode" value="<?php echo $BankData['restaurant_BankNEFTCode']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_BankSwiftCode">Swift Code</label></td>
    <td><input id="restaurant_BankSwiftCode"  name="restaurant_BankSwiftCode" value="<?php echo $BankData['restaurant_BankSwiftCode']; ?>" type="text" style="width:300px;" /></td>
  </tr>
  
  
     <tr>
    <td colspan=""><label for="restaurant_BankAddress">Bank Address</label></td>
    <td colspan="3">
    <textarea name="restaurant_BankAddress" id="restaurant_BankAddress" style="width:800px; height:80px;"><?php echo $BankData['restaurant_BankAddress']; ?></textarea>
    </td>
   
  </tr>
  
   
                                                    </table>
												</fieldset>
                                                <?php */?>
                                                
                                                <fieldset>
													<legend>Terms & Condtions</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                     <tr>
    <td colspan=""><label for="terms_condtion">Terms & Condtions</label></td>
    <td colspan="3">
    <textarea name="terms_condtion" id="terms_condtion" class="twys"  style="width:800px; height:250px;"><?php echo $CuisineData['terms_condtion']; ?></textarea>
    </td>
   
  </tr>
  
   
                                                    </table>
												</fieldset>
                                                
                                                
												
												<input id="submitWizard" name="SubmitRestaurant" type="submit" class="btn btn-primary submitWizard" value="<?php echo $buttonValue; ?>" />
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
    <script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
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
