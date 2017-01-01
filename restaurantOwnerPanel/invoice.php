<?php include('route/header.php'); 

include('route/DB_Functions.php');

$dbb = new DB_Functions();

include('route/pagination.php');



mysql_query ("set character_set_results='utf8'"); 

if($_GET['orderid']!='')

{

 

$Invoicrdata=mysql_fetch_assoc($dbb->showtabledata('tbl_invoice','invoiceNo',$_GET['orderid']));

$data=mysql_fetch_assoc($dbb->showtabledata('tbl_restaurantAdd','id',$Invoicrdata['restaurantID']));

$AdminDAta=mysql_fetch_assoc(mysql_query("select * from  tbl_siteSetting order by id desc"));

}

?>

<style type="text/css">

/*Invoice page*/

.invoice {position: relative;}

	.invoice .content {padding-left:25px; padding-right: 25px;}

	.invoice .invoice-info {float: right; margin-right: 10px;font-size: 12px; width: 100px; padding: 5px 0;}

	.invoice .invoice-info .number {float: left;}

	.invoice .invoice-info .data {float: left;}

	.invoice .print {float: right; margin-right: 25px; margin-top: 5px;}

	.invoice .print a span {margin-left: 7px !important; display: inline-block;}

	.invoice .print a {

		float: left;

		padding:0;

		width:40px;

		height: 36px;

		border: 1px solid;

		border-radius: 2px;

		-webkit-border-radius: 2px;

		-moz-border-radius: 2px;

		position: relative;

		-webkit-text-shadow: 0 1px 0 white;

		-moz-text-shadow: 0 1px 0 white;

		text-shadow: 0 1px 0 white;

		border-color: #CCC #CCC #AAA;

		background-color: #E0E0E0;

		-moz-box-shadow: inset 0 0 1px #fff;

		-ms-box-shadow: inset 0 0 1px #fff;

		-webkit-box-shadow: inset 0 0 1px white;

		box-shadow: inset 0 0 1px white;

		filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#fffafafa,EndColorStr=#ffdcdcdc);

		background-image: -moz-linear-gradient(top,#FAFAFA 0,#DCDCDC 100%);

		background-image: -ms-linear-gradient(top,#FAFAFA 0,#DCDCDC 100%);

		background-image: -o-linear-gradient(top,#FAFAFA 0,#DCDCDC 100%);

		background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,#FAFAFA),color-stop(100%,#DCDCDC));

		background-image: -webkit-linear-gradient(top,#FAFAFA 0,#DCDCDC 100%);

		background-image: linear-gradient(to bottom,#FAFAFA 0,#DCDCDC 100%);

	}

	.invoice .print a:hover {

		border:1px solid;

		background: rgb(232,232,232);

		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2U4ZThlOCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmOWY5ZjkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);

		background: -moz-linear-gradient(top,  rgba(232,232,232,1) 0%, rgba(249,249,249,1) 100%);

		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(232,232,232,1)), color-stop(100%,rgba(249,249,249,1)));

		background: -webkit-linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(249,249,249,1) 100%);

		background: -o-linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(249,249,249,1) 100%);

		background: -ms-linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(249,249,249,1) 100%);

		background: linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(249,249,249,1) 100%);

		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8e8e8', endColorstr='#f9f9f9',GradientType=0 );

		text-decoration:none;

	    border-color: rgb(170, 170, 170) rgb(170, 170, 170) rgb(153, 153, 153);

	    -webkit-box-shadow:  0px 1px 2px rgba(0, 0, 0, 0.25), 0px 0px 3px rgb(255, 255, 255) inset;

		-moz-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.25), 0px 0px 3px rgb(255, 255, 255) inset;

		box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.25), 0px 0px 3px rgb(255, 255, 255) inset;

		-webkit-transition: background 0.5s ease-in-out;

		-moz-transition: background 0.5s ease-in-out;

		-ms-transition: background 0.5s ease-in-out;

		-o-transition: background 0.5s ease-in-out;

		transition: background 0.5s ease-in-out;

	}	

	.invoice .you {float: left; margin-bottom: 15px;}

	.invoice .client {float: right;}

	.invoice .payment {float: left;}

	.invoice .total {float: right; margin-right: 20px;}

		.invoice .total span {font-size: 20px;}

	.invoice-footer {

		border: 1px solid #c4c4c4;

		padding:10px 0;

		margin-top: 10px;

		background: #f1f1f1;

	}

	.invoice-footer p {margin-left: 20px; margin-top: 10px;}



form .image {

	padding: 5px; 

	border: 1px solid #c4c4c4;

	border-radius: 2px;

	-webkit-border-radius: 2px;

	-moz-border-radius:2px;

}



/* Form Validation */

label.error {

	padding: 3px 4px 3px 4px;

	color: #c93605;

	font-weight: bold;

	text-shadow:none;

    font-size:11px;

 }



