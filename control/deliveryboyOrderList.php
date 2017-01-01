<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
?>
<?php
$curdate=date("Y-m-d");
require_once("export/excelwriter.class.php");
 mysql_query ("set character_set_results='utf8'");
$excel=new ExcelWriter("deliveryboyOrderList.xls");
if($excel==false)	
$excel->error;
$myArr=array("");
$myArr=array("Restaurant Delivery Boy Order Report");
$excel->writeLine($myArr);
$myArr=array("");
$excel->writeLine($myArr);
$myArr=array("Restaurant","Order ID","Order Price","Customer Name","Customer Address","Customer Phone","Delivery Boy");
$excel->writeLine($myArr);
$qry = mysql_query("SELECT * FROM tbl_orderassign  where restaurant_id='".$_GET['restaurant_id']."' and order_id='".$_GET['order_id']."' and deliveryboy_id='".$_GET['deliveryboy_id']."' ");

if($qry!=false)
{
	$i=1;
	while($data=mysql_fetch_array($qry))
	{
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $CuisineOrderQuery = $dbb->showtabledata("resto_order","order_identifyno",$_GET['order_id']);
 $CuisineOrderData=mysql_fetch_assoc($CuisineOrderQuery);	
 
 
 $OrderDeliveryArea=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$CuisineOrderData['delivey_address']."' and loginID='".$CuisineOrderData['userId']."'"));
		
	if($OrderDeliveryArea['GustUserFloor']!=''){
	$pl=$OrderDeliveryArea['GustUserFloor'].',';
	}
	if($OrderDeliveryArea['GustUserStreetAddress']!=''){
	$pl1=$OrderDeliveryArea['GustUserStreetAddress'].',';
	}
	
	if($OrderDeliveryArea['GustUserAddress']!=''){
	$pl2=$OrderDeliveryArea['GustUserAddress'].',';
	}
	if($OrderDeliveryArea['GustUserLandlineAdress']!=''){
	$pl3=$OrderDeliveryArea['GustUserLandlineAdress'].',';
	}
	
	if($OrderDeliveryArea['GustUserCityName']!=''){
	$pl4=$OrderDeliveryArea['GustUserCityName'].',';
	}
	if($OrderDeliveryArea['GustUserCountryName']!=''){
	$pl5=$OrderDeliveryArea['GustUserCountryName'];
	}
	$pl6='-'.$OrderDeliveryArea['GustUserPincode'];
 $OrderDeliveryBoy=mysql_fetch_assoc(mysql_query("select * from tbl_resDeliveryBoy where id='".$_GET['deliveryboy_id']."' "));

 $addresss=$pl.$pl1.$pl2.$pl3.$pl4.$pl5.$pl6;

		$myArr=array($CuisineData['restaurant_name'],$CuisineOrderData['order_identifyno'],$CuisineOrderData['ordPrice'],$CuisineOrderData['name_customer'],$addresss,$CuisineOrderData['phone'],$OrderDeliveryBoy['DeliveryBoyName']);
		$excel->writeLine($myArr);
		$i++;
	}
}
?>
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" ><a href="#mainFormElements"  data-toggle="tab"><i class="icon-file"></i>Delivery Boy Order List Report</a></li>
						</ul>

						<div class="tab-content"   style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Delivery Boy Order List Report </a>
											</div>
										</div>
										<div class="row-fluid">
    <div class="span12">
 

    <table width="70%" border="0">
  <tr>
    <td><a href="deliveryboyOrderList.xls" class="btn btn-info" title="Export into CVS Format" >Export into Excel Format</a></td>
    <td>
    <a href="deliveryboyOrderListCVS.php?deliveryboy_id=<?php echo $_GET['deliveryboy_id'];?>&order_id=<?php echo $_GET['order_id'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-primary" title="Export into CVS Format" >Export into CVS Format</a>
  
    </td>
    <td>
    
        <a href="tcpdf/examples/deliveryboyOrderListPDF.php?deliveryboy_id=<?php echo $_GET['deliveryboy_id'];?>&order_id=<?php echo $_GET['order_id'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" target="_blank" class="btn btn-tigadua" title="Generate PDF" >Generate PDF</a>
    </td>
    <td>
   <a href="deliveryboyOrderListPrintable.php?deliveryboy_id=<?php echo $_GET['deliveryboy_id'];?>&order_id=<?php echo $_GET['order_id'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-duasembilan" title=" Print Restaurant Order" target="_blank" > Print Restaurant Order</a>

    </td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
