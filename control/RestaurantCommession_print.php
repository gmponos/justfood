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
    <div align="center"><h3 style="padding:20px; color:#008800; font-size:16px;">Restaurant Commission Report</h3> </div>
<table   style="width:100%;" >
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
				
					<th><a onClick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#000000;">Name </a></th>
                    <th><a onClick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#000000;">Rate </a></th>
                    <th><a onClick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#000000;">Sales </a></th>
					<th><a onClick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#000000;">Commission </a></th>
                    <th><a onClick="submitURL('paid_commission','<?php echo $pl;?>');" style="cursor:pointer; color:#000000;">Paid Commission </a></th>
                    <th><a onClick="submitURL('restoid','<?php echo $pl;?>');" style="cursor:pointer; color:#000000;">Pending Commision </a></th>
                   
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
if($_GET['RestaurantOrderDateStart']!='' && $_GET['RestaurantOrderDateEnd']!=''  && $_GET['restoid']!='')
 {
 $QueryPer=" status='4' and odr_date>='".$_GET['RestaurantOrderDateStart']."' AND odr_date<='".$_GET['RestaurantOrderDateEnd']."'  and restoid='".$_GET['restoid']."'";
 }
 elseif($_GET['RestaurantOrderDateStart']!='' && $_GET['RestaurantOrderDateEnd']!='')
 {
 $QueryPer=" status='4' and odr_date>='".$_GET['RestaurantOrderDateStart']."' AND odr_date<='".$_GET['RestaurantOrderDateEnd']."'";
 }
 elseif($_GET['RestaurantOrderDateStart']!='')
 {
 $QueryPer="status='4' and odr_date='".$_GET['RestaurantOrderDateStart']."'";
 }
 elseif($_GET['restoid']!='')
 {
 $QueryPer="status='4' and restoid='".$_GET['restoid']."'";
 }
 else
 {
 $QueryPer="status='4'";
 }
 
		
$sql = "SELECT * FROM resto_order where $QueryPer $sortBy ";
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
               
				</tr>
                     <?php } } else { ?>
                
                <tr>
                <td colspan="8"><strong style="color:#FF0000; padding:10px; font-size:16px;">There are no commission detail available yet</strong></td>
                </tr>
                <?php } ?>          
              <tr><td colspan="8" align="center" style="border:none;"><a href="javascript:window.print()" class="btn btn-duasembilan" title="Export into Excel Format" > Print Here</a></td></tr>
				
			</tbody>
		</table>
												
                                                    
                           