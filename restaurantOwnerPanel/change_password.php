<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
include('imgUploadFun.php');
mysql_query ("set character_set_results='utf8'"); 
if($_SESSION['OwnerloginId']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantOwner","id",$_SESSION['OwnerloginId']);
 $AdminData=mysql_fetch_assoc($CuisineQuery);
}
extract($_POST);
if(isset($_POST['SubmitChnageProfile']))
{
$image =$_FILES["restaurant_OwnerLoginImg"]["name"];
$uploadedfile = $_FILES['restaurant_OwnerLoginImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['restaurant_OwnerLoginImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['restaurant_OwnerLoginImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['restaurant_OwnerLoginImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['restaurant_OwnerLoginImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=200;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=150;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$restaurant_Logo=uniqid().$_FILES['restaurant_OwnerLoginImg']['name'];

$filename = "restaurantOwnerImg/".$restaurant_Logo;
$filename1 = "restaurantOwnerImg/".$restaurant_Logo;
imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$restaurant_Logo=$_POST['restaurant_OwnerLoginImgold'];
}
$QUeryUpdate="update tbl_restaurantOwner set restaurant_OwnerFirstName=N'".$_POST['restaurant_OwnerFirstName']."' ,restaurant_OwnerLastName=N'".$_POST['restaurant_OwnerLastName']."',restaurant_OwnerLoginId=N'".$_POST['restaurant_OwnerLoginId']."',restaurant_OwnerLoginPassword='".$_POST['restaurant_OwnerLoginPassword']."',restaurant_OwnerLoginEmail='".$_POST['restaurant_OwnerLoginEmail']."',restaurant_OwnerLoginMobile='".$_POST['restaurant_OwnerLoginMobile']."',restaurant_OwnerLoginCountry=N'".$_POST['restaurant_OwnerLoginCountry']."',restaurant_OwnerLoginState=N'".$_POST['restaurant_OwnerLoginState']."',restaurant_OwnerLoginCity=N'".$_POST['restaurant_OwnerLoginCity']."',restaurant_OwnerLoginAddress=N'".$_POST['restaurant_OwnerLoginAddress']."',restaurant_OwnerLoginImg='".$restaurant_Logo."',restaurant_OwnerLoginDOB='".$_POST['restaurant_OwnerLoginDOB']."',restaurant_OwnerAnniversaryDate='".$_POST['restaurant_OwnerAnniversaryDate']."' where id='".$_SESSION['OwnerloginId']."'";
if(mysql_query($QUeryUpdate))
{
$emsg=1;
}
}
 ?>	
<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
 
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Change Profile Detail</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Change Profile Detail</a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Aministrator has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Aministrator is registered with selected restaurant.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Owner Profile has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                            
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm"  method="post" onSubmit="return addmenuValidate();" enctype="multipart/form-data">
												<input id="restaurant_OwnerLoginImgold"  name="restaurant_OwnerLoginImgold" value="<?php echo $AdminData['restaurant_OwnerLoginImgold']; ?>" required type="hidden"  style="width:300px;" />
												
                                                    <table width="100%" border="0">
                                                     <tr>
    <td><label for="AdminEmail">Owner First Name</label></td>
    <td><input id="restaurant_OwnerFirstName"  name="restaurant_OwnerFirstName" value="<?php echo $AdminData['restaurant_OwnerFirstName']; ?>"  required type="text"  style="width:300px;" /></td>
  </tr>
     <tr>
    <td><label for="AdminEmail">Owner Last Name</label></td>
    <td><input id="restaurant_OwnerLastName" required  name="restaurant_OwnerLastName" value="<?php echo $AdminData['restaurant_OwnerLastName']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="AdminEmail">Owner Email Address</label></td>
    <td><input id="restaurant_OwnerLoginEmail"  name="restaurant_OwnerLoginEmail" value="<?php echo $AdminData['restaurant_OwnerLoginEmail']; ?>" required type="email"  style="width:300px;" /></td>
  </tr>
    <tr>
    <td><label for="AdminEmail">Owner Login ID</label></td>
    <td><input id="restaurant_OwnerLoginId"  name="restaurant_OwnerLoginId" value="<?php echo $AdminData['restaurant_OwnerLoginId']; ?>"  required  type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="AdminEmail">Owner Password</label></td>
    <td><input id="restaurant_OwnerLoginPassword"  name="restaurant_OwnerLoginPassword" value="<?php echo $AdminData['restaurant_OwnerLoginPassword']; ?>" required  type="text"  style="width:300px;" /></td>
  </tr>
  <tr>
    <td><label for="AdminEmail">Owner DOB</label></td>
    <td><input id="restaurant_OwnerLoginDOB"  name="restaurant_OwnerLoginDOB" value="<?php echo $AdminData['restaurant_OwnerLoginDOB']; ?>" required type="text"  style="width:300px;" /></td>
  </tr>
  
  <tr>
    <td><label for="AdminEmail">Owner Anniversary Date</label></td>
    <td><input id="restaurant_OwnerAnniversaryDate"  name="restaurant_OwnerAnniversaryDate" value="<?php echo $AdminData['restaurant_OwnerAnniversaryDate']; ?>" required type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="AdminEmail">Owner Mobile No</label></td>
    <td><input id="restaurant_OwnerLoginMobile"  name="restaurant_OwnerLoginMobile" value="<?php echo $AdminData['restaurant_OwnerLoginMobile']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  
    <tr>
    <td><label for="AdminEmail">Owner Country Name</label></td>
    <td><input id="restaurant_OwnerLoginCountry"  name="restaurant_OwnerLoginCountry" value="<?php echo $AdminData['restaurant_OwnerLoginCountry']; ?>"  type="text"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="AdminEmail">Owner State Name</label></td>
    <td><input id="restaurant_OwnerLoginState"  name="restaurant_OwnerLoginState" value="<?php echo $AdminData['restaurant_OwnerLoginState']; ?>" required  type="text"  style="width:300px;" /></td>
  </tr>
   <tr>
    <td><label for="AdminEmail">Owner City Name</label></td>
    <td><input id="restaurant_OwnerLoginCity"  name="restaurant_OwnerLoginCity" value="<?php echo $AdminData['restaurant_OwnerLoginCity']; ?>" required type="text"  style="width:300px;" /></td>
  </tr>
    <tr>
    <td><label for="AdminEmail">Owner Address</label></td>
    <td>
    <textarea name="restaurant_OwnerLoginAddress"  id="restaurant_OwnerLoginAddress" style="width:300px;" required ><?php echo $AdminData['restaurant_OwnerLoginAddress']; ?></textarea>
  </td>
  </tr>
                                                     
    <tr>
    <td><label for="restaurant_Logo">Profile Image</label></td>
    <td>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                        <input id="restaurant_OwnerLoginImg" name="restaurant_OwnerLoginImg"  requird value="" type="file" class="input-large"  style="width:300px;" />
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <img src="restaurantOwnerImg/<?php echo $AdminData['restaurant_OwnerLoginImg']; ?>" width="100" height="80" />
  </td></tr>
    
  
   <tr>
    <td colspan="2" align="center">
  <input  type="submit" class="btn btn-primary " name="SubmitChnageProfile" id="SubmitChnageProfile" value="Change Profile" />
    </td>
   
  </tr>
</table>	
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
	<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
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
