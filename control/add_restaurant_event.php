<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantEvent","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
?>	

<script type="text/javascript">
function RestaurantEventValidate(){
var chkStatus = true
if(document.getElementById('RestaurantEventID').value =="") {
document.getElementById("RestaurantEventID").style.background='#C10000';
document.getElementById("RestaurantEventID").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantEventID').className = "";

if(document.getElementById('RestaurantEventName').value =="") {
document.getElementById("RestaurantEventName").style.background='#C10000';
document.getElementById("RestaurantEventName").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantEventName').className = "";
if(document.getElementById('RestaurantEventAddress').value =="") {
document.getElementById("RestaurantEventAddress").style.background='#C10000';
document.getElementById("RestaurantEventAddress").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantEventAddress').className = "";
if(document.getElementById('RestaurantEventDescription').value =="") {
document.getElementById("RestaurantEventDescription").style.background='#C10000';
document.getElementById("RestaurantEventDescription").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantEventDescription').className = "";
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('RestaurantEventImg').value =="") {
document.getElementById("RestaurantEventImg").style.background='#C10000';
document.getElementById("RestaurantEventImg").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantEventImg').className = "";
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
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Event
                            <?php } else { ?>
                            Update Restaurant Event
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
                            Setup New Restaurant Event
                            <?php } else { ?>
                            Update Restaurant Event
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Event has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Event is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Event has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResEventEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Event";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResEventAdd";
										   $buttonValue="Add New Restaurant Event";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantEventValidate();">
												<input id="RestaurantEventImgold" name="RestaurantEventImgold" value="<?php echo $CuisineData['RestaurantEventImgThumb']; ?>" type="hidden"  style="width:300px;"/>
												<fieldset>
													<legend>Event information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="RestaurantEventID">Restaurant Name</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant Name..." onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="RestaurantEventID" name="RestaurantEventID" style="width:317px;">
											 <option value="">Select Restaurant</option>
											  <?php
											  if($_GET['RestaurantEventID']!='')
											{
											$restaurant_id=$_GET['RestaurantEventID'];
											}
											else
											{
											$restaurant_id=$CuisineData['RestaurantEventID'];
											} 
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($restaurant_id==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
    <td><label for="RestaurantEventName">Event Name</label></td>
    <td><input id="RestaurantEventName" name="RestaurantEventName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['RestaurantEventName']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
    <td><label for="RestaurantEventStartDate">Event Start Date</label></td>
    <td><input id="RestaurantEventStartDate" name="RestaurantEventStartDate" value="<?php echo $CuisineData['RestaurantEventStartDate']; ?>" data-date-format="mm/dd/yyyy" type="text" class="datePicker"   style="width:300px;"/></td>
    <td><label for="RestaurantEventStartTime">Event Start Time</label></td>
    <td><input class="input-small timePicker" id="tp2" value="<?php echo $CuisineData['RestaurantEventStartTime']; ?>" type="text"  name="RestaurantEventStartTime"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="RestaurantEventEndDate">Event End Date</label></td>
    <td><input value="<?php echo $CuisineData['RestaurantEventEndDate']; ?>" data-date-format="mm/dd/yyyy" type="text" name="RestaurantEventEndDate" id="RestaurantEventEndDate" class="datePicker"  style="width:300px;" /></td>
    <td><label for="RestaurantEventEndTime">Event End Time</label></td>
    <td><input id="RestaurantEventEndTime"  name="RestaurantEventEndTime"  class="input-small timePicker" value="<?php echo $CuisineData['RestaurantEventEndTime']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td colspan=""><label for="RestaurantEventAddress">Event Address</label></td>
    <td colspan="3">
    <textarea name="RestaurantEventAddress" id="RestaurantEventAddress" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  style="width:800px; height:80px;"><?php echo $CuisineData['RestaurantEventAddress']; ?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="RestaurantEventDescription">Event Description</label></td>
    <td colspan="3">
    <textarea name="RestaurantEventDescription" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="RestaurantEventDescription" style="width:800px; height:80px;"><?php echo $CuisineData['RestaurantEventDescription']; ?></textarea>
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
													<legend>Event Image information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                   <tr>
    <td><label>Event Image <span class="f_req">*</span></label></td>
    <td>
    	<div id="newlink">
         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                     <input type="file" name="RestaurantEventImg[]" id="RestaurantEventImg" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  />
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
          <div id="newlink">
         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                     <input type="file" name="RestaurantEventImg[]" id="RestaurantEventImg" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  />
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
			
			</td>
  </tr>
  </div>
  
    <?php if($_GET['eid']!=''){ ?>
  <tr><td colspan="2">
  <?php $imh=explode(',',$CuisineData['RestaurantEventImgThumb']);
													foreach($imh as $v)
													{
													if($v!='')
													{?>
                                                    <img src="EventImg/thumb/<?php echo $v; ?>" width="250" height="100" /><br />
													<?php }
													 }
													
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
