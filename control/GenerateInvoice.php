<?php include('route/header.php');

include('route/DB_Functions.php');

   $dbb = new DB_Functions();

 include('route/pagination.php');

mysql_query ("set character_set_results='utf8'"); 

/*if($_GET['restaurantId']!='')

{

 $CuisineQuery = $dbb->showtabledata("tbl_invoice","restaurantID",$_GET['restaurantId']);

 $CuisineData=mysql_fetch_assoc($CuisineQuery);

}*/

$ip=$_SERVER['REMOTE_ADDR'];

$invoiceDate=date('d/m/Y');

$Gntoday=date('d l Y');

if(isset($_POST['GenerateInvoiceSubmit']))

{

$InvoiceQuery="INSERT INTO `tbl_invoice` (`id`, `invoiceNo`, `restaurantID`, `orderID`, `invoiceDate`, `generate_date`, `ip`, `status`) VALUES (NULL, '".$_POST['randomfield']."', '".$_GET['restaurantId']."', '', '$invoiceDate', '$Gntoday', '$ip', '0')";

mysql_query($InvoiceQuery);

$msg="This restaurant invoice has been successfully updated";

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

                            Setup New Restaurant Invoice

                            <?php } else { ?>

                            Update Restaurant Invoice

                            <?php } ?>

                            

                            </a></li>

						</ul>



		  <script type="text/javascript">



