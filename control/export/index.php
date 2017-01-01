<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>School  Database System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
<script type="text/javascript" src="js/autofill.js"></script>
<script language="JavaScript">
function Check(chk)
{ 
if(document.myform.Check_ctr.checked==true)
{
for (var i = 0; i < chk.length; i++)
{
chk[i].checked = true ;
}
}
else
{
for (i = 0; i < chk.length; i++)
chk[i].checked = false ;
}
}
</script>
<script type="text/javascript">
function confirmDelete() 
{
	var msg = "Are you sure you want to delete?";       
    return confirm(msg);
}
</script>
<script language="javascript">
function download()
{
	window.location.href='billreport.xls';
}
</script>
</head>
<body>
<div id="wrapper">
Seach item number (item number range between 1 to 9)<br />
<form action="" method="post">
From: <input name="from" type="text" />&nbsp;
To: <input name="to" type="text" />
<input type="submit" value="seach">
</form>
<table width="660" border="1" cellpadding="1" cellspacing="0">
  <tr>
    <td width="149" bgcolor="#33CC00"><strong>Item Number</strong></td>
    <td width="323" bgcolor="#33CC00"><strong>Description</strong></td>
    <td width="82" bgcolor="#33CC00"><strong>Price</strong></td>
    <td width="88" bgcolor="#33CC00"><strong>Quantity</strong></td>
  </tr>
  <?php
require_once("config.php");
mysql_query ("set character_set_results='utf8'");
$sql = mysql_query("SELECT * FROM resto_order order by order_id desc ");
while($result=mysql_fetch_array($sql))
	{
  echo '<tr>
    <td>'.$result['order_identifyno'].'</td>
    <td>'.$result['ordPrice'].'</td>
    <td>'.$result['order_type'].'</td>
    <td>'.$result['payMode'].'</td>
  </tr>';
  }
  ?>
</table>

<?php
error_reporting (E_ALL ^ E_NOTICE);

require_once("config.php");
require_once("excelwriter.class.php");

$excel=new ExcelWriter("billreport.xls");
if($excel==false)	
echo $excel->error;
$myArr=array("");
$myArr=array("Product Report");
$excel->writeLine($myArr);
$myArr=array("");
$excel->writeLine($myArr);
$myArr=array("Order No","Description","Price","Quantity");
$excel->writeLine($myArr);
$qry=mysql_query("SELECT * FROM resto_order order by order_id desc");
if($qry!=false)
{
	$i=1;
	while($res=mysql_fetch_array($qry))
	{
		$myArr=array($res['order_identifyno'],$res['ordPrice'],$res['odr_date'],$res['order_type']);
		$excel->writeLine($myArr);
		$i++;
	}
}
?>
<a href="billreport.xls" target="_blank" onClick="download();">Download</a>

</div>
</body>
</html>
