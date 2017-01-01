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
<title>Confirm Address</title>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<link href="tables/tab.css" rel="stylesheet" type="text/css" />
      
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
  <div class="container" style="min-height:700px;">
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
  
 <div class="tab_menu_container" style="height:605px;">
<div class="login">
<div class="cnf_address">
<h2>Choose delivery address</h2>
<form name="" method="post" action="">
<div class="address">
<select>
<option value="0">Select the service address</option>
<option value="1">Office Address</option>
<option value="2">Home Address</option>
</select>
<input type="submit" value="Continue" name="" class="continue" />
</div>

</form>
</div>
<div class="new_address">
<h2>Add new delivery address</h2>
<table width="80%" style="margin:auto;">
<tr>
<td width="10%">Name<span>*</span></td>
<td width="35%"><input type="text" name="" id="" class="textbox"  required/></td>
</tr>
<tr>
<td width="10%">Contact No.<span>*</span></td>
<td width="35%"><input type="text" name="" id="" class="textbox" required/></td>
</tr>
<tr>
<td width="10%">Address<span>*</span></td>
<td width="35%"><textarea name="" id="" cols="50" rows="5" class="txtarea"></textarea></td>
</tr>
<tr>
<td width="10%">City<span>*</span></td>
<td width="35%"><select>
<option value="0">Select the City</option>
<option value="1">New Delhi</option>
<option value="2">Mumbai</option>
<option value="3">Kolkata</option>
<option value="4">Chennai</option>
</select></td>
</tr>
<tr>
<td width="10%">Region/Area<span>*</span></td>
<td width="35%"><select>
<option value="0">Select the region/area</option>
<option value="1">Canaught Place</option>
<option value="2">R.K. Puram</option>
<option value="3">Nehru Place</option>
<option value="4">Dwarka</option>
</select></td>
</tr>
<tr>
<td width="10%"></td>
<td width="35%"><input type="submit" name="" value="Add new delivery address" class="new_delivery" /></td>
</tr>
</table>
</div>
</div
></div>
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
