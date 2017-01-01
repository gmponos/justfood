<?php if($_SESSION['justfoodsUserID']!=''){ ?>
<div class="" style="width:90%;margin:auto;">
			
            <table id="pre_order" width="100%" style="margin-top: 23px;">
                  <tbody><tr style="background: none repeat scroll 0 0 #C6121B;color: #fff;font-family: Arial;font-size: 13px;font-weight: bold; border:1px solid #C6121B">
                    <th width="10%"><?php echo $TableLanguage7['SrNOText'];?></th>
                    <th width="20%"><?php echo $TableLanguage7['OrderIDText'];?></th>
                    <th width="20%"><?php echo $TableLanguage7['OrderPriceText'];?></th>
                    <th width="15%"><?php echo $TableLanguage7['OrderDateText'];?></th>
                  </tr>
                   <?php 
$OrdQur="select * from resto_order where userId='".$_SESSION['justfoodsUserID']."' and restoid='".$resdata['id']."'  ORDER BY order_identifyno DESC";
$QUrOrdPer=mysql_query($OrdQur);
$dOrdstatusA=mysql_fetch_assoc(mysql_query("select * from order_status where id='1'"));
$dOrdstatusT=mysql_fetch_assoc(mysql_query("select * from order_status where id='2'"));
$dOrdstatusD=mysql_fetch_assoc(mysql_query("select * from order_status where id='3'"));
$dOrdstatusC=mysql_fetch_assoc(mysql_query("select * from order_status where id='4'"));
$dOrdstatusCn=mysql_fetch_assoc(mysql_query("select * from order_status where id='5'"));
if(mysql_num_rows($QUrOrdPer)>0)
{
$i=1;
while($OrdData=mysql_fetch_assoc($QUrOrdPer))
{

?>  

                  <tr style="border: 1px solid #ccc; border-top: none;">
                    <td style="padding:3px 0px;"><?php echo $i;?></td>
                    <td style="padding:3px 0px;"><?php echo $OrdData['order_identifyno']; ?></td>
                    <td style="text-align:right; padding:3px 75px 3px 0px;" > <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php if($OrdData['disCupnPrice']<=$OrdData['ordPrice']){
								 echo number_format($OrdData['ordPrice'],2); 
								$pres=$OrdData['ordPrice'];}else{$pres='0.00';echo '0.00';}
														 // $sum+=$pres;
														  ?></td>
                    <td style="padding:3px 0px;"><?php echo $OrdData['deliverydate']; ?></td>
                  </tr>
                    <?php 
					$i++;
					} } else { ?>
<tr>
<td colspan="4">
<strong style="color:#9F0000; font-size:14px;"><?php echo $TableLanguage7['sorryYouhavenoOrderText'];?> <?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>!!!.</strong>
</td></tr>
<?php } ?>
                
                </tbody></table>
          
		</div>
          <?php } else { ?>
            <div><a href="userLogin.php" style="color:#FF0000; font-size:18px; font-weight:bold; padding:10px; margin-top:30px;"><?php echo $TableLanguage5['ResLoginHeretoPreOrderText'];?> <?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></a></div>
            
            <?php } ?>
            