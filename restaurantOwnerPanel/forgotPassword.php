<?php 
ob_start();
session_start();
include('route/config1.php'); ?>
<?php
	include('../control/domainName.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
extract($_POST);
if(isset($_POST["SubmitLogin"]))
{
$q ="SELECT * FROM  `tbl_restaurantOwner` where restaurant_OwnerLoginId='".$restaurant_OwnerLoginId."' or restaurant_id='".$restaurant_OwnerLoginId."' and status='0'";
$query = mysql_query($q)or die(mysql_error());
$num_rows=mysql_num_rows($query);
$result=mysql_fetch_array($query);
if($num_rows>0){
$to=$_POST['user_email'];
$subject ='Forgot Password for Restaurant Owner Panel at '.$AdminDataLoginVal['website_name'].'';
$from='info@phpexpertgroup.com';
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
                              <td width='253' style='padding:10px'><a href='".$DomainName."' target='_blank'><img  alt='".$AdminDataLoginVal['website_name']." Online Food Ordering' src='".$DomainName."/control/sitelogo/".$AdminDataLoginVal['website_logo']."' width='140' height='90'  ></a></td> 
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
<h2 style='color:#000066;margin-left:10px; margin-top:10px;'>Hi ".ucwords($result['restaurant_OwnerFirstName'])." ".ucwords($result['restaurant_OwnerLastName'])." !</h2>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to welcome you to forgot password on ".$AdminDataLoginVal['website_name']." Online Food Ordering</p>
                       
<div style='padding:10px; color:#CA0000; font-size:18px; margin-left:50px;'>Please Check your Password and login detail below</div>
<table width='36%' align='center' style='padding:10px;'>
  <tr>
    <td><strong>Login ID </strong></td>
    <td>:</td>
    <td>".$result['restaurant_OwnerLoginId']."</td>
  </tr>
  <tr>
    <td><strong>Password </strong></td>
     <td>:</td>
    <td>".$result['restaurant_OwnerLoginPassword']."</td>
  </tr>
</table>

<div style='padding:10px; color:#ff6156; font-size:18px;'>Click Here to login your control panel <a href='".$DomainName."restaurantOwnerPanel/index.php'>Login Here</a></div>
</td>
                    </tr>
                    
                   
                                
             </table>       
  

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
header("location:index.php");
exit;
}
else
{
$error=1;
}
}





$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $AdminDataLoginVal['website_name'];?> | Restaurant Owner Panel </title>
<link href="oneColElsCtrHdr.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tst{
background:url(images.jpg);
	margin-top:110px;
   width:500px;
    margin-left:50px;
    margin-bottom:100px;
    /*background:#fff;*/
	border-radius:8px;
	height:350px; 
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	box-shadow:0 20px 10px -10px rgba(0,0,0,0.2);
}
.photo{
background: url(image/secrecy-32.png) no-repeat;
background-position:1px  1px;
background-size:20px 20px;
padding-left:30px;
z-index:1000px;
}
#content {
	/*background: #bd0a22;*/
	border: 0px solid #BD0A22;
	position: relative;
	text-align: center;
	width: 400px;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	padding-top: 25px;
	padding-right: 0;
	padding-bottom: 0;
	padding-left: 0;
	background-position: top;
}
.btn-purple4.btn-gradient {

    background-color: red;
}
.btn-gradient:hover {
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.45) 1%, rgba(255, 255, 255, 0.15) 100%);
}
.btn:hover {
    color: rgb(255, 255, 255);
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.13) 1%, rgba(255, 255, 255, 0.13) 100%);
}
.btn:focus {
    color: rgb(255, 255, 255);
}
.btn:hover, .btn:focus {
    color: rgb(255,255, 255);
    text-decoration: none;
}
.btn:focus {
    outline: thin dotted;
    outline-offset: -2px;
}
.btn-purple4 {
	background-color: #FFFFFF;
}
.btn-gradient {
    background-repeat: repeat-x;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
    border-color: rgba(0, 0, 0, 0.07) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.18);
    box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2) inset;
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3) 1%, rgba(255, 255, 255, 0.15) 100%);
}
.btn {
    color: rgb(255, 255, 255);
    outline: medium none;
    line-height: 1.47;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    -moz-user-select: none;
}
h1{
color:#fff;}
.txt{
background: url(image/secrecy-32.png) no-repeat;}
p{
font-family:"Times New Roman", Times, serif;
font-size:14px;
color:#fff;}

#content form input[type="text"],
#content form input[type="password"]
 {	
 background: url("http://cssdeck.com/uploads/media/items/8/8bcLQqF.png") no-repeat scroll 0 0 #EAE7E7;
	color: #777;
	font: 13px Helvetica, Arial, sans-serif;
	margin: 0 0 50px;
	padding: 15px 10px 15px 40px;
	width: 80%;
}
</style>
</head>


<body class="oneColElsCtrHdr">

<div id="container">
  <div id="header">
   <table width="100%" border="0">
  <tr>
    
    <td align="center">  <div id="home_middle">
      
       <h1 style="float:left; font-family: sans-serif; margin-left:300px;">Welcome! Restaurant Owner</h1>
      </div></td>
  </tr>
</table>

 
  <!-- end #header --></div>
  <div id="mainContent">
    <div class="tst" >
    <div >
    <div style=" margin-top:50px; margin-left:">
    <section id="content">
    		<form action="" method="post">
			<h1>Forgot Password</h1>
          <?php if($error!=''){ ?>
          <div style="padding:2px; color:#B90000; margin-bottom:5px; font-size:14px;">Sorry ! Your Email Address is incorrect try again</div>
          <?php } ?>
			<div>
				<input type="text" placeholder="Enter Your Restaurant ID or User Name" value="" required name="restaurant_OwnerLoginId" id="restaurant_OwnerLoginId" />
			</div>
            <div>
				<input type="email" placeholder="Enter Your Valid Email Address" value="" required name="user_email" id="user_email" style="background:#EAE7E7;
color: #777;
font: 13px Helvetica, Arial, sans-serif;
margin: 0 0 50px;
padding: 15px 10px 15px 40px;
width: 80%;" />
			</div>
			
			<div>
				<input class="btn btn-purple4 btn-gradient" type="submit" name="SubmitLogin" value="Forgot Password">


</button>
				<a href="index.php" style="color:#FFFFFF;">Login Here?</a>			</div>
		</form>
    		<!-- form -->
		<div class="button">
		
		</div><!-- button -->
	</section></div></div></div>
   
  

	<!-- end #mainContent --></div>
 
  <div id="footer" style="margin-top:110px;">
     <div style="color:#FFFFFF; margin-left:15px; float:left; padding-top:15px; font-size:14px;"><a  href="<?php  echo $DomainName;?>" style="color: white; float:left; text-decoration:none;">Powered by <?php echo $AdminDataLoginVal['website_name'];?> </a></div>
<div style="color:#FFFFFF; margin-right:29px; float:right;padding-top:15px;font-size:14px; "><a href="http://megamenus.net/" target="_blank" style="color:#FFFFFF; text-decoration:none;">MegaMenus - 2015 All Rights Reserved </a> </div>
    <!-- end #footer --></div>
   
<!-- end #container --></div>
</body>
</html>
