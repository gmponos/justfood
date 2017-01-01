<?php 
ob_start();
session_start();
if(!isset($_SESSION['AdminloginId']))
{
session_unset();
session_destroy();
header("location:index.php");
exit;
}
include('route/DB_Functions.php');
$dbb=new DB_Functions();
date_default_timezone_set('US/Eastern');
include('route/config1.php');
mysql_query ("set character_set_results='utf8'");
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>


		<table  class="table table-bordered table-striped table-cth orange" style="width:100%;" >
			<thead>
				<tr>
					
					<th >Restaurant</th>
					<th >Order ID</th>
					<th >Order Date</th>
                    <th >Order Price</th>
                    <th >Commision Rate</th>
                   <th>Type</th>
				  <th >Payment Method</th>
                  <th >Owner Name</th>
				</tr>
			</thead>
			<tbody>
           <?php
 include('route/config1.php');
 mysql_query ("set character_set_results='utf8'");
 $curdate=date("Y-m-d");
 if($_GET['restaurant_id']!='')
{		
$sql = "SELECT * FROM resto_order where restoid='".$_GET['restaurant_id']."'  order by order_id desc ";
}
else
{
$sql = "SELECT * FROM resto_order  order by order_id desc ";
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
					
					<td align="center"><?php echo $CuisineData['restaurant_name']; ?></td>
					<td align="center"><?php echo $data['order_identifyno']; ?></td>
					<td align="center"><?php echo $data['user_date']; ?></td>
					<td align="center"><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo $data['ordPrice']; ?></td>
                    <td align="center"><?php echo $CuisineData['restaurant_commission']; ?> % = <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo $Cpl; ?>
                    <?php  $dSmOdr+=($data['ordPrice']*$CuisineData['restaurant_commission'])/100; ?>
                    </td>
					<td align="center"><?php echo $data['order_type']; ?></td>
                    <td align="center"><?php echo $data['payMode']; ?></td>
                    <td align="center"><?php echo $OwnerData['restaurant_OwnerFirstName']; ?> <?php echo $OwnerData['restaurant_OwnerLastName']; ?></td>
				</tr>
               <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">No Orders available for Printable</strong></td>
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
        
          <table width="100%" border="0" align="right">
  <tr>
    <td><a href="javascript:window.print()" class="btn btn-duasembilan" title="Print Restaurant Orders" > Print Restaurant Orders</a></td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
</table>
        
	