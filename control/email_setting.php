<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
 $CuisineQuery = $dbb->showtabledata("tbl_EmailSetting","id",1);
 $cdata=mysql_fetch_assoc($CuisineQuery);
?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Change Email Setting</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Change Email Setting</a>
											</div>
										</div>
                                         <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Email Setting has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="InsertPhp.php?tag=EmailSettingEdit&eid=1" method="post">
												
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
 
  <tr>
    <td><label>Support Email <span class="f_req">*</span></label></td>
    <td>	
   <input type="text" class="span5" style="width:300px;" name="supportemail"  id="supportemail" placeholder="your Support Email"  value="<?php echo $cdata['supportemail']; ?>"  > </td>
  </tr>
  
   <tr>
    <td><label>Registration Email <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Registration Email"  id="registrationemail" value="<?php echo $cdata['registrationemail']; ?>" name="registrationemail" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Contact Us Email <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Contact Us Email"  id="contactusemail" value="<?php echo $cdata['contactusemail']; ?>" name="contactusemail" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Order Email <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Restaurant Order Email"  id="orderemail" value="<?php echo $cdata['orderemail']; ?>" name="orderemail" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Invoice Email <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Invoice Email"  id="invoiceemail" value="<?php echo $cdata['invoiceemail']; ?>" name="invoiceemail" >
  
    </td>
  </tr>
  
     <tr>
    <td><label>Booking Email <span class="f_req">*</span></label></td>
    <td>
    	
   <input type="text" class="span5" style="width:300px;" placeholder="your Booking Email"  id="bookingemail" value="<?php echo $cdata['bookingemail']; ?>" name="bookingemail" >
  
    </td>
  </tr>
  
 
  
  
  
  
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">	
   <input type="submit" value="Update Email Setting" name="save" class="btn btn-inverse"/>

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
