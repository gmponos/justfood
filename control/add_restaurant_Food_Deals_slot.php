<?php include('route/header.php');
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_fooddealsSlot","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if($_GET['restaurant_id']!=''){
$StQueryRestaurantName = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']));
}

if($_GET['fooddeals']!=''){
$StQueryMenuCategory = mysql_fetch_assoc($dbb->showtabledata("tbl_foodDeals","id",$_GET['fooddeals']));
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_fooddealsSlot` WHERE `id` = '$id'");
         mysql_query("delete from tbl_fooddealslotitem where slot_id='$id'");
		if(!$query) { 
		header("location:add_restaurant_Food_Deals_slot.php?fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_fooddealsSlot` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_restaurant_Food_Deals_slot.php?fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
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
		$query = mysql_query("update `tbl_fooddealsSlot` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_restaurant_Food_Deals_slot.php?fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']);
		}
	}
	
	 // redirent after deleting
}
include('imgUploadFun.php');
extract($_POST);
$today=date('d l Y');
if(isset($_POST['foodDealsSubmit']))
{
$DealsID=mysql_insert_id();
if($_POST['deals_slot']!='')
{
$Restaurantdeals_slot=implode(',',$_POST['deals_slot']);
}
$rrr=explode(",",rtrim($Restaurantdeals_slot,','));
foreach($rrr as  $yy=>$vvv)
{
$DealsCheckAvailable=mysql_query("select * from tbl_fooddealsSlot where restaurant_id='".$_GET['restaurant_id']."' and fooddeals_id='".$_GET['fooddeals']."' and fooddeals_slotName=N'$vvv'");
if(mysql_num_rows($DealsCheckAvailable)>0)
{
$error=1;
}
else
{
$pl=mysql_query("insert into tbl_fooddealsSlot(restaurant_id,fooddeals_id,fooddeals_slotName,created_date)values('".$_GET['restaurant_id']."','".$_GET['fooddeals']."',N'".$vvv."','$today')");
$msg=1;
} 
}
}

if(isset($_POST['foodDealsSubmitSave']))
{
$FoodDealsQueryUpdate="update tbl_fooddealsSlot set fooddeals_slotName=N'$fooddeals_slotName' where id='".$_GET['eid']."'";
if(mysql_query($FoodDealsQueryUpdate))
{
$emsg=1;
}
}


 ?>	
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 
                                            <script type="text/javascript">
/*
This script is identical to the above JavaScript function.
*/
var ct = 1;

function new_link3()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;

	// link to delete extended form elements
	var delLink = '<div align="center" style="margin-top: -36px;margin-bottom: 9px;" ><a href="javascript:delIt3('+ ct +')"  class="btn btn-danger">Delete</a></div>';

	div1.innerHTML = document.getElementById('newlinktpl3').innerHTML + delLink;

	document.getElementById('newlink3').appendChild(div1);

}
// function to delete the newly added set of elements
function delIt3(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newlink3');

	parentEle.removeChild(ele);

}

