<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restMenuCategory","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
?>
<?php 
if($_GET['RestaurantPizzaID']!=''){
$StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['RestaurantPizzaID']));
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restMenuCategory` WHERE `id` = '$id'");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		mysql_query("delete from tbl_restaurantMainMenuItem where RestaurantCategoryID='$id' and RestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
			                 mysql_query("delete from tbl_restaurantMainMenuItemdough where SizeRestaurantCategoryID='$id' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
				             mysql_query("delete from tbl_restaurantMainMenuItemPizzaBase where SizeRestaurantCategoryID='$id' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
					         mysql_query("delete from tbl_restaurantMainMenuItemPizzaChees where SizeRestaurantCategoryID='$id' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
						     mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitem where SizeRestaurantCategoryID='$id' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
							 mysql_query("delete from tbl_restaurantMainMenuItemPizzaExtraitemGroup	 where SizeRestaurantCategoryID='$id' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
							 mysql_query("delete from tbl_restaurantMainMenuItemSize where SizeRestaurantCategoryID='$id' and SizeRestaurantPizzaID='".$_GET['RestaurantPizzaID']."'");
							
		header("location:menu-entry-create-categories.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:menu-entry-create-categories.php");
		}
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restMenuCategory` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:menu-entry-create-categories.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:menu-entry-create-categories.php");
		}
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
		$query = mysql_query("update `tbl_restMenuCategory` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:menu-entry-create-categories.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:menu-entry-create-categories.php");
		}
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>
<?php if($_GET['eid']==''){ ?>                           
<?php if($_GET['RestaurantPizzaID']!=''){ ?>                           
Setup New Restaurant Menu Category for <?php echo ucwords($StQuery['restaurant_name']); ?>
<?php } else { ?>
Setup New Restaurant Menu Category
<?php } ?>
<?php } else { ?>
<?php if($_GET['RestaurantPizzaID']!=''){ ?>                           
Update Restaurant Menu Category for <?php echo ucwords($StQuery['restaurant_name']); ?>
<?php } else { ?>
Update Restaurant Menu Category
<?php } ?>
<?php } ?>

</a></li>
						</ul>
<script type="text/javascript">
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
 <script language="JavaScript" type="text/JavaScript"> 
function isNumber(field) { 
        var re = /^[0-9-'.'-',']*$/; 
        if (!re.test(field.value)) { 
            alert('Value must be all numberic charcters, including "." non numerics will be removed from field!'); 
            field.value = field.value.replace(/[^0-9-'.'-',']/g,""); 
        } 
    } 
