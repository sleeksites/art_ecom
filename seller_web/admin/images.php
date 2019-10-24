<?php  
session_start();
require("./db_info.php");
if (!isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] != 1))
{
  ?>
		<script>
		window.location="login/";
		</script>
		<?php
}
$email = $_SESSION['logged_in_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
    a
    {
      padding:10px;
    }
    #order_table_wrapper
    {
      width:80vw !important;
    }
    body
    {
      height:90vh !important;
      overflow: scroll;
    }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Art-Kart Admin Panel</title>
  <link rel="icon" href="../logo.jpeg" type="image/jpeg" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.19/b-1.5.6/sl-1.3.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<!-- 

    <style type="text/css" media="screen">
      input,button,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit;}
      .glyphicon{position:relative;top:1px;display:inline-block;font-family:'Glyphicons Halflings';font-style:normal;font-weight:normal;line-height:1;-webkit-font-smoothing:antialiased;}
      .glyphicon-pencil:before{content:"\270f";}
      .glyphicon-trash:before{content:"\e020";}
    </style> -->
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require("./navbar.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="text-align: center;margin:auto;">
          <h1>The Products Currently for Sale </h1>
          <div class="row">
          <br>
          <table class="table table-condensed table-responsive table-hover" id="order_table">
            <thead>
              <tr>
                <th>Timestamp</th>
                <th>#</th>
                <th>Name</th>
                <th>Company Name</th>
                <th>Product Title</th>
                <th>Description</th>
                <th>Length</th>
                <th>Breadth</th>
                <th>Material</th>
                <th>Orientation</th>
                <th>Price</th>
                <th>Initial Count</th>
                <th>Current Count</th>
                <th>Art</th>
                <th>Category</th>
              </tr>
            </thead>
            <tbody>
          <?php 
            $sql = "select * from `image_db` where `seller_email`='$email'";
            $result = $con -> query($sql);
            if($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                ?>
                  <tr>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['seller_name'] ?></td>
                    <td><?php echo $row['company_name'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['length']  ?></td>
                    <td><?php echo $row['breath'] ?></td>
                    <td><?php echo $row['material'] ?></td>
                    <td><?php echo $row['orientation'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['init_quant'] ?></td>
                    <td><?php echo $row['curr_quant'] ?></td>
                    <td>
                         <img src="<?php echo "../".$row['og_link'] ?>" width="100%">    
                      </td>
                      <td>
                      <?php $category = $row['category']; ?>
                      <?php 
                          $sel_sql = "select category from `category_table` where `id`='$category'";
                          $internal_result = $con -> query($sel_sql);
                          $internal_row = $internal_result->fetch_assoc();
                          echo $internal_row['category'];
                      ?>
                    </td>
                  </tr>
                <?php
              }
            }
            else
            {
              ?>
                <p>No Products Yet!</p>
              <?php
            }
          ?>
          </tbody>
          <tfoot>
            <thead>
              <tr>
              <th>Timestamp</th>
                <th>#</th>
                <th>Name</th>
                <th>Company Name</th>
                <th>Product Title</th>
                <th>Description</th>
                <th>Length x Breath</th>
                <th>Material</th>
                <th>Orientation</th>
                <th>Price</th>
                <th>Initial Count</th>
                <th>Current Count</th>
                <th>Art</th>
                <th>Category</th>
              </tr>
            </thead>
          </tfoot>
          </table>
          <br>
          <br>
          </div>
          <!-- Page Heading -->
          </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <!-- Logout Modal-->
  <script type="text/javascript">
    $('#order_table').DataTable();
  </script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="js/jquery.tabledit.js"></script>

<?php  
/*
          $q = "select category,id from category_table";

          $r = $con->query($q);
          $r = $r->fetch_all();
          $cat = [];
          foreach($r as $row)
          {
            print_r($row);
            $cat[$row[1]] = $row[0];
          }
          print_r($cat);
          $categories = json_encode($cat);*/


    ?>

  <script type="text/javascript">
    $('#order_table').Tabledit({
    url: 'example.php',
    hideIdentifier: true,
    columns: {
        identifier: [1, 'id'],
        editable: [[2, 'name'],[3, 'company_name'],[4, 'product_title'],[5, 'description'],[6, 'length'],[7, 'breath'],[8, 'material'],[12, 'current_quant']]
    },
    onDraw: function() {
        console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
        console.log('onSuccess(data, textStatus, jqXHR)');
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAlways: function() {
        console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        $.ajax({
          url: "./edit_image_table.php",
          type: "post",
          data: serialize,
          success: function(d)
          {
            location.reload();
          }
        });
        console.log(serialize);
    }
});
  </script>

</body>

</html>
