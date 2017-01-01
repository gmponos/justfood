<script type="text/javascript" src="js/cycle-plugin.js"></script>
<script type="text/javascript">
	$(document).ready(function(){	
	$('#fade').cycle();
	});
</script>
<?php $EvenTda=mysql_query("select * from tbl_restaurantEvent where RestaurantEventID='".$resdata['id']."' order by id desc"); 
if(mysql_num_rows($EvenTda)>0){
while($EveData=mysql_fetch_assoc($EvenTda))
{
$imh=explode(',',$EveData['RestaurantEventImgThumb']);
?>
<div class="voucher_container">
  <div class="v_image">
    <div id="fade" style=""> 
    <?php foreach($imh as $v){
	if($v!=''){
	 ?>
    <img src="control/EventImg/thumb/<?php echo $v; ?>" width="250" height="100" />
    <?php } }?>
     </div>
  </div>
  <div class="v_cusine_name">
    <div class="name_price">
      <h2 class="v_name"><?php echo stripslashes(ucwords($EveData['RestaurantEventName'])); ?></h2>
      
    </div>
    <h2 class="darkgrey"><?php echo stripslashes(ucwords($EveData['RestaurantEventAddress'])); ?></h2>
    <!-- <p class="grey">Gulberg 3, Lahore</p>-->
   <h3 class="red">Date:</h3><h3><?php echo stripslashes(ucwords($EveData['RestaurantEventStartDate'])); ?> - <?php echo stripslashes(ucwords($EveData['RestaurantEventEndDate'])); ?></h3>
                 <h3 class="red">Time: </h3><h3><?php echo stripslashes(ucwords($EveData['RestaurantEventStartTime'])); ?> -<?php echo stripslashes(ucwords($EveData['RestaurantEventEndTime'])); ?></h3>
                <p class="evtext"><?php echo stripslashes(ucwords($EveData['RestaurantEventDescription'])); ?></p>  
    <a href="bookeventpopup.php?restaurants=<?php echo $_GET['restaurants'];?>&eventID=<?php echo $EveData['id'];?>" class="eventpopup submit">Book Event</a> </div>
  <div class="clear"></div>
</div><?php } } else { ?>
                          <div class="voucher_container">There is no restaurant event for this <?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></div>
                          <?php } ?>

