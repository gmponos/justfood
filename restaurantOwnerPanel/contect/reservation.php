<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>Peppers Rundells Alpine Lodge - Accommodation Dinner Plain, Mount Hotham</title>
<meta name="description" content="Come and enjoy the rustic elegance and alpine charm at Rundells. Set amongst the Alpine National Park, in the picturesque village of Dinner Plain" />
		<meta name="keywords" content="Dinner Plain accommodation, Accommodation Dinner Plain, Dinner Plains Accommodation, Hotham accommodation, Accommodation Hotham, Hotels Dinner Plain, Dinner Plain, Diner Planes, Diner Plain, Hotham, Mount Hotham, high country lodge, best accommodation in Dinner Plain, Victorian High Country, High Country, alpine lodge, adventure holiday, snow holidays, snow holidays Victoria, high country holidays, ski holidays, alpine getaway, high country getaway, best accommodation in Dinner Plain, best accommodation at Hotham, best alpine lodge, nice places to stay, snow accommodation, beautiful accommodation, alpine accommodation, wotif, snow accommodation, Great Alpine Road, accommodation Great Alpine Road, winter getaways, touring The Great Alpine Road, Melbourne Sydney Touring, Harrietville accommodation, Bright accommodation, Omeo accommodation" />
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="stylesheets/base.css">
<link rel="stylesheet" href="stylesheets/skeleton.css">
<link rel="stylesheet" href="stylesheets/layout.css">
<link rel="stylesheet" href="stylesheets/fonts.css">
<link rel="stylesheet" href="stylesheets/flexslider.css">
<link rel="stylesheet" href="stylesheets/zebra_datepicker_metallic.css">
<link rel="stylesheet" href="stylesheets/mosaic.css">
<link rel="stylesheet" href="stylesheets/prettyPhoto.css">

<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Favicons -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>

<!-- Primary Page Layout --> 
<!-- Header -->
<header> 
  <!-- topBar -->
  <?php include('top_menu.php')?>
</header>
<?php

