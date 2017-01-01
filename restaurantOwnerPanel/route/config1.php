<?php
$database="phpexubr_justfoodgr";
$con=mysql_connect("localhost","phpexubr_justfoo","abc12345");
if(!$con)

	{

		echo "Could not connect to database";

	}

	mysql_select_db($database);

?>