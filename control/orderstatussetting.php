<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
// $CuisineQuery = $dbb->showtabledata("tbl_EmailSetting","id",1);
 //$cdata=mysql_fetch_assoc($CuisineQuery);
 include('route/config1.php');
mysql_query ("set character_set_results='utf8'"); 
extract($_POST);
$data1=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='1'"));
$data2=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='2'"));
$data3=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='3'"));
$data4=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='4'")); 
$data5=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='5'")); 
if(isset($_POST['OrderStatusSettingSubmit'])){
$today = date('Y-m-d');
$result=mysql_query("UPDATE `order_status` SET `status` =N'".$RestOrderStatusAccepted."' where id='1'") or die(mysql_error());

$result1=mysql_query("UPDATE `order_status` SET  `status` =N'".$RestOrderStatusTransit."'  where id='2'") or die(mysql_error());

$result2=mysql_query("UPDATE `order_status` SET  `status` =N'".$RestOrderStatusDelivered."' where id='3'") or die(mysql_error());

$result3=mysql_query("UPDATE `order_status` SET  `status` =N'".$RestOrderStatusComplete."'  where id='4'") or die(mysql_error());

$result4=mysql_query("UPDATE `order_status` SET  `status` =N'".$RestOrderStatusCancled."' where id='5'") or die(mysql_error());
header("location:orderstatussetting.php?msg=1");
$msg='Order Status Setting has been successfully update !';
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Change Order Status Setting</a></li>
						</ul>

						<div class="tab-content"  style="height:1100px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Change Order Status Setting</a>
											</div>
										</div>
                                        <?php
											if($_GET['msg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Order Status Setting has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="" method="post">
												
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
 
  <tr>
    <td><label>Order Accepted <span class="f_req">*</span></label></td>
    <td>	
   <input type="text" class="span5" style="width:300px;" name="RestOrderStatusAccepted"  id="RestOrderStatusAccepted" placeholder="your Order Accepted"  value="<?php echo $data1['status']; ?>"  > </td>
  </tr>
  
   <tr>
    <td><label>Order Transit <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Order Transit"  id="RestOrderStatusTransit" value="<?php echo $data2['status']; ?>" name="RestOrderStatusTransit" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Order Delivered <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Order Delivered"  id="RestOrderStatusDelivered" value="<?php echo $data3['status']; ?>" name="RestOrderStatusDelivered" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Order Complete <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Order Complete"  id="RestOrderStatusComplete" value="<?php echo $data4['status']; ?>" name="RestOrderStatusComplete" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Order Cancel <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Order Caneled"  id="RestOrderStatusCancled" value="<?php echo $data5['status']; ?>" name="RestOrderStatusCancled" >
  
    </td>
  </tr>
  
  
  </tr>
  
 
  
  
  
  
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">	
   <input type="submit" value="Update Order Status Setting" name="OrderStatusSettingSubmit" class="btn btn-inverse"/>

   </td></tr>
  
  

</table>	
												</form>
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