function genRandomString() {
$length =5;
$characters ='0123456789';
$string ='';
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
}
$hoteldata=mysql_fetch_assoc(mysql_query("select * from tbl_hotel"));

    include('connect.php');
	$msg='';
	if(isset($_POST['submitbooking']))
	{
	$pizza89orderid='B'.genRandomString(); 	
    $qry=mysql_query("INSERT INTO `tbl_userbooking` (`id`,`booking_id`, `user_roomtype`, `user_adults`, `user_children`, `user_date`, `user_roomprice`, `user_extraadults`, `user_extrachildren`, `user_quantity`, `user_bottle_billecart`, `user_roomcharge`, `user_extracharge`, `user_grandtotal`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_contact_no`, `user_promocode`, `user_purpose`, `user_organisation`, `user_address1`, `user_address2`, `user_city`, `user_state`, `user_country`, `user_postcode`, `user_cardtype`, `user_cardnumber`, `user_cardcvv`, `user_cardname`, `user_month_expiry`, `user_year_expiry`) VALUES (NULL,'$$pizza89orderid', '$_POST[user_roomtype]', '$_POST[user_adults]', '$_POST[user_children]', '$_POST[user_date]', '$_POST[user_roomprice]', '', '', '', '', '$_POST[user_roomcharge]', '$_POST[user_extracharge]', '$_POST[user_grandtotal]', '$_POST[user_firstname]', '$_POST[user_lastname]', '$_POST[user_email]', '$_POST[user_password]', '$_POST[user_contact_no]', '$_POST[user_promocode]', '$_POST[user_purpose]', '$_POST[user_organisation]', '$_POST[user_address1]', '$_POST[user_address2]', '$_POST[user_city]', '$_POST[user_state]', '$_POST[user_country]', '$_POST[user_postcode]', '$_POST[user_cardtype]', '', '', '', '', '')");
if($qry)
	   {
$to=$_POST['user_email'];
$subject ='Your Booking Details From '.ucwords($hoteldata['hotel_name']);
$from='info@phpexpertgroup.com';
$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Welcome To ".ucwords($hoteldata['hotel_name'])."</title>
</head>
<body style='margin: 0; padding: 0; font: 14px/18px Arial, serif;'>
<table align='center' width='100%' cellpadding='1' cellspacing='1' style='font-size:14px; color:#6853CC;'> 
 <tr><td><strong >Thankyou for Booking with me . Your Booking Details given beelow </strong></td></tr>
            <tr><th colspan='2'>Reservation Details</th></tr>
			<tr><td>Booking No.: </td><td>".$pizza89orderid."</td></tr>
           <tr><td>Room Type: </td><td>".$_POST['user_roomtype']."</td></tr>
           <tr><td>Adults: </td><td>".$_POST['user_adults']."</td></tr>
           <tr><td>Children: </td><td>".$_POST['user_children']."</td></tr>
           <tr><td>Date: </td><td>".$_POST['user_date']."</td></tr>
           <tr><td>Room Price: </td><td>".$_POST['user_grandtotal']."</td></tr>
           <tr><th colspan='2'>Guest Details</th></tr>
           <tr><td>First name: </td><td>".$_POST['user_firstname']."</td></tr>
           <tr><td>Last name: </td><td>".$_POST['user_lastname']."</td></tr>
           <tr><td>Email id: </td><td>".$_POST['user_email']."</td></tr>
           <tr><td>Password: </td><td>".$_POST['user_password']."</td></tr>
           <tr><td>Contact No: </td><td>".$_POST['user_contact_no']."</td></tr>
           <tr><td>Promo Code: </td><td>".$_POST['user_promocode']."</td></tr>
           <tr><td>Purpose of stay: </td><td>".$_POST['user_purpose']."</td></tr>
           <tr><td>Oraganisation: </td><td>".$_POST['user_organisation']."</td></tr>
           <tr><th colspan='2'>Additional Information</th></tr>
           <tr><td>Address1: </td><td>".$_POST['user_address1']."</td></tr>
           <tr><td>Address2: </td><td>".$_POST['user_address2']."</td></tr>
           <tr><td>City: </td><td>".$_POST['user_city']."</td></tr>
           <tr><td>State: </td><td>".$_POST['user_state']."</td></tr>
           <tr><td>Country: </td><td>".$_POST['user_country']."</td></tr>
           <tr><td>Post Code: </td><td>".$_POST['user_postcode']."</td></tr>
           <tr><th colspan='2'>Payment Information</th></tr>
           <tr><td>Payment Mode: </td><td>".$_POST['user_cardtype']."</td></tr>";
	$message .= "</table></body></html>";
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=windows-874\n";
	$headers .= "From: $from  \r\n" .
	$headers .= "X-Priority: 1\r\n"; 
	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "X-Mailer: Just My Server"; 
	mail($to, $subject, $message, $headers);
 header('Location:thanku.php'); 
		  
	    }
	else
	{
	      $msg="Pls try again";	
     }
	
	
	}
	
?>
<!--Insert value in demo table-->
<?php
     $qry2=mysql_query("INSERT INTO `tbl_demo` (`demo_id`, `from`, `to`, `ad`, `child`, `id`, `ip`, `sid`) VALUES (NULL, '$_GET[from]', '$_GET[to]', '$_GET[ad]', '$_GET[child]', '$_GET[id]', '$_GET[ip]', '$_GET[sid]')");

?>
<!-- end Header -->
<div class="wrapper"> 
  <!-- Header Image -->
  <div id="headerImage" class="remove-lineheight white">
    <div class="loading"><img src="images/photos/pageheader01.jpg" alt=""></div>
  </div>
  <!-- end Header Image --> 
