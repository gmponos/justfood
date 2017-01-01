<?php

include_once 'config.php';
//date_default_timezone_set ('Asia/Bangkok');
//date_default_timezone_set ('Europe/Bucharest');
//date_default_timezone_set ('Pacific/Honolulu');
//date_default_timezone_set ('Australia/Melbourne');
class User {

public function __construct() 

{

        $db = new DB_Class();

}





public function num_rows($query)
{
	
	$url2=mysql_num_rows($query);
	return $url2;
	
}

public function fetch_data($query)
{
	
	$url2=mysql_fetch_assoc($query);
	return $url2;
	
}	
public function showtabledata($table_name,$field,$id)

{

	$url1="select * from ".$table_name." where ".$field."='$id'";

	$url2=mysql_query($url1);

	return $url2;

	

}

public function showdata($table_name,$id)

{

	$url1="select * from ".$table_name." where id='$id'";

	$url2=mysql_query($url1);

	return $url2;

	

}



public function showreviewtable($table_name)

{

	$url1="select * from ".$table_name." where status='0' order by id desc";

	$url2=mysql_query($url1);

     return $url2;

}



public function showall($table_name,$id)

{

	$url1="select * from ".$table_name." where id='$id'";

	$url2=mysql_query($url1);

    return $no_rows = mysql_num_rows($url2);

}



public function showallcontent($table_name,$id)

{

	$url1="select * from ".$table_name." where id='$id'";

	$url2=mysql_query($url1);

    return $url2;

}





public function showdatamail($table_name,$field,$id)

{

	$url1="SELECT * FROM  ".$table_name." where  ".$field." ='$id' ";

	$url2=mysql_query($url1);

    return $url2;

}





public function showallgadet($table_name,$type,$value,$sort)

{

	 $url1="select * from ".$table_name." where ".$type."='".$value."' order by ".$sort." asc";

	$url2=mysql_query($url1);

     return $url2;

	

}



public function showallgadets($table_name,$type,$value,$sort)

{

	 $url1="select * from ".$table_name." where ".$type."='".$value."' order by ".$sort." asc limit 20";

	$url2=mysql_query($url1);

     return $url2;

	

}









public function showallmake($table_name,$status,$sort)

{

	 $url1="select * from ".$table_name." where ".$status."='0' order by ".$sort." asc";

	$url2=mysql_query($url1);

     return $url2;

	

}



public function showallmaketop($table_name,$sort,$status)

{

	 $url1="select * from ".$table_name." where ".$status."='0' and top='0' order by ".$sort." asc";

	$url2=mysql_query($url1);

     return $url2;

	

}



public function showallmakelimit($table_name,$sort,$status,$limit)

{

	 $url1="select * from ".$table_name." where ".$status."='0' and feature='0' order by ".$sort." asc limit ".$limit."";

	$url2=mysql_query($url1);

     return $url2;

	

}





public function showbanner($table_name,$status,$sort)

{

	  $url1="select * from ".$table_name." where ".$status."='0'  order by ".$sort." asc";

	$url2=mysql_query($url1);

     return $url2;

	

}





public function morecitiesshow($table_name,$sort,$status)

{

	 $url1="select * from ".$table_name." where ".$status."='0' and feature='1' order by ".$sort." asc";

	$url2=mysql_query($url1);

     return $url2;

	

}







public function showalltable($table_name)

{

	$url1="select * from ".$table_name." where status='0'";

	$url2=mysql_query($url1);

     return $url2;

}





public function showtable($table_name)

{

	$url1="select * from ".$table_name." where status='0' ";

	$url2=mysql_query($url1);

     return $url2;

}





public function showtablestate($table_name)

{

	$url1="select * from ".$table_name." where state_status='0' order by state_name asc ";

	$url2=mysql_query($url1);

     return $url2;

}







public function showtopads($table_name)

{

	$url1="select * from ".$table_name." where status='0' and feature='0' order by id desc ";

	$url2=mysql_query($url1);

     return $url2;

}







public function showallcity($table_name,$sort)

{

	 $url1="select * from ".$table_name." order by ".$sort." asc";

	$url2=mysql_query($url1);

     return $url2;

	

}





	

public function addnewcustomer($table_name,$cus_name,$cus_address,$cus_building,$cus_crostreet,$state,$cus_city,$cus_zip,$cus_phone,$address_lab,$cus_email,$cus_pwd,$mobile_code) 

{

$today = date("F j, Y");

$ip=$_SERVER['REMOTE_ADDR'];

		$sql = mysql_query("SELECT * from ".$table_name." WHERE  cus_email = '$cus_email'");

        $no_rows = mysql_num_rows($sql);

		if ($no_rows == 0) 

		{

        $result = mysql_query("INSERT INTO ".$table_name." (`id`, `cus_name`, `cus_address`, `cus_building`, `cus_crostreet`,`state`, `cus_city`, `cus_zip`, `cus_phone`, `address_lab`, `cus_email`, `cus_pwd`,`mobile_code`, `input_date`, `ip_address`, `status`) VALUES (NULL, '".mysql_real_escape_string($cus_name)."', '".mysql_real_escape_string($cus_address)."',  '".mysql_real_escape_string($cus_building)."',  '".mysql_real_escape_string($cus_crostreet)."',  '".mysql_real_escape_string($state)."', '".mysql_real_escape_string($cus_city)."',  '".mysql_real_escape_string($cus_zip)."',  '".mysql_real_escape_string($cus_phone)."',  '".mysql_real_escape_string($address_lab)."', '".mysql_real_escape_string($cus_email)."',  '".mysql_real_escape_string($cus_pwd)."','$mobile_code', '$today', '$ip', '0')") or die(mysql_error());

		

	

		

        return $result;

		}

		else

		{

		return FALSE;

		}

		

    }

	

	

	

public function updatenewcustomer($table_name,$cus_name,$cus_address,$cus_building,$cus_crostreet,$state,$cus_city,$cus_zip,$cus_phone,$address_lab,$cus_email,$id) 

{

$today = date("F j, Y");

$ip=$_SERVER['REMOTE_ADDR'];

$result=mysql_query("UPDATE  ".$table_name." SET  `cus_name` ='".mysql_real_escape_string($cus_name)."',`cus_address` ='".mysql_real_escape_string($cus_address)."',`cus_building` = '".mysql_real_escape_string($cus_building)."',`cus_crostreet` ='".mysql_real_escape_string($cus_crostreet)."',`state` ='".mysql_real_escape_string($state)."',`cus_city` =  '".mysql_real_escape_string($cus_city)."',`cus_zip` ='".mysql_real_escape_string($cus_zip)."',`cus_phone` ='".mysql_real_escape_string($cus_phone)."',`address_lab` =  '".mysql_real_escape_string($address_lab)."',`cus_email` ='$cus_email',`input_date` = '$today',`ip_address` = '$ip' WHERE  `id` ='$id'")or die(mysql_error());



        return $result;

		

		

    }	

