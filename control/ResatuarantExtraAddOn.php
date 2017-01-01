<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_menuAddON","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['AddRestaurantAddons']))
{
$MenuAddOnName=implode(',',$_POST['MenuAddOnName']);
$MenuAddOnPrice=implode(',',$_POST['MenuAddOnPrice']);

$MenuAddOnName1=explode(',',$MenuAddOnName);
$MenuAddOnPrice1=explode(',',$MenuAddOnPrice);
foreach($MenuAddOnName1 as $yy=>$vvv)
{
$QueryAddons="INSERT INTO `tbl_menuAddON` (`id`, `restaurant_state`, `restaurant_city`, `restaurant_id`, `MenuCategory`, `MenuAddOnName`, `MenuAddOnPrice`, `status`) VALUES (NULL, '".$_POST['restaurant_state']."',N'".$_POST['restaurant_city']."','".$_POST['restaurant_id']."','".$_POST['menuCatgeory']."', N'$vvv', '".$MenuAddOnPrice1[$yy]."', '0')";
mysql_query($QueryAddons);
mysql_query("delete from tbl_menuAddON where MenuAddOnName='' and MenuAddOnPrice=''");
}
$msg="1";
}

 ?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
	
		
<script type="text/javascript">
/*
This script is identical to the above JavaScript function.
*/
var ct = 1;

function new_link()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;

	// link to delete extended form elements
	var delLink = '<div align="center" ><a href="javascript:delIt('+ ct +')" class="btn btn-inverse">Delete</a></div>';

	div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;

	document.getElementById('newlink').appendChild(div1);

}
// function to delete the newly added set of elements
function delIt(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newlink');

	parentEle.removeChild(ele);

}
</script>


<script type="text/javascript">
function RestaurantAddonsValidate(){
var chkStatus = true
if(document.getElementById('restaurant_id').value =="") {
document.getElementById("restaurant_id").style.background='#C10000';
document.getElementById("restaurant_id").focus();
chkStatus = false;
}
else
document.getElementById('restaurant_id').className = "";
if(document.getElementById('MenuAddOnName').value =="") {
document.getElementById("MenuAddOnName").style.background='#C10000';
document.getElementById("MenuAddOnName").focus();
chkStatus = false;
}
else
document.getElementById('MenuAddOnName').className = "";

if(document.getElementById('MenuAddOnPrice').value =="") {
document.getElementById("MenuAddOnPrice").style.background='#C10000';
document.getElementById("MenuAddOnPrice").focus();
chkStatus = false;
}
else
document.getElementById('MenuAddOnPrice').className = "";

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

                                 <script  type="text/javascript"  language="javascript">
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
xmlhttp.open("post","cityFatchOffer.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
if (str=="")
{
document.getElementById("restaurant_id").innerHTML="";
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
document.getElementById("restaurant_id").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","ResFatchOfferAddon.php?q="+str,true);
xmlhttp.send();
}



function getOrgTypeListRestMenuCategory(str){
if (str=="")
{
document.getElementById("menuCatgeory").innerHTML="";
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
document.getElementById("menuCatgeory").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","ResFatchMenuCategoryAddon.php?q="+str,true);
xmlhttp.send();
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
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Addons
                            <?php } else { ?>
                            Update Restaurant Addons
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1300px;">
							<div class="tab-pane active" id="mainFormElements"  style="height:1300px;"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Restaurant Addons
                            <?php } else { ?>
                            Update Restaurant Addons
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($msg==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Addons has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Addons is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Addons has been successfully updated.
		                                     </div>
											<?php }?>
                                            </td></tr></table>
                                            
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="" method="post" enctype="multipart/form-data" onSubmit="return RestaurantAddonsValidate();">
												
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                                      <tr>
    <td><label for="restaurant_id">Restaurant State <span style="color:#FF0000;">*</span></label></td>
    <td>	<select class="chzn-select" data-placeholder="Select Restaurant..." required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer(this.value)" style="width:317px;" >
    <option value="">Select</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                            </tr>
                                            
                                           <tr>
    <td><label for="restaurant_id">Restaurant City <span style="color:#FF0000;">*</span></label></td>
    <td>	<select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_city" name="restaurant_city" style="width:317px;" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['eid']!=''){
											  $StateQuery =mysql_query("select * tbl_city where stateID='".$CuisineData['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                            </tr>  
                                                     <tr>
    <td><label for="restaurant_id">Restaurant Name <span style="color:#FF0000;">*</span></label></td>
    <td>	<select  data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestMenuCategory(this.value)" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_id" name="restaurant_id" style="width:317px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											   if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } } ?>
											
											</select></td>
                                            </tr>
                                            
  <tr>
    <td><label>Menu Category <span style="color:#FF0000;">*</span></label></td>
    
    <td>	
   <select  id="menuCatgeory" name="menuCatgeory" required style="width:317px;" >
    <option value="">Select Menu Category</option>
											  <?php 
											   $StateQuery = mysql_query("select * from tbl_restMenuCategory group by restaurantMenuName order by restaurantMenuName asc ");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['MenuCategory']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurantMenuName']); ?></option>
                                              <?php } ?>
											
											</select>
                </td>
  </tr>

  
   <tr>
    <td><label>Addons <span style="color:#FF0000;">*</span></label></td>
    <td>
    <div id="newlink">
 <table width="100%">
   <tr >
    <td>Name <input type="text" name="MenuAddOnName[]"  style="width:250px;" onMouseOver="return clearFieldValue(this);" required onClick="return clearFieldValue(this);"  id="MenuAddOnName" value=""></td>
    
    <td>Price <input type="text" name="MenuAddOnPrice[]"  onkeyup="isNumber(this)" onMouseOver="return clearFieldValue(this);" required onClick="return clearFieldValue(this);"  id="MenuAddOnPrice" style="width:250px;" value="0.00"></td>
   
   
  </tr>
  </table>
   </div>
 <div id="newlinktpl" style="display:none;">
  <table width="100%">
   <tr >
   
   <td>Name <input type="text" name="MenuAddOnName[]" style="width:250px;" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="MenuAddOnName" value=""></td>
    
    <td>Price <input type="text" name="MenuAddOnPrice[]" style="width:250px;" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="MenuAddOnPrice" value=""></td>
  
  </tr>
  </table>
   </div>
   
    	
    </td>
  </tr>
  
 <tr><td colspan="2" align="right"> <p id="addnew" align="center">
	<a href="javascript:new_link()" class="btn btn-inverse">Add More Addons</a>
</p></td></tr>
   
  
  
  
  <tr><td colspan="2">&nbsp;</td></tr>
  
   <tr><td colspan="2" align="center">
				<input type="submit" class="btn btn-inverse" name="AddRestaurantAddons"  value="Submit Addons" >

				</td></tr>
  
  

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