form input.error {border: 1px solid #ED7A53 !important;}

form input.valid {border: 1px solid #9FC569 !important;}



.checker label.error {

	min-width: 260px;

	text-align: right;

	display: block;

}



/*.selector label.error {

	position: absolute;

	top: 5px;

	right: 0;

	margin:0;

}*/

.invoice {

position: relative;

}

.panel {

width: 100%;

min-height: 100%;

-moz-box-shadow: 0 1px 0px rgba(255, 255, 255, 1);

-webkit-box-shadow: 0 1px 0px rgba(255, 255, 255, 1);

box-shadow: 0 1px 0px rgba(255, 255, 255, 1);

margin-bottom: 25px;

border: none;

}

.panel {

-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);

box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);

}

.panel-default {

border-color: #ddd;

}

.panel {

margin-bottom: 20px;

background-color: #fff;

border: 1px solid transparent;

border-radius: 4px;

-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);

box-shadow: 0 1px 1px rgba(0,0,0,0.05);

}

body.rtl .invoice-footer p {margin-right: 20px;}

body.rtl .invoice .payment {float: right; margin-top: 20px;}

body.rtl .invoice .total {float: left;margin-left: 20px; margin-top: 20px;}

body.rtl .invoice .print {float: left;margin-left: 25px; margin-right: 0;}

body.rtl .invoice .invoice-info {float: left;margin-left: 10px; margin-right: 0;}

body.rtl .invoice .you {float: right;}

body.rtl .invoice .client {float: left;}

ul{list-style:circle;}

</style>

