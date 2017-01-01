<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td><label for="restaurant_OwnerFirstName">Owner First Name <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_OwnerFirstName" onKeyUp="AllowAlphabet()" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_OwnerFirstName" value="<?php echo $OwnerData['restaurant_OwnerFirstName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLastName">Owner Last Name</label></td>
    <td><input id="restaurant_OwnerLastName" onKeyUp="AllowAlphabet()"  name="restaurant_OwnerLastName" value="<?php echo $OwnerData['restaurant_OwnerLastName']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td><label for="restaurant_OwnerLoginId">Owner ID <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_OwnerLoginId" pattern=".{6,}"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  name="restaurant_OwnerLoginId" value="<?php echo $OwnerData['restaurant_OwnerLoginId']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLoginPassword">Owner Password <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_OwnerLoginPassword" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   name="restaurant_OwnerLoginPassword" maxlength="6"  value="<?php echo $OwnerData['restaurant_OwnerLoginPassword']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td colspan=""><label for="restaurant_OwnerLoginAddress">Address</label></td>
    <td colspan="3"><textarea name="restaurant_OwnerLoginAddress" id="restaurant_OwnerLoginAddress" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  style="width:800px; height:80px;"><?php echo $OwnerData['restaurant_OwnerLoginAddress']; ?></textarea>
    </td>
  </tr>
  <tr>
    <td><label for="restaurant_OwnerLoginEmail">Owner Email ID <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurant_OwnerLoginEmail"  name="restaurant_OwnerLoginEmail" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $OwnerData['restaurant_OwnerLoginEmail']; ?>" type="email"  style="width:300px;" /></td>
    <td><label for="restaurant_OwnerLoginMobile">Owner Mobile</label></td>
    <td><input id="restaurant_OwnerLoginMobile"  name="restaurant_OwnerLoginMobile" onkeypress='return isNumberKey(event);' onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $OwnerData['restaurant_OwnerLoginMobile']; ?>" maxlength="13" type="text"  style="width:300px;" /></td>
  </tr>
  <?php /*?> <tr>
    <td><label for="restaurant_OwnerDOB">Owner Birth Date </label></td>
    <td><input id="restaurant_OwnerDOB"  name="restaurant_OwnerLoginDOB" value="<?php echo $OwnerData['restaurant_OwnerLoginDOB']; ?>" type="text"   style="width:300px;" /></td>
    <td><label for="restaurant_OwnerAnniversaryDate">Owner Anniversary Date</label></td>
    <td><input id="restaurant_OwnerAnniversaryDate"  name="restaurant_OwnerAnniversaryDate" value="<?php echo $OwnerData['restaurant_OwnerAnniversaryDate']; ?>" type="text"  style="width:300px;" /></td>
  </tr><?php */?>
  <tr>
  <td colspan="4" align="center">
  <a href="" data-toggle="tab" id="checkownerdata" class="btn btn-primary" onclick="return RestaurantValidateOwnerInformation();">Next</a>
  <a href="#astep5" data-toggle="tab"  id="checkownerdata1" style="display:none;" class="btn btn-primary" onclick="return RestaurantValidateOwnerInformation();">Next</a>
  <!-- <a href="#astep5" data-toggle="tab" class="btn btn-primary" onclick="return RestaurantValidateOwnerInformation();">Next</a>-->
  <?php /*?><input type="button" class="btn btn-primary" onclick="return RestaurantValidate();" value="Next" /><?php */?></td>
  </tr>
</table>

 <?php /*?> <fieldset>
													<legend>Bank A/C information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                                      <tr>
    <td><label for="restaurant_BankACName">Bank A/C Name </label></td>
    <td><input id="restaurant_BankACName"  name="restaurant_BankACName" value="<?php echo $BankData['restaurant_BankACName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_BankACType">Bank A/C Type</label></td>
    <td><select  data-placeholder="Select Bank A/C Type..." id="restaurant_BankACType" name="restaurant_BankACType" style="width:317px;">
											  <option value="">select</option>
											  <option value="Saving" <?php if($BankData['restaurant_BankACType']=='Saving'){ ?> selected="selected" <?php } ?>>Saving</option>
											  <option value="Current" <?php if($BankData['restaurant_BankACType']=='Current'){ ?> selected="selected" <?php } ?>>Current</option>
											 
											</select></td>
  </tr>
  
   <tr>
    <td height="27"><label for="restaurant_BankName">Bank Name </label></td>
    <td><input id="restaurant_BankName"  name="restaurant_BankName" value="<?php echo $BankData['restaurant_BankName']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_BankACNo">Bank A/C No.</label></td>
    <td><input id="restaurant_BankACNo"  name="restaurant_BankACNo" value="<?php echo $BankData['restaurant_BankACNo']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  
   <tr>
    <td><label for="restaurant_BankNEFTCode">NEFT Code </label></td>
    <td><input id="restaurant_BankNEFTCode"  name="restaurant_BankNEFTCode" value="<?php echo $BankData['restaurant_BankNEFTCode']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_BankSwiftCode">Swift Code</label></td>
    <td><input id="restaurant_BankSwiftCode"  name="restaurant_BankSwiftCode" value="<?php echo $BankData['restaurant_BankSwiftCode']; ?>" type="text" style="width:300px;" /></td>
  </tr>
  
  
     <tr>
    <td colspan=""><label for="restaurant_BankAddress">Bank Address</label></td>
    <td colspan="3">
    <textarea name="restaurant_BankAddress" id="restaurant_BankAddress" style="width:800px; height:80px;"><?php echo $BankData['restaurant_BankAddress']; ?></textarea>
    </td>
   
  </tr>
  
   
                                                    </table>
												</fieldset><?php */?>
