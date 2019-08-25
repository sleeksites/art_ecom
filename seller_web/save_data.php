<?php 

	require 'db_info.php';
	extract($_POST);
	$sql_count = "select * from `seller_data` order by `id` desc";
	$result = $con -> query($sql_count);
	$i = 0;
	$prev_id = 0;
	if($result->num_rows)
	{
		while(($row = $result->fetch_assoc()) && ($i<1))
		{
			$prev_id = $row['id'];
			$i++;
		}
	}
	$new_id = $prev_id + 1;
	print_r($_FILES);
	if (!empty($_FILES['sell_item']))
	{
		if (($_FILES['sell_item']['type'] == 'image/jpeg') || ($_FILES['sell_item']['type'] == 'image/jpg') || ($_FILES['sell_item']['type'] == 'image/png')) 
		{
			$target_dir = "sell_images/";
			$target_file = $target_dir . $new_id . "img.jpg";
			move_uploaded_file($_FILES['sell_item']['tmp_name'], $target_file);
			$sql = "insert into `seller_data`(`seller_name`,`photo_links`) values ('$seller_name','$target_file');";
			$con -> query($sql);	
		}
	}

?>