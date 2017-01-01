<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantDeals","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
?>	
<script type="text/javascript">
function RestaurantDealsValidate(){
var chkStatus = true
if(document.getElementById('RestaurantDealsId').value =="") {
document.getElementById("RestaurantDealsId").style.background='#C10000';
document.getElementById("RestaurantDealsId").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantDealsId').className = "";

if(document.getElementById('RestaurantDealsName').value =="") {
document.getElementById("RestaurantDealsName").style.background='#C10000';
document.getElementById("RestaurantDealsName").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantDealsName').className = "";
if(document.getElementById('RestaurantDealsAddress').value =="") {
document.getElementById("RestaurantDealsAddress").style.background='#C10000';
document.getElementById("RestaurantDealsAddress").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantDealsAddress').className = "";
if(document.getElementById('RestaurantDealsDescription').value =="") {
document.getElementById("RestaurantDealsDescription").style.background='#C10000';
document.getElementById("RestaurantDealsDescription").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantDealsDescription').className = "";
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('RestaurantDealsImage').value =="") {
document.getElementById("RestaurantDealsImage").style.background='#C10000';
document.getElementById("RestaurantDealsImage").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantDealsImage').className = "";
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
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Daily Deals
                            <?php } else { ?>
                            Update Restaurant Daily Deals
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
                            Setup New Restaurant Daily Deals
                            <?php } else { ?>
                            Update Restaurant Daily Deals
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Daily Deals has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Daily Deals is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Daily Deals has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResDealsEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Daily Deals";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResDealsAdd";
										   $buttonValue="Add New Restaurant Daily Deals";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantDealsValidate();">
												<input id="RestaurantDealsImageold" name="RestaurantDealsImageold" value="<?php echo $CuisineData['RestaurantDealsImageThumb']; ?>" type="hidden"  style="width:300px;"/>
												<fieldset>
													<legend>Daily Deals information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="RestaurantEventID">Restaurant Name</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant Name..." id="RestaurantDealsId" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="RestaurantDealsId" style="width:317px;">
											 <option value="0">Select Restaurant</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['RestaurantDealsId']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
    <td><label for="RestaurantDealsName">Deals Name</label></td>
    <td><input id="RestaurantDealsName" name="RestaurantDealsName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" value="<?php echo $CuisineData['RestaurantDealsName']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
    <td><label for="RestaurantDealsStartDate">Deals Start Date</label></td>
    <td><input id="RestaurantDealsStartDate" name="RestaurantDealsStartDate" value="<?php echo $CuisineData['RestaurantDealsStartDate']; ?>" data-date-format="mm/dd/yyyy" type="text" class="datePicker"   style="width:300px;"/></td>
    <td><label for="RestaurantDealsStartTime">Deals Start Time</label></td>
    <td><input class="input-small timePicker" id="tp2" value="<?php echo $CuisineData['RestaurantDealsStartTime']; ?>" type="text"  name="RestaurantDealsStartTime"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="RestaurantDealsEndDate">Deals End Date</label></td>
    <td><input value="<?php echo $CuisineData['RestaurantDealsEndDate']; ?>" data-date-format="mm/dd/yyyy" type="text" name="RestaurantDealsEndDate" id="RestaurantDealsEndDate" class="datePicker"  style="width:300px;" /></td>
    <td><label for="RestaurantDealsEndTime">Deals End Time</label></td>
    <td><input id="RestaurantDealsEndTime"  name="RestaurantDealsEndTime"  class="input-small timePicker" value="<?php echo $CuisineData['RestaurantDealsEndTime']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td colspan=""><label for="RestaurantDealsAddress">Deals Address</label></td>
    <td colspan="3">
    <textarea name="RestaurantDealsAddress" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantDealsAddress" style="width:800px; height:80px;"><?php echo $CuisineData['RestaurantDealsAddress']; ?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="RestaurantDealsDescription">Deals Description</label></td>
    <td colspan="3">
    <textarea name="RestaurantDealsDescription" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="RestaurantDealsDescription" style="width:800px; height:80px;"><?php echo $CuisineData['RestaurantDealsDescription']; ?></textarea>
    </td>
   
  </tr>
  
  
</table>	</fieldset>
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
	var delLink = '<a href="javascript:delIt('+ ct +')" class="btn btn-inverse">Delete</a>';

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
									
                                    
                                    <fieldset>
													<legend>Daily Deals Image information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                   <tr>
    <td><label>Deals Image <span class="f_req">*</span></label></td>
    <td>
    	<div id="newlink">
        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="RestaurantDealsImage[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="RestaurantDealsImage" value="" class="default">
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
    <br>

            
            </div>
              <p id="addnew" align="center">
	<a href="javascript:new_link()" class="btn btn-inverse">Add More </a>
</p>
          
            
    </td>
  </tr>
  <div>
  <tr  id="newlinktpl" style="display:none">
  <td colspan="2"> 
           <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="RestaurantDealsImage[]" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="RestaurantDealsImage" value="" class="default">
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
			
			</td>
  </tr>
  </div>
  
    <?php if($_GET['eid']!=''){ ?>
  <tr><td colspan="2">
  <?php $imh=explode(',',$CuisineData['RestaurantDealsImageThumb']);
													foreach($imh as $v)
													{
													if($v!='')
													{?>
                                                    <img src="DealsImg/thumb/<?php echo $v; ?>" width="250" height="100" /><br />
													<?php } }
													
													?>
  </td></tr>
  <?php } ?>
  
</table>	</fieldset>
                                    
                                    
                                    		
												
												<input id="submitWizard" type="submit" class="btn btn-primary submitWizard" value="<?php echo $buttonValue; ?>" />
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
	<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
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
