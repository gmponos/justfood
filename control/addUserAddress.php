<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
include('route/db.php'); 
$dbObj=new db;
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("user_newaddress","id",$_GET['eid']);
 $OwnerData=mysql_fetch_assoc($CuisineQuery);
}
extract($_POST);
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_POST['EditAddressSubmit']))
{
@$DataUserUpdate="UPDATE `user_newaddress` SET `GustUserPincode` = '$GustUserPincode', `GustUserAddress` = N'$GustUserAddress', `GustUserBellName` = N'$GustUserBellName', `GustUserFloor` = N'$GustUserFloor', `GustUserLandlineAdress` = N'$GustUserLandlineAdress', `countryID` = '$countryID', `stateID` = '$stateID', `GustUserCityName` = N'$cityName', `GustUserMobileNo` = '$GustUserMobileNo', `GustUserStreetAddress` = N'$GustUserStreetAddress', `ip` = '$ip', `ContactAddressTitle` = N'$ContactAddressTitle', `loginID` = '$loginID' WHERE `id` = '".$_GET['eid']."'";
$CuisineInsert=mysql_query($DataUserUpdate);
$msg="Your Account has been successfully updated !";
}

if(isset($_POST['AddAddressSubmit']))
{
@$UserRegistrationData="INSERT INTO `user_newaddress` (`id`, `GustUserName`, `GustUserEmail`, `GustUserPassword`, `GustUserPincode`, `GustUserAddress`, `GustUserBellName`, `GustUserFloor`, `GustUserLandlineAdress`, `countryID`, `stateID`, `GustUserCityName`, `GustUserMobileNo`, `GustUserStreetAddress`, `ip`, `RestaurantService`, `UserGustType`, `ContactAddressTitle`, `loginID`) VALUES (NULL, '$GustUserName', '$GustUserEmail', '$GustUserPassword', '$GustUserPincode', N'$GustUserAddress', N'$GustUserBellName', N'$GustUserFloor', N'$GustUserLandlineAdress', '$countryID', '$stateID', N'$cityName', '$GustUserMobileNo', N'$GustUserStreetAddress', '$ip', '', '', N'$ContactAddressTitle', '$loginID');";
$CuisineInsert=mysql_query($UserRegistrationData);
$msg="Your Account has been successfully saved !";
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

function isNumberKey(evt)
  {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
      }

</script>

		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New User  Address
                            <?php } else { ?>
                            Update User  Address
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
                            Setup New User  Address
                            <?php } else { ?>
                            Update User  Address
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant User  Address has been successfully saved
		                                     </div>
											<?php } if($error!=''){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant User  Address is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant User  Address has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $buttonName="EditAddressSubmit";
											$buttonValue="Edit Restaurant User Address";
										   }
										   else
										   {
										  $buttonName="AddAddressSubmit";
										   $buttonValue="Add New Restaurant User Address";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" >
												
												
                                                    <table width="100%" border="0">
                                                    <tr>
                                                    <tr><td><label for="Name">Select User <span style="color:#FF0000;">*</span></label></td>   <td colspan="3">

    <select class="chzn-select" required  id="loginID" onMouseOver="return clearFieldValue(this);" name="loginID" style="width:317px;" >
<option value="">Select</option>
											  <?php 

											  $StateQuery = $dbb->showtable("tbl_user","fname","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($OwnerData['loginID']==$StateData['id']){ ?> selected <?php } ?>>
											  <?php if($StateData['fname']!=''){ ?>
											  <?php echo ucwords($StateData['fname']); ?> <?php echo ucwords($StateData['lname']); ?>
                                              <?php } else { ?>
                                               <?php echo ucwords($StateData['user_name']); ?>
                                              
                                              <?php } ?>
                                              </option>

                                              <?php } ?>

											

											</select>

    </td></tr>

   <td><label for="Name">Country Name <span style="color:#FF0000;">*</span></label></td>

    <td>

    <select class="chzn-select" required  id="countryID" onMouseOver="return clearFieldValue(this);" name="countryID" style="width:317px;" onChange="getOrgTypeListRest(this.value)">
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

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($OwnerData['stateID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select>

    </td></tr>

   

                                                     <tr>

   <td><label for="Name">City Name <span style="color:#FF0000;">*</span></label></td>

    <td id="cityName">  <select class="chzn-select" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" data-placeholder="Select State..." id="cityName" required name="cityName" style="width:317px;"  >

    <option value="">Select</option>

											  <?php 

											  if($_GET['eid']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$OwnerData['stateID']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($OwnerData['GustUserCityName']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select></td>
                                            <td><label for="restaurant_OwnerLastName">Zipcode <span style="color:#FF0000;">*</span></label></td>
    <td><input id="GustUserPincode" required  name="GustUserPincode" value="<?php echo $OwnerData['GustUserPincode']; ?>" type="text"  style="width:300px;" /></td>
                                            </tr>

                                                  
  
  <tr>
    <td><label for="user_phone">Floor No <span style="color:#FF0000;">*</span></label></td>
    <td><input id="GustUserFloor" required  name="GustUserFloor" value="<?php echo $OwnerData['GustUserFloor']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
    <td><label for="user_pass">Street <span style="color:#FF0000;">*</span></label></td>
    <td><input id="GustUserStreetAddress" required   name="GustUserStreetAddress" value="<?php echo $OwnerData['GustUserStreetAddress']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="user_phone">Landline <span style="color:#FF0000;">*</span></label></td>
    <td><input id="GustUserLandlineAdress" required  name="GustUserLandlineAdress" value="<?php echo $OwnerData['GustUserLandlineAdress']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
    <td><label for="user_pass">Address <span style="color:#FF0000;">*</span></label></td>
    <td><textarea name="GustUserAddress" required id="GustUserAddress" style="width:300px;"><?php echo $OwnerData['GustUserAddress']; ?></textarea></td>
  </tr>
   <tr>
    <td><label for="user_phone">Mobile No <span style="color:#FF0000;">*</span></label></td>
    <td><input id="GustUserMobileNo" required  name="GustUserMobileNo"  onkeypress='return isNumberKey(event);' value="<?php echo $OwnerData['GustUserMobileNo']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" /></td>
    <td><label for="user_pass">Address Title <span style="color:#FF0000;">*</span></label></td>
    <td><input id="user_phone" required  name="ContactAddressTitle" value="<?php echo $OwnerData['ContactAddressTitle']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" type="text"  style="width:300px;" />
    <br><p style="color:#CCCCCC; font-size:13px; font-style:italic;">Office,Home etc</p>
    </td>
  </tr>
 
  
   
  
 
    <td colspan="4" align="center">
  <input  type="submit" class="btn btn-primary " name="<?php echo $buttonName; ?>" id="RestaurantOfferSubmit" value="<?php echo $buttonValue; ?>" />
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