</table>


                                             

		<table  class="table table-bordered table-striped table-cth orange" style="width:100%;" >
			<thead>
				<tr>
					<th width="119"><a  style="cursor:pointer; color:#FFFFFF;">Restaurant</a></th>
					<th width="97"><a style="cursor:pointer;color:#FFFFFF;">Order ID </a></th>
                    <th width="112"><a style="cursor:pointer;color:#FFFFFF;">Order Amount</a></th>
                    <th width="152"><a style="cursor:pointer;color:#FFFFFF;">Customer Name</a></th>
                   <th width="50"><a  style="cursor:pointer;color:#FFFFFF;">Address</a></th>
				  <th width="115"><a  style="cursor:pointer;color:#FFFFFF;">Delivery Boy</a></th>
				</tr>
			</thead>
			<tbody>
            <?php
 include('route/config1.php');
 mysql_query ("set character_set_results='utf8'");
$sql = "SELECT * FROM tbl_orderassign  where restaurant_id='".$_GET['restaurant_id']."' and order_id='".$_GET['order_id']."' and deliveryboy_id='".$_GET['deliveryboy_id']."' ";
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
?>	
            <?php
		
	if($numrows>0)
	{
	$i=1;
	while($data=mysql_fetch_array($result))
	{ 
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $CuisineOrderQuery = $dbb->showtabledata("resto_order","order_identifyno",$_GET['order_id']);
 $CuisineOrderData=mysql_fetch_assoc($CuisineOrderQuery);
 		 ?>
				<tr>
					
					<td><?php echo $CuisineData['restaurant_name']; ?></td>
					<td><?php echo $CuisineOrderData['order_identifyno']; ?></td>
					<td><?php echo $CuisineOrderData['ordPrice']; ?></td>
					<td><?php echo $CuisineOrderData['name_customer']; ?></td>
                    <td><?php 
	$OrderDeliveryArea=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$CuisineOrderData['delivey_address']."' and loginID='".$CuisineOrderData['userId']."'"));
		
	if($OrderDeliveryArea['GustUserFloor']!=''){
	echo $OrderDeliveryArea['GustUserFloor'].',';
	}
	if($OrderDeliveryArea['GustUserStreetAddress']!=''){
	echo $OrderDeliveryArea['GustUserStreetAddress'].',';
	}
	
	if($OrderDeliveryArea['GustUserAddress']!=''){
	echo $OrderDeliveryArea['GustUserAddress'].',';
	}
	if($OrderDeliveryArea['GustUserLandlineAdress']!=''){
	echo $OrderDeliveryArea['GustUserLandlineAdress'].',';
	}
	
	if($OrderDeliveryArea['GustUserCityName']!=''){
	echo $OrderDeliveryArea['GustUserCityName'].',';
	}
	if($OrderDeliveryArea['GustUserCountryName']!=''){
	echo $OrderDeliveryArea['GustUserCountryName'];
	}
	echo '-'.$OrderDeliveryArea['GustUserPincode'];
	 ?>
					 </td>
					<td><?php 
					
					$OrderDeliveryBoy=mysql_fetch_assoc(mysql_query("select * from tbl_resDeliveryBoy where id='".$_GET['deliveryboy_id']."' "));
					echo $OrderDeliveryBoy['DeliveryBoyName']; ?></td>
                    
				</tr>
                <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">No Delivery Boy Order List Report available for Printable</strong></td>
                </tr>
                <?php } ?>
               
			</tbody>
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
