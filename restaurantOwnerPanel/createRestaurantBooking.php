<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
include('domainName.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("table_booking","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
function genRandomString() {
$length =5;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
}
$booking_id='B'.genRandomString();
extract($_POST);
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_POST['AddNewBooking']))
{
 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$restaurant_id));

$mlp=mysql_num_rows(mysql_query("select * from table_booking where restaurant_id='$restaurant_id' and booking_date='$booking_date' and booking_time='$booking_time'"));
if($mlp==0)
{
$BookingQuery="INSERT INTO `table_booking` (`id`, `restaurant_id`, `booking_id`, `noofgusts`, `booking_name`, `booking_email`, `booking_address`, `booking_mobile`, `book_landline`, `booking_date`, `booking_time`, `eattype`, `booking_instruction`, `booking_ip`, `booking_type`, `servicecharge`) VALUES (NULL, '$restaurant_id', '$booking_id', '$noofgusts', N'$booking_name', '$booking_email', N'$booking_address', '$booking_mobile', '$book_landline', '$booking_date', '$booking_time', N'$eattype', N'$booking_instruction', '$ip', N'$booking_type', '10')";
mysql_query($BookingQuery);
$to=$_POST['booking_email'].','.$RegistrationDataLoginVal['bookingemail'];
$subject ='Welcome To '.$_POST['booking_name'].' With Booking Detail Mr.'.$_POST['booking_email'];
$from=$RegistrationDataLoginVal['bookingemail'];
$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<META http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
<title>".$AdminDataLoginVal['website_name']."- Restaurant Booking Detail</title>
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
                          Hi ".$_POST['booking_name']." ,
              </p>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to welcome you to 
                          <a href='".$DomainName."' style='text-decoration:none;color:#000;font-weight:bold' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a>.
              </p>
                        <p style='padding:0 10px 0 20px;margin-bottom:1em;margin-left:20px;margin-right:20px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;line-height:1.3em'>
                        You restaurant booking has been successfully created . kindly see your booking detail with Booking No <strong>".$booking_id."</strong>
                        </p>
<table width='100%' align='center' cellpadding='0' cellspacing='0' style='width:558px;margin:0 auto;padding:0'>
<tbody>
<tr>
<td bgcolor='#e9f5c5' width='100%' style='padding:7px;padding-left:10px'>
<table width='100%' border='0'>
                                                     <tr>
    <td><label for='restaurant_id'>Restaurant Name</label></td>
    <td>".$StQuery['restaurant_name']."</td>
    <td><label for='restaurant_country'>Booking Type</label></td>
    <td>".$_POST['booking_type']."</td>
  </tr>
  
   <tr>
    <td><label for='restaurant_website'>Eat Type</label></td>
    <td>".$_POST['eattype']."</td>
    <td><label for='restaurant_website'>No of People</label></td>
    <td>".$_POST['noofgusts']." People</td>
   
   
  </tr>
  
   <tr>
    <td><label for='restaurant_website'>Booking User Name</label></td>
    <td>".$_POST['booking_name']."</td>
    <td><label for='restaurant_website'>Booking User Email</label></td>
    <td>".$_POST['booking_email']."</td>
   
   
  </tr>
  
    <tr>
    <td><label for='restaurant_website'>Booking User Phone</label></td>
    <td>".$_POST['book_landline']."</td>
    <td><label for='restaurant_website'>Booking User Mobile</label></td>
    <td>".$_POST['booking_mobile']."</td>
   
   
  </tr>
  
  
    <tr>
    <td><label for='restaurant_website'>Booking Date</label></td>
    <td>".$_POST['booking_date']."</td>
    <td><label for='restaurant_website'>Booking Time</label></td>
    <td>".$_POST['booking_time']."</td>
   
   
  </tr>
    <tr>
    <td colspan=''><label for='restaurant_website'>Booking Address</label></td>
    <td colspan='3'>".$_POST['booking_address']."</td>
   
  </tr>
    <tr>
    <td colspan=''><label for='restaurant_website'>Booking Instruction</label></td>
    <td colspan='3'>".$_POST['booking_instruction']."</td>
   </tr>
  </table>
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
												The ".$AdminDataLoginVal['website_name']." team.</p>
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


$msg="Hi,".$booking_name." your Booking is successfully submitted";
}
else
{
$msg="This restaurant is already booked at ".$booking_date." and " .$booking_time;
}

}

