<div class="tab_contents">
  <div class="tab_left">
  <h1><?php echo ucwords($TableLanguage4['ResOverviewText']);?></h1>
  <table width="100%">
  <tr>
    <td width="50px" align="left"><h2><img src="images/Address_web_icon.png" width="30" height="30" /></h2></td>
    <td align="left">
   <h2><?php echo $TableLanguage4['ResAddressText'];?></h2>
  <p><?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>,<?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?></p>
    </td>
  </tr>
 <tr>
    <td width="50px" align="left"> <h2><img src="images/cuisine.png" /></h2></td>
    <td align="left">
     <h2><?php echo $TableLanguage['CuisinesText'];?></h2>
  <p> <?php $cuisin=explode(',',$resdata['restaurant_cuisine']);
			$ggphoto='';
			foreach($cuisin as $c)
			{
			$ggphoto.=$c.', ';
			}
			echo rtrim($ggphoto,', ');
			?></p>
    </td>
  </tr>
 <tr>
    <td width="50px" align="left"><h2><img src="images/cash.png" /></h2></td>
    <td align="left">
     <h2><?php echo $TableLanguage4['ResMinDeliveryFee'];?></h2>
  	<p> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format(ucwords($resdata['restaurant_default_min_order']),2); ?> </p>
    </td>
  </tr>
  <tr>
    <td width="50px" align="left"><h2><img src="images/pickup.png" /></h2></td>
    <td align="left">
    <h2><?php echo $TableLanguage4['ResPickupTimeText'];?></h2>
    <p><?php echo stripslashes(ucwords($resdata['restaurant_avarage_deliveryTime'])); ?></p>
    </td>
  </tr>
  <tr>
    <td width="50px" align="left"><h2><img src="images/delivery_icon.png" /></h2></td>
    <td align="left"> <h2><?php echo $TableLanguage4['ResDeliveryTimText'];?></h2>
    <p><?php echo stripslashes(ucwords($resdata['restaurant_avarage_deliveryTime'])); ?></p></td>
  </tr>
</table>  
 
 
  
 
    
    <h6><?php echo $TableLanguage4['ResPaymentTypesText'];?></h6>
    <?php $PaymentData=mysql_fetch_assoc(mysql_query("select * from tbl_pyamentSetting where id like '%$resdata[restaurant_payment_method]%' ")); ?>
    <h2><img src="control/PaymentIcon/<?php echo $PaymentData['restPaymentMethodIcon']; ?>" /></h2><h2><?php echo ucwords($PaymentData['restPaymentMethodName']); ?></h2>
  </div>
  <div class="tab_right" style="width:50%; float:right; padding:1%;">
  <h1><?php echo $TableLanguage4['ResDeliveryHoursText'];?></h1>
 <?php //include('displayTimeData.php'); 
 
 
 ?>
 
  <?php
if($DeliveryTime['restaurant_delivery_mon_selected']!=''){
$DmonStart=$DeliveryTime['restaurant_delivery_mon_open_hr'].':'.$DeliveryTime['restaurant_delivery_mon_open_min'].''.$DeliveryTime['restaurant_delivery_mon_open_am'];
$DmonClose=$DeliveryTime['restaurant_delivery_mon_close_hr'].':'.$DeliveryTime['restaurant_delivery_mon_close_min'].''.$DeliveryTime['restaurant_delivery_mon_open_pm'];
$DmonDateValue=$DmonStart.'-'.$DmonClose;
}
else
{
$DmonDateValue=$TableLanguage4['ResClosetimeText'];
}
if($DeliveryTime['restaurant_delivery_tue_selected']!=''){
$DtueStart=$DeliveryTime['restaurant_delivery_tue_open_hr'].':'.$DeliveryTime['restaurant_delivery_tue_open_min'].''.$DeliveryTime['restaurant_delivery_tue_open_am'];
$DtueClose=$DeliveryTime['restaurant_delivery_tue_close_hr'].':'.$DeliveryTime['restaurant_delivery_tue_close_min'].''.$DeliveryTime['restaurant_delivery_tue_open_pm'];
 $DtueDateValue=$DtueStart.'-'.$DtueClose;
}
else
{
$DtueDateValue=$TableLanguage4['ResClosetimeText'];
}


if($DeliveryTime['restaurant_delivery_wed_selected']!=''){
$DwedStart=$DeliveryTime['restaurant_delivery_wed_open_hr'].':'.$DeliveryTime['restaurant_delivery_wed_open_min'].''.$DeliveryTime['restaurant_delivery_wed_open_am'];
$DwedClose=$DeliveryTime['restaurant_delivery_wed_close_hr'].':'.$DeliveryTime['restaurant_delivery_wed_close_min'].''.$DeliveryTime['restaurant_delivery_wed_open_pm'];
$DwedDateValue=$DwedStart.'-'.$DwedClose;
}
else
{
$DwedDateValue=$TableLanguage4['ResClosetimeText'];
}


