<?php include('route/header.php');
include('route/DB_Functions.php');
include('imgUploadFun.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_Homeslider","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}

if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_Homeslider` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_ManageBackgroundImg.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_Homeslider` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_ManageBackgroundImg.php");
		}
	}
	
	 // redirent after deleting
}


if(isset($_POST['dactivateall'])) 
{
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_Homeslider` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_ManageBackgroundImg.php");
		}
	}
	
	 // redirent after deleting
}
 ?>	
 
 <?php
 
 extract($_POST);
 $today=date('d l Y');
 if(isset($_POST['AddRestaurantGallery']))
 {
 
 $image =$_FILES["sliderImg"]["name"];
$uploadedfile = $_FILES['sliderImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['sliderImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['sliderImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['sliderImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['sliderImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=1400;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=400;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_logo=uniqid().$_FILES['sliderImg']['name'];

$filename = "backgroundImg/".$website_logo;
$filename1 = "backgroundImg/small/".$website_logo;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
$quer="INSERT INTO `tbl_Homeslider` (`id`, `sliderImg`, `status`, `created_date`) VALUES (NULL, '$website_logo', '0', '$today');";
mysql_query($quer);
$msg="Home Flash image has been successfully saved";
}
 

if(isset($_POST['EditRestaurantGallery']))
 {
 
 $image =$_FILES["sliderImg"]["name"];
$uploadedfile = $_FILES['sliderImg']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['sliderImg']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
  {
//echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
 $size=filesize($_FILES['sliderImg']['tmp_name']);
 if ($size > MAX_SIZE*1024)
{
 //echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['sliderImg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['sliderImg']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=1400;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=400;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_logo=uniqid().$_FILES['sliderImg']['name'];

$filename = "backgroundImg/".$website_logo;
$filename1 = "backgroundImg/small/".$website_logo;



imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$website_logo=$_POST['sliderImgold'];
}

 $quer="update tbl_Homeslider set sliderImg='$website_logo' where id='".$_GET['eid']."'";
mysql_query($quer);
header("location:add_ManageBackgroundImg.php#manage");
//$emsg="Home Flash image has been updated saved";
} 
 
 ?>
 <link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 


<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
function RestaurantBackgroundValidate(){
var chkStatus = true
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('sliderImg').value =="") {
document.getElementById("sliderImg").style.background='#C10000';
document.getElementById("sliderImg").focus();
chkStatus = false;
}
else
document.getElementById('sliderImg').className = "";
<?php } ?>

return chkStatus;
}
function clearFieldValue(register){	
document.getElementById(register.id).style.background="#FFFFFF";
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
{
return false;
}
return true;
}
function alpha(e) {
var k;
document.all ? k = e.keyCode : k = e.which;
return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
}
</script> 
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
                            Setup New Home Page Flash Image
                            <?php } else { ?>
                            Update Home Page Flash Image
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Home Page Flash Image
                            <?php } else { ?>
                            Update Home Page Flash Image
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Home Page Flash Image has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Home Page Flash Image is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Home Page Flash Image has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                            <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResHomeFlashEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Home Page Flash Image";
											$name="EditRestaurantGallery";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResHomeFlashAdd";
										   $buttonValue="Add New Home Page Flash Image";
										   $name="AddRestaurantGallery";
										   }
										   
										   ?>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="" method="post" enctype="multipart/form-data" onsubmit="return RestaurantBackgroundValidate();">
												<input type="hidden" name="sliderImgold" value="<?php echo $CuisineData['sliderImg'];?>" />
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
 
  
  
   <tr>
    <td><label>Home Page Flash Image <span class="f_req">*</span></label></td>
    <td>
      <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="sliderImg" id="sliderImg" value="" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" >
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
  
    </td>
  </tr>
  

   
  <?php if($_GET['eid']!=''){ ?>
  <tr><td colspan="2">
 
                                                    <img src="backgroundImg/small/<?php echo $CuisineData['sliderImg'];?>" width="250" height="100" />
													
  </td></tr>
  <?php } ?>
  
  
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">
				<input type="submit" class="btn btn-inverse" name="<?php echo $name; ?>"  value="<?php echo $buttonValue; ?>" >

				</td></tr>
  
  

</table>	
												</form>
											</div>
										</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
									</div>
								
									
									
									<div class="well" id="manage">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display Home Flash Image</a>
											</div>
										</div>
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                              <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Home Flash Image" value="Delete All" onClick="return confirm('Are You sure to deleted all selected Home Flash Image');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Home Flash Image" value="Activate All" onClick="return confirm('Are You sure to activate all selected Home Flash Image');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Home Flash Image" value="Deactivate All" onClick="return confirm('Are You sure to Deactivate all selected Home Flash Image');"  type="submit"></td></tr>
                                            
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th>Home Flash Name</th>
													
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "`tbl_Homeslider`";
											 ?>
           <?php
            //show records
			$url="add_ManageBackgroundImg.php?Background=1&";
     		$where="1";
            $query = mysql_query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
            $count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
													
													<td><img  src="backgroundImg/small/<?php echo $row['sliderImg'];?>" width="400" height="50"></td>
													<td>	<a href="add_ManageBackgroundImg.php?eid=<?php //echo $row['id'];?>" class="btn btn-primary" title="Edit Home Flash Image">Edit</a>
						<a href="InsertPhp.php?tag=ResHomeFlashDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Home Flash Image" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResHomeFlashActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Home Flash Image">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResHomeFlashActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Home Flash Image">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 } ?>
                                                
                                                
												
											</tbody>
										</table>
                                       
                                        </form>
                                        <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php echo pagination($statement,$where,$limit,$page,$url);?></td></tr>
                                        </table>
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
 <script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
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