</div>
<div class="wrapper"> 
  <!-- Breadcrumb -->
  <div id="breadcrumb" class="lightGray">
    <div class="container">
      <div class="sixteen columns">
        <ul>
          <li><a href="index.php">Home</a></li>      
          <li class="remove-bottom"><a href="#">Book A Room</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end Breadcrumb --> 
</div>
 <style  type="text/css">
		  #mytable {
	width: 700px;
	padding: 0;
	margin: 0;
}

caption {
	padding: 0 0 5px 0;
	width: 700px;	 
	font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	text-align: right;
}

th {
	font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #4f6b72;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;

	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #CAE8EA url(images/bg_header.jpg) no-repeat;
}

th.nobg {
	border-top: 0;
	border-left: 0;
	border-right: 1px solid #C1DAD7;
	background: none;
}

td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	padding: 6px 6px 6px 12px;
	color: #4f6b72;
}


td.alt {
	background: #F5FAFA;
	color: #797268;
}

th.spec {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #fff url(images/bullet1.gif) no-repeat;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
}

th.specalt {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa url(images/bullet2.gif) no-repeat;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #797268;
}
		  </style>
  <!--Validation Script-->
  <script type="text/javascript">
function uservalidation()
{
var chkStatus = true
if(document.getElementById('user_roomtype').value =="") 
{
document.getElementById("user_roomtype").style.background='#8C0000';
document.getElementById("user_roomtype").focus();
chkStatus = false;
}
else
document.getElementById('user_roomtype').style.color = "";
if(document.getElementById('user_adults').value =="") {
document.getElementById("user_adults").style.background='#8C0000';
document.getElementById("user_adults").focus();
chkStatus = false;
}
else
document.getElementById('user_adults').style.color = "";
if(document.getElementById('user_children').value =="") {
document.getElementById("user_children").style.background='#8C0000';
document.getElementById("user_children").focus();
chkStatus = false;
}
else
document.getElementById('user_children').style.color = "";
if(document.getElementById('user_firstname').value =="") {
document.getElementById("user_firstname").style.background='#8C0000';
document.getElementById("user_firstname").focus();
chkStatus = false;
}
else
document.getElementById('user_firstname').style.color = "";
if(document.getElementById('user_lastname').value =="") {
document.getElementById("user_lastname").style.background='#8C0000';
document.getElementById("user_lastname").focus();
chkStatus = false;
}
else
document.getElementById('user_lastname').style.color = "";
if(document.getElementById('user_email').value =="") {
document.getElementById("user_email").style.background='#8C0000';
document.getElementById("user_email").focus();
chkStatus = false;
}
else
document.getElementById('user_email').style.color = "";
if(document.getElementById('user_password').value =="") {
document.getElementById("user_password").style.background='#8C0000';
document.getElementById("user_password").focus();
chkStatus = false;
}
else
document.getElementById('user_password').style.color = "";
if(document.getElementById('user_contact_no').value =="") {
document.getElementById("user_contact_no").style.background='#8C0000';
document.getElementById("user_contact_no").focus();
chkStatus = false;
}
else
document.getElementById('user_contact_no').style.color = "";
if(document.getElementById('user_promocode').value =="") {
document.getElementById("user_promocode").style.background='#8C0000';
document.getElementById("user_promocode").focus();
chkStatus = false;
}
else
document.getElementById('user_promocode').style.color = "";
if(document.getElementById('user_purpose').value =="") {
document.getElementById("user_purpose").style.background='#8C0000';
document.getElementById("user_purpose").focus();
chkStatus = false;
}
else
document.getElementById('user_purpose').style.color = "";
if(document.getElementById('user_organisation').value =="") {
document.getElementById("user_organisation").style.background='#8C0000';
document.getElementById("user_organisation").focus();
chkStatus = false;
}
else
document.getElementById('user_organisation').style.color = "";
if(document.getElementById('user_address1').value =="") {
document.getElementById("user_address1").style.background='#8C0000';
document.getElementById("user_address1").focus();
chkStatus = false;
}
else
document.getElementById('user_address1').style.color = "";
if(document.getElementById('user_city').value =="") {
document.getElementById("user_city").style.background='#8C0000';
document.getElementById("user_city").focus();
chkStatus = false;
}
else
document.getElementById('user_city').style.color = "";
if(document.getElementById('user_state').value =="") {
document.getElementById("user_state").style.background='#8C0000';
document.getElementById("user_state").focus();
chkStatus = false;
}
else
document.getElementById('user_state').style.color = "";
if(document.getElementById('user_country').value =="") {
document.getElementById("user_country").style.background='#8C0000';
document.getElementById("user_country").focus();
chkStatus = false;
}
else
document.getElementById('user_country').style.color = "";
if(document.getElementById('user_postcode').value =="") {
document.getElementById("user_postcode").style.background='#8C0000';
document.getElementById("user_postcode").focus();
chkStatus = false;
}
else
document.getElementById('user_postcode').style.color = "";
if(document.getElementById('user_cardtype').value =="") {
document.getElementById("user_cardtype").style.background='#8C0000';
document.getElementById("user_cardtype").focus();
chkStatus = false;
}
else
document.getElementById('user_cardtype').style.color = "";
if(document.getElementById('user_cardnumber').value =="") {
document.getElementById("user_cardnumber").style.background='#8C0000';
document.getElementById("user_cardnumber").focus();
chkStatus = false;
}
else
document.getElementById('user_cardnumber').style.color = "";
if(document.getElementById('user_cardcvv').value =="") {
document.getElementById("user_cardcvv").style.background='#8C0000';
document.getElementById("user_cardcvv").focus();
chkStatus = false;
}
else
document.getElementById('user_cardcvv').style.color = "";
if(document.getElementById('user_cardname').value =="") {
document.getElementById("user_cardname").style.background='#8C0000';
document.getElementById("user_cardname").focus();
chkStatus = false;
}
else
document.getElementById('user_cardname').style.color = "";
if(document.getElementById('user_month_expiry').value =="") {
document.getElementById("user_month_expiry").style.background='#8C0000';
document.getElementById("user_month_expiry").focus();
chkStatus = false;
}
else 
document.getElementById('user_month_expiry').style.color = "";
if(document.getElementById('user_year_expiry').value =="") {
document.getElementById("user_year_expiry").style.background='#8C0000';
document.getElementById("user_year_expiry").focus();
chkStatus = false;
}

document.getElementById('terms').style.color = "";
return chkStatus;
}


