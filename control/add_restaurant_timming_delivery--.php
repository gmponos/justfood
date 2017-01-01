<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('model_call.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['restaurant_id']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restDeliveryTime24","restaurantID",$_GET['restaurant_id']);
 $data=mysql_fetch_assoc($CuisineQuery);
 $CuisineQuery1 = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']);
 $data2=mysql_fetch_assoc($CuisineQuery1);
}

if(isset($_POST['addEditContent']))
{

if($_POST['restaurant_delivery_sun_selected']!='')
{
$SundayBusinessHoursOpenTime=$_POST['SundayBusinessHoursOpenTime'];
$SundayBusinessHoursCloseTime=$_POST['SundayBusinessHoursCloseTime'];
$restaurant_delivery_sun_selected=$_POST['restaurant_delivery_sun_selected'];
}
else
{
$SundayBusinessHoursOpenTime=$_POST['SundayBusinessHoursClose'];
$SundayBusinessHoursCloseTime=$_POST['SundayBusinessHoursClose'];

}
if($_POST['restaurant_delivery_mon_selected']!='')
{
$MondayBusinessHoursOpenTime=$_POST['MondayBusinessHoursOpenTime'];
$MondayBusinessHoursCloseTime=$_POST['MondayBusinessHoursCloseTime'];
$restaurant_delivery_mon_selected=$_POST['restaurant_delivery_mon_selected'];
}
else
{
$MondayBusinessHoursOpenTime=$_POST['MondayBusinessHoursClose'];
$MondayBusinessHoursCloseTime=$_POST['MondayBusinessHoursClose'];
}
if($_POST['restaurant_delivery_tue_selected']!='')
{
$TuesdayBusinessHoursOpenTime=$_POST['TuesdayBusinessHoursOpenTime'];
$TuesdayBusinessHoursCloseTime=$_POST['TuesdayBusinessHoursCloseTime'];
$restaurant_delivery_tue_selected=$_POST['restaurant_delivery_tue_selected'];
}
else
{
$TuesdayBusinessHoursOpenTime=$_POST['TuesdayBusinessHoursClose'];
$TuesdayBusinessHoursCloseTime=$_POST['TuesdayBusinessHoursClose'];
}


if($_POST['restaurant_delivery_wed_selected']!='')
{
$WednesdayBusinessHoursOpenTime=$_POST['WednesdayBusinessHoursOpenTime'];
$WednesdayBusinessHoursCloseTime=$_POST['WednesdayBusinessHoursCloseTime'];
$restaurant_delivery_wed_selected=$_POST['restaurant_delivery_wed_selected'];
}
else
{
$WednesdayBusinessHoursOpenTime=$_POST['WednesdayBusinessHoursClose'];
$WednesdayBusinessHoursCloseTime=$_POST['WednesdayBusinessHoursClose'];
}

if($_POST['restaurant_delivery_thu_selected']!='')
{
$ThursdayBusinessHoursOpenTime=$_POST['ThursdayBusinessHoursOpenTime'];
$ThursdayBusinessHoursCloseTime=$_POST['ThursdayBusinessHoursCloseTime'];
$restaurant_delivery_thu_selected=$_POST['restaurant_delivery_thu_selected'];
}
else
{
$ThursdayBusinessHoursOpenTime=$_POST['ThursdayBusinessHoursClose'];
$ThursdayBusinessHoursCloseTime=$_POST['ThursdayBusinessHoursClose'];
}

if($_POST['restaurant_delivery_fri_selected']!='')
{
$FridayBusinessHoursOpenTime=$_POST['FridayBusinessHoursOpenTime'];
$FridayBusinessHoursCloseTime=$_POST['FridayBusinessHoursCloseTime'];
$restaurant_delivery_fri_selected=$_POST['restaurant_delivery_fri_selected'];
}
else
{
$FridayBusinessHoursOpenTime=$_POST['FridayBusinessHoursClose'];
$FridayBusinessHoursCloseTime=$_POST['FridayBusinessHoursClose'];
}
if($_POST['restaurant_delivery_sat_selected']!='')
{
$SaturdayBusinessHoursOpenTime=$_POST['SaturdayBusinessHoursOpenTime'];
$SaturdayBusinessHoursCloseTime=$_POST['SaturdayBusinessHoursCloseTime'];
$restaurant_delivery_sat_selected=$_POST['restaurant_delivery_sat_selected'];
}
else
{
$SaturdayBusinessHoursOpenTime=$_POST['SaturdayBusinessHoursClose'];
$SaturdayBusinessHoursCloseTime=$_POST['SaturdayBusinessHoursClose'];
}

$data = array(
	'SundayBusinessHoursOpenTime' => $SundayBusinessHoursOpenTime,
	'SundayBusinessHoursCloseTime' => $SundayBusinessHoursCloseTime,
	'MondayBusinessHoursOpenTime' => $MondayBusinessHoursOpenTime,
	'MondayBusinessHoursCloseTime' => $MondayBusinessHoursCloseTime,
	'TuesdayBusinessHoursOpenTime' => $TuesdayBusinessHoursOpenTime,
	'TuesdayBusinessHoursCloseTime' => $TuesdayBusinessHoursCloseTime,
	'WednesdayBusinessHoursOpenTime' => $WednesdayBusinessHoursOpenTime,
	'WednesdayBusinessHoursCloseTime' => $WednesdayBusinessHoursCloseTime,
	'ThursdayBusinessHoursOpenTime' => $ThursdayBusinessHoursOpenTime,
	'ThursdayBusinessHoursCloseTime' => $ThursdayBusinessHoursCloseTime,
	'FridayBusinessHoursOpenTime' => $FridayBusinessHoursOpenTime,
	'FridayBusinessHoursCloseTime' => $FridayBusinessHoursCloseTime,
	'SaturdayBusinessHoursOpenTime' => $SaturdayBusinessHoursOpenTime,
	'SaturdayBusinessHoursCloseTime' => $SaturdayBusinessHoursCloseTime,
	'restaurant_delivery_sun_selected' => $restaurant_delivery_sun_selected,
	'restaurant_delivery_mon_selected' => $restaurant_delivery_mon_selected,
	'restaurant_delivery_tue_selected' => $restaurant_delivery_tue_selected,
	'restaurant_delivery_wed_selected' => $restaurant_delivery_wed_selected,
	'restaurant_delivery_thu_selected' => $restaurant_delivery_thu_selected,	
	'restaurant_delivery_fri_selected' => $restaurant_delivery_fri_selected,
	'restaurant_delivery_sat_selected' => $restaurant_delivery_sat_selected,
	'restaurantID' => $_GET['restaurant_id'],
	);
	$resultDataTime = $m->update('tbl_restDeliveryTime24',$data,'restaurantID='.$_GET['restaurant_id']);
$emsg=1;
}
 ?>	
 <script type="text/javascript">
 function changeStatusall(){
            if(document.getElementById("applyall").checked == true){
			
                document.getElementById("SundayBusinessHours").disabled= true;
				document.getElementById("MondayBusinessHours").disabled= true;
				document.getElementById("TuesdayBusinessHours").disabled= true;
				document.getElementById("WednesdayBusinessHours").disabled= true;
				document.getElementById("ThursdayBusinessHours").disabled= true;
				document.getElementById("FridayBusinessHours").disabled= true;
				document.getElementById("SaturdayBusinessHours").disabled= true;
				
				
				document.getElementById("SundayBusinessHours1").disabled= true;
				document.getElementById("MondayBusinessHours1").disabled= true;
				document.getElementById("TuesdayBusinessHours1").disabled= true;
				document.getElementById("WednesdayBusinessHours1").disabled= true;
				document.getElementById("ThursdayBusinessHours1").disabled= true;
				document.getElementById("FridayBusinessHours1").disabled= true;
				document.getElementById("SaturdayBusinessHours1").disabled= true;
				
				 document.getElementById("SundayBusinessHoursClose").checked= true;
				document.getElementById("MondayBusinessHoursClose").checked= true;
				document.getElementById("TuesdayBusinessHoursClose").checked= true;
				document.getElementById("WednesdayBusinessHoursClose").checked= true;
				document.getElementById("ThursdayBusinessHoursClose").checked= true;
				document.getElementById("FridayBusinessHoursClose").checked= true;
				document.getElementById("SaturdayBusinessHoursClose").checked= true;
				
                
            } else {
                document.getElementById("SundayBusinessHours").disabled= false;
				document.getElementById("MondayBusinessHours").disabled= false;
				document.getElementById("TuesdayBusinessHours").disabled= false;
				document.getElementById("WednesdayBusinessHours").disabled= false;
				document.getElementById("ThursdayBusinessHours").disabled= false;
				document.getElementById("FridayBusinessHours").disabled= false;
				document.getElementById("SaturdayBusinessHours").disabled= false;
				
				document.getElementById("SundayBusinessHours1").disabled= false;
				document.getElementById("MondayBusinessHours1").disabled= false;
				document.getElementById("TuesdayBusinessHours1").disabled= false;
				document.getElementById("WednesdayBusinessHours1").disabled= false;
				document.getElementById("ThursdayBusinessHours1").disabled= false;
				document.getElementById("FridayBusinessHours1").disabled= false;
				document.getElementById("SaturdayBusinessHours1").disabled= false;
				
				 document.getElementById("SundayBusinessHoursClose").checked= false;
				document.getElementById("MondayBusinessHoursClose").checked= false;
				document.getElementById("TuesdayBusinessHoursClose").checked= false;
				document.getElementById("WednesdayBusinessHoursClose").checked= false;
				document.getElementById("ThursdayBusinessHoursClose").checked= false;
				document.getElementById("FridayBusinessHoursClose").checked= false;
				document.getElementById("SaturdayBusinessHoursClose").checked= false;
               
            }
        }
 function changeStatus(){
            if(document.getElementById("SundayBusinessHoursClose").checked == true){
		
                document.getElementById("SundayBusinessHours").disabled= true;
				document.getElementById("SundayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("SundayBusinessHours").disabled= false;
				document.getElementById("SundayBusinessHours1").disabled= false;
               
            }
        }
		
		function changeStatus1(){
            if(document.getElementById("MondayBusinessHoursClose").checked == true){
		
                document.getElementById("MondayBusinessHours").disabled= true;
				document.getElementById("MondayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("MondayBusinessHours").disabled= false;
				document.getElementById("MondayBusinessHours1").disabled= false;
               
            }
        }
		
		
		function changeStatus2(){
            if(document.getElementById("TuesdayBusinessHoursClose").checked == true){
		
                document.getElementById("TuesdayBusinessHours").disabled= true;
				 document.getElementById("TuesdayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("TuesdayBusinessHours").disabled= false;
				 document.getElementById("TuesdayBusinessHours1").disabled= false;
               
            }
        }
		
		function changeStatus3(){
            if(document.getElementById("WednesdayBusinessHoursClose").checked == true){
		
                document.getElementById("WednesdayBusinessHours").disabled= true;
				 document.getElementById("WednesdayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("WednesdayBusinessHours").disabled= false;
				 document.getElementById("WednesdayBusinessHours1").disabled= false;
               
            }
        }
		
		function changeStatus4(){
            if(document.getElementById("ThursdayBusinessHoursClose").checked == true){
		
                document.getElementById("ThursdayBusinessHours").disabled= true;
				 document.getElementById("ThursdayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("ThursdayBusinessHours").disabled= false;
				 document.getElementById("ThursdayBusinessHours1").disabled= false;
               
            }
        }
		
		function changeStatus5(){
            if(document.getElementById("FridayBusinessHoursClose").checked == true){
		
                document.getElementById("FridayBusinessHours").disabled= true;
				document.getElementById("FridayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("FridayBusinessHours").disabled= false;
				document.getElementById("FridayBusinessHours1").disabled= false;
               
            }
        }
		
		function changeStatus6(){
            if(document.getElementById("SaturdayBusinessHoursClose").checked == true){
		
                document.getElementById("SaturdayBusinessHours").disabled= true;
				 document.getElementById("SaturdayBusinessHours1").disabled= true;
                
            } else {
                document.getElementById("SaturdayBusinessHours").disabled= false;
				 document.getElementById("SaturdayBusinessHours1").disabled= false;
               
            }
        }
		
		
		function changebuyPrice(){
            if(document.getElementById("FirmBuyingFormat").value == 0){
		
                document.getElementById("FixedPrice").style.display= 'block';
				 document.getElementById("EstimatePrice").style.display= 'none';
                
            } if(document.getElementById("FirmBuyingFormat").value == 1){
                document.getElementById("FixedPrice").style.display= 'none';
				 document.getElementById("EstimatePrice").style.display= 'block';
               
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant delivery Time Table</a></li>
						</ul>

						<div class="tab-content"  style="height:1400px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant delivery Time Table</a>
											</div>
										</div>
                                        
                                        <div class="row-fluid">
                                         <?php
											if($emsg==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant delivery has been successfully updated.
		                                     </div>
											<?php }?>
                                           <form  method="post">
                                                  <table width="100%" border="0">
 
   <tr><td colspan="2"><strong style="color:#ff9a1b; font-weight:bold;">Opening Hours   <input type="checkbox" onclick="changeStatusall()" id="applyall" name="ApplyAll" value=""> Apply All to Close</strong></td></tr>
   <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td height="35"><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_sun_selected" id="restaurant_delivery_sun_selected"  <?php if($data['restaurant_delivery_sun_selected']!=''){ ?> checked="checked" <?php } ?>  value="Sunday" />Sunday</label></td>
    <td> 
    <select  id="SundayBusinessHours" name="SundayBusinessHoursOpenTime"  style="width:170px;" > 
    <option value="">Select Open Time</option>
    
    <option value="10:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['SundayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['SundayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['SundayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="0:00:00" <?php if($data['SundayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
    
   
                
                
    </select>&nbsp;  <select  id="SundayBusinessHours1" name="SundayBusinessHoursCloseTime"  style="width:170px;" > 
    <option value="">Select Close Time</option>
    
    <option value="10:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['SundayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['SundayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['SundayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['SundayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
                
    </select>&nbsp;<input type="checkbox" name="SundayBusinessHoursClose" id="SundayBusinessHoursClose" value="Close" onClick="changeStatus()" >   			&nbsp;&nbsp;Close
    <!--<input  value="" type="text" name="SundayBusinessHours" placeholder="Sunday Business Hours" style="width:330px;" required>--></td>
     <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_mon_selected" id="restaurant_delivery_mon_selected"  <?php if($data['restaurant_delivery_mon_selected']!=''){ ?> checked="checked" <?php } ?>  value="Monday" />Monday</label></td>
    <td> 
	  <select  id="MondayBusinessHours" name="MondayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
   <option value="10:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['MondayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['MondayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['MondayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['MondayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
    </select>&nbsp;
    
    
      <select  id="MondayBusinessHours1" name="MondayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
     <option value="10:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['MondayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['MondayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['MondayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['MondayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
                
    </select>&nbsp;
    
    <input type="checkbox" name="MondayBusinessHoursClose" id="MondayBusinessHoursClose" onClick="changeStatus1()" value="Close">&nbsp;&nbsp;Close
	</td>
   
  </tr>
  
  
  <tr>
    <td height="33"><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_tue_selected" id="restaurant_delivery_tue_selected"  <?php if($data['restaurant_delivery_tue_selected']!=''){ ?> checked="checked" <?php } ?>  value="Tuesday" />Tuesday</label></td>
    <td> 
	  <select  id="TuesdayBusinessHours" name="TuesdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
  <option value="10:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['TuesdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00:</option>
                
                
    </select>&nbsp;
    <select  id="TuesdayBusinessHours1" name="TuesdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
     <option value="10:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['TuesdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
    </select>&nbsp;
    <input type="checkbox" name="TuesdayBusinessHoursClose" id="TuesdayBusinessHoursClose" onClick="changeStatus2()" value="Close">&nbsp;&nbsp;Close
	</td>
     <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_wed_selected" id="restaurant_delivery_wed_selected"  <?php if($data['restaurant_delivery_wed_selected']!=''){ ?> checked="checked" <?php } ?>  value="Wednesday" />Wednesday</label></td>
    <td> 
	  <select  id="WednesdayBusinessHours" name="WednesdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
    <option value="10:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['WednesdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
                
    </select>&nbsp;
    
    
    <select  id="WednesdayBusinessHours1" name="WednesdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
    <option value="10:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['WednesdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
    </select>&nbsp;
    
    <input type="checkbox" name="WednesdayBusinessHoursClose" id="WednesdayBusinessHoursClose" onClick="changeStatus3()" value="Close">&nbsp;&nbsp;Close
	</td>
   
  </tr>
  
  
   <tr>
    <td height="30"><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_thu_selected" id="restaurant_delivery_thu_selected"  <?php if($data['restaurant_delivery_thu_selected']!=''){ ?> checked="checked" <?php } ?>  value="Thursday" />Thursday</label></td>
    <td> 
	  <select  id="ThursdayBusinessHours" name="ThursdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
   <option value="10:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['ThursdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
    </select>&nbsp;
    
    
    
      <select  id="ThursdayBusinessHours1" name="ThursdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
   <option value="10:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['ThursdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
    </select>&nbsp;
    
    <input type="checkbox" name="ThursdayBusinessHoursClose" id="ThursdayBusinessHoursClose" onClick="changeStatus4()"  value="Close">&nbsp;&nbsp;Close
	</td>
     <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_fri_selected" id="restaurant_delivery_fri_selected"  <?php if($data['restaurant_delivery_fri_selected']!=''){ ?> checked="checked" <?php } ?>  value="Friday" />Friday</label></td>
    <td> 
	  <select  id="FridayBusinessHours" name="FridayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
    <option value="10:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</0option>
<option value="10:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['FridayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['FridayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['FridayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['FridayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
                
    </select>&nbsp;
    
    
    
    
     <select  id="FridayBusinessHours1" name="FridayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
   <option value="10:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['FridayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['FridayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['FridayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['FridayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
    </select>&nbsp;
    
    <input type="checkbox" name="FridayBusinessHoursClose" id="FridayBusinessHoursClose" onClick="changeStatus5()" value="Close">&nbsp;&nbsp;Close
	</td>
   
  </tr>
  
  
  
    <tr>
    <td><label for="restaurant_social_media"><input type="checkbox" name="restaurant_delivery_sat_selected" id="restaurant_delivery_sat_selected"  <?php if($data['restaurant_delivery_sat_selected']!=''){ ?> checked="checked" <?php } ?>  value="Saturday" /> Saturday</label></td>
    <td> 
	  <select  id="SaturdayBusinessHours" name="SaturdayBusinessHoursOpenTime"  style="width:170px;" > 
       <option value="">Select Open Time</option>
    <option value="10:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['SaturdayBusinessHoursOpenTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
                
    </select>&nbsp;
    
    
     <select  id="SaturdayBusinessHours1" name="SaturdayBusinessHoursCloseTime"  style="width:170px;" > 
       <option value="">Select Close Time</option>
   <option value="10:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="10:00:00"){ ?> selected="selected" <?php } ?>>10:00</option>
<option value="10:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="10:15:00"){ ?> selected="selected" <?php } ?>>10:15</option>
<option value="10:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="10:30:00"){ ?> selected="selected" <?php } ?>>10:30</option>
<option value="10:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="10:45:00"){ ?> selected="selected" <?php } ?>>10:45</option>
<option value="11:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="11:00:00"){ ?> selected="selected" <?php } ?>>11:00</option>
<option value="11:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="11:15:00"){ ?> selected="selected" <?php } ?>>11:15</option>
<option value="11:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="11:30:00"){ ?> selected="selected" <?php } ?>>11:30</option>
<option value="11:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="11:45:00"){ ?> selected="selected" <?php } ?>>11:45</option>
<option value="12:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="12:00:00"){ ?> selected="selected" <?php } ?>>12:00 </option>
<option value="12:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="12:15:00"){ ?> selected="selected" <?php } ?>>12:15 </option>
<option value="12:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="12:30:00"){ ?> selected="selected" <?php } ?>>12:30 </option>
<option value="12:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="12:45:00"){ ?> selected="selected" <?php } ?>>12:45 </option>
<option value="13:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="13:00:00"){ ?> selected="selected" <?php } ?>>13:00 </option>
<option value="13:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="13:15:00"){ ?> selected="selected" <?php } ?>>13:15 </option>
<option value="13:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="13:30:00"){ ?> selected="selected" <?php } ?>>13:30 </option>
<option value="13:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="13:45:00"){ ?> selected="selected" <?php } ?>>13:45 </option>
<option value="14:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="14:00:00"){ ?> selected="selected" <?php } ?>>14:00 </option>
<option value="14:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="14:15:00"){ ?> selected="selected" <?php } ?>>14:15 </option>
<option value="14:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="14:30:00"){ ?> selected="selected" <?php } ?>>14:30 </option>
<option value="14:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="14:45:00"){ ?> selected="selected" <?php } ?>>14:45 </option>
<option value="15:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="15:00:00"){ ?> selected="selected" <?php } ?>>15:00 </option>
<option value="15:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="15:15:00"){ ?> selected="selected" <?php } ?>>15:15 </option>
<option value="15:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="15:30:00"){ ?> selected="selected" <?php } ?>>15:30 </option>
<option value="15:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="15:45:00"){ ?> selected="selected" <?php } ?>>15:45 </option>
<option value="16:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="16:00:00"){ ?> selected="selected" <?php } ?>>16:00 </option>
<option value="16:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="16:15:00"){ ?> selected="selected" <?php } ?>>16:15 </option>
<option value="16:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="16:30:00"){ ?> selected="selected" <?php } ?>>16:30 </option>
<option value="16:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="16:45:00"){ ?> selected="selected" <?php } ?>>16:45 </option>
<option value="17:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="17:00:00"){ ?> selected="selected" <?php } ?>>17:00 </option>
<option value="17:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="17:15:00"){ ?> selected="selected" <?php } ?>>17:15 </option>
<option value="17:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="17:30:00"){ ?> selected="selected" <?php } ?>>17:30 </option>
<option value="17:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="17:45:00"){ ?> selected="selected" <?php } ?>>17:45 </option>
<option value="18:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="18:00:00"){ ?> selected="selected" <?php } ?>>18:00 </option>
<option value="18:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="18:15:00"){ ?> selected="selected" <?php } ?>>18:15 </option>
<option value="18:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="18:30:00"){ ?> selected="selected" <?php } ?>>18:30 </option>
<option value="18:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="18:45:00"){ ?> selected="selected" <?php } ?>>18:45 </option>
<option value="19:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="19:00:00"){ ?> selected="selected" <?php } ?>>19:00 </option>
<option value="19:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="19:15:00"){ ?> selected="selected" <?php } ?>>19:15 </option>
<option value="19:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="19:30:00"){ ?> selected="selected" <?php } ?>>19:30 </option>
<option value="19:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="19:45:00"){ ?> selected="selected" <?php } ?>>19:45 </option>
<option value="20:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="20:00:00"){ ?> selected="selected" <?php } ?>>20:00 </option>
<option value="20:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="20:15:00"){ ?> selected="selected" <?php } ?>>20:15 </option>
<option value="20:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="20:30:00"){ ?> selected="selected" <?php } ?>>20:30 </option>
<option value="20:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="20:45:00"){ ?> selected="selected" <?php } ?>>20:45 </option>
<option value="21:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="21:00:00"){ ?> selected="selected" <?php } ?>>21:00 </option>
<option value="21:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="21:15:00"){ ?> selected="selected" <?php } ?>>21:15 </option>
<option value="21:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="21:30:00"){ ?> selected="selected" <?php } ?>>21:30 </option>
<option value="21:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="21:45:00"){ ?> selected="selected" <?php } ?>>21:45 </option>
<option value="22:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="22:00:00"){ ?> selected="selected" <?php } ?>>22:00 </option>
<option value="22:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="22:15:00"){ ?> selected="selected" <?php } ?>>22:15 </option>
<option value="22:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="22:30:00"){ ?> selected="selected" <?php } ?>>22:30 </option>
<option value="22:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="22:45:00"){ ?> selected="selected" <?php } ?>>22:45 </option>
<option value="23:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="23:00:00"){ ?> selected="selected" <?php } ?>>23:00 </option>
<option value="23:15:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="23:15:00"){ ?> selected="selected" <?php } ?>>23:15 </option>
<option value="23:30:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="23:30:00"){ ?> selected="selected" <?php } ?>>23:30 </option>
<option value="23:45:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="23:45:00"){ ?> selected="selected" <?php } ?>>23:45 </option>
<option value="00:00:00" <?php if($data['SaturdayBusinessHoursCloseTime']=="00:00:00"){ ?> selected="selected" <?php } ?>>00:00</option>
                
    </select>&nbsp;
    
    <input type="checkbox" name="SaturdayBusinessHoursClose" id="SaturdayBusinessHoursClose" onClick="changeStatus6()" value="Close">&nbsp;&nbsp;Close
	</td>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr><td colspan="8" align="center"><input type="submit" class="btn btn-inverse" name="addEditContent"  value="Update <?php echo $data2['restaurant_name'];?> Delivery Timing" ></td></tr>
</table>
</form>

                                                </div>
                                                
                                                <hr>
                                                
                                                
                                                
                                               
                                                
                                                
                                                
                                      
                                                       
                                                       
                                                
                                                
                                                
                                                
                                                
                                                
                                        
										
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
