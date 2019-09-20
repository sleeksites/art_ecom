<?php 
	session_start();
	require 'db_info.php';
	extract($_POST);
	$hash = md5($pwd);
	$sql = "select * from `seller_data` where email='$email'";
	$result = $con -> query($sql);
	$rows = $result->num_rows;
	if ($rows > 0)
	{
		$_SESSION['user_exists'] = 1;
	}
	else
	{
		$insert_sql = "INSERT INTO `seller_data`(`seller_name`, `address`, `gender`, `state`, `city`, `birth_date`, `pincode`, `email`, `password`) VALUES ('$fname.$lname','$address','$gender','$state','$city','$birth_date','$pincode','$email','$hash')";
		$con -> query($insert_sql);
		$_SESSION['user_added'] = 1;
	}
	header("Location:../login/");
?>	