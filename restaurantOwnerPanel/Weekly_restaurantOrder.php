<?php include('route/header.php'); 
date_default_timezone_set('US/Eastern');
?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
	
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Weekly Restaurant Orders</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Weekly Restaurant Orders</a>
											</div>
										</div>
										<div class="row-fluid">
            <div class="span12">
				<?php
include('route/config1.php');
mysql_query ("set character_set_results='utf8'");
 $wdn=date("N");
			$dt2=mktime(0,0,0,date("m"),date('d'),date("Y"))-$wdn*24*3600;
			 $wKdat=date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			$dateWek=mktime(0,0,0,date('m'),date('d'),date('Y'))-(24*3600*7);
            $dateWek=date('Y-m-d',$dateWek);
			$_GET['restaurant_id']=$_SESSION['restaurant_id'];
if($_GET['restaurant_id']!=''){			
$resdID=" and restoid='".$_GET['restaurant_id']."'";	
}	
$adata=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='1'"));
$trdata1=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='2'"));
$dvdata2=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='3'"));
$cpdata3=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='4'")); 
$candata4=mysql_fetch_assoc(mysql_query("SELECT * FROM  `order_status` where id='5'")); 
$Weeklyordertotal=mysql_num_rows(mysql_query("select * from resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat "));
$Weeklyorderaccept=mysql_num_rows(mysql_query("select * from resto_order where status='1' and odr_date<=CURDATE()  AND odr_date>=$wKdat"));
$Weeklyordertransit=mysql_num_rows(mysql_query("select * from resto_order where status='2' and odr_date<=CURDATE()  AND odr_date>=$wKdat"));
$Weeklyorderdelivery=mysql_num_rows(mysql_query("select * from resto_order where status='3' and odr_date<=CURDATE()  AND odr_date>=$wKdat"));
$Weeklyordercomplete=mysql_num_rows(mysql_query("select * from resto_order where status='4' and odr_date<=CURDATE()  AND odr_date>=$wKdat"));
$Weeklyordercancel=mysql_num_rows(mysql_query("select * from resto_order where status='5' and odr_date<=CURDATE()  AND odr_date>=$wKdat"));


					?>
                <table width="100%" border="0">
  <tr>
   <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Total Orders (<?php echo $Weeklyordertotal; ?>)</strong></span> </td>
    <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Total <?php echo ucwords($adata['status']); ?> Orders (<?php echo $Weeklyorderaccept; ?>)</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:24px; line-height:24px;"><strong>Total <?php echo ucwords($trdata1['status']); ?> Orders (<?php echo $Weeklyordertransit; ?>)</strong></span></td>
    <td> <span class="label label-warning pull-right sl_status" style="height:24px; line-height:24px;"><strong>Total <?php echo ucwords($dvdata2['status']); ?> Orders (<?php echo $Weeklyorderdelivery; ?>)</strong></span></td>
    <td> <span class="label label-info pull-right sl_status" style="height:24px; line-height:24px;"><strong>Total <?php echo ucwords($cpdata3['status']); ?> Orders (<?php echo $Weeklyordercomplete; ?>)</strong></span></td>
    <td> <span class="label label-inverse pull-right sl_status" style="height:24px; line-height:24px;"><strong>Total <?php echo ucwords($candata4['status']); ?> Orders (<?php echo $Weeklyordercancel; ?>)</strong></span></td>
  </tr>
</table>
<br /><br />
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


                
                
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li style="background:#009500; " ><a href="#tab1" data-toggle="tab" style="color:#FFFFFF; font-size:18px;"><?php echo ucwords($adata['status']); ?> Orders(<?php echo $Weeklyorderaccept; ?>)</a></li>
						<li style="background:#009500; "><a href="#tab2" data-toggle="tab" style="color:#FFFFFF; font-size:18px;"><?php echo ucwords($trdata1['status']); ?> Orders( <?php echo $Weeklyordertransit; ?>)</a></li>
						<li style="background:#009500; "><a href="#tab3" data-toggle="tab" style="color:#FFFFFF; font-size:18px;"><?php echo ucwords($dvdata2['status']); ?> Orders(<?php echo $Weeklyorderdelivery; ?>)</a></li>
                        	<li style="background:#009500; "><a href="#tab4" data-toggle="tab" style="color:#FFFFFF; font-size:18px;"><?php echo ucwords($cpdata3['status']); ?> Orders(<?php echo $Weeklyordercomplete; ?>)</a></li>
                            <li style="background:#009500; "><a href="#tab5" data-toggle="tab" style="color:#FFFFFF; font-size:18px;"><?php echo ucwords($candata4['status']); ?> Orders(<?php echo $Weeklyordercancel; ?>)</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<p>
							<div class="row-fluid">
    <div class="span12">
    <?php 
