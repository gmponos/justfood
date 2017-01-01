<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
 <style type="text/css">
 .textbox {
    border: 1px solid #CCCCCC;
    height: 35px;
    width: 85%;
	margin-top:10px;
	margin-bottom:10px;
}
.textbox:focus {
    border-color: #D80E0F;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(249, 81, 8, 0.6);
    outline: 0 none;
}
.submit
{
padding:2% 5%;
background:#CE0606;
color:#fff;
text-decoration:none;
border:1px solid #CE0606; 
border-radius:5px;
margin-top:15px;
}
.submit:hover
{
background:#FA3800;
}
label {
	display: inline-block;
	cursor: pointer;
	position: relative;
	padding-left: 25px;
	margin-right: 15px;
	font-size: 13px;
}
label:hover
{
color:#FA3800;
}
						
input[type=checkbox] {
	display: none;
}
label:before {
	content: "";
	display: inline-block;
	width: 16px;
	height: 16px;
	margin-right: 0px;
	position:relative;	
	left: -21px;
	bottom: 1px;	
	background:#FA3800;
	background:rgba(250,56,0,0.8);
	box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
}
.radio label:before{
	border-radius: 8px;
}
.checkbox label{
	margin-bottom: 10px;
}
.checkbox label:before{
    border-radius: 3px;
}

input[type=checkbox]:checked + label:before{
	content: "\2713";
	text-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
	font-size: 15px;	
	color:#ffffff;
	text-align: center;
    line-height: 15px;
}
a
{
color:#000;
text-decoration:underline;
}
a:hover
{
text-decoration:none;
color:#FA3800;
}
.register_right ul
{
list-style:none;
}
.register_right ul li
{
list-style-image:url(images/tick.png);
padding-left:2%;
list-style-position:1px 3px;
margin-bottom:5px;
margin-top:5px;

}
.register
{
width:100%; min-height:410px; background:#fff;
}
.register_left
{
width:60%; min-height:350px; float:left; background:#fff;
}
.register_left h2
{
margin-left:2%; margin-top:2%;
}
.form
{
width:96%; min-height:300px; margin:2%; padding:2%; box-shadow:1px 1px 1px 2px #ccc;
}
.register_right
{
width:38%; min-height:410px; float:right; padding:2%;
}
.register_right h2
{
margin-bottom:10px;
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
<div id="contentwrapper" style="padding-top:30px;">
  <!--content container starts-->
  <div class="container" style="min-height:480px;">

 <div class="midcontainer" style="border:1px solid #ccc; width:100%; min-height:420px; margin:auto;">
 <div class="register">
 <div class="register_left">
 <h2>Create an Account</h2>
 <div class="form">
 <form action="" name="" method="post">
 <table width="100%">
 <tr>
 <td width="30%;">Name</td>
 <td width="70%;"><input type="text" name="" id="" class="textbox"  maxlength="" required/></td>
 </tr>
  <tr>
 <td width="30%;">Email</td>
 <td width="70%;"><input type="email" name="" id="" maxlength="" class="textbox" required/></td>
 </tr>
  <tr>
 <td width="30%;">Password</td>
 <td width="70%;"><input type="password" name="" id="" class="textbox" maxlength="" required/></td>
 </tr>
  <tr>
 <td width="30%;">Confirm Password</td>
 <td width="70%;"><input type="password" name="" id="" class="textbox" maxlength="" required/></td>
 </tr>
  <tr>
 <td width="30%;"></td>
 <td width="70%;"><p>Pressing the button below you agree to the <a href="#">terms and conditions</a> of our website</p></td>
 </tr>
  <tr>
 <td width="30%;"></td>
 <td width="70%;"><input id="1" type="checkbox" name="check" value=""><label for="1">I want to receive offers and news.</label></td>
 </tr>
 <tr>
 <td width="30%;"></td>
 <td width="70%;"><input type="submit" name="" id="" value="Create Account" class="submit" /></td>
 </tr>
 </table>
 </form> 
 </div>
 </div>
 <div class="register_right">
 <h2 style="">Benifits of craeting an account</h2>
 <ul>
 <li>Place your order easier, your data is stored. </li>
  <li>Benefit from discounts and special offers. </li>
  <li>You can store multiple shipping addresses.</li>
  <li>You have a list of favorite restaurants.</li>
  <li>View your order history.</li>
  <li>Provides restaurant ratings and leave comments.</li>
 </ul>
 </div>
 </div>
 </div>  
 </div>
  <!--content container ends-->
  
</div>
<!--contentwrapper Ends-->
<a href="#" class="go-top">Back to Top</a>
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
