<?php include('route/header.php');

include('route/DB_Functions.php');

$dbb = new DB_Functions();

mysql_query ("set character_set_results='utf8'"); 

if($_GET['eid']!='')

{

 $CuisineQuery = $dbb->showtabledata("tbl_restaurantDeliveryArea","delivery_id",$_GET['eid']);

 $CuisineData=mysql_fetch_assoc($CuisineQuery);

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

							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')

										   { ?>

                            Setup New Restaurant Delivery Area

                            <?php } else { ?>

                            Update Restaurant Delivery Area

                            <?php } ?>

                            </a></li>

						</ul>



						<div class="tab-content"  style="height:1750px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well">

										<div class="navbar">

											<div class="navbar-inner">

                                            <?php  if($_GET['eid']=='')

										   { ?>

												<a class="brand" href="#">Setup New Restaurant Delivery Area</a>

                                            <?php } else { ?>

                                            <a class="brand" href="#">Update Restaurant Delivery Area</a>

                                            <?php } ?>

											</div>

										</div>

                                         <table width="100%" border="0" align="center">

  <tr>

    <td><?php

											if($_GET['msg']==1)

											{?>

											<div id="display-success">

			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Delivery Area has been successfully saved

		                                     </div>

											<?php } if($_GET['error']==1){?>

											<div id="display-error">

			                                 <img src="img/error.png" alt="Error" />New Restaurant Delivery Area is already exit.

		                                     </div>

                                            <?php } ?>

                                            

                                             <?php

											if($_GET['emsg']!='')

											{?>

											<div id="display-success">

			                                 <img src="img/correct.png" alt="Success" />Restaurant Delivery Area has been successfully updated.

		                                     </div>

											<?php }?>

                                            

                                            

                                            

                                          

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

//alert(str);

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

//alert(xmlhttp.responseText);

}

}

xmlhttp.open("post","cityFatech.php?q="+str,true);

xmlhttp.send();



}



</script>

			 <script language="JavaScript" type="text/JavaScript"> 
function isNumber(field) { 
        var re = /^[0-9-'.'-',']*$/; 
        if (!re.test(field.value)) { 
            alert('Value must be all numberic charcters, including "." non numerics will be removed from field!'); 
            field.value = field.value.replace(/[^0-9-'.'-',']/g,""); 
        } 
    } 
</script> 			                        

                                            </td>

  </tr>



</table>



										<div class="row-fluid" >

											<div  class=" span12">

                                           <?php 

										   if($_GET['eid']!='')

										   {

										    $url="InsertPhp.php?tag=ResDeliveryEdit&eid=".$_GET['eid'];

											$buttonValue="Edit Restaurant Delivery Area";

										   }

										   else

										   {

										   $url="InsertPhp.php?tag=ResDeliveryAdd";

										   $buttonValue="Add New Restaurant Delivery Area";

										   }

										   

										   ?>

											 

												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">

												

                                                    <table  align="center" border="0">

                                                         <tr>

                                                          <td><label for="Name">Restaurant Name</label></td>

    <td>

    <select data-placeholder="Select Restaurant..." id="restaurant_id" name="restaurant_id" style="width:317px;" >

    <option value="">Select Restaurant</option>

											  <?php 

											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>

                                              <?php } ?>

											

											</select>

    </td>

                                                         

   <td><label for="Name">Country Name</label></td>

    <td>

    <select  data-placeholder="Select Country..." id="countryID" name="countryID" style="width:317px;" onChange="getOrgTypeListRest(this.value)">
