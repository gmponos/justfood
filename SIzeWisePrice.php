<?php include("config1.php");$cate_id=@$_REQUEST['c'];$aidd=explode("-",$cate_id);$cate_id=$aidd[0];
?>

<span id="extraitem2"><input type="hidden" name="choiceofmeat" id="extraitem2" value="<?php echo $aidd[1];?>" />&euro; <?php echo  number_format($aidd[1],2);?></span>


