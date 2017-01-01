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
<script type="text/javascript" src="jquery.autocomplete.min.js"></script>
<script type="application/javascript">
$(function(){
  var currencies = [
  <?php 
$ProductQueryStata =mysql_query("select * from tbl_city where status='0' order by cityName asc ");
  while($businessTypeData=mysql_fetch_assoc($ProductQueryStata)){
   ?>
    { value: "<?php echo $businessTypeData['cityName'];?>", data: "<?php echo $businessTypeData['cityName'];?>" },
   <?php } ?>
 ];

   // setup autocomplete function pulling from currencies[] array
  $('#restaurantCity').autocomplete({
    lookup: currencies,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Select City:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
    }
  });
  
  

});
</script>
<link href="style.css" rel="stylesheet" type="text/css">
<form action="restaurantSearchText.php" method="get">

<div class="codepost">
          <h3>Enter Zip Code</h3>
          <input type="text" name="RestaurantPostcode" id="RestaurantPostcode" class="boxtxt" placeholder="e.g. SW6 6LG" title="e.g. SW6 6LG" />
        </div>
        <div class="codepost">
          <h3>Enter Address Here</h3>
          <input type="text" name="restaurantCity" id="restaurantCity" class="boxtxt" placeholder="Type location name" />
        </div>
        <div class="codepost">
          <h3>Select Cusine Type</h3>
     <select id="restaurant_cuisine" name="restaurant_cuisine">
			<option value="" selected="selected"><?php echo ucwords($TableLanguage['SelectCuisineText']);?></option>
 <?php
$CuisineQuery=mysql_query("select * from tbl_cuisine where status='0' order by RestaurantCuisineName");
while($CuisineData=mysql_fetch_assoc($CuisineQuery))
{ ?>
<option value="<?php echo $CuisineData['RestaurantCuisineName']; ?>" <?php if($CuisineData['RestaurantCuisineName']==$_GET['restaurant_cuisine']){?> selected="selected" <?php } ?> ><?php echo ucwords($CuisineData['RestaurantCuisineName']); ?></option>
 <?php } ?>
	</select>         
        </div>
        <div class="codepostbtn">
          <input type="submit" name="Search" value="SEARCH" class="hmsearch" />
        </div>
</form>        
        
        
