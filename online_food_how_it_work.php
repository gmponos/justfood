<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('route/db.php'); 
$dbObj=new db;
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AboutData=mysql_fetch_assoc(mysql_query("select * from tbl_how_itarestuarantcms"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>  | How it Works | </title>
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
    <style type="text/css">
.work_steps
{
width:100%; height:500px; margin:auto; margin-top:20px;
}
.step_contents
{
width:60%; height:500px; float:left;
}
.content_rows
{
width:100%; min-height:80px;margin:auto;
}
.content_rows h1
{
color:#E51B24; font-size:20px; margin:2%;
}
.content_rows p
{
font-size: 15px;color: #333333;margin: 0 0 10px; padding: 0 0 0 25px;
}
.step_images
{
width:39%; height:500px; float:right;
}
.images_rows1
{
margin: auto;
width:42%; height:120px;
margin-left: 19%;
}
.images_rows2
{
margin: auto;
width:44%; height:130px;
margin-left: 19%; margin-bottom:7px;

}
.images_rows3
{
margin: auto;
width:44%; height:120px;
margin-left: 19%;
margin-bottom:7px;

}
.images_rows4
{
margin: auto;
width:44%; height:120px;
margin-left: 19%; margin-bottom:7px;

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
<div id="contentwrapper" style="padding-top:7px; padding-bottom:1px;">
  <!--content container starts-->
  <div class="container" style="min-height:700px;">

 <div class="midcontainer" style="width:100%; min-height:420px; margin:auto;">
 <div id="content">
                <div class="cms">

<div class="login">

  <h2 style="margin-bottom:10px;color:#E51B24;"><font><font><?php echo $AboutData['how_it_a_restaurant_heading'];?>

  
  </font></font><br>

  </h2>

                
               <div style="font-size: 15px;color: #333333;margin: 0 0 10px;">                
                <div class="work_steps">
                <div class="step_contents">
                <div class="content_rows">
                <h1>1.<?php echo $AboutData['how_it_a_restaurant_heading1'];?></h1>
                <h1 style="color: #0F0606;font-size: 15px;line-height: 15px;">" <?php echo $AboutData['how_it_a_restaurant_smallheading1'];?>"</h1>
                <p><?php echo $AboutData['how_it_a_restaurant_heading_description1'];?>.</p>
                
                </div>
                 <div class="content_rows">
                  <h1>2. <?php echo $AboutData['how_it_a_restaurant_heading2'];?></h1>
                <h1 style="color: #0F0606;font-size: 15px;line-height: 15px;">" <?php echo $AboutData['how_it_a_restaurant_smallheading2'];?>"</h1>
                <p><?php echo $AboutData['how_it_a_restaurant_heading_description2'];?>.</p>
                 </div>
                  <div class="content_rows">
                  <h1>3. <?php echo $AboutData['how_it_a_restaurant_heading3'];?></h1>
                <h1 style="color: #0F0606;font-size: 15px;line-height: 15px;">" <?php echo $AboutData['how_it_a_restaurant_smallheading3'];?>"</h1>
                <p><?php echo $AboutData['how_it_a_restaurant_heading_description3'];?>.</p>
                  
                  </div>
                  <div class="content_rows">
                   <h1>4. <?php echo $AboutData['how_it_a_restaurant_heading4'];?></h1>
                <h1 style="color: #0F0606;font-size: 15px;line-height: 15px;">" <?php echo $AboutData['how_it_a_restaurant_smallheading4'];?>"</h1>
                <p><?php echo $AboutData['how_it_a_restaurant_heading_description4'];?>.</p>
                 </div>
                   <div class="content_rows">
                <h1><?php echo $AboutData['how_it_a_restaurant_heading5'];?></h1>
                <h1 style="color: #0F0606;font-size: 15px;line-height: 15px;">" <?php echo $AboutData['how_it_a_restaurant_smallheading5'];?>"</h1>
                <p><?php echo $AboutData['how_it_a_restaurant_heading_description5'];?>.</p>
                
                </div>
                </div>
                <div class="step_images">
                <div class="images_rows1"><img src="control/userPanelImage/<?php echo $AboutData['how_it_a_restaurant_smallheadingimg1'];?>" /></div>
                  <div class="images_rows2"><img src="control/userPanelImage/<?php echo $AboutData['how_it_a_restaurant_smallheadingimg2'];?>" /></div>
                    <div class="images_rows3"><img src="control/userPanelImage/<?php echo $AboutData['how_it_a_restaurant_smallheadingimg3'];?>" /></div>
                      <div class="images_rows4"><img src="control/userPanelImage/<?php echo $AboutData['how_it_a_restaurant_smallheadingimg4'];?>" /></div>
                </div>
                </div>
                </div>
               


</div>

<div class="clear"></div>

</div></div>
<div style="clear:both;"></div>
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
