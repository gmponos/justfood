<?php
include("route/config1.php");
mysql_query ("set character_set_results='utf8'"); 

error_reporting(0);
$result =mysql_query("Select * from resto_order order by order_id asc");
$file_type = "x-csv";
$file_ending = "csv";
$title="Restaurant Order Info-Sheet"."(".date('d-m-Y').")";
header("Content-Type: application/$file_type");
header("Content-Disposition: attachment; filename=$title.$file_ending");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";
$fieldname=array('ID','Order ID','Customer Name','Email Address','Address','Restaurant Name','Total Price');
foreach ($fieldname as $field) {
echo "$field" . "\t";
}
print("\n");
$count = 1;
while($row = mysql_fetch_row($result))
{
$schema_insert = "";
for($j=0 ; $j<7 ; $j++)
{
$rq1=mysql_query("select * from resto_order where order_id='$row[0]'");
$rqs1=mysql_fetch_array($rq1);
$rg=mysql_fetch_assoc(myql_query("SELECT * FROM  `tbl_restaurant` where id='".$rgs1['restoid']."'"));
if($j==0){
$schema_insert .= $count.$sep;
}
if($j==1){
$schema_insert .= $rqs1['order_identifyno'].$sep;
}
if($j==2){
$schema_insert .= $rqs1['name_customer'].$sep;
}
if($j==3){
$schema_insert .= $rqs1['email'].$sep;
}
if($j==4){
$schema_insert .= $rqs1['address'].$sep;
}
if($j==5){
$schema_insert .= $rg['restaurant_name'].$sep;
}
if($j==6){
$schema_insert .= $rqs1['ordPrice'].$sep;
}
 }

        $schema_insert = str_replace($sep."$", "", $schema_insert);

		$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);

        $schema_insert .= "\t";

        print(trim($schema_insert));

        print "\n";

		$count ++ ;

  }

?>