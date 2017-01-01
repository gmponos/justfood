<style type="text/css">
.ownbtn{
outline: 2px;
padding: .7em 1em;
text-decoration: none;
color: #fff;
font-weight: bold;
background:url(images.jpg);
border-bottom: 1px solid #E7E1E1;
}
.select44{
outline: 2px;
padding: .7em 1em;
text-decoration: none;
color: #fff;
font-weight: bold;
background:url(images.jpg);
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
				<img class="avatar" src="../control/restaurantlogoimg/small/<?php echo $AdminDataRestauarnt['restaurant_Logo'];?>" title="<?php echo $AdminDataRestauarnt['restaurant_name']; ?>" alt="<?php echo $AdminDataRestauarnt['restaurant_name']; ?>" style="width:165px; height:88px; margin-bottom:10px;" >
				
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
              
                
              
                
                 
                
                  
				<!-- accordion content -->
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbaSeven"><i class="icon-sitemap"></i> Menu Category</a>
					</div>
					<div id="sbaSeven" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="menu-entry-create-categories.php"><i class="icon-file icon-large"></i> Add/View Menu Category</a></li>
								
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
             
                 <div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle ownbtn " data-toggle="collapse" data-parent="#sbAccordion" href="#sbasbaSixteen">
                       <img src="icons/waiter.png" style="margin-left:-5px; margin-right:3px;" /> Employee</a>
					</div>
					<div id="sbasbaSixteen" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li><a tabindex="-1" href="add_new_employee.php"><i class="icon-file icon-large"></i> New Employee</a></li>
                             
                                  <li><a tabindex="-1" href="manage_employee_restaurant.php"><i class="icon-file icon-large"></i> Manage Employee</a></li>
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
				</div>
                
                
                
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
                
              
                
              
			</div>       
		</div>