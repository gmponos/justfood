<style>
select {
	border: 0 !important;
	-webkit-appearance: none;
	-moz-appearance: none;
	background: #ffffff url(images/select-arrow.png) no-repeat 95% center;
	width:270px;
	text-indent: 0.01px;
	text-overflow: "";
	color: #000;
	border-radius:7px;
	padding: 7px;
	border:1px solid #fff;
	background-size:9px;
	/*box-shadow: inset 0 0 5px rgba(000,000,000, 0.5);*/
}

</style>
<form action="insert_group_orderHome.php" method="post">
<div class="codepost" style="width:22%;">
          <h3>Select Restaurant</h3>
     <select id="restaurant_id" name="restaurant_id" style="width:200px;" required>
			<option value="" selected="selected">Select</option>
 <?php
$CuisineQuery=mysql_query("select * from tbl_restaurantAdd where status='0' order by restaurant_name");
while($CuisineData=mysql_fetch_assoc($CuisineQuery))
{ ?>
<option value="<?php echo $CuisineData['id']; ?>" ><?php echo ucwords($CuisineData['restaurant_name']); ?></option>
 <?php } ?>
	</select>         
        </div>
<div class="codepost" style="width:22%;">
          <h3>Enter Your Name</h3>
          <input type="text" name="RestaurantGroupOrderName1" style="width:200px;" required id="RestaurantGroupOrderName1" class="boxtxt" placeholder="Enter Your Name" title="" />
        </div>
        <div class="codepost" style="width:22%;">
          <h3>Enter Your Email</h3>
          <input type="email" name="RestaurantGroupOrderEmail1" style="width:200px;" id="RestaurantGroupOrderEmail1" required class="boxtxt" placeholder="Enter Your Email" />
        </div>
        <div class="codepost" style="width:22%;">
          <h3>Your Message Here</h3>
    <textarea name="RestaurantGroupOrderMessage1" id="RestaurantGroupOrderMessage1" style="width:200px;" required cols="29" rows="2"></textarea>        
        </div>
        <div class="codepostbtn">
          <input type="submit" name="Create" value="Create" class="hmsearch" />
        </div></form>
        
        
        
