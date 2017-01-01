		<script type="text/javascript" charset="utf-8" language="javascript" src="tables/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="tables/DT_bootstrap.js"></script>
              <link rel="stylesheet" href="css/colorbox.css" />
		<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
       
		<script>
			$(document).ready(function(){
				
				$(".verifyaddress1").colorbox({iframe:true, width:"45%", height:"75%"});
				
				
			});			
			
			
		</script>
<div class="table_container">
<?php 
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
include('generateTimeCalculation.php');
$restaurant_cuisinestring = $_POST['restaurant_cuisine'];
$restaurant_cuisine = explode(',', $restaurant_cuisinestring);

$RestaurantServiceHstring = $_POST['RestaurantServiceH'];
$RestaurantServiceH = explode(',', $RestaurantServiceHstring);


$RestaurantServicePstring = $_POST['RestaurantServiceP'];
$RestaurantServiceP = explode(',', $RestaurantServicePstring);

$RestaurantDealsstring = $_POST['RestaurantDeals'];
$RestaurantDeals = explode(',', $RestaurantDealsstring);

$RestaurantServiceHstring = '';
foreach($RestaurantServiceH as $cname) {
if($cname !='')
$RestaurantServiceHstring .= ($RestaurantServiceHstring == '' ? '' : ',')."'".$cname."'";
}

$RestaurantServicePstring = '';
foreach($RestaurantServiceP as $Pcname) {
if($Pcname !='')
$RestaurantServicePstring .= ($RestaurantServicePstring == '' ? '' : ',')."'".$Pcname."'";
}

$RestaurantDealsstring = '';
foreach($RestaurantDeals as $Dcname) {
if($Dcname !='')
$RestaurantDealsstring .= ($RestaurantDealsstring == '' ? '' : ',')."'".$Dcname."'";
}

$restaurant_cuisinestring = '';
foreach($restaurant_cuisine as $czip) {
    if($czip !='')
        $restaurant_cuisinestring .= ($restaurant_cuisinestring == '' ? '' : ',')."".$czip."";
}

//Rebuild Query 

$where  = '';

if($restaurant_cuisinestring != '') {
   $where .= " and restaurant_cuisine Like '%".$restaurant_cuisinestring."%'";
}


if($RestaurantServiceHstring != '') {
   $where .= " and restaurant_service IN($RestaurantServiceHstring)";
}


if($RestaurantServicePstring != '') {
   $where .= " and restaurant_service IN($RestaurantServicePstring)";
}

if($RestaurantDealsstring != '') {
   $where .= " and RestaurantDeals IN($RestaurantDealsstring)";
}
//

if($_POST['RestaurantPostcode']!='')
{
$tbalePostcode=",tbl_restaurantDeliveryArea";
$RestaurantPostcodeValue=" and restaurantCity='".$_POST['restaurantCity']."' and tbl_restaurantDeliveryArea.restaurant_delivery_area='".$_POST['RestaurantPostcode']."'";
}			
if($_POST['rating']!='')
{
$RatingValue=" and rating='".$_POST['rating']."'";
}
if($_POST['delivery']!='')
{
$deliveryValue=explode('-',$_POST['delivery']);
$deliveryValue=" and restaurant_avarage_deliveryCost >$deliveryValue[0] and restaurant_avarage_deliveryCost< $deliveryValue[1]";
}

$Wheredata=" where status='0' ";
if($_POST['restaurantState']!='' && $_POST['restaurantCity']!='')
{
$Wheredata .=" and restaurantState='".$_POST['restaurantState']."' and restaurantCity='".$_POST['restaurantCity']."' $where  $RatingValue $deliveryValue ";
}