function clearFieldValue(register)
{	
document.getElementById(register.id).style.background="#FFFFFF";
}

</script>	

<!-- Main -->
<?php 

$demodata=mysql_fetch_assoc(mysql_query("select * from tbl_demo where ip='".$_SERVER['REMOTE_ADDR']."'"));
//echo "select * from tbl_rooms where id='".$demodata['id']."'";
$qry1=mysql_query("select * from tbl_rooms where id='".$demodata['id']."'");?>
<div class="wrapper">
  <div id="main" class="white">
    <div class="container">
      <div class="sixteen columns">
      
        <p class="more-bottom">Choose room occupants and optional extras</p>
         <form id="" action="" method="post" onSubmit="return uservalidation();">
        <table class="zebra more-bottom"  style="width:950px;">
            <thead>
              <tr>
                <th></th>
                <th>Occupancy</th>
              
                <th>Date</th>
             
                <th>Room Price</th>
           <!--     <th>Extra Adult</th>
                <th>Extra Child	</th>
                <th>Total</th>
                -->
              </tr>
            </thead>
           
            <tbody>
              <tr class="odd">
                <td class="bold">Room 1</td>
                <td>
                <table width="100%" border="0" style="border:none;">
                <?php $data1=mysql_fetch_array($qry1);?>
  <tr>
    <td colspan="2" tyle="border:none;"> <input type="text" name="user_roomtype" value="<?php echo $data1['add_rooms_room_type'];?>" id="user_roomtype" onMouseOver="return clearFieldValue(this);" placeholder="Gust"></td>
   
  </tr>
  <tr>
    <td tyle="border:none;">
                   
                  <select style="width:100px;" name="user_adults" id="user_adults" onMouseOver="return clearFieldValue(this);">
                  <?php 
				   if($_GET['ad']=='')
				   {
				   ?>
              <option value="">Select</option>
              <option value="1"  <?php if($data1['add_rooms_adults']=="1"){ ?> selected="selected" <?php } ?>>1 Adults</option>
              <option value="2" <?php if($data1['add_rooms_adults']=="2"){ ?> selected="selected" <?php } ?>>2 Adults</option>
              <option value="3" <?php if($data1['add_rooms_adults']=="3"){ ?> selected="selected" <?php } ?>>3 Adults</option>
              <option value="4" <?php if($data1['add_rooms_adults']=="4"){ ?> selected="selected" <?php } ?>>4 Adults</option>
              <option value="5" <?php if($data1['add_rooms_adults']=="5"){ ?> selected="selected" <?php } ?>>5 Adults</option>
              <option value="6" <?php if($data1['add_rooms_adults']=="6"){ ?> selected="selected" <?php } ?>>6 Adults</option>
              <option value="7" <?php if($data1['add_rooms_adults']=="7"){ ?> selected="selected" <?php } ?>>7 Adults</option>
              <option value="8" <?php if($data1['add_rooms_adults']=="8"){ ?> selected="selected" <?php } ?>>8 Adults</option>
              <option value="9" <?php if($data1['add_rooms_adults']=="9"){ ?> selected="selected" <?php } ?>>9 Adults</option>
              <option value="10" <?php if($data1['add_rooms_adults']=="10"){ ?> selected="selected" <?php } ?>>10 Adults</option>
              	<?php } else {?>
                 <option value="<?php $_GET['ad']?>"><?php $_GET['ad']?></option><?php }?>
            </select>
            </td>
            
            
    <td tyle="border:none;">                 
    <select id="user_children" name="user_children" onMouseOver="return clearFieldValue(this);" style="width:100px;">
                 <?php 
				   if($_GET['child']=='')
				   {
				   ?>
              <option value="">Select</option>
              <option value="1" <?php if($data1['add_rooms_children']=="1"){ ?> selected="selected" <?php } ?>>1 childern</option>
              <option value="2" <?php if($data1['add_rooms_children']=="2"){ ?> selected="selected" <?php } ?>>2 childern</option>
              <option value="3" <?php if($data1['add_rooms_children']=="3"){ ?> selected="selected" <?php } ?>>3 childern</option>
              <option value="4" <?php if($data1['add_rooms_children']=="4"){ ?> selected="selected" <?php } ?>>4 childern</option>
              <option value="5" <?php if($data1['add_rooms_children']=="5"){ ?> selected="selected" <?php } ?>>5 childern</option>
              <option value="6" <?php if($data1['add_rooms_children']=="6"){ ?> selected="selected" <?php } ?>>6 childern</option>
              <option value="7" <?php if($data1['add_rooms_children']=="7"){ ?> selected="selected" <?php } ?>>7 childern</option>
              <option value="8" <?php if($data1['add_rooms_children']=="8"){ ?> selected="selected" <?php } ?>>8 childern</option>
              <option value="9" <?php if($data1['add_rooms_children']=="9"){ ?> selected="selected" <?php } ?>>9 childern</option>
              <option value="10" <?php if($data1['add_rooms_children']=="10"){ ?> selected="selected" <?php } ?>>10 childern</option>
              <?php } else {?>
              <option value="<?php $_GET['child']?>"><?php $_GET['child']?></option><?php }?>
            </select></td>
  </tr>
