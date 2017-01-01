<?php
function genRandomString11() {
$length =5;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
} 
include('domainName.php');
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
$pizza89orderid=$resID[0].genRandomString11();
if(isset($_POST['BookaTableSubmit']))
{
@$DataUserUpdate=array("restaurant_id"=>$resID[0],"booking_id"=>$pizza89orderid,"noofgusts"=>$_POST['BookingUserNoPeople'],"booking_name"=>mysql_real_escape_string($_POST['BookingUserName']),"booking_email"=>$_POST['BookingUserEmail'],"booking_address"=>mysql_real_escape_string($_POST['booking_address']),"booking_mobile"=>$_POST['BookingUserMobile'],"booking_date"=>$_POST['BookingUserSelectDate'],"booking_time"=>$_POST['BookingUserSelectTime'],"booking_instruction"=>mysql_real_escape_string($_POST['BookingUserRequestMessage']),"eattype"=>mysql_real_escape_string($_POST['eattype']),"booking_ip"=>$_SERVER['REMOTE_ADDR']);
$CuisineInsert=$dbObj->dataInsert($DataUserUpdate,"table_booking");
$to=$_POST['BookingUserEmail'].','.$resdata['restaurant_BookingEmail'].','.$RegistrationDataLoginVal['bookingemail'];
$subject ='Online Booking Table with '.$resdata['restaurant_name'];
$from=$_POST['BookingUserEmail'];
$message="<table bgcolor='#dfdfdf' width='100%' style='float:left;background-color:rgb(223,223,223);font-family:Arial,'sans serif''> 
  <tbody> 
    <tr> 
      <td align='center'> 
        <table border='0' cellpadding='0' cellspacing='0'> 
          <tbody> 
            <tr> 
              <td colspan='2' height='359' valign='top'><img alt='' src='https://ci3.googleusercontent.com/proxy/oqgjYIFndtWMaU6BmYk2yKMjRDsaL5wbQPL_Hh3ARVE6_TOpMJ3q3n54Brllrzr41gpnnPVV1-ixogBC2CVmfylAf8HaGw6pVrhVSBrJjk4GxAWHW0RDquP7RxO2yyLpF1qllCb0WtkQ7H_eA24CQmS3tYM=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-left.png'></td> 
              <td rowspan='2'> 
                <table border='0' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td bgcolor='' style='background-image:url(https://ci3.googleusercontent.com/proxy/ULCRAiwWL9iHiPYUTWZkzsldvOF8xAcaH1NnHMCo4fOBSZmZlQafsxfMJWRIX-xpEnU_qjE4LNN2JsFKONWeijp-EeZCQ9GVERwqf44jtGjXUBQV2T_qgggzVHwuePTJY20ViGwa5EePhpstWNE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/header_bg.jpg);background-repeat:repeat no-repeat'> 
                        <table valign='middle' cellpadding='0' cellspacing='0' width='100%'> 
                          <tbody> 
                            <tr> 
                              <td width='12'></td> 
                              <td width='253' style='padding:10px'><a href='' target='_blank'><img src='".$DomainName."control/sitelogo/sitelogosmall/".$AdminDataLoginVal['website_logo']."' width='130' height='100'></a></td>  
                            </tr> 
                          </tbody> 
                        </table></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#c32c2c' height='6'></td> 
                    </tr> 
                  </tbody> 
                </table> 
                <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'>     
                <table cellpadding='0' cellspacing='0' width='730'>
                  <tbody>
<tr>
                       <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:18px'>Dear ".ucwords($_POST['BookingUserName']).",</td>
                             
                   </tr>
                   <tr>
                          <td style='font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#c1272d;font-weight:bold;padding-left:28px;padding-top:18px'> Thanks for your order <br><span style='color:#666'>Your Booking order confirmation message  will be sent to your email address</span></td>
                    </tr>
                    
                   
                                
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-top:20px;padding-left:28px;padding-top:18px'>Please find verify the information of your order below:</td>
                </tr>    
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#c1272d;padding-top:0px;font-weight:bold;padding-left:28px'>Store: ".$resdata['restaurant_name']."<br>Order Number: ".$pizza89orderid."</td>
                 
                   </tr>    
                    
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;padding-left:28px;padding-top:18px'>Book a Table requested: ".ucwords($_POST['BookingUserSelectDate'])."  ".ucwords($_POST['BookingUserSelectTime'])."</td>
                </tr> 
                
              
                <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#c1272d;padding-left:28px;padding-top:18px;font-weight:bold'>Collection Address:</td>
                </tr>           
                 <tr>
                      <td style='font-family:Arial,Helvetica,sans-serif;font-size:13px;padding-left:28px;padding-top:0px;color:#666;padding-top:0px'>".$resdata['restaurant_name']."<br>".$resdata['restaurant_address'].", ".$resdata['restaurantCity']." phone: <a href='tel:".$resdata['restaurant_phone']."' value=".$resdata['restaurant_phone']." target='_blank'>".$resdata['restaurant_phone']."</a><br> </td>
                </tr>   </tbody></table>        <br><table border='0' cellspacing='0' cellpadding='0' style='overflow:hidden;border:2px solid #e7e7e7;border-radius:5px;margin-top:10px;margin-left:25px;width:93%;padding-bottom:16px'>
                    
                   <thead bgcolor='#e7e7e7'>
                           
                        <tr>
                            <td width='200' height='34' bgcolor='#e7e7e7' valign='middle' style='border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold'>No of People : ".$_POST['BookingUserNoPeople']."
                            </td>
                            <td width='200' height='34' bgcolor='#e7e7e7' valign='middle' style='border-right:1px solid #c7c7c7;padding-left:12px;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold'>Eat Type : ".ucwords($_POST['eattype'])."
                            </td> </tr>
                            
                              
                            <tr><td colspan='2' bgcolor='#fff'><strong style='color:#0000FF; font-size:14px; margin-left:10px;'>Any Special Request</strong></td></tr>
                            <tr><td colspan='2' bgcolor='#fff'><hr /></td></tr>
                            
                            <tr><td colspan='2' bgcolor='#fff'><p style='margin-left:10px;'>".ucwords($_POST['BookingUserRequestMessage'])."</p></td></tr>
                            
                   </thead>
                   
                    
                                    
                  </table>
  

                       </td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'>&nbsp;</td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'  style='padding-left:30px;'> Thank you for your preference.</td> 
                    </tr>
					 <tr> 
                      <td colspan='4' style='padding-left:30px'>".$AdminDataLoginVal['website_name']." Team</td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='padding-left:30px'><a style='color:#ed6c2b' href='' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a></td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#C1272D' height='10'></td> 
                    </tr> 
                  </tbody> 
                </table></td> 
              <td colspan='2' valign='top'><img alt='' style='margin-top:1px' src='https://ci6.googleusercontent.com/proxy/8o1ccbZ7ctJxK1VN4zNIxlWON_rkJswBHm6DzxefVm-_VSzj9QPFhRMbpnLl2K53YvrCXyuvok0vrS6cV3RfcihRmWQlG3YSbM63MuIfpr7r4nTsSrN68-uEEw1yRlju_Ov5ZghGFjY9C2mGLuNV36XI-Oh4=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-right.png'></td> 
            </tr> 
            <tr> 
              <td>&nbsp;</td> 
              <td background='https://ci4.googleusercontent.com/proxy/EZYYeK4w2asNVCcbD8wkliiy7Ulzcci_sqRnKSnJ7gNSYlE4AqAvpw_mM4gjxuC_6i4c6DwJukWOpT_yWblEwr6f6OpbRr2aqz_MffQ_j4T0revCtSl9IbBYXmi8e8IvqC74uJ0IeL141s4DRBajug=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-left.png' width='4'></td> 
              <td background='https://ci4.googleusercontent.com/proxy/fMGLYGaSXBcqpb_4i_0NpDT6OwB1EmhPO0VBXxU4tifv6KxhPAc1Tu_vDL5zztDKjkM6iFsXefxLWpLfXP-RvBEB1YBmRtIfT2bj9iIQRyA8g4GBUYk8qH905Gt51p4TIoNbOO7CyfKJqiXoU6dgKmE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-right.png' width='4'></td> 
              <td>&nbsp;</td> 
            </tr> 
            <tr> 
              <td colspan='2'></td> 
              <td><img alt='' src='https://ci6.googleusercontent.com/proxy/E3iNizj4AUWYxz8t1e9PUopNYgAoddNQraaIHCPJ56eP0Cq56k8daz74Y6Gv7xWplalG0fIJwtVc0csoezk3Cgi89cQJofg6Se7I1Hg7zLd0_V5lG91FUKa23Sg5CMsqKTFCpOeYONBs0QtglyAtjMFC=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-bottom.png'></td> 
              <td colspan='2'></td> 
            </tr> 
          </tbody> 
        </table></td> 
    </tr> 
    <tr> 
      <td height='40'></td> 
    </tr> 
  </tbody> 
</table><div class='yj6qo'></div><div class='adL'>
</div></div>";
	$headers = "MIME-Version: 1.0\n";
	
	$headers .= "Content-type: text/html; charset=UTF-8\n";
	$headers .= "From: $from  \r\n" .
	$headers .= "X-Priority: 1\r\n"; 
	$headers .= 'Cc:dherm9454214684@gmail.com' . "\r\n";
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "X-Mailer: Just My Server"; 
	mail($to, $subject, $message, $headers);
$msg="Your Online Booking Detail with refernce no has been send ";
}
?>
<style type="text/css">