<div id="page-wrap">

		<!-- left sidebar -->

		<?php include('route/side_bar.php'); ?>		

 

		<div id="main-content">

			<div id="inner">

				

				<div class="container-fluid">

					<div class="tabbable main-tabs">

						<ul class="nav nav-tabs">

							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant Invoice</a></li>

						</ul>



						<div class="tab-content"  style="height:1750px;">

							<div class="tab-pane active" id="mainFormElements"  >

								<div id="itemContainer">

								

									<div class="well">

										<div class="navbar">

											<div class="navbar-inner">

												<a class="brand" href="#">Restaurant Invoice (#<?php echo $Invoicrdata['invoiceNo']; ?>)</a>

											</div>

										</div>

                                         

										<div class="row">



                    <div class="col-lg-12">



                        <div class="panel panel-default gradient invoice">

                          <div class="panel-body">

                                <div class="you">

                                    <ul class="list-unstyled">

                                        <li><h3><?php echo ucwords($AdminDAta['website_name']); ?></h3></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($AdminDAta['website_name']); ?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($AdminDAta['website_Address']); ?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($AdminDAta['website_City']); ?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($AdminDAta['website_State']); ?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($AdminDAta['website_Country']); ?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Contact Name : <strong class="red"><?php echo ucwords($AdminDAta['website_AdminName']); ?></strong></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Phone: <strong class="red"><?php echo ucwords($AdminDAta['website_ContactPhone']); ?></strong></li>

                                        

                                    </ul>

                                </div>

                                <div class="client">

                                    <ul class="list-unstyled">

                                        <li><h3><?php echo ucwords($data['restaurant_name']);?></h3></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($data['restaurant_address']);?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span><?php echo ucwords($data['restaurantCity']);?></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Contact Name : <strong class="red"><?php echo ucwords($data['restaurant_contact_name']);?></strong></li>

                                          <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Phone : <strong class="red"><?php echo ucwords($data['restaurant_contact_phone']);?></strong></li>

                                   <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Mobile: <strong class="red"><?php echo ucwords($data['restaurant_contact_mobile']);?></strong></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Fax: <strong class="red"><?php echo ucwords($data['restaurant_fax']);?></strong></li>



                                    </ul>

                                </div>

                                <div class="clearfix"></div>



                                <table class="responsive table table-bordered">

                                    <thead>

                                      <tr>

                                        <th>#</th>

                                        <th>Invoice ID</th>

                                        <th>Total Sales</th>

                                       <th>Total Commission</th>

                                         <th>Total Paid</th>

                                      </tr>

                                    </thead>

                                    <tbody>

                                    <?php  

									$dSmOdr='';

		                            $totalSum='';

									$PaidCommession='';

									$g=mysql_query("SELECT * FROM  `resto_order` where restoid='".$data['id']."'");

	    									$i=1;

											while($orda=mysql_fetch_assoc($g))

											{

											$totalSum+=$orda['ordPrice'];

											$PaidCommession+=$orda['paid_commission'];

											$count++;

											

									   ?>

                                      <tr>

                                        <td><?php echo $count; ?></td>

                                        <td><?php echo $_GET['orderid']; ?></td>

                                        <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
										if($orda['ordPrice']!=''){
										echo number_format($orda['ordPrice'],2);
										}
										else
										{
										echo '0.00';
										}
										 ?></td>

                                        <td><?php echo $data['restaurant_commission']; ?> % = <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php  $Commission= ($orda['ordPrice']*$data['restaurant_commission'])/100;
										if($Commission!='')
										{
										echo number_format($Commission,2);
										}
										else
										{
										echo '0.00';
										}
										 ?>

                                        <?php  $dSmOdr+=($orda['ordPrice']*$data['restaurant_commission'])/100; ?>

                                        </td>

                                        <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php
										if($orda['paid_commission']!=''){
										 echo number_format($orda['paid_commission'],2);
										 }
										 else
										 {
										 echo '0.00';
										 }
										 
										  ?></td>

                                       

                                      </tr>

                                      <?php } ?>

                                       <tr>

                                      <td style="border:none;">&nbsp;</td>

                                       <td style="border:none;">&nbsp;</td>

                                      <td style="border:none;">

									 <div class="total">

                                    <h4>Total amount:<span class="red"> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
									if($totalSum!=''){
									echo number_format($totalSum,2);
									}
									else
									{
									echo '0.00';
									}
									 ?></span></h4>

                                </div>

									 </td>

                                      <td style="border:none;">

									  <div class="total">

                                    <h4>Total Commission:<span class="red"> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
									if($dSmOdr!=''){
									echo number_format($dSmOdr,2);
									}
									else
									{
									echo '0.00';
									}
									 ?></span></h4>

                                </div>

									 </td>

                                       <td style="border:none;">

									     <div class="total">

                                    <h4>Total Commission Paid:<span class="red"> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
									if($PaidCommession!=''){
									echo number_format($PaidCommession,2);
									}
									else
									{
									echo '0.00';
									}
									 ?></span></h4>

                                </div>

									   </td>

                                     

                                      </tr>

                                      <tr><td style="border:none;"  colspan="5"><hr></td></tr>

                                        <tr><td style="border:none;"  colspan="5" align="right"><a href="" class="btn btn-danger" title="Display All Invoice"  style="height:35px;width:600px;line-height:20px;font-size: 20px; float:right;background:#D9006C;"><?php $PendingPayment= $dSmOdr-$PaidCommession; ?>

										Pending Amount : <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
										if($PendingPayment!=''){
										echo number_format($PendingPayment,2);
										}
										else
										{
										echo '0.00';
										}
										 ?>

										</a> </td></tr>

                                        <tr><td style="border:none;"  colspan="5"><hr></td></tr>

                                    </tbody>

                                </table>



                                <?php /*?><div class="payment">

                                    <ul class="list-unstyled">

                                        <li><h3>Payment method: <span class="red">Pay Pal</span>  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="payform" name="payform">

<input type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="item_name" value="<?php echo $_GET['orderid']; ?>">

<input type="hidden" name="no_note" value="Restaurant Commission Charge Paid">

<input type="hidden" name="business" value="dherm9454214684@gmail.com">

<input type="hidden" name="currency_code" value="GBP">

<input type="hidden" name="cancel_return" value="http://phpexpertgroup.com/munch/restaurantOwner/">

<input name="return" value="http://phpexpertgroup.com/munch/restaurantOwner/invoice.php?orderid=<?php echo $_GET['orderid'];?>&paidID=1" type="hidden">

<input name="amount" value="<?php echo $PendingPayment;?>" type="hidden">

<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but6.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">

</form></h3></li>

                                           <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Bank Name : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankName']); ?></strong></li>

                                        <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Bank account : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankAccount']); ?></strong></li>

                                        

                                           <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Bank A/C Name : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankAccountName']); ?></strong></li>

                                           

                                             <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Swift Code : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankSwiftCode']); ?></strong></li>

                                             

                                               <li><span class="icon16 icomoon-icon-arrow-right-3"></span>IFSC Code : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankIFSCCode']); ?></strong></li>

                                               

                                                 <li><span class="icon16 icomoon-icon-arrow-right-3"></span>IBAN : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankIBAN']); ?></strong></li>

                                                 

                                                 <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Billing address : <strong class="red"><?php echo ucwords($AdminDAta['AdminBankAddress']); ?></strong></li>

                                      <li><span class="icon16 icomoon-icon-arrow-right-3"></span>Email: <strong class="red"><?php echo $AdminDAta['website_AdminEmail']; ?></strong></li>

                                    </ul>

                                </div><?php */?>



                                <div class="total">

                                    <h4>Pending Amount:<span class="red"> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
									if($PendingPayment!=''){
									echo number_format($PendingPayment,2);
									}
									else
									{
									echo '0.00';
									}
									 ?></span></h4>

                                </div>





                                <div class="clearfix"></div>

<?php if($_GET['paidID']!=''){ ?>

                                <div class="invoice-footer">

                                    <p>Thank you for paid commission we will happy to grow our income.</p>

                                </div>

                               <?php } ?>

                            </div>



                        </div><!-- End .panel -->



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

