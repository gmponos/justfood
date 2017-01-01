<?php include('route/header.php');
 include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_cuisine","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_cuisine` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_restaurant_cuisine.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_cuisine` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_restaurant_cuisine.php");
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
		$query = mysql_query("update `tbl_cuisine` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_restaurant_cuisine.php");
		}
	}
	
	 // redirent after deleting
}

 ?>	
 
 <script type="text/javascript">
function RestaurantCuisineValidate(){
var chkStatus = true
if(document.getElementById('RestaurantCuisineName').value =="") {
document.getElementById("RestaurantCuisineName").style.background='#C10000';
document.getElementById("RestaurantCuisineName").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantCuisineName').className = "";
<?php if($_GET['eid']==''){ ?>
if(document.getElementById('RestaurantCuisineImg').value =="") {
document.getElementById("RestaurantCuisineImg").style.background='#C10000';
document.getElementById("RestaurantCuisineImg").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantCuisineImg').className = "";
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
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />

<link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 
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
                            Setup New Cuisine
                            <?php } else { ?>
                            Update Cuisine
                            <?php } ?>
                            </a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
                                            <?php  if($_GET['eid']=='')
										   { ?>
												<a class="brand" href="#">Setup New Cuisine</a>
                                            <?php } else { ?>
                                            <a class="brand" href="#">Update Cuisine</a>
                                            <?php } ?>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Cuisine has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Cuisine is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                            <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Cuisine has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Cuisine has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Cuisine has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?>
                                            
                                            </td>
  </tr>
</table>

										<div class="row-fluid" >
											<div  class=" span12">
                                           <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=cuisineEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Cuisine";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=cuisineAdd";
										   $buttonValue="Add New Cuisine";
										   }
										   
										   ?>
											 
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantCuisineValidate();">
												<input type="hidden" name="RestaurantCuisineImgold" id="RestaurantCuisineImgold" value="<?php echo $CuisineData['RestaurantCuisineImg']; ?>" />
												
                                                    <table  align="center" border="0">
                                                     <tr>
   <td><label for="Name">Cuisine Name</label></td>
    <td><input  name="RestaurantCuisineName" id="RestaurantCuisineName" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['RestaurantCuisineName']; ?>"  type="text"   style="width:250px;"/></td></tr>
   
    <tr>
    <td><label for="Name">Cuisine Image</label></td>
    <td>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 75px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 75px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                     <input  name="RestaurantCuisineImg"  type="file" id="RestaurantCuisineImg" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"    style="width:300px;"/>
                                      </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
    
   </td>
  </tr>
  <tr>
   <td><label for="restaurant_country">Home Display</label></td>
    <td><table> <tr>
    <td><input type="radio" name="HomeDisplay"  class="ofrty" id="offrP" value="1" <?php if($CuisineData['HomeDisplay']==1){ ?> checked="checked" <?php } ?> onClick="displaytd();"/> Yes</td>
    <td><input type="radio" name="HomeDisplay" class="ofrty" id="offrP" <?php if($CuisineData['HomeDisplay']==0){ ?> checked="checked" <?php } ?> value="0" onClick="displaytd();"/> No</td>
  </tr></table></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
 
  <?php if($_GET['eid']!=''){ ?>
 <tr><td colspan="2" align="center"><img src="cuisineImg/<?php echo $CuisineData['RestaurantCuisineImg']; ?>" width="100" height="80" /></td></tr>
    
    <?php } ?>
     <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
    <td align="center">
  <input id="CuisineSubmit" type="submit" class="btn btn-primary " name="CuisineSubmit" value="<?php echo $buttonValue; ?>" />
    </td>
   
  </tr>
  
</table>	
												</form>
											</div>
										</div>
									</div>
                                    
                                    <script type="text/javascript">
									function submitURL(Dvalue,str)
{
window.location.href="add_restaurant_cuisine.php?sort="+str+"&f="+Dvalue+"#manage";
}
									</script>
                                    <div class="well" id="manage">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display Cuisine</a>
											</div>
										</div>
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Cuisine" value="Delete All" onClick="return confirm('Are you sure to delete selected Cuisine');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Cuisine" value="Activate All" onClick="return confirm('Are you sure to activate selected Cuisine');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Cuisine" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Cuisine');"  type="submit"></td></tr>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th><?php
													if($_GET['sort']=='asc'){
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													elseif($_GET['sort']=='desc'){
													$pl='asc';
													$imgSort='<img src="sortdesc.png" style="float:right;" />';
													}
													else
													{
													$pl='asc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
                                                     <a onclick="submitURL('RestaurantCuisineName','<?php echo $pl;?>');" style="cursor:pointer;">Cuisine Name 
                                                     <?php echo $imgSort;?></a></th>
													
                                                    <th><a  style="cursor:pointer;">Home Page</a></th>
                                                    <th><a  style="cursor:pointer;">Cuisine Icon</a></th>
													<th><a  style="cursor:pointer;">Action</a></th>
												</tr>
											</thead>
											<tbody>
                                            <?php
		  if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="RestaurantCuisineName";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "`tbl_cuisine`";
											 ?>
           <?php
            //show records
			$url="add_restaurant_cuisine.php?cuisine=1&";
		$where="1";
		
            $query = mysql_query("SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}");
            $count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
													<td><?php echo ucwords($row['RestaurantCuisineName']);?></td>
                                                    <td><?php if($row['HomeDisplay']==1){
													echo 'Yes';
													}
													else
													{
													echo 'No';
													}
													 ?></td>
													<td><img  src="cuisineImg/<?php echo $row['RestaurantCuisineImg'];?>" width="80" height="50"></td>
													<td>	<a href="add_restaurant_cuisine.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Cuisine">Edit</a>
						<a href="InsertPhp.php?tag=cuisineDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Cuisine" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=cuisineActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Cuisine">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=cuisineActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Cuisine">
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