if($DeliveryTime['restaurant_delivery_thu_selected']!=''){
$DthuStart=$DeliveryTime['restaurant_delivery_thu_open_hr'].':'.$DeliveryTime['restaurant_delivery_thu_open_min'].''.$DeliveryTime['restaurant_delivery_thu_open_am'];
$DthuClose=$DeliveryTime['restaurant_delivery_thu_close_hr'].':'.$DeliveryTime['restaurant_delivery_thu_close_min'].''.$DeliveryTime['restaurant_delivery_thu_open_pm'];
 $DthuDateValue=$DthuStart.'-'.$DthuClose;
}
else
{
$DthuDateValue=$TableLanguage4['ResClosetimeText'];
}


if($DeliveryTime['restaurant_delivery_fri_selected']!=''){
$DfriStart=$DeliveryTime['restaurant_delivery_fri_open_hr'].':'.$DeliveryTime['restaurant_delivery_fri_open_min'].''.$DeliveryTime['restaurant_delivery_fri_open_am'];
$DfriClose=$DeliveryTime['restaurant_delivery_fri_close_hr'].':'.$DeliveryTime['restaurant_delivery_fri_close_min'].''.$DeliveryTime['restaurant_delivery_fri_open_pm'];
 $DfriDateValue=$DfriStart.'-'.$DfriClose;
}
else
{
$DfriDateValue=$TableLanguage4['ResClosetimeText'];
}


if($DeliveryTime['restaurant_delivery_sat_selected']!=''){
$DsatStart=$DeliveryTime['restaurant_delivery_sat_open_hr'].':'.$DeliveryTime['restaurant_delivery_sat_open_min'].''.$DeliveryTime['restaurant_delivery_sat_open_am'];
$DsatClose=$DeliveryTime['restaurant_delivery_sat_close_hr'].':'.$DeliveryTime['restaurant_delivery_sat_close_min'].''.$DeliveryTime['restaurant_delivery_sat_open_pm'];
 $DsatDateValue=$DsatStart.'-'.$DsatClose;
}
else
{
$DsatDateValue=$TableLanguage4['ResClosetimeText'];
}


if($DeliveryTime['restaurant_delivery_sun_selected']!=''){
$DsunStart=$DeliveryTime['restaurant_delivery_sun_open_hr'].':'.$DeliveryTime['restaurant_delivery_sun_open_min'].''.$DeliveryTime['restaurant_delivery_sun_open_am'];
$DsunClose=$DeliveryTime['restaurant_delivery_sun_close_hr'].':'.$DeliveryTime['restaurant_delivery_sun_close_min'].''.$DeliveryTime['restaurant_delivery_sun_open_pm'];
 $DsunDateValue=$DsunStart.'-'.$DsunClose;
}
else
{
$DsunDateValue=$TableLanguage4['ResClosetimeText'];
}
  ?>
  <table width="90%" class="delivery_hours">
 <tr><td width="5%" ><?php echo $TableLanguage7['sundayText'];?></td><td width="30%" ><?php echo $DsunDateValue;?></tr>
    <tr><td width="5%" ><?php echo $TableLanguage7['mondayText'];?></td><td width="30%" ><?php echo $DmonDateValue;?></tr>
      <tr><td width="5%" ><?php echo $TableLanguage7['tuesdayText'];?></td><td width="30%" ><?php echo $DtueDateValue;?></tr>
        <tr><td width="5%" ><?php echo $TableLanguage7['wednesdayText'];?></td><td width="30%" ><?php echo $DwedDateValue;?></tr>
          <tr><td width="5%" ><?php echo $TableLanguage7['thursdayText'];?></td><td width="30%" ><?php echo $DthuDateValue;?></tr>
            <tr><td width="5%" ><?php echo $TableLanguage7['fridaydayText'];?></td><td width="30%" ><?php echo $DfriDateValue;?></tr>
              <tr><td width="5%" ><?php echo $TableLanguage7['saturdayText'];?></td><td width="30%" ><?php echo $DsatDateValue;?></tr>
                    
  
  </table>
  
  <h1><?php echo $TableLanguage4['ResTakewayHoursText'];?></h1>
  <?php 
  if($takeawayTime['restaurant_takeaway_mon_selected']!=''){
$PmonStart=$takeawayTime['restaurant_takeaway_mon_open_hr'].':'.$takeawayTime['restaurant_takeaway_mon_open_min'].''.$takeawayTime['restaurant_takeaway_mon_open_am'];
$PmonClose=$takeawayTime['restaurant_takeaway_mon_close_hr'].':'.$takeawayTime['restaurant_takeaway_mon_close_min'].''.$takeawayTime['restaurant_takeaway_mon_open_pm'];
$PmonDateValue=$PmonStart.'-'.$PmonClose;
}
else
{
$PmonDateValue=$TableLanguage4['ResClosetimeText'];
}
if($takeawayTime['restaurant_takeaway_tue_selected']!=''){
$PtueStart=$takeawayTime['restaurant_takeaway_tue_open_hr'].':'.$takeawayTime['restaurant_takeaway_tue_open_min'].''.$takeawayTime['restaurant_takeaway_tue_open_am'];
$PtueClose=$takeawayTime['restaurant_takeaway_tue_close_hr'].':'.$takeawayTime['restaurant_takeaway_tue_close_min'].''.$takeawayTime['restaurant_takeaway_tue_open_pm'];
 $PtueDateValue=$PtueStart.'-'.$PtueClose;
}
else
{
$PtueDateValue=$TableLanguage4['ResClosetimeText'];
}


