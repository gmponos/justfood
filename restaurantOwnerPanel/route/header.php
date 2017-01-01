<?php 
ob_start();
session_start();
if(!isset($_SESSION['OwnerloginId']))
{
session_unset();
session_destroy();
header("location:index.php");
exit;
}
include('config1.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$AdminDataRestauarnt=mysql_fetch_assoc(mysql_query("select * from  tbl_restaurantAdd where id='".$_SESSION['restaurant_id']."' order by id asc"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $AdminDataRestauarnt['restaurant_name']; ?> | Restaurant Owner Administrator Panel | Powered by Php Expert Group | Ghaziabad </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Olas Navigator">

	<!-- bootstrap css -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	
	<!-- template css -->
	<link href="app/css/styles.css" rel="stylesheet">
	<link href="app/css/demo.css" rel="stylesheet">
	
	<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

	<!-- HTML5 shim -->
	<!--[if lt IE 9]>
    Added user “phpexubr_foodpan” with password “abc@123”.

Step 3: Add User to the Database

User: phpexubr_foodpan 
Database: phpexubr_foodpanda
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- sample fav and touch icons -->
	<link rel="shortcut icon" href="../control/RestaurantFaviconimg/small/<?php echo $AdminDataRestauarnt['restaurant_FaviconImg'];?>">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	<!-- Header -->
	<div id="header">
		<!-- top navbar -->
		<div class="navbar navbar-green">
			<div class="navbar-inner" style="background:url(images.jpg);">
				<a class="brand" href="webindex.php"><?php echo $AdminDataRestauarnt['restaurant_name']; ?> Panel</a>
				<ul class="nav pull-right">
					<li class="dropdown active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt icon-white"></i> Restaurant <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php /*?><li><a href="add_new_restaurant.php">Add New Restaurant</a></li><?php */?>
							<li><a href="manage_restaurant.php">Manage  Restaurant</a></li>
                            <li><a href="manage_restaurant_options.php">Manage  Restaurant Option Wise</a></li>
							
						</ul>
					</li>
                       <li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs icon-large"></i> Menu <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							
                           	<li><a href="menu-entry-create-categories.php"> Add/View Menu Category</a></li>
                           
						</ul>
					</li>
                       <li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs icon-large"></i>Food Deals<b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							
                           	<li><a  href="add_restaurant_Food_Deals.php"> Add Food Deals</a></li>
								<li><a  href="add_restaurant_Food_Deals.php#manage">Manage Food Deals</a></li>
                           
						</ul>
					</li>
                     
                    <li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-qrcode icon-white"></i>Coupon <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="add_restaurant_copoun_code.php">New Restaurant Coupon</a></li>
							<li><a href="add_restaurant_copoun_code.php#manage">Display Restaurant Coupon</a></li>
							
						</ul>
					</li>
                   <li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th icon-white"></i>Discount <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="add_restaurant_offer.php">New Restaurant Discount</a></li>
							<li><a href="manage_restaurant_offer.php">Display Restaurant Discount</a></li>
                           <?php /*?> <li><a href="menuofferName.php">New Menu Offer Title</a></li>
                            <li><a href="manage_menuOffer.php">Manage Menu Offer Title</a></li>
                            <?php */?>
                            
							
						</ul>
					</li>
                   
                
                 
                   
                   
					
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-shopping-cart icon-white"></i> Orders <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="all_restaurant_order.php">All Orders</a></li>
							<li><a href="Today_restaurantOrder.php">Today Orders</a></li>
							<li><a href="Weekly_restaurantOrder.php">Weekly Orders</a></li>
							<li><a href="Monthly_restaurantOrder.php">Monthly Orders</a></li>
                            <li><a href="Yearly_restaurantOrder.php">Yearly Orders</a></li>
						</ul>
					</li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i>Report Print<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="all_restaurant_order_print.php">All Orders</a></li>
							<li><a href="Today_restaurantOrder_print.php">Today Orders</a></li>
							<li><a href="Weekly_restaurantOrder_print.php">Weekly Orders</a></li>
							<li><a href="Monthly_restaurantOrder_print.php">Monthly Orders</a></li>
                            <li><a href="Yearly_restaurantOrder_print.php">Yearly Orders</a></li>
						</ul>
					</li>
                   
                     <li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs icon-sitemap"></i> Profile Setting  <b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a tabindex="-1" href="change_password.php"> Change Profile</a></li>
						
						</ul>
					</li>
					<li class="divider-vertical"></li>
					<li><a href="logout.php"><i class="icon-signout icon-large"></i> Logout</a></li>
				</ul>
			</div>
		</div><!-- ./ top navbar -->
	</div>
    <?php include('config1.php'); ?>