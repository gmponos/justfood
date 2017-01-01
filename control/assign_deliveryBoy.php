<?php include('route/header.php'); 

include('route/DB_Functions.php');

   $dbb = new DB_Functions();

 include('route/pagination.php');

mysql_query ("set character_set_results='utf8'"); 

if($_GET['eid']!='')

{

 $CuisineQuery = $dbb->showtabledata("tbl_resDeliveryBoy","id",$_GET['eid']);

 $CuisineData=mysql_fetch_assoc($CuisineQuery);

}

if($_GET['DeliveryBoyRestaurantID']!='')

{

 $CuisineQuery1 = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['DeliveryBoyRestaurantID']);

 $CuisineData1=mysql_fetch_assoc($CuisineQuery1);

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

							<li class="active" ><a href="#mainFormElements"  data-toggle="tab"><i class="icon-file"></i>Assign Order to <?php echo ucwords($CuisineData1['restaurant_name']);?> Delivery Boy</a></li>

						</ul>



						<div class="tab-content"   style="min-height:900px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well">

										<div class="navbar">

											<div class="navbar-inner">

												<a class="brand" href="#">Assign Order to <?php echo ucwords($CuisineData1['restaurant_name']);?> Delivery Boy</a>

											</div>

										</div>

                                         <div>  

										
                                             <?php

											if($_GET['amsg']==1)

											{?>

											<div id="display-success">

			                                 <img src="img/correct.png" alt="Success" />Delivery Boy has been successfully assigned/ignored order.

		                                     </div>

											<?php }?></div>

										<div class="row-fluid">

    <div class="span12">

     <?php

		

		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    	$limit = 10;

    	$startpoint = ($page * $limit) - $limit;

        //to make pagination

        $statement = "tbl_resDeliveryBoy";
if($_GET['orderAssign']!='')
		{
		$assign=" and orderAssign='".$_GET['orderAssign']."'";
		}
		if($_GET['DeliveryBoyRestaurantID']!='')
		{

		

		$url="manage_deliveryboy.php?DeliveryBoyRestaurantID=".$_GET['DeliveryBoyRestaurantID']."&orderAssign=".$_GET['orderAssign']."&";

		$where="DeliveryBoyRestaurantID='".$_GET['DeliveryBoyRestaurantID']."'  $assign ";

		

		$qur="SELECT * FROM {$statement} where DeliveryBoyRestaurantID='".$_GET['DeliveryBoyRestaurantID']."'  $assign LIMIT {$startpoint} , {$limit}";

		}

		
		else

		{

		$url="manage_deliveryboy.php?DeliveryBoy=1&";

		$where=" 1";

		

		$qur="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";

		}

		//echo $qur;

		 $query = mysql_query($qur);

		 $numrowdata=mysql_num_rows($query);

		 

											 ?>
<br />
    

                                      

    

    
		  <form name="frmproduct" method="post">

										<table class="table table-bordered">

			


												<tr>

                                               

                                                       <th>Photo</th>

													<th>Name</th>

                                                    <th>Address</th>

                                                    
													<th>Email ID</th>

                                                    <th>Mobile No</th>

                                                 

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

                                               <td><img src="DeliveryBoyPhoto/<?php echo $row['DeliveryBoyPhoto'];?>" width="70" height="20" /></td>
                                                     <td><?php echo ucwords($row['DeliveryBoyName']);?></td>

                                                      <td><?php echo ucwords($row['DeliveryBoyAddress']);?></td>

													

                                                <td><?php echo ucwords($row['DeliveryBoyEmailID']);?></td>

                                                 <td><?php echo ucwords($row['DeliveryBoyMobileNo']);?></td>

                                                 

													<td>
                                                    <a href="deliveryboyOrderList.php?deliveryboy_id=<?php echo ucwords($row['id']);?>&order_id=<?php echo $_GET['orderid'];?>&restaurant_id=<?php echo $_GET['DeliveryBoyRestaurantID'];?>" class="btn btn-danger" target="_blank" style="color:#ffffff;">Order List Print</a>
                                                  

                            <?php 
							
if($row['orderAssign']==4){?>
<a class="btn btn-duasembilan" href="">Order Delivered Completed by <?php echo ucwords($row['DeliveryBoyName']);?></a>
<?php } else { 
if($row['orderAssign']==0){ ?>
<a href="InsertPhp.php?tag=ResDeliveryBoyActivateAssign&active=1&orderAssign=<?php echo $row['id'];?>&ignore=0&orderid=<?php echo $_GET['orderid'];?>&DeliveryBoyRestaurantID=<?php echo $_GET['DeliveryBoyRestaurantID'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to assign Order to <?php echo ucwords($row['DeliveryBoyName']);?>.');" title="Activate/Deactivate Delivery Boy">Assign Order to <?php echo ucwords($row['DeliveryBoyName']);?></a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResDeliveryBoyActivateAssign&active=0&orderAssign=<?php echo $row['id'];?>&ignore=1&orderid=<?php echo $_GET['orderid'];?>&DeliveryBoyRestaurantID=<?php echo $_GET['DeliveryBoyRestaurantID'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to ignore Order to <?php echo ucwords($row['DeliveryBoyName']);?>.');" title="Activate/Deactivate Delivery Boy">

                        ignore Order to <?php echo ucwords($row['DeliveryBoyName']);?></a>

                          <?php } ?>

<?php } ?>
							
                          
                     </td>

												</tr>

                                                <?php

												$count++;

												 }

												 } else { 

												  ?>

                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Delivery Boy is available in current Database.</strong></td></tr>

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

