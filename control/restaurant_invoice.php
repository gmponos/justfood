<?php include('route/header.php'); 

include('route/DB_Functions.php');

$dbb = new DB_Functions();

include('route/pagination.php');

?>

<div id="page-wrap">

		<!-- left sidebar -->

		<?php include('route/side_bar.php'); ?>		

 

		<div id="main-content">

			<div id="inner">

				

				<div class="container-fluid">

					<div class="tabbable main-tabs">

						<ul class="nav nav-tabs">

							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant Invoice</a></li>

						</ul>



						<div class="tab-content"  style="height:1750px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well">

										<div class="navbar">

											<div class="navbar-inner">

												<a class="brand" href="#">Restaurant Invoice</a>

											</div>

										</div>

                                         

										<div class="row">

                        <div class="col-lg-12">

                            <div class="panel panel-default gradient">

                               

                                <div class="panel-body clearfix">

                                  
 <form action="restaurant_invoice.php" method="get">
  <table width="100%" border="0">
  <tr>
  <td></td><td><strong>Search By</strong></td>
   <td><input id="invoiceNo" name="invoiceNo" value="" type="text" placeholder='Enter Invoice No'    style="width:400px;"/></td>
                                           
    <td>	<select  data-placeholder="Select Restaurant..."   id="restaurantID" name="restaurantID" style="width:400px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											  
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd  order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurantID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }   ?>
											</select></td>
   
   
     <td> <input type="submit" class="btn btn-primary " name="GenerateInvoiceSubmit" id="GenerateInvoiceSubmit" value="Filter" /></td>
  </tr></table>
  </form>
  <br />
                                 

<table  class="table table-bordered table-striped table-cth orange" style="width:100%;" >

			<thead>

				<tr>

					

				

					

					<th width="77">Invoice No</th>

                    <th width="112">Commission Amount</th>

                    <th width="152">Paid Commision</th>

                     <th width="152">Pending Commision</th>

                   <th width="50">Invoice Type</th>

				  <th width="115">Status</th>

                  <th width="88">Action</th>

				</tr>

			</thead>

			<tbody>

            <?php

 include('route/config1.php');

 mysql_query ("set character_set_results='utf8'");
if($_GET['restaurantID']!='')
{
$restaurantID=" and restaurantID='".$_GET['restaurantID']."'";
}
if($_GET['invoiceNo']!='')
{
$invoiceNoID=" and invoiceNo='".$_GET['invoiceNo']."'";
}
$sql = "SELECT * FROM tbl_invoice  where 1 $restaurantID  $invoiceNoID   order by id desc ";

$result = mysql_query($sql);

$numrows=mysql_num_rows($result);

?>	

            <?php

		$PendingdSmOdr='';

		                    $PendingtotalSum='';

							$PendingtotalCommis='';

							$AmountPendingtotalCommis='';

	if($numrows>0)

	{

	$i=1;

	while($data=mysql_fetch_array($result))

	{ 

	

$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restaurantID']);

 $CuisineData=mysql_fetch_assoc($CuisineQuery);

 

							$query44 = "SELECT * from resto_order where status='4' and restoid='".$data['restaurantID']."' "; 

							$result55 = mysql_query($query44) or die(mysql_error());

                           $data333 = mysql_fetch_array($result55);

	                       $PendingtotalSum+=$data333['ordPrice'];

						   $PendingtotalCommis+=$data333['paid_commission'];

						   $Compp=($data333['ordPrice']*$CuisineData['restaurant_commission'])/100;

   $PendingdSmOdr+=($data333['ordPrice']*$CuisineData['restaurant_commission'])/100;

   $AmountPendingtotalCommis=$PendingdSmOdr-$PendingtotalCommis;

    $AmountPendingtotalCommis1=$Compp-$data333['paid_commission'];

                        



		 ?>

				<tr>

					

					

					

					<td><?php echo $data['invoiceNo']; ?> </td>

					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php
					if($Compp!=''){
					 echo number_format($Compp,2); 
					 }
					 else
					 {
					 echo '0.00';
					 }
					 ?></td>

                    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
					if($data333['paid_commission']!=''){
					echo number_format($data333['paid_commission'],2);
					}
					else
					{
					echo '0.00';
					}
					 ?></td>

                    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
					if($AmountPendingtotalCommis1!=''){
					echo number_format($AmountPendingtotalCommis1,2); 
					}
					else
					{
					echo '0.00';
					}
					?></td>

                    <td><?php echo $CuisineData['restaurant_invoiceTimePeriod']; ?> days

                    </td>

					<td><?php if($data['status']==0){ ?>

                    Not Recieved

                    <?php } else {?>

                    Recieved

                    <?php } ?>

                    </td>

                    

                    <td>   <a href="invoice.php?orderid=<?php echo $data['invoiceNo']; ?>" class="btn btn-danger">View Detail</a>

               

                     </td>

				</tr>

               <?php } } else { ?>

                

                <tr>

                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">No Invoice available for Printable</strong></td>

                </tr>

                <?php } ?>

                

              

				

			</tbody>

		</table>

        

                                   

                                   

                                   

                                   

                                   

                                </div>

                            </div><!-- End .panel -->



                        </div><!-- End .span12 -->



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