if($_GET['did']!=''){
$delete_user = "delete from resto_order where order_id='".$_GET['did']."'";
$result = mysql_query($delete_user) or die(" query  not executed");
if($result){
$msg="Order deleted Successfully";
}
}
$tbl_name="resto_order";

if($_GET['restaurant_id']!='')
{
 $sql = "SELECT * FROM $tbl_name where restoid='".$_GET['restaurant_id']."' and status='1' and odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc ";
} 
else
{
$sql = "SELECT * FROM $tbl_name where status='1' and odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
	?>
    
		<table class="dt table table-striped table-condensed table-bordered" <?php if($numrows>0){ ?>id="example" <?php } ?>>
			<thead>
				<tr>
					
					<th></th>
					<th>Order ID</th>
					<th>Order Price</th>
                    <th>Restaurant Name</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
            	<?php


if($numrows>0)
{
$i=1;
while($data=mysql_fetch_array($result))
{ 
$count++;
?>
			<tr>
					<td><?php  echo $count;?></td>
					<td><?php echo ucwords($data['order_identifyno']);?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format($data['ordPrice'],2);?></td>
					<td> <?php $resna=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$data['restoid']."'")); ?>
                         <?php echo $resna['restaurant_name']; ?> </td>
                    <td> <?php echo ucwords($data['name_customer']);?>  </td>
                    <td><?php echo ucwords($data['user_date']);?></td>
					<td>
                    <a href="restaurantvieworderdetail.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" style="color:#ffffff;">View Details</a> <a href="Weekly_restaurantOrder.php?did=<?php  echo $data['order_id'];?>&page=<?php  echo $page; ?>" onClick="javascript:return confirm('Every record will deleted permanently')" class="btn btn-danger" style="color:#ffffff;">Delete</a>  <a href="restprint_bill.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" target="_blank" style="color:#ffffff;">Print Bill</a>
						  <?php
					$assicnCheck=mysql_num_rows(mysql_query("select * from tbl_orderassign where  restaurant_id='".$data['restoid']."' and order_id='".$data['order_identifyno']."' "));
					if($assicnCheck>0){
					 ?>
                    <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>&orderAssign=1" class="btn btn-danger" style="color:#ffffff;">Already Assign Delivery Boy</a>
                    <?php } else { ?>
                     <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>" class="btn btn-info" style="color:#ffffff;">Assign Delivery Boy</a>
                    <?php } ?> 
					</td>
				</tr>
<?php }} else{ 
$e1=1;
?>
	
<?php } ?>

</tbody>
</table>
<?php if($e1!=''){ ?>
     <table width="100%">
     <tr>
<td colspan="9"><strong style="color:#FF0000; font-size:14px;">No Weekly <?php echo ucwords($adata['status']); ?> Orders Available Yet</strong></td>  
</tr>
     </table> 
     <?php } ?>  
        
         <table width="80%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Weekly Total <?php echo ucwords($adata['status']); ?> Orders </strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:24px; line-height:24px; width:80px;"><strong><?php 
include('route/config1.php');
$query = "SELECT SUM(ordPrice) FROM resto_order where status='1' and odr_date<=CURDATE()  AND odr_date>=$wKdat"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
echo $row['SUM(ordPrice)'];
}?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></span></td>
   
  </tr>
</table>
        
		
	</div>
</div>
							</p>
						</div>
						<div class="tab-pane" id="tab2">
							<p>
								<div class="row-fluid">
    <div class="span12">
    <?php 
if($_GET['did']!=''){
$delete_user = "delete from resto_order where order_id='".$_GET['did']."'";
$result = mysql_query($delete_user) or die(" query  not executed");
if($result){
$msg="Order deleted Successfully";
}
}
$tbl_name="resto_order";

