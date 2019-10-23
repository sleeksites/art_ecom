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
		$name = $fname." ".$lname;
		if($acc_number == $re_acc_number)
		{
			$sql_count = "select * from `seller_data`";
			$result = $con -> query($sql_count);
			$row = mysqli_num_rows ($result);
			$new_id = $row + 1;
			$target_dir = "seller_signs/";
			$sign_link = $target_dir . $new_id . "img.jpeg";
			$temp_name = $_FILES['sign_image']['tmp_name'];
			move_uploaded_file($temp_name, $sign_link);
			$insert_sql = "INSERT INTO `seller_data`(`seller_name`, `address`, `gender`, `state`, `city`, `pincode`, `acc_holder_name`, `acc_type`, `acc_number`, `ifsc`, `pan`, `gstin`, `sign_link`, `email`, `password`) VALUES ('$name','$address','$gender','$state','$city','$pincode','$acc_holder_name','$acc_type','$acc_number','$ifsc','$pan','$gstin','$sign_link','$email','$hash')";
			$con -> query($insert_sql);
			$_SESSION['user_added'] = 1;
		}
	}
	?>
		<!-- <script>
		window.location="login/";
		</script> -->
	<?php
?>	