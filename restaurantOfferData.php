<?php $FoodDealsQuery=mysql_query("select * from tbl_foodDeals where status='0' and restaurant_id='".$resID[0]."'");
if(mysql_num_rows($FoodDealsQuery)>0){ ?>

<table width="97%" style="padding:14px; font-size:16px; color:#000; font-weight:bold;">
  <tr>
    <td align="left"><h3  style="color:#000; margin-bottom:5px; margin-top:15px;"><?php echo ucwords($TableLanguage4['ResOnlineDealsText']);?></h3></td>
  </tr>
</table>
<div class="offers">
  
  <?php 

	while($DataFoodDeals=mysql_fetch_assoc($FoodDealsQuery)){
						  ?>
  <figure class="gallery-item">
    <div class="offers"><a href="" class="iframe3 txtcolor cboxElement">
      <h2><?php echo $DataFoodDeals['foodDeals_name'];?></h2>
      <p><?php echo $DataFoodDeals['foodDeals_description'];?></p>
      <span class="offer-price"><?php echo $DataFoodDeals['foodDeals_price'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span> </a></div>
    <figcaption class="img-title" style="display: none;">
      <div class="button55"><a href="FoodDealsPopup.php?restaurant_id=<?php echo $resID[0];?>&FoodDealsID=<?php echo $DataFoodDeals['id'];?>&restaurants=<?php echo $_GET['restaurants']; ?>" class="iframe3">Get a Deal</a></div>
      <img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $DataFoodDeals['foodDeals_image'];?>" width="169" height="79"> </figcaption>
  </figure>
  <?php }  ?>
</div>
<?php } ?>
<script type="text/javascript" src="js/prestosavings.js"></script>
<script>$(document).ready( function() {
    $('.gallery-item').hover( function() {
        $(this).find('.img-title').fadeIn(300);
    }, function() {
        $(this).find('.img-title').fadeOut(100);
    });	
});</script>