if($_GET['restaurant_id']!='')
{
 $sql = "SELECT * FROM $tbl_name where restoid='".$_GET['restaurant_id']."' and status='2' and odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc ";
} 
else
{
$sql = "SELECT * FROM $tbl_name where status='2' and odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
	?>
    
		<table class="dt table table-striped table-condensed table-bordered" <?php if($numrows>0){ ?>id="example2" <?php } ?>>
			<thead>
				<tr>
					
					<th></th>
					<th>Order ID</th>
					<th>Order Price</th>
                    <th>Restaurant Name</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
            	<?php


if($numrows>0)
{
$i=1;
while($data=mysql_fetch_array($result))
{ 
$count++;
?>
			<tr>
					<td><?php  echo $count;?></td>
					<td><?php echo ucwords($data['order_identifyno']);?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format($data['ordPrice'],2);?></td>
					<td> <?php $resna=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$data['restoid']."'")); ?>
                         <?php echo $resna['restaurant_name']; ?> </td>
                    <td> <?php echo ucwords($data['name_customer']);?>  </td>
                    <td><?php echo ucwords($data['user_date']);?></td>
					<td>
                    <a href="restaurantvieworderdetail.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" style="color:#ffffff;">View Details</a> <a href="Weekly_restaurantOrder.php?did=<?php  echo $data['order_id'];?>&page=<?php  echo $page; ?>" onClick="javascript:return confirm('Every record will deleted permanently')" class="btn btn-danger" style="color:#ffffff;">Delete</a>  <a href="restprint_bill.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" target="_blank" style="color:#ffffff;">Print Bill</a>
						  <?php
					$assicnCheck=mysql_num_rows(mysql_query("select * from tbl_orderassign where  restaurant_id='".$data['restoid']."' and order_id='".$data['order_identifyno']."' "));
					if($assicnCheck>0){
					 ?>
                    <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>&orderAssign=1" class="btn btn-danger" style="color:#ffffff;">Already Assign Delivery Boy</a>
                    <?php } else { ?>
                     <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>" class="btn btn-info" style="color:#ffffff;">Assign Delivery Boy</a>
                    <?php } ?> 
					</td>
				</tr>
<?php }} else{ 
$e2=1;
?>
	
<?php } ?>

</tbody>
</table>
<?php if($e2!=''){ ?>
     <table width="100%">
     <tr>
<td colspan="9"><strong style="color:#FF0000; font-size:14px;">No Weekly Orders <?php echo ucwords($trdata1['status']); ?> Available Yet</strong></td>  
</tr>
     </table> 
     <?php } ?>  
        
         <table width="80%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Weekly Total <?php echo ucwords($trdata1['status']); ?> Orders </strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:24px; line-height:24px; width:80px;"><strong><?php 
include('route/config1.php');
$query = "SELECT SUM(ordPrice) FROM resto_order where status='2' and odr_date<=CURDATE()  AND odr_date>=$wKdat"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
echo $row['SUM(ordPrice)'];
}?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></span></td>
   
  </tr>
</table>
        
		
	</div>
</div>
							</p>
						</div>
						<div class="tab-pane" id="tab3">
							<p>
								<div class="row-fluid">
    <div class="span12">
    <?php 
if($_GET['did']!=''){
$delete_user = "delete from resto_order where order_id='".$_GET['did']."'";
$result = mysql_query($delete_user) or die(" query  not executed");
if($result){
$msg="Order deleted Successfully";
}
}
$tbl_name="resto_order";

if($_GET['restaurant_id']!='')
{
 $sql = "SELECT * FROM $tbl_name where restoid='".$_GET['restaurant_id']."' and status='3' and odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc ";
} 
else
{
$sql = "SELECT * FROM $tbl_name where status='3' and odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
	?>
    
		<table class="dt table table-striped table-condensed table-bordered" <?php if($numrows>0){ ?>id="example3" <?php } ?>>
			<thead>
				<tr>
					
					<th></th>
					<th>Order ID</th>
					<th>Order Price</th>
                    <th>Restaurant Name</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
            	<?php


if($numrows>0)
{
$i=1;
while($data=mysql_fetch_array($result))
{ 
$count++;
?>
			<tr>
					<td><?php  echo $count;?></td>
					<td><?php echo ucwords($data['order_identifyno']);?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format($data['ordPrice'],2);?></td>
					<td> <?php $resna=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$data['restoid']."'")); ?>
                         <?php echo $resna['restaurant_name']; ?> </td>
                    <td> <?php echo ucwords($data['name_customer']);?>  </td>
                    <td><?php echo ucwords($data['user_date']);?></td>
					<td>
                    <a href="restaurantvieworderdetail.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" style="color:#ffffff;">View Details</a> <a href="Weekly_restaurantOrder.php?did=<?php  echo $data['order_id'];?>&page=<?php  echo $page; ?>" onClick="javascript:return confirm('Every record will deleted permanently')" class="btn btn-danger" style="color:#ffffff;">Delete</a>  <a href="restprint_bill.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" target="_blank" style="color:#ffffff;">Print Bill</a>
						  <?php
					$assicnCheck=mysql_num_rows(mysql_query("select * from tbl_orderassign where  restaurant_id='".$data['restoid']."' and order_id='".$data['order_identifyno']."' "));
					if($assicnCheck>0){
					 ?>
                    <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>&orderAssign=1" class="btn btn-danger" style="color:#ffffff;">Already Assign Delivery Boy</a>
                    <?php } else { ?>
                     <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>" class="btn btn-info" style="color:#ffffff;">Assign Delivery Boy</a>
                    <?php } ?> 
					</td>
				</tr>
<?php }} else{ 
$e3=1;
?>
	
<?php } ?>

