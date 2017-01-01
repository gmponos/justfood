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
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<link href="tables/tab.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript">
$(document).ready(function(){
 $("#password").hide();
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="1"){
                $("#password").hide();               
            }
            if($(this).attr("value")=="2"){
               
                $("#password").show();
            }
            
        });
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
<!--wrapper Ends-->



<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:30px;">
  <!--content container starts-->
  <div class="container" style="min-height:650px;">
 <!-- mid search  starts-->
  <div class="midserach">
  <div class="steps">
   <ul>
                <li> <a href="#"> <span>1</span> Search </a> </li>
                <li> <a href="#"> <span >2</span> Select Restaurant </a> </li>
                <li> <a href="#" > <span>3</span> Place Order </a> </li>
                <li> <a href="#" style="color:#FF091E" > <span>4</span class="selected"> Checkout </a> </li>
              </ul>
  </div>
  </div>
  <!-- mid search  ends-->
 
 
 <div class="tab_menu_container" style="height:550px;">
<div class="login">
<div class="login_left">
<div class="leftcontent">Email Address<span style="color:#FF0000;">*</span></div>
<div class="midcontent">
<form id="" name="" method="post" action="shippinginfo.html">
<div class="rightcontainer">
<input type="email" name="" id="" class="textbox"  placeholder="Enter Your Email Address" required/>
</div>
<div class="rightcontainer">
Your order details will be sent this email address
</div>
<div class="radio">
			<div class="rightcontainer">
 			<input id="1" type="radio" name="login" value="1">
			<label for="1">Continue as Guest User</label>
            <h4>(You do not need to login)</h4>
            </div>
             <div class="rightcontainer">
			<input id="2" type="radio" name="login" value="2">
			<label for="2">I have a account and password</label>
           <h4> (login to your account for faster checkout)</h4>
			</div>

			<div class="rightcontainer" id="password">
			<input type="password" name="" id="" class="textbox"  placeholder="Enter Your password" required/>
			</div>
 			</div>
            
<div class="rightcontainer">
<input type="submit" value="Proceed"  class="submit"/>
</div>
</form>
</div>
<div class="rightcontent">
<h1 style="">OR</h1>
</div>
</div>
<div class="login_right">
	<div class="rightcontainer"><h2 style="font-weight:normal;">Social Logins</h2></div>
    <div class="rightcontainer">Sign in via your social account </div>
<div class="facebook"><a href="#">Sign in with Facebook</a></div>
<div class="gmail"><a href="#">Sign in with Gmail</a></div>


</div>

</div>
<div id="place_order">
<h1>Your Order Summary</h1>
<div class="address">

<h2>Your Address<a style="margin-left:25px;" href="#">Change Address</a></h2>
<p><strong>52/156, Canaught Place, New Delhi.</strong></p>
<p>Your order will be  delivered to Your Address.</p>

<h3>Your Selections</h3>
<div class="products">
<div class="quantity"><img style="float:left; margin-top:15%;" width="25%" height="25%" src="images/minus.png" />1<img src="images/plus.png" width="25%" height="25%" /></div>
<div class="product_names">
Garlic Pizza + Onion Pizza + Sauce</div>
<div class="price">&euro; 100</div>
<div class="cancel"></div>
</div>
<div class="products">
<div class="quantity"><img style="float:left; margin-top:15%;" width="25%" height="25%" src="images/minus.png" />10<img src="images/plus.png" width="25%" height="25%" /></div>
<div class="product_names">
Garlic Pizza with cheese + Onion Pizza + Sauce</div>
<div class="price">&euro; 1000</div>
<div class="cancel"></div>
</div>
<div class="pickup_delivery">
 <div class="radio">
 			<input id="1" type="radio" name="delivery" value="">
			<label style="margin-right:15%" for="1">Pickup</label>
          
			<input id="2" type="radio" name="delivery" value="">
			<label for="2">Delivery</label>
            </div>
</div>
<h4>Total :</h4> <h5> &euro; 1078</h5>

</div>
</div>
</div> 

 
 </div>
 <!--mid container ends-->
  
  
  
  
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
