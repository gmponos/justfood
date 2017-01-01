<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('route/db.php'); 
$dbObj=new db;
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AboutData=mysql_fetch_assoc(mysql_query("select * from tbl_Career"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>  | MegaMenus Online Food Ordering | Developed by Php Expert Group at Ghaziabad | Uttar Pradesh | India | Greek !</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($AboutData['content_KeywordMeta'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($AboutData['content_DescriptionMeta'])); ?>"
/>
	<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        


 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="js.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>


<script type="text/javascript">


ddaccordion.init({
	headerclass: "silverheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "mouseover", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: true, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "selected"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>
<style type="text/css">

.applemenu{
margin: 5px 0;
padding: 0;
height:auto;
}

.applemenu div.silverheader a{
background: black url(silvergradientover.gif) repeat-x center left;
font: normal 12px Tahoma, "Lucida Grande", "Trebuchet MS", Helvetica, sans-serif;
color: white;
display: block;
position: relative; /*To help in the anchoring of the ".statusicon" icon image*/
width: auto;
padding:10px;;
padding-left: 8px;
text-decoration: none;
}


.applemenu div.silverheader a:visited, .applemenu div.silverheader a:active{
color: white;
}


.applemenu div.selected a, .applemenu div.silverheader a:hover{
background-image:url(silvergradient.gif);
color: white;
}

.applemenu div.submenu{ /*DIV that contains each sub menu*/
background: white;
padding: 5px;
height:auto; /*Height that applies to all sub menu DIVs. A good idea when headers are toggled via "mouseover" instead of "click"*/
}

</style>
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

 <div class="about00">
                     <h3 style="line-height:0; margin-top:20px;padding: 20px 0; margin-bottom:20px;">Frequently Ask Questions</h3>
                <div style="color: #333333;margin: 0 0 10px;">
                
               <?php $FAQtData=mysql_query("select * from tbl_FAQ where status='0' order by ViewPostion asc"); ?>
           
<?php while($data=mysql_fetch_assoc($FAQtData))
{
 ?>
<div class="applemenu">
<div class="silverheader" >
<p ><a style="color: #fff;margin: 0 0 10px; cursor:pointer;">Question : &nbsp;<?php echo ucwords($data['faq_question']);?></a></p>
</div>
<div class="submenu">
											
<p style="margin: 0 0 10px;"><strong>Answer : &nbsp;</strong><?php echo ucwords($data['faq_answer']);?>

 </p>
 </div></div>
 <?php  } ?>
                
          
    

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
