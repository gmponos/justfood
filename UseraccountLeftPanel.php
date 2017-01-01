<?php include('sessionCheck.php'); ?>
<div class="account_edit">

       <a href="myaccount.php" <?php if(basename($_SERVER['PHP_SELF'])=='myaccount.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo ucwords($TableLanguage['CustMyaccountText']);?></a>
        <!--<a href="http://www.jamil.eu/index.php?action=accountinfo" class="edit_detail selected">Account  Info</a>-->
        <a href="order_review.php"  <?php if(basename($_SERVER['PHP_SELF'])=='order_review.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage['CustMyOrderText'];?></a>
       <?php  if($UserAddressData['assign_loyalty']==0)
							  { ?>
        <a href="loyality_point.php"  <?php if(basename($_SERVER['PHP_SELF'])=='loyality_point.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage['CustMyloyalityText'];?></a>
        <?php } ?>
        
        <a href="tell_a_friend.php"  <?php if(basename($_SERVER['PHP_SELF'])=='tell_a_friend.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage6['CustTellYourFriend'];?></a>
        <a href="manage_review.php"  <?php if(basename($_SERVER['PHP_SELF'])=='manage_review.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage['CustRatingText'];?></a>
        <a href="manage_favourite.php"  <?php if(basename($_SERVER['PHP_SELF'])=='manage_favourite.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage['CustMyfavoriteText'];?></a>
        <a href="address_book.php"  <?php if(basename($_SERVER['PHP_SELF'])=='address_book.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage['CustMyaddressText'];?></a>
        <a href="edit_detail.php"  <?php if(basename($_SERVER['PHP_SELF'])=='edit_detail.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage6['CustChangeProfile'];?></a>
        <a href="changePassword.php"  <?php if(basename($_SERVER['PHP_SELF'])=='changePassword.php') { echo 'class="edit_detail selected"'; } else { ?> class="edit_detail" <?php }  ?>><?php echo $TableLanguage6['CustChangePassword'];?></a>
        <a href="logout.php"class="edit_detail "><?php echo $TableLanguage['CustlogoutText'];?></a>
    </div>