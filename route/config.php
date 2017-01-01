<?php

ob_start();

session_start(); 

?>

<?php

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'phpexubr_justfoo');

define('DB_PASSWORD', 'abc12345');

define('DB_DATABASE', 'phpexubr_justfoodgr');



class DB_Class {



    function __construct() {

        $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysql_error());

        mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());

    }



}

function dbquery($data)

{

$res=mysql_query($data);

return $res;

}



function db_num_row($data)

{

$resnum=mysql_num_rows($data);

return $resnum;

}



function db_fetcharray($d)

{

$r=mysql_fetch_assoc($d);

return $r;

}



function db_fetchobject($data)

{

$re=mysql_fetch_object($data);

return $re;

}



?>