extract($_POST);
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_POST['EditBooking']))
{
 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$restaurant_id));

$mlp=mysql_num_rows(mysql_query("select * from table_booking where restaurant_id='$restaurant_id' and booking_date='$booking_date' and booking_time='$booking_time'"));
if($mlp==0)
{
$BookingQueryUpdate="UPDATE `table_booking` SET `restaurant_id` = '$restaurant_id', `booking_id` = '$booking_id', `noofgusts` = '$noofgusts', `booking_name` = N'$booking_name', `booking_email` = '$booking_email', `booking_address` = N'$booking_address', `booking_mobile` = '$booking_mobile', `book_landline` = '$book_landline', `booking_date` = '$booking_date', `booking_time` = '$booking_time', `eattype` = N'$eattype', `booking_instruction` = N'$booking_instruction', `booking_ip` = '$ip', `booking_type` = N'$booking_type' WHERE `id` ='".$_GET['eid']."'";
mysql_query($BookingQueryUpdate);


$to=$_POST['booking_email'].','.$RegistrationDataLoginVal['bookingemail'];
$subject ='Welcome To '.$_POST['booking_name'].' With Booking Detail Mr.'.$_POST['booking_email'];
$from=$RegistrationDataLoginVal['bookingemail'];
$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<META http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
<title>".$AdminDataLoginVal['website_name']."- Restaurant Booking Detail</title>
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
                          Hi ".$_POST['booking_name']." ,
              </p>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to welcome you to 
                          <a href='".$DomainName."' style='text-decoration:none;color:#000;font-weight:bold' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a>.
              </p>
                        <p style='padding:0 10px 0 20px;margin-bottom:1em;margin-left:20px;margin-right:20px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#3a3a3a;line-height:1.3em'>
                        You restaurant booking has been successfully created . kindly see your booking detail with Booking No <strong>".$booking_id."</strong>
                        </p>
<table width='100%' align='center' cellpadding='0' cellspacing='0' style='width:558px;margin:0 auto;padding:0'>
<tbody>
<tr>
<td bgcolor='#e9f5c5' width='100%' style='padding:7px;padding-left:10px'>
<table width='100%' border='0'>
                                                     <tr>
    <td><label for='restaurant_id'>Restaurant Name</label></td>
    <td>".$StQuery['restaurant_name']."</td>
    <td><label for='restaurant_country'>Booking Type</label></td>
    <td>".$_POST['booking_type']."</td>
  </tr>
  
   <tr>
    <td><label for='restaurant_website'>Eat Type</label></td>
    <td>".$_POST['eattype']."</td>
    <td><label for='restaurant_website'>No of People</label></td>
    <td>".$_POST['noofgusts']." People</td>
   
   
  </tr>
  
   <tr>
    <td><label for='restaurant_website'>Booking User Name</label></td>
    <td>".$_POST['booking_name']."</td>
    <td><label for='restaurant_website'>Booking User Email</label></td>
    <td>".$_POST['booking_email']."</td>
   
   
  </tr>
  
    <tr>
    <td><label for='restaurant_website'>Booking User Phone</label></td>
    <td>".$_POST['book_landline']."</td>
    <td><label for='restaurant_website'>Booking User Mobile</label></td>
    <td>".$_POST['booking_mobile']."</td>
   
   
  </tr>
  
  
    <tr>
    <td><label for='restaurant_website'>Booking Date</label></td>
    <td>".$_POST['booking_date']."</td>
    <td><label for='restaurant_website'>Booking Time</label></td>
    <td>".$_POST['booking_time']."</td>
   
   
  </tr>
    <tr>
    <td colspan=''><label for='restaurant_website'>Booking Address</label></td>
    <td colspan='3'>".$_POST['booking_address']."</td>
   
  </tr>
    <tr>
    <td colspan=''><label for='restaurant_website'>Booking Instruction</label></td>
    <td colspan='3'>".$_POST['booking_instruction']."</td>
   </tr>
  </table>
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
												The ".$AdminDataLoginVal['website_name']." team.</p>
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



$msg="Hi,".$booking_name." your Booking is successfully updated";
}
else
{
$msg="This restaurant is already booked at ".$booking_date." and " .$booking_time;
}

}
 ?>
 
 <script type="text/javascript">
