<?php include('header.php'); ?>
<?php include('session.php')?>
<?php include('connect.php')?>
<?php
   $qry=mysql_query("select * from tbl_hotel");
?>
<?php
$msg='';
 if(isset($_POST['submitroom'])) 
{
if($_FILES['backgroundimg']['name']!='')
{
$fss=uniqid().$_FILES['backgroundimg']['name'];
if(move_uploaded_file($_FILES['backgroundimg']['tmp_name'],"htlimg/".$fss))
{
}
}
else
{
$fss=$_POST['oldimg'];

}

 $qry1=mysql_query("UPDATE `tbl_hotel` SET `hotel_name` = '$_POST[hotel_hotelname]', `hotel_image` = '".$fss."',`hotel_desc` = '".mysql_real_escape_string($_POST['hotel_desc'])."', `address` = '$_POST[hotel_address]', `facility` = '$_POST[hotel_facility]', `contact_details` = '$_POST[hotel_details]', `hotel_email` = '$_POST[hotel_email]', `nearest_airport` = '$_POST[hotel_airport]', `nearest_station` = '$_POST[hotel_station]', `city` = '$_POST[hotel_city]', `state` = '$_POST[hotel_state]',`paypal_id` = '$_POST[paypal_id]',`paypal_currency` = '$_POST[paypal_currency]' WHERE `id` ='1'");															 
  if($qry1)
      {
        $msg="Hotel Records Updated Successfully";	    
      }
      else
       {
         $msg="Pls try again";
       }

}
?>

		<div id="container">
    		<div id="header">
				<a href="" id="header-image" target="_blank"></a>
				<ul class="nav">
						<?php include('top_menu.php'); ?>
				</ul>
				<ul class="subnav">
										
						<li><a href="hotel.php" class="focus">Manage Hotel</a></li>
                        <li><a href="addhotelgallery.php" class="focus">Hotel Image</a></li>
                        <li><a href="gallary.php" class="focus">Manage Image</a></li>
                        <li><a href="hoteldetails.php" class="focus">Update Details</a></li>
                        <li><a href="hotelgallery1.php" class="focus">Hotel Galley</a></li>
                        <li><a href="managegallery.php" class="focus">Manage Gallery</a></li>
                       
                        
                       
										</ul>
			</div>
			
			
			<div class="page-box">
				<div class="page-top">
					<p class="page-title">
						<span class="title-left"></span>
						<span class="title-text">Add room</span>
						<span class="title-right"></span>	
						<?php
						if($msg!='')
						{
						   echo "<font color=red size=4>".$msg."</font>";
						 }
						?>				
					</p>
				</div>
				<div class="page-middle">
			
					<div id="content">
						<style type="text/css">.ui-widget-content{border:medium none}.fileupload-content{border:1px solid #aaa}</style>
	<form action="" method="post" id="frmCreatephkRoomlll" class="form" enctype="multipart/form-data" onSubmit="return uservalidation();">
	   <?php $data=mysql_fetch_array($qry);?>
	<input type="hidden" name="oldimg" value="<?php echo $data['hotel_image']; ?>" />
     
		<p><label class="title">Hotel Name</label><input type="text" name="hotel_hotelname" value="<?php echo ($data['hotel_name']); ?>" id="hotel_hotelname" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>																								
			
		<p>
			<label class="title">Hotel image</label>
			<input type="file" name="backgroundimg" id="backgroundimg" value="" class="text w100 align_right digits" onMouseOver="return clearFieldValue(this);"/>			
			<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="htlimg/<?php echo $data['hotel_image']; ?>" width="250" height="180" /></p>
		</p>
       
         <p><label class="title">Description</label><textarea name="hotel_desc" id="hotel_desc" class="text w300 h80"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" ><?php echo ($data['hotel_desc']); ?></textarea></p>
       <p><label class="title">Address</label><textarea name="hotel_address" id="hotel_address" class="text w300 h80"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" ><?php echo ($data['address']); ?></textarea></p>
     
	   <p><label class="title">Facility</label><input type="text" name="hotel_facility" value="<?php echo ($data['facility']); ?>" id="hotel_facility" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
       <p><label class="title">Contact Details</label><textarea name="hotel_details" id="hotel_details" class="text w300 h100"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" ><?php echo ($data['contact_details']); ?></textarea></p>
	   <p><label class="title">Email ID</label><input type="text" name="hotel_email" id="hotel_email" value="<?php echo ($data['hotel_email']); ?>" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
       <p><label class="title">Nearest Airport</label><input type="text" name="hotel_airport" value="<?php echo $data['nearest_airport']; ?>" id="hotel_airport" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
	   <p><label class="title">Nearest Station</label><input type="text" name="hotel_station" value="<?php echo $data['nearest_station']; ?>" id="hotel_station" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
	   <p><label class="title">City</label><input type="text" name="hotel_city" id="hotel_city" value="<?php echo $data['city']; ?>" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
	   <p><label class="title">State</label><input type="text" name="hotel_state" value="<?php echo $data['state']; ?>" id="hotel_hotelname" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
       
       <p><label class="title">Paypal ID</label><input type="text" name="paypal_id" value="<?php echo $data['paypal_id']; ?>" id="paypal_id" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
       
       <p><label class="title">Paypal Currency</label><input type="text" name="paypal_currency" value="<?php echo ($data['paypal_currency']); ?>" id="paypal_currency" class="text w300 required"  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" /></p>
        <p>
			<label class="title">&nbsp;</label>
			<input type="submit" value="" name="submitroom" class="button button_save"/>
		</p>
	</form>
	
						</div> <!-- content -->
					
				</div> <!-- page-middle -->
				<div class="page-bottom"></div>
			</div> <!-- page-box -->
		<?php include('footer.php'); ?>
		</div> <!-- container -->
	</body>
</html>