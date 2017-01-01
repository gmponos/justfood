<?php
include('../../route/DB_Functions.php');
$dbb = new DB_Functions();
include('../../route/config1.php');
mysql_query ("set character_set_results='utf8'");
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Justfood Online Food Order');
$pdf->SetTitle('Php Expert Group');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html .= '

<table class="table table-bordered table-striped table-cth orange" style="width:100%;">
			<thead>
				<tr>
										<th style="color:#000000; font-size:13px; font-weight:bold;">Name </th>
					<th style="color:#000000; font-size:13px; font-weight:bold;">Rate </th>
					<th style="color:#000000; font-size:13px; font-weight:bold;" >Sales </th>
                    <th style="color:#000000; font-size:13px; font-weight:bold;">Commi. </th>
                    <th style="color:#000000; font-size:13px; font-weight:bold;">Paid Commi. </th>
                   <th style="color:#000000; font-size:13px; font-weight:bold;">Pending Commi. </th>
				  
				</tr>
			</thead>
			<tbody>';
			if($_GET['RestaurantOrderDateStart']!='' && $_GET['RestaurantOrderDateEnd']!=''  && $_GET['restoid']!='')
 {
 $QueryPer=" status='4' and odr_date>='".$_GET['RestaurantOrderDateStart']."' AND odr_date<='".$_GET['RestaurantOrderDateEnd']."'  and restoid='".$_GET['restoid']."'";
 }
 elseif($_GET['RestaurantOrderDateStart']!='' && $_GET['RestaurantOrderDateEnd']!='')
 {
 $QueryPer=" status='4' and odr_date>='".$_GET['RestaurantOrderDateStart']."' AND odr_date<='".$_GET['RestaurantOrderDateEnd']."'";
 }
 elseif($_GET['RestaurantOrderDateStart']!='')
 {
 $QueryPer="status='4' and odr_date='".$_GET['RestaurantOrderDateStart']."'";
 }
 elseif($_GET['restoid']!='')
 {
 $QueryPer="status='4' and restoid='".$_GET['restoid']."'";
 }
 else
 {
 $QueryPer="status='4'";
 }
 
$sql1 = "SELECT * FROM resto_order where $QueryPer  ";
$qry=mysql_query($sql1);
if($qry!=false)
{
	$dSmOdr='';
		$totalSum='';
		$paidCommession='';
		$Commission='';
	$i=1;
	while($data=mysql_fetch_array($qry))
	{
	
    $totalSum+=$data['ordPrice'];
	$paidCommession+=$data['paid_commission'];
   $CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
  $Commission=($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
  if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
 
 
  $restaurantName=$CuisineData['restaurant_name'];
 $restaurantCommission=$CuisineData['restaurant_commission'].'%';
 $pendingComm= $Commission-$data['paid_commission']; 


 if($pendingComm!='')
 {
 $PCpl=number_format($pendingComm,2);
 }
 else
 {
 $PCpl='0.00';
 }

            				$html .= '<tr>
					
					<td>'.$restaurantName.'</td>
					<td>'.$restaurantCommission.'</td>
					<td>'.$totalSum.'</td>
					<td>'.$Cpl.'</td>
                   
					<td>'.$data['paid_commission'].'</td>
                    <td>'.$PCpl.'</td>
                    
				</tr>';
               			
                 } }              
                
            				$html .= '
							<tr><td colspan="8"><hr></td></tr>
						
				
			</tbody>
		</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Commission.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+