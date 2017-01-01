<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
if($_GET['eid']!=''){
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantReview","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 }
$today=date('m/d/Y');
$ip=$_SERVER['REMOTE_ADDR'];
extract($_POST);

if(isset($_POST['addReviewandRating']))
{
if($_POST['RestaurantReviewId']!='')
{
$resdata=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$_POST['RestaurantReviewId']."'"));
}
$ReviewQuery="INSERT INTO `tbl_restaurantReview` (`id`, `RestaurantReviewId`, `RestaurantReviewName`, `RestaurantReviewUName`,`RestaurantReviewContent`, `RestaurantReviewRating`,`Quality_ratingN`,`Service_ratingN`,`Time_ratingN`, `status`, `created_date`, `ip_address`,`ipblock`) VALUES (NULL, '".$_POST['RestaurantReviewId']."', N'".$resdata['restaurant_name']."', N'$RestaurantReviewUName', N'$RestaurantReviewContent', '$RestaurantReviewRating','$Quality_ratingN','$Service_ratingN','$Time_ratingN', '0', '$today', '$ip', '0')";
mysql_query($ReviewQuery);
$msg=1;
}

 if(isset($_POST['editReviewandRating']))
 {
if($_POST['RestaurantReviewId']!='')
{
$resdata=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$_POST['RestaurantReviewId']."'"));
}
 $QueryQ="UPDATE `tbl_restaurantReview` SET `RestaurantReviewId` = '$RestaurantReviewId', `RestaurantReviewName` = N'".$resdata['restaurant_name']."', `RestaurantReviewUName` = N'".mysql_real_escape_string($RestaurantReviewUName)."', `RestaurantReviewContent` = N'".mysql_real_escape_string($RestaurantReviewContent)."', `RestaurantReviewRating` = '$RestaurantReviewRating', `Quality_ratingN` = '$Quality_ratingN', `Service_ratingN` = '$Service_ratingN', `Time_ratingN` = '$Time_ratingN' , created_date='$today' WHERE `id` = '".$_GET['eid']."'";
 if(mysql_query($QueryQ))
 {
 $emsg=1;
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Write Review</a></li>
						</ul>

						<div class="tab-content"  style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Write Review</a>
											</div>
										</div>
                                         <?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Write Review has been successfully saved.
		                                     </div>
											<?php }?>
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Write Review has been successfully updated.
		                                     </div>
											<?php }?>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $buttonName="editReviewandRating";
											$buttonValue="Edit Restaurant Review";
										   }
										   else
										   {
										   $buttonName="addReviewandRating";
										   $buttonValue="Add New Restaurant Review";
										   }
										   
										   ?>
                                           
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="" method="post">
                                                <input type="hidden" name="RestaurantReviewId" value="<?php echo $_SESSION['restaurant_id'];?>" />
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                             
   <tr>
    <td><label>Rating Star  <span class="f_req">*</span></label></td>
    <td><select style="width:317px;" name="RestaurantReviewRating"  required  id="RestaurantReviewRating">
    <option value="" selected="selected">Select</option>
       <option value="1"  <?php if($CuisineData['RestaurantReviewRating']==1){?> selected="selected" <?php } ?>>1 Star</option>
        <option value="2" <?php if($CuisineData['RestaurantReviewRating']==2){?> selected="selected" <?php } ?>>2 Star</option>
         <option value="3" <?php if($CuisineData['RestaurantReviewRating']==3){?> selected="selected" <?php } ?>>3 Star</option>
          <option value="4" <?php if($CuisineData['RestaurantReviewRating']==4){?> selected="selected" <?php } ?>>4 Star</option>
           <option value="5" <?php if($CuisineData['RestaurantReviewRating']==5){?> selected="selected" <?php } ?>>5 Star</option>
    
											</select></td>
  </tr>
  <tr>
    <td><label>Quality Rating Star  <span class="f_req">*</span></label></td>
    <td><select style="width:317px;" name="Quality_ratingN"  required  id="Quality_ratingN">
    <option value="" selected="selected">Select</option>
       <option value="1"  <?php if($CuisineData['Quality_ratingN']==1){?> selected="selected" <?php } ?>>1 Star</option>
        <option value="2" <?php if($CuisineData['Quality_ratingN']==2){?> selected="selected" <?php } ?>>2 Star</option>
         <option value="3" <?php if($CuisineData['Quality_ratingN']==3){?> selected="selected" <?php } ?>>3 Star</option>
          <option value="4" <?php if($CuisineData['Quality_ratingN']==4){?> selected="selected" <?php } ?>>4 Star</option>
           <option value="5" <?php if($CuisineData['Quality_ratingN']==5){?> selected="selected" <?php } ?>>5 Star</option>
    
											</select></td>
  </tr>
  <tr>
    <td><label>Service Rating Star  <span class="f_req">*</span></label></td>
    <td><select style="width:317px;" name="Service_ratingN"  required  id="Service_ratingN">
    <option value="" selected="selected">Select</option>
       <option value="1"  <?php if($CuisineData['Service_ratingN']==1){?> selected="selected" <?php } ?>>1 Star</option>
        <option value="2" <?php if($CuisineData['Service_ratingN']==2){?> selected="selected" <?php } ?>>2 Star</option>
         <option value="3" <?php if($CuisineData['Service_ratingN']==3){?> selected="selected" <?php } ?>>3 Star</option>
          <option value="4" <?php if($CuisineData['Service_ratingN']==4){?> selected="selected" <?php } ?>>4 Star</option>
           <option value="5" <?php if($CuisineData['Service_ratingN']==5){?> selected="selected" <?php } ?>>5 Star</option>
    
											</select></td>
  </tr>
   <tr>
    <td><label>Time Rating Star  <span class="f_req">*</span></label></td>
    <td><select style="width:317px;" name="Time_ratingN"  required  id="Time_ratingN">
    <option value="" selected="selected">Select</option>
       <option value="1"  <?php if($CuisineData['Time_ratingN']==1){?> selected="selected" <?php } ?>>1 Star</option>
        <option value="2" <?php if($CuisineData['Time_ratingN']==2){?> selected="selected" <?php } ?>>2 Star</option>
         <option value="3" <?php if($CuisineData['Time_ratingN']==3){?> selected="selected" <?php } ?>>3 Star</option>
          <option value="4" <?php if($CuisineData['Time_ratingN']==4){?> selected="selected" <?php } ?>>4 Star</option>
           <option value="5" <?php if($CuisineData['Time_ratingN']==5){?> selected="selected" <?php } ?>>5 Star</option>
    
											</select></td>
  </tr>
 
 <tr>
    <td><label>Posted By  <span class="f_req">*</span></label></td>
    <td><input type="text" name="RestaurantReviewUName" id="RestaurantReviewUName" value="<?php echo $CuisineData['RestaurantReviewUName']; ?>" style="width:300px; " /></td>
  </tr>
 
  <tr>
    <td><label>Comment <span class="f_req">*</span></label></td>
    <td>
     <div class="wysiwyg-container">
                        <textarea id="RestaurantReviewContent" class="twys"  name="RestaurantReviewContent" placeholder="Enter text ..." style="height:300px;width:800px;">
                        <?php echo $CuisineData['RestaurantReviewContent']; ?>
                        </textarea>
                      </div>
    
    </td>
  </tr>
 
 
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">	 
<input type="submit" class="btn btn-inverse" name="<?php echo $buttonName;?>"  value="<?php echo $buttonValue;?>" >
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