.register_selection {
	border: 1px solid #979797 !important;	
	font-size: 12px !important;	
	color: #535252 !important;	
	padding: 5px !important;	
	background: none !important;	
	height: 28px !important;	
	width: 265px !important;	
	float: left;
	border-radius:4px !important;	
	/*box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;*/
}
</style>
<div class="book_table">
   <div class="booking">
   <?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
   <table class="booking_form" cellpadding="5" cellspacing="2">
   <form action="" method="post">
   <tr>
   <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldNameText']);?></td>
   <td width="75%"><input type="text" name="BookingUserName" value="" id="BookingUserName" class="textbox" required /></td>
   </tr>
     <tr>
  <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldEmailText']);?></td>
   <td width="75%"><input type="email" name="BookingUserEmail" value="" id="BookingUserEmail" class="textbox"  required /></td>
   </tr>
     <tr>
  <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldContactText']);?></td>
   <td width="75%"><input type="text" name="BookingUserMobile" value="" id="BookingUserMobile" class="textbox" required /></td>
   </tr>
    <?php /*?> <tr>
   <td  colspan="3"><?php echo ucwords($TableLanguage5['ResFormFieldContactText']);?></td>
  
   </tr><?php */?>
     <tr>
   <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldNoofPeopleText']);?></td>
   <td width="75%">
   <select name="BookingUserNoPeople" class="register_selection" id="BookingUserNoPeople" required>
                             <option value="">Select</option>
                             <?php for($i=1;$i<=100;$i++){ ?>
                              <option value="<?php $i;?>"><?php echo $i; ?></option>
                              <?php } ?>
                              <option value="more than 100">more than 100</option>
                             
                            </select>
   
   </td>
   </tr>
   <tr>
                          <td colspan="2"></td>
                        </tr>
                        
                         <tr>
                          <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldEatTypeText']);?></td>
                          <td width="75%"><select name="eattype" class="register_selection" id="eattype" required>
                             <option value="">Select</option>
                              <option value="Break Fast">Break Fast</option>
                              <option value="Lunch">Lunch</option>
                              <option value="Dinner">Dinner</option>
                              <option value="Other">Other</option>
                             
                            </select>
                          </td>
                        </tr>
     <tr>
     
  <script type="text/javascript">
