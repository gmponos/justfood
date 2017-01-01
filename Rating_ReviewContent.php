<?php
$RatingReviewQueryAvarge="select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."'";


//Number of Rating Only with Comment
$RatingReviewQueryAvargewithRatingwithcomment=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewContent !='' and RestaurantReviewRating!=''"));
//
   $QueryRatingExcAvarge=mysql_query($RatingReviewQueryAvarge);
   $ratingNumberOfRecordAvarge=mysql_num_rows($QueryRatingExcAvarge);
?>
<style type="text/css">

.register_selection {
	/*border: 1px solid #979797 !important;	*/
	font-size: 12px !important;	
	color: #535252 !important;	
	padding: 5px !important;	
	background: none !important;	
	height: 30px !important;	
	width: 283px !important;	
	float: right;
	border-radius:0px !important;	
	/*box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;*/
}
</style>
<script  type="text/javascript"  language="javascript">
function getOrgTypeListRestDisplayFilter(str){
if (str=="")
{
document.getElementById("DisplayFilter").innerHTML="";
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
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("DisplayFilter").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","displayFilter.php?q="+str+"&rID=<?php echo $resID[0];?>",true);
xmlhttp.send();
}

</script>
<div class="tab_content">
<form action="" method="post">
<table width="100%" border="0">
  <tr>
    <td><strong><?php echo $TableLanguage4['ResSortByText'];?></strong></td>
    <td><select name="RatingFilter" style="width:280px; float:left; border:1px solid #ccc; padding:5px; border-radius:5px;" onchange="getOrgTypeListRestDisplayFilter(this.value);" >
    <option value=""><?php echo $TableLanguage6['CustNoofFilterBy'];?></option>
    <option value="RestaurantReviewRating"><?php echo $TableLanguage7['HightestRatingText'];?></option>
    <option value="created_date">Lowest Rating</option>
    </select></td>
  </tr>
</table>
</form>
   <div class="full">
   

   <div class="full_left">
   <h4><?php echo ucwords($TableLanguage4['ResAverageUserRating']);?>: </h4> 
   						 <p style="margin-top:3px;">
                         <a href="">
                          <?php if($AverageRatingCode==5){ ?>
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <?php } elseif($AverageRatingCode==4){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          
                           <?php } elseif($AverageRatingCode==3){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                        
                            <?php } elseif($AverageRatingCode==2){?>
                           <img src="images/img/Star-icon.gif">
                          <img src="images/img/Star-icon.gif">
                         <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                          <img src="images/img/Star-icon-grey.gif">
                         
                            <?php } elseif($AverageRatingCode==1){?>
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
                         </p>
                          <p><?php echo $TableLanguage7['ratingwithoutcommentText'];?> : <?php echo $RatingReviewQueryAvargewithRatingOnly;?></p>
                          <p><?php echo $TableLanguage7['rating_CommentText'];?> : <?php echo $RatingReviewQueryAvargewithRatingwithcomment;?></p>
   </div>
   <?php 
   $starRating5=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewRating ='5'"));
    $starRating4=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewRating ='4'"));
	 $starRating3=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewRating ='3'"));
	  $starRating2=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewRating ='2'"));
	   $starRating1=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewRating ='1'"));
   ?>
   <div class="full_right">
   <div class="stars_container"> 
   <div class="stars"> 5 <?php echo $TableLanguage7['StarText'];?></div> 
   <div class="rating-bar-parent">
	<div class="rating-bar-child5" style="width: 66.164383561644px;"></div>
	</div>
    <div class="total_reviews"><?php echo $starRating5;?> </div>
    </div>
    <div class="stars_container"> 
   <div class="stars"> 4 <?php echo $TableLanguage7['StarText'];?></div> 
   <div class="rating-bar-parent">
	<div class="rating-bar-child4" style="width: 46.164383561644px;"></div>
	</div>
    <div class="total_reviews"><?php echo $starRating4;?> </div>
    </div>
    <div class="stars_container"> 
   <div class="stars"> 3 <?php echo $TableLanguage7['StarText'];?></div> 
   <div class="rating-bar-parent">
	<div class="rating-bar-child3" style="width: 26.164383561644px;"></div>
	</div>
    <div class="total_reviews"><?php echo $starRating3;?> </div>
    </div>
    <div class="stars_container"> 
   <div class="stars"> 2 <?php echo $TableLanguage7['StarText'];?></div> 
   <div class="rating-bar-parent">
	<div class="rating-bar-child2" style="width: 16.164383561644px;"></div>
	</div>
    <div class="total_reviews"><?php echo $starRating2;?> </div>
    </div>
    <div class="stars_container"> 
   <div class="stars"> 1 <?php echo $TableLanguage7['StarText'];?></div> 
   <div class="rating-bar-parent">
	<div class="rating-bar-child1" style="width: 6.164383561644px;"></div>
	</div>
    <div class="total_reviews"><?php echo $starRating1;?> </div>
    </div>   </div>
  
   </div>
   <div id="DisplayFilter">
   <?php 
   $RatingReviewQuery="select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."'";
   $QueryRatingExc=mysql_query($RatingReviewQuery);
   $ratingNumberOfRecord=mysql_num_rows($QueryRatingExc);
   if($ratingNumberOfRecord>0){
   while($RatingDataFetch=mysql_fetch_assoc($QueryRatingExc))
   {
    ?>
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
      <?php } } else {
	  if($_SESSION['justfoodsUserID']==''){
	   ?>
            <div><a href="userLogin.php" style="color:#FF0000; font-size:18px; font-weight:bold; padding:10px; margin-top:30px;"><?php echo ucwords($TableLanguage4['ResgiveRatingReviewText']);?><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></a></div>
            
            
            <?php } else { ?>
			
			 <div><a style="color:#FF0000; font-size:18px; font-weight:bold; padding:10px; margin-top:30px;">No rating & Review for <?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></a></div>
			<?php } } ?>
   </div></div>