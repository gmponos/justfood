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

function RestaurantValidateLocation(){
var chkStatus = true
if(document.getElementById('restaurant_state').value =="") {
//alert("please select restaurant state");
document.getElementById("restaurant_state").style.background='#C10000';
document.getElementById("restaurant_state").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_state').className = "";
if(document.getElementById('restaurant_city').value =="") {
//alert("please select restaurant city ");
document.getElementById("restaurant_city").style.background='#C10000';
document.getElementById("restaurant_city").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_city').className = "";
if(document.getElementById('restaurant_address').value =="") {
//alert("please enter restaurant address");
document.getElementById("restaurant_address").style.background='#C10000';
document.getElementById("restaurant_address").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_address').className = "";
if(document.getElementById('restaurant_description').value =="") {
//alert("please enter restaurant description");
document.getElementById("restaurant_description").style.background='#C10000';
document.getElementById("restaurant_description").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_description').className = "";

if(chkStatus==false)
{
}
else
{
document.getElementById('checkaddressdata').style.display='none';
document.getElementById('checkaddressdata1').style.display='block';
}

return chkStatus;
}



function RestaurantValidateEmailInformation(){
var chkStatus = true
if(document.getElementById('restaurant_InvoiceEmail').value =="") {
//alert("please enter restaurant invoice email address");
document.getElementById("restaurant_InvoiceEmail").style.background='#C10000';
document.getElementById("restaurant_InvoiceEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_InvoiceEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_InvoiceEmail').value))) {
//alert("please enter restaurant valid invoice email address");
document.getElementById("restaurant_InvoiceEmail").style.background='#8C0000';
document.getElementById("restaurant_InvoiceEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_InvoiceEmail').style.color = "";
if(document.getElementById('restaurant_OrderEmail').value =="") {
//alert("please enter restaurant order email address");
document.getElementById("restaurant_OrderEmail").style.background='#C10000';
document.getElementById("restaurant_OrderEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OrderEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_OrderEmail').value))) {
//alert("please enter restaurant valid order email address");
document.getElementById("restaurant_OrderEmail").style.background='#8C0000';
document.getElementById("restaurant_OrderEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OrderEmail').style.color = "";
if(document.getElementById('restaurant_BookingEmail').value =="") {
//alert("please enter restaurant booking email address");
document.getElementById("restaurant_BookingEmail").style.background='#C10000';
document.getElementById("restaurant_BookingEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_BookingEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_BookingEmail').value))) {
//alert("please enter restaurant valid booking email address");
document.getElementById("restaurant_BookingEmail").style.background='#8C0000';
document.getElementById("restaurant_BookingEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_BookingEmail').style.color = "";
if(document.getElementById('restaurant_FeedbackEmail').value =="") {
//alert("please enter restaurant feedback email address");
document.getElementById("restaurant_FeedbackEmail").style.background='#C10000';
document.getElementById("restaurant_FeedbackEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_FeedbackEmail').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_FeedbackEmail').value))) {
//alert("please enter restaurant valid feedback email address");
document.getElementById("restaurant_FeedbackEmail").style.background='#8C0000';
document.getElementById("restaurant_FeedbackEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_FeedbackEmail').style.color = "";
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('restaurant_Logo').value =="") {
//alert("please upload restaurant logo image");
document.getElementById("restaurant_Logo").style.background='#C10000';
document.getElementById("restaurant_Logo").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_Logo').className = "";
<?php } ?>
if(chkStatus==false)
{
}
else
{
document.getElementById('checkemailsdata').style.display='none';
document.getElementById('checkemaildata1').style.display='block';
}
return chkStatus;
}




function RestaurantValidateOwnerInformation(){
var chkStatus = true
if(document.getElementById('restaurant_OwnerFirstName').value =="") {
//alert("please enter restaurant Owner First Name");
document.getElementById("restaurant_OwnerFirstName").style.background='#C10000';
document.getElementById("restaurant_OwnerFirstName").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerFirstName').className = "";
if(document.getElementById('restaurant_OwnerLoginId').value =="") {
//alert("please enter restaurant Owner Login ID");
document.getElementById("restaurant_OwnerLoginId").style.background='#C10000';
document.getElementById("restaurant_OwnerLoginId").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerLoginId').className = "";
if(document.getElementById('restaurant_OwnerLoginPassword').value =="") {
//alert("please enter restaurant Owner Login Password");
document.getElementById("restaurant_OwnerLoginPassword").style.background='#C10000';
document.getElementById("restaurant_OwnerLoginPassword").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerLoginPassword').className = "";

if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_OwnerLoginEmail').value))) {
//alert("please enter restaurant valid email address");
document.getElementById("restaurant_OwnerLoginEmail").style.background='#8C0000';
document.getElementById("restaurant_OwnerLoginEmail").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_OwnerLoginEmail').style.color = "";

if(chkStatus==false)
{
}
else
{
document.getElementById('checkownerdata').style.display='none';
document.getElementById('checkownerdata1').style.display='block';
}
return chkStatus;
}


function RestaurantValidate(){
var chkStatus = true
if(document.getElementById('restaurant_name').value =="") {
//alert("please enter restaurant name");
document.getElementById("restaurant_name").style.background='#C10000';
document.getElementById("restaurant_name").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_name').className = "";
if(document.getElementById('restaurant_phone').value =="") {
//alert("please enter restaurant name");
document.getElementById("restaurant_phone").style.background='#C10000';
document.getElementById("restaurant_phone").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_phone').className = "";
if(document.getElementById('restaurant_contact_name').value =="") {
//alert("please enter restaurant contact name");
document.getElementById("restaurant_contact_name").style.background='#C10000';
document.getElementById("restaurant_contact_name").focus();
chkStatus = false;
}
else 
document.getElementById('restaurant_contact_name').className = "";
if(document.getElementById('restaurant_contact_phone').value =="") {
//alert("please enter restaurant contact phone");
document.getElementById("restaurant_contact_phone").style.background='#C10000';
document.getElementById("restaurant_contact_phone").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_phone').className = "";
if(document.getElementById('restaurant_contact_mobile').value =="") {
//alert("please enter restaurant contact mobile no");
document.getElementById("restaurant_contact_mobile").style.background='#C10000';
document.getElementById("restaurant_contact_mobile").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_mobile').className = "";
if(document.getElementById('restaurant_contact_email').value =="") {
//alert("please enter restaurant email address");
document.getElementById("restaurant_contact_email").style.background='#C10000';
document.getElementById("restaurant_contact_email").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_email').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('restaurant_contact_email').value))) {
//alert("please enter restaurant valid email address");
document.getElementById("restaurant_contact_email").style.background='#8C0000';
document.getElementById("restaurant_contact_email").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_contact_email').style.color = "";
if(document.getElementById('restaurant_sms_mobile').value =="") {
//alert("please enter restaurant Order SMS Mobile No.");
document.getElementById("restaurant_sms_mobile").style.background='#C10000';
document.getElementById("restaurant_sms_mobile").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_sms_mobile').className = "";
if(document.getElementById('restaurant_default_min_order').value =="") {
//alert("please enter restaurant default minimum order");
document.getElementById("restaurant_default_min_order").style.background='#C10000';
document.getElementById("restaurant_default_min_order").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_default_min_order').className = "";
if(document.getElementById('restaurant_commission').value =="") {
//alert("please enter restaurant commission charge");
document.getElementById("restaurant_commission").style.background='#C10000';
document.getElementById("restaurant_commission").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_commission').className = "";
if(chkStatus==false)
{
}
else
{
document.getElementById('checkdata').style.display='none';
document.getElementById('checkdata1').style.display='block';

}
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
//alert("display none");
document.getElementById("clouddisplay").style.display= 'none';
}
}


function changeStatusLoyality(){
if(document.getElementById("loyality_setting").value ==1){
document.getElementById("displaylocality").style.display= 'table-row';
} 
else
{
//alert("display none");
document.getElementById("displaylocality").style.display= 'none';
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
<script language="JavaScript" type="text/JavaScript"> 
function isNumber(field) { 
        var re = /^[0-9-'.'-',']*$/; 
        if (!re.test(field.value)) { 
            alert('Value must be all numberic charcters, including "." non numerics will be removed from field!'); 
            field.value = field.value.replace(/[^0-9-'.'-',']/g,""); 
        } 
    } 
</script>
<SCRIPT language="JavaScript">
<!--
<?php /*?>function check_it() {
     var theurl=document.SignupForm.restaurant_website.value;
     var tomatch= /www[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/
	 if(document.SignupForm.restaurant_website.value=='')
	 {
	 alert("Please enter Restaurant Website");
	 document.SignupForm.restaurant_website.value='';
     return false; 
	 }
     if (tomatch.test(theurl))
     {
      //   window.alert("URL OK.");
         return true;
     }
     else
     {
        alert("URL invalid. Try again.");
		document.SignupForm.restaurant_website.value='';
         return false; 
     }
}<?php */?>

//-->
</SCRIPT>

<div id="page-wrap">
  <!-- left sidebar -->
  <?php include('route/side_bar.php'); ?>
  <link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
  <div id="main-content">
    <div id="inner">
      <div class="container-fluid">
        <div class="tabbable main-tabs">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#mainFormElements" style="color:#FFFFFF;"  data-toggle="tab"><i class="icon-file"></i>
              <?php  if($_GET['eid']=='')
										   { ?>
              Setup New Restaurant
              <?php } else { ?>
              Update Restaurant
              <?php } ?>
              </a></li>
          </ul>
          <div class="tab-content"   style="min-height:900px;">
            <div class="tab-pane active" id="mainFormElements"  >
              <div id="itemContainer">
                <div class="well">
                  <div class="navbar">
                    <div class="navbar-inner"> <a class="brand" href="#">
                      <?php  if($_GET['eid']=='')
										   { ?>
                      Setup New Restaurant
                      <?php } else { ?>
                      Update Restaurant
                      <?php } ?>
                      </a> </div>
                  </div>
                <style type="text/css">
				.add-new-restaurant-tabs li a{
				 border: 1px solid rgba(0,0,0,.1);
					box-shadow: 0 1px 2px rgba(0, 0, 0, .41);
				 color:#000000;
				 margin-right:5px;
				}
				.add-restaurant-sub-heading{
				display:block;
				font-size:11px;
				font-family:Arial;
				}
				dropdown > a span:after {border-left:none!important;}
                </style>
                  <div style="width:100%;">
                    <?php
											if($_GET['msg']==1)
											{?>
                    <div id="display-success"> <img src="img/correct.png" alt="Success" /> New Restaurant has been successfully saved </div>
                    <?php } if($_GET['error']==1){?>
                    <div id="display-error"> <img src="img/error.png" alt="Error" />New Restaurant is already exit. </div>
                    <?php } ?>
                    <?php
											if($_GET['emsg']!='')
											{?>
                    <div id="display-success"> <img src="img/correct.png" alt="Success" />Restaurant has been successfully updated. </div>
                    <?php }?>
                  </div>
                  <ul class="nav nav-tabs add-new-restaurant-tabs">
                    <li class="active"><a href="#astep1" data-toggle="tab">Step 1<span class="add-restaurant-sub-heading">contact information</span></a></li>
                    <li><a href="#astep2" data-toggle="tab"  >Step 2<span class="add-restaurant-sub-heading">location information</span></a></li>
                    <li><a href="#astep3" data-toggle="tab" >Step 3<span class="add-restaurant-sub-heading">order info & photo setting information</span></a></li>
                    <li><a href="#astep4" data-toggle="tab" >Step 4<span class="add-restaurant-sub-heading">restaurant owner information</span></a></li>
                    <li><a href="#astep5" data-toggle="tab">Step 5<span class="add-restaurant-sub-heading">SEO setting information</span></a></li>
                    <li><a href="#astep6" data-toggle="tab">Step 6<span class="add-restaurant-sub-heading">terms & conditons</span></a></li>
                  </ul>
                    <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=RestaurantEdit&eid=".$_GET['eid'];
											$buttonValue="Submit";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=RestaurantAdd";
										   $buttonValue="Save Restaurant";
										   }
										   
										   ?>
                                           <form id="SignupForm" name="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantValidate();">
                        <input id="restaurant_Market_bannerImg" name="restaurant_Market_bannerImg" value="<?php echo $CuisineData['restaurant_Market_bannerImgold']; ?>" type="hidden"  style="width:300px;"/>
                        <input id="restaurant_Logoold" name="restaurant_Logoold" value="<?php echo $CuisineData['restaurant_Logo']; ?>" type="hidden"  style="width:300px;"/>
                        <input id="restaurant_FaviconImgold" name="restaurant_FaviconImgold" value="<?php echo $CuisineData['restaurant_FaviconImg']; ?>" type="hidden"  style="width:300px;"/>
                       
                     
                  <div class="tab-content">
                    <div class="tab-pane active" id="astep1"> 
                    <legend>Contact information</legend>
                     <?php include('restaurant_contact_information.php'); ?>
                     
                    </div>
                    <div class="tab-pane " id="astep2">
                    <legend>Location information</legend>
                    <?php include('restaurant_location_information.php'); ?>
                    
                    </div>
                    <div class="tab-pane " id="astep3">
                    <legend>Order Info & Photo Setting information</legend>
                    <?php include('restaurant_order_information.php'); ?>
                    
                    </div>
                    <div class="tab-pane " id="astep4">
                    <legend>Restaurant Owner information</legend>
                    <?php include('restaurant_owner_information.php'); ?>
                    
                    </div>
                    <div class="tab-pane " id="astep5">
                    <legend>SEO Setting information</legend>
                    <?php include('restaurant_SEO_information.php'); ?>
                    
                    </div>
                    <div class="tab-pane " id="astep6"> 
                    <legend>Terms & Condition</legend>
                    <?php include('restaurant_t&c_information.php'); ?>
                    
                    <?php /*?><input id="submitWizard" onmouseover="return check_it();" name="SubmitRestaurant" type="submit" class="btn btn-primary submitWizard" value="<?php echo $buttonValue; ?>"  onclick="return RestaurantValidate();" /><?php */?>
                      
                    </div>
                  </div>
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
</body></html>