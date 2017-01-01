<style type="text/css">
.ownbtn{
outline: 2px;
padding: .7em 1em;
text-decoration: none;
color: #fff;
font-weight: bold;
background:#921300;
border-bottom: 1px solid #E7E1E1;
}
.select44{
outline: 2px;
padding: .7em 1em;
text-decoration: none;
color: #fff;
font-weight: bold;
background:#921300;
border-bottom: 1px solid #E7E1E1;
}
.ownbtn:hover{
color:#FFFFFF;
border-color: #7dc9e2;
  outline-color: #dceefc;
  outline-offset: 0;
}
</style>
<div id="main-sidebar">
			<div class="user-profile">
				<img class="avatar" src="sitelogo/<?php echo $AdminDataLoginVal['website_logo']; ?>" style="width:180px; height:95px; margin-bottom:10px;" >
				
				
			</div>
            <br />
			<div class="accordion" id="sbAccordion">
			
				<!-- accordion content -->
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle select44" href="webindex.php"><i class="icon-tasks"></i> Dashboard</a>
					</div>
				</div><!-- ./ accordion content -->
<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaNineteen200"><i class="icon-music"></i> Restaurant Event </a>
					</div>
					<div id="sbaNineteen200" class="accordion-body collapse">
						<div class="accordion-inner">
                        
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a tabindex="-1" href="add_restaurant_event.php"><i class="icon-file icon-large"></i> New Restaurant Event</a></li>
                                 <li><a tabindex="-1" href="manage_restaurant_event.php#manage"><i class="icon-file icon-large"></i> Display Restaurant Event</a></li>
                                 <li><a tabindex="-1" href="manage_eventBooking.php"><i class="icon-file icon-large"></i>Online Event Enquiry</a></li>
                            	</ul>
						</div>
					</div>
				</div>
				 <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaNineteen2">
                        <!--<i class="icon-file"></i>--><img src="icons/flashbanner.png" style="margin-left:-5px; margin-right:3px" />  Flash Banner </a>
					</div>
					<div id="sbaNineteen2" class="accordion-body collapse">
						<div class="accordion-inner">
                        
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a tabindex="-1" href="add_ManageBackgroundImg.php"><i class="icon-file icon-large"></i> Add New Flash Image</a></li>
                                 <li><a tabindex="-1" href="add_ManageBackgroundImg.php#manage"><i class="icon-file icon-large"></i> Manage Flash Image</a></li>
                            	</ul>
						</div>
					</div>
				</div>
                
                 <?php /*?><div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaNineteen288">
                        <!--<i class="icon-legal"></i>--><img src="icons/combanner.png" style="margin-left:-3px; margin-right:3px;" />  Commercial Banner </a>
					</div>
					<div id="sbaNineteen288" class="accordion-body collapse">
						<div class="accordion-inner">
                        
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a tabindex="-1" href="add_restaurantBanner.php"><i class="icon-file icon-large"></i> Restaurant Banner</a></li>
                                 <li><a tabindex="-1" href="manage_commercialBanner.php"><i class="icon-file icon-large"></i> Manage Commercial Banner</a></li>
                                <li><a tabindex="-1" href="addBannerByCity.php"><i class="icon-file icon-large"></i> Banner by City</a></li>
                                 <li><a tabindex="-1" href="manage_commercialBannerCity.php"><i class="icon-file icon-large"></i> City Banner</a></li>
                                   <li><a tabindex="-1" href="addBannerbyCategoryNService.php"><i class="icon-file icon-large"></i> Banner by Category</a></li>
                                    <li><a tabindex="-1" href="manage_commercialBannerCategory.php"><i class="icon-file icon-large"></i> Category Wise Banner</a></li>
                                    <li><a tabindex="-1" href="addBannerbyCuisineNfood.php"><i class="icon-file icon-large"></i> Banner by Cuisine</a></li>
                                
                            	</ul>
						</div>
					</div>
				</div><?php */?>
                     <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaNineteen">
                       <img src="icons/resttype.png" style="margin-left:-5px; margin-right:3px;" /> Restaurant Type </a>
					</div>
					<div id="sbaNineteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_type.php"><i class="icon-file icon-large"></i> New Restaurant Type</a></li>
                                <li><a tabindex="-1" href="manage_restaurant_type.php"><i class="icon-file icon-large"></i> Manage Restaurant Type</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                
                  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaTwo12">
                     <img src="icons/restservice.png" style="margin-left:-5px; margin-right:3px;" /> Restaurant Service </a>
					</div>
					<div id="sbaTwo12" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_service.php"><i class="icon-file icon-large"></i> New Restaurant Service</a></li>
                                <li><a tabindex="-1" href="manage_restaurant_service.php"><i class="icon-file icon-large"></i >Manage Restaurant Service</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
					
			
               
                 <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaFive"><i class="icon-picture"></i> Restaurant Gallery</a>
					</div>
					<div id="sbaFive" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_gallery.php"><i class="icon-file icon-large"></i> New Restaurant Gallery</a></li>
								<li><a tabindex="-1" href="manage_restaurant_gallery.php"><i class="icon-file icon-large"></i> Manage Restaurant Gallery</a></li>
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaSix">
                        <img src="icons/map.png" style="margin-left:-5px; margin-right:5px;" /> Delivery Area</a>
					</div>
					<div id="sbaSix" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_delivery.php"><i class="icon-file icon-large"></i> New Restaurant Delivery</a></li>
								<li><a tabindex="-1" href="manage_restaurant_delivery.php"><i class="icon-file icon-large"></i> Manage Restaurant Delivery</a></li>
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaSix44"><!--<i class="icon-calendar"></i>--><img src="icons/resttime.png" style="margin-left:-5px; margin-right:3px;" /> Restaurant Time </a>
					</div>
					<div id="sbaSix44" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_timming.php"><i class="icon-file icon-large"></i>Time Table</a></li>
							
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                 <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaThirty">
                        <img src="icons/food.png" style="margin-left:-5px; margin-right:3px;" width="15" height="15" />  Cuisine</a>
					</div>
					<div id="sbaThirty" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_cuisine.php"><i class="icon-file icon-large"></i> New Cuisine</a></li>
								<li><a tabindex="-1" href="add_restaurant_cuisine.php#manage"><i class="icon-file icon-large"></i> Manage Cuisine</a></li>
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                    <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaFourty"><img src="icons/wifi.png" style="margin-left:-5px; margin-right:3px;" />  Facilities</a>
					</div>
					<div id="sbaFourty" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_facilities.php"><i class="icon-file icon-large"></i> New Facilities</a></li>
								<li><a tabindex="-1" href="add_restaurant_facilities.php#manage"><i class="icon-file icon-large"></i> Manage Facilities</a></li>
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                
                
                
              
                
                 <?php /*?> <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaThree15"><i class="icon-tag"></i>  Restaurant Deals</a>
					</div>
					<div id="sbaThree15" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_new_restaurant_daily_deals.php"><i class="icon-file icon-large"></i>New Restaurant Deals</a></li>
								<li><a tabindex="-1" href="manage_restaurant_daily_deals.php"><i class="icon-file icon-large"></i>Manage Restaurant Deals</a></li>
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content --><?php */?>
				
                 <?php /*?>  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbasbaFiveteen"><i class="icon-pushpin"></i>Directory</a>
					</div>
					<div id="sbasbaFiveteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_new_restaurant_directory.php"><i class="icon-file icon-large"></i>New Restaurant Directory</a></li>
                                <li><a tabindex="-1" href="manage_restaurant_directory.php"><i class="icon-file icon-large"></i>Manage Restaurant Directory</a></li>
                            	</ul>
						</div>
					</div>
				</div><?php */?><!-- ./ accordion content -->

                
                  
				<!-- accordion content -->
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaSeven"><i class="icon-sitemap"></i> Menu Category</a>
					</div>
					<div id="sbaSeven" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="menu-entry-create-categories.php"><i class="icon-file icon-large"></i> Menu Category</a></li>
								<li><a tabindex="-1" href="menu-entry-create-categories.php"><i class="icon-file icon-large"></i> Manage Menu Category</a></li>
							
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
				
                
                
                <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaSevenTod"><i class="icon-sitemap"></i >Food Deals</a>
					</div> 
					<div id="sbaSevenTod" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_Food_Deals.php"><i class="icon-file icon-large"></i> Add Food Deals</a></li>
								<li><a tabindex="-1" href="add_restaurant_Food_Deals.php#manage"><i class="icon-file icon-large"></i> Manage Food Deals</a></li>
							
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
				
                     <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbasbaFiveteen"><i class="icon-pushpin"></i> Addons</a>
					</div>
					<div id="sbasbaFiveteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="ResatuarantExtraAddOn.php"><i class="icon-file icon-large"></i> New Addons</a></li>
                                <li><a tabindex="-1" href="ManageResatuarantExtraAddOn.php"><i class="icon-file icon-large"></i> Manage Addons</a></li>
                            	</ul>
						</div>
					</div>
				</div>
               
                
                   <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaNine"><i class="icon-user-md"></i> Restaurant Owner</a>
					</div>
					<div id="sbaNine" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_owner.php"><i class="icon-file icon-large"></i> Create New Owner</a></li>
								<li><a tabindex="-1" href="manage_restaurant_owner.php"><i class="icon-file icon-large"></i> Manage Owner</a></li>
