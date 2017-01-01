<?php
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
										<th style="color:#000000; font-size:13px; font-weight:bold;">Restaurant </th>
					<th style="color:#000000; font-size:13px; font-weight:bold;">Order ID </th>
					<th style="color:#000000; font-size:13px; font-weight:bold;" >Date </th>
                    <th style="color:#000000; font-size:13px; font-weight:bold;">Price </th>
                    <th style="color:#000000; font-size:13px; font-weight:bold;">Rate </th>
                   <th style="color:#000000; font-size:13px; font-weight:bold;">Type </th>
				  <th style="color:#000000; font-size:13px; font-weight:bold;">Payment Method </th>
                  <th style="color:#000000; font-size:13px; font-weight:bold;">Owner Name </th>
				</tr>
			</thead>
			<tbody>';
$wdn=date("N");
			$dt2=mktime(0,0,0,date("m"),date('d'),date("Y"))-$wdn*24*3600;
			 $wKdat=date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			$dateWek=mktime(0,0,0,date('m'),date('d'),date('Y'))-(24*3600*7);
            $dateWek=date('Y-m-d',$dateWek);

if($_GET['restaurant_id']!=''){ 		
$qry=mysql_query("SELECT * FROM resto_order where restoid='".$_GET['restaurant_id']."' and odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc");
}
else
{					
$qry=mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat order by order_id desc");
}
if($qry!=false)
{
$dSmOdr='';
		$totalSum='';
	$i=1;
	while($data=mysql_fetch_array($qry))
	{
$totalSum+=$data['ordPrice'];
$CuisineQuery = mysql_query("select * from tbl_restaurantAdd where id ='".$data['restoid']."'");
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 $OwnerQuery =mysql_query("select * from tbl_restaurantOwner where restaurant_id ='".$data['restoid']."'");
 $OwnerData=mysql_fetch_assoc($OwnerQuery);	
$Commission= (($data['ordPrice']*$CuisineData['restaurant_commission'])/100);
if($Commission!='')
 {
 $Cpl=number_format($Commission,2);
 }
 else
 {
 $Cpl='0.00';
 }
            	$dSmOdr+=($data['ordPrice']*$CuisineData['restaurant_commission'])/100;
            				$html .= '<tr>
					
					<td>'.$CuisineData['restaurant_name'].'</td>
					<td>'.$data['order_identifyno'].'</td>
					<td>'.$data['odr_date'].'</td>
					<td>€ '.$data['ordPrice'].'</td>
                    <td>'.$CuisineData['restaurant_commission'].' % = € '.$Cpl
					
					.'                                    </td>
					<td>'.$data['order_type'].'</td>
                    <td>'.$data['payMode'].'</td>
                    <td>'.$OwnerData['restaurant_OwnerFirstName'].' '.$OwnerData['restaurant_OwnerLastName'].'</td>
				</tr>';
               			
                 } }              
                
            				$html .= '
							<tr><td colspan="8"><hr></td></tr>
							<tr>
		
	<td  colspan="3" style="border:none;" align="center"><strong style="color:#000080; font-size:14px;">Total : € '.$totalSum.'</strong></td>
		<td colspan="3" style="border:none;" align="right"><strong style="color:#000080; font-size:14px;">Commission : € '.$dSmOdr.'</strong></td>
		
		</tr>
				
			</tbody>
		</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+