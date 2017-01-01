<link rel="stylesheet" href="css/colorbox.css" />
<div class="brands_container">
      <div class="dealscontainer_left">
       <a id="prev2" class="prev" href="#"><img src="images/prevarrow.png" /></a></div>
      <div class="topbrandscontainer responsive">     
      <ul id="foo4">
      <?php $CuisineQuery=mysql_query("select * from tbl_cuisine where status='0' and HomeDisplay='1' order by RestaurantCuisineName asc");
while($CuisineData=mysql_fetch_assoc($CuisineQuery)){
 ?>
				<li> <a class="verifyaddress" href="addressverification.php?restaurant_cuisine=<?php echo $CuisineData['RestaurantCuisineName'];?>">
                <div class="topbrandimage">
                <?php if($CuisineData['RestaurantCuisineImg']!=''){ ?>
                <img  alt="<?php echo ucwords($CuisineData['RestaurantCuisineName']); ?>" title="<?php echo ucwords($CuisineData['RestaurantCuisineName']); ?>" src="control/cuisineImg/<?php echo $CuisineData['RestaurantCuisineImg'];?>"  style="position: relative;zoom: 1;padding: 2px;background: #ffffff;-webkit-border-radius: 1px;-moz-border-radius: 2px;border-radius: 8px;-webkit-box-shadow: 0px 1px 1px rgba(0,0,0, .2);-moz-box-shadow: 0px 1px 1px rgba(0,0,0, .2);box-shadow: 0px 1px 1px rgba(0,0,0, .2);" />
                <?php } else{?>
                 <img alt="<?php echo ucwords($CuisineData['RestaurantCuisineName']); ?>" title="<?php echo ucwords($CuisineData['RestaurantCuisineName']); ?>" src="images/b1.png" />
                <?php } ?>
                </div></a>
                <a class="verifyaddress" href="addressverification.php?restaurant_cuisine=<?php echo $CuisineData['RestaurantCuisineName'];?>"><?php echo ucwords($CuisineData['RestaurantCuisineName']); ?></a>
                <?php /*?><a href="restaurantSearch.php?restaurant_cuisine=<?php echo $CuisineData['RestaurantCuisineName'];?>"><?php echo ucwords($CuisineData['RestaurantCuisineName']); ?></a><?php */?>
                </li>
            <?php } ?>
				
			</ul>
            
				
      </div>
      <div class="dealscontainer_left">
      <a id="next2" class="next" href="#"><img src="images/forarrow.png" /></a></div>
    
      </div>
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		
		<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
       
		<script>
			$(document).ready(function(){
				
					$(".verifyaddress").colorbox({iframe:true, width:"75%", height:"85%"});
				
				
			});			
			
			
		</script>