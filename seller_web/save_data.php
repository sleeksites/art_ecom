<?php 

	require 'db_info.php';
	extract($_POST);
	$sql_count = "select * from `seller_data`";
	$result = $con -> query($sql_count);
	$row = mysqli_num_rows ($result);
	$new_id = $row + 1;
	if (!empty($_FILES['sell_item']))
	{
		if (($_FILES['sell_item']['type'] == 'image/jpeg') || ($_FILES['sell_item']['type'] == 'image/gif') || ($_FILES['sell_item']['type'] == 'image/png') || ($_FILES['sell_item']['type'] == 'image/jpg')) 
		{
			$noncompressed_target_dir = "sell_images/";
			$noncompressed_target_file = $noncompressed_target_dir . $new_id . "img.jpeg";
			$compressed_target_dir = "compressed_data_images/";
			$compressed_target_file = $compressed_target_dir . $new_id . "img.jpeg";
			move_uploaded_file($_FILES['sell_item']['tmp_name'], $noncompressed_target_file);
			if($_FILES['sell_item']['type'] == 'image/png')
			{
				imagejpeg(imagecreatefrompng($noncompressed_target_file),$compressed_target_file,50);
			}
			else if(($_FILES['sell_item']['type'] == 'image/jpeg') || ($_FILES['sell_item']['type'] == 'image/jpg'))
			{
				imagejpeg(imagecreatefromjpeg($noncompressed_target_file),$compressed_target_file,50);
			}
			else if($_FILES['sell_item']['type'] == 'image/gif')
			{
				imagejpeg(imagecreatefromgif($noncompressed_target_file),$compressed_target_file,50);
			}
			$sql = "insert into `seller_data`(`seller_name`,`category`,`og_link`,`compressed_link`) values ('$seller_name','$category','$noncompressed_target_file','$compressed_target_file');";
			$con -> query($sql);
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("File Type error");
			</script>
			<?php
		}
	}
	else
	{
		echo " No File Found ";
	}
?>