<option value="">Select</option>
											  <?php 

											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_country']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>

                                              <?php } ?>

											

											</select>

    </td></tr>

    

     <tr>

   <td><label for="Name">State Name</label></td>

    <td >

    <select  data-placeholder="Select State..." id="stateID" name="stateID" style="width:317px;" onChange="getOrgTypeListRestCity(this.value)"  >

    <option value="">Select</option>

											  <?php 

											  if($_GET['eid']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$CuisineData['restaurant_country']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select>

    </td>

   

                                                   

   <td><label for="Name">City Name</label></td>

    <td >  <select  data-placeholder="Select State..." id="cityName" name="cityName" style="width:317px;"  >

    <option value="">Select</option>

											  <?php 

											  if($_GET['eid']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$CuisineData['restaurant_state']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select></td></tr>

   

     <tr><td colspan="4">

    <table width="101%" height="58" border="0">

  <tr>

    <td width="20%" align="center"><strong>Postcode</strong></td>

    <td width="20%" align="center"><strong>Delivery Area</strong></td>

    <td width="20%"  align="center"><strong>Delivery Charge</strong></td>

    <td width="20%" align="center"><strong>Minimum Order</strong></td>

    <td width="20%"  align="center"><strong>Shipping Charge</strong></td>
     <td width="20%"  align="center"><strong>Latitude</strong></td>
        <td width="20%"  align="center"><strong>Longitude</strong></td>


  </tr>

  

  <tr>

<td><input type="text" name="postcode1" id="postcode1" value="<?php echo $CuisineData['restaurant_postcode']; ?>" style="width:120px; " /></td>

   
    <td><input type="text" name="delivery_areaName1" id="delivery_areaName1" value="<?php echo $CuisineData['restaurant_delivery_area']; ?>" style="width:120px; " /></td>

    <td><input type="text" name="delivery_charge1" id="delivery_charge1" onkeyup="isNumber(this)"  value="<?php echo $CuisineData['restaurant_delivery_charge']; ?>" style="width:120px; " /></td>

    <td><input type="text" name="minimum_order1" id="minimum_order1" onkeyup="isNumber(this)" value="<?php echo $CuisineData['restaurant_minimum_order']; ?>" style="width:120px; " /></td>

   
    <td><input type="text" name="shipping_charge1" id="shipping_charge1" value="<?php echo $CuisineData['restaurant_shipping_charge']; ?>" style="width:120px; " /></td>
    
    <td><input type="text" name="postcodelatitude1" id="postcodelatitude1" value="<?php echo $CuisineData['restaurant_postcodelatitude']; ?>" style="width:120px; " /></td>
    <td><input type="text" name="postcodelongitude1" id="postcodelongitude1" value="<?php echo $CuisineData['restaurant_postcodelongitude']; ?>" style="width:120px; " /></td>


  </tr>

  <tr><td colspan="9">&nbsp;</td></tr>

   <!-- <tr>

     <td><input type="text" name="postcode2" id="postcode2" value="" style="width:120px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName2" id="delivery_areaName2" value="" style="width:120px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge2" id="delivery_charge2" value="" style="width:130px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order2" id="minimum_order2" value="" style="width:130px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge2" id="shipping_charge2" value="" style="width:130px; " /></td>

  </tr>

  

   <tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode3" id="postcode3" value="" style="width:130px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName3" id="delivery_areaName3" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge3" id="delivery_charge3" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order3" id="minimum_order3" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge3" id="shipping_charge3" value="" style="width:150px; " /></td>

  </tr>

  

   <tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode4" id="postcode4" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName4" id="delivery_areaName4" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge4" id="delivery_charge4" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order4" id="minimum_order4" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge4" id="shipping_charge4" value="" style="width:150px; " /></td>

  </tr>





<tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode5" id="postcode5" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName5" id="delivery_areaName5" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge5" id="delivery_charge5" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order5" id="minimum_order5" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge5" id="shipping_charge5" value="" style="width:150px; " /></td>

  </tr>

  

  

  <tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode6" id="postcode6" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName6" id="delivery_areaName6" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge6" id="delivery_charge6" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order6" id="minimum_order6" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge6" id="shipping_charge6" value="" style="width:150px; " /></td>

  </tr>

  

  <tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode7" id="postcode7" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName7" id="delivery_areaName7" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge7" id="delivery_charge7" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order7" id="minimum_order7" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge7" id="shipping_charge7" value="" style="width:150px; " /></td>

  </tr>





<tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode8" id="postcode8" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName8" id="delivery_areaName8" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge8" id="delivery_charge8" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order8" id="minimum_order8" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge8" id="shipping_charge8" value="" style="width:150px; " /></td>

  </tr>

  

  <tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode9" id="postcode9" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName9" id="delivery_areaName9" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge9" id="delivery_charge9" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order9" id="minimum_order9" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge9" id="shipping_charge9" value="" style="width:150px; " /></td>

  </tr>



<tr><td colspan="9">&nbsp;</td></tr>

    <tr>

     <td><input type="text" name="postcode10" id="postcode10" value="" style="width:150px; " /></td>

    <td>&nbsp;</td>

    <td><input type="text" name="delivery_areaName10" id="delivery_areaName10" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="delivery_charge10" id="delivery_charge10" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="minimum_order10" id="minimum_order10" value="" style="width:150px; " /></td>

     <td>&nbsp;</td>

    <td><input type="text" name="shipping_charge10" id="shipping_charge10" value="" style="width:150px; " /></td>

  </tr>-->

  <!--<tr><td colspan="9">&nbsp;</td></tr>-->

</table>



     </td></tr>

    <tr>

    <td align="center" colspan="2" align="center">

  <input id="CuisineSubmit" type="submit" class="btn btn-primary " name="CuisineSubmit" value="<?php echo $buttonValue; ?>" />

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