function RestaurantBookimngValidate(){
var chkStatus = true
if(document.getElementById('restaurant_id').value =="") {
document.getElementById("restaurant_id").style.background='#C10000';
document.getElementById("restaurant_id").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_id').className = "";

if(document.getElementById('booking_type').value =="") {
document.getElementById("booking_type").style.background='#C10000';
document.getElementById("booking_type").focus();
chkStatus = false;
}
else
document.getElementById('booking_type').className = "";
if(document.getElementById('eattype').value =="") {
document.getElementById("eattype").style.background='#C10000';
document.getElementById("eattype").focus();
chkStatus = false;
}
else
document.getElementById('eattype').className = "";

if(document.getElementById('booking_name').value =="") {
document.getElementById("booking_name").style.background='#C10000';
document.getElementById("booking_name").focus();
chkStatus = false;
}
else
document.getElementById('booking_name').className = "";


if(document.getElementById('booking_email').value =="") {
document.getElementById("booking_email").style.background='#C10000';
document.getElementById("booking_email").focus();
chkStatus = false;
}
else
document.getElementById('booking_email').className = "";

if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('booking_email').value))) {
document.getElementById("booking_email").style.background='#8C0000';
document.getElementById("booking_email").focus();
chkStatus = false;
}
else
document.getElementById('booking_email').style.color = "";

if(document.getElementById('booking_mobile').value =="") {
document.getElementById("booking_mobile").style.background='#C10000';
document.getElementById("booking_mobile").focus();
chkStatus = false;
}
else
document.getElementById('booking_mobile').className = "";

if(document.getElementById('booking_date').value =="") {
document.getElementById("booking_date").style.background='#C10000';
document.getElementById("booking_date").focus();
chkStatus = false;
}
else
document.getElementById('booking_date').className = "";

if(document.getElementById('booking_time').value =="") {
document.getElementById("booking_time").style.background='#C10000';
document.getElementById("booking_time").focus();
chkStatus = false;
}
else
document.getElementById('booking_time').className = "";

