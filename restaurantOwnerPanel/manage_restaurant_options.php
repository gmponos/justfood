<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'");
 $_GET['restaurant_id']=$_SESSION['restaurant_id'];
 
?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Restaurant With Option</a></li>
						</ul>

						<div class="tab-content"  style="min-height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Restaurant With Option </a>
											</div>
										</div>
										<div class="row-fluid">
                                      <?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantAdd";
		if($_GET['statusid']!='')
		{
		$where=" status='".$_GET['statusid']."' ";
		$url="manage_restaurant_options.php?statusid=".$_GET['statusid']."&";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$where=" id='".$_SESSION['restaurant_id']."'";
		$url="manage_restaurant_options.php?Res=1&";
		
		$qur="SELECT * FROM {$statement} where id='".$_SESSION['restaurant_id']."' LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                            
    <div class="span12">
   
    
		<table  class="table table-striped table-condensed table-bordered">
			<thead>
            
				<tr>
				
					<th>Name</th>
				
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
             <?php
		if($numrowdata>0)
			{
            $count=1;
		
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
				<tr>
				
					<td>
                    <img src="../control/restaurantlogoimg/small/<?php echo $row['restaurant_Logo'];?>" width="180" height="100" /><br>
                    <p align="center"><strong style="color:#000099; font-size:16px;" ><?php echo ucwords($row['restaurant_name']);?></strong></p>
                    <p><?php echo ucwords($row['restaurant_address']);?></p>
                    </td>
                    
					<td>
                    <p>
						<?php /*?><a href="restaurant_detail.php?ViewId=<?php echo $row['id'];?>" class="btn btn-info" title="Display Restaurant" style="padding:10px; width:100px;">View</a><?php */?>
                          <a href="menu-entry-create-categories.php?RestaurantPizzaID=<?php echo $row['id'];?>&restaurant_state=<?php echo $row['restaurantState'];?>&restaurant_city=<?php echo $row['restaurantCity'];?>" class="btn btn-empatenam" title="Select Restaurant for Ice Cream Menu Entry" style="padding:10px; width:120px;">Menu Category</a>
                       
						<?php /*?><a href="qc_normal_item_entry.php?RestaurantPizzaID=<?php echo $row['id'];?>" class="btn btn-primary" title="Select Restaurant for Menu Entry" style="padding:10px; width:140px;">Select for Menu Entry</a>
                        <a href="qc_pizza_item_entry.php?RestaurantPizzaID=<?php echo $row['id'];?>" class="btn btn-tigadua" title="Select Restaurant for Pizza Menu Entry" style="padding:10px; width:180px;">Select for Pizza Menu Entry</a>
                      
                        <?php */?>
                        </p>
                        <p>
                       <a href="update_seo.php?SEORestaurantId=<?php echo $row['id'];?>" class="btn btn-warning" title="Update SEO Content for selecting Restaurant" style="padding:10px; width:100px;">SEO Content</a>
                        <a href="add_restaurant_delivery.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-duatiga" title="Select fro Delivery Area" style="padding:10px; width:100px;">Delivery Area</a>
                        <a href="all_restaurant_order_print.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-empatsatu" title="Display Income Report" style="padding:10px; width:100px;">Income Report</a>
                         <a href="add_restaurant_gallery.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-duadelapan" title="Select for Image Gallery Uploading" style="padding:10px; width:100px;">Image Gallery</a>
                           <a href="add_restaurant_copoun_code.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-duaenam" title="Create Copoun Code for selecting Restaurant" style="padding:10px; width:100px;">Coupon Code</a>
                         </p>
                         <p>
                          <a href="add_restaurant_event.php?RestaurantEventID=<?php echo $row['id'];?>" class="btn btn-empatenam" title="Create Event for selecting Restaurant" style="padding:10px; width:100px;">Event</a>
                        <a href="add_restaurant_offer.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-duasembilan" title="Create Offer for selecting Restaurant" style="padding:10px; width:100px;">Discount Offer</a>
                       <?php /*?> <a href="add_new_restaurant_daily_deals.php?RestaurantDealsId=<?php echo $row['id'];?>" class="btn btn-enambelas" title="Create Daily Deals for selecting Restaurant" style="padding:10px; width:100px;">Daily Deals</a><?php */?>
                         <a href="all_restaurant_order.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-empatsembilan" title="Display Order Report for selecting Restaurant" style="padding:10px; width:100px;">Order Report</a>
                          <a href="add_restaurant_Food_Deals.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-duaenam" title="Create Food Deals for selecting Restaurant" style="padding:10px; width:100px;">Food Deals</a>
                        
                       </p>
                       <p>
                       
                          </p>
					</td>
				</tr>
                  <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant is available in current Database.</strong></td></tr>
                                                <?php } ?>
                
				
			</tbody>
		</table>
          <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php echo pagination($statement,$where,$limit,$page,$url);?></td></tr>
                                        </table>
		
	</div>
</div>
									</div>
								
									
									
									
								
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include('route/footer.php'); ?>

	<!-- required js files -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	

	<!-- charts plugin -->
	<script src="app/plugins/jquery.peity.min.js"></script>
	<script src="app/plugins/jquery.knob.js"></script>
	<script src="app/plugins/jqplot/jquery.jqplot.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.highlighter.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.cursor.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.dateAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pieRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.donutRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.barRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pointLabels.min.js"></script>
	
	<!-- form plugins -->
	<script src="app/plugins/jquery.elastic.js"></script>
	<script src="app/plugins/jquery.uniform.js"></script>
	<script src="app/plugins/bootstrap-datepicker.js"></script>
	<script src="app/plugins/jquery.timePicker.min.js"></script>
	<script src="app/plugins/jquery.simple-color-picker.js"></script>
	<script src="app/plugins/chosen.jquery.min.js"></script>
	<script src="app/plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
	<script src="app/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="app/plugins/jquery.limit-1.2.js"></script>
	<script src="app/plugins/formToWizard.js"></script>
	
	<!-- other plugins -->
	<script src="app/plugins/jquery-ui-custom/jquery-ui-1.8.22.custom.min.js"></script>
	<script src="app/plugins/DataTables/media/js/jquery.dataTables.js"></script>	
	<script src="app/plugins/jscrollpane/jquery.mousewheel.js"></script>
	<script src="app/plugins/jscrollpane/jquery.jscrollpane.min.js"></script>	
	<script src="app/plugins/fullcalendar.min.js"></script>

	<script src="assets/js/google-code-prettify/prettify.js"></script>
	
	<script src="app/plugins/jPages.min.js"></script>
	<script src="app/plugins/jquery.masonry.min.js"></script>

	<!-- js for templates -->
	<script src="app/js/custom.js"></script>
</body>
</html>
