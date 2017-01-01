<?php include('route/header.php');
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantAdd` WHERE `id` = '$id'");
		   mysql_query("delete from tbl_restaurantDeals where RestaurantDealsId='$id'");
			                 mysql_query("delete from tbl_restaurantCoupon where RestauranCouponId='$id'");
				             mysql_query("delete from tbl_restaurantBank where restaurant_id='$id'");
					         mysql_query("delete from tbl_restaurantGallery where restaurant_id='$id'");
						     mysql_query("delete from tbl_restaurantEvent where RestaurantEventID='$id'");
							 mysql_query("delete from tbl_restaurantOffer where restaurant_id='$id'");
							 mysql_query("delete from tbl_restaurantOwner where restaurant_id='$id'");
							 mysql_query("delete from tbl_restaurantSEO where restaurant_id='$id'");
							 mysql_query("delete from tbl_restaurantDeliveryArea where restaurant_id='$id'");
							 mysql_query("delete from tbl_resDeliveryBoy where DeliveryBoyRestaurantID='$id'");
							 mysql_query("delete from tbl_restbuffetTime where restaurant_id='$id'");
							 mysql_query("delete from tbl_restalcoholTime where restaurant_id='$id'");
							 mysql_query("delete from tbl_restDeliveryTime where restaurant_id='$id'");
							 mysql_query("delete from tbl_resttablebookingTime where restaurant_id='$id'");
							 mysql_query("delete from tbl_restTakeawayTime where restaurant_id='$id'");
							 mysql_query("delete from tbl_restMenuCategory where restaurantMenuID='$id'");
							 mysql_query("delete from tbl_restaurantMenuItem where RestaurantPizzaID='$id'");
								
		if(!$query) { 
		                  
		header("location:manage_restaurant.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantAdd` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_restaurant.php");
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
		$query = mysql_query("update `tbl_restaurantAdd` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_restaurant.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Restaurant</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Restaurant </a>
											</div>
										</div>
                                        
                                         <div>  
										<?php if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant is already exit.
		                                     </div>
                                            <?php } ?>
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
										<div class="row-fluid">
    <div class="span12">
     <?php
        if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="restaurant_name";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit =30;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination 
        $statement = "tbl_restaurantAdd";
		
	
		if($_GET['statusid']!='')
		{
		$statuSID="and status='".$_GET['statusid']."' ";
		}	
		
		
		$where=" id='".$_SESSION['restaurant_id']."' $statuSID  ";
		$url="manage_restaurant.php?restaurant_id=".$_SESSION['restaurant_id']."&statusid=".$_GET['statusid']."&";
		
		
		$qur="SELECT * FROM {$statement} where id='".$_SESSION['restaurant_id']."' $statuSID   $sortBy LIMIT {$startpoint} , {$limit}";
		
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
 <script  type="text/javascript"  language="javascript">


function submitURL(Dvalue,str,restaurantState1,restaurantCity1,statusid1)
{
window.location.href="manage_restaurant.php?restaurantState="+restaurantState1+"&restaurantCity="+restaurantCity1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
</script>

 
    
     
                                        
                                        
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant" value="Delete All" onClick="return confirm('Are You sure to deleted all selected restaurant');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activated All Restaurant" value="Activated All" onClick="return confirm('Are You sure to Activated all selected restaurant');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivated All Restaurant" value="Deactivated All" onClick="return confirm('Are You sure to Deactivated all selected restaurant');"  type="submit"></td></tr>
                                                    <?php } ?>
												<tr>
                                              <?php /*?>  <th><input type="checkbox" id="check_all" value=""></th><?php */?>
													<th>#</th>
													<th><?php
													if($_GET['sort']=='asc'){
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													elseif($_GET['sort']=='desc'){
													$pl='asc';
													$imgSort='<img src="sortdesc.png" style="float:right;" />';
													}
													else
													{
													$pl='asc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
                                                     <a  style="cursor:pointer;">Restaurant Name 
                                                     <?php echo $imgSort;?>
                                                   
                                                     </a>
                                                     
                                                     </th>
                                                    <th><a style="cursor:pointer;">Address<?php echo $imgSort;?>
                                                   
                                                     </a></th>
                                                   
													<th> <a style="cursor:pointer;">Restaurant City 
                                                     <?php echo $imgSort;?>
                                                   
                                                     </a>
                                                     </th>
                                                    <th> <a  style="cursor:pointer;">Owner</a></th>
													<th><a  style="cursor:pointer;">Action</a></th>
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
                                                <?php /*?><td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td><?php */?>
													<td><?php echo $count; ?></td>
                                                    <td><?php echo ucwords($row['restaurant_name']);?></td>
													<td><?php echo ucwords($row['restaurant_address']);?></td>
												
                                                <td><?php echo ucwords($row['restaurantCity']);?></td>
                                                 <td><?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$row['id']));
													echo ucwords($StQuery['restaurant_OwnerFirstName']);?> <?php echo ucwords($StQuery['restaurant_OwnerLastName']); ?></td>
													<td>	<a href="add_new_restaurant.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Restaurant">View/Edit</a>
                        <?php /*?> <a href="restaurant_detail.php?ViewId=<?php echo $row['id'];?>" class="btn btn-primary" title="View Restaurant">View</a><?php */?>
						<?php /*?><a href="InsertPhp.php?tag=RestaurantDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Restaurant" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a><?php */?>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=RestaurantActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=RestaurantActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant">
                        Deactivated</a>
                          <?php } ?>
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