if(document.getElementById('booking_address').value =="") {
document.getElementById("booking_address").style.background='#C10000';
document.getElementById("booking_address").focus();
chkStatus = false;
}
else
document.getElementById('booking_address').className = "";

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
                            Setup New Restaurant Booking
                            <?php } else { ?>
                            Update Restaurant Booking
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
                            Setup New Restaurant Booking
                            <?php } else { ?>
                            Update Restaurant Booking
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td> <?php if($msg!=''){ ?> <strong style="font-size:16px; color:#00009B;"><?php echo $msg; ?></strong><?php } ?>
										
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $battonName="EditBooking";
											$buttonValue="Edit Restaurant Booking";
										   }
										   else
										   {
										    $battonName="AddNewBooking";
										   $buttonValue="Add New Restaurant Booking";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" method="post" enctype="multipart/form-data" onSubmit="return RestaurantBookimngValidate()">
                                                <input type="hidden" name="restaurant_id" value="<?php echo $_SESSION['restaurant_id'];?>" />
												
												
                                                    <table width="100%" border="0">
                                                     <tr>
   
    <td><label for="restaurant_country">Booking Type</label></td>
    <td> <input type="text" name="booking_type" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="booking_type" value="<?php echo $CuisineData['booking_type']; ?>"  /></td>
  </tr>
  
   <tr>
    <td><label for="restaurant_website">Eat Type</label></td>
    <td>
    <input  type="text"  name="eattype" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="eattype" value="<?php echo $CuisineData['eattype']; ?>"  />
    </td>
    <td><label for="restaurant_website">No of People</label></td>
    <td>
    <select name="noofgusts" id="noofgusts" class="rbSelect rbMr10">
    <?php for($i=1;$i<=500;$i++){ ?>
    <option value="<?php echo $i; ?>" <?php if($CuisineData['noofgusts']==$i){ ?> selected <?php } ?>><?php echo $i; ?> People</option>
    <?php } ?>
    </select> 
    </td>
   
   
  </tr>
  
   <tr>
    <td><label for="restaurant_website">Booking User Name</label></td>
    <td>
    <input type="text" name="booking_name" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="booking_name" value="<?php echo $CuisineData['booking_name']; ?>"  />
    </td>
    <td><label for="restaurant_website">Booking User Email</label></td>
    <td>
    <input type="text" name="booking_email" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="booking_email" value="<?php echo $CuisineData['booking_email']; ?>"  />
    </td>
   
   
  </tr>
  
    <tr>
    <td><label for="restaurant_website">Booking User Phone</label></td>
    <td>
    <input type="text" name="book_landline" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="book_landline" value="<?php echo $CuisineData['book_landline']; ?>"  />
    </td>
    <td><label for="restaurant_website">Booking User Mobile</label></td>
    <td>
    <input type="text" name="booking_mobile" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="booking_mobile" value="<?php echo $CuisineData['booking_mobile']; ?>"  />
    </td>
   
   
  </tr>
  
  
    <tr>
    <td><label for="restaurant_website">Booking Date</label></td>
    <td>
    <input data-date-format="mm/dd/yyyy" type="text" class="datePicker" name="booking_date" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="booking_date" value="<?php echo $CuisineData['booking_date']; ?>"  />
    </td>
    <td><label for="restaurant_website">Booking Time</label></td>
    <td>
    <select name="booking_time" id="booking_time" class="rbSelect rbMr10">
      <option value="12:00 am">12:00 am</option>
  <option value="1:00 am">1:00 am</option>
  <option value="2:00 am">2:00 am</option>
  <option value="3:00 am">3:00 am</option>
  <option value="4:00 am">4:00 am</option>
  <option value="5:00 am">5:00 am</option>
  <option value="6:00 am">6:00 am</option>
  <option value="7:00 am">7:00 am</option>
  <option value="8:00 am">8:00 am</option>
  <option value="9:00 am">9:00 am</option>
  <option value="10:00 am">10:00 am</option>
  <option value="11:00 am">11:00 am</option>
  <option value="12:00 am">12:00 pm</option>
  <option value="1:00 pm">1:00 pm</option>
  <option value="2:00 pm">2:00 pm</option>
  <option value="3:00 pm">3:00 pm</option>
  <option value="4:00 pm">4:00 pm</option>
  <option value="5:00 pm">5:00 pm</option>
  <option value="6:00 pm">6:00 pm</option>
  <option value="7:00 pm">7:00 pm</option>
  <option value="8:00 pm">8:00 pm</option>
  <option value="9:00 pm">9:00 pm</option>
  <option value="10:00 pm">10:00 pm</option>
  <option value="11:00 pm">11:00 pm</option>
    </select> &nbsp;
    
  
    </td>
   
   
  </tr>
    <tr>
    <td colspan=""><label for="restaurant_website">Booking Address</label></td>
    <td colspan="3">
    <textarea name="booking_address" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   id="booking_address"  style="width:800px; height:80px;"><?php echo $CuisineData['booking_address']; ?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="restaurant_website">Booking Instruction</label></td>
    <td colspan="3">
    <textarea name="booking_instruction" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   id="booking_instruction" class="twys" style="width:800px; height:80px;"><?php echo $CuisineData['booking_instruction']; ?></textarea>
    </td>
   
  </tr>
  
  
  
    <tr>
   
    <td colspan="4" align="center">
  <input  type="submit" class="btn btn-primary " name="<?php echo $battonName;?>" id="RestaurantOfferSubmit" value="<?php echo $buttonValue; ?>" />
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
