<?php 
    header("Access-Control-Allow-Origin: *");
?>
<?php 
    require('db_info.php');
    $order_id = $_POST['oid'];
    $select_sql = "select * from orders where `id`='$order_id'";
    $result = $con->query($select_sql);
    $row = $result->fetch_assoc();
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</head>
<div class="container">
    <div style="float:right;margin-right:0;text-align:right;display:inline-block;">
        <h1>Invoice</h1>
        <h6><?php echo "Order Time and Date  ".$row['timestamp']; ?></h6>
        <h6><?php echo "Order ID  ".$row['id']; ?></h6>
    </div>
    <br>
    <br>
    <div style="float:left;margin:100px;text-align:left;">
        <h4>Buyer Details</h4>
        <h6><?php echo "Name:  ".$row['name'] ?></h6>
        <h6><?php echo "Email:  ".$row['email'] ?></h6>
        <br>
        <h5>Address</h5>
        <h6><?php echo $row['add_line_1'] ?></h6>
        <h6><?php echo $row['add_line_2'] ?></h6>
        <h6><?php echo $row['pincode'] ?></h6>
    </div>
    <?php $count = 1; ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Art</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Seller Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 0;
                $total = 0;
                $ids = json_decode($row['art_id']);
                foreach ($ids as $value) 
                {
                    $sql = "select id,seller_email from `image_db` where `id`=$value";
                    $inner_result = $con -> query($sql);
                    if($inner_result->num_rows > 0 )
                    {
                ?>
                  <tr>
                    <td><?php echo ($count+1); ?></td>
                    <td><?php
                          $sql = "select og_link,price,seller_email from `image_db` where `id`=$value";
                          $one_res = $con->query($sql);
                          $one_row = $one_res->fetch_assoc();
                         ?>
                         <img src="<?php echo "../".$one_row['og_link'] ?>" width="100" height="100">    
                      </td>
                    <td><?php 
                        $quants = json_decode($row['quant']);
                        echo $quants[$count]; 
                        ?>
                    </td>
                    <td>
                        <?php 
                            echo $one_row['price'] * $quants[$count];
                            $total+=$one_row['price'] * $quants[$count];
                        ?>
                    </td>
                    <td>
                        <?php 
                            $one_email = $one_row['seller_email'];
                            $select = "select * from `seller_data` where `email`='$one_email'";
                            $r = $con->query($select);
                            $ro = $r->fetch_assoc();
                            echo $ro['seller_name'];
                        ?>
                    </td>
                  </tr>
                <?php
                $count++;
              }
              }
              ?>
        </tbody>
    </table>
    <div style="float:right;margin-right:0;text-align:right;display:inline-block;">
        <h3>Total : <?php echo $total; ?></h3>
    </div>
    <button id="printButton" onclick="printPage()">Print to PDF</button>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript">
    function printPage()
    {   
        $('#printButton').remove();
        window.print();
    }
</script>