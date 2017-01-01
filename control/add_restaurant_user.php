<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_user","id",$_GET['eid']);
 $OwnerData=mysql_fetch_assoc($CuisineQuery);
}
 ?>	
<div id="page-wrap">
		<!-- left sidebar -->
        <script  type="text/javascript"  language="javascript">

function getOrgTypeListRest(str){

if (str=="")

{

document.getElementById("stateID").innerHTML="";

return;} 

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

document.getElementById("stateID").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","stateFatch.php?q="+str,true);

xmlhttp.send();

}





function getOrgTypeListRestCity(str){

if (str=="")

{

document.getElementById("cityName").innerHTML="";

return;} 

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

document.getElementById("cityName").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","cityFatech.php?q="+str,true);

xmlhttp.send();

}



</script>

		<?php include('route/side_bar.php'); ?>		
<script type="text/javascript">
function RestaurantUserValidate(){
var chkStatus = true
if(document.getElementById('fname').value =="") {
document.getElementById("fname").style.background='#C10000';
document.getElementById("fname").focus();
chkStatus = false;
}
else
document.getElementById('fname').className = "";

if(document.getElementById('user_email').value =="") {
document.getElementById("user_email").style.background='#C10000';
document.getElementById("user_email").focus();
chkStatus = false;
}
else
document.getElementById('user_email').className = "";
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('user_email').value))) {
document.getElementById("user_email").style.background='#8C0000';
document.getElementById("user_email").focus();
chkStatus = false;
}
else
document.getElementById('user_email').style.color = "";
if(document.getElementById('user_pass').value =="") {
document.getElementById("user_pass").style.background='#C10000';
document.getElementById("user_pass").focus();
chkStatus = false;
}
else
document.getElementById('user_pass').className = "";

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
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant User
                            <?php } else { ?>
                            Update Restaurant User
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
                            Setup New Restaurant User
                            <?php } else { ?>
                            Update Restaurant User
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant User has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant User is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant User has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResUserEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant User";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResUserAdd";
										   $buttonValue="Add New Restaurant User";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantUserValidate();">
												
												
                                                    <table width="100%" border="0">
                                                    <tr>

   <td><label for="Name">Country Name <span style="color:#FF0000;">*</span></label></td>

    <td>

    <select class="chzn-select" required data-placeholder="Select Country..." id="countryID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="countryID" style="width:317px;" onChange="getOrgTypeListRest(this.value)">
<option value="">Select</option>
											  <?php 

											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($OwnerData['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>

                                              <?php } ?>

											

											</select>

    </td>
   <td><label for="Name">State Name <span style="color:#FF0000;">*</span></label></td>

    <td id="stateID">

    <select class="chzn-select" required data-placeholder="Select State..." id="stateID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" name="stateID" style="width:317px;"  onChange="getOrgTypeListRestCity(this.value)" >

    <option value="">Select</option>

											  <?php 

											  if($_GET['eid']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$OwnerData['countryID']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($OwnerData['state_name']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select>

    </td></tr>

   

                                                     <tr>

   <td><label for="Name">City Name <span style="color:#FF0000;">*</span></label></td>

    <td id="cityName">  <select class="chzn-select" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" data-placeholder="Select State..." id="cityName" name="cityName" style="width:317px;"  >

    <option value="">Select</option>

											  <?php 

											  if($_GET['eid']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$OwnerData['state_name']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($OwnerData['city_name']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select></td>
                                            <td><label for="restaurant_OwnerLastName">Zipcode</label></td>
    <td><input id="zipcode"  name="zipcode" value="<?php echo $OwnerData['zipcode']; ?>" type="text"  style="width:300px;" /></td>
                                            </tr>

                                                  
   <tr>
    <td><label for="fname">First Name <span style="color:#FF0000;">*</span></label></td>
    <td><input id="fname"  name="fname" value="<?php echo $OwnerData['fname'];?>" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLastName">Last Name </label></td>
    <td><input id="lname"  name="lname" value="<?php echo $OwnerData['lname']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="user_email">User Email <span style="color:#FF0000;">*</span></label></td>
    <td><input id="user_email"  name="user_email" value="<?php echo $OwnerData['user_email']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
    <td><label for="user_pass">Password <span style="color:#FF0000;">*</span></label></td>
    <td><input id="user_pass"  name="user_pass" value="<?php echo $OwnerData['user_pass']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="password"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td><label for="user_phone">User Gender </label></td>
    <td><table> <tr>
    <td><input type="radio" name="gender"   class="ofrty" id="gender" value="Male" <?php if($OwnerData['gender']=='Male'){ ?> checked="checked" <?php } ?> onClick="displaytd();"/> Male</td>
    <td><input type="radio" name="gender" class="ofrty" id="gender" <?php if($OwnerData['gender']=='Female'){ ?> checked="checked" <?php } ?> value="Female" onClick="displaytd();"/> Female</td>
  </tr></table></td>
    <td><label for="user_pass">Street</label></td>
    <td><input id="landmark"  name="landmark" value="<?php echo $OwnerData['landmark']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="user_phone">User Mobile <span style="color:#FF0000;">*</span></label></td>
    <td><input id="user_phone"  name="user_phone"  onkeypress='return isNumberKey(event);' value="<?php echo $OwnerData['user_phone']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
    <td><label for="user_pass">Address <span style="color:#FF0000;">*</span></label></td>
    <td><textarea name="address" id="address" required style="width:300px;"><?php echo $OwnerData['address']; ?></textarea></td>
  </tr>
  
   <tr>
    <td><label for="user_phone">Loyalty Available </label></td>
    <td><table> <tr>
    <td><input type="radio" name="assign_loyalty" required   class="ofrty" id="assign_loyalty" value="0" <?php if($OwnerData['assign_loyalty']==0){ ?> checked="checked" <?php } ?> /> Yes</td>
    <td><input type="radio" name="assign_loyalty" class="ofrty" required id="assign_loyalty" <?php if($OwnerData['assign_loyalty']==1){ ?> checked="checked" <?php } ?> value="1" /> No</td>
  </tr></table></td>
    <td><label for="user_pass">Loyallty Bonus  Point</label></td>
    <td>
    <input id="loyalty_type"  name="loyalty_type"  onkeypress='return isNumberKey(event);' value="<?php echo $OwnerData['loyalty_type']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
  </tr>
  
 
    <td colspan="4" align="center">
  <input  type="submit" class="btn btn-primary " name="RestaurantOfferSubmit" id="RestaurantOfferSubmit" value="<?php echo $buttonValue; ?>" />
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
