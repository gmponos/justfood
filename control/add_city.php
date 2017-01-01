<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_city","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_city` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_city.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_city` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_city.php");
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
		$query = mysql_query("update `tbl_city` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_city.php");
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
                            Setup New City
                            <?php } else { ?>
                            Update City
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
												<a class="brand" href="#">Setup New City</a>
                                            <?php } else { ?>
                                            <a class="brand" href="#">Update City</a>
                                            <?php } ?>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New City has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New City is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                          
<script  type="text/javascript"  language="javascript">
function getOrgTypeListRest(str){
if (str=="")
{
document.getElementById("stateID").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("stateID").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","stateFatch.php?q="+str,true);
xmlhttp.send();
}

</script>

  <script type="text/javascript">
function RestaurantZipcodeValidate(){
var chkStatus = true
if(document.getElementById('countryID').value =="") {
document.getElementById("countryID").style.background='#C10000';
document.getElementById("countryID").focus();
chkStatus = false;
}
else
document.getElementById('countryID').className = "";

if(document.getElementById('stateID').value =="") {
document.getElementById("stateID").style.background='#C10000';
document.getElementById("stateID").focus();
chkStatus = false;
}
else
document.getElementById('stateID').className = "";

if(document.getElementById('cityName').value =="") {
document.getElementById("cityName").style.background='#C10000';
document.getElementById("cityName").focus();
chkStatus = false;
}
else
document.getElementById('cityName').className = "";
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
						                        
                                            </td>
  </tr>

</table>

										<div class="row-fluid" >
											<div  class=" span12">
                                           <?php 
										   if($_GET['eid']!='')
										   {
										    $url="InsertPhp.php?tag=ResCityEdit&eid=".$_GET['eid'];
											$buttonValue="Edit City";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResCityAdd";
										   $buttonValue="Add New City";
										   }
										   
										   ?>
											 
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">
												
                                                    <table  align="center" border="0">
                                                         <tr>
   <td><label for="Name">Country Name <span style="color:#FF0000;">*</span></label></td>
    <td>
    <select  data-placeholder="Select Country..." id="countryID" required name="countryID" style="width:317px;" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" onChange="getOrgTypeListRest(this.value)">
     <option value="">Select</option>
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
    <td >
   
    <select  data-placeholder="Select State..." id="stateID" required name="stateID" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" style="width:317px;"  >
    <option value="">Select</option>
											  <?php 
											  if($CuisineData['countryID']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$CuisineData['countryID']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['stateID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
											
											</select>
    </td></tr>
   
                                                     <tr>
   <td><label for="Name">City Name  <span style="color:#FF0000;">*</span></label></td>
    <td><input  name="cityName" id="cityName" required value="<?php echo $CuisineData['cityName']; ?>" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  type="text"   style="width:300px;"/></td></tr>
   
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
												<a class="brand" href="#">Display City</a>
											</div>
										</div>
                                        <div>  <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />City has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />City has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />City has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                              <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="cityName";
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
        $statement = "tbl_city";
		
		if($_GET['countryID']!='' && $_GET['stateID1']!='')
		{
		$url="add_city.php?countryID=".$_GET['countryID']."&stateID1=".$_GET['stateID1']."&";
		$where="countryID='".$_GET['countryID']."' and stateID='".$_GET['stateID1']."'";
		
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and stateID='".$_GET['stateID1']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['statusid']!='')
		{
		$url="add_city.php?statusid=".$_GET['statusid']."&";
		$where="status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='' && $_GET['countryID']!='' && $_GET['stateID1']!='')
		{
		$url="add_city.php?countryID=".$_GET['countryID']."&stateID1=".$_GET['stateID1']."&statusid=".$_GET['statusid']."&";
		$where="countryID='".$_GET['countryID']."' and status='".$_GET['statusid']."' and stateID='".$_GET['stateID1']."'";
		
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and status='".$_GET['statusid']."' and stateID='".$_GET['stateID1']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		else
		{
		$url="add_city.php?City=1&";
		$where="1";
		
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		}
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             
 <script  type="text/javascript"  language="javascript">
function getOrgTypeListRest1(str){
if (str=="")
{
document.getElementById("stateID1").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("stateID1").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","stateFatch1.php?q="+str,true);
xmlhttp.send();
}

function submitURL(Dvalue,str,restaurantState1,restaurantCity1,statusid1)
{
window.location.href="add_city.php?countryID="+restaurantState1+"&stateID1="+restaurantCity1+"&statusid"+statusid1+"&sort="+str+"&f="+Dvalue
}

</script>
                                             <br />
                                             <form action="add_city.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
    <td><strong style="font-size:14px; font-weight:bold;">Country Name : </strong> </td>
    <td> <select  class="chzn_a span8"  name="countryID" style="width:200px;" id="countryID"  onChange="getOrgTypeListRest1(this.value)">
    <option value="">select</option>
				 <?php 
				 $StateQuery = $dbb->showtable("tbl_country","countryName","asc");
                  while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
   
                </select></td>
                
                 <td><strong style="font-size:14px; font-weight:bold;">State Name : </strong> </td>
    <td id="stateID1"> <select  class="chzn_a span8"  name="stateID1"  style="width:200px;" id="stateID1"  onChange="document.userform.submit();">
    <option value="">select</option>
				 <?php 
											  if($_GET['stateID1']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$_GET['countryID']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['stateID1']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
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
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All City" value="Delete All" onClick="return confirm('Are you sure to delete selected City');" type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All City" value="Activate All" onClick="return confirm('Are you sure to activate selected City');"   type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All City" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected City');"   type="submit"></td></tr>
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
													<th><a  onclick="submitURL('countryID','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Country Name  <?php echo $imgSort;?></a></th>
                                                    <th><a  onclick="submitURL('stateID1','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['statusid'];?>');"  style="cursor:pointer;">State Name  <?php echo $imgSort;?></a></th>
                                                     <th>   <a onclick="submitURL('cityName','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">City Name
                                                     <?php echo $imgSort;?>
                                                   
                                                     </a></th>
                                                    <th><a  style="cursor:pointer;">Created Date</a></th>
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
                                                    <td><?php 
													 $StQuery1 = mysql_fetch_assoc($dbb->showtabledata("tbl_state","id",$row['stateID']));
													echo ucwords($StQuery1['stateName']);?></td>
                                                    <td><?php echo ucwords($row['cityName']);?></td>
                                                    <td><?php echo ucwords($row['created_date']);?></td>
													
													<td>	<a href="add_city.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit City">Edit</a>
						<a href="InsertPhp.php?tag=ResCityDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete City" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResCityActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate City">Deactivate</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResCityActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate City">
                        Activate</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="3" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No City is available in current Database.</strong></td></tr>
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
