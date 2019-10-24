<?php  

require("./db_info.php");

if($_POST["action"]=="edit")
{
	print_r($_POST);
	extract($_POST);
	$q = "UPDATE `seller_data` SET `seller_name`='$name',`address`='$address',`gender`='$gender',`state`='$state',`city`='$city',`pincode`='$pincode',`acc_holder_name`='$acc_holder_name',`acc_type`='$acc_type',`acc_number`='$acc_number',`ifsc`='$ifsc',`pan`='$pan',`gstin`='$gstin',`email`='$email' WHERE id=$id";
	echo $q;
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