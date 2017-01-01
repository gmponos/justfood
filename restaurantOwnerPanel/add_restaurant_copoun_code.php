<?php include('route/header.php');
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantCoupon","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantCoupon` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_restaurant_copoun_code.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantCoupon` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:add_restaurant_copoun_code.php");
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
		$query = mysql_query("update `tbl_restaurantCoupon` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:add_restaurant_copoun_code.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Coupon Code
                            <?php } else { ?>
                            Update Restaurant Coupon Code
                            <?php } ?>
                            
                            </a></li>
						</ul>

		  <script type="text/javascript">

/*function CouponCodeValidate(){

var chkStatus = true
if(document.getElementById('RestauranCouponId').value =="") {
document.getElementById("RestauranCouponId").style.background='#C10000';
document.getElementById("RestauranCouponId").focus();
chkStatus = false;
}
else
document.getElementById('RestauranCouponId').className = "";
if(document.getElementById('RestauranCouponName').value =="") {
document.getElementById("RestauranCouponName").style.background='#C10000';
document.getElementById("RestauranCouponName").focus();
chkStatus = false;
}
else
document.getElementById('RestauranCouponName').className = "";
if(document.getElementById('randomfield').value =="") {
document.getElementById("randomfield").style.background='#C10000';
document.getElementById("randomfield").focus();
chkStatus = false;
}
else
document.getElementById('randomfield').className = "";
if(document.getElementById('RestauranCouponPrice').value =="") {
document.getElementById("RestauranCouponPrice").style.background='#C10000';
document.getElementById("RestauranCouponPrice").focus();
chkStatus = false;
}
else
document.getElementById('RestauranCouponPrice').className = "";
return chkStatus;

}

function clearFieldValue(register){	

document.getElementById(register.id).style.background="#141414";

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

}*/

</script>

<script language="javascript" type="text/javascript">
function randomString() {
	var chars = "0123456789";
	var string_length = 5;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	document.SignupForm.randomfield.value ='FD'+randomstring;
}
function isNumberKey(evt)
  {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
      }
