<?php 

	require 'db_info.php';
	extract($_POST);
	$sql_count = "select * from `seller_data`";
	$result = $con -> query($sql_count);
	$row = mysqli_num_rows ($result);
	$new_id = $row + 1;
	if (!empty($_FILES['sell_item']))
	{
		if (($_FILES['sell_item']['type'] == 'image/jpeg') || ($_FILES['sell_item']['type'] == 'image/jpg') || ($_FILES['sell_item']['type'] == 'image/png')) 
		{
			$target_dir = "sell_images/";
			$target_file = $target_dir . $new_id . "img.jpg";
			move_uploaded_file($_FILES['sell_item']['tmp_name'], $target_file);
			$sql = "insert into `seller_data`(`seller_name`,`category`,`photo_links`) values ('$seller_name','$category','$target_file');";
			$con -> query($sql);	
		}
	}
	else
	{
		echo " No File Found ";
	}
?>