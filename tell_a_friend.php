<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
include('route/db.php'); 
$dbObj=new db;
include('domainName.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
include('generateTimeCalculation.php');
if($_SESSION['justfoodsUserID']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}
if(isset($_POST['sendmailSubmit']))
{
@$DataUserUpdate=array("content"=>mysql_real_escape_string($_POST['content']),"Friendemailaddress"=>$_POST['Friendemailaddress'],"FriendName"=>mysql_real_escape_string($_POST['FriendName']),"created_date"=>date('m/d/Y'),"ip"=>$_SERVER['REMOTE_ADDR']);
$CuisineInsert=$dbObj->dataInsert($DataUserUpdate,"tbl_tellafriend");
$to=$_POST['Friendemailaddress'];
$subject ='Your Friend is send message from '.$AdminDataLoginVal['website_name'].'';
$from=$UserAddressData['user_email'].','.$RegistrationDataLoginVal['contactusemail'];
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
<h2 style='color:#000066; margin-left:10px; margin-top:10px;'>Hi ".$_POST['FriendName']." !</h2>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Your Friend ".$_SESSION['justfoodsUserName']." is shared best service provider for Online Food Ordering</p>
                       
<div style='padding:10px; color:#CA0000; font-size:18px; margin-left:50px;'>".$_POST['content']."</div>
<div style='padding:10px; color:#ff6156; font-size:18px;'><a href='".$DomainName."'> Click Here </a> to visit your friend request</a></div>
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
$msg="Your e-mail will be sent to the address you given!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account | Developed by Php Expert Group</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <link href="css/myaccount.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <link type="text/css" href="translateelement.css" rel="stylesheet" />
<?php include("route/TopHeader.php"); ?>  <!--header ends-->
</div>


<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px;  padding-bottom:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div class="about00" style="border-top: 1px #C6121B solid;">
    <h3> <?php echo $TableLanguage6['CustTellYourFriend'];?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

     <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                    <?php echo $TableLanguage6['CustTellYourFriend'];?>
                        </span>
                     </h4>
                    <div class="common_box">
                        <div class="account_top">
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext">
                                <tbody><tr>

                                    <td align="center" valign="top">
                                    <?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
    <?php if($error!=''){ ?>
    <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
    <?php } ?>
                                        <form action="" method="post" enctype="multipart/form-data" name="edit" id="edit">
                                           <div id="message" style="display: none">Successfully send your message to listed your friends email</div>

                                            <table width="100%" border="0" cellspacing="2" cellpadding="2" class="normal_text">
                                                <tbody><tr>
                                                    <td align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td height="30" valign="top" class="normal_text" align="left">
                                                                <strong class="cms-font1">Hi,<span id="customer_name"><?php echo ucwords($UserAddressData['fname']);?> <?php echo ucwords($UserAddressData['lname']);?></span></strong>
                                                            </td>
                                                        </tr>
                                                        <?php /*?><tr>
                                                            <td height="18" align="left" valign="top" class="cms-font2">Your Reference ID is : <span id="reference_id">792</span> <strong>

                                                            </strong></td>
                                                        </tr><?php */?>
                                                        </tbody>
                                                    </table></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle"><div style="border-top:1px dotted #CAD383"> </div></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle">
                                                     <textarea name="content" id="content" style="width: 100%; height: 300px; display: none;" class="mceEditor"><?php echo ucwords($TableLanguage6['CustShareMessageWithFriedText']);?>

                                                        </textarea>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle"><table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_text">
                                                        <tbody><tr>
                                                            <td width="45%" height="0">&nbsp;</td>
                                                            <td width="55%">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <div id="restgalary">
                                          <div id="addressDiv" class="cms-font2"> <label class="register_label" style="line-height:18px; float: none"><?php echo ucwords($TableLanguage5['ResFormFieldNameText']);?> :</label>
                                         <input type="text" name="FriendName" id="FriendName" value="" class="register_input" required style="float: none; width: 240px" size="25">
                                                                    
                                        
                                                         <label class="register_label" style="line-height:18px; float: none"> <?php echo ucwords($TableLanguage5['ResFormFieldEmailText']);?> :</label>
                                                          <input type="email" required name="Friendemailaddress" id="Friendemailaddress" value="" class="register_input" style="float: none; width: 240px" size="25">
                                         </div>
                                                                </div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">&nbsp;</td>

                                                            <td align="center"><div align="left">
                                                                <!--   <input type="button" name="" id="addemail" class="btn-new-mail"  value="" />-->
                                                            </div></td>
                                                        </tr>

                                                    </tbody></table></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle"><div style="border-top:1px dashed #000000"> </div></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="normal_text">
                                                        <tbody><tr>
                                                            <td colspan="2" align="center"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="70%" align="left" class="cms-font1"><!--Your e-mail will be sent to the address you given.--></td>
                                                            <td width="30%">
                                                               
                                                 <input type="submit" class="button red01" border="0" name="sendmailSubmit" value="Send" onclick="return sendtellurfrinedmail()">
                                                            </td>
                                                        </tr>
                                                    </tbody></table></td>
                                                </tr>
                                            </tbody></table>
                                        </form></td>
                                </tr>
                            </tbody></table>

                        </div><!-- End:account_top -->



                    </div>
                    
                    
                  <script type="text/javascript">
//<![CDATA[


CKEDITOR.replace( 'content',
{
 width:"700",
 toolbar :
      [
        
        ['Source'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
        
        ['Styles','Format'],['FontSize'],
        ['Bold','Italic','Strike'],
        ['NumberedList','BulletedList','/','Outdent','Indent','Blockquote'],
        ['Link','Unlink','Anchor'],
        ['Maximize','-','About']
		
      ],

filebrowserBrowseUrl : 'ckeditor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckeditor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckeditor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);</script>  
                </div><!-- End:account_detail_top -->



            </div>

        </div><!-- End:account_bottom -->

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