$(function() {
var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
$('#datepicker').datepicker({
dateFormat: 'm/d/y',
minDate: new Date(currentYear, currentMonth, currentDate)
});


});
</script>
  <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldDateText']);?></td>
   <td width="75%"><input type="text" name="BookingUserSelectDate" value="" id="datepicker"  class="textbox_date" style="width:70%;" /></td>
   </tr>
     <tr>
   <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldTimeBrandText']);?></td>
   <td width="75%">
   <select name="BookingUserSelectTime" class="register_selection"  id="BookingUserSelectTime" required>
<option value="">select</option>
   <option value="12:00 am">12:00 am</option>
  <option value="1:00 am">1:00 am</option>
  <option value="2:00 am">2:00 am</option>
  <option value="3:00 am">3:00 am</option>
  <option value="4:00 am">4:00 am</option>
  <option value="5:00 am">5:00 am</option>
  <option value="6:00 am">6:00 am</option>
  <option value="7:00 am">7:00 am</option>
  <option value="8:00 am">8:00 am</option>
  <option value="9:00 am">9:00 am</option>
  <option value="10:00 am">10:00 am</option>
  <option value="11:00 am">11:00 am</option>
  <option value="12:00 am">12:00 pm</option>
  <option value="1:00 pm">1:00 pm</option>
  <option value="2:00 pm">2:00 pm</option>
  <option value="3:00 pm">3:00 pm</option>
  <option value="4:00 pm">4:00 pm</option>
  <option value="5:00 pm">5:00 pm</option>
  <option value="6:00 pm">6:00 pm</option>
  <option value="7:00 pm">7:00 pm</option>
  <option value="8:00 pm">8:00 pm</option>
  <option value="9:00 pm">9:00 pm</option>
  <option value="10:00 pm">10:00 pm</option>
  <option value="11:00 pm">11:00 pm</option>
                            </select>
   </td>
   </tr>
     <tr>
  <td width="25%"><?php echo ucwords($TableLanguage5['ResFormFieldTSpecialRequestText']);?></td>
   <td width="75%"><textarea id="BookingUserRequestMessage" name="BookingUserRequestMessage" class="textarea"></textarea></td>
   </tr>
   
        
    <tr>
  <td width="25%"></td>
   <td width="75%"><input type="submit" value="<?php echo $TableLanguage4['ResBookNOwButtonText']; ?>" name="BookaTableSubmit" class="submit" /></td>
   </tr>
   </form>
   </table>
   </div>
   <div class="ads"></div>
   </div>