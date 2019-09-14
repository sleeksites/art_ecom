<?php 
	header("Access-Control-Allow-Origin: *");
?>
<?php 
	extract($_POST);
	$flag=1;
	if(empty($name) || empty($add_line_1) || empty($add_line_2) || empty($pincode) || empty($phone_no) || empty($email) || empty($id) || empty($quantity))
	{
		$flag = 0;
	}
	require "db_info.php";
	$order_arr = array("id" => $_POST['id'],"quantity" => $_POST['quantity']);
	$parsed_order_array = json_encode($order_arr);
	$id_arr = explode(",", $order_arr['id']);
	$quant_arr = explode(",", $order_arr['quantity']);
	$count = 0;
	foreach ($id_arr as $value) 
	{
		$sql = "select id,curr_quant from `seller_data` where `id`=$value";
		$result = $con->query($sql);
		if($result->num_rows>0)
		{
			$row = $result->fetch_assoc();
			if(!($quant_arr[$count]<=$row['curr_quant']))
			{
				$flag=0;
				break;
			}
		}
		else
		{
			$flag = 0;
		}
		$count++;
	}
	$count=0;
	if ($flag) 
	{
		$new_sql = "INSERT INTO `orders`(`name`, `add_line_1`, `add_line_2`, `pincode`, `phone_number`, `email`) VALUES ('$name','$add_line_1','$add_line_2','$pincode','$phone_no','$email')";
		$result = $con->query($new_sql);
		foreach ($id_arr as $value_test) 
		{
			$sql = "select id,curr_quant from `seller_data` where `id`=$value_test";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$new_quant = $row['curr_quant']-$quant_arr[$count];
			echo $new_quant;
			$update_sql = "update `seller_data` set `curr_quant` = $new_quant where `id`=$value_test";
			$con -> query($update_sql);
			$count++;
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
	else
	{
		$res_arr = array('flag' => $flag,'message' => "The sale cannot happen cause of some error");
		echo json_encode($res_arr);
	}
?>