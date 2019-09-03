<?php 
extract($_POST);
require 'db_info.php';
if (!empty($where)) 
{
	$sql = "select $column from `seller_data` where category='$where' order by `id` $sort";	
}
else
{
	$sql = "select $column from `seller_data` order by `id` $sort";
}
$result = $con -> query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>
