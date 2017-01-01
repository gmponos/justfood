<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
 $CuisineQuery = $dbb->showtabledata("tbl_how_itarestuarantcms","id",1);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 extract($_POST);
 if(isset($_POST['addEditContenthow_itData']))
 {
 
if($_FILES['how_it_a_restaurant_smallheadingimg1']['name']!='')
{
$how_it_a_restaurant_smallheadingimg1=uniqid().$_FILES['how_it_a_restaurant_smallheadingimg1']['name'];
if(move_uploaded_file($_FILES['how_it_a_restaurant_smallheadingimg1']['tmp_name'],"userPanelImage/".$how_it_a_restaurant_smallheadingimg1)){
}
}
else
{
$how_it_a_restaurant_smallheadingimg1=$_POST['how_it_a_restaurant_smallheadingimgold1'];
}

if($_FILES['how_it_a_restaurant_smallheadingimg2']['name']!='')
{
$how_it_a_restaurant_smallheadingimg2=uniqid().$_FILES['how_it_a_restaurant_smallheadingimg1']['name'];
if(move_uploaded_file($_FILES['how_it_a_restaurant_smallheadingimg2']['tmp_name'],"userPanelImage/".$how_it_a_restaurant_smallheadingimg2)){
}
}
else
{
$how_it_a_restaurant_smallheadingimg2=$_POST['how_it_a_restaurant_smallheadingimgold2'];
}

if($_FILES['how_it_a_restaurant_smallheadingimg3']['name']!='')
{
$how_it_a_restaurant_smallheadingimg3=uniqid().$_FILES['how_it_a_restaurant_smallheadingimg3']['name'];
if(move_uploaded_file($_FILES['how_it_a_restaurant_smallheadingimg3']['tmp_name'],"userPanelImage/".$how_it_a_restaurant_smallheadingimg3)){
}
}
else
{
$how_it_a_restaurant_smallheadingimg3=$_POST['how_it_a_restaurant_smallheadingimgold3'];
}
if($_FILES['how_it_a_restaurant_smallheadingimg4']['name']!='')
{
$how_it_a_restaurant_smallheadingimg4=uniqid().$_FILES['how_it_a_restaurant_smallheadingimg4']['name'];
if(move_uploaded_file($_FILES['how_it_a_restaurant_smallheadingimg4']['tmp_name'],"userPanelImage/".$how_it_a_restaurant_smallheadingimg4)){
}
}
else
{
$how_it_a_restaurant_smallheadingimg4=$_POST['how_it_a_restaurant_smallheadingimgold4'];
}
 $QueryQ="UPDATE `tbl_how_itarestuarantcms` SET `how_it_a_restaurant_heading` = N'".mysql_real_escape_string($how_it_a_restaurant_heading)."', `how_it_a_restaurant_heading1` = N'".mysql_real_escape_string($how_it_a_restaurant_heading1)."',`how_it_a_restaurant_smallheading1` = N'".mysql_real_escape_string($how_it_a_restaurant_smallheading1)."', `how_it_a_restaurant_heading_description1` = N'".mysql_real_escape_string($how_it_a_restaurant_heading_description1)."',`how_it_a_restaurant_smallheadingimg1` = '$how_it_a_restaurant_smallheadingimg1', `how_it_a_restaurant_heading2` = N'".mysql_real_escape_string($how_it_a_restaurant_heading2)."',`how_it_a_restaurant_smallheading2` = N'".mysql_real_escape_string($how_it_a_restaurant_smallheading2)."', `how_it_a_restaurant_heading_description2` = N'".mysql_real_escape_string($how_it_a_restaurant_heading_description2)."', `how_it_a_restaurant_smallheadingimg2` = '$how_it_a_restaurant_smallheadingimg2',`how_it_a_restaurant_heading3` = N'".mysql_real_escape_string($how_it_a_restaurant_heading3)."', `how_it_a_restaurant_smallheading3` = N'".mysql_real_escape_string($how_it_a_restaurant_smallheading3)."',`how_it_a_restaurant_heading_description3` = N'".mysql_real_escape_string($how_it_a_restaurant_heading_description3)."',`how_it_a_restaurant_smallheadingimg3` = '$how_it_a_restaurant_smallheadingimg3', `how_it_a_restaurant_heading4` = N'".mysql_real_escape_string($how_it_a_restaurant_heading4)."',`how_it_a_restaurant_smallheading4` = N'".mysql_real_escape_string($how_it_a_restaurant_smallheading4)."', `how_it_a_restaurant_heading_description4` = N'".mysql_real_escape_string($how_it_a_restaurant_heading_description4)."',`how_it_a_restaurant_smallheadingimg4` = '$how_it_a_restaurant_smallheadingimg4',`how_it_a_restaurant_heading5` = N'".mysql_real_escape_string($how_it_a_restaurant_heading5)."',`how_it_a_restaurant_smallheading5` = N'".mysql_real_escape_string($how_it_a_restaurant_smallheading5)."', `how_it_a_restaurant_heading_description5` = N'".mysql_real_escape_string($how_it_a_restaurant_heading_description5)."', `content_TitleMeta` = N'".mysql_real_escape_string($content_TitleMeta)."', `content_KeywordMeta` = '".mysql_real_escape_string($content_KeywordMeta)."', `content_DescriptionMeta` = N'".mysql_real_escape_string($content_DescriptionMeta)."' WHERE `id` = '1'";
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>How It Works </a></li>
						</ul>

						<div class="tab-content"  style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">How It Works</a>
											</div>
										</div>
                                         <?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />How It Works  has been successfully updated.
		                                     </div>
											<?php }?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="" method="post" enctype="multipart/form-data">
												<input type="hidden" name="how_it_a_restaurant_smallheadingimgold4" value="<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg4']; ?>" />
                                                <input type="hidden" name="how_it_a_restaurant_smallheadingimgold3" value="<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg3']; ?>" />
                                                <input type="hidden" name="how_it_a_restaurant_smallheadingimgold2" value="<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg2']; ?>" />
                                                <input type="hidden" name="how_it_a_restaurant_smallheadingimgold1" value="<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg1']; ?>" />
                                               
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                                    
                                                    <tr>
    <td><label>Page Heading  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_heading" id="how_it_a_restaurant_heading" value="<?php echo $CuisineData['how_it_a_restaurant_heading']; ?>" style="width:300px; " /></td>
  </tr>
 
   <tr>
    <td><label>Heading 1  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_heading1" id="how_it_a_restaurant_heading1" value="<?php echo $CuisineData['how_it_a_restaurant_heading1']; ?>" style="width:300px; " /></td>
  </tr>
  
   <tr>
    <td><label>Small Heading 1  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_smallheading1" id="how_it_a_restaurant_smallheading1" value="<?php echo $CuisineData['how_it_a_restaurant_smallheading1']; ?>" style="width:300px; " /></td>
  </tr>
 
  <tr>
    <td><label>Heading Description 1 <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="how_it_a_restaurant_heading_description1" class="twys"  name="how_it_a_restaurant_heading_description1" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['how_it_a_restaurant_heading_description1']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
   <tr>
    <td><label>Heading image 1  <span class="f_req">*</span></label></td>
    <td><input type="file" name="how_it_a_restaurant_smallheadingimg1" id="how_it_a_restaurant_smallheadingimg1" style="width:300px; " /><br />
    <img src="userPanelImage/<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg1']; ?>" width="80" height="70" />
    </td>
  </tr>
 
 <tr>
    <td><label>Heading 2  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_heading2" id="how_it_a_restaurant_heading2" value="<?php echo $CuisineData['how_it_a_restaurant_heading2']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Small Heading 2  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_smallheading2" id="how_it_a_restaurant_smallheading2" value="<?php echo $CuisineData['how_it_a_restaurant_smallheading2']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Heading Description 2 <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="how_it_a_restaurant_heading_description2" class="twys"  name="how_it_a_restaurant_heading_description2" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['how_it_a_restaurant_heading_description2']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
   <tr>
    <td><label>Heading image 2  <span class="f_req">*</span></label></td>
    <td><input type="file" name="how_it_a_restaurant_smallheadingimg2" id="how_it_a_restaurant_smallheadingimg2" style="width:300px; " /><br />
    <img src="userPanelImage/<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg2']; ?>" width="80" height="70" />
    </td>
  </tr>
 
   
  <tr>
    <td><label>Heading 3  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_heading3" id="how_it_a_restaurant_heading3" value="<?php echo $CuisineData['how_it_a_restaurant_heading3']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Small Heading 3  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_smallheading3" id="how_it_a_restaurant_smallheading3" value="<?php echo $CuisineData['how_it_a_restaurant_smallheading3']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Heading Description 2 <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="how_it_a_restaurant_heading_description3" class="twys"  name="how_it_a_restaurant_heading_description3" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['how_it_a_restaurant_heading_description3']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
   <tr>
    <td><label>Heading image 3  <span class="f_req">*</span></label></td>
    <td><input type="file" name="how_it_a_restaurant_smallheadingimg3" id="how_it_a_restaurant_smallheadingimg3" style="width:300px; " /><br />
    <img src="userPanelImage/<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg3']; ?>" width="80" height="70" />
    </td>
  </tr>
  <tr>
    <td><label>Heading 4 <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_heading4" id="how_it_a_restaurant_heading4" value="<?php echo $CuisineData['how_it_a_restaurant_heading4']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Small Heading 4  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_smallheading4" id="how_it_a_restaurant_smallheading4" value="<?php echo $CuisineData['how_it_a_restaurant_smallheading4']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Heading Description 4 <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="how_it_a_restaurant_heading_description4" class="twys"  name="how_it_a_restaurant_heading_description4" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['how_it_a_restaurant_heading_description4']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
   <tr>
    <td><label>Heading image 4  <span class="f_req">*</span></label></td>
    <td><input type="file" name="how_it_a_restaurant_smallheadingimg4" id="how_it_a_restaurant_smallheadingimg4" style="width:300px; " /><br />
    <img src="userPanelImage/<?php echo $CuisineData['how_it_a_restaurant_smallheadingimg4']; ?>" width="80" height="70" />
    </td>
  </tr>
  
  
  
   <tr>
    <td><label>Heading 5 <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_heading5" id="how_it_a_restaurant_heading5" value="<?php echo $CuisineData['how_it_a_restaurant_heading5']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Small Heading 5  <span class="f_req">*</span></label></td>
    <td><input type="text" name="how_it_a_restaurant_smallheading5" id="how_it_a_restaurant_smallheading5" value="<?php echo $CuisineData['how_it_a_restaurant_smallheading5']; ?>" style="width:300px; " /></td>
  </tr>
  <tr>
    <td><label>Heading Description 5 <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="how_it_a_restaurant_heading_description5" class="twys"  name="how_it_a_restaurant_heading_description5" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['how_it_a_restaurant_heading_description5']; ?>
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
<input type="submit" class="btn btn-inverse" name="addEditContenthow_itData"  value="Update How It Works " >
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
