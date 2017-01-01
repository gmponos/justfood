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
include('route/config1.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
?>

<style type="text/css">
      * {
        padding: 0;
        margin: 0;
      }
      body {
        font-family: arial, helvetica, sans-serif;
      }
      table {
        border-collapse: collapse;
        margin: 10px;
      }
      table td, table th {
        border: 1px solid black;
      }
      @media print {
        table td, table th {
          border: none;
        }
        body {
          font-family: serif;
        }
      }
    </style>

<table  class="table table-bordered table-striped table-cth orange" style="width:100%;" >
			<thead>
				<tr>
					<th width="119"><a  style="cursor:pointer;">Restaurant</a></th>
					<th width="97"><a style="cursor:pointer;">Order ID </a></th>
                    <th width="112"><a style="cursor:pointer;">Order Amount</a></th>
                    <th width="152"><a style="cursor:pointer;">Customer Name</a></th>
                   <th width="50"><a  style="cursor:pointer;">Address</a></th>
				  <th width="115"><a  style="cursor:pointer;">Delivery Boy</a></th>
				</tr>
			</thead>
			<tbody>
            <?php
 include('route/config1.php');
 mysql_query ("set character_set_results='utf8'");
$sql = "SELECT * FROM tbl_orderassign  where restaurant_id='".$_GET['restaurant_id']."' and order_id='".$_GET['order_id']."' and deliveryboy_id='".$_GET['deliveryboy_id']."' ";
$result = mysql_query($sql);
$numrows=mysql_num_rows($result);
?>	
            <?php
		
	if($numrows>0)
	{
	$i=1;
	while($data=mysql_fetch_array($result))
	{ 
$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
 $CuisineOrderQuery = $dbb->showtabledata("resto_order","order_identifyno",$_GET['order_id']);
 $CuisineOrderData=mysql_fetch_assoc($CuisineOrderQuery);
 		 ?>
				<tr>
					
					<td><?php echo $CuisineData['restaurant_name']; ?></td>
					<td><?php echo $CuisineOrderData['order_identifyno']; ?></td>
					<td><?php echo $CuisineOrderData['ordPrice']; ?></td>
					<td><?php echo $CuisineOrderData['name_customer']; ?></td>
                    <td><?php 
	$OrderDeliveryArea=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$CuisineOrderData['delivey_address']."' and loginID='".$CuisineOrderData['userId']."'"));
		
	if($OrderDeliveryArea['GustUserFloor']!=''){
	echo $OrderDeliveryArea['GustUserFloor'].',';
	}
	if($OrderDeliveryArea['GustUserStreetAddress']!=''){
	echo $OrderDeliveryArea['GustUserStreetAddress'].',';
	}
	
	if($OrderDeliveryArea['GustUserAddress']!=''){
	echo $OrderDeliveryArea['GustUserAddress'].',';
	}
	if($OrderDeliveryArea['GustUserLandlineAdress']!=''){
	echo $OrderDeliveryArea['GustUserLandlineAdress'].',';
	}
	
	if($OrderDeliveryArea['GustUserCityName']!=''){
	echo $OrderDeliveryArea['GustUserCityName'].',';
	}
	if($OrderDeliveryArea['GustUserCountryName']!=''){
	echo $OrderDeliveryArea['GustUserCountryName'];
	}
	echo '-'.$OrderDeliveryArea['GustUserPincode'];
	 ?>
					 </td>
					<td><?php 
					
					$OrderDeliveryBoy=mysql_fetch_assoc(mysql_query("select * from tbl_resDeliveryBoy where id='".$_GET['deliveryboy_id']."' "));
					echo $OrderDeliveryBoy['DeliveryBoyName']; ?></td>
                    
				</tr>
                <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">No Delivery Boy Order List Report available for Printable</strong></td>
                </tr>
                <?php } ?>
                <tr><td colspan="8" align="center" style="border:none;"><a href="javascript:window.print()" class="btn btn-duasembilan" title="Export into Excel Format" > Print Here</a></td></tr>
			</tbody>
		</table>
        
	