</script>
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		

		<div id="main-content">
			<div id="inner">
				<p style=" margin-left:8px;margin-top:15px; font-size:14px;"><a href="webindex.php">Home</a> 
                <?php if($_GET['restaurant_id']!=''){ ?>
                &raquo;<a href="manage_restaurant_options.php"><?php echo ucwords($StQueryRestaurantName['restaurant_name']); ?></a> &raquo;<a href="add_restaurant_Food_Deals.php?restaurant_id=<?php echo $_GET['restaurant_id'];?>"><?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?></a>
                <?php } ?> 
                
               
                
                </p>
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" ><a href="#mainFormElements"  data-toggle="tab" style="cursor:pointer; color:#FFFFFF;"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?>
                            <?php } else { ?>
                            Update Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?>
                            <?php } ?>
                            
                            </a></li>
						</ul>

		 

						<div class="tab-content"   style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?>
                            <?php } else { ?>
                            Update Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?>
                            <?php } ?></a>
											</div>
										</div>
                                        <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?> has been successfully saved
		                                     </div>
											<?php } if($error==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?> is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                            <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Deals has slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?> been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($emsg!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Deals has slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?> been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?> has been successfully actiavted/Deactivated.
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
										    $buttonName="foodDealsSubmitSave";
											$buttonValue="Edit Restaurant Food Deals slot";
										   }
										   else
										   {
										   $buttonName="foodDealsSubmit";
										   $buttonValue="Add New Restaurant Food Deals slot";
										   }
										   
										   ?>
											  <script type="text/javascript">
											 function DataSubmit(str)
											 {
											 window.location.href='add_restaurant_Food_Deals_slot.php?restaurant_id='+str;
											 }
											 function DataSubmit1(str)
											 {
											 window.location.href='add_restaurant_Food_Deals_slot.php?restaurant_id=<?php echo $_GET['restaurant_id'];?>&fooddeals='+str;
											 }
											 </script>
												<form id="SignupForm" action="" name="SignupForm"  method="post" enctype="multipart/form-data">
												
                                                    <table  width="100%" border="0">
                                                     <tr>
    <td><label for="restaurant_id">Restaurant Name <span style="color:#FF0000;">*</span></label></td>
    <td>	<select data-placeholder="Select Restaurant Name..." required name="restaurant_id" id="restaurant_id" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;" onChange="DataSubmit(this.value)">
										<option value="">Select Restaurant</option>
											  <?php 
											   if($_GET['restaurant_id']!='')
											{
											$restaurant_id=$_GET['restaurant_id'];
											}
											else
											{
											$restaurant_id=$CuisineData['restaurant_id'];
											}
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($restaurant_id==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
                                            </tr>
                                            
                                             <tr>
    <td><label for="restaurant_id">Food Deals Name <span style="color:#FF0000;">*</span></label></td>
    <td>	<select data-placeholder="Select Restaurant Name..." required name="fooddeals" id="fooddeals"  style="width:317px;" onChange="DataSubmit1(this.value)">
										<option value="">Select</option>
											  <?php 
											   if($_GET['fooddeals']!='')
											{
											$fooddeals=$_GET['fooddeals'];
											}
											else
											{
											$fooddeals=$CuisineData['fooddeals_id'];
											}
											  $StateQuery1 = mysql_query("select * from tbl_foodDeals where restaurant_id='".$_GET['restaurant_id']."'"); 
                                              while($StateData1=mysql_fetch_assoc($StateQuery1)){
											  ?>
                                              <option value="<?php echo $StateData1['id']; ?>" <?php if($fooddeals==$StateData1['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData1['foodDeals_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
                                            </tr>
                             <?php if($_GET['eid']==''){ ?>                      
  <tr><td><label for="deals_slot">Food Deals Slot <span style="color:#FF0000;">*</span></label></td><td> <div id="newlink3" style="margin-bottom:15px;" >
  <table width="100%">
  <tr><td><input id="deals_slot" name="deals_slot[]"  value="" required type="text" class="form-control" placeholder="" style="width:300px;"   /></td>
  <td><a href="javascript:new_link3()" class="btn btn-blue2" style="margin-left:20px;">Add More Food Deals Slot</a></td>
  </tr>
  </table>
  </div>
  
  <div id="newlinktpl3" style="display:none; margin-top:10px;">
  <table width="100%">
 
   <tr><td><input id="deals_slot" name="deals_slot[]"  value="" type="text" class="form-control" placeholder="" style="width:300px;"   /></td>  
  </tr>
  </table>
  </div>

  </td></tr>
    <?php } else { ?>
    <tr><td><label for="deals_slot">Food Deals Slot</label></td><td><input id="fooddeals_slotName" name="fooddeals_slotName"  value="<?php echo $CuisineData['fooddeals_slotName']; ?>" type="text" class="form-control" placeholder="" style="width:300px;"   /></td></tr>
    <?php } ?>
   <tr>
    <td align="center" colspan="2">
  <input type="submit" class="btn btn-primary " name="<?php echo $buttonName;?>" id="foodDealsSubmit" value="<?php echo $buttonValue; ?>" />
    </td>
   
  </tr>
</table>	
												</form>
                                                
                                                
                                                
                                                
                                                
											</div>
										</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
									</div>
								
									<div class="well" id="manage">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?></a>
											</div>
										</div>
                                         <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="id";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  desc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_fooddealsSlot";
		$url="add_restaurant_Food_Deals_slot.php?fooddeals=".$_GET['fooddeals']."&restaurant_id=".$_GET['restaurant_id']."&";
		$where="fooddeals_id='".$_GET['fooddeals']."' and restaurant_id='".$_GET['restaurant_id']."'";
		$qur="SELECT * FROM {$statement} where fooddeals_id='".$_GET['fooddeals']."' and restaurant_id='".$_GET['restaurant_id']."'  $sortBy LIMIT {$startpoint} , {$limit}";
		
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             
                                        
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Food Deals slot" value="Delete All" onClick="return confirm('Are you sure to delete selected Restaurant Food Deals slot');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Food Deals slot" value="Activate All" onClick="return confirm('Are you sure to activate selected Restaurant Food Deals slot');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Food Deals slot" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Restaurant Food Deals slot');"  type="submit"></td></tr>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th>
                                                     <a  style="cursor:pointer;">Restaurant Name </a></th>
                                                    <th> <a  style="cursor:pointer;">Food Deals Name </a></th>
                                                    <th> <a  style="cursor:pointer;">Food Deals Slot Name </a></th>
													<th> <a  style="cursor:pointer;">Add/View Food Deals Item </a></th>
                                                    <th> <a  style="cursor:pointer;">Created Date </a></th>
													<th><a  style="cursor:pointer;">Action</a></th>
												</tr>
											</thead>
											<tbody>
                                            <?php
		
		if($numrowdata>0){
		$count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
                                                     <td><?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['restaurant_id']));
													echo ucwords($StQuery['restaurant_name']);?></td>
													<td><?php 
													 $StQuery1 = mysql_fetch_assoc($dbb->showtabledata("tbl_foodDeals","id",$_GET['fooddeals']));
													echo ucwords($StQuery1['foodDeals_name']);?></td>
												<td><?php echo ucwords($row['fooddeals_slotName']);?></td>
                                                <td><a href="add_restaurant_Food_Deals_slot_item.php?fooddealsslot=<?php echo $row['id'];?>&fooddeals=<?php echo $_GET['fooddeals'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-primary" title="Add/View Food Deals Item">Add/View Food Deals Item</a></td>
                                                 <td><?php echo ucwords($row['created_date']);?></td>
													<td>	<a href="add_restaurant_Food_Deals_slot.php?eid=<?php echo $row['id'];?>&fooddeals=<?php echo $_GET['fooddeals'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-primary" title="Edit Food Deals slot">Edit</a>
						<a href="InsertPhp.php?tag=ResfoodslotDealsDelete&eid=<?php echo $row['id'];?>&fooddeals=<?php echo $_GET['fooddeals'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-dualima" title="Delete Food Deals slot" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResfoodslotDealsActivate&active=1&statusid=<?php echo $row['id'];?>&fooddeals=<?php echo $_GET['fooddeals'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Food Deals slot">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResfoodslotDealsActivate&active=0&statusid=<?php echo $row['id'];?>&fooddeals=<?php echo $_GET['fooddeals'];?>&restaurant_id=<?php echo $_GET['restaurant_id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Food Deals slot">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 } } else {  ?>
                                                  <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Food Deals slot for <?php echo ucwords($StQueryMenuCategory['foodDeals_name']); ?> is available in current Database.</strong></td></tr>
                                                <?php } ?>
												
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
