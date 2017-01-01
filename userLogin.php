<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('route/db.php'); 
$dbObj=new db;
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
}
?>
<?php 
if(isset($_POST['UserLoginsubmit']))
{
$QueryConnetc="SELECT * FROM  `tbl_user` where user_email='".$_POST['UserEmail']."' and user_pass='".$_POST['UserPassword']."' and status='0'";
$QuerySub=mysql_query($QueryConnetc);
$numData=$db->num_rows($QuerySub);
if($numData>0)
{
$DatUser=$db->fetch_data($QuerySub);
$_SESSION['justfoodsUserID']=$DatUser['id'];
if($DatUser['user_name']!=''){
$_SESSION['justfoodsUserName']=$DatUser['user_name'];
}
else
{
$_SESSION['justfoodsUserName']=$DatUser['first_name'].''.$DatUser['last_name'];
}
if($_GET['fav']!=''){
$FavQD=mysql_num_rows(mysql_query("select * from favorite where userid='".$DatUser['id']."' and hotel_id='".$resID[0]."'"));							
if($FavQD>0){
}
else
{
$InserTFav="insert into favorite(userid,hotel_id) values('".$DatUser['id']."','".$resID[0]."')";
mysql_query($InserTFav);
}
}
if($_POST['rememberme']=='1') //if rememberme checkbox checked 
{ 
setcookie ('UserEmail', $_POST['UserEmail'], time() + (60*60*24*10)); 
setcookie ('UserPassword', $_POST['UserPassword'], time() + (60*60*24*10)); 
setcookie ('rememberme', 1, time() + (60*60*24*10)); 
} 
else 
{ 
setcookie ('UserEmail',0, time()-1000); 
setcookie ('UserPassword', 0, time()-1000); 
setcookie ('rememberme', 0, time()-1000); 

} 
if($_GET['restaurants']!='')
{
header("location:restaurant.php?restaurants=".$_GET['restaurants']);
}
else
{
header("location:index.php");
}
}
else
{
$error=1;
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" >
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

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
  <div class="container" style="min-height:480px;">

 <div class="midcontainer" style="width:100%; min-height:420px; margin:auto;">
 <div id="content">
                <div class="cms">
<div class="login">
  <h2 class="titleleft"><font style="color:#E51B24; margin-bottom:10px; font-family:CANDARA BOLD;"><?php echo $TableLanguage6['loginHereText']; ?></font></h2>
  
<h2 class="titleright">&nbsp;</h2>
<div class="desc">
</div>
<br />
<?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
    <?php if($error!=''){ ?>
    <div style="padding:10px; color:#E10000; font-size:16px; font-weight:bold;"><?php echo $TableLanguage['LoginErrorMsg'];?></div>
    <?php } ?>
<?php
if(!isset($_POST['UserLoginsubmit']))
{
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Facebook Login code ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
require 'src/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '1439333152988242',
  'secret' => '3edc68a0a0c944cc1d314b3a9d6a36f8',
));
// See if there is a user from a cookie
$user = $facebook->getUser();
if ($user) {
  try {
 // $logoutUrl = $facebook->getLogoutUrl();
    // Proceed knowing you have a logged in user who's authenticated.
    echo $user_profile = $facebook->api('/me');
	//$params = array('next' =>'logout.php');
       print_r($user_profile);
        //$_SESSION['User']=$user_profile;
     
  } catch (FacebookApiException $e) {
    //echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
  }
}
if ($user) 
{ 

 $kl= $user_profile['location']['name'];
 $q ="SELECT * FROM  `tbl_user` where fb_id='".$user_profile['id']."'  and status='0'";
$query = mysql_query($q)or die(mysql_error());
$num_rows=mysql_num_rows($query);
if($num_rows==0)
{
$QReg="insert into tbl_user (fb_id,user_name,user_email,fname,lname,user_pass,address,input_date,ip,status) values('".$user_profile['id']."', N'".$user_profile['name']."','".$user_profile['email']."',N'".$user_profile['first_name']."',N'".$user_profile['last_name']."','12345',N'".$kl."','".date('Y-m-d')."','".$_SERVER['REMOTE_ADDR']."','0')";
if(mysql_query($QReg))
{
if($user_profile['id']!=''){
$_SESSION['justfoodsUserID']=mysql_insert_id();
$_SESSION['justfoodsUserName']=$user_profile['name'];
}
if($_GET['restaurants']!='')
{
header("location:restaurant.php?restaurants=".$_GET['restaurants']);
}
else
{
header('location:index.php');
}
}
}
else
{
$Qurp="update tbl_user set user_name='".$user_profile['name']."' , fname='".$user_profile['first_name']."' , lname='".$user_profile['last_name']."' , address='".$kl."' where fb_id='".$user_profile['id']."'";
if(mysql_query($Qurp))
{
$q ="SELECT * FROM  `tbl_user` where fb_id='".$user_profile['id']."'  and status='0'";
	$query = mysql_query($q)or die(mysql_error());
	$num_rows=mysql_num_rows($query);
	$result=mysql_fetch_array($query);
	if($user_profile['id']!=''){
$_SESSION['justfoodsUserName']=$user_profile['name'];
$_SESSION['justfoodsUserID']=$result['id'];
}
if($_GET['restaurants']!='')
{
header("location:restaurant.php?restaurants=".$_GET['restaurants']);
}
else
{
header('location:index.php');
}
}
}
}


?>

<script>
  window.fbAsyncInit = function() {
FB.init({
        appId: '<?php echo $facebook->getAppID();?>', // App ID
        status: true,
        cookie: true,
        xfbml: true,
        oauth: true,

});
$(document).on('click', '.facebook-login', function() {
FB.getLoginStatus(function(response) {
  FB.login(function(response) {
   if (response.authResponse) {
     FB.api('/me', function(response) {
	  window.location.reload();
      // alert('Good to see you, ' + response.email + '.');
     });
   }
    else {
     //alert('User cancelled login or did not fully authorize.');
   }
 }, {scope: 'email'});
});
});

// Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
 var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
 js = d.createElement('script'); js.id = id; js.async = true;
 js.src = "//connect.facebook.net/en_US/all.js";
 d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>
<?php } ?>


<form class="register" name="loginform" id="loginform" style="height:300px; margin-top:10px;" method="post" onsubmit="return emailvalidation();">

<div class="formrow">
<span class="formtitle" id="spnloginemail"><font><font><?php echo $TableLanguage5['ResFormFieldEmailText'];?>:</font></font></span>
<input type="email" class="txtinput" required name="UserEmail" value="<?php if(isset($_COOKIE['UserEmail'])) echo $_COOKIE['UserEmail'];?>" id="UserEmail" tabindex="1"  style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">

</div>
<div class="formrow">
<span class="formtitle" id="spnloginpassword"><font><font><?php echo $TableLanguage5['ResFormFieldPasswordText'];?> </font></font>
   <?php
 if($_GET['restaurants']!=''){?>
   <a href="forgotPassword.php?restaurants=<?php echo $_GET['restaurants'];?>" style="color:#E51B24;"><font><font>(<?php echo $TableLanguage7['forgotpasswordText'];?> ?)</font></font></a>
   <?php } else{ ?>
   <a href="forgotPassword.php" style="color:#E51B24;"><font><font>(<?php echo $TableLanguage7['forgotpasswordText'];?>?)</font></font></a>
   <?php } ?>
<font><font> :</font></font></span>
<input type="password" required class="txtinput" name="UserPassword" tabindex="2" value="<?php if(isset($_COOKIE['UserPassword'])) echo $_COOKIE['UserPassword'];?>" id="UserPassword" style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
</div>
<div class="formrow">
<input id="rememberme" name="rememberme" type="checkbox" <?php if(isset($_COOKIE['rememberme'])) { ?> checked="checked" <?php } ?> tabindex="3" value="1" style="margin-top:5px;">
<label for="remember"><font><font>Remember Me <?php //echo $TableLanguage6['rememberMepasswordText'];?></font></font></label>
    </div>
<font><font><input id="submit" name="UserLoginsubmit" class="" type="submit" tabindex="4" value="<?php echo $TableLanguage['LoginText'];?> " align="middle"></font></font>
<!--<div id="fbk"><fb:login-button></fb:login-button ></div>
-->
<div class="clear"></div>
<!--<div class="formrow">
</div>-->
<div class="clear"></div>
                   
</form>


<div class="adv">

      <h3><font><font style="font-family:CANDARA BOLD; color:#E51B24;">Create your free account to:</font></font></h3>
       <ul class="check">
    <li><font><font>
easily place your order, your information is stored</font></font></li>
    <li><font><font>      select from multiple addresses stored</font></font></li>
    <li><font><font>      see your order history</font></font></li>
    <li><font><font>The benefit of loyalty points that can be used to pay orders</font></font></li>
    <li><font><font>      receive discounts, promotions and special offers</font></font><br>
    </li>
       </ul>
        	    <a href="UserRegistration.php" class="button-large"><font><font>Create an account </font></font></a>
	   	    <span id="sau"><font><font>or </font></font></span>
       <a href="#" class="button-large fb facebook-login"><font><font>Connect with Facebook</font></font></a> 


</div>
</div>
<div class="clear"></div>
</div></div>
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
