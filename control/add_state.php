<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_state","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_state` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_state.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_state` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_state.php");
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
		$query = mysql_query("update `tbl_state` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_state.php");
		}
	}
	
	 // redirent after deleting
}

 ?>	
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="color:#FFFFFF;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New State
                            <?php } else { ?>
                            Update State
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
												<a class="brand" href="#">Setup New State</a>
                                            <?php } else { ?>
                                            <a class="brand" href="#">Update State</a>
                                            <?php } ?>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New State has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New State is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                          
                                            
                                            </td>
  </tr>

</table>

										<div class="row-fluid" >
											<div  class=" span12">
                                           <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResStateEdit&eid=".$_GET['eid'];
											$buttonValue="Edit State";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResStateAdd";
										   $buttonValue="Add New State";
										   }
										   
										   ?>
                                           
                                           <script type="text/javascript">
function RestaurantStateValidate(){
var chkStatus = true
if(document.getElementById('countryID').value =="") {
document.getElementById("countryID").style.background='#C10000';
document.getElementById("countryID").focus();
chkStatus = false;
}
else
document.getElementById('countryID').className = "";

if(document.getElementById('stateName').value =="") {
document.getElementById("stateName").style.background='#C10000';
document.getElementById("stateName").focus();
chkStatus = false;
}
else
document.getElementById('stateName').className = "";
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
											 
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantStateValidate();">
												
                                                    <table  align="center" border="0">
                                                         <tr>
   <td><label for="Name">Country Name  <span style="color:#FF0000;">*</span></label></td>
    <td>
    <select class="chzn-select" data-placeholder="Select Country..." required id="countryID" name="countryID" style="width:317px;" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);">
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
											
											</select>
    </td></tr>
   
                                                     <tr>
   <td><label for="Name">State Name  <span style="color:#FF0000;">*</span></label></td>
    <td><input  name="stateName" id="stateName" required value="<?php echo $CuisineData['stateName']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  type="text"   style="width:250px;"/></td></tr>
   
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
                                    
                                    
                                    <div class="well" id="manage">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display State</a>
											</div>
										</div>
                                        <div>  <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />State has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />State has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />State has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                              <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="stateName";
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
        $statement = "`tbl_state`";
		if($_GET['countryID']!='')
		{
		$url="add_state.php?countryID=".$_GET['countryID']."&";
		$where="countryID='".$_GET['countryID']."'";
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' $sortBy  LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['statusid']!='')
		{
		$url="add_state.php?statusid=".$_GET['statusid']."&";
		$where="status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['statusid']!='' && $_GET['countryID']!='')
		{
		$url="add_state.php?countryID=".$_GET['countryID']."&statusid=".$_GET['statusid']."&";
		$where="countryID='".$_GET['countryID']."' and status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		else
		{
		$url="add_state.php?State=1&";
		$where="1";
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		}
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             <br />
                                              <script type="text/javascript">
											 function submitURL(Dvalue,str,restaurantCity1,statusid1)
{
window.location.href="add_state.php?countryID="+restaurantCity1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
											 </script>
                                             <form action="add_state.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
    <td><strong style="font-size:14px; font-weight:bold;">Country Name : </strong> </td>
    <td> <select  class="chzn_a span8"  name="countryID" style="width:200px;" id="countryID"  onChange="document.userform.submit();">
    <option value="">select</option>
				 <?php 
				 $StateQuery = $dbb->showtable("tbl_country","countryName","asc");
                  while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
   
                </select></td>
                
                 <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:200px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
                
             
   
  </tr>
</table>
    </form>
                                             
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All State" value="Delete All" onClick="return confirm('Are you sure to delete selected State');" type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All State" value="Activate All" onClick="return confirm('Are you sure to activate selected State');"   type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All State" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected State');"   type="submit"></td></tr>
                                                    <?php }  ?>
												<tr>
                                                <?php
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
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th><a onclick="submitURL('countryID','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Country Name <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('stateName','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">State Name <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('created_date','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Created Date <?php echo $imgSort;?></a></th>
													<th><a  style="cursor:pointer;">Action</a></th>
												</tr>
											</thead>
											<tbody>
                                          
           <?php
            //show records
            if($numrowdata>0)
			{
            $count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
													<td><?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_country","id",$row['countryID']));
													echo ucwords($StQuery['countryName']);?></td>
                                                    <td><?php echo ucwords($row['stateName']);?></td>
                                                    <td><?php echo ucwords($row['created_date']);?></td>
													
													<td>	<a href="add_state.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit State">Edit</a>
						<a href="InsertPhp.php?tag=ResStateDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete State" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResStateActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate State">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResStateActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate State">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="3" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No State is available in current Database.</strong></td></tr>
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
