<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantOffer","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 ?>
 
 <script type="text/javascript">
function RestaurantOfferValidate(){
var chkStatus = true
if(document.getElementById('RestaurantOfferPrice').value =="") {
document.getElementById("RestaurantOfferPrice").style.background='#C10000';
document.getElementById("RestaurantOfferPrice").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantOfferPrice').className = "";
if(document.getElementById('RestaurantOfferDescription').value =="") {
document.getElementById("RestaurantOfferDescription").style.background='#C10000';
document.getElementById("RestaurantOfferDescription").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantOfferDescription').className = "";

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

function RestaurantDateCheck(){
var startdate=document.getElementById('RestaurantOfferStartDate').value;
var enddate=document.getElementById('RestaurantOfferEndDate').value;
if (startdate > enddate) {
alert("Start Date is greater than End Date!");
 document.getElementById("RestaurantOfferEndDate").value = "";
 document.getElementById("RestaurantOfferSubmit").disabled=true;
}
else
{
document.getElementById("RestaurantOfferSubmit").disabled=false;
}
}
</script> 	
 <script type="text/javascript">
											
	  function toggleTables(which)
        {

    if(which == "5" ) {
        document.getElementById('displayTimeData').style.display='block';
		document.getElementById('displayTimeDataInteverval').style.display = "none";
       }
	   else if(which == "6" ) {
        document.getElementById('displayTimeDataInteverval').style.display='block';
		document.getElementById('displayTimeData').style.display = "none";
       }
        else
		{
		document.getElementById('displayTimeData').style.display = "none";
		document.getElementById('displayTimeDataInteverval').style.display = "none";
		}
}
										
											</script>
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
                            Setup New Restaurant Discount
                            <?php } else { ?>
                            Update Restaurant Discount
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
                            Setup New Restaurant Discount
                            <?php } else { ?>
                            Update Restaurant Discount
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Discount has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Discount is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Discount has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResOfferEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Discount";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResOfferAdd";
										   $buttonValue="Add New Restaurant Discount";
										   }
										   
										   ?>
                                      
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantOfferValidate()">
												
												
                                                    <table width="100%" border="0">
                                                     
                                                     <tr>
    <td><label for="restaurant_id">Restaurant Name</label></td>
    <td>	<select  data-placeholder="Select Restaurant..." required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_id" name="restaurant_id" style="width:317px;" onchange="getOrgTypeListRestOfferMenu(this.value)" >
    <option >Select Restaurant</option>
    
											  <?php 
											  
											  $StateQuery = mysql_query("select * from tbl_restaurantAdd where id='".$_SESSION['restaurant_id']."'");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_SESSION['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php }  ?>
											
											</select></td>
                                            </tr>
                                            
                                             <tr>
    <td colspan=""><label for="restaurant_website">Order Discount Type</label></td>
    <td colspan="3">
  <select class="chzn-select" data-placeholder="Select Restaurant..." required   id="OrderDiscountType" name="OrderDiscountType" style="width:317px;" >
    <option value="">Select</option>
      <option value="1" <?php if($CuisineData['OrderDiscountType']==1){ ?> selected <?php } ?>>Always</option>
        <option value="2" <?php if($CuisineData['OrderDiscountType']==2){ ?> selected <?php } ?>>First Order</option>
         
          </select>
    </td>
   
  </tr> 
                                           
                                             <tr>
    <td colspan=""><label for="restaurant_website">Order Discount show</label></td>
    <td colspan="3">
  <select class="chzn-select" data-placeholder="Select Restaurant..." required  onchange="toggleTables(this.value)"  id="OrderDiscountshow" name="OrderDiscountshow" style="width:317px;" >
    <option value="">Select</option>
      <option value="1" <?php if($CuisineData['OrderDiscountshow']==1){ ?> selected <?php } ?>>all orders up to</option>
        <option value="2" <?php if($CuisineData['OrderDiscountshow']==2){ ?> selected <?php } ?>>all orders above  </option>
          <option value="3" <?php if($CuisineData['OrderDiscountshow']==3){ ?> selected <?php } ?>>all orders over</option>
          <!--<option value="4" <?php if($CuisineData['OrderDiscountshow']==4){ ?> selected <?php } ?>>workplace</option>
        -->
           <?php /*?><option value="5" <?php if($CuisineData['OrderDiscountshow']==5){ ?> selected <?php } ?>>Happy Hours</option>
           <option value="6" <?php if($CuisineData['OrderDiscountshow']==6){ ?> selected <?php } ?>>Time Interval</option><?php */?>
          </select>
    </td>
   
  </tr> 
  
  <tr><td colspan="4" align="center" > <table width="98%" border="0" id="displayTimeDataInteverval" <?php if($CuisineData['OrderDiscountshow']==6){ ?> style="display:block" <?php } else {?> style="display:none;" <?php } ?>>
  <tr >
  
    <td width="39%"><strong style="padding:5px;">Discount Hours Start Timing</strong></td>
    <td width="42%"><strong style="padding:5px;">Discount Hours End Timing</strong></td>
  </tr>
 
   <tr >
  
    <td >	<input type="text" name="restaurant_discount_timeinterval_open_hr" id="restaurant_discount_timeinterval_open_hr" value="<?php echo $CuisineData['restaurant_discount_timeinterval_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_timeinterval_open_min" id="restaurant_discount_timeinterval_open_min" value="<?php echo $CuisineData['restaurant_discount_timeinterval_open_min']; ?>" style="width:100px;" />
			  
               
               <select name="restaurant_discount_timeinterval_open_am" placeholder='AM OR PM' id="restaurant_discount_timeinterval_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_timeinterval_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_timeinterval_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
             
               </select>
               
               </td>
    <td><input type="text" name="restaurant_discount_timeinterval_close_hr" id="restaurant_discount_timeinterval_close_hr" value="<?php echo $CuisineData['restaurant_discount_timeinterval_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_timeinterval_close_min" id="restaurant_discount_timeinterval_close_min" value="<?php echo $CuisineData['restaurant_discount_timeinterval_close_min']; ?>" style="width:100px;" />
			  
                <select name="restaurant_discount_timeinterval_open_pm" placeholder='AM OR PM' id="restaurant_discount_timeinterval_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_mon_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_mon_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             </select>
              </td>
  </tr></table></td></tr>
  
   <tr ><td colspan="3"><hr></td></tr>
  
  <tr><td colspan="4" align="center" > <table width="98%" border="0" id="displayTimeData" <?php if($CuisineData['OrderDiscountshow']==5){ ?> style="display:block" <?php } else {?> style="display:none;" <?php } ?>>
  <tr >
    <td width="19%"><strong style="padding:5px;">Discount Days</strong></td>
    <td width="39%"><strong style="padding:5px;">Discount Hours Start Timing</strong></td>
    <td width="42%"><strong style="padding:5px;">Discount Hours End Timing</strong></td>
  </tr>
  <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_mon_selected" id="restaurant_discount_mon_selected" <?php if($CuisineData['restaurant_discount_mon_selected']!=''){ ?> checked="checked" <?php } ?>  value="Monday" />
    &nbsp;&nbsp;Monday</td>
    <td >	<input type="text" name="restaurant_discount_mon_open_hr" id="restaurant_discount_mon_open_hr" value="<?php echo $CuisineData['restaurant_discount_mon_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_mon_open_min" id="restaurant_discount_mon_open_min" value="<?php echo $CuisineData['restaurant_discount_mon_open_min']; ?>" style="width:100px;" />
			  
               
               <select name="restaurant_discount_mon_open_am" placeholder='AM OR PM' id="restaurant_discount_mon_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_mon_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_mon_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
             
               </select>
               
               </td>
    <td><input type="text" name="restaurant_discount_mon_close_hr" id="restaurant_discount_mon_close_hr" value="<?php echo $CuisineData['restaurant_discount_mon_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_mon_close_min" id="restaurant_discount_mon_close_min" value="<?php echo $CuisineData['restaurant_discount_mon_close_min']; ?>" style="width:100px;" />
			  
                <select name="restaurant_discount_mon_open_pm" placeholder='AM OR PM' id="restaurant_discount_mon_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_mon_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_mon_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             </select>
              </td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_tue_selected" value="Tuesday" id="restaurant_discount_tue_selected" <?php if($CuisineData['restaurant_discount_tue_selected']!=''){ ?> checked="checked" <?php } ?>   />
    &nbsp;&nbsp;Tuesday</td>
    <td >	<input type="text" name="restaurant_discount_tue_open_hr" id="restaurant_discount_tue_open_hr" value="<?php echo $CuisineData['restaurant_discount_tue_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_tue_open_min" id="restaurant_discount_tue_open_min" value="<?php echo $CuisineData['restaurant_discount_tue_open_min']; ?>" style="width:100px;" />
               <select name="restaurant_discount_tue_open_am" placeholder='AM OR PM' id="restaurant_discount_tue_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_tue_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_tue_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_discount_tue_close_hr" id="restaurant_discount_tue_close_hr" value="<?php echo $CuisineData['restaurant_discount_tue_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_tue_close_min" id="restaurant_discount_tue_close_min" value="<?php echo $CuisineData['restaurant_discount_tue_close_min']; ?>" style="width:100px;" />
              <select name="restaurant_discount_tue_open_pm" placeholder='AM OR PM' id="restaurant_discount_tue_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_tue_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_tue_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
			 </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_wed_selected" id="restaurant_discount_wed_selected" value="Wednesday" <?php if($CuisineData['restaurant_discount_wed_selected']!=''){ ?> checked="checked" <?php } ?> />&nbsp;&nbsp;Wednesday</td>
    <td >	<input type="text" name="restaurant_discount_wed_open_hr" id="restaurant_discount_wed_open_hr" value="<?php echo $CuisineData['restaurant_discount_wed_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_wed_open_min" id="restaurant_discount_wed_open_min" value="<?php echo $CuisineData['restaurant_discount_wed_open_min']; ?>" style="width:100px;" />
             
              <select name="restaurant_discount_wed_open_am" placeholder='AM OR PM' id="restaurant_discount_wed_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_wed_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_wed_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
             
			  </td>
    <td><input type="text" name="restaurant_discount_wed_close_hr" id="restaurant_discount_wed_close_hr" value="<?php echo $CuisineData['restaurant_discount_wed_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_wed_close_min" id="restaurant_discount_wed_close_min" value="<?php echo $CuisineData['restaurant_discount_wed_close_min']; ?>" style="width:100px;" />
              <select name="restaurant_discount_wed_open_pm" placeholder='AM OR PM' id="restaurant_discount_wed_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_wed_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_wed_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
			  </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_thu_selected" id="restaurant_discount_thu_selected" value="Thursday" <?php if($CuisineData['restaurant_discount_thu_selected']!=''){ ?> checked="checked" <?php } ?>    />&nbsp;&nbsp;Thursday</td>
    <td >	<input type="text" name="restaurant_discount_thu_open_hr" id="restaurant_discount_thu_open_hr" value="<?php echo $CuisineData['restaurant_discount_thu_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_thu_open_min" id="restaurant_discount_thu_open_min" value="<?php echo $CuisineData['restaurant_discount_thu_open_min']; ?>" style="width:100px;" />
               <select name="restaurant_discount_thu_open_am" placeholder='AM OR PM' id="restaurant_discount_thu_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_thu_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_thu_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_discount_thu_close_hr" id="restaurant_discount_thu_close_hr" value="<?php echo $CuisineData['restaurant_discount_thu_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_thu_close_min" id="restaurant_discount_thu_close_min" value="<?php echo $CuisineData['restaurant_discount_thu_close_min']; ?>" style="width:100px;" />
             
             <select name="restaurant_discount_thu_open_pm" placeholder='AM OR PM' id="restaurant_discount_thu_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_thu_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_thu_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               </select>
             </td>
  </tr>
  
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_fri_selected" id="restaurant_discount_fri_selected" value="Friday" <?php if($CuisineData['restaurant_discount_fri_selected']!=''){ ?> checked="checked" <?php } ?>  />&nbsp;&nbsp;Friday</td>
    <td >	<input type="text" name="restaurant_discount_fri_open_hr" id="restaurant_discount_fri_open_hr" value="<?php echo $CuisineData['restaurant_discount_fri_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_fri_open_min" id="restaurant_discount_fri_open_min" value="<?php echo $CuisineData['restaurant_discount_fri_open_min']; ?>" style="width:100px;" />
              <select name="restaurant_discount_fri_open_am" placeholder='AM OR PM' id="restaurant_discount_fri_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_fri_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_fri_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			</td>
    <td><input type="text" name="restaurant_discount_fri_close_hr" id="restaurant_discount_fri_close_hr" value="<?php echo $CuisineData['restaurant_discount_fri_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_fri_close_min" id="restaurant_discount_fri_close_min" value="<?php echo $CuisineData['restaurant_discount_fri_close_min']; ?>" style="width:100px;" />
			   <select name="restaurant_discount_fri_open_pm" placeholder='AM OR PM' id="restaurant_discount_fri_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_fri_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_fri_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select></td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_sat_selected" id="restaurant_discount_sat_selected" value="Saturday" <?php if($CuisineData['restaurant_discount_sat_selected']!=''){ ?> checked="checked" <?php } ?>    />&nbsp;&nbsp;Saturday</td>
    <td >	<input type="text" name="restaurant_discount_sat_open_hr" id="restaurant_discount_sat_open_hr" value="<?php echo $CuisineData['restaurant_discount_sat_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_sat_open_min" id="restaurant_discount_sat_open_min" value="<?php echo $CuisineData['restaurant_discount_sat_open_min']; ?>" style="width:100px;" />
              <select name="restaurant_discount_sat_open_am" placeholder='AM OR PM' id="restaurant_discount_sat_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_sat_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_sat_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_discount_sat_close_hr" id="restaurant_discount_sat_close_hr" value="<?php echo $CuisineData['restaurant_discount_sat_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_sat_close_min" id="restaurant_discount_sat_close_min" value="<?php echo $CuisineData['restaurant_discount_sat_close_min']; ?>" style="width:100px;" />
			   
                 <select name="restaurant_discount_sat_open_pm" placeholder='AM OR PM' id="restaurant_discount_sat_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_sat_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_sat_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select>
               
             </td>
  </tr>
  
   <tr ><td colspan="3"><hr></td></tr>
   <tr >
    <td><input type="checkbox" name="restaurant_discount_sun_selected" id="restaurant_discount_sun_selected" value="Sunday" <?php if($CuisineData['restaurant_discount_sun_selected']!=''){ ?> checked="checked" <?php } ?>  />&nbsp;&nbsp;Sunday</td>
    <td >	<input type="text" name="restaurant_discount_sun_open_hr" id="restaurant_discount_sun_open_hr" value="<?php echo $CuisineData['restaurant_discount_sun_open_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_sun_open_min" id="restaurant_discount_sun_open_min" value="<?php echo $CuisineData['restaurant_discount_sun_open_min']; ?>" style="width:100px;" />
             <select name="restaurant_discount_sun_open_am" placeholder='AM OR PM' id="restaurant_discount_sun_open_am" style="width:100px;">
               <option value="AM" <?php if($CuisineData['restaurant_discount_sun_open_am']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
               <option value="PM" <?php if($CuisineData['restaurant_discount_sun_open_am']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               </select>
			  </td>
    <td><input type="text" name="restaurant_discount_sun_close_hr" id="restaurant_discount_sun_close_hr" value="<?php echo $CuisineData['restaurant_discount_sun_close_hr']; ?>" style="width:100px; " />
		     <input type="text" name="restaurant_discount_sun_close_min" id="restaurant_discount_sun_close_min" value="<?php echo $CuisineData['restaurant_discount_sun_close_min']; ?>" style="width:100px;" />
                <select name="restaurant_discount_sun_open_pm" placeholder='AM OR PM' id="restaurant_discount_sun_open_pm" style="width:100px;">
                  <option value="PM" <?php if($CuisineData['restaurant_discount_sun_open_pm']=='PM'){ ?> selected="selected" <?php } ?>>PM</option>
               <option value="AM" <?php if($CuisineData['restaurant_discount_sun_open_pm']=='AM'){ ?> selected="selected" <?php } ?>>AM</option>
             
               </select>
			  </td>
  </tr></table></td></tr>
                                  <tr>
    <td colspan=""><label for="restaurant_website">Order Discount Menu</label></td>
    <td colspan="3">
  <select data-placeholder="Select Restaurant..." multiple="multiple"  id="OrderDiscountmenuCategory" name="OrderDiscountmenuCategory[]" style="width:317px;" >
    <option value="">Select</option>
       <?php 
											 if($_SESSION['restaurant_id']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_restMenuCategory","restaurantMenuID",$_SESSION['restaurant_id']);
											  }
											
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if(strstr($CuisineData['OrderDiscountmenuCategory'],$StateData['id'])){?> selected <?php } ?>><?php echo ucwords($StateData['restaurantMenuName']); ?></option>
                                              <?php } ?>
											  
          </select>
    </td>
   
  </tr> 
  
  
                                            <tr>
    <td colspan=""><label for="restaurant_website">Start Order Price</label></td>
    <td colspan="3">
    <input type="text" name="RestaurantOfferStartPrice" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="RestaurantOfferStartPrice" style="width:300px;" required value="<?php echo $CuisineData['RestaurantOfferStartPrice']; ?>"  />
    </td>
   
  </tr> 
                                            <tr>
    <td><label for="restaurant_country">Discount Type</label></td>
    <td><table width="40%"> <tr>
    <td><input type="radio" name="RestaurantoffrType" required  class="ofrty" id="offrP" value="p" <?php if($CuisineData['RestaurantoffrType']=='p'){ ?> checked="checked" <?php } ?> onClick="displaytd();"/> Price Discount</td>
    <td><input type="radio" name="RestaurantoffrType" required class="ofrty" id="offrP" <?php if($CuisineData['RestaurantoffrType']=='pr'){ ?> checked="checked" <?php } ?> value="pr" onClick="displaytd();"/> Percentage Discount
    
    <?php /*?><input type="radio" name="RestaurantoffrType" required class="ofrty" id="offrP" <?php if($CuisineData['RestaurantoffrType']=='fr'){ ?> checked="checked" <?php } ?> value="fr" onClick="displaytd();"/> Free Dish Discount<?php */?>
    </td>
  </tr></table></td>
  </tr>
  
      <tr>
    <td><label for="restaurant_country">Home Display</label></td>
    <td><table width="40%"> <tr>
    <td><input type="radio" name="topDiscount" required  class="ofrty" id="offrP" value="0" <?php if($CuisineData['topDiscount']=='0'){ ?> checked="checked" <?php } ?> onClick="displaytd();"/>Yes</td>
    <td><input type="radio" name="topDiscount" required class="ofrty" id="offrP" <?php if($CuisineData['topDiscount']=='1'){ ?> checked="checked" <?php } ?> value="1" onClick="displaytd();"/> No
   
    </td>
  </tr></table></td>
  </tr>
  
   <tr>
    <td colspan=""><label for="restaurant_website">Discount Price</label></td>
    <td colspan="3">
    <input type="text" name="RestaurantOfferPrice" required onMouseOver="return clearFieldValue(this);" style="width:300px;" onClick="return clearFieldValue(this);"  id="RestaurantOfferPrice" value="<?php echo $CuisineData['RestaurantOfferPrice']; ?>"  />
    </td>
   
  </tr>
  <tr>
    <td><label for="RestaurantOfferStartDate">Discount Start Date</label></td>
    <td><input id="RestaurantOfferStartDate" required name="RestaurantOfferStartDate"  value="<?php echo $CuisineData['RestaurantOfferStartDate']; ?>" data-date-format="mm/dd/yyyy" type="text" class="datePicker"   style="width:300px;"/></td>
    </tr>
    <tr>
    <td><label for="RestaurantOfferEndDate">Discount End Date</label></td>
    <td><input value="<?php echo $CuisineData['RestaurantOfferEndDate']; ?>" required data-date-format="mm/dd/yyyy" type="text" name="RestaurantOfferEndDate" id="RestaurantOfferEndDate"  class="datePicker"   style="width:300px;" onblur="return RestaurantDateCheck();" /></td>
  </tr>
 
    <tr>
    <td colspan=""><label for="restaurant_website">Discount Description</label></td>
    <td colspan="3">
    <textarea name="RestaurantOfferDescription" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   id="RestaurantOfferDescription" class="twys" style="width:700px; height:80px;"><?php echo $CuisineData['RestaurantOfferDescription']; ?></textarea>
    </td>
   
  </tr>
  
    <tr>
   
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
