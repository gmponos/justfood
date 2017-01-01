<?php 
ob_start();
session_start();
if(!isset($_SESSION['OwnerloginId']))
{
session_unset();
session_destroy();
header("location:index.php");
exit;
}
include('route/config1.php');
mysql_query ("set character_set_results='utf8'");
date_default_timezone_set('US/Eastern');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
<?php 
$_GET['restaurant_id']=$_SESSION['restaurant_id'];
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
?>




		<table  class="table table-bordered table-striped table-cth orange" style="width:100%;" >
			<thead>
				<tr>
					
					<th >Restaurant</th>
					<th >Order ID</th>
					<th >Order Date</th>
                    <th>Order Price</th>
                    <th>Commision Rate</th>
                   <th>Type</th>
				  <th>Payment Method</th>
                  <th>Owner Name</th>
				</tr>
			</thead>
			<tbody>
          <?php
 include('route/config1.php');
 mysql_query ("set character_set_results='utf8'");
  $wdn=date("N");
			$dt2=mktime(0,0,0,date("m"),date('d'),date("Y"))-$wdn*24*3600;
			 $wKdat=date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			$dateWek=mktime(0,0,0,date('m'),date('d'),date('Y'))-(24*3600*7);
            $dateWek=date('Y-m-d',$dateWek);
if($_GET['restaurant_id']!=''){
$sql = "SELECT * FROM resto_order  where odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_GET['restaurant_id']."' order by order_id desc";
}
else
{			
 $sql = "SELECT * FROM resto_order  where odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
?>	
            <?php
		$dSmOdr='';
		$totalSum='';
	if($numrows>0)
	{
	$i=1;
	while($data=mysql_fetch_array($result))
	{ 
	$totalSum+=$data['ordPrice'];
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $OwnerQuery = $dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$data['restoid']);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
 $Commission= (($data['ordPrice']*$CuisineData['restaurant_commission'])/100);
if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
		 ?>
				<tr>
					
					<td align="center"><?php echo $CuisineData['restaurant_name']; ?></td>
					<td align="center"><?php echo $data['order_identifyno']; ?></td>
					<td align="center"><?php echo $data['user_date']; ?></td>
					<td align="center"><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo $data['ordPrice']; ?></td>
                    <td align="center"><?php echo $CuisineData['restaurant_commission']; ?> % = <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo $Cpl; ?>
                    <?php  $dSmOdr+=($data['ordPrice']*$CuisineData['restaurant_commission'])/100; ?>
                    </td>
					<td align="center"><?php echo $data['order_type']; ?></td>
                    <td align="center"><?php echo $data['payMode']; ?></td>
                    <td align="center"><?php echo $OwnerData['restaurant_OwnerFirstName']; ?> <?php echo $OwnerData['restaurant_OwnerLastName']; ?></td>
				</tr>
               <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">No Weekly Orders available for Printable</strong></td>
                </tr>
                <?php } ?>
                
                <tr>
		<td colspan="3" style="border:none;">&nbsp;</td>
		
		<td style="border:none;" align="center"><strong style="color:#000080; font-size:14px;">Total : <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?><?php 
		if($totalSum!=''){
		echo number_format($totalSum,2); 
		}
		else
		{
		echo '0.00';
		}
		?></strong></td>
		<td style="border:none;" align="right"><strong style="color:#000080; font-size:14px;">Commission : <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?><?php 
		if($dSmOdr!=''){
		echo number_format($dSmOdr,2);
		}
		else
		{
		echo '0.00';
		}
		 ?></strong></td>
		<td colspan="3" style="border:none;"></td>
		</tr>
				
			</tbody>
		</table>
        
          <table width="100%" border="0" align="right">
  <tr>
    <td><a href="javascript:window.print()" class="btn btn-duasembilan" title="Print Restaurant Order" > Print Restaurant Order</a></td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
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
