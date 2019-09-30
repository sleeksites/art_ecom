<?php 
header("Access-Control-Allow-Origin: *");
?>
<?php
require 'db_info.php';
$arr = json_decode($_POST['data']);
foreach($arr as $key => $val)
{
    if($key == "fullName")
    {
        $name = $val;
    }
    elseif($key == "email")
    {
        $email = $val;
    }
    elseif($key == "phone_no")
    {
        $phone_number = $val;
    }
    elseif($key == "req")
    {
        $req = $val;
    }
}
$insert_sql = "INSERT INTO `int_req`(`name`, `email`, `phone_number`, `req`) VALUES ('$name','$email','$phone_number','$req')";
$con -> query($insert_sql);
$count_sql = "select * from `int_req`";
$count_result = $con -> query($count_sql);
$no_of_rows = $count_result -> num_rows;
$sql = "select * from `int_req` where `id`=$no_of_rows";
$result = $con -> query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>