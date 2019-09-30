<?php 
	session_start();
	extract($_POST);
	$hash_check = md5($pwd);
	require('db_info.php');
	$sql = "select email,password from `admin_login` where email='$email' && password='$hash_check'";
	$result = $con -> query($sql);
	$rows = $result->num_rows;
	if($rows == 1)
	{
		$_SESSION['is_Admin'] = 1;
		?>
		<script>
		window.location="../";
		</script>
		<?php
	}
	else
	{
		$_SESSION['login_error'] = 1;
		?>
		<script>
		window.location="index.php";
		</script>
		<?php
	}
?>