if($_POST['restaurantState']!='')
{
$Wheredata .=" and restaurantState='".$_POST['restaurantState']."' $where  $RatingValue $deliveryValue";
}
$MAINSQL="select * from tbl_restaurantAdd $tbalePostcode $Wheredata  $where  $RatingValue $deliveryValue $RestaurantPostcodeValue group by restaurant_name ";
//echo $MAINSQL;
$result = mysql_query($MAINSQL);
$numrows=mysql_num_rows($result); ?>
<?php 
 if($_GET['restaurantState']!='')
  {
  $mplh=mysql_fetch_assoc(mysql_query("select * from tbl_state where id='".$_POST['restaurantState']."'"));
  $StateName=$mplh['stateName'];
  }
if($_POST['restaurantState']!='' && $_POST['restaurantCity']!='' && $_POST['restaurant_cuisine']!='')
{
$Bracumb=$_POST['restaurant_cuisine'].','.$_POST['restaurantCity'].','.$StateName.'';
}
else if($_POST['restaurantState']!='' && $_POST['restaurantCity']!='')
{
$Bracumb=$StateName.','.$_POST['restaurantCity'];
}
else if($_POST['restaurantCity']!='' && $_POST['RestaurantPostcode']!='')
{
$Bracumb=$_POST['RestaurantPostcode'].','.$_POST['restaurantCity'];
}
else if($_POST['restaurantState']!='' && $_POST['restaurant_cuisine']!='')
{
$Bracumb=$_POST['restaurant_cuisine'].','.$StateName;
}
else if($_POST['restaurantState']!='')
{
$Bracumb=$StateName;
}
else if($_POST['restaurant_cuisine']!='')
{
$Bracumb=$_POST['restaurant_cuisine'];
}
else
{
 $Bracumb="Home Delivery and Pickup Restaurant";
}
?>
	  
      <div class="list-h">
                  <h2 style="padding:0 0 1px;"><span style="color:#000; font-weight:bold;">&nbsp;&nbsp;<?php echo $numrows;?> Restaurants</span> serving </h2>
                  <h2 style="padding:0 0 1px;"> <span> 
              
                  
                 <?php echo  $Bracumb;?></span> </h2><h2><a class="verifyaddress1" href="addressverification.php" style="color:#777;"><?php echo ucwords($TableLanguage1['ChangeAddressText']);?> </a></h2>
                  
                </div>
                <table  cellpadding="0"  cellspacing="0" border="0" class="table table-striped " <?php if($numrows>0){?>id="example" <?php } ?>>
	<thead>
		<tr style="background:url(images/img/results-stripe-bg.png) repeat-x top; height:40px; font-size:12px; font-family:Georgia; font-style:italic;">
			<th style="max-width:564px; min-width:364px;"><?php echo ucwords($TableLanguage1['RestaurantHeadingText']);?></th>
			<!--<th style="width:80px;">Price</th>-->
			<th style="max-width:110px; min-width:107px;"><?php echo ucwords($TableLanguage1['GradeText']);?></th>
			<th style="max-width:110px; min-width:110px;"><?php echo ucwords($TableLanguage1['DeliveryTimeText']);?></th>
			<th style="max-width:100px; min-width:100px;"><?php echo ucwords($TableLanguage1['MinOrderText']);?></th>
            <th style="width:55px;"><?php echo ucwords($TableLanguage1['DealsText']);?></th>
			<th style="max-width:110px; margin-right:1px; min-width:110px;"></th>
		</tr>
	</thead>
	<tbody >
    <?php if($numrows>0){$i=1;
	while($data=mysql_fetch_assoc($result)){ 
    ?>
    <tr style="border:none;">
			<td><div class="rest_img">
          
            <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html" onClick="return confirm('<?php echo ucwords($TableLanguage1['PreorderOrderAlert']);?>');">
            <?php if($data['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>" style="width:80px; height:80px;"  alt="<?php echo $data['restaurant_name'];?>" onclick=""> 
            <?php } else {?>
            <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" /> 
            <?php }?>
            </a>
            <?php } else if($close==1) {?>
           
           
              <a  href="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html" onClick="return confirm('<?php echo ucwords($TableLanguage1['closeOrderAlert']);?>');">
            <?php if($data['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>" style="width:80px; height:80px;"  alt="<?php echo $data['restaurant_name'];?>" onclick=""> 
            <?php } else {?>
            <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" /> 
            <?php }?>
            </a>
         
            <?php } else{?>
            
             
            <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html">
            <?php if($data['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>" style="width:80px; height:80px;"  alt="<?php echo $data['restaurant_name'];?>" onclick=""> 
            <?php } else {?>
            <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" /> 
            <?php }?>
            </a>
            
            <?php } ?>
            </div>
            <div class="rest_name">
              <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html" onClick="return confirm('<?php echo ucwords($TableLanguage1['PreorderOrderAlert']);?>');">
            <span class="redhead"><font><font> <?php echo stripslashes(ucwords($data['restaurant_name']));?></font></font></span></a>
             <?php } else if($close==1) {?>
               <a href="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html" onClick="return confirm('<?php echo ucwords($TableLanguage1['closeOrderAlert']);?>');">
            <span class="redhead"><font><font> <?php echo stripslashes(ucwords($data['restaurant_name']));?></font></font></span></a>
             
                <?php } else {?>
                  <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html">
            <span class="redhead"><font><font> <?php echo stripslashes(ucwords($data['restaurant_name']));?></font></font></span></a>
                
                <?php } ?>
            
            <h3><?php $cuisin=explode(',',$data['restaurant_cuisine']);
			$ggphoto='';
			foreach($cuisin as $c)
			{
			$ggphoto.=$c.' ,';
			}
			echo rtrim($ggphoto,',');
			?></h3>
             <?php /*?><?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?><?php */?>
            </div>
         <?php /*?> <div class="rest_deals">
             <?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?>
            
            </div><?php */?>
            </td>
			
			<td><div class="rest_grade">
            <a href="">
                          <?php if($data['rating']==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($data['rating']==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($data['rating']==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($data['rating']==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($data['rating']==1){?>
                           <img src="images/img/Star-icon.gif">
                           <img src="images/img/Star-icon-grey.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <?php } else { ?>
						    <img src="images/img/Star-icon-grey.gif">
                           <img src="images/img/Star-icon-grey.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <?php } ?>
						  
                         </a>
                              <a href=""><font><font style="font-size:13px;"><?php echo $rnm=mysql_num_rows(mysql_query("SELECT * FROM  `tbl_restaurantReview` where RestaurantReviewId='".$data['id']."' ")); ?> reviews</font></font></a>
                              
   <?php  
   $DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$data['id']."'"));
   $takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$data['id']."'"));
   include('TimeTable.php');
    ?>
    <?php if($close==1){ ?>
                              
                              <div class="showtime" >
                          <a class="tooltips"  href="#"><?php echo ucwords($TableLanguage1['ViewTimingText']);?>
							<span><h3>Delivery Hours</h3>
                            <div class="delivery" >
                            <div class="dleft">
                            <div class="time_container">
                            <div class="day">Sun</div>
                            <div class="time"> <?php 
							if($DeliveryTime['restaurant_delivery_sun_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sun_open_hr'].':'.$DeliveryTime['restaurant_delivery_sun_open_min'].''.$DeliveryTime['restaurant_delivery_sun_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sun_close_hr'].':'.$DeliveryTime['restaurant_delivery_sun_close_min'].''.$DeliveryTime['restaurant_delivery_sun_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?></div>
                            </div>
                            <div class="time_container">
                            <div class="day">Mon</div>
                            <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_mon_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_mon_open_hr'].':'.$DeliveryTime['restaurant_delivery_mon_open_min'].''.$DeliveryTime['restaurant_delivery_mon_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_mon_close_hr'].':'.$DeliveryTime['restaurant_delivery_mon_close_min'].''.$DeliveryTime['restaurant_delivery_mon_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?>
                            </div>
                            </div>
                            <div class="time_container">
                            <div class="day">Tue</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_tue_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_tue_open_hr'].':'.$DeliveryTime['restaurant_delivery_tue_open_min'].''.$DeliveryTime['restaurant_delivery_tue_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_tue_close_hr'].':'.$DeliveryTime['restaurant_delivery_tue_close_min'].''.$DeliveryTime['restaurant_delivery_tue_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                            <div class="time_container">
                            <div class="day">Wed</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_wed_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_wed_open_hr'].':'.$DeliveryTime['restaurant_delivery_wed_open_min'].''.$DeliveryTime['restaurant_delivery_wed_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_wed_close_hr'].':'.$DeliveryTime['restaurant_delivery_wed_close_min'].''.$DeliveryTime['restaurant_delivery_wed_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                          
                            </div>
                            <div class="dright">
                            <div class="time_container">
                            <div class="day">Thu</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_thu_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_thu_open_hr'].':'.$DeliveryTime['restaurant_delivery_thu_open_min'].''.$DeliveryTime['restaurant_delivery_thu_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_thu_close_hr'].':'.$DeliveryTime['restaurant_delivery_thu_close_min'].''.$DeliveryTime['restaurant_delivery_thu_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                             <div class="time_container">
                            <div class="day">Fri</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_fri_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_fri_open_hr'].':'.$DeliveryTime['restaurant_delivery_fri_open_min'].''.$DeliveryTime['restaurant_delivery_fri_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_fri_close_hr'].':'.$DeliveryTime['restaurant_delivery_fri_close_min'].''.$DeliveryTime['restaurant_delivery_fri_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                             <div class="time_container">
                            <div class="day">Sat</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_sat_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sat_open_hr'].':'.$DeliveryTime['restaurant_delivery_sat_open_min'].''.$DeliveryTime['restaurant_delivery_sat_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sat_close_hr'].':'.$DeliveryTime['restaurant_delivery_sat_close_min'].''.$DeliveryTime['restaurant_delivery_sat_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                            </div>
                            </div>
                            </span></a>
                            </div>
                            <?php } ?>
                             </div>
                              </td>
			<td><div class="rest_delivery"><span class="b18b"><font><font><?php echo stripslashes(ucwords($data['restaurant_avarage_deliveryTime']));?> </font></font></span>
            
            
             
                            </div>
                            
            </td>
			<td><div class="rest_min"><span class="b18b"><font><font><?php echo $data['restaurant_default_min_order'];?> €</font></font></span>
            
            </div></td>
            <td><div class="rest_deals">
             <?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?>
            </div></td>
            <td valign="bottom"> 
            
            <div class="rest_order">
            <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <div class="btn_closed" style="background-color: rgb(255, 215, 0);" ><a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html" onClick="return confirm('<?php echo ucwords($TableLanguage1['PreorderOrderAlert']);?>');"><?php echo $OrderButton;?></a></div>
            <?php } else if($close==1) {?>
            <div class="btn_closed" ><a href="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html" onClick="return confirm('<?php echo ucwords($TableLanguage1['closeOrderAlert']);?>');"><?php echo $TimingStatus;?></a></div>
            <?php } else{?>
            <div class="btn_order"> 
             <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>-<?php echo urlencode(trim($data['restaurant_cuisine']));?>.html"><?php echo $OrderButton;?></a>
            </div>
            <?php } ?>
            </div>
            </td>
           
		</tr>
         <?php } } else { ?>
                                     <tr><td colspan="6">
                                    <div style="padding:20px; margin-bottom:100px; font-size:18px; color:#F40000; font-weight:bold;">Sorry ! No Restaurant has been found related this keywords . try again !!! </div>
                                   </td></tr>
                                    
                                    <?php } ?>
    
        
       
    </tbody>
    </table>
    
                </div>