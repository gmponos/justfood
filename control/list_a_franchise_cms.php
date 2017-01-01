<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
 $CuisineQuery = $dbb->showtabledata("tbl_franchisearestuarantcms","id",1);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 extract($_POST);
 if(isset($_POST['addEditContentfranchiseData']))
 {
 $QueryQ="UPDATE `tbl_franchisearestuarantcms` SET `franchise_a_restaurant_heading` = N'".mysql_real_escape_string($franchise_a_restaurant_heading)."', `franchise_a_restaurant_heading_description1` = N'".mysql_real_escape_string($franchise_a_restaurant_heading_description1)."', `franchise_a_restaurant_heading2` = N'".mysql_real_escape_string($franchise_a_restaurant_heading2)."', `franchise_a_restaurant_heading_description2` = N'".mysql_real_escape_string($franchise_a_restaurant_heading_description2)."', `content_TitleMeta` = N'".mysql_real_escape_string($content_TitleMeta)."', `content_KeywordMeta` = '".mysql_real_escape_string($content_KeywordMeta)."', `content_DescriptionMeta` = N'".mysql_real_escape_string($content_DescriptionMeta)."' WHERE `id` = '1'";
 if(mysql_query($QueryQ))
 {
 $msg=1;
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Franchisee CMS</a></li>
						</ul>

						<div class="tab-content"  style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Franchisee CMS</a>
											</div>
										</div>
                                         <?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Franchisee CMS has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="" method="post">
												
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                                    
                                                    <tr>
    <td><label>Page Heading  <span class="f_req">*</span></label></td>
    <td><input type="text" name="franchise_a_restaurant_heading" id="franchise_a_restaurant_heading" value="<?php echo $CuisineData['franchise_a_restaurant_heading']; ?>" style="width:300px; " /></td>
  </tr>
 
 
  <tr>
    <td><label>Heading Description <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="franchise_a_restaurant_heading_description1" class="twys"  name="franchise_a_restaurant_heading_description1" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['franchise_a_restaurant_heading_description1']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
 
 
 <tr>
    <td><label>Heading 2  <span class="f_req">*</span></label></td>
    <td><input type="text" name="franchise_a_restaurant_heading2" id="franchise_a_restaurant_heading2" value="<?php echo $CuisineData['franchise_a_restaurant_heading2']; ?>" style="width:300px; " /></td>
  </tr>
 
  <tr>
    <td><label>Heading Description 2 <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="franchise_a_restaurant_heading_description2" class="twys"  name="franchise_a_restaurant_heading_description2" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['franchise_a_restaurant_heading_description2']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
 
   <tr>
    <td colspan=""><label for="content_TitleMeta">Title Meta Tag</label></td>
    <td colspan="3">
    <textarea name="content_TitleMeta" id="content_TitleMeta" style="width:800px; height:80px;"> <?php echo $CuisineData['content_TitleMeta']; ?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="content_KeywordMeta">KeyWord Meta Tag</label></td>
    <td colspan="3">
    <textarea name="content_KeywordMeta" id="content_KeywordMeta" style="width:800px; height:80px;"> <?php echo $CuisineData['content_KeywordMeta']; ?></textarea>
    </td>
   
  </tr>
  
  
    <tr>
    <td colspan=""><label for="content_DescriptionMeta">Description Meta Tag</label></td>
    <td colspan="3">
    <textarea name="content_DescriptionMeta" id="content_DescriptionMeta" style="width:800px; height:80px;"> <?php echo $CuisineData['content_DescriptionMeta']; ?></textarea>
    </td>
   
  </tr>
  
  
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">	
<input type="submit" class="btn btn-inverse" name="addEditContentfranchiseData"  value="Update franchise a Restaurant" >
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
