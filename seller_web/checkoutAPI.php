<?php 
	header("Access-Control-Allow-Origin: *");
?>
<?php 
	extract($_POST);
	$flag=1;
	$id_quant = $_POST['id_quant'];
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
	foreach ($order_arr as $key => $value) 
	{
		$sql = "select id,curr_quant from `seller_data` where `id`=$key";
		$result = $con->query($sql);
		if($result->num_rows>0)
		{
			$row = $result->fetch_assoc();
			if(!($value<=$row['curr_quant']))
			{
				$flag=0;
				break;
			}
		}
		else
		{
			$flag = 0;
		}
	}
	if ($flag) 
	{
		$new_sql = "INSERT INTO `orders`(`name`, `add_line_1`, `add_line_2`, `pincode`, `phone_number`, `email`,`id_quant`) VALUES ('$name','$add_line_1','$add_line_2','$pincode','$phone_no','$email','$id_quant')";
		$result = $con->query($new_sql);
		foreach ($order_arr as $key => $value) 
		{
			$sql = "select id,curr_quant from `seller_data` where `id`=$key";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$new_quant = $row['curr_quant']-$value;
			$update_sql = "update `seller_data` set `curr_quant` = $new_quant where `id`=$key";
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
	else
	{
		$res_arr = array('flag' => $flag,'message' => "The sale cannot happen cause of some error");
		echo json_encode($res_arr);
	}
	/*$order_arr = array("id" => $_POST['id'],"quantity" => $_POST['quantity']);
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
	}*/
?>