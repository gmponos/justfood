<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('route/db.php'); 
$dbObj=new db;
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AboutData=mysql_fetch_assoc(mysql_query("select * from tbl_Desclaimer"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>  | MegaMenus Online Food Ordering |</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($AboutData['content_KeywordMeta'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($AboutData['content_DescriptionMeta'])); ?>"
/>
	<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        


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

 <div class="midcontainer" style="width:100%; min-height:420px; margin:auto;">
 <div id="content">
                <div class="cms">

<div class="login">

  <h2 style="margin-bottom:10px;color:#E51B24;"><font><font>Disclaimer

  
  </font></font><br>

  </h2>

                
                <?php echo stripslashes(ucwords($AboutData['content_description'])); ?>
               


</div>

<div class="clear"></div>

</div></div>
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
