<?php include('route/header.php'); ?>	

<?php

include('route/DB_Functions.php');

$dbb = new DB_Functions();

include('route/pagination.php');

mysql_query ("set character_set_results='utf8'"); 

if($_GET['eid']!='')

{

 $CuisineQuery = $dbb->showtabledata("tbl_restaurantDeliveryArea","id",$_GET['eid']);

 $CuisineData=mysql_fetch_assoc($CuisineQuery);

}

if(isset($_POST['deleteall'])) {

	$id_array = $_POST['data']; // return array

	$id_count = count($_POST['data']); // count array

	for($i=0; $i <$id_count; $i++) {

		$id = $id_array[$i];

		$query = mysql_query("DELETE FROM `tbl_restaurantDeliveryArea` WHERE `delivery_id` = '$id'");

		if(!$query) { 

		header("location:manage_restaurant_delivery.php");

		}

	}

	

	 // redirent after deleting

}

if(isset($_POST['activateall'])) {

	$id_array = $_POST['data']; // return array

	$id_count = count($_POST['data']); // count array

	for($i=0; $i <$id_count; $i++) {

		$id = $id_array[$i];

		$query = mysql_query("update `tbl_restaurantDeliveryArea` set status='0' WHERE `delivery_id` = '$id'");

		if(!$query) { 

		header("location:manage_restaurant_delivery.php");

		}

	}

	

	 // redirent after deleting

}





if(isset($_POST['dactivateall'])) 

{

	$id_array = $_POST['data']; // return array

	$id_count = count($_POST['data']); // count array

	for($i=0; $i <$id_count; $i++) {

		$id = $id_array[$i];

		$query = mysql_query("update `tbl_restaurantDeliveryArea` set status='1' WHERE `delivery_id` = '$id'");

		if(!$query) 

		{ 

		header("location:manage_restaurant_delivery.php");

		}

	}

	

	 // redirent after deleting

}



?>

<link href="css/pagination.css" rel="stylesheet" type="text/css" />

<link href="css/B_red.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->

<script type="text/javascript" src="js/script.js"></script>

<div id="page-wrap">

		<!-- left sidebar -->

		<?php include('route/side_bar.php'); ?>



		<div id="main-content">

			<div id="inner">

				

				<div class="container-fluid">

					<div class="tabbable main-tabs">

						<ul class="nav nav-tabs">

							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Restaurant Delivery Area</a></li>

						</ul>



						<div class="tab-content"  style="height:1750px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well" id="manage">

										<div class="navbar">

											<div class="navbar-inner">

												<a class="brand" href="#">Display Restaurant Delivery Area</a>

											</div>

										</div>

                                        <div>  

										<?php if($_GET['msg']==1)

											{?>

											<div id="display-success">

			                                 <img src="img/correct.png" alt="Success" /> New Delivery Area has been successfully saved

		                                     </div>

											<?php } if($_GET['error']==1){?>

											<div id="display-error">

			                                 <img src="img/error.png" alt="Error" />New Delivery Area is already exit.

		                                     </div>

                                            <?php } ?>

										<?php

											if($_GET['dmsg']!='')

											{?>

											<div id="display-success">

			                                 <img src="img/correct.png" alt="Success" />Delivery Area has been successfully deleted.

		                                     </div>

											<?php }?>

                                            

                                            

                                             <?php

											if($_GET['amsg']==1)

											{?>

											<div id="display-success">

			                                 <img src="img/correct.png" alt="Success" />Delivery Area has been successfully actiavted/Deactivated.

		                                     </div>

											<?php }?></div>

                                              <?php

		

		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    	$limit = 10;

    	$startpoint = ($page * $limit) - $limit;

        //to make pagination

        $statement = "tbl_restaurantDeliveryArea";
if($_GET['restaurant_id']!='')
{
$ResID=" and restaurant_id='".$_GET['restaurant_id']."'";
$ResIDUrl="&restaurant_id=".$_GET['restaurant_id'];
}


		if($_GET['countryID']!='' && $_GET['stateID']!='' && $_GET['cityName']!='')
		{

		$url="manage_restaurant_delivery.php&countryID=".$_GET['countryID']."&stateID=".$_GET['stateID']."&cityName=".$_GET['cityName'].$ResIDUrl."&";

		

		$where="stateID='".$_GET['stateID']."' and  countryID='".$_GET['countryID']."' and cityName=N'".$_GET['cityName']."' $ResID";

			

		$qur="SELECT * FROM {$statement} where stateID='".$_GET['stateID']."' and  countryID='".$_GET['countryID']."' and cityName=N'".$_GET['cityName']."' $ResID LIMIT {$startpoint} , {$limit}";

		}

		elseif($_GET['countryID']!='' && $_GET['stateID']!='')

		{

		

		$url="manage_restaurant_delivery.php&countryID=".$_GET['countryID']."&stateID=".$_GET['stateID'].$ResIDUrl."&";

		

		$where="countryID='".$_GET['countryID']."' and stateID='".$_GET['stateID']."' $ResID";

			

		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and stateID='".$_GET['stateID']."' $ResID LIMIT {$startpoint} , {$limit}";

		}

		else

		{

		$url="manage_restaurant_delivery.php?d=1".$ResIDUrl;

		$where="1  $ResID";

		$qur="SELECT * FROM {$statement} where 1 $ResID LIMIT {$startpoint} , {$limit}";

		}

		//echo $qur;

		 $query = mysql_query($qur);

		 $numrowdata=mysql_num_rows($query);

		 

											 ?>

                                             

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

