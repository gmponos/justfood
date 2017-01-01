<?php
$database="phpexubr_justfoodgr";
$conn=mysql_connect("localhost","phpexubr_justfoo","abc12345");
if(!$conn)

	{

		echo "Could not connect to database";

	}

	mysql_select_db($database);

?>