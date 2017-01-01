<?php include('config1.php')
$sql = 'DROP DATABASE phpexubr_check';
$retval = mysql_query($sql);
if($retval)
{
echo 'Yes';
}
else
{
echo 'No';
}
?>