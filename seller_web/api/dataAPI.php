<?php 
header("Access-Control-Allow-Origin: *");
?>
<?php
require 'db_info.php';
$sql = "select * from `image_db`";
$result = $con -> query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>