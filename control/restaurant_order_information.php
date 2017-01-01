<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td><label for="restaurant_InvoiceEmail">Invoice Email <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_InvoiceEmail"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_InvoiceEmail" value="<?php echo $CuisineData['restaurant_InvoiceEmail']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OrderEmail">Order Email <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_OrderEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_OrderEmail" value="<?php echo $CuisineData['restaurant_OrderEmail']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td><label for="restaurant_BookingEmail">Booking Email <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_BookingEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_BookingEmail" value="<?php echo $CuisineData['restaurant_BookingEmail']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_FeedbackEmail">Feedback Email <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_FeedbackEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_FeedbackEmail" value="<?php echo $CuisineData['restaurant_FeedbackEmail']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td><label for="restaurant_Logo">Restaurant Logo <span style="color:#FF0000;">*</span></label></td>
    <td><div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 75px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
        <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
          <input id="restaurant_Logo" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_Logo" value="" type="file" class="input-large"  style="width:300px;" />
          <br />
          </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
      </div>
      <?php if($_GET['eid']!=''){ ?>
      <img src="restaurantlogoimg/small/<?php echo $CuisineData['restaurant_Logo'];?>" width="90" height="70" style="margin-bottom:10px;" />
      <?php } ?>
    </td>
    <td><label for="restaurant_FaviconImg">Favicon Image</label></td>
    <td><div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 75px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
        <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
          <input id="restaurant_FaviconImg"  name="restaurant_FaviconImg" value="<?php echo $CuisineData['restaurant_FaviconImg']; ?>" type="file" class="input-large" style="width:300px;" />
          </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
      </div>
      <?php if($_GET['eid']!=''){ ?>
      <br />
      <img src="RestaurantFaviconimg/small/<?php echo $CuisineData['restaurant_FaviconImg'];?>" width="16" height="16" />
      <?php } ?>
    </td>
  </tr>
  <tr style="display: none;">
    <td><label for="restaurant_Video">Youtube Video URL </label></td>
    <td><input id="restaurant_Video"  name="restaurant_Video" value="<?php echo $CuisineData['restaurant_Video']; ?>" type="text"  style="width:300px; height:50px;" /></td>
    <td style="display: none;"><label for="restaurant_Market_bannerImg">Market Banner Image</label></td>
    <td style="display: none;"><div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 75px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
        <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
          <input id="restaurant_Market_bannerImg"  name="restaurant_Market_bannerImg" value="" type="file" class="input-large" style="width:300px;" />
          </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
      </div></td>
  </tr>
  <?php /*?><tr>
    <td><label for="restaurant_cloud_printer_email">Google Cloud Printer</label></td>
    <td colspan="3"><input type="radio" <?php if($CuisineData1['CoundPrinter']==1){?> checked="checked" <?php } ?>  name="CoundPrinter" id="CoundPrinter" value="1"  />
      Yes &nbsp;
      <input type="radio" name="CoundPrinter"  id="CoundPrinter1" checked="checked"  value="0" <?php if($CuisineData1['CoundPrinter']==0){?> checked="checked" <?php } ?>  />
      No</td>
  </tr>
  <tr>
    <td colspan="4" id="clouddisplay1"><table width="100%" border="0" style="margin-top:10px; <?php if($CuisineData1['CoundPrinter']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="clouddisplay">
        <tr>
          <td><label for="restaurant_cloud_printer_email">Google Cloud Printer Email</label></td>
          <td><input id="restaurant_cloud_printer_email" name="restaurant_cloud_printer_email"  value="<?php echo $CuisineData1['restaurant_cloud_printer_email']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_cloud_printer_password">Google Cloud Printer Password</label></td>
          <td><input id="restaurant_cloud_printer_password"  name="restaurant_cloud_printer_password" value="<?php echo $CuisineData1['restaurant_cloud_printer_password']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
      </table></td>
  </tr><?php */?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td><label for="restaurant_cloud_printer_email">SMS Option</label></td>
    <td colspan="3"><input type="radio" <?php if($CuisineData1['SMSOption']==1){?> checked="checked" <?php } ?> name="SMSOption" id="SMSOption" value="1" />
      Yes &nbsp;
      <input type="radio" name="SMSOption" <?php if($CuisineData1['SMSOption']==0){?> checked="checked" <?php } ?> id="SMSOption1" value="0" checked="checked" />
      No</td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="0" style="margin-top:10px;margin-left: 55px; <?php if($CuisineData1['SMSOption']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="SMSOptiondisplay">
        <tr>
          <td><label for="restaurant_sms_api_id">SMS API ID</label></td>
          <td><input id="restaurant_sms_api_id" name="restaurant_sms_api_id"  value="<?php echo $CuisineData1['restaurant_sms_api_id']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_sms_api_url">SMS API URL</label></td>
          <td><input id="restaurant_sms_api_url" placeholder="https://www.textmagic.com/app/api?"  name="restaurant_sms_api_url" value="<?php echo $CuisineData1['restaurant_sms_api_url']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_sms_api_id">SMS Username</label></td>
          <td><input id="restaurant_sms_api_user_name" placeholder="phpexpert" name="restaurant_sms_api_user_name"  value="<?php echo $CuisineData1['restaurant_sms_api_user_name']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_sms_api_user_password">SMS Password</label></td>
          <td><input id="restaurant_sms_api_user_password" placeholder='*****'  name="restaurant_sms_api_user_password" value="<?php echo $CuisineData1['restaurant_sms_api_user_password']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_sms_api_sender_id">SMS Sender ID</label></td>
          <td><input id="restaurant_sms_api_sender_id" placeholder='phpexpert123' name="restaurant_sms_api_sender_id"  value="<?php echo $CuisineData1['restaurant_sms_api_sender_id']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
      </table></td>
  </tr>
 <?php /*?> <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td><label for="restaurant_cloud_printer_email">GPRS Printer Option</label></td>
    <td colspan="3"><input type="radio" <?php if($CuisineData1['GPRSPrinterOption']==1){?> checked="checked" <?php } ?> name="GPRSPrinterOption" id="GPRSPrinterOption" value="1" />
      Yes &nbsp;
      <input type="radio" name="GPRSPrinterOption" id="GPRSPrinterOption1" value="0" <?php if($CuisineData1['GPRSPrinterOption']==0){?> checked="checked" <?php } ?> />
      No</td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="0" style="margin-top:10px;margin-left: 21px; <?php if($CuisineData1['GPRSPrinterOption']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="GPRSPrinterOptiondisplay">
        <tr>
          <td><label for="restaurant_gprs_apn_no">GPRS APN </label></td>
          <td><input id="restaurant_gprs_apn_no" name="restaurant_gprs_apn_no"  value="<?php echo $CuisineData1['restaurant_gprs_apn_no']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_gprs_apn_ip">GPRS IP</label></td>
          <td><input id="restaurant_gprs_apn_ip"  name="restaurant_gprs_apn_ip" value="<?php echo $CuisineData1['restaurant_gprs_apn_ip']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_gprs_apn_port">GPRS Port</label></td>
          <td><input id="restaurant_gprs_apn_port" name="restaurant_gprs_apn_port"  value="<?php echo $CuisineData1['restaurant_gprs_apn_port']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_gprs_apn_username">GPRS User Name</label></td>
          <td><input id="restaurant_gprs_apn_username"  name="restaurant_gprs_apn_username" value="<?php echo $CuisineData1['restaurant_gprs_apn_username']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_gprs_apn_password">GPRS Password</label></td>
          <td><input id="restaurant_gprs_apn_password" name="restaurant_gprs_apn_password"  value="<?php echo $CuisineData1['restaurant_gprs_apn_password']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_gprs_apn_printer_id">GPRS Printer ID</label></td>
          <td><input id="restaurant_gprs_apn_printer_id"  name="restaurant_gprs_apn_printer_id" value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_id']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_gprs_apn_printer_speed">GPRS Print Speed</label></td>
          <td><input id="restaurant_gprs_apn_printer_speed" name="restaurant_gprs_apn_printer_speed"  value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_speed']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_gprs_apn_printer_IMEI_code">GPRS IMEI Code</label></td>
          <td><input id="restaurant_gprs_apn_printer_IMEI_code"  name="restaurant_gprs_apn_printer_IMEI_code" value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_IMEI_code']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_gprs_apn_printer_product_model">GPRS Product Model</label></td>
          <td><input id="restaurant_gprs_apn_printer_product_model" name="restaurant_gprs_apn_printer_product_model"  value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_product_model']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_gprs_apn_printer_file_path">GPRS File Path</label></td>
          <td><input id="restaurant_gprs_apn_printer_file_path"  name="restaurant_gprs_apn_printer_file_path" value="<?php echo $CuisineData1['restaurant_gprs_apn_printer_file_path']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
      </table></td>
  </tr><?php */?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><h3>Payment Setting for Restaurant</h3></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td><label for="PaypalPayment">Paypal</label></td>
    <td colspan="3"><input type="radio"  name="PaypalPayment" id="PaypalPayment" <?php if($CuisineData1['PaypalPayment']==1){?> checked="checked" <?php } ?> value="1" />
      Yes &nbsp;
      <input type="radio" name="PaypalPayment" id="PaypalPayment1" <?php if($CuisineData1['PaypalPayment']==0){?> checked="checked" <?php } ?> value="0" checked="checked"  />
      No</td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="0" style="margin-top:10px;margin-left:94px; <?php if($CuisineData1['PaypalPayment']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="PaypalPaymentdisplay">
        <tr>
          <td><label for="restaurant_paypal_url">Paypal URL</label></td>
          <td><input id="restaurant_paypal_url" name="restaurant_paypal_url" placeholder="https://www.paypal.com/webscr"  value="<?php echo $CuisineData1['restaurant_paypal_url']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_paypal_business_account">Business Account</label></td>
          <td><input id="restaurant_paypal_business_account" placeholder="dherm9454214684@gmail.com"  name="restaurant_paypal_business_account" value="<?php echo $CuisineData1['restaurant_paypal_business_account']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
 <?php /*?> <tr>
    <td><label for="PaypalPayment">Authorize Net  Payment</label></td>
    <td colspan="3"><input type="radio" <?php if($CuisineData1['AuthorizednetPayment']==1){?> checked="checked" <?php } ?>  name="AuthorizednetPayment" id="AuthorizednetPayment" value="1" />
      Yes &nbsp;
      <input type="radio" <?php if($CuisineData1['AuthorizednetPayment']==1){?> checked="checked" <?php } ?> name="AuthorizednetPayment" id="AuthorizednetPayment1" value="0" />
      No</td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="0" style="margin-top:10px;margin-left:18px; <?php if($CuisineData1['AuthorizednetPayment']==1){?>display:block; <?php } else { ?> display:none; <?php } ?>" id="AuthorizednetPaymentdisplay">
        <tr>
          <td><label for="restaurant_Authorizednet_url">Authorize Net  URL</label></td>
          <td><input id="restaurant_Authorizednet_url" placeholder='https://test.authorize.net/gateway/transact.dll' name="restaurant_Authorizednet_url"  value="<?php echo $CuisineData1['restaurant_Authorizednet_url']; ?>" type="text"  style="width:300px;" /></td>
          <td><label for="restaurant_Authorizednet_login_key">Authorize Net  Login Key</label></td>
          <td><input id="restaurant_Authorizednet_login_key" placeholder='*********'   name="restaurant_Authorizednet_login_key" value="<?php echo $CuisineData1['restaurant_Authorizednet_login_key']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
        <tr>
          <td><label for="restaurant_Authorizednet_transid_key">Authorize Net  Transaction Key</label></td>
          <td><input id="restaurant_Authorizednet_transid_key" placeholder='*********' name="restaurant_Authorizednet_transid_key"  value="<?php echo $CuisineData1['restaurant_Authorizednet_transid_key']; ?>" type="text"  style="width:300px;" /></td>
        </tr>
      </table></td>
  </tr>
  <tr><?php */?>
  <td colspan="4" align="center">
    <a href="" data-toggle="tab" id="checkemailsdata" class="btn btn-primary" onclick="return RestaurantValidateEmailInformation();">Next</a>
  <a href="#astep4" data-toggle="tab"  id="checkemaildata1" style="display:none;" class="btn btn-primary" onclick="return RestaurantValidateEmailInformation();">Next</a>
  
  <!-- <a href="#astep4" data-toggle="tab" class="btn btn-primary" onclick="return RestaurantValidateEmailInformation();">Next</a>-->
  <?php /*?><input type="button" class="btn btn-primary" onclick="return RestaurantValidate();" value="Next" /><?php */?></td>
  </tr>
</table>
