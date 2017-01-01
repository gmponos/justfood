<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
$CuisineQuery = $dbb->showtabledata("tbl_HowUseCookie","id",1);
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>How To User Cookies</a></li>
						</ul>

						<div class="tab-content"  style="height:1300px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">How To User Cookies</a>
											</div>
										</div>
                                         <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />How To User Cookies has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="InsertPhp.php?tag=CookieEdit&eid=1" method="post">
												
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
 
  <tr>
    <td><label>Content <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="content_description" class="twys"  name="content_description" placeholder="Enter text ..." style="height: 400px;width:800px;">
                        <?php echo $CuisineData['content_description']; ?>
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
<input type="submit" class="btn btn-inverse" name="addEditContent"  value="Update How To User Cookies" >
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
