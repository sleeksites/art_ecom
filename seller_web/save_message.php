<?php 

	require 'db_info.php';
	extract($_POST);
	$sql = "INSERT INTO `message_table`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
	$result = $con->query($sql);
	header("Location:index.php");

?>