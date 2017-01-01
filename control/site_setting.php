<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
 $CuisineQuery = $dbb->showalltable("tbl_siteSetting");
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 ?>

	<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Site Setting Management</a></li>
						</ul>

						<div class="tab-content"  style="height:1400px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Site Setting Management</a>
											</div>
										</div>
                                        <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Site Setting has been successfully updated.
		                                     </div>
											<?php }?>
										
										<div class="row-fluid" >
											<div  class="wizardForm span12">
												<form id="SignupForm" action="InsertPhp.php?tag=SiteSettingEdit&eid=1" method="post"  enctype="multipart/form-data">
                                                 <input id="website_logoold" name="website_logoold" value="<?php echo $CuisineData['website_logo']; ?>" type="hidden"  style="width:300px;"/>
                                                 <input id="website_faviconold" name="website_faviconold" value="<?php echo $CuisineData['website_favicon']; ?>" type="hidden"  style="width:300px;"/>
                                                  <input id="website_SocialMediaold" name="website_SocialMediaold" value="<?php echo $CuisineData['website_SocialMedia']; ?>" type="hidden"  style="width:300px;"/>
                                                  <input id="AdminID" name="AdminID" value="<?php echo $CuisineData['website_SocialMedia']; ?>" type="hidden"  style="width:300px;"/>
                                                
												<fieldset>
													<legend>Site Setting information</legend>
                                                    
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="website_name">Site Name</label></td>
    <td><input id="website_name" name="website_name" value="<?php echo $CuisineData['website_name'];?>" type="text"  style="width:300px;"/></td>
    <td><label for="website_logo">Site logo</label></td>
    <td><input id="imgwebsite_logo" name="imgwebsite_logo" value="" type="file"  style="width:300px;"/>\
    <br />
    <img src="sitelogo/sitelogosmall/<?php echo $CuisineData['website_logo'];?>" width="100" height="70" />
    </td>
  </tr>
  <tr>
    <td><label for="website_favicon">Site Favicon</label></td>
    <td><input  name="website_favicon" id="website_favicon" value=""  type="file"   style="width:300px;"/>
    <br /><img src="faviconicon/<?php echo $CuisineData['website_favicon'];?>" width="20" height="20" />
    </td>
    <td><label for="website_callUsNo">Call Us No</label></td>
    <td><input  value="<?php echo $CuisineData['website_callUsNo'];?>" type="text"  name="website_callUsNo" id="website_callUsNo"  style="width:300px;" /></td>
  </tr>
  
   
 
  
  <?php /*?> <tr>
    <td><label for="website_UserPerRecord">User Per Record</label></td>
    <td><input value="<?php echo $CuisineData['website_UserPerRecord'];?>"  type="text" class="" name="website_UserPerRecord" id="website_UserPerRecord"   style="width:300px;" /></td>
    <td><label for="website_AdminPerRecord">Admin Per Record</label></td>
    <td><input id="website_AdminPerRecord"  name="website_AdminPerRecord"   value="<?php echo $CuisineData['website_AdminPerRecord'];?>" type="text"  style="width:300px;" /></td>
  </tr><?php */?>
  <?php /*?> <tr>
    <td><label for="website_OwnerPerRecord">Owner Per Record</label></td>
    <td><input value="<?php echo $CuisineData['website_OwnerPerRecord'];?>" id="website_OwnerPerRecord" name="website_OwnerPerRecord"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="website_HeaderText">Header Text</label></td>
    <td><input id="website_HeaderText"  name="website_HeaderText"   value="<?php echo $CuisineData['website_HeaderText'];?>" type="text"  style="width:300px;" /></td>
  </tr><?php */?>
  
   <tr>
    <td><label for="website_SocialMedia">Social Media</label></td>
    <td><select style="width:317px;" id="website_SocialMedia" name="website_SocialMedia[]" multiple="multiple">
    
												 <?php 
											  $StateQuery = $dbb->showtable("tbl_SocialSetting","restSocialMediaName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if(strstr($CuisineData['website_SocialMedia'],$StateData['id'])){?> selected="selected" <?php } ?>><?php echo ucwords($StateData['restSocialMediaName']); ?></option>
                                              <?php } ?>
											</select></td>
    <td><label for="website_AdminName">Admin Name</label></td>
    <td><input id="website_AdminName"  name="website_AdminName"   value="<?php echo $CuisineData['website_AdminName'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="website_AdminEmail">Admin Email</label></td>
    <td><input value="<?php echo $CuisineData['website_AdminEmail'];?>" id="website_AdminEmail" name="website_AdminEmail"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="website_ContactEmail">Contact Us Email</label></td>
    <td><input id="website_ContactEmail"  name="website_ContactEmail"   value="<?php echo $CuisineData['website_ContactEmail'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="website_ContactPhone">Contact Us Phone</label></td>
    <td><input value="<?php echo $CuisineData['website_ContactPhone'];?>" id="website_ContactPhone" name="website_ContactPhone"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="website_HeaderText">Header Text</label></td>
    <td><input id="website_HeaderText"  name="website_HeaderText"   value="<?php echo $CuisineData['website_HeaderText'];?>" type="text"  style="width:300px;" /></td>
    <?php /*?><td><label for="website_TimeZone">Site Time Zone</label></td>
    <td><input id="website_TimeZone"  name="website_TimeZone"   value="<?php echo $CuisineData['website_TimeZone'];?>" type="text"  style="width:300px;" /></td><?php */?>
  </tr>
  <tr>
    <td><label for="Authorize_net_Login_Key">Authorize.net Login Key</label></td>
    <td><input value="<?php echo $CuisineData['Authorize_net_Login_Key'];?>" id="Authorize_net_Login_Key" name="Authorize_net_Login_Key"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="Authorize_net_Transaction_Key">Authorize.net Transaction Key</label></td>
    <td><input id="Authorize_net_Transaction_Key"  name="Authorize_net_Transaction_Key"   value="<?php echo $CuisineData['Authorize_net_Transaction_Key'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="website_Currency">Currency</label></td>
    <td><input value="<?php echo $CuisineData['website_Currency'];?>" id="website_Currency" name="website_Currency"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="website_CurrencySymbole">Currency Symbole</label></td>
    <td><input id="website_CurrencySymbole"  name="website_CurrencySymbole"   value="<?php echo $CuisineData['website_CurrencySymbole'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
  <?php /*?> <tr>
    <td><label for="website_Currency">Currency</label></td>
    <td><input value="<?php echo $CuisineData['website_Currency'];?>" id="website_Currency" name="website_Currency"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="website_CurrencySymbole">Currency Symbole</label></td>
    <td><input id="website_CurrencySymbole"  name="website_CurrencySymbole"   value="<?php echo $CuisineData['website_CurrencySymbole'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="website_ServiceTaxNo">Service Tax No.</label></td>
    <td><input value="<?php echo $CuisineData['website_ServiceTaxNo'];?>"  type="text" class="" id="website_ServiceTaxNo" name="website_ServiceTaxNo"   style="width:300px;" /></td>
    <td><label for="website_ServiceTaxPercentage">Service Tax(%)</label></td>
    <td><input id="website_ServiceTaxPercentage"  name="website_ServiceTaxPercentage"   value="<?php echo $CuisineData['website_ServiceTaxPercentage'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td><label for="website_OfflineStatus">Site Offline Status</label></td>
    <td><select style="width:317px;" id="website_OfflineStatus" name="website_OfflineStatus">
											  <option value="0" <?php if($CuisineData['website_OfflineStatus']=='0'){ ?> selected="selected"<?php } ?>>Yes</option>
											  <option value="1" <?php if($CuisineData['website_OfflineStatus']=='1'){ ?> selected="selected"<?php } ?>>No</option>
											  
											</select></td>
    <td><label for="website_OfflineNote">Site Offline Note</label></td>
    <td> <textarea name="website_OfflineNote" id="website_OfflineNote" style="width:300px; height:40px;"><?php echo $CuisineData['website_OfflineNote'];?></textarea></td>
  </tr><?php */?>
   <tr>
    <td><label for="website_Country">Site Country </label></td>
    <td><input value="<?php echo $CuisineData['website_Country'];?>" name="website_Country" id="website_Country"  type="text" class=""   style="width:300px;" /></td>
    <td><label for="website_State">Site State</label></td>
    <td><input id="website_State"  name="website_State"   value="<?php echo $CuisineData['website_State'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="website_City">Site City </label></td>
    <td><input value="<?php echo $CuisineData['website_City'];?>"  type="text" class="" name="website_City" id="website_City"   style="width:300px;" /></td>
    <td><label for="website_Zipcode">Site Zipcode</label></td>
    <td><input id="website_Zipcode"  name="website_Zipcode"   value="<?php echo $CuisineData['website_Zipcode'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
   
    <td ><label for="website_Zipcode">Loyalty Point </label></td>
    <td colspan="3"><input id="loyalityPoint"  name="loyalityPoint"   value="<?php echo $CuisineData['loyalityPoint'];?>" type="text"  style="width:300px;" /></td>
  </tr>
   <tr>
   
    <td ><label for="website_ServiceTaxNo">Paypal Account Email Address </label></td>
    <td colspan="3"><input id="website_ServiceTaxNo"  name="website_ServiceTaxNo"   value="<?php echo $CuisineData['website_ServiceTaxNo'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
   <tr>
    <td colspan=""><label for="website_Address">Site Address</label></td>
    <td colspan="3">
    <textarea name="website_Address" id="website_Address" style="width:800px; height:80px;"><?php echo $CuisineData['website_Address'];?></textarea>
    </td>
    </tr>
    
     <tr>
    <td><label for="website_Country">Twiter Social Link </label></td>
    <td>
    <input id="twitersociallink_1"  name="twitersociallink_1"   value="<?php echo $CuisineData['twitersociallink_1'];?>" type="text"  style="width:300px;" />
   </td>
    <td><label for="facebooksociallink">Facebook Link</label></td>
    <td><input id="facebooksociallink"  name="facebooksociallink"   value="<?php echo $CuisineData['facebooksociallink'];?>" type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="website_City">RSS Social Link </label></td>
    <td><input value="<?php echo $CuisineData['flickrsociallink'];?>"  type="text" class="" name="flickrsociallink" id="flickrsociallink"   style="width:300px;" /></td>
    <td><label for="website_Zipcode">Google Plus Link</label></td>
    <td><input id="linksociallink"  name="linksociallink"   value="<?php echo $CuisineData['linksociallink'];?>" type="text"  style="width:300px;" /></td>
  </tr>
   

  
