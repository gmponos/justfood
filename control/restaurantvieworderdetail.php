<?php 
include('route/header.php'); 
include('route/config1.php');
include('route/DB_Functions.php');
date_default_timezone_set('US/Eastern');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
include('domainName.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
$dataorder=mysql_fetch_assoc($dbb->showtabledata('resto_order','order_identifyno',$_GET['orderid']));
$data=mysql_fetch_assoc($dbb->showtabledata('tbl_restaurantAdd','id',$dataorder['restoid']));
?>
<?php
if(isset($_POST['SubmitOrderstatus']))
{
mysql_query("update resto_order set status='".$_POST['StatusChange']."' where order_identifyno='".$_GET['orderid']."'");
$OrderStatus=mysql_fetch_assoc(mysql_query("select * from order_status where id='".$_POST['StatusChange']."'"));
$to=$dataorder['email'];
$subject =''.$AdminDataLoginVal['website_name'].' Online Order Status';
$from=$RegistrationDataLoginVal['supportemail'];
$message="<table bgcolor='#dfdfdf' width='100%' style='float:left;background-color:rgb(223,223,223);font-family:Arial,'sans serif''> 
  <tbody> 
    <tr> 
      <td align='center'> 
        <table border='0' cellpadding='0' cellspacing='0'> 
          <tbody> 
            <tr> 
              <td colspan='2' height='359' valign='top'><img alt='' src='https://ci3.googleusercontent.com/proxy/oqgjYIFndtWMaU6BmYk2yKMjRDsaL5wbQPL_Hh3ARVE6_TOpMJ3q3n54Brllrzr41gpnnPVV1-ixogBC2CVmfylAf8HaGw6pVrhVSBrJjk4GxAWHW0RDquP7RxO2yyLpF1qllCb0WtkQ7H_eA24CQmS3tYM=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-left.png'></td> 
              <td rowspan='2'> 
                <table border='0' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td bgcolor='' style='background-image:url(https://ci3.googleusercontent.com/proxy/ULCRAiwWL9iHiPYUTWZkzsldvOF8xAcaH1NnHMCo4fOBSZmZlQafsxfMJWRIX-xpEnU_qjE4LNN2JsFKONWeijp-EeZCQ9GVERwqf44jtGjXUBQV2T_qgggzVHwuePTJY20ViGwa5EePhpstWNE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/header_bg.jpg);background-repeat:repeat no-repeat'> 
                        <table valign='middle' cellpadding='0' cellspacing='0' width='100%'> 
                          <tbody> 
                            <tr> 
                              <td width='12'></td> 
                              <td width='253' style='padding:10px'><a href='".$DomainName."' target='_blank'><img  alt='".$AdminDataLoginVal['website_name']." Online Food Ordering' src='".$DomainName."/control/sitelogo/".$AdminDataLoginVal['website_logo']."' width='140' height='90'  ></a></td> 
                              <td align='right' width='453' style='color:rgb(102,102,102);font-size:12px;font-family:Arial,'sans serif';padding-right:15px'>&nbsp;</td> 
                            </tr> 
                          </tbody> 
                        </table></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#c32c2c' height='6'></td> 
                    </tr> 
                  </tbody> 
                </table> 
                <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td style='font-family:'Trebuchet MS',Arial,Helvetica,sans-serif;font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'>     
                <table cellpadding='0' cellspacing='0' width='730'>
                  <tbody>

                   <tr>
                          <td > 
<h2 style='color:#000066;margin-left:10px; margin-top:10px;'>Hi ".ucwords($dataorder['name_customer'])." !</h2>
<p style='padding:10px 0 0 20px;margin-left:20px;margin-bottom:1em;font-family:Arial,Helvetica,sans-serif;font-size:17px;color:#3a3a3a'>
                          Just a quick email to inform your Order Status is <strong>".$OrderStatus['status']."</strong></p>
                       
<div style='padding:10px; color:#CA0000; font-size:18px; margin-left:50px;'>".$_POST['status_message']."</div>

</td>
                    </tr>
                    
                   
                                
             </table>       
  

                       </td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'>&nbsp;</td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>Thank you for your preference.</td> 
                    </tr>
					 <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>".$AdminDataLoginVal['website_name']." Team</td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'><a style='color:#ed6c2b' href='".$DomainName."' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a></td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#C1272D' height='10'></td> 
                    </tr> 
                  </tbody> 
                </table></td> 
              <td colspan='2' valign='top'><img alt='' style='margin-top:1px' src='https://ci6.googleusercontent.com/proxy/8o1ccbZ7ctJxK1VN4zNIxlWON_rkJswBHm6DzxefVm-_VSzj9QPFhRMbpnLl2K53YvrCXyuvok0vrS6cV3RfcihRmWQlG3YSbM63MuIfpr7r4nTsSrN68-uEEw1yRlju_Ov5ZghGFjY9C2mGLuNV36XI-Oh4=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-right.png'></td> 
            </tr> 
            <tr> 
              <td>&nbsp;</td> 
              <td background='https://ci4.googleusercontent.com/proxy/EZYYeK4w2asNVCcbD8wkliiy7Ulzcci_sqRnKSnJ7gNSYlE4AqAvpw_mM4gjxuC_6i4c6DwJukWOpT_yWblEwr6f6OpbRr2aqz_MffQ_j4T0revCtSl9IbBYXmi8e8IvqC74uJ0IeL141s4DRBajug=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-left.png' width='4'></td> 
              <td background='https://ci4.googleusercontent.com/proxy/fMGLYGaSXBcqpb_4i_0NpDT6OwB1EmhPO0VBXxU4tifv6KxhPAc1Tu_vDL5zztDKjkM6iFsXefxLWpLfXP-RvBEB1YBmRtIfT2bj9iIQRyA8g4GBUYk8qH905Gt51p4TIoNbOO7CyfKJqiXoU6dgKmE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-right.png' width='4'></td> 
              <td>&nbsp;</td> 
            </tr> 
            <tr> 
              <td colspan='2'></td> 
              <td><img alt='' src='https://ci6.googleusercontent.com/proxy/E3iNizj4AUWYxz8t1e9PUopNYgAoddNQraaIHCPJ56eP0Cq56k8daz74Y6Gv7xWplalG0fIJwtVc0csoezk3Cgi89cQJofg6Se7I1Hg7zLd0_V5lG91FUKa23Sg5CMsqKTFCpOeYONBs0QtglyAtjMFC=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-bottom.png'></td> 
              <td colspan='2'></td> 
            </tr> 
          </tbody> 
        </table></td> 
    </tr> 
    <tr> 
      <td height='40'></td> 
    </tr> 
  </tbody> 
</table><div class='yj6qo'></div><div class='adL'>
</div></div>";

	$headers = "MIME-Version: 1.0\n";

	$headers .= "Content-type: text/html; charset=windows-874\n";

	$headers .= "From: $from  \r\n" .

	$headers .= "X-Priority: 1\r\n"; 

	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";

	$headers .= "X-MSMail-Priority: High\r\n"; 

	$headers .= "X-Mailer: Just My Server"; 

	mail($to, $subject, $message, $headers);

$msg="Order Status has been send Successfully";
}

?>

 <link type="text/css" rel="stylesheet" href="css/print-bill.css"  />

<div id="page-wrap">

		<!-- left sidebar -->

		<?php include('route/side_bar.php'); ?>

		



		<div id="main-content">

			<div id="inner">

				

				<div class="container-fluid">

					<div class="tabbable main-tabs">

						<ul class="nav nav-tabs">

							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i> Restaurant Menu Cart Details</a></li>

						</ul>



						<div class="tab-content"  style="height:1750px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well">

										<div class="navbar">

											<div class="navbar-inner">

												<a class="brand" href="#"> Restaurant Menu Cart Details</a>

											</div>

										</div>

                                         

                                         <?php if($msg!=''){  ?>

                                         <div style="color:#0066FF; font-size:16px;"><?php echo $msg;?></div>

                                         <?php } ?>

                                           

                                            <script type="text/javascript">

function Orderemailvalidation(){

var chkStatus = true

if(document.getElementById('StatusChange').value =="") {

document.getElementById("StatusChange").style.background='#8C0000';

document.getElementById("StatusChange").focus();

chkStatus = false;

}

else

document.getElementById('StatusChange').className = "";

<?php /*?>if(document.getElementById('status_message').value =="") {
alert("please enter order status description");
document.getElementById("status_message").style.background='#8C0000';

document.getElementById("status_message").focus();

chkStatus = false;

}

else

document.getElementById('status_message').className = "";


<?php */?>


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

                                            

										<div class="row-fluid" >

											<div  class=" span12">

												<form id="SignupForm" action="" method="post" enctype="multipart/form-data">

										

                                               <table  align="center">

		<tr>

			<td align="center">

				<h2><?php echo ucwords($data['restaurant_name']);?> </h2>

			</td>

		</tr>

		<tr>

			<td style="text-align:center;width:55%;">

				<h3><?php echo ucwords($data['restaurant_address']);?> <br/>

<?php echo ucwords($data['restaurantCity']);?>,<?php echo ucwords($data['restaurant_phone']);?></h3>

			</td>

		</tr>

		

	</table>

<br>

<table width="100%" class="">

 

   <tr class="bill-header">

    <td><span class="tdleft">Order No:</span></td>

    <td colspan="3"><span class="dataright"><?php echo $_GET['orderid']; ?></span></td>

  </tr>

  		

	

  <tr class="bill-header">

    <td><span class="tdleft">Customer Name:</span>	</td>

    <td colspan="3"><span class="dataright1"><?php  echo $dataorder['name_customer'];?> <?php
	 ?></span></td>

  </tr>
  
  <tr class="bill-header">

    <td><span class="tdleft">Delivery Address:</span>	</td>

    <td colspan="3"><span class="dataright1">
    <?php
	$OrderDeliveryArea=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$dataorder['delivey_address']."' and loginID='".$dataorder['userId']."'"));
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
    </span></td>

  </tr>


 <tr class="bill-header">
