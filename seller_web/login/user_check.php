<?php 
	session_start();
	extract($_POST);
	$hash_check = md5($pwd);
	require('db_info.php');
	$sql = "select email,password from `seller_data` where email='$email' && password='$hash_check'";
	$result = $con -> query($sql);
	$rows = $result->num_rows;
	if($rows == 1)
	{
		$_SESSION['is_logged_in'] = 1;
		$_SESSION['logged_in_user'] = $email;
		/*echo "Success";*/
		header("Location:../admin/");
	}
	else
	{
		$_SESSION['login_error'] = 1;
		/*echo "Error";*/
		header("Location:index.php");
	}
?>