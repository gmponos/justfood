<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['restaurant_id']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_resttablebookingTime","restaurant_id",$_GET['restaurant_id']);
 $data=mysql_fetch_assoc($CuisineQuery);
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant Table Booking Time Table</a></li>
						</ul>

						<div class="tab-content"  style="height:1400px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant Table Booking Time Table</a>
											</div>
										</div>
                                        
                                        <div class="row-fluid">
                                        <?php if($_GET['emsg']==1){?>
                                        <div id="display-success">
                                        <img src="img/correct.png" />Restaurant Table Booking Time Table has been successfully Updated!
                                        </div>
                                        <?php } ?>
                                           <form action="InsertPhp.php?tag=RestayranttablebookingTimeEdit&restaurant_id=<?php echo $_GET['restaurant_id']; ?>&eid=1" method="post">
                                                  <table width="98%" border="0">
  <tr >
    <td width="28%"><strong style="padding:5px;">Table Booking Days</strong></td>
    <td width="36%"><strong style="padding:5px;">Table Booking Hours Start Timing</strong></td>
    <td width="36%"><strong style="padding:5px;">Table Booking Hours End Timing</strong></td>
  </tr>
  <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_mon_selected" id="restaurant_tablebooking_mon_selected" <?php if($data['restaurant_tablebooking_mon_selected']!=''){ ?> checked="checked" <?php } ?>   value="Monday" />
    &nbsp;&nbsp;Monday</td>
    <td >	<input type="text" name="restaurant_tablebooking_mon_open_hr" id="restaurant_tablebooking_mon_open_hr" value="<?php echo $data['restaurant_tablebooking_mon_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_mon_open_min" id="restaurant_tablebooking_mon_open_min" value="<?php echo $data['restaurant_tablebooking_mon_open_min']; ?>" style="width:100px;" />
			  
               
               <select name="restaurant_tablebooking_mon_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_mon_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_mon_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_mon_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
             
               </select>
               
               </td>
    <td><input type="text" name="restaurant_tablebooking_mon_close_hr" id="restaurant_tablebooking_mon_close_hr" value="<?php echo $data['restaurant_tablebooking_mon_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_mon_close_min" id="restaurant_tablebooking_mon_close_min" value="<?php echo $data['restaurant_tablebooking_mon_close_min']; ?>" style="width:100px;" />
			  
                <select name="restaurant_tablebooking_mon_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_mon_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_mon_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_mon_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             </select>
              </td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_tue_selected" value="Tuesday" id="restaurant_tablebooking_tue_selected" <?php if($data['restaurant_tablebooking_tue_selected']!=''){ ?> checked="checked" <?php } ?>   />
    &nbsp;&nbsp;Tuesday</td>
    <td >	<input type="text" name="restaurant_tablebooking_tue_open_hr" id="restaurant_tablebooking_tue_open_hr" value="<?php echo $data['restaurant_tablebooking_tue_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_tue_open_min" id="restaurant_tablebooking_tue_open_min" value="<?php echo $data['restaurant_tablebooking_tue_open_min']; ?>" style="width:100px;" />
               <select name="restaurant_tablebooking_tue_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_tue_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_tue_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_tue_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_tablebooking_tue_close_hr" id="restaurant_tablebooking_tue_close_hr" value="<?php echo $data['restaurant_tablebooking_tue_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_tue_close_min" id="restaurant_tablebooking_tue_close_min" value="<?php echo $data['restaurant_tablebooking_tue_close_min']; ?>" style="width:100px;" />
              <select name="restaurant_tablebooking_tue_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_tue_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_tue_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_tue_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
			 </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_wed_selected" id="restaurant_tablebooking_wed_selected" value="Wednesday" <?php if($data['restaurant_tablebooking_wed_selected']!=''){ ?> checked="checked" <?php } ?> />&nbsp;&nbsp;Wednesday</td>
    <td >	<input type="text" name="restaurant_tablebooking_wed_open_hr" id="restaurant_tablebooking_wed_open_hr" value="<?php echo $data['restaurant_tablebooking_wed_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_wed_open_min" id="restaurant_tablebooking_wed_open_min" value="<?php echo $data['restaurant_tablebooking_wed_open_min']; ?>" style="width:100px;" />
             
              <select name="restaurant_tablebooking_wed_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_wed_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_wed_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_wed_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
             
			  </td>
    <td><input type="text" name="restaurant_tablebooking_wed_close_hr" id="restaurant_tablebooking_wed_close_hr" value="<?php echo $data['restaurant_tablebooking_wed_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_wed_close_min" id="restaurant_tablebooking_wed_close_min" value="<?php echo $data['restaurant_tablebooking_wed_close_min']; ?>" style="width:100px;" />
              <select name="restaurant_tablebooking_wed_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_wed_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_wed_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_wed_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
			  </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_thu_selected" id="restaurant_tablebooking_thu_selected" value="Thursday" <?php if($data['restaurant_tablebooking_thu_selected']!=''){ ?> checked="checked" <?php } ?>    />&nbsp;&nbsp;Thursday</td>
    <td >	<input type="text" name="restaurant_tablebooking_thu_open_hr" id="restaurant_tablebooking_thu_open_hr" value="<?php echo $data['restaurant_tablebooking_thu_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_thu_open_min" id="restaurant_tablebooking_thu_open_min" value="<?php echo $data['restaurant_tablebooking_thu_open_min']; ?>" style="width:100px;" />
               <select name="restaurant_tablebooking_thu_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_thu_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_thu_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_thu_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_tablebooking_thu_close_hr" id="restaurant_tablebooking_thu_close_hr" value="<?php echo $data['restaurant_tablebooking_thu_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_thu_close_min" id="restaurant_tablebooking_thu_close_min" value="<?php echo $data['restaurant_tablebooking_thu_close_min']; ?>" style="width:100px;" />
             
             <select name="restaurant_tablebooking_thu_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_thu_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_thu_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_thu_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
             </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_fri_selected" id="restaurant_tablebooking_fri_selected" value="Friday" <?php if($data['restaurant_tablebooking_fri_selected']!=''){ ?> checked="checked" <?php } ?>  />&nbsp;&nbsp;Friday</td>
    <td >	<input type="text" name="restaurant_tablebooking_fri_open_hr" id="restaurant_tablebooking_fri_open_hr" value="<?php echo $data['restaurant_tablebooking_fri_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_fri_open_min" id="restaurant_tablebooking_fri_open_min" value="<?php echo $data['restaurant_tablebooking_fri_open_min']; ?>" style="width:100px;" />
              <select name="restaurant_tablebooking_fri_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_fri_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_fri_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_fri_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			</td>
    <td><input type="text" name="restaurant_tablebooking_fri_close_hr" id="restaurant_tablebooking_fri_close_hr" value="<?php echo $data['restaurant_tablebooking_fri_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_fri_close_min" id="restaurant_tablebooking_fri_close_min" value="<?php echo $data['restaurant_tablebooking_fri_close_min']; ?>" style="width:100px;" />
			   <select name="restaurant_tablebooking_fri_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_fri_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_fri_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_fri_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select></td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_sat_selected" id="restaurant_tablebooking_sat_selected" value="Saturday" <?php if($data['restaurant_tablebooking_sat_selected']!=''){ ?> checked="checked" <?php } ?>    />&nbsp;&nbsp;Saturday</td>
    <td >	<input type="text" name="restaurant_tablebooking_sat_open_hr" id="restaurant_tablebooking_sat_open_hr" value="<?php echo $data['restaurant_tablebooking_sat_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_sat_open_min" id="restaurant_tablebooking_sat_open_min" value="<?php echo $data['restaurant_tablebooking_sat_open_min']; ?>" style="width:100px;" />
              <select name="restaurant_tablebooking_sat_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_sat_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_sat_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_sat_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_tablebooking_sat_close_hr" id="restaurant_tablebooking_sat_close_hr" value="<?php echo $data['restaurant_tablebooking_sat_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_sat_close_min" id="restaurant_tablebooking_sat_close_min" value="<?php echo $data['restaurant_tablebooking_sat_close_min']; ?>" style="width:100px;" />
			   
                 <select name="restaurant_tablebooking_sat_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_sat_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_sat_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_sat_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select>
               
             </td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_tablebooking_sun_selected" id="restaurant_tablebooking_sun_selected" value="Sunday" <?php if($data['restaurant_tablebooking_sun_selected']!=''){ ?> checked="checked" <?php } ?>  />&nbsp;&nbsp;Sunday</td>
    <td >	<input type="text" name="restaurant_tablebooking_sun_open_hr" id="restaurant_tablebooking_sun_open_hr" value="<?php echo $data['restaurant_tablebooking_sun_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_sun_open_min" id="restaurant_tablebooking_sun_open_min" value="<?php echo $data['restaurant_tablebooking_sun_open_min']; ?>" style="width:100px;" />
             <select name="restaurant_tablebooking_sun_open_am" placeholder='AM OR PM' id="restaurant_tablebooking_sun_open_am" style="width:100px;">
               <option value="AM" <?php if($data['restaurant_tablebooking_sun_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($data['restaurant_tablebooking_sun_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_tablebooking_sun_close_hr" id="restaurant_tablebooking_sun_close_hr" value="<?php echo $data['restaurant_tablebooking_sun_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_tablebooking_sun_close_min" id="restaurant_tablebooking_sun_close_min" value="<?php echo $data['restaurant_tablebooking_sun_close_min']; ?>" style="width:100px;" />
                <select name="restaurant_tablebooking_sun_open_pm" placeholder='AM OR PM' id="restaurant_tablebooking_sun_open_pm" style="width:100px;">
                  <option value="PM" <?php if($data['restaurant_tablebooking_sun_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($data['restaurant_tablebooking_sun_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select>
			  </td>
  </tr>
    <tr><td colspan="8" align="center"><input type="submit" class="btn btn-inverse" name="addEditContent"  value="Update <?php echo $data2['restaurant_name'];?> Table Booking Timing" ></td></tr>
</table>

</form>
                                                </div>
                                                
                                                <hr>
                                                
                                                
                                                
                                               
                                                
                                                
                                                
                                      
                                                       
                                                       
                                                
                                                
                                                
                                                
                                                
                                                
                                        
										
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