</tbody>
</table>
<?php if($e3!=''){ ?>
     <table width="100%">
     <tr>
<td colspan="9"><strong style="color:#FF0000; font-size:14px;">No <?php echo ucwords($dvdata2['status']); ?> Orders Available Yet</strong></td>  
</tr>
     </table> 
     <?php } ?>  
        
         <table width="80%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Weekly Total <?php echo ucwords($dvdata2['status']); ?> Orders</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:24px; line-height:24px; width:80px;"><strong><?php 
include('route/config1.php');
$query = "SELECT SUM(ordPrice) FROM resto_order where status='3' and odr_date<=CURDATE()  AND odr_date>=$wKdat"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
echo $row['SUM(ordPrice)'];
}?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></span></td>
   
  </tr>
</table>
        
		
	</div>
</div>
							</p>
						</div>
                        <div class="tab-pane" id="tab4">
							<p>
								<div class="row-fluid">
    <div class="span12">
    
    
    
		<div class="row-fluid">
    <div class="span12">
    <?php 
if($_GET['did']!=''){
$delete_user = "delete from resto_order where order_id='".$_GET['did']."'";
$result = mysql_query($delete_user) or die(" query  not executed");
if($result){
$msg="Order deleted Successfully";
}
}
$tbl_name="resto_order";

if($_GET['restaurant_id']!='')
{
 $sql = "SELECT * FROM $tbl_name where restoid='".$_GET['restaurant_id']."' and status='4' and odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc ";
} 
else
{
$sql = "SELECT * FROM $tbl_name where status='4' and odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
	?>
    
		<table class="dt table table-striped table-condensed table-bordered" <?php if($numrows>0){ ?>id="example4" <?php } ?>>
			<thead>
				<tr>
					
					<th></th>
					<th>Order ID</th>
					<th>Order Price</th>
                    <th>Restaurant Name</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
            	<?php


if($numrows>0)
{
$i=1;
while($data=mysql_fetch_array($result))
{ 
$count++;
?>
			<tr>
					<td><?php  echo $count;?></td>
					<td><?php echo ucwords($data['order_identifyno']);?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format($data['ordPrice'],2);?></td>
					<td> <?php $resna=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$data['restoid']."'")); ?>
                         <?php echo $resna['restaurant_name']; ?> </td>
                    <td> <?php echo ucwords($data['name_customer']);?>  </td>
                    <td><?php echo ucwords($data['user_date']);?></td>
					<td>
                    <a href="restaurantvieworderdetail.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" style="color:#ffffff;">View Details</a> <a href="Weekly_restaurantOrder.php?did=<?php  echo $data['order_id'];?>&page=<?php  echo $page; ?>" onClick="javascript:return confirm('Every record will deleted permanently')" class="btn btn-danger" style="color:#ffffff;">Delete</a>  <a href="restprint_bill.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" target="_blank" style="color:#ffffff;">Print Bill</a>
						  <?php
					$assicnCheck=mysql_num_rows(mysql_query("select * from tbl_orderassign where  restaurant_id='".$data['restoid']."' and order_id='".$data['order_identifyno']."' "));
					if($assicnCheck>0){
					 ?>
                    <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>&orderAssign=1" class="btn btn-danger" style="color:#ffffff;">Already Assign Delivery Boy</a>
                    <?php } else { ?>
                     <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>" class="btn btn-info" style="color:#ffffff;">Assign Delivery Boy</a>
                    <?php } ?> 
					</td>
				</tr>
<?php }} else{ 
$e4=1;
?>
	
<?php } ?>

</tbody>
</table>
<?php if($e4!=''){ ?>
     <table width="100%">
     <tr>
<td colspan="9"><strong style="color:#FF0000; font-size:14px;">No <?php echo ucwords($cpdata3['status']); ?> Orders Available Yet</strong></td>  
</tr>
     </table> 
     <?php } ?>  
        
         <table width="80%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Weekly Total <?php echo ucwords($cpdata3['status']); ?> Orders</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:24px; line-height:24px; width:80px;"><strong><?php 
