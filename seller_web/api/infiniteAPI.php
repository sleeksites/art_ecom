<?php 
	header("Access-Control-Allow-Origin: *");
?>
<?php
    extract($_POST);
    require 'db_info.php';
    $sql = "select * from $table";
    $result = $con -> query($sql);
    $no_of_rows = $result->num_rows;
    $lim = $no_of_rows - $id > 5 ? 5 : $no_of_rows - $id;
    $final_arr = array();
    for($i=$id+1;$i<=($id + $lim);$i++)
    {
        $sel_sql = "select * from $table where id=$i";
        $internal_result = $con->query($sel_sql);
        $outp = $internal_result->fetch_all(MYSQLI_ASSOC);
        array_push($final_arr,$outp[0]);
    }
    echo json_encode($final_arr);
?>