if($takeawayTime['restaurant_takeaway_wed_selected']!=''){
$PwedStart=$takeawayTime['restaurant_takeaway_wed_open_hr'].':'.$takeawayTime['restaurant_takeaway_wed_open_min'].''.$takeawayTime['restaurant_takeaway_wed_open_am'];
$PwedClose=$takeawayTime['restaurant_takeaway_wed_close_hr'].':'.$takeawayTime['restaurant_takeaway_wed_close_min'].''.$takeawayTime['restaurant_takeaway_wed_open_pm'];
$PwedDateValue=$PwedStart.'-'.$wedClose;
}
else
{
$PwedDateValue=$TableLanguage4['ResClosetimeText'];
}


if($takeawayTime['restaurant_takeaway_thu_selected']!=''){
$PthuStart=$takeawayTime['restaurant_takeaway_thu_open_hr'].':'.$takeawayTime['restaurant_takeaway_thu_open_min'].''.$takeawayTime['restaurant_takeaway_thu_open_am'];
$PthuClose=$takeawayTime['restaurant_takeaway_thu_close_hr'].':'.$takeawayTime['restaurant_takeaway_thu_close_min'].''.$takeawayTime['restaurant_takeaway_thu_open_pm'];
 $PthuDateValue=$PthuStart.'-'.$PthuClose;
}
else
{
$PthuDateValue=$TableLanguage4['ResClosetimeText'];
}


if($takeawayTime['restaurant_takeaway_fri_selected']!=''){
$PfriStart=$takeawayTime['restaurant_takeaway_fri_open_hr'].':'.$takeawayTime['restaurant_takeaway_fri_open_min'].''.$takeawayTime['restaurant_takeaway_fri_open_am'];
$PfriClose=$takeawayTime['restaurant_takeaway_fri_close_hr'].':'.$takeawayTime['restaurant_takeaway_fri_close_min'].''.$takeawayTime['restaurant_takeaway_fri_open_pm'];
 $PfriDateValue=$PfriStart.'-'.$PfriClose;
}
else
{
$PfriDateValue=$TableLanguage4['ResClosetimeText'];
}


if($takeawayTime['restaurant_takeaway_sat_selected']!=''){
$PsatStart=$takeawayTime['restaurant_takeaway_sat_open_hr'].':'.$takeawayTime['restaurant_takeaway_sat_open_min'].''.$takeawayTime['restaurant_takeaway_sat_open_am'];
$PsatClose=$takeawayTime['restaurant_takeaway_sat_close_hr'].':'.$takeawayTime['restaurant_takeaway_sat_close_min'].''.$takeawayTime['restaurant_takeaway_sat_open_pm'];
 $PsatDateValue=$PsatStart.'-'.$PsatClose;
}
else
{
$PsatDateValue=$TableLanguage4['ResClosetimeText'];
}


if($takeawayTime['restaurant_takeaway_sun_selected']!=''){
$PsunStart=$takeawayTime['restaurant_takeaway_sun_open_hr'].':'.$takeawayTime['restaurant_takeaway_sun_open_min'].''.$takeawayTime['restaurant_takeaway_sun_open_am'];
$PsunClose=$takeawayTime['restaurant_takeaway_sun_close_hr'].':'.$takeawayTime['restaurant_takeaway_sun_close_min'].''.$takeawayTime['restaurant_takeaway_sun_open_pm'];
 $PsunDateValue=$PsunStart.'-'.$PsunClose;
}
else
{
$PsunDateValue=$TableLanguage4['ResClosetimeText'];
}
  
   ?>
   
  <table width="90%" class="delivery_hours">
   <tr><td width="5%" ><?php echo $TableLanguage7['sundayText'];?></td><td width="30%" ><?php echo $PsunDateValue;?></tr>
    <tr><td width="5%" ><?php echo $TableLanguage7['mondayText'];?></td><td width="30%" ><?php echo $PmonDateValue;?></tr>
      <tr><td width="5%" ><?php echo $TableLanguage7['tuesdayText'];?></td><td width="30%" ><?php echo $PtueDateValue;?></tr>
        <tr><td width="5%" ><?php echo $TableLanguage7['wednesdayText'];?></td><td width="30%" ><?php echo $PwedDateValue;?></tr>
          <tr><td width="5%" ><?php echo $TableLanguage7['thursdayText'];?></td><td width="30%" ><?php echo $PthuDateValue;?></tr>
            <tr><td width="5%" ><?php echo $TableLanguage7['fridaydayText'];?></td><td width="30%" ><?php echo $PfriDateValue;?></tr>
              <tr><td width="5%" ><?php echo $TableLanguage7['saturdayText'];?></td><td width="30%" ><?php echo $PsatDateValue;?></tr>
                    
       
  
  </table>
   
 
  
  </div>
  
 
  
  </div>