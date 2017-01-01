<?php include('header.php'); ?>
<?php include('session.php')?>
		<div id="container">
    		<div id="header">
				<a href="" id="header-image" target="_blank"></a>
				<ul class="nav">
						<?php include('top_menu.php'); ?>
				</ul>
				<ul class="subnav">
								</ul>
			</div>
			
			<div class="page-box">
				<div class="page-top">
					<p class="page-title">
						<span class="title-left"></span>
						<span class="title-text">Home</span>
						<span class="title-right"></span>						
					</p>
				</div>
				<div class="page-middle">
			
					<div id="content">
						<a class="home" href="manage_booking.php"><span class="home-bookings"></span>View and manage bookings</a>
	<a class="home" href="all_rooms.php"><span class="home-rooms"></span>Room, Extras and Prices</a>
	<a class="home" href="reports.php"><span class="home-reports"></span>Reports</a>
	<a class="home" href="invoice.php"><span class="home-invoices"></span>Invoices</a>
	<a class="home" href="general_setting.php"><span class="home-options"></span>Options and Account Details</a>
	<a class="home" href="faq_manage.php"><span class="home-install"></span>FAQ</a>
    <a class="home" href="privacy_policy.php"><span class="home-install"></span>Privacy Policy</a>
    <a class="home" href="terms_condition.php"><span class="home-install"></span>Terms & Condtion</a>
    <a class="home" href="change_pass.php"><span class="home-install"></span>Change Password</a>
						</div> <!-- content -->
					
				</div> <!-- page-middle -->
				<div class="page-bottom"></div>
			</div> <!-- page-box -->
			
			<?php include('footer.php'); ?>
		
		</div> <!-- container -->
	</body>
</html>