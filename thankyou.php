<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
date_default_timezone_set('US/Eastern');
/*if($_GET['paymentType']=='authorize.net')
{
header("location:authorize_payment.php?order_identifyno=".$_GET['order_identifyno']."&restaurants=".$_GET['restaurants']);
}
if($_GET['paymentType']=='Paypal')
{
header("location:paypal/samples/SimpleSamples/ParallelPay1.html.php?order_identifyno=".$_GET['order_identifyno']."&restaurants=".$_GET['restaurants']);

//header("location:paymentMake.php?order_identifyno=".$_GET['order_identifyno']."&restaurants=".$_GET['restaurants']);
}*/
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
include('route/db.php'); 
$dbObj=new db;
unset($_SESSION['disCupn']);
		unset($_SESSION['disCupnPrice']);
		unset($_SESSION['disCupnType']);
		unset($_SESSION['URlCookies']);
		unset($_SESSION['URlBracumbCookies']);
		unset($_SESSION['tipamountVale']);
		unset($_SESSION['loyptamount']);
		unset($_SESSION['preorder']);		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title itemprop="description"><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?> | <?php echo stripslashes(ucwords($resSEO['restaurant_MetaTitle'])); ?> |</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaDescription'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaKeyword'])); ?>"
/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $url; ?>restaurant.php?<?php echo $_GET['restaurants']; ?>" />
<meta property="og:image" content="<?php echo $url; ?>control/restaurantlogoimg/small/<?php echo $resdata['restaurant_Logo'];?>" />
<script src="js/popup/jquery-1.8.1.min.js"></script>
<script src="js/popup/jquery.fancybox-1.3.0.pack.js"></script>
<link href="js/popup/jquery.fancybox-1.3.0.css" rel="stylesheet" />
<script type="text/javascript">
<?php /*?>	$(document).ready(function() {
		
	     $(".verify").fancybox({		     
			'width'				: 540,
			'height'			: 306,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe',
			'showCloseButton'	: false,
			'enableEscapeButton': false,
			'hideOnOverlayClick': false,
			'centerOnScroll'	: true
		}).trigger("click");		
	});<?php */?>
	</script>
<style type="text/css">
::-webkit-scrollbar-track-piece {
background-color: #6F6D6D;
border-left: 1px solid #CCC;
-webkit-box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.3);
}
::-webkit-scrollbar {
width:10px;
height:10px;
);
}
::-webkit-scrollbar-thumb {
background-color:#E31616;
}
::-webkit-scrollbar-thumb:hover {
height:50px;
background-color:#E31616;
-webkit-border-radius:4px;
}



::moz-scrollbar-track-piece {
background-color: #00ccff;
border-left: 1px solid #CCC;
moz-box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.3);
}
::moz-scrollbar {
width:10px;
height:10px;
);
}
::moz-scrollbar-thumb {
background-color:#ff6156;
}
::moz-scrollbar-thumb:hover {
height:50px;
background-color:#ff6156;
moz-border-radius:4px;
}
</style>
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
  <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>
<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:20px;">
  <!--content container starts-->
  <div class="container" style="padding-bottom:20px;">
  <?php 
  include('config1.php');
  mysql_query ("set character_set_results='utf8'"); 
  $ThankyouData=mysql_fetch_assoc(mysql_query("select * from resto_order where order_identifyno='".$_GET['order_identifyno']."'"));
  ?>
    <div class="midcontainer"></div>
    <div id="thanks">
    <div class="thanks_title">
    <h1><?php echo $TableLanguage7['CongratsText'];?></h1>
    </div>
    <div class="thanks_order">
    <h2><?php echo $TableLanguage7['yourOrderDetailText'];?></h2>
    <h3><?php echo $TableLanguage7['DeliveryAddressText'];?></h3>
    <p><?php echo $ThankyouData['address']; ?>,<?php echo $ThankyouData['city']; ?>-<?php echo $ThankyouData['zipcode']; ?></p>
    <h3>ORDER ID</h3>
    <p><?php echo $ThankyouData['order_identifyno']; ?></p>
    <h3><?php echo $TableLanguage7['TimeofOrderingText'];?></h3>
    <p><?php echo $ThankyouData['requestTime']; ?></p>
     <h3><?php echo $TableLanguage7['orderwillbereachText'];?></h3>
    <p><?php echo $ThankyouData['requestTime']; ?> , <?php echo $ThankyouData['user_date']; ?></p>
     <h3 style="color:#D80E0F;"><?php echo $TableLanguage7['CheckyoouremailSpamText'];?></h3>
    </div>
    <div class="thanks_image">
    <img src="images/pizza-box.png" height="150" width="180" />
    </div>
    <div class="thanks_social" >    
    <p><?php echo $TableLanguage7['itdoesnotMatterText'];?></p>
    <a href="http://www.facebook.com/sharer.php?u=http://megamenus.net/" class="thanks_btn" id="thanks_fb">Like</a>
     <a href="https://twitter.com/intent/tweet?screen_name=@MegaMenus" class="thanks_btn" id="thanks_twt">Tweet</a>
     <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    </div>
    <div style="clear:both;"></div>
  </div>
 <?php /*?> <a class="verify" href="verification.php?mobileGet=<?php echo $ThankyouData['phone']; ?>"></a><?php */?>
  <!--content container ends-->
</div>
<!--contentwrapper Ends-->
<a href="#" class="go-top">Back to Top</a>
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
