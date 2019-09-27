<!DOCTYPE html>
<html>
<head>
	<title>Input Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style type="text/css">
		.container
		{
			width: 70% !important;
			margin:auto;
			-webkit-box-shadow: 0px 0px 15px 10px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 15px 10px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 15px 10px rgba(0,0,0,0.75);
			padding: 10px;
			border-radius: 10px;
			background-color: white;
		}
		body
		{
			background: url(https://images.unsplash.com/photo-1565281356651-926255aa8036?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80);
			background-position: center;
			background-attachment: fixed;
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>
	<br>
	<br>
	<div class="container">
		<br>
		<div class="jumbotron">
			<h1>Category Details</h1>
		</div>
		<br>
		<form method="post" action="save_category.php" enctype="multipart/form-data">
			<input type="text" name="category_name" class="form-control mb-2" required placeholder="Add the name of the Category">
			<div class="form-group">
				<input type="file" name="category_image" required class="form-control mb-2">
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	</div>
	<br>
		<br>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</html>