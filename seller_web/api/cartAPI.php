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
		$sql = "select $columns from `image_db` where `id`=$value";
		$result = $con -> query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		if($result->num_rows>0)
		{array_push($main_arr, $outp[0]);}
	}
	echo json_encode($main_arr);
?>