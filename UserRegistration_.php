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
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
if(isset($_POST['RegisterSubmitname']))
{
$QueryConnetc="SELECT * FROM  `tbl_user` where user_email='".$_POST['user_email']."' ";
$QuerySub=mysql_query($QueryConnetc);
$numData=$db->num_rows($QuerySub);
if($numData>0)
{
$error=$TableLanguage['SignupErrormsg'];
}
else
{
$joinDate=date("Y-m-d");
 @$UserRegistrationData=array("user_name"=>mysql_real_escape_string($_POST['user_name']),"user_email"=>$_POST['user_email'],"user_pass"=>$_POST['user_pass'],"offerWant"=>$_POST['offerWant'],"input_date"=>date('jS F Y'),"ip"=>$_SERVER['REMOTE_ADDR'],"joinDate"=>$joinDate);
 if($_POST['offerWant']=='Yes')
{
 @$UserRegistrationDataNews=array("subscribe_email"=>$_POST['user_email'],"subscribe_date"=>date('jS F Y'),"subscribe_ip"=>$_SERVER['REMOTE_ADDR']);
 $CuisineInsert2=$dbObj->dataInsert($UserRegistrationDataNews,"tbl_newselleterSubscribe");
}
$CuisineInsert=$dbObj->dataInsert($UserRegistrationData,"tbl_user");

if($CuisineInsert)
{
$to=$_POST['user_email'].','.$RegistrationDataLoginVal['registrationemail'];
$subject ='Welcome you to registered on '.$AdminDataLoginVal['website_name'].'';
$from=$RegistrationDataLoginVal['registrationemail'];
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
<h2 style='color:#000066;margin-left:10px; margin-top:10px;'>Hi ".ucwords($_POST['user_name'])." !</h2>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to welcome you to registered on ".$AdminDataLoginVal['website_name']."</p>
                       
<div style='padding:10px; color:#CA0000; font-size:18px; margin-left:50px;'>Your Account has been successfully created  ! please check your login detail below</div>
<table width='36%' align='center' style='padding:10px;'>
  <tr>
    <td><strong>Login ID </strong></td>
    <td>:</td>
    <td>".$_POST['user_email']."</td>
  </tr>
  <tr>
    <td><strong>Password </strong></td>
     <td>:</td>
    <td>".$_POST['user_pass']."</td>
  </tr>
</table>

<div style='padding:10px; color:#ff6156; font-size:18px;'>Click Here to login your control panel <a href='".$DomainName."userLogin.php'>Login Here</a></div>
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
$msg=$TableLanguage['SignupSuccessmsg'];
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
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
<div id="contentwrapper" style="padding-top:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
    <div class="midcontainer" style="width:100%; min-height:420px; margin:auto; padding-bottom:15px;">
      <div id="content">
        <div class="cms">
          <div class="login">
            <h2 style="margin-bottom:10px;color:#E51B24;"><font><font><?php echo $TableLanguage7['createAccountTExt'];?> </font></font><br>
            </h2>
            <div class="desc">
              <?php if($msg!=''){ ?>
              <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
              <?php } ?>
              <?php if($error!=''){ ?>
              <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
              <?php } ?>
            </div>
            <form class="register" name="loginform" id="loginform" method="post" onsubmit="return emailvalidation();">
              <div class="formrow"> <span class="formtitle" id="spnloginemail"><font><font><?php echo $TableLanguage5['ResFormFieldNameText'];?>:</font></font></span>
                <input type="text" class="txtinput" required  value="" name="user_name" id="user_name" tabindex="1"  style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
              </div>
              <div class="formrow"> <span class="formtitle" id="spnloginemail"><font><font><?php echo $TableLanguage5['ResFormFieldEmailText'];?>:</font></font></span>
                <input type="email" class="txtinput" required name="user_email" value="" id="user_email" tabindex="1"  style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
              </div>
              <div class="formrow"> <span class="formtitle" id="spnloginpassword"><font><font><?php echo $TableLanguage5['ResFormFieldPasswordText'];?> </font></font> <font><font> :</font></font></span>
                <input type="password" required class="txtinput" name="user_pass" tabindex="2" value="" id="user_pass"  style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
              </div>
              <div class="formrow"> <span class="formtitle" id="spnloginpassword"><font><font><?php echo $TableLanguage7['cPasswordText'];?> </font></font> <font><font> :</font></font></span>
                <input type="password" required class="txtinput" name="loginpassword" tabindex="2" value="" id="loginpassword"  style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
              </div>
              <div class="formrow">
                <input type="checkbox" tabindex="3"name="offerWant" value="Yes" required style="margin-top:5px;">
                <label for="remember"><font><font><?php echo $TableLanguage7['iwanttoreviewoffer'];?></font></font></label>
              </div>
              <div class="formrow">
                <input id="submit" name="RegisterSubmitname" class="" type="submit" tabindex="4" value="<?php echo $TableLanguage7['createAccountTExt'];?>" align="middle">
              </div>
              <!--<div id="fbk"><fb:login-button></fb:login-button ></div>
-->
              <div class="clear"></div>
              <!--<div class="formrow">
</div>-->
              <div class="clear"></div>
            </form>
            <div class="adv">
              <h3><font><font>Choose simple way. </font><font>Create an Account:</font></font></h3>
              <ul class="check">
                <li><font><font>Place your order easier, your data is stored </font></font></li>
                <li><font><font>Benefit from discounts and special offers </font></font></li>
                <li><font><font>You can store multiple shipping addresses</font></font></li>
                <li><font><font> You have a list of favorite restaurants</font></font></li>
                <li><font><font>View your order history </font></font></li>
                <li><font><font>Provides restaurant ratings and leave comments </font></font></li>
              </ul>
              <a href="#" class="button-large gmail"><font><font>Connect with Gmail </font></font></a>
	   	    <span id="sau"><font><font>or </font></font></span>
       <a href="#" class="button-large fb facebook-login"><font><font>Connect with Facebook</font></font></a> 
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <!--content container ends-->
</div>
<!--contentwrapper Ends-->
<a href="#" class="go-top" style="color:#ffffff;"><?php echo $TableLanguage1['BackToTopText'];?></a>
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