</table>	</fieldset>

                                    
                                    
                                                <fieldset>
													<legend>SEO Setting information</legend>
													<table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
    <td colspan=""><label for="website_MetaTitle">Title Meta Tag</label></td>
    <td colspan="3">
    <textarea name="website_MetaTitle" id="website_MetaTitle" style="width:800px; height:80px;"><?php echo $CuisineData['website_MetaTitle'];?></textarea>
    </td>
   
  </tr>
    <tr>
    <td colspan=""><label for="website_MetaKeyword">KeyWord Meta Tag</label></td>
    <td colspan="3">
    <textarea name="website_MetaKeyword" id="website_MetaKeyword" style="width:800px; height:80px;"><?php echo $CuisineData['website_MetaKeyword'];?></textarea>
    </td>
   
  </tr>
  
  
    <tr>
    <td colspan=""><label for="website_MetaDescription">Description Meta Tag</label></td>
    <td colspan="3">
    <textarea name="website_MetaDescription" id="website_MetaDescription" style="width:800px; height:80px;"><?php echo $CuisineData['website_MetaDescription'];?></textarea>
    </td>
   
  </tr>
  
  
                                                    </table>
												</fieldset>
                                    
                                    
                                    		
												
												<input id="submitWizard" type="submit" name="SubmitSiteSetting" class="btn btn-primary submitWizard" value="Submit Site Setting" />
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
