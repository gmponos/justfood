<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 

 $CuisineQuery =mysql_query("select * from tbl_languageTranslate where id='1'");
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
  $CuisineQuery1 =mysql_query("select * from tbl_languageTranslate1 where id='1'");
 $CuisineData1=mysql_fetch_assoc($CuisineQuery1);
 
  $CuisineQuery2 =mysql_query("select * from tbl_languageTranslate2 where id='1'");
 $CuisineData2=mysql_fetch_assoc($CuisineQuery2);
 
 $CuisineQuery3 =mysql_query("select * from tbl_languageTranslate3 where id='1'");
 $CuisineData3=mysql_fetch_assoc($CuisineQuery3);
 
 $CuisineQuery4 =mysql_query("select * from tbl_languageTranslate4 where id='1'");
 $CuisineData4=mysql_fetch_assoc($CuisineQuery4);
 
 $CuisineQuery5 =mysql_query("select * from tbl_languageTranslate5 where id='1'");
 $CuisineData5=mysql_fetch_assoc($CuisineQuery5);
 
 $CuisineQuery6 =mysql_query("select * from tbl_languageTranslate6 where id='1'");
 $CuisineData6=mysql_fetch_assoc($CuisineQuery6);
 
 $CuisineQuery7 =mysql_query("select * from tbl_languageTranslate7 where id='1'");
 $CuisineData7=mysql_fetch_assoc($CuisineQuery7);
 
 
 
 


