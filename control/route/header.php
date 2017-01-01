<?php 
ob_start();
session_start();
if(!isset($_SESSION['AdminloginId']))
{
session_unset();
session_destroy();
header("location:index.php");
exit;
}
include('config1.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo ucwords($AdminDataLoginVal['website_MetaTitle']); ?> | Administrator Panel | Powered by Php Expert Group | Ghaziabad </title>
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
	<link rel="shortcut icon" href="faviconicon/<?php echo $AdminDataLoginVal['website_favicon']; ?>">
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
			<div class="navbar-inner">
				<a class="brand" href="webindex.php"><?php echo $AdminDataLoginVal['website_name']; ?> Admin Panel</a>
				<ul class="nav pull-right">
					<li  <?php if(basename($_SERVER['PHP_SELF'])=='add_new_restaurant.php' || basename($_SERVER['PHP_SELF'])=='manage_restaurant.php' || basename($_SERVER['PHP_SELF'])=='manage_restaurant_options.php') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?> >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt icon-white"></i> Restaurant <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="add_new_restaurant.php">Add New Restaurant</a></li>
							<li><a href="manage_restaurant.php">Manage  Restaurant</a></li>
                            <li><a href="manage_restaurant_options.php">Manage  Restaurant Option Wise</a></li>
							
						</ul>
					</li>
                      
                    <li <?php if(basename($_SERVER['PHP_SELF'])=='add_restaurant_copoun_code.php' || basename($_SERVER['PHP_SELF'])=='add_restaurant_copoun_code.php#manage') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-qrcode icon-white"></i>Coupon <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="add_restaurant_copoun_code.php">New Restaurant Coupon</a></li>
							<li><a href="add_restaurant_copoun_code.php#manage">Display Restaurant Coupon</a></li>
							
						</ul>
					</li>
                   <li <?php if(basename($_SERVER['PHP_SELF'])=='add_restaurant_offer.php' || basename($_SERVER['PHP_SELF'])=='manage_restaurant_offer.php') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th icon-white"></i>Restaurant Discount <b class="caret"></b></a>
						<ul class="dropdown-menu">
                        <li><a href="create_restaurantOfferType.php">Restaurant Offer Type</a></li>
                         <li><a href="create_restaurantOfferType.php#manage">Manage Restaurant Offer Type</a></li>
							<li><a href="add_restaurant_offer.php">New Restaurant Discount</a></li>
							<li><a href="manage_restaurant_offer.php">Display Restaurant Discount</a></li>
                           <?php /*?> <li><a href="menuofferName.php">New Menu Offer Title</a></li>
                            <li><a href="manage_menuOffer.php">Manage Menu Offer Title</a></li>
                            <?php */?>
                            
							
						</ul>
					</li>
                   
                
                 
                   
                    <li <?php if(basename($_SERVER['PHP_SELF'])=='add_country.php' || basename($_SERVER['PHP_SELF'])=='add_country.php#manage' || basename($_SERVER['PHP_SELF'])=='add_state.php' || basename($_SERVER['PHP_SELF'])=='add_state.php#manage' || basename($_SERVER['PHP_SELF'])=='add_city.php' || basename($_SERVER['PHP_SELF'])=='add_city.php#manage' || basename($_SERVER['PHP_SELF'])=='add_zipcode.php' || basename($_SERVER['PHP_SELF'])=='manage_zipcode.php#manage' || basename($_SERVER['PHP_SELF'])=='add_state.php') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe icon-white"></i>Location <b class="caret"></b></a>
						<ul class="dropdown-menu">
								<li><a  href="add_country.php">New Country</a></li>
                                <li><a  href="add_country.php#manage">Manage Country</a></li>
                                <li><a  href="add_state.php">New State</a></li>
                                <li><a  href="add_state.php#manage">Manage State</a></li>
                                <li><a  href="add_city.php">New City</a></li>
                                <li><a  href="add_city.php#manage">Manage City</a></li>
                                 <li><a  href="add_zipcode.php">New Zipcode</a></li>
                                <li><a  href="manage_zipcode.php">Manage Zipcode</a></li>
							
						</ul>
					</li>
					
                    <li <?php if(basename($_SERVER['PHP_SELF'])=='all_restaurant_order.php' || basename($_SERVER['PHP_SELF'])=='Today_restaurantOrder.php' || basename($_SERVER['PHP_SELF'])=='Weekly_restaurantOrder.php'  || basename($_SERVER['PHP_SELF'])=='Monthly_restaurantOrder.php'  || basename($_SERVER['PHP_SELF'])=='Yearly_restaurantOrder.php') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-shopping-cart icon-white"></i> Orders <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="all_restaurant_order.php">All Orders</a></li>
							<li><a href="Today_restaurantOrder.php">Today Orders</a></li>
							<li><a href="Weekly_restaurantOrder.php">Weekly Orders</a></li>
							<li><a href="Monthly_restaurantOrder.php">Monthly Orders</a></li>
                            <li><a href="Yearly_restaurantOrder.php">Yearly Orders</a></li>
						</ul>
					</li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=='all_restaurant_order_print.php' || basename($_SERVER['PHP_SELF'])=='Today_restaurantOrder_print.php' || basename($_SERVER['PHP_SELF'])=='Weekly_restaurantOrder_print.php'  || basename($_SERVER['PHP_SELF'])=='Monthly_restaurantOrder_print.php'  || basename($_SERVER['PHP_SELF'])=='Yearly_restaurantOrder_print.php') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i>Report Print<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="all_restaurant_order_print.php">All Orders</a></li>
							<li><a href="Today_restaurantOrder_print.php">Today Orders</a></li>
							<li><a href="Weekly_restaurantOrder_print.php">Weekly Orders</a></li>
							<li><a href="Monthly_restaurantOrder_print.php">Monthly Orders</a></li>
                            <li><a href="Yearly_restaurantOrder_print.php">Yearly Orders</a></li>
						</ul>
					</li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=='site_setting.php' || basename($_SERVER['PHP_SELF'])=='change_password.php' || basename($_SERVER['PHP_SELF'])=='email_setting.php' || basename($_SERVER['PHP_SELF'])=='orderstatussetting.php' || basename($_SERVER['PHP_SELF'])=='payment_setting.php' || basename($_SERVER['PHP_SELF'])=='social_mediaSetting.php' || basename($_SERVER['PHP_SELF'])=='adminLanguageTranslate.php') { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; }?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs icon-large"></i> Settings <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="site_setting.php">General</a></li>
							<li><a href="change_password.php">Account Settings</a></li>
							<!--<li><a href="icon_setting.php">Icon Setting</a></li>-->
							<li><a href="email_setting.php">Email Settings</a></li>
                             <li><a href="orderstatussetting.php">Order Status Setting</a></li>
                            <li><a href="payment_setting.php">Payment Setting</a></li>
                             <li><a href="social_mediaSetting.php">Social Media Setting</a></li>
							<li><a href="site_setting.php">Site Settings</a></li>
                            <li><a href="adminLanguageTranslate.php">Language Settings</a></li>
						</ul>
					</li>
                   
					<li class="divider-vertical"></li>
					<li><a href="logout.php"><i class="icon-signout icon-large"></i> Logout</a></li>
				</ul>
			</div>
		</div><!-- ./ top navbar -->
	</div>
    <?php include('config1.php'); ?>