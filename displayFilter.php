<?php 
include('config1.php');
$GetD=$_GET['q'];
$TableLanguage7=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'"));
   $RatingReviewQuery="select * from tbl_restaurantReview where RestaurantReviewId='".$_GET['rID']."' order by $GetD desc";
   $QueryRatingExc=mysql_query($RatingReviewQuery);
   $ratingNumberOfRecord=mysql_num_rows($QueryRatingExc);
   if($ratingNumberOfRecord>0){
   while($RatingDataFetch=mysql_fetch_assoc($QueryRatingExc))
   {
    ?>
<div class="full" id="DisplayFilter">
    
   <div class="full" >
    <div class="full_top">
    <div class="one_forth">
     					  <a href="">
                          <?php if($RatingDataFetch['RestaurantReviewRating']==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($RatingDataFetch['RestaurantReviewRating']==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($RatingDataFetch['RestaurantReviewRating']==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($RatingDataFetch['RestaurantReviewRating']==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($RatingDataFetch['RestaurantReviewRating']==1){?>
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
						  
                         </a>
    </div>
     <div class="one_third last"><?php /*?><h4 style="float:left; font-weight:normal; margin-right:5px; text-decoration:none; font-size:16px;">by</h4><?php */?> <h3 style="text-decoration:none;"><?php echo ucwords($RatingDataFetch['RestaurantReviewUName']); ?></h3>
     </div>
      <div class="one_third last"><h4 style=" font-weight:normal; text-decoration:none; font-size:16px;"><?php echo $TableLanguage7['Posted_onText'];?> : <?php echo ucwords($RatingDataFetch['created_date']); ?></h4>
      </div>
      <!-- <div class="one_forth"></div>-->
      <div class="clear"></div>
    </div>
     <?php /*?><div class="full_top">
     <h4 style="text-decoration:none;">Concerns the shop <?php echo ucwords($RatingDataFetch['RestaurantReviewName']); ?></h4>
     </div><?php */?>
    <div class="full_middle"><p><?php echo ucwords($RatingDataFetch['RestaurantReviewContent']); ?></p>
    </div>
    <div class="full_bottom">
    <div class="one_third">
    <p><?php echo $TableLanguage7['QualityText'];?>:</p>
      <a href="">
                          <?php if($RatingDataFetch['Quality_ratingN']==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($RatingDataFetch['Quality_ratingN']==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($RatingDataFetch['Quality_ratingN']==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($RatingDataFetch['Quality_ratingN']==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($RatingDataFetch['Quality_ratingN']==1){?>
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
						  
                         </a>
    </div>
     <div class="one_third">
      <p ><?php echo $TableLanguage7['ServiceRatingText'];?>:</p>
      <a href="">
                          <?php if($RatingDataFetch['Service_ratingN']==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($RatingDataFetch['Service_ratingN']==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($RatingDataFetch['Service_ratingN']==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($RatingDataFetch['Service_ratingN']==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($RatingDataFetch['Service_ratingN']==1){?>
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
						  
                         </a></div>
      <div class="one_third" style="border:none;"> 
      <p><?php echo $TableLanguage7['TimeRatingText'];?>:</p>
       <a href="">
                          <?php if($RatingDataFetch['Time_ratingN']==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($RatingDataFetch['Time_ratingN']==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($RatingDataFetch['Time_ratingN']==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($RatingDataFetch['Time_ratingN']==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($RatingDataFetch['Time_ratingN']==1){?>
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
						  
                         </a></div>
    </div>
    <div class="clear"></div>
    </div>
   
    <div class="clear"></div>
    </div>
      <?php } } else {
	   ?>
            <div><a href="userLogin.php" style="color:#FF0000; font-size:18px; font-weight:bold; padding:10px; margin-top:30px;"><?php echo ucwords($TableLanguage4['ResgiveRatingReviewText']);?><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></a></div>
            <?php } ?>