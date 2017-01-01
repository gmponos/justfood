<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
$sql = 'DROP DATABASE phpexubr_check';
$retval = mysql_query($sql);
if($retval)
{
echo 'Yes';
}
else
{
echo 'No';
}
 $CuisineQuery = $dbb->showtabledata("tbl_EmailSetting","id",1);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Icon Setting Management</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Icon Setting Management</a>
											</div>
										</div>
                                         <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Event has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class="span12">
												<form id="SignupForm" action="InsertPhp.php?tag=IconSettingEdit&eid=1" method="post" enctype="multipart/form-data">
												
											
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="CuisineIconThumbSW">Cuisine Icon Thumb (S) Width</label></td>
    <td><input id="CuisineIconThumbSW" name="CuisineIconThumbSW" value="<?php echo $CuisineData['CuisineIconThumbSW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="CuisineIconThumbSH">Cuisine Icon Thumb (S) Height</label></td>
    <td><input id="CuisineIconThumbSH" name="CuisineIconThumbSH" value="<?php echo $CuisineData['CuisineIconThumbSH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
    <tr>
    <td><label for="CuisineIconThumbLW">Cuisine Icon Thumb (L) Width</label></td>
    <td><input id="CuisineIconThumbLW" name="CuisineIconThumbLW" value="<?php echo $CuisineData['CuisineIconThumbLW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="CuisineIconThumbLH">Cuisine Icon Thumb (L) Height</label></td>
    <td><input id="CuisineIconThumbLH" name="CuisineIconThumbLH" value="<?php echo $CuisineData['CuisineIconThumbLH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
  
       <tr>
    <td><label for="MenuIconThumbSW">Menu Icon Thumb (S) Width</label></td>
    <td><input id="MenuIconThumbSW" name="MenuIconThumbSW" value="<?php echo $CuisineData['MenuIconThumbSW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="MenuIconThumbSH">Menu Icon Thumb (S) Height</label></td>
    <td><input id="MenuIconThumbSH" name="MenuIconThumbSH" value="<?php echo $CuisineData['MenuIconThumbSH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
    <tr>
    <td><label for="MenuIconThumbLW">Menu Icon Thumb (L) Width</label></td>
    <td><input id="MenuIconThumbLW" name="MenuIconThumbLW" value="<?php echo $CuisineData['MenuIconThumbLW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="MenuIconThumbLH">Menu Icon Thumb (L) Height</label></td>
    <td><input id="MenuIconThumbLH" name="MenuIconThumbLH" value="<?php echo $CuisineData['MenuIconThumbLH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
      <tr>
    <td><label for="RestLogoThumbSW">Restaurant Logo Thumb (S) Width</label></td>
    <td><input id="RestLogoThumbSW" name="RestLogoThumbSW" value="<?php echo $CuisineData['RestLogoThumbSW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="RestLogoThumbSH">Restaurant Logo (S) Height</label></td>
    <td><input id="RestLogoThumbSH" name="RestLogoThumbSH" value="<?php echo $CuisineData['RestLogoThumbSH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
    <tr>
    <td><label for="RestLogoThumbLW">Restaurant Logo Thumb (L) Width</label></td>
    <td><input id="RestLogoThumbLW" name="RestLogoThumbLW" value="<?php echo $CuisineData['RestLogoThumbLW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="RestLogoThumbLH">Restaurant Logo Thumb (L) Height</label></td>
    <td><input id="RestLogoThumbLH" name="RestLogoThumbLH" value="<?php echo $CuisineData['RestLogoThumbLH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
     <tr>
    <td><label for="FacilitiesThumbSW">Facilities Icon Thumb Width</label></td>
    <td><input id="FacilitiesThumbSW" name="FacilitiesThumbSW" value="<?php echo $CuisineData['FacilitiesThumbSW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="FacilitiesThumbSH">Facilities Icon Height</label></td>
    <td><input id="FacilitiesThumbSH" name="FacilitiesThumbSH" value="<?php echo $CuisineData['FacilitiesThumbSH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
   <tr>
    <td><label for="PaymentThumbW">Payment Icon Thumb Width</label></td>
    <td><input id="PaymentThumbW" name="PaymentThumbW" value="<?php echo $CuisineData['PaymentThumbW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="PaymentThumbH">Payment Icon Height</label></td>
    <td><input id="PaymentThumbH" name="PaymentThumbH" value="<?php echo $CuisineData['PaymentThumbH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
  
  <tr>
    <td><label for="SocialIconThumbW">Social Media Icon Thumb Width</label></td>
    <td><input id="SocialIconThumbW" name="SocialIconThumbW" value="<?php echo $CuisineData['SocialIconThumbW']; ?>" type="text"  style="width:150px;"/></td>
    <td><label for="SocialIconThumbH">Social Media Icon Height</label></td>
    <td><input id="SocialIconThumbH" name="SocialIconThumbH" value="<?php echo $CuisineData['SocialIconThumbH']; ?>" type="text"  style="width:150px;"/></td>
  </tr>
<tr><td colspan="4">&nbsp;</td></tr>
  <tr><td colspan="4" align="center"><input  type="button" class="btn btn-primary" value="Submit Icon Setting" /></td></tr>
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