function CouponCodeValidate(){



var chkStatus = true

if(document.getElementById('randomfield').value =="") {

document.getElementById("randomfield").style.background='#C10000';

document.getElementById("randomfield").focus();

chkStatus = false;

}

else

document.getElementById('randomfield').className = "";



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



<script language="javascript" type="text/javascript">

function randomString() {

	var chars = "0123456789";

	var string_length = 5;

	var randomstring = '';

	for (var i=0; i<string_length; i++) {

		var rnum = Math.floor(Math.random() * chars.length);

		randomstring += chars.substring(rnum,rnum+1);

	}

	document.SignupForm.randomfield.value ='FD'+randomstring;

}

function isNumberKey(evt)

  {

var charCode = (evt.which) ? evt.which : event.keyCode

if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;

return true;

      }

</script>

						<div class="tab-content"  style="height:1750px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well">

										<div class="navbar">

											<div class="navbar-inner">

												<a class="brand" href="#"><?php  if($_GET['eid']=='')

										   { ?>

                            Setup New Restaurant Invoice

                            <?php } else { ?>

                            Update Restaurant Invoice

                            <?php } ?></a>

											</div>

										</div>

                                          <table width="100%" border="0" align="center">

  <tr>

    <td> <?php if($msg!=''){ ?> <strong style="font-size:16px; color:#00009B;"><?php echo $msg; ?></strong><?php } ?>

										

                                            </td></tr></table><?php

												

	

        $statement = "tbl_restaurantAdd";

		

		$qur="SELECT * FROM {$statement} where id='".$_GET['restaurantId']."' ";

		

		 $query = mysql_query($qur);

		 $numrowdata=mysql_num_rows($query);

		 

											 ?>



										<div class="row-fluid" >

											<div  class=" span12">

												 <?php

		if($numrowdata>0)

			{

            $count=1;

		

        	$row = mysql_fetch_assoc($query);

			

        ?>

			<table  align="center">

		<tr>

			<td align="center">

				<h2><?php echo ucwords($row['restaurant_name']);?> </h2>

			</td>

		</tr>

		<tr>

			<td style="text-align:center;width:55%;">

				<h3><?php echo ucwords($row['restaurant_address']);?> <br/>

<?php echo ucwords($row['restaurantCity']);?>,<?php echo ucwords($row['restaurant_phone']);?></h3>

			</td>

		</tr>

		

	</table>

    <table   class=" display table">

				

			<tbody>

                    <tr>

					<td>

                   <a class="btn btn-danger" style="height: 100px;width: 250px;line-height: 39px;font-size: 20px;">Commission Rate <br> <?php echo ucwords($row['restaurant_commission']);?> %</a>

					</td>

                    <td >

                 <a class="btn btn-warning" style="height: 100px;width:250px;line-height: 39px;font-size: 20px;">Total Commission <br>  <?php 

							include('route/config1.php');

							$dSmOdr='';

		                    $totalSum='';

							$query44 = "SELECT * from resto_order where status='4' and restoid='".$row['id']."' ";  $result55 = mysql_query($query44) or die(mysql_error());

                           while($data = mysql_fetch_array($result55)){

	                      $totalSum+=$data['ordPrice'];

  $dSmOdr+=($data['ordPrice']*$row['restaurant_commission'])/100;

                          }

                        ?> <?php 
						if($dSmOdr!=''){
						echo number_format($dSmOdr,2); 
						}
						else
						{
						echo '0.00';
						}
						?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></a>                   

					</td>

                     <td>

                     <a href="" class="btn btn-success" title="Display Order Report for selecting Restaurant"  style="height: 100px;width: 250px;line-height: 39px;font-size: 20px;">Paid Commission <br> <?php 

							include('route/config1.php');

							

		                    $PtotalSum='';

							$query44 = "SELECT * from resto_order where restoid='".$row['id']."' ";  $result55 = mysql_query($query44) or die(mysql_error());

                           while($data = mysql_fetch_array($result55)){

	                      $PtotalSum+=$data['paid_commission'];



                          }

                        ?> <?php 
						if($PtotalSum!=''){
						echo number_format($PtotalSum,2);
						}
						else
						{
						echo '0.00';
						}
						 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></a> </a>               

					</td>

                    

				</tr>

                 <tr>

					<td>

                   <a class="btn btn-danger" style="height: 100px;width: 250px;line-height: 39px;font-size: 20px; background:#dd582f;">Pending Commission <br> <?php 

							include('route/config1.php');

							$PendingdSmOdr='';

		                    $PendingtotalSum='';

							$PendingtotalCommis='';

							$AmountPendingtotalCommis='';

							$query44 = "SELECT * from resto_order where status='4' and restoid='".$row['id']."' "; 

							$result55 = mysql_query($query44) or die(mysql_error());

                           while($data = mysql_fetch_array($result55)){

	                       $PendingtotalSum+=$data['ordPrice'];

						   $PendingtotalCommis+=$data['paid_commission'];

   $PendingdSmOdr+=($data['ordPrice']*$row['restaurant_commission'])/100;

   $AmountPendingtotalCommis=$PendingdSmOdr-$PendingtotalCommis;

                          }

                        ?> <?php 
						if($AmountPendingtotalCommis!=''){
						echo number_format($AmountPendingtotalCommis,2);
						}
						else
						{
						echo '0.00';
						}
						 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></a>

					</td>

                    <td >

                 <a class="btn btn-warning" style="height: 100px;width:250px;line-height: 39px;font-size: 20px; background:#0000AE;">Invoice Period <br> <?php echo ucwords($row['restaurant_invoiceTimePeriod']);?> days</a>                   

					</td>

                     <td>

                     <a href="" class="btn btn-success" title="Display Order Report for selecting Restaurant"  style="height: 100px;width: 250px;line-height: 39px;font-size: 20px; background:#C10061;">No Of Invoice <br> <?php echo $NumberOfInvoice=mysql_num_rows(mysql_query("select * from tbl_invoice where restaurantID='".$row['id']."'")); ?></a>              

					</td>

				</tr>

                <tr><td colspan="3"><hr></td></tr>

                

                <?php

												

												 } else { 

												  ?>

                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant is available in current Database.</strong></td></tr>

                                                <?php } ?>

                

				

			</tbody>

		</table>

											 

												<form id="SignupForm" name="SignupForm" action="" method="post" onSubmit="return CouponCodeValidate();" enctype="multipart/form-data">

												

												

                                                    <table  align="center" border="0">

                                                    <tr>

  <?php /*?>  <td><label for="restaurantID">Restaurant Name</label></td>

    <td>	<select class="chzn-select" data-placeholder="Select Restaurant Name..." name="restaurantID" id="restaurantID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;">

										<option value="0">Select Restaurant</option>

											  <?php 

											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurantID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>

                                              <?php } ?>

											  

											</select></td><?php */?>

   

    <td><label for="RestauranCouponNo">Invoice Code</label></td>

    <td><input name="randomfield" id="randomfield" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" placeholder="New Generate Invoice" type="text" value="<?php echo $CuisineData['RestauranCouponNo']; ?>"   style="width:400px;"/> &nbsp; <input type="button" value="Generate Invoice No." onClick="randomString();" class="btn btn-dualima" style="cursor:pointer;"></td>

   

  </tr>

  <tr><td colspan="4">&nbsp;</td></tr>

   <tr>

    <td align="center" colspan="4">

  <input type="submit" class="btn btn-primary " name="GenerateInvoiceSubmit" id="GenerateInvoiceSubmit" value="Invoice Generate" />

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

