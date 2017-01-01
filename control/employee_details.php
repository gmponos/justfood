<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['ViewId']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_RestaurantEmp","id",$_GET['ViewId']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}

 ?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		
        

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['ViewId']=='')
							{ ?>
                            Employeer Details
                            <?php } else { ?>
                             Employeer Details
                            <?php } ?>  </a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['ViewId']=='')
							{ ?>
                            Employeer Details
                            <?php } else { ?>
                             Employeer Details
                            <?php } ?></a>
											</div>
										</div>
                                        
										<div class="row-fluid" >
											<div  class=" span12">
												<form id="SignupForm" action="manage_employee.php" method="post" enctype="multipart/form-data">
												
                                                    <table width="100%" border="0">
                                                  
  <tr>
    <td><label for="EmployeeName">Employee Name</label></td>
    <td><?php echo $CuisineData['EmployeeName']; ?></td>
    <td><label for="EmployeeDesignation">Employee Designation</label></td>
    <td><?php echo $CuisineData['EmployeeDesignation']; ?></td>
  </tr>
  
   <tr>
    <td><label for="EmployeeDepartment">Employee Department</label></td>
    <td><?php echo $CuisineData['EmployeeDepartment']; ?></td>
    <td><label for="EmployeeCountry">Employee Country</label></td>
    <td><?php echo $CuisineData['EmployeeCountry']; ?></td>
  </tr>
   <tr>
    <td><label for="Name">Employee Region</label></td>
    <td><?php echo $CuisineData['EmployeeRegion']; ?></td>
    <td><label for="EmployeeCity">Employee City</label></td>
    <td><?php echo $CuisineData['EmployeeCity']; ?></td>
  </tr>
   <tr>
    <td><label for="EmployeeEmailID">Employee Email ID</label></td>
    <td><?php echo $CuisineData['EmployeeEmailID']; ?></td>
    <td><label for="EmployeeMobileNo">Employee Mobile No</label></td>
    <td><?php echo $CuisineData['EmployeeMobileNo']; ?></td>
  </tr>
   <tr>
    <td><label for="EmployeeDOB">Employee DOB</label></td>
    <td><?php echo $CuisineData['EmployeeDOB']; ?></td>
    <td><label for="EmployeeAnniversary">Employee Anniversary Date</label></td>
    <td><?php echo $CuisineData['EmployeeAnniversary']; ?></td>
  </tr>
   
   
   <tr>
    <td><label for="restaurant_Logo">Employee Photo </label></td>
    <td><img src="EmployeePhoto/<?php echo $CuisineData['EmployeePhoto'];?>" width="200" height="150" /></td>
    <td><label for="restaurant_Market_bannerImg">Employee ID Proof</label></td>
    <td><img src="EmployeeIDproof/<?php echo $CuisineData['EmployeeIDProof'];?>" width="200" height="150" /></td>
  </tr>
  
   <tr>
    <td><label for="EmployeeResidenceNo">Employee Residence No.</label></td>
    <td><?php echo $CuisineData['EmployeeResidenceNo']; ?></td>
    <td><label for="EmployeeBranchName">Employee Branch</label></td>
    <td> <?php echo $CuisineData['EmployeeBranchName']; ?></td>
  </tr>
  <tr>
    <td colspan=""><label for="EmployeeAddress">Employee Address</label></td>
    <td colspan="3">
  <?php echo $CuisineData['EmployeeAddress']; ?>
    </td>
   
  </tr>
   
    <tr>
   
    <td colspan="4" align="center">
  <input id="" type="submit" class="btn btn-primary " name="EmployeeSubmit" value="Manage Employee >>" />
    </td>
   
  </tr>
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
