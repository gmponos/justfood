<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
date_default_timezone_set('US/Eastern');
?>
<?php
 $dt2=mktime(0,0,0,01,01,date("Y"));
$wKdat= date("Y-m-d",$dt2);
$hcurdate=date("Y-m-d");
mysql_query ("set character_set_results='utf8'");
require_once("export/excelwriter.class.php");
$excel=new ExcelWriter("YearlyRestaurantOrder.xls");
if($excel==false)	
$excel->error;
$myArr=array("");
$myArr=array("Monthly Restaurant Order Report");
$excel->writeLine($myArr);
$myArr=array("");
$excel->writeLine($myArr);
$myArr=array("Restaurant","Order ID","Order Date","Order Price","Commision Rate","Order Type","Payment Method","Owner Name","Customer Name","Customer Email","Customer Address","Customer Phone");
$excel->writeLine($myArr);
if($_GET['restaurant_id']!=''){	
$qry=mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_GET['restaurant_id']."'  order by order_id desc");	
}
else
{
$qry=mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc");
}
if($qry!=false)
{
	$i=1;
	while($data=mysql_fetch_array($qry))
	{
	
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $UserCuisineQuery = $dbb->showtabledata("tbl_user","id",$data['userId']);
 $UserData=mysql_fetch_assoc($UserCuisineQuery);
 $fullName =$UserData['fname'].''.$UserData['lname'];
 
 $OwnerQuery = $dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$data['restoid']);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
 $Commission= ($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
 if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
 $restaurantName=$CuisineData['restaurant_name'];
 $restaurantCommission=$CuisineData['restaurant_commission'].'%='.$Cpl;
 $OwnerName=$OwnerData['restaurant_OwnerFirstName'].''.$OwnerData['restaurant_OwnerLastName'];
	
		$myArr=array($restaurantName,$data['order_identifyno'],$data['user_date'],$data['ordPrice'],$restaurantCommission,$data['order_type'],$data['payMode'],$OwnerName,$fullName,$UserData['user_email'],$UserData['address'],$UserData['user_phone']);
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Yearly Restaurant Orders Report</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Yearly Restaurant Orders Report </a>
											</div>
										</div>
										<div class="row-fluid">
    <div class="span12">
  
  <script type="text/javascript">
 function submitURL(Dvalue,str,statusid1)
{
window.location.href="Yearly_restaurantOrder_print.php?sort="+str+"&f="+Dvalue;
}
</script>
    <table width="70%" border="0">
  <tr>
    <td><a href="YearlyRestaurantOrder.xls" class="btn btn-info" title="Export into CVS Format" >Export into Excel Format</a></td>
    <td> <?php if($_GET['restaurant_id']!=''){ ?>
    <a href="YearlyexportOrderCVS.php?restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-primary" title="Export into CVS Format" >Export into CVS Format</a>
    <?php } else { ?>
     <a href="YearlyexportOrderCVS.php" class="btn btn-primary" title="Export into CVS Format" >Export into CVS Format</a>
    <?php } ?></td>
      <td>
       <?php if($_GET['restaurant_id']!=''){ ?>
    <a href="tcpdf/examples/Yearly_restaurantOrder_PDF.php?restaurant_id=<?php echo $_GET['restaurant_id'];?>" target="_blank" class="btn btn-tigadua" title="Generate PDF" >Generate PDF</a>
    <?php } else{ ?>
    <a href="tcpdf/examples/Yearly_restaurantOrder_PDF.php" target="_blank" class="btn btn-tigadua" title="Generate PDF" >Generate PDF</a>
    <?php  } ?>
    </td>
    <td>
     <?php if($_GET['restaurant_id']!=''){ ?>
    <a href="yearly_all_order_print.php?restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-duasembilan" title=" Print Restaurant Orders" target="_blank" > Print Restaurant Orders</a>
    <?php } else { ?>
    
     <a href="yearly_all_order_print.php" class="btn btn-duasembilan" title=" Print Restaurant Orders" target="_blank" > Print Restaurant Orders</a>
    <?php } ?>
    </td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
</table>

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
xmlhttp.open("post","cityFatchOffer1.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
if (str=="")
{
document.getElementById("restaurant_id").innerHTML="";
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
document.getElementById("restaurant_id").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","ResFatchOffer1.php?q="+str,true);
xmlhttp.send();
}

											 </script>
                                             <br /><br />
                                             <form action="Yearly_restaurantOrder_print.php" method="get" name="userform" id="userform">
<table width="100%" border="0" style="padding:15px;">
  <tr>
    <td><label for="restaurant_id">By State</label></td>
    <td>	<select data-placeholder="Select Restaurant..."  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer(this.value)" style="width:220px;" >
    <option value="">Select</option>
											  <?php 
											  $StateQuery = mysql_query("select *  from tbl_state  order by stateName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                           
    <td><label for="restaurant_id">By City</label></td>
    <td>	<select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)"  id="restaurant_city" name="restaurant_city" style="width:220px;" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['restaurant_state']!=''){
											  $StateQuery =mysql_query("select *  from tbl_city where stateID='".$_GET['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($_GET['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                           
    <td><label for="restaurant_id">By Restaurant </label></td>
    <td>	<select  data-placeholder="Select Restaurant..." onChange="document.userform.submit();"  id="restaurant_id" name="restaurant_id" style="width:220px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											   if($_GET['restaurant_city']!=''){
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd where restaurantCity=N'".$_GET['restaurant_city']."' order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }  } ?>
											</select></td>
</tr>
</table>
</form><br />


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
					<th width="119"><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#FFFFFF;">Restaurant <?php echo $imgSort;?></a></th>
					<th width="97"><a onclick="submitURL('order_identifyno','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Order ID <?php echo $imgSort;?></a></th>
					<th width="77"><a onclick="submitURL('odr_date','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Date <?php echo $imgSort;?></a></th>
                    <th width="112"><a onclick="submitURL('ordPrice','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Price <?php echo $imgSort;?></a></th>
                    <th width="152"><a onclick="submitURL('ordPrice','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Comm. Rate <?php echo $imgSort;?></a></th>
                   <th width="50"><a onclick="submitURL('order_type','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Type <?php echo $imgSort;?></a></th>
				  <th width="115"><a onclick="submitURL('payMode','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Payment Method <?php echo $imgSort;?></a></th>
                  <th width="88"><a onclick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer;color:#FFFFFF;">Owner <?php echo $imgSort;?></a></th>
				</tr>
			</thead>
			<tbody>
            <?php
 include('route/config1.php');
 mysql_query ("set character_set_results='utf8'");
 $dt2=mktime(0,0,0,01,01,date("Y"));
$wKdat= date("Y-m-d",$dt2);
$hcurdate=date("Y-m-d");
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
if($_GET['restaurant_id']!=''){	
$sql = "SELECT * FROM resto_order  where odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_GET['restaurant_id']."' $sortBy ";
}
else
{
$sql = "SELECT * FROM resto_order  where odr_date<=CURDATE()  AND odr_date>=$wKdat $sortBy ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
?>	
            <?php
		$dSmOdr='';
		$totalSum='';
	if($numrows>0)
	{
	$i=1;
	while($data=mysql_fetch_array($result))
	{ 
	$totalSum+=$data['ordPrice'];
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $OwnerQuery = $dbb->showtabledata("tbl_restaurantOwner","restaurant_id",$data['restoid']);
 $OwnerData=mysql_fetch_assoc($OwnerQuery);
 $Commission= ($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
  if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
		 ?>
				<tr>
					
					<td><?php echo $CuisineData['restaurant_name']; ?></td>
					<td><?php echo $data['order_identifyno']; ?></td>
					<td><?php echo $data['user_date']; ?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo $data['ordPrice']; ?></td>
                    <td><?php echo $CuisineData['restaurant_commission']; ?> % = <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo $Cpl ?>
                    <?php  $dSmOdr+=($data['ordPrice']*$CuisineData['restaurant_commission'])/100; ?>
                    </td>
					<td><?php echo $data['order_type']; ?></td>
                    <td><?php echo $data['payMode']; ?></td>
                    <td><?php echo $OwnerData['restaurant_OwnerFirstName']; ?> <?php echo $OwnerData['restaurant_OwnerLastName']; ?></td>
				</tr>
                <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">This Yearly ! No Orders available for Printable</strong></td>
                </tr>
                <?php } ?>
                <tr>
		<td colspan="3" style="border:none;">&nbsp;</td>
		
		<td style="border:none;" align="center"><strong style="color:#000080; font-size:14px;">Total : <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?><?php 
		if($totalSum!=''){
		echo number_format($totalSum,2); 
		}
		else
		{
		echo '0.00';
		}
		?></strong></td>
		<td style="border:none;" align="right"><strong style="color:#000080; font-size:14px;">Commission : <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?><?php 
		if($dSmOdr!=''){
		echo number_format($dSmOdr,2);
		}
		else
		{
		echo '0.00';
		}
		 ?></strong></td>
		<td colspan="3" style="border:none;"></td>
		</tr>
				
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
