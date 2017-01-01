 <input type="text" name="category" id="category" value="" />
 <ul id="categorymenu" class="mcdropdown_menu">
 <?php  $MenuCategoryQuery1=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."' order by menuPosition asc");
 $i=1;
                        while($MenuCategoryData1=mysql_fetch_assoc($MenuCategoryQuery1)){
			$MenuItemQuery=mysql_query("select * from tbl_restaurantMainMenuItem where RestaurantCategoryID='".$MenuCategoryData1['id']."' and RestaurantPizzaID='".$resdata['id']."' and offeravailableinsert='0' order by itemPosition asc");             
					while($MenuItemData=mysql_fetch_assoc($MenuItemQuery)){  ?>
				<li rel="<?php echo $i;?>" class="iframe">
                <?php if($_GET['close']==1){ ?>
				<a  class="close"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></a>
                <?php } else { ?>
                <a href="popup.php?restaurantID=<?php echo $resID[0]; ?>&menuID=<?php echo $MenuItemData['id']; ?>&restaurants=<?php echo $_GET['restaurants']; ?>" class="iframe"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></a>
                <?php } ?>
                </li>
                <?php 
				$i++;
				} } ?>
			</ul>
               