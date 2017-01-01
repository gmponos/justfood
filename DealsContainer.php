<?php $RestaurantOfferQuery=mysql_query("select * from tbl_restaurantOffer where status='0' group by restaurant_id order by created_date desc");
				if(mysql_num_rows($RestaurantOfferQuery)>0){
				 ?>

<div class="dealscontainer">
  <div class="dealscontainer_left"> <a id="prev3" class="prev" href="#"><img src="images/prevarrow.png" /></a></div>
  <div class="deals">
    <ul id="foo5">
      <li>
        <?php 
   $i=1;
while($RestaurantOffer=mysql_fetch_assoc($RestaurantOfferQuery)){
 $StData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$RestaurantOffer['restaurant_id']."'"));
 
?>
 <?php  
    ?>
    
        <div class="getdeal">
          <div class="images">
           <?php if($close==1 && $StData['preOrdersupport']==1) {?>
            <a  class="confirm" style="cursor:pointer;" >  <?php if($StData['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $StData['restaurant_Logo'];?>" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>-<?php echo urlencode(trim($StData['restaurant_cuisine']));?>.html"  class="img_demo5"   />
            <?php } else {?>
            <img src="images/noimage.jpg" class="img_demo5" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>-<?php echo urlencode(trim($StData['restaurant_cuisine']));?>.html" />
            <?php } ?></a>
               <?php } else if($close==1) {?>
                 <a  class="close" style="cursor:pointer;">  <?php if($StData['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $StData['restaurant_Logo'];?>"  class="img_demo5"  id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>-<?php echo urlencode(trim($StData['restaurant_cuisine']));?>.html" />
            <?php } else {?>
            <img src="images/noimage.jpg" class="img_demo5" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>-<?php echo urlencode(trim($StData['restaurant_cuisine']));?>.html" />
            <?php } ?></a>
               <?php } else{?>
               
                 <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>.html" >  <?php if($StData['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $StData['restaurant_Logo'];?>"  class="img_demo5"  />
            <?php } else {?>
            <img src="images/noimage.jpg" class="img_demo5" />
            <?php } ?></a>
                <?php } ?>
          
          </div>
          <div class="deal_content">
            <div class="deal_content_name">
              <h5><?php echo ucwords($StData['restaurant_name']);?></h5>
              <div style="clear:both;"></div>
            </div>
            <p style="margin-top:0px;"><strong>
              <?php if($RestaurantOffer['RestaurantoffrType']=='p'){ ?>
              <?php echo number_format($RestaurantOffer['RestaurantOfferPrice'],2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
              <?php } ?>
              <?php if($RestaurantOffer['RestaurantoffrType']=='pr'){ ?>
              <?php echo $RestaurantOffer['RestaurantOfferPrice']; ?>%
              <?php } ?>
              off on</strong> <strong>minimum order</strong> <strong>of  <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php echo number_format(ucwords($StData['restaurant_default_min_order']),2); ?></strong> </p>
            <p>
    <script>
var message = '<strong><?php echo ucwords($TableLanguage1['PreorderOrderAlert']);?></strong>';

$('.confirm').click(function(e) {
	e.preventDefault();
  $.modal.confirm(message, function(val){
  var url=e.target.id;
    if(val == true) 
	{
	window.location.href=url;
	}
});
});

var message = '<strong><?php echo ucwords($TableLanguage1['closeOrderAlert']);?></strong>';

$('.close').click(function(e) {
	e.preventDefault();
  $.modal.confirm(message, function(val){
  var url=e.target.id;
    if(val == true) 
	{
	window.location.href=url;
	}
});
});

</script>
              <?php if($close==1 && $StData['preOrdersupport']==1) {?>
            <a  class="confirm btn" style="cursor:pointer;" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>-<?php echo urlencode(trim($StData['restaurant_cuisine']));?>.html">Get the Deal</a>
               <?php } else if($close==1) {?>
                 <a  class="close btn" style="cursor:pointer;" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>-<?php echo urlencode(trim($StData['restaurant_cuisine']));?>.html">Get the Deal</a>
               <?php } else{?>
               
                 <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($StData['id']));?>-<?php echo urlencode(trim($StData['restaurantCity']));?>-<?php echo urlencode(trim($StData['restaurant_name']));?>.html" class="btn">Get the Deal</a>
                <?php } ?>
            </p>
            <div style="clear:both"></div>
          </div>
          <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
        <?php if($i==2) { echo "</li><li>"; $i= 0; } ?>
        <?php 

			$i++;

			} 

	

	 ?>
    </ul>
  </div>
  <div class="dealscontainer_left"> <a id="next3" class="next" href="#"><img src="images/forarrow.png" /></a></div>
</div>
<?php } ?>
