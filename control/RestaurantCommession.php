<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
?>
<?php

mysql_query ("set character_set_results='utf8'");
require_once("export/excelwriter.class.php");
$excel=new ExcelWriter("RestaurantCommisionSheet.xls");
if($excel==false)	
$excel->error;
$myArr=array("");
$myArr=array("Restaurant Commission Order Report");
$excel->writeLine($myArr);
$myArr=array("");
$excel->writeLine($myArr);
$myArr=array("Restaurant","Commision Rate","Sales","Commission","Paid Commission","Pending Commission");
$excel->writeLine($myArr);
$qry=mysql_query("SELECT * FROM resto_order where status='4'  order by order_id desc");
if($qry!=false)
{
	$dSmOdr='';
		$totalSum='';
		$paidCommession='';
		$Commission='';
	$i=1;
	while($data=mysql_fetch_array($qry))
	{
	
    $totalSum+=$data['ordPrice'];
	$paidCommession+=$data['paid_commission'];
   $CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
  $Commission=($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
  
  $restaurantName=$CuisineData['restaurant_name'];
 $restaurantCommission=$CuisineData['restaurant_commission'].'%';
 $pendingComm= $Commission-$data['paid_commission']; 
  if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
 
 if($pendingComm!='')
 {
 $PCpl=number_format($pendingComm,2);
 }
 else
 {
 $PCpl='0.00';
 }
	
		$myArr=array($restaurantName,$restaurantCommission,$totalSum,$Cpl,$data['paid_commission'],$PCpl);
		$excel->writeLine($myArr);
		$i++;
	}
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant Commission</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant Commission</a>
											</div>
										</div>
                                         
										<div class="row-fluid" >
											<div  class=" span12">
												
              
                                 
  <table width="100%" border="0">
  <tr>
    <td><a href="RestaurantCommisionSheet.xls" class="btn btn-info" title="Export into Excel Format" >Export into Excel Format</a></td>
    <td><a href="RestaurantComminssionexportOrderCVS.php" class="btn btn-primary" title="Export into Excel Format" >Export into CVS Format</a></td>
    <td><a href="tcpdf/examples/GeneratePDFCommission.php" target="_blank" class="btn btn-tigadua" title="Export into Excel Format" >Generate PDF</a></td>
    <td><a href="RestaurantCommession_print.php" target="_blank" class="btn btn-duasembilan" title="Print Restaurant Order" > Print Restaurant Order</a></td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
  <tr><td colspan="4">
       <script type="text/javascript">
											  function getOrgTypeListRestCityOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="";
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
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","cityFatchOffer.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
if (str=="")
{
document.getElementById("restoid").innerHTML="";
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
document.getElementById("restoid").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","ResFatchOffer13333.php?q="+str,true);
xmlhttp.send();
}

											 </script>
  <form action="RestaurantCommessionSearch.php" method="get">
  <table width="100%" border="0">
  <tr>
  
    <td>	<select data-placeholder="Select Restaurant..."  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer(this.value)" style="width:180px;" >
    <option value="">Select State</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                           
    <td>	<select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)"  id="restaurant_city" name="restaurant_city" style="width:180px;" >
    <option value="">Select City</option>
											  <?php 
											  if($_GET['restaurant_state']!=''){
											  $StateQuery =mysql_query("select *  from tbl_city where stateID='".$_GET['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($_GET['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                           
    <td>	<select  data-placeholder="Select Restaurant..."   id="restoid" name="restoid" style="width:180px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											   if($_GET['restaurant_city']!=''){
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd where restaurantCity=N'".$_GET['restaurant_city']."' order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restoid']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }  } ?>
											</select></td>
    <td><input id="RestaurantOrderDateStart" name="RestaurantOrderDateStart" value="" data-date-format="yyyy-mm-dd" type="text" class="datePicker" placeholder='start Date'   style="width:150px;"/></td>
    <td><input value="" data-date-format="yyyy-mm-dd" type="text" name="RestaurantOrderDateEnd" id="RestaurantOrderDateEnd"  class="datePicker" placeholder='End Date'   style="width:150px;" /></td>
     <td> <input type="submit" class="btn btn-primary " name="GenerateInvoiceSubmit" id="GenerateInvoiceSubmit" value="Filter" /></td>
  </tr></table>
  </form>
  </td></tr></table>
  <hr />
   <script type="text/javascript">
 function submitURL(Dvalue,str,statusid1)
{
window.location.href="RestaurantCommession.php?sort="+str+"&f="+Dvalue;
}
</script>
<table  class="table table-bordered table-striped table-cth orange" style="width:100%;" >
			<thead>
				<tr>
					<?php
													if($_GET['sort']=='asc'){
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													elseif($_GET['sort']=='desc'){
													$pl='asc';
													$imgSort='<img src="sortdesc.png" style="float:right;" />';
													}
													else
													{
													$pl='asc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
				
					<th><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Name <?php echo $imgSort;?></a></th>
                    <th><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Rate <?php echo $imgSort;?></a></th>
                    <th><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Sales <?php echo $imgSort;?></a></th>
					<th><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Commission <?php echo $imgSort;?></a></th>
                    <th><a onclick="submitURL('paid_commission','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Paid Commission <?php echo $imgSort;?></a></th>
                    <th><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Pending Commision <?php echo $imgSort;?></a></th>
                     <th><a  style="cursor:pointer;color:#FFFFFF;">Action</a></th>
                  
				</tr>
			</thead>
			<tbody>
             
            	 <?php
 include('route/config1.php');
 mysql_query ("set character_set_results='utf8'");
 if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="order_id";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
$sql = "SELECT * FROM resto_order where status='4' $sortBy ";
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
?>	
            <?php
		$dSmOdr='';
		$totalSum='';
		$paidCommession='';
		$Commission='';
	if($numrows>0)
	{
	$count=1;
	$i=1;
	while($data=mysql_fetch_array($result))
	{ 
	$totalSum+=$data['ordPrice'];
	$paidCommession+=$data['paid_commission'];
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
  $Commission=($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
		 ?>
            				<tr>
					
					
					
                    <td><?php echo $CuisineData['restaurant_name']; ?></td>
					<td><?php echo ucwords($CuisineData['restaurant_commission']);?>%</td>
                    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
					if($totalSum!=''){
					echo number_format($totalSum,2);
					}
					else
					{
					echo '0.00';
					}
					 ?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
					if($Commission!=''){
					echo number_format($Commission,2);
					}
					else
					{
					echo '0.00';
					}
					
					 ?></td>
                    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
					if($data['paid_commission']!=''){
					echo number_format($data['paid_commission'],2);
					}
					else
					{
					echo '0.00';
					}
					 ?></td>
                    <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php  $pendingComm= $Commission-$data['paid_commission']; 
					 
					 if($pendingComm!=''){
					echo number_format($pendingComm,2);
					}
					else
					{
					echo '0.00';
					}
					
					?></td>
                   <td> <a href="GenerateInvoice.php?restaurantId=<?php echo $CuisineData['id'];?>" class="btn btn-danger" title="Generate Invoice for selected restaurant" >Generate Invoice</a></td>
                  
				</tr>
                     <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">There are no commission detail available yet</strong></td>
                </tr>
                <?php } ?>          
              
				
			</tbody>
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
