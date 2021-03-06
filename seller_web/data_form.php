<?php  

require("./db_info.php");
if(!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in']!=1)
{
  header("Location:../login/");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<br>
	<br>
	<div class="container">
		<br>
		<form method="post" action="../save_data.php" enctype="multipart/form-data">
			<div class="row">
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="text" name="company_name" placeholder="Enter Company Name" required class="form-control mb-2">
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="text" name="seller_name" placeholder="Enter Name" required class="form-control mb-2">
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="text" name="title" placeholder="Enter Product Title" required class="form-control mb-2">
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="text" name="description" placeholder="Enter Description" required class="form-control mb-2">
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="number" name="price" placeholder="Enter Price" required class="form-control mb-2" min="0">
				</div>
				<div class="col-lg-4 col-md-6 mb-3 form-group">
					<span style="display:flex;">
						<input type="text" name="length" placeholder="Length" required class="col form-control" required>
						<div class="col" style="text-align:center;margin:auto;">X</div>
						<input type="text" name="breath" placeholder="Breath" required class="col form-control" required>
					</span>
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="text" name="material" placeholder="Material" required class="form-control mb-2" required>
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<select name="orientation" class="form-control" required>
						<option selected disabled>Select the orientation</option>
						<option value="landscape">Landscape</option>
						<option value="potrait">Potrait</option>
					</select>
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="number" name="quantity" required class="form-control mb-2" placeholder="Enter Initial Quantity" min="0">
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<div id="load"> <?php include 'category.php'; ?> </div>
				</div>
				<div class="form-group col-lg-4 col-md-6 mb-3">
					<input type="file" name="sell_item" required class="form-control mb-2">
				</div>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	</div>
	<br>
		<br>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</html>
<br>
<br>