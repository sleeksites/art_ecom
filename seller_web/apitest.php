<?php 
extract($_POST);
require 'db_info.php';
$sql = "select $column from `seller_data` where category='$where' order by `id` $sort";
$result = $con -> query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>
