<script type="text/javascript">
function getOrgTypeListRestState(str){
//alert(str);
if (str==""){
document.getElementById("restaurantCity").innerHTML="";
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
if (xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("restaurantCity").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cityFatech.php?q="+str,true);
xmlhttp.send();
}</script>
<div class="left" style="background:#fff; min-height:900px;">
  <div class="contentleft no-margin" id="dropdown">
    <h2 class="title-1"> <?php echo $TableLanguage2['SearchFilterText']; ?></h2>
    <form id="bookevent" method="get" name="bookingform" action="restaurantSearchText.php?q=0&">
      <?php if($_GET['restaurantState']!=''){ ?>
      <input type="hidden" name="restaurantState" value="<?php echo $_GET['restaurantState'];?>" />
      <?php } ?>
      <?php if($_GET['restaurant_cuisine']!=''){ ?>
      <input type="hidden" name="restaurant_cuisine" value="<?php echo $_GET['restaurant_cuisine'];?>" />
      <?php } ?>
      <?php if($_GET['rating']!=''){ ?>
      <input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>" />
      <?php } ?>
      <?php if($_GET['delivery']!=''){ ?>
      <input type="hidden" name="delivery" value="<?php echo $_GET['delivery'];?>" />
      <?php } ?>
        <?php if($_GET['AddressSearch']!=''){ ?>
      <input type="hidden" name="AddressSearch" value="<?php echo $_GET['AddressSearch'];?>" />
      <?php } ?>
       <?php if($_GET['BookaTableOrdersupport']!=''){ ?>
      <input type="hidden" name="BookaTableOrdersupport" value="<?php echo $_GET['BookaTableOrdersupport'];?>" />
      <?php } ?>
       <?php if($_GET['RestaurantPostcode']!=''){ ?>
      <input type="hidden" name="RestaurantPostcode" value="<?php echo $_GET['RestaurantPostcode'];?>" />
      <?php } ?>
      
      <style>
select {
	-moz-appearance: none;
    background: url("images/select-arrow.png") no-repeat scroll 95% center / 9px auto #FFFFFF;
    border: 1px solid #000000;
    border-radius: 5px;
    color: #000000;
    font-size: 15px;
    padding: 2px;
    text-indent: 0.01px;
    text-overflow: "";
    width: 170px;

</style>
      
      <article style="margin-bottom:7px;">
        <h1><?php echo $TableLanguage2['StateFilterText']; ?></h1>
        <select id="restaurantState" name="restaurantState" onchange="getOrgTypeListRestState(this.value)">
          <option value="" selected="selected"><?php echo ucwords($TableLanguage['SelectStateText']);?></option>
 <?php
$fgff=mysql_query("select * from tbl_state where status='0' order by stateName");
while($dffgggf=mysql_fetch_assoc($fgff))
{ ?>
<option value="<?php echo $dffgggf['id']; ?>" <?php if($dffgggf['id']==$_GET['restaurantState']){?> selected="selected" <?php } ?> ><?php echo ucwords($dffgggf['stateName']); ?></option>
 <?php } ?>
 
        </select>
      </article>
      <article style="margin-bottom:7px;">
        <h1><?php echo $TableLanguage2['CityFilterText']; ?></h1>
        <select id="restaurantCity" name="restaurantCity">
         <option value="" selected="selected"><?php echo ucwords($TableLanguage['SelectCityText']);?></option>
 <?php
 if($_GET['restaurantState']!=''){
$CityQuery=mysql_query("select * from tbl_city where status='0' and stateID='".$_GET['restaurantState']."' order by cityName");
while($CityData=mysql_fetch_assoc($CityQuery))
{ ?>
<option value="<?php echo $CityData['cityName']; ?>" <?php if($CityData['cityName']==$_GET['restaurantCity']){?> selected="selected" <?php } ?> ><?php echo ucwords($CityData['cityName']); ?></option>
 <?php } } ?>
        </select>
      </article>
      <input type="submit" name="submit" value="<?php echo ucwords($TableLanguage['FindYourFoodText']);?>" class="btndeals" style="margin-left:0px;">
    </form>
  </div>
 
  <form method="get">
    <div>
      <div class="contentleft">
        <h2 class="title-1"> <?php echo ucwords($TableLanguage['CuisinesText']);?></h2>
        <div id="picks">
          <?php 
		  function rec_array_replace($find, $replace, $array){ 
     
    if (!is_array($array)) { 
        return str_replace($find, $replace, $array);
    }
     
    $newArray = array();
     
    foreach ($array as $key => $value) {
        $newArray[$key] = rec_array_replace($value);
    }
     
    return $newArray;
}
		  $pl=rtrim($RestaurantID,'|');
		  $CuisineQuery=mysql_query("select * from tbl_cuisine where status='0'  and RestaurantCuisineName REGEXP N'(".$pl.")'  order by orderbyRestaurant asc");
 $c=1;
  while($CuisineData=mysql_fetch_assoc($CuisineQuery)){
  $c++;
  $NumrestaurantBycuisine=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd $Wheredata $seracrbyState $seracrbyCity $seracrbyCuisine $RatingValue $deliveryValueBy $open_statusValue $seracrbyRestaurantService $RestaurantDealsValue $ResIDSearch and restaurant_cuisine REGEXP N'(".$CuisineData['RestaurantCuisineName'].")'"));
    
		   if($NumrestaurantBycuisine!=0){
  ?>
      
           <?php 
		   if($_GET['restaurant_cuisine']!=''){
		    if(strstr($_GET['restaurant_cuisine'],$CuisineData['RestaurantCuisineName']))
			{
			$ValueReplac=$CuisineData['RestaurantCuisineName'];
			$Wpl=rec_array_replace($ValueReplac,'',$_GET['restaurant_cuisine']);
		    $CuisneName=rtrim($Wpl,',');
		    }
		   else
		   {
		   $CuisneName=$CuisineData['RestaurantCuisineName'].','.$_GET['restaurant_cuisine'];
		   }
		   }
		   else
		   {
		   $CuisneName=$CuisineData['RestaurantCuisineName'];
		   }
		   
		 
		   ?> 
          
           <input id="check<?php echo $c;?>" type="checkbox" name="restaurant_cuisine" <?php if(strstr($_GET['restaurant_cuisine'],$CuisineData['RestaurantCuisineName'])){?> checked="checked" <?php } ?> onclick="window.location.href='restaurantSearchText.php?q=0&restaurant_cuisine=<?php echo rtrim($CuisneName,',');?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="<?php echo ucwords($CuisineData['RestaurantCuisineName']); ?>">
         
          <label for="check<?php echo $c;?>">
          <?php
		  
		   ?>
          <p class="left_p_ml5"><?php echo ucwords($CuisineData['RestaurantCuisineName']); ?><small> (<?php echo $NumrestaurantBycuisine; ?>)</small></p>
         
          </label>
          <?php 
 } 
} ?>
        </div>
      </div>
      <div class="contentleft">
        <h2 class="title-1"><?php echo ucwords($TableLanguage['RestaurantRatingText']);?></h2>
        <div class="radio">
          <input style="margin-top:-10px;" id="f" type="radio" name="rating" value="5"  onclick="window.location.href='restaurantSearchText.php?q=0&rating=5<?php echo $restaurant_cuisineUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['rating']==5){ ?> checked="checked" <?php } ?>>
          <label for="f"> <img class="left_img_ml15" alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> </label>
          <br />
          <input id="e" type="radio" name="rating" value="4" onclick="window.location.href='restaurantSearchText.php?q=0&rating=4<?php echo $restaurant_cuisineUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['rating']==4){ ?> checked="checked" <?php } ?>>
          <label for="e"> <img class="left_img_ml15"  alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> </label>
          <br />
          <input id="a" type="radio" name="rating" value="3" onclick="window.location.href='restaurantSearchText.php?q=0&rating=3<?php echo $restaurant_cuisineUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['rating']==3){ ?> checked="checked" <?php } ?>>
          <label for="a"> <img class="left_img_ml15" alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img  alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> </label>
          <br />
          <input id="b" type="radio" name="rating" value="2" onclick="window.location.href='restaurantSearchText.php?q=0&rating=2<?php echo $restaurant_cuisineUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['rating']==2){ ?> checked="checked" <?php } ?>>
          <label for="b"> <img class="left_img_ml15" alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> </label>
          <br />
          <input id="c" type="radio" name="rating" value="1" onclick="window.location.href='restaurantSearchText.php?q=0&rating=1<?php echo $restaurant_cuisineUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['rating']==1){ ?> checked="checked" <?php } ?>>
          <label for="c"><img class="left_img_ml15" style="margin-left:-13px;" alt="star" src="images/img/Star-icon.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> <img alt="star" src="images/img/Star-icon-grey.gif"> </label>
          <br />
          <input id="d" type="radio" name="rating" value="0" onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $deliveryUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'">
          <label for="d">
          <p class="left_p_ml5"><?php echo $TableLanguage2['ResetRating']; ?></p>
          </label>
        </div>
      </div>
      <div class="contentleft">
        <h2 class="title-1"><?php echo ucwords($TableLanguage['DeliveryMinimumText']);?></h2>
        <div class="radio">
          <input id="1" type="radio" name="DeliveryMinimum" value="5"  onclick="window.location.href='restaurantSearchText.php?q=0&delivery=0-5<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['delivery']=='0-5'){ ?> checked="checked" <?php } ?>>
          <label for="1">
          <p class="left_p_ml5">&euro; 0.0-5.00</p>
          </label>
          <br />
          <input id="2" type="radio" name="DeliveryMinimum" value="10"  onclick="window.location.href='restaurantSearchText.php?q=0&delivery=5-10<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['delivery']=='5-10'){ ?> checked="checked" <?php } ?>>
          <label for="2">
          <p class="left_p_ml5">&euro; 5.00-10.00</p>
          </label>
          <input id="3" type="radio" name="DeliveryMinimum" value="11"  onclick="window.location.href='restaurantSearchText.php?q=0&delivery=10-10000<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['delivery']=='10-10000'){ ?> checked="checked" <?php } ?>>
          <label for="3">
          <p class="left_p_ml5"><?php echo $TableLanguage2['MoreThan']; ?> &euro; 10.00</p>
          </label>
          <br />
          <input id="4" type="radio" name="DeliveryMinimum" value=""  onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $open_statusUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" >
          <label for="4">
          <p class="left_p_ml5"><?php echo $TableLanguage2['ResetMinimum']; ?></p>
          </label>
        </div>
      </div>
      <div class="contentleft">
        <h2 class="title-1"><?php echo ucwords($TableLanguage1['ShowOnlyText']);?></h2>
        <?php if($_GET['open_status']=='1'){ ?>
        <input id="9" type="checkbox" name="open_status" value="1" onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['open_status']=='1'){ ?> checked="checked" <?php } ?> >
        
        <?php } else { ?>
          <input id="9" type="checkbox" name="open_status" value="1" onclick="window.location.href='restaurantSearchText.php?q=0&open_status=1<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" <?php if($_GET['open_status']=='1'){ ?> checked="checked" <?php } ?> >
        <?php } ?>
        
        <label for="9">
        <p class="left_p_ml5"><?php echo $TableLanguage2['OpenRestaurantFilterText']; ?></p>
        </label>
        
        
        <?php if($_GET['RestaurantDeals']=='1'){ ?>
        <input id="10" type="checkbox" name="RestaurantDeals" onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?>'" value="1" <?php if($_GET['RestaurantDeals']=='1'){ ?> checked="checked" <?php } ?> >
        <?php } else { ?>
         <input id="10" type="checkbox" name="RestaurantDeals" onclick="window.location.href='restaurantSearchText.php?q=0&RestaurantDeals=1<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantService;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="1" >
        <?php } ?>
        <label for="10">
        <p class="left_p_ml5"><?php echo $TableLanguage2['DealsAvailableFilterText']; ?></p>
        </small>
        </label>
        
        <?php if($_GET['RestaurantService']=='Home Delivery'){ ?>
        <input id="12" type="checkbox" name="RestaurantService" onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="Home Delivery" <?php if($_GET['RestaurantService']=='Home Delivery'){ ?> checked="checked" <?php } ?> >
        <?php } else { ?>
         <input id="12" type="checkbox" name="RestaurantService" onclick="window.location.href='restaurantSearchText.php?q=0&RestaurantService=Home Delivery<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="Home Delivery" <?php if($_GET['RestaurantService']=='Home Delivery'){ ?> checked="checked" <?php } ?> >
        <?php } ?>
        <label for="12">
        <p class="left_p_ml5"><?php echo $TableLanguage2['HomeDeliveryRestaurantFilterText']; ?></p>
        </label>
          <?php if($_GET['RestaurantService']=='Pickup'){ ?>
        <input id="13" type="checkbox" name="RestaurantService" onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="Pickup" <?php if($_GET['RestaurantService']=='Pickup'){ ?> checked="checked" <?php } ?>>
        
        <?php } else{ ?>
          <input id="13" type="checkbox" name="RestaurantService" onclick="window.location.href='restaurantSearchText.php?q=0&RestaurantService=Pickup<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="Pickup" <?php if($_GET['RestaurantService']=='Pickup'){ ?> checked="checked" <?php } ?>>
        <?php } ?>
        
        <label for="13">
        <p class="left_p_ml5"><?php echo $TableLanguage2['PickupAvailableFilterText']; ?></p>
        </label>
         <?php if($_GET['RestaurantService']=='Home Delivery,Pickup'){ ?>
         <input id="115" type="checkbox" name="RestaurantService" onclick="window.location.href='restaurantSearchText.php?q=0<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="Home Delivery,Pickup" <?php if($_GET['RestaurantService']=='Home Delivery,Pickup'){ ?> checked="checked" <?php } ?>>
         
         <?php } else { ?>
          <input id="115" type="checkbox" name="RestaurantService" onclick="window.location.href='restaurantSearchText.php?q=0&RestaurantService=Home Delivery,Pickup<?php echo $restaurant_cuisineUrl;?><?php echo $ratingUrl;?><?php echo $deliveryUrl;?><?php echo $restaurantStateUrl;?><?php echo $restaurantCityUrl;?><?php echo $RestaurantDealsUrl;?><?php echo $AddressSearchUrl;?><?php echo $BookaTableOrdersupportUrl;?><?php echo $RestaurantPostcodeUrl;?>'" value="Home Delivery,Pickup" <?php if($_GET['RestaurantService']=='Home Delivery,Pickup'){ ?> checked="checked" <?php } ?>>
         <?php } ?>
         
        <label for="115">
        <p class="left_p_ml5"><?php echo $TableLanguage2['HomeDeliveryPickupRestaurantFilterText']; ?></p>
        </label>
		
		 <label for="">
        <p class="left_p_ml5"><a href="restaurantSearchText.php?q=0">Clear all Filter</a></p>
        </label>
      </div>
      <div class="contentleft" style="text-align:center;">
        <h2 class="title-1"></h2>
        <p><?php echo ucwords($TableLanguage1['FindWhatText']);?></p>
        <?php /*?><p> looking for? </p><?php */?>
        <a href="online_food_restaurant_join.php" class="btndeals" style="text-align:center; padding:3px 6px;"><?php echo ucwords($TableLanguage1['SuggestArestaurantText']);?></a>
      </div>
    </div>
  </form>
</div>