<td><span class="tdleft">Mobile No:</span></td>
<td colspan="3"><span class="dataright"><?php echo $OrderDeliveryArea['GustUserMobileNo']; ?></span></td>
 </tr>
 
  <tr class="bill-header">
<td><span class="tdleft">IP Address:</span></td>
<td colspan="3"><span class="dataright"><?php echo $dataorder['ip']; ?></span></td>
 </tr>
 

  

  <tr class="bill-header">

    <td><span class="tdleft">Order Date:</span></td>

    <td colspan="3"><span class="dataright"><?php echo $dataorder['user_date']; ?></span></td>


  </tr>
  
  <tr class="bill-header">

    <td><span class="tdleft">Order Type:</span></td>

    <td colspan="3"><span class="dataright"><?php echo $dataorder['type']; ?></span></td>


  </tr>

  

  <tr class="bill-header">

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

   

  </tr>



  <tr>

    <td class="tbheader" style="background:#F00000;"><center>DESCRIPTION</center></td>
    <td class="tbheader" style="background:#F00000;"><center>QTY</center>	</td>

    <td class="tbheader" style="background:#F00000;"><center>PRICE</center></td>

    <td class="tbheader" style="background:#F00000;"><center>SUB TOTAL</center></td>

  </tr>
<?php
$DealsQuery=mysql_query("select * from cartfoodDealsInsert where orderId='".$_GET['orderid']."' group by deal_id");
	if(mysql_num_rows($DealsQuery)>0)
	{
	while($dealFood=mysql_fetch_assoc($DealsQuery)){
   $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
 ?>
 <tr>
 <td class="tbheader1"><?php echo $dealFood['deal_name'];?>
 <br />
              <span class="desc-small" style="font-size:14px;">
   <strong> Deal Items: </strong>
    <br />
    <?php 
	
	$SlotItem=explode(',',$dealFood['slotItemID']);
	foreach($SlotItem as $v)
	{
	if($v!=''){
	$slotDNam=mysql_fetch_assoc(mysql_query("select * from tbl_fooddealslotitem where id='".$v."'"));
	echo $slotDNam['slot_itemName'];?><br />
    <?php } } ?>
     </span>
 </td>
    <td class="tbheader1" align="right"><?php echo $dealFood['quqntity'];?></td>
    <td class="tbheader1" align="right"><?php echo $dealFood['deal_price']?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
    <td class="tbheader1" align="right"><?php echo $dealFood['deal_price']*$dealFood['quqntity'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
    </tr>
    <?php } }?>
    
   <?php

									  $g=mysql_query("SELECT * FROM  `resto_order_details` where orderId='".$_GET['orderid']."'");
                                      while($orda=mysql_fetch_assoc($g))
										{
										$ut=$orda['menuprice']*$orda['quantity'];
 									  $mg=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restaurantMainMenuItem` where id='".$orda['menuId']."'"));
									  
									   ?>

	  <tr>

    <td class="tbheader1">
    <?php echo $mg['RestaurantPizzaItemName'];?>
    <?php
	$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$orda['size']."'"));
	if($MenuSizeData['SizeMenuName']!=''){
	echo '<br />('.$MenuSizeData['SizeMenuName'].')';
	}
	 ?>
    <?php
	$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$orda['doughValue']."'"));
	if($MenuDoughData['menuDoughName']!=''){
	echo '<br>'.$MenuDoughData['menuDoughName'];
	}
	 ?>
      <?php
	$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$orda['baseValue']."'"));
	if($MenuBaseData['menuBaseName']!=''){
	echo '<br>'.$MenuBaseData['menuBaseName'];
	}
	 ?>
      <?php
	$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$orda['cheesValue']."'"));
	if($MenuCheesData['menuCheesName']!=''){
	echo '<br>'.$MenuCheesData['menuCheesName'];
	}
	 ?>
   
      <?php
	 $plk=explode(',',$orda['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	}
	?>
        <?php
	 $plk=explode(',',$orda['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	}?>
    
     
    </td>

   

    <td class="tbheader1" align="right"><?php echo $orda['quantity']; ?>  

    </td>

	

    <td class="tbheader1" align="right"> <?php echo number_format($mg['RestaurantPizzaItemPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php if($MenuSizeData['SizeMenuPrice']!=''){
	echo '<br />'.$MenuSizeData['SizeMenuPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	?>
 <?php 
 if($MenuDoughData['menuDoughPrice']!=''){
	echo '<br>'.number_format($MenuDoughData['menuDoughPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?> 
  <?php 
 if($MenuBaseData['menuBasePrice']!=''){
	echo '<br> '.number_format($MenuBaseData['menuBasePrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?>
 
  <?php 
 if($MenuCheesData['menuCheesPrice']!=''){
	echo '<br>'.number_format($MenuCheesData['menuCheesPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?>
 
  <?php
	 $plk=explode(',',$orda['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$MenuExtraData['menuExtraPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	}
	?>
        <?php
	 $plk=explode(',',$orda['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$MenuExtraData['menuExtraPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	}
 
  
 //if($MenuExtraData1['menuExtraPrice']!=''){
	//echo '<br>&euro; '.number_format($MenuExtraData1['menuExtraPrice'],2);
	//}
 ?>

    </td>

	

    <td class="tbheader1" align="right"><?php 

					//echo $val['price']*$val['quqntity']+$extPrc;

						$ItemTota=$orda['menuprice']*$orda['quantity'];
						$ItemTota=$ItemTota+$extPrc;
						echo number_format($ItemTota,2);
						//$subTotal+=($val['price']*$val['quqntity']+$extPrc);

						$subTotal+=($ItemTota);
?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>

    </td>

  </tr>

   <?php } 
   $subTotal=$subTotalOffer+$subTotal;
   ?>

      <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">SubTotal:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;">  <?php echo number_format($subTotal,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>                                 

  <tr class="bill-header">



    <td colspan="5">&nbsp;</td>

  </tr>

  

  <?php 
  if($dataorder['type']=='Pickup' || $dataorder['type']=='Takeout'){
  if($dataorder['deliveryChrg']!=''){?>

   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Delivery Charge:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['deliveryChrg']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

  <?php } ?>
  

  <?php } ?>



   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Tip:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['ability_to_pay_tips']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>
  
   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Convenience Fee:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['convenience_fee']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>
  <?php if($dataorder['disCupnPrice']!=''){?>

   <tr class="bill-header">

    <td colspan="3"><span class="totalpc">Coupon Discount Charge <?php echo $dataorder['disCupn']; ?>:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> -  <?php 
	if($dataorder['disCupnPrice']!=''){
	echo number_format($dataorder['disCupnPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?>
     <?php  if($dataorder['couponCodeType']=='pr'){  ?>
%
 <?php } else { ?>
  <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php } ?>
     </span></td>

  </tr>

  <?php } ?>
  
  <?php if($dataorder['discountValue']!=''){?>

   <tr class="bill-header">

    <td colspan="2"><span class="totalpc">Discount Offer :</span></td>

  <td align="right" colspan="2"><span class="totalpc"   style="color:#FF0000; font-size:14px;"><?php 
 
  echo $dataorder['discountDiscription']; 
  
  ?> -  <?php 
   if($dataorder['discountValue']!=''){
  echo number_format($dataorder['discountValue'],2);
  }
  else
  {
  echo '0.00';
  }
   ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
    </span></td>

  </tr>

  <?php } ?>
<?php if($dataorder['loyptamount']!=''){?>

   <tr class="bill-header">

    <td colspan="2"><span class="totalpc">Pay by loyalty :</span></td>

  <td align="right" colspan="2"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> - <?php 
   if($dataorder['loyptamount']!=''){
  echo number_format($dataorder['loyptamount'],2);
  }
  else
  {
  echo '0.00';
  }
   ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
    </span></td>

  </tr>

  <?php } ?>
  <tr class="bill-header">
	

    <td colspan="3"><span class="totalpc">Total Amount:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> <?php 
	if($dataorder['deliveryChrg']!='')
	{
	 if($dataorder['type']!='Pickup'){
	$TotalPrice=$dataorder['ordPrice'];
	}
	else
	{
	$TotalPrice=$dataorder['ordPrice'];
	}
	}
	echo number_format($TotalPrice,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

  <tr><td colspan="4">&nbsp;</td></tr>
    <tr><td>Special Instruction</td><td colspan="3"><?php echo $dataorder['userComment'];?></td></tr>
  <tr><td colspan="4">&nbsp;</td></tr>

   <tr><td colspan="4" align="center"><select name="StatusChange" id="StatusChange" required onmouseover="return clearFieldValue(this);" onclick="return clearFieldValue(this);" style="width:350px;">

   <option value="">select</option>

   <?php $STp=mysql_query("select * from order_status");

   while($Pl=mysql_fetch_assoc($STp)){

    ?>

    <option value="<?php echo $Pl['id'];?>"><?php echo $Pl['status'];?></option>

    <?php } ?>

   </select>

   </td></tr>

    <tr><td colspan="4">&nbsp;</td></tr>

   <tr>

    <td colspan=""><label for="restaurant_description">Write Message</label></td>

    <td colspan="3">

    <textarea name="status_message" id="status_message"  class="twys" onmouseover="return clearFieldValue(this);" onclick="return clearFieldValue(this);" style="width:800px; height:150px;"></textarea>

    </td>

   </tr> 

    <tr><td colspan="4">&nbsp;</td></tr>

  <tr><td colspan="4" align="center"><input id="SubmitOrderstatus" type="submit" name="SubmitOrderstatus" onClick="return Orderemailvalidation();" class="btn btn-primary" value="Send Order Status to Customer" /></td></tr>

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

