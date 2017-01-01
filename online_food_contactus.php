<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('route/db.php'); 
$dbObj=new db;
include('domainName.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'");
date_default_timezone_set('US/Eastern'); 
$AboutData=mysql_fetch_assoc(mysql_query("select * from tbl_Desclaimer"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
extract($_POST);
if(isset($_POST['SubmitContactUs'])){
$ProductServiceInter=array("contact_name"=>mysql_real_escape_string($_POST['contact_name']),"contact_email"=>$_POST['contact_email'],"contact_message"=>mysql_real_escape_string($_POST['contact_message']),"contact_ip"=>$_SERVER['REMOTE_ADDR'],"created_date"=>date('m/d/Y'));
$CuisineInsert=$dbObj->dataInsert($ProductServiceInter,"tbl_onlineContact");
if($CuisineInsert)
{
$subject ='Thankyou for Contacting with '.$AdminDataLoginVal['website_name'].' Online Food Ordering';
$to=$_POST['contact_email'];
$from=$RegistrationDataLoginVal['contactusemail'];
$message="<table bgcolor='#dfdfdf' width='100%' style='float:left;background-color:rgb(223,223,223);font-family:Arial,'sans serif''> 
  <tbody> 
    <tr> 
      <td align='center'> 
        <table border='0' cellpadding='0' cellspacing='0'> 
          <tbody> 
            <tr> 
              <td colspan='2' height='359' valign='top'><img alt='' src='https://ci3.googleusercontent.com/proxy/oqgjYIFndtWMaU6BmYk2yKMjRDsaL5wbQPL_Hh3ARVE6_TOpMJ3q3n54Brllrzr41gpnnPVV1-ixogBC2CVmfylAf8HaGw6pVrhVSBrJjk4GxAWHW0RDquP7RxO2yyLpF1qllCb0WtkQ7H_eA24CQmS3tYM=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-left.png'></td> 
              <td rowspan='2'> 
                <table border='0' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td bgcolor='' style='background-image:url(https://ci3.googleusercontent.com/proxy/ULCRAiwWL9iHiPYUTWZkzsldvOF8xAcaH1NnHMCo4fOBSZmZlQafsxfMJWRIX-xpEnU_qjE4LNN2JsFKONWeijp-EeZCQ9GVERwqf44jtGjXUBQV2T_qgggzVHwuePTJY20ViGwa5EePhpstWNE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/header_bg.jpg);background-repeat:repeat no-repeat'> 
                        <table valign='middle' cellpadding='0' cellspacing='0' width='100%'> 
                          <tbody> 
                            <tr> 
                              <td width='12'></td> 
                              <td width='253' style='padding:10px'><a href='' target='_blank'><img src='".$DomainName."control/sitelogo/sitelogosmall/".$AdminDataLoginVal['website_logo']."' width='130' height='100'></a></td> 
                              <td align='right' width='453' style='color:rgb(102,102,102);font-size:12px;font-family:Arial,'sans serif';padding-right:15px'>&nbsp;</td> 
                            </tr> 
                          </tbody> 
                        </table></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#c32c2c' height='6'></td> 
                    </tr> 
                  </tbody> 
                </table> 
                <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td style='font-family:'Trebuchet MS',Arial,Helvetica,sans-serif;font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'>     
                <table cellpadding='0' cellspacing='0' width='730'>
                  <tbody>

                   <tr>
                          <td > 
<h2 style='color:#000066;margin-left:10px; margin-top:10px;'>Hi ".ucwords($_POST['contact_name'])." !</h2>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Thankyou for Contacting with ".$AdminDataLoginVal['website_name']." Online Food Ordering</p>
                       
<div style='padding:10px; color:#CA0000; font-size:18px; margin-left:50px;'> please check your message detail below</div>
<table width='36%' align='center' style='padding:10px;'>
  <tr>
    <td><strong>Message </strong></td>
    <td>:</td>
    <td>".$_POST['contact_message']."</td>
  </tr>
 
</table>

</td>
                    </tr>
                    
                   
                                
             </table>       
  

                       </td> 
                    </tr> 
                   
                       </td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'>&nbsp;</td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>Thank you for your preference.</td> 
                    </tr>
					 <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>".$AdminDataLoginVal['website_name']." Team</td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'><a style='color:#ed6c2b' href='' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a></td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#C1272D' height='10'></td> 
                    </tr> 
                  </tbody> 
                </table></td> 
              <td colspan='2' valign='top'><img alt='' style='margin-top:1px' src='https://ci6.googleusercontent.com/proxy/8o1ccbZ7ctJxK1VN4zNIxlWON_rkJswBHm6DzxefVm-_VSzj9QPFhRMbpnLl2K53YvrCXyuvok0vrS6cV3RfcihRmWQlG3YSbM63MuIfpr7r4nTsSrN68-uEEw1yRlju_Ov5ZghGFjY9C2mGLuNV36XI-Oh4=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-right.png'></td> 
            </tr> 
            <tr> 
              <td>&nbsp;</td> 
              <td background='https://ci4.googleusercontent.com/proxy/EZYYeK4w2asNVCcbD8wkliiy7Ulzcci_sqRnKSnJ7gNSYlE4AqAvpw_mM4gjxuC_6i4c6DwJukWOpT_yWblEwr6f6OpbRr2aqz_MffQ_j4T0revCtSl9IbBYXmi8e8IvqC74uJ0IeL141s4DRBajug=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-left.png' width='4'></td> 
              <td background='https://ci4.googleusercontent.com/proxy/fMGLYGaSXBcqpb_4i_0NpDT6OwB1EmhPO0VBXxU4tifv6KxhPAc1Tu_vDL5zztDKjkM6iFsXefxLWpLfXP-RvBEB1YBmRtIfT2bj9iIQRyA8g4GBUYk8qH905Gt51p4TIoNbOO7CyfKJqiXoU6dgKmE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-right.png' width='4'></td> 
              <td>&nbsp;</td> 
            </tr> 
            <tr> 
              <td colspan='2'></td> 
              <td><img alt='' src='https://ci6.googleusercontent.com/proxy/E3iNizj4AUWYxz8t1e9PUopNYgAoddNQraaIHCPJ56eP0Cq56k8daz74Y6Gv7xWplalG0fIJwtVc0csoezk3Cgi89cQJofg6Se7I1Hg7zLd0_V5lG91FUKa23Sg5CMsqKTFCpOeYONBs0QtglyAtjMFC=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-bottom.png'></td> 
              <td colspan='2'></td> 
            </tr> 
          </tbody> 
        </table></td> 
    </tr> 
    <tr> 
      <td height='40'></td> 
    </tr> 
  </tbody> 
</table><div class='yj6qo'></div><div class='adL'>
</div></div>";
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=UTF-8\n";
	$headers .= "From: $from  \r\n" .
	$headers .= "X-Priority: 1\r\n"; 
	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "X-Mailer: Just My Server"; 
	mail($to, $subject, $message, $headers);
$msg="Thankyou for Contacting with Justfood Online Food Ordering !";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>  | Online Food Ordering | Developed by Php Expert Group at Ghaziabad | Uttar Pradesh | India  !</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($AboutData['content_KeywordMeta'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($AboutData['content_DescriptionMeta'])); ?>"
/>
	<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<link href="css/myaccount.css" type="text/css" rel="stylesheet" />
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 
 <!--jscript for back to top-->
<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>  
    
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>


<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px; padding-bottom:1px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
<div class="about00" style="background:none; box-shadow: 0 0 0 0 #C3BFBF; border:none;">
                     <h3 style="line-height:0; margin-top:20px;padding: 20px 0; margin-bottom:20px;">Contact Us</h3>
                <div style="font-family: CANDARA;font-size: 15px;color: #333333;margin: 0 0 10px;">
               <?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
                <table width="100%" border="0">
  <tr>
    <td><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
          <div id="map" style="height:236px; width:710px; margin-right:10px; border: 1px solid #979797;"></div>
          <span id="mapid">
          <script type="text/javascript">

// Define the address we want to map.
var address = "<?php echo ucwords($AdminDataLoginVal['website_Address']); ?>,<?php echo ucwords($AdminDataLoginVal['website_Zipcode']); ?> <?php echo ucwords($AdminDataLoginVal['website_City']); ?>,<?php echo ucwords($AdminDataLoginVal['website_Country']); ?>";

// Create a new Geocoder
var geocoder = new google.maps.Geocoder();

// Locate the address using the Geocoder.
geocoder.geocode( { "address": address }, function(results, status) {

  // If the Geocoding was successful
  if (status == google.maps.GeocoderStatus.OK) {

    // Create a Google Map at the latitude/longitude returned by the Geocoder.
    var myOptions = {
      zoom: 9,
      center: results[0].geometry.location,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	
    var map = new google.maps.Map(document.getElementById("map"), myOptions);

    // Add a marker at the address.
    var marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location
    });

  } else {
    try {
      console.error("Geocode was not successful for the following reason: " + status);
    } catch(e) {}
  }
});
</script>

<br /><h2>Show your Interest</h2>
<form action="" name="" method="post">
<table width="80%" style="margin:2%;">
<tbody><tr>
<td width="25%" height="37">Name <span style="color:#FF0000;">*</span></td>
<td width="75%"><input type="text" name="contact_name" id="contact_name" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="38">Email <span style="color:#FF0000;">*</span></td>
<td width="75%"><input type="email" name="contact_email" id="contact_email" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="97">Message <span style="color:#FF0000;">*</span></td>
<td width="75%">
<textarea name="contact_message" id="contact_message" maxlength="" class="contact_input" required style="height:80px;" ></textarea>
</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Send Message" name="SubmitContactUs" align="right" class="sub_btn" style="color: #fff;
border: solid 1px #C6121B;
background: #C6121B;
font-family: Arial, Helvetica, sans-serif;
font-size: 15px;
height: 29px;
cursor:pointer;
border-radius: 3px;
padding: 0px 41px 0px 41px;
text-transform: uppercase;
-webkit-box-shadow: inset 0px 1px 0px rgba(255,255,255,.5), 0px 1px 2px rgba(0,0,0,.3);
-moz-box-shadow: inset 0px 1px 0px rgba(255,255,255,.5), 0px 1px 2px rgba(0,0,0,.3);
box-shadow: inset 0px 1px 0px rgba(255,255,255,.5), 0px 1px 2px rgba(0,0,0,.3);"></td>
</tr>
</tbody></table>
</form>
</td>
    <td>&nbsp;</td>
    <td valign="top"><h3 id="showmenu" class="whistle-title" style="background: none repeat scroll 0 0 #C6121B;color: #616060; font-size:16px; line-height: 28px;padding: 6px 10px 8px 10px; color: #FFF; border: 1px solid #7B421F; width:300px;">
            Contact Us			
            </h3>
            
            <div id="menu" class="whistle-content" style="padding: 2px 0px 14px 25px;
color: #080808;
border: 1px solid #E5E1E1;
width: 300px;">
              <p><strong><span style="line-height: 1.5em; color:#000000">
             <?php echo ucwords($AdminDataLoginVal['website_name']); ?>  
              </span></strong></p>
                <div>
	 <?php echo ucwords($AdminDataLoginVal['website_Address']); ?>,</div>

<div>
	 <?php echo ucwords($AdminDataLoginVal['website_Zipcode']); ?>  <?php echo ucwords($AdminDataLoginVal['website_City']); ?></div>
<div>
	 <?php echo ucwords($AdminDataLoginVal['website_Country']); ?>.</div>
          
              <p style="font-family: CANDARA;font-size: 15px;color: #333333;margin: 0 0 10px;"><strong style="margin-right:23px;color:#000000">Tel</strong>
               <?php echo ucwords($AdminDataLoginVal['website_ContactPhone']); ?>               <br>
                <strong style="margin-right:18px;color:#000000">Fax</strong>
               <?php echo ucwords($AdminDataLoginVal['website_ContactPhone']); ?>              <br>
                <strong style="margin-right:7px;">Email</strong> <a href="mailto:<?php echo $AdminDataLoginVal['website_ContactEmail']; ?>"><?php echo $AdminDataLoginVal['website_ContactEmail']; ?></a></p>
                </div>
            </td>
  </tr>
</table>




                </div>
                
          
          
          
    


</div>
   
 </div>
  <!--content container ends-->
  
</div>
<!--contentwrapper Ends-->
<a href="#" class="go-top" style="color:#ffffff;">Back to Top</a>

	<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>

<!--footer wrapper starts-->
<?php include('route/Footer.php'); ?>


<!--footer wrapper ends-->

<script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<!--<script src="js/search/app.js"></script>-->
<script src="js/search/app.js" type="text/javascript"></script>
<script src="js/search/jquery.lockfixed.js"></script>
</body>
</html>
