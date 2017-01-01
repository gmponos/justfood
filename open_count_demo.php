  <?php 
  date_default_timezone_set('US/Eastern');
  $OPenRestaurant=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where open_status='1' order by id desc"));
   $CloseRestaurant=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where open_status='0' order by id desc"));
  ?>
  <div class="center">
  <div class="demoordercount">
   <div class="cdemo">
   <div class="cdemoimg"><img src="images/democomputer.png" /></div>
   <div class="cdemotxt"><h1>New to online ordering?</h1>
   <h2>Try ordering from our <a href="online_food_restaurant_join.php" target="_blank"  style="text-decoration:none; color:#000000;" ><strong>DEMO</strong> restaurant</a></h2>
   <a href="online_food_restaurant_join.php" target="_blank" class="btnorder"  style="text-decoration:none;" >Place Demo Order</a>
   </div>   
   </div>
   <div class="opencount">
   <div class="rowopencount">
   <h3>RESTAURANTS  at <?php echo  date("m/d/Y"); ?> <?php echo date('h:i a', time());?></h3>
   </div>
   <div class="opencountopen">
   <div class="open"><?php echo $OPenRestaurant;?></div>
   <h3>OPEN</h3>
   </div>
   <div class="opencountclose">
   <div class="close"><?php echo $CloseRestaurant;?></div>
   <h3>CLOSED</h3>
   </div>
   </div>
   </div>
</div>