</script>
						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Coupon Code
                            <?php } else { ?>
                            Update Restaurant Coupon Code
                            <?php } ?></a>
											</div>
										</div>
                                        <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Coupon Code has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Coupon Code is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                            <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Coupon Code has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Coupon Code has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Coupon Code has been successfully actiavted/Deactivated.
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
										    $url="InsertPhp.php?tag=ResCouponCodeEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Coupon Code";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResCouponCodeAdd";
										   $buttonValue="Add New Restaurant Coupon Code";
										   }
										   
										   ?>
											 
												<form id="SignupForm" name="SignupForm" action="<?php echo $url; ?>" method="post" onsubmit="return CouponCodeValidate();" enctype="multipart/form-data">
												
												
                                                    <table  align="center" border="0">
                                                    <tr>
    <td><label for="RestauranCouponId">Restaurant Name</label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant Name..." required name="RestauranCouponId" id="RestauranCouponId" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" required style="width:317px;">
										<option value="">Select Restaurant</option>
											  <?php 
											 $StateQuery = mysql_query("select * from tbl_restaurantAdd where id='".$_SESSION['restaurant_id']."'");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_SESSION['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											  
											</select></td>
    <td><label for="RestauranCouponName">Coupon Title</label></td>
    <td><input id="RestauranCouponName" name="RestauranCouponName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" value="<?php echo $CuisineData['RestauranCouponName']; ?>" type="text"  style="width:300px;"/></td>
  </tr>
  <tr>
    <td><label for="restaurant_country">Coupon Type</label></td>
    <td><table> <tr>
    <td><input type="radio" name="RestauranCouponType"   class="ofrty" id="offrP" value="p" <?php if($CuisineData['RestauranCouponType']=='p'){ ?> checked="checked" <?php } ?> onClick="displaytd();"/> Price</td>
    <td><input type="radio" name="RestauranCouponType" class="ofrty" id="offrP" <?php if($CuisineData['RestauranCouponType']=='pr'){ ?> checked="checked" <?php } ?> value="pr" onClick="displaytd();"/> Percentage</td>
  </tr></table></td>
  </tr>
  <tr>
    <td><label for="RestauranCouponNo">Coupon Code</label></td>
    <td><input name="randomfield" id="randomfield" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" placeholder="New Coupon Code" type="text" value="<?php echo $CuisineData['RestauranCouponNo']; ?>"   style="width:200px;"/> &nbsp; <input type="button" value="Generate Coupon No." onClick="randomString();" class="btn btn-dualima" style="cursor:pointer;"></td>
    <td><label for="RestauranCouponPrice">Coupon Price</label></td>
    <td><input name="RestauranCouponPrice" id="RestauranCouponPrice" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" placeholder="New Coupn Amount" value="<?php echo $CuisineData['RestauranCouponPrice']; ?>" type="text"  style="width:300px;" /></td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
   <tr>
    <td align="center" colspan="4">
  <input type="submit" class="btn btn-primary " name="CouponSubmit" id="CouponSubmit" value="<?php echo $buttonValue; ?>" />
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
												<a class="brand" href="#">Display Coupon Code</a>
											</div>
										</div>
                                         <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="RestauranCouponName";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		$_GET['restaurant_id']=$_SESSION['restaurant_id'];
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantCoupon";
		if($_GET['restaurant_id']!='' && $_GET['statusid']!='' )
		{
		$url="add_restaurant_copoun_code.php?restaurant_id=".$_GET['restaurant_id']."&statusid=".$_GET['statusid']."&";
		$where="RestauranCouponId='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where RestauranCouponId='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['restaurant_id']!='')
		{
		$url="add_restaurant_copoun_code.php?restaurant_id=".$_GET['restaurant_id']."&";
		$where="RestauranCouponId='".$_GET['restaurant_id']."'";
		
		$qur="SELECT * FROM {$statement} where RestauranCouponId='".$_GET['restaurant_id']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="add_restaurant_copoun_code.php?statusid=".$_GET['statusid']."&";
		$where=" status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$url="add_restaurant_copoun_code.php?Coupon=1&";
		$where="1";
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             <script type="text/javascript">
											 function submitURL(Dvalue,str,restaurantCity1,statusid1)
{
window.location.href="add_restaurant_copoun_code.php?restaurant_id="+restaurantCity1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
											 </script>
                                              
                                       
                                        <form action="add_restaurant_copoun_code.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
  
  
      <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:300px;" id="statusid" onChange="document.userform.submit();" >
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
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Coupon Code" value="Delete All" onClick="return confirm('Are you sure to delete selected Coupon Code');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Coupon Code" value="Activate All" onClick="return confirm('Are you sure to activate selected Coupon Code');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Coupon Code" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Coupon Code');"  type="submit"></td></tr>
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
                                                     <a onclick="submitURL('RestauranCouponId','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Restaurant Name <?php echo $imgSort;?> </a></th>
                                                    <th> <a onclick="submitURL('RestauranCouponName','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Coupon Name <?php echo $imgSort;?> </a></th>
                                                    <th> <a onclick="submitURL('RestauranCouponNo','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Coupon Code <?php echo $imgSort;?> </a></th>
													<th> <a onclick="submitURL('RestauranCouponPrice','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Coupon Price <?php echo $imgSort;?> </a></th>
                                                    <th> <a onclick="submitURL('created_date','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Created Date <?php echo $imgSort;?> </a></th>
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
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$row['RestauranCouponId']));
													echo ucwords($StQuery['restaurant_name']);?></td>
													<td><?php echo ucwords($row['RestauranCouponName']);?></td>
												<td><?php echo ucwords($row['RestauranCouponNo']);?></td>
                                                <td><?php echo ucwords($row['RestauranCouponPrice']);?> <?php if($row['RestauranCouponType']=='pr'){ ?>%<?php } else { ?><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php } ?></td>
                                                 <td><?php echo ucwords($row['created_date']);?></td>
													<td>	<a href="add_restaurant_copoun_code.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Coupon Code">Edit</a>
						<a href="InsertPhp.php?tag=ResCouponCodeDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Coupon Code" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResCouponCodeActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Coupon Code">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResCouponCodeActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Coupon Code">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 } } else {  ?>
                                                  <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Coupon Code is available in current Database.</strong></td></tr>
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
