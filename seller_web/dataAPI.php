<?php
require 'db_info.php';
$sql = "select * from `seller_data`";
$result = $con -> query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>