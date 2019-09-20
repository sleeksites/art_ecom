<?php  
session_start();
require("./db_info.php");
if (!isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] != 1))
{
  header("Location:../login");
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
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Delta Admin Panel</title>
  <link rel="icon" href="../logo.jpeg" type="image/jpeg" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.19/b-1.5.6/sl-1.3.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require("./navbar.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1>The Products Currently Ordered</h1>
          <div class="row">
          <br>
          <table class="table table-condensed table-hover" id="order_table">
            <thead>
              <tr>
                <th>Timestamp</th>
                <th>#</th>
                <th>Name</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>Pincode</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Art-Id</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
          <?php 
            $sql = "select * from `orders`";
            $result = $con -> query($sql);
            if($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                ?>
                  <tr>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['add_line_1'] ?></td>
                    <td><?php echo $row['add_line_2'] ?></td>
                    <td><?php echo $row['pincode'] ?></td>
                    <td><?php echo $row['phone_number'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['art_id'] ?></td>
                    <td><?php echo $row['quant'] ?></td>

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
          </table>
          </div>
          <!-- Page Heading -->
          </div>
  </div>
          

          <!-- Content Row -->

          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
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

</body>

</html>