extract($_POST);
if(isset($_POST['TranslateSubmit']))
{
$TransaletQuery="UPDATE `tbl_languageTranslate` SET `language_country` = N'".mysql_real_escape_string($language_country)."', `LoginText` = N'".mysql_real_escape_string($LoginText)."', `SignupText` = N'".mysql_real_escape_string($SignupText)."', `LoginErrorMsg` = N'".mysql_real_escape_string($LoginErrorMsg)."', `SignupErrormsg` = N'".mysql_real_escape_string($SignupErrormsg)."', `SignupSuccessmsg` = N'".mysql_real_escape_string($SignupSuccessmsg)."', `OrderThankmsg` = N'".mysql_real_escape_string($OrderThankmsg)."', `haveRestaurant` = N'".mysql_real_escape_string($haveRestaurant)."', `HeaderClick` = N'".mysql_real_escape_string($HeaderClick)."', `HomeButtonText` = N'".mysql_real_escape_string($HomeButtonText)."', `HowitWorksButtonText` = N'".mysql_real_escape_string($HowitWorksButtonText)."', `BlogButtonText` = N'".mysql_real_escape_string($BlogButtonText)."', `ContactUsButtonText` = N'".mysql_real_escape_string($ContactUsButtonText)."', `HeaderText` = N'".mysql_real_escape_string($HeaderText)."', `SearchPanelText` = N'".mysql_real_escape_string($SearchPanelText)."', `SSearchPanelText` = N'".mysql_real_escape_string($SSearchPanelText)."', `HowToworkTextStep1` = N'".mysql_real_escape_string($HowToworkTextStep1)."', `HowToworkTextStep2` = N'".mysql_real_escape_string($HowToworkTextStep2)."', `HowToworkTextsmallStep2` = N'".mysql_real_escape_string($HowToworkTextsmallStep2)."', `HowToworkTextsmallStep3` = N'".mysql_real_escape_string($HowToworkTextsmallStep3)."', `BestDealText` = N'".mysql_real_escape_string($BestDealText)."', `TopBrandsText` = N'".mysql_real_escape_string($TopBrandsText)."', `appHeadlineText` = N'".mysql_real_escape_string($appHeadlineText)."', `smallappHeadlineText` = N'".mysql_real_escape_string($smallappHeadlineText)."', `NewletterText` = N'".mysql_real_escape_string($NewletterText)."', `GetTouchText` = N'".mysql_real_escape_string($GetTouchText)."', `SelectCountryText` = N'".mysql_real_escape_string($SelectCountryText)."',`SelectStateText` = N'".mysql_real_escape_string($SelectStateText)."',`SelectCityText` = N'".mysql_real_escape_string($SelectCityText)."', `SelectCuisineText` = N'".mysql_real_escape_string($SelectCuisineText)."', `OrderNowButton` = N'$OrderNowButton', `FindNowButton` = N'$FindNowButton', `RegisterButton` = N'".mysql_real_escape_string($RegisterButton)."', `ResMenuText` = N'$ResMenuText', `ResinfoText` = N'$ResinfoText', `ResRatingText` = N'$ResRatingText', `ResGalleryText` = N'$ResGalleryText', `ResOpentimeText` = N'$ResOpentimeText', `ResClosetimeText` = N'$ResClosetimeText', `CustMyaccountText` = N'$CustMyaccountText', `CustMyOrderText` = N'$CustMyOrderText', `CustRatingText` = N'$CustRatingText', `CustMyaddressText` = N'$CustMyaddressText', `CustMyloyalityText` = N'$CustMyloyalityText', `CustMyfavoriteText` = N'$CustMyfavoriteText', `CustlogoutText` = N'$CustlogoutText', `CustDeleteText` = N'$CustDeleteText', `CustEditText` = N'$CustEditText',`ResPreviouseTabText` = N'$ResPreviouseTabText', `ResOfferTabText` = N'$ResOfferTabText', `SetpSearchText` = N'$SetpSearchText', `SetpSelectRestaurantText` = N'$SetpSelectRestaurantText', `SetpPlaceOrderText` = N'$SetpPlaceOrderText' , `SetpCheckoutText` = N'$SetpCheckoutText', `CityNameText` = N'$CityNameText', `DistrictText` = N'$DistrictText',`FindYourFoodText` = N'$FindYourFoodText', `CuisinesText` = N'$CuisinesText', `RestaurantRatingText` = N'$RestaurantRatingText', `DeliveryMinimumText` = N'$DeliveryMinimumText' WHERE `id` = '1'";



$TransaletQuery1="UPDATE `tbl_languageTranslate1` SET `HowToworkTextsmallStep1` = N'".mysql_real_escape_string($HowToworkTextsmallStep1)."',`ResGalleryText1` = N'$ResGalleryText1', `HowToworkTextStep3` = N'".mysql_real_escape_string($HowToworkTextStep3)."', `HowToworkTextStep4` = N'".mysql_real_escape_string($HowToworkTextStep4)."', `HowToworkTextsmallStep4` = N'".mysql_real_escape_string($HowToworkTextsmallStep4)."', `ShowOnlyText` = N'".mysql_real_escape_string($ShowOnlyText)."', `SuggestArestaurantText` = N'".mysql_real_escape_string($SuggestArestaurantText)."', `OrderButtonText` = N'$OrderButtonText', `PreOrderButtonText` = N'$PreOrderButtonText', `CloseOrderButtonText` = N'$CloseOrderButtonText', `ViewTimingText` = N'$ViewTimingText', `RestaurantHeadingText` = N'".mysql_real_escape_string($RestaurantHeadingText)."', `GradeText` = N'$GradeText', `DeliveryTimeText` = N'$DeliveryTimeText', `MinOrderText` = N'$MinOrderText', `DealsText` = N'$DealsText', `ChangeAddressText` = N'".mysql_real_escape_string($ChangeAddressText)."', `FindWhatText` = N'".mysql_real_escape_string($FindWhatText)."', `BackToTopText` = N'".mysql_real_escape_string($BackToTopText)."', `closeOrderAlert` = N'".mysql_real_escape_string($closeOrderAlert)."', `PreorderOrderAlert` = N'".mysql_real_escape_string($PreorderOrderAlert)."' WHERE `id` = '1'";


$TranslateQuery2="UPDATE `tbl_languageTranslate2` SET `MoreThan` = N'$MoreThan', `ResetMinimum` = N'$ResetMinimum', `ResetRating` = N'$ResetRating', `SearchFilterText` = N'".mysql_real_escape_string($SearchFilterText)."', `StateFilterText` = N'".mysql_real_escape_string($StateFilterText)."', `CityFilterText` = N'".mysql_real_escape_string($CityFilterText)."', `OpenRestaurantFilterText` = N'".mysql_real_escape_string($OpenRestaurantFilterText)."', `DealsAvailableFilterText` = N'".mysql_real_escape_string($DealsAvailableFilterText)."', `HomeDeliveryRestaurantFilterText` = N'".mysql_real_escape_string($HomeDeliveryRestaurantFilterText)."', `PickupAvailableFilterText`= N'".mysql_real_escape_string($PickupAvailableFilterText)."', `HomeDeliveryPickupRestaurantFilterText` = N'".mysql_real_escape_string($HomeDeliveryPickupRestaurantFilterText)."', `RestaurantServeFilterText` = N'".mysql_real_escape_string($RestaurantServeFilterText)."' WHERE `id` = '1'";





$Translate3="UPDATE `tbl_languageTranslate3` SET `FooterSubscription` = N'$FooterSubscription', `FooterSubscriptionPlaceholder` = N'$FooterSubscriptionPlaceholder', `FooterSubscriptionMessage1` = N'".mysql_real_escape_string($FooterSubscriptionMessage1)."', `FooterSubscriptionMessage2` = N'".mysql_real_escape_string($FooterSubscriptionMessage2)."', `FooterJustfood` = N'$FooterJustfood', `FooterWorkWithUs` = N'$FooterWorkWithUs', `FooterConnectwithUs` = N'$FooterConnectwithUs', `FooterWorkareYou` = N'$FooterWorkareYou', `FooterFAQ` = N'$FooterFAQ', `FooterTerms` = N'$FooterTerms', `FooterPrivacyPolicy` = N'$FooterPrivacyPolicy', `FooterContactUs` = N'$FooterContactUs', `FooterHowtoCookies` = N'$FooterHowtoCookies', `FooterRestaurantOwner` = N'$FooterRestaurantOwner', `FooterGurantee` = N'$FooterGurantee', `FooterCareerwithUs` = N'$FooterCareerwithUs', `FooterDisclaimer` = N'$FooterDisclaimer', `FooterRestaurantJoin` = N'$FooterRestaurantJoin', `FooterFranchise` = N'$FooterFranchise', `FooterAllrightreserved` = N'$FooterAllrightreserved' , `FooterRefund` = N'$FooterRefund', `FooterPress` = N'$FooterPress', `FooterSignupButton` = N'$FooterSignupButton' ,`FooterOrderSearchPlace` = N'$FooterOrderSearchPlace' WHERE `id` = '1'";





$Transalet4="UPDATE `tbl_languageTranslate4` SET `ResAverageUserRating` = N'$ResAverageUserRating', `ResPickyourOrderText` = N'$ResPickyourOrderText', `ResMinDeliveryOrderText` = N'$ResMinDeliveryOrderText', `ResMinDeliveryFee` = N'$ResMinDeliveryFee', `ResEmailRestaurant` = N'$ResEmailRestaurant', `ResAddtoFavouriteText` = N'$ResAddtoFavouriteText', `ResYourOrderText` = N'$ResYourOrderText', `ResYourAddressText` = N'$ResYourAddressText', `ResSelectCategoryText` = N'$ResSelectCategoryText', `ResOnlineOfferText` = N'$ResOnlineOfferText', `ResOnlineDealsText` = N'$ResOnlineDealsText', `ResOnlineDealsErrorText` = N'$ResOnlineDealsErrorText', `ResOnlineOfferErrorText` = N'$ResOnlineOfferErrorText', `ResOfferDiscountText` = N'$ResOfferDiscountText', `ResBackTorestaurantText` = N'$ResBackTorestaurantText', `ResCartOrderButtonText` = N'$ResCartOrderButtonText', `ResCartminMessageText` = N'$ResCartminMessageText', `ResOverviewText` = N'$ResOverviewText', `ResAddressText` = N'$ResAddressText', `ResDeliveryHoursText` = N'$ResDeliveryHoursText', `ResTakewayHoursText` = N'$ResTakewayHoursText', `ResPickupTimeText` = N'$ResPickupTimeText', `ResDeliveryTimText` = N'$ResDeliveryTimText', `ResClosetimeText` = N'$ResClosetimeText', `ResPaymentTypesText` = N'$ResPaymentTypesText', `ResBookatableatText` = N'$ResBookatableatText', `ResBookNOwButtonText` = N'$ResBookNOwButtonText', `ResSortByText` = N'$ResSortByText', `ResgiveRatingReviewText` = N'$ResgiveRatingReviewText', `ResLoginHeretoPreOrderText` = N'$ResLoginHeretoPreOrderText' WHERE `id` = '1'";


$TransLate5="UPDATE `tbl_languageTranslate5` SET `ResFormFieldNameText` = N'$ResFormFieldNameText', `ResFormFieldEmailText` = N'$ResFormFieldEmailText', `ResFormFieldPasswordText` = N'$ResFormFieldPasswordText', `ResFormFieldContactText` = N'$ResFormFieldContactText', `ResFormFieldNoofPeopleText` = N'$ResFormFieldNoofPeopleText', `ResFormFieldEatTypeText` = N'$ResFormFieldEatTypeText', `ResFormFieldDateText` = N'$ResFormFieldDateText', `ResFormFieldTimeBrandText` = N'$ResFormFieldTimeBrandText', `ResFormFieldTSpecialRequestText` = N'$ResFormFieldTSpecialRequestText', `ResFormFieldTSocialLoginText` = N'$ResFormFieldTSocialLoginText', `ResFormFieldTSocialAcountViaText` = N'$ResFormFieldTSocialAcountViaText', `ResFormFieldTFasterCheckText` = N'$ResFormFieldTFasterCheckText', `ResFormFieldGuestUserText` = N'$ResFormFieldGuestUserText', `ResFormFieldProceedText` = N'$ResFormFieldProceedText', `ResFormFieldAddDeliveryAddressText` = N'$ResFormFieldAddDeliveryAddressText', `ResFormFieldAddressText` = N'$ResFormFieldAddressText', `ResFormFieldNameofBellText` = N'$ResFormFieldNameofBellText', `ResFormFieldFloorText` = N'$ResFormFieldFloorText', `ResFormFieldLandLineText` = N'$ResFormFieldLandLineText', `ResFormFieldCountryText` = N'$ResFormFieldCountryText', `ResFormFieldStreetAddressText` = N'$ResFormFieldStreetAddressText', `ResFormFieldPincodeText` = N'$ResFormFieldPincodeText', `ResFormFieldCheckoutText` = N'$ResFormFieldCheckoutText', `ResFormFieldShippingAddText` = N'$ResFormFieldShippingAddText', `ResFormFieldRestaurantAddText` = N'$ResFormFieldRestaurantAddText', `ResFormFielItemDetailText` = N'$ResFormFielItemDetailText', `ResFormFielItemPerUnitText` = N'$ResFormFielItemPerUnitText', `ResFormFielItemUnitText` = N'$ResFormFielItemUnitText', `ResFormFielItemTotalPriceText` = N'$ResFormFielItemTotalPriceText', `ResFormFielItemCouponCodeText` = N'$ResFormFielItemCouponCodeText', `ResFormFielApplyButtonText` = N'$ResFormFielApplyButtonText', `ResFormFielSubTotalText` = N'$ResFormFielSubTotalText', `ResFormFielDeliveryDateText` = N'$ResFormFielDeliveryDateText', `ResFormFielOrderTypeText` = N'$ResFormFielOrderTypeText', `ResFormFielPaymentMethodConfirmText` = N'$ResFormFielPaymentMethodConfirmText', `ResFormFielCashOnDeliText` = N'$ResFormFielCashOnDeliText', `ResFormFielPayaplText` = N'$ResFormFielPayaplText', `ResFormFielCreditCardText` = N'$ResFormFielCreditCardText', `ResFormFielContinueText` = N'$ResFormFielContinueText', `ResFormFielCouponInvalidText` = N'$ResFormFielCouponInvalidText' WHERE `id` = '1'";


$Translate6="UPDATE `tbl_languageTranslate6` SET `CustTellYourFriend` = N'$CustTellYourFriend', `CustChangeProfile` = N'$CustChangeProfile', `CustChangePassword` = N'$CustChangePassword', `CustStatistics` = N'$CustStatistics', `CustNoofOrder` = N'$CustNoofOrder', `CustNoofReview` = N'$CustNoofReview', `CustNoofFavourite` = N'$CustNoofFavourite', `CustNoofLoyalityPoint` = N'$CustNoofLoyalityPoint', `CustNoofFilterBy` = N'$CustNoofFilterBy', `CustSelectRestaurant` = N'$CustSelectRestaurant', `CustNoofFilterButton` = N'$CustNoofFilterButton', `CustOrderNoText` = N'$CustOrderNoText', `CustOrderDateText` = N'$CustOrderDateText', `CustOrderAMountText` = N'$CustOrderAMountText', `CustOrderStatusText` = N'$CustOrderStatusText', `CustOrderRestaurantNameText` = N'$CustOrderRestaurantNameText', `CustOrderDetailNameText` = N'$CustOrderDetailNameText', `CustOrderOrderDeatilText` = N'$CustOrderOrderDeatilText', `CustOrderLeaveAReviewText` = N'$CustOrderLeaveAReviewText', `CustEarnPointLoyalityText` = N'$CustEarnPointLoyalityText', `CustUsedPointLoyalityText` = N'$CustUsedPointLoyalityText', `CustTotalPointLoyalityText` = N'$CustTotalPointLoyalityText', `CustShareMessageWithFriedText` = N'$CustShareMessageWithFriedText', `CustRating_reviewText` = N'$CustRating_reviewText', `CustRating_reviewCommentText` = N'$CustRating_reviewCommentText', `CustRating_reviewNoMsgText` = N'$CustRating_reviewNoMsgText', `CustFaviouruteNoMsgText` = N'$CustFaviouruteNoMsgText', `CustAddressBookDescription` = N'$CustAddressBookDescription', `CustAddressLabelText` = N'$CustAddressLabelText', `CustAddressText` = N'$CustAddressText', `CustCreateNewAddressText` = N'$CustCreateNewAddressText' WHERE `id` = '1'";

$Translate7="UPDATE `tbl_languageTranslate7` SET `Enter_keywordText` = N'".mysql_real_escape_string($Enter_keywordText)."', `sundayText` = N'".mysql_real_escape_string($sundayText)."', `mondayText` = N'".mysql_real_escape_string($mondayText)."', `tuesdayText` = N'".mysql_real_escape_string($tuesdayText)."', `wednesdayText` = N'".mysql_real_escape_string($wednesdayText)."', `thursdayText` = N'".mysql_real_escape_string($thursdayText)."', `fridaydayText` = N'".mysql_real_escape_string($fridaydayText)."', `saturdayText` = N'".mysql_real_escape_string($saturdayText)."', `cartemptyText` = N'".mysql_real_escape_string($cartemptyText)."', `remainingText` = N'".mysql_real_escape_string($remainingText)."', `minimumorderamountfillText` = N'".mysql_real_escape_string($minimumorderamountfillText)."', `ratingwithoutcommentText` = N'".mysql_real_escape_string($ratingwithoutcommentText)."', `rating_CommentText` = N'".mysql_real_escape_string($rating_CommentText)."', `StarText` = N'".mysql_real_escape_string($StarText)."', `Posted_onText` = N'".mysql_real_escape_string($Posted_onText)."', `QualityText` = N'".mysql_real_escape_string($QualityText)."', `ServiceRatingText` = N'".mysql_real_escape_string($ServiceRatingText)."', `TimeRatingText` = N'".mysql_real_escape_string($TimeRatingText)."', `SrNOText` = N'".mysql_real_escape_string($SrNOText)."', `OrderIDText` = N'".mysql_real_escape_string($OrderIDText)."', `OrderPriceText` = N'".mysql_real_escape_string($OrderPriceText)."', `OrderDateText` = N'".mysql_real_escape_string($OrderDateText)."', `HightestRatingText` = N'".mysql_real_escape_string($HightestRatingText)."', `LatestRatingText` = N'".mysql_real_escape_string($LatestRatingText)."' ,`FavouriteDoneText` = N'".mysql_real_escape_string($FavouriteDoneText)."', `ReviewRatingText` = N'".mysql_real_escape_string($ReviewRatingText)."',`manadatory_Text` = N'".mysql_real_escape_string($manadatory_Text)."',`choose_materialText` = N'".mysql_real_escape_string($choose_materialText)."',`quantityText` = N'".mysql_real_escape_string($quantityText)."',`specialInstruction` = N'".mysql_real_escape_string($specialInstruction)."',`addtoCartText` = N'".mysql_real_escape_string($addtoCartText)."',`areyousurecloseText` = N'".mysql_real_escape_string($areyousurecloseText)."',`SendMessageText` = N'".mysql_real_escape_string($SendMessageText)."',`submitButtonText` = N'".mysql_real_escape_string($submitButtonText)."' ,`OrderText` = N'".mysql_real_escape_string($OrderText)."',`OrderViewText` = N'".mysql_real_escape_string($OrderViewText)."',`ChooseDeliveryAddressText` = N'".mysql_real_escape_string($ChooseDeliveryAddressText)."',`ContinueButtonText` = N'".mysql_real_escape_string($ContinueButtonText)."',`OfficeHomeText` = N'".mysql_real_escape_string($OfficeHomeText)."',`SaveContinueButtonText` = N'".mysql_real_escape_string($SaveContinueButtonText)."',`OrderwillbedeliveredText` = N'".mysql_real_escape_string($OrderwillbedeliveredText)."',`yourSelectionText` = N'".mysql_real_escape_string($yourSelectionText)."',`CongratsText` = N'".mysql_real_escape_string($CongratsText)."',`yourOrderDetailText` = N'".mysql_real_escape_string($yourOrderDetailText)."',`DeliveryAddressText` = N'".mysql_real_escape_string($DeliveryAddressText)."',`TimeofOrderingText` = N'".mysql_real_escape_string($TimeofOrderingText)."',`orderwillbereachText` = N'".mysql_real_escape_string($orderwillbereachText)."',`CheckyoouremailSpamText` = N'".mysql_real_escape_string($CheckyoouremailSpamText)."',`MobileCodeVerification` = N'".mysql_real_escape_string($MobileCodeVerification)."',`MobileCodeVerificationMessage` = N'".mysql_real_escape_string($MobileCodeVerificationMessage)."',`verifyButtonText` = N'".mysql_real_escape_string($verifyButtonText)."',`verificationcodeText` = N'".mysql_real_escape_string($verificationcodeText)."',`sendagaincodeText` = N'".mysql_real_escape_string($sendagaincodeText)."',`invalidCodemessage` = N'".mysql_real_escape_string($invalidCodemessage)."',`itdoesnotMatterText` = N'".mysql_real_escape_string($itdoesnotMatterText)."',`sorryYouhavenoOrderText` = N'".mysql_real_escape_string($sorryYouhavenoOrderText)."' ,`myaccountText` = N'".mysql_real_escape_string($myaccountText)."' ,`ratingavarageText` = N'".mysql_real_escape_string($ratingavarageText)."' ,`actionText` = N'".mysql_real_escape_string($actionText)."' ,`changePasswordText` = N'".mysql_real_escape_string($changePasswordText)."',`newPasswordText` = N'".mysql_real_escape_string($newPasswordText)."',`oldPasswordText` = N'".mysql_real_escape_string($oldPasswordText)."',`SelectText` = N'".mysql_real_escape_string($SelectText)."',`NoDeliveryAddressMsgText` = N'".mysql_real_escape_string($NoDeliveryAddressMsgText)."',`iwanttoreviewoffer` = N'".mysql_real_escape_string($iwanttoreviewoffer)."',`cPasswordText` = N'".mysql_real_escape_string($cPasswordText)."',`createAccountTExt` = N'".mysql_real_escape_string($createAccountTExt)."',`loginHereText` = N'".mysql_real_escape_string($loginHereText)."',`forgotpasswordText` = N'".mysql_real_escape_string($forgotpasswordText)."',`rememberMepasswordText` = N'".mysql_real_escape_string($rememberMepasswordText)."',`firstNameText` = N'".mysql_real_escape_string($firstNameText)."',`LastNameText` = N'".mysql_real_escape_string($LastNameText)."',`PhoneText` = N'".mysql_real_escape_string($PhoneText)."',`ImageText` = N'".mysql_real_escape_string($ImageText)."',`MobileText` = N'".mysql_real_escape_string($MobileText)."',`PostcodeText` = N'".mysql_real_escape_string($PostcodeText)."',`OnePointText` = N'".mysql_real_escape_string($OnePointText)."',`showyourInterestText` = N'".mysql_real_escape_string($showyourInterestText)."',`howmuchyouinvestText` = N'".mysql_real_escape_string($howmuchyouinvestText)."',`countryInterestedText` = N'".mysql_real_escape_string($countryInterestedText)."',`franchiseButtonText` = N'".mysql_real_escape_string($franchiseButtonText)."' WHERE `id` ='1'";


mysql_query($TransaletQuery1);
mysql_query($TranslateQuery2);
mysql_query($Translate3);
mysql_query($Transalet4);
mysql_query($TransLate5);
mysql_query($Translate6);
mysql_query($Translate7);
if(mysql_query($TransaletQuery))
{
$emsg="1";
}
}
?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Modify Language Translate Text
                            <?php } else { ?>
                            Modify Language Translate Text
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="min-height:1450px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                          Modify Language Translate Text
                            <?php } else { ?>
                           Modify Language Translate Text
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> Modify Language Translate Text has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />Modify Language Translate Text is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Modify Language Translate Text has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                             <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResDealsEdit&eid=".$_GET['eid'];
											$buttonValue="Modify Language Translate Text";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResDealsAdd";
										   $buttonValue="Modify Language Translate Text";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="" method="post" enctype="multipart/form-data">
											
												<fieldset>
													<legend>Language Translate information</legend>
                                                    
                                                    <table width="100%" border="0">
   <tr>
 <td><label for="LoginText">Login Button Text</label></td>
    <td><input id="LoginText" name="LoginText" value="<?php echo $CuisineData['LoginText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SignupText">Signup Button Text</label></td>
    <td><input id="SignupText" name="SignupText" value="<?php echo $CuisineData['SignupText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="LoginText">Login Error Message</label></td>
    <td><input id="LoginErrorMsg" name="LoginErrorMsg" value="<?php echo $CuisineData['LoginErrorMsg']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SignupErrormsg">Signup Error Message</label></td>
    <td><input id="SignupErrormsg" name="SignupErrormsg" value="<?php echo $CuisineData['SignupErrormsg']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="SignupSuccessmsg">Signup Success Message</label></td>
    <td><input id="SignupSuccessmsg" name="SignupSuccessmsg" value="<?php echo $CuisineData['SignupSuccessmsg']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="OrderThankmsg">Thankyou Message</label></td>
    <td><input id="OrderThankmsg" name="OrderThankmsg" value="<?php echo $CuisineData['OrderThankmsg']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="HeaderText">Do you have a restaurant?</label></td>
    <td><input id="haveRestaurant" name="haveRestaurant" value="<?php echo $CuisineData['haveRestaurant']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SignupText">Click Here</label></td>
    <td><input id="HeaderClick" name="HeaderClick" value="<?php echo $CuisineData['HeaderClick']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="HeaderText">Home Button Text</label></td>
    <td><input id="HomeButtonText" name="HomeButtonText" value="<?php echo $CuisineData['HomeButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SignupText">How It Works Button Text</label></td>
    <td><input id="HeaderClick" name="HowitWorksButtonText" value="<?php echo $CuisineData['HowitWorksButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="HeaderText">Blog Button Text</label></td>
    <td><input id="haveRestaurant" name="BlogButtonText" value="<?php echo $CuisineData['BlogButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SignupText">Contact Us Button Text</label></td>
    <td><input id="HeaderClick" name="ContactUsButtonText" value="<?php echo $CuisineData['ContactUsButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
    <tr>
 <td><label for="HeaderText">Header(Slogon) Text</label></td>
    <td><input id="HeaderText" name="HeaderText" value="<?php echo $CuisineData['HeaderText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SignupText">Browse Restaurants Text</label></td>
    <td><input id="SearchPanelText" name="SearchPanelText" value="<?php echo $CuisineData['SearchPanelText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="LoginText">Start Your Order Text</label></td>
    <td><input id="SSearchPanelText" name="SSearchPanelText" value="<?php echo $CuisineData['SSearchPanelText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="BestDealText">Best Deals Text</label></td>
    <td><input id="BestDealText" name="BestDealText" value="<?php echo $CuisineData['BestDealText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="TopBrandsText">Top Cuisine Text</label></td>
    <td><input id="TopBrandsText" name="TopBrandsText" value="<?php echo $CuisineData['TopBrandsText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="NewletterText">Newselleter Text</label></td>
    <td><input id="NewletterText" name="NewletterText" value="<?php echo $CuisineData['NewletterText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="appHeadlineText">App Heading Text</label></td>
    <td><input id="appHeadlineText" name="appHeadlineText" value="<?php echo $CuisineData['appHeadlineText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="smallappHeadlineText">App Small Text</label></td>
    <td><input id="smallappHeadlineText" name="smallappHeadlineText" value="<?php echo $CuisineData['smallappHeadlineText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="SelectCountryText">Select Country Text</label></td>
    <td><input id="SelectCountryText" name="SelectCountryText" value="<?php echo $CuisineData['SelectCountryText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SelectStateText">Select State Text</label></td>
    <td><input id="SelectStateText" name="SelectStateText" value="<?php echo $CuisineData['SelectStateText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="SelectCountryText">Select City Text</label></td>
    <td><input id="SelectCityText" name="SelectCityText" value="<?php echo $CuisineData['SelectCityText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SelectCuisineText">Select Cuisine Text</label></td>
    <td><input id="SelectCuisineText" name="SelectCuisineText" value="<?php echo $CuisineData['SelectCuisineText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="OrderNowButton">Order Now Button</label></td>
    <td><input id="OrderNowButton" name="OrderNowButton" value="<?php echo $CuisineData['OrderNowButton']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FindNowButton">Find Now Button</label></td>
    <td><input id="FindNowButton" name="FindNowButton" value="<?php echo $CuisineData['FindNowButton']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="RegisterButton">Register Button</label></td>
    <td><input id="RegisterButton" name="RegisterButton" value="<?php echo $CuisineData['RegisterButton']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="GetTouchText">Get Touch</label></td>
    <td><input id="GetTouchText" name="GetTouchText" value="<?php echo $CuisineData['GetTouchText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
  
    <tr><td colspan="4"><strong style="color:#0000CC;">Footer Text Translate</strong></td></tr>
   <tr>
 <td><label for="ResOpentimeText">Subscribe to our newsletter Text</label></td>
    <td><input id="FooterSubscription" name="FooterSubscription" value="<?php echo $CuisineData3['FooterSubscription']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Enter Your Email Text</label></td>
    <td><input id="FooterSubscriptionPlaceholder" name="FooterSubscriptionPlaceholder" value="<?php echo $CuisineData3['FooterSubscriptionPlaceholder']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Don't Miss Out On Our Great Offers Text</label></td>
    <td><input id="FooterSubscriptionMessage1" name="FooterSubscriptionMessage1" value="<?php echo $CuisineData3['FooterSubscriptionMessage1']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterSubscriptionMessage2">Receive Deals From All Our Top Restaurants Via E-mail Text</label></td>
    <td><input id="FooterSubscriptionMessage2" name="FooterSubscriptionMessage2" value="<?php echo $CuisineData3['FooterSubscriptionMessage2']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResOpentimeText">Justfood ? Text</label></td>
    <td><input id="FooterJustfood" name="FooterJustfood" value="<?php echo $CuisineData3['FooterJustfood']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkWithUs">Work With Us Text</label></td>
    <td><input id="FooterWorkWithUs" name="FooterWorkWithUs" value="<?php echo $CuisineData3['FooterWorkWithUs']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="ResOpentimeText">Connect With Us Text</label></td>
    <td><input id="FooterConnectwithUs" name="FooterConnectwithUs" value="<?php echo $CuisineData3['FooterConnectwithUs']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkareYou">Who We Are Text</label></td>
    <td><input id="FooterWorkareYou" name="FooterWorkareYou" value="<?php echo $CuisineData3['FooterWorkareYou']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">FAQs Text</label></td>
    <td><input id="FooterFAQ" name="FooterFAQ" value="<?php echo $CuisineData3['FooterFAQ']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterTerms">Terms of Use Text</label></td>
    <td><input id="FooterTerms" name="FooterTerms" value="<?php echo $CuisineData3['FooterTerms']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">Privacy Policy Text</label></td>
    <td><input id="FooterPrivacyPolicy" name="FooterPrivacyPolicy" value="<?php echo $CuisineData3['FooterPrivacyPolicy']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkareYou">Contact Us Text</label></td>
    <td><input id="FooterContactUs" name="FooterContactUs" value="<?php echo $CuisineData3['FooterContactUs']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">How to use Cookies Text</label></td>
    <td><input id="FooterHowtoCookies" name="FooterHowtoCookies" value="<?php echo $CuisineData3['FooterHowtoCookies']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkareYou">Restaurant Owner Text</label></td>
    <td><input id="FooterRestaurantOwner" name="FooterRestaurantOwner" value="<?php echo $CuisineData3['FooterRestaurantOwner']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Service Guarantee Text</label></td>
    <td><input id="FooterGurantee" name="FooterGurantee" value="<?php echo $CuisineData3['FooterGurantee']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkareYou">Career with us Text</label></td>
    <td><input id="FooterCareerwithUs" name="FooterCareerwithUs" value="<?php echo $CuisineData3['FooterCareerwithUs']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
   <tr>
 <td><label for="FooterRefund">Refund Guarantee Text</label></td>
    <td><input id="FooterRefund" name="FooterRefund" value="<?php echo $CuisineData3['FooterRefund']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterPress">Press Text</label></td>
    <td><input id="FooterPress" name="FooterPress" value="<?php echo $CuisineData3['FooterPress']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Disclaimer Text</label></td>
    <td><input id="FooterDisclaimer" name="FooterDisclaimer" value="<?php echo $CuisineData3['FooterDisclaimer']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkareYou">Restaurants join here Text</label></td>
    <td><input id="FooterRestaurantJoin" name="FooterRestaurantJoin" value="<?php echo $CuisineData3['FooterRestaurantJoin']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Get a Franchise Text</label></td>
    <td><input id="FooterFranchise" name="FooterFranchise" value="<?php echo $CuisineData3['FooterFranchise']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="FooterWorkareYou">All rights reserved. Text</label></td>
    <td><input id="FooterAllrightreserved" name="FooterAllrightreserved" value="<?php echo $CuisineData3['FooterAllrightreserved']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Sign Up Now Text</label></td>
    <td><input id="FooterSignupButton" name="FooterSignupButton" value="<?php echo $CuisineData3['FooterSignupButton']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResOpentimeText">Order Search Placeholder Text</label></td>
    <td><input id="FooterOrderSearchPlace" name="FooterOrderSearchPlace" value="<?php echo $CuisineData3['FooterOrderSearchPlace']; ?>" type="text"  style="width:300px;"/></td>
    
  </tr>
  
  
  

  
  
</table>	</fieldset>
                                    <fieldset>
													<legend>Search Text Translate</legend>
                                                    
                                                    <table width="100%" border="0">
                                                
  <tr><td colspan="4"><strong style="color:#0000CC;">4 Step Text Translate</strong></td></tr>
   <tr>
 <td><label for="ResOpentimeText">Search Text</label></td>
    <td><input id="SetpSearchText" name="SetpSearchText" value="<?php echo $CuisineData['SetpSearchText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Select Restaurant Text</label></td>
    <td><input id="SetpSelectRestaurantText" name="SetpSelectRestaurantText" value="<?php echo $CuisineData['SetpSelectRestaurantText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Place Order Text</label></td>
    <td><input id="SetpPlaceOrderText" name="SetpPlaceOrderText" value="<?php echo $CuisineData['SetpPlaceOrderText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Checkout Text</label></td>
    <td><input id="SetpCheckoutText" name="SetpCheckoutText" value="<?php echo $CuisineData['SetpCheckoutText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
   <tr><td colspan="4"><strong style="color:#0000CC;">Search Page Text Translate</strong></td></tr>
   <tr>
 <td><label for="ResOpentimeText">City Name Text</label></td>
    <td><input id="CityNameText" name="CityNameText" value="<?php echo $CuisineData['CityNameText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">District Text</label></td>
    <td><input id="DistrictText" name="DistrictText" value="<?php echo $CuisineData['DistrictText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Find Your Food Text</label></td>
    <td><input id="FindYourFoodText" name="FindYourFoodText" value="<?php echo $CuisineData['FindYourFoodText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Cuisines Text</label></td>
    <td><input id="CuisinesText" name="CuisinesText" value="<?php echo $CuisineData['CuisinesText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">Restaurant Rating Text</label></td>
    <td><input id="RestaurantRatingText" name="RestaurantRatingText" value="<?php echo $CuisineData['RestaurantRatingText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Delivery Minimum Text</label></td>
    <td><input id="DeliveryMinimumText" name="DeliveryMinimumText" value="<?php echo $CuisineData['DeliveryMinimumText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
 
   <tr>
 <td><label for="ResOpentimeText">Show Only Text</label></td>
    <td><input id="ShowOnlyText" name="ShowOnlyText" value="<?php echo $CuisineData1['ShowOnlyText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Suggest a Restaurant Text</label></td>
    <td><input id="SuggestArestaurantText" name="SuggestArestaurantText" value="<?php echo $CuisineData1['SuggestArestaurantText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">Order Button Text</label></td>
    <td><input id="OrderButtonText" name="OrderButtonText" value="<?php echo $CuisineData1['OrderButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">PreOrder Button Text</label></td>
    <td><input id="PreOrderButtonText" name="PreOrderButtonText" value="<?php echo $CuisineData1['PreOrderButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="ResOpentimeText">Close Button Text</label></td>
    <td><input id="CloseOrderButtonText" name="CloseOrderButtonText" value="<?php echo $CuisineData1['CloseOrderButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">ViewTiming Text</label></td>
    <td><input id="ViewTimingText" name="ViewTimingText" value="<?php echo $CuisineData1['ViewTimingText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">Restaurant Heading Text</label></td>
    <td><input id="RestaurantHeadingText" name="RestaurantHeadingText" value="<?php echo $CuisineData1['RestaurantHeadingText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Grade Text</label></td>
    <td><input id="GradeText" name="GradeText" value="<?php echo $CuisineData1['GradeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">DeliveryTime Text</label></td>
    <td><input id="DeliveryTimeText" name="DeliveryTimeText" value="<?php echo $CuisineData1['DeliveryTimeText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">MinOrder Text</label></td>
    <td><input id="MinOrderText" name="MinOrderText" value="<?php echo $CuisineData1['MinOrderText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
     <tr>
 <td><label for="ResOpentimeText">Deals Text</label></td>
    <td><input id="DealsText" name="DealsText" value="<?php echo $CuisineData1['DealsText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Change Address Text</label></td>
    <td><input id="ChangeAddressText" name="ChangeAddressText" value="<?php echo $CuisineData1['ChangeAddressText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResOpentimeText">Did not find what you're looking for? Text</label></td>
    <td><input id="FindWhatText" name="FindWhatText" value="<?php echo $CuisineData1['FindWhatText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Back To Top Text</label></td>
    <td><input id="BackToTopText" name="BackToTopText" value="<?php echo $CuisineData1['BackToTopText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="ResOpentimeText">Close Restaurant Alert Text</label></td>
    <td><input id="closeOrderAlert" name="closeOrderAlert" value="<?php echo $CuisineData1['closeOrderAlert']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Preorder Restaurant Alert Text</label></td>
    <td><input id="PreorderOrderAlert" name="PreorderOrderAlert" value="<?php echo $CuisineData1['PreorderOrderAlert']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">More Than Text</label></td>
    <td><input id="MoreThan" name="MoreThan" value="<?php echo $CuisineData2['MoreThan']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Reset Minimum Text</label></td>
    <td><input id="ResetMinimum" name="ResetMinimum" value="<?php echo $CuisineData2['ResetMinimum']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Reset Rating Text</label></td>
    <td><input id="ResetRating" name="ResetRating" value="<?php echo $CuisineData2['ResetRating']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Search Text</label></td>
    <td><input id="SearchFilterText" name="SearchFilterText" value="<?php echo $CuisineData2['SearchFilterText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">State Text</label></td>
    <td><input id="StateFilterText" name="StateFilterText" value="<?php echo $CuisineData2['StateFilterText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">City Text</label></td>
    <td><input id="CityFilterText" name="CityFilterText" value="<?php echo $CuisineData2['CityFilterText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Open restaurants Text</label></td>
    <td><input id="OpenRestaurantFilterText" name="OpenRestaurantFilterText" value="<?php echo $CuisineData2['OpenRestaurantFilterText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Deals Available Text</label></td>
    <td><input id="DealsAvailableFilterText" name="DealsAvailableFilterText" value="<?php echo $CuisineData2['DealsAvailableFilterText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Home Delivery available Text</label></td>
    <td><input id="HomeDeliveryRestaurantFilterText" name="HomeDeliveryRestaurantFilterText" value="<?php echo $CuisineData2['HomeDeliveryRestaurantFilterText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Pickup available Text</label></td>
    <td><input id="PickupAvailableFilterText" name="PickupAvailableFilterText" value="<?php echo $CuisineData2['PickupAvailableFilterText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="ResOpentimeText">Home Delivery+Pickup Text</label></td>
    <td><input id="HomeDeliveryPickupRestaurantFilterText" name="HomeDeliveryPickupRestaurantFilterText" value="<?php echo $CuisineData2['HomeDeliveryPickupRestaurantFilterText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText"> Restaurants serving Text</label></td>
    <td><input id="RestaurantServeFilterText" name="RestaurantServeFilterText" value="<?php echo $CuisineData2['RestaurantServeFilterText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
 
  
</table>	</fieldset>









  <fieldset>
													<legend>Restaurant Text Translate</legend>
                                                    
                                                    <table width="100%" border="0">
                                                  <tr>
 <td><label for="ResMenuText">Menu Tab Text</label></td>
    <td><input id="ResMenuText" name="ResMenuText" value="<?php echo $CuisineData['ResMenuText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResinfoText">About Tab Text</label></td>
    <td><input id="ResinfoText" name="ResinfoText" value="<?php echo $CuisineData['ResinfoText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResRatingText">Rating Tab Text</label></td>
    <td><input id="ResRatingText" name="ResRatingText" value="<?php echo $CuisineData['ResRatingText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResGalleryText">Book a Table Tab Text</label></td>
    <td><input id="ResGalleryText1" name="ResGalleryText1" value="<?php echo $CuisineData1['ResGalleryText1']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResRatingText">Previouse Tab Text</label></td>
    <td><input id="ResPreviouseTabText" name="ResPreviouseTabText" value="<?php echo $CuisineData['ResPreviouseTabText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResGalleryText">Offers Tab Text</label></td>
    <td><input id="ResOfferTabText" name="ResOfferTabText" value="<?php echo $CuisineData['ResOfferTabText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Open Time Text</label></td>
    <td><input id="ResOpentimeText" name="ResOpentimeText" value="<?php echo $CuisineData['ResOpentimeText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Close Time Text</label></td>
    <td><input id="ResClosetimeText" name="ResClosetimeText" value="<?php echo $CuisineData['ResClosetimeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
  <tr>
 <td><label for="ResRatingText">Average User Rating Text</label></td>
    <td><input id="ResAverageUserRating" name="ResAverageUserRating" value="<?php echo $CuisineData4['ResAverageUserRating']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResPickyourOrderText">Pick up your order in Text</label></td>
    <td><input id="ResPickyourOrderText" name="ResPickyourOrderText" value="<?php echo $CuisineData4['ResPickyourOrderText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResMinDeliveryOrderText">Min Delivery rder Text</label></td>
    <td><input id="ResMinDeliveryOrderText" name="ResMinDeliveryOrderText" value="<?php echo $CuisineData4['ResMinDeliveryOrderText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResMinDeliveryFee">Delivery Fee Text</label></td>
    <td><input id="ResMinDeliveryFee" name="ResMinDeliveryFee" value="<?php echo $CuisineData4['ResMinDeliveryFee']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Email Restaurant Text</label></td>
    <td><input id="ResEmailRestaurant" name="ResEmailRestaurant" value="<?php echo $CuisineData4['ResEmailRestaurant']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResAddtoFavouriteText">Add to Favourite Text</label></td>
    <td><input id="ResAddtoFavouriteText" name="ResAddtoFavouriteText" value="<?php echo $CuisineData4['ResAddtoFavouriteText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResYourOrderText">Your Order Text</label></td>
    <td><input id="ResYourOrderText" name="ResYourOrderText" value="<?php echo $CuisineData4['ResYourOrderText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResYourAddressText">Your Address Text</label></td>
    <td><input id="ResYourAddressText" name="ResYourAddressText" value="<?php echo $CuisineData4['ResYourAddressText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Select Category Text</label></td>
    <td><input id="ResSelectCategoryText" name="ResSelectCategoryText" value="<?php echo $CuisineData4['ResSelectCategoryText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResOnlineOfferText">Online Offers Text</label></td>
    <td><input id="ResOnlineOfferText" name="ResOnlineOfferText" value="<?php echo $CuisineData4['ResOnlineOfferText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">OnlineDeals Text</label></td>
    <td><input id="ResOnlineDealsText" name="ResOnlineDealsText" value="<?php echo $CuisineData4['ResOnlineDealsText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResOnlineDealsErrorText">No Online Deals available Text</label></td>
    <td><input id="ResOnlineDealsErrorText" name="ResOnlineDealsErrorText" value="<?php echo $CuisineData4['ResOnlineDealsErrorText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">No Online Offers available Text</label></td>
    <td><input id="ResOnlineOfferErrorText" name="ResOnlineOfferErrorText" value="<?php echo $CuisineData4['ResOnlineOfferErrorText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResOfferDiscountText">Discount offer Text</label></td>
    <td><input id="ResOfferDiscountText" name="ResOfferDiscountText" value="<?php echo $CuisineData4['ResOfferDiscountText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResBackTorestaurantText">Back to restaurants Text</label></td>
    <td><input id="ResBackTorestaurantText" name="ResBackTorestaurantText" value="<?php echo $CuisineData4['ResBackTorestaurantText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Cart Order Button Text</label></td>
    <td><input id="ResCartOrderButtonText" name="ResCartOrderButtonText" value="<?php echo $CuisineData4['ResCartOrderButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Cart MinOrder Message Text</label></td>
    <td><input id="ResCartminMessageText" name="ResCartminMessageText" value="<?php echo $CuisineData4['ResCartminMessageText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResOverviewText">Overview Text</label></td>
    <td><input id="ResOverviewText" name="ResOverviewText" value="<?php echo $CuisineData4['ResOverviewText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResOpentimeText">Address Text</label></td>
    <td><input id="ResAddressText" name="ResAddressText" value="<?php echo $CuisineData4['ResAddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResDeliveryHoursText">Delivery Hours Text</label></td>
    <td><input id="ResDeliveryHoursText" name="ResDeliveryHoursText" value="<?php echo $CuisineData4['ResDeliveryHoursText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Takeway Hours Text</label></td>
    <td><input id="ResTakewayHoursText" name="ResTakewayHoursText" value="<?php echo $CuisineData4['ResTakewayHoursText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResPickupTimeText">Pickup Time Text</label></td>
    <td><input id="ResPickupTimeText" name="ResPickupTimeText" value="<?php echo $CuisineData4['ResPickupTimeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResDeliveryTimText">DeliveryTime Text</label></td>
    <td><input id="ResDeliveryTimText" name="ResDeliveryTimText" value="<?php echo $CuisineData4['ResDeliveryTimText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResClosetimeText">Close Time Text</label></td>
    <td><input id="ResClosetimeText" name="ResClosetimeText" value="<?php echo $CuisineData4['ResClosetimeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Payment Types Text</label></td>
    <td><input id="ResPaymentTypesText" name="ResPaymentTypesText" value="<?php echo $CuisineData4['ResPaymentTypesText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResGalleryText">Book a table at Justfood Text</label></td>
    <td><input id="ResBookatableatText" name="ResBookatableatText" value="<?php echo $CuisineData4['ResBookatableatText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResBookNOwButtonText">Book Now Button Text</label></td>
    <td><input id="ResBookNOwButtonText" name="ResBookNOwButtonText" value="<?php echo $CuisineData4['ResBookNOwButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResSortByText">Sort By Text</label></td>
    <td><input id="ResSortByText" name="ResSortByText" value="<?php echo $CuisineData4['ResSortByText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Login here to give rating & Review for Text</label></td>
    <td><input id="ResgiveRatingReviewText" name="ResgiveRatingReviewText" value="<?php echo $CuisineData4['ResgiveRatingReviewText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResLoginHeretoPreOrderText">Login here to see the orders you have made in Text</label></td>
    <td><input id="ResLoginHeretoPreOrderText" name="ResLoginHeretoPreOrderText" value="<?php echo $CuisineData4['ResLoginHeretoPreOrderText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr><td colspan="4"><strong style="color:#0000CC;">Form Field Text Translate</strong></td></tr>
   <tr>
 <td><label for="ResFormFieldNameText">Name Text</label></td>
    <td><input id="ResFormFieldNameText" name="ResFormFieldNameText" value="<?php echo $CuisineData5['ResFormFieldNameText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldEmailText">Email Text</label></td>
    <td><input id="ResFormFieldEmailText" name="ResFormFieldEmailText" value="<?php echo $CuisineData5['ResFormFieldEmailText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Password Text</label></td>
    <td><input id="ResFormFieldPasswordText" name="ResFormFieldPasswordText" value="<?php echo $CuisineData5['ResFormFieldPasswordText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResLoginHeretoPreOrderText">Contact No Text</label></td>
    <td><input id="ResFormFieldContactText" name="ResFormFieldContactText" value="<?php echo $CuisineData5['ResFormFieldContactText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResFormFieldNoofPeopleText">No. of people Text</label></td>
    <td><input id="ResFormFieldNoofPeopleText" name="ResFormFieldNoofPeopleText" value="<?php echo $CuisineData5['ResFormFieldNoofPeopleText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldEatTypeText">Eat Type Text</label></td>
    <td><input id="ResFormFieldEatTypeText" name="ResFormFieldEatTypeText" value="<?php echo $CuisineData5['ResFormFieldEatTypeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Date Text</label></td>
    <td><input id="ResFormFieldDateText" name="ResFormFieldDateText" value="<?php echo $CuisineData5['ResFormFieldDateText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldTimeBrandText">Time Band Text</label></td>
    <td><input id="ResFormFieldTimeBrandText" name="ResFormFieldTimeBrandText" value="<?php echo $CuisineData5['ResFormFieldTimeBrandText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResFormFieldTSpecialRequestText">Any Special Request Text</label></td>
    <td><input id="ResFormFieldTSpecialRequestText" name="ResFormFieldTSpecialRequestText" value="<?php echo $CuisineData5['ResFormFieldTSpecialRequestText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResSortByText">Social Logins Text</label></td>
    <td><input id="ResFormFieldTSocialLoginText" name="ResFormFieldTSocialLoginText" value="<?php echo $CuisineData5['ResFormFieldTSocialLoginText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Sign in via your social account Text</label></td>
    <td><input id="ResFormFieldTSocialAcountViaText" name="ResFormFieldTSocialAcountViaText" value="<?php echo $CuisineData5['ResFormFieldTSocialAcountViaText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResLoginHeretoPreOrderText">I have a account and password
(login to your account for faster checkout) Text</label></td>
    <td><input id="ResFormFieldTFasterCheckText" name="ResFormFieldTFasterCheckText" value="<?php echo $CuisineData5['ResFormFieldTFasterCheckText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResFormFieldGuestUserText">Continue as Guest User(You do not need to login) Text</label></td>
    <td><input id="ResFormFieldGuestUserText" name="ResFormFieldGuestUserText" value="<?php echo $CuisineData5['ResFormFieldGuestUserText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldProceedText">Proceed Text</label></td>
    <td><input id="ResFormFieldProceedText" name="ResFormFieldProceedText" value="<?php echo $CuisineData5['ResFormFieldProceedText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Add new delivery address Text</label></td>
    <td><input id="ResFormFieldAddDeliveryAddressText" name="ResFormFieldAddDeliveryAddressText" value="<?php echo $CuisineData5['ResFormFieldAddDeliveryAddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResLoginHeretoPreOrderText">Address Text</label></td>
    <td><input id="ResFormFieldAddressText" name="ResFormFieldAddressText" value="<?php echo $CuisineData5['ResFormFieldAddressText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
  
   <tr>
 <td><label for="ResRatingText">Name The Bell Text</label></td>
    <td><input id="ResFormFieldNameofBellText" name="ResFormFieldNameofBellText" value="<?php echo $CuisineData5['ResFormFieldNameofBellText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldFloorText">Floor Text</label></td>
    <td><input id="ResFormFieldFloorText" name="ResFormFieldFloorText" value="<?php echo $CuisineData5['ResFormFieldFloorText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResFormFieldLandLineText">Landline Address Text</label></td>
    <td><input id="ResFormFieldLandLineText" name="ResFormFieldLandLineText" value="<?php echo $CuisineData5['ResFormFieldLandLineText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldCountryText">Country Text</label></td>
    <td><input id="ResFormFieldCountryText" name="ResFormFieldCountryText" value="<?php echo $CuisineData5['ResFormFieldCountryText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Street Address(eg last bell) Text</label></td>
    <td><input id="ResFormFieldStreetAddressText" name="ResFormFieldStreetAddressText" value="<?php echo $CuisineData5['ResFormFieldStreetAddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldPincodeText">Pincode Text</label></td>
    <td><input id="ResFormFieldPincodeText" name="ResFormFieldPincodeText" value="<?php echo $CuisineData5['ResFormFieldPincodeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
  
  
  
  <tr>
 <td><label for="ResRatingText">CheckOut Text</label></td>
    <td><input id="ResFormFieldCheckoutText" name="ResFormFieldCheckoutText" value="<?php echo $CuisineData5['ResFormFieldCheckoutText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFieldShippingAddText">Shipping Address Text</label></td>
    <td><input id="ResFormFieldShippingAddText" name="ResFormFieldShippingAddText" value="<?php echo $CuisineData5['ResFormFieldShippingAddText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResFormFieldRestaurantAddText">Restaurant Address Text</label></td>
    <td><input id="ResFormFieldRestaurantAddText" name="ResFormFieldRestaurantAddText" value="<?php echo $CuisineData5['ResFormFieldRestaurantAddText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFielItemDetailText">Item detail Text</label></td>
    <td><input id="ResFormFielItemDetailText" name="ResFormFielItemDetailText" value="<?php echo $CuisineData5['ResFormFielItemDetailText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Per Unit Price Text</label></td>
    <td><input id="ResFormFielItemPerUnitText" name="ResFormFielItemPerUnitText" value="<?php echo $CuisineData5['ResFormFielItemPerUnitText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFielItemUnitText">Units Text</label></td>
    <td><input id="ResFormFielItemUnitText" name="ResFormFielItemUnitText" value="<?php echo $CuisineData5['ResFormFielItemUnitText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
  
  
  
  <tr>
 <td><label for="ResRatingText">Total Price Text</label></td>
    <td><input id="ResFormFielItemTotalPriceText" name="ResFormFielItemTotalPriceText" value="<?php echo $CuisineData5['ResFormFielItemTotalPriceText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResLoginHeretoPreOrderText">Coupon Code Text</label></td>
    <td><input id="ResFormFielItemCouponCodeText" name="ResFormFielItemCouponCodeText" value="<?php echo $CuisineData5['ResFormFielItemCouponCodeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ResFormFielApplyButtonText">Apply Button Text</label></td>
    <td><input id="ResFormFielApplyButtonText" name="ResFormFielApplyButtonText" value="<?php echo $CuisineData5['ResFormFielApplyButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFielSubTotalText">Sub Total Text</label></td>
    <td><input id="ResFormFielSubTotalText" name="ResFormFielSubTotalText" value="<?php echo $CuisineData5['ResFormFielSubTotalText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Delivery Date Text</label></td>
    <td><input id="ResFormFielDeliveryDateText" name="ResFormFielDeliveryDateText" value="<?php echo $CuisineData5['ResFormFielDeliveryDateText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResLoginHeretoPreOrderText">Order Type Text</label></td>
    <td><input id="ResFormFielOrderTypeText" name="ResFormFielOrderTypeText" value="<?php echo $CuisineData5['ResFormFielOrderTypeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
  
   <tr>
 <td><label for="ResFormFielPaymentMethodConfirmText">Payment Method and Confirmation Text</label></td>
    <td><input id="ResFormFielPaymentMethodConfirmText" name="ResFormFielPaymentMethodConfirmText" value="<?php echo $CuisineData5['ResFormFielPaymentMethodConfirmText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFielCashOnDeliText">Cash On Delivery Text</label></td>
    <td><input id="ResFormFielCashOnDeliText" name="ResFormFielCashOnDeliText" value="<?php echo $CuisineData5['ResFormFielCashOnDeliText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="ResRatingText">Paypal Text</label></td>
    <td><input id="ResFormFielPayaplText" name="ResFormFielPayaplText" value="<?php echo $CuisineData5['ResFormFielPayaplText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFielCreditCardText">Credit Card Text</label></td>
    <td><input id="ResFormFielCreditCardText" name="ResFormFielCreditCardText" value="<?php echo $CuisineData5['ResFormFielCreditCardText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="ResRatingText">Continue Text</label></td>
    <td><input id="ResFormFielContinueText" name="ResFormFielContinueText" value="<?php echo $CuisineData5['ResFormFielContinueText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ResFormFielCouponInvalidText"> Coupon Code invalid Message Text</label></td>
    <td><input id="ResFormFielCouponInvalidText" name="ResFormFielCouponInvalidText" value="<?php echo $CuisineData5['ResFormFielCouponInvalidText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   
   
  
 
  
</table>	</fieldset>




<fieldset>
													<legend>User Account Text Translate</legend>
                                                    
                                                    <table width="100%" border="0">
                                                  <tr>
 <td><label for="CustMyaccountText">Account Home Text</label></td>
    <td><input id="CustMyaccountText" name="CustMyaccountText" value="<?php echo $CuisineData['CustMyaccountText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustMyOrderText">Order Overview Text</label></td>
    <td><input id="CustMyOrderText" name="CustMyOrderText" value="<?php echo $CuisineData['CustMyOrderText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="CustRatingText">Your Review Text</label></td>
    <td><input id="CustRatingText" name="CustRatingText" value="<?php echo $CuisineData['CustRatingText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustTellYourFriend">Tell Your Friend Text</label></td>
    <td><input id="CustTellYourFriend" name="CustTellYourFriend" value="<?php echo $CuisineData6['CustTellYourFriend']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="CustMyaddressText">Address Book Text</label></td>
    <td><input id="CustMyaddressText" name="CustMyaddressText" value="<?php echo $CuisineData['CustMyaddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustMyloyalityText">Loyality Point Text</label></td>
    <td><input id="CustMyloyalityText" name="CustMyloyalityText" value="<?php echo $CuisineData['CustMyloyalityText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="CustMyfavoriteText">Your Favourite Restaurant Text</label></td>
    <td><input id="CustMyfavoriteText" name="CustMyfavoriteText" value="<?php echo $CuisineData['CustMyfavoriteText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustlogoutText">Logout Text</label></td>
    <td><input id="CustlogoutText" name="CustlogoutText" value="<?php echo $CuisineData['CustlogoutText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="CustDeleteText">Delete Button Text</label></td>
    <td><input id="CustDeleteText" name="CustDeleteText" value="<?php echo $CuisineData['CustDeleteText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustEditText">Edit Button  Text</label></td>
    <td><input id="CustEditText" name="CustEditText" value="<?php echo $CuisineData['CustEditText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
     <tr>
 <td><label for="CustChangeProfile">Change Profile Text</label></td>
    <td><input id="CustChangeProfile" name="CustChangeProfile" value="<?php echo $CuisineData6['CustChangeProfile']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustChangePassword">Change Password Text</label></td>
    <td><input id="CustChangePassword" name="CustChangePassword" value="<?php echo $CuisineData6['CustChangePassword']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
 <td><label for="CustStatistics">Statistics Text</label></td>
    <td><input id="CustStatistics" name="CustStatistics" value="<?php echo $CuisineData6['CustStatistics']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustNoofOrder">No. of Order Text</label></td>
    <td><input id="CustNoofOrder" name="CustNoofOrder" value="<?php echo $CuisineData6['CustNoofOrder']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
   <tr>
 <td><label for="CustNoofReview">No. of Review Text</label></td>
    <td><input id="CustNoofReview" name="CustNoofReview" value="<?php echo $CuisineData6['CustNoofReview']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustNoofFavourite">No. of Favourite Restaurant Text</label></td>
    <td><input id="CustNoofFavourite" name="CustNoofFavourite" value="<?php echo $CuisineData6['CustNoofFavourite']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
     <tr>
 <td><label for="CustNoofLoyalityPoint">No. of Loyality Point Text</label></td>
    <td><input id="CustNoofLoyalityPoint" name="CustNoofLoyalityPoint" value="<?php echo $CuisineData6['CustNoofLoyalityPoint']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustNoofFilterBy">Filter By Text</label></td>
    <td><input id="CustNoofFilterBy" name="CustNoofFilterBy" value="<?php echo $CuisineData6['CustNoofFilterBy']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
   <tr>
 <td><label for="CustSelectRestaurant">Select Restaurant Text</label></td>
    <td><input id="CustSelectRestaurant" name="CustSelectRestaurant" value="<?php echo $CuisineData6['CustSelectRestaurant']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustNoofFilterButton">Filter Buttom Text</label></td>
    <td><input id="CustNoofFilterButton" name="CustNoofFilterButton" value="<?php echo $CuisineData6['CustNoofFilterButton']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
 <td><label for="CustOrderNoText">Order No Text</label></td>
    <td><input id="CustOrderNoText" name="CustOrderNoText" value="<?php echo $CuisineData6['CustOrderNoText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustOrderDateText">Order Date Text</label></td>
    <td><input id="CustOrderDateText" name="CustOrderDateText" value="<?php echo $CuisineData6['CustOrderDateText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
 <td><label for="CustOrderAMountText">Amount Text</label></td>
    <td><input id="CustOrderAMountText" name="CustOrderAMountText" value="<?php echo $CuisineData6['CustOrderAMountText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustOrderStatusText">Order Status Text</label></td>
    <td><input id="CustOrderStatusText" name="CustOrderStatusText" value="<?php echo $CuisineData6['CustOrderStatusText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
 <td><label for="CustOrderRestaurantNameText">Restaurant Name Text</label></td>
    <td><input id="CustOrderRestaurantNameText" name="CustOrderRestaurantNameText" value="<?php echo $CuisineData6['CustOrderRestaurantNameText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustOrderDetailNameText">Details Text</label></td>
    <td><input id="CustOrderDetailNameText" name="CustOrderDetailNameText" value="<?php echo $CuisineData6['CustOrderDetailNameText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>  
  <tr>
 <td><label for="CustOrderOrderDeatilText">Order Detail Text</label></td>
    <td><input id="CustOrderOrderDeatilText" name="CustOrderOrderDeatilText" value="<?php echo $CuisineData6['CustOrderOrderDeatilText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustOrderLeaveAReviewText">Leave A Review Text</label></td>
    <td><input id="CustOrderLeaveAReviewText" name="CustOrderLeaveAReviewText" value="<?php echo $CuisineData6['CustOrderLeaveAReviewText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
 <td><label for="CustEarnPointLoyalityText">Earned Points Text</label></td>
    <td><input id="CustEarnPointLoyalityText" name="CustEarnPointLoyalityText" value="<?php echo $CuisineData6['CustEarnPointLoyalityText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustUsedPointLoyalityText">Used Points Text</label></td>
    <td><input id="CustUsedPointLoyalityText" name="CustUsedPointLoyalityText" value="<?php echo $CuisineData6['CustUsedPointLoyalityText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
 <td><label for="CustTotalPointLoyalityText">Total Point Text</label></td>
    <td><input id="CustTotalPointLoyalityText" name="CustTotalPointLoyalityText" value="<?php echo $CuisineData6['CustTotalPointLoyalityText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustShareMessageWithFriedText">Share your message with your friend Text</label></td>
    <td><input id="CustShareMessageWithFriedText" name="CustShareMessageWithFriedText" value="<?php echo $CuisineData6['CustShareMessageWithFriedText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
 <tr>
 <td><label for="CustRating_reviewText">Rating Text</label></td>
    <td><input id="CustRating_reviewText" name="CustRating_reviewText" value="<?php echo $CuisineData6['CustRating_reviewText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustRating_reviewCommentText">Comment Text</label></td>
    <td><input id="CustRating_reviewCommentText" name="CustRating_reviewCommentText" value="<?php echo $CuisineData6['CustRating_reviewCommentText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
    <tr>
 <td><label for="CustRating_reviewNoMsgText">There is no rating & review Text</label></td>
    <td><input id="CustRating_reviewNoMsgText" name="CustRating_reviewNoMsgText" value="<?php echo $CuisineData6['CustRating_reviewNoMsgText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustFaviouruteNoMsgText">There is no favourite restaurant Text</label></td>
    <td><input id="CustFaviouruteNoMsgText" name="CustFaviouruteNoMsgText" value="<?php echo $CuisineData6['CustFaviouruteNoMsgText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
<tr>
 <td><label for="CustAddressBookDescription">Address Book DescriptionText</label></td>
    <td><input id="CustAddressBookDescription" name="CustAddressBookDescription" value="<?php echo $CuisineData6['CustAddressBookDescription']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustAddressLabelText">Address Label Text</label></td>
    <td><input id="CustAddressLabelText" name="CustAddressLabelText" value="<?php echo $CuisineData6['CustAddressLabelText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
<tr>
 <td><label for="CustAddressText">Address Text</label></td>
    <td><input id="CustAddressText" name="CustAddressText" value="<?php echo $CuisineData6['CustAddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CustCreateNewAddressText">Create New Address Text</label></td>
    <td><input id="CustCreateNewAddressText" name="CustCreateNewAddressText" value="<?php echo $CuisineData6['CustCreateNewAddressText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
</table>	</fieldset>
                                    
                                    <fieldset>
                                    
                                    	<legend>How To Works Text Translate</legend>
                                                    
                                                    <table width="100%" border="0">
                                                  <tr>
 <td><label for="HowToworkTextStep1">Step 1 Text</label></td>
    <td><input id="HowToworkTextStep1" name="HowToworkTextStep1" value="<?php echo $CuisineData['HowToworkTextStep1']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="HowToworkTextsmallStep1">Small Step 1 Text</label></td>
    <td><input id="HowToworkTextsmallStep1" name="HowToworkTextsmallStep1" value="<?php echo $CuisineData1['HowToworkTextsmallStep1']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="HowToworkTextStep2">Step 2 Text</label></td>
    <td><input id="HowToworkTextStep2" name="HowToworkTextStep2" value="<?php echo $CuisineData['HowToworkTextStep2']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="HowToworkTextsmallStep2">Small Step 1 Text</label></td>
    <td><input id="HowToworkTextsmallStep2" name="HowToworkTextsmallStep2" value="<?php echo $CuisineData['HowToworkTextsmallStep2']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
     <tr>
 <td><label for="HowToworkTextStep3">Step 3 Text</label></td>
    <td><input id="HowToworkTextStep3" name="HowToworkTextStep3" value="<?php echo $CuisineData1['HowToworkTextStep3']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="HowToworkTextsmallStep3">Small Step 3 Text</label></td>
    <td><input id="HowToworkTextsmallStep3" name="HowToworkTextsmallStep3" value="<?php echo $CuisineData['HowToworkTextsmallStep3']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="HowToworkTextStep4">Step 4 Text</label></td>
    <td><input id="HowToworkTextStep4" name="HowToworkTextStep4" value="<?php echo $CuisineData1['HowToworkTextStep4']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="HowToworkTextsmallStep4">Small Step 1 Text</label></td>
    <td><input id="HowToworkTextsmallStep4" name="HowToworkTextsmallStep4" value="<?php echo $CuisineData1['HowToworkTextsmallStep4']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
   <tr>
 <td><label for="Enter_keywordText">Enter Keyword Text</label></td>
    <td><input id="Enter_keywordText" name="Enter_keywordText" value="<?php echo $CuisineData7['Enter_keywordText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="sundayText">Sunday Text</label></td>
    <td><input id="sundayText" name="sundayText" value="<?php echo $CuisineData7['sundayText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
   <tr>
 <td><label for="mondayText">Monday Text</label></td>
    <td><input id="mondayText" name="mondayText" value="<?php echo $CuisineData7['mondayText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="tuesdayText">Tuesday Text</label></td>
    <td><input id="tuesdayText" name="tuesdayText" value="<?php echo $CuisineData7['tuesdayText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="wednesdayText">Wednesday Text</label></td>
    <td><input id="wednesdayText" name="wednesdayText" value="<?php echo $CuisineData7['wednesdayText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="thursdayText">Thursday Text</label></td>
    <td><input id="thursdayText" name="thursdayText" value="<?php echo $CuisineData7['thursdayText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="fridaydayText">Friday Text</label></td>
    <td><input id="fridaydayText" name="fridaydayText" value="<?php echo $CuisineData7['fridaydayText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="saturdayText">Saturday Text</label></td>
    <td><input id="saturdayText" name="saturdayText" value="<?php echo $CuisineData7['saturdayText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="cartemptyText">Your cart is empty Text</label></td>
    <td><input id="cartemptyText" name="cartemptyText" value="<?php echo $CuisineData7['cartemptyText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="remainingText">Remaining Text</label></td>
    <td><input id="remainingText" name="remainingText" value="<?php echo $CuisineData7['remainingText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="minimumorderamountfillText">to fill the minimum order amount is Text</label></td>
    <td><input id="minimumorderamountfillText" name="minimumorderamountfillText" value="<?php echo $CuisineData7['minimumorderamountfillText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ratingwithoutcommentText">Rating without Comment Text</label></td>
    <td><input id="ratingwithoutcommentText" name="ratingwithoutcommentText" value="<?php echo $CuisineData7['ratingwithoutcommentText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
    <tr>
 <td><label for="rating_CommentText">Rating & Comment Text</label></td>
    <td><input id="rating_CommentText" name="rating_CommentText" value="<?php echo $CuisineData7['rating_CommentText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="StarText">Star Text</label></td>
    <td><input id="StarText" name="StarText" value="<?php echo $CuisineData7['StarText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="rating_CommentText">Posted On Text</label></td>
    <td><input id="Posted_onText" name="Posted_onText" value="<?php echo $CuisineData7['Posted_onText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="QualityText">Quality Text</label></td>
    <td><input id="QualityText" name="QualityText" value="<?php echo $CuisineData7['QualityText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="rating_CommentText">Service Text</label></td>
    <td><input id="ServiceRatingText" name="ServiceRatingText" value="<?php echo $CuisineData7['ServiceRatingText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="TimeRatingText">Time Text</label></td>
    <td><input id="TimeRatingText" name="TimeRatingText" value="<?php echo $CuisineData7['TimeRatingText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="SrNOText">Sr. No Text</label></td>
    <td><input id="SrNOText" name="SrNOText" value="<?php echo $CuisineData7['SrNOText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="OrderIDText">Order ID Text</label></td>
    <td><input id="OrderIDText" name="OrderIDText" value="<?php echo $CuisineData7['OrderIDText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="OrderPriceText">Order Price Text</label></td>
    <td><input id="OrderPriceText" name="OrderPriceText" value="<?php echo $CuisineData7['OrderPriceText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="OrderDateText">Order Date Text</label></td>
    <td><input id="OrderDateText" name="OrderDateText" value="<?php echo $CuisineData7['OrderDateText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="LatestRatingText">Latest Rating Text</label></td>
    <td><input id="LatestRatingText" name="LatestRatingText" value="<?php echo $CuisineData7['LatestRatingText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="HightestRatingText">Hightest Rating Text</label></td>
    <td><input id="HightestRatingText" name="HightestRatingText" value="<?php echo $CuisineData7['HightestRatingText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="FavouriteDoneText">Favorite Done Text</label></td>
    <td><input id="FavouriteDoneText" name="FavouriteDoneText" value="<?php echo $CuisineData7['FavouriteDoneText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ReviewRatingText">Review Text</label></td>
    <td><input id="ReviewRatingText" name="ReviewRatingText" value="<?php echo $CuisineData7['ReviewRatingText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="manadatory_Text">manadatory Text</label></td>
    <td><input id="manadatory_Text" name="manadatory_Text" value="<?php echo $CuisineData7['manadatory_Text']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="choose_materialText">choose material Text</label></td>
    <td><input id="choose_materialText" name="choose_materialText" value="<?php echo $CuisineData7['choose_materialText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="quantityText">Quantity Text</label></td>
    <td><input id="quantityText" name="quantityText" value="<?php echo $CuisineData7['quantityText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="specialInstruction">Special Instruction Text</label></td>
    <td><input id="specialInstruction" name="specialInstruction" value="<?php echo $CuisineData7['specialInstruction']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="addtoCartText">Add to Cart Text</label></td>
    <td><input id="addtoCartText" name="addtoCartText" value="<?php echo $CuisineData7['addtoCartText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="areyousurecloseText">Are you sure to close Text</label></td>
    <td><input id="areyousurecloseText" name="areyousurecloseText" value="<?php echo $CuisineData7['areyousurecloseText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="SendMessageText">Send Message Text</label></td>
    <td><input id="SendMessageText" name="SendMessageText" value="<?php echo $CuisineData7['SendMessageText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="submitButtonText">Submit Button Text</label></td>
    <td><input id="submitButtonText" name="submitButtonText" value="<?php echo $CuisineData7['submitButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="OrderViewText">Order Button Text</label></td>
    <td><input id="OrderViewText" name="OrderViewText" value="<?php echo $CuisineData7['OrderViewText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="OrderText">Total Text</label></td>
    <td><input id="OrderText" name="OrderText" value="<?php echo $CuisineData7['OrderText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="ChooseDeliveryAddressText">Choose Delivery Address Text</label></td>
    <td><input id="ChooseDeliveryAddressText" name="ChooseDeliveryAddressText" value="<?php echo $CuisineData7['ChooseDeliveryAddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ContinueButtonText">Continue Button Text</label></td>
    <td><input id="ContinueButtonText" name="ContinueButtonText" value="<?php echo $CuisineData7['ContinueButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="OfficeHomeText">Home,Offic Text</label></td>
    <td><input id="OfficeHomeText" name="OfficeHomeText" value="<?php echo $CuisineData7['OfficeHomeText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="SaveContinueButtonText">Save & Continue Text</label></td>
    <td><input id="SaveContinueButtonText" name="SaveContinueButtonText" value="<?php echo $CuisineData7['SaveContinueButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="OrderwillbedeliveredText">Your Order will be delivered Text</label></td>
    <td><input id="OrderwillbedeliveredText" name="OrderwillbedeliveredText" value="<?php echo $CuisineData7['OrderwillbedeliveredText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="yourSelectionText">Your Selection Text</label></td>
    <td><input id="yourSelectionText" name="yourSelectionText" value="<?php echo $CuisineData7['yourSelectionText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="CongratsText">Congrats your order Text</label></td>
    <td><input id="CongratsText" name="CongratsText" value="<?php echo $CuisineData7['CongratsText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="yourOrderDetailText">Your Order Detail Text</label></td>
    <td><input id="yourOrderDetailText" name="yourOrderDetailText" value="<?php echo $CuisineData7['yourOrderDetailText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="DeliveryAddressText">Delivery Address Text</label></td>
    <td><input id="DeliveryAddressText" name="DeliveryAddressText" value="<?php echo $CuisineData7['DeliveryAddressText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="TimeofOrderingText">Time of Ordering Text</label></td>
    <td><input id="TimeofOrderingText" name="TimeofOrderingText" value="<?php echo $CuisineData7['TimeofOrderingText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="orderwillbereachText">Your Order will be reach Text</label></td>
    <td><input id="orderwillbereachText" name="orderwillbereachText" value="<?php echo $CuisineData7['orderwillbereachText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="CheckyoouremailSpamText">Check your email Spam... Text</label></td>
    <td><input id="CheckyoouremailSpamText" name="CheckyoouremailSpamText" value="<?php echo $CuisineData7['CheckyoouremailSpamText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
    <tr>
 <td><label for="MobileCodeVerification">Mobile Code Verification Text</label></td>
    <td><input id="MobileCodeVerification" name="MobileCodeVerification" value="<?php echo $CuisineData7['MobileCodeVerification']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="MobileCodeVerificationMessage">Mobile Verification Mesage... Text</label></td>
    <td><input id="MobileCodeVerificationMessage" name="MobileCodeVerificationMessage" value="<?php echo $CuisineData7['MobileCodeVerificationMessage']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="verificationcodeText">Code Verification Text</label></td>
    <td><input id="verificationcodeText" name="verificationcodeText" value="<?php echo $CuisineData7['verificationcodeText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="verifyButtonText">Verify Button Text</label></td>
    <td><input id="verifyButtonText" name="verifyButtonText" value="<?php echo $CuisineData7['verifyButtonText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="sendagaincodeText">Send Verify code again Text</label></td>
    <td><input id="sendagaincodeText" name="sendagaincodeText" value="<?php echo $CuisineData7['sendagaincodeText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="invalidCodemessage">Mobile Code Error Text</label></td>
    <td><input id="invalidCodemessage" name="invalidCodemessage" value="<?php echo $CuisineData7['invalidCodemessage']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="itdoesnotMatterText">It's Doesnot Matter What.. Text</label></td>
    <td><input id="itdoesnotMatterText" name="itdoesnotMatterText" value="<?php echo $CuisineData7['itdoesnotMatterText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="sorryYouhavenoOrderText">Soory You have no any Order Made.. Text</label></td>
    <td><input id="sorryYouhavenoOrderText" name="sorryYouhavenoOrderText" value="<?php echo $CuisineData7['sorryYouhavenoOrderText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="myaccountText">My Account Text</label></td>
    <td><input id="myaccountText" name="myaccountText" value="<?php echo $CuisineData7['myaccountText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ratingavarageText">Rating Average Text</label></td>
    <td><input id="ratingavarageText" name="ratingavarageText" value="<?php echo $CuisineData7['ratingavarageText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="actionText">Action Text</label></td>
    <td><input id="actionText" name="actionText" value="<?php echo $CuisineData7['actionText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="changePasswordText">Change Password Text</label></td>
    <td><input id="changePasswordText" name="changePasswordText" value="<?php echo $CuisineData7['changePasswordText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
   <tr>
 <td><label for="newPasswordText">New Password Text</label></td>
    <td><input id="newPasswordText" name="newPasswordText" value="<?php echo $CuisineData7['newPasswordText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="oldPasswordText">Old Password Text</label></td>
    <td><input id="oldPasswordText" name="oldPasswordText" value="<?php echo $CuisineData7['oldPasswordText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="SelectText">Select Text</label></td>
    <td><input id="SelectText" name="SelectText" value="<?php echo $CuisineData7['SelectText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="NoDeliveryAddressMsgText">No Delivery address Text</label></td>
    <td><input id="NoDeliveryAddressMsgText" name="NoDeliveryAddressMsgText" value="<?php echo $CuisineData7['NoDeliveryAddressMsgText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="iwanttoreviewoffer">I want to receive offers and news Text</label></td>
    <td><input id="iwanttoreviewoffer" name="iwanttoreviewoffer" value="<?php echo $CuisineData7['iwanttoreviewoffer']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="cPasswordText">Confirm Password Text</label></td>
    <td><input id="cPasswordText" name="cPasswordText" value="<?php echo $CuisineData7['cPasswordText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="createAccountTExt">Creat Account Text</label></td>
    <td><input id="createAccountTExt" name="createAccountTExt" value="<?php echo $CuisineData7['createAccountTExt']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="loginHereText">Login Here Text</label></td>
    <td><input id="loginHereText" name="loginHereText" value="<?php echo $CuisineData7['loginHereText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="forgotpasswordText">Forgort Password Text</label></td>
    <td><input id="forgotpasswordText" name="forgotpasswordText" value="<?php echo $CuisineData7['forgotpasswordText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="rememberMepasswordText">Remember password Text</label></td>
    <td><input id="rememberMepasswordText" name="rememberMepasswordText" value="<?php echo $CuisineData7['rememberMepasswordText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  <tr>
 <td><label for="firstNameText">First Name Text</label></td>
    <td><input id="firstNameText" name="firstNameText" value="<?php echo $CuisineData7['firstNameText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="LastNameText">Last Name Text</label></td>
    <td><input id="LastNameText" name="LastNameText" value="<?php echo $CuisineData7['LastNameText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  <tr>
 <td><label for="PhoneText">Phone Text</label></td>
    <td><input id="PhoneText" name="PhoneText" value="<?php echo $CuisineData7['PhoneText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="ImageText">Image Text</label></td>
    <td><input id="ImageText" name="ImageText" value="<?php echo $CuisineData7['ImageText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="MobileText">Mobile Text</label></td>
    <td><input id="MobileText" name="MobileText" value="<?php echo $CuisineData7['MobileText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="PostcodeText">Postcode Text</label></td>
    <td><input id="PostcodeText" name="PostcodeText" value="<?php echo $CuisineData7['PostcodeText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="OnePointText">1 Point Text</label></td>
    <td><input id="OnePointText" name="OnePointText" value="<?php echo $CuisineData7['OnePointText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="showyourInterestText">Show your Interest Text</label></td>
    <td><input id="showyourInterestText" name="showyourInterestText" value="<?php echo $CuisineData7['showyourInterestText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
  
  
   <tr>
 <td><label for="howmuchyouinvestText">How much you are looking to invest in this venture? Text</label></td>
    <td><input id="howmuchyouinvestText" name="howmuchyouinvestText" value="<?php echo $CuisineData7['howmuchyouinvestText']; ?>" type="text"  style="width:300px;"/></td>
    <td><label for="countryInterestedText">Country of Interest Text</label></td>
    <td><input id="countryInterestedText" name="countryInterestedText" value="<?php echo $CuisineData7['countryInterestedText']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  
   <tr>
 <td><label for="franchiseButtonText">Get a Franchise Button Text</label></td>
    <td><input id="franchiseButtonText" name="franchiseButtonText" value="<?php echo $CuisineData7['franchiseButtonText']; ?>" type="text"  style="width:300px;"/></td>
    <?php /*?><td><label for="countryInterestedText">Country of Interest Text</label></td>
    <td><input id="countryInterestedText" name="countryInterestedText" value="<?php echo $CuisineData7['countryInterestedText']; ?>" type="text"  style="width:300px;"/></td><?php */?>
  </tr>
  
  

</table>	</fieldset>
                                    
                                    
                                    		
												
												<input id="submitWizard" type="submit" class="btn btn-primary submitWizard" name="TranslateSubmit" value="<?php echo $buttonValue; ?>" />
												</form>
											</div>
										</div>
									</div>
								
									
									
									
								
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include('route/footer.php'); ?>

	<!-- required js files -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	

	<!-- charts plugin -->
	<script src="app/plugins/jquery.peity.min.js"></script>
	<script src="app/plugins/jquery.knob.js"></script>
	<script src="app/plugins/jqplot/jquery.jqplot.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.highlighter.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.cursor.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.dateAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pieRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.donutRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.barRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pointLabels.min.js"></script>
	
	<!-- form plugins -->
	<script src="app/plugins/jquery.elastic.js"></script>
	<script src="app/plugins/jquery.uniform.js"></script>
	<script src="app/plugins/bootstrap-datepicker.js"></script>
	<script src="app/plugins/jquery.timePicker.min.js"></script>
	<script src="app/plugins/jquery.simple-color-picker.js"></script>
	<script src="app/plugins/chosen.jquery.min.js"></script>
	<script src="app/plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
	<script src="app/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="app/plugins/jquery.limit-1.2.js"></script>
	<script src="app/plugins/formToWizard.js"></script>
	
	<!-- other plugins -->
	<script src="app/plugins/jquery-ui-custom/jquery-ui-1.8.22.custom.min.js"></script>
	<script src="app/plugins/DataTables/media/js/jquery.dataTables.js"></script>	
	<script src="app/plugins/jscrollpane/jquery.mousewheel.js"></script>
	<script src="app/plugins/jscrollpane/jquery.jscrollpane.min.js"></script>	
	<script src="app/plugins/fullcalendar.min.js"></script>

	<script src="assets/js/google-code-prettify/prettify.js"></script>
	
	<script src="app/plugins/jPages.min.js"></script>
	<script src="app/plugins/jquery.masonry.min.js"></script>

	<!-- js for templates -->
	<script src="app/js/custom.js"></script>
</body>
</html>