	public function insert_contact($cname,$cemail,$cphone,$cmessage)

{

	  $today=date('d-m-y');

  $result =mysql_query("INSERT INTO `contact_us` (`id`, `cname`, `cemail`, `cphone`, `cmessage`, `inputdate`) VALUES (NULL, '".mysql_real_escape_string($cname)."', '".mysql_real_escape_string($cemail)."', '$cphone', '".mysql_real_escape_string($cmessage)."', '$today')");

 

	return $result;

	

}



public function change_password($old_pass,$new_pass,$id)

{

	$query = "SELECT * FROM `tbl_customer`  WHERE cus_pwd='".$old_pass."' AND id='".$id."'";

    $result = mysql_query($query)or die(mysql_error());

    $num_row = mysql_num_rows($result);

    if($num_row==1) {

		$result1=mysql_query("UPDATE  `tbl_customer` SET  `cus_pwd` = '".$new_pass."' WHERE  `id` ='".$id."'");

		//echo "UPDATE  `tbl_user` SET  `password` = '".$_POST['new_pass']."' WHERE  `id` ='".$_SESSION['uid']."''";

       return $result1;

    }

	else

	{

		return FALSE;

	}

	

}







public function change_profile($first_name,$last_name,$email,$cellno,$address,$zip,$county,$city,$sex,$id)

{

	

		$result1=mysql_query("UPDATE  `tbl_customer` SET  `name` = '".$first_name."' , `surname` = '".$last_name."' , `username_email` = '".$email."' ,`telephone` = '".$cellno."',`address` = '".$address."', `zip` = '".$zip."',`county` = '".$county."',`city` = '".$city."',`sex` = '".$sex."' WHERE  `id` ='".$id."'");

		//echo "UPDATE  `tbl_user` SET  `password` = '".$_POST['new_pass']."' WHERE  `id` ='".$_SESSION['uid']."''";

if($result1)

	{

       return $result1;

    }

	else

	{

		return FALSE;

	}

	

}



public function showcombo($table_name,$distinct,$sort)

{

	$url1="select distinct ".$distinct." from ".$table_name." order by ".$sort." asc ";

	$url2=mysql_query($url1);

	return $url2;

	

}









public function displayresultbycity($table_name,$city)

{

	$url1="select * from ".$table_name." where city='$city'";

	//echo "select * from ".$table_name." where city='$city'";

	$url2=mysql_query($url1);

	return $url2;

	

}









public function check_login($username_email,$password) 

	{

        //$password = md5($password);

		

        $result =mysql_query("SELECT * from tbl_customer WHERE cus_email = '$username_email' and cus_pwd = '$password' and status='0'");

        $user_data = mysql_fetch_assoc($result);

        $no_rows = mysql_num_rows($result);

		

        if ($no_rows == 1) 

		{

		

		

		 $_SESSION['login'] = true;

            $_SESSION['uid'] = $user_data['id'];

			$_SESSION['cus_name'] = $user_data['cus_name'];

           

		

            return TRUE;

        }

        else

		{

		    return FALSE;

		}

    }

	



    public function get_fullname($uid) 

	{

        $result = mysql_query("SELECT name FROM users WHERE uid = $uid");

        $user_data = mysql_fetch_array($result);

        echo $user_data['name'];

    }

  



    public function get_session() 

	{

	    

        return $_SESSION['login'];

    }



    public function user_logout() {

        $_SESSION['login'] = FALSE;

        session_destroy();

    }



}



?>

