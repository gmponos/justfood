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
<title>Check Out</title>
<
 
       
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
  <div class="container" style="min-height:950px;">
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
 
 
 <!--<div class="tab_menu_container">
<div class="tab_menu">
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Menu</a></li>
    <li><a href="#tabs-2">About Us</a></li>
    <li><a href="#tabs-3">Ratings</a></li>
    <li><a href="#tabs-4">Previous Order</a></li>
    <li><a href="#tabs-5">Offers</a></li>
     <li><a href="#tabs-6">Book a Table</a></li>
  </ul>
  <div id="tabs-1">
  
  </div>
  <div id="tabs-2">
  
 
  </div>
  <div id="tabs-3">
     
  </div>
  <div id="tabs-4">
  
  </div>
 
  <div id="tabs-5">
      
  </div> 
   <div id="tabs-6">
  
      
  </div> 
</div>

</div>
<div id="place_order">
<h1>Your Order</h1>
<div class="address">

<h2>Your Address<a style="margin-left:25px;" href="#">Change Address</a></h2>
<p><strong>52/156, Canaught Place, New Delhi.</strong></p>
<p>Your order will be  delivered to Your Address.</p>

<h3>Your Selections</h3>
<div class="products">
<div class="quantity"><img style="float:left; margin-top:15%;" width="25%" height="25%" src="images/minus.png" />1<img src="images/plus.png" width="25%" height="25%" />

</div>
<div class="product_names">
Garlic Pizza + Onion Pizza + Sauce


</div>
<div class="price">&euro; 100</div>
<div class="cancel"></div>
</div>
<div class="products">
<div class="quantity"><img style="float:left; margin-top:15%;" width="25%" height="25%" src="images/minus.png" />10<img src="images/plus.png" width="25%" height="25%" />

</div>
<div class="product_names">
Garlic Pizza with cheese + Onion Pizza + Sauce



</div>
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
<h4>Minimum Order :</h4> <h5> &euro; 100</h5>
<h2>Discount Package :</h2><h5> 2%</h5>
<h4>Total :</h4> <h5> &euro; 1078</h5>

<form method="post" action="#" name="">
<input type="submit" class="submit" value="Order Now" />
</form>
</div>
</div>
</div>--> 
<!--<div class="mid_product">
 <div class="top_product" >
 <div class="product_image"><img src="images/img/logo_th9.gif" width="90px" height="90px" /> </div>
 <div class="product_name">
 <h1>Creme De Cafe</h1>

 <h3>Rafalgar Street,BN14EB, Patisserie</h3>
 <h2 style="float:left">Type of food :</h2><h3 style="margin-top:5px; margin-left:5px;"> Breakfast</h3>
 
 <h2>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif"> User Rating (<a href="#">5 Ratings</a>)</h2>
                           
                         
 </div>
 <div class="product_favorites">
 <h2>Select Menu :</h2>
  
  <select>
        			<option selected value="0">Breakfast <span class="downarrow-s"></span>  </option>
        			<option value="1">Lunch</option>
        			<option value="2">Dinner</option>
         			<option value="3">Snacks</option>
        			<option value="4">Refreshments</option>
   				 </select>
                
                 <h2><a href="">View all Opening Times</a></h2>

 </div>
 <div class="product_delivery_time">
 <h2 style="margin-bottom:0px;">Pick up your </h2><h2 style="margin-top:0px;"> order in</h2> 
 <h2 style="margin-top:20px; color:#D80E0F;">20 Min.  </h2>
 </div>
 <div class="product_minorder">
 <h2 style="margin-bottom:0px;">Min Delivery</h2><h2 style="margin-top:0px;"> Order</h2> 
 <h2 style="margin-top:20px;">10 &#36;  </h2>
 </div>
 <div class="product_delivery_cast">
 <h2 style="margin-bottom:0px;">Delivery</h2><h2 style="margin-top:0px;"> Cast</h2> 
 <h2 style="margin-top:20px;">Free  </h2>
 </div>
 <div class="product_delivery_socials">
  
                         
                          <a href="#"><img src="images/fblike.png" height="25px" /></a>
                          <h2><a href="#">Email</a></h2>
                          <img src="images/add to favorite.png" title="Add to favourite" height="30" width="30" />
 </div>
 </div>
 <div class="bottom_product">
 <div class="days"><h2>Sunday</h2><h2>12:00- 00:30</h2></div>
 <div class="days"><h2>Monday</h2><h2>12:00- 00:30</h2></div>
 <div class="days"><h2>Tuesday</h2><h2>12:00- 00:30</h2></div>
 <div class="days"><h2>Wednesday</h2><h2>12:00- 00:30</h2></div>
 <div class="days"><h2>Thursday</h2><h2>12:00- 00:30</h2></div>
 <div class="days"><h2>Friday</h2><h2>12:00- 00:30</h2></div>
 <div class="days"><h2>Saturday</h2><h2>12:00- 00:30</h2></div>
 </div>
 </div>-->
 
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
