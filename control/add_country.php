<?php include('route/header.php');
 include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_country","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_country` WHERE `id` = '$id'");
		mysql_query("delete from tbl_state where countryID='$id'");
         mysql_query("delete from tbl_city where countryID='$id'");
         mysql_query("delete from tbl_PostcodeArea where countryID='$id'");
		if(!$query) { 
		header("location:add_country.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_country` set status='0' WHERE `id` = '$id'");
		
		$query1 = mysql_query("update `tbl_state` set status='0' WHERE `countryID` = '$id'");
		$query1 = mysql_query("update `tbl_city` set status='0' WHERE `countryID` = '$id'");
		$query1 = mysql_query("update `tbl_PostcodeArea` set status='0' WHERE `countryID` = '$id'");
		
		if(!$query) { 
		header("location:add_country.php");
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
		$query = mysql_query("update `tbl_country` set status='1' WHERE `id` = '$id'");
		$query1 = mysql_query("update `tbl_state` set status='1' WHERE `countryID` = '$id'");
		$query1 = mysql_query("update `tbl_city` set status='1' WHERE `countryID` = '$id'");
		$query1 = mysql_query("update `tbl_PostcodeArea` set status='1' WHERE `countryID` = '$id'");
		if(!$query) 
		{ 
		header("location:add_country.php");
		}
	}
	
	 // redirent after deleting
}

 ?>	
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 

<script type="text/javascript">
function RestaurantCountryValidate(){
var chkStatus = true
if(document.getElementById('countryName').value =="") {
document.getElementById("countryName").style.background='#C10000';
document.getElementById("countryName").focus();
chkStatus = false;
}
else
document.getElementById('countryName').className = "";
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
							<li class="active" ><a href="#mainFormElements" data-toggle="tab" style="color:#FFFFFF;"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Country
                            <?php } else { ?>
                            Update Country
                            <?php } ?>
                            </a></li>
						</ul>

						<div class="tab-content"   style="min-height:900px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
                                            <?php  if($_GET['eid']=='')
										   { ?>
												<a class="brand" href="#">Setup New Country</a>
                                            <?php } else { ?>
                                            <a class="brand" href="#">Update Country</a>
                                            <?php } ?>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Country has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Country is already exit.
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
										    $url="InsertPhp.php?tag=ResCountryEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Country";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResCountryAdd";
										   $buttonValue="Add New Country";
										   }
										   
										   ?>
											 
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantCountryValidate();">
												
                                                    <table  align="center" border="0">
                                                     <tr>
   <td><label for="Name">Country Name  <span style="color:#FF0000;">*</span></label></td>
    <td><input  name="countryName" id="countryName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['countryName']; ?>"  type="text"   style="width:250px;"/></td></tr>
   
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
												<a class="brand" href="#">Display Country</a>
											</div>
										</div>
                                        <div>  <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Country has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Country has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Country has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                              <?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "`tbl_country`";
		$url="add_country.php?country=1&";
		$where="1";
		 $query = mysql_query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             <br />
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Country" value="Delete All" onClick="return confirm('Are you sure to delete selected Country');" type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Country" value="Activate All" onClick="return confirm('Are you sure to activate selected Country');"   type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Country" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Country');"   type="submit"></td></tr>
                                                    <?php }  ?>
												<tr>
                                                
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th>Country Name</th>
                                                    <th>Created Date</th>
													<th>Action</th>
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
													<td><?php echo ucwords($row['countryName']);?></td>
													<td><?php echo ucwords($row['created_date']);?></td>
													<td>	<a href="add_country.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Country">Edit</a>
						<a href="InsertPhp.php?tag=ResCountryDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Country" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResCountryActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Country">Deactivate</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResCountryActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Country">
                        Activate</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="3" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Country is available in current Database.</strong></td></tr>
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
