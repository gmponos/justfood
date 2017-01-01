<?php include('route/header.php'); ?>	
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
										<div class="row-fluid">
    <div class="span12">
    <form action="">
      <table width="100%" border="0">
  <tr>
    <td><strong style="font-size:14px; font-weight:bold;">City : </strong> </td>
    <td> <select  class="chzn_a span8"  name="restaurantname" style="width:200px;" id="restaurantname" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);">
								
								 <?php 
								 include('config1.php');
				$ploc=mysql_query("SELECT * FROM  `income_rate`  where status='0'");
				while($plocresssult=mysql_fetch_assoc($ploc)){
				?>
                  <option value="<?php echo $plocresssult['inpara_name'] ;?>" <?php if(strstr($data['resoption_display'],$plocresssult['inpara_name'])){?> selected="selected" <?php } ?>>
                    <?php echo ucwords($plocresssult['inpara_name']) ;?></option>
                  <?php }?>
    
   
                </select></td>
                
                 <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="restaurantname" style="width:100px;" id="restaurantname" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);">
					<option>Active</option>
   <option>Deactive</option>
                </select></td>
                
                  <td><strong style="font-size:14px; font-weight:bold;">Offer : </strong> </td>
    <td> <select  class="chzn_a span8"  name="restaurantname" style="width:200px;" id="restaurantname" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);">
					<option>Sort by Offer</option>
   <option>Deactive</option>
                </select></td>
                
                  <td><strong style="font-size:14px; font-weight:bold;">Event : </strong> </td>
    <td> <select  class="chzn_a span8"  name="restaurantname" style="width:200px;" id="restaurantname" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);">
					<option>Sort by Event</option>
   <option>Deactive</option>
                </select></td>
   
  </tr>
</table>
    </form>
     <table width="100%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Restaurant (0)</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Activate Restaurant (0)</strong></span></td>
    <td> <span class="label label-warning pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Deactivated Restaurant (0)</strong></span></td>
    <td> <span class="label label-info pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Restaurant with Offer (0)</strong></span></td>
    <td> <span class="label label-inverse pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Restaurant with Event (0)</strong></span></td>
  </tr>
</table>



		<table  class="dt table table-striped table-condensed table-bordered" id="example">
			<thead>
				<tr>
					<th class="table_checkbox"><input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_gal" /></th>
					<th>Name</th>
					<th>address</th>
					<th>city</th>
                    <th>restaurant owner</th>
                   
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="checkbox" name="row_sel" class="select_row" /></td>
					
					<td>Lorem ipsum dolor sit</td>
					<td>512,New Kot</td>
					<td>Noida</td>
					<td>Raj</td>
                    
					<td>
						<a href="#" class="btn btn-primary" title="Edit">Edit Restaurant</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="#" class="btn btn-dualima" title="Delete">Delete Restaurant</a>
                        <a href="#" class="btn btn-warning" title="Delete">Close Restaurant</a>
                       
					</td>
				</tr>
				
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