</script> 
						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php if($_GET['eid']==''){ ?>                           
<?php if($_GET['RestaurantPizzaID']!=''){ ?>                           
Setup New Restaurant Menu Category for <?php echo ucwords($StQuery['restaurant_name']); ?>
<?php } else { ?>
Setup New Restaurant Menu Category
<?php } ?>
<?php } else { ?>
<?php if($_GET['restaurantMenuID']!=''){ ?>                           
Update Restaurant Menu Category for <?php echo ucwords($StQuery['restaurant_name']); ?>
<?php } else { ?>
Update Restaurant Menu Category
<?php } ?>
<?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Menu Category has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Menu Category is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Category has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                            <?php 
										   if($_GET['eid']!='')
										   {
										   if($_GET['RestaurantPizzaID']!=''){
											$url="InsertPhp.php?tag=ResMenuCategoryEdit&RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&eid=".$_GET['eid']."&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID'];
											$buttonValue="Edit Restaurant Menu Category";
											}
											else
											{
											$url="InsertPhp.php?tag=ResMenuCategoryEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Restaurant Menu Category";
											}
										  
										   }
										   else
										   {
										   if($_GET['RestaurantPizzaID']!=''){
										   $url="InsertPhp.php?tag=ResMenuCategoryAdd&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&RestaurantPizzaID=".$_GET['RestaurantPizzaID'];
										   $buttonValue="Add New Restaurant Menu Category";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=ResMenuCategoryAdd";
										   $buttonValue="Add New Restaurant Menu Category";
										   }
										   }
										   if($_GET['RestaurantPizzaID']!='')
										   {
										   $restaurantMenuIDsele=$_GET['RestaurantPizzaID'];
										   }
										   else
										   {
										   $restaurantMenuIDsele=$CuisineData['restaurantMenuID'];
										   }
										   ?>
                                           <script type="text/javascript">
  function test(linkl){
    window.location.href="menu-entry-create-categories.php?RestaurantPizzaID="+linkl;
  }
</script>


 <script type="text/javascript">
function RestaurantMenuCategoryValidate(){
var chkStatus = true
if(document.getElementById('RestaurantPizzaID').value =="") {
document.getElementById("RestaurantPizzaID").style.background='#C10000';
document.getElementById("RestaurantPizzaID").focus();
chkStatus = false;
}
else
document.getElementById('RestaurantPizzaID').className = "";
if(document.getElementById('restaurantMenuName').value =="") {
document.getElementById("restaurantMenuName").style.background='#C10000';
document.getElementById("restaurantMenuName").focus();
chkStatus = false;
}
else
document.getElementById('restaurantMenuName').className = "";
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

 <script type="text/javascript">
											  function getOrgTypeListRestCityOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="";
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
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","cityFatchOffer1.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("RestaurantPizzaID").innerHTML="";
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
document.getElementById("RestaurantPizzaID").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","ResFatchOfferMenuFilter.php?q="+str,true);
xmlhttp.send();
}

function submitMenuCategoryStat(str)
{
window.location.href='menu-entry-create-categories.php?restaurant_state='+str;
}

function submitMenuCategoryCity(str)
{
window.location.href='menu-entry-create-categories.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city='+str;
}

function submitMenuCategory(str)
{
window.location.href='menu-entry-create-categories.php?restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&RestaurantPizzaID='+str;
}

											 </script>
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data" onsubmit="return RestaurantMenuCategoryValidate();">
												
												
                                                    <table  align="center" border="0">
                                                 <tr>
    <td><label for="restaurant_id">Select State  <span style="color:#FF0000;">*</span></label></td>
    <td>	<select data-placeholder="Select Restaurant..." required  id="restaurant_state" name="restaurant_state" onchange="submitMenuCategoryStat(this.value)" style="width:300px;">
    <option value="">Select</option>
											  <?php 
											 
											  $State=$_GET['restaurant_state'];
											 
											  $StateQuery = mysql_query("select *  from tbl_state  order by stateName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($State==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                           </tr>
                                           <tr>
    <td><label for="restaurant_id">Select City  <span style="color:#FF0000;">*</span></label></td>
    <td>	<select data-placeholder="Select Restaurant..." required onchange="submitMenuCategoryCity(this.value)"   id="restaurant_city" name="restaurant_city" style="width:300px;" >
    <option value="">Select</option>
											  <?php 
											  
											  $city=$_GET['restaurant_city'];
											
											  if($State!=''){
											  $StateQuery =mysql_query("select *  from tbl_city where stateID='".$State."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($city==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                          </tr>
                                          <tr> 
    <td><label for="restaurantMenuID">Select Restaurant  <span style="color:#FF0000;">*</span></label></td>
    <td>	<select  data-placeholder="Select Restaurant..." required   id="RestaurantPizzaID" name="RestaurantPizzaID" onchange="submitMenuCategory(this.value);" style="width:300px;">
    <option value="">Select Restaurant</option>
											  <?php 
											  
											  $resName=$_GET['RestaurantPizzaID'];
											  
											   if($city!=''){
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd where restaurantCity=N'".$city."' order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($resName==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }  } ?>
											</select></td>
                                            </tr>
 
           <tr>                                 
    <td><label for="restaurantMenuName">Menu Category Name  <span style="color:#FF0000;">*</span></label></td>
    <td><input id="restaurantMenuName" name="restaurantMenuName" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurantMenuName'];?>" type="text"  style="width:300px;"/></td>
  </tr>
  <?php if($_GET['eid']!=''){ ?>
     <tr>                                 
    <td><label for="menuPosition">Menu View Position</label></td>
    <td><input id="menuPosition" name="menuPosition" onkeypress='return isNumberKey(event);' onMouseOver="return clearFieldValue(this);" required onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['menuPosition'];?>" type="text"  style="width:200px;"/></td>
  </tr>
  <?php } ?>
  <tr><td colspan="2"></td></tr>
  <tr>

    <td colspan="2" align="center"><textarea style="width:950px; height:100px;" placeholder="Menu Category Description" id="restaurantMenuNameDescription" name="restaurantMenuNameDescription"><?php echo $CuisineData['restaurantMenuNameDescription']; ?></textarea></td>
   
  </tr>
   <tr><td colspan="2"></td></tr>
  <tr><td></td>
    <td align="">
  <input id="" type="submit" class="btn btn-primary " value="<?php echo $buttonValue; ?>"  />
    </td>
   
  </tr>
</table>	
												</form>
											</div>
										</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="row-fluid">
    <div class="span12">
    
     <div>  
										
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Category has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Category has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                             <?php
		  if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="menuPosition";
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
        $statement = "tbl_restMenuCategory";
		$PagingCity="&restaurant_city=".$_GET['restaurant_city']."&restaurant_state=".$_GET['restaurant_state'];
		if($_GET['RestaurantPizzaID']!='' && $_GET['statusid']!='')
		{
		$url="menu-entry-create-categories.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&statusid=".$_GET['statusid'].$PagingCity."&";
		$where="restaurantMenuID='".$_GET['RestaurantPizzaID']."' and status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where restaurantMenuID='".$_GET['RestaurantPizzaID']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit} ";
		}
		elseif($_GET['RestaurantPizzaID']!='')
		{
		
		$url="menu-entry-create-categories.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID'].$PagingCity."&";
			$where="restaurantMenuID='".$_GET['RestaurantPizzaID']."'";
		$qur="SELECT * FROM {$statement} where restaurantMenuID='".$_GET['RestaurantPizzaID']."' $sortBy LIMIT {$startpoint} , {$limit} ";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="menu-entry-create-categories.php?statusid=".$_GET['statusid'].$PagingCity."&";
		
			$where="status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."'  $sortBy LIMIT {$startpoint} , {$limit}";
		}
		else
		{
		$url="menu-entry-create-categories.php?";
			$where="1";
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit} ";
		}
		
		
		
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             <script type="text/javascript">
											 function submitURL(Dvalue,str,restaurantMenuID1,statusid1)
{
window.location.href="menu-entry-create-categories.php?RestaurantPizzaID="+restaurantMenuID1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
											 </script>
                                             
         
     <br />
                                             <form action="menu-entry-create-categories.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
 <tr>
    							
                 <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:150px;" id="statusid" onChange="document.userform.submit();" >
    
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
<option value="" selected="selected">select</option>
                </select></td>
              
             
   
  </tr>
</table>
    </form>
		   <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Menu Category" value="Delete All" onClick="return confirm('Are you sure to delete selected Menu Category');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Menu Category" value="Activate All" onClick="return confirm('Are you sure to activate selected Menu Category');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Menu Category" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Menu Category');"  type="submit"></td></tr>
                                                    <?php }  ?>
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
                                                     <a onclick="submitURL('restaurantMenuName','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Menu Category <?php echo $imgSort;?></a></th>
                    <th> <a onclick="submitURL('menuPosition','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Menu Position <?php echo $imgSort;?></a></th>
					<th><a  style="cursor:pointer;">Add Sub-Menu Category</a></th>
                
					<th><a  style="cursor:pointer;">Action</a></th>
				</tr>
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
					<td><?php echo ucwords($row['restaurantMenuName']);?></td>
                    <td><?php echo ucwords($row['menuPosition']);?></td>
					<td> 
                    <?php if($_GET['RestaurantPizzaID']!=''){ ?>
                    <a href="qc_menu_entry.php?RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&RestaurantCategoryID=<?php echo $row['id']; ?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>" class="btn btn-dualima" title="Select for Restaurant Food Item">Select for Restaurant Food Item</a>
                    <?php } else { ?>
                   <?php /*?> <a href="qc_normal_item_entry.php?RestaurantCategoryID=<?php echo $row['id']; ?>" class="btn btn-empatsatu" title="Setup Normal Sub-Menu">Add Normal Sub-Menu</a><?php */?>
                    
                    <a href="qc_menu_entry.php?RestaurantCategoryID=<?php echo $row['id']; ?>&RestaurantCategoryID=<?php echo $row['id']; ?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>" class="btn btn-dualima" title="Select for Restaurant Food Item">Select for Restaurant Food Item</a>
                    <?php } ?>
                    </td>
                  
					<td>
                    <?php if($_GET['RestaurantPizzaID']!=''){ ?>
					<a href="menu-entry-create-categories.php?eid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-primary" title="Edit Menu Category">Edit</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResMenuCategoryDelete&eid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" title="Delete Menu Category" onClick="return confirm('Are you sure to do this action.');">Delete</a>
                        
                         <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuCategoryActivate&active=1&statusid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Category">Activate</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuCategoryActivate&active=0&statusid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Category">
                        Deactivate</a>
                          <?php } ?>
                      
                        <?php } else { ?>
                        <a href="menu-entry-create-categories.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Menu Category">Edit</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResMenuCategoryDelete&eid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $row['RestaurantPizzaID'];?>&restaurant_city=<?php echo $_GET['restaurant_city'];?>&restaurant_state=<?php echo $_GET['restaurant_state'];?>" class="btn btn-dualima" title="Delete Menu Category">Delete</a>
                        
                         <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuCategoryActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Category">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuCategoryActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Category">
                        Deactivated</a>
                          <?php } ?>
                        <?php } ?>
					</td>
				</tr>
                   <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="6" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Menu Category is available in current Database.</strong></td></tr>
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