<?php /*?>                                <li><a tabindex="-1" href="restaurant_owner_setting.php"><i class="icon-file icon-large"></i> Owner Permission</a></li>
<?php */?>							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                
                   <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaTen"><i class="icon-user"></i> Admin Management</a>
					</div>
					<div id="sbaTen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_admin.php"><i class="icon-file icon-large"></i> Create New Administrator</a></li>
                                	<li><a tabindex="-1" href="manage_restaurant_admin.php"><i class="icon-file icon-large"></i> Manage Administrator</a></li>
                                    	<!--<li><a tabindex="-1" href="admin_restaurant_setting.php"><i class="icon-file icon-large"></i>Permission for access</a></li>-->
							
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                
                   <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaEleven"><i class="icon-group"></i> User Management</a>
					</div>
					<div id="sbaEleven" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_restaurant_user.php"><i class="icon-file icon-large"></i> Create New User</a></li>
                                <li><a tabindex="-1" href="manage_user.php"><i class="icon-file icon-large"></i> Manage User</a></li>
                                 <li><a tabindex="-1" href="addUserAddress.php"><i class="icon-file icon-large"></i>Add User Address</a></li>
                                  <li><a tabindex="-1" href="manageUserAddress.php"><i class="icon-file icon-large"></i> Manage User Address</a></li>
							
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                
                
                     <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaThirdteen"><i class="icon-columns"></i>  Content</a>
					</div>
					<div id="sbaThirdteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="cms_about.php"><i class="icon-file icon-large"></i> About Us</a></li>
                                <li><a tabindex="-1" href="cms_howtowork.php"><i class="icon-file icon-large"></i> How To Works</a></li>
                                <li><a tabindex="-1" href="cms_press.php"><i class="icon-file icon-large"></i> Press</a></li>
                                <li><a tabindex="-1" href="cms_online_payment.php"><i class="icon-file icon-large"></i> Secure Online Payment</a></li>
                                <li><a tabindex="-1" href="service_guarantee.php"><i class="icon-file icon-large"></i> Service Guarantee</a></li>
                                <li><a tabindex="-1" href="refund_guarantee.php"><i class="icon-file icon-large"></i> Refund Guarantee</a></li>
                                 <li><a tabindex="-1" href="cms_career.php"><i class="icon-file icon-large"></i> Career</a></li>
                                <li><a tabindex="-1" href="cms_termsandcondition.php"><i class="icon-file icon-large"></i> Terms & Conditions</a></li>
                                 <li><a tabindex="-1" href="cms_privacy.php"><i class="icon-file icon-large"></i> Privacy Policy</a></li>
                                <li><a tabindex="-1" href="cms_faq.php"><i class="icon-file icon-large"></i> Create FAQ</a></li>
                                <li><a tabindex="-1" href="manageFaq.php"><i class="icon-file icon-large"></i> Manage FAQ</a></li>
                                <li><a tabindex="-1" href="cms_declaimer.php"><i class="icon-file icon-large"></i> Disclaimer</a></li>
                                 <li><a tabindex="-1" href="how_to_use_cookie.php"><i class="icon-file icon-large"></i> How do we use Cookis</a></li>
                                 <li><a tabindex="-1" href="list_a_restaurant_cms.php"><i class="icon-file icon-large"></i> List a Restaurant</a></li>
                                  <li><a tabindex="-1" href="list_a_franchise_cms.php"><i class="icon-file icon-large"></i> Franchisee Cms</a></li>
                                
							</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                <div class="accordion-group">
					<div class="accordion-heading">
				<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaEight"><i class="icon-star"></i>    Rating & Review</a>
					</div>
					<div id="sbaEight" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <li><a tabindex="-1" href="write_restaurantReview.php"><i class="icon-file icon-large"></i> Write Rating & Review</a></li>
								<li><a tabindex="-1" href="manage_RatingReview.php"><i class="icon-file icon-large"></i> Rating & Review</a></li>
							
							</ul>
						</div>
					</div>
				</div>
                <?php /*?> <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaEight"><i class="icon-legal"></i> Addons</a>
					</div>
					<div id="sbaEight" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="buttons.php"><i class="icon-file icon-large"></i>New Addons</a></li>
							<li><a tabindex="-1" href="buttons.php"><i class="icon-file icon-large"></i>Manage Addons</a></li>
							</ul>
						</div>
					</div>
				</div><?php */?><!-- ./ accordion content -->
                  <?php /*?><div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaTwo13"><i class="icon-briefcase"></i>&nbsp;Enquiry </a>
					</div>
					<div id="sbaTwo13" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="manage_party_booking.php"><i class="icon-file icon-large"></i>Party Booking</a></li>
                                <li><a tabindex="-1" href="manage_plot_booking.php"><i class="icon-file icon-large"></i>Plot Booking</a></li>
                                <li><a tabindex="-1" href="manage_hall_booking.php"><i class="icon-file icon-large"></i>Banquet Hall Booking</a></li>
                                <li><a tabindex="-1" href="manage_outdoor_booking.php"><i class="icon-file icon-large"></i>Outdoor Caterers</a></li>
                            	</ul>
						</div>
					</div>
				</div><?php */?><!-- ./ accordion content -->
                 <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbasbaSixteen">
                       <img src="icons/waiter.png" style="margin-left:-5px; margin-right:3px;" /> Employee</a>
					</div>
					<div id="sbasbaSixteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_new_employee.php"><i class="icon-file icon-large"></i> New Employee</a></li>
                                <li><a tabindex="-1" href="manage_employee.php"><i class="icon-file icon-large"></i> Manage Employee</a></li>
                                  <li><a tabindex="-1" href="manage_employee_restaurant.php"><i class="icon-file icon-large"></i> Manage Restaurant Employee</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                 
                  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaSeventeen">
                        <img src="icons/deliveryboy.png" style="margin-left:-5px;" width="18" height="18" />Delivery Boy </a>
					</div>
					<div id="sbaSeventeen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_new_deliveryboy.php"><i class="icon-file icon-large"></i> New Delivery Boy</a></li>
                                <li><a tabindex="-1" href="manage_deliveryboy.php"><i class="icon-file icon-large"></i> Manage Delivery Boy</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                <!--
                  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaEightteen"><i class="icon-file"></i>  &nbsp;Background Image </a>
					</div>
					<div id="sbaEightteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="buttons.php"><i class="icon-file icon-large"></i>New Landing Background</a></li>
                                <li><a tabindex="-1" href="manage_deliveryboy.php"><i class="icon-file icon-large"></i>Manage Landing Background</a></li>
                            	</ul>
						</div>
					</div>
				</div>--><!-- ./ accordion content -->
                
                
               
                
                
                
                 <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaTwo15"><i class="icon-time"></i> Table Booking </a>
					</div>
					<div id="sbaTwo15" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <li><a tabindex="-1" href="createRestaurantBooking.php"><i class="icon-file icon-large"></i> Create Table Booking</a></li>
								<li><a tabindex="-1" href="manage_table_booking.php"><i class="icon-file icon-large"></i> Manage Table Booking</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
                
                  <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaTwo16"><i class="icon-money"></i> Income</a>
					</div>
					<div id="sbaTwo16" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="restaurant_invoice.php"><i class="icon-file icon-large"></i> Invoice</a></li>
                                	<li><a tabindex="-1" href="RestaurantCommession.php"><i class="icon-file icon-large"></i> Commission Report</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
                
              
                
                <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaTwo19"><i class="icon-envelope"></i> Email Management</a>
					</div>
					<div id="sbaTwo19" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="manage_newselleter.php"><i class="icon-file icon-large"></i> Newsletter</a></li>
                                	<li><a tabindex="-1" href="manage_contact_us.php"><i class="icon-file icon-large"></i>Online Contact</a></li>
                                     <li><a tabindex="-1" href="manage_Getfranchise.php"><i class="icon-file icon-large"></i> Get A Franchise</a></li>
                                       <li><a tabindex="-1" href="manage_Getlisting.php"><i class="icon-file icon-large"></i> Restaurant List Enquiry</a></li>
                            	</ul>
						</div>
					</div>
				</div><!-- ./ accordion content -->
				
			
			</div>       
		</div>