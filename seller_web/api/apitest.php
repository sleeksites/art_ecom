<?php 
header("Access-Control-Allow-Origin: *");
?>
<?php 
extract($_POST);
require 'db_info.php';
if (empty($sort))
{
	$sort = "asc";
}
if (!empty($where)) 
{
	$sql = "select $column from `image_db` where category='$where' order by `id` $sort";	
}
if(!empty($where) && !empty($cond))
{
    $sql = "select $column from `image_db` where $cond=$where";	
}
else
{
	$sql = "select $column from `image_db` order by `id` $sort";
}
$result = $con -> query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>
