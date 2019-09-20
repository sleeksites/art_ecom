<?php 
	header("Access-Control-Allow-Origin: *");
?>
<?php 
	extract($_POST);
	$flag=1;
	$data_arr = json_decode($_POST['data']);
	foreach ($data_arr as $key => $value) 
	{
		if ($key == "fullName") 
		{
			$name = $value;
		}
		if ($key == "email") 
		{
			$email = $value;
		}
		if($key == "phone_no")
		{
			$phone_no = $value;
		}
		if($key == "add_line_1")
		{
			$add_line_1 = $value;
		}
		if($key == "add_line_2")
		{
			$add_line_2 = $value;
		}
		if ($key == "pincode")
		{
			$pincode = $value;
		}
	}
	if(empty($name) || empty($add_line_1) || empty($pincode) || empty($phone_no) || empty($email) || empty($id_quant) || empty($data))
	{
		$flag = 0;
	}
	if (empty($add_line_2))
	{
		$add_line_2 = "NA";
	}
	require "db_info.php";
	$order_arr = json_decode($_POST['id_quant']);
	$id_arr = array();
	$quant_arr = array();
	foreach ($order_arr as $key => $value) 
	{
		$sql = "select id,curr_quant from `image_db` where `id`=$key";
		$result = $con->query($sql);
		if($result->num_rows>0)
		{
			array_push($id_arr,$key);
			array_push($quant_arr, $value);
			$row = $result->fetch_assoc();
			if(!($value<=$row['curr_quant']))
			{
				$flag=2;
				break;
			}
		}
		else
		{
			$flag = 3;
		}
	}
	if ($flag == 1) 
	{
		$id_arr_json = json_encode($id_arr);
		$quant_arr_json = json_encode($quant_arr);
		$new_sql = "INSERT INTO `orders`(`name`, `add_line_1`, `add_line_2`, `pincode`, `phone_number`, `email`,`art_id`,`quant`) VALUES ('$name','$add_line_1','$add_line_2','$pincode','$phone_no','$email','$id_arr_json','$quant_arr_json')";
		$result = $con->query($new_sql);
		foreach ($order_arr as $key => $value) 
		{
			$sql = "select id,curr_quant from `image_db` where `id`=$key";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$new_quant = $row['curr_quant']-$value;
			$update_sql = "update `image_db` set `curr_quant` = $new_quant where `id`=$key";
			$con -> query($update_sql);
		}
		$sql_count = "select * from `orders`";
		$result_count = $con -> query($sql_count);
		$row = mysqli_num_rows ($result_count);
		$new_id = $row;
		$sql_id = "select * from `orders` where `id`=$new_id";
		$result_id = $con -> query($sql_id);
		$outp = $result_id->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
	}
	else if ($flag == 0)
	{
		$res_arr = array('flag' => $flag,'message' => "Some Form Element was left empty");
		echo json_encode($res_arr);
	}
	else if ($flag == 2)
	{
		$res_arr = array('flag' => $flag,'message' => "The quantity of an art is not available");
		echo json_encode($res_arr);
	}
	else if ($flag == 3)
	{
		$res_arr = array('flag' => $flag,'message' => "Invalid order id");
		echo json_encode($res_arr);
	}
?>