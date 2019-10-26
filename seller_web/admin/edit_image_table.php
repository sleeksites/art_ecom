<?php  

require("./db_info.php");

if($_POST["action"]=="edit")
{
	extract($_POST);
	$q = "UPDATE `image_db` SET `seller_name`='$name',`company_name`='$company_name',`title`='$product_title',`description`='$description',`length`='$length',`breath`='$breath',`material`='$material',`curr_quant`=$current_quant WHERE id=$id";
	$r = $con->query($q);
	if($r)
	{
		echo "d";
	}
	else
	{
		echo "nd";
	}
}
else if($_POST["action"]=="delete")
{
	echo "delete called";
}
?>