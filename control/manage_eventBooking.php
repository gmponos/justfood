<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantEventOnline","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantEventOnline` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_eventBooking.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantEventOnline` set ipblock='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_eventBooking.php");
		}
	}
	
	 // redirent after deleting
}


if(isset($_POST['dactivateall'])) 
{
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantEventOnline` set ipblock='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_eventBooking.php");
		}
	}
	
	 // redirent after deleting
}

 ?>	
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Event Booking</a></li>
						</ul>

						<div class="tab-content"  style="height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Event Booking</a>
											</div>
										</div>
                                         <div>  
										<?php if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> Manage Event Booking has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />Manage Event Booking Detail is already exit.
		                                     </div>
                                            <?php } ?>
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Manage Event Booking has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Manage Event Booking has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
										<div class="row-fluid">
    <div class="span12">
     <?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantEventOnline";
		
		$url="manage_eventBooking.php?contact=1&";
		$where="1";
		$qur="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
    

		  <form name="frmproduct" method="post">
										<table class="table table-bordered">
			
				<?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="9" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Manage Event Booking" value="Delete All" onClick="return confirm('Please select a Manage Event Booking(s) to delete.');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Manage Event Booking" value="Activate All" Coupon Code="return confirm('Please select a Manage Event Booking(s) to delete.');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Manage Event Booking" value="Deactivate All" onClick="return confirm('Please select a Manage Event Booking(s) to delete.');"  type="submit"></td></tr>
                                                    <?php } ?>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
                                                    <th>Restaurant</th>
                                                    <th>Name</th>
													<th>Email</th>
                                                    <th>Mobile</th>
                                                  
                                                    <th>IP</th>
													<th>Action</th>
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
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
                                                    
                                                     <td><?php echo ucwords($row['restaurant_name']);?></td>
                                                     <td><?php echo ucwords($row['EventName']);?></td>
                                                      <td><?php echo $row['EventEmail'];?></td>
													<td><?php echo ucwords($row['EventContactNo']);?></td>
                                                   
													<td><?php echo ucwords($row['ip']);?></td>
                                                
													<td>	
                         <a href="Eventsend_message.php?ViewId=<?php echo $row['id'];?>" class="btn btn-primary" title="Send Message Manage Event Booking">View/Send Message</a>
						<a href="InsertPhp.php?tag=ResEventBookDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Manage Event Booking" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                           
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="9" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Manage Event Booking is available in current Database.</strong></td></tr>
                                                <?php } ?>
                                                
												
											</tbody>
										</table>
                                       
                                        </form>
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
