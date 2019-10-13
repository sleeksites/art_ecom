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
		<form method="post" action="../save_category.php" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-6">
					<input type="text" name="category_name" class="form-control mb-2" required placeholder="Add the name of the Category">
				</div>
				<div class="form-group col-lg-6">
					<input type="file" name="category_image" required class="form-control mb-2">
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