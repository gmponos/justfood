<div class="mid_product">
 <div class="top_product" >
 <div class="product_image"><img src="control/restaurantlogoimg/small/<?php echo $resdata['restaurant_Logo'];?>" width="90px" height="90px" /> </div>
 <div class="product_name">
 <h1><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></h1>

 <h3><?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?></h3>
 <h2 style="float:left; margin-right:5px; min-height:80px;"><?php echo ucwords($TableLanguage['CuisinesText']);?> :</h2>
 <h3 style="margin-top:6px; margin-left:5px;"> 
 <?php $cuisin=explode(',',$resdata['restaurant_cuisine']);
			$ggphoto='';
			foreach($cuisin as $c)
			{
			$ggphoto.=$c.', ';
			}
			echo rtrim($ggphoto,', ');
			?>
</h3>
</div>
 <div class="product_favorites">
 
                 <h2>
                 <p style="margin-bottom:8px;"><strong><?php echo $TableLanguage4['ResAverageUserRating'];?></strong></p>
                 <a href="">
                          <?php if($AverageRatingCode==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($AverageRatingCode==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($AverageRatingCode==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($AverageRatingCode==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($AverageRatingCode==1){?>
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
						  
                         </a></h2>

 </div>
 <script  type="text/javascript"  language="javascript">
function getOrgTypeListAdFavourite(str){
if (str=="")
{
document.getElementById("displayFav").innerHTML="";
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
document.getElementById("displayFav").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","displayFavData.php?q="+str+"&rID=<?php echo $resID[0];?>",true);
xmlhttp.send();
}


function getOrgTypeListAdFavouriteDelete(str){
if (str=="")
{
document.getElementById("displayFav").innerHTML="";
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
document.getElementById("displayFav").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","displayFavDataDelete.php?q="+str,true);
xmlhttp.send();
}

</script>
 <div class="product_delivery_time">
 <h2 style="margin-bottom:0px;"><?php echo $TableLanguage4['ResPickyourOrderText'];?> </h2>
 <h2 style="margin-top:20px; color:#D80E0F;"><?php echo stripslashes(ucwords($resdata['restaurant_avarage_deliveryTime'])); ?></h2>
 </div>
 <div class="product_minorder">
 <h2 style="margin-bottom:0px;"><?php echo $TableLanguage4['ResMinDeliveryOrderText'];?></h2>
 <h2 style="margin-top:20px;"><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format(ucwords($resdata['restaurant_default_min_order']),2); ?>  </h2>
 </div>
 <div class="product_delivery_cast">
 <h2 style="margin-bottom:0px;"><?php echo ucwords($TableLanguage4['ResMinDeliveryFee']);?></h2>
 <h2 style="margin-top:20px;"><?php 
 if($resdata['restaurant_avarage_deliveryCost']=='Free' || $resdata['restaurant_avarage_deliveryCost']=='free')
 {
 echo ucwords($resdata['restaurant_avarage_deliveryCost']); 
 }
 else
 {
 echo number_format($resdata['restaurant_avarage_deliveryCost'],2); 
 }
 ?>  </h2>
 </div>
 <div class="product_delivery_socials">
  
                          <p>
                          <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1439333152988242&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="https://www.facebook.com/pages/Mega-Menus/252052911617336" data-type="button_count"></div>
                          <!--<a href="#"><img src="images/fblike.png" height="25px" /></a>--></p>
                         
                         <a class="email" href="restaurantOwnerEmailSend.php?restaurants=<?php echo $resdata['id'];?>-<?php echo urldecode(trim($resdata['restaurantCity']));?>-<?php echo urldecode(trim($resdata['restaurant_name']));?>.html"> <img style=" margin-top:5px;" src="images/mail.png" title="<?php echo ucwords($TableLanguage4['ResEmailRestaurant']);?>" width="30" height="20" /><p><?php echo $TableLanguage4['ResEmailRestaurant'];?></p></a>
                            <div id="displayFav">
						   <?php if($_SESSION['justfoodsUserID']!=''){ 
						   $FavQD=mysql_num_rows(mysql_query("select * from favorite where userid='".$_SESSION['justfoodsUserID']."' and hotel_id='".$resdata['id']."'"));							if($FavQD>0){
						   $DataFav=mysql_fetch_assoc(mysql_query("select * from favorite where userid='".$_SESSION['justfoodsUserID']."' and hotel_id='".$resdata['id']."'"));
						   ?>
                           <a style="cursor:pointer;" onClick="getOrgTypeListAdFavouriteDelete('<?php echo $DataFav['id'];?>')">
                           <img src="images/fav.png" title="<?php echo $TableLanguage7['FavouriteDoneText'];?>" height="30" width="30" />
                           <p>Already a Favorite !</p></a>
                           <?php } else { ?>
                           <a style="cursor:pointer;"  onclick="getOrgTypeListAdFavourite('<?php echo $_SESSION['justfoodsUserID'];?>')">
                            <img src="images/add to favorite.png" title="<?php echo $TableLanguage4['ResAddtoFavouriteText'];?>" height="30" width="30" />
                           <p ><?php echo $TableLanguage4['ResAddtoFavouriteText'];?></p></a>
                           <?php } ?>
                           <?php } else { ?>
                           <a href="userLogin.php?fav=1&restaurants=<?php echo $resdata['id'];?>-<?php echo urldecode(trim($resdata['restaurantCity']));?>-<?php echo urldecode(trim($resdata['restaurant_name']));?>.html">
                             <img src="images/add to favorite.png" title="<?php echo $TableLanguage4['ResAddtoFavouriteText'];?>" height="30" width="30" />
                           <p><?php echo $TableLanguage4['ResAddtoFavouriteText'];?></p> </a> <?php } ?>
                           </div>

 </div>
 <div style="clear:both;"></div>
 </div>
 
 <div class="bottom_product">
 <div class="days"><h2><?php echo $TableLanguage7['sundayText'];?></h2><h2><?php echo $sunDateValue1;?></h2></div>
 <div class="days"><h2><?php echo $TableLanguage7['mondayText'];?></h2><h2><?php echo $monDateValue1;?></h2></div>
 <div class="days"><h2><?php echo $TableLanguage7['tuesdayText'];?></h2><h2><?php echo $tueDateValue1;?></h2></div>
 <div class="days"><h2><?php echo $TableLanguage7['wednesdayText'];?></h2><h2><?php echo $wedDateValue1;?></h2></div>
 <div class="days"><h2><?php echo $TableLanguage7['thursdayText'];?></h2><h2><?php echo $thuDateValue1;?></h2></div>
 <div class="days"><h2><?php echo $TableLanguage7['fridaydayText'];?></h2><h2><?php echo $friDateValue1;?></h2></div>
 <div class="days"><h2><?php echo $TableLanguage7['saturdayText'];?></h2><h2><?php echo $satDateValue1;?></h2></div>
 </div>
 </div>