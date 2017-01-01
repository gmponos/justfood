<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
include('route/db.php'); 
$dbObj=new db;
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('Asia/Calcutta');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
if($_SESSION['justfoodsUserID']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}
if(isset($_POST['ChangePasswordSubmit']))
{
$plokg=mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' and user_pass='".$_POST['new_password']."'");
@$DataUserUpdate=array("user_pass"=>mysql_real_escape_string($_POST['new_password']));
$CuisineInsert=$dbObj->dataupdate($DataUserUpdate,"tbl_user",'id',$_GET['eid']);
if($CuisineInsert)
{
$msg="you account password has been sucessfully updated !";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
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
<div id="contentwrapper" style="padding-top:7px; padding-bottom:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
<div class="about00" style="border-top: 1px #C6121B solid;">
    <h3>My <span>Account</span></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

     <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                   <?php echo $TableLanguage7['changePasswordText'];?>
                        </span>
                     </h4>
                    <div class="common_box" id="address_list">
                    <?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
    <?php if($error!=''){ ?>
    <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
    <?php } ?>
                       <form action="" method="post">
                        
                        <div class="create_address">
                            <div class="create_adbox">
                                <h4> <?php echo $TableLanguage7['changePasswordText'];?></h4>

                                <div class="create_innerform">
                                    <div class="contact_txt"></div>

                                    <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['newPasswordText'];?>: <span style="color:#ff0000;">*</span></label>
                                        <input name="old_password" id="old_password" required type="password" class="register_input">
                                    </div>
                                    <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['oldPasswordText'];?>:</label> 
                                        <input name="new_password" id="new_password" required type="password" class="register_input">
                                    </div>
                                    
                                       <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['cPasswordText'];?>:</label>
                                        <input name="cnew_password" id="cnew_password" type="password" class="register_input">
                                    </div>

                           
                                 
                                 
                                    <div class="contact_row">
                                      
                                        <input name="ChangePasswordSubmit" type="submit"  class="button red01" value="<?php echo $TableLanguage7['changePasswordText'];?>" style="margin-top:10px; float: right;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    
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
