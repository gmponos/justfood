<?php include('route/header.php');
 include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_pyamentSetting","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_pyamentSetting` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:payment_setting.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_pyamentSetting` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:payment_setting.php");
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
		$query = mysql_query("update `tbl_pyamentSetting` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:payment_setting.php");
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
                            Setup New Payment Icon
                            <?php } else { ?>
                            Update Payment Icon
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1100px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Setup New Payment Icon
                            <?php } else { ?>
                            Update Payment Icon
                            <?php } ?></a>
											</div>
										</div>
                                         <table width="100%" border="0" align="center">
  <tr>
    <td><?php
											if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Payment Icon has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Payment Icon is already exit.
		                                     </div>
                                            <?php } ?>
                                            
                                            
                                            <?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Payment Icon has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['emsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Payment Icon has been successfully updated.
		                                     </div>
											<?php }?>
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Payment Icon has been successfully actiavted/Deactivated.
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
										    $url="InsertPhp.php?tag=paymentSettingEdit&eid=".$_GET['eid'];
											$buttonValue="Edit Payment Icon";
										   }
										   else
										   {
										   $url="InsertPhp.php?tag=paymentSettingAdd";
										   $buttonValue="Add New Payment Icon";
										   }
										   
										   ?>
											 
												<form id="SignupForm" action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">
												<input type="hidden" name="restPaymentMethodIconold" id="restPaymentMethodIcon" value="<?php echo $CuisineData['restPaymentMethodIcon']; ?>" />
                                                    <table  align="center" border="0">
                                                     <tr>
   <td><label for="restPaymentMethodName">Payment Icon Name</label></td>
    <td><input  name="restPaymentMethodName" id="restPaymentMethodName" value="<?php echo $CuisineData['restPaymentMethodName']; ?>"  type="text"   style="width:250px;"/></td></tr>
    <tr> 
    <td><label for="restPaymentMethodIcon">Payment Icon Icon</label></td>
    <td><input  name="restPaymentMethodIcon" id="restPaymentMethodIcon"  type="file"   style="width:300px;"/></td>
  </tr>
 <?php if($_GET['eid']!=''){ ?>
 <tr><td colspan="2" align="center"><img src="PaymentIcon/<?php echo $CuisineData['restPaymentMethodIcon']; ?>" width="16" height="16" /></td></tr>
    
    <?php } ?>
    <tr>
   
    <td align="center">
  <input type="submit" name="SocialMediaSubmit" id="SocialMediaSubmit" class="btn btn-primary " value="<?php echo $buttonValue; ?>" />
    </td>
   
  </tr>
</table>	
												</form>
											</div>
										</div>
									</div>
								
									
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display Payment Icon</a>
											</div>
										</div>
										<form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Payment Icon" value="Delete All" onClick="return confirm('Please select a Payment Icon(s) to delete.');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Payment Icon" value="Activate All" onClick="return confirm('Please select a Payment Icon(s) to activate.');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Payment Icon" value="Deactivate All" onClick="return confirm('Please select a Payment Icon(s) to deactivate.');"  type="submit"></td></tr>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
													<th>Payment Icon Name</th>
													<th>Payment Icon Icon</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "`tbl_pyamentSetting`";
											 ?>
           <?php
            //show records
            $query = mysql_query("SELECT * FROM {$statement} order by id desc");
             $numrowdata=mysql_num_rows($query);
			if($numrowdata>0)
			{
			$count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
													<td><?php echo ucwords($row['restPaymentMethodName']);?></td>
													<td><img  src="PaymentIcon/<?php echo $row['restPaymentMethodIcon'];?>" width="30"></td>
													<td>	<a href="payment_setting.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Cuisine">Edit</a>
						<a href="InsertPhp.php?tag=PaymentSettingDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Payment Icon" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=PaymentSettingActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Payment Icon">Activate</a><?php } else {?>
                        <a href="InsertPhp.php?tag=PaymentSettingActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Payment Icon">
                        Deactivate</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="5" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Payment Icon is available in current Database.</strong></td></tr>
                                                <?php } ?>
                
                                                
												
											</tbody>
										</table>
                                       
                                        </form>
                                       <?php /*?> <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php echo pagination($statement,$limit,$page);?></td></tr>
                                        </table><?php */?>
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
