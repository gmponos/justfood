<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['SEORestaurantId']!=''){
 $SEOQuery = $dbb->showtabledata("tbl_restaurantSEO","restaurant_id",$_GET['SEORestaurantId']);
 $SEOData=mysql_fetch_assoc($SEOQuery);
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Update SEO</a></li>
						</ul>
<script type="text/javascript">
  function test(linkl){
    window.location.href="update_seo.php?SEORestaurantId="+linkl;
  }
</script>
						<div class="tab-content"  style="height:1400px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Update SEO</a>
											</div>
										</div>
                                         <?php
											if($_GET['emsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant SEO Content has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="InsertPhp.php?tag=ResSEOUpdate&res=<?php echo $_GET['SEORestaurantId'];?>&eid=<?php echo $SEOData['id']; ?>" method="post">
												
												
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="SEORestaurantId">Restaurant Name</label></td>
    <td colspan="3">	<select data-placeholder="Select Restaurant Name..." id="SEORestaurantId" onchange="test(this.value)" name="SEORestaurantId" style="width:317px;">
											 <option value="">Select Restaurant</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                             
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['SEORestaurantId']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
   
  </tr>
 <tr><td  colspan="4">
 	<table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
    <td colspan=""><label for="restaurant_MetaTitle">Title Meta Tag</label></td>
    <td colspan="3">
    <textarea name="restaurant_MetaTitle" id="restaurant_MetaTitle" style="width:800px; height:80px;"><?php echo $SEOData['restaurant_MetaTitle']; ?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="restaurant_MetaKeyword">KeyWord Meta Tag</label></td>
    <td colspan="3">
    <textarea name="restaurant_MetaKeyword" id="restaurant_MetaKeyword" style="width:800px; height:80px;"><?php echo $SEOData['restaurant_MetaKeyword']; ?></textarea>
    </td>
   
  </tr>
  
  
    <tr>
    <td colspan=""><label for="restaurant_MetaDescription">Description Meta Tag</label></td>
    <td colspan="3">
    <textarea name="restaurant_MetaDescription" id="restaurant_MetaDescription" style="width:800px; height:80px;"><?php echo $SEOData['restaurant_MetaDescription']; ?></textarea>
    </td>
   
  </tr>
  
  
  </tr>
                                                    </table>
 </td></tr>
  
    <tr>
   
    <td colspan="4" align="center">
  <input id="" type="submit" class="btn btn-primary " name="UpdateSEOSubmit" value="Update Restaurant SEO" />
    </td>
   
  </tr>
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