xmlhttp.open("post","stateFatch2.php?q="+str,true);

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

xmlhttp.open("post","cityFatech1.php?q="+str,true);

xmlhttp.send();

}



</script>                                          <br />

                                             <form action="manage_restaurant_delivery.php" method="get" id="userform" name="userform">

      <table width="100%" border="0">

  <tr>

  

  <td><label for="Name">Restaurant Name</label></td>

    <td>

    <select  data-placeholder="Select Restaurant Name..." id="restaurant_id" name="restaurant_id" style="width:180px;" onChange="document.userform.submit();" >

											  <?php 

											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>

                                              <?php } ?>

											

											</select>

    </td>

    <td><label for="Name">Country</label></td>

    <td>

    <select data-placeholder="Select Country..." id="countryID" name="countryID" style="width:160px;" onChange="getOrgTypeListRest(this.value)">
<option value="">Select</option>
											  <?php 

											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>

                                              <?php } ?>

											

											</select>

    </td>

   <td><label for="Name">State</label></td>

    <td id="stateID">

    <select data-placeholder="Select State..." id="stateID" name="stateID" style="width:160px;"  onChange="getOrgTypeListRestCity(this.value)" >

    <option value="">Select</option>

											  <?php 

											  if($_GET['countryID']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$_GET['countryID']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['stateID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select>

    </td>

   <td><label for="Name">City</label></td>

    <td id="cityName">  <select class="chzn-select" data-placeholder="Select State..." id="cityName" name="cityName" style="width:180px;"  >

    <option value="">Select</option>

											  <?php 

											  if($_GET['stateID']!=''){

											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$_GET['stateID']);

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($_GET['cityName']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>

                                              <?php } ?>

                                              <?php } ?>

											

											</select></td>

              

             

   

  </tr>

</table>

    </form>

                                             

                                        <form name="frmproduct" method="post">

										<table class="table table-bordered">

											<thead>

                                            <?php if($numrowdata>0){ ?>

                                             <tr  id="alldispaly" style="display:none;">

													<td colspan="8" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Delivery Area" value="Delete All" onClick="return confirm('Are You sure to deleted all selected restaurant Delivery Area');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Delivery Area" value="Activate All" onClick="return confirm('Are You sure to Activate all selected restaurant Delivery Area');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Delivery Area" value="Deactivate All" onClick="return confirm('Are You sure to Deactivate all selected restaurant Delivery Area');"  type="submit"></td></tr>

                                                    <?php }  ?>

												<tr>

                                                

                                                <th><input type="checkbox" id="check_all" value=""></th>

													<th>#</th>

                                                    <th>Restaurant</th>

                                                     <th>City Name</th>

                                                      <th>Postcode</th>

                                                       <th>Delivery Area</th>

                                                        <th>Delivery Charge</th>

                                                         <th>Minimum Order</th>

                                                          <th>Shipping Charge</th>

                                                    

													<th>Action</th>

												</tr>

											</thead>

											<tbody>

                                          

           <?php

            //show records

            if($numrowdata>0)

			{

            $count=1;

        	while ($row = mysql_fetch_assoc($query)) {

			

        ?>

												<tr>

                                                <td><input type="checkbox" value="<?php echo $row['delivery_id']; ?>" name="data[]" id="data"></td>

													<td><?php echo $count; ?></td>

                                                    <td><?php 

													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$row['restaurant_id']));

													echo ucwords($StQuery['restaurant_name']);?></td>

                                                    <td><?php echo ucwords($row['restaurant_city']);?></td>

                                                    <td><?php echo ucwords($row['restaurant_postcode']);?></td>

                                                    <td><?php echo ucwords($row['restaurant_delivery_area']);?></td>

                                                    <td><?php echo $row['restaurant_delivery_charge'];?></td>

                                                     <td><?php echo $row['restaurant_minimum_order'];?></td>

                                                      <td><?php echo $row['restaurant_shipping_charge'];?></td>

                                                    

                                                   

													

													<td>	<a href="edit_restaurant_delivery.php?eid=<?php echo $row['delivery_id'];?>" class="btn btn-primary" title="Edit Postcode/Delivery Area">Edit</a>

						<a href="InsertPhp.php?tag=ResDeliveryDelete&eid=<?php echo $row['delivery_id'];?>" class="btn btn-dualima" title="Delete Postcode/Delivery Area" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>

                        <?php if($row['status']==0){ ?>

                        <a href="InsertPhp.php?tag=ResDeliveryActivate&active=1&statusid=<?php echo $row['delivery_id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Postcode/Delivery Area">Activate</a><?php } else {?>

                        <a href="InsertPhp.php?tag=ResDeliveryActivate&active=0&statusid=<?php echo $row['delivery_id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Postcode/Delivery Area">

                        Deactivate</a>

                          <?php } ?>

                     </td>

												</tr>

                                                <?php

												$count++;

												 }

												 } else { 

												  ?>

                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Postcode/Delivery Area is available in current Database.</strong></td></tr>

                                                <?php } ?>

												

											</tbody>

										</table>

                                       

                                        </form>

                                        <table width="100%" style="margin-left:100px;">

                                        <tr><td align="center" ><?php echo pagination($statement,$where,$limit,$page,$url);?></td></tr>

                                        </table>

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

