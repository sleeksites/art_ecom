<?php 
	header("Access-Control-Allow-Origin: *");
?>
<?php 
	$arr = explode(",",$_POST['id']);
	$main_arr = array();
	if(isset($_POST['columns']))
	{
	    $columns = $_POST['columns'];
	}
	else
	{
	    $columns = "*";
	}
	foreach ($arr as $value) 
	{
		require 'db_info.php';
		$sql = "select $columns from `seller_data` where `id`=$value";
		$result = $con -> query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		array_push($main_arr, $outp[0]);
	}
	echo json_encode($main_arr);
?>