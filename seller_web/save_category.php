<?php 
extract($_POST);
require 'db_info.php';
if (!empty($_FILES['category_image']))
{
	if (($_FILES['category_image']['type'] == 'image/jpeg') || ($_FILES['category_image']['type'] == 'image/gif') || ($_FILES['category_image']['type'] == 'image/png') || ($_FILES['category_image']['type'] == 'image/jpg')) 
	{
		$target_dir = "category_images/";
		$target_file = $target_dir . $category_name . ".jpeg";
		move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file);
		$sql = "insert into `category_table` (`category`,`og_link`) values ('$category_name','$target_file')";
		echo $sql;
		$con -> query($sql);
	}
	else
	{
		echo "File type error";
	}
}
else
{
	echo "No File Found";
}
?>