include('route/config1.php');
$query = "SELECT SUM(ordPrice) FROM resto_order where status='4' and odr_date<=CURDATE()  AND odr_date>=$wKdat"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
echo $row['SUM(ordPrice)'];
}?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></span></td>
   
  </tr>
</table>
        
		
	</div>
</div>
        
        
         
        
		
	</div>
</div>
							</p>
						</div>
                         <div class="tab-pane" id="tab5">
							<p>
									<div class="row-fluid">
    <div class="span12">
    <?php 
if($_GET['did']!=''){
$delete_user = "delete from resto_order where order_id='".$_GET['did']."'";
$result = mysql_query($delete_user) or die(" query  not executed");
if($result){
$msg="Order deleted Successfully";
}
}
$tbl_name="resto_order";

if($_GET['restaurant_id']!='')
{
 $sql = "SELECT * FROM $tbl_name where restoid='".$_GET['restaurant_id']."' and status='5' and odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc ";
} 
else
{
$sql = "SELECT * FROM $tbl_name where status='5' and odr_date<=CURDATE()  AND odr_date>=$wKdat  order by order_id desc ";
}
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
	?>
    
		<table class="dt table table-striped table-condensed table-bordered" <?php if($numrows>0){ ?>id="example5" <?php } ?>>
			<thead>
				<tr>
					
					<th></th>
					<th>Order ID</th>
					<th>Order Price</th>
                    <th>Restaurant Name</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
            	<?php


if($numrows>0)
{
$i=1;
while($data=mysql_fetch_array($result))
{ 
$count++;
?>
			<tr>
					<td><?php  echo $count;?></td>
					<td><?php echo ucwords($data['order_identifyno']);?></td>
					<td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format($data['ordPrice'],2);?></td>
					<td> <?php $resna=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$data['restoid']."'")); ?>
                         <?php echo $resna['restaurant_name']; ?> </td>
                    <td> <?php echo ucwords($data['name_customer']);?>  </td>
                    <td><?php echo ucwords($data['user_date']);?></td>
					<td>
                    <a href="restaurantvieworderdetail.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" style="color:#ffffff;">View Details</a> <a href="Weekly_restaurantOrder.php?did=<?php  echo $data['order_id'];?>&page=<?php  echo $page; ?>" onClick="javascript:return confirm('Every record will deleted permanently')" class="btn btn-danger" style="color:#ffffff;">Delete</a>  <a href="restprint_bill.php?orderid=<?php echo ucwords($data['order_identifyno']);?>" class="btn btn-danger" target="_blank" style="color:#ffffff;">Print Bill</a>
						  <?php
					$assicnCheck=mysql_num_rows(mysql_query("select * from tbl_orderassign where  restaurant_id='".$data['restoid']."' and order_id='".$data['order_identifyno']."' "));
					if($assicnCheck>0){
					 ?>
                    <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>&orderAssign=1" class="btn btn-danger" style="color:#ffffff;">Already Assign Delivery Boy</a>
                    <?php } else { ?>
                     <a href="assign_deliveryBoy.php?orderid=<?php echo $data['order_identifyno'];?>&DeliveryBoyRestaurantID=<?php echo $data['restoid'];?>" class="btn btn-info" style="color:#ffffff;">Assign Delivery Boy</a>
                    <?php } ?> 
					</td>
				</tr>
<?php }} else{ 
$e5=1;
?>
	
<?php } ?>

</tbody>
</table>
<?php if($e5!=''){ ?>
     <table width="100%">
     <tr>
<td colspan="9"><strong style="color:#FF0000; font-size:14px;">No <?php echo ucwords($candata4['status']); ?> Orders Available Yet</strong></td>  
</tr>
     </table> 
     <?php } ?>  
        
         <table width="80%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="height:24px; line-height:24px;"><strong style="">Weekly Total <?php echo ucwords($candata4['status']); ?> Orders</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:24px; line-height:24px; width:80px;"><strong><?php 
include('route/config1.php');
$query = "SELECT SUM(ordPrice) FROM resto_order where status='5' and odr_date<=CURDATE()  AND odr_date>=$wKdat"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
echo $row['SUM(ordPrice)'];
}?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></strong></span></td>
   
  </tr>
</table>
        
		
	</div>
</div>
							</p>
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
