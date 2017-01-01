<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantGallery","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 ?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
	
		
<script type="text/javascript">
/*
This script is identical to the above JavaScript function.
*/
var ct = 1;

function new_link()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;

	// link to delete extended form elements
	var delLink = '<div align="center" ><a href="javascript:delIt('+ ct +')" class="btn btn-inverse">Delete</a></div>';

	div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;

	document.getElementById('newlink').appendChild(div1);

}
// function to delete the newly added set of elements
function delIt(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newlink');

	parentEle.removeChild(ele);

}
</script>


<script type="text/javascript">
function RestaurantGalleryValidate(){
var chkStatus = true
if(document.getElementById('restaurant_id').value =="") {
document.getElementById("restaurant_id").style.background='#C10000';
document.getElementById("restaurant_id").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_id').className = "";
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('restaurant_gallery_image').value =="") {
document.getElementById("restaurant_gallery_image").style.background='#C10000';
document.getElementById("restaurant_gallery_image").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_gallery_image').className = "";
<?php } ?>

return chkStatus;
}
function clearFieldValue(register){	
document.getElementById(register.id).style.background="#FFFFFF";
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
{
return false;
}
return true;
}
function alpha(e) {
var k;
document.all ? k = e.keyCode : k = e.which;
return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
}
</script> 
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Gallery
                            <?php } else { ?>
                            Update Restaurant Gallery
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Gallery
                            <?php } else { ?>
                            Update Restaurant Gallery
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Gallery has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Gallery is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Gallery has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                            <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResGalleryEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Gallery";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResGalleryAdd";
										   $buttonValue="Add New Restaurant Gallery";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url;?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantGalleryValidate();">
												<input type="hidden" name="restaurant_gallery_imageold" value="<?php echo $CuisineData['restaurant_gallery_image'];?>" />
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td><label>Restaurant Name <span class="f_req">*</span></label></td>
    
    <td>	
   <select class="chzn-select" data-placeholder="Select Restaurant..." required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_id" name="restaurant_id" style="width:317px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											 $StateQuery = mysql_query("select * from tbl_restaurantAdd where id='".$_SESSION['restaurant_id']."'");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_SESSION['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											
											</select>
                </td>
  </tr>
  
<?php /*?>  <tr>
    <td><label>Image Name <span class="f_req">*</span></label></td>
    <td>	
   <input type="text" class="span5" style="width:300px;" placeholder="Restaurant Image Title" id="restaurant_ImageTitle" value="<?php echo $cdata['restaurant_ImageTitle']; ?>" name="restaurant_ImageTitle" > </td>
  </tr><?php */?>
  
  
   <tr>
    <td><label>Gallery Image <span class="f_req">*</span></label></td>
    <td>
    <div id="newlink">
 <table width="100%">
   <tr >
   
    <td>
    <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="restaurant_gallery_image[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_gallery_image" value="" class="default">
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
    
    </td>
   
   
  </tr>
  </table>
   </div>
 <div id="newlinktpl" style="display:none;">
  <table width="100%">
   <tr >
   
    <td>  <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="restaurant_gallery_image[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_gallery_image" value="" class="default">
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div></td>
  
  </tr>
  </table>
   </div>
   
    	
    </td>
  </tr>
  
 <tr><td colspan="2" align="right"> <p id="addnew" align="center">
	<a href="javascript:new_link()" class="btn btn-inverse">Add More Image</a>
</p></td></tr>
   
  <?php if($_GET['eid']!=''){ ?>
  <tr><td colspan="2">
  <?php $imh=explode(',',$CuisineData['restaurant_gallery_image']);
													foreach($imh as $v)
													{
													if($v!='')
													{?>
                                                    <img src="../control/ResGalleryImg/<?php echo $v; ?>" width="250" height="100" /><br />
													<?php } }
													
													?>
  </td></tr>
  <?php } ?>
  
  
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">
				<input type="submit" class="btn btn-inverse" name="AddRestaurantGallery"  value="<?php echo $buttonValue; ?>" >

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
    	
		<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
	
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