</table>

                
               
            
                </td>
                 <td class="">
                <?php $date = $_GET['from'];
	// End date
	$val=0;
	$end_date = $_GET['to'];
 $dt='';
	while (strtotime($date) < strtotime($end_date)) {
		 ?>
                <?php $val++;?> 
                       
                <?php echo "$date"."<br>";
				
				$dt .=$date.',';
		$date = date ("M-d", strtotime("+1 day", strtotime($date)));
				?>
            
				<?php }?>
                  <input type="hidden" name="user_date" id="user_date" value='<?php echo $dt; ?>'>
               </td>
                <td><?php for($i=1;$i<=$val;$i++){?>N <?php echo number_format($data1['default_price'],2); 
				$rs='';
				$rs .=number_format($data1['default_price'],2);
				?> <br><?php }?></td>
				<input type="hidden" name="user_roomprice" id="user_roomprice" value='<?php echo $rs;?>'>
                <!--<td>N0.00</td>
                 <td>N0.00</td>
                <td>N33.00</td>
               -->
              </tr>
              
              
                <tr class="odd">
                <td colspan="2"  ></td>
               
                <td></td>
              
                <td>N <?php echo number_format($data1['default_price']*$val,2) ?></td>
                <!--<td>N0.00</td>
                 <td>N0.00</td>
                <td>N33.00</td>-->
               
              </tr>
              <!-- <tr><td colspan="7" style="border:none;"><p><strong style="font-size:14px; font-weight:bold;">Extras available for this room</strong></p></td></tr>-->
               
               
            </tbody>
          </table>
          <!--<table cellpadding="0" cellspacing="0" style="width:950px;" >
           <tr><td  style="border:none;"><input type="checkbox" name="user_bottle_billecart" id="user_bottle_billecart">Bottle Billecart-Salmon Brut Reserve </td>
           <td  style="border:none;"><input type="text" name="user_quantity" id="user_quantity" style="width:50px;" placeholder="quantity "></td>
           
           <td  style="border:none;" title="Bottle of Billecart-Salmon Brut Reserve">Bottle of Billecart-Salmon Brut Reserve</td>
           
           <td  style="border:none;">N145 per booking</td>
           
           <td  style="border:none;">N 89.00</td>
           
           </tr>
              
          </table>-->
          
           <table cellpadding="0" cellspacing="0" style="width:950px;" >
           <tr><td  style="border:none;"><strong>Total</strong></td>
           <td  style="border:none;" align="right"><strong style="color:#4A9595; font-size:16px;">Room Charge :&nbsp;&nbsp; N <?php echo number_format($data1['default_price']*$val,2) ?></strong>
           <input type="hidden" name="user_roomcharge" id="user_roomcharge" value="N <?php echo number_format($data1['default_price']*$val,2); ?>">
           </td>
           
           </tr>
              <tr>
           <td  style="border:none;"  colspan="2"align="right"><strong style="color:#4A9595; font-size:16px;">Extra Charge : &nbsp;&nbsp; N 0.00</strong>
           <input type="hidden" name="user_extracharge" id="user_extracharge" value="N">
           </td>
           </tr>
            <tr>
           <td  style="border:none;"  colspan="2"align="right"><hr></td>
           </tr>
           
             <tr>
           <td  style="border:none;"  colspan="2"align="right"><strong style="color:#A40000; font-size:16px;">Grand Total : &nbsp;&nbsp; N <?php echo number_format($data1['default_price']*$val,2) ?></strong>
           <input type="hidden" name="user_grandtotal" id="user_grandtotal" value="N <?php echo number_format($data1['default_price']*$val,2); ?>"> 
           </td>
           </tr>
              
          </table>
      </div>
     
        <div class="one-third column">
          <h4 class="add-bottom">Guest Details</h4>
          <div class="box">
            <label for="firstname">First Name</label>
            <input type="text" id="user_firstname" name="user_firstname" class="required" onMouseOver="return clearFieldValue(this);" />
            <label for="lastname">Last Name</label>
            <input type="text" id="user_lastname" name="user_lastname" class="required" onMouseOver="return clearFieldValue(this);" />
            <label for="email">Email Address</label>
            <input type="text" id="user_email" name="user_email" class="required" onMouseOver="return clearFieldValue(this);" />
              <label for="email">Password</label>
            <input type="password" id="user_password" name="user_password" class="required" onMouseOver="return clearFieldValue(this);" />
            <label for="phone">Contact Phone Number</label>
            <input type="text" id="user_contact_no" name="user_contact_no" class="required" onMouseOver="return clearFieldValue(this);"/>
            <label for="promo">Promo Code</label>
            <input id="user_promocode" name="user_promocode" type="text" onMouseOver="return clearFieldValue(this);"/>
             <label for="purpose">Purpose of Stay</label>
            <input id="user_purpose" name="user_purpose" type="text" onMouseOver="return clearFieldValue(this);"/>
             <label for="purpose">Organization</label>
            <input id="user_organisation" name="user_organisation" type="text" onMouseOver="return clearFieldValue(this);"/>
          </div>
        </div>
        <div class="one-third column">
          <h4 class="add-bottom">Additional Information</h4>
          <div class="box">
          
            <label for="traveldetails">Address 1</label>
            <textarea id="user_address1" name="user_address1" onMouseOver="return clearFieldValue(this);"></textarea>
            <label for="traveldetails">Address 2</label>
            <textarea id="user_address2" name="user_address2"></textarea>
            <label for="adults">City</label>
            <input id="user_city" name="user_city" type="text" class="required" onMouseOver="return clearFieldValue(this);"/>
            <label for="children">State</label>
            <input id="user_state" name="user_state" type="text" onMouseOver="return clearFieldValue(this);"/>
             <label for="children">Country</label>
            <input id="user_country" name="user_country" type="text" onMouseOver="return clearFieldValue(this);"/>
            
             <label for="children">Postcode</label>
            <input id="user_postcode" name="user_postcode" type="text" onMouseOver="return clearFieldValue(this);"/>
          </div>
        </div>
        <div class="one-third column">
          <h4 class="add-bottom">Payment Information</h4>
          <div class="box">
          <table><tr>
           <td align="center"><input type="radio" name="user_cardtype" id="user_cardtype" value="money" checked="checked"/><br /><img src="paymentmethod/Money.png" style="height:70px;"/></td>
           <td align="center"><input type="radio" name="user_cardtype" id="user_cardtype" value="payment" ><br /><img src="paymentmethod/paypalstraigh.png" /></td>
           
           </tr></table>

           
           
            <label for="terms" class="add-bottom">
                  
            <br>
              <input type="checkbox" name="terms" value="terms" id="terms" checked>
              <span>I accept the booking <a href="#">terms & conditions</a></span> </label>
            <input type="submit" value="Submit Now" id="checkAvailability" name="submitbooking" class="button">
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- end Main --> 
  <!-- Bottom -->
  <?php 
  $deldemo=mysql_query("delete from tbl_demo where ip='".$_SERVER['REMOTE_ADDR']."'");

  ?>
 <?php include('footer.php');?>
<!-- End Document --> 

<!-- Java Scripts --> 
<script src="javascripts/jquery-1.8.3.min.js"></script> 
<script src="javascripts/jquery.zweatherfeed.js"></script> 
<script src="javascripts/jquery.flexslider-min.js"></script> 
<script src="javascripts/zebra_datepicker.js"></script> 
<script src="javascripts/jquery.validate.min.js"></script> 
<script src="javascripts/jquery.prettyPhoto.js"></script> 
<script src="javascripts/mosaic.1.0.1.min.js"></script> 
<script src="javascripts/jquery.fittext.js"></script> 
<script src="javascripts/common.js"></script> 

</body>

</html>